<?php

class Resepti extends BaseModel {
    
    public $id, $aine_id, $name, $description, $date;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('name', 'type', 'price', 'description', 'added');

    }
    
    public static function lisaa() {
  //     $ruoka = new Resepti('id'=> 1, 'name'=> 'nimi', 'description' => 'jtn', 'date' => 2);
      
    }
    public static function all() {    
    
    $query = DB::connection()->prepare('SELECT * FROM Resepti');
    $query->execute();
    $rows = $query->fetchAll();
    $reseptit = array();

    foreach($rows as $row){
      $reseptit[] = new Resepti(array(
        'id' => $row['id'],
        'aine_id' => $row['aine_id'],
        'name' => $row['name'],
        'description' => $row['description'],
        'added' => $row['added']
      ));

      return $reseptit;
    }

    // return null;
  }
    public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Resepti WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();  

    if($row){
      $resepti = new Resepti(array(
        'id' => $row['id'],
        'aine_id' => $row['aine_id'],
        'name' => $row['name'],
        'description' => $row['description'],
        'added' => $row['added']
      ));

      return $resepti;
    }

    return null;
  }
    
}
