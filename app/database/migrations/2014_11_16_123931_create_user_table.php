<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('users',
                 function($table) {
                 $table->increments('id');
                 $table->string('username')->unique();
                 $table->integer('isAdmin');
                 $table->string('password')->index();
                 $table->rememberToken();
                 $table->timestamps();
                 });
    
            Schema::create('customs', 
                   function($table)
                   {
                     $table->increments('id');
                     $table->string('name');
                     $table->float('phoneNum');
                     $table->timestamps();
                   });
    
            Schema::create('transactions', 
                   function($table)
                   {
                     $table->increments('id');
                     $table->float('weight');
                     $table->integer('productId');
                     $table->float('price');
                     $table->string('clientName');
                     $table->integer('userId');
                     $table->integer('clientId');
                     $table->timestamps();
                   });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
       Schema::drop('customs');
       Schema::drop('transactions');
       Schema::drop('users');
	}

}
