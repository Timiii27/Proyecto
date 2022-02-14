LOAD XML LOCAL INFILE "C:\\xampp\\htdocs\\last_race.xml.cache"
INTO TABLE carrera
rows identified by '<Driver>';
LOAD XML LOCAL INFILE "C:\\xampp\\htdocs\\Proyecto\\last_race.xml.cache"
INTO TABLE lap
rows identified by '<FastestLap>';
CREATE TABLE `carrera` (
       `round` char(2) DEFAULT NULL,
       `number` int(11) NOT NULL,
       `points` char(2) DEFAULT NULL,
       `driverId` varchar(100) DEFAULT NULL,
       `code` char(3) DEFAULT NULL
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
CREATE TABLE `votaciones` (
  `usuario` varchar(100) NOT NULL ,
  `pos1` char(3) NOT NULL,
  `pos2` char(3) NOT NULL,
  `pos3` char(3) NOT NULL,
  `pos4` char(3) NOT NULL,
  `pos5` char(3) NOT NULL,
  `pos6` char(3) NOT NULL,
  `pos7` char(3) NOT NULL,
  `pos8` char(3) NOT NULL,
  `pos9` char(3) NOT NULL,
  `pos10` char(3) NOT NULL,
  `vr` char(3) NOT NULL,
  `dnf` char(3) NOT NULL

 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
