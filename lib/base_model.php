<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
      }

      return $errors;
    }
    
    public function validate_name() {
        $errors = array();
        
        if($this->nimi == '' || $this->nimi == null){
            $errors[] = 'Name cannot be empty.';
        }
        if(strlen($this->nimi) < 3){
            $errors[] = 'Name must be at least 3 characters.';
        }
        if(strlen($this->nimi) > 60){
            $errors[] = 'Name must not be over 60 characters.';
        }
        return $errors;
    }
    
    public function validate_description() {
        $errors = array();
        
        if($this->kuvaus == '' || $this->kuvaus == null){
            $errors[] = 'Introduction cannot be empty.';
        }
        if(strlen($this->kuvaus) > 300){
            $errors[] = 'Introduction must not be over 300 characters.';
        }
        return $errors;
    }
    

  }
