<?php

class TransactionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    if (!Auth::check()){return View::make('user.index');}
    if (Auth::check()){
      $userId=Auth::user()->id;
      $currentuser = User::find($userId);
	  }
    
    
      $transactions = DB::select('select *
       from transactions 
       where  transactions.userId = ?',array($userId));
;
		    return View::make('transaction.index')->with('jobs', $transactions);
    
	}

	public function showAdmin()
	{
    if (!Auth::check()){return View::make('user.index');}
    if (Auth::check()){
      $userId=Auth::user()->id;
      $currentuser = User::find($userId);
	    if (Auth::user()->isAdmin==0)
        {

         // $transactions = DB::table('transactions')->get();
        $transactions = DB::select('select *
       from transactions , users
       where  transactions.userId = users.id');
	      	return View::make('transaction.showAdmin')->with('jobs', $transactions);
      }else{
        return View::make('user.index');
      }
    }
    return View::make('user.index');
    
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
      
      return View::make('transaction.create');
	  }
    
	}
 public function search(){
    if (!Auth::check()){return View::make('user.index');}
     if (Auth::check()){
      $userId=Auth::user()->id;
      $currentuser = User::find($userId);

	  }
   $input = Input::all();



       $transactions = DB::select('select *
       from transactions 
       where created_at >= ? AND created_at <= ?',array($input['from'],$input['to']));
       $w= DB::table('transactions')->where('created_at', '>=', $input['from'])->where('created_at', '<=', $input['to'])->sum('weight');
       $p= DB::table('transactions')->where('created_at', '>=', $input['from'])->where('created_at', '<=', $input['to'])->sum('price');
       return View::make('transaction.search')->with('transactions', $transactions)->with('w', $w)->with('p', $p);
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
    $transaction = new Transaction;
    $transaction->weight = $input['weight'];
    $transaction->price =$input['price'];
    $transaction->clientName =$input['client'];
    $transaction->productId =1;
    $transaction->clientId =1;
    $transaction->userId = $userId;
    $transaction->save();
    	return Redirect::action('TransactionController@index');
    }
    return"Transaction not created";
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
	  $transaction= Transaction::find($id);
    if($transaction!=null){
    if (Auth::check()){
     return View::make('transaction.show')->with('transaction', $transaction);
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
	  if(!Auth::check()) return Redirect::route('user.index');
    $transaction = Transaction::find($id);
    return View::make('transaction.edit', compact('transaction'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		    if(!Auth::check()) return Redirect::route('user.index');
	 	 $transaction = Transaction::find($id);
     $input = Input::all();
         $transaction->weight = $input['weight'];
         $transaction->price = $input['price'];
         $transaction->clientName = $input['name'];
         $transaction->save();
         return Redirect::route('transaction.show', $transaction->id);
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
		$transaction = Transaction::find($id);
    $transaction->delete();
     return Redirect::route('transaction.index');
	}


}
