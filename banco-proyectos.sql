-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 03:49:52
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco-proyectos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(99) NOT NULL,
  `nombre` varchar(99) NOT NULL,
  `giro` varchar(99) NOT NULL,
  `direcc` varchar(99) NOT NULL,
  `tel` varchar(99) NOT NULL,
  `correo` varchar(99) NOT NULL,
  `web` varchar(99) NOT NULL,
  `idUser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `giro`, `direcc`, `tel`, `correo`, `web`, `idUser`) VALUES
(1, '', '', '', '', '', '', '0'),
(2, '', '', '', '', '', '', '0'),
(3, '', '', '', '', '', '', '0'),
(4, 'dfsdc', 'xcvx', 'xcv', '4556', 'dklsa@cklxs.xzoj', 'KDKLS', '0'),
(5, 'hola', 'hola', 'hola', '1234', 'sdf@ddd.cv', 'sss', '0'),
(6, 'holah', 'h', 'h', '44', 'sdf@ddd.cv', 's', '0'),
(7, 'holah', 'h', 'h', '44', 'sdf@ddd.cv', 's', '0'),
(8, 'j', 'a', 'a', '4', 'sdf@ddd.cv', 's', '8'),
(9, 'dfdf', 'dfdf', 'dsfsdf', '4', 'sdf@ddd.cv', 'a', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(99) NOT NULL,
  `nombre` varchar(99) NOT NULL,
  `desc` varchar(99) NOT NULL,
  `alumno` varchar(99) NOT NULL,
  `asesor` varchar(99) NOT NULL,
  `empresa` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasenia` varchar(50) NOT NULL,
  `rol` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `correo`, `contrasenia`, `rol`) VALUES
(1, '19180918', 'Rubén Alejandro', 'ramp24.07@gmail.com', '1234', 'alumno'),
(2, '19180901', 'Juan Pérez', 'juan@gmail.com', 'abcd', 'admin'),
(3, '19180905', 'Pedro Perez', 'pedro@gmail.com', '1234', 'alumno'),
(4, 'soto', 'luis soto', 'soto@gmail.com', '123', 'alumno'),
(5, 'adminsoto', 'soto', 'adminsoto@gmail.com', '1234', 'admin'),
(6, 'vedroom', 'israel velacio ', 'sajkla', '123', 'alumno'),
(7, 'vedroomadmin', 'njkinq', 'hgf', '123', 'admin'),
(8, '1918', 'cdsc', 'dsd', 'sdsds', 'alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
