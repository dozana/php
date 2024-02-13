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


