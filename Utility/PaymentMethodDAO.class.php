<?php

class PaymentMethodDAO {

    //Store PDO agent
    private static $db;
    //initialize the PDO
    static function initialize() {
        self::$db = new PDOService('PaymentMethod');
    }
    //create a booking
    static function createPaymentMethod(PaymentMethod $newPayment) : int {
        //Statement
        $sql = "INSERT INTO PaymentMethod (userID, tdcNumber, expirationDate, cardName) VALUES 
        (:userID, :tdcNumber, :expirationDate, :cardName);"; 
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(':userID', $newPayment->getID());
        self::$db->bind(':tdcNumber', $newPayment->getTdcNumber());
        self::$db->bind(':expirationDate', $newPayment->getExpirationDate());
        self::$db->bind(':cardName', $newPayment->getCardName());
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->lastInsertId();
    }
}

?>