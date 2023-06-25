<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaksi\UserRequest;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    return view('master.user.index');
  }

  public function show(int $id)
  {
    return view('master.user.show');
  }

  public function create()
  {
    return view('master.user.create');
  }

  public function edit(int $id)
  {
    return view('master.user.edit');
  }

  public function store(UserRequest $request)
  {
    try {
      $userData = $request->validated();
      UserRepository::createUser($userData);

      return redirect()
        ->back()
        ->with('success', 'User berhasil ditambahkan');
    } catch (Exception $e) {
      return redirect()
        ->back()
        ->withErrors([
          'error' => 'Gagal menambah user.'
        ]);
    }
  }

  public function update(UserRequest $request, int $id)
  {
    try {
      $userData = $request->validated();
      UserRepository::updateUser($id, $userData);
      
      return redirect()
        ->back()
        ->with('success', 'User berhasil diubah');
    } catch (Exception $e) {
      return redirect()
        ->back()
        ->withErrors([
          'error' => 'Gagal mengubah user.'
        ]);
    }
  }

  public function destroy(int $id)
  {
    try {
      UserRepository::deleteUser($id);
      
      return redirect()
        ->back()
        ->with('success', 'User berhasil dihapus');
    } catch (Exception $e) {
      return redirect()
        ->back()
        ->withErrors([
          'error' => 'Gagal menghapus user.'
        ]);
      
    }
  }
}
