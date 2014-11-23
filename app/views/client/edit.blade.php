@extends('layout')
@section('content')
{{ Form::model($client,array('method' => 'PATCH','route'=>array('client.update',$client->id),'class'=>'form-horizontal')) }}
<div class="form-group">
{{ Form::label('name', 'Name:') }}
{{ Form::text('name',$client->name ,array('class'=>'form-control'))}}
<p>
{{ Form::label('phone', 'Phone number: ') }}
{{ Form::text('phone',$client->phoneNum,array('class'=>'form-control')) }}
<p>
{{ Form::submit('Update') }}
{{ Form::close() }}
</div>
@stop
