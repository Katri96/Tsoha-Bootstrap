<?php

class Kayttaja extends BaseModel{
    
    public $id, $name, $password;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
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
    
    
}