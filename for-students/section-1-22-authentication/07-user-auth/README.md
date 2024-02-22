project/
│
├── config/
│   └── database.php          
│
├── includes/                 
│   ├── header.php            
│   └── footer.php            
│
├── pages/                    
│   ├── index.php             
│   ├── login.php             
│   ├── register.php          
│   └── dashboard.php         
│
├── assets/                   
│   ├── css/
│   ├── js/
│   └── img/
│
├── functions/                
│   ├── connect.php           
│   └── helpers.php          
│
├── .htaccess                 
└── README.md







CREATE TABLE `member2` (
`UserID` int(3) NOT NULL auto_increment,
`Username` varchar(20) NOT NULL,
`Password` varchar(20) NOT NULL,
`Name` varchar(100) NOT NULL,
`Email` varchar(150) NOT NULL,
`Status` enum('ADMIN','USER') NOT NULL default 'USER',
`SID` varchar(32) NOT NULL,
`Active` enum('Yes','No') NOT NULL default 'No',
PRIMARY KEY (`UserID`),
UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `member2`
-- 

INSERT INTO `member2` VALUES (1, 'user', '111111', 'John Doe', 'john@gmail.com', 'USER', 'fb8d397fe980c10c84f0c77e1749c3f0', 'No');
