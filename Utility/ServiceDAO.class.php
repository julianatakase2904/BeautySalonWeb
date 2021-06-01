<?php

class ServiceDAO {

    //Store the PDO agent
    private static $db;

    //Initialize service
    static function initialize() {
        //Initialise the internal PDO Agent
        self::$db = new PDOService('Service');
    }
    //create a service
    static function cr(ServeateServiceice $newService): int {
        //Statement
        $sql = "INSERT INTO Service (serviceName, servicePrice, description) VALUES
        (:serviceName, :servicePrice, :description);";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(':serviceName', $newService->getServiceName());
        self::$db->bind(':servicePrice', $newService->getPrice());
        self::$db->bind(':description', $newService->getDescription());
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->lastInsertId();
    }
    //update a service
    static function updateService(Service $serviceToUpdate): int {
        //Statement
        $sql = "UPDATE Service SET serviceName = :serviceName, servicePrice = :servicePrice, 
        description = :description WHERE serviceID = serviceID;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(':serviceID', $serviceToUpdate->getServiceID());
        self::$db->bind(':serviceName', $serviceToUpdate->getServiceName());
        self::$db->bind(':servicePrice', $serviceToUpdate->getPrice());
        self::$db->bind(':description', $serviceToUpdate->getDescription());
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->rowCount();
    }
    //delete a service
    static function deleteService(int $serviceID): int {
        //Statement
        $sql = "DELETE FROM Service WHERE pizzaID = :id;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(":id", $serviceID);
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->rowCount();
    }
    //get all services
    static function getServices() {
        //Statement
        $sql = "SELECT * FROM Service ORDER BY serviceName ASC;";
        //Query
        self::$db->query($sql);
        //No bind, no parameter
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->resultSet();
    }
    //get service by id
    static function getServiceByID(int $serviceID) {
        //Statement
        $sql = "SELECT * FROM Service WHERE serviceID = :id;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(":id", $serviceID);
        //Execute
        self::$db->execute();
        //Return result 
        return self::$db->singleResult();
    }
}


?>