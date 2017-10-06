<?php

require 'app/models/kayttaja.php';
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
    public static function handle_login(){
    $params = $_POST;

    Redirect::to('/');

    $user = Kayttaja::authenticate($params['name'], $params['password']);

    if(!$user){
      View::make('/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'name' => $params['name']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }
  
    public static function register(){
        View::make('register.html');
    }
 }