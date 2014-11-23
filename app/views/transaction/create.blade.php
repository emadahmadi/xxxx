@extends('layout')

@section('title')
Create User 
@stop

@section('content')
<h3>Create New Transaction:</h3>
<p>
  {{Form::open(array('action'=>'TransactionController@store'))}}
  
    
  {{Form::label('client','Clients Name: ')}}
  {{Form::text('client')}}
 <p>
  {{Form::label('weight','Weight: ')}}
  {{Form::text('weight')}}
  <p>
  {{Form::label('price','price:')}}
  {{Form::text('price')}}

  <p>
  {{Form::submit('Create')}}
  {{Form::close()}}
@stop
