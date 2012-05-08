CREATE DATABASE `proyecto_fp2` /*!40100 DEFAULT CHARACTER SET latin1 */;

DROP TABLE IF EXISTS `proyecto_fp2`.`users`;
CREATE TABLE  `proyecto_fp2`.`users` (
  `nID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cNick` varchar(45) NOT NULL,
  `cPass` varchar(45) NOT NULL,
  `bPermission` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;