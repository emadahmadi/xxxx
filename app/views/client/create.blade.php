@extends('layout')

@section('title')
Create client 
@stop

@section('content')
Create New Client:<p>
  {{Form::open(array('action'=>'ClientController@store'))}}
  {{Form::label('name','Name: ')}}
  {{Form::text('name')}}
  <p>
  {{Form::label('number','Phone Number : ')}}
  {{Form::text('number')}}
  <p>
  {{Form::submit('Create')}}
  {{Form::close()}}
@stop
