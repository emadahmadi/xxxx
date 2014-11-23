<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    if (!Auth::check()){return View::make('user.index');}
		 if (Auth::check()){
    $clients = DB::table('customs')->get();
		return View::make('client.index')->with('clients', $clients);
    }
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
      return View::make('client.create');
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
		 if (Auth::check()){
    $userId=Auth::user()->id;
    $currentuser = User::find($userId);
	  
		$input = Input::all();
    $customs = new Custom;
    $customs->name = $input['name'];
    $customs->phoneNum =$input['number'];
    $customs->save();
    	return"clients are created";
    }
    return"client not created";
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
		$client= Custom::find($id);
    if($client!=null){
    if (Auth::check()){
     return View::make('client.show')->with('client', $client);
	  }
  }else{
      return "wtf $id";
    }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    if (!Auth::check()){return View::make('user.index');}
		if(!Auth::check()) return Redirect::route('user.index');
    $client = Custom::find($id);
    return View::make('client.edit', compact('client'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    if (!Auth::check()){return View::make('user.index');}
			if(!Auth::check()) return Redirect::route('user.index');
	 	 $client = Custom::find($id);
     $input = Input::all();
     $client->name = $input['name'];
     $client->phoneNum = $input['phone'];
     $client->save();
     return Redirect::route('client.show', $client->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
    if (!Auth::check()){return View::make('user.index');}
		$client = Custom::find($id);
    $client->delete();
    return Redirect::route('client.index');
	}


}
