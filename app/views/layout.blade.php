<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('/styles/style.css') }}">
       <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  </head>
  <body>
          <header>
          <div class="topish">

          <div class="col-sm-12">
                @if (Auth::check())
                {{Auth::user()->username}}
                {{link_to_route('user.logout',"(sign out)")}}
                 <button>{{ link_to_route('client.create','Add a Client' )}}</button>
                 <button>{{ link_to_route('transaction.create','Add a transaction' )}}</button>
                 <button>{{ link_to_route('transaction.index','See my transactions' )}}</button>

               @if(Auth::user()->isAdmin==0)
               <button>{{ link_to_route('user.create','Add User' )}}</button>
               <button>{{ link_to_route('client.index','Clients list' )}}</button>
               <button>{{ link_to_route('transaction.showAdmin','Review' )}}</button>
                @endif
                @else
              <div style="color:grey">
                {{  Form::open(array('route'=>'user.login'))}}
                {{  Form::label('username','User Name: ')}}
                {{ Form::text('username' )}}

                {{  Form::label('password','Password: ')}}
                {{ Form::password('password')}}
                {{ Form::submit('Sign in')}}
                {{Form::close()}}
                 
              @endif
                </div>
          </div>
          </div>
        </header>
    
   <div class = 'col-sm-12 main-body'>
    @yield('content')
    </div>
  </body>
</html>


