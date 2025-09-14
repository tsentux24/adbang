<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil role dari user login
        $role = Auth::user()->role; //

        // Render view sesuai role
        return view("dashboard.$role");
    }
}
