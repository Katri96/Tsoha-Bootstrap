<?php

class Kayttaja extends BaseModel{
    
    public $id, $name, $password;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
         $this->validators = array('validate_username', 'validate_password');
    }
    
    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
        $query->execute(array(
            'id' => $id
        ));
        $row = $query->fetch();
        
        if ($row){
            $user = new Kayttaja(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'password' => $row['password']
            ));
        return $user;
        }
    }
    public static function all() {    
    
    $query = DB::connection()->prepare('SELECT * FROM Kayttaja');
    $query->execute();
    $rows = $query->fetchAll();
    $kayttajat = array();

    foreach($rows as $row){
      $kayttajat[] = new Kayttaja(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'password' => $row['password']
      ));

      
    }return $kayttajat;
        }
    
    public static function authenticate($name, $password) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE name = :name AND password = :password LIMIT 1');
        $query->execute(array(
            'name' => $name,
            'password' => $password
        ));
        $row = $query->fetch();
        
        if ($row) {
            $user = new Kayttaja(array(
            'id' => $row['id'],
            'name' => $row['name'],
            'password' => $row['password']
            ));
            return $user;
        } else {
            return null;
        }
    }
    
    public function save(){
        $query = DB::connection()->prepare("INSERT INTO Kayttaja (name, password) VALUES (:name, :password) RETURNING id");
        $query->execute(array('name' => $this->name, 'password' => $this->password));
        $row = $query->fetch();
        $this->id = $row['id'];     
    }
    
    
    
}