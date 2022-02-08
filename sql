LOAD XML LOCAL INFILE "C:\\xampp\\htdocs\\Proyecto\\last_race.xml.cache"
INTO TABLE driver
rows identified by '<Driver>';
LOAD XML LOCAL INFILE "C:\\xampp\\htdocs\\Proyecto\\last_race.xml.cache"
INTO TABLE lap
rows identified by '<FastestLap>';
CREATE TABLE `driver` (
       `season` char(4) DEFAULT NULL,
       `round` char(2) DEFAULT NULL,
       `number` int(11) NOT NULL,
       `points` char(2) DEFAULT NULL,
       `driverId` varchar(100) DEFAULT NULL,
       `code` char(3) DEFAULT NULL,
       `PermanentNumber` char(2) DEFAULT NULL,
       `GivenName` varchar(50) DEFAULT NULL,
       `FamilyName` varchar(50) DEFAULT NULL,
       
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;
