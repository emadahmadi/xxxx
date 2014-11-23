@extends('layout')

@section('content')


<ul>
   <div class="table-responsive">
    <table border="1px " class="table table-striped">
    <thead>
    <tr><th>Id</th><th>Client Name</th><th>Weight</th><th>price</th><th>user</th><th>date</th></tr>
    </thead>
    <tbody>
  @foreach ($jobs as $job)
      <tr><td>{{link_to_route('transaction.show',$job->id,array($job->id)) }}</td>
      <td>{{{ $job->clientName }}}</td>
      <td>{{{ $job->weight }}}</td>
      <td>{{{ $job->price }}}</td>
      <td>{{{ $job->username }}}</td>
      <td>{{$job->created_at}}</td></tr>
  @endforeach
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

     

  </div>



@stop
