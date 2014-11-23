@extends('layout')

@section('content')

<h3>You're recent transactions</h3>

<ul>
   <div class="table-responsive">
    <table border="1px " class="table table-striped">
    <thead>
    <tr><th>ID</th><th>Name</th><th>Weight</th><th>price</th><th>date</th></tr>
    </thead>
    <tbody>
  @foreach ($jobs as $job)
      <tr><td>{{link_to_route('transaction.show',$job->id,array($job->id)) }}</td>
        <td>{{{ $job->clientName }}}</td>
      <td>{{{ $job->weight }}}</td>
      <td>{{{ $job->price }}}</td>
      <td>{{$job->created_at}}</td></tr>
  @endforeach
    </tbody>
    </table>
  </div>

</ul>

@stop
