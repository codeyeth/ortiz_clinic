@extends('layouts.admin_app')

@section('content')

<div class="col-md-12">
    @if(session('change_pass_success'))
    <div class="alert alert-success" role="alert">
        {!! Str::upper(session('change_pass_success')) !!} 
    </div>
    @endif   
</div>

<div class="col-md-6">
    <div class="box box-default">
        
        <div class="box-body">
            
            {!! Form::open(['action' => ['ChangePassController@update', Auth::user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data' , 'id' => 'edit_form',
            'autocomplete' => 'off']) !!}
            @csrf
            
            <p>You will be Logged out of the System upon successful Password Change.</p>

            <div class="row">
                <div class="col-sm-6">
                    <label for=""><b> Password </b> <small>Minimum of 8 characters.</small> </label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                </div>
                
                <div class="col-sm-6">
                    <label for=""><b> Confirm Password </b> </label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    
                </div>
            </div>
            
        </div>
        {{Form::hidden('_method', 'PUT')}}
        
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check"></i> Update Password</button>
        </div>
        
        {!! Form::close() !!}
    </div>
</div>

@endsection