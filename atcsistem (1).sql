-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2017 a las 22:32:52
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `atcsistem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_viatico`
--

CREATE TABLE IF NOT EXISTS `asignacion_viatico` (
`idasignacion_viatico` int(11) NOT NULL,
  `fecha_hora_asivia` datetime DEFAULT NULL,
  `monto_asignado_asivia` int(5) DEFAULT NULL,
  `estatus_asivia` int(1) DEFAULT NULL,
  `idorden_carga_asivia` int(11) NOT NULL,
  `idtabulador_viatico_asivia` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `asignacion_viatico`
--

INSERT INTO `asignacion_viatico` (`idasignacion_viatico`, `fecha_hora_asivia`, `monto_asignado_asivia`, `estatus_asivia`, `idorden_carga_asivia`, `idtabulador_viatico_asivia`) VALUES
(1, '2015-05-22 00:00:00', 8600, 1, 1, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
`idbanco` int(3) NOT NULL,
  `desc_banc` varchar(40) DEFAULT NULL,
  `estatus_ban` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
`IdBitacora` int(11) NOT NULL,
  `IdUsuario` varchar(30) NOT NULL,
  `Ip` varchar(15) NOT NULL,
  `Actividad` varchar(200) NOT NULL,
  `FechaHora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Panel` varchar(15) NOT NULL,
  `TipoBitacora` varchar(15) NOT NULL DEFAULT 's'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=258 ;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`IdBitacora`, `IdUsuario`, `Ip`, `Actividad`, `FechaHora`, `Panel`, `TipoBitacora`) VALUES
(1, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-13 12:52:10', '13', 's'),
(2, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-13 13:43:40', '13', 's'),
(3, 'cesarbello', '::1', 'Busco Registro', '2016-05-13 13:46:43', 'usuario', 'sistema'),
(4, 'cesarbello', '::1', 'Busco Registro', '2016-05-13 13:46:48', 'usuario', 'sistema'),
(5, 'cesarbello', '::1', 'Incluyo Registro', '2016-05-13 13:47:22', 'usuario', 'sistema'),
(6, 'cesarbello', '::1', 'Busco Registro', '2016-05-13 13:48:12', 'usuario', 'sistema'),
(7, 'augusto jimenes', '::1', 'Inicio Sesion', '2016-05-13 13:53:37', '13', 's'),
(8, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-13 13:55:26', '13', 's'),
(9, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-13 14:06:13', '13', 's'),
(10, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-13 14:52:45', '13', 's'),
(11, 'augusto jimenes', '::1', 'Inicio Sesion', '2016-05-13 14:58:03', '13', 's'),
(12, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-13 14:59:25', '13', 's'),
(13, 'cesarbello', '::1', 'Busco Registro', '2016-05-13 15:05:28', 'usuario', 'sistema'),
(14, 'cesarbello', '::1', 'Busco Registro', '2016-05-13 15:05:56', 'usuario', 'sistema'),
(15, 'cesarbello', '::1', 'Incluyo Registro', '2016-05-13 15:07:57', 'usuario', 'sistema'),
(16, 'yamnu', '::1', 'Inicio Sesion', '2016-05-13 15:08:57', '13', 's'),
(17, 'cesarbello', '::1', 'Busco Registro', '2016-05-13 15:09:22', 'usuario', 'sistema'),
(18, 'cesarbello', '::1', 'Modifico Registro', '2016-05-13 15:09:35', 'usuario', 'sistema'),
(19, 'yamnu', '::1', 'Inicio Sesion', '2016-05-13 15:10:01', '13', 's'),
(20, 'augusto jimenes', '::1', 'Inicio Sesion', '2016-05-13 16:06:36', '13', 's'),
(21, 'augusto jimenes', '::1', 'Inicio Sesion', '2016-05-13 16:12:42', '13', 's'),
(22, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-17 11:48:38', '13', 's'),
(23, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-18 09:25:55', '13', 's'),
(24, 'jimenes', '::1', 'Inicio Sesion', '2016-05-18 09:39:38', '13', 's'),
(25, 'CLAUDIASOTO', '127.0.0.1', 'Inicio Sesion', '2016-05-19 08:37:19', '13', 's'),
(26, 'cesarbello', '127.0.0.1', 'Inicio Sesion', '2016-05-19 10:15:36', '13', 's'),
(27, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-20 11:54:07', '13', 's'),
(28, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-20 14:17:33', '13', 's'),
(29, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-26 10:20:49', '13', 's'),
(30, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-26 14:50:29', '13', 's'),
(31, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-26 15:21:14', '13', 's'),
(32, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-26 15:44:29', '13', 's'),
(33, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-27 16:13:24', '13', 's'),
(34, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-27 10:28:43', '13', 's'),
(35, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-27 12:41:29', '13', 's'),
(36, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-30 13:18:08', '13', 's'),
(37, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-30 13:22:54', '13', 's'),
(38, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-31 06:05:02', '13', 's'),
(39, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-31 06:17:29', '13', 's'),
(40, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 18:54:32', 'usuario', 'sistema'),
(41, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 18:54:39', 'usuario', 'sistema'),
(42, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 18:56:30', 'usuario', 'sistema'),
(43, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 18:56:36', 'usuario', 'sistema'),
(44, 'cesarbello', '::1', 'Incluyo Registro', '2016-05-31 18:56:45', 'usuario', 'sistema'),
(45, 'luisg', '::1', 'Inicio Sesion', '2016-05-31 06:27:12', '13', 's'),
(46, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-31 06:28:59', '13', 's'),
(47, 'luisg', '::1', 'Inicio Sesion', '2016-05-31 06:30:15', '13', 's'),
(48, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-31 06:56:03', '13', 's'),
(49, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-31 06:58:32', '13', 's'),
(50, 'luisg', '::1', 'Inicio Sesion', '2016-05-31 06:59:02', '13', 's'),
(51, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-31 07:00:28', '13', 's'),
(52, 'luisg', '::1', 'Inicio Sesion', '2016-05-31 07:03:42', '13', 's'),
(53, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-05-31 07:05:17', '13', 's'),
(54, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-31 07:07:15', '13', 's'),
(55, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 19:58:37', 'usuario', 'sistema'),
(56, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:00:09', 'usuario', 'sistema'),
(57, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:00:43', 'usuario', 'sistema'),
(58, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:01:24', 'usuario', 'sistema'),
(59, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:01:43', 'usuario', 'sistema'),
(60, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:01:56', 'usuario', 'sistema'),
(61, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:02:03', 'usuario', 'sistema'),
(62, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:02:18', 'usuario', 'sistema'),
(63, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:02:21', 'usuario', 'sistema'),
(64, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:03:24', 'usuario', 'sistema'),
(65, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:03:36', 'usuario', 'sistema'),
(66, 'cesarbello', '::1', 'Busco Registro', '2016-05-31 20:04:41', 'usuario', 'sistema'),
(67, 'cesarbello', '::1', 'Incluyo Registro', '2016-05-31 20:05:26', 'usuario', 'sistema'),
(68, 'dexia', '::1', 'Inicio Sesion', '2016-05-31 07:37:21', '13', 's'),
(69, 'cesarbello', '::1', 'Inicio Sesion', '2016-05-31 07:37:57', '13', 's'),
(70, 'dexia', '::1', 'Inicio Sesion', '2016-05-31 07:41:13', '13', 's'),
(71, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-03 13:17:41', '13', 's'),
(72, 'dexia', '::1', 'Inicio Sesion', '2016-06-03 13:29:08', '13', 's'),
(73, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-03 13:40:50', '13', 's'),
(74, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-03 13:44:22', '13', 's'),
(75, 'dexia', '::1', 'Inicio Sesion', '2016-06-03 13:56:52', '13', 's'),
(76, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-03 14:32:15', '13', 's'),
(77, 'dexia', '::1', 'Inicio Sesion', '2016-06-03 14:34:10', '13', 's'),
(78, 'dexia', '::1', 'Inicio Sesion', '2016-06-06 14:34:55', '13', 's'),
(79, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-03 08:08:41', '13', 's'),
(80, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-03 08:08:53', '13', 's'),
(81, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-03 08:09:17', '13', 's'),
(82, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-03 08:10:01', '13', 's'),
(83, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-03 08:10:57', '13', 's'),
(84, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-03 08:11:23', '13', 's'),
(85, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-03 08:12:21', '13', 's'),
(86, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-03 08:20:03', '13', 's'),
(87, 'dexia', '::1', 'Inicio Sesion', '2016-06-03 08:20:29', '13', 's'),
(88, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-06 13:41:55', '13', 's'),
(89, 'dexia', '::1', 'Inicio Sesion', '2016-06-06 13:44:52', '13', 's'),
(90, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-08 12:02:13', '13', 's'),
(91, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-08 12:14:22', '13', 's'),
(92, 'cesarbello', '::1', 'Busco Registro', '2016-06-08 12:48:34', 'usuario', 'sistema'),
(93, 'cesarbello', '::1', 'Busco Registro', '2016-06-08 12:48:40', 'usuario', 'sistema'),
(94, 'cesarbello', '::1', 'Busco Registro', '2016-06-08 12:49:15', 'usuario', 'sistema'),
(95, 'cesarbello', '::1', 'Busco Registro', '2016-06-08 12:49:31', 'usuario', 'sistema'),
(96, 'cesarbello', '::1', 'Incluyo Registro', '2016-06-08 12:49:55', 'usuario', 'sistema'),
(97, 'yanerya', '::1', 'Inicio Sesion', '2016-06-08 12:20:32', '13', 's'),
(98, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-08 12:26:16', '13', 's'),
(99, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-08 12:29:18', '13', 's'),
(100, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-08 12:29:33', '13', 's'),
(101, 'yanerya', '::1', 'Inicio Sesion', '2016-06-08 12:33:46', '13', 's'),
(102, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-08 12:35:26', '13', 's'),
(103, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-08 13:00:29', '13', 's'),
(104, 'cesarbello', '::1', 'Busco Registro', '2016-06-08 13:32:22', 'usuario', 'sistema'),
(105, 'cesarbello', '::1', 'Busco Registro', '2016-06-08 13:32:32', 'usuario', 'sistema'),
(106, 'cesarbello', '::1', 'Busco Registro', '2016-06-08 13:32:45', 'usuario', 'sistema'),
(107, 'cesarbello', '::1', 'Incluyo Registro', '2016-06-08 13:32:54', 'usuario', 'sistema'),
(108, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-08 14:13:46', '13', 's'),
(109, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-08 14:18:33', '13', 's'),
(110, 'yanerya', '::1', 'Inicio Sesion', '2016-06-08 14:22:35', '13', 's'),
(111, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-08 14:26:20', '13', 's'),
(112, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-08 06:00:55', '13', 's'),
(113, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-08 06:48:10', '13', 's'),
(114, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-08 06:52:02', '13', 's'),
(115, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-11 05:48:11', '13', 's'),
(116, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-11 06:54:14', '13', 's'),
(117, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 16:12:47', '13', 's'),
(118, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 16:41:23', '13', 's'),
(119, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 11:30:44', '13', 's'),
(120, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-14 13:58:43', '13', 's'),
(121, 'cesarbello', '::1', 'Busco Registro', '2016-06-14 14:32:11', 'usuario', 'sistema'),
(122, 'cesarbello', '::1', 'Busco Registro', '2016-06-14 14:32:28', 'usuario', 'sistema'),
(123, 'cesarbello', '::1', 'Incluyo Registro', '2016-06-14 14:32:44', 'usuario', 'sistema'),
(124, 'cesarbello', '::1', 'Busco Registro', '2016-06-14 14:36:34', 'usuario', 'sistema'),
(125, 'crisyan', '::1', 'Inicio Sesion', '2016-06-14 14:08:03', '13', 's'),
(126, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 14:11:06', '13', 's'),
(127, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-14 08:05:48', '13', 's'),
(128, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 08:08:40', '13', 's'),
(129, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 08:45:18', '13', 's'),
(130, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 10:07:03', '13', 's'),
(131, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 10:38:54', '13', 's'),
(132, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 11:47:25', '13', 's'),
(133, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 11:49:37', '13', 's'),
(134, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 12:42:32', '13', 's'),
(135, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-14 13:43:30', '13', 's'),
(136, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-16 14:53:03', '13', 's'),
(137, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-16 11:08:08', '13', 's'),
(138, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-18 15:23:38', '13', 's'),
(139, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-21 13:09:05', '13', 's'),
(140, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-21 13:12:31', '13', 's'),
(141, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-21 13:14:02', '13', 's'),
(142, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-23 12:55:57', '13', 's'),
(143, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-23 12:58:06', '13', 's'),
(144, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-23 13:01:00', '13', 's'),
(145, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-23 13:03:06', '13', 's'),
(146, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-23 13:05:09', '13', 's'),
(147, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-23 13:52:45', '13', 's'),
(148, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-23 13:52:57', '13', 's'),
(149, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-23 13:58:21', '13', 's'),
(150, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-23 13:58:56', '13', 's'),
(151, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-23 14:07:33', '13', 's'),
(152, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-06-23 14:09:47', '13', 's'),
(153, 'claudiasoto', '::1', 'Bloqueado por intentos fallidos', '2016-06-23 14:10:33', '13', 's'),
(154, 'cesarbello', '::1', 'Inicio Sesion', '2016-06-23 14:11:04', '13', 's'),
(155, 'claudiasoto', '::1', 'Bloqueado por intentos fallidos', '2016-07-04 06:40:45', '13', 's'),
(156, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-04 06:42:32', '13', 's'),
(157, 'cesarbello', '::1', 'Inicio Sesion', '2016-07-04 06:45:13', '13', 's'),
(158, 'cesarbello', '::1', 'Busco Registro', '2016-07-04 19:36:41', 'usuario', 'sistema'),
(159, 'cesarbello', '::1', 'Busco Registro', '2016-07-04 19:36:48', 'usuario', 'sistema'),
(160, 'cesarbello', '::1', 'Incluyo Registro', '2016-07-04 19:37:15', 'usuario', 'sistema'),
(161, 'mariaocanto', '::1', 'Inicio Sesion', '2016-07-04 07:08:27', '13', 's'),
(162, 'mariaocanto', '::1', 'Inicio Sesion', '2016-07-04 07:13:57', '13', 's'),
(163, 'cesarbello', '::1', 'Busco Registro', '2016-07-04 19:46:52', 'usuario', 'sistema'),
(164, 'cesarbello', '::1', 'Busco Registro', '2016-07-04 19:47:08', 'usuario', 'sistema'),
(165, 'cesarbello', '::1', 'Incluyo Registro', '2016-07-04 19:47:18', 'usuario', 'sistema'),
(166, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2016-07-04 07:19:58', '13', 's'),
(167, 'mariaocanto', '::1', 'Inicio Sesion', '2016-07-04 07:27:30', '13', 's'),
(168, 'cesarbello', '::1', 'Inicio Sesion', '2016-07-04 07:33:35', '13', 's'),
(169, 'claudiasoto', '::1', 'Bloqueado por intentos fallidos', '2016-07-04 07:49:26', '13', 's'),
(170, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-04 07:56:23', '13', 's'),
(171, 'cesarbello', '::1', 'Inicio Sesion', '2016-07-04 08:10:34', '13', 's'),
(172, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-04 08:14:24', '13', 's'),
(173, 'mariaocanto', '::1', 'Inicio Sesion', '2016-07-08 12:59:30', '13', 's'),
(174, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-08 13:04:33', '13', 's'),
(175, 'cesarbello', '::1', 'Inicio Sesion', '2016-07-08 13:11:15', '13', 's'),
(176, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-08 13:12:37', '13', 's'),
(177, 'cesarbello', '::1', 'Inicio Sesion', '2016-07-14 06:08:58', '13', 's'),
(178, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-14 06:09:21', '13', 's'),
(179, 'mariaocanto', '::1', 'Inicio Sesion', '2016-07-14 06:11:23', '13', 's'),
(180, 'mariaocanto', '::1', 'Inicio Sesion', '2016-07-14 06:13:05', '13', 's'),
(181, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2016-07-14 06:13:26', '13', 's'),
(182, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-14 06:14:09', '13', 's'),
(183, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2016-07-14 06:19:43', '13', 's'),
(184, 'mariaocanto', '::1', 'Inicio Sesion', '2016-07-14 06:20:42', '13', 's'),
(185, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-14 06:21:09', '13', 's'),
(186, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2016-07-14 06:25:50', '13', 's'),
(187, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-14 06:34:55', '13', 's'),
(188, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-14 06:37:46', '13', 's'),
(189, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2016-07-14 07:19:31', '13', 's'),
(190, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-14 07:20:06', '13', 's'),
(191, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2016-07-14 07:21:03', '13', 's'),
(192, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-07-14 08:11:50', '13', 's'),
(193, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-08-18 14:54:48', '13', 's'),
(194, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2016-08-18 15:05:40', '13', 's'),
(195, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-08-19 11:12:41', '13', 's'),
(196, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2016-08-19 11:22:00', '13', 's'),
(197, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2016-08-24 14:27:56', '13', 's'),
(198, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-06 12:41:03', '13', 's'),
(199, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-10 08:23:46', '13', 's'),
(200, 'cesarbello', '::1', 'Inicio Sesion', '2017-01-10 09:14:17', '13', 's'),
(201, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-10 10:01:27', '13', 's'),
(202, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-24 14:36:41', '13', 's'),
(203, 'VALENTINASOTO', '192.168.1.104', 'Inicio Sesion', '2017-01-24 15:26:12', '13', 's'),
(204, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-24 15:26:44', '13', 's'),
(205, 'VALENTINASOTO', '192.168.1.104', 'Inicio Sesion', '2017-01-24 04:06:39', '13', 's'),
(206, 'cesarbello', '::1', 'Inicio Sesion', '2017-01-24 04:09:28', '13', 's'),
(207, 'VALENTINASOTO', '192.168.1.104', 'Inicio Sesion', '2017-01-24 04:32:47', '13', 's'),
(208, 'CLAUDIASOTO', '192.168.1.104', 'Inicio Sesion', '2017-01-24 04:38:01', '13', 's'),
(209, 'VALENTINASOTO', '192.168.1.104', 'Inicio Sesion', '2017-01-24 04:44:26', '13', 's'),
(210, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-24 04:45:53', '13', 's'),
(211, 'CLAUDIASOTO', '192.168.1.104', 'Inicio Sesion', '2017-01-24 04:58:59', '13', 's'),
(212, 'VALENTINASOTO', '192.168.1.104', 'Inicio Sesion', '2017-01-24 05:29:06', '13', 's'),
(213, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-24 05:30:48', '13', 's'),
(214, 'MARIAOCANTO', '192.168.1.104', 'Inicio Sesion', '2017-01-24 06:11:19', '13', 's'),
(215, 'VALENTINASOTO', '192.168.1.104', 'Inicio Sesion', '2017-01-24 06:15:06', '13', 's'),
(216, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-01-25 05:08:31', '13', 's'),
(217, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-25 05:32:49', '13', 's'),
(218, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-01-25 05:35:01', '13', 's'),
(219, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-30 13:18:45', '13', 's'),
(220, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-30 13:41:58', '13', 's'),
(221, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-01-31 05:28:43', '13', 's'),
(222, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-01-31 05:42:46', '13', 's'),
(223, 'CLAUDIASOTO', '192.168.1.102', 'Inicio Sesion', '2017-02-02 14:50:47', '13', 's'),
(224, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-04 14:23:35', '13', 's'),
(225, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-05 04:56:37', '13', 's'),
(226, 'CLAUDIASOTO', '192.168.0.100', 'Inicio Sesion', '2017-02-06 14:19:10', '13', 's'),
(227, 'CLAUDIASOTO', '192.168.0.100', 'Inicio Sesion', '2017-02-06 14:21:11', '13', 's'),
(228, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-06 14:38:35', '13', 's'),
(229, 'VALENTINASOTO', '192.168.0.100', 'Inicio Sesion', '2017-02-06 14:38:56', '13', 's'),
(230, 'CLAUDIASOTO', '192.168.0.101', 'Inicio Sesion', '2017-02-07 11:33:42', '13', 's'),
(231, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-08 13:58:29', '13', 's'),
(232, 'cesarbello', '::1', 'Inicio Sesion', '2017-02-09 05:09:37', '13', 's'),
(233, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-09 05:25:54', '13', 's'),
(234, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-02-09 05:27:13', '13', 's'),
(235, 'cesarbello', '::1', 'Inicio Sesion', '2017-02-09 06:02:28', '13', 's'),
(236, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-09 07:31:27', '13', 's'),
(237, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-09 10:22:58', '13', 's'),
(238, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-10 11:35:27', '13', 's'),
(239, 'cesarbello', '::1', 'Inicio Sesion', '2017-02-10 11:48:48', '13', 's'),
(240, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-02-10 11:51:49', '13', 's'),
(241, 'cesarbello', '::1', 'Inicio Sesion', '2017-02-10 12:07:48', '13', 's'),
(242, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-10 11:23:49', '13', 's'),
(243, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-02-11 14:48:34', '13', 's'),
(244, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-11 15:06:28', '13', 's'),
(245, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-15 13:28:53', '13', 's'),
(246, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-02-15 10:08:28', '13', 's'),
(247, 'cesarbello', '::1', 'Inicio Sesion', '2017-02-15 10:13:37', '13', 's'),
(248, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-15 14:19:30', '13', 's'),
(249, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-15 14:33:08', '13', 's'),
(250, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-02-15 14:49:12', '13', 's'),
(251, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-20 15:36:15', '13', 's'),
(252, 'cesarbello', '::1', 'Inicio Sesion', '2017-02-20 06:18:27', '13', 's'),
(253, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-20 06:45:27', '13', 's'),
(254, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-02-20 06:46:54', '13', 's'),
(255, 'MARIAOCANTO', '::1', 'Inicio Sesion', '2017-02-20 06:49:48', '13', 's'),
(256, 'CLAUDIASOTO', '::1', 'Inicio Sesion', '2017-02-20 06:50:28', '13', 's'),
(257, 'VALENTINASOTO', '::1', 'Inicio Sesion', '2017-02-20 06:51:16', '13', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacidad`
--

CREATE TABLE IF NOT EXISTS `capacidad` (
`idcapacidad` int(4) NOT NULL,
  `capacidad` int(10) DEFAULT NULL,
  `idunidad_medida` int(4) NOT NULL,
  `estatus_cap` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `capacidad`
--

INSERT INTO `capacidad` (`idcapacidad`, `capacidad`, `idunidad_medida`, `estatus_cap`) VALUES
(1, 8, 1, '1'),
(2, 12, 1, '1'),
(3, 30, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_costo`
--

CREATE TABLE IF NOT EXISTS `centro_costo` (
`idcentro_costo` int(11) NOT NULL,
  `descripcion_cencos` varchar(70) DEFAULT NULL,
  `precio_cencos` decimal(12,2) DEFAULT NULL,
  `estatus_cencos` int(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `centro_costo`
--

INSERT INTO `centro_costo` (`idcentro_costo`, `descripcion_cencos`, `precio_cencos`, `estatus_cencos`) VALUES
(1, 'TAXI', '800.00', 0),
(2, 'COMIDA', '900.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
`idciudad` int(12) NOT NULL,
  `desc_ciud` varchar(20) DEFAULT NULL,
  `codi_posta_ciu` int(4) DEFAULT NULL,
  `estatus_ciu` varchar(45) DEFAULT '1',
  `idparroquia` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=508 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idciudad`, `desc_ciud`, `codi_posta_ciu`, `estatus_ciu`, `idparroquia`) VALUES
(1, 'Maroa', 7001, '1', 26),
(2, 'Puerto Ayacucho', 7001, '1', 10),
(3, 'San Fernando de Atab', 7001, '1', 11),
(4, 'Anaco', 7101, '1', 190),
(5, 'Aragua de Barcelona', 7101, '1', 29),
(6, 'Barcelona', 7101, '1', 190),
(7, 'Boca de Uchire', 7101, '1', 70),
(8, 'Cantaura', 7101, '1', 190),
(9, 'Clarines', 7101, '1', 330),
(10, 'El Chaparro', 6008, '1', 37),
(11, 'El Pao Anzoategui', 6001, '1', 60),
(12, 'El Tigre', 6012, '1', 29),
(13, 'El Tigrito', 6050, '1', 68),
(14, 'Guanape', 6012, '1', 331),
(15, 'Guanta', 6014, '1', 40),
(16, 'Lecheria', 6016, '1', 30),
(17, 'Onoto', 6020, '1', 52),
(18, 'Pariaguan', 6052, '1', 61),
(19, 'Piritu', 6022, '1', 66),
(20, 'Puerto La Cruz', 6023, '1', 50),
(21, 'Puerto Piritu', 6022, '1', 32),
(22, 'Sabana de Uchire', 6001, '1', 332),
(23, 'San Mateo Anzoategui', 6048, '1', 54),
(24, 'San Pablo Anzoategui', 2, '1', 53),
(25, 'San Tome', 6007, '1', 62),
(26, 'Santa Ana de Anzoate', 6027, '1', 72),
(27, 'Santa Fe Anzoategui', 6001, '1', 590),
(28, 'Santa Rosa', 6001, '1', 778),
(29, 'Soledad', 8013, '1', 43),
(30, 'Urica', 6001, '1', 65),
(31, 'Valle de Guanape', 6032, '1', 35),
(43, 'Achaguas', 7002, '1', 81),
(44, 'Biruaca', 7007, '1', 87),
(45, 'Bruzual', 7005, '1', 88),
(46, 'El Amparo', 7001, '1', 95),
(47, 'El Nula', 7001, '1', 96),
(48, 'Elorza', 7011, '1', 101),
(49, 'Guasdualito', 7001, '1', 93),
(50, 'Mantecal', 7010, '1', 89),
(51, 'Puerto Paez', 7001, '1', 99),
(52, 'San Fernando de Apur', 7001, '1', 103),
(53, 'San Juan de Payara', 7004, '1', 98),
(54, 'Barbacoas', 2301, '1', 151),
(55, 'Cagua', 2122, '1', 145),
(56, 'Camatagua', 2335, '1', 116),
(58, 'Choroni', 2110, '1', 114),
(59, 'Colonia Tovar', 1030, '1', 9),
(60, 'El Consejo', 2118, '1', 107),
(61, 'La Victoria', 2105, '1', 1111),
(62, 'Las Tejerias', 2119, '1', 144),
(63, 'Magdaleno', 2128, '1', 153),
(64, 'Maracay', 2104, '1', 110),
(65, 'Ocumare de La Costa', 2112, '1', 132),
(66, 'Palo Negro', 2117, '1', 128),
(67, 'San Casimiro', 2338, '1', 133),
(68, 'San Mateo', 2120, '1', 54),
(69, 'San Sebastian', 2340, '1', 872),
(70, 'Santa Cruz de Aragua', 2123, '1', 121),
(71, 'Tocoron', 2101, '1', 153),
(72, 'Turmero', 2115, '1', 138),
(73, 'Villa de Cura', 2126, '1', 153),
(74, 'Zuata', 2127, '1', 126),
(75, 'Barinas', 5201, '1', 169),
(76, 'Barinitas', 5206, '1', 183),
(77, 'Barrancas', 5201, '1', 186),
(78, 'Calderas', 5207, '1', 355),
(79, 'Capitanejo', 5201, '1', 190),
(80, 'Ciudad Bolivia', 5214, '1', 197),
(81, 'El Canton', 5201, '1', 159),
(82, 'Las Veguitas', 5201, '1', 181),
(83, 'Libertad de Barinas', 5220, '1', 1055),
(84, 'Sabaneta', 5224, '1', 157),
(85, 'Santa Barbara de Bar', 5210, '1', 189),
(86, 'Socopo', 5216, '1', 162),
(87, 'Caicara del Orinoco', 8007, '1', 222),
(88, 'Canaima', 8007, '1', 115),
(89, 'Ciudad Bolivar', 8001, '1', 1),
(90, 'Ciudad Piar', 8003, '1', 318),
(91, 'El Callao', 8056, '1', 226),
(92, 'El Dorado', 8050, '1', 854),
(93, 'El Manteco', 8050, '1', 239),
(94, 'El Palmar', 8054, '1', 254),
(95, 'El Pao', 8050, '1', 301),
(96, 'Guasipati', 8050, '1', 244),
(97, 'Guri', 8001, '1', 239),
(98, 'La Paragua', 8001, '1', 235),
(99, 'Matanzas', 8001, '1', 235),
(100, 'Puerto Ordaz', 8050, '1', 214),
(101, 'San Felix', 8051, '1', 213),
(102, 'Santa Elena de Uaire', 8011, '1', 574),
(103, 'Tumeremo', 8057, '1', 211),
(104, 'Unare', 8001, '1', 214),
(105, 'Upata', 8052, '1', 45),
(106, 'Bejuma', 2040, '1', 256),
(107, 'Belen', 2001, '1', 259),
(108, 'Campo de Carabobo', 2035, '1', 274),
(109, 'Canoabo', 2040, '1', 257),
(110, 'Central Tacarigua', 2003, '1', 261),
(111, 'Chirgua', 2044, '1', 213),
(112, 'Ciudad Alianza', 2001, '1', 265),
(113, 'El Palito', 2050, '1', 267),
(114, 'Guacara', 2015, '1', 265),
(115, 'Guigue', 2010, '1', 259),
(116, 'Las Trincheras', 2005, '1', 274),
(117, 'Los Guayos', 2003, '1', 271),
(118, 'Mariara', 2001, '1', 262),
(119, 'Miranda', 2041, '1', 272),
(120, 'Montalban', 2042, '1', 273),
(121, 'Moron', 2051, '1', 267),
(122, 'Naguanagua', 2001, '1', 274),
(123, 'Puerto Cabello', 2050, '1', 275),
(124, 'San Joaquin', 2018, '1', 284),
(125, 'Tocuyito', 2035, '1', 269),
(126, 'Urama', 2001, '1', 267),
(127, 'Valencia', 2001, '1', 288),
(128, 'Vigirimita', 2001, '1', 265),
(129, 'Aguirre', 6401, '1', 708),
(130, 'Apartaderos Cojedes', 2201, '1', 295),
(131, 'Arismendi', 2213, '1', 700),
(132, 'Camuriquito', 6401, '1', 305),
(133, 'El Baul', 2213, '1', 297),
(134, 'El Limon', 6401, '1', 294),
(135, 'El Pao Cojedes', 2214, '1', 301),
(136, 'El Socorro', 6401, '1', 295),
(137, 'La Aguadita', 2207, '1', 299),
(138, 'Las Vegas', 2204, '1', 303),
(139, 'Libertad de Cojedes', 2216, '1', 303),
(140, 'Mapuey', 6401, '1', 305),
(141, 'Piñedo', 6401, '1', 301),
(142, 'Samancito', 6401, '1', 303),
(143, 'San Carlos', 2201, '1', 305),
(144, 'Sucre', 6401, '1', 403),
(145, 'Tinaco', 2206, '1', 308),
(146, 'Tinaquillo', 2209, '1', 296),
(147, 'Vallecito', 2207, '1', 296),
(148, 'Tucupita', 9, '1', 900),
(149, 'Caracas', 1000, '1', 1118),
(150, 'El Junquito', 1020, '1', 1122),
(151, 'Adicora', 4101, '1', 364),
(152, 'Boca de Aroa', 4101, '1', 380),
(153, 'Cabure', 4101, '1', 397),
(154, 'Capadare', 4101, '1', 333),
(155, 'Capatarida', 4118, '1', 394),
(156, 'Chichiriviche', 2054, '1', 394),
(157, 'Churuguara', 4152, '1', 416),
(158, 'Coro', 4101, '1', 352),
(159, 'Cumarebo', 4167, '1', 411),
(160, 'Dabajuro', 4118, '1', 357),
(161, 'Judibana', 4101, '1', 382),
(162, 'La Cruz de Taratara', 4114, '1', 404),
(163, 'La Vela de Coro', 4132, '1', 352),
(164, 'Los Taques', 4101, '1', 381),
(165, 'Maparari', 4104, '1', 375),
(166, 'Mene de Mauroa', 4117, '1', 383),
(167, 'Mirimire', 4110, '1', 243),
(168, 'Pedregal', 4137, '1', 360),
(169, 'Piritu Falcon', 4101, '1', 400),
(170, 'Pueblo Nuevo Falcon', 4101, '1', 371),
(171, 'Puerto Cumarebo', 4167, '1', 411),
(172, 'Punta Cardon', 4154, '1', 351),
(173, 'Punto Fijo', 4102, '1', 351),
(174, 'San Juan de Los Cayo', 2054, '1', 336),
(175, 'San Luis', 4109, '1', 977),
(176, 'Santa Ana Falcon', 4102, '1', 350),
(177, 'Santa Cruz De Bucara', 4101, '1', 408),
(178, 'Tocopero', 4101, '1', 405),
(179, 'Tocuyo de La Costa', 4101, '1', 395),
(180, 'Tucacas', 4101, '1', 379),
(181, 'Yaracal', 4101, '1', 1067),
(182, 'Altagracia de Orituc', 2320, '1', 424),
(183, 'Cabruta', 8007, '1', 437),
(184, 'Calabozo', 2312, '1', 456),
(185, 'Camaguan', 2301, '1', 417),
(196, 'Chaguaramas Guarico', 2358, '1', 420),
(197, 'El Socorro', 2355, '1', 421),
(198, 'El Sombrero', 2319, '1', 434),
(199, 'Las Mercedes de Los ', 2356, '1', 437),
(200, 'Lezama', 2301, '1', 426),
(201, 'Onoto', 2301, '1', 748),
(202, 'Ortiz', 2302, '1', 446),
(203, 'San Jose de Guaribe', 2301, '1', 449),
(204, 'San Juan de Los Morr', 2301, '1', 432),
(205, 'San Rafael de Laya', 2301, '1', 423),
(206, 'Santa Maria de Ipire', 2354, '1', 451),
(207, 'Tucupido', 2301, '1', 422),
(208, 'Valle de La Pascua', 2350, '1', 439),
(209, 'Zaraza', 2332, '1', 442),
(210, 'Aguada Grande', 3031, '1', 97),
(211, 'Atarigua', 3350, '1', 97),
(214, 'Cabudare', 3023, '1', 488),
(215, 'Carora', 3050, '1', 507),
(217, 'Cuji', 3050, '1', 464),
(218, 'Duaca', 3025, '1', 108),
(220, 'El Tocuyo', 3054, '1', 393),
(221, 'Guarico', 3057, '1', 482),
(222, 'Humocaro Alto', 3058, '1', 484),
(223, 'Humocaro Bajo', 3058, '1', 485),
(225, 'Moroturo', 3001, '1', 97),
(227, 'Rio Claro', 3009, '1', 465),
(228, 'Sanare', 3028, '1', 457),
(229, 'Santa Ines', 3001, '1', 97),
(230, 'Sarare', 3015, '1', 679),
(231, 'Siquisique', 3001, '1', 511),
(232, 'Tintorero', 3001, '1', 513),
(233, 'Apartaderos Merida', 5130, '1', 554),
(234, 'Arapuey', 5101, '1', 549),
(235, 'Bailadores', 5133, '1', 583),
(236, 'Caja Seca', 5101, '1', 763),
(237, 'Canagua', 5154, '1', 528),
(238, 'Chachopo', 3112, '1', 571),
(239, 'Chiguara', 5138, '1', 585),
(240, 'Ejido', 5111, '1', 535),
(241, 'El Vigia', 5145, '1', 517),
(242, 'La Azulita', 5102, '1', 818),
(243, 'La Playa', 5143, '1', 582),
(244, 'Lagunillas Merida', 5138, '1', 585),
(245, 'Merida', 5101, '1', 515),
(246, 'Mesa de Bolivar', 5141, '1', 525),
(247, 'Mucuchies', 5130, '1', 579),
(248, 'Mucujepe', 5101, '1', 517),
(249, 'Mucuruba', 5129, '1', 580),
(250, 'Nueva Bolivia', 5101, '1', 597),
(251, 'Palmarito', 5101, '1', 595),
(252, 'Pueblo Llano', 5124, '1', 576),
(253, 'Santa Cruz de Mora', 5142, '1', 523),
(254, 'Santa Elena de Arena', 5101, '1', 574),
(255, 'Santo Domingo', 5131, '1', 833),
(256, 'Tabay', 5101, '1', 518),
(257, 'Timotes', 3112, '1', 571),
(258, 'Torondoy', 13, '1', 552),
(259, 'Tovar', 5143, '1', 594),
(260, 'Tucani', 5101, '1', 517),
(261, 'Zea', 5144, '1', 600),
(262, 'Araguita', 1221, '1', 601),
(263, 'Carrizal', 1203, '1', 618),
(264, 'Caucagua', 1246, '1', 604),
(265, 'Chaguaramas Miranda', 1221, '1', 672),
(266, 'Charallave', 1210, '1', 620),
(267, 'Chirimena', 1231, '1', 614),
(268, 'Chuspa', 1231, '1', 981),
(269, 'Cua', 1211, '1', 652),
(270, 'Cupira', 1238, '1', 642),
(271, 'Curiepe', 1232, '1', 615),
(272, 'El Guapo', 1243, '1', 637),
(273, 'El Jarillo', 1221, '1', 626),
(274, 'Filas de Mariche', 1221, '1', 650),
(275, 'Guarenas', 1220, '1', 644),
(276, 'Guatire', 1221, '1', 654),
(277, 'Higuerote', 1231, '1', 614),
(278, 'Los Anaucos', 1221, '1', 647),
(279, 'Los Teques', 1201, '1', 625),
(280, 'Ocumare del Tuy', 1209, '1', 633),
(281, 'Panaquire', 1221, '1', 605),
(282, 'Paracotos', 1201, '1', 629),
(283, 'Rio Chico', 1236, '1', 636),
(284, 'San Antonio de Los A', 1204, '1', 635),
(285, 'San Diego de Los Alt', 1204, '1', 624),
(286, 'San Fernando del Gua', 1243, '1', 640),
(287, 'San Francisco de Yar', 1212, '1', 646),
(288, 'San Jose de Los Alto', 1204, '1', 900),
(289, 'San Jose de Rio Chic', 1235, '1', 642),
(290, 'San Pedro de Los Alt', 1204, '1', 1069),
(291, 'Santa Lucia', 1214, '1', 1080),
(292, 'Santa Teresa', 1215, '1', 1136),
(293, 'Tacarigua de La Lagu', 1236, '1', 638),
(294, 'Tacarigua de Mampora', 1228, '1', 616),
(295, 'Tacata', 1211, '1', 628),
(296, 'Turumo', 1211, '1', 616),
(297, 'Aguasay', 6201, '1', 658),
(298, 'Aragua de Maturin', 6206, '1', 687),
(299, 'Barrancas del Orinoc', 6208, '1', 696),
(300, 'Caicara de Maturin', 6209, '1', 667),
(301, 'Caripe', 6210, '1', 665),
(302, 'Caripito', 6211, '1', 659),
(303, 'Chaguaramal', 6201, '1', 672),
(305, 'Chaguaramas Monagas', 6201, '1', 672),
(307, 'El Furrial', 6201, '1', 682),
(308, 'El Tejero', 6213, '1', 670),
(309, 'Jusepin', 6204, '1', 683),
(310, 'La Toscana', 6215, '1', 691),
(311, 'Maturin', 6201, '1', 687),
(312, 'Miraflores', 6216, '1', 1086),
(313, 'Punta de Mata', 6201, '1', 671),
(314, 'Quiriquire', 6201, '1', 694),
(315, 'San Antonio de Matur', 6219, '1', 656),
(316, 'San Vicente Monagas', 6201, '1', 685),
(317, 'Santa Barbara', 6221, '1', 695),
(318, 'Temblador', 6223, '1', 675),
(319, 'Teresen', 6224, '1', 664),
(320, 'Uracoa', 6201, '1', 698),
(321, 'Altagracia', 6301, '1', 807),
(322, 'Boca de Pozo', 6301, '1', 836),
(323, 'Boca de Rio', 6301, '1', 715),
(324, 'El Espinal', 6301, '1', 720),
(325, 'El Valle del Espirit', 6301, '1', 702),
(326, 'El Yaque', 6301, '1', 702),
(327, 'Juangriego', 6309, '1', 711),
(328, 'La Asuncion', 6301, '1', 713),
(329, 'La Guardia', 6301, '1', 713),
(330, 'Pampatar', 6316, '1', 713),
(331, 'Porlamar', 6309, '1', 713),
(332, 'Puerto Fermin', 6301, '1', 713),
(333, 'Punta de Piedras', 6318, '1', 817),
(334, 'San Francisco de Mac', 6309, '1', 714),
(335, 'San Juan Bautista', 6309, '1', 720),
(336, 'San Pedro de Coche', 6309, '1', 822),
(337, 'Santa Ana de Nueva E', 6309, '1', 943),
(338, 'Villa Rosa', 6309, '1', 757),
(339, 'Acarigua', 3301, '1', 200),
(341, 'Araure', 3303, '1', 722),
(342, 'Biscucuy', 3351, '1', 249),
(343, 'Boconoito', 3355, '1', 745),
(345, 'Chabasquen', 3357, '1', 734),
(346, 'Guanare', 3350, '1', 726),
(347, 'Guanarito', 3354, '1', 731),
(348, 'La Aparicion', 3309, '1', 736),
(349, 'La Mision', 3301, '1', 88),
(351, 'Ospino', 3352, '1', 736),
(352, 'Papelon', 3353, '1', 743),
(353, 'Payara', 3301, '1', 740),
(354, 'Pimpinela', 3304, '1', 741),
(355, 'Piritu de Portuguesa', 3305, '1', 724),
(356, 'San Rafael de Onoto', 3306, '1', 747),
(357, 'Santa Rosalia', 3307, '1', 1135),
(358, 'Turen', 3307, '1', 88),
(359, 'Altos de Sucre', 6123, '1', 707),
(360, 'Araya', 6102, '1', 787),
(361, 'Cariaco', 6126, '1', 802),
(362, 'Carupano', 6150, '1', 981),
(363, 'Casanay', 6168, '1', 568),
(364, 'Cumana', 6101, '1', 767),
(365, 'Cumanacoa', 6106, '1', 796),
(366, 'El Morro Puerto Sant', 6163, '1', 768),
(367, 'El Pilar', 6152, '1', 771),
(368, 'El Poblado', 6150, '1', 190),
(369, 'Guaca', 6150, '1', 265),
(370, 'Guiria', 6161, '1', 752),
(371, 'Irapa', 6156, '1', 790),
(372, 'Manicuare', 6150, '1', 787),
(373, 'Mariguitar', 6107, '1', 876),
(374, 'Rio Caribe', 6164, '1', 766),
(375, 'San Antonio del Golf', 6110, '1', 793),
(376, 'San Jose de Aerocuar', 18, '1', 764),
(377, 'San Vicente de Sucre', 6150, '1', 685),
(378, 'Santa Fe de Sucre', 6101, '1', 748),
(379, 'Tunapuy', 6154, '1', 788),
(380, 'Yaguaraparo', 6155, '1', 712),
(381, 'Yoco', 6150, '1', 816),
(382, 'Abejales', 5002, '1', 854),
(383, 'Borota', 5033, '1', 341),
(384, 'Bramon', 5020, '1', 849),
(385, 'Capacho', 5020, '1', 575),
(386, 'Colon', 5003, '1', 814),
(387, 'Coloncito', 5038, '1', 814),
(388, 'Cordero', 5012, '1', 145),
(389, 'El Cobre', 5021, '1', 154),
(390, 'El Pinal', 5032, '1', 476),
(391, 'Independencia', 603, '1', 476),
(392, 'La Fria', 5020, '1', 996),
(393, 'La Grita', 5022, '1', 836),
(394, 'La Pedrera', 5002, '1', 1014),
(395, 'La Tendida', 5038, '1', 878),
(396, 'Las Delicias', 5030, '1', 113),
(397, 'Las Hernandez', 5001, '1', 868),
(398, 'Lobatera', 5036, '1', 857),
(399, 'Michelena', 5037, '1', 859),
(400, 'Palmira', 5015, '1', 550),
(401, 'Pregonero', 5058, '1', 882),
(402, 'Queniquea', 5001, '1', 613),
(403, 'Rubio', 5030, '1', 1115),
(404, 'San Antonio del Tach', 5007, '1', 1086),
(405, 'San Cristobal', 5001, '1', 869),
(406, 'San Jose de Bolivar', 19, '1', 756),
(407, 'San Josecito', 5001, '1', 756),
(408, 'San Pedro del Rio', 5003, '1', 822),
(409, 'Santa Ana Tachira', 5051, '1', 943),
(410, 'Seboruco', 5027, '1', 874),
(411, 'Tariba', 5017, '1', 827),
(412, 'Umuquena', 5001, '1', 884),
(413, 'Ureña', 5048, '1', 862),
(414, 'Batatal', 3101, '1', 810),
(415, 'Betijoque', 3101, '1', 947),
(416, 'Bocono', 3101, '1', 867),
(417, 'Carache', 3123, '1', 911),
(418, 'Chejende', 3124, '1', 908),
(419, 'Cuicas', 3125, '1', 913),
(420, 'El Dividive', 3107, '1', 929),
(421, 'El Jaguito', 3101, '1', 886),
(422, 'Escuque', 3105, '1', 916),
(423, 'Isnoti', 3109, '1', 948),
(424, 'Jajo', 3145, '1', 967),
(425, 'La Ceiba', 3108, '1', 927),
(426, 'La Concepcion de Tru', 3150, '1', 912),
(427, 'La Mesa de Esnujaque', 3146, '1', 968),
(428, 'La Puerta', 3106, '1', 974),
(429, 'La Quebrada', 3147, '1', 971),
(430, 'Mendoza Fria', 3122, '1', 975),
(431, 'Meseta de Chimpire', 3150, '1', 954),
(432, 'Monay', 3153, '1', 940),
(433, 'Motatan', 3140, '1', 937),
(434, 'Pampan', 3151, '1', 940),
(435, 'Pampanito', 3152, '1', 944),
(436, 'Sabana de Mendoza', 3110, '1', 955),
(437, 'San Lazaro', 3154, '1', 959),
(438, 'Santa Ana de Trujill', 3156, '1', 706),
(439, 'Tostos', 3101, '1', 706),
(440, 'Trujillo', 3150, '1', 959),
(441, 'Valera', 3101, '1', 933),
(442, 'Carayaca', 1168, '1', 979),
(443, 'Litoral', 1160, '1', 987),
(444, 'Archipielago Los Roq', 0, '1', 987),
(445, 'Aroa', 3210, '1', 380),
(446, 'Boraure', 3201, '1', 996),
(447, 'Campo Elias de Yarac', 3209, '1', 992),
(448, 'Chivacoa', 3202, '1', 991),
(449, 'Cocorote', 3201, '1', 993),
(450, 'Farriar', 3222, '1', 1009),
(461, 'Bachaquero', 4014, '1', 957),
(462, 'Bobures', 3158, '1', 1004),
(463, 'Cabimas', 4013, '1', 1010),
(464, 'Campo Concepcion', 4032, '1', 1048),
(465, 'Campo Mara', 4044, '1', 1059),
(466, 'Campo Rojo', 4001, '1', 587),
(467, 'Carrasquero', 4044, '1', 1011),
(468, 'Casigua', 4001, '1', 1042),
(469, 'Chiquinquira', 4033, '1', 1046),
(470, 'Ciudad Ojeda', 4019, '1', 1050),
(471, 'El Batey', 3101, '1', 1004),
(472, 'El Carmelo', 4001, '1', 1046),
(473, 'El Chivo', 4001, '1', 1035),
(474, 'El Guayabo', 5101, '1', 1028),
(475, 'El Mene', 4020, '1', 1098),
(476, 'El Venado', 4022, '1', 1017),
(477, 'Encontrados', 5101, '1', 1027),
(478, 'Gibraltar', 4001, '1', 1005),
(479, 'Isla de Toas', 4031, '1', 1010),
(480, 'La Concepcion del Zu', 4001, '1', 1039),
(481, 'La Paz', 4001, '1', 1041),
(482, 'La Sierrita', 4001, '1', 1059),
(483, 'Lagunillas del Zulia', 4016, '1', 1050),
(484, 'Las Piedras de Perij', 4021, '1', 1057),
(485, 'Los Cortijos', 4001, '1', 1095),
(486, 'Machiques', 4021, '1', 1054),
(487, 'Maracaibo', 4001, '1', 1066),
(488, 'Mene Grande', 4015, '1', 1014),
(489, 'Palmarejo', 4033, '1', 1100),
(490, 'Paraguaipoa', 4037, '1', 1114),
(491, 'Potrerito', 4001, '1', 1048),
(492, 'Pueblo Nuevo del Zul', 4015, '1', 1016),
(493, 'Puertos de Altagraci', 4001, '1', 1083),
(494, 'Punta Gorda', 4013, '1', 1025),
(495, 'Sabaneta de Palma', 4001, '1', 1039),
(496, 'San Francisco', 4001, '1', 1091),
(497, 'San Jose de Perija', 4021, '1', 1057),
(498, 'San Rafael del Mojan', 4021, '1', 1058),
(499, 'San Timoteo', 4018, '1', 1012),
(503, 'Santa Rita', 4020, '1', 1097),
(507, 'Villa del Rosario', 4047, '1', 1089);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` varchar(10) NOT NULL,
  `nombre_cli` varchar(300) DEFAULT NULL,
  `apellido_cli` varchar(45) DEFAULT NULL,
  `sector_cli` varchar(45) DEFAULT NULL,
  `origen_cli` varchar(45) DEFAULT NULL,
  `direccion_cli` varchar(300) DEFAULT NULL,
  `telefono_cli` bigint(11) DEFAULT NULL,
  `telefono_movil_cli` bigint(11) DEFAULT NULL,
  `pag_web_cli` varchar(300) DEFAULT NULL,
  `correo_cli` varchar(300) DEFAULT NULL,
  `nro_fax_cli` int(11) DEFAULT NULL,
  `idtipo_cliente_cli` int(2) NOT NULL,
  `idtipo_contribuyente_cli` int(2) NOT NULL,
  `idtipo_proveedor_cli` int(2) NOT NULL,
  `estatus_cli` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre_cli`, `apellido_cli`, `sector_cli`, `origen_cli`, `direccion_cli`, `telefono_cli`, `telefono_movil_cli`, `pag_web_cli`, `correo_cli`, `nro_fax_cli`, `idtipo_cliente_cli`, `idtipo_contribuyente_cli`, `idtipo_proveedor_cli`, `estatus_cli`) VALUES
('j10563681', 'SIDERURGICA', '', 'privado', 'Nacional', 'AV.LOS CAOBOS', 2557869876, 4267865489, 'SIDER.COM', 'SIDER@GMAIL.COM', 2147483647, 4, 2, 3, '1'),
('J20563681', 'SIDOR', '', 'PRIVADO', 'Nacional', 'VENEZUELA BOLIVAR', 2556223954, 4264086527, '', 'contacto@sidor.com', 0, 4, 1, 1, '1'),
('j21563703', 'INVERSIONES LUIS', '', 'privado', 'Nacional', 'CENTRO COMERCIAL SOL', 2557869876, 4145678767, 'LUIS.COM', '', 1233343, 4, 1, 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_respaldo`
--

CREATE TABLE IF NOT EXISTS `config_respaldo` (
`id_rconfig` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_banco`
--

CREATE TABLE IF NOT EXISTS `cuenta_banco` (
  `idcuenta` varchar(21) NOT NULL,
  `banco_idbanco` int(3) NOT NULL,
  `idtipo_cuenta` int(11) NOT NULL,
  `idcliente` varchar(10) NOT NULL,
  `estatus_cuenta` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
`iddepartamento` int(11) NOT NULL,
  `desc_depa` varchar(50) DEFAULT NULL,
  `tele_depa` varchar(15) DEFAULT NULL,
  `estatus_dep` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `desc_depa`, `tele_depa`, `estatus_dep`) VALUES
(1, 'SISTEMAS', '2147483647', '1'),
(2, 'TALENTO HUMANO', '2147483647', '1'),
(3, 'TRANSPORTE', '2147483647', '1'),
(4, 'TRAFICO I', '2147483647', '1'),
(5, 'TRAFICO II', '2147483647', '1'),
(6, 'CENTRO DE CONTROL DE TRAFICO', '2147483647', '1'),
(7, 'COMERCIALIZACION', '2147483647', '1'),
(8, 'ADT', '2147483647', '1'),
(9, 'FLOTA', '2147483647', '1'),
(10, 'FINANZAS', '2147483647', '1'),
(11, 'TALLER', '2147483647', '1'),
(12, 'MANTENIMIENTO', '2147483647', '1'),
(13, 'SERVICIOS GENERALES ', '2147483647', '1'),
(14, 'MANTENIMIENTO VEHICULAR', '2147483647', '1'),
(15, 'OPERACIONES', '2147483647', '1'),
(16, 'COMPRAS', NULL, '1'),
(17, 'CONSULTORIA JURIDICA ', NULL, '1'),
(18, 'SEGURIDAD', NULL, '1'),
(19, 'SEGUROS Y BIENES', NULL, '1'),
(20, 'ATENCION AL CLIENTE', NULL, '1'),
(21, 'CONTROL ADMINISTRATIVO', NULL, '1'),
(22, 'RECURSOS HUMANOS', NULL, '1'),
(23, 'TRAMITE ADMINISTRATIVO', NULL, '1'),
(24, 'ORICE', NULL, '1'),
(25, 'ALMACEN', NULL, '1'),
(26, 'CONTABILIDAD', NULL, '1'),
(27, 'ADMINISTRACION', NULL, '1'),
(28, 'PLANIFICACION', NULL, '1'),
(29, 'UNIDAD ESTRATEGICA', NULL, '1'),
(30, 'GESTION', NULL, '1'),
(31, 'GERENCIA GENERAL', NULL, '1'),
(32, 'SEGURIDAD INDUSTRIAL', NULL, '1'),
(33, 'UNIDAD ESTRATEGICA', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemantenimiento`
--

CREATE TABLE IF NOT EXISTS `detallemantenimiento` (
`iddetallemantenimiento` int(11) NOT NULL,
  `idmantenimiento` int(11) NOT NULL,
  `idfalla` int(11) NOT NULL,
  `idrepuesto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_persona`
--

CREATE TABLE IF NOT EXISTS `detalle_persona` (
  `cedula` int(9) NOT NULL,
  `fecha_ven_ci` varchar(45) DEFAULT NULL,
  `fecha_ven_cer_sal` varchar(45) DEFAULT NULL,
  `cert_salud` varchar(45) DEFAULT NULL,
  `cert_mani_alim` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_registrodiario`
--

CREATE TABLE IF NOT EXISTS `detalle_registrodiario` (
`iddetalle_registrodiario` int(11) NOT NULL,
  `placa_unidad` varchar(10) NOT NULL,
  `idmodelo_unidad` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  `kminima` int(11) NOT NULL,
  `kmaxima` int(11) NOT NULL,
  `kactual` int(11) NOT NULL,
  `estatus_mantenimiento` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `detalle_registrodiario`
--

INSERT INTO `detalle_registrodiario` (`iddetalle_registrodiario`, `placa_unidad`, `idmodelo_unidad`, `id_repuesto`, `kminima`, `kmaxima`, `kactual`, `estatus_mantenimiento`) VALUES
(1, '6090a3s', 1, 11, 1000, 2000, 8500, '2'),
(2, '6090a3s', 1, 14, 2000, 2200, 8500, '2'),
(3, '6090a3s', 1, 15, 2000, 2200, 8500, '2'),
(4, '6090a3s', 1, 16, 4000, 5000, 8500, '2'),
(5, '6090a3s', 1, 17, 2000, 4000, 8500, '2'),
(6, '6090a3s', 1, 18, 100, 2500, 1000, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tabulador_viatico`
--

CREATE TABLE IF NOT EXISTS `detalle_tabulador_viatico` (
  `idtabulador_viatico_dettabvia` int(11) NOT NULL,
  `idcentro_costo_dettabvia` int(11) NOT NULL,
  `cantidad_dettabvia` int(3) DEFAULT NULL,
`iddet_tabulador_viatico` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `detalle_tabulador_viatico`
--

INSERT INTO `detalle_tabulador_viatico` (`idtabulador_viatico_dettabvia`, `idcentro_costo_dettabvia`, `cantidad_dettabvia`, `iddet_tabulador_viatico`) VALUES
(21, 1, 2, 1),
(21, 2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
`idestado` int(6) NOT NULL,
  `desc_esta` varchar(20) DEFAULT NULL,
  `estatus_est` varchar(45) DEFAULT '1',
  `idpais` int(3) NOT NULL,
  `idregion` int(2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `desc_esta`, `estatus_est`, `idpais`, `idregion`) VALUES
(1, 'AMAZONAS', '1', 1, NULL),
(2, 'ANZOATEGUI', '1', 1, NULL),
(3, 'APURE', '1', 1, NULL),
(4, 'ARAGUA', '1', 1, NULL),
(5, 'BARINAS', '1', 1, NULL),
(6, 'BOLIVAR', '1', 1, NULL),
(7, 'CARABOBO', '1', 1, NULL),
(8, 'COJEDES', '1', 1, NULL),
(9, 'DELTA AMACURO', '1', 1, NULL),
(10, 'FALCON', '1', 1, NULL),
(11, 'GUARICO', '1', 1, NULL),
(12, 'LARA', '1', 1, NULL),
(13, 'MERIDA', '1', 1, NULL),
(14, 'MIRANDA', '1', 1, NULL),
(15, 'MONAGAS', '1', 1, NULL),
(16, 'NUEVA ESPARTA', '1', 1, NULL),
(17, 'PORTUGUESA', '1', 1, NULL),
(18, 'SUCRE', '1', 1, NULL),
(19, 'TACHIRA', '1', 1, NULL),
(20, 'TRUJILLO', '1', 1, NULL),
(21, 'VARGAS', '1', 1, NULL),
(22, 'YARACUY', '1', 1, NULL),
(23, 'ZULIA', '1', 1, NULL),
(24, 'DISTRITO CAPITAL', '1', 1, NULL),
(25, 'DEPENDENCIAS FEDERAL', '1', 1, NULL),
(26, 'CESARNUEV', '1', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
`idestatus` int(11) NOT NULL,
  `nombre_est` varchar(45) DEFAULT NULL,
  `estatus_est` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idestatus`, `nombre_est`, `estatus_est`) VALUES
(1, 'ACTIVO', '1'),
(2, 'INACTIVO', '1'),
(3, 'VACACIONES', '1'),
(4, 'REPOSO', '1'),
(5, 'SUSPENDIDO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
`idfoto` int(8) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  `posicion` tinyint(3) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fkgaleria` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `idgaleria` tinyint(3) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `fecha_alta` date NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
`idmantenimiento` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idunidad` int(11) NOT NULL,
  `conductor` char(12) NOT NULL,
  `observacion` mediumtext NOT NULL,
  `estatus` char(1) NOT NULL,
  `mecanico` char(12) NOT NULL,
  `fechaSalida` date NOT NULL,
  `horaOficina` char(10) NOT NULL,
  `horaVigilancia` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`IdMenu` int(11) NOT NULL,
  `NombreMen` varchar(50) NOT NULL,
  `UrlMen` varchar(50) NOT NULL,
  `DescripcionMen` varchar(100) NOT NULL,
  `EstatusMen` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`IdMenu`, `NombreMen`, `UrlMen`, `DescripcionMen`, `EstatusMen`) VALUES
(1, 'CONFIGURACIÓN', 'fa fa-cogs', 'ADMINISTRADOR', 1),
(4, 'REPORTE', 'entypo-doc-text', 'ADMINISTRADOR', 1),
(5, 'SEGURIDAD', 'entypo-lock', 'ADMINISTRADOR', 1),
(8, 'AYUDA', 'entypo-help', 'ADMINISTRADOR', 1),
(22, 'BANDEJAS', 'entypo-mail', 'ADMINISTRADOR', 1),
(23, 'TRANSPORTE', 'glyphicon glyphicon-road', 'ADMINISTRADOR', 1),
(26, 'BANDEJAS', 'entypo-mail', 'ADMINISTRADOR', 1),
(27, 'SOLICITUD DE TRANSPORTE', '', 'CLIENTE', 1),
(28, 'BANDEJA', 'entypo-mail', 'CLIENTE', 1),
(29, 'VIATICOS', 'entypo-docs', 'ADMINISTRADOR', 1),
(30, 'SISTEMA', 'entypo-monitor', 'ADMINISTRADOR', 1),
(31, 'CONFIGURACIÓN', 'fa fa-cogs', 'ANALISTA COMERCIALIZACION', 1),
(32, 'TRANSPORTE', '', 'ANALISTA COMERCIALIZACION', 1),
(33, 'BANDEJAS', '', 'ANALISTA COMERCIALIZACION', 1),
(34, 'REPORTE', '', 'ANALISTA COMERCIALIZACION', 1),
(35, 'SEGURIDAD', '', 'ANALISTA COMERCIALIZACION ', 1),
(36, 'AYUDA', '', 'ANALISTA COMERCIALIZACION', 1),
(37, 'BANDEJAS', '', 'ANALISTA TRAFICOI', 1),
(38, 'REPORTE', '', 'ANALISTA TRAFICOI', 1),
(39, 'AYUDA', '', 'ANALISTA TRAFICOI', 1),
(40, 'BANDEJAS', '', 'ANALISTA TRAFICOII', 1),
(41, 'REPORTE', '', 'ANALISTA TRAFICOII', 1),
(42, 'AYUDA', '', 'ANALISTA TRAFICOII', 1),
(43, 'CONFIGURACIÓN', 'fa fa-cogs', 'ANALISTA FLOTA', 1),
(44, 'TRANSPORTE', '', 'ANALISTA FLOTA', 1),
(45, 'REPORTE', '', 'ANALISTA FLOTA', 1),
(46, 'AYUDA', '', 'ANALISTA FLOTA', 1),
(47, 'AYUDA', '', 'ANALISTA FLOTA', 1),
(48, 'CONFIGURACION', '', 'ANALISTA ADT', 1),
(51, 'VIATICOS', '', 'ANALISTA ADT', 1),
(52, 'BANDEJAS', '', 'ANALISTA ADT', 1),
(53, 'AYUDA', '', 'ANALISTA ADT', 1),
(54, 'PERSONA', 'Persona', 'Menu para guardar datos de personas', 1),
(55, 'MENU DE EJEMPLOSS', '10', 'SELECCIONE UN MENU DE EJEMPLO', 1),
(56, 'CONFIGURACIÓN', 'fa fa-cogs', 'CONFIGURACION DE MAESTROS', 1),
(57, 'MANTENIMIENTO', 'fa fa-wrench', 'TRANSACCIONES DEL SISTEMA', 1),
(58, 'SOLICITUDES', 'fa fa-opencart ', 'REQUISICIÓN', 1),
(59, 'INVENTARIO', 'entypo-chart-pie', 'controlar el inventario de repuestos y cauchos de la organización', 1),
(60, 'ORDEN DE COMPRA', '', 'ORDENES DE COMPRA', 1),
(61, 'SOLICITUD ALMACEN', '', 'CONFIRMAR REQUISICION \r\nORDEN DE ENTRADA', 1),
(62, 'SOLICITUD TALLER', '', 'SOLICITUD TALLER', 1),
(63, 'CONFIGURACION ALMACEN', '', 'ESTA CONFIGURACIONES DE ALMACEN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_operacion`
--

CREATE TABLE IF NOT EXISTS `menu_operacion` (
`IdMenu_Operacion` int(11) NOT NULL,
  `IdMenu` int(11) NOT NULL,
  `IdOperacion` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Volcado de datos para la tabla `menu_operacion`
--

INSERT INTO `menu_operacion` (`IdMenu_Operacion`, `IdMenu`, `IdOperacion`) VALUES
(1, 23, 25),
(2, 23, 23),
(4, 22, 74),
(5, 22, 75),
(6, 22, 79),
(7, 22, 77),
(8, 23, 20),
(9, 27, 76),
(10, 28, 79),
(11, 26, 80),
(12, 22, 80),
(13, 29, 92),
(14, 29, 93),
(15, 30, 1),
(16, 30, 2),
(17, 30, 3),
(18, 30, 4),
(19, 30, 5),
(20, 30, 6),
(21, 30, 7),
(23, 8, 95),
(24, 8, 96),
(25, 8, 97),
(28, 32, 25),
(29, 32, 73),
(30, 33, 75),
(31, 33, 77),
(32, 35, 14),
(33, 35, 16),
(34, 36, 95),
(35, 36, 96),
(36, 36, 97),
(37, 37, 74),
(38, 39, 95),
(39, 39, 96),
(40, 39, 97),
(41, 40, 80),
(42, 42, 95),
(43, 42, 96),
(44, 42, 97),
(45, 44, 23),
(46, 46, 95),
(47, 46, 96),
(48, 46, 97),
(49, 47, 95),
(50, 47, 96),
(51, 47, 97),
(52, 51, 92),
(53, 51, 93),
(54, 52, 74),
(55, 53, 95),
(56, 53, 96),
(57, 53, 97),
(58, 34, 98),
(59, 34, 99),
(60, 34, 100),
(61, 34, 101),
(62, 34, 102),
(63, 34, 103),
(64, 38, 104),
(65, 38, 105),
(66, 38, 106),
(67, 38, 107),
(68, 38, 108),
(69, 41, 109),
(70, 41, 110),
(71, 41, 111),
(72, 45, 112),
(73, 45, 113),
(74, 51, 85),
(75, 51, 114),
(76, 54, 114),
(77, 54, 115),
(78, 33, 121),
(79, 22, 123),
(92, 56, 26),
(97, 57, 125),
(98, 57, 126),
(101, 4, 129),
(102, 56, 115),
(105, 56, 130),
(106, 57, 131),
(107, 57, 132),
(108, 57, 133),
(109, 57, 134),
(119, 58, 137),
(121, 58, 144),
(123, 4, 145),
(124, 58, 141),
(125, 60, 146),
(126, 61, 141),
(127, 61, 144),
(128, 62, 137),
(138, 63, 122),
(139, 63, 119),
(140, 63, 124),
(142, 63, 138),
(143, 63, 139),
(144, 63, 140);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_submenu`
--

CREATE TABLE IF NOT EXISTS `menu_submenu` (
`IdMenu_Submenu` int(11) NOT NULL,
  `IdMenu` int(11) NOT NULL,
  `IdSubmenu` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `menu_submenu`
--

INSERT INTO `menu_submenu` (`IdMenu_Submenu`, `IdMenu`, `IdSubmenu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(6, 1, 6),
(7, 1, 7),
(9, 5, 8),
(10, 5, 9),
(11, 5, 10),
(16, 31, 12),
(17, 31, 13),
(18, 31, 14),
(19, 43, 15),
(21, 59, 21),
(22, 59, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_unidad`
--

CREATE TABLE IF NOT EXISTS `modelo_unidad` (
`idmodelo_unidad` int(5) NOT NULL,
  `desc_mode` varchar(30) DEFAULT NULL,
  `idmarca_unidad` int(4) DEFAULT NULL,
  `estatus_moduni` varchar(45) DEFAULT '1',
  `idtipo_unidad` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `modelo_unidad`
--

INSERT INTO `modelo_unidad` (`idmodelo_unidad`, `desc_mode`, `idmarca_unidad`, `estatus_moduni`, `idtipo_unidad`) VALUES
(1, 'F350', 2007, '1', 1),
(2, 'HD3500', 2011, '1', 2),
(3, 'G41', 2010, '1', 4),
(4, 'H2', 2009, '1', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
`idmunicipio` int(6) NOT NULL,
  `desc_muni` varchar(20) DEFAULT NULL,
  `estatus_mun` varchar(45) DEFAULT '1',
  `idestado` int(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=464 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idmunicipio`, `desc_muni`, `estatus_mun`, `idestado`) VALUES
(1, 'Alto Orinoco', '1', 1),
(2, 'Atabapo', '1', 1),
(3, 'Atures', '1', 1),
(4, 'Autana', '1', 1),
(5, 'Manapiare', '1', 1),
(6, 'Maroa', '1', 1),
(7, 'Rio Negro', '1', 1),
(8, 'Anaco', '1', 2),
(9, 'Aragua', '1', 2),
(10, 'Manuel Ezequiel Bruz', '1', 2),
(11, 'Diego Bautista Urban', '1', 2),
(12, 'Fernando Peñalver', '1', 2),
(13, 'Francisco Del Carmen', '1', 2),
(14, 'General Sir Arthur M', '1', 2),
(15, 'Guanta', '1', 2),
(16, 'Independencia', '1', 2),
(17, 'Jose Gregorio Monaga', '1', 2),
(18, 'Juan Antonio Sotillo', '1', 2),
(19, 'Juan Manuel Cajigal', '1', 2),
(20, 'Libertad', '1', 2),
(21, 'Francisco de Miranda', '1', 2),
(22, 'Pedro Maria Freites', '1', 2),
(23, 'Piritu', '1', 2),
(24, 'San Jose de Guanipa', '1', 2),
(25, 'San Juan de Capistra', '1', 2),
(26, 'Santa Ana', '1', 2),
(27, 'Simon Bolivar', '1', 2),
(28, 'Simon Rodriguez', '1', 2),
(29, 'Achaguas', '1', 3),
(30, 'Biruaca', '1', 3),
(31, 'Muñoz', '1', 3),
(32, 'Paez', '1', 3),
(33, 'Pedro Camejo', '1', 3),
(34, 'Romulo Gallegos', '1', 3),
(35, 'San Fernando', '1', 3),
(36, 'Atanasio Girardot', '1', 4),
(37, 'Bolivar', '1', 4),
(38, 'Camatagua', '1', 4),
(39, 'Francisco Linares Al', '1', 4),
(40, 'Jose angel Lamas', '1', 4),
(41, 'Jose Felix Ribas', '1', 4),
(42, 'Jose Rafael Revenga', '1', 4),
(43, 'Libertador', '1', 4),
(44, 'Mario Briceño Iragor', '1', 4),
(45, 'Ocumare de la Costa ', '1', 4),
(46, 'San Casimiro', '1', 4),
(47, 'San Sebastian', '1', 4),
(48, 'Santiago Mariño', '1', 4),
(49, 'Santos Michelena', '1', 4),
(50, 'Sucre', '1', 4),
(51, 'Tovar', '1', 4),
(52, 'Urdaneta', '1', 4),
(53, 'Zamora', '1', 4),
(54, 'Alberto Arvelo Torre', '1', 5),
(55, 'Andres Eloy Blanco', '1', 5),
(56, 'Antonio Jose de Sucr', '1', 5),
(57, 'Arismendi', '1', 5),
(58, 'Barinas', '1', 5),
(59, 'Bolivar', '1', 5),
(60, 'Cruz Paredes', '1', 5),
(61, 'Ezequiel Zamora', '1', 5),
(62, 'Obispos', '1', 5),
(63, 'Pedraza', '1', 5),
(64, 'Rojas', '1', 5),
(65, 'Sosa', '1', 5),
(66, 'Caroni', '1', 6),
(67, 'Cedeño', '1', 6),
(68, 'El Callao', '1', 6),
(69, 'Gran Sabana', '1', 6),
(70, 'Heres', '1', 6),
(71, 'Piar', '1', 6),
(72, 'Angostura (Raul Leon', '1', 6),
(73, 'Roscio', '1', 6),
(74, 'Sifontes', '1', 6),
(75, 'Sucre', '1', 6),
(76, 'Padre Pedro Chien', '1', 6),
(77, 'Bejuma', '1', 7),
(78, 'Carlos Arvelo', '1', 7),
(79, 'Diego Ibarra', '1', 7),
(80, 'Guacara', '1', 7),
(81, 'Juan Jose Mora', '1', 7),
(82, 'Libertador', '1', 7),
(83, 'Los Guayos', '1', 7),
(84, 'Miranda', '1', 7),
(85, 'Montalban', '1', 7),
(86, 'Naguanagua', '1', 7),
(87, 'Puerto Cabello', '1', 7),
(88, 'San Diego', '1', 7),
(89, 'San Joaquin', '1', 7),
(90, 'Valencia', '1', 7),
(91, 'Anzoategui', '1', 8),
(92, 'Tinaquillo', '1', 8),
(93, 'Girardot', '1', 8),
(94, 'Lima Blanco', '1', 8),
(95, 'Pao de San Juan Baut', '1', 8),
(96, 'Ricaurte', '1', 8),
(97, 'Romulo Gallegos', '1', 8),
(98, 'San Carlos', '1', 8),
(99, 'Tinaco', '1', 8),
(100, 'Antonio Diaz', '1', 9),
(101, 'Casacoima', '1', 9),
(102, 'Pedernales', '1', 9),
(103, 'Tucupita', '1', 9),
(104, 'Acosta', '1', 10),
(105, 'Bolivar', '1', 10),
(106, 'Buchivacoa', '1', 10),
(107, 'Cacique Manaure', '1', 10),
(108, 'Carirubana', '1', 10),
(109, 'Colina', '1', 10),
(110, 'Dabajuro', '1', 10),
(111, 'Democracia', '1', 10),
(112, 'Falcon', '1', 10),
(113, 'Federacion', '1', 10),
(114, 'Jacura', '1', 10),
(115, 'Jose Laurencio Silva', '1', 10),
(116, 'Los Taques', '1', 10),
(117, 'Mauroa', '1', 10),
(118, 'Miranda', '1', 10),
(119, 'Monseñor Iturriza', '1', 10),
(120, 'Palmasola', '1', 10),
(121, 'Petit', '1', 10),
(122, 'Piritu', '1', 10),
(123, 'San Francisco', '1', 10),
(124, 'Sucre', '1', 10),
(125, 'Tocopero', '1', 10),
(126, 'Union', '1', 10),
(127, 'Urumaco', '1', 10),
(128, 'Zamora', '1', 10),
(129, 'Camaguan', '1', 11),
(130, 'Chaguaramas', '1', 11),
(131, 'El Socorro', '1', 11),
(132, 'Jose Felix Ribas', '1', 11),
(133, 'Jose Tadeo Monagas', '1', 11),
(134, 'Juan German Roscio', '1', 11),
(135, 'Julian Mellado', '1', 11),
(136, 'Las Mercedes', '1', 11),
(137, 'Leonardo Infante', '1', 11),
(138, 'Pedro Zaraza', '1', 11),
(139, 'Ortiz', '1', 11),
(140, 'San Geronimo de Guay', '1', 11),
(141, 'San Jose de Guaribe', '1', 11),
(142, 'Santa Maria de Ipire', '1', 11),
(143, 'Sebastian Francisco ', '1', 11),
(144, 'Andres Eloy Blanco', '1', 12),
(145, 'Crespo', '1', 12),
(146, 'Iribarren', '1', 12),
(147, 'Jimenez', '1', 12),
(148, 'Moran', '1', 12),
(149, 'Palavecino', '1', 12),
(150, 'Simon Planas', '1', 12),
(151, 'Torres', '1', 12),
(152, 'Urdaneta', '1', 12),
(179, 'Alberto Adriani', '1', 13),
(180, 'Andres Bello', '1', 13),
(181, 'Antonio Pinto Salina', '1', 13),
(182, 'Aricagua', '1', 13),
(183, 'Arzobispo Chacon', '1', 13),
(184, 'Campo Elias', '1', 13),
(185, 'Caracciolo Parra Olm', '1', 13),
(186, 'Cardenal Quintero', '1', 13),
(187, 'Guaraque', '1', 13),
(188, 'Julio Cesar Salas', '1', 13),
(189, 'Justo Briceño', '1', 13),
(190, 'Libertador', '1', 13),
(191, 'Miranda', '1', 13),
(192, 'Obispo Ramos de Lora', '1', 13),
(193, 'Padre Noguera', '1', 13),
(194, 'Pueblo Llano', '1', 13),
(195, 'Rangel', '1', 13),
(196, 'Rivas Davila', '1', 13),
(197, 'Santos Marquina', '1', 13),
(198, 'Sucre', '1', 13),
(199, 'Tovar', '1', 13),
(200, 'Tulio Febres Cordero', '1', 13),
(201, 'Zea', '1', 13),
(223, 'Acevedo', '1', 14),
(224, 'Andres Bello', '1', 14),
(225, 'Baruta', '1', 14),
(226, 'Brion', '1', 14),
(227, 'Buroz', '1', 14),
(228, 'Carrizal', '1', 14),
(229, 'Chacao', '1', 14),
(230, 'Cristobal Rojas', '1', 14),
(231, 'El Hatillo', '1', 14),
(232, 'Guaicaipuro', '1', 14),
(233, 'Independencia', '1', 14),
(234, 'Lander', '1', 14),
(235, 'Los Salias', '1', 14),
(236, 'Paez', '1', 14),
(237, 'Paz Castillo', '1', 14),
(238, 'Pedro Gual', '1', 14),
(239, 'Plaza', '1', 14),
(240, 'Simon Bolivar', '1', 14),
(241, 'Sucre', '1', 14),
(242, 'Urdaneta', '1', 14),
(243, 'Zamora', '1', 14),
(258, 'Acosta', '1', 15),
(259, 'Aguasay', '1', 15),
(260, 'Bolivar', '1', 15),
(261, 'Caripe', '1', 15),
(262, 'Cedeño', '1', 15),
(263, 'Ezequiel Zamora', '1', 15),
(264, 'Libertador', '1', 15),
(265, 'Maturin', '1', 15),
(266, 'Piar', '1', 15),
(267, 'Punceres', '1', 15),
(268, 'Santa Barbara', '1', 15),
(269, 'Sotillo', '1', 15),
(270, 'Uracoa', '1', 15),
(271, 'Antolin del Campo', '1', 16),
(272, 'Arismendi', '1', 16),
(273, 'Garcia', '1', 16),
(274, 'Gomez', '1', 16),
(275, 'Maneiro', '1', 16),
(276, 'Marcano', '1', 16),
(277, 'Mariño', '1', 16),
(278, 'Peninsula de Macanao', '1', 16),
(279, 'Tubores', '1', 16),
(280, 'Villalba', '1', 16),
(281, 'Diaz', '1', 16),
(282, 'Agua Blanca', '1', 17),
(283, 'Araure', '1', 17),
(284, 'Esteller', '1', 17),
(285, 'Guanare', '1', 17),
(286, 'Guanarito', '1', 17),
(287, 'Monseñor Jose Vicent', '1', 17),
(288, 'Ospino', '1', 17),
(289, 'Paez', '1', 17),
(290, 'Papelon', '1', 17),
(291, 'San Genaro de Bocono', '1', 17),
(292, 'San Rafael de Onoto', '1', 17),
(293, 'Santa Rosalia', '1', 17),
(294, 'Sucre', '1', 17),
(295, 'Turen', '1', 17),
(296, 'Andres Eloy Blanco', '1', 18),
(297, 'Andres Mata', '1', 18),
(298, 'Arismendi', '1', 18),
(299, 'Benitez', '1', 18),
(300, 'Bermudez', '1', 18),
(301, 'Bolivar', '1', 18),
(302, 'Cajigal', '1', 18),
(303, 'Cruz Salmeron Acosta', '1', 18),
(304, 'Libertador', '1', 18),
(305, 'Mariño', '1', 18),
(306, 'Mejia', '1', 18),
(307, 'Montes', '1', 18),
(308, 'Ribero', '1', 18),
(309, 'Sucre', '1', 18),
(310, 'Valdez', '1', 18),
(341, 'Andres Bello', '1', 19),
(342, 'Antonio Romulo Costa', '1', 19),
(343, 'Ayacucho', '1', 19),
(344, 'Bolivar', '1', 19),
(345, 'Cardenas', '1', 19),
(346, 'Cordoba', '1', 19),
(347, 'Fernandez Feo', '1', 19),
(348, 'Francisco de Miranda', '1', 19),
(349, 'Garcia de Hevia', '1', 19),
(350, 'Guasimos', '1', 19),
(351, 'Independencia', '1', 19),
(352, 'Jauregui', '1', 19),
(353, 'Jose Maria Vargas', '1', 19),
(354, 'Junin', '1', 19),
(355, 'Libertad', '1', 19),
(356, 'Libertador', '1', 19),
(357, 'Lobatera', '1', 19),
(358, 'Michelena', '1', 19),
(359, 'Panamericano', '1', 19),
(360, 'Pedro Maria Ureña', '1', 19),
(361, 'Rafael Urdaneta', '1', 19),
(362, 'Samuel Dario Maldona', '1', 19),
(363, 'San Cristobal', '1', 19),
(364, 'Seboruco', '1', 19),
(365, 'Simon Rodriguez', '1', 19),
(366, 'Sucre', '1', 19),
(367, 'Torbes', '1', 19),
(368, 'Uribante', '1', 19),
(369, 'San Judas Tadeo', '1', 19),
(370, 'Andres Bello', '1', 20),
(371, 'Bocono', '1', 20),
(372, 'Bolivar', '1', 20),
(373, 'Candelaria', '1', 20),
(374, 'Carache', '1', 20),
(375, 'Escuque', '1', 20),
(376, 'Jose Felipe Marquez ', '1', 20),
(377, 'Juan Vicente Campos ', '1', 20),
(378, 'La Ceiba', '1', 20),
(379, 'Miranda', '1', 20),
(380, 'Monte Carmelo', '1', 20),
(381, 'Motatan', '1', 20),
(382, 'Pampan', '1', 20),
(383, 'Pampanito', '1', 20),
(384, 'Rafael Rangel', '1', 20),
(385, 'San Rafael de Carvaj', '1', 20),
(386, 'Sucre', '1', 20),
(387, 'Trujillo', '1', 20),
(388, 'Urdaneta', '1', 20),
(389, 'Valera', '1', 20),
(390, 'Vargas', '1', 21),
(391, 'Aristides Bastidas', '1', 22),
(392, 'Bolivar', '1', 22),
(407, 'Bruzual', '1', 22),
(408, 'Cocorote', '1', 22),
(409, 'Independencia', '1', 22),
(410, 'Jose Antonio Paez', '1', 22),
(411, 'La Trinidad', '1', 22),
(412, 'Manuel Monge', '1', 22),
(413, 'Nirgua', '1', 22),
(414, 'Peña', '1', 22),
(415, 'San Felipe', '1', 22),
(416, 'Sucre', '1', 22),
(417, 'Urachiche', '1', 22),
(418, 'Jose Joaquin Veroes', '1', 22),
(441, 'Almirante Padilla', '1', 23),
(442, 'Baralt', '1', 23),
(443, 'Cabimas', '1', 23),
(444, 'Catatumbo', '1', 23),
(445, 'Colon', '1', 23),
(446, 'Francisco Javier Pul', '1', 23),
(447, 'Paez', '1', 23),
(448, 'Jesus Enrique Losada', '1', 23),
(449, 'Jesus Maria Semprun', '1', 23),
(450, 'La Cañada de Urdanet', '1', 23),
(451, 'Lagunillas', '1', 23),
(452, 'Machiques de Perija', '1', 23),
(453, 'Mara', '1', 23),
(454, 'Maracaibo', '1', 23),
(455, 'Miranda', '1', 23),
(456, 'Rosario de Perija', '1', 23),
(457, 'San Francisco', '1', 23),
(458, 'Santa Rita', '1', 23),
(459, 'Simon Bolivar', '1', 23),
(460, 'Sucre', '1', 23),
(461, 'Valmore Rodriguez', '1', 23),
(462, 'Libertador', '1', 24),
(463, 'elorza', '1', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE IF NOT EXISTS `operacion` (
`IdOperacion` int(11) NOT NULL,
  `NombreOpe` varchar(50) NOT NULL,
  `UrlOpe` varchar(45) NOT NULL,
  `DescripcionOpe` varchar(45) NOT NULL,
  `EstatusOpe` varchar(45) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`IdOperacion`, `NombreOpe`, `UrlOpe`, `DescripcionOpe`, `EstatusOpe`) VALUES
(1, 'sistema', 'sistemaConfiguracion', 'comfiguracion del sistem', '1'),
(2, 'mision', 'configuracion_mision', 'edita el contenido de la mision', '1'),
(3, 'vision', 'configuracion_vision', 'edita el contenido de la vision', '1'),
(4, 'HISTORIA', 'configuracion_historia', 'edita la historia de ATC', '1'),
(5, 'quienes somos', 'configuracion_quienes_somos', 'modificael contenido de quien es ATC', '1'),
(6, 'objetivos', 'configuracion_objetivos', 'configuracion de los objetivos de la empresa', '1'),
(7, 'crear reportes', 'crearReportes', '', '1'),
(8, 'ver reportes', 'reportes', 'visualiza los reportes', '1'),
(9, 'perfil', 'perfiles', 'crea perfiles para la interfaz', '1'),
(10, 'menu', 'roles', 'crea nuevos menus', '1'),
(11, 'gestionar menu', 'asignarResponsabilidades', 'asigna los menus a la interfaz', '1'),
(12, 'submenu', 'maestro_submenu', 'crea submenus', '1'),
(13, 'gestionar submenu', 'asignar_submenu', 'asigna nuevos submenus a los usuario', '1'),
(14, 'usuario interno', 'maestro_usuarioatc', 'crea nuevos usuarios internos ATC', '1'),
(15, 'desbloquear usuario interno', 'desactivarusuario', 'desbloquea los usuarios internos de la empres', '1'),
(16, 'desbloquear usuario externo', 'bloquearusuarioexterno', 'desbloquea los clientes de ATC', '1'),
(17, 'bitacora del sistema', 'reportes&report=bitacora', '', '1'),
(18, 'bitacora de seguridad', 'reportes&report=bitacoraseguridad', '', '1'),
(19, 'personal', 'personaatc', 'registro de los trabajadores', '1'),
(20, 'solicitud de transportes', 'transaccion_solicitud', '', '1'),
(22, 'orden de carga', 'transaccion_ordcar', '', '1'),
(23, 'relacion de unidades', 'transaccion_reluni', '', '1'),
(25, 'cliente', 'maestro_cliente', '', '1'),
(26, 'unidad de transporte', 'maestro_unidad', '', '1'),
(27, 'remolque', 'maestro_remolque', '', '1'),
(28, 'producto', 'maestro_producto', '', '1'),
(29, 'tabulador de precios', 'maestro_tabulador', '', '1'),
(30, 'conductor', 'maestro_conductor', '', '1'),
(31, 'precio viaticos', 'maestro_precio_viatico', '', '1'),
(32, 'pais', 'maestro_pais', '', '1'),
(33, 'region', 'maestro_region', '', '1'),
(34, 'estado', 'maestro_estado', '', '1'),
(35, 'municipio', 'maestro_municipio', '', '1'),
(36, 'parroquia', 'maestro_parroquia', '', '1'),
(37, 'ciudad', 'maestro_ciudad', '', '1'),
(38, 'departamento', 'maestro_departamento', '', '1'),
(39, 'estatus', 'maestro_estatus', '', '1'),
(40, 'tipo producto', 'maestro_tipo_producto', '', '1'),
(41, 'tipo de unidad de transporte', 'maestro_tipo_unidad', '', '1'),
(42, 'tipo de contribuyente', 'maestro_tipo_contri', '', '1'),
(43, 'tipo de proveedor', 'maestro_tipo_proveedor', '', '1'),
(44, 'tipo de cuenta', 'maestro_tipo_cuenta', '', '1'),
(45, 'marca de unidad', 'maestro_marca_unidad', '', '1'),
(46, 'modelo de unidad', 'maestro_modelo_unidad', '', '1'),
(47, 'banco', 'maestro_banco', '', '1'),
(48, 'capacidad', 'maestro_capacidad', '', '1'),
(49, 'unidad medida', 'maestro_unidad_medida', '', '1'),
(50, 'cargos', 'maestro_roles', '', '1'),
(51, 'tipo de cliente', 'maestro_tipo_cliente', '', '1'),
(56, 'precio por kilometro', 'maestro_precio', '', '1'),
(57, 'cuenta bancaria', 'maestro_cuenta', '', '1'),
(62, 'tipo de presentacion', 'maestro_presentacion', '', '1'),
(65, 'bitacora', 'maestro_bitacoras', '', '1'),
(69, 'reporte solicitud de transporte', 'busqueda/busqueda_solicitud', '', '1'),
(71, 'restaurar DB', 'restaurar', '', '1'),
(72, 'respaldar BD', '../libreria/respaldo_db/respaldar_db', '', '1'),
(73, 'solicitud de transporte', 'transaccion_solicitud_cliente', '', '1'),
(74, 'solicitudes emitidas', 'solicitud_emitida', '', '1'),
(75, 'solicitud en espera', 'solicitud_en_espera', '', '1'),
(76, 'solicitud cliente', 'transaccion_solicitud_cliente', '', '1'),
(77, 'verificar usuario', 'VerificarUsuario', '', '1'),
(78, 'ruta', 'maestro_ruta', '', '1'),
(79, 'solicitud procesada', 'solicitud_procesada', '', '1'),
(80, 'Recepcion de Guia', 'ListaOrdcarEmitida', '', '1'),
(83, 'CENTRO DE COSTOS', 'maestro_centro_costo', 'costos de viaticos', '1'),
(84, 'TABULADOR DE VIATICOS', 'transaccion_tabulador_viatico', 'tabula los viaticos a pagar', '1'),
(85, 'ASIGNACION DE VIATICOS', 'transaccion_asignacion_viatico', 'asigna viaticos a una orden de carga', '1'),
(89, 'OPERACION', 'MaestroOperacion', 'OPERACION', '1'),
(90, 'GESTIONAR OPERACION MENU', 'asignar_operacion_menu', 'GESTIONAR OPERACION MENU', '1'),
(91, 'GESTIONAR OPERACION SUBMENU', 'asignar_operacion_submenu', 'GESTIONAR OPERACION SUBMENU', '1'),
(92, 'RELACION DE GASTOS', 'maestro_centro_costo', 'ADMINSTRADOR', '1'),
(93, 'TABULADOR DE VIATICO', 'transaccion_tabulador_viatico', 'ADMINSTRADOR', '1'),
(94, 'LISTADO', 'listareportes', 'LISTADO DE REPORTES', '1'),
(95, 'MANUAL DE SISTEMAS', 'ayuda/manual-sistema', 'manual de sistemas', '1'),
(96, 'MANUAL DE USUARIO', 'ayuda/manual-usuario', 'manual de usuario', '1'),
(97, 'MANUAL DE NORMAS', 'ayuda/manual-normas', 'manual de normas y procedimientos', '1'),
(98, 'REPORTE SOLICITUDES POR RIF', 'visRep_Solicitud_rif', 'reporte rif', '1'),
(99, 'REPORTE SOLICITUDES POR FECHA', 'visRep_Solicitud_fecha', 'reporte fecha', '1'),
(100, 'REPORTE SOLICITUDES POR RAZON SOCIAL', 'visRep_Solicitud_cliente', 'reporte cliente', '1'),
(101, 'REPORTE SOLICITUDES POR ESTATUS', 'visRep_Solicitud_estatus', 'reporte estatus', '1'),
(102, 'REPORTE SOLICITUDES POR CIUDAD ORIGEN', 'visRep_Solicitud_tabulador', 'reporte ciudad origen', '1'),
(103, 'REPORTE SOLICITUDES POR CIUDAD DESTINO', 'visRep_Solicitud_tabulador_destino', 'REPORTE CIUDAD DESTINO', '1'),
(104, 'REPORTE ORDEN DE CARGA POR ESTATUS', 'visRep_Orden_estatus', 'reporte estatus', '1'),
(105, 'REPORTE ORDEN DE CARGA POR CONDUCTOR', 'visRep_Orden_conductor', 'reporte conductor', '1'),
(106, 'REPORTE ORDEN DE CARGA POR CIUDAD ORIGEN', 'visRep_Orden_tabulador', 'reporte ciudad origen', '1'),
(107, 'REPORTE ORDEN DE CARGA POR CIUDAD DESTINO', 'visRep_Orden_tabulador_destino', 'REPORTE CIUDAD DESTINO', '1'),
(108, 'REPORTE ORDEN DE CARGA POR FECHA', 'visRep_Orden_fecha', 'reporte fecha', '1'),
(109, 'REPORTE RECEPCION DE GUIA POR ORDEN DE CARGA', 'visRep_Recepcion', 'reporte numero orden', '1'),
(110, 'REPORTE RECEPCION DE GUIA POR CLIENTE', 'visRep_Recepcion_fecha', 'reporte recepcion cliente', '1'),
(111, 'REPORTE RECEPCION DE GUIA POR CONDUCTOR', 'visRep_Recepcion_conductor', 'reporte fecha conductor', '1'),
(112, 'REPORTE RELACION DE UNIDADES POR ESTATUS', 'visRep_Relacion_estatus', 'reporte relacion estatus', '1'),
(113, 'REPORTE RELACION DE UNIDADES POR CONDUCTOR', 'visRep_Relacion_conductor', 'reporte relacion conductor', '1'),
(114, 'Chofer', 'chofer', 'Formulario de choer', '1'),
(115, 'Mecanico', 'mecanico', 'mecanico', '1'),
(116, 'Asignacion de unidad', 'asignacion_unidad', 'Asignacion de unidades', '1'),
(117, 'Auxilio vial', 'auxilio_vial', 'auxilio vial', '1'),
(118, 'Modelo de repuesto', 'modelo_repuesto', 'modelo de repuesto', '1'),
(119, 'Marca de repuesto', 'marca_repuesto', 'Marca de repuesto', '1'),
(120, 'repuesto', 'repuesto_unidad', 'repuesto', '1'),
(121, 'MANTENIMIENTO CORRECTIVO', 'TMANTENIMIENTO_CORRECTIVO', 'SOLICITUDES DE MATERIALES', '0'),
(122, 'Repuestos', 'repuesto', 'repuesto', '1'),
(123, 'SOLICITUD DE MATERIAL', 'SOLICITUD_MATERIALES', 'REALIZAR SOLICITUD DE MATERIALES', '1'),
(124, ' LUBRICANTES', 'TLUBRICANTES', 'f', '1'),
(125, 'MANTENIMIENTO PREVENTIVO', 'tmantenimiento', '5', '1'),
(126, 'REGISTRO DIARIO', 'tregistrodiario', '5', '1'),
(127, 'ASIGNACIÓN DE CARGA', 'TASIGNACION_CARGA', 'ESTA ES UNA DESCRIPCION', '1'),
(128, 'GESTIONAR CARGA', 'tcarga', 'aQUI GESTIONAMOS LA CARGA QUE LLEVARA UNA UNI', '1'),
(129, 'Reportes Generales', 'treporte_registrodiario', '9', '1'),
(130, 'FALLA', 'TFALLA', 'REGISTRAR LAS FALLAS DE UNA UNIDAD', '1'),
(131, 'ADMINISTRACIÓN DE FALLAS', 'TADMINISTRACION_FALLA', 'ADMINISTRAR LAS FALLAS DE UNIDAD POR MODELO', '1'),
(132, 'ENTRADA DE UNIDAD', 'entradamantenimiento', 'para registrar las entradas de los mantenimie', '1'),
(133, 'DIAGNÓSTICO DE UNIDAD', 'diagnosticomantenimiento', 'PARA REALIZAR EL DIAGNÓSTICO A LA UNIDAD QUE ', '1'),
(134, 'SALIDA DE UNIDAD', 'salidamantenimiento', 'MARCADO DE LA SALIDA DE LA UNIDAD UNA VEZ REA', '1'),
(135, 'INVENTARIO DE REPUESTOS', 'INVENTARIOREPUESTOS', 'CONTROL DE INVENTARIO DE REPUESTOS', '1'),
(136, 'INVENTARIO DE CAUCHOS', 'INVENTARIOCAUCHOS', 'CONTROL DE STOCK DE CAUCHOS DE LA ORGANIZACIÓ', '1'),
(137, 'REQUISICIÓN', 'REQUISICION', 'REQUISICIÓN DE MATERIALES', '1'),
(138, 'MEDIDA DE CAUCHOS', 'MEDIDACAUCHOS', 'PARA REGISTRAR LAS DIFERENTES MEDIDAS DE LOS ', '1'),
(139, 'MARCA DE CAUCHOS', 'marcacauchos', 'para registrar la marca de los cauchos', '1'),
(140, 'CAUCHOS', 'cauchos', 'para registrar los diferentes tipos de caucho', '1'),
(141, 'ORDEN DE ENTRADA', 'ORDENENTRADA', 'ORDENES DE ENTRADA POR PREVIA REQUISICIÓN EN ', '1'),
(142, 'POR ENTRADA', 'Aentrada', 'ajustes por entrada de inventario', '1'),
(143, 'POR SALIDA', 'asalida', 'ajustes de salida de inventario', '1'),
(144, 'CONFIRMAR REQUISICIÓN', 'CONFIRMARREQUISICION', 'confirmación de las solicitudes de repuestos', '1'),
(145, 'REPORTES DE INVENTARIO', 'rinventario', 'reportes parametrizados de inventario', '1'),
(146, 'ORDEN DE COMPRA', 'ordencompra', 'ordenes de compra por previa confirmación de ', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_carga`
--

CREATE TABLE IF NOT EXISTS `orden_carga` (
`idorden_carga` int(11) NOT NULL COMMENT 'Debemos llamar todos los datos y verificar quien registrará el "producto"',
  `fecha_hora_ordcar` datetime DEFAULT NULL,
  `estatus_ordcar` varchar(45) DEFAULT NULL,
  `eliminado_ordcar` varchar(45) DEFAULT NULL,
  `idsolicitud` int(11) NOT NULL,
  `idrelacion_unidad` int(9) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `orden_carga`
--

INSERT INTO `orden_carga` (`idorden_carga`, `fecha_hora_ordcar`, `estatus_ordcar`, `eliminado_ordcar`, `idsolicitud`, `idrelacion_unidad`) VALUES
(1, '2015-05-22 03:16:04', 'ejecutada', '1', 1, 19715018);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
`idpais` int(3) NOT NULL,
  `desc_pais` varchar(20) DEFAULT NULL,
  `estatus_pai` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `desc_pais`, `estatus_pai`) VALUES
(1, 'Venezuela', '1'),
(2, 'PANAMA', '1'),
(3, 'COLOMBIA', '1'),
(4, 'BOLIVIA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE IF NOT EXISTS `parroquia` (
`idparroquia` int(8) NOT NULL,
  `desc_parr` varchar(20) DEFAULT NULL,
  `estatus_par` varchar(45) DEFAULT '1',
  `idmunicipio` int(8) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1139 ;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`idparroquia`, `desc_parr`, `estatus_par`, `idmunicipio`) VALUES
(1, 'Alto Orinoco', '1', 1),
(2, 'Huachamacare Acanaña', '1', 1),
(3, 'Marawaka Toky Shaman', '1', 1),
(4, 'Mavaka Mavaka', '1', 1),
(5, 'Sierra Parima Parima', '1', 1),
(6, 'Ucata Laja Lisa', '1', 2),
(7, 'Yapacana Macuruco', '1', 2),
(8, 'Caname Guarinuma', '1', 2),
(9, 'Fernando Giron Tovar', '1', 3),
(10, 'Luis Alberto Gomez', '1', 3),
(11, 'Pahueña Limon de Par', '1', 3),
(12, 'Platanillal Platanil', '1', 3),
(13, 'Samariapo', '1', 4),
(14, 'Sipapo', '1', 4),
(15, 'Munduapo', '1', 4),
(16, 'Guayapo', '1', 4),
(17, 'Alto Ventuari', '1', 5),
(18, 'Medio Ventuari', '1', 5),
(19, 'Bajo Ventuari', '1', 5),
(20, 'Victorino', '1', 6),
(21, 'Comunidad', '1', 6),
(22, 'Casiquiare', '1', 7),
(23, 'Cocuy', '1', 7),
(24, 'San Carlos de Rio Ne', '1', 7),
(25, 'Solano', '1', 7),
(26, 'Anaco', '1', 8),
(27, 'San Joaquin', '1', 8),
(28, 'Cachipo', '1', 9),
(29, 'Aragua de Barcelona', '1', 9),
(30, 'Lecheria', '1', 11),
(31, 'El Morro', '1', 11),
(32, 'Puerto Piritu', '1', 12),
(33, 'San Miguel', '1', 12),
(34, 'Sucre', '1', 12),
(35, 'Valle de Guanape', '1', 13),
(36, 'Santa Barbara', '1', 13),
(37, 'El Chaparro', '1', 14),
(38, 'Tomas Alfaro', '1', 14),
(39, 'Calatrava', '1', 14),
(40, 'Guanta', '1', 15),
(41, 'Chorreron', '1', 15),
(42, 'Mamo', '1', 16),
(43, 'Soledad', '1', 16),
(44, 'Mapire', '1', 17),
(45, 'Piar', '1', 17),
(46, 'Santa Clara', '1', 17),
(47, 'San Diego de Cabruti', '1', 17),
(48, 'Uverito', '1', 17),
(49, 'Zuata', '1', 17),
(50, 'Puerto La Cruz', '1', 18),
(51, 'Pozuelos', '1', 18),
(52, 'Onoto', '1', 19),
(53, 'San Pablo', '1', 19),
(54, 'San Mateo', '1', 20),
(55, 'El Carito', '1', 20),
(56, 'Santa Ines', '1', 20),
(57, 'La Romereña', '1', 20),
(58, 'Atapirire', '1', 21),
(59, 'Boca del Pao', '1', 21),
(60, 'El Pao', '1', 21),
(61, 'Pariaguan', '1', 21),
(62, 'Cantaura', '1', 22),
(63, 'Libertador', '1', 22),
(64, 'Santa Rosa', '1', 22),
(65, 'Urica', '1', 22),
(66, 'Piritu', '1', 23),
(67, 'San Francisco', '1', 23),
(68, 'San Jose de Guanipa', '1', 24),
(69, 'Boca de Uchire', '1', 25),
(70, 'Boca de Chavez', '1', 25),
(71, 'Pueblo Nuevo', '1', 26),
(72, 'Santa Ana', '1', 26),
(73, 'Bergatin', '1', 27),
(74, 'Caigua', '1', 27),
(75, 'El Carmen', '1', 27),
(76, 'El Pilar', '1', 27),
(77, 'Naricual', '1', 27),
(78, 'San Crsitobal', '1', 27),
(79, 'Edmundo Barrios', '1', 28),
(80, 'Miguel Otero Silva', '1', 28),
(81, 'Achaguas', '1', 29),
(82, 'Apurito', '1', 29),
(83, 'El Yagual', '1', 29),
(84, 'Guachara', '1', 29),
(85, 'Mucuritas', '1', 29),
(86, 'Queseras del medio', '1', 29),
(87, 'Biruaca', '1', 30),
(88, 'Bruzual', '1', 31),
(89, 'Mantecal', '1', 31),
(90, 'Quintero', '1', 31),
(91, 'Rincon Hondo', '1', 31),
(92, 'San Vicente', '1', 31),
(93, 'Guasdualito', '1', 32),
(94, 'Aramendi', '1', 32),
(95, 'El Amparo', '1', 32),
(96, 'San Camilo', '1', 32),
(97, 'Urdaneta', '1', 32),
(98, 'San Juan de Payara', '1', 33),
(99, 'Codazzi', '1', 33),
(100, 'Cunaviche', '1', 33),
(101, 'Elorza', '1', 34),
(102, 'La Trinidad', '1', 34),
(103, 'San Fernando', '1', 35),
(104, 'El Recreo', '1', 35),
(105, 'Peñalver', '1', 35),
(106, 'San Rafael de Atamai', '1', 35),
(107, 'Pedro Jose Ovalles', '1', 36),
(108, 'Joaquin Crespo', '1', 36),
(109, 'Jose Casanova Godoy', '1', 36),
(110, 'Madre Maria de San J', '1', 36),
(111, 'Andres Eloy Blanco', '1', 36),
(112, 'Los Tacarigua', '1', 36),
(113, 'Las Delicias', '1', 36),
(114, 'Choroni', '1', 36),
(115, 'Bolivar', '1', 37),
(116, 'Camatagua', '1', 38),
(117, 'Carmen de Cura', '1', 38),
(118, 'Santa Rita', '1', 39),
(119, 'Francisco de Miranda', '1', 39),
(120, 'Moseñor Feliciano Go', '1', 39),
(121, 'Santa Cruz', '1', 40),
(122, 'Jose Felix Ribas', '1', 41),
(123, 'Castor Nieves Rios', '1', 41),
(124, 'Las Guacamayas', '1', 41),
(125, 'Pao de Zarate', '1', 41),
(126, 'Zuata', '1', 41),
(127, 'Jose Rafael Revenga', '1', 42),
(128, 'Palo Negro', '1', 43),
(129, 'San Martin de Porres', '1', 43),
(130, 'El Limon', '1', 44),
(131, 'Caña de Azucar', '1', 44),
(132, 'Ocumare de la Costa', '1', 45),
(133, 'San Casimiro', '1', 46),
(134, 'Güiripa', '1', 46),
(135, 'Ollas de Caramacate', '1', 46),
(136, 'Valle Morin', '1', 46),
(137, 'San Sebastian', '1', 47),
(138, 'Turmero', '1', 48),
(139, 'Arevalo Aponte', '1', 48),
(140, 'Chuao', '1', 48),
(141, 'Saman de Güere', '1', 48),
(142, 'Alfredo Pacheco Mira', '1', 48),
(143, 'Santos Michelena', '1', 49),
(144, 'Tiara', '1', 49),
(145, 'Cagua', '1', 50),
(146, 'Bella Vista', '1', 50),
(147, 'Tovar', '1', 51),
(148, 'Urdaneta', '1', 52),
(149, 'Las Peñitas', '1', 52),
(150, 'San Francisco de Car', '1', 52),
(151, 'Taguay', '1', 52),
(152, 'Zamora', '1', 53),
(153, 'Magdaleno', '1', 53),
(154, 'San Francisco de Asi', '1', 53),
(155, 'Valles de Tucutunemo', '1', 53),
(156, 'Augusto Mijares', '1', 53),
(157, 'Sabaneta', '1', 54),
(158, 'Juan Antonio Rodrigu', '1', 54),
(159, 'El Canton', '1', 55),
(160, 'Santa Cruz de Guacas', '1', 55),
(161, 'Puerto Vivas', '1', 55),
(162, 'Ticoporo', '1', 56),
(163, 'Nicolas Pulido', '1', 56),
(164, 'Andres Bello', '1', 56),
(165, 'Arismendi', '1', 57),
(166, 'Guadarrama', '1', 57),
(167, 'La Union', '1', 57),
(168, 'San Antonio', '1', 57),
(169, 'Barinas', '1', 58),
(170, 'Alberto Arvelo Larri', '1', 58),
(171, 'San Silvestre', '1', 58),
(172, 'Santa Ines', '1', 58),
(173, 'Santa Lucia', '1', 58),
(174, 'Torumos', '1', 58),
(175, 'El Carmen', '1', 58),
(176, 'Romulo Betancourt', '1', 58),
(177, 'Corazon de Jesus', '1', 58),
(178, 'Ramon Ignacio Mendez', '1', 58),
(179, 'Alto Barinas', '1', 58),
(180, 'Manuel Palacio Fajar', '1', 58),
(181, 'Juan Antonio Rodrigu', '1', 58),
(182, 'Dominga Ortiz de Pae', '1', 58),
(183, 'Barinitas', '1', 59),
(184, 'Altamira de Caceres', '1', 59),
(185, 'Calderas', '1', 59),
(186, 'Barrancas', '1', 60),
(187, 'El Socorro', '1', 60),
(188, 'Mazparrito', '1', 60),
(189, 'Santa Barbara', '1', 61),
(190, 'Pedro Briceño Mendez', '1', 61),
(191, 'Ramon Ignacio Mendez', '1', 61),
(192, 'Jose Ignacio del Pum', '1', 61),
(193, 'Obispos', '1', 62),
(194, 'Guasimitos', '1', 62),
(195, 'El Real', '1', 62),
(196, 'La Luz', '1', 62),
(197, 'Ciudad Bolivia', '1', 63),
(198, 'Jose Ignacio Briceño', '1', 63),
(199, 'Jose Felix Ribas', '1', 63),
(200, 'Paez', '1', 63),
(201, 'Libertad', '1', 64),
(202, 'Dolores', '1', 64),
(203, 'Santa Rosa', '1', 64),
(204, 'Palacio Fajardo', '1', 64),
(205, 'Ciudad de Nutrias', '1', 65),
(206, 'El Regalo', '1', 65),
(207, 'Puerto Nutrias', '1', 65),
(208, 'Santa Catalina', '1', 65),
(209, 'Cachamay', '1', 66),
(210, 'Chirica', '1', 66),
(211, 'Dalla Costa', '1', 66),
(212, 'Once de Abril', '1', 66),
(213, 'Simon Bolivar', '1', 66),
(214, 'Unare', '1', 66),
(215, 'Universidad', '1', 66),
(216, 'Vista al Sol', '1', 66),
(217, 'Pozo Verde', '1', 66),
(218, 'Yocoima', '1', 66),
(219, '5 de Julio', '1', 66),
(220, 'Cedeño', '1', 67),
(221, 'Altagracia', '1', 67),
(222, 'Ascension Farreras', '1', 67),
(223, 'Guaniamo', '1', 67),
(224, 'La Urbana', '1', 67),
(225, 'Pijiguaos', '1', 67),
(226, 'El Callao', '1', 68),
(227, 'Gran Sabana', '1', 69),
(228, 'Ikabaru', '1', 69),
(229, 'Catedral', '1', 70),
(230, 'Zea', '1', 70),
(231, 'Orinoco', '1', 70),
(232, 'Jose Antonio Paez', '1', 70),
(233, 'Marhuanta', '1', 70),
(234, 'Agua Salada', '1', 70),
(235, 'Vista Hermosa', '1', 70),
(236, 'La Sabanita', '1', 70),
(237, 'Panapana', '1', 70),
(238, 'Andres Eloy Blanco', '1', 71),
(239, 'Pedro Cova', '1', 71),
(240, 'Raul Leoni', '1', 72),
(241, 'Barceloneta', '1', 72),
(242, 'Santa Barbara', '1', 72),
(243, 'San Francisco', '1', 72),
(244, 'Roscio', '1', 73),
(245, 'Salom', '1', 73),
(246, 'Sifontes', '1', 74),
(247, 'Dalla Costa', '1', 74),
(248, 'San Isidro', '1', 74),
(249, 'Sucre', '1', 75),
(250, 'Aripao', '1', 75),
(251, 'Guarataro', '1', 75),
(252, 'Las Majadas', '1', 75),
(253, 'Moitaco', '1', 75),
(254, 'Padre Pedro Chien', '1', 76),
(255, 'Rio Grande', '1', 76),
(256, 'Bejuma', '1', 77),
(257, 'Canoabo', '1', 77),
(258, 'Simon Bolivar', '1', 77),
(259, 'Güigüe', '1', 78),
(260, 'Carabobo', '1', 78),
(261, 'Tacarigua', '1', 78),
(262, 'Mariara', '1', 79),
(263, 'Aguas Calientes', '1', 79),
(264, 'Ciudad Alianza', '1', 80),
(265, 'Guacara', '1', 80),
(266, 'Yagua', '1', 80),
(267, 'Moron', '1', 81),
(268, 'Yagua', '1', 81),
(269, 'Tocuyito', '1', 82),
(270, 'Independencia', '1', 82),
(271, 'Los Guayos', '1', 83),
(272, 'Miranda', '1', 84),
(273, 'Montalban', '1', 85),
(274, 'Naguanagua', '1', 86),
(275, 'Bartolome Salom', '1', 87),
(276, 'Democracia', '1', 87),
(277, 'Fraternidad', '1', 87),
(278, 'Goaigoaza', '1', 87),
(279, 'Juan Jose Flores', '1', 87),
(280, 'Union', '1', 87),
(281, 'Borburata', '1', 87),
(282, 'Patanemo', '1', 87),
(283, 'San Diego', '1', 88),
(284, 'San Joaquin', '1', 89),
(285, 'Candelaria', '1', 90),
(286, 'Catedral', '1', 90),
(287, 'El Socorro', '1', 90),
(288, 'Miguel Peña', '1', 90),
(289, 'Rafael Urdaneta', '1', 90),
(290, 'San Blas', '1', 90),
(291, 'San Jose', '1', 90),
(292, 'Santa Rosa', '1', 90),
(293, 'Negro Primero', '1', 90),
(294, 'Cojedes', '1', 91),
(295, 'Juan de Mata Suarez', '1', 91),
(296, 'Tinaquillo', '1', 92),
(297, 'El Baul', '1', 93),
(298, 'Sucre', '1', 93),
(299, 'La Aguadita', '1', 94),
(300, 'Macapo', '1', 94),
(301, 'El Pao', '1', 95),
(302, 'El Amparo', '1', 96),
(303, 'Libertad de Cojedes', '1', 96),
(304, 'Romulo Gallegos', '1', 97),
(305, 'San Carlos de Austri', '1', 98),
(306, 'Juan angel Bravo', '1', 98),
(307, 'Manuel Manrique', '1', 98),
(308, 'General en Jefe Jose', '1', 99),
(309, 'Curiapo', '1', 100),
(310, 'Almirante Luis Brion', '1', 100),
(311, 'Francisco Aniceto Lu', '1', 100),
(312, 'Manuel Renaud', '1', 100),
(313, 'Padre Barral', '1', 100),
(314, 'Santos de Abelgas', '1', 100),
(315, 'Imataca', '1', 101),
(316, 'Cinco de Julio', '1', 101),
(317, 'Juan Bautista Arisme', '1', 101),
(318, 'Manuel Piar', '1', 101),
(319, 'Romulo Gallegos', '1', 101),
(320, 'Pedernales', '1', 102),
(321, 'Luis Beltran Prieto ', '1', 102),
(322, 'San Jose (Delta Amac', '1', 103),
(323, 'Jose Vidal Marcano', '1', 103),
(324, 'Juan Millan', '1', 103),
(325, 'Leonardo Ruiz Pineda', '1', 103),
(326, 'Mariscal Antonio Jos', '1', 103),
(327, 'Monseñor Argimiro Ga', '1', 103),
(328, 'San Rafael (Delta Am', '1', 103),
(329, 'Virgen del Valle', '1', 103),
(330, 'Clarines', '1', 10),
(331, 'Guanape', '1', 10),
(332, 'Sabana de Uchire', '1', 10),
(333, 'Capadare', '1', 104),
(334, 'La Pastora', '1', 104),
(335, 'Libertador', '1', 104),
(336, 'San Juan de los Cayo', '1', 104),
(337, 'Aracua', '1', 105),
(338, 'La Peña', '1', 105),
(339, 'San Luis', '1', 105),
(340, 'Bariro', '1', 106),
(341, 'Borojo', '1', 106),
(342, 'Capatarida', '1', 106),
(343, 'Guajiro', '1', 106),
(344, 'Seque', '1', 106),
(345, 'Zazarida', '1', 106),
(346, 'Valle de Eroa', '1', 106),
(347, 'Cacique Manaure', '1', 107),
(348, 'Norte', '1', 108),
(349, 'Carirubana', '1', 108),
(350, 'Santa Ana', '1', 108),
(351, 'Urbana Punta Cardon', '1', 108),
(352, 'La Vela de Coro', '1', 109),
(353, 'Acurigua', '1', 109),
(354, 'Guaibacoa', '1', 109),
(355, 'Las Calderas', '1', 109),
(356, 'Macoruca', '1', 109),
(357, 'Dabajuro', '1', 110),
(358, 'Agua Clara', '1', 111),
(359, 'Avaria', '1', 111),
(360, 'Pedregal', '1', 111),
(361, 'Piedra Grande', '1', 111),
(362, 'Purureche', '1', 111),
(363, 'Adaure', '1', 112),
(364, 'Adicora', '1', 112),
(365, 'Baraived', '1', 112),
(366, 'Buena Vista', '1', 112),
(367, 'Jadacaquiva', '1', 112),
(368, 'El Vinculo', '1', 112),
(369, 'El Hato', '1', 112),
(370, 'Moruy', '1', 112),
(371, 'Pueblo Nuevo', '1', 112),
(372, 'Agua Larga', '1', 113),
(373, 'El Pauji', '1', 113),
(374, 'Independencia', '1', 113),
(375, 'Maparari', '1', 113),
(376, 'Agua Linda', '1', 114),
(377, 'Araurima', '1', 114),
(378, 'Jacura', '1', 114),
(379, 'Tucacas', '1', 115),
(380, 'Boca de Aroa', '1', 115),
(381, 'Los Taques', '1', 116),
(382, 'Judibana', '1', 116),
(383, 'Mene de Mauroa', '1', 117),
(384, 'San Felix', '1', 117),
(385, 'Casigua', '1', 117),
(386, 'Guzman Guillermo', '1', 118),
(387, 'Mitare', '1', 118),
(388, 'Rio Seco', '1', 118),
(389, 'Sabaneta', '1', 118),
(390, 'San Antonio', '1', 118),
(391, 'San Gabriel', '1', 118),
(392, 'Santa Ana', '1', 118),
(393, 'Boca del Tocuyo', '1', 119),
(394, 'Chichiriviche', '1', 119),
(395, 'Tocuyo de la Costa', '1', 119),
(396, 'Palmasola', '1', 120),
(397, 'Cabure', '1', 121),
(398, 'Colina', '1', 121),
(399, 'Curimagua', '1', 121),
(400, 'San Jose de la Costa', '1', 122),
(401, 'Piritu', '1', 122),
(402, 'San Francisco', '1', 123),
(403, 'Sucre', '1', 124),
(404, 'Pecaya', '1', 124),
(405, 'Tocopero', '1', 125),
(406, 'El Charal', '1', 126),
(407, 'Las Vegas del Tuy', '1', 126),
(408, 'Santa Cruz de Bucara', '1', 126),
(409, 'Bruzual', '1', 127),
(410, 'Urumaco', '1', 127),
(411, 'Puerto Cumarebo', '1', 128),
(412, 'La Cienaga', '1', 128),
(413, 'La Soledad', '1', 128),
(414, 'Pueblo Cumarebo', '1', 128),
(415, 'Zazarida', '1', 128),
(416, 'Churuguara', '1', 113),
(417, 'Camaguan', '1', 129),
(418, 'Puerto Miranda', '1', 129),
(419, 'Uverito', '1', 129),
(420, 'Chaguaramas', '1', 130),
(421, 'El Socorro', '1', 131),
(422, 'Tucupido', '1', 132),
(423, 'San Rafael de Laya', '1', 132),
(424, 'Altagracia de Orituc', '1', 133),
(425, 'San Rafael de Orituc', '1', 133),
(426, 'San Francisco Javier', '1', 133),
(427, 'Paso Real de Macaira', '1', 133),
(428, 'Carlos Soublette', '1', 133),
(429, 'San Francisco de Mac', '1', 133),
(430, 'Libertad de Orituco', '1', 133),
(431, 'Cantaclaro', '1', 134),
(432, 'San Juan de los Morr', '1', 134),
(433, 'Parapara', '1', 134),
(434, 'El Sombrero', '1', 135),
(435, 'Sosa', '1', 135),
(436, 'Las Mercedes', '1', 136),
(437, 'Cabruta', '1', 136),
(438, 'Santa Rita de Manapi', '1', 136),
(439, 'Valle de la Pascua', '1', 137),
(440, 'Espino', '1', 137),
(441, 'San Jose de Unare', '1', 138),
(442, 'Zaraza', '1', 138),
(443, 'San Jose de Tiznados', '1', 139),
(444, 'San Francisco de Tiz', '1', 139),
(445, 'San Lorenzo de Tizna', '1', 139),
(446, 'Ortiz', '1', 139),
(447, 'Guayabal', '1', 140),
(448, 'Cazorla', '1', 140),
(449, 'San Jose de Guaribe', '1', 141),
(450, 'Uveral', '1', 141),
(451, 'Santa Maria de Ipire', '1', 142),
(452, 'Altamira', '1', 142),
(453, 'El Calvario', '1', 143),
(454, 'El Rastro', '1', 143),
(455, 'Guardatinajas', '1', 143),
(456, 'Capital Urbana Calab', '1', 143),
(457, 'Quebrada Honda de Gu', '1', 144),
(458, 'Pio Tamayo', '1', 144),
(459, 'Yacambu', '1', 144),
(460, 'Freitez', '1', 145),
(461, 'Jose Maria Blanco', '1', 145),
(462, 'Catedral', '1', 146),
(463, 'Concepcion', '1', 146),
(464, 'El Cuji', '1', 146),
(465, 'Juan de Villegas', '1', 146),
(466, 'Santa Rosa', '1', 146),
(467, 'Tamaca', '1', 146),
(468, 'Union', '1', 146),
(469, 'Aguedo Felipe Alvara', '1', 146),
(470, 'Buena Vista', '1', 146),
(471, 'Juarez', '1', 146),
(472, 'Juan Bautista Rodrig', '1', 147),
(473, 'Cuara', '1', 147),
(474, 'Diego de Lozada', '1', 147),
(475, 'Paraiso de San Jose', '1', 147),
(476, 'San Miguel', '1', 147),
(477, 'Tintorero', '1', 147),
(478, 'Jose Bernardo Dorant', '1', 147),
(479, 'Coronel Mariano Pera', '1', 147),
(480, 'Bolivar', '1', 148),
(481, 'Anzoategui', '1', 148),
(482, 'Guarico', '1', 148),
(483, 'Hilario Luna y Luna', '1', 148),
(484, 'Humocaro Alto', '1', 148),
(485, 'Humocaro Bajo', '1', 148),
(486, 'La Candelaria', '1', 148),
(487, 'Moran', '1', 148),
(488, 'Cabudare', '1', 149),
(489, 'Jose Gregorio Bastid', '1', 149),
(490, 'Agua Viva', '1', 149),
(491, 'Sarare', '1', 150),
(492, 'Buria', '1', 150),
(493, 'Gustavo Vegas Leon', '1', 150),
(494, 'Trinidad Samuel', '1', 151),
(495, 'Antonio Diaz', '1', 151),
(496, 'Camacaro', '1', 151),
(497, 'Castañeda', '1', 151),
(498, 'Cecilio Zubillaga', '1', 151),
(499, 'Chiquinquira', '1', 151),
(500, 'El Blanco', '1', 151),
(501, 'Espinoza de los Mont', '1', 151),
(502, 'Lara', '1', 151),
(503, 'Las Mercedes', '1', 151),
(504, 'Manuel Morillo', '1', 151),
(505, 'Montaña Verde', '1', 151),
(506, 'Montes de Oca', '1', 151),
(507, 'Torres', '1', 151),
(508, 'Heriberto Arroyo', '1', 151),
(509, 'Reyes Vargas', '1', 151),
(510, 'Altagracia', '1', 151),
(511, 'Siquisique', '1', 152),
(512, 'Moroturo', '1', 152),
(513, 'San Miguel', '1', 152),
(514, 'Xaguas', '1', 152),
(515, 'Presidente Betancour', '1', 179),
(516, 'Presidente Paez', '1', 179),
(517, 'Presidente Romulo Ga', '1', 179),
(518, 'Gabriel Picon Gonzal', '1', 179),
(519, 'Hector Amable Mora', '1', 179),
(520, 'Jose Nucete Sardi', '1', 179),
(521, 'Pulido Mendez', '1', 179),
(522, 'La Azulita', '1', 180),
(523, 'Santa Cruz de Mora', '1', 181),
(524, 'Mesa Bolivar', '1', 181),
(525, 'Mesa de Las Palmas', '1', 181),
(526, 'Aricagua', '1', 182),
(527, 'San Antonio', '1', 182),
(528, 'Canagua', '1', 183),
(529, 'Capuri', '1', 183),
(530, 'Chacanta', '1', 183),
(531, 'El Molino', '1', 183),
(532, 'Guaimaral', '1', 183),
(533, 'Mucutuy', '1', 183),
(534, 'Mucuchachi', '1', 183),
(535, 'Fernandez Peña', '1', 184),
(536, 'Matriz', '1', 184),
(537, 'Montalban', '1', 184),
(538, 'Acequias', '1', 184),
(539, 'Jaji', '1', 184),
(540, 'La Mesa', '1', 184),
(541, 'San Jose del Sur', '1', 184),
(542, 'Tucani', '1', 185),
(543, 'Florencio Ramirez', '1', 185),
(544, 'Santo Domingo', '1', 186),
(545, 'Las Piedras', '1', 186),
(546, 'Guaraque', '1', 187),
(547, 'Mesa de Quintero', '1', 187),
(548, 'Rio Negro', '1', 187),
(549, 'Arapuey', '1', 188),
(550, 'Palmira', '1', 188),
(551, 'San Cristobal de Tor', '1', 189),
(552, 'Torondoy', '1', 189),
(553, 'Antonio Spinetti Din', '1', 190),
(554, 'Arias', '1', 190),
(555, 'Caracciolo Parra Per', '1', 190),
(556, 'Domingo Peña', '1', 190),
(557, 'El Llano', '1', 190),
(558, 'Gonzalo Picon Febres', '1', 190),
(559, 'Jacinto Plaza', '1', 190),
(560, 'Juan Rodriguez Suare', '1', 190),
(561, 'Lasso de la Vega', '1', 190),
(562, 'Mariano Picon Salas', '1', 190),
(563, 'Milla', '1', 190),
(564, 'Osuna Rodriguez', '1', 190),
(565, 'Sagrario', '1', 190),
(566, 'El Morro', '1', 190),
(567, 'Los Nevados', '1', 190),
(568, 'Andres Eloy Blanco', '1', 191),
(569, 'La Venta', '1', 191),
(570, 'Piñango', '1', 191),
(571, 'Timotes', '1', 191),
(572, 'Eloy Paredes', '1', 192),
(573, 'San Rafael de Alcaza', '1', 192),
(574, 'Santa Elena de Arena', '1', 192),
(575, 'Santa Maria de Capar', '1', 193),
(576, 'Pueblo Llano', '1', 194),
(577, 'Cacute', '1', 195),
(578, 'La Toma', '1', 195),
(579, 'Mucuchies', '1', 195),
(580, 'Mucuruba', '1', 195),
(581, 'San Rafael', '1', 195),
(582, 'Geronimo Maldonado', '1', 196),
(583, 'Bailadores', '1', 196),
(584, 'Tabay', '1', 197),
(585, 'Chiguara', '1', 198),
(586, 'Estanquez', '1', 198),
(587, 'Lagunillas', '1', 198),
(588, 'La Trampa', '1', 198),
(589, 'Pueblo Nuevo del Sur', '1', 198),
(590, 'San Juan', '1', 198),
(591, 'El Amparo', '1', 199),
(592, 'El Llano', '1', 199),
(593, 'San Francisco', '1', 199),
(594, 'Tovar', '1', 199),
(595, 'Independencia', '1', 200),
(596, 'Maria de la Concepci', '1', 200),
(597, 'Nueva Bolivia', '1', 200),
(598, 'Santa Apolonia', '1', 200),
(599, 'Caño El Tigre', '1', 201),
(600, 'Zea', '1', 201),
(601, 'Aragüita', '1', 223),
(602, 'Arevalo Gonzalez', '1', 223),
(603, 'Capaya', '1', 223),
(604, 'Caucagua', '1', 223),
(605, 'Panaquire', '1', 223),
(606, 'Ribas', '1', 223),
(607, 'El Cafe', '1', 223),
(608, 'Marizapa', '1', 223),
(609, 'Cumbo', '1', 224),
(610, 'San Jose de Barloven', '1', 224),
(611, 'El Cafetal', '1', 225),
(612, 'Las Minas', '1', 225),
(613, 'Nuestra Señora del R', '1', 225),
(614, 'Higuerote', '1', 226),
(615, 'Curiepe', '1', 226),
(616, 'Tacarigua de Brion', '1', 226),
(617, 'Mamporal', '1', 227),
(618, 'Carrizal', '1', 228),
(619, 'Chacao', '1', 229),
(620, 'Charallave', '1', 230),
(621, 'Las Brisas', '1', 230),
(622, 'El Hatillo', '1', 231),
(623, 'Altagracia de la Mon', '1', 232),
(624, 'Cecilio Acosta', '1', 232),
(625, 'Los Teques', '1', 232),
(626, 'El Jarillo', '1', 232),
(627, 'San Pedro', '1', 232),
(628, 'Tacata', '1', 232),
(629, 'Paracotos', '1', 232),
(630, 'Cartanal', '1', 233),
(631, 'Santa Teresa del Tuy', '1', 233),
(632, 'La Democracia', '1', 234),
(633, 'Ocumare del Tuy', '1', 234),
(634, 'Santa Barbara', '1', 234),
(635, 'San Antonio de los A', '1', 235),
(636, 'Rio Chico', '1', 236),
(637, 'El Guapo', '1', 236),
(638, 'Tacarigua de la Lagu', '1', 236),
(639, 'Paparo', '1', 236),
(640, 'San Fernando del Gua', '1', 236),
(641, 'Santa Lucia del Tuy', '1', 237),
(642, 'Cupira', '1', 238),
(643, 'Machurucuto', '1', 238),
(644, 'Guarenas', '1', 239),
(645, 'San Antonio de Yare', '1', 240),
(646, 'San Francisco de Yar', '1', 240),
(647, 'Leoncio Martinez', '1', 241),
(648, 'Petare', '1', 241),
(649, 'Caucagüita', '1', 241),
(650, 'Filas de Mariche', '1', 241),
(651, 'La Dolorita', '1', 241),
(652, 'Cua', '1', 242),
(653, 'Nueva Cua', '1', 242),
(654, 'Guatire', '1', 243),
(655, 'Bolivar', '1', 243),
(656, 'San Antonio de Matur', '1', 258),
(657, 'San Francisco de Mat', '1', 258),
(658, 'Aguasay', '1', 259),
(659, 'Caripito', '1', 260),
(660, 'El Guacharo', '1', 261),
(661, 'La Guanota', '1', 261),
(662, 'Sabana de Piedra', '1', 261),
(663, 'San Agustin', '1', 261),
(664, 'Teresen', '1', 261),
(665, 'Caripe', '1', 261),
(666, 'Areo', '1', 262),
(667, 'Capital Cedeño', '1', 262),
(668, 'San Felix de Cantali', '1', 262),
(669, 'Viento Fresco', '1', 262),
(670, 'El Tejero', '1', 263),
(671, 'Punta de Mata', '1', 263),
(672, 'Chaguaramas', '1', 264),
(673, 'Las Alhuacas', '1', 264),
(674, 'Tabasca', '1', 264),
(675, 'Temblador', '1', 264),
(676, 'Alto de los Godos', '1', 265),
(677, 'Boqueron', '1', 265),
(678, 'Las Cocuizas', '1', 265),
(679, 'La Cruz', '1', 265),
(680, 'San Simon', '1', 265),
(681, 'El Corozo', '1', 265),
(682, 'El Furrial', '1', 265),
(683, 'Jusepin', '1', 265),
(684, 'La Pica', '1', 265),
(685, 'San Vicente', '1', 265),
(686, 'Aparicio', '1', 266),
(687, 'Aragua de Maturin', '1', 266),
(688, 'Chaguamal', '1', 266),
(689, 'El Pinto', '1', 266),
(690, 'Guanaguana', '1', 266),
(691, 'La Toscana', '1', 266),
(692, 'Taguaya', '1', 266),
(693, 'Cachipo', '1', 267),
(694, 'Quiriquire', '1', 267),
(695, 'Santa Barbara', '1', 268),
(696, 'Barrancas', '1', 269),
(697, 'Los Barrancos de Faj', '1', 269),
(698, 'Uracoa', '1', 270),
(699, 'Antolin del Campo', '1', 271),
(700, 'Arismendi', '1', 272),
(701, 'Garcia', '1', 273),
(702, 'Francisco Fajardo', '1', 273),
(703, 'Bolivar', '1', 274),
(704, 'Guevara', '1', 274),
(705, 'Matasiete', '1', 274),
(706, 'Santa Ana', '1', 274),
(707, 'Sucre', '1', 274),
(708, 'Aguirre', '1', 275),
(709, 'Maneiro', '1', 275),
(710, 'Adrian', '1', 276),
(711, 'Juan Griego', '1', 276),
(712, 'Yaguaraparo', '1', 276),
(713, 'Porlamar', '1', 277),
(714, 'San Francisco de Mac', '1', 278),
(715, 'Boca de Rio', '1', 278),
(716, 'Tubores', '1', 279),
(717, 'Los Baleales', '1', 279),
(718, 'Vicente Fuentes', '1', 280),
(719, 'Villalba', '1', 280),
(720, 'San Juan Bautista', '1', 281),
(721, 'Zabala', '1', 281),
(722, 'Capital Araure', '1', 283),
(723, 'Rio Acarigua', '1', 283),
(724, 'Capital Esteller', '1', 284),
(725, 'Uveral', '1', 284),
(726, 'Guanare', '1', 285),
(727, 'Cordoba', '1', 285),
(728, 'San Jose de la Monta', '1', 285),
(729, 'San Juan de Guanagua', '1', 285),
(730, 'Virgen de la Coromot', '1', 285),
(731, 'Guanarito', '1', 286),
(732, 'Trinidad de la Capil', '1', 286),
(733, 'Divina Pastora', '1', 286),
(734, 'Monseñor Jose Vicent', '1', 287),
(735, 'Peña Blanca', '1', 287),
(736, 'Capital Ospino', '1', 288),
(737, 'Aparicion', '1', 288),
(738, 'La Estacion', '1', 288),
(739, 'Paez', '1', 289),
(740, 'Payara', '1', 289),
(741, 'Pimpinela', '1', 289),
(742, 'Ramon Peraza', '1', 289),
(743, 'Papelon', '1', 290),
(744, 'Caño Delgadito', '1', 290),
(745, 'San Genaro de Bocono', '1', 291),
(746, 'Antolin Tovar', '1', 291),
(747, 'San Rafael de Onoto', '1', 292),
(748, 'Santa Fe', '1', 292),
(749, 'Thermo Morles', '1', 292),
(750, 'Santa Rosalia', '1', 293),
(751, 'Florida', '1', 293),
(752, 'Sucre', '1', 294),
(753, 'Concepcion', '1', 294),
(754, 'San Rafael de Palo A', '1', 294),
(755, 'Uvencio Antonio Vela', '1', 294),
(756, 'San Jose de Saguaz', '1', 294),
(757, 'Villa Rosa', '1', 294),
(758, 'Turen', '1', 295),
(759, 'Canelones', '1', 295),
(760, 'Santa Cruz', '1', 295),
(761, 'San Isidro Labrador', '1', 295),
(762, 'Mariño', '1', 296),
(763, 'Romulo Gallegos', '1', 296),
(764, 'San Jose de Aerocuar', '1', 297),
(765, 'Tavera Acosta', '1', 297),
(766, 'Rio Caribe', '1', 298),
(767, 'Antonio Jose de Sucr', '1', 298),
(768, 'El Morro de Puerto S', '1', 298),
(769, 'Puerto Santo', '1', 298),
(770, 'San Juan de las Gald', '1', 298),
(771, 'El Pilar', '1', 299),
(772, 'El Rincon', '1', 299),
(773, 'General Francisco An', '1', 299),
(774, 'Guaraunos', '1', 299),
(775, 'Tunapuicito', '1', 299),
(776, 'Union', '1', 299),
(777, 'Santa Catalina', '1', 300),
(778, 'Santa Rosa', '1', 300),
(779, 'Santa Teresa', '1', 300),
(780, 'Bolivar', '1', 300),
(781, 'Maracapana', '1', 300),
(782, 'Libertad', '1', 302),
(783, 'El Paujil', '1', 302),
(784, 'Yaguaraparo', '1', 302),
(785, 'Cruz Salmeron Acosta', '1', 303),
(786, 'Chacopata', '1', 303),
(787, 'Manicuare', '1', 303),
(788, 'Tunapuy', '1', 304),
(789, 'Campo Elias', '1', 304),
(790, 'Irapa', '1', 305),
(791, 'Campo Claro', '1', 305),
(792, 'Maraval', '1', 305),
(793, 'San Antonio de Irapa', '1', 305),
(794, 'Soro', '1', 305),
(795, 'Mejia', '1', 306),
(796, 'Cumanacoa', '1', 307),
(797, 'Arenas', '1', 307),
(798, 'Aricagua', '1', 307),
(799, 'Cogollar', '1', 307),
(800, 'San Fernando', '1', 307),
(801, 'San Lorenzo', '1', 307),
(802, 'Villa Frontado (Muel', '1', 308),
(803, 'Catuaro', '1', 308),
(804, 'Rendon', '1', 308),
(805, 'San Cruz', '1', 308),
(806, 'Santa Maria', '1', 308),
(807, 'Altagracia', '1', 309),
(808, 'Santa Ines', '1', 309),
(809, 'Valentin Valiente', '1', 309),
(810, 'Ayacucho', '1', 309),
(811, 'San Juan', '1', 309),
(812, 'Raul Leoni', '1', 309),
(813, 'Gran Mariscal', '1', 309),
(814, 'Cristobal Colon', '1', 310),
(815, 'Bideau', '1', 310),
(816, 'Punta de Piedras', '1', 310),
(817, 'Güiria', '1', 310),
(818, 'Andres Bello', '1', 341),
(819, 'Antonio Romulo Costa', '1', 342),
(820, 'Ayacucho', '1', 343),
(821, 'Rivas Berti', '1', 343),
(822, 'San Pedro del Rio', '1', 343),
(823, 'Bolivar', '1', 344),
(824, 'Palotal', '1', 344),
(825, 'General Juan Vicente', '1', 344),
(826, 'Isaias Medina Angari', '1', 344),
(827, 'Cardenas', '1', 345),
(828, 'Amenodoro angel Lamu', '1', 345),
(829, 'La Florida', '1', 345),
(830, 'Cordoba', '1', 346),
(831, 'Fernandez Feo', '1', 347),
(832, 'Alberto Adriani', '1', 347),
(833, 'Santo Domingo', '1', 347),
(834, 'Francisco de Miranda', '1', 348),
(835, 'Garcia de Hevia', '1', 349),
(836, 'Boca de Grita', '1', 349),
(837, 'Jose Antonio Paez', '1', 349),
(838, 'Guasimos', '1', 350),
(839, 'Independencia', '1', 351),
(840, 'Juan German Roscio', '1', 351),
(841, 'Roman Cardenas', '1', 351),
(842, 'Jauregui', '1', 352),
(843, 'Emilio Constantino G', '1', 352),
(844, 'Monseñor Miguel Anto', '1', 352),
(845, 'Jose Maria Vargas', '1', 353),
(846, 'Junin', '1', 354),
(847, 'La Petrolea', '1', 354),
(848, 'Quinimari', '1', 354),
(849, 'Bramon', '1', 354),
(850, 'Libertad', '1', 355),
(851, 'Cipriano Castro', '1', 355),
(852, 'Manuel Felipe Rugele', '1', 355),
(853, 'Libertador', '1', 356),
(854, 'Doradas', '1', 356),
(855, 'Emeterio Ochoa', '1', 356),
(856, 'San Joaquin de Navay', '1', 356),
(857, 'Lobatera', '1', 357),
(858, 'Constitucion', '1', 357),
(859, 'Michelena', '1', 358),
(860, 'Panamericano', '1', 359),
(861, 'La Palmita', '1', 359),
(862, 'Pedro Maria Ureña', '1', 360),
(863, 'Nueva Arcadia', '1', 360),
(864, 'Delicias', '1', 361),
(865, 'Pecaya', '1', 361),
(866, 'Samuel Dario Maldona', '1', 362),
(867, 'Bocono', '1', 362),
(868, 'Hernandez', '1', 362),
(869, 'La Concordia', '1', 363),
(870, 'San Juan Bautista', '1', 363),
(871, 'Pedro Maria Morantes', '1', 363),
(872, 'San Sebastian', '1', 363),
(873, 'Dr. Francisco Romero', '1', 363),
(874, 'Seboruco', '1', 364),
(875, 'Simon Rodriguez', '1', 365),
(876, 'Sucre', '1', 366),
(877, 'Eleazar Lopez Contre', '1', 366),
(878, 'San Pablo', '1', 366),
(879, 'Torbes', '1', 367),
(880, 'Uribante', '1', 368),
(881, 'Cardenas', '1', 368),
(882, 'Juan Pablo Peñalosa', '1', 368),
(883, 'Potosi', '1', 368),
(884, 'San Judas Tadeo', '1', 369),
(885, 'Araguaney', '1', 370),
(886, 'El Jaguito', '1', 370),
(887, 'La Esperanza', '1', 370),
(888, 'Santa Isabel', '1', 370),
(889, 'Bocono', '1', 371),
(890, 'El Carmen', '1', 371),
(891, 'Mosquey', '1', 371),
(892, 'Ayacucho', '1', 371),
(893, 'Burbusay', '1', 371),
(894, 'General Ribas', '1', 371),
(895, 'Guaramacal', '1', 371),
(896, 'Vega de Guaramacal', '1', 371),
(897, 'Monseñor Jauregui', '1', 371),
(898, 'Rafael Rangel', '1', 371),
(899, 'San Miguel', '1', 371),
(900, 'San Jose', '1', 371),
(901, 'Sabana Grande', '1', 372),
(902, 'Cheregüe', '1', 372),
(903, 'Granados', '1', 372),
(904, 'Arnoldo Gabaldon', '1', 373),
(905, 'Bolivia', '1', 373),
(906, 'Carrillo', '1', 373),
(907, 'Cegarra', '1', 373),
(908, 'Chejende', '1', 373),
(909, 'Manuel Salvador Ullo', '1', 373),
(910, 'San Jose', '1', 373),
(911, 'Carache', '1', 374),
(912, 'La Concepcion', '1', 374),
(913, 'Cuicas', '1', 374),
(914, 'Panamericana', '1', 374),
(915, 'Santa Cruz', '1', 374),
(916, 'Escuque', '1', 375),
(917, 'La Union', '1', 375),
(918, 'Santa Rita', '1', 375),
(919, 'Sabana Libre', '1', 375),
(920, 'El Socorro', '1', 376),
(921, 'Los Caprichos', '1', 376),
(922, 'Antonio Jose de Sucr', '1', 376),
(923, 'Campo Elias', '1', 377),
(924, 'Arnoldo Gabaldon', '1', 377),
(925, 'Santa Apolonia', '1', 378),
(926, 'El Progreso', '1', 378),
(927, 'La Ceiba', '1', 378),
(928, 'Tres de Febrero', '1', 378),
(929, 'El Dividive', '1', 379),
(930, 'Agua Santa', '1', 379),
(931, 'Agua Caliente', '1', 379),
(932, 'El Cenizo', '1', 379),
(933, 'Valerita', '1', 379),
(934, 'Monte Carmelo', '1', 380),
(935, 'Buena Vista', '1', 380),
(936, 'Santa Maria del Horc', '1', 380),
(937, 'Motatan', '1', 381),
(938, 'El Baño', '1', 381),
(939, 'Jalisco', '1', 381),
(940, 'Pampan', '1', 382),
(941, 'Flor de Patria', '1', 382),
(942, 'La Paz', '1', 382),
(943, 'Santa Ana', '1', 382),
(944, 'Pampanito', '1', 383),
(945, 'La Concepcion', '1', 383),
(946, 'Pampanito II', '1', 383),
(947, 'Betijoque', '1', 384),
(948, 'Jose Gregorio Hernan', '1', 384),
(949, 'La Pueblita', '1', 384),
(950, 'Los Cedros', '1', 384),
(951, 'Carvajal', '1', 385),
(952, 'Campo Alegre', '1', 385),
(953, 'Antonio Nicolas Bric', '1', 385),
(954, 'Jose Leonardo Suarez', '1', 385),
(955, 'Sabana de Mendoza', '1', 386),
(956, 'Junin', '1', 386),
(957, 'Valmore Rodriguez', '1', 386),
(958, 'El Paraiso', '1', 386),
(959, 'Andres Linares', '1', 387),
(960, 'Chiquinquira', '1', 387),
(961, 'Cristobal Mendoza', '1', 387),
(962, 'Cruz Carrillo', '1', 387),
(963, 'Matriz', '1', 387),
(964, 'Monseñor Carrillo', '1', 387),
(965, 'Tres Esquinas', '1', 387),
(966, 'Cabimbu', '1', 388),
(967, 'Jajo', '1', 388),
(968, 'La Mesa de Esnujaque', '1', 388),
(969, 'Santiago', '1', 388),
(970, 'Tuñame', '1', 388),
(971, 'La Quebrada', '1', 388),
(972, 'Juan Ignacio Montill', '1', 389),
(973, 'La Beatriz', '1', 389),
(974, 'La Puerta', '1', 389),
(975, 'Mendoza del Valle de', '1', 389),
(976, 'Mercedes Diaz', '1', 389),
(977, 'San Luis', '1', 389),
(978, 'Caraballeda', '1', 390),
(979, 'Carayaca', '1', 390),
(980, 'Carlos Soublette', '1', 390),
(981, 'Caruao Chuspa', '1', 390),
(982, 'Catia La Mar', '1', 390),
(983, 'El Junko', '1', 390),
(984, 'La Guaira', '1', 390),
(985, 'Macuto', '1', 390),
(986, 'Maiquetia', '1', 390),
(987, 'Naiguata', '1', 390),
(988, 'Urimare', '1', 390),
(989, 'Aristides Bastidas', '1', 391),
(990, 'Bolivar', '1', 392),
(991, 'Chivacoa', '1', 407),
(992, 'Campo Elias', '1', 407),
(993, 'Cocorote', '1', 408),
(994, 'Independencia', '1', 409),
(995, 'Jose Antonio Paez', '1', 410),
(996, 'La Trinidad', '1', 411),
(997, 'Manuel Monge', '1', 412),
(998, 'Salom', '1', 413),
(999, 'Temerla', '1', 413),
(1000, 'Nirgua', '1', 413),
(1001, 'San Andres', '1', 414),
(1002, 'Yaritagua', '1', 414),
(1003, 'San Javier', '1', 415),
(1004, 'Albarico', '1', 415),
(1005, 'San Felipe', '1', 415),
(1006, 'Sucre', '1', 416),
(1007, 'Urachiche', '1', 417),
(1008, 'El Guayabo', '1', 418),
(1009, 'Farriar', '1', 418),
(1010, 'Isla de Toas', '1', 441),
(1011, 'Monagas', '1', 441),
(1012, 'San Timoteo', '1', 442),
(1013, 'General Urdaneta', '1', 442),
(1014, 'Libertador', '1', 442),
(1015, 'Marcelino Briceño', '1', 442),
(1016, 'Pueblo Nuevo', '1', 442),
(1017, 'Manuel Guanipa Matos', '1', 442),
(1018, 'Ambrosio', '1', 443),
(1019, 'Carmen Herrera', '1', 443),
(1020, 'La Rosa', '1', 443),
(1021, 'German Rios Linares', '1', 443),
(1022, 'San Benito', '1', 443),
(1023, 'Romulo Betancourt', '1', 443),
(1024, 'Jorge Hernandez', '1', 443),
(1025, 'Punta Gorda', '1', 443),
(1026, 'Aristides Calvani', '1', 443),
(1027, 'Encontrados', '1', 444),
(1028, 'Udon Perez', '1', 444),
(1029, 'Moralito', '1', 445),
(1030, 'San Carlos del Zulia', '1', 445),
(1031, 'Santa Cruz del Zulia', '1', 445),
(1032, 'Santa Barbara', '1', 445),
(1033, 'Urribarri', '1', 445),
(1034, 'Carlos Quevedo', '1', 446),
(1035, 'Francisco Javier Pul', '1', 446),
(1036, 'Simon Rodriguez', '1', 446),
(1037, 'Guamo-Gavilanes', '1', 446),
(1038, 'La Concepcion', '1', 448),
(1039, 'San Jose', '1', 448),
(1040, 'Mariano Parra Leon', '1', 448),
(1041, 'Jose Ramon Yepez', '1', 448),
(1042, 'Jesus Maria Semprun', '1', 449),
(1043, 'Bari', '1', 449),
(1044, 'Concepcion', '1', 450),
(1045, 'Andres Bello', '1', 450),
(1046, 'Chiquinquira', '1', 450),
(1047, 'El Carmelo', '1', 450),
(1048, 'Potreritos', '1', 450),
(1049, 'Libertad', '1', 451),
(1050, 'Alonso de Ojeda', '1', 451),
(1051, 'Venezuela', '1', 451),
(1052, 'Eleazar Lopez Contre', '1', 451),
(1053, 'Campo Lara', '1', 451),
(1054, 'Bartolome de las Cas', '1', 452),
(1055, 'Libertad', '1', 452),
(1056, 'Rio Negro', '1', 452),
(1057, 'San Jose de Perija', '1', 452),
(1058, 'San Rafael', '1', 453),
(1059, 'La Sierrita', '1', 453),
(1060, 'Las Parcelas', '1', 453),
(1061, 'Luis de Vicente', '1', 453),
(1062, 'Monseñor Marcos Serg', '1', 453),
(1063, 'Ricaurte', '1', 453),
(1064, 'Tamare', '1', 453),
(1065, 'Antonio Borjas Romer', '1', 454),
(1066, 'Bolivar', '1', 454),
(1067, 'Cacique Mara', '1', 454),
(1068, 'Carracciolo Parra Pe', '1', 454),
(1069, 'Cecilio Acosta', '1', 454),
(1070, 'Cristo de Aranza', '1', 454),
(1071, 'Coquivacoa', '1', 454),
(1072, 'Chiquinquira', '1', 454),
(1073, 'Francisco Eugenio Bu', '1', 454),
(1074, 'Idelfonzo Vasquez', '1', 454),
(1075, 'Juana de avila', '1', 454),
(1076, 'Luis Hurtado Higuera', '1', 454),
(1077, 'Manuel Dagnino', '1', 454),
(1078, 'Olegario Villalobos', '1', 454),
(1079, 'Raul Leoni', '1', 454),
(1080, 'Santa Lucia', '1', 454),
(1081, 'Venancio Pulgar', '1', 454),
(1082, 'San Isidro', '1', 454),
(1083, 'Altagracia', '1', 455),
(1084, 'Faria', '1', 455),
(1085, 'Ana Maria Campos', '1', 455),
(1086, 'San Antonio', '1', 455),
(1087, 'San Jose', '1', 455),
(1088, 'Donaldo Garcia', '1', 456),
(1089, 'El Rosario', '1', 456),
(1090, 'Sixto Zambrano', '1', 456),
(1091, 'San Francisco', '1', 457),
(1092, 'El Bajo', '1', 457),
(1093, 'Domitila Flores', '1', 457),
(1094, 'Francisco Ochoa', '1', 457),
(1095, 'Los Cortijos', '1', 457),
(1096, 'Marcial Hernandez', '1', 457),
(1097, 'Santa Rita', '1', 458),
(1098, 'El Mene', '1', 458),
(1099, 'Pedro Lucas Urribarr', '1', 458),
(1100, 'Jose Cenobio Urribar', '1', 458),
(1101, 'Rafael Maria Baralt', '1', 459),
(1102, 'Manuel Manrique', '1', 459),
(1103, 'Rafael Urdaneta', '1', 459),
(1104, 'Bobures', '1', 460),
(1105, 'Gibraltar', '1', 460),
(1106, 'Heras', '1', 460),
(1107, 'Monseñor Arturo alva', '1', 460),
(1108, 'Romulo Gallegos', '1', 460),
(1109, 'El Batey', '1', 460),
(1110, 'Rafael Urdaneta', '1', 461),
(1111, 'La Victoria', '1', 461),
(1112, 'Raul Cuenca', '1', 461),
(1113, 'Sinamaica', '1', 447),
(1114, 'Alta Guajira', '1', 447),
(1115, 'Elias Sanchez Rubio', '1', 447),
(1116, 'Guajira', '1', 447),
(1117, 'Altagracia', '1', 462),
(1118, 'Antimano', '1', 462),
(1119, 'Caricuao', '1', 462),
(1120, 'Catedral', '1', 462),
(1121, 'Coche', '1', 462),
(1122, 'El Junquito', '1', 462),
(1123, 'El Paraiso', '1', 462),
(1124, 'El Recreo', '1', 462),
(1125, 'El Valle', '1', 462),
(1126, 'La Candelaria', '1', 462),
(1127, 'La Pastora', '1', 462),
(1128, 'La Vega', '1', 462),
(1129, 'Macarao', '1', 462),
(1130, 'San Agustin', '1', 462),
(1131, 'San Bernardino', '1', 462),
(1132, 'San Jose', '1', 462),
(1133, 'San Juan', '1', 462),
(1134, 'San Pedro', '1', 462),
(1135, 'Santa Rosalia', '1', 462),
(1136, 'Santa Teresa', '1', 462),
(1137, 'Sucre (Catia)', '1', 462),
(1138, '23 de enero', '1', 462);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
`IdPerfil` int(11) NOT NULL,
  `NombrePer` varchar(30) NOT NULL,
  `EstatusPer` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`IdPerfil`, `NombrePer`, `EstatusPer`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'ANALISTA ADMINISTRATIVO', 1),
(3, 'COORDINADOR ADMINISTRATIVO', 1),
(4, 'COORDINADOR TRAFICO I', 1),
(5, 'ANALISTA TRAFICO I', 1),
(6, 'COORDINADOR TRAFICO II', 1),
(7, 'ANALISTA TRAFICO II', 1),
(8, 'COORDINADOR TALENTO HUMANO', 1),
(9, 'ANALISTA TALENTO HUMANO', 1),
(10, 'CONDUCTOR', 1),
(11, 'EXTERNO', 1),
(12, 'COORDINADOR SISTEMA ', 1),
(13, 'ANALISTA SISTEMA', 1),
(14, 'COORDINADOR COMERCIALIZACION', 1),
(15, 'ANALISTA COMERCIALIZACION', 1),
(16, 'COORDINADOR FLOTA', 1),
(17, 'ANALISTA FLOTA', 1),
(18, 'COORDINADOR FINANZAS', 1),
(19, 'ANALISTA FINANZAS', 1),
(20, 'ANALISTA ADT', 1),
(21, 'ADMINISTRADOR DE ATC', 1),
(22, 'ALMACEN', 1),
(23, 'COMPRA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_menu`
--

CREATE TABLE IF NOT EXISTS `perfil_menu` (
`IdPerfil_Menu` int(11) NOT NULL,
  `IdPerfil` int(11) NOT NULL,
  `IdMenu` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Volcado de datos para la tabla `perfil_menu`
--

INSERT INTO `perfil_menu` (`IdPerfil_Menu`, `IdPerfil`, `IdMenu`) VALUES
(1, 1, 1),
(7, 11, 27),
(8, 11, 28),
(9, 1, 29),
(10, 1, 22),
(11, 1, 4),
(12, 1, 5),
(14, 1, 30),
(15, 1, 8),
(17, 15, 31),
(19, 15, 32),
(20, 15, 33),
(21, 15, 34),
(22, 15, 35),
(23, 15, 36),
(24, 5, 37),
(25, 5, 38),
(26, 5, 39),
(27, 7, 40),
(28, 7, 41),
(29, 7, 42),
(30, 17, 43),
(31, 17, 44),
(32, 17, 45),
(33, 19, 46),
(34, 17, 47),
(35, 20, 51),
(36, 20, 52),
(37, 20, 53),
(38, 2, 1),
(39, 1, 54),
(41, 21, 56),
(44, 21, 57),
(50, 21, 4),
(54, 3, 4),
(55, 3, 58),
(56, 3, 59),
(62, 23, 60),
(63, 22, 61),
(64, 22, 59),
(65, 21, 62),
(66, 22, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_reporte`
--

CREATE TABLE IF NOT EXISTS `perfil_reporte` (
`IdPerfil_Reporte` int(11) NOT NULL,
  `IdPerfil` int(11) NOT NULL,
  `IdReporte` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `perfil_reporte`
--

INSERT INTO `perfil_reporte` (`IdPerfil_Reporte`, `IdPerfil`, `IdReporte`) VALUES
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(18, 1, 18),
(19, 1, 19),
(21, 1, 20),
(22, 1, 21),
(23, 1, 22),
(24, 1, 23),
(25, 1, 24),
(26, 1, 25),
(27, 1, 27),
(28, 1, 26),
(29, 1, 28),
(30, 1, 29),
(32, 1, 30),
(33, 1, 31),
(34, 1, 32),
(35, 1, 33),
(36, 1, 34),
(37, 1, 35),
(38, 1, 36),
(39, 1, 37),
(40, 21, 4),
(41, 21, 12),
(42, 21, 15),
(43, 21, 16),
(44, 21, 13),
(45, 21, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE IF NOT EXISTS `periodo` (
`IdPeriodo` int(11) NOT NULL,
  `NombrePer` varchar(45) DEFAULT NULL,
  `FechaInicioPer` date DEFAULT NULL,
  `FechaFinPer` date DEFAULT NULL,
  `EstatusPer` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `cedula` int(9) NOT NULL,
  `nombres_per` varchar(100) DEFAULT NULL,
  `apellidos_per` varchar(100) DEFAULT NULL,
  `telefono_movil_per` varchar(11) DEFAULT NULL,
  `telefono_corp_per` varchar(11) DEFAULT NULL,
  `telefono_casa_per` varchar(11) DEFAULT NULL,
  `correo_per` varchar(50) DEFAULT NULL,
  `direccion_habitacion_per` text,
  `fecha_nacimiento_per` date DEFAULT NULL,
  `fecha_contratacion_per` date DEFAULT NULL,
  `fecha_ven_lic` date DEFAULT NULL,
  `fecha_ven_cermed` date DEFAULT NULL,
  `fecha_ven_ci` date DEFAULT NULL,
  `fecha_ven_cersal` date DEFAULT NULL,
  `fecha_ven_manali` date DEFAULT NULL,
  `observacion_per` text,
  `cod_rol` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `estatus_per` varchar(1) DEFAULT NULL,
  `estatus_con` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cedula`, `nombres_per`, `apellidos_per`, `telefono_movil_per`, `telefono_corp_per`, `telefono_casa_per`, `correo_per`, `direccion_habitacion_per`, `fecha_nacimiento_per`, `fecha_contratacion_per`, `fecha_ven_lic`, `fecha_ven_cermed`, `fecha_ven_ci`, `fecha_ven_cersal`, `fecha_ven_manali`, `observacion_per`, `cod_rol`, `idestatus`, `iddepartamento`, `estatus_per`, `estatus_con`) VALUES
(990450, 'ARMANDO ALFONZO      ', 'DURAN NIÑO           ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-07-01', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '2', NULL),
(1046048, 'JOSE ROBERTO         ', 'ALZATE PEÑA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-04', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '2', NULL),
(1126386, 'VICTOR OSWALDO       ', 'ALVAREZ MUJICA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-03-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 20, '1', NULL),
(1359331, 'EFRAIN ANTONIO       ', 'FEO GARCIA           ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-11-16', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '2', NULL),
(2519579, 'JOSE LUIS            ', 'BERROTERAN BORGES    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-27', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '2', NULL),
(2594904, 'JACINTO ANTONIO      ', 'SUAREZ ESCALONA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-21', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '2', NULL),
(2601975, 'CRISANTO ANTONIO     ', 'FERNANDEZ            ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-21', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '2', NULL),
(2726086, 'MANUEL SALVADOR      ', 'GUEVARA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-18', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(2729254, 'CARLOS ALBERTO       ', 'ARAUJO LEON          ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-05-04', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(2820499, 'JAIME SEGUNDO        ', 'CHIRINOS             ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-12-16', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(2941822, 'FIDEL                ', 'ESPINOZA             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-30', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(3007471, 'GUSTAVO              ', 'VALDERRAMA           ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-20', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(3080363, 'JULIO JOSE           ', 'TORRES               ', NULL, NULL, NULL, NULL, NULL, NULL, '2002-12-04', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(3314918, 'FRANCISCO ANTONIO    ', 'SUAREZ BORAURE       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-16', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(3388710, 'JOSE RAFAEL          ', 'FEO GARCIA           ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-21', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(3526032, 'PEDRO ANTONIO        ', 'MORALES              ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-09', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(3526731, 'EULOGIO ANTONIO      ', 'DURAN                ', NULL, NULL, NULL, NULL, NULL, NULL, '2003-01-13', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(3542932, 'JUAN JOSE            ', 'ARROYO ANDUEZA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-04-23', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(3552810, 'ARGIMIRO             ', 'PEÑALOZA CONTRERAS   ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-10', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(3624624, 'JESUS ESTEBAN        ', 'MORLES MEDINA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-19', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(3734024, 'JESUS                ', 'MONTAÑO              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-17', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 32, 1, 14, '1', NULL),
(3834583, 'LUIS TOMAS           ', 'LA CRUZ BETANCOURT   ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-04', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(3864045, 'ALEXI JOSE           ', 'GOMEZ MONTAÑA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-08', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(3866838, 'RAMON ANTONIO        ', 'YEPEZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-02-11', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(3869303, 'CIRILO JONAS         ', 'MORALES              ', NULL, NULL, NULL, NULL, NULL, NULL, '2003-05-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(3869664, 'VICENTE EMILIO       ', 'PEREZ RODRIGUEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-21', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(3869935, 'JOSE MANUEL          ', 'TARAZONA PARRA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-05-25', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(3904324, 'PEDRO JOSE           ', 'NUÑEZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-18', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4185406, 'TOMAS ENRIQUE        ', 'PEÑA GONZALEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-17', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(4197838, 'FREDY RAMON          ', 'MUÑOZ RIVERO         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-19', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4198830, 'ADOLFO RAMON         ', 'COLMENAREZ GALINDEZ  ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-01-11', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(4199062, 'FREDDY JOSE          ', 'REYES COLMENAREZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-02', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(4199175, 'RAFAEL DOMINGO       ', 'RIERA FONSECA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-10-22', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 9, 1, 3, '1', NULL),
(4200713, 'CARLOS RAMON         ', 'DORANTE              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-02-04', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(4201281, 'MARCOS RAMON         ', 'CASTILLO             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-24', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(4202223, 'JESUS HONORIO        ', 'MARIÑO QUIÑONES      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-01-11', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(4202629, 'LUIS ALBERTO         ', 'PEÑA                 ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-12', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(4259858, 'WILLIAN RAFAEL       ', 'VALENCIA             ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-02', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4380491, 'MANUEL FLORENTINO    ', 'VALLADARES FLORES    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-18', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(4383053, 'RAMON DOMINGO        ', 'MENDOZA MENDOZA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-06', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(4400850, 'CATALINO ERASMO      ', 'HERRERA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-15', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(4405597, 'CESAR ALFREDO        ', 'MEDINA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-20', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4532551, 'ALIRIO RAMON         ', 'CARDENAS RANGEL      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(4563622, 'WILSON JIAME         ', 'COELLO TOLEDO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-01-16', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4602249, 'FELIPE SEGUNDO       ', 'ROJAS GALINDEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-22', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4603828, 'GREGORIO             ', 'LOYO                 ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(4605286, 'VICTOR JOSE          ', 'ROMERO               ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-21', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(4607200, 'JUAN BAUTISTA        ', 'RAMOS                ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-09', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4607304, 'HILDEMARO DE JESUS   ', 'VIVAS MAYA           ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-11', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4607482, 'JONAS                ', 'ESPINOZA             ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-20', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4608145, 'FRANCISCO ALBERTO    ', 'MARTINEZ RIVAS       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(4608376, 'JOSE MANUEL          ', 'SANDOVAL PIETRI      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-16', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(4609214, 'OMAR JOSE            ', 'DELGADO PINTO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-19', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(4609733, 'LUSMAR HUMBERTO      ', 'CEDEÑO MUJICA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-27', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(4611935, 'ELSO COROMOTO        ', 'PELAYO               ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-12-01', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(4623964, 'VICTOR MANUEL        ', 'MOLINA GONZALEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-03', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4627953, 'CIRO ROBERTO         ', 'SALAS                ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4658539, 'NICOLAS ANTONIO      ', 'TERAN                ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-01-23', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(4722317, 'JOSE RAFAEL          ', 'PEREZ AUBERT         ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-02-05', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 18, '1', NULL),
(4734045, 'DAGOBERTO JOSE       ', 'LOZADA ARRAEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-07-17', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(4735325, 'FRANCISCO RAFAEL     ', 'GUEDEZ PEREZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-10-05', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(4735950, 'JOSE ALIRIO          ', 'HERNANDEZ GARCIA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-15', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(4735967, 'PEDRO JOSE           ', 'SEQUERA LEAL         ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-27', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(4737770, 'ALEXIS VICENTE       ', 'MEDINA FREITEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-26', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(5066798, 'PILAR ANTONIO        ', 'HERRERA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-12-01', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5123674, 'JOSE ENRIQUE         ', 'CUADROS DUQUE        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-22', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5128344, 'JOSE ANDRES          ', 'GOYO VILLEGAS        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5295603, 'GUELBIS RAFAEL       ', 'COLINA SARMIENTO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-14', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(5320243, 'SIMON ANSELMO        ', 'FIGUEROA             ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-21', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5363170, 'HUMBERTO JESUS       ', 'GOMEZ AMARO          ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-20', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5363850, 'OSCAR SEGUNDO        ', 'MANZANO              ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-12', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 9, 1, 3, '1', NULL),
(5365046, 'RAMON ANTONIO        ', 'GIMENEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2001-11-30', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5365047, 'MANUEL               ', 'CASTIÑEIRAS RODRIGUEZ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5365196, 'NAGITT RAMON         ', 'GUEDEZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-22', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(5366920, 'YSRRAEL BENITO       ', 'RAMOS RODRIGUEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-02-26', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5366943, 'TEODORO              ', 'SEQUERA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-14', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5367019, 'BASILIO              ', 'RAMOS                ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-20', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5367438, 'ALEXIS RAFAEL        ', 'MOISES PERDOMO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-16', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5368004, 'FELIX COROMOTO       ', 'CARRASCO SANCHEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-01-11', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5368212, 'JOEL ANTONIO         ', 'HERNANDEZ            ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-30', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5369718, 'JORGE RAMON          ', 'CAMEJO ESCALONA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-12-28', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5389057, 'RAMON ALEJANDRO      ', 'MARTINEZ LAYA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-07', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(5422719, 'JOSE FRANCISCO       ', 'LOPEZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-01-04', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5493186, 'ARGENIS DE JESUS     ', 'VASQUEZ MONCAYO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5525409, 'JOSE GREGORIO        ', 'RODRIGUEZ ARAUJO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-30', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5749245, 'RAFAEL ANTONIO       ', 'BARAZARTE GANDOLFI   ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-12', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5763348, 'NERIO                ', 'MORENO RIVERA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-23', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5800231, 'DARWIN ALBERTO       ', 'PIRELA MORALES       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-10-17', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 25, '1', NULL),
(5921390, 'FELIX  ALI           ', 'MONTILLA             ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-06-25', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5936465, 'FABIAN JOSE          ', 'CUEVAS CARRASCO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-15', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5940269, 'EDDIE RAMON          ', 'MARTINEZ GARCIA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2003-03-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5940448, 'ALFREDO RAFAEL       ', 'ALVAREZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-04-30', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5941218, 'RAMON ANTONIO        ', 'SALAS CAMACHO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-01-11', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5942029, 'OMAR ICANDER         ', 'VALENZUELA SOTO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-02-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5944040, 'JULIO RAMON          ', 'ALEJOS TORRES        ', NULL, NULL, NULL, NULL, NULL, NULL, '2003-04-25', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5944692, 'ILDEFONSO FEDERICO   ', 'ANDRADE              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-16', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(5944808, 'JOSE L               ', 'MAMBEL H             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-05', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5944886, 'MOISES OBDULIO       ', 'COHIL                ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-29', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5945076, 'GILBERTO DE JESUS    ', 'SALCEDO HERNANDEZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-06', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5946126, 'JOSE RAFAEL          ', 'RODRIGUEZ            ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-07-14', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5946959, 'LUIS PAUL            ', 'AVILA VALLADARES     ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-01', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5949113, 'OSWALDO ANTONIO      ', 'MARTINEZ RIVAS       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-14', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5949279, 'EDUARDO ENRIQUE      ', 'ALMAO SANTELIZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-02-12', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(5950128, 'YANERY', 'ALVAREZ', '04245564231', NULL, '02556457112', 'CESAR_MADRID_93@HOTMAIL.COM', 'ACARIGUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NUEVO', 2, 1, 25, '1', '1'),
(5950641, 'JUAN RAFAEL          ', 'ALVAREZ GOMEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-17', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(5953097, 'GUZMAN JOSE          ', 'MONTILLA MIRANDA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-21', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5953473, 'WILLIAN BLADIMIR     ', 'TORRES               ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-02', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5953790, 'ADAN PASTOR          ', 'PERAZA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-06-28', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(5955259, 'NOLBERTO E.          ', 'VILLEGAS             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-20', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5955563, 'JOSE J               ', 'COLMENAREZ           ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-08', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(5958749, 'CLAUDIO RAMON        ', 'BARRADAS GARCIA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-01-19', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 16, '1', NULL),
(5959668, 'GEORGE ANTONIO       ', 'TORREZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-09', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(6090650, 'RAFAEL ALBERTO       ', 'LOPEZ ALVARADO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-04', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(6130970, 'ABIGAIL JESUS        ', 'ARELLANO GOMEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-30', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(6544900, 'JAIME ENRIQUE        ', 'KONIG OLIVERO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-19', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(6854946, 'JULIO SEGUNDO        ', 'ANGULO QUEVEDO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-10', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7114454, 'WILFREDO RAMON       ', 'SUAREZ SUAREZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-06-27', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7225634, 'EDSON MAURI          ', 'CASTILLO LOPEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-31', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(7341569, 'ALEXIS SEGUNDO       ', 'SUAREZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-08', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(7368472, 'SULPICIO ANTONIO     ', 'SUAREZ IZARRA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-23', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7378279, 'JOSE RAFAEL          ', 'PERAZA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-10', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7394270, 'RAMON ANTONIO        ', 'PERALTA ESCALONA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-19', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(7402855, 'PASTOR MIGUEL        ', 'BETANCOURT HERNANDEZ ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-01-24', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(7423346, 'CARLOS ENRIQUE       ', 'LOPEZ LOPEZ          ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-29', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(7441093, 'ALI ANTONIO          ', 'VARGAS               ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-13', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(7453045, 'ALES EDUARDO         ', 'PEREZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-01-05', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(7469073, 'ERNESTO ANTONIO      ', 'LOYO PERAZA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-06', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(7539397, 'JOSE MARTIN          ', 'ROSENDO PACHECO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7540063, 'CRUZ RAMON           ', 'MONTILLA TORRES      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-09-17', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(7541740, 'WILMER EUSEBIO       ', 'JIMENEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-22', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7542335, 'JOSE HERIBERTO       ', 'GARCIA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-20', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(7543284, 'MARIO JOSE           ', 'LA PORTA GARCIA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-04', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(7543723, 'ARNOLDO JAVIER       ', 'GASPERI LOPEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7544501, 'ISABEL JOSE          ', 'MEDINA GONZALEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-30', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(7545322, 'WILMER RAFAEL        ', 'CARRASCO CRESPO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-23', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(7545956, 'SANTOS TOMAS         ', 'PEREZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-02-11', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7546481, 'ISRAEL RAMON         ', 'MENDOZA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-05', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7547747, 'BEATRISE             ', 'NASUTI RODRIGUEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-08-09', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 36, 1, 14, '1', NULL),
(7548349, 'OSCAR JOSE           ', 'MONTAÑEZ TORREALBA   ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-11-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7548722, 'ANGEL IGNACIO        ', 'PALENCIA             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-11-15', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(7549401, 'LUIS ANGEL           ', 'SIVIRA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-17', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(7560687, 'CARLOS LUIS          ', 'BLANCO LOPEZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-12', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(7595022, 'RAFAEL ANTONIO       ', 'MERCADO GALARRAGA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-01', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(7596929, 'WILFREDO JOSE        ', 'RAMOS                ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-10-15', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(7597097, 'PAUCIDES ANTONIO     ', 'LOBATON              ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-09-17', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7597190, 'WILMER TIBALDO       ', 'FREITEZ RODRIGUEZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-04-20', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 13, '1', NULL),
(7597843, 'ANDRES CORSINO       ', 'ESCALONA QUERO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-16', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7598552, 'NANSO JOSE           ', 'GODOY                ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-22', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(7599781, 'JOSE ELIAS           ', 'GALINDEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-10-17', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(7763963, 'ESTEBAN RAMON        ', 'REYES AÑEZ           ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-02', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(7856237, 'ALBIN SEGUNDO        ', 'MEDCALF COLMENAREZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(7932232, 'JESUS CHIQUINQUIRA   ', 'SULBARAN             ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-07', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(7937420, 'DIRIMO S             ', 'LUZARDO A            ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-06', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(8053249, 'HERNAN GREGORIO      ', 'CASTAÑEDA LOBATON    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-28', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(8056595, 'SILVERIO             ', 'CARRASCO             ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-14', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(8065146, 'RUFINO ANTONIO       ', 'MORA MEDINA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-21', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(8130141, 'ARGELIS ANTONIO      ', 'MONTILLA             ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-11-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(8139380, 'ARIDANE              ', 'CABRERA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2003-10-20', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(8144343, 'JESUS VLADIMIR       ', 'PEREZ FIGUEREDO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 15, '1', NULL),
(8313576, 'RODRIGO ANTONIO      ', 'RONDON               ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(8398830, 'RAMON JOSE           ', 'NAVAS RAMOS          ', NULL, NULL, NULL, NULL, NULL, NULL, '2001-09-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(8517756, 'JOSE LUIS            ', 'HERNANDEZ            ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(8655436, 'CESAR ANTONIO        ', 'MELENDEZ HERNANDEZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-01-10', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(8655561, 'HIPOLITO ANTONIO     ', 'DURANT AGUILERA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-02', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(8657284, 'FRANKLIN J           ', 'RIVERO G             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-30', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(8657878, 'WILMER ALEXANDER     ', 'MONSALVE GRATEROL    ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-08-01', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(8658252, 'TOMAS MARIA          ', 'CASTILLO RODRIGUEZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-01-31', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(8659894, 'EDGAR GREGORIO       ', 'MACIAS BRICEÑO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-01-05', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(8660008, 'JORGE ANTONIO        ', 'FIGUEROA CARPIO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-28', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(8661251, 'VICTOR INOCENCIO     ', 'AGUILAR              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-09', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(8661610, 'GIUSEPPE             ', 'GIULIANI PIÑA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-22', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(8662777, 'OMAR JOSE            ', 'CONTRERAS RIVAS      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(8664016, 'INGRID BEATRIZ       ', 'GUEDEZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-08-05', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 31, 1, 13, '1', NULL),
(8687369, 'RIGOBERTO ANTONIO    ', 'SARMIENTO            ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(8755517, 'BALENTIN             ', 'RODRIGUEZ MENDEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2003-10-20', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(8891447, 'ANTONIO RODOLFO      ', 'FLORES SANCHEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-03', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9043832, 'LUBEN ANTONIO        ', 'ARANGUREN GONZALEZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9152332, 'FREDDY JOSE          ', 'LINAREZ MEJIA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-11-17', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 46, 1, 14, '1', NULL),
(9225934, 'EUDES ANTONIO        ', 'JIMENEZ ACOSTA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-18', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9255020, 'MANUEL ALFONZO       ', 'MORALES              ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-21', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9318078, 'ARMANDO DANIS        ', 'RAMIREZ GUTIERREZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-30', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9349941, 'MARIBEL              ', 'VARGAS ALMEIRA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-26', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 22, '1', NULL),
(9356989, 'JOSE ARISTOBAL       ', 'CONTRERAS MORALES    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-07', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9441980, 'JOSE RAMON           ', 'MORENO SANDOVAL      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-13', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9545702, 'HECTOR               ', 'OCHOA                ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-04-20', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(9546297, 'ANGEL COROMOTO       ', 'VARGAS CORTEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-01', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(9552948, 'YSABEL RAMON         ', 'HERNANDEZ PEREZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9557123, 'ALFREDO ENRIQUE      ', 'JIMENEZ UMBRIA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-20', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9560525, 'JOSE DAVID           ', 'SEQUERA MELENDEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-28', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 46, 1, 14, '1', NULL),
(9560549, 'MIGUEL ANGEL         ', 'CORTEZ PEREZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-13', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9560585, 'MERQUIADES RAMON     ', 'GUEVARA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-23', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9562562, 'PEDRO ANTONIO        ', 'GONZALEZ PARRA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-31', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9562659, 'RUBEN DARIO          ', 'RODRIGUEZ CALDERON   ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-06', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9563010, 'JAIRO                ', 'LONDOÑO              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-02-22', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9564626, 'WILLIANS GUSDELIO    ', 'TORREZ VILLANUEVA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-01', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9565052, 'YAJAIRA BEATRIZ      ', 'CORDERO QUEVEDO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-21', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 25, '1', NULL),
(9565206, 'ALIS ANTONIO         ', 'ANDRADES             ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-21', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9566577, 'JUAN IRENE           ', 'SEQUERA LINAREZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-08', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9566795, 'WILMER JESUS         ', 'CAMACARO FERNANDEZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-08', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(9567033, 'MIGUEL EDUARDO       ', 'ANTEQUERA CARRIZALES ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-20', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9567420, 'ROSELIO RAMON        ', 'MARTINEZ GARCIA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-26', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9567866, 'AMILCAR RAFAEL       ', 'CASTELLANO LA CRUZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-18', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(9568086, 'CESAR AUGUSTO        ', 'AVENDAÑO SILVA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-02-28', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 19, '1', NULL),
(9568205, 'EDGAR JOSE           ', 'MARTINEZ RIVERO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-23', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(9568493, 'FRANKLIN ORLANDO     ', 'CORONEL              ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-11-16', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9568529, 'PEDRO ANTONIO        ', 'MENDOZA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-09-01', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(9568738, 'JOSE GREGORIO        ', 'MOTA RODRIGUEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-15', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 21, '1', NULL),
(9568831, 'JOSE HILARION        ', 'ARMAO                ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-11-15', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9568839, 'MARLON RAMON         ', 'MERCADO MENDEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-21', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9570583, 'ANDRES JOSE          ', 'HERNANDEZ ANGULO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9602744, 'PABLO DAVID          ', 'ESCALONA BARRAEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-09', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9605875, 'MANNY ALFREDO        ', 'SUAREZ GIMENEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-02', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(9619285, 'DANIEL JOSE          ', 'SEGURA ROJAS         ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-06', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9835151, 'MARTIN A             ', 'MEDINA A             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-05', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9836716, 'ORLANDO SIMON        ', 'GARCIA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-02-25', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(9837249, 'ELVER WUILIAN        ', 'CARDENAS             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-18', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9837900, 'JUAN MANUEL          ', 'COLMENAREZ LEON      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-06-26', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9838307, 'WILFREDO HUMBERTO    ', 'MILLA FLORES         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-14', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9838548, 'GIOVANNY YASMIL      ', 'ALBAHACA ESCALONA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-18', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(9840230, 'ORLANDO JOSE         ', 'GONZALEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-19', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9840488, 'JOSE DE LA CRUZ      ', 'RAMIREZ ALVARADO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-08', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(9840629, 'WILFREDO J           ', 'VELIZ P              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9840803, 'EDWIN WIBALDO        ', 'GOMEZ LIZARDO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-26', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9842961, 'EDDY EUGENIO         ', 'CASTILLO LEDEZMA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-07-14', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9843333, 'LEONEL E.            ', 'AVILA SOTO           ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-09', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(9843626, 'FRANCISCO ORLANDO    ', 'FLORES GARCES        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-25', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(9844101, 'CARLOS J.            ', 'MENDOZA VARELA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-26', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(9844749, 'JESUS MARIA          ', 'ORTIZ GARCIA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9844926, 'JIDE AMIN            ', 'COLMENARES GALINDEZ  ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-28', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(9959355, 'MARCO ANTONIO        ', 'TOVAR PARRA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10135580, 'JAVIER JOSE          ', 'MENDOZA PERALTA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-13', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10135659, 'GIOVANNI OCTAVIO     ', 'INGHILTERRA MARCANO  ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-01-04', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(10135961, 'RUBEN ENRIQUE        ', 'SALAZAR PEÑA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-26', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10136182, 'JOSE VICENTE         ', 'MENDOZA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-26', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10136535, 'IVANNY ANTONIO       ', 'CASAMAYOR ARANGUREN  ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(10136562, 'MIREYA ALBANIA       ', 'CRESPO COLMENAREZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-05', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 18, '1', NULL),
(10136828, 'JESUS G              ', 'OLIVERA P            ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-05', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10137132, 'JAIME ROLANDO        ', 'CHIRINOS MENDEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-02', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(10137176, 'ANGEL JESUS          ', 'ESPINOZA QUINTERO    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-27', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10138127, 'ALBERTO GERONIMO     ', 'ABREU                ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-02-28', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(10138213, 'JORGE RAMON          ', 'MARTINEZ RIVAS       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-02', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10139527, 'WINTON MOISES        ', 'FAMA CEVILLA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-22', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10140054, 'LEONARDO ANTONIO     ', 'CASTILLO GONZALEZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-28', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10140096, 'ARGENIS ANTONIO      ', 'SUAREZ RODRIGUEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-02-28', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(10141272, 'LUIS EDUARDO         ', 'GIL MAICA            ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-20', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 19, '1', NULL),
(10141832, 'GUSTAVO JOSE         ', 'ESCOBAR TORRES       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-27', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(10142742, 'HIGINIO RAMON        ', 'VARGAS               ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-28', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(10142788, 'FREDDY RAMON         ', 'CORDERO GUEDEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-11', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(10143903, 'GILBERTO             ', 'GUDIÑO ROJAS         ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-29', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 36, 1, 14, '1', NULL),
(10275454, 'ALIRIO JOSE          ', 'CARRERO              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-09', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(10329209, 'JOSE RAFAEL          ', 'SALAZAR AULAR        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-08', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(10405086, 'BARTOLO              ', 'MARTINEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-23', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10427483, 'ANGEL ANTONIO        ', 'GONZALEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(10455765, 'RAUL JOSE            ', 'RIVERO               ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-31', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(10485508, 'SINDY RUBY           ', 'AGUILAR VASQUEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-09-14', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 20, '1', NULL),
(10635339, 'EIDER FIDEL          ', 'MARCHAN ESCALONA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-15', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(10636290, 'GUSTAVO ELEAZAR      ', 'PEREZ GUTIERREZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-18', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(10636382, 'EDGAR JESUS          ', 'MALVACIAS AGUILAR    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-22', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10637774, 'VICENTE              ', 'GONZALEZ PIÑANGO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-04', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10637951, 'GUSTAVO ENRIQUE      ', 'SARMIENTO GONZALEZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-15', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10639747, 'JOSE RAMON           ', 'LINAREZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-27', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10640410, 'NICOLAS ANTONIO      ', 'FREITEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-11-19', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(10640469, 'ALBERTO MUNIR        ', 'ALBAHACA ESCALONA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10641150, 'SULPICIO ANTONIO     ', 'ESCALONA PALACIO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-08', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10641260, 'ALCY ANTONIO         ', 'VILLAVICENCIO CRUCES ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-15', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10641319, 'EMISAEL              ', 'MENDEZ FONSECA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-23', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(10641561, 'JOSE INES            ', 'GUTIERREZ            ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-02-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(10641668, 'JOSE GREGORIO        ', 'DIAZ MUÑOZ           ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-18', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL);
INSERT INTO `persona` (`cedula`, `nombres_per`, `apellidos_per`, `telefono_movil_per`, `telefono_corp_per`, `telefono_casa_per`, `correo_per`, `direccion_habitacion_per`, `fecha_nacimiento_per`, `fecha_contratacion_per`, `fecha_ven_lic`, `fecha_ven_cermed`, `fecha_ven_ci`, `fecha_ven_cersal`, `fecha_ven_manali`, `observacion_per`, `cod_rol`, `idestatus`, `iddepartamento`, `estatus_per`, `estatus_con`) VALUES
(10641971, 'WILMER JAVIER        ', 'PEREZ PEREIRA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-10', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10642537, 'MIGUEL AUGUSTO       ', 'FERRER JIMENEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-02-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(10642937, 'EDGAR RAFAEL         ', 'MUJICA MENDOZA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-10', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(10643614, 'ELIZABETH', 'QUINTERO', '04126758976', NULL, '02556748933', 'DANI@GMAIL.COM', 'DURIGUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 29, 1, 9, '1', '1'),
(10644733, 'TERESO DE JESUS      ', 'COLMENAREZ ALVARADO  ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-24', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(10727298, 'EDGAR HONORIO        ', 'SANCHEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-26', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(10802283, 'FELIX LIONEL         ', 'DIAZ VASQUEZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-09', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10840302, 'ALIRIO JOSE          ', 'DIAZ GARCIA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-15', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10848047, 'REGULO JESUS         ', 'PEREZ ARAUJO         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-18', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10988401, 'PEDRO ANTONIO        ', 'ULACIO QUINTERO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-20', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10991334, 'JUAN ERNESTO         ', 'ESCOBAR              ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-07-14', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(10993596, 'JHONNY FERNANDO      ', 'GUERRERO BARRIO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-12', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10993904, 'JUAN CARLOS          ', 'SANDOVAL VELOZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-20', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(10994687, 'JOSE RODOLFO         ', 'SANDOVAL REYES       ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-08-08', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(11075045, 'DAVID MOISES         ', 'MARTINEZ DIAZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-29', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(11075539, 'SILVANO ANTONIO      ', 'HERNANDEZ COLMENAREZ ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-20', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11076207, 'NELSON JOSE          ', 'VIVAS                ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-28', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11076477, 'MIGUEL GREGORIO      ', 'GUEDEZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-12-03', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 30, 1, 12, '1', NULL),
(11078308, 'RICHARD ANTONIO      ', 'LINARES YANEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11078937, 'VICTOR VIRGILIO      ', 'CARRASCO VASQUEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-02-21', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 30, 1, 12, '1', NULL),
(11079005, 'MARCOS TULIO         ', 'TORRES QUINTANA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-16', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(11079760, 'HENRY COROMOTO       ', 'QUERO                ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-01-04', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11079782, 'JOSE GREGORIO        ', 'ESCOBAR MOGOLLON     ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-03', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11079958, 'JOSE ALBERTO         ', 'LUCENA PEREZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-22', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11080094, 'HECTOR JOSE          ', 'LINAREZ MENDOZA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11080113, 'CARLOS ALBERTO       ', 'REYES RODRIGUEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-10-25', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11081388, 'MIGUEL ANGEL         ', 'REGALADO             ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-02-12', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(11081889, 'RILSON RAFAEL        ', 'CASTELLANO ESPINOZA  ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-23', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11082355, 'JOSE GREGORIO        ', 'SALAZAR              ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-06-27', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(11082516, 'RICHARD AUGUSTO      ', 'DURAN CASTILLO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-20', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(11082598, 'REMIG                ', 'RODRIGUEZ RAMONES    ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-01', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(11082920, 'BLADIMIR JOSE        ', 'LOPEZ RAMOS          ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-14', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(11083815, 'GREGORIO JESUS       ', 'SUAREZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-27', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11084335, 'JOSE GREGORIO        ', 'MEDINA CARRASCO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2003-10-20', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11098080, 'JOSE RAFAEL          ', 'LEONARDEZ FLORES     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-20', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(11112093, 'JUAN CARLOS          ', 'MONSALVE             ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-07-17', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(11175527, 'JOEL ENRIQUE         ', 'BERMUDEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-04-17', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11243250, 'FELIX SABINO         ', 'RODRIGUEZ            ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-10-17', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11429181, 'JOSE LAURENCIO       ', 'MARCANO ROJAS        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-01', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11540001, 'JOSE DARIO           ', 'GUTIERREZ APONTE     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(11540010, 'CHRISTIAN ALEXANDER  ', 'SALAS MONTILLA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-26', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(11541239, 'HONORIO JOSE         ', 'LOPEZ CASTILLO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-21', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11541766, 'JOSE ALIRIO          ', 'LUCENA CASTILLO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-04-17', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 42, 1, 20, '1', NULL),
(11542112, 'REINALDO JOSE        ', 'CORDERO ROJA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-20', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11542718, 'JOSE LUIS            ', 'GUEDEZ ANGULO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-28', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11543210, 'ALEXANDER            ', 'PEREZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-31', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(11543652, 'ROBERT ALBERTO       ', 'CORDERO MARCHAN      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-19', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11543724, 'ARMANDO ANTONIO      ', 'BENITEZ PERAZA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-04-25', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11543794, 'DEGNI JOEL           ', 'HERNANDEZ DIAZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-04', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11543904, 'RUSIO ALCANTARA      ', 'PARADA SULBARAN      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-07', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(11544038, 'JUAN CARLOS          ', 'DAZA ALEJOS          ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-11-04', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 45, 1, 14, '1', NULL),
(11544165, 'ARNOLDO RAMON        ', 'PARRA                ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-29', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(11544479, 'SAUL ORLANDO         ', 'HERRERA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-22', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11545511, 'LUIS ARMANDO         ', 'QUIROZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-15', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(11546994, 'JOSE MAURICIO        ', 'TIMAURE GOMEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-25', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11547106, 'ESTEBAN JOSE         ', 'GONZALEZ ANGULO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 25, '1', NULL),
(11547312, 'JOSE GREGORIO        ', 'CASTILLO PACHECO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-16', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(11547759, 'WILMER ALEXANDER     ', 'SILVA                ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-31', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(11548072, 'ALEXIS JAVIER        ', 'FIGUEROA YANEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-02-28', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11548490, 'CARLOS ALBERTO       ', 'CAMACHO SALAZAR      ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-06-25', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(11548555, 'DAVID RODOLFO        ', 'SABALZA PEREZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-21', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(11548925, 'OMAR JAVIER          ', 'SANCHEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-11', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11606349, 'CARLOS IGNACIO       ', 'GONZALEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(11652323, 'RODOLFO ANTONIO      ', 'MONTERO              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-15', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(11789628, 'ALEXANDER JOSE       ', 'DEL MORAL TOVAR      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-13', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(11847897, 'JORGE LUIS           ', 'VELAZCO ALVARADO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-03', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11847902, 'SORAIMA JOSEFINA     ', 'MEDINA OJEDA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-10-18', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 20, '1', NULL),
(11849465, 'ANTONIO JOSE         ', 'PERAZA PEREZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-12', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11849920, 'ELIESER MANUEL       ', 'VALLADARES ALVARADO  ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-29', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '2', NULL),
(11849934, 'JAIRO JAVIER         ', 'GONZALEZ ESCALONA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-22', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11850378, 'JULIO CESAR          ', 'ANTEQUERA MONCAYO    ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-11-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11851044, 'JOSE TEODORO         ', 'PEREZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-03', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11851280, 'RAFAEL ERNESTO       ', 'SANCHEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-04-02', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 46, 1, 14, '1', NULL),
(11851376, 'ARCADIO JOSE         ', 'PEROZA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-11-19', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 21, '1', NULL),
(11851568, 'PEDRO RAMON          ', 'UMBRIA TORREALBA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-06-26', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(11851589, 'EDGAR ALEXANDER      ', 'CHAVEZ CRESPO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 19, '1', NULL),
(11851617, 'JESUS GREGORIO       ', 'ORTEGA OLIVERA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-28', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11851767, 'JOHNNY ANTONIO       ', 'GOMEZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-19', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(11879193, 'JOSE GREGORIO        ', 'VASQUEZ GONZALEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-09', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(11961391, 'JUAN DE JESUS        ', 'CHACON BLANCO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-24', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12000202, 'EDYT DE JESUS        ', 'CORDERO CABRERA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12011796, 'VELISMAR             ', 'GARCIA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-30', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(12012154, 'RAMON ANTONIO        ', 'GARCIA LOPEZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-27', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12088092, 'EGIDIO RAMON         ', 'DURAN SEQUERA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-24', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12088227, 'SUSANA COROMOTO      ', 'ZAPATA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-02-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 18, '1', NULL),
(12088471, 'CESAR MIGUEL         ', 'GARCIA MORALES       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-07', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(12089128, 'MARELIS COROMOTO     ', 'CARRILLO RODRIGUEZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-04', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 20, '1', NULL),
(12089968, 'RICHARD AGUSTIN      ', 'MORA CARVAJAL        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-16', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(12090353, 'FRANK OMAR           ', 'BOLIVAR              ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12090474, 'JOEL ALEXIS          ', 'LUCENA YEPEZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-13', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12090864, 'RAUL ANTONIO         ', 'PEÑA NADAL           ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-23', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12091109, 'ALBERTO RAFAEL       ', 'SANGRONIS LOPEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-31', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(12091394, 'ISMAEL JOSE          ', 'HERNANDEZ HERNANDEZ  ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-02', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12091791, 'JOSE GREGORIO        ', 'RIERA GARRIDO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-01-20', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(12091833, 'FRANKLIN ANTONIO     ', 'MORILLO              ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-08-15', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12092095, 'DENNY RAFAEL         ', 'ALVAREZ PEROZO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-01', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12092499, 'JOSE HUMBERTO        ', 'GIMENEZ ROJA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-04', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12092607, 'DECIDERIO            ', 'PEREZ TIMAURE        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-14', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 31, 1, 13, '1', NULL),
(12092877, 'OSCAR EMIGDIO        ', 'BAEZ OJEDA           ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-13', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12143571, 'DELIMAR JOHANA       ', 'MATERIN MENDOZA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 29, '1', NULL),
(12145593, 'JORGE ALEXANDER      ', 'SAYAGO MORENO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-01', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12176481, 'EDILIMAR CAROLINA    ', 'PERAZA RODRIGUEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-08', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 23, '1', NULL),
(12184840, 'LIOMARY              ', 'SAEZ DE PEREZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-02-21', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 25, '1', NULL),
(12209018, 'JOSE ANTONIO         ', 'PERALTA RODRIGUEZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-04-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12262041, 'JOSE GREGORIO        ', 'MARTINEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-07-18', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 49, 1, 18, '1', NULL),
(12262341, 'DUANEL NOEL          ', 'ANDRADES PEREZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-10-07', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(12263756, 'ROLANDO JOSE         ', 'MEDINA RAMOS         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-05', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(12263873, 'NELSON JOSE          ', 'PEREZ AGUILAR        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-01-27', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 32, '1', NULL),
(12264089, 'JOSE DOMINGO         ', 'GUEDEZ GONZALEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-08', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12264810, 'ALDO JOSE            ', 'ALVAREZ CASTAÑEDA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-20', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12264929, 'VICTOR GERARDO       ', 'ROMERO CASTILLO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-18', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12265242, 'JUAN RAMON           ', 'HERNANDEZ            ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-12', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 49, 1, 18, '1', NULL),
(12265325, 'JOSE RIGOBERTO       ', 'PEREZ RODRIGUEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-02', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12265810, 'CECILIA COROMOTO     ', 'LINARES              ', NULL, NULL, NULL, NULL, NULL, NULL, '2002-01-11', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 21, '1', NULL),
(12265843, 'JOSE TOMAS           ', 'SANDOVAL PEREZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-04-17', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 46, 1, 14, '1', NULL),
(12265872, 'JOSE AGUSTIN         ', 'SANCHEZ DIAZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-11-13', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12266423, 'RAMON ANTONIO        ', 'CARRASCO CARRASCO    ', NULL, NULL, NULL, NULL, NULL, NULL, '2001-11-11', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12266673, 'NORANGEL             ', 'PARRA PEÑA           ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 22, '1', NULL),
(12266834, 'PEDRO MIGUEL         ', 'DAVILA TORREALBA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-12', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(12283648, 'GREGORY ANTONIO      ', 'TORREALBA            ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-17', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12365352, 'JOSE MIGUEL          ', 'TEJERA LOPEZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-12', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12446159, 'VICTOR ALEXANDER     ', 'TORREALBA MELENDEZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-12', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12446173, 'ROBERT EDUARDO       ', 'ABREU GARCIA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-01', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12446285, 'HENRY JOSE           ', 'TORREALBA MANZANILLA ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-13', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12446630, 'FREDDY JOAN          ', 'BOLIVAR CASTILLO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-02', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12446960, 'JORGE LUIS           ', 'CARDENAS LEON        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-17', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12448107, 'FRANCIS JOSE         ', 'LOPEZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-21', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(12448486, 'GILBERTO ANTONIO     ', 'VALBUENA ROMERO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-12', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12448915, 'EDGAR ENRIQUE        ', 'PARRA LINAREZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-05', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12526912, 'HENRY JOEL           ', 'MACHADO PALENCIA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-15', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12527588, 'ANGEL RAMON          ', 'MENDOZA CASTILLO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-18', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 33, 1, 14, '1', NULL),
(12528097, 'JUAN CARLOS          ', 'JIMENEZ YEPEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-03-11', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(12528104, 'HECTOR JOSE          ', 'CORDERO              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-17', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12528271, 'EUGLIS RAMON         ', 'PEREZ VASQUEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-24', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12528399, 'GEKNIS COROMOTO      ', 'MAMBEL TORRES        ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 14, '1', NULL),
(12528730, 'KALIXZA MARLENE      ', 'PEREZ PIRELA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2003-04-29', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 36, 1, 14, '1', NULL),
(12528838, 'WILMER PASTOR        ', 'MELENDEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12528902, 'RICHARD JHONNY       ', 'SEQUERA TORREALBA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-12-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 47, 1, 10, '1', NULL),
(12708580, 'NELSON ENRIQUE       ', 'PACHECO MORENO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-30', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12708635, 'DANY ENRIQUE         ', 'INFANTE MARCANO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-02', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12708794, 'JESUS MANUEL         ', 'GOMEZ MEDINA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-27', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12709351, 'ROGELIO ALEXANDER    ', 'DURAN                ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12710299, 'JOSE ALEXANDER       ', 'LUCENA SOTELDO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-08', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12772696, 'JOEL RAFAEL          ', 'BETANCOURT           ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-26', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12858082, 'LEIVY JORDANI        ', 'LUCENA MENDOZA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-10', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(12858399, 'PEDRO JOSE           ', 'MUJICA ALVARADO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-22', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 23, '1', NULL),
(12858903, 'IVAN ALBERTO         ', 'PARRA MUÑOZ          ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-16', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12858954, 'FRANCISCO JAVIER     ', 'GUEDEZ BURGOS        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-04', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12859169, 'RUBEN ANTONIO        ', 'HERNANDEZ PERAZA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-26', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(12859594, 'RENI ALEXIS          ', 'FERNANDEZ AGUILAR    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-13', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12859742, 'LUIS ALFREDO         ', 'LOYO ALVARADO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-17', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(12860036, 'JHONNY ALEXANDER     ', 'HERRERA CASTILLO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-12', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12860581, 'MANUEL EDUARDO       ', 'COLMENAREZ SALCEDO   ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-11-17', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 46, 1, 14, '1', NULL),
(12860657, 'JOSE RAFAEL          ', 'CASTILLO             ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-05-17', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(12963407, 'JOSE GREGORIO        ', 'TOVAR CARMONA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-13', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(12963789, 'JEAN PIER            ', 'RODRIGUEZ GAMARRA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-21', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(12965710, 'JUAN JOSE            ', 'ORTIZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-19', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(13034644, 'ODALIS DEL CARMEN    ', 'GONZALEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-11-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 19, '1', NULL),
(13063316, 'LUIS HUMBERTO        ', 'SERRANO VARGAS       ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-23', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13071218, 'RUBEN DARIO          ', 'MOLINA RODRIGUEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-03-30', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13071244, 'GUSTAVO RAFAEL       ', 'SILVA                ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13071332, 'ALEXANDER ENRIQUE    ', 'MARTINEZ VARELA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-31', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(13072120, 'STALIN JOSE          ', 'RAMIREZ ALVARADO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-18', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(13072697, 'TULIO ERNESTO        ', 'RIERA PEREZ          ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-02-25', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(13073189, 'ISIDRO JOSE          ', 'VILLEGAS MELENDEZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13073370, 'CARLOS ENRIQUE       ', 'PIREZ FIGUEREDO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-05-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 15, '1', NULL),
(13073498, 'YORKY ANTONIO        ', 'RODRIGUEZ DIAZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-15', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13073694, 'REIMUNDO ANTONIO     ', 'MURA ALVARADO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-17', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(13226471, 'ENGELBER DARIO       ', 'ZAPATA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13226474, 'WILSON BLADIMIR      ', 'ZAPATA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-08-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(13226486, 'RAMON RAFAEL         ', 'NARVAEZ PEREZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-18', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(13226921, 'GERVAIN JOSE         ', 'ARRIETA ROJAS        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-05', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(13227119, 'ERNESTO ALEJANDRO    ', 'FREITEZ HERNANDEZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13227690, 'VALOY ANTONIO        ', 'MOLINA HERNANDEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-07-17', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(13228285, 'YOISMAR ANTONIO      ', 'CRESPO POLANCO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13228520, 'DENNY JESUS          ', 'INFANTE MARCANO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-04', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(13228538, 'RAFAEL ALEXANDER     ', 'OVIEDO CASTILLO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-18', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(13290522, 'JAN                  ', 'MAMO MARTA           ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-01', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(13353191, 'ANGEL DAVID          ', 'SALAS ALVAREZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-07', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13353549, 'YORDANY MANUEL       ', 'VILLASMIL            ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-28', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(13353616, 'RICHARD ANTONIO      ', 'MENDOZA              ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-05-16', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 48, 1, 14, '1', NULL),
(13464911, 'RAFAEL PASTOR        ', 'RODRIGUEZ LUCENA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-13', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(13467878, 'HENRY OMAR           ', 'COLMENAREZ MENDEZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-27', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13486138, 'EDUARDO DAVID        ', 'CASTILLO DIAZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-04', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 22, '1', NULL),
(13501684, 'PEDRO ALEXANDER      ', 'MONTILLA PEREZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-24', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 42, 1, 15, '1', NULL),
(13543299, 'GILBERTO ARGENIS     ', 'LOPEZ BETANCOURT     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-27', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(13555752, 'RICHARD RAFAEL       ', 'HERRERA RAMIREZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-02-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 46, 1, 14, '1', NULL),
(13555998, 'ALCIBIADES GREGORIO  ', 'FERNANDEZ DURAN      ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-01-08', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(13556036, 'HENRY                ', 'HIDALGO              ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-05', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(13556189, 'JOSE GREGORIO        ', 'ORTIZ YEPEZ          ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-21', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(13584481, 'EDUARDO JOSE         ', 'CUICAS OVIEDO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-20', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(13584819, 'SAUL ALI             ', 'CUICAS MENDOZA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-18', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(13645785, 'JOSE GUILLERMO       ', 'VASQUEZ HURTADO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-02-18', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13702073, 'CARLOS ANDRES        ', 'PEREZ PINEDA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-15', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(13702075, 'ELIAS D              ', 'ESCOBAR M            ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-30', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(13702669, 'JAGER RAUL           ', 'GIL ARAUJO           ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-22', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(13702866, 'DANY R.              ', 'SALCEDO A.           ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-10-20', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 23, '1', NULL),
(13703217, 'FRANKLIN GREGORIO    ', 'GALINDEZ VASQUEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-20', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 32, 1, 14, '1', NULL),
(13703591, 'YOELVIR              ', 'MARQUEZ BOLIVAR      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-07', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(13703829, 'BRUNO ALEXANDER      ', 'FINOCCHIO MORILLO    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-10-16', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(13703835, 'ZAIDA ROSA           ', 'ONTIVEROS GARCES     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-30', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 42, 1, 1, '1', NULL),
(13891222, 'JOSE JULIAN          ', 'CONTENTO GARCIA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-04-17', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 19, '1', NULL),
(13906721, 'JOSE ARQUIMEDES      ', 'COLMENAREZ ALVARADO  ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-04-17', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 39, 1, 14, '1', NULL),
(13906793, 'JESUS EMILIO         ', 'MEDINA ULACIO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-02-25', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(14000272, 'RITHELENA            ', 'SANCHEZ VIRGUEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-01-30', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 22, '1', NULL),
(14001749, 'DARWIN JOSE          ', 'RAMOS LEON           ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-12-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 31, 1, 13, '1', NULL),
(14001802, 'JOSE GREGORIO        ', 'VALENZUELA GALLARDO  ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-06', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(14001944, 'EDGAR ALEXANDER      ', 'SILVA AVANCINI       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(14091281, 'FRANCISCO RUBEN      ', 'SIRA MELENDEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-08-05', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 20, '1', NULL),
(14091494, 'JESUS ALBERTO        ', 'CEIBA PEREZ          ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-25', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(14271074, 'ONEIDA DEL CARMEN    ', 'MENDEZ CORTEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-02-28', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 19, '1', NULL),
(14271399, 'DARWIN JOSE          ', 'HERNANDEZ RODRIGUEZ  ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-10-26', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 20, '1', NULL),
(14271506, 'ERASMO JOSE          ', 'ROMERO ROJAS         ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 20, '1', NULL),
(14274408, 'CESAR ANTONIO        ', 'RIVAS ARRILLAGA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-07-14', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(14346056, 'RAUL ENRIQUE         ', 'RODRIGUEZ MELENDEZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-04-24', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(14347285, 'JAIRO JOSE           ', 'LEAL PEREZ           ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-19', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 30, 1, 12, '1', NULL),
(14347290, 'YONNY ALBERTO        ', 'ANCISO               ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(14347478, 'ABELARDO JOSE        ', 'GONZALEZ ESCALONA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-15', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(14425183, 'DAVID ALEXANDER      ', 'ALVARADO CARRASCO    ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-30', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(14426973, 'JOSE VALENTIN        ', 'PEREZ PARRA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-06-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(14540137, 'JUAN VICENTE         ', 'MARQUEZ COLMENAREZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-28', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(14613515, 'LUIS ALBERTO         ', 'CABEZA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(14637784, 'HECTOR MANUEL        ', 'GUERRERO CASTILLO    ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-29', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(14649617, 'CARLOS JESUS         ', 'BARRADAS ESCOBAR     ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-08-15', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 27, '1', NULL),
(14676317, 'DANNY ANTONIO        ', 'AMAYA PEREZ          ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-30', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(14677295, 'LUZ MABEL            ', 'MARCHAN RODRIGUEZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-12-18', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 13, '1', NULL),
(14677347, 'DALWUIS ALBERTO      ', 'MARTINEZ LISCANO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-11-15', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(14677909, 'EDGAR ALEXANDER      ', 'MELENDEZ             ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-01-12', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 25, '1', NULL),
(14696884, 'ALEXI JOSE           ', 'PEREZ MANZANO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-03-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(14772393, 'MIRNA CAROLINA       ', 'PEREZ LOYO           ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-09-23', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 28, '1', NULL),
(14772921, 'EDGAR EDUARDO        ', 'LOPEZ GUILLEN        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-08-06', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 24, '1', NULL),
(14871573, 'YARITZA COROMOTO     ', 'TORREALBA MENDOZA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-14', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 31, 1, 13, '1', NULL),
(14888926, 'RAFAEL ANTONIO       ', 'ORDOÑEZ YEPEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-07', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(14980826, 'ALEJANDRO EDUARDO    ', 'HERNANDEZ CASTILLO   ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-27', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(14980975, 'JUAN ALEXANDER       ', 'OROPEZA ARIAS        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-15', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(14981684, 'MIGUEL EDUARDO       ', 'PARRA SILVA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-01-26', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 25, '1', NULL),
(14981713, 'GONZALO              ', 'VARGAS JARAMILLO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-13', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(14981949, 'RAFAEL ANTONIO       ', 'LOMBANO MEDINA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-12', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(15032312, 'JOSE RENNY           ', 'PEÑA                 ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-04-16', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(15070185, 'JAIKER ALEXANDER     ', 'TORREALBA GALLARDO   ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-04-06', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(15070191, 'GRECIA NATALY        ', 'RODRIGUEZ LINAREZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-27', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 42, 1, 22, '1', NULL),
(15070294, 'JUAN PABLO           ', 'GUEDEZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-20', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(15070295, 'JOSE ARMANDO         ', 'GUEDEZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(15070513, 'FRANCY MILECXA       ', 'POVEDA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-09-07', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 31, 1, 13, '1', NULL),
(15070599, 'JORGE                ', 'HAMMAL KHAYAT        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-02-16', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(15070735, 'PASCUAL JOSE         ', 'ROBLES GRIMAN        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(15071104, 'ADOLFO RAMON         ', 'COLMENAREZ HERNANDEZ ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-04-02', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(15071266, 'JOSE DAVID           ', 'TRAVIESO AGUERO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-14', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(15071660, 'WISTON COROMOTO      ', 'LUGO DIAZ            ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-09-18', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 25, '1', NULL),
(15138510, 'JORGE ELEAZAR        ', 'CONTRERAS FLORES     ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-16', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(15213308, 'YASENY LIPZAIS       ', 'BLANCO CHIRINOS      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-02-04', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 25, '1', NULL),
(15213466, 'LILIAN ELIZABETH     ', 'GONZALEZ ESPAÑA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-10-17', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 27, '1', NULL),
(15214094, 'JAVIER GUSTAVO       ', 'VALDERRAMA RONDON    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-21', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(15215286, 'LEIDY KAROLINA       ', 'ORTIZ BENITEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 42, 1, 33, '1', NULL),
(15286297, 'EDURAD ENRIQUE       ', 'BRICEÑO PALMEZANO    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-01', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(15341153, 'FRANCISCO JAVIER     ', 'BRAVO ALVARADO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-12', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(15346187, 'LUIS RAFAEL          ', 'RIVERO NAVAS         ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-02', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(15472730, 'LUIS ANGEL           ', 'RODRIGUEZ CARTAYA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-02-26', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 15, '1', NULL),
(15491754, 'JORGE FRANCISCO      ', 'MARTINEZ CESAR       ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-06-09', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(15627469, 'MAITE YOSELIN        ', 'GUEDEZ GONZALEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2001-02-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 20, '1', NULL),
(15690260, 'YOLANDA              ', 'RAMIREZ TIMAURE      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-08-09', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 43, 1, 22, '1', NULL),
(15690709, 'MARIA GABRIELA       ', 'VARGAS GOMEZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-21', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 15, '1', NULL),
(15691259, 'HERNAN GREGORIO      ', 'PEREZ PARRA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-10-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 23, '1', NULL),
(15693371, 'YURAIMA FABIOLA      ', 'VIRGUEZ QUERALES     ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-04-07', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 34, 1, 17, '1', NULL),
(15693679, 'JOSE LUIS            ', 'JIMENEZ RAMIREZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(15847630, 'BEHSABE              ', 'VASQUEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-05', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 23, '1', NULL),
(15866187, 'JOSE JEFTE           ', 'TORRELLES CANELON    ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-10-02', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL);
INSERT INTO `persona` (`cedula`, `nombres_per`, `apellidos_per`, `telefono_movil_per`, `telefono_corp_per`, `telefono_casa_per`, `correo_per`, `direccion_habitacion_per`, `fecha_nacimiento_per`, `fecha_contratacion_per`, `fecha_ven_lic`, `fecha_ven_cermed`, `fecha_ven_ci`, `fecha_ven_cersal`, `fecha_ven_manali`, `observacion_per`, `cod_rol`, `idestatus`, `iddepartamento`, `estatus_per`, `estatus_con`) VALUES
(15866412, 'YAMILA DEL CARMEN    ', 'RODRIGUEZ AGUILAR    ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-07-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 26, '1', NULL),
(15866519, 'EDDIE JAVIER         ', 'MARTINEZ GUEDEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-02-16', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(15866607, 'ANGEL ALBERTO        ', 'MEDINA VILLASMIL     ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-01-29', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(15867522, 'YUSDARLYS ARIANNE    ', 'MELENDEZ LEON        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-03-20', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 22, '1', NULL),
(15867677, 'DINEGLIS OVALIS      ', 'ALVARADO LUCENA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-01-10', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 10, '1', NULL),
(15867847, 'YORLIS OMAIRA        ', 'SILVA DE ANTEQUERA   ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-03-15', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 22, '1', NULL),
(15868085, 'JOSE AMBROSIO        ', 'VELAZCO ALVARADO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-12-28', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(15869668, 'LUIS RODOLFO         ', 'PINEDA TORREALBA     ', NULL, NULL, NULL, NULL, NULL, NULL, '2001-11-30', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(15869985, 'JHOHANNYS ALBERTO    ', 'MORALES              ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-07-01', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(15894833, 'MARIA JOSE           ', 'DUCHARNE NAVAS       ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-04-25', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 20, '1', NULL),
(16002971, 'FRANCISCO JAVIER     ', 'ALVARADO APONTE      ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-02-25', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(16040333, 'PABLO JOSE           ', 'MUJICA GUTIERREZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-03-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 14, '1', NULL),
(16041140, 'FERNANDO ANTONIO     ', 'PARRA PIÑA           ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-08', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(16041609, 'JOHAN MANUEL         ', 'SEQUERA JIMENEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-12', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(16041610, 'JAVIER JOSE          ', 'MARTINEZ QUERALES    ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-10-07', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(16041787, 'OSWALDO JOSE         ', 'MATA ALFONZO         ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-06-16', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 35, 1, 14, '1', NULL),
(16042872, 'LUIBEL ALBERTO       ', 'MENDOZA ALVARADO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-10-25', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 15, '1', NULL),
(16043952, 'HENRY ARNALDO        ', 'SILVA DUDAMEL        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-13', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(16292813, 'IRMALIS              ', 'MORIAN               ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-05', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 27, '1', NULL),
(16293069, 'YERIBETH COROMOTO    ', 'ANDUEZA FONSECA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-05-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 1, '1', NULL),
(16294901, 'MINERVA YASMIN       ', 'NAVEDA MEDINA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-08-08', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 26, '1', NULL),
(16411111, 'ENRIQUE              ', 'ZAMBRANO URIBE       ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-11-19', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 14, '1', NULL),
(16414366, 'ERIS WLADIMIR        ', 'VARGAS MONTES        ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-02-26', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(16414413, 'ESTEBAN JOSE         ', 'GONZALEZ ARREDONDO   ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-01-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 20, '1', NULL),
(16414417, 'LUIS ALBERTO         ', 'PEREZ JIMENEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-11-16', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(16414652, 'JOSSIE DEL VALLE     ', 'MARQUEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-11-27', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 15, '1', NULL),
(16414772, 'WLADIMIR ALFONZO     ', 'GUERRA ORTIZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-13', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(16415939, 'CARLOS ENRIQUE       ', 'MOGOLLON BARCO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-29', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(16416446, 'JHONNY ALEXIS        ', 'YEPEZ MENDOZA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-14', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 40, 1, 14, '1', NULL),
(16565654, 'ROGER ALEXANDER      ', 'ANGULO ESCALONA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-02-12', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(16565966, 'RUBI JOSEFINA        ', 'SALVATIERRA CUERVO   ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-21', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 6, '1', NULL),
(16751624, 'JUAN RAMON           ', 'MENDOZA PARGAS       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-01', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(16751878, 'GIOGERSON WILLIAMS   ', 'GREI MEJIA           ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-03-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 18, '1', NULL),
(16752111, 'DULCE MARIA          ', 'BARCO                ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-10-17', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 26, '1', NULL),
(16753615, 'MIRIAM ELENA         ', 'ABREU LEON           ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-09-15', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 30, '1', NULL),
(16860296, 'JOSE MIGUEL          ', 'MORA LEAL            ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-12-08', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 20, '1', NULL),
(16860921, 'JAIRO MANUEL         ', 'MENDEZ               ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-11', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(16861277, 'EDUARDO JOSE         ', 'CASTAÑEDA BRACHO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-16', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(16861810, 'JULIO CESAR          ', 'HERNANDEZ REINA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-29', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 15, '1', NULL),
(16862114, 'MARIA LAURA          ', 'AGUERO COLMENAREZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-21', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 16, '1', NULL),
(16922070, 'GIANSCARLOS          ', 'PEREZ ZAPATA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-02-04', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 42, 1, 18, '1', NULL),
(16965795, 'LENIN OSCAR          ', 'LISCANO ERAZO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-26', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(17018552, 'ALEXANDER DE JESUS   ', 'VEGA ESCALONA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-29', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(17032291, 'GUSTAVO JOSE         ', 'ROSAS ROSAS          ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-31', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(17276436, 'GILBERTO ANTONIO     ', 'SIMANCA APARICIO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-01', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(17276950, 'JOSE GREGORIO        ', 'COLMENARES RODRIGUEZ ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-11', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 6, '1', NULL),
(17277040, 'KARI ALEJANDRA       ', 'MELENDEZ LEON        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-01-22', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 27, '1', NULL),
(17278399, 'JUAN DAVID           ', 'ESCOBAR VARON        ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-18', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 35, 1, 14, '1', NULL),
(17286405, 'MARLENES YURIMAR     ', 'PEREZ PAREDES        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-06-05', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 32, '1', NULL),
(17599990, 'JOSE IVAN            ', 'MORILLO CORDERO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-03-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(17600903, 'JOSE PASTOR          ', 'AGUILAR              ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-10-03', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 21, '1', NULL),
(17601181, 'HENRY JOSE           ', 'RIVERO BARCO         ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-08-01', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(17612341, 'RICHARD ALBERTO      ', 'FIGUEROA             ', NULL, NULL, NULL, NULL, NULL, NULL, '2004-09-20', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 46, 1, 14, '1', NULL),
(17619452, 'SERGIO ALEXANDER     ', 'DALE CASTILLO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-29', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(17675010, 'COROMOTO IRENE       ', 'MARTINEZ LUNA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-09-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 6, '1', NULL),
(17795303, 'VICTOR MANUEL        ', 'JIMENEZ REYES        ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(17797740, 'JOSE MANUEL          ', 'CHIRINOS FALCON      ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-26', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(17860397, 'DIANA CAROLINA       ', 'RAMIREZ TORRES       ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-01-03', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 33, '1', NULL),
(17944405, 'EDUARDO JOSE         ', 'ARIAS CABRERA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-09', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 35, 1, 14, '1', NULL),
(17945358, 'ARGENIS JOSE         ', 'ALVARADO SALAS       ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-07-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(18262777, 'ANAIS JOSEPH         ', 'COLMENARES  GRANDA   ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-04-25', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 42, 1, 28, '1', NULL),
(18295909, 'TONY RAFAEL          ', 'LINAREZ SANCHEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-04-20', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(18343739, 'ROGER JOSE           ', 'LADERA               ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-01-30', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 15, '1', NULL),
(18432281, 'JESSIKA ANDREINA     ', 'RODRIGUEZ LOPEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-05-21', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 42, 1, 30, '1', NULL),
(18671135, 'YELINE VANESSA       ', 'MOGOLLON SALCEDO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-07-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 1, '1', NULL),
(18671916, 'JACKSON JOSE         ', 'SANCHEZ SILVA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-08-04', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 32, '1', NULL),
(18671946, 'ALIRIO JOSE          ', 'ALVARADO QUERALES    ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-22', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(18672790, 'ELIAZAR              ', 'JIMENEZ CASTILLO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-18', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 32, 1, 14, '1', NULL),
(18689840, 'DAVID JOSE           ', 'PEREZ MANZANO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(18711116, 'RICARDO LUIS         ', 'VASQUEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-10-01', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(18732744, 'YOSIMAR ANAHIS       ', 'GONZALEZ TORIN       ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-01-05', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 21, '1', NULL),
(18799180, 'MAWUAMPY ALEJANDRA   ', 'RAMOS YACOBUCCI      ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-01-09', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 41, 1, 17, '1', NULL),
(18799562, 'RAFAEL EDUARDO       ', 'HERNANDEZ LOPEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-02-03', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 6, '1', NULL),
(18800003, 'ALFREDO JOSE         ', 'QUERALES DORANTE     ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-10-17', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 1, '1', NULL),
(18800164, 'ALEJANDRO ANTONIO    ', 'MORENO GUERRERO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-01-17', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(18819519, 'LAURA KATHERINE      ', 'MEJIA SANCHEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-21', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 28, '1', NULL),
(18844911, 'CARLOS ALBERTO       ', 'PERNALETE GRATEROL   ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-02-06', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(18872126, 'UCLIDES ANTONIO      ', 'DUVELT               ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-04-06', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 33, '1', NULL),
(18872937, 'RICHARD ALEXANDER    ', 'VASQUEZ              ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-10-29', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 28, '1', NULL),
(18872938, 'ELIEZER ALEJANDRO    ', 'ARRIECHI VASQUEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-27', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(18928156, 'EUVIS SAUL           ', 'PERAZA CARBAJAL      ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(18928545, 'FERNANDO JOSE        ', 'CASTRO GUEDEZ        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-12', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(18929731, 'FRANCISCO JAVIER     ', 'PEREZ FONSECA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-11-28', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 28, '1', NULL),
(18929748, 'MARIELBIS WILIMAR    ', 'MENDEZ PEREZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-04', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 31, '1', NULL),
(19053878, 'PEDRO PABLO          ', 'COLMENAREZ RODRIGUEZ ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-12-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 32, '1', NULL),
(19263763, 'ELIZABETH YIKELYS', 'CHIRINOS VARGAS ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-06-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO', 33, 1, 16, '1', NULL),
(19283508, 'SANDRA JULIED ', 'LOPEZ BONILLA  ', NULL, NULL, NULL, NULL, '', NULL, '2010-05-31', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO  ', 33, 1, 28, '1', NULL),
(19283735, 'RAFAEL ANTONIO       ', 'MERCADO LUCENA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-02-12', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 31, 1, 13, '1', NULL),
(19283801, 'JAIRO RAUL           ', 'ALMAO                ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(19284130, 'EDOARG GIBERSON      ', 'COLMENAREZ HERNANDEZ ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-30', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(19323334, 'ESTHER DAYANA        ', 'BLANCO MEDINA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-09-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 45, 1, 28, '1', NULL),
(19377070, 'ELIMAR COROMOTO      ', 'GONZALEZ MONTEMAYOR  ', NULL, NULL, NULL, NULL, NULL, NULL, '2013-03-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 34, 1, 17, '1', NULL),
(19377581, 'JOSE RAFAEL          ', 'PEREZ                ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-03-07', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(19399019, 'WOLFAN ALEXANDER     ', 'LUNA HERRERA         ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-29', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 6, '1', NULL),
(19519421, 'RAMIRO EDUARDO       ', 'QUESADA GARCIA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-08-07', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 19, '1', NULL),
(19587896, 'REIMORT EDUARDO      ', 'RIVERO GRATEROL      ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-01-30', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 15, '1', NULL),
(19714949, 'CARLOS ', 'DELGADO', '04126769941', NULL, '02556218895', 'CARLOS@HOTMAIL.COM', 'AGUA CLARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USA LENTES', 35, 1, 25, '1', '1'),
(19715018, 'Jesus', 'Sanchez', '04264090708', '33333333333', '02556222222', 'jesussh7@gmail.com', 'durigua 2', NULL, NULL, '2015-04-14', '2015-04-14', '2015-04-14', '2015-04-14', '2015-04-14', NULL, 9, 1, 9, '2', NULL),
(19715365, 'VALENTINA', 'SOTO', '04245419940', NULL, '02556218895', 'CESAR_MADRID_93@HOTMAIL.COM', 'URB LOS MANGOS ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LOS MANGOS ', 1, 1, 16, '1', '1'),
(19715634, 'CRISTINA', 'YANG', '04146652351', NULL, '02554288712', 'CAMICANAL@GMAIL.COM', 'ACARIGUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NUEVO', 35, 1, 25, '1', '1'),
(19715934, 'MARIA FERNANDA       ', 'MARQUEZ COLMENAREZ   ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-08-13', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 23, '1', NULL),
(19798048, 'DALVIS JOSE          ', 'MENDOZA MORILLO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-10-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 31, 1, 13, '1', NULL),
(19799292, 'JAIME ORLANDO        ', 'CHIRINOS MORILLO     ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-12', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(19799879, 'ESTARLIN RAMON       ', 'PARRA GUTIERREZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-10-27', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 6, '1', NULL),
(19855063, 'WUILBERT ALONZO      ', 'HERNANDEZ ALVARADO   ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-04-01', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(19902925, 'LUIS', 'GUTIERREZ', '04245419940', NULL, '04245419940', 'CESAR_MADRID_93@HOTMAIL.COM', 'URB EL PILAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIEN BUENO ', 49, 1, 25, '1', '1'),
(19903255, 'FERNANDO GABRIEL     ', 'BLANCO MELENDEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-12-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 20, '1', NULL),
(20024672, 'HECTOR RAFAEL        ', 'HERRERA TOVAR        ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-08-25', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(20025694, 'SHOIRET SARAHY       ', 'PALOMAREZ MOGOLLON   ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-11-29', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 6, '1', NULL),
(20389109, 'MICHAEL JOSE         ', 'PACHECO DIAZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 24, '1', NULL),
(20390178, 'jesus', 'carballo', '04264086527', NULL, '02556223954', 'jesusalejandrocarballo@gmail.com', 'la batalla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL),
(20390431, 'OSCAR OMAR           ', 'CASTAÑEDA            ', NULL, NULL, NULL, NULL, NULL, NULL, '2008-01-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 27, '1', NULL),
(20391129, 'YAILYS JOSE          ', 'CONCHA OVALLES       ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-23', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 33, '1', NULL),
(20391785, 'ADRIAN ALBERTO       ', 'VASQUEZ GARCIA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-08-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 30, 1, 12, '1', NULL),
(20391892, 'carlet', 'riera', '04127621042', NULL, '02587634219', 'carlet@hotmail.com', 'llano alto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1, 10, '1', NULL),
(20487772, 'maria', 'sanchez', '04269103844', NULL, '02587280674', 'mariatsanz@hotmail.com.ar', 'san diego de cojedes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 1, 9, '1', NULL),
(20487805, 'zoraly', 'gomez', '04262523373', NULL, '02556689021', 'z-oral-y8@hotmail.com', 'calle antonio pinto salinas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1, 7, '1', NULL),
(20642302, 'RONALD JOSE          ', 'SUAREZ SALCEDO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-12', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(20643251, 'MARIA ANTONIETA      ', 'FIGUEREDO DELGADO    ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-20', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 31, '1', NULL),
(20643614, 'daniela', 'montes', '04122073560', NULL, '02556210112', 'dani.daniela.montes@gmail.com', 'durigua 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1, 4, '1', NULL),
(20644832, 'CARLOS EDUARDO       ', 'GARCIA APONTE        ', NULL, NULL, NULL, NULL, NULL, NULL, '2012-02-08', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(20644961, 'ADALBERTO            ', 'GONZALEZ ESCALONA    ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 37, 1, 14, '1', NULL),
(20657234, 'MARIA', 'ALVAREZ', '04245419940', NULL, '02556218895', 'CESAR_MADRID_93@HOTMAIL.COM', 'URB EL PILAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HOLA', 35, 1, 25, '1', '1'),
(20687493, 'OSWALDO LUIS         ', 'GONZALEZ GONZALEZ    ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 18, '1', NULL),
(21057520, 'GABRIELA MERCEDES    ', 'MENDOZA SANCHEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-05-23', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 22, '1', NULL),
(21059101, 'ALCIDES JOSE         ', 'GALLEGOS PEÑA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 24, '1', NULL),
(21059626, 'JOSE ANTONIO         ', 'GONZALEZ LUCENA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-08-13', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 44, 1, 32, '1', NULL),
(21060562, 'LEONARDO ABIGAIL     ', 'ARIAS RODRIGUEZ      ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-02', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 35, 1, 24, '1', NULL),
(21393824, 'jose', 'mogollon', '04125217686', NULL, '02556239206', 'josetomas_033@hotmail.com', 'urb. el este', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1, 5, '1', NULL),
(21393971, 'MARIA GABRIELA       ', 'RODRIGUEZ SILVA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-06-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 10, '1', NULL),
(21563123, 'JUANA', 'LOPEZ', '04141555550', NULL, '02556777770', 'CARLOS@HOTMAIL.COM', 'DURIGUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 36, 1, 21, '1', '1'),
(21563405, 'JUAN', 'GOMEZ', '04245678678', NULL, '02556767878', 'MARIA@HOTMAIL.COM', 'DURIGUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 2, 1, 20, '1', NULL),
(21563405, 'Pedro', 'Perez', '04163454567', '04125217686', '02556689021', 'pedroperez@hotmail.com', 'Durigua 2 calle 10 casa 02', NULL, NULL, '0000-00-00', '0009-04-02', '0000-00-00', '0009-07-01', '0006-05-09', NULL, 9, 1, 3, '0', NULL),
(21563681, 'maria', 'marcelo', '04267986578', NULL, '02589563421', 'mary256@hotmail.com', 'el mamon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1, 10, '1', NULL),
(21563685, 'juan', 'perez', '04245676567', '04123454564', '02556777777', 'MARIA@HOTMAIL.COM', 'av. 5 durigua', NULL, NULL, '2017-04-24', '2018-09-12', '2016-04-12', '2014-04-10', '2018-03-12', '', 9, 1, 9, NULL, '1'),
(21564371, 'JONATHAN JOSE        ', 'JUAREZ PIÑA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-12-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 23, '1', NULL),
(22096393, 'KEVIN ALEXANDER      ', 'PARADA PIREZ         ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-08-17', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 38, 1, 14, '1', NULL),
(22103475, 'ELENA SARAHIZ        ', 'JIMENEZ MUJICA       ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-07-25', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 36, 1, 14, '1', NULL),
(22104796, 'JOSE LEONARDO        ', 'VIERA FONSECA        ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-10-24', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 37, 1, 14, '1', NULL),
(22105440, 'DARWIN JOSE          ', 'CASTILLO VIELMA      ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-07-23', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 32, 1, 14, '1', NULL),
(22622004, 'RAUL FORTUNATO       ', 'RODRIGUEZ CASTRELLON ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-04-27', NULL, NULL, NULL, NULL, NULL, '15MILKG              ', 9, 1, 3, '1', NULL),
(23052188, 'YOISEL JEHIRUSKA     ', 'LOPEZ OCHOA          ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-08-01', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 23, '1', NULL),
(23052886, 'ROSA ELENA           ', 'ALVAREZ NADAL        ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-07-25', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 36, 1, 14, '1', NULL),
(23298091, 'WANDA VICTORIA       ', 'DIAZ FLORES          ', NULL, NULL, NULL, NULL, NULL, NULL, '2009-11-09', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 30, '1', NULL),
(23298292, 'SILFREDO YUNIOR      ', 'CARRASCO REYES       ', NULL, NULL, NULL, NULL, NULL, NULL, '2010-08-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 19, '1', NULL),
(23477627, 'JERARDINE CAROLINA   ', 'BARRETO RIVERO       ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-16', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 15, '1', NULL),
(24146294, 'CESAR EDUARDO', 'BELLO ROJAS', '02556217144', NULL, '02556217144', 'CESAR@GMAIL.COM', 'EL PILAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 2, 1, 27, '1', '1'),
(24146295, 'CESAR AUGUSTO', 'BELLO', '04245419940', NULL, '04245419940', 'CESAR_MADRID_93@HOTMAIL.COM', 'URB EL PILAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HOLA', 2, 1, 11, '1', '1'),
(24653335, 'MARCO TULIO          ', 'CAICEDO              ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-21', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL),
(24653427, 'JOSE GAMALIEL        ', 'RIOS RESTREPO        ', NULL, NULL, NULL, NULL, NULL, NULL, '2006-06-26', NULL, NULL, NULL, NULL, NULL, '10MILKG              ', 9, 1, 3, '1', NULL),
(24687184, 'NABOR                ', 'CORRALES             ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-03-01', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(24687226, 'EDILBERTO            ', 'CORREA BENITEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-05-16', NULL, NULL, NULL, NULL, NULL, 'TALLER               ', 30, 1, 12, '1', NULL),
(24935412, 'ELIANNI GABRIELA     ', 'COLMENAREZ TIRMAN    ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-10-23', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 10, '1', NULL),
(25160116, 'MARIA ALEJANDRA      ', 'JUAREZ TOVAR         ', NULL, NULL, NULL, NULL, NULL, NULL, '2014-10-23', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 36, 1, 26, '1', NULL),
(25161310, 'YAMNUARIS', 'GUEDEZ', '04126737823', NULL, '02556648876', 'ALGUNO@HOTMAIL.COM', 'EL AGUELO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 31, 1, 25, '1', '1'),
(25702292, 'JOHAN MANUEL         ', 'DELGADO MARTINEZ     ', NULL, NULL, NULL, NULL, NULL, NULL, '2015-01-30', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 33, 1, 15, '1', NULL),
(25856653, 'SAMUEL               ', 'OCANTO ALVARADO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2011-03-15', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATIVO       ', 31, 1, 13, '1', NULL),
(80344092, 'RODRIGO              ', 'MARTINEZ CASTRO      ', NULL, NULL, NULL, NULL, NULL, NULL, '2005-07-22', NULL, NULL, NULL, NULL, NULL, 'PAQUETEROS           ', 9, 1, 3, '1', NULL),
(81126678, 'GILBERTO             ', 'BARRAGAN LOPEZ       ', NULL, NULL, NULL, NULL, NULL, NULL, '2007-11-15', NULL, NULL, NULL, NULL, NULL, 'GRANALEROS/VOLQUETAS ', 9, 1, 3, '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE IF NOT EXISTS `precio` (
`idprecio` int(11) NOT NULL,
  `precio_pre` varchar(45) DEFAULT NULL,
  `idtipo_unidad` int(5) NOT NULL,
  `estatus_pre` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`idprecio`, `precio_pre`, `idtipo_unidad`, `estatus_pre`) VALUES
(1, '1150', 1, '1'),
(2, '4600', 2, '1'),
(3, '2100', 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preventivo`
--

CREATE TABLE IF NOT EXISTS `preventivo` (
`idpreventivo` int(11) NOT NULL,
  `placa_unidad` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `kilometraje` int(100) NOT NULL,
  `observaciones` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `preventivo`
--

INSERT INTO `preventivo` (`idpreventivo`, `placa_unidad`, `fecha`, `kilometraje`, `observaciones`) VALUES
(1, '6090a3s', '2016-01-20', 36000, ''),
(2, '6090a3s', '2016-01-20', 60000, ''),
(3, 'asf5464', '2016-08-18', 2600, ''),
(4, 'cesar123', '2017-01-06', 68000, ''),
(5, 'abr55571', '2017-01-06', 56789, 'ecwc'),
(6, 'cesar123', '2017-01-10', 75000, ''),
(7, 'xbz567', '2017-02-06', 59600, 'Mantenimiento preventivo realizado'),
(8, 'cesar123', '2017-02-08', 100000, 'cambio de aceite'),
(9, 'qwe123', '2017-02-15', 20000, ''),
(10, 'qwe123', '2017-02-15', 30000, 'se le hizo cambio de aceite'),
(11, 'qwe123', '2017-02-15', 40000, ''),
(12, 'qwe123', '2017-02-15', 60000, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`idproducto` int(11) NOT NULL,
  `desc_prod` varchar(45) DEFAULT NULL,
  `idtipo_producto` int(5) NOT NULL,
  `idunidad_medida` int(4) NOT NULL,
  `idtipo_unidad` int(5) NOT NULL,
  `estatus_pro` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `desc_prod`, `idtipo_producto`, `idunidad_medida`, `idtipo_unidad`, `estatus_pro`) VALUES
(1, 'CABILLAS', 1, 1, 1, '1'),
(2, 'ALAMBRE', 1, 1, 1, '1'),
(3, 'LAMINAS DE ACEROS', 1, 1, 1, '1'),
(4, 'TUBOS', 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion_guia`
--

CREATE TABLE IF NOT EXISTS `recepcion_guia` (
`idrecepcion_guia` int(11) NOT NULL,
  `fecha_hora_recgui` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `n_guia` int(11) DEFAULT NULL,
  `observacion_recgui` text,
  `eliminado_recgui` int(1) DEFAULT NULL,
  `idorden_carga` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `recepcion_guia`
--

INSERT INTO `recepcion_guia` (`idrecepcion_guia`, `fecha_hora_recgui`, `n_guia`, `observacion_recgui`, `eliminado_recgui`, `idorden_carga`) VALUES
(1, '2015-05-22 21:50:42', 234, '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
`idregion` int(2) NOT NULL,
  `desc_regi` varchar(20) DEFAULT NULL,
  `estatus_reg` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_unidad`
--

CREATE TABLE IF NOT EXISTS `relacion_unidad` (
  `idconductor` int(9) NOT NULL,
  `idunidad_reluni` int(5) DEFAULT NULL,
  `idremolque_reluni` int(5) DEFAULT NULL,
  `fecha_hora_reluni` datetime DEFAULT NULL,
  `estatus_reluni` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relacion_unidad`
--

INSERT INTO `relacion_unidad` (`idconductor`, `idunidad_reluni`, `idremolque_reluni`, `fecha_hora_reluni`, `estatus_reluni`) VALUES
(2594904, 2, 2, '2015-05-22 09:11:52', 'activa'),
(19715018, 1, 1, '2015-04-12 06:05:33', 'activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remolque`
--

CREATE TABLE IF NOT EXISTS `remolque` (
  `idremolque` int(5) NOT NULL,
  `serial_rem` varchar(45) DEFAULT NULL,
  `placa_rem` varchar(45) DEFAULT NULL,
  `estatus_rem` varchar(1) DEFAULT '1',
  `observaciones_rem` text,
  `idtipo_unidad_rem` int(5) NOT NULL,
  `idmodelo_unidad_rem` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `remolque`
--

INSERT INTO `remolque` (`idremolque`, `serial_rem`, `placa_rem`, `estatus_rem`, `observaciones_rem`, `idtipo_unidad_rem`, `idmodelo_unidad_rem`) VALUES
(1, '567890', '7865567', '2', 'ninguna', 2, 2),
(2, '56789876', '8769087', '2', 'ninguna', 1, 1),
(56, 'dchddc4', 'dcdsdhs', '1', 'en buen estado', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE IF NOT EXISTS `reporte` (
`IdReporte` int(11) NOT NULL,
  `NombreRep` varchar(100) NOT NULL,
  `UrlRep` varchar(100) NOT NULL DEFAULT 'construccionReporte',
  `DescripcionRep` varchar(100) NOT NULL,
  `EstatusRep` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`IdReporte`, `NombreRep`, `UrlRep`, `DescripcionRep`, `EstatusRep`) VALUES
(3, 'estatus', 'reporte/pdfRep_Estatus', '', 1),
(4, 'banco', 'reporte/pdfRep_Banco', '', 1),
(5, 'tipo cliente', 'reporte/pdfRep_tipcliente', '', 1),
(6, 'tipo cuenta', 'reporte/pdfRep_tipcuenta', '', 1),
(7, 'tipo contribuyente', 'reporte/pdfRep_Tipocontri', '', 1),
(8, 'tipo producto', 'reporte/pdfRep_tipoproducto', '', 1),
(9, 'tipo proveedor', 'reporte/pdfRep_Tipoprove', '', 1),
(10, 'unidad medida', 'reporte/pdfRep_Unidadmedida', '', 1),
(11, 'capacidad', 'reporte/pdfRep_Capacidad', '', 1),
(12, 'departamento', 'reporte/pdfRep_Departamento', '', 1),
(13, 'marca unidad', 'reporte/pdfRep_Marcaunidad', '', 1),
(14, 'modelo unidad', 'reporte/pdfRep_Modelounidad', '', 1),
(15, 'cargo', 'reporte/pdfRep_Roles', '', 1),
(16, 'tipo unidad', 'reporte/pdfRep_Tipounidad', '', 1),
(18, 'orden carga por conductor', 'visRep_Orden_conductor', '', 1),
(19, 'orden de carga por ciudad origen', 'visRep_Orden_tabulador', '', 1),
(20, 'orden de carga por estatus', 'visRep_Orden_estatus', '', 1),
(21, 'orden de carga por ciudad destino', 'visRep_Orden_tabulador_destino', '', 1),
(22, 'relacion por estatus', 'visRep_Relacion_estatus', '', 1),
(23, 'relacion por conductor', 'visRep_Relacion_conductor', '', 1),
(24, 'solicitud por rif', 'visRep_Solicitud_rif', '', 1),
(25, 'solicitud por estatus', 'visRep_Solicitud_estatus', '', 1),
(26, 'solicitud por ciudad origen', 'visRep_Solicitud_tabulador', '', 1),
(27, 'solicitud por razon social', 'visRep_Solicitud_cliente', '', 1),
(28, 'solicitud por ciudad destino', 'visRep_Solicitud_tabulador_destino', '', 1),
(29, 'solicitud por fecha', 'visRep_Solicitud_fecha', '', 1),
(30, 'recepcion de guia', 'visRep_Recepcion', '', 1),
(31, 'orden de carga por fecha', 'visRep_Orden_fecha', '', 1),
(32, 'recepcion de guia por fecha/cliente', 'visRep_Recepcion_fecha', '', 1),
(33, 'recepcion de guia por fecha/conductor', 'visRep_Recepcion_conductor', '', 1),
(34, 'bitacora', 'visRep_Bitacora_fecha', '', 1),
(35, 'estatistica de solicitudes', 'reportegrafico/pie-monochrome/index2', 'solicitudes', 1),
(36, 'estatistica de unidades', 'reportegrafico/pie-monochrome/unidad', '', 1),
(37, 'estatistica de ordenes de carga', 'reportegrafico/pie-monochrome/ordencarga', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respaldos`
--

CREATE TABLE IF NOT EXISTS `respaldos` (
`id_respaldo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `archivo` varchar(60) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
`cod_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) NOT NULL,
  `estatus_rol` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`cod_rol`, `nombre_rol`, `estatus_rol`) VALUES
(1, 'ADMINISTRADOR', '1'),
(2, 'ANALISTA ADMINISTRATIVO', '1'),
(8, 'COORDINADOR ADMINISTRATIVO', '1'),
(9, 'CONDUCTOR', '1'),
(12, 'COORDINADOR TRAFICO I', '1'),
(13, 'ANALISTA TRAFICO I', '1'),
(14, 'COORDINADOR TRAFICO II', '1'),
(15, 'ANALISTA TRAFICO II', '1'),
(20, 'COORDINADOR TALENTO HUMANO', '1'),
(21, 'ANALISTA TALENTO HUMANO', '1'),
(22, 'COORDINADOR SISTEMA', '1'),
(23, 'ANALISTA SISTEMA', '1'),
(24, 'COORDINADOR COMERCIALIZACION', '1'),
(25, 'COORDINADOR FLOTA', '1'),
(26, 'COORDINADOR FINANZAS', '1'),
(27, 'ADMINISTRADOR I', '1'),
(28, 'ANALISTA COMERCIALIZACION', '1'),
(29, 'ANALISTA FLOTA', '1'),
(30, 'MECANICO', '1'),
(31, 'AYUDANTE', '1'),
(32, 'ELECTRICISTA', '1'),
(33, 'COORDINADOR', '1'),
(34, 'ABOGADO', '1'),
(35, 'ANALISTA', '1'),
(36, 'ASISTENTE', '1'),
(37, 'AYUDANTE MECANICO', '1'),
(38, 'AYUDANTE ELECTRICISTA', '1'),
(39, 'AYUDANTE SOLDADOR', '1'),
(40, 'AYUDANTE TORNERO', '1'),
(41, 'CONSULTOR', '1'),
(42, 'GERENTE', '1'),
(43, 'ENFERMERA', '1'),
(44, 'INSPECTOR', '1'),
(45, 'JEFE', '1'),
(46, 'SOLDADOR', '1'),
(47, 'MENSAJERO', '1'),
(48, 'TORNERO', '1'),
(49, 'SUPERVISIOR', '1'),
(50, 'ANALISTA ADT', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
`idruta` int(11) NOT NULL,
  `kilometraje_rut` int(6) DEFAULT NULL,
  `via_rut` varchar(45) DEFAULT NULL,
  `dias_rut` varchar(45) DEFAULT NULL,
  `idciudad_origen_rut` int(12) NOT NULL,
  `idciudad_destino_rut` int(12) NOT NULL,
  `estatus_rut` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`idruta`, `kilometraje_rut`, `via_rut`, `dias_rut`, `idciudad_origen_rut`, `idciudad_destino_rut`, `estatus_rut`) VALUES
(1, 326, 'CARVAJAL', '2', 341, 353, '1'),
(2, 115, 'PAEZ', '1', 341, 354, '1'),
(3, 42, 'ARAURE PAYARA', '1', 339, 353, '1'),
(4, 365, 'LARA ZULIA', '2', 214, 487, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_unidad`
--

CREATE TABLE IF NOT EXISTS `servicio_unidad` (
`idservicio_unidad` int(11) NOT NULL,
  `nombre_equipo` varchar(45) DEFAULT NULL,
  `cantidad_equipo` int(3) DEFAULT NULL,
  `observacion_equipo` varchar(45) DEFAULT NULL,
  `idunidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
`idsolicitud` int(11) NOT NULL,
  `fecha_hora_sol` datetime DEFAULT NULL,
  `fecha_salida_sol` date DEFAULT NULL,
  `direccion_salida_sol` varchar(300) DEFAULT NULL,
  `fecha_entrega_sol` date DEFAULT NULL,
  `direccion_entrega_sol` varchar(300) DEFAULT NULL,
  `precio_tabulador_sol` int(6) DEFAULT NULL,
  `precio_total_sol` int(6) DEFAULT NULL,
  `unidades_req_sol` int(2) NOT NULL,
  `unidades_asignadas_sol` int(2) NOT NULL,
  `observaciones_sol` text,
  `observacion_devolver_sol` text,
  `observacion_anular_sol` text,
  `estatus_sol` varchar(45) DEFAULT NULL,
  `eliminado_sol` int(1) DEFAULT NULL,
  `idcliente_sol` varchar(10) NOT NULL,
  `idtabulador_sol` int(11) DEFAULT NULL,
  `idciudad_origen_sol` int(12) DEFAULT NULL,
  `idciudad_destino_sol` int(12) DEFAULT NULL,
  `idtipo_unidad_sol` int(5) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idsolicitud`, `fecha_hora_sol`, `fecha_salida_sol`, `direccion_salida_sol`, `fecha_entrega_sol`, `direccion_entrega_sol`, `precio_tabulador_sol`, `precio_total_sol`, `unidades_req_sol`, `unidades_asignadas_sol`, `observaciones_sol`, `observacion_devolver_sol`, `observacion_anular_sol`, `estatus_sol`, `eliminado_sol`, `idcliente_sol`, `idtabulador_sol`, `idciudad_origen_sol`, `idciudad_destino_sol`, `idtipo_unidad_sol`) VALUES
(1, '2015-05-22 08:35:31', '2015-05-24', 'av 4 y 6 calle 9', '2015-05-31', 'av 6 y 8 calle 3', 88200, 88200, 1, 1, '', NULL, NULL, 'ejecutada', 0, 'j21563703', 3, 353, 354, 3),
(2, '2015-05-22 09:01:13', '2015-05-24', 'av 4 y 6 calle 9', '2015-05-31', 'av 6 y 8 calle 3', 88200, 705600, 8, 0, '', NULL, NULL, 'procesada', 0, 'j21563703', 3, 353, 354, 1),
(3, '2015-05-22 09:32:17', '2015-05-24', 'av 4 y 6 calle 9', '2015-05-31', 'av 6 y 8 calle 3', NULL, NULL, 1, 0, '', NULL, NULL, 'espera', 0, 'j21563703', NULL, 341, 353, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_mantenimiento`
--

CREATE TABLE IF NOT EXISTS `solicitud_mantenimiento` (
`idsolicitud_repuesto` int(11) NOT NULL,
  `nro_solicitud` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estatus` char(1) NOT NULL,
  `tipo_solicitud` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `solicitud_mantenimiento`
--

INSERT INTO `solicitud_mantenimiento` (`idsolicitud_repuesto`, `nro_solicitud`, `descripcion`, `estatus`, `tipo_solicitud`) VALUES
(3, 4, 'Solicitud de cauchos', '0', '1'),
(4, 5, 'Este es un ejemplo', '1', '1'),
(5, 6, 'Mantenimiento correctivo', '1', '1'),
(6, 3, 'Este es un ejemplo de accidente ', '1', '2'),
(7, 7, '', '2', '1'),
(8, 8, 'esta es una descripcion tico', '2', '1'),
(9, 9, 'probando las validaciones', '2', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_producto`
--

CREATE TABLE IF NOT EXISTS `solicitud_producto` (
`idsolicitud_producto` int(11) NOT NULL,
  `solicitud_idsolicitud` int(11) NOT NULL,
  `producto_idproducto` int(11) NOT NULL,
  `peso_pro` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `solicitud_producto`
--

INSERT INTO `solicitud_producto` (`idsolicitud_producto`, `solicitud_idsolicitud`, `producto_idproducto`, `peso_pro`) VALUES
(9, 1, 1, 8),
(10, 2, 2, 120),
(11, 2, 4, 120),
(12, 3, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
`IdSubmenu` int(11) NOT NULL,
  `NombreSub` varchar(50) NOT NULL,
  `UrlSub` varchar(50) NOT NULL,
  `DescripcionSub` varchar(100) NOT NULL,
  `EstatusSub` varchar(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`IdSubmenu`, `NombreSub`, `UrlSub`, `DescripcionSub`, `EstatusSub`) VALUES
(1, 'CONFIGURACION GENERAL', 'LISTADEVALORES', 'LISTADEVALORES', '1'),
(2, 'UBICACION GEOGRAFICA', 'UBICACIONGEOGRAFICA', 'UBICACIONGEOGRAFICA', '1'),
(3, 'TRANSPORTE', 'TRANSPORTE', 'TRANSPORTE', '1'),
(4, 'TABULADOR', 'TABULADOR', 'TABULADOR', '1'),
(5, 'SISTEMA', 'SISTEMA', 'SISTEMA', '1'),
(6, 'ORGANIZACION', 'ORGANIZACION', 'ORGANIZACION', '1'),
(7, 'INVENTARIO', 'INVENTARIO', 'INVENTARIO', '1'),
(8, 'CONFIGURACION', 'CONFIGURACION', 'SEGURIDAD', '1'),
(9, 'USUARIO', 'USUARIO', 'SEGURIDAD', '1'),
(10, 'BITACORA', 'BITACORA', 'SEGURIDAD', '1'),
(11, 'LISTADO', 'LISTAREPORTES', 'LISTADO DE TODOS LOS REPORTES', '0'),
(12, 'CONFIGURACION GENERAL', 'LISTADEVALORES', 'ANALISTA COMERCIALIZACION', '1'),
(13, 'TRANSPORTE', 'TRANSPORTE', 'ANALISTA COMERCIALIZACION', '1'),
(14, 'INVENTARIO', 'INVENTARIO', 'ANALISTA COMERCIALIZACION', '1'),
(15, 'TRANSPORTE ', 'TRANSPORTE', 'ANALISTA FLOTA', '1'),
(16, 'subtico', 'subtico', 'subtico', '1'),
(17, 'FALLA', 'TFALLA', 'REGISTRAR LAS FALLAS DE UNA UNIDAD', '1'),
(18, 'FALLA', 'TFALLAS', 'REGISTRAR LAS FALLAS DE UNA UNIDAD', '1'),
(19, 'ADMINISTRACION DE FALLAS', 'tadministracion_fallas', 'Administrar las fallas por modelo de unidad', '1'),
(20, 'CONSULTAS', '#', 'consultas de inventario', '1'),
(21, 'AJUSTES', '#', 'ajustes de inventario', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu_operacion`
--

CREATE TABLE IF NOT EXISTS `submenu_operacion` (
`IdSubmenu_Operacion` int(11) NOT NULL,
  `IdSubmenu` int(11) NOT NULL,
  `IdOperacion` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Volcado de datos para la tabla `submenu_operacion`
--

INSERT INTO `submenu_operacion` (`IdSubmenu_Operacion`, `IdSubmenu`, `IdOperacion`) VALUES
(1, 1, 40),
(3, 1, 42),
(4, 1, 43),
(5, 1, 44),
(6, 1, 51),
(7, 2, 32),
(8, 2, 33),
(9, 2, 34),
(10, 2, 35),
(11, 2, 36),
(12, 2, 37),
(13, 3, 26),
(14, 3, 27),
(15, 3, 30),
(16, 3, 78),
(17, 4, 56),
(18, 4, 29),
(20, 5, 1),
(21, 5, 2),
(22, 5, 3),
(23, 5, 4),
(24, 5, 5),
(25, 5, 6),
(26, 5, 7),
(27, 6, 38),
(28, 6, 50),
(29, 6, 19),
(30, 7, 41),
(31, 7, 45),
(32, 7, 46),
(36, 9, 14),
(37, 9, 15),
(38, 9, 16),
(39, 10, 17),
(40, 10, 18),
(41, 8, 9),
(42, 8, 10),
(43, 8, 12),
(44, 8, 11),
(45, 8, 13),
(46, 8, 89),
(47, 8, 90),
(48, 8, 91),
(49, 1, 47),
(51, 3, 48),
(52, 1, 49),
(53, 1, 39),
(54, 6, 57),
(55, 3, 28),
(56, 12, 40),
(57, 12, 49),
(58, 13, 28),
(59, 13, 48),
(60, 14, 41),
(61, 15, 26),
(62, 15, 27),
(63, 15, 30),
(64, 3, 116),
(65, 3, 117),
(66, 7, 118),
(68, 7, 119),
(69, 14, 120),
(70, 7, 122),
(71, 20, 135),
(73, 21, 142),
(74, 21, 143);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabulador`
--

CREATE TABLE IF NOT EXISTS `tabulador` (
`idtabulador` int(11) NOT NULL,
  `precio_total_tab` int(6) DEFAULT NULL,
  `idprecio` int(11) NOT NULL,
  `idruta_tab` int(11) NOT NULL,
  `estatus_tab` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tabulador`
--

INSERT INTO `tabulador` (`idtabulador`, `precio_total_tab`, `idprecio`, `idruta_tab`, `estatus_tab`) VALUES
(1, 374900, 1, 1, '1'),
(2, 529000, 2, 2, '1'),
(3, 88200, 3, 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabulador_viatico`
--

CREATE TABLE IF NOT EXISTS `tabulador_viatico` (
`idtabulador_viatico` int(11) NOT NULL,
  `fecha_hora_tabvia` datetime DEFAULT NULL,
  `estatus_tabvia` int(1) DEFAULT NULL,
  `idruta_tabvia` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `tabulador_viatico`
--

INSERT INTO `tabulador_viatico` (`idtabulador_viatico`, `fecha_hora_tabvia`, `estatus_tabvia`, `idruta_tabvia`) VALUES
(21, '2015-05-22 09:22:43', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talertasoperaciones`
--

CREATE TABLE IF NOT EXISTS `talertasoperaciones` (
`idAlerta` int(11) NOT NULL,
  `aviso` varchar(100) NOT NULL,
  `tipoAlerta` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `talertasoperaciones`
--

INSERT INTO `talertasoperaciones` (`idAlerta`, `aviso`, `tipoAlerta`) VALUES
(1, 'Registro exitoso.', 'alert-success'),
(2, 'Registro eliminado correctamente.', 'alert-success'),
(3, 'Registro modificado correctamente.', 'alert-success'),
(4, 'Registro restaurado correctamente.', 'alert-success'),
(5, '¡Disculpe! Este registro ya existe.', 'alert-danger'),
(6, '¡Disculpe! Ocurrio un error con el registro.', 'alert-danger'),
(7, 'Desactivacion exitosa.', 'alert-success'),
(8, '¡Disculpe! Ocurrio un error en el proceso.', 'alert-danger'),
(9, 'Activacion exitosa.', 'alert-success'),
(10, 'Usuario desbloqueado, la clave asignada sera el mismo numero de cedula.', 'alert-success'),
(11, 'Usuario bloqueado.', 'alert-success'),
(12, '¡Disculpe! No puede eliminar un registro que esta en uso.', 'alert-warning'),
(13, '¡Disculpe! No puede editar un registro que no este activo o este en uso.', 'alert-warning'),
(14, '¡Disculpe! No puede eliminar un municipio en uso, que posea parroquias activas o esten uso.', 'alert-warning'),
(15, 'Usuario y/o contraseña incorrecta.', 'alert-warning'),
(16, 'Su usuario ha sido bloqueado por intentos fallidos.', 'alert-warning'),
(17, 'Su solicitud ha sido enviada, se le notificara por correo electronico cuando sea procesada.', 'alert-success'),
(18, 'Ya existe una solicitud pendiente con la misma descripcion.', 'alert-warning'),
(19, '¡Disculpe! El inspector seleccionado ya tiene ocupada esa fecha.', 'alert-info'),
(20, 'Asignacion procesada con exito.', 'alert-success'),
(21, 'Este inspector alcanzo el tope maximo de asignacion.', 'alert-danger'),
(22, 'Solicitud aprobada.', 'alert-success'),
(23, 'Solicitud rechazada.', 'alert-success'),
(24, 'Solicitud rechazada por error en datos.', 'alert-info'),
(25, 'El archivo de la inspeccion se guardo con exito.', 'alert-success'),
(26, '¡Disculpe! Debe seleccionar un archivo.', 'alert-info'),
(27, 'La solicitud ha sido negada.', 'alert-success'),
(28, 'Este facilitador alcanzo el tope maximo de capacitaciones por dia.', 'alert-warning'),
(29, '¡Disculpe! Esta organizacion ya esta asociada a este usuario.', 'alert-warning'),
(30, 'Se a eliminado correctamente la asociacion del usuario con la empresa.', 'alert-success'),
(31, '¡Disculpe! Ingrese codigo de la imagen superior correctamente.', 'alert-warning'),
(32, 'Recuerde iniciar session para acceder al sistema.', 'alert-danger'),
(33, '¡Disculpe! Registro no modificado, ingrese nuevos datos.', 'alert-danger'),
(34, '¡Disculpe! Contraseña incorrecta.', 'alert-danger'),
(35, 'Anulacion exitosa.', 'alert-success'),
(36, 'Solicitud procesada correctamente.', 'alert-success'),
(37, 'Devolucion exitosa.', 'alert-success');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasignacion_unidad`
--

CREATE TABLE IF NOT EXISTS `tasignacion_unidad` (
`id_asignacion_unidad` int(11) NOT NULL,
  `cedula_chofer` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `placa_unidad` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `fecha_desasignacion` date DEFAULT NULL,
  `estatus` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tasignacion_unidad`
--

INSERT INTO `tasignacion_unidad` (`id_asignacion_unidad`, `cedula_chofer`, `placa_unidad`, `fecha_asignacion`, `fecha_desasignacion`, `estatus`) VALUES
(1, '19455541', '323ewe3', '2015-08-01', '2015-08-29', '1'),
(2, '19902881', 'A1A1A1', '2015-11-08', '2015-11-30', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tauxilio_vial`
--

CREATE TABLE IF NOT EXISTS `tauxilio_vial` (
`id_auxilio_vial` int(11) NOT NULL,
  `placa_unidad` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_auxilio_vial` date DEFAULT NULL,
  `descripcion_accidente` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idparroquia` int(11) DEFAULT NULL,
  `direccio_detallada` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion_solicitud` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(11) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tauxilio_vial`
--

INSERT INTO `tauxilio_vial` (`id_auxilio_vial`, `placa_unidad`, `fecha_auxilio_vial`, `descripcion_accidente`, `idparroquia`, `direccio_detallada`, `descripcion_solicitud`, `estatus`) VALUES
(2, '323ewe3', '2015-10-04', 'Esta es otra descripcion de auxilio vial', 1, 'sAN JOSE 2 AV3 CASA 1300', '10 cauchos,\r\n20 gasolinas, \r\n20 ejemplos', 1),
(3, '323ewe3', '2015-10-05', 'Este es un ejemplo de accidente ', 1, 'aGUA cLARA', 'CauchosEjemplo1, ejemplo 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcambiosclaveusuarios`
--

CREATE TABLE IF NOT EXISTS `tcambiosclaveusuarios` (
`idCambio` int(11) NOT NULL,
  `idUsuario` varchar(30) NOT NULL,
  `fechaUsoClave` date NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tcambiosclaveusuarios`
--

INSERT INTO `tcambiosclaveusuarios` (`idCambio`, `idUsuario`, `fechaUsoClave`, `clave`) VALUES
(3, 'sanchez', '0000-00-00', 'a3ce761961c311adb7d6'),
(4, 'teresa', '0000-00-00', '022a553ce3ae658871f1'),
(6, 'marcelo', '0000-00-00', '6df3e62bd3ef0557923d'),
(11, 'ZORALY', '2015-05-20', '5184271bfcd6d7bbf2e2'),
(12, 'montes', '2015-05-21', '49a65627411ea5996066'),
(13, 'mogollon', '2015-05-21', 'effa8007e8e0b189bb10'),
(14, 'quintero', '2015-05-21', 'c8594557142e48329faf'),
(15, 'riera', '2015-05-21', '848de98241b1c827827b'),
(16, 'inversionesluis', '2015-05-22', '155d135724ec2d232eec');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarga`
--

CREATE TABLE IF NOT EXISTS `tcarga` (
`idtcarga` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `placa_batea` char(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `placa_chacis` char(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tcarga`
--

INSERT INTO `tcarga` (`idtcarga`, `nombre`, `placa_batea`, `placa_chacis`) VALUES
(1, 'Ejemplo', 'A23ASD', 'AD3ASC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tchofer`
--

CREATE TABLE IF NOT EXISTS `tchofer` (
  `id_chofer` char(12) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre1` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre2` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido1` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido2` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_naci` date DEFAULT NULL,
  `estado_civil` int(11) DEFAULT NULL,
  `id_parroquia` int(11) DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grado_licencia` char(10) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tchofer`
--

INSERT INTO `tchofer` (`id_chofer`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `sexo`, `fecha_naci`, `estado_civil`, `id_parroquia`, `direccion`, `telefono`, `correo`, `grado_licencia`, `estatus`) VALUES
('19455541', 'CARLOS', 'EDUARDO', 'VARGAS', 'TOVAR', 'M', '2015-01-05', 1, 1, 'EJEMPLO DE DIRECCION', '0255-6217144', 'ticobboy@gmail.com', '203345', 1),
('19902881', 'karla', 'danielys', 'VARGAS', 'TOVAR', 'F', '0000-00-00', 2, 722, 'Direccion', '0255-6217144', 'karla@gmail.com', '1234566211', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tconfiguracion`
--

CREATE TABLE IF NOT EXISTS `tconfiguracion` (
`idConfiguracion` int(11) NOT NULL,
  `numeroIntentos` int(11) NOT NULL DEFAULT '0',
  `caducidadClave` int(11) NOT NULL DEFAULT '0',
  `preguntasSecretas` int(11) NOT NULL DEFAULT '0',
  `tiempoConexion` int(11) NOT NULL DEFAULT '0',
  `quienes_somos` varchar(10000) NOT NULL,
  `historia` varchar(10000) NOT NULL,
  `mision` varchar(10000) NOT NULL,
  `vision` varchar(10000) NOT NULL,
  `objetivos` varchar(10000) NOT NULL,
  `topeMaximoInspeccion` int(11) NOT NULL DEFAULT '0',
  `topeMaximoCapacitacion` int(11) NOT NULL DEFAULT '0',
  `nombresistema` varchar(30) DEFAULT NULL,
  `version` varchar(10) NOT NULL DEFAULT '0.0',
  `lenguageprogramacion` varchar(30) NOT NULL,
  `mensajesTexto` int(11) NOT NULL DEFAULT '1',
  `ultimo_periodo` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tconfiguracion`
--

INSERT INTO `tconfiguracion` (`idConfiguracion`, `numeroIntentos`, `caducidadClave`, `preguntasSecretas`, `tiempoConexion`, `quienes_somos`, `historia`, `mision`, `vision`, `objetivos`, `topeMaximoInspeccion`, `topeMaximoCapacitacion`, `nombresistema`, `version`, `lenguageprogramacion`, `mensajesTexto`, `ultimo_periodo`) VALUES
(1, 2, 1, 5, 14400, 'Es una empresa prestadora de servicios de transporte terrestre de cargas livianas y pesadas con alta calidad, y eficiencia en el traslado de diversos productos a diversas Organizaciones por todo el territorio nacional.', 'Prestar excelente servicio de transporte terrestre de cargas livianas y pesadas con alta calidad y base tecnológica, para contribuir con el fortalecimiento de la Soberanía Alimentaria, el desarrollo de infraestructuras y el bienestar social de nuestra nación.\r\n\r\nLograr mejoramiento continuo al talento humano y la flota vehícular, proporcionando efectividad y seguridad a las cargas, para satisfacer al pueblo Bolivariano Venezolano.\r\n', 'Somos integrantes del GRUPO-PRO, empresa prestadora de servicios de transporte terrestre de cargas livianas y pesadas con alta calidad, y eficiencia en el traslado de diversos productos al Gobierno Revolucionario, Misiones Sociales y Otras Organizaciones por todo el territorio nacional.', 'Ser una Unidad Socialista de Transporte Terrestre, reconocida por su talento humano, la alta calidad de sus servicios de cargas livianas y pesadas a nivel nacional, logrando la satisfacción de nuestros trabajadores y el bienestar social de los Venezolanos.', 'Prestar excelente servicio de transporte terrestre de cargas livianas y pesadas con alta calidad y base tecnológica, para contribuir con el fortalecimiento de la Soberanía Alimentaria, el desarrollo de infraestructuras y el bienestar social de nuestra nación.\r\n\r\nLograr mejoramiento continuo al talento humano y la flota vehícular, proporcionando efectividad y seguridad a las cargas, para satisfacer al pueblo Bolivariano Venezolano.\r\n', 2, 2, 'ATCSISTEM', '2.0', 'PHP 5.4', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_carga`
--

CREATE TABLE IF NOT EXISTS `tdetalle_carga` (
`idtdetallecarga` int(11) NOT NULL,
  `placa_unidad` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `idtcarga` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tdetalle_carga`
--

INSERT INTO `tdetalle_carga` (`idtdetallecarga`, `placa_unidad`, `idtcarga`, `fecha_asignacion`) VALUES
(1, 'A1A1A1', 1, '2015-11-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_lubricante`
--

CREATE TABLE IF NOT EXISTS `tdetalle_lubricante` (
`iddetalle_lubricante` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  `idmodelo_unidad` int(5) NOT NULL,
  `kmax` int(11) NOT NULL,
  `kmin` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_mantenimiento_correctivo`
--

CREATE TABLE IF NOT EXISTS `tdetalle_mantenimiento_correctivo` (
`idtdetalle_mantenimiento_correctivo` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  `actividad` varchar(200) NOT NULL,
  `kilometraje` varchar(100) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `idmecanico` char(12) NOT NULL,
  `fecha` date NOT NULL,
  `nota` varchar(100) NOT NULL,
  `idmatenimiento_correctivo` int(11) NOT NULL,
  `unidad_medida` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tdetalle_mantenimiento_correctivo`
--

INSERT INTO `tdetalle_mantenimiento_correctivo` (`idtdetalle_mantenimiento_correctivo`, `id_repuesto`, `actividad`, `kilometraje`, `cantidad`, `idmecanico`, `fecha`, `nota`, `idmatenimiento_correctivo`, `unidad_medida`) VALUES
(1, 1, 'Haciendo la actividad', '1000', '20', '20467294', '2016-01-19', 'esta es una nota', 1, 0),
(2, 1, 'cambio de cauchos', '100', '2', '20467294', '2016-01-19', 'Nota de ejemplo', 3, 2),
(3, 1, 'CAMBIAN', '36000', '36000', '22098345', '2016-01-20', 'ALMACEN', 1, 1),
(4, 1, 'CAMBIAN', '36000', '36000', '22098345', '2016-01-20', 'ALMACEN', 1, 1),
(5, 1, 'cambio', '36000', '36000', '23580008', '2016-01-20', 'pendiente', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_solicitud`
--

CREATE TABLE IF NOT EXISTS `tdetalle_solicitud` (
`id_detalle_solicitud` int(11) NOT NULL,
  `nro_solicitud` int(11) DEFAULT NULL,
  `id_repuesto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_unidades_repuesto`
--

CREATE TABLE IF NOT EXISTS `tdetalle_unidades_repuesto` (
`idrepuesto_detalle` int(11) NOT NULL,
  `idmodelo_unidad` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `kmax` int(11) NOT NULL,
  `kmin` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `tdetalle_unidades_repuesto`
--

INSERT INTO `tdetalle_unidades_repuesto` (`idrepuesto_detalle`, `idmodelo_unidad`, `id_repuesto`, `cantidad`, `kmax`, `kmin`, `estatus`) VALUES
(14, 1, 1, 8, 8000, 4000, 1),
(15, 2, 2, 4, 5000, 2000, 1),
(16, 2, 3, 1, 6000, 2000, 1),
(17, 2, 4, 4, 6000, 1000, 1),
(18, 1, 5, 1, 8000, 2000, 1),
(19, 2, 6, 1, 3000, 1000, 1),
(20, 2, 7, 1, 3000, 1000, 1),
(21, 2, 8, 1, 5000, 2000, 1),
(22, 1, 9, 1, 1, 1, 1),
(23, 1, 10, 1, 5000, 5000, 1),
(24, 1, 11, 1, 2000, 1000, 1),
(25, 1, 13, 1, 0, 0, 1),
(26, 1, 14, 5, 2200, 2000, 1),
(27, 2, 14, 5, 2200, 2000, 1),
(28, 1, 15, 4, 2200, 2000, 1),
(29, 1, 16, 5, 5000, 4000, 1),
(30, 1, 17, 5, 4000, 2000, 1),
(34, 1, 18, 1, 2500, 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfalla`
--

CREATE TABLE IF NOT EXISTS `tfalla` (
`idfalla` int(11) NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tfalla`
--

INSERT INTO `tfalla` (`idfalla`, `descripcion`, `estatus`) VALUES
(1, 'Auxilio Vial', 1),
(3, 'electrica', 0),
(4, 'atencion al cliente', 0),
(5, 'Falla electrica', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE IF NOT EXISTS `tipo_cliente` (
`idtipo_cliente` int(2) NOT NULL,
  `desc_tipo_clie` varchar(45) DEFAULT NULL,
  `estatus_tipcli` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`idtipo_cliente`, `desc_tipo_clie`, `estatus_tipcli`) VALUES
(1, 'PERSONA NATURAL', '1'),
(2, 'FIRMAS PERSONALES', '1'),
(3, 'ASOCIACION COOPERATIVA', '1'),
(4, 'SOCIEDADES MERCANTILES', '1'),
(5, 'SOCIEDADES CIVILES CON FINES DE LUCRO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contribuyente`
--

CREATE TABLE IF NOT EXISTS `tipo_contribuyente` (
`idtipo_contribuyente` int(2) NOT NULL,
  `desc_tipo_cont` varchar(45) DEFAULT NULL,
  `estatus_tipcont` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_contribuyente`
--

INSERT INTO `tipo_contribuyente` (`idtipo_contribuyente`, `desc_tipo_cont`, `estatus_tipcont`) VALUES
(1, 'FORMAL', '1'),
(2, 'ESPECIAL', '1'),
(3, 'ORDINARIO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuenta`
--

CREATE TABLE IF NOT EXISTS `tipo_cuenta` (
`idtipo_cuenta` int(11) NOT NULL,
  `desc_tipo_cuen` varchar(45) DEFAULT NULL,
  `estatus_tipcue` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipo_cuenta`
--

INSERT INTO `tipo_cuenta` (`idtipo_cuenta`, `desc_tipo_cuen`, `estatus_tipcue`) VALUES
(1, 'ATC CESAR', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE IF NOT EXISTS `tipo_producto` (
`idtipo_producto` int(5) NOT NULL,
  `desc_tipo_prod` varchar(45) DEFAULT NULL,
  `estatus_tippro` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`idtipo_producto`, `desc_tipo_prod`, `estatus_tippro`) VALUES
(1, 'METALES', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proveedor`
--

CREATE TABLE IF NOT EXISTS `tipo_proveedor` (
`idtipo_proveedor` int(2) NOT NULL,
  `desc_tipo_prov` varchar(45) DEFAULT NULL,
  `estatus_tippro` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_proveedor`
--

INSERT INTO `tipo_proveedor` (`idtipo_proveedor`, `desc_tipo_prov`, `estatus_tippro`) VALUES
(1, 'PROVEEDOR DE BIENES Y MATERIALES', '1'),
(2, 'PROVEEDOR DE SERVICIOS', '1'),
(3, 'CONTRATISTA DE OBRA', '1'),
(4, 'SERVICIOS PROFESIONALES', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_unidad`
--

CREATE TABLE IF NOT EXISTS `tipo_unidad` (
`idtipo_unidad` int(5) NOT NULL,
  `desc_tipo_unid` varchar(30) DEFAULT NULL,
  `tipo_unidad` int(4) NOT NULL,
  `estatus_tipuni` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tipo_unidad`
--

INSERT INTO `tipo_unidad` (`idtipo_unidad`, `desc_tipo_unid`, `tipo_unidad`, `estatus_tipuni`) VALUES
(1, 'PAQUETERO', 3, '1'),
(2, 'CAVA', 2, '1'),
(3, 'CAVA', 1, '1'),
(4, 'EJEMPLO DE UNIDAD', 2, '1'),
(5, 'TRACTOR', 2, '1'),
(6, 'CHUTO', 2, '1'),
(7, 'CESAR TIPO', 2, '1'),
(8, 'XXXDA', 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmantenimiento`
--

CREATE TABLE IF NOT EXISTS `tmantenimiento` (
`id_mantenimiento` int(11) NOT NULL,
  `idtipo_mantenimiento` int(5) NOT NULL,
  `placa_unidad` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_orden` date NOT NULL,
  `kilometraje_orden` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(3) NOT NULL,
  `nota_orden` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL,
  `idmecanico` int(11) NOT NULL,
  `fecha_mantenimiento` date DEFAULT NULL,
  `cantidad_mantenimiento` int(11) NOT NULL,
  `nota_mantenimiento` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  `kilometraje_mantenimiento` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `idfalla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmantenimiento_correctivo`
--

CREATE TABLE IF NOT EXISTS `tmantenimiento_correctivo` (
`idmatenimiento_correctivo` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `idfalla` int(11) NOT NULL,
  `estatus` char(1) NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmantenimiento_preventivo`
--

CREATE TABLE IF NOT EXISTS `tmantenimiento_preventivo` (
`iddetallepreventivo` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  `cantidad` int(120) NOT NULL,
  `fecha` date NOT NULL,
  `idmecanico` char(12) NOT NULL,
  `kilometraje` varchar(100) NOT NULL,
  `idpreventivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmotivorazon`
--

CREATE TABLE IF NOT EXISTS `tmotivorazon` (
`idMotivorazon` int(11) NOT NULL,
  `motivorazon` varchar(50) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  `visible` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tmotivorazon`
--

INSERT INTO `tmotivorazon` (`idMotivorazon`, `motivorazon`, `estatus`, `visible`) VALUES
(1, 'VACACIONES', 1, 2),
(2, 'REPOSO', 1, 2),
(3, 'MUERTE', 1, 2),
(4, 'DESPIDO', 1, 2),
(5, 'RENUNCIA', 1, 2),
(6, 'APERTURA DE NEGOCIO', 1, 1),
(7, 'LO EXIGE OTRA ORGANIZACION', 1, 1),
(8, 'LO EXIGE EL SEGURO', 1, 3),
(9, 'TRAMITES CON TERCEROS', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpreguntaseguridad`
--

CREATE TABLE IF NOT EXISTS `tpreguntaseguridad` (
`idPreguntas` int(11) NOT NULL,
  `idUsuario` varchar(30) NOT NULL,
  `pregunta` varchar(40) NOT NULL,
  `respuesta` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Volcado de datos para la tabla `tpreguntaseguridad`
--

INSERT INTO `tpreguntaseguridad` (`idPreguntas`, `idUsuario`, `pregunta`, `respuesta`) VALUES
(5, 'sanchez', 'nombre de mi hermano', 'victor'),
(6, 'sanchez', 'nombre de mi novia', 'liz'),
(7, 'teresa', 'nombre de mi amiga', 'carlet'),
(8, 'teresa', 'nombre de mi mama', 'beatriz'),
(11, 'marcelo', 'nombre de mi perrito', 'dorito'),
(12, 'marcelo', 'nombre de mi becerro', 'simon'),
(21, 'ZORALY', 'nombre de mi madre', 'zoraida'),
(22, 'ZORALY', 'nombre de mi padre', 'oswaldo'),
(23, 'montes', 'nombre de mi novio', 'eliezer'),
(24, 'montes', 'nombre de mi madre', 'elizabeth'),
(25, 'mogollon', 'nombre de mi madre', 'migdalia'),
(26, 'mogollon', 'nombre de mi perrito', 'atenas'),
(27, 'quintero', 'nombre de mi hermana', 'danielis'),
(28, 'quintero', 'que carrera estudio', 'informatica'),
(29, 'riera', 'nombre de mi mejor amiga', 'maria '),
(30, 'riera', 'carrera que estudio', 'informatica'),
(31, 'inversionesluis', 'nombre de mi mama', 'luisa'),
(32, 'inversionesluis', 'nombre de mi papa', 'juan'),
(45, 'CLAUDIASOTO', 'como estas ?', 'bien'),
(46, 'CLAUDIASOTO', 'nombre de perro', 'ignacio'),
(80, 'MARIAOCANTO', 'DIRECCION ', 'hola'),
(81, 'MARIAOCANTO', 'NOMBRE', 'maria'),
(82, 'VALENTINASOTO', 'NOMBRE', 'VALENTINA'),
(83, 'VALENTINASOTO', 'APELLIDO', 'SOTO'),
(90, 'jimenes', 'hola', 'holas'),
(91, 'jimenes', 'bien', 'mal'),
(92, 'cesarbello', 'nombre de mi perro', 'zeus'),
(93, 'cesarbello', 'nombre de mi equipo', 'madrid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tregistro_diario`
--

CREATE TABLE IF NOT EXISTS `tregistro_diario` (
`id_tregistro_diario` int(11) NOT NULL,
  `placa_unidad` varchar(30) NOT NULL,
  `kilometraje` int(100) NOT NULL,
  `fecha` date NOT NULL,
  `id_chofer` int(11) NOT NULL,
  `observacion` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tregistro_diario`
--

INSERT INTO `tregistro_diario` (`id_tregistro_diario`, `placa_unidad`, `kilometraje`, `fecha`, `id_chofer`, `observacion`) VALUES
(1, '5040a4f', 6000, '2016-01-20', 19902881, 'VINO BIEN'),
(2, '6090a3s', 20000, '2016-01-20', 19902881, 'BIEN\r\n'),
(3, '6090a3s', 30000, '2016-01-20', 19455541, 'BUEN ESTADO'),
(4, '6090a3s', 36000, '2016-01-20', 19455541, 'NO LLEGO BIEN'),
(5, '6090a3s', 50000, '2016-01-20', 19902881, 'sin novedad'),
(6, '6090a3s', 60000, '2016-01-20', 19902881, 'sin novedad'),
(7, '6090a3s', 60100, '2016-01-20', 19455541, 'sin novedad'),
(8, '6090a3s', 68500, '2016-01-20', 19902881, 'sin novedad'),
(9, '6090a3s', 69500, '2016-05-20', 19902881, 'buen estado'),
(10, '12', 10000, '2016-05-27', 19902881, 'ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trepuesto_lubricante`
--

CREATE TABLE IF NOT EXISTS `trepuesto_lubricante` (
`id_repuesto` int(11) NOT NULL,
  `id_modelo_repuesto` int(11) DEFAULT NULL,
  `nombre_repuesto` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT '1',
  `tipo_repuesto` int(2) NOT NULL,
  `tipo_lubricante` int(4) DEFAULT NULL,
  `idunidad_medida` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `trepuesto_lubricante`
--

INSERT INTO `trepuesto_lubricante` (`id_repuesto`, `id_modelo_repuesto`, `nombre_repuesto`, `estatus`, `tipo_repuesto`, `tipo_lubricante`, `idunidad_medida`) VALUES
(1, 3, 'rolineras', 1, 1, NULL, 0),
(2, 3, 'pastilas', 1, 1, NULL, 0),
(3, 3, 'correa de tiempo', 1, 1, NULL, 0),
(4, 3, 'bujias', 1, 1, NULL, 0),
(5, 3, 'filtro de aire', 1, 1, NULL, 0),
(6, 0, 'aceite de motor', 1, 2, NULL, 2),
(7, 0, 'aceite de caja', 1, 2, NULL, 2),
(8, 0, 'aceite de transmision', 1, 2, NULL, 2),
(9, 1, 'gUIA DE MEDIA', 1, 1, NULL, 0),
(10, 2, 'FILTRO', 1, 1, NULL, 0),
(11, 0, 'ACEITE PRUEBA', 1, 2, NULL, 2),
(12, 2, 'repuesto cesar', 1, 1, NULL, 0),
(13, 2, 'cessss', 1, 1, NULL, 0),
(14, 0, 'aceite2', 1, 2, NULL, 2),
(15, 0, 'aceite15w40', 1, 2, NULL, 2),
(16, 0, 'aceite2050', 1, 2, NULL, 2),
(17, 0, 'aceite2050', 1, 2, NULL, 2),
(18, 0, 'PDV2050', 1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsolicitud`
--

CREATE TABLE IF NOT EXISTS `tsolicitud` (
`nro_solicitud` int(11) NOT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `cedula_chofer` char(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `placa_unidad` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `observacion_solicitud` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estatus` int(1) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tsolicitud`
--

INSERT INTO `tsolicitud` (`nro_solicitud`, `fecha_solicitud`, `cedula_chofer`, `placa_unidad`, `observacion_solicitud`, `estatus`) VALUES
(1, '2015-08-30', '19455541', '323', 'solicitud de materiales de ejemplo', 1),
(2, '2015-08-30', '19455541', '323ewe3', 'Esta es una descripcion de unidad', 1),
(3, '2015-08-31', '19455541', '323ewe3sda', 'asdasdas', 1),
(4, '2015-09-22', '19455541', '323ewe3', 'Solicitud de cauchos', 0),
(5, '2015-09-22', '19455541', '323ewe3', 'Este es un ejemplo', 1),
(6, '2015-09-22', '19455541', '323ewe3', 'Mantenimiento correctivo', 1),
(7, '2015-10-19', '', '', '', 2),
(8, '2015-10-19', '19455541', '323ewe3', 'esta es una descripcion tico', 2),
(9, '2015-10-19', '19455541', '323ewe3', 'probando las validaciones', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE IF NOT EXISTS `unidad_medida` (
`idunidad_medida` int(4) NOT NULL,
  `desc_unid_medi` char(10) DEFAULT NULL,
  `estatus_unimed` varchar(45) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`idunidad_medida`, `desc_unid_medi`, `estatus_unimed`) VALUES
(1, 'Tn', '1'),
(2, 'Lt', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` varchar(30) NOT NULL,
  `cedula` int(8) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(35) NOT NULL,
  `clave` varchar(256) NOT NULL,
  `intentosFallidos` int(11) NOT NULL DEFAULT '0',
  `fechaUltimaClave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `primeravez` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `idPerfil` int(11) NOT NULL,
  `idcliente` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `cedula`, `nombre`, `apellido`, `telefono`, `correo`, `clave`, `intentosFallidos`, `fechaUltimaClave`, `primeravez`, `status`, `idPerfil`, `idcliente`) VALUES
('carballo', 20390178, 'jesus', 'carballo', '04169551611', 'jesusalejandrocarballo@gmail.com', '853ea9e0dc5fbcdfce9d3f5bd05a22d1', 0, '0000-00-00 00:00:00', 0, 1, 1, NULL),
('cesarbello', 19455541, 'cesar', 'bello', '', '', 'aca0831051fee66903cac2553701e32a', 0, '2015-08-25 04:51:20', 1, 1, 1, NULL),
('CLAUDIASOTO', 22098345, 'Claudia Mariana', 'Soto Inostroza', '02556754992', 'claudiasoto@gmail.com', 'c2dbe30927247ed56c37f3ae96386805', 0, '2015-09-05 19:24:56', 1, 0, 21, NULL),
('crisyan', 19715634, 'CRISTINA', 'YANG', '04146652351', 'CAMICANAL@GMAIL.COM', '2206a2a2c995698957452c2c80ffa8a8', 0, '2016-06-14 14:32:44', 1, 1, 22, NULL),
('inversionesluis', 21563703, 'luis', 'marcelo', '04121232345', 'inversiones@hotmail.com', 'a692378099379c17fb3ccdd273c0b53e', 0, '2015-05-22 21:22:49', 0, 1, 11, 'j21563703'),
('marcelo', 21563681, 'maria', 'marcelo', '04267986578', 'mary256@hotmail.com', '3b8f0201e6cf57750b6f27921375cb26', 0, '0000-00-00 00:00:00', 0, 1, 19, NULL),
('MARIAOCANTO', 20657234, 'MARIA', 'ALVAREZ', '04245419940', 'CESAR_MADRID_93@HOTMAIL.COM', 'b55cf101c0085408aa5e1784221f34ee', 0, '2016-07-04 19:37:15', 1, 1, 23, NULL),
('mogollon', 21393824, 'jose', 'mogollon', '04125217686', 'josetomas_033@hotmail.com', 'd5042435dc307c66348e284ca59600e9', 0, '2015-05-21 14:01:20', 0, 1, 7, NULL),
('montes', 20643614, 'daniela', 'montes', '04122073560', 'dani.daniela.montes@gmail.com', '815bd8ca55295c4a99a55bf66cf45a2d', 0, '2015-05-21 13:51:16', 0, 1, 5, NULL),
('quintero', 10643614, 'ELIZABETH', 'QUINTERO', '04126758976', 'DANI@GMAIL.COM', 'f8c4e5266108be92df9f64139d59e10e', 0, '2015-05-21 14:20:09', 0, 1, 17, NULL),
('riera', 20391892, 'carlet', 'riera', '04127621042', 'carlet@hotmail.com', '3b8f0201e6cf57750b6f27921375cb26', 0, '2015-05-21 15:13:21', 0, 1, 20, NULL),
('sanchez', 19715018, 'Jesus', 'Sanchez', '04264090708', 'jesussh7@gmail.com', 'd5042435dc307c66348e284ca59600e9', 0, '0000-00-00 00:00:00', 0, 1, 17, NULL),
('sidor2015', 20390178, 'alejandro', 'gutierrez', '04169551611', 'alejandro@gmail.com', '7ca0f10b9d1c7933b2bcde5c213ef5ac', 0, '0000-00-00 00:00:00', 0, 1, 11, 'J20563681'),
('teresa', 20487772, 'maria', 'sanchez', '04269103844', 'mariatsanz@hotmail.com.ar', 'f8c4e5266108be92df9f64139d59e10e', 0, '0000-00-00 00:00:00', 0, 1, 16, NULL),
('VALENTINASOTO', 19715365, 'VALENTINA', 'SOTO', '04245419940', 'CESAR_MADRID_93@HOTMAIL.COM', '31736c1b57ff1005be2ccc63f49536d5', 0, '2016-07-04 19:47:18', 1, 1, 22, NULL),
('ZORALY', 20487805, 'zoraly', 'gomez', '04262523373', 'z-oral-y8@hotmail.com', 'ae6dd4ffcb90499bf1f12840aef2007b', 0, '2015-05-21 10:59:46', 0, 1, 15, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_viatico`
--
ALTER TABLE `asignacion_viatico`
 ADD PRIMARY KEY (`idasignacion_viatico`,`idorden_carga_asivia`,`idtabulador_viatico_asivia`), ADD KEY `fk_asignacion_viaticos_orden_carga1_idx` (`idorden_carga_asivia`), ADD KEY `fk_asignacion_viaticos_tabulador_viaticos1_idx` (`idtabulador_viatico_asivia`);

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
 ADD PRIMARY KEY (`idbanco`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
 ADD PRIMARY KEY (`IdBitacora`);

--
-- Indices de la tabla `capacidad`
--
ALTER TABLE `capacidad`
 ADD PRIMARY KEY (`idcapacidad`,`idunidad_medida`), ADD KEY `fk_capacidad_unidad_medida1_idx` (`idunidad_medida`);

--
-- Indices de la tabla `centro_costo`
--
ALTER TABLE `centro_costo`
 ADD PRIMARY KEY (`idcentro_costo`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
 ADD PRIMARY KEY (`idciudad`,`idparroquia`), ADD KEY `fk_ciudad_parroquia1_idx` (`idparroquia`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`idcliente`,`idtipo_cliente_cli`,`idtipo_contribuyente_cli`,`idtipo_proveedor_cli`), ADD KEY `fk_cliente_tipo_cliente1_idx` (`idtipo_cliente_cli`), ADD KEY `fk_cliente_tipo_contribuyente1_idx` (`idtipo_contribuyente_cli`), ADD KEY `fk_cliente_tipo_proveedor1_idx` (`idtipo_proveedor_cli`);

--
-- Indices de la tabla `config_respaldo`
--
ALTER TABLE `config_respaldo`
 ADD PRIMARY KEY (`id_rconfig`);

--
-- Indices de la tabla `cuenta_banco`
--
ALTER TABLE `cuenta_banco`
 ADD PRIMARY KEY (`idcuenta`,`banco_idbanco`,`idtipo_cuenta`,`idcliente`), ADD UNIQUE KEY `idcuenta_UNIQUE` (`idcuenta`), ADD KEY `fk_cuenta_banco1_idx` (`banco_idbanco`), ADD KEY `fk_cuenta_tipo_cuenta1_idx` (`idtipo_cuenta`), ADD KEY `fk_cuenta_cliente1_idx` (`idcliente`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `detallemantenimiento`
--
ALTER TABLE `detallemantenimiento`
 ADD PRIMARY KEY (`iddetallemantenimiento`);

--
-- Indices de la tabla `detalle_persona`
--
ALTER TABLE `detalle_persona`
 ADD KEY `fk_detalle_persona_persona1_idx` (`cedula`);

--
-- Indices de la tabla `detalle_registrodiario`
--
ALTER TABLE `detalle_registrodiario`
 ADD PRIMARY KEY (`iddetalle_registrodiario`);

--
-- Indices de la tabla `detalle_tabulador_viatico`
--
ALTER TABLE `detalle_tabulador_viatico`
 ADD PRIMARY KEY (`iddet_tabulador_viatico`), ADD KEY `fk_tabulador_viatico_has_centro_costo_centro_costo1_idx` (`idcentro_costo_dettabvia`), ADD KEY `fk_tabulador_viatico_has_centro_costo_tabulador_viatico1_idx` (`idtabulador_viatico_dettabvia`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
 ADD PRIMARY KEY (`idestado`,`idpais`), ADD KEY `fk_estado_pais1_idx` (`idpais`), ADD KEY `fk_estado_region1_idx` (`idregion`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
 ADD PRIMARY KEY (`idestatus`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
 ADD PRIMARY KEY (`idfoto`), ADD KEY `fk_foto_galeria1_idx` (`fkgaleria`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
 ADD PRIMARY KEY (`idgaleria`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
 ADD PRIMARY KEY (`idmantenimiento`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`IdMenu`);

--
-- Indices de la tabla `menu_operacion`
--
ALTER TABLE `menu_operacion`
 ADD PRIMARY KEY (`IdMenu_Operacion`), ADD KEY `fk_Menu_Operacion_Menu1_idx` (`IdMenu`), ADD KEY `fk_Menu_Operacion_Operacion1_idx` (`IdOperacion`);

--
-- Indices de la tabla `menu_submenu`
--
ALTER TABLE `menu_submenu`
 ADD PRIMARY KEY (`IdMenu_Submenu`), ADD KEY `fk_menu_submenu_troles1_idx` (`IdMenu`), ADD KEY `fk_menu_submenu_submenu1_idx` (`IdSubmenu`);

--
-- Indices de la tabla `modelo_unidad`
--
ALTER TABLE `modelo_unidad`
 ADD PRIMARY KEY (`idmodelo_unidad`,`idtipo_unidad`), ADD KEY `fk_modelo_unidad_marca_unidad1_idx` (`idtipo_unidad`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
 ADD PRIMARY KEY (`idmunicipio`,`idestado`), ADD KEY `fk_municipio_estado1_idx` (`idestado`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
 ADD PRIMARY KEY (`IdOperacion`);

--
-- Indices de la tabla `orden_carga`
--
ALTER TABLE `orden_carga`
 ADD PRIMARY KEY (`idorden_carga`,`idsolicitud`,`idrelacion_unidad`), ADD KEY `fk_orden_carga_solicitud1_idx` (`idsolicitud`), ADD KEY `fk_orden_carga_relacion_unidad1_idx` (`idrelacion_unidad`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
 ADD PRIMARY KEY (`idpais`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
 ADD PRIMARY KEY (`idparroquia`,`idmunicipio`), ADD KEY `fk_parroquia_municipio1_idx` (`idmunicipio`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`IdPerfil`);

--
-- Indices de la tabla `perfil_menu`
--
ALTER TABLE `perfil_menu`
 ADD PRIMARY KEY (`IdPerfil_Menu`), ADD KEY `idCargo` (`IdPerfil`), ADD KEY `fk_tresponsabilidadrol_troles1_idx` (`IdMenu`);

--
-- Indices de la tabla `perfil_reporte`
--
ALTER TABLE `perfil_reporte`
 ADD PRIMARY KEY (`IdPerfil_Reporte`), ADD KEY `fk_Perfil_Reporte_Perfil1_idx` (`IdPerfil`), ADD KEY `fk_Perfil_Reporte_treportes1_idx` (`IdReporte`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
 ADD PRIMARY KEY (`IdPeriodo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`cedula`,`cod_rol`,`idestatus`,`iddepartamento`), ADD KEY `fk_persona_estatus1_idx` (`idestatus`), ADD KEY `fk_persona_rol1_idx` (`cod_rol`), ADD KEY `fk_persona_departamento1_idx` (`iddepartamento`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
 ADD PRIMARY KEY (`idprecio`,`idtipo_unidad`), ADD KEY `fk_precio_tipo_unidad1_idx` (`idtipo_unidad`);

--
-- Indices de la tabla `preventivo`
--
ALTER TABLE `preventivo`
 ADD PRIMARY KEY (`idpreventivo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`idproducto`,`idtipo_producto`,`idunidad_medida`,`idtipo_unidad`), ADD KEY `fk_producto_tipo_producto1_idx` (`idtipo_producto`), ADD KEY `fk_producto_unidad_medida1_idx` (`idunidad_medida`), ADD KEY `fk_producto_tipo_unidad1_idx` (`idtipo_unidad`);

--
-- Indices de la tabla `recepcion_guia`
--
ALTER TABLE `recepcion_guia`
 ADD PRIMARY KEY (`idrecepcion_guia`,`idorden_carga`), ADD KEY `fk_recepcion_guia_orden_carga1_idx` (`idorden_carga`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
 ADD PRIMARY KEY (`idregion`);

--
-- Indices de la tabla `relacion_unidad`
--
ALTER TABLE `relacion_unidad`
 ADD PRIMARY KEY (`idconductor`), ADD KEY `fk_relacion_unidad_persona1_idx` (`idconductor`), ADD KEY `fk_relacion_unidad_unidad1_idx` (`idunidad_reluni`), ADD KEY `fk_relacion_unidad_remolque1_idx` (`idremolque_reluni`);

--
-- Indices de la tabla `remolque`
--
ALTER TABLE `remolque`
 ADD PRIMARY KEY (`idremolque`,`idtipo_unidad_rem`,`idmodelo_unidad_rem`), ADD KEY `fk_remolque_tipo_unidad1_idx` (`idtipo_unidad_rem`), ADD KEY `fk_remolque_modelo_unidad1_idx` (`idmodelo_unidad_rem`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
 ADD PRIMARY KEY (`IdReporte`);

--
-- Indices de la tabla `respaldos`
--
ALTER TABLE `respaldos`
 ADD PRIMARY KEY (`id_respaldo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
 ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
 ADD PRIMARY KEY (`idruta`,`idciudad_origen_rut`,`idciudad_destino_rut`), ADD KEY `fk_ruta_ciudad1_idx` (`idciudad_origen_rut`), ADD KEY `fk_ruta_ciudad2_idx` (`idciudad_destino_rut`);

--
-- Indices de la tabla `servicio_unidad`
--
ALTER TABLE `servicio_unidad`
 ADD PRIMARY KEY (`idservicio_unidad`), ADD KEY `fk_equipo_unidad_unidad1_idx` (`idunidad`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
 ADD PRIMARY KEY (`idsolicitud`,`idcliente_sol`), ADD KEY `fk_solicitud_empresa1_idx` (`idcliente_sol`), ADD KEY `fk_solicitud_tabulador1_idx` (`idtabulador_sol`), ADD KEY `fk_solicitud_ciudad1_idx` (`idciudad_origen_sol`), ADD KEY `fk_solicitud_ciudad2_idx` (`idciudad_destino_sol`), ADD KEY `fk_solicitud_tipo_unidad1_idx` (`idtipo_unidad_sol`);

--
-- Indices de la tabla `solicitud_mantenimiento`
--
ALTER TABLE `solicitud_mantenimiento`
 ADD PRIMARY KEY (`idsolicitud_repuesto`);

--
-- Indices de la tabla `solicitud_producto`
--
ALTER TABLE `solicitud_producto`
 ADD PRIMARY KEY (`idsolicitud_producto`,`solicitud_idsolicitud`,`producto_idproducto`), ADD KEY `fk_solicitud_has_producto_producto1_idx` (`producto_idproducto`), ADD KEY `fk_solicitud_has_producto_solicitud1_idx` (`solicitud_idsolicitud`);

--
-- Indices de la tabla `submenu`
--
ALTER TABLE `submenu`
 ADD PRIMARY KEY (`IdSubmenu`);

--
-- Indices de la tabla `submenu_operacion`
--
ALTER TABLE `submenu_operacion`
 ADD PRIMARY KEY (`IdSubmenu_Operacion`), ADD KEY `fk_Submenu_Operacion_Submenu1_idx` (`IdSubmenu`), ADD KEY `fk_Submenu_Operacion_Operacion1_idx` (`IdOperacion`);

--
-- Indices de la tabla `tabulador`
--
ALTER TABLE `tabulador`
 ADD PRIMARY KEY (`idtabulador`,`idprecio`,`idruta_tab`), ADD KEY `fk_tabulador_precio1_idx` (`idprecio`), ADD KEY `fk_tabulador_ruta1_idx` (`idruta_tab`);

--
-- Indices de la tabla `tabulador_viatico`
--
ALTER TABLE `tabulador_viatico`
 ADD PRIMARY KEY (`idtabulador_viatico`), ADD KEY `ruta_viatico` (`idruta_tabvia`);

--
-- Indices de la tabla `talertasoperaciones`
--
ALTER TABLE `talertasoperaciones`
 ADD PRIMARY KEY (`idAlerta`);

--
-- Indices de la tabla `tasignacion_unidad`
--
ALTER TABLE `tasignacion_unidad`
 ADD PRIMARY KEY (`id_asignacion_unidad`);

--
-- Indices de la tabla `tauxilio_vial`
--
ALTER TABLE `tauxilio_vial`
 ADD PRIMARY KEY (`id_auxilio_vial`);

--
-- Indices de la tabla `tcambiosclaveusuarios`
--
ALTER TABLE `tcambiosclaveusuarios`
 ADD PRIMARY KEY (`idCambio`), ADD KEY `fk_tcambiosclaveusuarios_usuarios1_idx` (`idUsuario`);

--
-- Indices de la tabla `tcarga`
--
ALTER TABLE `tcarga`
 ADD PRIMARY KEY (`idtcarga`);

--
-- Indices de la tabla `tchofer`
--
ALTER TABLE `tchofer`
 ADD PRIMARY KEY (`id_chofer`);

--
-- Indices de la tabla `tconfiguracion`
--
ALTER TABLE `tconfiguracion`
 ADD PRIMARY KEY (`idConfiguracion`);

--
-- Indices de la tabla `tdetalle_carga`
--
ALTER TABLE `tdetalle_carga`
 ADD PRIMARY KEY (`idtdetallecarga`);

--
-- Indices de la tabla `tdetalle_lubricante`
--
ALTER TABLE `tdetalle_lubricante`
 ADD PRIMARY KEY (`iddetalle_lubricante`);

--
-- Indices de la tabla `tdetalle_mantenimiento_correctivo`
--
ALTER TABLE `tdetalle_mantenimiento_correctivo`
 ADD PRIMARY KEY (`idtdetalle_mantenimiento_correctivo`);

--
-- Indices de la tabla `tdetalle_solicitud`
--
ALTER TABLE `tdetalle_solicitud`
 ADD PRIMARY KEY (`id_detalle_solicitud`);

--
-- Indices de la tabla `tdetalle_unidades_repuesto`
--
ALTER TABLE `tdetalle_unidades_repuesto`
 ADD PRIMARY KEY (`idrepuesto_detalle`), ADD UNIQUE KEY `idmodelo_unidad` (`idmodelo_unidad`,`id_repuesto`);

--
-- Indices de la tabla `tfalla`
--
ALTER TABLE `tfalla`
 ADD UNIQUE KEY `idfalla` (`idfalla`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
 ADD PRIMARY KEY (`idtipo_cliente`);

--
-- Indices de la tabla `tipo_contribuyente`
--
ALTER TABLE `tipo_contribuyente`
 ADD PRIMARY KEY (`idtipo_contribuyente`);

--
-- Indices de la tabla `tipo_cuenta`
--
ALTER TABLE `tipo_cuenta`
 ADD PRIMARY KEY (`idtipo_cuenta`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
 ADD PRIMARY KEY (`idtipo_producto`);

--
-- Indices de la tabla `tipo_proveedor`
--
ALTER TABLE `tipo_proveedor`
 ADD PRIMARY KEY (`idtipo_proveedor`);

--
-- Indices de la tabla `tipo_unidad`
--
ALTER TABLE `tipo_unidad`
 ADD PRIMARY KEY (`idtipo_unidad`,`tipo_unidad`), ADD KEY `fk_tipo_unidad_capacidad1_idx` (`tipo_unidad`);

--
-- Indices de la tabla `tmantenimiento`
--
ALTER TABLE `tmantenimiento`
 ADD PRIMARY KEY (`id_mantenimiento`), ADD KEY `fk_placa_unidad_225` (`placa_unidad`);

--
-- Indices de la tabla `tmantenimiento_correctivo`
--
ALTER TABLE `tmantenimiento_correctivo`
 ADD PRIMARY KEY (`idmatenimiento_correctivo`);

--
-- Indices de la tabla `tmantenimiento_preventivo`
--
ALTER TABLE `tmantenimiento_preventivo`
 ADD PRIMARY KEY (`iddetallepreventivo`);

--
-- Indices de la tabla `tmotivorazon`
--
ALTER TABLE `tmotivorazon`
 ADD PRIMARY KEY (`idMotivorazon`);

--
-- Indices de la tabla `tpreguntaseguridad`
--
ALTER TABLE `tpreguntaseguridad`
 ADD PRIMARY KEY (`idPreguntas`), ADD KEY `fk_tpreguntaseguridad_usuarios1_idx` (`idUsuario`);

--
-- Indices de la tabla `tregistro_diario`
--
ALTER TABLE `tregistro_diario`
 ADD PRIMARY KEY (`id_tregistro_diario`);

--
-- Indices de la tabla `trepuesto_lubricante`
--
ALTER TABLE `trepuesto_lubricante`
 ADD PRIMARY KEY (`id_repuesto`);

--
-- Indices de la tabla `tsolicitud`
--
ALTER TABLE `tsolicitud`
 ADD PRIMARY KEY (`nro_solicitud`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
 ADD PRIMARY KEY (`idunidad_medida`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`idusuario`,`idPerfil`), ADD KEY `fk_usuarios_cliente1_idx` (`idcliente`), ADD KEY `fk_usuarios_tperfiles1_idx` (`idPerfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion_viatico`
--
ALTER TABLE `asignacion_viatico`
MODIFY `idasignacion_viatico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
MODIFY `idbanco` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
MODIFY `IdBitacora` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT de la tabla `capacidad`
--
ALTER TABLE `capacidad`
MODIFY `idcapacidad` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `centro_costo`
--
ALTER TABLE `centro_costo`
MODIFY `idcentro_costo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
MODIFY `idciudad` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=508;
--
-- AUTO_INCREMENT de la tabla `config_respaldo`
--
ALTER TABLE `config_respaldo`
MODIFY `id_rconfig` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `detallemantenimiento`
--
ALTER TABLE `detallemantenimiento`
MODIFY `iddetallemantenimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_registrodiario`
--
ALTER TABLE `detalle_registrodiario`
MODIFY `iddetalle_registrodiario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalle_tabulador_viatico`
--
ALTER TABLE `detalle_tabulador_viatico`
MODIFY `iddet_tabulador_viatico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
MODIFY `idestado` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
MODIFY `idestatus` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
MODIFY `idfoto` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
MODIFY `idmantenimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
MODIFY `IdMenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `menu_operacion`
--
ALTER TABLE `menu_operacion`
MODIFY `IdMenu_Operacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT de la tabla `menu_submenu`
--
ALTER TABLE `menu_submenu`
MODIFY `IdMenu_Submenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `modelo_unidad`
--
ALTER TABLE `modelo_unidad`
MODIFY `idmodelo_unidad` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
MODIFY `idmunicipio` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=464;
--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
MODIFY `IdOperacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT de la tabla `orden_carga`
--
ALTER TABLE `orden_carga`
MODIFY `idorden_carga` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Debemos llamar todos los datos y verificar quien registrará el "producto"',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
MODIFY `idpais` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
MODIFY `idparroquia` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1139;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
MODIFY `IdPerfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `perfil_menu`
--
ALTER TABLE `perfil_menu`
MODIFY `IdPerfil_Menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `perfil_reporte`
--
ALTER TABLE `perfil_reporte`
MODIFY `IdPerfil_Reporte` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
MODIFY `IdPeriodo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
MODIFY `idprecio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `preventivo`
--
ALTER TABLE `preventivo`
MODIFY `idpreventivo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `recepcion_guia`
--
ALTER TABLE `recepcion_guia`
MODIFY `idrecepcion_guia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
MODIFY `idregion` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
MODIFY `IdReporte` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `respaldos`
--
ALTER TABLE `respaldos`
MODIFY `id_respaldo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
MODIFY `cod_rol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
MODIFY `idruta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `servicio_unidad`
--
ALTER TABLE `servicio_unidad`
MODIFY `idservicio_unidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
MODIFY `idsolicitud` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `solicitud_mantenimiento`
--
ALTER TABLE `solicitud_mantenimiento`
MODIFY `idsolicitud_repuesto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `solicitud_producto`
--
ALTER TABLE `solicitud_producto`
MODIFY `idsolicitud_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
MODIFY `IdSubmenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `submenu_operacion`
--
ALTER TABLE `submenu_operacion`
MODIFY `IdSubmenu_Operacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `tabulador`
--
ALTER TABLE `tabulador`
MODIFY `idtabulador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tabulador_viatico`
--
ALTER TABLE `tabulador_viatico`
MODIFY `idtabulador_viatico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `talertasoperaciones`
--
ALTER TABLE `talertasoperaciones`
MODIFY `idAlerta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `tasignacion_unidad`
--
ALTER TABLE `tasignacion_unidad`
MODIFY `id_asignacion_unidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tauxilio_vial`
--
ALTER TABLE `tauxilio_vial`
MODIFY `id_auxilio_vial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tcambiosclaveusuarios`
--
ALTER TABLE `tcambiosclaveusuarios`
MODIFY `idCambio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tcarga`
--
ALTER TABLE `tcarga`
MODIFY `idtcarga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tconfiguracion`
--
ALTER TABLE `tconfiguracion`
MODIFY `idConfiguracion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tdetalle_carga`
--
ALTER TABLE `tdetalle_carga`
MODIFY `idtdetallecarga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tdetalle_lubricante`
--
ALTER TABLE `tdetalle_lubricante`
MODIFY `iddetalle_lubricante` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tdetalle_mantenimiento_correctivo`
--
ALTER TABLE `tdetalle_mantenimiento_correctivo`
MODIFY `idtdetalle_mantenimiento_correctivo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tdetalle_solicitud`
--
ALTER TABLE `tdetalle_solicitud`
MODIFY `id_detalle_solicitud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tdetalle_unidades_repuesto`
--
ALTER TABLE `tdetalle_unidades_repuesto`
MODIFY `idrepuesto_detalle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `tfalla`
--
ALTER TABLE `tfalla`
MODIFY `idfalla` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
MODIFY `idtipo_cliente` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_contribuyente`
--
ALTER TABLE `tipo_contribuyente`
MODIFY `idtipo_contribuyente` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_cuenta`
--
ALTER TABLE `tipo_cuenta`
MODIFY `idtipo_cuenta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
MODIFY `idtipo_producto` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_proveedor`
--
ALTER TABLE `tipo_proveedor`
MODIFY `idtipo_proveedor` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_unidad`
--
ALTER TABLE `tipo_unidad`
MODIFY `idtipo_unidad` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tmantenimiento`
--
ALTER TABLE `tmantenimiento`
MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmantenimiento_correctivo`
--
ALTER TABLE `tmantenimiento_correctivo`
MODIFY `idmatenimiento_correctivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmantenimiento_preventivo`
--
ALTER TABLE `tmantenimiento_preventivo`
MODIFY `iddetallepreventivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmotivorazon`
--
ALTER TABLE `tmotivorazon`
MODIFY `idMotivorazon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tpreguntaseguridad`
--
ALTER TABLE `tpreguntaseguridad`
MODIFY `idPreguntas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT de la tabla `tregistro_diario`
--
ALTER TABLE `tregistro_diario`
MODIFY `id_tregistro_diario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `trepuesto_lubricante`
--
ALTER TABLE `trepuesto_lubricante`
MODIFY `id_repuesto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tsolicitud`
--
ALTER TABLE `tsolicitud`
MODIFY `nro_solicitud` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
MODIFY `idunidad_medida` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
