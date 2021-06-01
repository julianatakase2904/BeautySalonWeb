<?php
//require files
require_once("Utility\Page.class.php");

Page::navBar();
Page::thankForRegister();
Page::footer();

//button to forward the user to the booking page
if(isset($_POST["action"])) {
    header("Location: login.php");
}

?>