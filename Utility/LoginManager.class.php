<?php

class LoginManager {
    //this function verifies if the user is logged in
    static function verifyLogin() {
        //if session exists
        if(!empty($_SESSION)) {
            //return true if the user is logged in
            if($_SESSION['loggedin']) {
                return true;
            } else {
                //the user is not loged, so destrue session
                session_destroy();
                //send the user to login page
                header("Location: login.php");
            }
        } else {
            //so session not exists
            session_destroy();
            header("Location: login.php");
        }
        
    }

}

?>