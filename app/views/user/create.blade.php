@extends('layout')

@section('title')
Create client 
@stop

@section('content')
Create New Client:<p>
  {{Form::open(array('action'=>'UserController@store'))}}
  {{Form::label('username','User Name: ')}}
  {{Form::text('username')}}
  <p>
  {{Form::label('password','Password: ')}}
  {{Form::text('password')}}
  <p>
   {{Form::label('isAdmintrue','Admin ')}}
   {{Form::radio('isAdmin', 0)}}
   {{Form::label('isAdmintrue','User ')}}
   {{Form::radio('isAdmin', 1)}}
    <p>
  {{Form::submit('Create')}}
  {{Form::close()}}
@stop
