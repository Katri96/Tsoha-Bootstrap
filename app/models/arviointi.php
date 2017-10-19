<?php

class Arviointi extends BaseModel {

    public $id, $resepti_id, $number;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('arvio');

    }
    
    public static function all() {    
    
    $query = DB::connection()->prepare('SELECT * FROM Arviointi');
    $query->execute();
    $rows = $query->fetchAll();
    $arvioinnit = array();

    foreach($rows as $row){
      $reseptit[] = new Resepti(array(
        'id' => $row['id'],
        'resepti_id' => $row['resepti_id'],
        'number' => $row['number']
      ));

      
    }return $arvioinnit;

  }
    public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Arviointi WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();  

    if($row){
      $arviointi = new Resepti(array(
        'id' => $row['id'],
        'resepti_id' => $row['resepti_id'],
        'number' => $row['number']
      ));

      return $arviointi;
    }

    return null;
  }
  // viikko 4 
  
    
    public function save(){
        $query = DB::connection()->prepare('INSERT INTO Arviointi (resepti_id, number) VALUES (:resepti_id, :number) RETURNING id');
        $query->execute(array('resepti_id' => $this->resepti_id, 'number' => $this->number));
        $row = $query->fetch();
        $this->id = $row['id'];
         
    }
    
    public function destroy(){
        $query = DB::connection()->prepare('DELETE FROM Arviointi WHERE id = :id');
        $query->execute(array('id' => $this->id));

    }
    
    public function update($id){
        $query = DB::connection()->prepare('UPDATE Arviointi SET resepti_id = :resepti_id, number = :number WHERE id = :id');
        $query->execute(array('resepti_id' => $this->resepti_id, 'number' => $this->number, 'id' => $id)); 
    }
    
}
