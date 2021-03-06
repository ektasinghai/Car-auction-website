CREATE TABLE `CARS` (
  `CARID` int(30) NOT NULL AUTO_INCREMENT,
  `CARNAME` varchar(40) NOT NULL,
  `CARDETAIL` varchar(160) NOT NULL,
  `NUMBEROFVOTES` int(30) NOT NULL,
  `CARSTATUS` varchar(50) NOT NULL,
  `DATEADDED` DATETIME NOT NULL,
  `IMAGEPATH` DATETIME NOT NULL,
  primary key(CARID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `COMMENTS` (
  `COMMENTID` int(30) NOT NULL AUTO_INCREMENT,
  `CARID` INT(30) NOT NULL,
 `COMMENT` varchar(160) NOT NULL,
  primary key(COMMENTID),
FOREIGN KEY (CARID) REFERENCES CARS(CARID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `USERS` (
  `USERID` int(30) NOT NULL AUTO_INCREMENT,
  `EMAIL` VARCHAR(40) NOT NULL,
  `USERNAME` VARCHAR(40) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `AUTHLEVEL` INT(1) NOT NULL,
  primary key(USERID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `VOTES` (
  `VOTEID` int(30) NOT NULL AUTO_INCREMENT,
  `USERID` INT(40) NOT NULL,
  `CARID` VARCHAR(40) NOT NULL,
  `AUTHLEVEL` INT(1) NOT NULL,
  primary key(VOTEID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

