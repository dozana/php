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