<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
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
        $sidebar = 'User Management';
        $breadcrumb = 'User Management';
        
        return view('admin_side/user_management')
        ->with('sidebar', $sidebar)
        ->with('breadcrumb', $breadcrumb);
    }
}
