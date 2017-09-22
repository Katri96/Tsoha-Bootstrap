<?php
require 'app/models/login.php';
 class logincontroller extends BaseController {
     
       public static function index(){
    // Haetaan kaikki pelit tietokannasta
    $kayttajat = Kayttaja::all();
    // Renderöidään views/kayttaja kansiossa sijaitseva tiedosto index.html muuttujan $games datalla
    View::make('kayttaja/index.html', array('kayttajat' => $kayttajat));
  }

    public static function login(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('login.html');
    }
    public static function loginjuttui() {
    
    $kayttajat = Kayttaja::all();
    // Kint-luokan dump-metodi tulostaa muuttujan arvon
    Kint::dump($kayttajat);

    }
 }