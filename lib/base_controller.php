<?php

  class BaseController{

    public static function get_user_logged_in(){
        if(isset($_SESSION['user'])) {
            $userid = $_SESSION['user'];
          
            $user = Kayttaja::find($userid);
                return $user;
        }
        return null;
    }

    public static function check_logged_in(){
        if(!isset($_SESSION['user'])) {
            Redirect::to('/', array('message' => 'Kirjaudu ensin sisään!'));
            
        }
        
    }

  }
