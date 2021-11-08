CREATE TABLE `cb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `description` longtext,
  `level` int(11) NOT NULL DEFAULT '2',
  `active` int(11) DEFAULT '1',
  `lastloginDT` varchar(45) DEFAULT NULL,
  `lastloginIP` varchar(45) DEFAULT NULL,
  `createdDT` varchar(45) DEFAULT NULL,
  `createdIP` varchar(45) DEFAULT NULL,
  `theme` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `cb_users` (`username`, `password`, `nickname`, `level`, `active`, `theme`) VALUES 
("test", "test", "test", 5, 1, "default");
