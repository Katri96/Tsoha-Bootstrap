<?php

class Login extends BaseModel {
    public $id, $name, $password, $lempiresepti;
    
  public function __construct($attributes){
    parent::__construct($attributes);
  }
public static function all(){
    // Alustetaan kysely tietokantayhteydellämme
    $query = DB::connection()->prepare('SELECT * FROM Kayttaja');
    // Suoritetaan kysely
    $query->execute();
    // Haetaan kyselyn tuottamat rivit
    $rows = $query->fetchAll();
    $kayttaja = array();

    // Käydään kyselyn tuottamat rivit läpi
    foreach($rows as $row){
      // Tämä on PHP:n hassu syntaksi alkion lisäämiseksi taulukkoon :)
      $kayttajat[] = new Kayttaja(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'password' => $row['password'],
        'lempiresepti' => $row['lempiresepti']
      ));
    }

    return $kayttajat;
  }
  
  public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $kayttaja = new Kayttaja(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'password' => $row['password'],
        'lempiresepti' => $row['lempiresepti']
      ));

      return $kayttaja;
    }

    return null;
  }
}