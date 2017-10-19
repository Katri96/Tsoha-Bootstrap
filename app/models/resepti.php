<?php

class Resepti extends BaseModel {
    
    public $id, $aine_id, $name, $tyyppi, $hinta, $description, $added, $arviointi;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('vname', 'vdescription');

    }
    
    public static function all() {    
    
    $query = DB::connection()->prepare('SELECT Resepti. *, AVG(Arviointi.number) AS arviointi FROM Resepti LEFT JOIN Arviointi ON Resepti.id=Arviointi.resepti_id GROUP BY Resepti.id ORDER BY Resepti.name ASC');
    $query->execute();
    $rows = $query->fetchAll();
    $reseptit = array();

    foreach($rows as $row){
      $reseptit[] = new Resepti(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'description' => $row['description'],
        'arviointi' => number_format($row['arviointi'], 1)
      ));

      
    }return $reseptit;

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
        $query = DB::connection()->prepare('DELETE FROM Resepti WHERE id = :id');
        $query->execute(array('id' => $this->id));

    }
    
    public function update($id){
        $query = DB::connection()->prepare('UPDATE Resepti SET name = :name, description = :description WHERE id = :id');
        $query->execute(array('name' => $this->name, 'description' => $this->description, 'id' => $id)); 
    }
    
}
