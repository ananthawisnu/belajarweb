<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;   // <- hanya ini, TIDAK ada use App\Http\Controllers\Admin\User;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();

        return view('admin.dashboard', compact('usersCount'));
    }
}
