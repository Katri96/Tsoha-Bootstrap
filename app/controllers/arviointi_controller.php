<?php
class arviointicontroller extends BaseController {
    
    //Tallentaa käyttäjän arvosanan kirjalle
    public static function store($id) {
        self::check_logged_in();
        
        $params = $_POST;
        $resepti = $id;
        $number = $params['number'];
        
        $arvio = new Arviointi(array(
        'resepti_id' => $resepti,
        'number' => $number
        ));
        
            $arvio->save();
            Redirect::to('/reseptilista', array('message' => 'Arviointisi on lisätty!'));
 
        }
    
    
}