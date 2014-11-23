@extends('layout')

@section('title')
Create client 
@stop

@section('content')
@section('content')
<h1>Clients :</h1>
<div class="table-responsive">
<table border="1px " class="table table-striped">
<tbody>
<tr><td class="tabletitles">ID:</td><td class="detail">{{{ $client->id }}}</td></tr>
<tr><td class="tabletitles">Name:</td><td class="detail">{{{ $client->name }}}</td></tr>
<tr><td class="tabletitles">Phone Number:</td><td class="detail">{{{ $client->phoneNum }}}</td></tr>
<tr><td class="tabletitles descript">Member since :</td><td class="detail">{{{ $client->created_at }}}</td></tr>
</tbody>
</table>
<p>

{{ Form::open(array('method' => 'DELETE', 'route' => 
array('client.destroy', $client->id))) }}
{{ Form::submit('Delete') }}
   <button>{{ link_to_route('client.edit', 'Edit', array($client->id)) }} </button>
{{ Form::close() }}
@stop
