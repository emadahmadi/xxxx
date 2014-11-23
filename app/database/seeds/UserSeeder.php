<?php

class UserSeeder extends Seeder {
  public function run()
  {
    $user = new User;
    $user->username = 'alex';
    $user->isAdmin = 1;
    $encrypted = Hash::make('1234');
    $user->password=$encrypted;
    $user->save();
    
    $user = new User;
    $user->username = 'jane';
    $user->isAdmin = 0;
    $encrypted = Hash::make('qwer');
    $user->password=$encrypted;

    $user->save();
    
    $custom = new Custom;
    $custom->name = 'Chemist';
    $custom->phoneNum =05455;
    $custom->save();
    
    $custom = new Custom;
    $custom->name = 'femist';
    $custom->phoneNum =81197;
    $custom->save();
    
    $transactions = new Transaction;
    $transactions->weight =12.21;
    $transactions->productId =1;
    $transactions->price =120;
    $transactions->clientName = 'jack';
    $transactions->userId =1;
    $transactions->clientId =1;
    $transactions->save();

    $transactions = new Transaction;
    $transactions->weight =99.154;
    $transactions->productId =1;
    $transactions->price =330;
    $transactions->clientName = 'joe';
    $transactions->userId =2;
    $transactions->clientId =1;
    $transactions->save();
    

   }
}