LOAD XML LOCAL INFILE "C:\\xampp\\htdocs\\last_race.json"
INTO TABLE carrera
rows identified by '<Driver>';
LOAD XML LOCAL INFILE "C:\\xampp\\htdocs\\last_race.xml.cache"
INTO TABLE vuelta
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
select c.round,c.number,c.points,c.code,v.Time,v.rank from carrera c,vuelta v where c.number=v.number;
create table votacion_anual_constructores(
  username varchar(100) primary key,
  mercedes decimal(5,2) not null,
  red_bull decimal(5,2) not null,
  ferrari decimal(5,2) not null,
  mclaren decimal(5,2) not null,
  alpa_tauri decimal(5,2) not null,
  alpine decimal(5,2) not null,
  aston_martin decimal(5,2) not null,
  alpha_romeo decimal(5,2) not null,
  williams decimal(5,2) not null,
  hass decimal(5,2) not null
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
create table votacion_anual_pilotos(
  username varchar(100) primary key,
  hamilton decimal(5,2) not null,
  russell decimal(5,2) not null,
  verstappen decimal(5,2) not null,
  perez decimal(5,2) not null,
  sainz decimal(5,2) not null,
  leclerc decimal(5,2) not null,
  norris decimal(5,2) not null,
  ricciardo decimal(5,2) not null,
  ocon decimal(5,2) not null,
  alonso decimal(5,2) not null,
  gasly decimal(5,2) not null,
  tsunoda decimal(5,2) not null,
  vettel decimal(5,2) not null,
  stroll decimal(5,2) not null,
  zhou decimal(5,2) not null,
  bottas decimal(5,2) not null,
  albon decimal(5,2) not null,
  latifi decimal(5,2) not null,
  schumacher decimal(5,2) not null,
  mazepin decimal(5,2) not null
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;