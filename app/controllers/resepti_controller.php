<?php
require 'app/models/resepti.php';
  class resepticontroller extends BaseController {

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
          
    }
    
    public static function reseptilista(){
      // Testaa koodiasi täällä
      $reseptit = Resepti::all();
      View::make('reseptilista.html', array('reseptit'=> $reseptit));

    }

    public static function resepti(){
      // Testaa koodiasi täällä
      
      $ruoka = new Resepti(array('id'=> 1, 'name'=> 'nimi', 'description' => 'jtn', 'date' => 2));
      $test = $ruoka->name;
      echo $test;
      $reseptit = Resepti::find(1);
      $reseptit = Resepti::all();
      Kint::dump($reseptit);
      Kint::dump($ruoka);
      View::make('resepti.html', array('reseptit'=> $reseptit));
  
       }
       public static function highest(){
          
        $highest = 0;
        $reseptit = resepti::all();
        foreach ($reseptit as $resepti){
            if($resepti->id > $highest){
                $highest = $resepti->id;
            }
        }
        return $highest;
    }
    
    public static function reseptinmuokkaus(){
    
      View::make('reseptin_muokkaus.html');
    }
  
     public static function reseptinlisays(){
      // Testaa koodiasi täällä
      View::make('reseptinlisays.html');
    }

    public static function store(){

    $params = $_POST;

    $resepti = new Resepti(array(
        'id' => resepticontroller::highest() +1,
        'name' => $params['name']
    ));
    
    Kint::dump($params);
   
    $resepti-> save();
    Redirect::to('/resepti' . $resepti->id, array('message' => 'Resepti lisätty!'));
  }
    public function save(){
    // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
    $query = DB::connection()->prepare('INSERT INTO Resepti (name, description) VALUES (:name, :description) RETURNING id');
    // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
    $query->execute(array('name' => $this->name, 'description' => $this->description));
    // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    $row = $query->fetch();
    Kint::trace();
    Kint::dump($row);
    $this->id = $row['id'];
  }
  }
