<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $admin = Admin::find(session('Admin'))->first();

        return view(
            'Admin.dashboard',
        )->with('admin', $admin);
    }
    
}
