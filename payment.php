<?php
//require config
require_once('inc\config.inc.php');
//require Entities
require_once('Entity\User.class.php');
require_once('Entity\Booking.class.php');
require_once("Utility\Page.class.php");
//require utilities
require_once('Utility\LoginManager.class.php');
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
$bookings = array();
//get all bookings via RestClient
$jBookings = RestClient::call("GET_BOOKING");
foreach($jBookings as $jBooking) {
    //get the bookings for the logged user
    if($jBooking->userID == $user->getID()) {
        $booking = new Booking();
        $booking->setBookingID($jBooking->bookingID);
        $booking->setID($jBooking->userID);
        $booking->setServiceID($jBooking->serviceID);
        $booking->setServiceName($jBooking->serviceName);
        $booking->setServicePrice($jBooking->servicePrice);
        $booking->setBookingTime($jBooking->bookingTime);
        $booking->setBookingDate($jBooking->bookingDate);
        $booking->setQuantity($jBooking->quantity);
        $booking->setTotal($jBooking->total);
        $bookings[] = $booking;
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["action"])) {
        //assemble payment
        $paymentData = array(
            "userID"=>$user->getID(),
            "tdcNumber"=>$_POST['tdcNumber'],
            "expirationDate"=>$_POST['expirationDate'],
            "cardName"=>$_POST['cardName']
        );
        
        //create a booking
        RestClient::call("POST_PAYMENT", $paymentData);
        if($paymentData == true) {
            header("Location: paymentThanks.php");
        } else {
            echo "<script type = 'text/javascript'>alert('Please process payment')</script>";
        }
    }
}

Page::navBar();
Page::paymentForm($user, $bookings);
Page::footer();
?>