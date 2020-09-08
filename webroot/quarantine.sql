-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2020 at 08:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quarantine`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `fantasia` varchar(80) DEFAULT NULL,
  `ruc` varchar(45) NOT NULL,
  `telefono` varchar(60) NOT NULL,
  `telefono_2` varchar(80) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `representante` varchar(60) NOT NULL,
  `ruc_representante` varchar(45) NOT NULL,
  `dv_representante` int(11) DEFAULT NULL,
  `monto_cuota` decimal(16,2) NOT NULL DEFAULT '0.00',
  `ciudad` varchar(50) DEFAULT 'CDE',
  `estado` int(11) NOT NULL DEFAULT '1',
  `visibility` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `descripcion`, `fantasia`, `ruc`, `telefono`, `telefono_2`, `direccion`, `representante`, `ruc_representante`, `dv_representante`, `monto_cuota`, `ciudad`, `estado`, `visibility`, `created`, `modified`) VALUES
(2, 'Demo', 'Demo', '80024216-1', '0986 669 700', '00000000', 'Asuncion', 'VORTIX S.A', '00000000', 0, '330000.00', 'ASU', 1, NULL, '2019-06-20 00:00:00', '2019-08-08 14:08:37'),
(3, 'Grupo RUDAMEGA SA', 'MEGA CHOPP PARAGUAY', '80103542-2', '0994808080', '0994808080', 'Calle sin nombre c/ Ingavi, entre coronel Ibarrola e yvaporundy', 'Ruben Medida', '80103542', 2, '400000.00', 'Asuncion', 1, NULL, '2019-07-20 07:59:33', '2020-02-12 18:21:31'),
(4, 'Vortix S.A', 'Vortix S.A', '123456-1', '0986669700', '0000000', 'Asuncion', 'Asuncion', '0000', 0, '400000.00', '0', 1, NULL, '2019-07-21 17:26:36', '2019-08-08 14:09:00'),
(5, 'Julio Medina', 'Julio Medina', '5139914', '0973 650 268', '', 'Calle R.I. 3 Corrales e/ Av. José Martí', 'Julio Medina', '5139914', 8, '220000.00', 'CDE', 1, NULL, '2019-08-02 13:52:01', '2019-08-08 14:08:50'),
(6, 'JOYCE CORAL RUIZ DIAZ RIOS', 'JOYCE CORAL', '5065978', '0993-252-999', '', 'Barrio San Alfredo CDE Paraguay', 'JOYCE CORAL RUIZ DIAZ RIOS', '5065978', 2, '250000.00', 'CDE', 1, NULL, '2019-08-08 10:07:12', '2019-08-08 14:09:06'),
(7, 'NANCY ELIZABETH CABALLERO AGUIAR', 'NANCY CABALLERO', '5586689', '0973-824-583', '', 'Barrio San Alfredo CDE Paraguay', 'NANCY ELIZABETH CABALLERO AGUIAR', '5586689', 1, '0.00', 'CDE', 1, NULL, '2019-08-08 10:36:52', '2019-08-08 10:36:52'),
(8, 'PATRICIA FERNANDEZ GONZALEZ', 'PATRICIA GONZALEZ', '445378', '0993-275-252', '', 'Barrio San Alfredo CDE Paraguay', 'PATRICIA FERNANDEZ GONZALEZ', '4453789', 1, '0.00', 'CDE', 1, NULL, '2019-08-08 10:37:29', '2019-08-08 10:37:29'),
(9, 'FRANCISCO JAVIER CACERES ESCOBAR', 'FRANCISCO CACERES', '5479421', '0973-993-596', '', 'Barrio San Alfredo CDE Paraguay', 'FRANCISCO JAVIER CACERES ESCOBAR', '5479421', 8, '0.00', 'CDE', 1, NULL, '2019-08-08 10:38:08', '2019-08-08 10:38:08'),
(10, 'Farmacia A&B', 'Farmacia A&B', '00', '00', '', 'CDE', 'A&B', '0', 0, '0.00', 'Ciudad del Este', 1, NULL, '2019-09-02 10:28:50', '2019-09-02 10:28:50'),
(11, 'Casa Aries S.R.L', 'Casa Aries', '00', '0983 179664', '', 'Avenida San Blás, Cd. del Este', 'Ruben Medina', '00', 0, '0.00', 'Ciudad del Este', 1, NULL, '2019-09-02 10:29:28', '2019-10-27 18:58:34'),
(12, 'INSAURRALDE CACERES EVARISTO', 'INSAURRALDE CACERES', '4073618', '0992 717784', '', 'Barrio San Roque CDE Paraguay', 'INSAURRALDE CACERES EVARISTO', '4073618', 0, '0.00', 'CDE', 1, NULL, '2019-10-02 11:47:36', '2019-10-02 11:47:36'),
(13, 'ESPINOLA VARGAS VICTOR HUGO', 'VICTOR ESPINOLA', '3423586', '0985 891-405', '', 'Barrio San Alfredo CDE Paraguay', 'ESPINOLA VARGAS VICTOR HUGO', '3423586', 8, '0.00', 'CDE', 1, NULL, '2019-12-06 10:00:14', '2019-12-06 10:00:14'),
(14, 'CACERES GONZALEZ, TEODULO', 'TEODULO CACERES', '1080451', '0973 562-402', '', 'Barrio San Alfredo CDE Paraguay', 'CACERES GONZALEZ, TEODULO', '1080451', 0, '0.00', 'CDE', 1, NULL, '2019-12-20 10:27:16', '2019-12-20 10:27:16'),
(15, 'Hourse Japan America Latina Industrial y Comercial S.A.', 'Hourse Japan', '80089104', '(021)3389560', '', 'CALLE, CRUZ DEL DEFENSOR Nº 538 C/ CAMPOS CERVERA OFICINA 2', 'Liz Carolina Alfonzo', '1865507', 6, '0.00', 'CDE', 1, NULL, '2020-01-09 16:26:07', '2020-01-09 16:26:07'),
(16, 'Ocean Quality SRL', 'Ocean Quality SRL', '80054044', '061 579 813', '', 'Av. San Blas e/ Av. Venezuela km 9 Acaray', 'Eraldo de Araujo', '80054044', 1, '0.00', 'CDE', 1, NULL, '2020-01-10 12:15:58', '2020-01-10 12:15:58'),
(17, 'Joyeria Marce', 'Joyeria Marce', '3510501', '00', '', 'Asuncion', 'Marcelo Gaona', '3510501', 1, '0.00', 'Asuncion', 1, NULL, '2020-02-20 14:19:10', '2020-02-20 14:19:10'),
(18, 'Ursulina Rios', 'Ursulina Rios', '5479421', '00', '', 'CDE', 'Ursulina Rios', '5479421', 8, '0.00', 'CDE', 1, NULL, '2020-02-27 14:05:48', '2020-02-27 14:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `ingresos_pais`
--

CREATE TABLE `ingresos_pais` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `cedula` varchar(80) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `usuario` varchar(80) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','usuario','gerencia') DEFAULT NULL,
  `nombre` varchar(60) NOT NULL,
  `documento` varchar(50) NOT NULL DEFAULT '000',
  `dv` int(11) NOT NULL DEFAULT '0',
  `telefono` varchar(60) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `id_perfil` int(11) DEFAULT NULL,
  `id_deposito` int(11) DEFAULT NULL,
  `id_local` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `rol`, `nombre`, `documento`, `dv`, `telefono`, `direccion`, `estado`, `id_perfil`, `id_deposito`, `id_local`, `id_empresa`, `created`, `modified`) VALUES
(51, 'admin@integralix.net', '1', 'admin', 'Admin', '000', 0, '12', 'ASU', 0, 1, NULL, NULL, 2, '2019-06-20 00:00:00', '2020-03-24 04:00:00'),
(52, 'demo@integralix.net', '123', 'usuario', 'Demo', '000', 0, '00', 'Asuncion', 0, 13, NULL, NULL, 2, '2019-07-08 07:36:59', '2020-03-24 03:16:13'),
(53, 'ruben@megachopp.com.py', '1', 'gerencia', 'Ruben Medina', '000', 0, '00', 'CDE', 0, 20, 55, 23, 3, '2019-07-20 08:00:41', '2020-03-24 04:00:06'),
(54, 'pedro@megachopp.com.py', '1', 'usuario', 'Pedro', '000', 0, '00', 'ASUNCION', 0, 3, 55, 23, 3, '2019-07-20 08:01:57', '2020-03-24 04:00:09'),
(55, 'willian@megachopp.com.py', '1', 'usuario', 'Willian', '000', 0, '00', 'ASUNCION', 0, 3, 55, 23, 3, '2019-07-20 08:02:43', '2020-03-24 04:00:13'),
(56, 'jorgedavidc99@gmail.com', '$2y$10$E.PTBFqSyycLS6fxBJYsc.PTYW/lilSQSwVPCIFwvK7/r3IShwfSe', 'admin', 'Jorge', '000', 0, '00', 'Asuncion', 1, 1, NULL, NULL, NULL, '2019-07-25 22:30:43', '2020-03-24 03:16:21'),
(57, 'julio_integral@hotmail.com', '1', 'usuario', 'Julio', '000', 0, '00', '00', 0, 2, NULL, NULL, NULL, '2019-08-02 13:53:43', '2020-03-24 04:00:17'),
(58, 'joycecoral@hotmail.com', '1', 'usuario', 'Joyce', '000', 0, '00', 'CDE', 0, 2, NULL, NULL, NULL, '2019-08-08 10:06:19', '2020-03-24 04:00:20'),
(59, 'kari@megachopp.com.py', '1', 'usuario', 'Karina', '000', 0, '000', 'CDE', 0, 20, NULL, NULL, NULL, '2019-10-04 13:19:57', '2020-03-24 04:00:23'),
(60, 'ever@megachopp.com.py', '1', 'usuario', 'Ever', '000', 0, '00', 'CDE', 0, 3, NULL, NULL, NULL, '2019-10-14 08:29:01', '2020-03-24 04:00:24'),
(61, 'gloria@casaaries.com', '1', 'usuario', 'Gloria Ocampos', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:01:31', '2020-03-24 04:00:26'),
(62, 'noelia@casaaries', '1', 'usuario', 'Noelia Flores', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:02:48', '2020-03-24 04:00:27'),
(63, 'patricia@casaaries.com', '1', 'usuario', 'Patricia Velazquez', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:04:37', '2020-03-24 04:00:29'),
(64, 'normaf@casaaries.com', '1', 'usuario', 'Norma Fischer', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:06:14', '2020-03-24 04:00:31'),
(65, 'mirian@casaaries.com', '1', 'usuario', 'Mirian Arevalos', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:07:09', '2020-03-24 04:00:33'),
(66, 'elisa@casaaries.com', '1', 'usuario', 'Elisa Algarin', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:11:19', '2020-03-24 04:00:35'),
(67, 'carolina@casaaries.com', '1', 'usuario', 'Carolina Cabral', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:12:33', '2020-03-24 04:00:37'),
(68, 'lourdes@casaaries.com', '1', 'usuario', 'Lourdes Medina', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:13:27', '2020-03-24 04:00:39'),
(69, 'feliciana@casaaries', '1', 'usuario', 'Feliciana Rios', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:15:08', '2020-03-24 04:00:40'),
(70, 'mirian@casaaries', '1', 'usuario', 'Mirian Ocampos', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:15:59', '2020-03-24 04:00:42'),
(71, 'irma@casaaries', '1', 'usuario', 'Irma Raquel Martinez', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:17:03', '2020-03-24 04:00:43'),
(72, 'mariae@casaaries', '1', 'usuario', 'Maria Elizabeth Enciso', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:17:53', '2020-03-24 04:00:46'),
(73, 'lizr@casaaries.com', '1', 'usuario', 'Liz Rojas Rolon', '000', 0, '00', NULL, 0, 3, NULL, NULL, NULL, '2019-10-20 13:18:41', '2020-03-24 04:00:48'),
(74, 'raul@megachopp.com.py', '1', 'usuario', 'Raul', '000', 0, '00', '00', 0, 3, NULL, NULL, NULL, '2019-11-16 10:15:11', '2020-03-24 04:00:50'),
(75, 'oscar@megachopp.com.py', '1', 'usuario', 'Oscar', '000', 0, '0973564565', NULL, 0, 3, NULL, NULL, NULL, '2019-12-17 08:55:10', '2020-03-24 04:00:52'),
(76, 'aguilera-liz@hotmail.com', '1', 'usuario', 'Liz Aguilera', '000', 0, '00', 'CDE', 0, 20, NULL, NULL, NULL, '2020-01-09 16:27:37', '2020-03-24 04:00:56'),
(77, 'fucciano@gmail.com', '1', 'usuario', 'Nestor', '000', 0, '00', 'CDE', 0, 2, NULL, NULL, NULL, '2020-01-09 16:28:10', '2020-03-24 04:00:58'),
(78, 'ermerojas007@gmail.com', '1', 'usuario', 'Erme Rojas', '000', 0, '00', 'CDE', 0, 3, NULL, NULL, NULL, '2020-01-09 16:28:54', '2020-03-24 04:01:03'),
(79, 'normavelazquez@oceanquality.net', '1', 'usuario', 'Norma', '000', 0, '00', 'CDe', 0, 3, NULL, NULL, NULL, '2020-01-10 12:16:26', '2020-03-24 04:01:01'),
(80, 'jose@megachopp.com.py', '1', 'usuario', 'Jose', '000', 0, '654543', NULL, 0, 3, NULL, NULL, NULL, '2020-02-14 07:01:07', '2020-03-24 04:01:04'),
(81, 'marce@gmail.com', '1', 'usuario', 'Marcelo', '000', 0, '00', 'Asuncion', 0, 3, NULL, NULL, NULL, '2020-02-20 14:19:42', '2020-03-24 04:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_empresas`
--

CREATE TABLE `usuarios_empresas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios_empresas`
--

INSERT INTO `usuarios_empresas` (`id`, `id_usuario`, `id_empresa`, `estado`, `created`, `modified`) VALUES
(127, 51, 2, 1, '2019-06-20 00:00:00', NULL),
(128, 52, 2, 1, '2019-07-08 07:37:43', '2019-07-08 07:37:43'),
(129, 51, 3, 1, '2019-07-20 00:00:00', '2019-07-20 00:00:00'),
(130, 55, 3, 1, '2019-07-20 08:03:00', '2019-07-20 08:03:00'),
(131, 54, 3, 1, '2019-07-20 08:03:26', '2019-07-20 08:03:26'),
(132, 53, 3, 1, '2019-07-20 08:03:42', '2019-07-20 08:03:42'),
(133, 51, 4, 1, '2019-07-21 00:00:00', '2019-07-21 00:00:00'),
(134, 56, 3, 1, '2019-07-21 00:00:00', '2019-07-21 00:00:00'),
(135, 56, 5, 1, '2019-08-02 00:00:00', '2019-08-02 00:00:00'),
(136, 57, 5, 1, '2019-08-02 13:53:55', '2019-08-02 13:53:55'),
(137, 56, 6, 1, '2019-08-08 00:00:00', '2019-08-08 00:00:00'),
(138, 58, 6, 1, '2019-08-08 10:07:33', '2019-08-08 10:07:33'),
(139, 56, 7, 1, '2019-08-08 00:00:00', '2019-08-08 00:00:00'),
(140, 56, 8, 1, '2019-08-08 00:00:00', '2019-08-08 00:00:00'),
(141, 56, 9, 1, '2019-08-08 00:00:00', '2019-08-08 00:00:00'),
(142, 58, 7, 1, '2019-08-08 10:38:35', '2019-08-08 10:38:35'),
(143, 58, 8, 1, '2019-08-08 10:38:45', '2019-08-08 10:38:45'),
(144, 58, 9, 1, '2019-08-08 10:38:54', '2019-08-08 10:38:54'),
(145, 56, 10, 1, '2019-09-02 00:00:00', '2019-09-02 00:00:00'),
(146, 56, 11, 1, '2019-09-02 00:00:00', '2019-09-02 00:00:00'),
(147, 56, 12, 1, '2019-10-02 00:00:00', '2019-10-02 00:00:00'),
(148, 58, 12, 1, '2019-10-02 11:48:02', '2019-10-02 11:48:02'),
(149, 59, 3, 1, '2019-10-04 13:20:12', '2019-10-04 13:20:12'),
(150, 53, 11, 1, '2019-10-08 22:07:37', '2019-10-08 22:07:37'),
(151, 60, 3, 1, '2019-10-14 08:29:23', '2019-10-14 08:29:23'),
(152, 61, 11, 1, '2019-10-20 13:19:15', '2019-10-20 13:19:15'),
(153, 62, 11, 1, '2019-10-20 13:19:24', '2019-10-20 13:19:24'),
(154, 63, 11, 1, '2019-10-20 13:19:33', '2019-10-20 13:19:33'),
(155, 64, 11, 1, '2019-10-20 13:19:46', '2019-10-20 13:19:46'),
(156, 65, 11, 1, '2019-10-20 13:20:01', '2019-10-20 13:20:01'),
(157, 66, 11, 1, '2019-10-20 13:20:08', '2019-10-20 13:20:08'),
(158, 67, 11, 1, '2019-10-20 13:20:18', '2019-10-20 13:20:18'),
(159, 68, 11, 1, '2019-10-20 13:20:27', '2019-10-20 13:20:27'),
(160, 69, 11, 1, '2019-10-20 13:20:39', '2019-10-20 13:20:39'),
(161, 70, 11, 1, '2019-10-20 13:20:48', '2019-10-20 13:20:48'),
(162, 71, 11, 1, '2019-10-20 13:21:00', '2019-10-20 13:21:00'),
(163, 72, 11, 1, '2019-10-20 13:21:12', '2019-10-20 13:21:12'),
(164, 73, 11, 1, '2019-10-20 13:21:20', '2019-10-20 13:21:20'),
(165, 74, 3, 1, '2019-11-16 10:15:27', '2019-11-16 10:15:27'),
(166, 56, 13, 1, '2019-12-06 00:00:00', '2019-12-06 00:00:00'),
(167, 58, 13, 1, '2019-12-06 10:00:39', '2019-12-06 10:00:39'),
(168, 75, 3, 1, '2019-12-17 08:10:55', '2019-12-17 08:10:55'),
(169, 56, 14, 1, '2019-12-20 00:00:00', '2019-12-20 00:00:00'),
(170, 58, 14, 1, '2019-12-20 10:27:37', '2019-12-20 10:27:37'),
(171, 56, 15, 1, '2020-01-09 00:00:00', '2020-01-09 00:00:00'),
(172, 78, 15, 1, '2020-01-09 16:29:11', '2020-01-09 16:29:11'),
(173, 76, 15, 1, '2020-01-09 16:29:21', '2020-01-09 16:29:21'),
(174, 77, 15, 1, '2020-01-09 16:29:32', '2020-01-09 16:29:32'),
(175, 56, 16, 1, '2020-01-10 00:00:00', '2020-01-10 00:00:00'),
(176, 79, 16, 1, '2020-01-10 12:16:42', '2020-01-10 12:16:42'),
(177, 80, 3, 1, '2020-02-14 07:07:01', '2020-02-14 07:07:01'),
(178, 56, 17, 1, '2020-02-20 00:00:00', '2020-02-20 00:00:00'),
(179, 81, 17, 1, '2020-02-20 14:20:00', '2020-02-20 14:20:00'),
(180, 56, 18, 1, '2020-02-27 00:00:00', '2020-02-27 00:00:00'),
(181, 58, 18, 1, '2020-02-27 14:06:07', '2020-02-27 14:06:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingresos_pais`
--
ALTER TABLE `ingresos_pais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_deposito` (`id_deposito`),
  ADD KEY `id_local` (`id_local`);

--
-- Indexes for table `usuarios_empresas`
--
ALTER TABLE `usuarios_empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_usuarios_compuesto` (`id_usuario`,`id_empresa`),
  ADD KEY `fk_usuarios_id_user_idx` (`id_usuario`),
  ADD KEY `fk_usuarios_empresas_id_idx` (`id_empresa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `ingresos_pais`
--
ALTER TABLE `ingresos_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `usuarios_empresas`
--
ALTER TABLE `usuarios_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
