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





CREATE TABLE `counter` (
  `DATE` DATE NOT NULL,
  `IP` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`DATE`, `IP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `daily` (
  `DATE` DATE NOT NULL,
  `NUM` INT NOT NULL,
  PRIMARY KEY (`DATE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `counter` (`DATE`, `IP`) VALUES
('2024-02-17', '192.168.1.1'),
('2024-02-17', '192.168.1.2'),
('2024-02-17', '192.168.1.3'),
('2024-02-16', '192.168.1.1'),
('2024-02-16', '192.168.1.4');


INSERT INTO `daily` (`DATE`, `NUM`) VALUES
('2024-02-17', 3),
('2024-02-16', 2);








-- Create the `member` table
CREATE TABLE `member` (
  `UserID` int(3) unsigned zerofill NOT NULL auto_increment,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` enum('ADMIN','USER') NOT NULL default 'USER',
  PRIMARY KEY  (`UserID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM  AUTO_INCREMENT=3 ;

-- Insert data into the `member` table
INSERT INTO `member` VALUES (1, 'tom', '222222', 'Tom Miller', 'USER');
INSERT INTO `member` VALUES (2, 'john', '111111', 'John Doe', 'ADMIN');
