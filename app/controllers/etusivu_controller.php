<?php

  class etusivucontroller extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
          
    }

    public static function etusivu(){
      // Testaa koodiasi täällä
      View::make('etusivu.html');
    }
  }
