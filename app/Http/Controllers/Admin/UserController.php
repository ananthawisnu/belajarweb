<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;   // <- ini juga Models\User

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.users', compact('data'));
    }
}
