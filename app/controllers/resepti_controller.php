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
      
    
      View::make('resepti.html');
  
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
        
        $attributes = array(
            'id' => resepticontroller::highest() +1,
            'name' => $params['name'],
            'description' => $params['description']
        );
    $resepti = new Resepti($attributes);
   
    $resepti-> save();
    Redirect::to('/reseptilista' , array('message' => 'Resepti lisätty!'));
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
  // viikko 4 
  
  public static function edit($id){
    $resepti = Resepti::find($id);
    View::make('resepti/edit.html', array('attributes' => $resepti));
  }

  // Reseptin muokkaaminen (lomakkeen käsittely)
  public static function update($id){
    $params = $_POST;

    $attributes = array(
      'name' => $params['name'],
      'description' => $params['description']
    );

    // Alustetaan Resepti-olio käyttäjän syöttämillä tiedoilla
    $resepti = new Resepti($attributes);
    $errors = $resepti->errors();

    if(count($errors) > 0){
      View::make('resepti/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      // Kutsutaan alustetun olion update-metodia, joka päivittää reseptin tiedot tietokannassa
      $resepti->update();

      Redirect::to('/resepti/' . $resepti->id, array('message' => 'Resepti muokattu'));
    }
  }

  // Reseptin poistaminen
  public static function destroy($id){
    // Alustetaan Game-olio annetulla id:llä
    $resepti = new Resepti(array('id' => $id));
    // Kutsutaan Game-malliluokan metodia destroy, joka poistaa pelin sen id:llä
    $resepti->destroy();

    // Ohjataan käyttäjä pelien listaussivulle ilmoituksen kera
    Redirect::to('/resepti', array('message' => 'Resepti poistettu'));
  }

  }
