-- Table structure for table `countries`
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table `countries`
INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'USA'),
(2, 'UK'),
(3, 'Canada');

-- Table structure for table `cities`
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table `cities`
INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
(1, 'New York', 1),
(2, 'Los Angeles', 1),
(3, 'London', 2),
(4, 'Manchester', 2),
(5, 'Toronto', 3),
(6, 'Montreal', 3);





CREATE TABLE states (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    country_id INT NOT NULL,
    FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO states (name, country_id) VALUES
('New York', 1),
('California', 1),
('Texas', 1),
('Florida', 1),
('London', 2),
('Manchester', 2),
('Birmingham', 2),
('Toronto', 3),
('Ontario', 3),
('Quebec', 3);