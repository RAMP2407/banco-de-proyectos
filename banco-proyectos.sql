-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2022 at 05:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco-proyectos`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` int(99) NOT NULL,
  `nombre` varchar(99) NOT NULL,
  `giro` varchar(99) NOT NULL,
  `direcc` varchar(99) NOT NULL,
  `tel` varchar(99) NOT NULL,
  `correo` varchar(99) NOT NULL,
  `web` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `giro`, `direcc`, `tel`, `correo`, `web`) VALUES
(31, 'Google', 'Software', 'Sillicon Valley', '4443389958', 'google@gmail.com', 'www.google.com'),
(32, 'DHL', 'Logística', 'Av. Venustiano Carranza', '4443389958', 'dhl@outlook.com', 'www.dhl.com');

-- --------------------------------------------------------

--
-- Table structure for table `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(99) NOT NULL,
  `nombre` varchar(99) NOT NULL,
  `descP` varchar(99) NOT NULL,
  `alumno` varchar(99) NOT NULL,
  `asesor` varchar(99) NOT NULL,
  `empresa` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`, `descP`, `alumno`, `asesor`, `empresa`) VALUES
(11, 'Software de inteligencia artificial', 'Sistema para clasificar imágenes en redes sociales.', '15', '14', '31'),
(12, 'Planeación de red logística', 'Documentación para inicio de proyecto logístico.', '16', '14', '32');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `correo`, `contrasenia`, `rol`) VALUES
(14, '19180918', 'Rubén Alejandro', 'ramp24.07@gmail.com', 'Abcde1234', 'admin'),
(15, '19180001', 'Juan Pérez', 'juan@gmail.com', 'Abcde1234', 'alumno'),
(16, '19180002', 'José Rodriguez', 'jose_rdz@outlook.com', 'Abcde1234', 'alumno'),
(17, '19180919', 'Eduardo Martínez', 'eduardo@outlook.com', 'Abcde1234', 'alumno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
