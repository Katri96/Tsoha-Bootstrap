<?php

class Resepti extends BaseModel {
    
    public $id, $aine_id, $name, $tyyppi, $hinta, $description, $added;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('vname', 'vdescription');

    }
    
    public static function all() {    
    
    $query = DB::connection()->prepare('SELECT * FROM Resepti');
    $query->execute();
    $rows = $query->fetchAll();
    $reseptit = array();

    foreach($rows as $row){
      $reseptit[] = new Resepti(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'description' => $row['description']
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
        'name' => $row['name'],
        'description' => $row['description']
      ));

      return $resepti;
    }

    return null;
  }
  // viikko 4 
  
    
    public function save(){
        $query = DB::connection()->prepare('INSERT INTO Resepti (name, description) VALUES (:name, :description) RETURNING id');
        $query->execute(array('name' => $this->name, 'description' => $this->description));
        $row = $query->fetch();
        $this->id = $row['id'];
         
    }
    
    public function destroy(){
        $query = DB::connection()->prepare('DELETE FROM Resepti WHERE resepti_id = :id');
        $query->execute(array('id' => $this->id));

    }
    
    public function update($id){
        $query = DB::connection()->prepare('UPDATE Resepti SET name = :name, description = :description WHERE id = :id');
        $query->execute(array('name' => $this->name, 'description' => $this->description, 'id' => $id)); 
    }
    
}
