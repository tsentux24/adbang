<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataOpdController extends Controller
{
   public function index(){
    return view ('dashboard.dataopd');
   }
}
