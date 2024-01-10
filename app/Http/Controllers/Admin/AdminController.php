<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashbboard() {
        $admin = Admin::find(session('Tutor'))->first();

        return view(
            'Admin.dashboard',
        )->with('admin', $admin);
    }
}
