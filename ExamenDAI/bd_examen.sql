-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2016 a las 07:25:10
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_examen`
--
CREATE DATABASE IF NOT EXISTS `bd_examen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_examen`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejecutivo`
--

DROP TABLE IF EXISTS `ejecutivo`;
CREATE TABLE IF NOT EXISTS `ejecutivo` (
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidoPaterno` varchar(15) NOT NULL,
  `apellidoMaterno` varchar(15) NOT NULL,
  `contraseña` varchar(10) NOT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

DROP TABLE IF EXISTS `postulante`;
CREATE TABLE IF NOT EXISTS `postulante` (
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidoPaterno` varchar(15) NOT NULL,
  `apellidoMaterno` varchar(15) NOT NULL,
  `contraseña` varchar(10) NOT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`rut`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `contraseña`) VALUES
('17706258-8', 'Sebastián', 'Pavez', 'Morales', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE IF NOT EXISTS `solicitud` (
  `idSolicitud` int(11) NOT NULL AUTO_INCREMENT,
  `rutPostulante` varchar(10) NOT NULL,
  `nombre_postulante` varchar(20) NOT NULL,
  `a_paterno` varchar(20) NOT NULL,
  `a_materno` varchar(20) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `comuna` varchar(15) NOT NULL,
  `educacion` varchar(30) NOT NULL,
  `experiencia` varchar(30) NOT NULL,
  `modalidad` varchar(15) NOT NULL,
  `curso` varchar(15) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `Estado` varchar(10) NOT NULL,
  PRIMARY KEY (`idSolicitud`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `rutPostulante`, `nombre_postulante`, `a_paterno`, `a_materno`, `fechaNacimiento`, `sexo`, `telefono`, `email`, `direccion`, `comuna`, `educacion`, `experiencia`, `modalidad`, `curso`, `fechaIngreso`, `Estado`) VALUES
(1, '17706258-8', 'Sebastián', 'Pavez', 'Morales', '0000-00-00', 'M', 9, 'seb.pavez@gmail.com', 'marta brunet #7121', 'Pudahuel', 'Superior', '1', 'Diurno', 'c-sharp', '2016-07-13', 'pendiente'),
(2, '17706258-8', 'Sebastián', 'Pavez', 'Morales', '1990-11-16', 'M', 56669308, 'seb.pavez@gmail.com', 'marta brunet #7121', 'Pudahuel', 'Superior', '8', 'Vespertino', 'java', '2016-07-13', 'pendiente');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
