<?php

require 'app/models/kayttaja.php';
 class logincontroller extends BaseController {
     
    public static function index(){
    // Haetaan kaikki pelit tietokannasta
    $kayttajat = Kayttaja::all();
    // Renderöidään views/kayttaja kansiossa sijaitseva tiedosto index.html muuttujan $games datalla
    View::make('kayttaja/index.html', array('kayttajat' => $kayttajat));
  }
    //sisäänkirjautuminen
    public static function login(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('login.html');
    }
    
    //testausta

    // sisäänkirjautumisen käsittely
    public static function handle_login(){
    $params = $_POST;

    $user = Kayttaja::authenticate($params['name'], $params['password']);

    if(!$user){
      View::make('/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'name' => $params['name']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }
  
  // rekisteröinti
    public static function register(){
        View::make('register.html');
        
    }
    
    // rekisteröinnin käsittely
    public static function handle_register() {
        $params = $_POST;
        
        $attributes = array(
            'name' => $params['name'],
            'password' => $params['password'],
        );
        
        $salasana = $params['password'];
            $user = new Kayttaja($attributes);
            $errors = $user->errors();
            if (count($errors) == 0) {
                $user->save();
                Redirect::to('/login', array('message' => 'You have created an account!'));
            } else {
                View::make('register.html', array('attributes' => $attributes, 'errors' => $errors));
            }
        
        
    }
    
    //Uloskirjautuminen
    public static function logout() {
        $_SESSION['user'] = null;
        Redirect::to('/login', array('message' => 'You have logged out!'));
    }
        
    public static function kayttajat(){
      // Testaa koodiasi täällä
      $kayttajat = Kayttaja::all();
      View::make('kayttajalista.html', array('kayttajat'=> $kayttajat));

    }
    
 }