<?php

//Require configuration
require_once('inc\config.inc.php');

//Require Entities
require_once('Entity\Service.class.php');
require_once('Entity\User.class.php');
require_once('Entity\Booking.class.php');
require_once('Entity\PaymentMethod.class.php');

//Require Utilities
require_once('Utility\PDOService.class.php');
require_once('Utility\ServiceDAO.class.php');
require_once('Utility\UserDAO.class.php');
require_once('Utility\BookingDAO.class.php');
require_once('Utility\PaymentMethodDAO.class.php');

//Instanciate DAOs
ServiceDAO::initialize();
UserDAO::initialize();
BookingDAO::initialize();
PaymentMethodDAO::initialize();

//Request data
$requestData = json_decode(file_get_contents('php://input'));

//Based on request, do
switch($_SERVER["REQUEST_METHOD"]) {
//FOR --> SERVICES
    case "POST_SERVICE":
        //New Service
        $newService = new Service();
        $newService->setServiceName($requestData->serviceName);
        $newService->setServicePrice($requestData->servicePrice);
        $newService->setDescription($requestData->description);

        $result = ServiceDAO::createService($newService);
        //Return result
        echo json_encode($result);
    break;
    case "GET_SERVICE":
        if(isset($requestData->serviceID)) {
            //return Service object
            $serviceObj = ServiceDAO::getServiceByID($requestData->serviceID);
            //set header
            header('Content-Type: application/json');
            //Return result
            echo json_encode($serviceObj->jsonSerialize());
        } else {
            //return all the services
            $services = ServiceDAO::getServices();
            //initialize array os serialized services
            $serializedServices = array();
            //add services into array
            foreach($services as $service) {
                $serializedServices[] = $service->jsonSerialize();
            } 
            //set header
            header('Content-Type: application/json');
            //Return result
            echo json_encode($serializedServices);
        }
    break;
    case "PUT_SERVICE":
        //to update, build new Service object
        $serviceToUpdate = new Service();
        $serviceToUpdate->setServiceID($requestData->serviceID);
        $serviceToUpdate->setServiceName($requestData->serviceName);
        $serviceToUpdate->setServicePrice($requestData->servicePrice);
        $serviceToUpdate->setDescription($requestData->description);

        $result = ServiceDAO::updateService($serviceToUpdate);
        //set header
        header('Content-Type: application/json');
        //Return result
        echo json_encode($result);
    break;
    case "DELETE_SERVICE":
        //use the id on ServiceDAO to delete and return result
        $result = PizzaDAO::deleteService($requestData->serviceID);
        //set header
        header('Content-Type: application/json');
        //Return result
        echo json_encode($result);
    break;

//FOR --> USER
    case "POST_USER":
        //Insert new user
        $newUser = new User();
        $newUser->setFirstName($requestData->firstName);
        $newUser->setLastName($requestData->lastName);
        $newUser->setUsername($requestData->username);
        $newUser->setEmail($requestData->email);
        $newUser->setAddress($requestData->address);
        $newUser->setPassword($requestData->password);

        $result = UserDAO::createUser($newUser);
        //Return result
        echo json_encode($result);
    break;
    case "GET_USER":
        //if requested return id else return all 
        if(isset($requestData->userID)) {
            //return user obj
            $userObj = UserDAO::getUserByUsername((string)$requestData->username);
            //set header
            header('Content-Type: application/json');
            //Return result
            echo json_encode($userObj->jsonSerialize());
        } else {
            $usersObj = UserDAO::getUsers();
            //array to return all users
            $serializedUsers = array();
            //add users into array
            foreach($usersObj as $user) {
                $serializedUsers[] = $user->jsonSerialize();
            }
            //set header
            header('Content-Type: application/json');
            //Return result
            echo json_encode($serializedUsers);
        }
    break;
    case "PUT_USER":
        //update a user
        $userToUpdate = new User();
        $userToUpdate->setID($requestData->userID);
        $userToUpdate->setFirstName($requestData->firstName);
        $userToUpdate->setLastName($requestData->lastName);
        $userToUpdate->setUsername($requestData->username);
        $userToUpdate->setEmail($requestData->email);
        $userToUpdate->setAddress($requestData->address);
        
        $result = UserDAO::updateUser($userToUpdate);
        //set header
        header('Content-Type: application/json');
        //Return result
        echo json_encode($result);
    break;
    case "DELETE_USER":
        //delete the user by id
        $result = UserDAO::deleteUser($requestData->userID);
        //set header
        header('Content-Type: application/json');
        //return result
        echo json_encode($result);
    break;

//FOR --> BOOKING
    case "POST_BOOKING":
        $newBooking = new Booking();
        $newBooking->setID($requestData->userID);
        $newBooking->setServiceID($requestData->serviceID);
        $newBooking->setServiceName($requestData->serviceName);
        $newBooking->setServicePrice($requestData->servicePrice);
        $newBooking->setBookingTime($requestData->bookingTime);
        $newBooking->setBookingDate($requestData->bookingDate);
        $newBooking->setQuantity($requestData->quantity);
        $newBooking->setTotal($requestData->total);

        $result = BookingDAO::createBooking($newBooking);
        //Return result
        echo json_encode($result);

    break;
    case "GET_BOOKING":
        //if requested return id else return all 
        if(isset($requestData->bookingID)) {
            //return user obj
            $bookingObj = BookingDAO::getBookingByID($requestData->bookingID);
            //set header
            header('Content-Type: application/json');
            //Return result
            echo json_encode($bookingObj->jsonSerialize());
        } else {
            $bookingObj = BookingDAO::getAllBookings();
            //array to return all users
            $serializedBooking = array();
            //add users into array
            foreach($bookingObj as $booking) {
                $serializedBooking[] = $booking->jsonSerialize();
            }
            //set header
            header('Content-Type: application/json');
            //Return result
            echo json_encode($serializedBooking);
        }

    break;
    case "PUT_BOOKING":
        //to update, build new Booking object
        $bookingToUpdate = new Booking();
        $bookingToUpdate->setBookingID($requestData->bookingID);
        $bookingToUpdate->setID($requestData->userID);
        $bookingToUpdate->setServiceID($requestData->serviceID);
        $bookingToUpdate->setServiceName($requestData->serviceName);
        $bookingToUpdate->setServicePrice($requestData->servicePrice);
        $bookingToUpdate->setBookingTime($requestData->bookingTime);
        $bookingToUpdate->setBookingDate($requestData->bookingDate);
        $bookingToUpdate->setQuantity($requestData->quantity);
        $bookingToUpdate->setTotal($requestData->total);

        $result = BookingDAO::updateBooking($bookingToUpdate);
        //set header
        header('Content-Type: application/json');
        //Return result
        echo json_encode($result);

    break;
    case "DELETE_BOOKING":
        //delete the booking by id
        $result = BookingDAO::deleteBooking($requestData->id);
        //set header
        header('Content-Type: application/json');
        //return result
        echo json_encode($result);
    break;

//FOR --> PAYMENT METHOD
    case "POST_PAYMENT":
        $newPayment = new PaymentMethod();
        $newPayment->setID($requestData->userID);
        $newPayment->setTdcNumber($requestData->tdcNumber);
        $newPayment->setExpirationDate($requestData->expirationDate);
        $newPayment->setCardName($requestData->cardName);

        $result = PaymentMethodDAO::createPaymentMethod($newPayment);
        //Return result
        echo json_encode($result);
    break;

    break;
    case "GET_PAYMENT":

    break;
    case "PUT_PAYMENT":

    break;
    case "DELETE_PAYMENT":

    break;
    
    default:
        echo json_encode(array("message"=> "No HTTP request provided"));
    break;



}




?>