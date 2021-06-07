<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use DB;

class ContactController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $servicesList = DB::table('services')->where('is_most_availed', true)->limit(6)->get();
        $branchesList = DB::table('branches')->limit(2)->get();
        $branchesAllList = DB::table('branches')->get();
        $branchMain = DB::table('branches')->where('is_main_office', true)->limit(1)->get();
        $branchesContacts = DB::table('branch_contacts')->get();
        
        $publicHeader = 'Contact';
        
        return view('contact')
        ->with('servicesList', $servicesList)
        ->with('branchesList', $branchesList)
        ->with('branchesAllList', $branchesAllList)
        ->with('branchMain', $branchMain)
        ->with('branchesContacts', $branchesContacts)
        ->with('publicHeader', $publicHeader);
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
