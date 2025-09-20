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
        $viewName = "dashboard." . $role;
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            abort(404, "Dashboard view for role '{$role}' not found.");
        }
    }
}
