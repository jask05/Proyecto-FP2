-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-05-2012 a las 00:07:24
-- Versión del servidor: 5.5.22
-- Versión de PHP: 5.3.10-1ubuntu3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto_fp2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--
-- Creación: 13-05-2012 a las 15:46:23
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `nID` smallint(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`nID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cityuser`
--
-- Creación: 13-05-2012 a las 15:49:22
--

DROP TABLE IF EXISTS `cityuser`;
CREATE TABLE IF NOT EXISTS `cityuser` (
  `nID` smallint(11) NOT NULL AUTO_INCREMENT,
  `nCityID` smallint(11) NOT NULL,
  `nUserID` smallint(11) NOT NULL,
  PRIMARY KEY (`nID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--
-- Creación: 13-05-2012 a las 15:48:21
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `nID` smallint(11) unsigned NOT NULL AUTO_INCREMENT,
  `cNick` varchar(45) CHARACTER SET utf8 NOT NULL,
  `cPass` varchar(45) CHARACTER SET utf8 NOT NULL,
  `bPermission` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`nID`, `cNick`, `cPass`, `bPermission`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
