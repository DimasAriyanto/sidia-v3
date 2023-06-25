<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaksi\UserRequest;
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
      
    } catch (Exception $e) {
      
    }
  }

  public function update(UserRequest $request, int $id)
  {
    try {
      
    } catch (Exception $e) {
      
    }
  }

  public function destroy(int $id)
  {
    try {
      
    } catch (Exception $e) {
      
    }
  }
}
