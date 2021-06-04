<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminServicesController extends Controller
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
        $sidebar = 'Services';
        $breadcrumb = 'Services';
        
        return view('admin_side/services_list')
        ->with('sidebar', $sidebar)
        ->with('breadcrumb', $breadcrumb);
    }
}
