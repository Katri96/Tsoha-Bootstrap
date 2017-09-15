<?php

  class resepticontroller extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
          
    }

    public static function resepti(){
      // Testaa koodiasi täällä
      View::make('resepti.html');
    }
  }
