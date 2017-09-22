<?php
require 'app/models/resepti.php';
  class HelloWorldController extends BaseController {

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('etusivu.html');
          
    }
    
  public static function sandbox(){
    $skyrim = Game::find(1);
    $games = Game::all();
    // Kint-luokan dump-metodi tulostaa muuttujan arvon
    Kint::dump($games);
    Kint::dump($skyrim);

  }
}
