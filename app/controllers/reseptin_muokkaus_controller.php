<?php

  class reseptinmuokkauscontroller extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'muokkaussivu';
          
    }

    public static function reseptinmuokkaus(){
      // Testaa koodiasi täällä
      View::make('reseptin_muokkaus.html');
    }
  }