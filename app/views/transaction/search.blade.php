@extends('layout')

@section('content')


<ul>
   <div class="table-responsive">
    <table border="1px " class="table table-striped">
    <thead>
    <tr><th>Name</th><th>Weight</th><th>price</th><th>user Id</th><th>client Id</th><th>date</th></tr>
    </thead>
    <tbody>
  @foreach ($transactions as $job)
      <tr><td>{{link_to_route('transaction.show',$job->id,array($job->id)) }}</td>
      <td>{{{ $job->weight }}}</td>
      <td>{{{ $job->price }}}</td>
      <td>{{{ $job->userId }}}</td>
      <td>{{{ $job->clientId }}}</td>
      <td>{{$job->created_at}}</td></tr>
  @endforeach
      <tr><td>Total : </td><td>{{{ $w}}}</td> <td>{{{ $p }}} </td><td></td><td></td><td></td></tr>
         </tbody>
    </table>
     
           {{ Form::open(array('action' => 'TransactionController@search', 'method' => 'get')) }}
      <div class="form-group">
       From :
        {{ Form::input('date', 'from') }}
        to:
      {{ Form::input('date', 'to') }}
        <p>
    {{ Form::submit('Search') }}
    {{ Form::close() }}

@stop