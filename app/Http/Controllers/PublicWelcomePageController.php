<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use DB;
use Jenssegers\Agent\Agent;

class PublicWelcomePageController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $servicesList = DB::table('services')->where('is_most_availed', true)->limit(3)->get();
        $branchesList = DB::table('branches')->limit(2)->get();
        
        //FOR MOBILE DEVICES
        $agent = new Agent();
        $isDesktop = $agent->isDesktop();
        
        $publicHeader = 'Home';
        
        return view('welcome_page')
        ->with('servicesList', $servicesList)
        ->with('branchesList', $branchesList)
        ->with('publicHeader', $publicHeader)
        ->with('isDesktop', $isDesktop);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
