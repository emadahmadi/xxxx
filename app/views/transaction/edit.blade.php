@extends('layout')
@section('content')
{{ Form::model($transaction,array('method' => 'PATCH','route'=>array('transaction.update',$transaction->id),'class'=>'form-horizontal')) }}
<div class="form-group">
{{ Form::label('client', 'Client name: ') }}
{{ Form::text('client',$transaction->clientName,array('class'=>'form-control')) }}
  
{{ Form::label('weight', 'Weight:') }}
{{ Form::text('weight',$transaction->weight ,array('class'=>'form-control'))}}
<p>
{{ Form::label('price', 'Price: ') }}
{{ Form::text('price',$transaction->price,array('class'=>'form-control')) }}
<p>
{{ Form::submit('Update') }}
{{ Form::close() }}
</div>
@stop
