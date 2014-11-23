
@extends('layout')

@section('content')
<p>
you are in clients
<p>

<ul>
   <div class="table-responsive">
    <table border="1px " class="table table-striped">
    <thead>
    <tr><th>Id</th><th>Name</th><th>phone Number</th><th>date</th></tr>
    </thead>
    <tbody>
  @foreach ($clients as $client)
      <tr><td>{{link_to_route('client.show',$client->id,array($client->id)) }}</td>
      <td>{{{ $client->name }}}</td>
      <td>{{{ $client->phoneNum }}}</td>
      <td>{{$client->created_at}}</td></tr>
  @endforeach
    </tbody>
    </table>
  </div>

</ul>

@stop

@stop
