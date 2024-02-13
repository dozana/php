CREATE TABLE `customer` (
  `CustomerID` varchar(4) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `CountryCode` varchar(2) NOT NULL,
  `Budget` double NOT NULL,
  `Used` double NOT NULL,
  PRIMARY KEY  (`CustomerID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `customer` VALUES ('C001', 'Win Weerachai', 'win.weerachai@thaicreate.com', 'TH', 1000000, 600000);
INSERT INTO `customer` VALUES ('C002', 'John  Smith', 'john.smith@thaicreate.com', 'UK', 2000000, 800000);
INSERT INTO `customer` VALUES ('C003', 'Jame Born', 'jame.born@thaicreate.com', 'US', 3000000, 600000);
INSERT INTO `customer` VALUES ('C004', 'Chalee Angel', 'chalee.angel@thaicreate.com', 'US', 4000000, 100000);
INSERT INTO `customer` VALUES ('C005', 'Weerachai Nukitram', 'webmaster@thaicreate.com', 'TH', 6000000, 100000);



CREATE TABLE files (
    FilesID INT AUTO_INCREMENT PRIMARY KEY,
    FilesName VARCHAR(255) NOT NULL
);


CREATE TABLE `files` (
  `FilesID` int(4) NOT NULL auto_increment,
  `Name` varchar(100) NOT NULL,
  `FilesName` varchar(100) NOT NULL,
  PRIMARY KEY  (`FilesID`)
) ENGINE=MyISAM  AUTO_INCREMENT=1 ;


CREATE TABLE `files` (
  `FilesID` int(4) NOT NULL auto_increment,
  `Name` varchar(100) NOT NULL,
  `FilesName` blob NOT NULL,
  PRIMARY KEY  (`FilesID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



CREATE TABLE `files` (
  `FilesID` int(4) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `FilesName` longblob DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `files`
  ADD PRIMARY KEY (`FilesID`);

ALTER TABLE `files`
  MODIFY `FilesID` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;