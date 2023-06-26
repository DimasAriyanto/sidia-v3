<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaksi\UserRequest;
use App\Repositories\UserRepository;
use App\Services\Contracts\UserServiceInterface;
use Exception;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService) {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->getAll();
        return view('master.user.index', compact($user));
    }

    public function show(int $id)
    {
        $user = $this->userService->getById($id);
        return view('master.user.show', compact($user));
    }

    public function create()
    {
        return view('master.user.create');
    }

    public function edit(int $id)
    {
        $user = $this->userService->getById($id);
        return view('master.user.edit', compact($user));
    }

    public function store(UserRequest $request)
    {
        try {
            $data = $request->validated();
            $user = $this->userService->create($data);

            return redirect()
                ->back()
                ->with('success', 'User berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menambah user.',
                ]);
        }
    }

    public function update(UserRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $user = $this->userService->update($id, $data);

            return redirect()
                ->back()
                ->with('success', 'User berhasil diubah');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal mengubah user.',
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
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menghapus user.',
                ]);

        }
    }
}
