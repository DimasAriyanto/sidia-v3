<?php

namespace App\Http\Controllers\Master;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\StoreUserRequest;
use App\Http\Requests\Master\UpdateUserRequest;
use App\Services\Contracts\UserServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('master.user.index');
    }

    public function show(int $id)
    {
        try {
            $user = $this->userService->getById($id);

            return view('master.user.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.user.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Ada masalah saat membuka halaman!',
            ]);
        }
    }

    public function create()
    {
        $types = $this->userService->getMappedUserTypes();

        return view('master.user.create', compact('types'));
    }

    public function edit(int $id)
    {
        try {
            $user = $this->userService->getById($id);
            $types = $this->userService->getMappedUserTypes();

            return view('master.user.edit', compact('user', 'types'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.user.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Ada masalah saat membuka halaman!',
            ]);
        }
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $data = $request->validated();
            $this->userService->create($data);

            return redirect()
                ->back()
                ->with('success', 'User berhasil ditambahkan');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.user.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menambah user.',
                ]);
        }
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            if (empty($data['password'])) {
                unset($data['password']);
            }
            $this->userService->update($id, $data);

            return redirect()
                ->back()
                ->with('success', 'User berhasil diubah');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.user.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->userService->delete($id);

            return redirect()
                ->back()
                ->with('success', 'User berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.master.user.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menghapus user.',
                ]);
        }
    }
}
