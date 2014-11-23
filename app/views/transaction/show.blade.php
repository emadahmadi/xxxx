@extends('layout')
@section('title')
Job detail {{{ $transaction->id }}}
@stop

@section('content')
<h1>Transaction :</h1>
<div class="table-responsive">
<table border="1px " class="table table-striped">
<tbody>
<tr><td class="tabletitles">ID:</td><td class="detail">{{{ $transaction->id }}}</td></tr>
<tr><td class="tabletitles">Weight:</td><td class="detail">{{{ $transaction->weight }}}</td></tr>
<tr><td class="tabletitles">Product Id:</td><td class="detail">{{{ $transaction->productId }}}</td></tr>
<tr><td class="tabletitles descript">Price:</td><td class="detail">{{{ $transaction->price }}}</td></tr>
<tr><td class="tabletitles descript">Date</td><td class="detail">{{{ $transaction->created_at }}}</td></tr>
<tr><td class="tabletitles descript">User Id:</td><td class="detail">{{{ $transaction->userId }}}</td></tr>
<tr><td class="tabletitles descript">Client Id</td><td class="detail">{{{ $transaction->clientId }}}</td></tr>
</tbody>
</table>
<p>

{{ Form::open(array('method' => 'DELETE', 'route' => 
array('transaction.destroy', $transaction->id))) }}
{{ Form::submit('Delete') }}
   <button>{{ link_to_route('transaction.edit', 'Edit', array($transaction->id)) }} </button>
{{ Form::close() }}

@stop
