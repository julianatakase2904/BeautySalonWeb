<?php
//require config 
require_once('inc\config.inc.php');
//require Entity
require_once('Entity\User.class.php');
//require files
require_once('Utility\RestClient.class.php');
require_once("Utility\Page.class.php");

//flag to check if user exists
$userExist = false;
//if the server request is post, get user
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["action"])) {
        $jUsers = RestClient::call("GET_USER");

        $users = array();
        //interact through users anc convert to obj
        foreach($jUsers as $jUser) {
            $user = new User();
            $user->setUsername($jUser->username);
            $users[] = $user;
        }
        foreach($users as $user) {
            //if the user exists already
            if($_POST["username"] == $user->getUsername()) {
                $userExist = true;
            }
        }
        $postData = array(
            "firstName" => $_POST["firstName"],
            "lastName" => $_POST["lastName"],
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "address" => $_POST["address"],
            "password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
        );
        
        //create user
        RestClient::call("POST_USER", $postData);
        //alert message if the user already exists
        if($postData == true && $userExist == true) {
            echo "<script type = 'text/javascript'>alert('Username already registered')</script>";
        } else if ($postData == true && $userExist == false) {
            header("Location: registerThanks.php");
        }
    }
}
Page::navBar();
Page::register();
Page::footer();
?>