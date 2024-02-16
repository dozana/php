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