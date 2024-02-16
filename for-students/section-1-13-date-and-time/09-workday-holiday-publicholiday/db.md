CREATE TABLE `public_holiday` (
  `FisYear` int(4) NOT NULL,
  `PublicHoliday` date NOT NULL,
  `Descripiton` varchar(100) NOT NULL,
  PRIMARY KEY  (`FisYear`,`PublicHoliday`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `public_holiday`
-- 

INSERT INTO `public_holiday` VALUES (2011, '2011-08-12', 'H.M. the Queen''s Birthday');
INSERT INTO `public_holiday` VALUES (2011, '2011-10-24', 'Chulalongkorn Day');