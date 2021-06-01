DROP DATABASE IF EXISTS beautyathome;
CREATE DATABASE beautyathome;
USE beautyathome;

CREATE TABLE User (
    userID int AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(50) DEFAULT NULL,
    lastName varchar(50) DEFAULT NULL,
    username varchar(50) DEFAULT NULL,
    email varchar(50) DEFAULT NULL,
    address varchar(50) DEFAULT NULL,
    password varchar(250) DEFAULT NULL
)ENGINE=InnoDB;

CREATE TABLE Service (
    serviceID int AUTO_INCREMENT PRIMARY KEY,
    serviceName char(50) NOT NULL,
    servicePrice float(5,2) NOT NULL,
    description char(255) NOT NULL  
)ENGINE=InnoDB;

CREATE TABLE Booking (
    bookingID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT NOT NULL,
    serviceID INT NOT NULL, 
    serviceName varchar(50) NOT NULL,
    servicePrice float(5,2) NOT NULL,
    bookingTime varchar(50) NOT NULL,
    bookingDate varchar(50) NOT NULL,
    quantity INT NOT NULL,
    total float(5,2) NOT NULL,
    FOREIGN KEY (serviceID) REFERENCES Service(serviceID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (userID) REFERENCES User(userID) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE PaymentMethod(
  paymentMethodId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tdcNumber VARCHAR(30) NOT NULL,
  expirationDate VARCHAR(10) NOT NULL,
  cardName VARCHAR(50) NOT NULL,
  userID int NOT NULL,
  FOREIGN KEY (userID) REFERENCES  User(userID) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;