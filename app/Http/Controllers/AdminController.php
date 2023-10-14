<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index()
    {
        $data = DB::select('SELECT * FROM users');
        return view('pembuka.index')
            ->with('data', $data);
    }

    function users()
    {
        $data = DB::select('SELECT * FROM users');
        return view('users.index')
            ->with('data', $data);
    }

    function admin()
    {
        $data = DB::select('SELECT * FROM users');
        return view('admin.index')->with('data', $data);
    }

    function manager()
    {
        $data = DB::select('SELECT * FROM users');
        return view('manager.index')
            ->with('data', $data);
    }
}
