<?php
//require config
require_once('inc\config.inc.php');
//require Entities
require_once('Entity\User.class.php');
require_once("Utility\Page.class.php");
//require utilities
require_once('Utility\UserDAO.class.php');
require_once('Utility\PDOService.class.php');
require_once('Utility\RestClient.class.php');

//initialize UserDAO
UserDAO::initialize();
//start session
session_start();
//get the user from DB
$user = UserDAO::getUserByUsername($_SESSION['loggedin']);
//array to store bookings

Page::navBar();
Page::thankForPayment($user);
Page::footer();

//button to forward the user to the booking page
if(isset($_POST["action"])) {
    header("Location: home.php");
}

?>