<?php

class UserDAO {

    //Store the PDO agent
    private static $db;

    static function initialize() {
        //Initialise the internal PDO Agent
        self::$db = new PDOService('User');
    }
    //create a user
    static function createUser(User $newUser) : int {
        //Statement
        $sql = "INSERT INTO User (firstName, lastName, username, email, address, password) VALUES
        (:firstName, :lastName, :username, :email, :address, :password);";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(':firstName', $newUser->getFirstName());
        self::$db->bind(':lastName', $newUser->getLastName());
        self::$db->bind(':username', $newUser->getUsername());
        self::$db->bind(':email', $newUser->getEmail());
        self::$db->bind(':address', $newUser->getAddress());
        self::$db->bind(':password', $newUser->getPassword());
        //Execute
        self::$db->execute();
        //Return result 
        return self::$db->lastInsertId();
    }
    //Update a user
    static function updateUser(User $userToUpdate) : int {
        //Statement
        $sql = "UPDATE User set firstName = :firstName, lastName = :lastName, username = :username,
        email = :email, address = :address WHERE userID = :id;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(":id", $userToUpdate->getID());
        self::$db->bind(":firstName", $userToUpdate->getFirstName());
        self::$db->bind(":lastName", $userToUpdate->getLastName());
        self::$db->bind(":username", $userToUpdate->getUsername());
        self::$db->bind(":email", $userToUpdate->getEmail());
        self::$db->bind(":address", $userToUpdate->getAddress());
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->lastInsertId();
    }
    //Delete a user
    static function deleteUser(int $userID) : int {
        //Statement
        $sql = "DELETE FROM User WHERE UserID = :id;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(":id", $userID);
        //Execute the query
        self::$db->execute();
        //Return result
        return self::$db->rowCount();
    }
    //get the user
    static function getUserByUsername(String $username) {
        //Statement
        $sql = "SELECT * FROM User WHERE username = :username;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(':username', $username);
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->singleResult();
    }
    //get the user by ID
    static function getUserByID(int $userID) : User {
        //Statement 
        $sql = "SELECT * FROM User WHERE id = :userID ;";
        //Query
        self::$db->query($sql);
        //Bind
        self::$db->bind(':userID', $userID);
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->singleResult();
    }
    //get all users
    static function getUsers() {
        //Statement
        $sql = "SELECT * FROM User;";
        //Query
        self::$db->query($sql);
        //No Bind, because there is no parameter
        //Execute
        self::$db->execute();
        //Return result
        return self::$db->resultSet();
    }
}



?>