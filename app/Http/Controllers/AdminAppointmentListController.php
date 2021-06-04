<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAppointmentListController extends Controller
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
        $sidebar = 'Appointment List';
        $breadcrumb = 'Appointment List';
        
        return view('admin_side/appointment_list')
        ->with('sidebar', $sidebar)
        ->with('breadcrumb', $breadcrumb);
    }
}