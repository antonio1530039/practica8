-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2018 a las 04:56:06
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica8`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` int(11) NOT NULL,
  `tutor` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `carrera`, `tutor`, `deleted`) VALUES
('1221312', 'Mariana Hinojosa Tijerina', 2, '7171', 0),
('1530039', 'Jose Antonio Molina de la Fuente', 1, '7171', 0),
('15500', 'Maria Castro Hernandez', 1, 'x21', 0),
('2', 'Jose Antonio MEade', 3, '1234', 0),
('98989', 'Testt', 2, 'x21', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `deleted`) VALUES
(1, 'Ing. En Tecnologias de la Informacion', 0),
(2, 'PyMES', 0),
(3, 'Ing. En Mecatronica', 0),
(4, 'Ing. En Manufactura', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `numero_empleado` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `superadmin` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`numero_empleado`, `nombre`, `carrera`, `email`, `password`, `superadmin`, `deleted`) VALUES
('1234', 'Myriam Ornelas', 1, '1530039@upv.edu', 'myriampassword', 1, 0),
('7171', 'Rector', 3, 'rector@upv.edu.mx', 'rector', 1, 0),
('test1', 'Jose Antonio Molina De la Fuente', 1, '1530039@upv.edu.mx', 'molina', 1, 1),
('x21', 'Mario Humberto Rodriguez Chavez', 1, 'mario@upv.edu.mx', 'mario', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_tutoria`
--

CREATE TABLE `sesion_tutoria` (
  `id` int(11) NOT NULL,
  `alumno` varchar(30) NOT NULL,
  `maestro` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(20) NOT NULL,
  `tipo_tutoria` varchar(10) NOT NULL,
  `tutoria_informacion` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesion_tutoria`
--

INSERT INTO `sesion_tutoria` (`id`, `alumno`, `maestro`, `fecha`, `hora`, `tipo_tutoria`, `tutoria_informacion`, `deleted`) VALUES
(1, '2', 'test1', '2018-05-15', '12:30', 'Individual', 'Hola', 1),
(2, '1530039', 'test1', '2018-05-21', '12:00', 'Individual', 'Mineria de datos', 1),
(3, '1530039', 'test1', '2018-05-22', '20:30', 'Grupal', 'Administracion de sistemas integrales\r\n', 0),
(4, '1221312', 'test1', '2018-05-31', '21:00', 'Grupal', 'Programacion web y Mineria de datos', 0),
(5, '15500', '7171', '2018-05-31', '09:30', 'Individual', 'Inteligencia de Negocios\r\nMineria de Datos\r\nProgramacion Web', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `tutor` (`tutor`),
  ADD KEY `carrera` (`carrera`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`numero_empleado`);

--
-- Indices de la tabla `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno` (`alumno`),
  ADD KEY `maestro` (`maestro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`tutor`) REFERENCES `maestros` (`numero_empleado`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id`);

--
-- Filtros para la tabla `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  ADD CONSTRAINT `sesion_tutoria_ibfk_1` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`matricula`),
  ADD CONSTRAINT `sesion_tutoria_ibfk_2` FOREIGN KEY (`maestro`) REFERENCES `maestros` (`numero_empleado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
