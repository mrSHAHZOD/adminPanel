<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
   public function dashboard()
   {
    return view('admin.layouts.dashboard');
   }
   public function index()
   {
    return view('admin.blog.index');
   }
}
