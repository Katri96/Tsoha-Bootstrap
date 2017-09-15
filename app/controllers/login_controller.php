<?php

 class logincontroller extends BaseController{

    public static function login(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('login.html');
    }
 }