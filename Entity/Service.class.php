<?php

class Service {

    //Attributes
    private $serviceID;
    private $serviceName;
    private $servicePrice;
    private $description;

    //getters
    public function getServiceID(): int {
        return $this->serviceID;
    }
    public function getServiceName(): String {
        return $this->serviceName;
    }
    public function getServicePrice(): float {
        return $this->servicePrice;
    }
    public function getDescription(): String {
        return $this->description;
    }

    //setters
    public function setServiceID(int $serviceID) {
        $this->serviceID = $serviceID;
    }
    public function setServiceName(String $serviceName) {
        $this->serviceName = $serviceName;
    }
    public function setServicePrice(float $servicePrice) {
        $this->servicePrice = $servicePrice;
    }
    public function setDescription(String $description) {
        $this->description = $description;
    }

    //serialize obj to json
    public function jsonSerialize() {
        $obj = new stdClass;
        $obj->serviceID = $this->serviceID;
        $obj->serviceName = $this->serviceName;
        $obj->servicePrice = $this->servicePrice;
        $obj->description = $this->description;
        return $obj;
    }

}

?>