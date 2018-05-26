-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2018 a las 02:17:51
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
('1221312', 'Mariana Hinojosa Tijerina', 2, 'x21', 0),
('123', '123', 1, 'x21', 1),
('123123', 'Laura Elizondo', 2, '7171', 0),
('1500012', 'Alumno de prueba', 1, '1234', 1),
('1507892', 'Sergio Perez Picazo', 4, 'x21', 0),
('1530039', 'Jose Antonio Molina de la Fuente', 1, '7171', 0),
('1530272', 'Osiel Gomez Flores', 1, 'x21', 0),
('15500', 'Maria Castro Hernandez', 1, 'x21', 0),
('17800', 'Karla Herrera', 2, '7171', 1),
('2', 'Adolfo Hitler', 3, '7171', 1),
('819203', 'Pedro infante', 2, '820001', 0),
('98989', 'Testt', 1, '1234', 0);

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
(4, 'Ing. En Manufactura', 0),
(5, 'Maestria en Ingenieria ', 1);

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
('820001', 'Kenia Juarez Lopez', 2, 'kenia@upv.edu.mx', 'kenia2', 0, 0),
('919293', 'Luis Roberto Fernandez Torres', 3, 'luis@upv.edu.mx', 'luis', 0, 0),
('ewrrewwr', 'Moises Magana', 1, '1530039@upv.edu.mx', 'moi', 1, 1),
('numtest', 'Fulano De Tal', 2, 'fulano@upv.edu.mx', 'fulano', 0, 1),
('test1', 'Hernesto Une', 1, 'hernesto@upv', 'hernesto', 1, 0),
('x21', 'Mario Humberto Rodriguez Chavez', 1, 'mario@upv.edu.mx', 'mario', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_tutoria`
--

CREATE TABLE `sesion_tutoria` (
  `id` int(11) NOT NULL,
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

INSERT INTO `sesion_tutoria` (`id`, `maestro`, `fecha`, `hora`, `tipo_tutoria`, `tutoria_informacion`, `deleted`) VALUES
(53, 'x21', '2018-05-25', '00:32', 'Grupal', 'Tema2, papapapapapap', 1),
(54, 'x21', '2018-05-25', '00:09', 'Grupal', 'MNCMZMXMC', 1),
(55, 'x21', '2018-05-25', '07:00', 'Individual', 'TAW, mineria de datos', 1),
(56, '7171', '2018-05-25', '12:03', 'Grupal', 'jnzxzc,mncm,znm,', 0),
(57, '7171', '2018-05-25', '17:00', 'Individual', 'ZXCVBN,', 0),
(58, 'x21', '2018-05-25', '21:00', 'Grupal', 'tema pa pa pa pa', 1),
(59, '7171', '2018-05-25', '12:00', 'Grupal', 'TAW y algoritmos', 0),
(60, 'x21', '2018-05-31', '17:00', 'Grupal', 'TemaU, TemaY', 0),
(61, '820001', '2018-05-30', '19:30', 'Individual', 'adm. sistemas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoria_alumnos`
--

CREATE TABLE `tutoria_alumnos` (
  `id` int(11) NOT NULL,
  `tutoria` int(11) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tutoria_alumnos`
--

INSERT INTO `tutoria_alumnos` (`id`, `tutoria`, `matricula`, `deleted`) VALUES
(49, 53, '1221312', 0),
(50, 53, '15500', 0),
(51, 53, '819203', 0),
(52, 54, '1221312', 0),
(53, 54, '819203', 0),
(54, 55, '1221312', 0),
(55, 56, '123123', 0),
(56, 56, '1530039', 0),
(57, 57, '123123', 0),
(58, 58, '1530272', 0),
(59, 58, '1221312', 0),
(60, 59, '123123', 0),
(61, 59, '1530039', 0),
(62, 60, '1507892', 0),
(63, 60, '15500', 0),
(64, 60, '819203', 0),
(65, 61, '819203', 0);

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
  ADD KEY `maestro` (`maestro`);

--
-- Indices de la tabla `tutoria_alumnos`
--
ALTER TABLE `tutoria_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `tutoria` (`tutoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `tutoria_alumnos`
--
ALTER TABLE `tutoria_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
  ADD CONSTRAINT `sesion_tutoria_ibfk_2` FOREIGN KEY (`maestro`) REFERENCES `maestros` (`numero_empleado`);

--
-- Filtros para la tabla `tutoria_alumnos`
--
ALTER TABLE `tutoria_alumnos`
  ADD CONSTRAINT `tutoria_alumnos_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`),
  ADD CONSTRAINT `tutoria_alumnos_ibfk_2` FOREIGN KEY (`tutoria`) REFERENCES `sesion_tutoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
