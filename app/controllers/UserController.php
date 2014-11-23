 <?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    if (!Auth::check()){return View::make('user.index');}
		 $create=0;
     if (Auth::check()){
      $userId=Auth::user()->id;
      $currentuser = User::find($userId);
      $is=$currentuser->isAdmin;
      if($is==1){
         $create=1;
       } 
	  }
    return View::make('user.index');
	}

    public function isAdmin()
  {
    $x=Auth::user()->isAdmin;
    return $x;
    
  }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    if (!Auth::check()){return View::make('user.index');}
	  if (Auth::check()){
      return View::make('user.create');
	  }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    if (!Auth::check()){return View::make('user.index');}
		$input = Input::all();

    $password = $input['password'];
    $encrypted = Hash::make($password);
    $user = new User;
    $user->username = $input['username'];
    $user->password = $encrypted;
    $user->isAdmin=$input['isAdmin'];
    $user->remember_token = "default";
    $user->save();
    return"User Created";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    if (!Auth::check()){return View::make('user.index');}
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
  
    public function login()
	{
		$userdata = array(
                      'username'=>Input::get('username'),
                     'password'=>Input::get('password')
                     );
    if(Auth::attempt($userdata)){
      
     return Redirect::action('TransactionController@index');
    } else {
        return Redirect::to(URL::previous())->withInput();
        }    
    }

  public function logout(){
		Auth::logout();
    return Redirect::action('UserController@index');
	}



}
