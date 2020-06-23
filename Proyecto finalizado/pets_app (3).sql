-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2020 a las 19:03:02
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pets_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

CREATE TABLE IF NOT EXISTS `tbl_administrador` (
  `identificacion_administrador` varchar(12) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario_administrador` varchar(30) NOT NULL,
  `clave_administrador` varchar(25) NOT NULL,
  `token` varchar(70) NOT NULL,
  PRIMARY KEY (`identificacion_administrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historia_clinica`
--

CREATE TABLE IF NOT EXISTS `tbl_historia_clinica` (
  `codigo_de_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_mascota` varchar(50) NOT NULL,
  `fecha_consulta` date NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `raza` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `diagnostico_mascota` varchar(255) NOT NULL,
  `motivo_consulta` varchar(255) NOT NULL,
  `id_propietario` varchar(15) NOT NULL,
  `codigo_mascota` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_de_mascota`),
  KEY `codigo_mascota` (`codigo_mascota`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historia_clinica_veterinario`
--

CREATE TABLE IF NOT EXISTS `tbl_historia_clinica_veterinario` (
  `codigo_de_mascota` int(11) DEFAULT NULL,
  `identificacion_veterinario` varchar(12) DEFAULT NULL,
  KEY `codigo_de_mascota` (`codigo_de_mascota`),
  KEY `identificacion_veterinario` (`identificacion_veterinario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario`
--

CREATE TABLE IF NOT EXISTS `tbl_horario` (
  `codigo_hora` int(11) NOT NULL AUTO_INCREMENT,
  `hora_1` time NOT NULL,
  `identificacion_veterinario` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`codigo_hora`),
  KEY `identificacion_veterinario` (`identificacion_veterinario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mascota`
--

CREATE TABLE IF NOT EXISTS `tbl_mascota` (
  `codigo_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_mascota` varchar(30) NOT NULL,
  `raza_mascota` varchar(20) NOT NULL,
  `color_mascota` varchar(30) NOT NULL,
  `tamano_mascota` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `foto_mascota` varchar(200) NOT NULL,
  `identificacion_propietario` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`codigo_mascota`),
  KEY `identificacion_propietario` (`identificacion_propietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_propietario`
--

CREATE TABLE IF NOT EXISTS `tbl_propietario` (
  `identificacion_propietario` varchar(12) NOT NULL,
  `nombre_1` varchar(20) NOT NULL,
  `nombre_2` varchar(20) DEFAULT NULL,
  `apellido_1` varchar(25) NOT NULL,
  `apellido_2` varchar(25) DEFAULT NULL,
  `email_propietario` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `celular_1` varchar(15) NOT NULL,
  `usuario_propietario` varchar(100) NOT NULL,
  `clave_propietario` varchar(80) NOT NULL,
  `token` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`identificacion_propietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservar_cita`
--

CREATE TABLE IF NOT EXISTS `tbl_reservar_cita` (
  `codigo_reservar` int(11) NOT NULL AUTO_INCREMENT,
  `direccion_reserva` varchar(255) NOT NULL,
  `barrio_reserva` varchar(100) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_reserva` varchar(15) NOT NULL,
  `tipo_consulta` varchar(100) NOT NULL,
  `id_v` varchar(12) NOT NULL,
  `veterinario` varchar(150) NOT NULL,
  `atendido` varchar(3) NOT NULL,
  `identificacion_propietario` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`codigo_reservar`),
  KEY `identificacion_propietario` (`identificacion_propietario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitar_cita`
--

CREATE TABLE IF NOT EXISTS `tbl_solicitar_cita` (
  `codigo_solicitar` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(255) NOT NULL,
  `barrio` varchar(100) NOT NULL,
  `tipo_consulta` varchar(255) NOT NULL,
  `fecha_solicitar` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `leido` int(11) NOT NULL,
  `identificacion_propietario` varchar(25) NOT NULL,
  PRIMARY KEY (`codigo_solicitar`),
  KEY `identificacion_propietario` (`identificacion_propietario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_veterinario`
--

CREATE TABLE IF NOT EXISTS `tbl_veterinario` (
  `identificacion_veterinario` varchar(12) NOT NULL,
  `nombre_1` varchar(20) NOT NULL,
  `nombre_2` varchar(20) DEFAULT NULL,
  `apellido_1` varchar(25) NOT NULL,
  `apellido_2` varchar(25) DEFAULT NULL,
  `email_veterinario` varchar(255) NOT NULL,
  `telefono_1` varchar(7) DEFAULT NULL,
  `celular_1` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `usuario_veterinario` varchar(100) NOT NULL,
  `clave_veterinario` varchar(80) NOT NULL,
  `disponibilidad` varchar(20) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `token` varchar(40) DEFAULT NULL,
  `identificacion_administrador` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`identificacion_veterinario`),
  KEY `identificacion_administrador` (`identificacion_administrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_historia_clinica`
--
ALTER TABLE `tbl_historia_clinica`
  ADD CONSTRAINT `tbl_historia_clinica_ibfk_1` FOREIGN KEY (`codigo_mascota`) REFERENCES `tbl_mascota` (`codigo_mascota`);

--
-- Filtros para la tabla `tbl_historia_clinica_veterinario`
--
ALTER TABLE `tbl_historia_clinica_veterinario`
  ADD CONSTRAINT `tbl_historia_clinica_veterinario_ibfk_1` FOREIGN KEY (`codigo_de_mascota`) REFERENCES `tbl_historia_clinica` (`codigo_de_mascota`),
  ADD CONSTRAINT `tbl_historia_clinica_veterinario_ibfk_2` FOREIGN KEY (`identificacion_veterinario`) REFERENCES `tbl_veterinario` (`identificacion_veterinario`);

--
-- Filtros para la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD CONSTRAINT `tbl_horario_ibfk_1` FOREIGN KEY (`identificacion_veterinario`) REFERENCES `tbl_veterinario` (`identificacion_veterinario`);

--
-- Filtros para la tabla `tbl_mascota`
--
ALTER TABLE `tbl_mascota`
  ADD CONSTRAINT `tbl_mascota_ibfk_1` FOREIGN KEY (`identificacion_propietario`) REFERENCES `tbl_propietario` (`identificacion_propietario`);

--
-- Filtros para la tabla `tbl_reservar_cita`
--
ALTER TABLE `tbl_reservar_cita`
  ADD CONSTRAINT `tbl_reservar_cita_ibfk_1` FOREIGN KEY (`identificacion_propietario`) REFERENCES `tbl_propietario` (`identificacion_propietario`);

--
-- Filtros para la tabla `tbl_solicitar_cita`
--
ALTER TABLE `tbl_solicitar_cita`
  ADD CONSTRAINT `tbl_solicitar_cita_ibfk_1` FOREIGN KEY (`identificacion_propietario`) REFERENCES `tbl_propietario` (`identificacion_propietario`);

--
-- Filtros para la tabla `tbl_veterinario`
--
ALTER TABLE `tbl_veterinario`
  ADD CONSTRAINT `tbl_veterinario_ibfk_1` FOREIGN KEY (`identificacion_administrador`) REFERENCES `tbl_administrador` (`identificacion_administrador`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
