CREATE TABLE `clientregister` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `salutation` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `oname` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `idnumber` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `estate` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `email` (`email`)
);

CREATE TABLE `provider_service` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `service_id` int DEFAULT NULL,
  `provider_id` int DEFAULT NULL,
  PRIMARY KEY (`tid`),
  KEY `service_id` (`service_id`),
  KEY `provider_id` (`provider_id`),
  CONSTRAINT `provider_service_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`tid`),
  CONSTRAINT `provider_service_ibfk_2` FOREIGN KEY (`provider_id`) REFERENCES `servicep` (`tid`)
);

CREATE TABLE `request` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `massage` varchar(50) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_requested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `paid` varchar(100) DEFAULT 'PENDING',
  `mpesa_confirmation` varchar(100) DEFAULT '',
  `comment` varchar(512) DEFAULT '',
  PRIMARY KEY (`tid`),
  KEY `customer` (`customer`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `request_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `clientregister` (`tid`),
  CONSTRAINT `request_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`tid`)
);

CREATE TABLE `request_servicep` (
  `rsid` int NOT NULL AUTO_INCREMENT,
  `servicep_id` int DEFAULT NULL,
  `request_id` int DEFAULT NULL,
  `completed` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rsid`),
  KEY `servicep_id` (`servicep_id`),
  KEY `request_id` (`request_id`),
  CONSTRAINT `request_servicep_ibfk_1` FOREIGN KEY (`servicep_id`) REFERENCES `servicep` (`tid`),
  CONSTRAINT `request_servicep_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `request` (`tid`)
);

CREATE TABLE `service` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` float(10,2) DEFAULT '0.00',
  PRIMARY KEY (`tid`)
);

CREATE TABLE `servicep` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `oname` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `idnumber` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `town` varchar(50) DEFAULT NULL,
  `estate` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `education` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `prof` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`tid`)
);

CREATE TABLE `users` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`tid`)
);

INSERT INTO `users` VALUES (1,'Kelvin Gauki','kelvingauki@gmail.com','kelvingauki');