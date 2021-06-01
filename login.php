<?php
//require config 
require_once('inc\config.inc.php');
//require Entity
require_once('Entity\User.class.php');
//require files
require_once('Utility\RestClient.class.php');
require_once('Utility\PDOService.class.php');
require_once('Utility\UserDAO.class.php');
require_once("Utility\Page.class.php");

//if the for was posted
if(!empty($_POST)) {
    //initialize user DAO
    UserDAO::initialize();
    //Get username and password
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        //return user object 
        $userAuth = UserDAO::getUserByUsername($_POST['username']);
        //if the user is a instance of User
        if($userAuth instanceof User) {
            //check the password
            if($userAuth->verifyPass($_POST['password'])) {
                //start session
                session_start();
                $_SESSION['loggedin'] = $userAuth->getUsername();

                //if the user is admin, forward to page to CRUD services
                if($_SESSION['loggedin'] == 'admin') {
                    header("Location: serviceAdmin.php");
                } else {
                    header("Location: booking.php");
                }
            } else {
                $_SESSION['loggedin'] = false;
            }

        }
    } 
}
//set navbar
Page::navBar();
//display login form
Page::login();
//display footer
Page::footer();
?>