<?php

class PaymentMethod {

    //attributes
    private $paymentMethodId;
    private $tdcNumber;
    private $expirationDate;
    private $cardName;
    private $userID;

    //Getters
    public function getPaymentMethodId(): int {
        return $this->paymentMethodId;
    }
    public function getTdcNumber(): String {
        return $this->tdcNumber;
    }
    public function getExpirationDate(): String {
        return $this->expirationDate;
    }
    public function getCardName(): String {
        return $this->cardName;
    }
    public function getID(): int {
        return $this->userID;
    }
    //Setters
    public function setPaymentMethodId(int $paymentMethodId){
        $this->paymentMethodId = $paymentMethodId;
    }
    public function setTdcNumber(String $tdcNumber) {
        $this->tdcNumber = $tdcNumber;
    }
    public function setExpirationDate(String $expirationDate) {
        $this->expirationDate = $expirationDate;
    }
    public function setCardName(String $cardName) {
        $this->cardName = $cardName;
    }
    public function setID(int $userID) {
        $this->userID = $userID;
    }
  
    


}