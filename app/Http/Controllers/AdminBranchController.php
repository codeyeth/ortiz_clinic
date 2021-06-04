<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBranchController extends Controller
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
        $sidebar = 'Branches';
        $breadcrumb = 'Branches';
        
        return view('admin_side/branch_list')
        ->with('sidebar', $sidebar)
        ->with('breadcrumb', $breadcrumb);
    }
}
