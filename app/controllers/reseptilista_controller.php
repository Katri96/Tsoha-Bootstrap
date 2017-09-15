<?php

  class reseptilistacontroller extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
          
    }

    public static function reseptilista(){
      // Testaa koodiasi täällä
      View::make('reseptilista.html');
    }
  }

