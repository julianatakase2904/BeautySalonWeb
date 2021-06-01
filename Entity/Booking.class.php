<?php

class Booking {

    //Attributes
    private $bookingID;
    private $userID;
    private $serviceID;
    private $serviceName;
    private $servicePrice;
    private $bookingTime;
    private $bookingDate;
    private $quantity;
    private $total;

    //getters
    public function getBookingID(): int {
        return $this->bookingID;
    }
    public function getID(): int {
        return $this->userID;
    }
    public function getServiceID(): int {
        return $this->serviceID;
    }
    public function getServiceName(): String {
        return $this->serviceName;
    }
    public function getServicePrice(): float {
        return $this->servicePrice;
    }
    public function getBookingTime(): String {
        return $this->bookingTime;
    }
    public function getBookingDate(): String {
        return $this->bookingDate;
    }
    public function getQuantity(): int {
        return $this->quantity;
    }
    public function getTotal(): float {
        return $this->total;
    }

    //setters
    public function setBookingID(int $bookingID) {
        $this->bookingID = $bookingID;
    }
    public function setID(int $userID) {
        $this->userID = $userID;
    }
    public function setServiceID(int $serviceID) {
        $this->serviceID = $serviceID;
    }
    public function setServiceName(String $serviceName) {
        $this->serviceName = $serviceName;
    }
    public function setServicePrice(float $servicePrice) {
        $this->servicePrice = $servicePrice;
    }
    public function setBookingTime(String $bookingTime) {
        $this->bookingTime = $bookingTime;
    }
    public function setBookingDate(String $bookingDate) {
        $this->bookingDate = $bookingDate;
    }
    public function setQuantity(int $quantity) {
        $this->quantity = $quantity;
    }
    public function setTotal(float $total) {
        $this->total = $total;
    }
    //serialize obj to json
    public function jsonSerialize() {
        $obj = new stdClass;
        $obj->bookingID = $this->bookingID;
        $obj->userID = $this->userID;
        $obj->serviceID = $this->serviceID;
        $obj->serviceName = $this->serviceName;
        $obj->servicePrice = $this->servicePrice;
        $obj->bookingTime = $this->bookingTime;
        $obj->bookingDate = $this->bookingDate;
        $obj->quantity = $this->quantity;
        $obj->total = $this->total;

        return $obj;
    }

}

?>