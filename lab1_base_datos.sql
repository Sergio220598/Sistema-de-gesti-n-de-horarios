-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-10-2020 a las 11:05:20
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sotr20202`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `codcurso` varchar(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ciclo` int(2) NOT NULL,
  `teoria` int(1) NOT NULL,
  `practica` int(1) NOT NULL,
  `laboratorio` int(1) NOT NULL,
  `grupos` int(1) NOT NULL,
  `carrera` enum('Ing. Electronica','Ing. Mecatronica','Ambas','Ing. Industrial','Ciencias','Ing. Industrial EPE') DEFAULT NULL,
  `creditos` int(1) NOT NULL,
  `activo` enum('SI','NO') DEFAULT NULL,
  PRIMARY KEY (`codcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`codcurso`, `nombre`, `ciclo`, `teoria`, `practica`, `laboratorio`, `grupos`, `carrera`, `creditos`, `activo`) VALUES
('EL109', 'Robótica e Inteligencia Artificial', 9, 3, 0, 3, 0, 'Ing. Electronica', 4, 'SI'),
('EL117', 'Tecnologías de Fabricación y Manufactura', 3, 2, 0, 3, 2, 'Ing. Mecatronica', 3, 'SI'),
('EL172', 'Programación de Computadoras', 4, 3, 0, 1, 0, 'Ambas', 4, 'SI'),
('EL174', 'Microcontroladores', 5, 3, 0, 3, 2, 'Ambas', 4, 'SI'),
('EL184', 'Programación Avanzada de Computadoras', 6, 2, 0, 3, 0, 'Ing. Electronica', 3, 'SI'),
('EL186', 'Sensores y Actuadores', 8, 3, 2, 1, 0, 'Ing. Electronica', 4, 'SI'),
('EL190', 'Redes de Comunicaciones 1', 3, 3, 0, 2, 1, 'Ing. Electronica', 4, 'SI'),
('EL204', 'Electrónica de Potencia', 9, 2, 0, 2, 0, 'Ing. Electronica', 3, 'SI'),
('EL208', 'Comunicaciones Móviles', 10, 2, 3, 0, 0, 'Ing. Electronica', 3, 'SI'),
('EL217', 'Ingeniería de Comunicaciones', 7, 3, 0, 2, 2, 'Ing. Electronica', 4, 'SI'),
('EL218', 'Ingeniería de Control 1 ', 6, 3, 0, 2, 2, 'Ambas', 4, 'SI'),
('EL222', 'Procesamiento Digital de Señales', 7, 3, 0, 2, 2, 'Ambas', 4, 'SI'),
('EL226', 'Sistemas Operativos en Tiempo Real', 9, 2, 0, 2, 0, 'Ing. Electronica', 3, 'SI'),
('EL227', 'Software para Ingeniería', 2, 2, 0, 1, 1, 'Ambas', 3, 'SI'),
('EL228', 'Procesamiento Avanzado de Señales e Imágenes', 8, 4, 0, 0, 0, 'Ambas', 4, 'SI'),
('EL229', 'Redes de Comunicaciones 2', 6, 3, 0, 2, 2, 'Ing. Electronica', 4, 'SI'),
('EL230', 'Electromagnetismo', 6, 4, 0, 0, 0, 'Ing. Electronica', 4, 'SI'),
('EL231', 'Señales y Sistemas ', 6, 4, 0, 0, 0, 'Ambas', 4, 'SI'),
('EL232', 'Máquinas Eléctricas', 7, 2, 0, 2, 2, 'Ing. Mecatronica', 3, 'SI'),
('EL233', 'Diseño de Circuitos Electrónicos', 7, 3, 0, 2, 2, 'Ing. Electronica', 4, 'SI'),
('EL234', 'Sistemas Embebidos', 8, 3, 0, 2, 0, 'Ing. Electronica', 4, 'SI'),
('EL235', 'Gestión de Proyectos de Ingeniería', 7, 3, 0, 0, 0, 'Ambas', 3, 'SI'),
('EL236', 'Proyecto Electrónico 1', 9, 2, 0, 4, 0, 'Ing. Electronica', 4, 'SI'),
('EL237', 'Proyecto Electrónico 2', 10, 2, 0, 4, 0, 'Ing. Electronica', 4, 'SI'),
('EL240', 'Comunicaciones Ópticas', 10, 3, 0, 0, 0, 'Ing. Electronica', 3, 'SI'),
('EL242', 'Redes de Banda Ancha e Internet', 8, 2, 0, 2, 0, 'Ing. Electronica', 3, 'SI'),
('EL243', 'Análisis de Circuitos Eléctricos 1', 4, 3, 0, 2, 2, 'Ambas', 4, 'SI'),
('EL244', 'Análisis de Circuitos Eléctricos 2', 5, 3, 0, 2, 2, 'Ambas', 4, 'SI'),
('EL245', 'Circuitos Lógicos Digitales', 3, 3, 0, 2, 2, 'Ambas', 4, 'SI'),
('EL246', 'Dispositivos y Circuitos Analógicos', 5, 3, 0, 2, 2, 'Ambas', 4, 'SI'),
('EL247', 'Electrónica Industrial', 8, 2, 0, 2, 2, 'Ing. Mecatronica', 3, 'SI'),
('EL248', 'Ingeniería de Control 2', 7, 3, 0, 2, 2, 'Ambas', 4, 'SI'),
('EL249', 'Introducción a la Electrónica', 1, 3, 0, 2, 2, 'Ing. Electronica', 4, 'SI'),
('EL251', 'Sensores y Actuadores', 6, 3, 0, 2, 2, 'Ambas', 4, 'SI'),
('EL252', 'Sistemas de Automatización Industrial', 9, 2, 0, 2, 2, 'Ambas', 3, 'SI'),
('EL253', 'Sistemas Digitales', 4, 3, 0, 2, 2, 'Ambas', 4, 'SI'),
('IN134', 'Gestión Energética', 8, 3, 0, 2, 2, 'Ing. Industrial', 4, 'SI'),
('IN397', 'Seminario de Investigación Académica 2', 8, 3, 0, 0, 0, 'Ing. Industrial', 3, 'SI'),
('MA444', 'Estadística', 3, 4, 0, 0, 0, 'Ciencias', 4, 'SI'),
('MA462', 'Física 2', 4, 5, 2, 0, 0, 'Ciencias', 6, 'SI'),
('MA463', 'Matemática Analítica 4', 4, 4, 2, 0, 0, 'Ciencias', 5, 'SI'),
('MA466', 'Física 1', 3, 3, 2, 0, 0, 'Ciencias', 4, 'SI'),
('MA471', 'Bioingeniería', 7, 3, 0, 0, 0, 'Ciencias', 3, 'SI'),
('MA641', 'Física 3', 5, 5, 0, 2, 0, 'Ciencias', 6, 'SI'),
('MA654', 'Matemática Analítica 3', 3, 4, 2, 0, 0, 'Ciencias', 5, 'SI'),
('MA655', 'Matemática Analítica 5', 5, 4, 2, 0, 0, 'Ciencias', 5, 'SI'),
('MC18', 'Manufactura Integrada por Computadora', 9, 2, 0, 3, 2, 'Ing. Mecatronica', 3, 'SI'),
('MC31', 'Proyecto Mecatrónico 1', 9, 2, 0, 4, 0, 'Ing. Mecatronica', 4, 'SI'),
('MC32', 'Robótica Industrial', 10, 2, 0, 2, 3, 'Ing. Mecatronica', 3, 'SI'),
('MC33', 'Ingeniería de Control 3', 8, 2, 0, 2, 0, 'Ambas', 3, 'SI'),
('MC34', 'Mandos Neumáticos e Hidráulicos', 9, 2, 0, 2, 2, 'Ing. Mecatronica', 3, 'SI'),
('MC35', 'Diseño de Máquinas Automáticas', 9, 2, 0, 2, 0, 'Ing. Mecatronica', 3, 'SI'),
('MC36', 'Mecatrónica Aplicada al Gas Natural', 9, 2, 0, 2, 0, 'Ing. Mecatronica', 3, 'SI'),
('MC37', 'Sistemas Scada y DCS', 10, 2, 0, 2, 2, 'Ing. Mecatronica', 3, 'SI'),
('MC38', 'Redes Industriales', 8, 2, 0, 2, 2, 'Ing. Mecatronica', 3, 'SI'),
('MC39', 'Control de Procesos', 8, 2, 0, 2, 2, 'Ing. Mecatronica', 3, 'SI'),
('MC40', 'Introducción a la Mecatrónica', 1, 3, 0, 2, 2, 'Ing. Mecatronica', 4, 'SI'),
('MC41', 'Proyecto Mecatrónico 2', 10, 2, 0, 4, 0, 'Ing. Mecatronica', 4, 'SI'),
('MC42', 'Sistemas CAD/CAM', 8, 2, 0, 2, 3, 'Ing. Mecatronica', 3, 'SI'),
('TE19', 'Sistemas de Comunicaciones', 8, 2, 1, 2, 0, 'Ing. Electronica', 3, 'SI'),
('TE51', 'Radiopropagación y Antenas', 8, 3, 0, 0, 0, 'Ing. Electronica', 3, 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE IF NOT EXISTS `disponibilidad` (
  `iddocente` int(5) NOT NULL,
  `dia` enum('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO') NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `ciclo` varchar(6) NOT NULL,
  `campus` enum('TODOS','SM','MO','VL','MO-SM') DEFAULT NULL,
  `uactualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `iddocente` (`iddocente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`iddocente`, `dia`, `hora_inicio`, `hora_fin`, `ciclo`, `campus`, `uactualizacion`) VALUES
(1677, 'LUNES', '13:00:00', '19:00:00', '2020-2', 'TODOS', '2020-09-21 22:10:17'),
(1677, 'MARTES', '07:00:00', '19:00:00', '2020-2', 'TODOS', '2020-07-28 00:23:19'),
(1677, 'MIERCOLES', '07:00:00', '19:00:00', '2020-2', 'TODOS', '2020-07-28 00:23:19'),
(1124, 'LUNES', '08:00:00', '13:00:00', '2020-2', 'SM', '0000-00-00 00:00:00'),
(1124, 'LUNES', '08:00:00', '12:00:00', 'ciclo', 'SM', '0000-00-00 00:00:00'),
(1124, 'LUNES', '18:00:00', '21:00:00', 'ciclo', 'SM', '0000-00-00 00:00:00'),
(1116, 'LUNES', '08:00:00', '12:00:00', '2020-2', 'SM', '2020-09-25 07:35:33'),
(1116, 'LUNES', '14:00:00', '17:00:00', '2020-2', 'MO', '2020-09-25 07:35:33'),
(1116, 'MARTES', '08:00:00', '11:00:00', '2020-2', 'VL', '2020-09-25 07:35:33'),
(1116, 'MIERCOLES', '18:00:00', '22:00:00', '2020-2', '', '2020-09-25 07:35:33'),
(1116, 'JUEVES', '16:00:00', '18:00:00', '2020-2', 'TODOS', '2020-09-25 07:35:33'),
(1116, 'JUEVES', '19:00:00', '22:00:00', '2020-2', 'TODOS', '2020-09-25 07:35:33'),
(1116, 'VIERNES', '11:00:00', '13:00:00', '2020-2', 'SM', '2020-09-25 07:35:33'),
(1116, 'VIERNES', '15:00:00', '17:00:00', '2020-2', 'VL', '2020-09-25 07:35:33'),
(1116, 'SABADO', '07:00:00', '10:00:00', '2020-2', 'TODOS', '2020-09-25 07:35:33'),
(1116, 'SABADO', '20:00:00', '23:00:00', '2020-2', 'SM', '2020-09-25 07:35:33'),
(1122, 'LUNES', '08:00:00', '12:00:00', '2020-2', 'SM', '2020-09-25 07:43:55'),
(1122, 'LUNES', '14:00:00', '17:00:00', '2020-2', 'MO', '2020-09-25 07:43:55'),
(1122, 'MARTES', '08:00:00', '11:00:00', '2020-2', 'VL', '2020-09-25 07:43:55'),
(1122, 'JUEVES', '16:00:00', '18:00:00', '2020-2', 'TODOS', '2020-09-25 07:43:55'),
(1122, 'JUEVES', '19:00:00', '22:00:00', '2020-2', 'TODOS', '2020-09-25 07:43:55'),
(1122, 'VIERNES', '11:00:00', '13:00:00', '2020-2', 'SM', '2020-09-25 07:43:55'),
(1122, 'VIERNES', '15:00:00', '17:00:00', '2020-2', 'VL', '2020-09-25 07:43:55'),
(1122, 'SABADO', '07:00:00', '10:00:00', '2020-2', 'TODOS', '2020-09-25 07:43:55'),
(1122, 'SABADO', '20:00:00', '23:00:00', '2020-2', 'SM', '2020-09-25 07:43:55'),
(1124, 'VIERNES', '15:00:00', '18:00:00', '2020-2', 'VL', '2020-10-01 10:38:18'),
(4419, 'LUNES', '13:00:00', '16:00:00', '2020-2', 'SM', '2020-10-01 10:42:08'),
(4419, 'MIERCOLES', '14:00:00', '17:00:00', '2020-2', 'MO-SM', '2020-10-01 10:42:08'),
(4419, 'VIERNES', '11:00:00', '13:00:00', '2020-2', 'MO', '2020-10-01 10:42:08'),
(4419, 'VIERNES', '15:00:00', '17:00:00', '2020-2', 'SM', '2020-10-01 10:42:08'),
(4419, 'SABADO', '19:00:00', '22:00:00', '2020-2', 'TODOS', '2020-10-01 10:42:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `iddocente` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidop` varchar(40) NOT NULL,
  `apellidom` varchar(40) NOT NULL,
  `carrera` varchar(30) NOT NULL,
  `contrato` varchar(10) NOT NULL,
  `habilitado` enum('SI','NO') NOT NULL,
  `horas_min` int(2) NOT NULL,
  `horas_max` int(2) NOT NULL,
  `correo` varchar(40) NOT NULL,
  PRIMARY KEY (`iddocente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`iddocente`, `nombre`, `apellidop`, `apellidom`, `carrera`, `contrato`, `habilitado`, `horas_min`, `horas_max`, `correo`) VALUES
(1111, 'Vicky', 'Salazar', 'Revatta', 'Ing. Electrónica', 'Dictante', 'SI', 30, 42, 'vicky.salazar@upc.pe'),
(1112, 'Carlos', 'Valdez', 'Velásquez-López', 'Ing. Electrónica', 'Director', 'SI', 3, 15, 'carlos.valdez@upc.pe'),
(1113, 'Mirko', 'Klusmann', 'Vieira', 'Ing. Mecatrónica', 'Dictante', 'SI', 30, 42, 'mirko.klusmann@upc.pe'),
(1114, 'Javier', 'Cieza', 'Dávila', 'Ing. Electrónica', 'Parcial', 'SI', 0, 23, 'pceljcie@upc.edu.pe'),
(1115, 'Juan', 'Puerta', 'Arce', 'Ing. Mecatronica', 'Dictante', 'SI', 30, 42, 'juan.puerta@upc.pe'),
(1116, 'Nikolai', 'Vinces', 'Ramos', 'Ing. Mecatronica', 'Staff', 'SI', 15, 24, 'leonardo.vinces@upc.pe'),
(1117, 'Luis', 'Dávila', 'Tello', 'Ing. Electrónica', 'Staff', 'SI', 15, 24, 'luis.davila@upc.pe'),
(1118, 'Javier', 'Espinoza', 'Zavaleta', 'Ing. Electronica', 'Parcial', 'SI', 0, 23, 'pceljesp@upc.edu.pe'),
(1119, 'Luis', 'Egusquiza', 'Yamahuchi', 'Ing. Electronica', 'Parcial', 'SI', 0, 23, 'pcellegu@upc.edu.pe'),
(1120, 'Germain', 'Cárdenas', 'Zavala', 'Ciencias', 'Dictante', 'SI', 30, 42, 'pcelgcar@upc.edu.pe'),
(1121, 'Javier', 'Barriga', 'Hoyle', 'Ing. Electronica', 'Parcial', 'SI', 0, 23, 'pceljbar@upc.edu.pe'),
(1122, 'Fredy', 'Campos', 'Aguado', 'Ing. Electronica', 'Parcial', 'SI', 0, 23, 'pcelfcam@upc.edu.pe'),
(1123, 'Jorge', 'López', 'Villalobos', 'Ing. Electronica', 'Staff', 'SI', 30, 42, 'pceljlop@upc.edu.pe'),
(1124, 'Rubén', 'Acosta', 'Jacinto', 'Ing. Electronica', 'Parcial', 'SI', 0, 23, 'pcelraco@upc.edu.pe'),
(1125, 'Guillermo', 'Kemper', 'Vasquez', 'Ing. Electronica', 'Investigad', 'SI', 8, 18, 'guillermo.kemper@upc.pe'),
(1677, 'Sergio', 'Salas', 'Arriarán', 'Ing. Electrónica', 'Staff', 'SI', 15, 24, 'sergio.salas@upc.pe'),
(4419, 'Kalun', 'Lau', 'Gan', 'Ing. Electrónica', 'Dictante', 'SI', 30, 42, 'kalun.lau@upc.pe'),
(8743, 'Julio', 'Ronceros', 'Rivas', 'Ing. Mecatrónica', 'Staff', 'SI', 30, 42, 'julio.ronceros@upc.pe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `codcurso` varchar(6) NOT NULL,
  `seccion` varchar(5) NOT NULL,
  `tiposesion` enum('TE','PR','LB') NOT NULL,
  `dia` enum('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO') NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `aula` varchar(6) DEFAULT NULL,
  `tipo_aula` enum('TEORICA','LABORATORIO','COMPUTO') DEFAULT NULL,
  `sede` enum('MO','SM','VL','SI','HB') NOT NULL,
  `grupo` int(1) NOT NULL,
  `estado` enum('ABIERTA','CERRADA') NOT NULL,
  `vacantes` int(2) DEFAULT NULL,
  `ciclo` varchar(6) NOT NULL,
  `iddocente` int(5) DEFAULT NULL,
  `uactualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `iddocente` (`iddocente`),
  KEY `codcurso` (`codcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`codcurso`, `seccion`, `tiposesion`, `dia`, `hora_inicio`, `hora_fin`, `aula`, `tipo_aula`, `sede`, `grupo`, `estado`, `vacantes`, `ciclo`, `iddocente`, `uactualizacion`) VALUES
('EL227', 'MS2B', 'PR', 'JUEVES', '09:00:00', '10:00:00', 'SB-601', 'LABORATORIO', 'SM', 0, 'CERRADA', 24, '2020-1', 1117, '2020-09-25 20:09:15'),
('EL174', 'EL53', 'TE', 'MARTES', '10:00:00', '13:00:00', 'A-36', 'TEORICA', 'MO', 0, 'ABIERTA', 40, '2020-1', 1677, '2020-07-29 01:32:24'),
('EL174', 'EL53', 'LB', 'MIERCOLES', '13:00:00', '16:00:00', 'C-55', 'LABORATORIO', 'MO', 1, 'ABIERTA', 20, '2019-2', 1677, '2020-07-29 01:32:24'),
('EL174', 'EL53', 'LB', 'MIERCOLES', '10:00:00', '13:00:00', 'C-55', 'LABORATORIO', 'MO', 2, 'ABIERTA', 20, '2019-2', 1677, '2020-07-29 01:32:24'),
('EL174', 'LS5A', 'TE', 'LUNES', '19:00:00', '22:00:00', 'SB703', 'TEORICA', 'SM', 0, 'ABIERTA', 40, '2020-1', 4419, '2020-07-29 01:32:24'),
('EL174', 'LS5A', 'LB', 'MIERCOLES', '10:00:00', '13:00:00', 'SB-301', 'LABORATORIO', 'SM', 1, 'ABIERTA', 20, '2020-1', 4419, '2020-09-21 06:53:51'),
('EL174', 'LS5A', 'LB', 'JUEVES', '13:00:00', '16:00:00', 'SB-301', 'LABORATORIO', 'SM', 2, 'ABIERTA', 20, '2020-1', 4419, '2020-09-21 06:53:43'),
('MA471', 'EL72', 'TE', 'LUNES', '13:00:00', '16:00:00', 'C-44', 'TEORICA', 'MO', 0, 'ABIERTA', 30, '2019-2', 4419, '2020-09-28 01:20:59'),
('EL226', 'EL92', 'TE', 'LUNES', '17:00:00', '19:00:00', 'C-55', 'LABORATORIO', 'MO', 0, 'ABIERTA', 24, '2019-2', 4419, '2020-09-28 01:20:52'),
('EL174', 'EL53', 'TE', 'MARTES', '10:00:00', '13:00:00', 'A-36', 'TEORICA', 'MO', 0, 'ABIERTA', 40, '2020-2', 1677, '2020-09-30 07:14:18'),
('EL174', 'EL53', 'LB', 'MIERCOLES', '13:00:00', '16:00:00', 'C-55', 'LABORATORIO', 'MO', 1, 'ABIERTA', 20, '2020-2', 1677, '2020-09-30 07:14:18'),
('EL174', 'EL53', 'LB', 'MIERCOLES', '10:00:00', '13:00:00', 'C-55', 'LABORATORIO', 'MO', 2, 'ABIERTA', 20, '2020-2', 1677, '2020-09-30 07:14:18'),
('EL174', 'LS5A', 'TE', 'LUNES', '19:00:00', '22:00:00', 'SB703', 'TEORICA', 'SM', 0, 'ABIERTA', 40, '2020-2', 4419, '2020-09-30 07:14:18'),
('EL174', 'LS5A', 'LB', 'MIERCOLES', '10:00:00', '13:00:00', 'SB-301', 'LABORATORIO', 'SM', 1, 'ABIERTA', 20, '2020-2', 4419, '2020-09-30 07:14:18'),
('EL174', 'LS5A', 'LB', 'JUEVES', '13:00:00', '16:00:00', 'SB-301', 'LABORATORIO', 'SM', 2, 'ABIERTA', 20, '2020-2', 4419, '2020-09-30 07:14:18'),
('MA471', 'EL72', 'TE', 'LUNES', '13:00:00', '16:00:00', 'C-44', 'TEORICA', 'MO', 0, 'ABIERTA', 30, '2020-2', 1677, '2020-09-30 07:14:18'),
('EL226', 'EL92', 'TE', 'LUNES', '17:00:00', '19:00:00', 'C-55', 'LABORATORIO', 'MO', 0, 'ABIERTA', 24, '2020-2', 1677, '2020-09-30 07:14:18'),
('EL226', 'EL92', 'LB', 'MIERCOLES', '17:00:00', '19:00:00', 'C-55', 'LABORATORIO', 'MO', 0, 'ABIERTA', 24, '2020-2', 1677, '2020-09-30 07:14:18'),
('MC40', 'MS1A', 'TE', 'MIERCOLES', '07:00:00', '10:00:00', 'SC514', 'TEORICA', 'SM', 0, 'CERRADA', 40, '2020-2', 1117, '2020-09-30 07:14:18'),
('MC40', 'MS1B', 'TE', 'MIERCOLES', '10:00:00', '13:00:00', 'SC312', 'TEORICA', 'SM', 0, 'CERRADA', 40, '2020-2', 1117, '2020-09-30 07:14:18'),
('EL227', 'MS2B', 'TE', 'JUEVES', '07:00:00', '09:00:00', 'SB-601', 'LABORATORIO', 'SM', 0, 'CERRADA', 40, '2020-2', 1117, '2020-09-30 07:14:18'),
('EL227', 'MS2B', 'PR', 'JUEVES', '09:00:00', '10:00:00', 'SB-601', 'LABORATORIO', 'SM', 0, 'CERRADA', 24, '2020-2', 1117, '2020-09-30 07:14:18'),
('EL245', 'MS3B', 'TE', 'VIERNES', '07:00:00', '10:00:00', 'SC301', 'TEORICA', 'SM', 0, 'CERRADA', 40, '2020-2', 1117, '2020-09-30 07:14:18'),
('EL245', 'MS3B', 'LB', 'SABADO', '07:00:00', '09:00:00', 'SB-301', 'LABORATORIO', 'SM', 1, 'CERRADA', 20, '2020-2', 1117, '2020-09-30 07:14:18'),
('EL245', 'MS3B', 'LB', 'SABADO', '09:00:00', '11:00:00', 'SB-301', 'LABORATORIO', 'SM', 2, 'CERRADA', 20, '2020-2', 1117, '2020-09-30 07:14:18'),
('EL253', 'EL42', 'TE', 'JUEVES', '10:00:00', '13:00:00', 'A-44', 'TEORICA', 'MO', 0, 'ABIERTA', 40, '2020-2', 4419, '2020-09-30 07:14:18'),
('EL227', 'EL21', 'TE', 'MARTES', '07:00:00', '09:00:00', 'C-55', 'LABORATORIO', 'MO', 0, 'ABIERTA', 24, '2020-2', 1115, '2020-09-30 07:14:18'),
('EL236', 'EL97', 'TE', 'JUEVES', '15:00:00', '17:00:00', 'K-51', 'LABORATORIO', 'MO', 0, 'CERRADA', 20, '2020-2', 1125, '2020-09-30 07:14:18'),
('EL190', 'EL98', 'TE', 'LUNES', '10:00:00', '13:00:00', 'teoric', 'TEORICA', 'SM', 0, 'ABIERTA', 40, '2020-2', 1118, '2020-10-01 09:44:32'),
('EL190', 'EL98', 'LB', 'MARTES', '10:00:00', '14:00:00', 'C-55', 'LABORATORIO', 'SM', 0, 'ABIERTA', 40, '2020-2', 1118, '2020-10-01 10:16:15'),
('EL190', 'EL111', 'TE', 'LUNES', '10:00:00', '13:00:00', 'teoric', 'TEORICA', 'SM', 0, 'ABIERTA', 40, '2020-2', 1118, '2020-10-01 10:06:23'),
('EL190', 'EL111', 'LB', 'LUNES', '12:00:00', '14:00:00', 'C-55', 'LABORATORIO', 'SM', 1, 'ABIERTA', 40, '2020-2', 1118, '2020-10-01 10:06:23'),
('EL190', 'EL111', 'LB', 'MARTES', '10:00:00', '12:00:00', 'C-55', 'LABORATORIO', 'SM', 2, 'ABIERTA', 40, '2020-2', 1118, '2020-10-01 10:15:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE IF NOT EXISTS `laboratorios` (
  `nombre` varchar(6) NOT NULL,
  `capacidad` int(2) NOT NULL,
  `sede` enum('MO','SM','VL','SI','HB') DEFAULT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorios`
--

INSERT INTO `laboratorios` (`nombre`, `capacidad`, `sede`) VALUES
('C-51', 20, 'MO'),
('C-52', 20, 'MO'),
('C-54', 20, 'MO'),
('C-55', 24, 'MO'),
('C-56', 24, 'MO'),
('K-51', 20, 'MO'),
('SB-301', 20, 'SM'),
('SB-305', 20, 'SM'),
('SB-306', 20, 'SM'),
('SB-503', 18, 'SM'),
('SB-601', 24, 'SM'),
('VH-101', 12, 'VL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `correo` varchar(40) NOT NULL,
  `clave` tinyblob NOT NULL,
  `admin` enum('S','N') NOT NULL,
  `uacceso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `accesos` int(5) DEFAULT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `clave`, `admin`, `uacceso`, `accesos`) VALUES
('kalun.lau@upc.pe', 0x29cd74bafffcdf8fa220452d67d3153a, 'N', '2020-10-01 10:27:16', 27),
('sergio.salas@upc.pe', 0x29cd74bafffcdf8fa220452d67d3153a, 'S', '2020-10-01 09:56:14', 66);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
