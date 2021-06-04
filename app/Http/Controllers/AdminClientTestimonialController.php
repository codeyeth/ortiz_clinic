<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminClientTestimonialController extends Controller
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
        $sidebar = 'Client Testimonial';
        $breadcrumb = 'Client Testimonial';
        
        return view('admin_side/client_testimonial')
        ->with('sidebar', $sidebar)
        ->with('breadcrumb', $breadcrumb);
    }
}