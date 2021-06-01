<?php

class BookingDAO {

    //Store PDO agent
    private static $db;
    //initialize the PDO
    static function initialize() {
        self::$db = new PDOService('Booking');
    }
    //create a booking
    static function createBooking(Booking $newBooking) : int {
        //Statement
        $sql = "INSERT INTO Booking (userID, serviceID, serviceName, servicePrice, bookingTime, 
        bookingDate, quantity, total) VALUES (:userID, :serviceID, :serviceName, :servicePrice, 
        :bookingTime, :bookingDate, :quantity, :total);"; 
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(':userID', $newBooking->getID());
        self::$db->bind(':serviceID', $newBooking->getServiceID());
        self::$db->bind(':serviceName', $newBooking->getServiceName());
        self::$db->bind(':servicePrice', $newBooking->getServicePrice());
        self::$db->bind(':bookingTime', $newBooking->getBookingTime());
        self::$db->bind(':bookingDate', $newBooking->getBookingDate());
        self::$db->bind(':quantity', $newBooking->getQuantity());
        self::$db->bind(':total', $newBooking->getTotal());
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->lastInsertId();
    }
    //Update booking
    static function updateBooking(Booking $bookingToUpdate) : int {
        //Statement
        $sql = "UPDATE Booking SET userID = :userID, serviceID = :serviceID, serviceName = :serviceName, 
        servicePrice = :servicePrice, bookingTime = :bookingTime, bookingDate = :bookingDate, 
        quantity = :quantity, total = :total;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(':userID', $bookingToUpdate->getID());
        self::$db->bind(':serviceID', $bookingToUpdate->getServiceID());
        self::$db->bind(':serviceName', $bookingToUpdate->getServiceName());
        self::$db->bind(':servicePrice', $bookingToUpdate->getServicePrice());
        self::$db->bind(':bookingTime', $bookingToUpdate->getBookingTime());
        self::$db->bind(':bookingDate', $bookingToUpdate->getBookingDate());
        self::$db->bind(':quantity', $bookingToUpdate->getQuantity());
        self::$db->bind(':total', $bookingToUpdate->getTotal());
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->rowCount();
    }
    //Delete booking
    static function deleteBooking(int $id) : int {
        //Statement
        $sql = "DELETE FROM Booking WHERE bookingID = :id;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(":id", $id);
        //Execute
        self::$db->execute();
        //Return result 
        return self::$db->rowCount();
    }
    //Get all 
    static function getAllBookings() {
        $sql = "SELECT * FROM Booking ORDER BY bookingID ASC;";
        //Query
        self::$db->query($sql);
        //no parameter, no bind
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->resultSet();
    }
    //Get Booking by ID
    static function getBookingByID(int $id) {
        //Statement
        $sql = "SELECT * FROM Booking WHERE bookingID = :id;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(":id", $id);
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->singleResult();
    }
}

?>