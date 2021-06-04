<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        $sidebar = 'Blog/News';
        $breadcrumb = 'Blog/News';
        
        return view('admin_side/admin_blog')
        ->with('sidebar', $sidebar)
        ->with('breadcrumb', $breadcrumb);
    }
}