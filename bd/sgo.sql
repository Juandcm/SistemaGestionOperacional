-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2020 a las 07:40:20
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculos_tabla10`
--

CREATE TABLE `calculos_tabla10` (
  `accion_id` int(11) NOT NULL,
  `lect1_condc1` varchar(45) DEFAULT NULL,
  `lect2_condc1` varchar(45) DEFAULT NULL,
  `lect3_condc1` varchar(45) DEFAULT NULL,
  `lect4_condc1` varchar(45) DEFAULT NULL,
  `lect1_condc2` varchar(45) DEFAULT NULL,
  `lect2_condc2` varchar(45) DEFAULT NULL,
  `lect3_condc2` varchar(45) DEFAULT NULL,
  `lect4_condc2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calculos_tabla10`
--

INSERT INTO `calculos_tabla10` (`accion_id`, `lect1_condc1`, `lect2_condc1`, `lect3_condc1`, `lect4_condc1`, `lect1_condc2`, `lect2_condc2`, `lect3_condc2`, `lect4_condc2`) VALUES
(1, '38725.80', '38.56108', '48.99790', '0', '38725.91', '38.002372', '46.97000', '0'),
(2, '38733.32', '38.571032', '42.69536', '0', '38733.52', '38.57132', '42.69564', '0'),
(3, '0.00', '0', '0', '0', '0', '0', '0', '0'),
(4, '0', '0', '0', '0', '0', '0', '0', '0'),
(5, '0', '0', '0', '0', '0', '0', '0', '0'),
(6, '0', '0', '0', '0', '0', '0', '0', '0'),
(7, '0', '0', '0', '0', '0', '0', '0', '0'),
(8, '0', '0', '0', '0', '0', '0', '0', '0'),
(9, '0', '0', '0', '0', '0', '0', '0', '0'),
(10, '0', '0', '0', '0', '0', '0', '0', '0'),
(11, '38733.32', '39.571032', '43.695360', '0', '38733.52', '39.57132', '42.69564', '0'),
(12, '0', '0', '0', '0', '0', '0', '0', '0'),
(13, '0', '0', '0', '0', '0', '0', '0', '0'),
(14, '0', '0', '0', '0', '0', '0', '0', '0'),
(15, '0', '0', '0', '0', '0', '0', '0', '0'),
(16, '0', '0', '0', '0', '0', '0', '0', '0'),
(17, '0', '0', '0', '0', '0', '0', '0', '0'),
(18, '0', '0', '0', '0', '0', '0', '0', '0'),
(19, '0', '0', '0', '0', '0', '0', '0', '0'),
(20, '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `log_tabla` varchar(45) DEFAULT NULL COMMENT 'tabla donde se hizo el registro, actualizacion o eliminacion',
  `log_tipo` varchar(45) DEFAULT NULL COMMENT 'tipo de evento como registro, actualizacion o eliminacion',
  `log_fecha` datetime DEFAULT NULL COMMENT 'fecha del log',
  `log_id_referencia` int(11) NOT NULL COMMENT 'id de la tabla referenciada',
  `usuario_id` int(11) NOT NULL COMMENT 'usuario que hizo el evento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`log_id`, `log_tabla`, `log_tipo`, `log_fecha`, `log_id_referencia`, `usuario_id`) VALUES
(1, 'novedades', 'registro', '2020-06-12 13:45:01', 1, 5),
(2, 'novedades', 'editado', '2020-06-12 13:45:38', 1, 5),
(3, 'tabla1_area1', 'registro del usuario', '2020-06-12 13:22:45', 1, 5),
(4, 'tabla1_area2', 'registro del usuario', '2020-06-12 13:22:45', 1, 5),
(5, 'tabla1_area3', 'registro del usuario', '2020-06-12 13:22:45', 1, 5),
(6, 'tabla2_area1', 'registro del usuario', '2020-06-12 13:23:20', 1, 5),
(7, 'tabla2_area2', 'registro del usuario', '2020-06-12 13:23:20', 1, 5),
(8, 'tabla2_area3', 'registro del usuario', '2020-06-12 13:23:20', 1, 5),
(9, 'tabla2_area4', 'registro del usuario', '2020-06-12 13:23:20', 1, 5),
(10, 'tabla2_area1', 'editado', '2020-06-12 13:26:09', 1, 5),
(11, 'tabla3_area1', 'registro del usuario', '2020-06-12 13:27:17', 1, 5),
(12, 'tabla3_area2', 'registro del usuario', '2020-06-12 13:27:17', 1, 5),
(13, 'tabla4_area1', 'registro del usuario', '2020-06-12 13:27:44', 1, 5),
(14, 'tabla4_area2', 'registro del usuario', '2020-06-12 13:27:44', 1, 5),
(15, 'tabla5_area1', 'registro del usuario', '2020-06-12 13:28:17', 1, 5),
(16, 'tabla5_area2', 'registro del usuario', '2020-06-12 13:28:17', 1, 5),
(17, 'tabla5_area3', 'registro del usuario', '2020-06-12 13:28:17', 1, 5),
(18, 'tabla5_area4', 'registro del usuario', '2020-06-12 13:28:17', 1, 5),
(19, 'tabla6_area1', 'registro del usuario', '2020-06-12 13:30:33', 1, 5),
(20, 'tabla1_area1', 'registro del sistema', '2020-06-12 14:00:00', 2, 5),
(21, 'tabla1_area2', 'registro del sistema', '2020-06-12 14:00:00', 2, 5),
(22, 'tabla1_area3', 'registro del sistema', '2020-06-12 14:00:00', 2, 5),
(23, 'tabla2_area1', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(24, 'tabla2_area2', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(25, 'tabla2_area3', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(26, 'tabla2_area4', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(27, 'tabla3_area1', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(28, 'tabla3_area2', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(29, 'tabla4_area1', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(30, 'tabla4_area2', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(31, 'tabla5_area1', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(32, 'tabla5_area2', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(33, 'tabla5_area3', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(34, 'tabla5_area4', 'registro del sistema', '2020-06-12 14:00:01', 2, 5),
(35, 'tabla1_area1', 'registro del usuario', '2020-06-12 14:04:14', 2, 5),
(36, 'tabla1_area2', 'registro del usuario', '2020-06-12 14:04:14', 2, 5),
(37, 'tabla1_area3', 'registro del usuario', '2020-06-12 14:04:14', 2, 5),
(38, 'tabla1_area2', 'editado', '2020-06-12 14:13:40', 2, 5),
(39, 'tabla5_area2', 'editado', '2020-06-12 14:45:52', 2, 5),
(40, 'tabla5_area2', 'editado', '2020-06-12 14:46:47', 2, 5),
(41, 'tabla1_area1', 'registro del sistema', '2020-06-12 15:00:00', 3, 5),
(42, 'tabla1_area2', 'registro del sistema', '2020-06-12 15:00:00', 3, 5),
(43, 'tabla1_area3', 'registro del sistema', '2020-06-12 15:00:00', 3, 5),
(44, 'tabla2_area1', 'registro del sistema', '2020-06-12 15:00:00', 3, 5),
(45, 'tabla2_area2', 'registro del sistema', '2020-06-12 15:00:00', 3, 5),
(46, 'tabla2_area3', 'registro del sistema', '2020-06-12 15:00:00', 3, 5),
(47, 'tabla2_area4', 'registro del sistema', '2020-06-12 15:00:00', 3, 5),
(48, 'tabla3_area1', 'registro del sistema', '2020-06-12 15:00:00', 3, 5),
(49, 'tabla3_area2', 'registro del sistema', '2020-06-12 15:00:00', 3, 5),
(50, 'tabla4_area1', 'registro del sistema', '2020-06-12 15:00:01', 3, 5),
(51, 'tabla4_area2', 'registro del sistema', '2020-06-12 15:00:01', 3, 5),
(52, 'tabla5_area1', 'registro del sistema', '2020-06-12 15:00:01', 3, 5),
(53, 'tabla5_area2', 'registro del sistema', '2020-06-12 15:00:01', 3, 5),
(54, 'tabla5_area3', 'registro del sistema', '2020-06-12 15:00:01', 3, 5),
(55, 'tabla5_area4', 'registro del sistema', '2020-06-12 15:00:01', 3, 5),
(56, 'tabla1_area1', 'registro del sistema', '2020-06-12 16:00:00', 4, 5),
(57, 'tabla1_area2', 'registro del sistema', '2020-06-12 16:00:00', 4, 5),
(58, 'tabla1_area3', 'registro del sistema', '2020-06-12 16:00:00', 4, 5),
(59, 'tabla2_area1', 'registro del sistema', '2020-06-12 16:00:00', 4, 5),
(60, 'tabla2_area2', 'registro del sistema', '2020-06-12 16:00:00', 4, 5),
(61, 'tabla2_area3', 'registro del sistema', '2020-06-12 16:00:00', 4, 5),
(62, 'tabla2_area4', 'registro del sistema', '2020-06-12 16:00:00', 4, 5),
(63, 'tabla3_area1', 'registro del sistema', '2020-06-12 16:00:00', 4, 5),
(64, 'tabla3_area2', 'registro del sistema', '2020-06-12 16:00:00', 4, 5),
(65, 'tabla4_area1', 'registro del sistema', '2020-06-12 16:00:01', 4, 5),
(66, 'tabla4_area2', 'registro del sistema', '2020-06-12 16:00:01', 4, 5),
(67, 'tabla5_area1', 'registro del sistema', '2020-06-12 16:00:01', 4, 5),
(68, 'tabla5_area2', 'registro del sistema', '2020-06-12 16:00:01', 4, 5),
(69, 'tabla5_area3', 'registro del sistema', '2020-06-12 16:00:01', 4, 5),
(70, 'tabla5_area4', 'registro del sistema', '2020-06-12 16:00:01', 4, 5),
(71, 'tabla1_area1', 'registro del sistema', '2020-06-12 17:00:01', 5, 2),
(72, 'tabla1_area2', 'registro del sistema', '2020-06-12 17:00:01', 5, 2),
(73, 'tabla1_area3', 'registro del sistema', '2020-06-12 17:00:01', 5, 2),
(74, 'tabla2_area1', 'registro del sistema', '2020-06-12 17:00:02', 5, 2),
(75, 'tabla2_area2', 'registro del sistema', '2020-06-12 17:00:02', 5, 2),
(76, 'tabla2_area3', 'registro del sistema', '2020-06-12 17:00:02', 5, 2),
(77, 'tabla2_area4', 'registro del sistema', '2020-06-12 17:00:02', 5, 2),
(78, 'tabla3_area1', 'registro del sistema', '2020-06-12 17:00:02', 5, 2),
(79, 'tabla3_area2', 'registro del sistema', '2020-06-12 17:00:02', 5, 2),
(80, 'tabla4_area1', 'registro del sistema', '2020-06-12 17:00:02', 5, 2),
(81, 'tabla4_area2', 'registro del sistema', '2020-06-12 17:00:02', 5, 2),
(82, 'tabla5_area1', 'registro del sistema', '2020-06-12 17:00:03', 5, 2),
(83, 'tabla5_area2', 'registro del sistema', '2020-06-12 17:00:03', 5, 2),
(84, 'tabla5_area3', 'registro del sistema', '2020-06-12 17:00:03', 5, 2),
(85, 'tabla5_area4', 'registro del sistema', '2020-06-12 17:00:03', 5, 2),
(86, 'tabla1_area1', 'registro del usuario', '2020-06-12 17:16:42', 5, 2),
(87, 'tabla1_area2', 'registro del usuario', '2020-06-12 17:16:42', 5, 2),
(88, 'tabla1_area3', 'registro del usuario', '2020-06-12 17:16:42', 5, 2),
(89, 'tabla1_area1', 'registro del sistema', '2020-06-12 18:00:01', 6, 2),
(90, 'tabla1_area2', 'registro del sistema', '2020-06-12 18:00:01', 6, 2),
(91, 'tabla1_area3', 'registro del sistema', '2020-06-12 18:00:01', 6, 2),
(92, 'tabla2_area1', 'registro del sistema', '2020-06-12 18:00:01', 6, 2),
(93, 'tabla2_area2', 'registro del sistema', '2020-06-12 18:00:01', 6, 2),
(94, 'tabla2_area3', 'registro del sistema', '2020-06-12 18:00:01', 6, 2),
(95, 'tabla2_area4', 'registro del sistema', '2020-06-12 18:00:01', 6, 2),
(96, 'tabla3_area1', 'registro del sistema', '2020-06-12 18:00:01', 6, 2),
(97, 'tabla3_area2', 'registro del sistema', '2020-06-12 18:00:01', 6, 2),
(98, 'tabla4_area1', 'registro del sistema', '2020-06-12 18:00:02', 6, 2),
(99, 'tabla4_area2', 'registro del sistema', '2020-06-12 18:00:02', 6, 2),
(100, 'tabla5_area1', 'registro del sistema', '2020-06-12 18:00:03', 6, 2),
(101, 'tabla5_area2', 'registro del sistema', '2020-06-12 18:00:03', 6, 2),
(102, 'tabla5_area3', 'registro del sistema', '2020-06-12 18:00:03', 6, 2),
(103, 'tabla5_area4', 'registro del sistema', '2020-06-12 18:00:03', 6, 2),
(104, 'tabla1_area1', 'registro del sistema', '2020-06-12 19:00:01', 7, 2),
(105, 'tabla1_area2', 'registro del sistema', '2020-06-12 19:00:01', 7, 2),
(106, 'tabla1_area3', 'registro del sistema', '2020-06-12 19:00:01', 7, 2),
(107, 'tabla2_area1', 'registro del sistema', '2020-06-12 19:00:01', 7, 2),
(108, 'tabla2_area2', 'registro del sistema', '2020-06-12 19:00:01', 7, 2),
(109, 'tabla2_area3', 'registro del sistema', '2020-06-12 19:00:01', 7, 2),
(110, 'tabla2_area4', 'registro del sistema', '2020-06-12 19:00:01', 7, 2),
(111, 'tabla3_area1', 'registro del sistema', '2020-06-12 19:00:02', 7, 2),
(112, 'tabla3_area2', 'registro del sistema', '2020-06-12 19:00:02', 7, 2),
(113, 'tabla4_area1', 'registro del sistema', '2020-06-12 19:00:02', 7, 2),
(114, 'tabla4_area2', 'registro del sistema', '2020-06-12 19:00:02', 7, 2),
(115, 'tabla5_area1', 'registro del sistema', '2020-06-12 19:00:02', 7, 2),
(116, 'tabla5_area2', 'registro del sistema', '2020-06-12 19:00:02', 7, 2),
(117, 'tabla5_area3', 'registro del sistema', '2020-06-12 19:00:02', 7, 2),
(118, 'tabla5_area4', 'registro del sistema', '2020-06-12 19:00:02', 7, 2),
(119, 'tabla2_area1', 'registro del usuario', '2020-06-12 19:11:53', 7, 2),
(120, 'tabla2_area2', 'registro del usuario', '2020-06-12 19:11:53', 7, 2),
(121, 'tabla2_area3', 'registro del usuario', '2020-06-12 19:11:53', 7, 2),
(122, 'tabla2_area4', 'registro del usuario', '2020-06-12 19:11:53', 7, 2),
(123, 'tabla3_area1', 'registro del usuario', '2020-06-12 19:18:11', 7, 2),
(124, 'tabla3_area2', 'registro del usuario', '2020-06-12 19:18:11', 7, 2),
(125, 'tabla1_area1', 'registro del sistema', '2020-06-12 20:00:01', 8, 2),
(126, 'tabla1_area2', 'registro del sistema', '2020-06-12 20:00:01', 8, 2),
(127, 'tabla1_area3', 'registro del sistema', '2020-06-12 20:00:01', 8, 2),
(128, 'tabla2_area1', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(129, 'tabla2_area2', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(130, 'tabla2_area3', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(131, 'tabla2_area4', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(132, 'tabla3_area1', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(133, 'tabla3_area2', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(134, 'tabla4_area1', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(135, 'tabla4_area2', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(136, 'tabla5_area1', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(137, 'tabla5_area2', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(138, 'tabla5_area3', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(139, 'tabla5_area4', 'registro del sistema', '2020-06-12 20:00:02', 8, 2),
(140, 'tabla1_area1', 'registro del sistema', '2020-06-12 21:00:01', 9, 5),
(141, 'tabla1_area2', 'registro del sistema', '2020-06-12 21:00:01', 9, 5),
(142, 'tabla1_area3', 'registro del sistema', '2020-06-12 21:00:01', 9, 5),
(143, 'tabla2_area1', 'registro del sistema', '2020-06-12 21:00:01', 9, 5),
(144, 'tabla2_area2', 'registro del sistema', '2020-06-12 21:00:01', 9, 5),
(145, 'tabla2_area3', 'registro del sistema', '2020-06-12 21:00:01', 9, 5),
(146, 'tabla2_area4', 'registro del sistema', '2020-06-12 21:00:01', 9, 5),
(147, 'tabla3_area1', 'registro del sistema', '2020-06-12 21:00:02', 9, 5),
(148, 'tabla3_area2', 'registro del sistema', '2020-06-12 21:00:02', 9, 5),
(149, 'tabla4_area1', 'registro del sistema', '2020-06-12 21:00:02', 9, 5),
(150, 'tabla4_area2', 'registro del sistema', '2020-06-12 21:00:02', 9, 5),
(151, 'tabla5_area1', 'registro del sistema', '2020-06-12 21:00:02', 9, 5),
(152, 'tabla5_area2', 'registro del sistema', '2020-06-12 21:00:02', 9, 5),
(153, 'tabla5_area3', 'registro del sistema', '2020-06-12 21:00:02', 9, 5),
(154, 'tabla5_area4', 'registro del sistema', '2020-06-12 21:00:02', 9, 5),
(155, 'tabla1_area1', 'registro del sistema', '2020-06-12 22:00:00', 10, 5),
(156, 'tabla1_area2', 'registro del sistema', '2020-06-12 22:00:00', 10, 5),
(157, 'tabla1_area3', 'registro del sistema', '2020-06-12 22:00:00', 10, 5),
(158, 'tabla2_area1', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(159, 'tabla2_area2', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(160, 'tabla2_area3', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(161, 'tabla2_area4', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(162, 'tabla3_area1', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(163, 'tabla3_area2', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(164, 'tabla4_area1', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(165, 'tabla4_area2', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(166, 'tabla5_area1', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(167, 'tabla5_area2', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(168, 'tabla5_area3', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(169, 'tabla5_area4', 'registro del sistema', '2020-06-12 22:00:01', 10, 5),
(170, 'tabla1_area1', 'registro del sistema', '2020-06-12 23:00:01', 11, 5),
(171, 'tabla1_area2', 'registro del sistema', '2020-06-12 23:00:01', 11, 5),
(172, 'tabla1_area3', 'registro del sistema', '2020-06-12 23:00:01', 11, 5),
(173, 'tabla2_area1', 'registro del sistema', '2020-06-12 23:00:01', 11, 5),
(174, 'tabla2_area2', 'registro del sistema', '2020-06-12 23:00:01', 11, 5),
(175, 'tabla2_area3', 'registro del sistema', '2020-06-12 23:00:01', 11, 5),
(176, 'tabla2_area4', 'registro del sistema', '2020-06-12 23:00:01', 11, 5),
(177, 'tabla3_area1', 'registro del sistema', '2020-06-12 23:00:02', 11, 5),
(178, 'tabla3_area2', 'registro del sistema', '2020-06-12 23:00:02', 11, 5),
(179, 'tabla4_area1', 'registro del sistema', '2020-06-12 23:00:02', 11, 5),
(180, 'tabla4_area2', 'registro del sistema', '2020-06-12 23:00:02', 11, 5),
(181, 'tabla5_area1', 'registro del sistema', '2020-06-12 23:00:03', 11, 5),
(182, 'tabla5_area2', 'registro del sistema', '2020-06-12 23:00:03', 11, 5),
(183, 'tabla5_area3', 'registro del sistema', '2020-06-12 23:00:03', 11, 5),
(184, 'tabla5_area4', 'registro del sistema', '2020-06-12 23:00:03', 11, 5),
(185, 'tabla1_area1', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(186, 'tabla1_area2', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(187, 'tabla1_area3', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(188, 'tabla2_area1', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(189, 'tabla2_area2', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(190, 'tabla2_area3', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(191, 'tabla2_area4', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(192, 'tabla3_area1', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(193, 'tabla3_area2', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(194, 'tabla4_area1', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(195, 'tabla4_area2', 'registro del sistema', '2020-06-12 23:00:04', 12, 5),
(196, 'tabla5_area1', 'registro del sistema', '2020-06-12 23:00:05', 12, 5),
(197, 'tabla5_area2', 'registro del sistema', '2020-06-12 23:00:05', 12, 5),
(198, 'tabla5_area3', 'registro del sistema', '2020-06-12 23:00:05', 12, 5),
(199, 'tabla5_area4', 'registro del sistema', '2020-06-12 23:00:05', 12, 5),
(200, 'tabla1_area1', 'registro del sistema', '2020-06-13 00:00:00', 13, 5),
(201, 'tabla1_area2', 'registro del sistema', '2020-06-13 00:00:00', 13, 5),
(202, 'tabla1_area3', 'registro del sistema', '2020-06-13 00:00:00', 13, 5),
(203, 'tabla2_area1', 'registro del sistema', '2020-06-13 00:00:01', 13, 5),
(204, 'tabla2_area2', 'registro del sistema', '2020-06-13 00:00:01', 13, 5),
(205, 'tabla2_area3', 'registro del sistema', '2020-06-13 00:00:01', 13, 5),
(206, 'tabla2_area4', 'registro del sistema', '2020-06-13 00:00:01', 13, 5),
(207, 'tabla3_area1', 'registro del sistema', '2020-06-13 00:00:01', 13, 5),
(208, 'tabla3_area2', 'registro del sistema', '2020-06-13 00:00:01', 13, 5),
(209, 'tabla4_area1', 'registro del sistema', '2020-06-13 00:00:01', 13, 5),
(210, 'tabla4_area2', 'registro del sistema', '2020-06-13 00:00:01', 13, 5),
(211, 'tabla5_area1', 'registro del sistema', '2020-06-13 00:00:02', 13, 5),
(212, 'tabla5_area2', 'registro del sistema', '2020-06-13 00:00:02', 13, 5),
(213, 'tabla5_area3', 'registro del sistema', '2020-06-13 00:00:02', 13, 5),
(214, 'tabla5_area4', 'registro del sistema', '2020-06-13 00:00:02', 13, 5),
(215, 'tabla1_area1', 'registro del sistema', '2020-06-13 01:00:00', 14, 5),
(216, 'tabla1_area2', 'registro del sistema', '2020-06-13 01:00:00', 14, 5),
(217, 'tabla1_area3', 'registro del sistema', '2020-06-13 01:00:00', 14, 5),
(218, 'tabla2_area1', 'registro del sistema', '2020-06-13 01:00:01', 14, 5),
(219, 'tabla2_area2', 'registro del sistema', '2020-06-13 01:00:01', 14, 5),
(220, 'tabla2_area3', 'registro del sistema', '2020-06-13 01:00:01', 14, 5),
(221, 'tabla2_area4', 'registro del sistema', '2020-06-13 01:00:01', 14, 5),
(222, 'tabla3_area1', 'registro del sistema', '2020-06-13 01:00:01', 14, 5),
(223, 'tabla3_area2', 'registro del sistema', '2020-06-13 01:00:01', 14, 5),
(224, 'tabla4_area1', 'registro del sistema', '2020-06-13 01:00:02', 14, 5),
(225, 'tabla4_area2', 'registro del sistema', '2020-06-13 01:00:02', 14, 5),
(226, 'tabla5_area1', 'registro del sistema', '2020-06-13 01:00:02', 14, 5),
(227, 'tabla5_area2', 'registro del sistema', '2020-06-13 01:00:02', 14, 5),
(228, 'tabla5_area3', 'registro del sistema', '2020-06-13 01:00:02', 14, 5),
(229, 'tabla5_area4', 'registro del sistema', '2020-06-13 01:00:02', 14, 5),
(230, 'tabla6_area1', 'editado', '2020-06-13 01:56:08', 1, 5),
(231, 'tabla6_area1', 'registro del usuario', '2020-06-13 01:59:02', 3, 5),
(232, 'tabla1_area1', 'registro del sistema', '2020-06-13 02:00:00', 15, 5),
(233, 'tabla1_area2', 'registro del sistema', '2020-06-13 02:00:00', 15, 5),
(234, 'tabla1_area3', 'registro del sistema', '2020-06-13 02:00:00', 15, 5),
(235, 'tabla2_area1', 'registro del sistema', '2020-06-13 02:00:01', 15, 5),
(236, 'tabla2_area2', 'registro del sistema', '2020-06-13 02:00:01', 15, 5),
(237, 'tabla2_area3', 'registro del sistema', '2020-06-13 02:00:01', 15, 5),
(238, 'tabla2_area4', 'registro del sistema', '2020-06-13 02:00:01', 15, 5),
(239, 'tabla3_area1', 'registro del sistema', '2020-06-13 02:00:01', 15, 5),
(240, 'tabla3_area2', 'registro del sistema', '2020-06-13 02:00:01', 15, 5),
(241, 'tabla4_area1', 'registro del sistema', '2020-06-13 02:00:02', 15, 5),
(242, 'tabla4_area2', 'registro del sistema', '2020-06-13 02:00:02', 15, 5),
(243, 'tabla5_area1', 'registro del sistema', '2020-06-13 02:00:02', 15, 5),
(244, 'tabla5_area2', 'registro del sistema', '2020-06-13 02:00:02', 15, 5),
(245, 'tabla5_area3', 'registro del sistema', '2020-06-13 02:00:02', 15, 5),
(246, 'tabla5_area4', 'registro del sistema', '2020-06-13 02:00:02', 15, 5),
(247, 'tabla1_area1', 'registro del sistema', '2020-06-12 13:00:00', 16, 5),
(248, 'tabla1_area2', 'registro del sistema', '2020-06-12 13:00:00', 16, 5),
(249, 'tabla1_area3', 'registro del sistema', '2020-06-12 13:00:00', 16, 5),
(250, 'tabla2_area1', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(251, 'tabla2_area2', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(252, 'tabla2_area3', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(253, 'tabla2_area4', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(254, 'tabla3_area1', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(255, 'tabla3_area2', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(256, 'tabla4_area1', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(257, 'tabla4_area2', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(258, 'tabla5_area1', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(259, 'tabla5_area2', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(260, 'tabla5_area3', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(261, 'tabla5_area4', 'registro del sistema', '2020-06-12 13:00:01', 16, 5),
(265, 'tabla1_area1', 'registro del sistema', '2020-06-13 00:00:00', 18, 5),
(266, 'tabla1_area2', 'registro del sistema', '2020-06-13 00:00:00', 18, 5),
(267, 'tabla1_area3', 'registro del sistema', '2020-06-13 00:00:00', 18, 5),
(268, 'tabla2_area1', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(269, 'tabla2_area2', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(270, 'tabla2_area3', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(271, 'tabla2_area4', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(272, 'tabla3_area1', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(273, 'tabla3_area2', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(274, 'tabla4_area1', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(275, 'tabla4_area2', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(276, 'tabla5_area1', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(277, 'tabla5_area2', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(278, 'tabla5_area3', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(279, 'tabla5_area4', 'registro del sistema', '2020-06-13 00:00:00', 17, 5),
(280, 'tabla1_area1', 'registro del sistema', '2020-06-13 01:00:01', 19, 5),
(281, 'tabla1_area2', 'registro del sistema', '2020-06-13 01:00:01', 19, 5),
(282, 'tabla1_area3', 'registro del sistema', '2020-06-13 01:00:01', 19, 5),
(283, 'tabla2_area1', 'registro del sistema', '2020-06-13 01:00:01', 18, 5),
(284, 'tabla2_area2', 'registro del sistema', '2020-06-13 01:00:01', 18, 5),
(285, 'tabla2_area3', 'registro del sistema', '2020-06-13 01:00:01', 18, 5),
(286, 'tabla2_area4', 'registro del sistema', '2020-06-13 01:00:01', 18, 5),
(287, 'tabla3_area1', 'registro del sistema', '2020-06-13 01:00:02', 18, 5),
(288, 'tabla3_area2', 'registro del sistema', '2020-06-13 01:00:02', 18, 5),
(289, 'tabla4_area1', 'registro del sistema', '2020-06-13 01:00:02', 18, 5),
(290, 'tabla4_area2', 'registro del sistema', '2020-06-13 01:00:02', 18, 5),
(291, 'tabla5_area1', 'registro del sistema', '2020-06-13 01:00:02', 18, 5),
(292, 'tabla5_area2', 'registro del sistema', '2020-06-13 01:00:02', 18, 5),
(293, 'tabla5_area3', 'registro del sistema', '2020-06-13 01:00:02', 18, 5),
(294, 'tabla5_area4', 'registro del sistema', '2020-06-13 01:00:02', 18, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `novedad_id` int(11) NOT NULL,
  `novedad_descripcion` text,
  `novedad_prioridad` enum('0','1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`novedad_id`, `novedad_descripcion`, `novedad_prioridad`) VALUES
(1, 'hay una novedad hoy', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1_area1`
--

CREATE TABLE `tabla1_area1` (
  `tabla1_area1_id` int(11) NOT NULL,
  `equipo1_tab1_area_1` varchar(45) DEFAULT NULL,
  `equipo2_tab1_area_1` varchar(45) DEFAULT NULL,
  `fecha_tab1_area1` datetime DEFAULT NULL,
  `status_tab1_area1` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla1_area1`
--

INSERT INTO `tabla1_area1` (`tabla1_area1_id`, `equipo1_tab1_area_1`, `equipo2_tab1_area_1`, `fecha_tab1_area1`, `status_tab1_area1`) VALUES
(1, '12', '13', '2020-06-12 13:22:45', '1'),
(2, '4', '3', '2020-06-12 14:04:14', '1'),
(3, '4', '3', '2020-06-12 15:00:00', '1'),
(4, '4', '3', '2020-06-12 16:00:00', '1'),
(5, '4', '3', '2020-06-12 17:16:42', '1'),
(6, '4', '3', '2020-06-12 18:00:00', '1'),
(7, '4', '3', '2020-06-12 19:00:01', '1'),
(8, '4', '3', '2020-06-12 20:00:01', '1'),
(9, '4', '3', '2020-06-12 21:00:01', '1'),
(10, '4', '3', '2020-06-12 22:00:00', '1'),
(11, '4', '3', '2020-06-12 23:00:00', '1'),
(18, '4', '3', '2020-06-13 00:00:00', '1'),
(19, '4', '3', '2020-06-13 01:00:01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1_area2`
--

CREATE TABLE `tabla1_area2` (
  `tabla1_area2_id` int(11) NOT NULL,
  `equipo1_tab1_area_2` varchar(45) DEFAULT NULL,
  `equipo2_tab1_area_2` varchar(45) DEFAULT NULL,
  `equipo3_tab1_area_2` varchar(45) DEFAULT NULL,
  `equipo4_tab1_area_2` varchar(45) DEFAULT NULL,
  `equipo5_tab1_area_2` varchar(45) DEFAULT NULL,
  `equipo6_tab1_area_2` varchar(45) DEFAULT NULL,
  `fecha_tab1_area2` datetime DEFAULT NULL,
  `status_tab1_area2` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 DELAY_KEY_WRITE=1;

--
-- Volcado de datos para la tabla `tabla1_area2`
--

INSERT INTO `tabla1_area2` (`tabla1_area2_id`, `equipo1_tab1_area_2`, `equipo2_tab1_area_2`, `equipo3_tab1_area_2`, `equipo4_tab1_area_2`, `equipo5_tab1_area_2`, `equipo6_tab1_area_2`, `fecha_tab1_area2`, `status_tab1_area2`) VALUES
(1, '45', '37', '31', '31', '4', '3', '2020-06-12 13:22:45', '1'),
(2, '3', '5', '22', '5', '4', '5', '2020-06-12 14:04:14', '1'),
(3, '3', '5', '22', '5', '4', '5', '2020-06-12 15:00:00', '1'),
(4, '3', '5', '22', '5', '4', '5', '2020-06-12 16:00:00', '1'),
(5, '3', '5', '22', '5', '4', '5', '2020-06-12 17:16:42', '1'),
(6, '3', '5', '22', '5', '4', '5', '2020-06-12 18:00:00', '1'),
(7, '3', '5', '22', '5', '4', '5', '2020-06-12 19:00:01', '1'),
(8, '3', '5', '22', '5', '4', '5', '2020-06-12 20:00:01', '1'),
(9, '3', '5', '22', '5', '4', '5', '2020-06-12 21:00:01', '1'),
(10, '3', '5', '22', '5', '4', '5', '2020-06-12 22:00:00', '1'),
(11, '3', '5', '22', '5', '4', '5', '2020-06-12 23:00:00', '1'),
(18, '3', '5', '22', '5', '4', '5', '2020-06-13 00:00:00', '1'),
(19, '3', '5', '22', '5', '4', '5', '2020-06-13 01:00:01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1_area3`
--

CREATE TABLE `tabla1_area3` (
  `tabla1_area3_id` int(11) NOT NULL,
  `equipo1_tab1_area_3` varchar(45) DEFAULT NULL,
  `equipo2_tab1_area_3` varchar(45) DEFAULT NULL,
  `equipo3_tab1_area_3` varchar(45) DEFAULT NULL,
  `equipo4_tab1_area_3` varchar(45) DEFAULT NULL,
  `equipo5_tab1_area_3` varchar(45) DEFAULT NULL,
  `fecha_tab1_area3` datetime DEFAULT NULL,
  `status_tab1_area3` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla1_area3`
--

INSERT INTO `tabla1_area3` (`tabla1_area3_id`, `equipo1_tab1_area_3`, `equipo2_tab1_area_3`, `equipo3_tab1_area_3`, `equipo4_tab1_area_3`, `equipo5_tab1_area_3`, `fecha_tab1_area3`, `status_tab1_area3`) VALUES
(1, '54', '23', '4', '4', '7', '2020-06-12 13:22:45', '1'),
(2, '5', '6', '7', '8', '6', '2020-06-12 14:04:14', '1'),
(3, '5', '6', '7', '8', '6', '2020-06-12 15:00:00', '1'),
(4, '5', '6', '7', '8', '6', '2020-06-12 16:00:00', '1'),
(5, '5', '6', '7', '8', '6', '2020-06-12 17:16:42', '1'),
(6, '5', '6', '7', '8', '6', '2020-06-12 18:00:00', '1'),
(7, '5', '6', '7', '8', '6', '2020-06-12 19:00:01', '1'),
(8, '5', '6', '7', '8', '6', '2020-06-12 20:00:01', '1'),
(9, '5', '6', '7', '8', '6', '2020-06-12 21:00:01', '1'),
(10, '5', '6', '7', '8', '6', '2020-06-12 22:00:00', '1'),
(11, '5', '6', '7', '8', '6', '2020-06-12 23:00:00', '1'),
(18, '5', '6', '7', '8', '6', '2020-06-13 00:00:00', '1'),
(19, '5', '6', '7', '8', '6', '2020-06-13 01:00:01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2_area1`
--

CREATE TABLE `tabla2_area1` (
  `tabla2_area1_id` int(11) NOT NULL,
  `equipo1_tab2_area_1` varchar(45) DEFAULT NULL,
  `equipo2_tab2_area_1` varchar(45) DEFAULT NULL,
  `equipo3_tab2_area_1` varchar(45) DEFAULT NULL,
  `fecha_tab2_area1` datetime DEFAULT NULL,
  `status_tab2_area1` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla2_area1`
--

INSERT INTO `tabla2_area1` (`tabla2_area1_id`, `equipo1_tab2_area_1`, `equipo2_tab2_area_1`, `equipo3_tab2_area_1`, `fecha_tab2_area1`, `status_tab2_area1`) VALUES
(1, '23', '112', '3', '2020-06-12 13:23:19', '1'),
(2, '23', '112', '3', '2020-06-12 14:00:00', '1'),
(3, '23', '112', '3', '2020-06-12 15:00:00', '1'),
(4, '23', '112', '3', '2020-06-12 16:00:00', '1'),
(5, '23', '112', '3', '2020-06-12 17:00:01', '1'),
(6, '23', '112', '3', '2020-06-12 18:00:01', '1'),
(7, '75', '75', '75', '2020-06-12 19:11:53', '1'),
(8, '75', '75', '75', '2020-06-12 20:00:01', '1'),
(9, '75', '75', '75', '2020-06-12 21:00:01', '1'),
(10, '75', '75', '75', '2020-06-12 22:00:00', '1'),
(11, '75', '75', '75', '2020-06-12 23:00:01', '1'),
(17, '75', '75', '75', '2020-06-13 00:00:00', '1'),
(18, '75', '75', '75', '2020-06-13 01:00:01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2_area2`
--

CREATE TABLE `tabla2_area2` (
  `tabla2_area2_id` int(11) NOT NULL,
  `equipo1_tab2_area_2` varchar(45) DEFAULT NULL,
  `equipo2_tab2_area_2` varchar(45) DEFAULT NULL,
  `equipo3_tab2_area_2` varchar(45) DEFAULT NULL,
  `equipo4_tab2_area_2` varchar(45) DEFAULT NULL,
  `equipo5_tab2_area_2` varchar(45) DEFAULT NULL,
  `equipo6_tab2_area_2` varchar(45) DEFAULT NULL,
  `fecha_tab2_area2` datetime DEFAULT NULL,
  `status_tab2_area2` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla2_area2`
--

INSERT INTO `tabla2_area2` (`tabla2_area2_id`, `equipo1_tab2_area_2`, `equipo2_tab2_area_2`, `equipo3_tab2_area_2`, `equipo4_tab2_area_2`, `equipo5_tab2_area_2`, `equipo6_tab2_area_2`, `fecha_tab2_area2`, `status_tab2_area2`) VALUES
(1, '3', '23', '4', '5', '4', '6', '2020-06-12 13:23:19', '1'),
(2, '3', '23', '4', '5', '4', '6', '2020-06-12 14:00:00', '1'),
(3, '3', '23', '4', '5', '4', '6', '2020-06-12 15:00:00', '1'),
(4, '3', '23', '4', '5', '4', '6', '2020-06-12 16:00:00', '1'),
(5, '3', '23', '4', '5', '4', '6', '2020-06-12 17:00:01', '1'),
(6, '3', '23', '4', '5', '4', '6', '2020-06-12 18:00:01', '1'),
(7, '450', '75', '12', '15', '4', '6', '2020-06-12 19:11:53', '1'),
(8, '450', '75', '12', '15', '4', '6', '2020-06-12 20:00:01', '1'),
(9, '450', '75', '12', '15', '4', '6', '2020-06-12 21:00:01', '1'),
(10, '450', '75', '12', '15', '4', '6', '2020-06-12 22:00:00', '1'),
(11, '450', '75', '12', '15', '4', '6', '2020-06-12 23:00:01', '1'),
(17, '450', '75', '12', '15', '4', '6', '2020-06-13 00:00:00', '1'),
(18, '450', '75', '12', '15', '4', '6', '2020-06-13 01:00:01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2_area3`
--

CREATE TABLE `tabla2_area3` (
  `tabla2_area3_id` int(11) NOT NULL,
  `equipo1_tab2_area_3` varchar(45) DEFAULT NULL,
  `equipo2_tab2_area_3` varchar(45) DEFAULT NULL,
  `equipo3_tab2_area_3` varchar(45) DEFAULT NULL,
  `equipo4_tab2_area_3` varchar(45) DEFAULT NULL,
  `equipo5_tab2_area_3` varchar(45) DEFAULT NULL,
  `equipo6_tab2_area_3` varchar(45) DEFAULT NULL,
  `fecha_tab2_area3` datetime DEFAULT NULL,
  `status_tab2_area3` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla2_area3`
--

INSERT INTO `tabla2_area3` (`tabla2_area3_id`, `equipo1_tab2_area_3`, `equipo2_tab2_area_3`, `equipo3_tab2_area_3`, `equipo4_tab2_area_3`, `equipo5_tab2_area_3`, `equipo6_tab2_area_3`, `fecha_tab2_area3`, `status_tab2_area3`) VALUES
(1, '54', '4', '3', '56', '34', '56', '2020-06-12 13:23:19', '1'),
(2, '54', '4', '3', '56', '34', '56', '2020-06-12 14:00:00', '1'),
(3, '54', '4', '3', '56', '34', '56', '2020-06-12 15:00:00', '1'),
(4, '54', '4', '3', '56', '34', '56', '2020-06-12 16:00:00', '1'),
(5, '54', '4', '3', '56', '34', '56', '2020-06-12 17:00:01', '1'),
(6, '54', '4', '3', '56', '34', '56', '2020-06-12 18:00:01', '1'),
(7, '450', '75', '12', '15', '34', '56', '2020-06-12 19:11:53', '1'),
(8, '450', '75', '12', '15', '34', '56', '2020-06-12 20:00:01', '1'),
(9, '450', '75', '12', '15', '34', '56', '2020-06-12 21:00:01', '1'),
(10, '450', '75', '12', '15', '34', '56', '2020-06-12 22:00:00', '1'),
(11, '450', '75', '12', '15', '34', '56', '2020-06-12 23:00:01', '1'),
(17, '450', '75', '12', '15', '34', '56', '2020-06-13 00:00:00', '1'),
(18, '450', '75', '12', '15', '34', '56', '2020-06-13 01:00:01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2_area4`
--

CREATE TABLE `tabla2_area4` (
  `tabla2_area4_id` int(11) NOT NULL,
  `equipo1_tab2_area_4` varchar(45) DEFAULT NULL,
  `equipo2_tab2_area_4` varchar(45) DEFAULT NULL,
  `equipo3_tab2_area_4` varchar(45) DEFAULT NULL,
  `equipo4_tab2_area_4` varchar(45) DEFAULT NULL,
  `equipo5_tab2_area_4` varchar(45) DEFAULT NULL,
  `equipo6_tab2_area_4` varchar(45) DEFAULT NULL,
  `fecha_tab2_area4` datetime DEFAULT NULL,
  `status_tab2_area4` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla2_area4`
--

INSERT INTO `tabla2_area4` (`tabla2_area4_id`, `equipo1_tab2_area_4`, `equipo2_tab2_area_4`, `equipo3_tab2_area_4`, `equipo4_tab2_area_4`, `equipo5_tab2_area_4`, `equipo6_tab2_area_4`, `fecha_tab2_area4`, `status_tab2_area4`) VALUES
(1, '4', '5', '6', '7', '4', '6', '2020-06-12 13:23:19', '1'),
(2, '4', '5', '6', '7', '4', '6', '2020-06-12 14:00:00', '1'),
(3, '4', '5', '6', '7', '4', '6', '2020-06-12 15:00:00', '1'),
(4, '4', '5', '6', '7', '4', '6', '2020-06-12 16:00:00', '1'),
(5, '4', '5', '6', '7', '4', '6', '2020-06-12 17:00:01', '1'),
(6, '4', '5', '6', '7', '4', '6', '2020-06-12 18:00:01', '1'),
(7, '40', '70', '10', '8', '4', '6', '2020-06-12 19:11:53', '1'),
(8, '40', '70', '10', '8', '4', '6', '2020-06-12 20:00:01', '1'),
(9, '40', '70', '10', '8', '4', '6', '2020-06-12 21:00:01', '1'),
(10, '40', '70', '10', '8', '4', '6', '2020-06-12 22:00:00', '1'),
(11, '40', '70', '10', '8', '4', '6', '2020-06-12 23:00:01', '1'),
(17, '40', '70', '10', '8', '4', '6', '2020-06-13 00:00:00', '1'),
(18, '40', '70', '10', '8', '4', '6', '2020-06-13 01:00:01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla3_area1`
--

CREATE TABLE `tabla3_area1` (
  `tabla3_area1_id` int(11) NOT NULL,
  `equipo1_tab3_area_1` varchar(45) DEFAULT NULL,
  `equipo2_tab3_area_1` varchar(45) DEFAULT NULL,
  `equipo3_tab3_area_1` varchar(45) DEFAULT NULL,
  `equipo4_tab3_area_1` varchar(45) DEFAULT NULL,
  `equipo5_tab3_area_1` varchar(45) DEFAULT NULL,
  `equipo7_tab3_area_1` varchar(45) DEFAULT NULL,
  `fecha_tab3_area1` datetime DEFAULT NULL,
  `status_tab3_area1` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla3_area1`
--

INSERT INTO `tabla3_area1` (`tabla3_area1_id`, `equipo1_tab3_area_1`, `equipo2_tab3_area_1`, `equipo3_tab3_area_1`, `equipo4_tab3_area_1`, `equipo5_tab3_area_1`, `equipo7_tab3_area_1`, `fecha_tab3_area1`, `status_tab3_area1`) VALUES
(1, '12', '3', '43', '3', '23', '4', '2020-06-12 13:27:17', '1'),
(2, '12', '3', '43', '3', '23', '4', '2020-06-12 14:00:01', '1'),
(3, '12', '3', '43', '3', '23', '4', '2020-06-12 15:00:00', '1'),
(4, '12', '3', '43', '3', '23', '4', '2020-06-12 16:00:00', '1'),
(5, '12', '3', '43', '3', '23', '4', '2020-06-12 17:00:02', '1'),
(6, '12', '3', '43', '3', '23', '4', '2020-06-12 18:00:01', '1'),
(7, '445', '180', '180', '60', '30', '4', '2020-06-12 19:18:11', '1'),
(8, '445', '180', '180', '60', '30', '4', '2020-06-12 20:00:02', '1'),
(9, '445', '180', '180', '60', '30', '4', '2020-06-12 21:00:01', '1'),
(10, '445', '180', '180', '60', '30', '4', '2020-06-12 22:00:01', '1'),
(11, '445', '180', '180', '60', '30', '4', '2020-06-12 23:00:01', '1'),
(17, '445', '180', '180', '60', '30', '4', '2020-06-13 00:00:00', '1'),
(18, '445', '180', '180', '60', '30', '4', '2020-06-13 01:00:02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla3_area2`
--

CREATE TABLE `tabla3_area2` (
  `tabla3_area2_id` int(11) NOT NULL,
  `equipo1_tab3_area_2` varchar(45) DEFAULT NULL,
  `equipo2_tab3_area_2` varchar(45) DEFAULT NULL,
  `equipo3_tab3_area_2` varchar(45) DEFAULT NULL,
  `equipo4_tab3_area_2` varchar(45) DEFAULT NULL,
  `equipo5_tab3_area_2` varchar(45) DEFAULT NULL,
  `equipo7_tab3_area_2` varchar(45) DEFAULT NULL,
  `fecha_tab3_area2` datetime DEFAULT NULL,
  `status_tab3_area2` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla3_area2`
--

INSERT INTO `tabla3_area2` (`tabla3_area2_id`, `equipo1_tab3_area_2`, `equipo2_tab3_area_2`, `equipo3_tab3_area_2`, `equipo4_tab3_area_2`, `equipo5_tab3_area_2`, `equipo7_tab3_area_2`, `fecha_tab3_area2`, `status_tab3_area2`) VALUES
(1, '3', '4', '6', '5', '34', '5', '2020-06-12 13:27:17', '1'),
(2, '3', '4', '6', '5', '34', '5', '2020-06-12 14:00:01', '1'),
(3, '3', '4', '6', '5', '34', '5', '2020-06-12 15:00:00', '1'),
(4, '3', '4', '6', '5', '34', '5', '2020-06-12 16:00:00', '1'),
(5, '3', '4', '6', '5', '34', '5', '2020-06-12 17:00:02', '1'),
(6, '3', '4', '6', '5', '34', '5', '2020-06-12 18:00:01', '1'),
(7, '445', '180', '180', '60', '35', '5', '2020-06-12 19:18:11', '1'),
(8, '445', '180', '180', '60', '35', '5', '2020-06-12 20:00:02', '1'),
(9, '445', '180', '180', '60', '35', '5', '2020-06-12 21:00:01', '1'),
(10, '445', '180', '180', '60', '35', '5', '2020-06-12 22:00:01', '1'),
(11, '445', '180', '180', '60', '35', '5', '2020-06-12 23:00:01', '1'),
(17, '445', '180', '180', '60', '35', '5', '2020-06-13 00:00:00', '1'),
(18, '445', '180', '180', '60', '35', '5', '2020-06-13 01:00:02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla4_area1`
--

CREATE TABLE `tabla4_area1` (
  `tabla4_area1_id` int(11) NOT NULL,
  `equipo1_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo3_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo5_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo6_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo7_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo8_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo9_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo10_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo11_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo12_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo13_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo14_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo15_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo16_tab4_area_1` varchar(45) DEFAULT NULL,
  `equipo18_tab4_area_1` varchar(45) DEFAULT NULL,
  `fecha_tab4_area1` datetime DEFAULT NULL,
  `status_tab4_area1` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla4_area1`
--

INSERT INTO `tabla4_area1` (`tabla4_area1_id`, `equipo1_tab4_area_1`, `equipo3_tab4_area_1`, `equipo5_tab4_area_1`, `equipo6_tab4_area_1`, `equipo7_tab4_area_1`, `equipo8_tab4_area_1`, `equipo9_tab4_area_1`, `equipo10_tab4_area_1`, `equipo11_tab4_area_1`, `equipo12_tab4_area_1`, `equipo13_tab4_area_1`, `equipo14_tab4_area_1`, `equipo15_tab4_area_1`, `equipo16_tab4_area_1`, `equipo18_tab4_area_1`, `fecha_tab4_area1`, `status_tab4_area1`) VALUES
(1, '12', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 13:27:44', '1'),
(2, '12', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 14:00:01', '1'),
(3, '12', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 15:00:01', '1'),
(4, '12', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 16:00:00', '1'),
(5, '12', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 17:00:02', '1'),
(6, '12', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 18:00:02', '1'),
(7, '12', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 19:00:02', '1'),
(8, '12', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 20:00:02', '1'),
(9, '15', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 21:00:02', '1'),
(10, '15', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 22:00:01', '1'),
(11, '15', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-12 23:00:02', '1'),
(17, '15', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-13 00:00:00', '1'),
(18, '15', '3', '4', '4', '4', '66', '7', '5', '5', '6', '7', '6', '7', '8', '6', '2020-06-13 01:00:02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla4_area2`
--

CREATE TABLE `tabla4_area2` (
  `tabla4_area2_id` int(11) NOT NULL,
  `equipo1_tab4_area_2` varchar(45) DEFAULT NULL,
  `equipo2_tab4_area_2` varchar(45) DEFAULT NULL,
  `equipo3_tab4_area_2` varchar(45) DEFAULT NULL,
  `fecha_tab4_area2` datetime DEFAULT NULL,
  `status_tab4_area2` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla4_area2`
--

INSERT INTO `tabla4_area2` (`tabla4_area2_id`, `equipo1_tab4_area_2`, `equipo2_tab4_area_2`, `equipo3_tab4_area_2`, `fecha_tab4_area2`, `status_tab4_area2`) VALUES
(1, '6', '5', '4', '2020-06-12 13:27:44', '1'),
(2, '6', '5', '4', '2020-06-12 14:00:01', '1'),
(3, '6', '5', '4', '2020-06-12 15:00:01', '1'),
(4, '6', '5', '4', '2020-06-12 16:00:00', '1'),
(5, '6', '5', '4', '2020-06-12 17:00:02', '1'),
(6, '6', '5', '4', '2020-06-12 18:00:02', '1'),
(7, '6', '5', '4', '2020-06-12 19:00:02', '1'),
(8, '6', '5', '4', '2020-06-12 20:00:02', '1'),
(9, '6', '5', '4', '2020-06-12 21:00:02', '1'),
(10, '6', '5', '4', '2020-06-12 22:00:01', '1'),
(11, '6', '5', '4', '2020-06-12 23:00:02', '1'),
(17, '6', '5', '4', '2020-06-13 00:00:00', '1'),
(18, '6', '5', '4', '2020-06-13 01:00:02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla5_area1`
--

CREATE TABLE `tabla5_area1` (
  `tabla5_area1_id` int(11) NOT NULL,
  `equipo1_tab5_area_1` varchar(45) DEFAULT NULL,
  `equipo2_tab5_area_1` varchar(45) DEFAULT NULL,
  `equipo3_tab5_area_1` varchar(45) DEFAULT NULL,
  `equipo4_tab5_area_1` varchar(45) DEFAULT NULL,
  `fecha_tab5_area1` datetime DEFAULT NULL,
  `status_tab5_area1` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla5_area1`
--

INSERT INTO `tabla5_area1` (`tabla5_area1_id`, `equipo1_tab5_area_1`, `equipo2_tab5_area_1`, `equipo3_tab5_area_1`, `equipo4_tab5_area_1`, `fecha_tab5_area1`, `status_tab5_area1`) VALUES
(1, '23', '2', '3', '5', '2020-06-12 13:28:17', '1'),
(2, '23', '2', '3', '5', '2020-06-12 14:00:01', '1'),
(3, '23', '2', '3', '5', '2020-06-12 15:00:01', '1'),
(4, '23', '2', '3', '5', '2020-06-12 16:00:01', '1'),
(5, '23', '2', '3', '5', '2020-06-12 17:00:02', '1'),
(6, '23', '2', '3', '5', '2020-06-12 18:00:02', '1'),
(7, '23', '2', '3', '5', '2020-06-12 19:00:02', '1'),
(8, '23', '2', '3', '5', '2020-06-12 20:00:02', '1'),
(9, '23', '2', '3', '5', '2020-06-12 21:00:02', '1'),
(10, '23', '2', '3', '5', '2020-06-12 22:00:01', '1'),
(11, '23', '2', '3', '5', '2020-06-12 23:00:02', '1'),
(17, '23', '2', '3', '5', '2020-06-13 00:00:00', '1'),
(18, '23', '2', '3', '5', '2020-06-13 01:00:02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla5_area2`
--

CREATE TABLE `tabla5_area2` (
  `tabla5_area2_id` int(11) NOT NULL,
  `equipo1_tab5_area_2` varchar(45) DEFAULT NULL,
  `equipo2_tab5_area_2` varchar(45) DEFAULT NULL,
  `equipo3_tab5_area_2` varchar(45) DEFAULT NULL,
  `equipo4_tab5_area_2` varchar(45) DEFAULT NULL,
  `equipo5_tab5_area_2` varchar(45) DEFAULT NULL,
  `fecha_tab5_area2` datetime DEFAULT NULL,
  `status_tab5_area2` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla5_area2`
--

INSERT INTO `tabla5_area2` (`tabla5_area2_id`, `equipo1_tab5_area_2`, `equipo2_tab5_area_2`, `equipo3_tab5_area_2`, `equipo4_tab5_area_2`, `equipo5_tab5_area_2`, `fecha_tab5_area2`, `status_tab5_area2`) VALUES
(1, '3', '4', '5', '3', '2', '2020-06-12 13:28:17', '1'),
(2, '43.00', '44.00', '5', '3', '2', '2020-06-12 14:00:01', '1'),
(3, '43.00', '44.00', '5', '3', '2', '2020-06-12 15:00:01', '1'),
(4, '43.00', '44.00', '5', '3', '2', '2020-06-12 16:00:01', '1'),
(5, '43.00', '44.00', '5', '3', '2', '2020-06-12 17:00:02', '1'),
(6, '43.00', '44.00', '5', '3', '2', '2020-06-12 18:00:02', '1'),
(7, '43.00', '44.00', '5', '3', '2', '2020-06-12 19:00:02', '1'),
(8, '43.00', '44.00', '5', '3', '2', '2020-06-12 20:00:02', '1'),
(9, '43.00', '44.00', '5', '3', '2', '2020-06-12 21:00:02', '1'),
(10, '43.00', '44.00', '5', '3', '2', '2020-06-12 22:00:01', '1'),
(11, '43.00', '44.00', '5', '3', '2', '2020-06-12 23:00:02', '1'),
(17, '43.00', '44.00', '5', '3', '2', '2020-06-13 00:00:00', '1'),
(18, '43.00', '44.00', '5', '3', '2', '2020-06-13 01:00:02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla5_area3`
--

CREATE TABLE `tabla5_area3` (
  `tabla5_area3_id` int(11) NOT NULL,
  `equipo1_tab5_area_3` varchar(45) DEFAULT NULL,
  `equipo2_tab5_area_3` varchar(45) DEFAULT NULL,
  `equipo3_tab5_area_3` varchar(45) DEFAULT NULL,
  `equipo4_tab5_area_3` varchar(45) DEFAULT NULL,
  `equipo5_tab5_area_3` varchar(45) DEFAULT NULL,
  `fecha_tab5_area3` datetime DEFAULT NULL,
  `status_tab5_area3` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla5_area3`
--

INSERT INTO `tabla5_area3` (`tabla5_area3_id`, `equipo1_tab5_area_3`, `equipo2_tab5_area_3`, `equipo3_tab5_area_3`, `equipo4_tab5_area_3`, `equipo5_tab5_area_3`, `fecha_tab5_area3`, `status_tab5_area3`) VALUES
(1, '4', '3', '4', '5', '3', '2020-06-12 13:28:17', '1'),
(2, '4', '3', '4', '5', '3', '2020-06-12 14:00:01', '1'),
(3, '4', '3', '4', '5', '3', '2020-06-12 15:00:01', '1'),
(4, '4', '3', '4', '5', '3', '2020-06-12 16:00:01', '1'),
(5, '4', '3', '4', '5', '3', '2020-06-12 17:00:02', '1'),
(6, '4', '3', '4', '5', '3', '2020-06-12 18:00:02', '1'),
(7, '4', '3', '4', '5', '3', '2020-06-12 19:00:02', '1'),
(8, '4', '3', '4', '5', '3', '2020-06-12 20:00:02', '1'),
(9, '4', '3', '4', '5', '3', '2020-06-12 21:00:02', '1'),
(10, '4', '3', '4', '5', '3', '2020-06-12 22:00:01', '1'),
(11, '4', '3', '4', '5', '3', '2020-06-12 23:00:02', '1'),
(17, '4', '3', '4', '5', '3', '2020-06-13 00:00:00', '1'),
(18, '4', '3', '4', '5', '3', '2020-06-13 01:00:02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla5_area4`
--

CREATE TABLE `tabla5_area4` (
  `tabla5_area4_id` int(11) NOT NULL,
  `equipo1_tab5_area_4` varchar(45) DEFAULT NULL,
  `equipo2_tab5_area_4` varchar(45) DEFAULT NULL,
  `fecha_tab5_area4` datetime DEFAULT NULL,
  `status_tab5_area4` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla5_area4`
--

INSERT INTO `tabla5_area4` (`tabla5_area4_id`, `equipo1_tab5_area_4`, `equipo2_tab5_area_4`, `fecha_tab5_area4`, `status_tab5_area4`) VALUES
(1, '3', '2', '2020-06-12 13:28:17', '1'),
(2, '3', '2', '2020-06-12 14:00:01', '1'),
(3, '3', '2', '2020-06-12 15:00:01', '1'),
(4, '3', '2', '2020-06-12 16:00:01', '1'),
(5, '3', '2', '2020-06-12 17:00:02', '1'),
(6, '3', '2', '2020-06-12 18:00:02', '1'),
(7, '3', '2', '2020-06-12 19:00:02', '1'),
(8, '3', '2', '2020-06-12 20:00:02', '1'),
(9, '3', '2', '2020-06-12 21:00:02', '1'),
(10, '3', '2', '2020-06-12 22:00:01', '1'),
(11, '3', '2', '2020-06-12 23:00:02', '1'),
(17, '3', '2', '2020-06-13 00:00:00', '1'),
(18, '3', '2', '2020-06-13 01:00:02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla6_area1`
--

CREATE TABLE `tabla6_area1` (
  `tabla6_area1_id` int(11) NOT NULL,
  `equipo1_tab6_area_1` varchar(45) DEFAULT NULL,
  `equipo2_tab6_area_1` varchar(45) DEFAULT NULL,
  `equipo3_tab6_area_1` varchar(45) DEFAULT NULL,
  `equipo5_tab6_area_1` varchar(45) DEFAULT NULL,
  `equipo6_tab6_area_1` varchar(45) DEFAULT NULL,
  `equipo7_tab6_area_1` varchar(45) DEFAULT NULL,
  `equipo8_tab6_area_1` varchar(45) DEFAULT NULL,
  `equipo9_tab6_area_1` varchar(45) DEFAULT NULL,
  `equipo10_tab6_area_1` varchar(45) DEFAULT NULL,
  `fecha_inicial_tab6_area1` date DEFAULT NULL,
  `fecha_final_tab6_area1` date DEFAULT NULL,
  `status_tab6_area1` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla6_area1`
--

INSERT INTO `tabla6_area1` (`tabla6_area1_id`, `equipo1_tab6_area_1`, `equipo2_tab6_area_1`, `equipo3_tab6_area_1`, `equipo5_tab6_area_1`, `equipo6_tab6_area_1`, `equipo7_tab6_area_1`, `equipo8_tab6_area_1`, `equipo9_tab6_area_1`, `equipo10_tab6_area_1`, `fecha_inicial_tab6_area1`, `fecha_final_tab6_area1`, `status_tab6_area1`) VALUES
(1, '70.160000', '0.072830', '0.068890', '1.88', '1.27', '3.27', '2.63', '7.89', '3.42', '2020-06-12', '2020-06-13', '1'),
(3, '10000.000000', '20000.000000', '30000.000000', '40000.00', '05000.00', '06000.00', '70000.00', '80000.00', '80000.00', '2020-06-13', '2020-06-14', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `total_calculos_tabla10`
--

CREATE TABLE `total_calculos_tabla10` (
  `tot_cal_tab10_id` int(11) NOT NULL,
  `total_12m` varchar(45) DEFAULT NULL,
  `total_antes6am` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `total_calculos_tabla10`
--

INSERT INTO `total_calculos_tabla10` (`tot_cal_tab10_id`, `total_12m`, `total_antes6am`) VALUES
(1, '4.095472', '2.896040');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_cedula` varchar(20) DEFAULT NULL,
  `usuario_nombre` varchar(150) DEFAULT NULL,
  `usuario_apellido` varchar(150) DEFAULT NULL,
  `usuario_telefono` varchar(20) DEFAULT NULL,
  `usuario_fecha_nac` date DEFAULT NULL,
  `usuario_direccion` text,
  `usuario_correo` varchar(150) DEFAULT NULL,
  `usuario_foto` text,
  `usuario_indicador_red` varchar(150) DEFAULT NULL,
  `usuario_clave_red` text,
  `usuario_tipo` enum('0','1','2','3') DEFAULT NULL COMMENT 'usuario 0 = Operador\\nusuario 1 = Administrador\\nusuario 2 = Gerente\\n',
  `usuario_status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_cedula`, `usuario_nombre`, `usuario_apellido`, `usuario_telefono`, `usuario_fecha_nac`, `usuario_direccion`, `usuario_correo`, `usuario_foto`, `usuario_indicador_red`, `usuario_clave_red`, `usuario_tipo`, `usuario_status`) VALUES
(1, '234546542', 'Juan David', 'Colmenares', '02146546548', '2019-11-04', 'barinas', '97juandcm11@gmail.com', 'uploads/foto_usuario/17_04_20/1587161118_5f974635a5c995e6427b.png', '97juandcm11@gmail.com', '$2y$10$JfuY.0mcnWqWHPYY3n6dTu98aYUbUnG523IZ6lKnQeNfOg83vcG7C', '2', '1'),
(2, '235664644', 'otro nuevo', 'apellido', '0416546456465', '2020-04-13', 'barinas', 'uno@uno.com', 'uploads/foto_usuario/17_04_20/1587135961_e743c9449e6db012237f.png', 'uno@uno.com', '$2y$10$ZAJ2bIQLaZiB18ZD4Dqvm.YWsOyjw5lRVp0ayyShORjixiLPu0.OS', '0', '1'),
(3, '25918786', 'Usuario', 'Admin', '0424564879846', '2010-04-10', 'barinas', 'admin@admin.com', NULL, 'admin@admin.com', '$2y$10$hTZWKKyTKCiOgb3Lb5/O0eEIi.VptmS9QP74tTZumZg59c6OWO/va', '1', '1'),
(4, '12345678', 'fin', 'de semana', '564456546441', '2006-07-18', 'barinas', 'fin@semana.com', '', 'fin@semana.com', '$2y$10$6KjHfC7WmK5TuP2/bIPoQeTP6nK89TA5y6UFLbuoW/XAnJQlmN8YW', '3', '1'),
(5, '5236960', 'Elio Cesar', 'Duran', '04263764252', '1960-11-17', 'barinas. alto barinas sur', 'elioduran60@gmail.com', 'assets/images/1.jpg', 'elioduran60@gmail.com', '$2y$10$KF8t563uXHw5iVNRkUOmme0HzP.cyTH0Jcv12viC2isJJmLBMjAqW', '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calculos_tabla10`
--
ALTER TABLE `calculos_tabla10`
  ADD PRIMARY KEY (`accion_id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_logs_usuarios_idx` (`usuario_id`),
  ADD KEY `idx_logs_log_id_referencia` (`log_id_referencia`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`novedad_id`);

--
-- Indices de la tabla `tabla1_area1`
--
ALTER TABLE `tabla1_area1`
  ADD PRIMARY KEY (`tabla1_area1_id`);

--
-- Indices de la tabla `tabla1_area2`
--
ALTER TABLE `tabla1_area2`
  ADD PRIMARY KEY (`tabla1_area2_id`);

--
-- Indices de la tabla `tabla1_area3`
--
ALTER TABLE `tabla1_area3`
  ADD PRIMARY KEY (`tabla1_area3_id`);

--
-- Indices de la tabla `tabla2_area1`
--
ALTER TABLE `tabla2_area1`
  ADD PRIMARY KEY (`tabla2_area1_id`);

--
-- Indices de la tabla `tabla2_area2`
--
ALTER TABLE `tabla2_area2`
  ADD PRIMARY KEY (`tabla2_area2_id`);

--
-- Indices de la tabla `tabla2_area3`
--
ALTER TABLE `tabla2_area3`
  ADD PRIMARY KEY (`tabla2_area3_id`);

--
-- Indices de la tabla `tabla2_area4`
--
ALTER TABLE `tabla2_area4`
  ADD PRIMARY KEY (`tabla2_area4_id`);

--
-- Indices de la tabla `tabla3_area1`
--
ALTER TABLE `tabla3_area1`
  ADD PRIMARY KEY (`tabla3_area1_id`);

--
-- Indices de la tabla `tabla3_area2`
--
ALTER TABLE `tabla3_area2`
  ADD PRIMARY KEY (`tabla3_area2_id`);

--
-- Indices de la tabla `tabla4_area1`
--
ALTER TABLE `tabla4_area1`
  ADD PRIMARY KEY (`tabla4_area1_id`);

--
-- Indices de la tabla `tabla4_area2`
--
ALTER TABLE `tabla4_area2`
  ADD PRIMARY KEY (`tabla4_area2_id`);

--
-- Indices de la tabla `tabla5_area1`
--
ALTER TABLE `tabla5_area1`
  ADD PRIMARY KEY (`tabla5_area1_id`);

--
-- Indices de la tabla `tabla5_area2`
--
ALTER TABLE `tabla5_area2`
  ADD PRIMARY KEY (`tabla5_area2_id`);

--
-- Indices de la tabla `tabla5_area3`
--
ALTER TABLE `tabla5_area3`
  ADD PRIMARY KEY (`tabla5_area3_id`);

--
-- Indices de la tabla `tabla5_area4`
--
ALTER TABLE `tabla5_area4`
  ADD PRIMARY KEY (`tabla5_area4_id`);

--
-- Indices de la tabla `tabla6_area1`
--
ALTER TABLE `tabla6_area1`
  ADD PRIMARY KEY (`tabla6_area1_id`);

--
-- Indices de la tabla `total_calculos_tabla10`
--
ALTER TABLE `total_calculos_tabla10`
  ADD PRIMARY KEY (`tot_cal_tab10_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calculos_tabla10`
--
ALTER TABLE `calculos_tabla10`
  MODIFY `accion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `novedad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tabla1_area1`
--
ALTER TABLE `tabla1_area1`
  MODIFY `tabla1_area1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tabla1_area2`
--
ALTER TABLE `tabla1_area2`
  MODIFY `tabla1_area2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tabla1_area3`
--
ALTER TABLE `tabla1_area3`
  MODIFY `tabla1_area3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tabla2_area1`
--
ALTER TABLE `tabla2_area1`
  MODIFY `tabla2_area1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla2_area2`
--
ALTER TABLE `tabla2_area2`
  MODIFY `tabla2_area2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla2_area3`
--
ALTER TABLE `tabla2_area3`
  MODIFY `tabla2_area3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla2_area4`
--
ALTER TABLE `tabla2_area4`
  MODIFY `tabla2_area4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla3_area1`
--
ALTER TABLE `tabla3_area1`
  MODIFY `tabla3_area1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla3_area2`
--
ALTER TABLE `tabla3_area2`
  MODIFY `tabla3_area2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla4_area1`
--
ALTER TABLE `tabla4_area1`
  MODIFY `tabla4_area1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla4_area2`
--
ALTER TABLE `tabla4_area2`
  MODIFY `tabla4_area2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla5_area1`
--
ALTER TABLE `tabla5_area1`
  MODIFY `tabla5_area1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla5_area2`
--
ALTER TABLE `tabla5_area2`
  MODIFY `tabla5_area2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla5_area3`
--
ALTER TABLE `tabla5_area3`
  MODIFY `tabla5_area3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla5_area4`
--
ALTER TABLE `tabla5_area4`
  MODIFY `tabla5_area4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla6_area1`
--
ALTER TABLE `tabla6_area1`
  MODIFY `tabla6_area1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `total_calculos_tabla10`
--
ALTER TABLE `total_calculos_tabla10`
  MODIFY `tot_cal_tab10_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
