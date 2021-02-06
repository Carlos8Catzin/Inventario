-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2021 a las 01:31:06
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accessruta`
--

CREATE TABLE `accessruta` (
  `IdAccessRuta` int(11) NOT NULL,
  `IdRol` int(11) DEFAULT NULL,
  `IdRuta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `accessruta`
--

INSERT INTO `accessruta` (`IdAccessRuta`, `IdRol`, `IdRuta`) VALUES
(87, 1, 1),
(88, 1, 2),
(89, 1, 3),
(90, 1, 4),
(91, 1, 5),
(92, 1, 6),
(93, 1, 7),
(94, 1, 8),
(95, 1, 9),
(96, 1, 10),
(97, 1, 11),
(98, 1, 12),
(99, 1, 13),
(100, 1, 14),
(101, 1, 15),
(102, 1, 16),
(103, 1, 17),
(104, 1, 18),
(105, 1, 19),
(106, 1, 20),
(107, 1, 21),
(108, 1, 22),
(109, 2, 1),
(110, 2, 2),
(111, 2, 3),
(112, 2, 4),
(113, 2, 5),
(114, 2, 6),
(115, 2, 7),
(116, 2, 8),
(117, 2, 9),
(118, 2, 10),
(119, 2, 11),
(120, 2, 12),
(121, 2, 13),
(122, 2, 14),
(123, 2, 15),
(124, 2, 16),
(125, 2, 17),
(126, 2, 18),
(127, 2, 19),
(128, 2, 20),
(129, 2, 21),
(130, 2, 22),
(131, 3, 1),
(132, 3, 2),
(133, 3, 3),
(134, 3, 4),
(135, 3, 5),
(136, 3, 6),
(137, 3, 7),
(138, 3, 8),
(139, 3, 10),
(140, 3, 11),
(141, 3, 13),
(142, 3, 14),
(143, 3, 15),
(144, 3, 16),
(145, 3, 17),
(146, 3, 18),
(147, 3, 22),
(148, 4, 1),
(149, 4, 2),
(150, 4, 3),
(151, 4, 4),
(152, 4, 8),
(153, 4, 11),
(154, 4, 14),
(155, 4, 15),
(156, 4, 16),
(157, 4, 17),
(158, 4, 18),
(159, 4, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `IdBitacora` int(11) NOT NULL COMMENT 'Identificador de la bitacora',
  `Proceso` varchar(45) NOT NULL COMMENT 'Nombre del proceso en que se ejecuto',
  `TipoMensaje` varchar(2) NOT NULL COMMENT 'Tipo de Mensaje A=Advertencia E=Error',
  `Mensaje` text NOT NULL COMMENT 'Mensaje del error o advertencia',
  `IdUsuario` int(11) NOT NULL COMMENT 'Usuario que ejecuto proceso',
  `Fecha` datetime NOT NULL COMMENT 'Fecha en que se ejecuti el proceso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`IdBitacora`, `Proceso`, `TipoMensaje`, `Mensaje`, `IdUsuario`, `Fecha`) VALUES
(1, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100468<br>Por el usuario Administrador', 41, '2021-01-04 15:33:45'),
(2, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-04 17:10:42'),
(3, 'Cierre del sistema', 'A', 'El usuario <b>Efisoft</b> ha cerrado su sesión al sistema', 42, '2021-01-04 17:12:14'),
(4, 'Acceso al sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha accedido al sistema', 32, '2021-01-04 17:12:20'),
(5, 'Cierre del sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha cerrado su sesión al sistema', 32, '2021-01-04 17:14:33'),
(6, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-04 17:14:39'),
(7, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-04 18:51:10'),
(8, 'Cierre del sistema', 'A', 'El usuario <b>Efisoft</b> ha cerrado su sesión al sistema', 42, '2021-01-04 18:51:15'),
(9, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-04 18:51:22'),
(10, 'Cierre del sistema', 'A', 'El usuario <b>Efisoft</b> ha cerrado su sesión al sistema', 42, '2021-01-04 18:51:35'),
(11, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-04 18:59:26'),
(12, 'Registro de Clientes', 'A', 'Se ha creado un nuevo cliente en el sistema con los siguientes datos <br /> <b>Nombre Completo: </b> Frenkie De Jong <br /> <b>Email: </b>fdejong@mail.com <br /> <b>Dirección: </b>Holanda <br /> <b>Fecha de Nacimiento: </b>1998-03-12', 41, '2021-01-04 19:01:48'),
(13, 'Venta', 'A', 'Se ha generado una nueva venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> 1 <br /> <b>Detalles de los productos: </b><br />[{\"id\":\"9\",\"descripcion\":\"iPhone 11\",\"cantidad\":\"6\",\"stock\":\"3\",\"precio\":\"18999\",\"total\":\"113994\"}] <br /> <b>Forma de pago: </b> Efectivo <br /> <b>Pago total: </b> $113994 MXN', 41, '2021-01-04 19:02:17'),
(14, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de ventas<br /> <br /> <b>Nombre del archivo: </b>Reporte_de_ventas', 41, '2021-01-05 17:54:24'),
(15, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de usuarios<br /> <br /> <b>Nombre del archivo: </b>Reporte_de_usuarios', 41, '2021-01-05 17:56:55'),
(16, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de rutas <br /> <b>Nombre del archivo: </b>Reporte_de_rutas', 41, '2021-01-05 17:59:18'),
(17, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de comisiones <br /> <b>Nombre del archivo: </b>Reporte_de_comisiones', 41, '2021-01-05 17:59:59'),
(18, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100469<br>Por el usuario Administrador', 41, '2021-01-05 18:09:43'),
(19, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de inventario de productos <br /> <b>Nombre del archivo: </b>Reporte_de_inventario_de_productos', 41, '2021-01-05 18:10:23'),
(20, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100470<br>Por el usuario Administrador', 41, '2021-01-05 18:30:38'),
(21, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de clientes <br /> <b>Nombre del archivo: </b>Reporte_de_clientes', 41, '2021-01-05 20:33:41'),
(22, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de rutas de acceso <br /> <b>Nombre del archivo: </b>Reporte_de_rutas_de_acceso', 41, '2021-01-05 20:52:51'),
(23, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de controles existentes <br /> <b>Nombre del archivo: </b>Reporte_de_controles_existentes', 41, '2021-01-05 20:57:43'),
(24, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte <br /> <b>Nombre del archivo: </b>Reporte', 41, '2021-01-05 21:10:04'),
(25, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> HOLA <br /> <b>Nombre del archivo: </b>HOLA', 41, '2021-01-05 21:11:22'),
(26, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reportes de pendientes del checker <br /> <b>Nombre del archivo: </b>Reportes_de_pendientes_del_checker', 41, '2021-01-05 21:22:06'),
(27, 'Transacción del Checker', 'E', '<b>Se ha producido un error en una transacción con número de Folio: </b>100471<br>Por el usuario Administrador', 41, '2021-01-05 21:35:44'),
(28, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100472<br>Por el usuario Administrador', 41, '2021-01-05 21:35:47'),
(29, 'Proveedores', 'A', 'Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> Nike de México <br /> <b>Razón social: </b>S. DE R.L. DE C.V. <br /> <b>Domicilio: </b>IGNACIO ZARAGOZA No. 1385 <br /> <b>Poblacion: </b>TEPALCATES <br /> <b>CodigoPostal: </b>09220 <br /> <b>Pais: </b>México', 41, '2021-01-06 13:18:30'),
(30, 'Proveedores', 'A', 'Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> Nike de México <br /> <b>Razón social: </b>S. DE R.L. DE C.V. <br /> <b>Domicilio: </b>IGNACIO ZARAGOZA No. 1385 <br /> <b>Poblacion: </b>Tepalcates <br /> <b>CodigoPostal: </b>09220 <br /> <b>Pais: </b>México', 41, '2021-01-06 13:19:33'),
(31, 'Proveedores', 'A', 'Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> Nike de México <br /> <b>Razón social: </b>S. DE R.L. DE C.V. <br /> <b>Domicilio: </b>IGNACIO ZARAGOZA No. 1385 <br /> <b>Poblacion: </b>TEPALCATES <br /> <b>CodigoPostal: </b>09220 <br /> <b>Pais: </b>México', 41, '2021-01-06 13:21:01'),
(32, 'Proveedores', 'A', 'Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> Nike de México <br /> <b>Razón social: </b>S. DE R.L. DE C.V. <br /> <b>Domicilio: </b>IGNACIO ZARAGOZA No. 1385 <br /> <b>Poblacion: </b>TEPALCATES <br /> <b>CodigoPostal: </b>09220 <br /> <b>Pais: </b>México', 41, '2021-01-06 13:21:03'),
(33, 'Proveedores', 'A', 'Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> Nike de México <br /> <b>Razón social: </b>S. DE R.L. DE C.V. <br /> <b>Domicilio: </b>IGNACIO ZARAGOZA No. 1385 <br /> <b>Poblacion: </b>TEPALCATES <br /> <b>CodigoPostal: </b>09220 <br /> <b>Pais: </b>México', 41, '2021-01-06 13:21:07'),
(34, 'Proveedores', 'A', 'Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> dsfsdfds <br /> <b>Razón social: </b>fsdfdsf <br /> <b>Domicilio: </b>sdfdsf <br /> <b>Poblacion: </b>sdfsdf <br /> <b>CodigoPostal: </b>23323 <br /> <b>Pais: </b>assaadsadds', 41, '2021-01-06 13:21:35'),
(35, 'Proveedores', 'A', 'Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> dsfsdfds <br /> <b>Razón social: </b>fsdfdsf <br /> <b>Domicilio: </b>sdfdsf <br /> <b>Poblacion: </b>sdfsdf <br /> <b>CodigoPostal: </b>23323 <br /> <b>Pais: </b>assaadsadds', 41, '2021-01-06 13:22:49'),
(36, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100473<br>Por el usuario Administrador', 41, '2021-01-06 13:25:33'),
(37, 'Transacción del Checker', 'A', '<b>Se ha Rechazado una transacción con número de Folio: </b>100471<br>Por el usuario Administrador', 41, '2021-01-06 13:25:36'),
(38, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de proveedores 2021 <br /> <b>Nombre del archivo: </b>Reporte_de_proveedores_2021', 41, '2021-01-06 13:28:24'),
(39, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-06 13:31:52'),
(40, 'Acceso al sistema', 'A', 'El usuario <b>Lionel</b> ha accedido al sistema', 40, '2021-01-06 13:31:57'),
(41, 'Cierre del sistema', 'A', 'El usuario <b>Lionel</b> ha cerrado su sesión al sistema', 40, '2021-01-06 13:32:07'),
(42, 'Acceso al sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha accedido al sistema', 32, '2021-01-06 13:32:27'),
(43, 'Cierre del sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha cerrado su sesión al sistema', 32, '2021-01-06 16:10:43'),
(44, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-06 16:10:53'),
(45, 'Proveedores', 'A', 'Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> Alpura <br /> <b>Razón social: </b>S.A de C.V. <br /> <b>Domicilio: </b>Avenida Tollocan <br /> <b>Poblacion: </b>Toluca Estado de México <br /> <b>CodigoPostal: </b>52100 <br /> <b>Pais: </b>México', 41, '2021-01-06 16:11:53'),
(46, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100474<br>Por el usuario Administrador', 41, '2021-01-06 16:12:43'),
(47, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100475<br>Por el usuario Administrador', 41, '2021-01-06 16:14:31'),
(48, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100476<br>Por el usuario Administrador', 41, '2021-01-06 16:16:06'),
(49, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100477<br>Por el usuario Administrador', 41, '2021-01-06 16:16:40'),
(50, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100478<br>Por el usuario Administrador', 41, '2021-01-06 16:18:55'),
(51, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100479<br>Por el usuario Administrador', 41, '2021-01-06 16:21:10'),
(52, 'Transacción del Checker', 'A', '<b>Se ha Rechazado una transacción con número de Folio: </b>100480<br>Por el usuario Administrador', 41, '2021-01-06 16:21:39'),
(53, 'Proveedores', 'A', 'Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> Bimbo <br /> <b>Razón social: </b>S. A. de C. V. <br /> <b>Domicilio: </b>Avenida Tollocan <br /> <b>Poblacion: </b>Toluca Estado de México <br /> <b>CodigoPostal: </b>51400 <br /> <b>Pais: </b>México', 41, '2021-01-06 16:22:40'),
(54, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100481<br>Por el usuario Administrador', 41, '2021-01-06 16:23:20'),
(55, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100482<br>Por el usuario Administrador', 41, '2021-01-06 16:24:52'),
(56, 'Venta', 'A', 'Se ha generado una nueva venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> 2 <br /> <b>Detalles de los productos: </b><br />[{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"7\",\"precio\":\"13\",\"total\":\"13\"},{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"20\",\"total\":\"20\"}] <br /> <b>Forma de pago: </b> Efectivo <br /> <b>Pago total: </b> $33 MXN', 41, '2021-01-06 16:26:02'),
(57, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> INSERT EN VENTAS <br /> <b>Nombre del archivo: </b>INSERT_EN_VENTAS', 41, '2021-01-07 11:25:35'),
(58, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> BORRAR VENTAS <br /> <b>Nombre del archivo: </b>BORRAR_VENTAS', 41, '2021-01-07 11:27:14'),
(59, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> ACTUALIZAR VENTAS <br /> <b>Nombre del archivo: </b>ACTUALIZAR_VENTAS', 41, '2021-01-07 11:28:59'),
(60, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de Ventas de las fechas del 4 al 5 de enero del 2021 <br /> <b>Nombre del archivo: </b>Reporte_de_Ventas_de_las_fechas_del_4_al_5_de_enero_del_2021', 41, '2021-01-07 11:43:27'),
(61, 'Transacción del Checker', 'A', '<b>Se ha Rechazado una transacción con número de Folio: </b>100483<br>Por el usuario Administrador', 41, '2021-01-07 12:21:34'),
(62, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100484<br>Por el usuario Administrador', 41, '2021-01-07 12:22:38'),
(63, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-07 13:44:21'),
(64, 'Acceso al sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha accedido al sistema', 32, '2021-01-07 13:44:26'),
(65, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-07 13:57:34'),
(66, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-08 10:55:49'),
(67, 'Acceso al sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha accedido al sistema', 32, '2021-01-08 11:54:27'),
(68, 'Acceso al sistema', 'A', 'El usuario <b>VazquezCatzin</b> ha accedido al sistema', 30, '2021-01-08 13:58:36'),
(69, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-08 18:15:36'),
(70, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-08 20:18:06'),
(71, 'Acceso al sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha accedido al sistema', 32, '2021-01-08 20:18:11'),
(72, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-08 20:22:31'),
(73, 'Venta', 'A', 'Se ha generado una nueva venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> 3 <br /> <b>Detalles de los productos: </b><br />[{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"6\",\"precio\":\"13\",\"total\":\"13\"},{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"1\",\"stock\":\"8\",\"precio\":\"20\",\"total\":\"20\"},{\"id\":\"18\",\"descripcion\":\"Nike Air VaporMax Flyknit 3\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"3100\",\"total\":\"3100\"}] <br /> <b>Forma de pago: </b> Efectivo <br /> <b>Pago total: </b> $3133 MXN', 32, '2021-01-09 13:42:13'),
(74, 'Cierre del sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha cerrado su sesión al sistema', 32, '2021-01-09 13:45:10'),
(75, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-09 13:50:03'),
(76, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-09 16:55:34'),
(77, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-09 19:02:24'),
(78, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-09 19:26:38'),
(79, 'Acceso al sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha accedido al sistema', 32, '2021-01-09 20:40:13'),
(80, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-10 13:05:27'),
(81, 'Venta', 'A', 'Se ha generado una nueva venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> 4 <br /> <b>Detalles de los productos: </b><br />[{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"4\",\"stock\":\"4\",\"precio\":\"20\",\"total\":\"80\"},{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"5\",\"precio\":\"13\",\"total\":\"13\"}] <br /> <b>Forma de pago: </b> Efectivo <br /> <b>Pago total: </b> $93 MXN', 42, '2021-01-11 10:16:42'),
(82, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de Mensajes <br /> <b>Nombre del archivo: </b>Reporte_de_Mensajes', 41, '2021-01-11 10:51:56'),
(83, 'Reportes', 'A', 'Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> Reporte de bitacora 8 de enero <br /> <b>Nombre del archivo: </b>Reporte_de_bitacora_8_de_enero', 41, '2021-01-11 13:08:21'),
(84, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-11 13:33:03'),
(85, 'Acceso al sistema', 'A', 'El usuario <b>Lionel</b> ha accedido al sistema', 40, '2021-01-11 13:33:12'),
(86, 'Cierre del sistema', 'A', 'El usuario <b>Efisoft</b> ha cerrado su sesión al sistema', 42, '2021-01-11 13:33:45'),
(87, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-11 13:33:53'),
(88, 'Transacción del Checker', 'A', '<b>Se ha Rechazado una transacción con número de Folio: </b>100485<br>Por el usuario Administrador', 41, '2021-01-11 13:35:38'),
(89, 'Cierre del sistema', 'A', 'El usuario <b>Lionel</b> ha cerrado su sesión al sistema', 40, '2021-01-11 15:54:08'),
(90, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-11 16:12:13'),
(91, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100489<br>Por el usuario Administrador', 41, '2021-01-11 18:25:03'),
(92, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100488<br>Por el usuario Administrador', 41, '2021-01-11 18:25:06'),
(93, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100487<br>Por el usuario Administrador', 41, '2021-01-11 18:25:10'),
(94, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100486<br>Por el usuario Administrador', 41, '2021-01-11 18:25:14'),
(95, 'Venta', 'A', 'Se ha generado una nueva venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> 5 <br /> <b>Detalles de los productos: </b><br />[{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"4\",\"precio\":\"13\",\"total\":\"13\"},{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"20\",\"total\":\"20\"},{\"id\":\"18\",\"descripcion\":\"Nike Air VaporMax Flyknit 3\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"3100\",\"total\":\"3100\"},{\"id\":\"16\",\"descripcion\":\"Paquete PlayStation 4 Slim 1 TB\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"10299\",\"total\":\"10299\"},{\"id\":\"11\",\"descripcion\":\"iPhone 6S\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"7299\",\"total\":\"7299\"},{\"id\":\"9\",\"descripcion\":\"iPhone 11\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"18999\",\"total\":\"18999\"}] <br /> <b>Forma de pago: </b> Efectivo <br /> <b>Pago total: </b> $47676 MXN', 41, '2021-01-11 18:29:37'),
(96, 'Cierre del sistema', 'A', 'El usuario <b>Efisoft</b> ha cerrado su sesión al sistema', 42, '2021-01-11 18:49:46'),
(97, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-11 18:49:50'),
(98, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-11 18:50:01'),
(99, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-11 18:50:40'),
(100, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-12 10:16:55'),
(101, 'Acceso al sistema', 'A', 'El usuario <b>Carlos1</b> ha accedido al sistema', 31, '2021-01-12 11:20:17'),
(102, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-14 11:07:28'),
(103, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-14 11:07:39'),
(104, 'Acceso al sistema', 'A', 'El usuario <b>Alonso12</b> ha accedido al sistema', 13, '2021-01-14 11:09:29'),
(105, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100490<br>Por el usuario Administrador', 41, '2021-01-20 13:59:23'),
(106, 'Transacción del Checker', 'A', '<b>Se ha Aplicado una transacción con número de Folio: </b>100491<br>Por el usuario Administrador', 41, '2021-01-20 14:01:53'),
(107, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-22 20:56:11'),
(108, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-23 12:12:45'),
(109, 'Venta', 'A', 'Se ha generado una nueva venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> 6 <br /> <b>Detalles de los productos: </b><br />[{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"13\",\"total\":\"13\"},{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"20\",\"total\":\"20\"}] <br /> <b>Forma de pago: </b> Efectivo <br /> <b>Pago total: </b> $33 MXN', 41, '2021-01-23 12:13:11'),
(110, 'Acceso al sistema', 'A', 'El usuario <b>Carlos1</b> ha accedido al sistema', 31, '2021-01-23 12:23:24'),
(111, 'Cierre del sistema', 'A', 'El usuario <b>Carlos1</b> ha cerrado su sesión al sistema', 31, '2021-01-23 12:24:44'),
(112, 'Acceso al sistema', 'A', 'El usuario <b>Efisoft</b> ha accedido al sistema', 42, '2021-01-23 12:24:55'),
(113, 'Cierre del sistema', 'A', 'El usuario <b>Efisoft</b> ha cerrado su sesión al sistema', 42, '2021-01-23 12:28:32'),
(114, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-23 12:29:26'),
(115, 'Acceso al sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha accedido al sistema', 32, '2021-01-23 12:29:31'),
(116, 'Cierre del sistema', 'A', 'El usuario <b>Carlos10Catzin10</b> ha cerrado su sesión al sistema', 32, '2021-01-23 12:31:24'),
(117, 'Acceso al sistema', 'A', 'El usuario <b>Administrador</b> ha accedido al sistema', 41, '2021-01-25 19:05:39'),
(118, 'Cierre del sistema', 'A', 'El usuario <b>Administrador</b> ha cerrado su sesión al sistema', 41, '2021-01-25 19:14:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL COMMENT 'Identificador de la categoría',
  `NombreCategoria` varchar(100) NOT NULL COMMENT 'Nombre de la categoría',
  `DescCategoria` text DEFAULT NULL COMMENT 'Descripción de la categoría'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `NombreCategoria`, `DescCategoria`) VALUES
(1, 'Limpieza', 'Productos de limpieza, Buenas'),
(4, 'Bimbo', 'Productos Bimbo'),
(5, 'FUD', 'Incluye jamónes, salchichas, chorizo, tocino y otras carnes frías'),
(7, 'Belleza', 'Productos de belleza'),
(8, 'Dulces', 'Sección de dulces'),
(9, 'Sabritas', 'Doritos, Ruffles, Chetos, etc'),
(11, 'LALA', 'Productos LALA'),
(12, 'Apple', 'Dispositivos IOS'),
(13, 'VideoJuegos', 'Consolas, Juegos de Video, etc'),
(14, 'Ropa Deportiva', 'Ropa Deportiva'),
(15, 'Nike', 'Productos Nike'),
(16, 'Leche', 'Leches'),
(17, 'Bimbo', 'Productos bimbo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL COMMENT 'Idenificador del cliente',
  `NombreCliente` varchar(70) DEFAULT NULL COMMENT 'Nombre(s) del cliente',
  `ApellidoCliente` varchar(70) DEFAULT NULL COMMENT 'Apellido(s) del cliente',
  `Email` varchar(100) DEFAULT NULL COMMENT 'Dirección de correo electrónico del cliente',
  `TelefonoCliente` varchar(45) DEFAULT NULL,
  `DireccionCliente` varchar(200) DEFAULT NULL COMMENT 'Dirección/Ubicación del cliente',
  `FechaNacimiento` date DEFAULT NULL COMMENT 'Fecha de nacimiento del cliente',
  `RFC` varchar(145) DEFAULT NULL,
  `TotalCompras` int(11) DEFAULT 0 COMMENT 'Número de compras que ha realizado el cliente',
  `FUltimaCompra` datetime DEFAULT NULL COMMENT 'Fecha de la últmia compra del cliente',
  `FechaRegistro` datetime DEFAULT NULL COMMENT 'Fecha de registro en el sistema del cliente',
  `Estatus` int(11) DEFAULT 1 COMMENT 'Estatus del cliente en el sistema(1=Activo, 0=Inactivo)',
  `IdUsuario` int(11) NOT NULL COMMENT 'Usuario que registra a el cliente en el sistema'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `NombreCliente`, `ApellidoCliente`, `Email`, `TelefonoCliente`, `DireccionCliente`, `FechaNacimiento`, `RFC`, `TotalCompras`, `FUltimaCompra`, `FechaRegistro`, `Estatus`, `IdUsuario`) VALUES
(1, 'Invitado', '', '', NULL, '', '0000-00-00', NULL, 9, '2021-01-11 10:16:42', '2020-10-22 07:53:00', 1, 41),
(10000004, 'Carlos Alonso', 'Vázquez', 'catzin10ficial@gmail.com', NULL, 'San Juan <br />\nMalinalco, Estado de Mexico', '1996-10-23', NULL, 22, '2021-01-23 12:13:11', '2020-10-22 11:28:00', 1, 41),
(10000006, 'Cliente Desconocido', 'Desconocido', 'catzin10ficial@gmail.com', NULL, 'Desconocido', '1996-10-22', NULL, 5, '2020-12-30 13:07:36', '2020-10-22 07:21:00', 1, 41),
(10000007, 'Toni', 'Kroos', 'tonikroos8@gmail.com', NULL, 'Calle del Tanque S/N, San Juan <br />\nMalinalco, Estado de México', '1990-11-11', NULL, 5, '2020-12-26 12:26:17', '2020-10-22 07:53:00', 1, 41),
(10000012, 'Alonso', 'Vazquez', 'catzin10ficial@gmail.com', NULL, 'Toluca de lerdo <br />\nToluca', '1996-01-07', NULL, 8, '2021-01-04 14:04:31', '2020-11-04 08:09:00', 1, 41),
(10000013, 'Carlos', 'Catzin', 'catzin10ficial@gmail.com', NULL, 'Toluca de lerdo<br />\nToluca', '1995-06-30', NULL, 7, '2020-12-30 13:10:42', '2020-12-25 08:36:00', 1, 41),
(10000014, 'Miguel', 'Aleman', 'maleman@gmail.com', NULL, 'Calle del tanque S/N, San Juan Malinalco, Estado de México', '1994-12-26', NULL, 13, '2020-12-29 16:05:29', '2020-12-26 01:03:00', 1, 41),
(10000015, 'Frenkie', 'De Jong', 'fdejong@mail.com', NULL, 'Holanda', '1998-03-12', NULL, -1, '2021-01-20 13:59:56', '2021-01-04 07:01:00', 1, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formapago`
--

CREATE TABLE `formapago` (
  `IdFormaPago` int(11) NOT NULL COMMENT 'Identificado de Forma de pago',
  `DescFormaPago` varchar(45) NOT NULL COMMENT 'Descripción de la forma de pago',
  `AbrevFormaPago` varchar(45) NOT NULL COMMENT 'Abreviación de la forma de pago',
  `FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de registro de la forma de pago',
  `Estatus` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formapago`
--

INSERT INTO `formapago` (`IdFormaPago`, `DescFormaPago`, `AbrevFormaPago`, `FechaRegistro`, `Estatus`) VALUES
(1, 'Pago en Efectivo', 'EFE', '2020-10-22 05:00:00', '1'),
(2, 'Tarjeta de crédito', 'TC', '2020-10-22 05:00:00', '1'),
(3, 'Tarjeta de débito', 'TD', '2020-10-23 02:11:11', '1'),
(4, 'Transferencia bancaria', 'TRA', '2020-12-26 03:50:15', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `IdMensajes` int(11) NOT NULL COMMENT 'Id de la sala de mensajes',
  `IdUsuarioEmisor` varchar(45) NOT NULL COMMENT 'IdUsuario que creo el buzon',
  `IdUsuarioReceptor` varchar(45) NOT NULL COMMENT 'IdUsuario que se integro en esta sala',
  `FechaCreacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`IdMensajes`, `IdUsuarioEmisor`, `IdUsuarioReceptor`, `FechaCreacion`) VALUES
(1, '32', '41', '2021-01-07 00:00:00'),
(2, '41', '32', '2021-01-07 00:00:00'),
(17, '32', '20', '2021-01-07 18:21:37'),
(18, '20', '32', '2021-01-07 18:21:37'),
(19, '32', '16', '2021-01-07 18:22:27'),
(20, '16', '32', '2021-01-07 18:22:27'),
(21, '32', '40', '2021-01-07 18:22:31'),
(22, '40', '32', '2021-01-07 18:22:31'),
(23, '32', '42', '2021-01-07 18:22:37'),
(24, '42', '32', '2021-01-07 18:22:37'),
(25, '32', '13', '2021-01-07 18:39:37'),
(26, '13', '32', '2021-01-07 18:39:38'),
(27, '32', '31', '2021-01-07 18:40:43'),
(28, '31', '32', '2021-01-07 18:40:44'),
(29, '32', '30', '2021-01-07 21:38:35'),
(30, '30', '32', '2021-01-07 21:38:35'),
(31, '41', '13', '2021-01-08 10:56:58'),
(32, '13', '41', '2021-01-08 10:56:58'),
(33, '41', '20', '2021-01-08 10:58:15'),
(34, '20', '41', '2021-01-08 10:58:15'),
(35, '41', '16', '2021-01-08 11:04:08'),
(36, '16', '41', '2021-01-08 11:04:08'),
(37, '41', '31', '2021-01-08 11:04:18'),
(38, '31', '41', '2021-01-08 11:04:19'),
(39, '41', '30', '2021-01-08 11:11:11'),
(40, '30', '41', '2021-01-08 11:11:12'),
(41, '41', '40', '2021-01-08 11:11:15'),
(42, '40', '41', '2021-01-08 11:11:15'),
(43, '41', '42', '2021-01-08 11:19:19'),
(44, '42', '41', '2021-01-08 11:19:19'),
(45, '30', '40', '2021-01-08 15:05:52'),
(46, '40', '30', '2021-01-08 15:05:52'),
(47, '41', '[object HTMLInputElement]', '2021-01-09 19:04:48'),
(48, '[object HTMLInputElement]', '41', '2021-01-09 19:04:49'),
(49, '42', '40', '2021-01-11 13:30:45'),
(50, '40', '42', '2021-01-11 13:30:45'),
(51, '42', '30', '2021-01-11 13:30:51'),
(52, '30', '42', '2021-01-11 13:30:52'),
(53, '42', '16', '2021-01-11 13:30:54'),
(54, '16', '42', '2021-01-11 13:30:54'),
(55, '40', '20', '2021-01-11 13:33:19'),
(56, '20', '40', '2021-01-11 13:33:19'),
(57, '40', '13', '2021-01-11 13:33:21'),
(58, '13', '40', '2021-01-11 13:33:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_details`
--

CREATE TABLE `mensajes_details` (
  `IdMensajeDetails` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL COMMENT 'IdUsuario que envia el mensaje',
  `Mensaje` text NOT NULL,
  `ArchivoURL` varchar(145) DEFAULT NULL,
  `IdMensajes` int(11) NOT NULL COMMENT 'ID del Buzon',
  `FechaEnvio` datetime NOT NULL COMMENT 'Fecha de envio del mensaje',
  `Leido` int(1) DEFAULT 0 COMMENT 'Leido = 1, No leido = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes_details`
--

INSERT INTO `mensajes_details` (`IdMensajeDetails`, `IdUsuario`, `Mensaje`, `ArchivoURL`, `IdMensajes`, `FechaEnvio`, `Leido`) VALUES
(1, 32, 'Hola esta es una prueba de un mensaje', NULL, 1, '2021-01-07 00:00:00', 1),
(2, 32, 'Hola esta es una prueba de un mensaje', NULL, 2, '2021-01-07 00:00:00', 1),
(3, 41, 'HOLA COMO ESTAS', NULL, 1, '2021-01-07 00:00:00', 1),
(4, 41, 'HOLA COMO ESTAS', NULL, 2, '2021-01-07 00:00:00', 1),
(7, 20, 'Hola gallero', NULL, 33, '2021-01-08 13:54:14', 0),
(8, 20, 'Hola gallero', NULL, 34, '2021-01-08 13:54:14', 1),
(9, 20, 'Como estas?', NULL, 33, '2021-01-08 13:54:26', 0),
(10, 20, 'Como estas?', NULL, 34, '2021-01-08 13:54:26', 1),
(11, 13, 'Hola banda', NULL, 31, '2021-01-08 13:55:59', 1),
(12, 13, 'Hola banda', NULL, 32, '2021-01-08 13:55:59', 1),
(13, 30, 'Prueba de mensaje', NULL, 39, '2021-01-08 13:58:23', 0),
(14, 30, 'Prueba de mensaje', NULL, 40, '2021-01-08 13:58:23', 0),
(15, 30, 'Te mando una prueba de mensaje', NULL, 39, '2021-01-08 14:01:09', 0),
(16, 30, 'Te mando una prueba de mensaje', NULL, 40, '2021-01-08 14:01:09', 0),
(17, 13, 'Contesta', NULL, 31, '2021-01-08 14:50:44', 1),
(18, 13, 'Contesta', NULL, 32, '2021-01-08 14:50:44', 1),
(19, 13, 'Contesta', NULL, 31, '2021-01-08 14:50:49', 1),
(20, 13, 'Contesta', NULL, 32, '2021-01-08 14:50:49', 1),
(21, 13, 'Rapido Cabron', NULL, 31, '2021-01-08 14:50:55', 1),
(22, 13, 'Rapido Cabron', NULL, 32, '2021-01-08 14:50:55', 1),
(23, 13, 'Nmms contesta ya', NULL, 31, '2021-01-08 14:51:03', 1),
(24, 13, 'Nmms contesta ya', NULL, 32, '2021-01-08 14:51:03', 1),
(25, 13, 'Rapido', NULL, 31, '2021-01-08 14:51:10', 1),
(26, 13, 'Rapido', NULL, 32, '2021-01-08 14:51:10', 1),
(27, 41, 'Hola Administrador, necesito que me envie el reporte de ventas de este mes', NULL, 40, '2021-01-08 14:52:45', 1),
(28, 41, 'Hola Administrador, necesito que me envie el reporte de ventas de este mes', NULL, 39, '2021-01-08 14:52:45', 1),
(29, 30, 'Estamos implementando el envio de archivos por este medio', NULL, 39, '2021-01-08 14:53:41', 0),
(30, 30, 'Estamos implementando el envio de archivos por este medio', NULL, 40, '2021-01-08 14:53:42', 0),
(31, 30, 'Necesita esperarnos al menos dos semanas', NULL, 39, '2021-01-08 14:53:51', 0),
(32, 30, 'Necesita esperarnos al menos dos semanas', NULL, 40, '2021-01-08 14:53:51', 0),
(33, 41, 'Ok podemos tener una junta para tratar este tema por favor', NULL, 40, '2021-01-08 14:54:42', 1),
(34, 41, 'Ok podemos tener una junta para tratar este tema por favor', NULL, 39, '2021-01-08 14:54:42', 1),
(35, 20, 'Contesta gallo', NULL, 33, '2021-01-08 14:57:54', 0),
(36, 20, 'Contesta gallo', NULL, 34, '2021-01-08 14:57:54', 1),
(37, 30, 'Me parece muy bien aceptamos', NULL, 39, '2021-01-08 15:04:04', 0),
(38, 30, 'Me parece muy bien aceptamos', NULL, 40, '2021-01-08 15:04:04', 0),
(39, 30, 'Le envio el link de la junta mañana', NULL, 39, '2021-01-08 15:04:41', 0),
(40, 30, 'Le envio el link de la junta mañana', NULL, 40, '2021-01-08 15:04:41', 0),
(41, 41, 'Perfecto me parece muy bien', NULL, 40, '2021-01-08 15:07:01', 1),
(42, 41, 'Perfecto me parece muy bien', NULL, 39, '2021-01-08 15:07:02', 1),
(43, 30, 'Hasta luego', NULL, 39, '2021-01-08 16:21:39', 0),
(44, 30, 'Hasta luego', NULL, 40, '2021-01-08 16:21:39', 0),
(45, 20, 'Te mando el reporte de checker aplicados', NULL, 33, '2021-01-08 18:06:17', 0),
(46, 20, 'Te mando el reporte de checker aplicados', NULL, 34, '2021-01-08 18:06:17', 1),
(47, 20, 'Te envio el reporte de ventas Enero 2021', 'Reporte_de_venta_07-01-2021.xls', 33, '2021-01-08 18:07:30', 0),
(48, 20, 'Te envio el reporte de ventas Enero 2021', 'Reporte_de_venta_07-01-2021.xls', 34, '2021-01-08 18:07:30', 1),
(49, 42, 'Buenas tardes te mando la bitacora del dia 6 de enero', 'Reporte_de_Bitácora_06-01-2021.xls', 43, '2021-01-08 18:15:08', 1),
(50, 42, 'Buenas tardes te mando la bitacora del dia 6 de enero', 'Reporte_de_Bitácora_06-01-2021.xls', 44, '2021-01-08 18:15:08', 1),
(51, 42, 'saludos', '', 43, '2021-01-08 18:15:14', 1),
(52, 42, 'saludos', '', 44, '2021-01-08 18:15:14', 1),
(53, 41, 'Hola muchas gracias yo te envio esto', '20200224_091904.jpg', 44, '2021-01-08 18:18:33', 1),
(54, 41, 'Hola muchas gracias yo te envio esto', '20200224_091904.jpg', 43, '2021-01-08 18:18:33', 1),
(55, 42, 'Gracias, Revisa esto por favor', 'Pendientes_del_checker_JULIO_2020_07-01-2021.xls', 43, '2021-01-08 18:20:09', 1),
(56, 42, 'Gracias, Revisa esto por favor', 'Pendientes_del_checker_JULIO_2020_07-01-2021.xls', 44, '2021-01-08 18:20:09', 1),
(57, 41, 'Si', '', 44, '2021-01-08 18:21:05', 1),
(58, 41, 'Si', '', 43, '2021-01-08 18:21:05', 1),
(59, 42, 'Necesito encontrar a quien genero este archivo, ¿Me apoyas por favor?', 'BORRAR_VENTAS_07-01-2021.xls', 43, '2021-01-08 18:22:02', 1),
(60, 42, 'Necesito encontrar a quien genero este archivo, ¿Me apoyas por favor?', 'BORRAR_VENTAS_07-01-2021.xls', 44, '2021-01-08 18:22:02', 1),
(61, 42, 'Hola', '', 43, '2021-01-08 19:01:21', 1),
(62, 42, 'Hola', '', 44, '2021-01-08 19:01:21', 1),
(63, 41, 'Hola', '', 44, '2021-01-08 19:01:45', 1),
(64, 41, 'Hola', '', 43, '2021-01-08 19:01:45', 1),
(65, 42, 'Me apoyas con lo de arriba por favor', '', 43, '2021-01-08 19:02:57', 1),
(66, 42, 'Me apoyas con lo de arriba por favor', '', 44, '2021-01-08 19:02:57', 1),
(67, 41, 'Claro que si con gusto', '', 44, '2021-01-08 19:03:33', 1),
(68, 41, 'Claro que si con gusto', '', 43, '2021-01-08 19:03:33', 1),
(69, 16, 'Hola disculpa me das tu nombre real por favor', '', 35, '2021-01-08 19:04:52', 0),
(70, 16, 'Hola disculpa me das tu nombre real por favor', '', 36, '2021-01-08 19:04:52', 0),
(71, 41, 'Hora loco', '', 44, '2021-01-08 19:55:33', 1),
(72, 41, 'Hora loco', '', 43, '2021-01-08 19:55:33', 1),
(73, 42, 'Perdon???', '', 43, '2021-01-08 20:16:12', 1),
(74, 42, 'Perdon???', '', 44, '2021-01-08 20:16:12', 1),
(75, 42, 'Tu carta de renuncia favor de firmarla', 'BoardingPass_HFZHSK.pdf', 43, '2021-01-08 20:16:33', 1),
(76, 42, 'Tu carta de renuncia favor de firmarla', 'BoardingPass_HFZHSK.pdf', 44, '2021-01-08 20:16:33', 1),
(77, 32, 'Ya me corrieron cabronnnnnnnnnnnnnn', '', 24, '2021-01-08 20:17:58', 1),
(78, 32, 'Ya me corrieron cabronnnnnnnnnnnnnn', '', 23, '2021-01-08 20:17:58', 1),
(79, 42, 'Y eso por que', '', 23, '2021-01-08 20:18:44', 1),
(80, 42, 'Y eso por que', '', 24, '2021-01-08 20:18:45', 1),
(81, 42, '??', '', 23, '2021-01-08 20:18:48', 1),
(82, 42, '??', '', 24, '2021-01-08 20:18:48', 1),
(83, 32, 'Por esto', 'Captura.PNG', 24, '2021-01-08 20:19:52', 1),
(84, 32, 'Por esto', 'Captura.PNG', 23, '2021-01-08 20:19:52', 1),
(85, 42, 'Nmmmmmmmmmmmmms valio madressssssssss kjhsadhasdhsjdkljlsajdkljk sakdjsajdjklk askdljsadkljklsajd kjdlkjaskldj ljsdsajdlkjlk', '', 23, '2021-01-08 20:20:43', 1),
(86, 42, 'Nmmmmmmmmmmmmms valio madressssssssss kjhsadhasdhsjdkljlsajdkljk sakdjsajdjklk askdljsadkljklsajd kjdlkjaskldj ljsdsajdlkjlk', '', 24, '2021-01-08 20:20:43', 1),
(87, 32, 'Jajaaaaaajajajajjaj si ya ni modos', '', 24, '2021-01-08 20:34:46', 1),
(88, 32, 'Jajaaaaaajajajajjaj si ya ni modos', '', 23, '2021-01-08 20:34:46', 1),
(89, 32, 'Checa esto', 'wpautorizareactivacionfisos.txt', 24, '2021-01-08 20:35:04', 1),
(90, 32, 'Checa esto', 'wpautorizareactivacionfisos.txt', 23, '2021-01-08 20:35:04', 1),
(91, 32, 'Contesta', '', 24, '2021-01-09 10:41:37', 1),
(92, 32, 'Contesta', '', 23, '2021-01-09 10:41:37', 1),
(93, 41, 'Hola gracias por el mensaje', '', 44, '2021-01-09 13:45:02', 1),
(94, 41, 'Hola gracias por el mensaje', '', 43, '2021-01-09 13:45:02', 1),
(95, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:18', 1),
(96, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:18', 1),
(97, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:21', 1),
(98, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:21', 1),
(99, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:23', 1),
(100, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:23', 1),
(101, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:24', 1),
(102, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:24', 1),
(103, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:24', 1),
(104, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:24', 1),
(105, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:24', 1),
(106, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:24', 1),
(107, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:25', 1),
(108, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:25', 1),
(109, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:26', 1),
(110, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:26', 1),
(111, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:26', 1),
(112, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:26', 1),
(113, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:52:59', 1),
(114, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:52:59', 1),
(115, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:00', 1),
(116, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:00', 1),
(117, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:00', 1),
(118, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:00', 1),
(119, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:00', 1),
(120, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:00', 1),
(121, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:01', 1),
(122, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:01', 1),
(123, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:02', 1),
(124, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:02', 1),
(125, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:02', 1),
(126, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:02', 1),
(127, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:02', 1),
(128, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:02', 1),
(129, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:09', 1),
(130, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:09', 1),
(131, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:09', 1),
(132, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:10', 1),
(133, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:10', 1),
(134, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:10', 1),
(135, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:10', 1),
(136, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:10', 1),
(137, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:10', 1),
(138, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:10', 1),
(139, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:11', 1),
(140, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:11', 1),
(141, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:12', 1),
(142, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:12', 1),
(143, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:13', 1),
(144, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:13', 1),
(145, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:13', 1),
(146, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:13', 1),
(147, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:13', 1),
(148, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:13', 1),
(149, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:13', 1),
(150, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:13', 1),
(151, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:13', 1),
(152, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:14', 1),
(153, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:14', 1),
(154, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:14', 1),
(155, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:14', 1),
(156, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:14', 1),
(157, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 43, '2021-01-09 16:53:17', 1),
(158, 42, 'Te envio el documento que para guiarnos en las nuevas pantallas que necesitamos', 'Boceto Pantallas Parámetros COMISIONES.docx', 44, '2021-01-09 16:53:17', 1),
(159, 42, 'Hola ya funciona?', '', 43, '2021-01-09 16:58:03', 1),
(160, 42, 'Hola ya funciona?', '', 44, '2021-01-09 16:58:03', 1),
(161, 16, 'Hola ya funciona??', '', 35, '2021-01-09 16:58:25', 0),
(162, 16, 'Hola ya funciona??', '', 36, '2021-01-09 16:58:25', 0),
(163, 16, 'Suplementos', 'P. de suplementacion hombres hectomorfos.pdf', 35, '2021-01-09 16:59:07', 0),
(164, 16, 'Suplementos', 'P. de suplementacion hombres hectomorfos.pdf', 36, '2021-01-09 16:59:07', 0),
(165, 20, 'Hola ya funciona', 'COMIDAS HOMBRES HECTOMORFOS.pdf', 33, '2021-01-09 18:52:38', 0),
(166, 20, 'Hola ya funciona', 'COMIDAS HOMBRES HECTOMORFOS.pdf', 34, '2021-01-09 18:52:38', 0),
(167, 30, 'Hola', '', 39, '2021-01-09 18:54:43', 0),
(168, 30, 'Hola', '', 40, '2021-01-09 18:54:43', 0),
(169, 30, 'Ya funciona', 'P. de suplementacion hombres hectomorfos.pdf', 39, '2021-01-09 18:54:53', 0),
(170, 30, 'Ya funciona', 'P. de suplementacion hombres hectomorfos.pdf', 40, '2021-01-09 18:54:53', 0),
(171, 41, 'Hola tu dime', '', 44, '2021-01-09 19:01:51', 1),
(172, 41, 'Hola tu dime', '', 43, '2021-01-09 19:01:51', 1),
(173, 41, 'Hola tu dime', '', 44, '2021-01-09 19:01:53', 1),
(174, 41, 'Hola tu dime', '', 43, '2021-01-09 19:01:53', 1),
(175, 42, 'Te hablo???', '', 43, '2021-01-09 19:02:45', 1),
(176, 42, 'Te hablo???', '', 44, '2021-01-09 19:02:45', 1),
(177, 41, 'Creo que no', '', 44, '2021-01-09 19:03:09', 1),
(178, 41, 'Creo que no', '', 43, '2021-01-09 19:03:09', 1),
(179, 42, 'No', '', 43, '2021-01-09 19:03:22', 1),
(180, 42, 'No', '', 44, '2021-01-09 19:03:22', 1),
(181, 42, 'Esperamos', '', 43, '2021-01-09 19:07:43', 1),
(182, 42, 'Esperamos', '', 44, '2021-01-09 19:07:43', 1),
(183, 41, 'Haber checa', '', 44, '2021-01-09 19:07:57', 1),
(184, 41, 'Haber checa', '', 43, '2021-01-09 19:07:57', 1),
(185, 42, 'Hola', '', 43, '2021-01-09 19:11:24', 1),
(186, 42, 'Hola', '', 44, '2021-01-09 19:11:24', 1),
(187, 42, 'Checa tus mensajes', '', 43, '2021-01-09 19:26:16', 1),
(188, 42, 'Checa tus mensajes', '', 44, '2021-01-09 19:26:16', 1),
(189, 41, 'Que paso??', '', 44, '2021-01-09 19:26:56', 1),
(190, 41, 'Que paso??', '', 43, '2021-01-09 19:26:56', 1),
(191, 42, 'Hola', '', 43, '2021-01-09 19:32:36', 1),
(192, 42, 'Hola', '', 44, '2021-01-09 19:32:37', 1),
(193, 41, 'Hola', '', 44, '2021-01-09 19:32:41', 1),
(194, 41, 'Hola', '', 43, '2021-01-09 19:32:41', 1),
(195, 41, 'Hola', '', 44, '2021-01-09 19:34:25', 1),
(196, 41, 'Hola', '', 43, '2021-01-09 19:34:25', 1),
(197, 41, 'Hola', '', 44, '2021-01-09 19:34:49', 1),
(198, 41, 'Hola', '', 43, '2021-01-09 19:34:49', 1),
(199, 41, 'Hola', '', 44, '2021-01-09 19:40:04', 1),
(200, 41, 'Hola', '', 43, '2021-01-09 19:40:04', 1),
(201, 41, 'Contesta', '', 44, '2021-01-09 19:42:13', 1),
(202, 41, 'Contesta', '', 43, '2021-01-09 19:42:13', 1),
(203, 41, 'Hola', '', 44, '2021-01-09 19:46:15', 1),
(204, 41, 'Hola', '', 43, '2021-01-09 19:46:15', 1),
(205, 41, 'Ya??', '', 44, '2021-01-09 19:51:39', 1),
(206, 41, 'Ya??', '', 43, '2021-01-09 19:51:39', 1),
(207, 41, 'ahora??', '', 44, '2021-01-09 19:53:08', 1),
(208, 41, 'ahora??', '', 43, '2021-01-09 19:53:08', 1),
(209, 41, 'No???', '', 44, '2021-01-09 19:55:37', 1),
(210, 41, 'No???', '', 43, '2021-01-09 19:55:37', 1),
(211, 41, 'Nada??', '', 44, '2021-01-09 19:58:42', 1),
(212, 41, 'Nada??', '', 43, '2021-01-09 19:58:42', 1),
(213, 42, 'No funciona', '', 43, '2021-01-09 19:59:34', 1),
(214, 42, 'No funciona', '', 44, '2021-01-09 19:59:35', 1),
(215, 41, 'Me lleva', '', 44, '2021-01-09 19:59:42', 1),
(216, 41, 'Me lleva', '', 43, '2021-01-09 19:59:42', 1),
(217, 41, 'Nomas nada', '', 44, '2021-01-09 20:37:05', 1),
(218, 41, 'Nomas nada', '', 43, '2021-01-09 20:37:05', 1),
(219, 41, 'Hola', '', 1, '2021-01-09 20:40:33', 1),
(220, 41, 'Hola', '', 2, '2021-01-09 20:40:34', 1),
(221, 32, 'Hola', '', 2, '2021-01-10 12:48:37', 1),
(222, 32, 'Hola', '', 1, '2021-01-10 12:48:37', 1),
(223, 41, 'Hola', '', 1, '2021-01-10 12:48:42', 1),
(224, 41, 'Hola', '', 2, '2021-01-10 12:48:42', 1),
(225, 41, 'Eyyy!!!', '', 1, '2021-01-10 12:49:51', 1),
(226, 41, 'Eyyy!!!', '', 2, '2021-01-10 12:49:51', 1),
(227, 41, '...', '', 1, '2021-01-10 12:52:19', 1),
(228, 41, '...', '', 2, '2021-01-10 12:52:19', 1),
(229, 42, 'No jala', '', 43, '2021-01-10 13:07:06', 1),
(230, 42, 'No jala', '', 44, '2021-01-10 13:07:06', 1),
(231, 41, 'Vale madres', '', 44, '2021-01-10 13:07:19', 1),
(232, 41, 'Vale madres', '', 43, '2021-01-10 13:07:19', 1),
(233, 42, 'Siii', '', 43, '2021-01-10 13:07:30', 1),
(234, 42, 'Siii', '', 44, '2021-01-10 13:07:30', 1),
(235, 41, 'Hola', '', 44, '2021-01-10 13:13:31', 1),
(236, 41, 'Hola', '', 43, '2021-01-10 13:13:31', 1),
(237, 42, 'Cambios', 'cambios.txt', 43, '2021-01-10 13:15:24', 1),
(238, 42, 'Cambios', 'cambios.txt', 44, '2021-01-10 13:15:24', 1),
(239, 41, 'Gracias', '', 44, '2021-01-11 12:41:09', 1),
(240, 41, 'Gracias', '', 43, '2021-01-11 12:41:10', 1),
(241, 41, 'Gracias', '', 44, '2021-01-11 12:46:20', 1),
(242, 41, 'Gracias', '', 43, '2021-01-11 12:46:20', 1),
(243, 41, 'Hola', '', 44, '2021-01-11 13:00:41', 1),
(244, 41, 'Hola', '', 43, '2021-01-11 13:00:42', 1),
(245, 42, 'Hola', '', 43, '2021-01-11 13:00:47', 1),
(246, 42, 'Hola', '', 44, '2021-01-11 13:00:47', 1),
(247, 41, 'Como estas???', '', 44, '2021-01-11 13:01:04', 1),
(248, 41, 'Como estas???', '', 43, '2021-01-11 13:01:04', 1),
(249, 42, 'Muy bien y tu?', '', 43, '2021-01-11 13:01:13', 1),
(250, 42, 'Muy bien y tu?', '', 44, '2021-01-11 13:01:13', 1),
(251, 41, 'Igualmente muy bien', '', 44, '2021-01-11 13:01:28', 1),
(252, 41, 'Igualmente muy bien', '', 43, '2021-01-11 13:01:28', 1),
(253, 42, 'Eso es bueno', '', 43, '2021-01-11 13:01:45', 1),
(254, 42, 'Eso es bueno', '', 44, '2021-01-11 13:01:45', 1),
(255, 41, 'Oye un pregunta??', '', 44, '2021-01-11 13:02:02', 1),
(256, 41, 'Oye un pregunta??', '', 43, '2021-01-11 13:02:02', 1),
(257, 42, 'Claro que si dime en que te ayudo??', '', 43, '2021-01-11 13:02:17', 1),
(258, 42, 'Claro que si dime en que te ayudo??', '', 44, '2021-01-11 13:02:17', 1),
(259, 41, 'Podrias crear un reporte de bitacora del dia viernes 8 de enero por favor??', '', 44, '2021-01-11 13:03:18', 1),
(260, 41, 'Podrias crear un reporte de bitacora del dia viernes 8 de enero por favor??', '', 43, '2021-01-11 13:03:18', 1),
(261, 42, 'Claro que si con gusto!!!', '', 43, '2021-01-11 13:06:01', 1),
(262, 42, 'Claro que si con gusto!!!', '', 44, '2021-01-11 13:06:01', 1),
(263, 41, 'Ok, cuando podria estar listo', '', 44, '2021-01-11 13:06:14', 1),
(264, 41, 'Ok, cuando podria estar listo', '', 43, '2021-01-11 13:06:14', 1),
(265, 42, 'Pues hoy estaria listo antes de las 5 de la tarde', '', 43, '2021-01-11 13:06:42', 1),
(266, 42, 'Pues hoy estaria listo antes de las 5 de la tarde', '', 44, '2021-01-11 13:06:42', 1),
(267, 41, 'Me parece muy bien gracias', '', 44, '2021-01-11 13:06:54', 1),
(268, 41, 'Me parece muy bien gracias', '', 43, '2021-01-11 13:06:54', 1),
(269, 42, 'Por nada', '', 43, '2021-01-11 13:07:04', 1),
(270, 42, 'Por nada', '', 44, '2021-01-11 13:07:04', 1),
(271, 42, 'Oye Efisoft, ya revise el reporte pero en el dia 8 no hay transacciones', '', 43, '2021-01-11 13:09:16', 1),
(272, 42, 'Oye Efisoft, ya revise el reporte pero en el dia 8 no hay transacciones', '', 44, '2021-01-11 13:09:16', 1),
(273, 41, 'Bueno entonces de todo el mes de enero, bueno del 1 al 11 de enero por fa', '', 44, '2021-01-11 13:09:40', 1),
(274, 41, 'Bueno entonces de todo el mes de enero, bueno del 1 al 11 de enero por fa', '', 43, '2021-01-11 13:09:41', 1),
(275, 42, 'OK', '', 43, '2021-01-11 13:09:49', 1),
(276, 42, 'OK', '', 44, '2021-01-11 13:09:49', 1),
(277, 42, 'Te envio el reporte en Excel', 'Reporte_de_bitacora_mes_enero_11-01-2021.xls', 43, '2021-01-11 13:12:10', 1),
(278, 42, 'Te envio el reporte en Excel', 'Reporte_de_bitacora_mes_enero_11-01-2021.xls', 44, '2021-01-11 13:12:10', 1),
(279, 41, 'Muchas gracias saludos', '', 44, '2021-01-11 13:12:35', 1),
(280, 41, 'Muchas gracias saludos', '', 43, '2021-01-11 13:12:35', 1),
(281, 41, 'Hola', '', 42, '2021-01-11 13:33:29', 1),
(282, 41, 'Hola', '', 41, '2021-01-11 13:33:29', 1),
(283, 40, 'Hola', '', 41, '2021-01-11 13:34:08', 1),
(284, 40, 'Hola', '', 42, '2021-01-11 13:34:08', 1),
(285, 41, 'Hola', '', 44, '2021-01-11 16:12:56', 1),
(286, 41, 'Hola', '', 43, '2021-01-11 16:12:56', 1),
(287, 42, 'Hola', '', 43, '2021-01-11 16:15:29', 1),
(288, 42, 'Hola', '', 44, '2021-01-11 16:15:29', 1),
(289, 42, 'Que estas haciendo', '', 43, '2021-01-11 16:15:49', 1),
(290, 42, 'Que estas haciendo', '', 44, '2021-01-11 16:15:49', 1),
(291, 42, 'Holllllllllllllllllllllllllaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', 43, '2021-01-11 16:29:17', 1),
(292, 42, 'Holllllllllllllllllllllllllaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', 44, '2021-01-11 16:29:17', 1),
(293, 41, 'Que paso', '', 44, '2021-01-11 16:33:00', 1),
(294, 41, 'Que paso', '', 43, '2021-01-11 16:33:00', 1),
(295, 41, 'Trabajando', '', 44, '2021-01-11 16:33:06', 1),
(296, 41, 'Trabajando', '', 43, '2021-01-11 16:33:06', 1),
(297, 42, 'Bueno', '', 43, '2021-01-11 16:33:20', 1),
(298, 42, 'Bueno', '', 44, '2021-01-11 16:33:20', 1),
(299, 41, 'Nomas eso querias', '', 44, '2021-01-11 16:33:38', 1),
(300, 41, 'Nomas eso querias', '', 43, '2021-01-11 16:33:38', 1),
(301, 41, 'no manches', '', 44, '2021-01-11 16:33:41', 1),
(302, 41, 'no manches', '', 43, '2021-01-11 16:33:41', 1),
(303, 41, 'no estes quitando el tiempo', '', 44, '2021-01-11 16:33:47', 1),
(304, 41, 'no estes quitando el tiempo', '', 43, '2021-01-11 16:33:47', 1),
(305, 42, 'Gracias', '', 43, '2021-01-11 16:38:12', 1),
(306, 42, 'Gracias', '', 44, '2021-01-11 16:38:12', 1),
(307, 42, 'Muchas', '', 43, '2021-01-11 16:38:22', 1),
(308, 42, 'Muchas', '', 44, '2021-01-11 16:38:22', 1),
(309, 42, 'Hay estamos', '', 43, '2021-01-11 16:38:29', 1),
(310, 42, 'Hay estamos', '', 44, '2021-01-11 16:38:29', 1),
(311, 41, 'Hola', 'Copia de Formato Cadena MAKER_CHEKER.xls', 44, '2021-01-11 16:40:07', 1),
(312, 41, 'Hola', 'Copia de Formato Cadena MAKER_CHEKER.xls', 43, '2021-01-11 16:40:07', 1),
(313, 42, 'Gracias', '', 43, '2021-01-11 18:31:25', 1),
(314, 42, 'Gracias', '', 44, '2021-01-11 18:31:25', 1),
(315, 31, 'Hola', '20200424_230012.jpg', 37, '2021-01-12 11:20:02', 1),
(316, 31, 'Hola', '20200424_230012.jpg', 38, '2021-01-12 11:20:02', 1),
(317, 41, 'Hola', '', 38, '2021-01-12 11:20:53', 1),
(318, 41, 'Hola', '', 37, '2021-01-12 11:20:53', 1),
(319, 31, 'Hola', '', 37, '2021-01-12 11:21:11', 1),
(320, 31, 'Hola', '', 38, '2021-01-12 11:21:11', 1),
(321, 41, 'Gracias', '', 38, '2021-01-12 12:18:24', 1),
(322, 41, 'Gracias', '', 37, '2021-01-12 12:18:24', 1),
(323, 41, 'Que paso me acaban de regresar mi acceso', '', 32, '2021-01-14 11:10:16', 1),
(324, 41, 'Que paso me acaban de regresar mi acceso', '', 31, '2021-01-14 11:10:16', 1),
(325, 13, 'Ohhh bueno bueno oye que puesto tienes??', '', 31, '2021-01-14 11:10:48', 1),
(326, 13, 'Ohhh bueno bueno oye que puesto tienes??', '', 32, '2021-01-14 11:10:49', 1),
(327, 41, 'Administrador', '', 32, '2021-01-14 11:22:19', 1),
(328, 41, 'Administrador', '', 31, '2021-01-14 11:22:19', 1),
(329, 41, 'Administrador', '', 32, '2021-01-14 11:23:43', 1),
(330, 41, 'Administrador', '', 31, '2021-01-14 11:23:43', 1),
(331, 41, 'Hola', '', 44, '2021-01-23 12:25:13', 1),
(332, 41, 'Hola', '', 43, '2021-01-23 12:25:13', 1),
(333, 42, 'Hola buenas tardes', '', 43, '2021-01-23 12:25:38', 1),
(334, 42, 'Hola buenas tardes', '', 44, '2021-01-23 12:25:38', 1),
(335, 42, 'En que te puedo ayudar??', '', 43, '2021-01-23 12:25:49', 1),
(336, 42, 'En que te puedo ayudar??', '', 44, '2021-01-23 12:25:49', 1),
(337, 41, 'Podrias aplicar la transaccion del cheker en la edicion del cliente Joshua por favor', '', 44, '2021-01-23 12:27:05', 1),
(338, 41, 'Podrias aplicar la transaccion del cheker en la edicion del cliente Joshua por favor', '', 43, '2021-01-23 12:27:05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pendientes`
--

CREATE TABLE `pendientes` (
  `IdPendiente` int(11) NOT NULL COMMENT 'Identificador del checker',
  `Operacion` varchar(100) DEFAULT NULL COMMENT 'Nombre de la operación ejecutada',
  `Ruta` varchar(100) DEFAULT NULL COMMENT 'Ruta de la página donde se realizo el movimiento',
  `IdUsuarioEject` int(11) NOT NULL COMMENT 'Usuario que ejecutó el movimiento',
  `IdUsuarioAplic` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario que aplica/rechaza el movimiento',
  `Consulta` text DEFAULT NULL COMMENT 'Consulta SQL de la operación',
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación del mvimiento',
  `Estatus` int(2) DEFAULT 1 COMMENT 'Estatus del movimiento: 1=Activo 2=Aplicado 3=Cancelado ',
  `DescQuery` text DEFAULT NULL COMMENT 'Descripcion HTML de la transacción'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pendientes`
--

INSERT INTO `pendientes` (`IdPendiente`, `Operacion`, `Ruta`, `IdUsuarioEject`, `IdUsuarioAplic`, `Consulta`, `Fecha`, `Estatus`, `DescQuery`) VALUES
(100348, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (342423324,\'Jamón\',\'Jamón FUD\',5,\'15\',\'1036033_S_1280_F.png\',\'9.00\',\'15.00\',\'41\',\'2020-07-25 19:21:05\')', '2020-07-26 00:21:23', 2, '<b>Código: </b>342423324 <br> <b>Nombre del producto: </b>Jamón <br> <b>Descripción: </b>Jamón FUD <br> <b>Disponibles: </b>15 productos <br> <b>Imagen: </b><img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$9.00 MXN <b>Precio de Venta: </b>$15.00 MXN<br> <b>Fecha de creación: </b>25/07/2020 7:21 pm'),
(100349, 'Editar Categoría', 'categorias', 41, 41, 'UPDATE categorias SET NombreCategoria=\'Apple\', DescCategoria=\'Dispositivos IOS\' WHERE IdCategoria=12', '2020-07-26 00:22:15', 2, '<b>Nombre de la categoría: </b>Apple <br> <b>Descripción de la categoría: </b>Dispositivos IOS <br> <b>Fecha de modificación: </b>25/07/2020 7:22 pm'),
(100351, 'Editar Usuario', 'usuarios', 41, 41, 'UPDATE usuarios SET Nombre=\'Carlos Catzin\', Estatus=\'0\' WHERE IdUsuario=40', '2020-07-26 03:35:10', 2, '<b>Modificación de nombre: </b>Carlos Catzin <br> <b>Modificación de Estatus: </b>Inactivo <br>'),
(100352, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'7\'', '2020-07-27 15:49:43', 2, '<b>Código del producto: </b>342423324 <br><b>Nombre del producto: </b>Jamón <br> <b>Descripción: </b>Jamón FUD <br><img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' heigth=\'65\'> '),
(100353, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'5\'', '2020-07-27 15:49:46', 2, '<b>Código del producto: </b>342412344 <br><b>Nombre del producto: </b>Telcel Apple iPhone 11 <br> <b>Descripción: </b>64 GB Color Purple <br><img src=\'views/images/productos/2324213-1.png\' width=\'65\' heigth=\'65\'> '),
(100354, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'6\'', '2020-07-27 15:49:48', 2, '<b>Código del producto: </b>23432121 <br><b>Nombre del producto: </b>Escoba <br> <b>Descripción: </b>XPER Escoba <br><img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' heigth=\'65\'> '),
(100355, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'4\'', '2020-07-27 15:49:51', 2, '<b>Código del producto: </b>3486988 <br><b>Nombre del producto: </b>Fabuloso <br> <b>Descripción: </b>Pasión De Frutas Limpiador Líquido Antibacterial, 1L, Verde <br><img src=\'views/images/productos/81t99u6-rkL._AC_SY879_.jpg\' width=\'65\' heigth=\'65\'> '),
(100356, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'3\'', '2020-07-27 15:49:54', 2, '<b>Código del producto: </b>123456 <br><b>Nombre del producto: </b>Leche Lala <br> <b>Descripción: </b>Leche Lala entera <br><img src=\'views/images/productos/7501020515343-00-CH1200Wx1200H.jpg\' width=\'65\' heigth=\'65\'> '),
(100357, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (10001,\'Escoba\',\'Escoba\',1,\'21\',\'(X)PER-ESCOBA-P200.jpg\',\'12.00\',\'18.00\',\'41\',\'2020-07-27 11:16:20\')', '2020-07-27 16:16:26', 2, '<b>Código: </b>10001 <br> <b>Nombre del producto: </b>Escoba <br> <b>Descripción: </b>Escoba <br> <b>Disponibles: </b>21 productos <br> <b>Imagen: </b><img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$12.00 MXN <b>Precio de Venta: </b>$18.00 MXN<br> <b>Fecha de creación: </b>27/07/2020 11:16 am'),
(100358, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (120001,\'iPhone 11\',\'64GB Color Morado\',12,\'3\',\'2324213-1.png\',\'14566.00\',\'18999.00\',\'41\',\'2020-07-27 14:23:00\')', '2020-07-27 19:23:08', 2, '<b>Código: </b>120001 <br> <b>Nombre del producto: </b>iPhone 11 <br> <b>Descripción: </b>64GB Color Morado <br> <b>Disponibles: </b>3 productos <br> <b>Imagen: </b><img src=\'views/images/productos/2324213-1.png\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$14566.00 MXN <b>Precio de Venta: </b>$18999.00 MXN<br> <b>Fecha de creación: </b>27/07/2020 2:23 pm'),
(100363, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'10\'', '2020-08-18 22:05:58', 3, '<b>Código del producto: </b>110001 <br><b>Nombre del producto: </b>Leche LALA <br> <b>Descripción: </b>1 Litro - Entera <br><img src=\'views/images/productos/7501020515343-00-CH1200Wx1200H.jpg\' width=\'65\' heigth=\'65\'> '),
(100364, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (120003,\'iPhone X reacondicionado\',\'64 GB reacondicionado - Gris espacial Libre\',12,\'1\',\'refurb-iphoneX-spacegray.jpg\',\'14200.00\',\'16500.00\',\'41\',\'2020-08-18 17:07:52\')', '2020-08-18 22:08:05', 2, '<b>Código: </b>120003 <br> <b>Nombre del producto: </b>iPhone X reacondicionado <br> <b>Descripción: </b>64 GB reacondicionado - Gris espacial Libre <br> <b>Disponibles: </b>1 productos <br> <b>Imagen: </b><img src=\'views/images/productos/refurb-iphoneX-spacegray.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$14200.00 MXN <b>Precio de Venta: </b>$16500.00 MXN<br> <b>Fecha de creación: </b>18/08/2020 5:07 pm'),
(100365, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'8\'', '2020-10-08 17:30:40', 2, '<b>Código del producto: </b>10001 <br><b>Nombre del producto: </b>Escoba <br> <b>Descripción: </b>Escoba <br><img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' heigth=\'65\'> '),
(100366, 'Editar Usuario', 'usuarios', 41, 41, 'UPDATE usuarios SET Nombre=\'Carlos Catzin\', Estatus=\'1\' WHERE IdUsuario=40', '2020-10-08 17:33:58', 2, '<b>Modificación de nombre: </b>Carlos Catzin <br> <b>Modificación de Estatus: </b>Activo <br>'),
(100367, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (10001,\'Escoba\',\'Escoba\',1,\'15\',\'(X)PER-ESCOBA-P200.jpg\',\'10.00\',\'16.00\',\'41\',\'2020-10-08 12:34:41\')', '2020-10-08 17:34:52', 2, '<b>Código: </b>10001 <br> <b>Nombre del producto: </b>Escoba <br> <b>Descripción: </b>Escoba <br> <b>Disponibles: </b>15 productos <br> <b>Imagen: </b><img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$10.00 MXN <b>Precio de Venta: </b>$16.00 MXN<br> <b>Fecha de creación: </b>08/10/2020 12:34 pm'),
(100368, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (50001,\'Jamón FUD\',\'amón 10 pzs\',5,\'13\',\'1036033_S_1280_F.png\',\'7.00\',\'14.00\',\'41\',\'2020-10-08 12:36:11\')', '2020-10-08 17:36:19', 2, '<b>Código: </b>50001 <br> <b>Nombre del producto: </b>Jamón FUD <br> <b>Descripción: </b>amón 10 pzs <br> <b>Disponibles: </b>13 productos <br> <b>Imagen: </b><img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$7.00 MXN <b>Precio de Venta: </b>$14.00 MXN<br> <b>Fecha de creación: </b>08/10/2020 12:36 pm'),
(100369, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'13\'', '2020-10-08 18:08:25', 3, '<b>Código del producto: </b>10001 <br><b>Nombre del producto: </b>Escoba <br> <b>Descripción: </b>Escoba <br><img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' heigth=\'65\'> '),
(100370, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'14\'', '2020-10-08 18:08:28', 3, '<b>Código del producto: </b>50001 <br><b>Nombre del producto: </b>Jamón FUD <br> <b>Descripción: </b>amón 10 pzs <br><img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' heigth=\'65\'> '),
(100371, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'10\'', '2020-10-08 18:08:31', 3, '<b>Código del producto: </b>110001 <br><b>Nombre del producto: </b>Leche LALA <br> <b>Descripción: </b>1 Litro - Entera <br><img src=\'views/images/productos/7501020515343-00-CH1200Wx1200H.jpg\' width=\'65\' heigth=\'65\'> '),
(100372, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'9\'', '2020-10-19 16:42:33', 3, '<b>Código del producto: </b>120001 <br><b>Nombre del producto: </b>iPhone 11 <br> <b>Descripción: </b>64GB Color Morado <br><img src=\'views/images/productos/2324213-1.png\' width=\'65\' heigth=\'65\'> '),
(100373, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'11\'', '2020-10-19 16:42:31', 3, '<b>Código del producto: </b>120002 <br><b>Nombre del producto: </b>iPhone 6S <br> <b>Descripción: </b>32GB Gris Espacial <br><img src=\'views/images/productos/IPHONE095_FG.jpg\' width=\'65\' heigth=\'65\'> '),
(100374, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'12\'', '2020-10-19 16:42:27', 3, '<b>Código del producto: </b>120003 <br><b>Nombre del producto: </b>iPhone X reacondicionado <br> <b>Descripción: </b>64 GB reacondicionado - Gris espacial Libre <br><img src=\'views/images/productos/refurb-iphoneX-spacegray.jpg\' width=\'65\' heigth=\'65\'> '),
(100375, 'Editar Producto', NULL, 41, 41, NULL, '2020-10-16 23:37:28', 3, '<b>Nombre de la categoría: </b> <br> <b>Descripción de la categoría: </b>Sin descripción <br> <b>Fecha de modificación: </b>16/10/2020 6:03 pm'),
(100376, 'Editar Producto', 'inventario', 41, 41, NULL, '2020-10-16 23:37:26', 3, '<b>Nombre de la categoría: </b> <br> <b>Descripción de la categoría: </b>Sin descripción <br> <b>Fecha de modificación: </b>16/10/2020 6:04 pm'),
(100377, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'50001\', NombreProducto=\'Jamón FUD\', DescProducto=\'Jamón FUD\', IdCategoria=\'5\', Stock=\'13\', PrecioCompra=\'7\', PrecioVenta=\'14\',StatusProd=\'\'WHERE IdProducto=', '2020-10-16 23:29:34', 3, '<b>Nombre del producto: </b>Jamón FUD <br> <b>Código del producto: </b>50001 <br> <b>Descripción: </b>Jamón 10 pzs <br> <b>Stock: </b>13 disponibles<br> <b>Precio de Compra: </b>$7 pesos MXN<br> <b>Precio de Venta: </b>$14 pesos MXN<br> <b>Estatus: </b>$14 pesos MXN<br> <b>Fecha de modificación: </b>16/10/2020 6:17 pm'),
(100379, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'50001\', NombreProducto=\'Jamón FUD\', DescProducto=\'Jamón FUD\', IdCategoria=\'5\', Stock=\'13\', PrecioCompra=\'7\', PrecioVenta=\'14\',StatusProd=\'undefined\'WHERE IdProducto=14', '2020-10-16 23:21:28', 3, '<img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Jamón FUD <br> <b>Código del producto: </b>50001 <br> <b>Descripción: </b>Jamón 10 pzs <br> <b>Stock: </b>13 disponibles<br> <b>Precio de Compra: </b>$7 pesos MXN<br> <b>Precio de Venta: </b>$14 pesos MXN<br> <b>Estatus: </b>$Inactivo pesos MXN<br> <b>Fecha de modificación: </b>16/10/2020 6:20 pm'),
(100380, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'50001\', NombreProducto=\'Jamón FUD\', DescProducto=\'Jamón FUD\', IdCategoria=\'5\', Stock=\'13\', PrecioCompra=\'7\', PrecioVenta=\'14\',StatusProd=\'undefined\'WHERE IdProducto=14', '2020-10-16 23:27:23', 3, '<img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Jamón FUD <br> <b>Código del producto: </b>50001 <br> <b>Descripción: </b>Jamón 10 pzs <br> <b>Stock: </b>13 disponibles<br> <b>Precio de Compra: </b>$7 pesos MXN<br> <b>Precio de Venta: </b>$14 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>16/10/2020 6:21 pm'),
(100381, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'50001\', NombreProducto=\'Jamón FUD\', DescProducto=\'Jamón FUD\', IdCategoria=\'5\', Stock=\'13\', PrecioCompra=\'7\', PrecioVenta=\'14\',StatusProd=\'undefined\' WHERE IdProducto=14', '2020-10-16 23:27:54', 2, '<img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Jamón FUD <br> <b>Código del producto: </b>50001 <br> <b>Descripción: </b>Jamón 10 pzs <br> <b>Stock: </b>13 disponibles<br> <b>Precio de Compra: </b>$7 pesos MXN<br> <b>Precio de Venta: </b>$14 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>16/10/2020 6:27 pm'),
(100382, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'50001\', NombreProducto=\'Jamón FUD\', DescProducto=\'Jamón FUD\', IdCategoria=\'5\', Stock=\'13\', PrecioCompra=\'7\', PrecioVenta=\'14\',StatusProd=\'undefined\' WHERE IdProducto=14', '2020-10-16 23:28:16', 2, '<img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Jamón FUD <br> <b>Código del producto: </b>50001 <br> <b>Descripción: </b>Jamón FUD <br> <b>Stock: </b>13 disponibles<br> <b>Precio de Compra: </b>$7 pesos MXN<br> <b>Precio de Venta: </b>$14 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>16/10/2020 6:28 pm'),
(100383, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (120004,\'iPhone 12\',\'128 GB, Color Rojo, Con Cargador tipo C\',12,\'2\',\'in_the_box__ftecp7px86q2_large.jpg\',\'21000.00\',\'26000.00\',\'41\',\'2020-10-19 11:01:07\')', '2020-10-19 16:01:43', 2, '<b>Código: </b>120004 <br> <b>Nombre del producto: </b>iPhone 12 <br> <b>Descripción: </b>128 GB, Color Rojo, Con Cargador tipo C <br> <b>Disponibles: </b>2 productos <br> <b>Imagen: </b><img src=\'views/images/productos/in_the_box__ftecp7px86q2_large.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$21000.00 MXN <b>Precio de Venta: </b>$26000.00 MXN<br> <b>Fecha de creación: </b>19/10/2020 11:01 am'),
(100384, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'50001\', NombreProducto=\'Jamón FUD\', DescProducto=\'Jamón FUD\', IdCategoria=\'5\', Stock=\'13\', PrecioCompra=\'7\', PrecioVenta=\'14\',StatusProd=undefined WHERE IdProducto=14', '2020-10-19 16:26:28', 3, '<img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Jamón FUD <br> <b>Código del producto: </b>50001 <br> <b>Descripción: </b>Jamón FUD <br> <b>Stock: </b>13 disponibles<br> <b>Precio de Compra: </b>$7 pesos MXN<br> <b>Precio de Venta: </b>$14 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>19/10/2020 11:03 am'),
(100385, 'Editar Usuario', 'usuarios', 41, 41, 'UPDATE usuarios SET Nombre=\'Lionel Messi\', Estatus=\'0\' WHERE IdUsuario=16', '2020-10-19 16:09:50', 2, '<b>Modificación de nombre: </b>Lionel Messi <br> <b>Modificación de Estatus: </b>Inactivo <br>'),
(100386, 'Editar Usuario', 'usuarios', 41, 41, 'UPDATE usuarios SET Nombre=\'Lionel Messi\', Estatus=\'1\' WHERE IdUsuario=16', '2020-10-19 16:14:12', 3, '<b>Modificación de nombre: </b>Lionel Messi <br> <b>Modificación de Estatus: </b>Activo <br>'),
(100387, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=undefined WHERE IdProducto=13', '2020-10-19 16:22:37', 3, '<img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>19/10/2020 11:14 am'),
(100388, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'18\',StatusProd=undefined WHERE IdProducto=13', '2020-10-19 16:26:25', 3, '<img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$18 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>19/10/2020 11:23 am'),
(100389, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'50001\', NombreProducto=\'Jamón FUD\', DescProducto=\'Jamón FUD\', IdCategoria=\'5\', Stock=\'13\', PrecioCompra=\'7\', PrecioVenta=\'14\',StatusProd=1 WHERE IdProducto=14', '2020-10-19 16:29:19', 2, '<img src=\'views/images/productos/1036033_S_1280_F.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Jamón FUD <br> <b>Código del producto: </b>50001 <br> <b>Descripción: </b>Jamón FUD <br> <b>Stock: </b>13 disponibles<br> <b>Precio de Compra: </b>$7 pesos MXN<br> <b>Precio de Venta: </b>$14 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>19/10/2020 11:29 am'),
(100390, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=0 WHERE IdProducto=13', '2020-10-19 16:29:39', 2, '<img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>19/10/2020 11:29 am'),
(100391, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1 WHERE IdProducto=13', '2020-10-19 16:30:20', 2, '<img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>19/10/2020 11:29 am'),
(100392, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'13\'', '2020-10-19 16:42:24', 3, '<b>Código del producto: </b>10001 <br><b>Nombre del producto: </b>Escoba <br> <b>Descripción: </b>Escoba <br><img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' heigth=\'65\'> '),
(100393, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1 WHERE IdProducto=13', '2020-10-19 21:20:42', 2, '<img src=\'views/images/productos/empty.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>19/10/2020 4:20 pm'),
(100394, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1 WHERE IdProducto=13', '2020-10-19 21:23:33', 3, '<img src=\'views/images/productos/empty.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>19/10/2020 4:21 pm'),
(100396, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1, ImgProd=\'empty.png\' WHERE IdProducto=13', '2020-10-19 21:24:55', 2, '<img src=\'views/images/productos/empty.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>19/10/2020 4:24 pm'),
(100397, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1, ImgProd=\'empty.png\' WHERE IdProducto=13', '2020-10-19 21:25:31', 2, '<img src=\'views/images/productos/empty.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>19/10/2020 4:25 pm'),
(100398, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1, ImgProd=\'empty.png\' WHERE IdProducto=13', '2020-10-20 16:27:15', 3, '<img src=\'views/images/productos/empty.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>19/10/2020 4:37 pm'),
(100399, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1, ImgProd=\'empty.png\' WHERE IdProducto=13', '2020-10-20 16:27:40', 2, '<img src=\'views/images/productos/empty.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>20/10/2020 11:27 am'),
(100400, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1, ImgProd=\'empty.png\' WHERE IdProducto=13', '2020-10-20 16:42:09', 3, '<img src=\'views/images/productos/empty.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>20/10/2020 11:28 am'),
(100401, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1, ImgProd=\'(X)PER-ESCOBA-P200.jpg\' WHERE IdProducto=13', '2020-10-20 16:42:12', 2, '<img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>20/10/2020 11:42 am'),
(100402, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120004\', NombreProducto=\'iPhone 12\', DescProducto=\'iPhone 12\', IdCategoria=\'12\', Stock=\'2\', PrecioCompra=\'21000\', PrecioVenta=\'26000\',StatusProd=1, ImgProd=\'empty.png\' WHERE IdProducto=15', '2020-10-20 16:43:21', 2, '<img src=\'views/images/productos/empty.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 12 <br> <b>Código del producto: </b>120004 <br> <b>Descripción: </b>128 GB, Color Rojo, Con Cargador tipo C <br> <b>Stock: </b>2 disponibles<br> <b>Precio de Compra: </b>$21000 pesos MXN<br> <b>Precio de Venta: </b>$26000 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>20/10/2020 11:43 am'),
(100403, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120004\', NombreProducto=\'iPhone 12\', DescProducto=\'iPhone 12\', IdCategoria=\'12\', Stock=\'2\', PrecioCompra=\'21000\', PrecioVenta=\'26000\',StatusProd=1, ImgProd=\'in_the_box__ftecp7px86q2_large.jpg\' WHERE IdProducto=15', '2020-10-20 16:43:47', 2, '<img src=\'views/images/productos/in_the_box__ftecp7px86q2_large.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 12 <br> <b>Código del producto: </b>120004 <br> <b>Descripción: </b>iPhone 12 <br> <b>Stock: </b>2 disponibles<br> <b>Precio de Compra: </b>$21000 pesos MXN<br> <b>Precio de Venta: </b>$26000 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>20/10/2020 11:43 am'),
(100404, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'10001\', NombreProducto=\'Escoba\', DescProducto=\'Escoba\', IdCategoria=\'1\', Stock=\'15\', PrecioCompra=\'10\', PrecioVenta=\'16\',StatusProd=1, ImgProd=\'(X)PER-ESCOBA-P200.jpg\' WHERE IdProducto=13', '2020-10-20 17:04:08', 3, '<img src=\'views/images/productos/(X)PER-ESCOBA-P200.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Escoba <br> <b>Código del producto: </b>10001 <br> <b>Descripción: </b>Escoba <br> <b>Stock: </b>15 disponibles<br> <b>Precio de Compra: </b>$10 pesos MXN<br> <b>Precio de Venta: </b>$16 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>20/10/2020 12:04 pm'),
(100405, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120002\', NombreProducto=\'iPhone 6S\', DescProducto=\'iPhone 6S\', IdCategoria=\'12\', Stock=\'5\', PrecioCompra=\'6259\', PrecioVenta=\'7299\',StatusProd=0, ImgProd=\'IPHONE095_FG.jpg\' WHERE IdProducto=11', '2020-10-20 18:06:23', 2, '<img src=\'views/images/productos/IPHONE095_FG.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 6S <br> <b>Código del producto: </b>120002 <br> <b>Descripción: </b>32GB Gris Espacial <br> <b>Stock: </b>5 disponibles<br> <b>Precio de Compra: </b>$6259 pesos MXN<br> <b>Precio de Venta: </b>$7299 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>20/10/2020 1:06 pm'),
(100406, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120002\', NombreProducto=\'iPhone 6S\', DescProducto=\'iPhone 6S\', IdCategoria=\'12\', Stock=\'5\', PrecioCompra=\'6259\', PrecioVenta=\'7299\',StatusProd=1, ImgProd=\'IPHONE095_FG.jpg\' WHERE IdProducto=11', '2020-10-20 18:07:01', 2, '<img src=\'views/images/productos/IPHONE095_FG.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 6S <br> <b>Código del producto: </b>120002 <br> <b>Descripción: </b>iPhone 6S <br> <b>Stock: </b>5 disponibles<br> <b>Precio de Compra: </b>$6259 pesos MXN<br> <b>Precio de Venta: </b>$7299 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>20/10/2020 1:06 pm'),
(100407, 'Agregar Categoría', 'categorias', 41, 41, 'INSERT INTO categorias(NombreCategoria, DescCategoria) VALUES (\'VideoJuegos\',\'Consolas, Juegos de Video, etc\')', '2020-10-20 18:10:29', 2, '<b>Nombre de la categoría: </b>VideoJuegos <br> <b>Descripción de la categoría: </b>Consolas, Juegos de Video, etc <br> <b>Fecha de creación: </b>20/10/2020 1:09 pm'),
(100408, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (130001,\'Paquete PlayStation 4 Slim 1 TB\',\'Con 3 juegos Horizon Zero Dawn, Days Gone, Grand Theft Auto V, FORTNITE Voucher y cupón de 3 meses para PS Plus Bundle Edition\',13,\'2\',\'716QjT5J0-L._AC_SL1200_.jpg\',\'8634.54\',\'10299.00\',\'41\',\'2020-10-20 13:12:16\')', '2020-10-20 18:12:56', 2, '<b>Código: </b>130001 <br> <b>Nombre del producto: </b>Paquete PlayStation 4 Slim 1 TB <br> <b>Descripción: </b>Con 3 juegos Horizon Zero Dawn, Days Gone, Grand Theft Auto V, FORTNITE Voucher y cupón de 3 meses para PS Plus Bundle Edition <br> <b>Disponibles: </b>2 productos <br> <b>Imagen: </b><img src=\'views/images/productos/716QjT5J0-L._AC_SL1200_.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$8634.54 MXN <b>Precio de Venta: </b>$10299.00 MXN<br> <b>Fecha de creación: </b>20/10/2020 1:12 pm'),
(100409, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120001\', NombreProducto=\'iPhone 11\', DescProducto=\'iPhone 11\', IdCategoria=\'12\', Stock=\'3\', PrecioCompra=\'14566\', PrecioVenta=\'18999\',StatusProd=1, ImgProd=\'2324213-1.png\' WHERE IdProducto=9', '2020-10-20 21:50:48', 3, '<img src=\'views/images/productos/2324213-1.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 11 <br> <b>Código del producto: </b>120001 <br> <b>Descripción: </b>64GB Color Morado: <br> <b>Stock: </b>3 disponibles<br> <b>Precio de Compra: </b>$14566 pesos MXN<br> <b>Precio de Venta: </b>$18999 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>20/10/2020 4:50 pm'),
(100410, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (10002,\'hghjgjgj\',\'\',1,\'1\',\'empty.png\',\'454.00\',\'5444.00\',\'41\',\'2020-10-20 16:54:00\')', '2020-10-20 21:54:14', 3, '<b>Código: </b>10002 <br> <b>Nombre del producto: </b>hghjgjgj <br> <b>Descripción: </b> <br> <b>Disponibles: </b>1 productos <br> <b>Imagen: </b><img src=\'views/images/productos/empty.png\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$454.00 MXN <b>Precio de Venta: </b>$5444.00 MXN<br> <b>Fecha de creación: </b>20/10/2020 4:54 pm'),
(100411, 'Editar Usuario', 'usuarios', 41, 41, 'UPDATE usuarios SET Nombre=\'Lionel Messi\', Estatus=\'1\' WHERE IdUsuario=16', '2020-10-20 22:50:48', 2, '<b>Modificación de nombre: </b>Lionel Messi <br> <b>Modificación de Estatus: </b>Activo <br>'),
(100412, 'Insertar Usuario', 'usuarios', 41, 41, 'INSERT INTO usuarios(Nombre, Usuario, Password, Rol, FechaCreacion) VALUES (\'Efisoft\',\'Efisoft\',\'840db892663adc294b8054d82e078d28bdf9aacc\',4,\'2020-10-20 17:51:45\')', '2020-10-20 22:52:02', 2, '<b>Nombre: </b>Efisoft <br> <b>Nombre de usuario: </b>Efisoft <br> <b>Rol: </b>Vendedor <br> <b>Fecha de creación: </b>20/10/2020 5:51 pm'),
(100413, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'9\'', '2020-10-21 00:04:01', 3, '<b>Código del producto: </b>120001 <br><b>Nombre del producto: </b>iPhone 11 <br> <b>Descripción: </b>64GB Color Morado <br><img src=\'views/images/productos/2324213-1.png\' width=\'65\' heigth=\'65\'> '),
(100414, 'Eliminar Producto', 'inventario', 42, 41, 'DELETE FROM productos WHERE IdProducto = \'11\'', '2020-10-21 00:03:59', 3, '<b>Código del producto: </b>120002 <br><b>Nombre del producto: </b>iPhone 6S <br> <b>Descripción: </b>iPhone 6S <br><img src=\'views/images/productos/IPHONE095_FG.jpg\' width=\'65\' heigth=\'65\'> '),
(100415, 'Editar Producto', 'inventario', 42, 41, 'UPDATE productos SET CodigoProd=\'130001\', NombreProducto=\'Paquete PlayStation 4 Slim 1 TB\', DescProducto=\'Paquete PlayStation 4 Slim 1 TB\', IdCategoria=\'13\', Stock=\'2\', PrecioCompra=\'8634.54\', PrecioVenta=\'10299\',StatusProd=1, ImgProd=\'fc-barcelona-catalan-football-club-logo-emblem-silk-texture.jpg\' WHERE IdProducto=16', '2020-10-21 03:19:50', 3, '<img src=\'views/images/productos/fc-barcelona-catalan-football-club-logo-emblem-silk-texture.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Paquete PlayStation 4 Slim 1 TB <br> <b>Código del producto: </b>130001 <br> <b>Descripción: </b>Con 3 juegos Horizon Zero Dawn, Days Gone, Grand Theft Auto V, FORTNITE Voucher y cupón de 3 meses para PS Plus Bundle Edition <br> <b>Stock: </b>2 disponibles<br> <b>Precio de Compra: </b>$8634.54 pesos MXN<br> <b>Precio de Venta: </b>$10299 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>20/10/2020 10:19 pm'),
(100416, 'Agregar Categoría', 'categorias', 42, 41, 'INSERT INTO categorias(NombreCategoria, DescCategoria) VALUES (\'Ropa Deportiva\',\'Ropa Deportiva\')', '2020-10-21 03:20:34', 2, '<b>Nombre de la categoría: </b>Ropa Deportiva <br> <b>Descripción de la categoría: </b>Ropa Deportiva <br> <b>Fecha de creación: </b>20/10/2020 10:20 pm'),
(100417, 'Eliminar Categoria', 'categorias', 42, 41, 'DELETE FROM categorias WHERE IdCategoria = \'12\'', '2020-10-21 03:24:07', 3, '<b>ID categoría: </b>12 <br><b>Nombre de la categoría: </b>iPhone <br> <b>Descripción: </b>Dispositivos IOS'),
(100418, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (140001,\'Jersey Barcelona Amarilla\',\'Jersey Senyera Barcelona\',14,\'4\',\'15709888697791.jpg\',\'1000.00\',\'1200.00\',\'41\',\'2020-10-20 22:22:48\')', '2020-10-21 03:23:06', 2, '<b>Código: </b>140001 <br> <b>Nombre del producto: </b>Jersey Barcelona Amarilla <br> <b>Descripción: </b>Jersey Senyera Barcelona <br> <b>Disponibles: </b>4 productos <br> <b>Imagen: </b><img src=\'views/images/productos/15709888697791.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$1000.00 MXN <b>Precio de Venta: </b>$1200.00 MXN<br> <b>Fecha de creación: </b>20/10/2020 10:22 pm'),
(100419, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'140001\', NombreProducto=\'Jersey Barcelona Amarilla\', DescProducto=\'Jersey Barcelona Amarilla\', IdCategoria=\'14\', Stock=\'4\', PrecioCompra=\'1000\', PrecioVenta=\'1200\',StatusProd=0, ImgProd=\'15709888697791.jpg\' WHERE IdProducto=17', '2020-10-21 03:23:58', 2, '<img src=\'views/images/productos/15709888697791.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Jersey Barcelona Amarilla <br> <b>Código del producto: </b>140001 <br> <b>Descripción: </b>Jersey Senyera Barcelona <br> <b>Stock: </b>4 disponibles<br> <b>Precio de Compra: </b>$1000 pesos MXN<br> <b>Precio de Venta: </b>$1200 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>20/10/2020 10:23 pm'),
(100420, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'140001\', NombreProducto=\'Jersey Barcelona Amarilla\', DescProducto=\'Jersey Barcelona Amarilla\', IdCategoria=\'14\', Stock=\'8\', PrecioCompra=\'1000\', PrecioVenta=\'1200\',StatusProd=1, ImgProd=\'15709888697791.jpg\' WHERE IdProducto=17', '2020-10-22 16:36:54', 2, '<img src=\'views/images/productos/15709888697791.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Jersey Barcelona Amarilla <br> <b>Código del producto: </b>140001 <br> <b>Descripción: </b>Jersey Barcelona Amarilla <br> <b>Stock: </b>8 disponibles<br> <b>Precio de Compra: </b>$1000 pesos MXN<br> <b>Precio de Venta: </b>$1200 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>22/10/2020 11:36 am'),
(100421, 'Editar Usuario', 'usuarios', 41, 41, 'UPDATE usuarios SET Nombre=\'Efisoft\', Estatus=\'0\' WHERE IdUsuario=42', '2020-10-22 16:43:52', 2, '<b>Modificación de nombre: </b>Efisoft <br> <b>Modificación de Estatus: </b>Inactivo <br>'),
(100422, 'Agregar Categoría', 'categorias', 41, 41, 'INSERT INTO categorias(NombreCategoria, DescCategoria) VALUES (\'Nike\',\'Productos Nike\')', '2020-10-22 17:05:55', 2, '<b>Nombre de la categoría: </b>Nike <br> <b>Descripción de la categoría: </b>Productos Nike <br> <b>Fecha de creación: </b>22/10/2020 12:05 pm'),
(100423, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha) VALUES (150001,\'Nike Air VaporMax Flyknit 3\',\'Calzado para mujer talla 21,22,23\',15,\'3\',\'calzado-air-vapormax-flyknit-3-kjL9RH.jpg\',\'2799.00\',\'3100.00\',\'41\',\'2020-10-22 12:08:28\')', '2020-10-22 17:08:48', 2, '<b>Código: </b>150001 <br> <b>Nombre del producto: </b>Nike Air VaporMax Flyknit 3 <br> <b>Descripción: </b>Calzado para mujer talla 21,22,23 <br> <b>Disponibles: </b>3 productos <br> <b>Imagen: </b><img src=\'views/images/productos/calzado-air-vapormax-flyknit-3-kjL9RH.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$2799.00 MXN <b>Precio de Venta: </b>$3100.00 MXN<br> <b>Fecha de creación: </b>22/10/2020 12:08 pm'),
(100424, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'150001\', NombreProducto=\'Nike Air VaporMax Flyknit 3\', DescProducto=\'Nike Air VaporMax Flyknit 3\', IdCategoria=\'15\', Stock=\'3\', PrecioCompra=\'2799\', PrecioVenta=\'3100\',StatusProd=1, ImgProd=\'calzado-air-vapormax-flyknit-3-kjL9RH.jpg\' WHERE IdProducto=18', '2020-10-22 17:10:07', 3, '<img src=\'views/images/productos/calzado-air-vapormax-flyknit-3-kjL9RH.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Nike Air VaporMax Flyknit 3 <br> <b>Código del producto: </b>150001 <br> <b>Descripción: </b>Calzado para mujer talla 21,22,23 <br> <b>Stock: </b>3 disponibles<br> <b>Precio de Compra: </b>$2799 pesos MXN<br> <b>Precio de Venta: </b>$3100 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>22/10/2020 12:09 pm'),
(100425, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000000\'', '2020-10-23 00:06:29', 3, '<b>Id del Cliente: </b>10000000 <br><b>Nombre del Cliente: </b>Carlos Alonso <br><b>Apellido del Cliente: </b>Vazquez <br><b>Dirección: </b>Calle del Tanque S/N <br />San Juan, Malinalco <br><b>Total de compras hechas: </b>0 compras<br>'),
(100426, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000001\'', '2020-10-23 00:06:41', 2, '<b>Id del Cliente: </b>10000001 <br><b>Nombre del Cliente: </b>Leo <br><b>Apellido del Cliente: </b>Messi <br><b>Dirección: </b>sjkdsjkdhjshdkjh <br><b>Total de compras hechas: </b>0 compras<br>'),
(100427, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000005\'', '2020-10-23 00:08:04', 2, '<b>Id del Cliente: </b>10000005 <br><b>Nombre del Cliente: </b>Carlos <br><b>Apellido del Cliente: </b>Catzin <br><b>Dirección: </b>Toluca de lerdo<br />\nToluca <br><b>Total de compras hechas: </b>0 compras<br>'),
(100428, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000002\'', '2020-10-23 00:08:01', 2, '<b>Id del Cliente: </b>10000002 <br><b>Nombre del Cliente: </b>Carlos <br><b>Apellido del Cliente: </b>Catzin <br><b>Dirección: </b>Toluca de lerdo<br />\nToluca <br><b>Total de compras hechas: </b>0 compras<br>'),
(100429, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000003\'', '2020-10-23 00:07:59', 2, '<b>Id del Cliente: </b>10000003 <br><b>Nombre del Cliente: </b>Carlos <br><b>Apellido del Cliente: </b>Catzin <br><b>Dirección: </b>Toluca de lerdo, Toluca <br><b>Total de compras hechas: </b>0 compras<br>'),
(100430, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000000\'', '2020-10-23 00:21:23', 2, '<b>Id del Cliente: </b>10000000 <br><b>Nombre del Cliente: </b>Carlos Alonso <br><b>Apellido del Cliente: </b>Vazquez Catzin <br><b>Dirección: </b>Calle del Tanque S/N, San Juan, Malinalco, Estado de México <br><b>Total de compras hechas: </b>0 compras<br>'),
(100431, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000006\'', '2020-10-23 00:36:22', 3, '<b>Id del Cliente: </b>10000006 <br><b>Nombre del Cliente: </b>Joshua <br><b>Apellido del Cliente: </b>Kimich <br><b>Dirección: </b>Alemania <br><b>Total de compras hechas: </b>0 compras<br>'),
(100432, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000006\'', '2020-10-23 00:49:20', 3, '<b>Id del Cliente: </b>10000006 <br><b>Nombre del Cliente: </b>Joshua <br><b>Apellido del Cliente: </b>Kimich <br><b>Dirección: </b>Alemania <br><b>Total de compras hechas: </b>0 compras<br>'),
(100433, 'Eliminar Usuario', 'Usuarios', 41, 41, 'DELETE FROM usuarios WHERE IdUsuario = \'42\'', '2020-10-23 15:25:04', 3, '<b>Nombre: </b>Efisoft <br> <b>Nombre de usuario: </b>Efisoft <br> <b>Rol: </b>Vendedor'),
(100434, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000009\'', '2020-10-23 17:39:05', 2, '<b>Id del Cliente: </b>10000009 <br><b>Nombre del Cliente: </b>Carlos Jo <br><b>Apellido del Cliente: </b>Vaz Catzin <br><b>Dirección: </b>Toluca de lerdo<br />\nToluca <br><b>Total de compras hechas: </b>0 compras<br>'),
(100435, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000008\'', '2020-10-23 17:39:02', 2, '<b>Id del Cliente: </b>10000008 <br><b>Nombre del Cliente: </b>dfd <br><b>Apellido del Cliente: </b>asdas <br><b>Dirección: </b>adsdasdsad <br><b>Total de compras hechas: </b>0 compras<br>'),
(100436, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000011\'', '2020-10-23 17:55:35', 2, '<b>Id del Cliente: </b>10000011 <br><b>Nombre del Cliente: </b>Carlos Aslass <br><b>Apellido del Cliente: </b>jaljaslkajsklj <br><b>Dirección: </b>Toluca de lerdo<br />\nToluca <br><b>Total de compras hechas: </b>0 compras<br>'),
(100437, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'140001\', NombreProducto=\'Jersey Barcelona Amarilla\', DescProducto=\'Jersey Barcelona Amarilla\', IdCategoria=\'14\', Stock=\'8\', PrecioCompra=\'1000\', PrecioVenta=\'1200\',StatusProd=0, ImgProd=\'15709888697791.jpg\' WHERE IdProducto=17', '2020-10-24 16:03:58', 2, '<img src=\'views/images/productos/15709888697791.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Jersey Barcelona Amarilla <br> <b>Código del producto: </b>140001 <br> <b>Descripción: </b>Jersey Barcelona Amarilla <br> <b>Stock: </b>8 disponibles<br> <b>Precio de Compra: </b>$1000 pesos MXN<br> <b>Precio de Venta: </b>$1200 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>24/10/2020 11:03 am'),
(100438, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'150001\', NombreProducto=\'Nike Air VaporMax Flyknit 3\', DescProducto=\'Nike Air VaporMax Flyknit 3\', IdCategoria=\'15\', Stock=\'3\', PrecioCompra=\'2799\', PrecioVenta=\'3100\',StatusProd=0, ImgProd=\'calzado-air-vapormax-flyknit-3-kjL9RH.jpg\' WHERE IdProducto=18', '2020-10-24 16:03:54', 2, '<img src=\'views/images/productos/calzado-air-vapormax-flyknit-3-kjL9RH.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Nike Air VaporMax Flyknit 3 <br> <b>Código del producto: </b>150001 <br> <b>Descripción: </b>Calzado para mujer talla 21,22,23 <br> <b>Stock: </b>3 disponibles<br> <b>Precio de Compra: </b>$2799 pesos MXN<br> <b>Precio de Venta: </b>$3100 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>24/10/2020 11:03 am'),
(100439, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'130001\', NombreProducto=\'Paquete PlayStation 4 Slim 1 TB\', DescProducto=\'Paquete PlayStation 4 Slim 1 TB\', IdCategoria=\'13\', Stock=\'2\', PrecioCompra=\'8634.54\', PrecioVenta=\'10299\',StatusProd=0, ImgProd=\'716QjT5J0-L._AC_SL1200_.jpg\' WHERE IdProducto=16', '2020-10-24 16:03:52', 2, '<img src=\'views/images/productos/716QjT5J0-L._AC_SL1200_.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Paquete PlayStation 4 Slim 1 TB <br> <b>Código del producto: </b>130001 <br> <b>Descripción: </b>Con 3 juegos Horizon Zero Dawn, Days Gone, Grand Theft Auto V, FORTNITE Voucher y cupón de 3 meses para PS Plus Bundle Edition <br> <b>Stock: </b>2 disponibles<br> <b>Precio de Compra: </b>$8634.54 pesos MXN<br> <b>Precio de Venta: </b>$10299 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>24/10/2020 11:03 am'),
(100440, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120001\', NombreProducto=\'iPhone 11\', DescProducto=\'iPhone 11\', IdCategoria=\'12\', Stock=\'3\', PrecioCompra=\'14566\', PrecioVenta=\'18999\',StatusProd=0, ImgProd=\'2324213-1.png\' WHERE IdProducto=9', '2020-11-05 02:04:51', 2, '<img src=\'views/images/productos/2324213-1.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 11 <br> <b>Código del producto: </b>120001 <br> <b>Descripción: </b>64GB Color Morado <br> <b>Stock: </b>3 disponibles<br> <b>Precio de Compra: </b>$14566 pesos MXN<br> <b>Precio de Venta: </b>$18999 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>04/11/2020 8:04 pm'),
(100441, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120001\', NombreProducto=\'iPhone 11\', DescProducto=\'iPhone 11\', IdCategoria=\'12\', Stock=\'3\', PrecioCompra=\'14566\', PrecioVenta=\'18999\',StatusProd=1, ImgProd=\'2324213-1.png\' WHERE IdProducto=9', '2020-11-05 02:05:34', 2, '<img src=\'views/images/productos/2324213-1.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 11 <br> <b>Código del producto: </b>120001 <br> <b>Descripción: </b>iPhone 11 <br> <b>Stock: </b>3 disponibles<br> <b>Precio de Compra: </b>$14566 pesos MXN<br> <b>Precio de Venta: </b>$18999 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>04/11/2020 8:05 pm'),
(100442, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000010\'', '2020-11-05 02:06:43', 2, '<b>Id del Cliente: </b>10000010 <br><b>Nombre del Cliente: </b>Carlos Al <br><b>Apellido del Cliente: </b>Vaz Catzin <br><b>Dirección: </b>Toluca de lerdo <br />\nToluca <br><b>Total de compras hechas: </b>0 compras<br>'),
(100443, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000012\'', '2020-11-19 21:07:37', 3, '<b>Id del Cliente: </b>10000012 <br><b>Nombre del Cliente: </b>Alonso <br><b>Apellido del Cliente: </b>Vazquez <br><b>Dirección: </b>Toluca de lerdo<br />\nToluca <br><b>Total de compras hechas: </b>0 compras<br>'),
(100444, 'Eliminar Usuario', 'Usuarios', 41, 41, 'DELETE FROM usuarios WHERE IdUsuario = \'13\'', '2020-11-26 18:32:32', 3, '<b>Nombre: </b>Alonso <br> <b>Nombre de usuario: </b>Alonso12 <br> <b>Rol: </b>Administrador'),
(100445, 'Editar Categoría', 'categorias', 41, 41, 'UPDATE categorias SET NombreCategoria=\'Limpieza\', DescCategoria=\'Productos de limpieza, Buenas\' WHERE IdCategoria=1', '2020-11-26 18:33:26', 2, '<b>Nombre de la categoría: </b>Limpieza <br> <b>Descripción de la categoría: </b>Productos de limpieza, Buenas <br> <b>Fecha de modificación: </b>26/11/2020 12:33 pm'),
(100446, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120001\', NombreProducto=\'iPhone 11\', DescProducto=\'iPhone 11\', IdCategoria=\'12\', Stock=\'3\', PrecioCompra=\'14566\', PrecioVenta=\'18999\',StatusProd=0, ImgProd=\'2324213-1.png\' WHERE IdProducto=9', '2020-12-26 02:10:20', 3, '<img src=\'views/images/productos/2324213-1.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 11 <br> <b>Código del producto: </b>120001 <br> <b>Descripción: </b>iPhone 11 <br> <b>Stock: </b>3 disponibles<br> <b>Precio de Compra: </b>$14566 pesos MXN<br> <b>Precio de Venta: </b>$18999 pesos MXN<br> <b>Estatus: </b>Inactivo<br> <b>Fecha de modificación: </b>15/12/2020 3:42 pm'),
(100447, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120003\', NombreProducto=\'iPhone X reacondicionado\', DescProducto=\'iPhone X reacondicionado\', IdCategoria=\'12\', Stock=\'9\', PrecioCompra=\'14200\', PrecioVenta=\'16500\',StatusProd=1, ImgProd=\'refurb-iphoneX-spacegray.jpg\' WHERE IdProducto=12', '2020-12-26 17:24:18', 2, '<img src=\'views/images/productos/refurb-iphoneX-spacegray.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone X reacondicionado <br> <b>Código del producto: </b>120003 <br> <b>Descripción: </b>64 GB reacondicionado - Gris espacial Libre <br> <b>Stock: </b>9 disponibles<br> <b>Precio de Compra: </b>$14200 pesos MXN<br> <b>Precio de Venta: </b>$16500 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>26/12/2020 11:24 am');
INSERT INTO `pendientes` (`IdPendiente`, `Operacion`, `Ruta`, `IdUsuarioEject`, `IdUsuarioAplic`, `Consulta`, `Fecha`, `Estatus`, `DescQuery`) VALUES
(100448, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'150001\', NombreProducto=\'Nike Air VaporMax Flyknit 3\', DescProducto=\'Nike Air VaporMax Flyknit 3\', IdCategoria=\'15\', Stock=\'10\', PrecioCompra=\'2799\', PrecioVenta=\'3100\',StatusProd=1, ImgProd=\'calzado-air-vapormax-flyknit-3-kjL9RH.jpg\' WHERE IdProducto=18', '2020-12-26 18:25:56', 2, '<img src=\'views/images/productos/calzado-air-vapormax-flyknit-3-kjL9RH.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Nike Air VaporMax Flyknit 3 <br> <b>Código del producto: </b>150001 <br> <b>Descripción: </b>Nike Air VaporMax Flyknit 3 <br> <b>Stock: </b>10 disponibles<br> <b>Precio de Compra: </b>$2799 pesos MXN<br> <b>Precio de Venta: </b>$3100 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>26/12/2020 12:25 pm'),
(100453, 'Editar Venta', 'Ventas', 41, 41, 'UPDATE ventas SET IdFormaPago = 3, Productos = \'[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"2\",\"stock\":\"3\",\"precio\":\"14\",\"total\":\"28\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"2\",\"stock\":\"3\",\"precio\":\"16\",\"total\":\"32\"}]\',Impuesto  = \'0\', IVA = 0,PagoNeto  = \'60\', PagoTotal = \'60\', CodTransaccion = \'64644699\', Fecha = NOW() WHERE IdVenta= ', '2020-12-27 02:46:51', 3, 'Actualizar Venta <br /><b>Código de Factura: </b>9 <br> <b>Cliente: </b>10000006 - Joshua Kimich<br> <b>Productos: </b>[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"2\",\"stock\":\"3\",\"precio\":\"14\",\"total\":\"28\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"2\",\"stock\":\"3\",\"precio\":\"16\",\"total\":\"32\"}] <br> <b>Metódo de pago: </b> Tarjeta de débito <br> <b>Pago Neto: </b>$60 MXN <br> <b>Pago Total: </b>$60 MXN <br> '),
(100454, 'Editar Venta', 'Ventas', 41, 41, 'UPDATE ventas SET IdFormaPago = 3, Productos = \'[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"3\",\"stock\":\"2\",\"precio\":\"14\",\"total\":\"42\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"3\",\"stock\":\"2\",\"precio\":\"16\",\"total\":\"48\"}]\',Impuesto  = \'0\', IVA = 0,PagoNeto  = \'90\', PagoTotal = \'90\', CodTransaccion = \'564646884\', Fecha = NOW() WHERE IdVenta= 44', '2020-12-27 02:48:49', 2, 'Actualizar Venta <br /><b>Código de Factura: </b>9 <br> <b>Cliente: </b>10000006 - Joshua Kimich<br> <b>Productos: </b>[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"3\",\"stock\":\"2\",\"precio\":\"14\",\"total\":\"42\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"3\",\"stock\":\"2\",\"precio\":\"16\",\"total\":\"48\"}] <br> <b>Metódo de pago: </b> Tarjeta de débito <br> <b>Pago Neto: </b>$90 MXN <br> <b>Pago Total: </b>$90 MXN <br> '),
(100455, 'Editar Venta', 'Ventas', 41, 41, 'UPDATE ventas SET IdFormaPago = 1, Productos = \'[{\"id\":\"18\",\"descripcion\":\"Nike Air VaporMax Flyknit 3\",\"cantidad\":\"3\",\"stock\":\"2\",\"precio\":\"3100\",\"total\":\"9300\"}]\',Impuesto  = \'0\', IVA = 0,PagoNeto  = \'9300\', PagoTotal = \'9300\', Fecha = NOW() WHERE IdVenta= 35', '2020-12-27 02:55:48', 2, 'Actualizar Venta <br /><b>Código de Factura: </b>2 <br> <b>Cliente: </b>10000007 - Toni Kroos<br> <b>Productos: </b>[{\"id\":\"18\",\"descripcion\":\"Nike Air VaporMax Flyknit 3\",\"cantidad\":\"3\",\"stock\":\"2\",\"precio\":\"3100\",\"total\":\"9300\"}] <br> <b>Metódo de pago: </b> Efectivo <br> <b>Pago Neto: </b>$9300 MXN <br> <b>Pago Total: </b>$9300 MXN <br> '),
(100456, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000004\'', '2020-12-27 02:56:48', 3, '<b>Id del Cliente: </b>10000004 <br><b>Nombre del Cliente: </b>Carlos Alonso <br><b>Apellido del Cliente: </b>Vázquez <br><b>Dirección: </b>San Juan <br />\nMalinalco, Estado de Mexico <br><b>Total de compras hechas: </b>9 compras<br>'),
(100457, 'Editar Venta', 'Ventas', 41, 41, 'UPDATE ventas SET IdFormaPago = 1, Productos = \'[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"14\",\"total\":\"14\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"16\",\"total\":\"16\"}]\',Impuesto  = \'0\', IVA = 0,PagoNeto  = \'30\', PagoTotal = \'30\', Fecha = NOW() WHERE IdVenta= 45', '2020-12-27 21:51:23', 2, 'Actualizar Venta <br /><b>Código de Factura: </b>10 <br> <b>Cliente: </b>10000014 - Miguel Aleman<br> <b>Productos: </b>[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"14\",\"total\":\"14\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"16\",\"total\":\"16\"}] <br> <b>Metódo de pago: </b> Efectivo <br> <b>Pago Neto: </b>$30 MXN <br> <b>Pago Total: </b>$30 MXN <br> '),
(100458, 'Editar Venta', 'Ventas', 41, 41, 'UPDATE ventas SET IdFormaPago = 1, Productos = \'[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"14\",\"total\":\"14\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"16\",\"total\":\"16\"},{\"id\":\"11\",\"descripcion\":\"iPhone 6S\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"7299\",\"total\":\"7299\"}]\',Impuesto  = \'219.87\', IVA = 3,PagoNeto  = \'7329\', PagoTotal = \'7548.87\', Fecha = NOW() WHERE IdVenta= 46', '2020-12-29 22:08:31', 2, 'Actualizar Venta <br /><b>Código de Factura: </b>11 <br> <b>Cliente: </b>10000014 - Miguel Aleman<br> <b>Productos: </b>[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"14\",\"total\":\"14\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"16\",\"total\":\"16\"},{\"id\":\"11\",\"descripcion\":\"iPhone 6S\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"7299\",\"total\":\"7299\"}] <br> <b>Metódo de pago: </b> Efectivo <br> <b>Pago Neto: </b>$7329 MXN <br> <b>Pago Total: </b>$7548.87 MXN <br> '),
(100459, 'Editar Venta', 'Ventas', 41, 41, 'UPDATE ventas SET IdFormaPago = 1, Productos = \'[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"14\",\"total\":\"14\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"16\",\"total\":\"16\"},{\"id\":\"11\",\"descripcion\":\"iPhone 6S\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"7299\",\"total\":\"7299\"}]\',Impuesto  = \'0\', IVA = 3,PagoNeto  = \'\', PagoTotal = \'0\', Fecha = NOW() WHERE IdVenta= 46', '2020-12-30 16:27:25', 2, 'Actualizar Venta <br /><b>Código de Factura: </b>11 <br> <b>Cliente: </b>10000014 - Miguel Aleman<br> <b>Productos: </b>[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"14\",\"total\":\"14\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"16\",\"total\":\"16\"},{\"id\":\"11\",\"descripcion\":\"iPhone 6S\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"7299\",\"total\":\"7299\"}] <br> <b>Metódo de pago: </b> Efectivo <br> <b>Pago Neto: </b>$ MXN <br> <b>Pago Total: </b>$0 MXN <br> '),
(100460, 'Editar Categoría', 'categorias', 41, 41, 'UPDATE categorias SET NombreCategoria=\'Apple\', DescCategoria=\'Dispositivos IOS\' WHERE IdCategoria=12', '2020-12-30 16:34:41', 2, '<b>Nombre de la categoría: </b>Apple <br> <b>Descripción de la categoría: </b>Dispositivos IOS <br> <b>Fecha de modificación: </b>30/12/2020 10:34 am'),
(100461, 'Eliminar Cliente', 'Clientes', 41, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000006\'', '2020-12-30 19:32:44', 3, '<b>Id del Cliente: </b>10000006 <br><b>Nombre del Cliente: </b>Joshua <br><b>Apellido del Cliente: </b>Kimich <br><b>Dirección: </b>Alemania <br><b>Total de compras hechas: </b>2 compras<br>'),
(100462, 'Editar Usuario', 'usuarios', 41, 41, 'UPDATE usuarios SET Nombre=\'Efisoft\', Password=\'1f82ea75c5cc526729e2d581aeb3aeccfef4407e\', Estatus=\'0\' WHERE IdUsuario=42', '2020-12-30 19:32:41', 2, '<b>Modificación de nombre: </b>Efisoft <br> <b>Modificación de Estatus: </b>Inactivo <br> <b>Hubo modificación de contraseña</b>(Oculta por seguridad)'),
(100463, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'110001\', NombreProducto=\'Leche LALA\', DescProducto=\'Leche LALA\', IdCategoria=\'11\', Stock=\'1\', PrecioCompra=\'17\', PrecioVenta=\'22\',StatusProd=1, ImgProd=\'7501020515343-00-CH1200Wx1200H.jpg\' WHERE IdProducto=10', '2020-12-30 19:32:36', 2, '<img src=\'views/images/productos/7501020515343-00-CH1200Wx1200H.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Leche LALA <br> <b>Código del producto: </b>110001 <br> <b>Descripción: </b>1 Litro - Entera <br> <b>Stock: </b>1 disponibles<br> <b>Precio de Compra: </b>$17 pesos MXN<br> <b>Precio de Venta: </b>$22 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>30/12/2020 1:32 pm'),
(100464, 'Eliminar Cliente', 'Clientes', 31, 41, 'DELETE FROM clientes WHERE IdCliente = \'10000004\'', '2021-01-01 22:00:55', 3, '<b>Id del Cliente: </b>10000004 <br><b>Nombre del Cliente: </b>Carlos Alonso <br><b>Apellido del Cliente: </b>Vázquez <br><b>Dirección: </b>San Juan <br />\nMalinalco, Estado de Mexico <br><b>Total de compras hechas: </b>9 compras<br>'),
(100465, 'Editar Venta', 'Ventas', 41, 41, 'UPDATE ventas SET IdFormaPago = 2, Productos = \'[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"14\",\"total\":\"14\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"16\",\"total\":\"16\"},{\"id\":\"11\",\"descripcion\":\"iPhone 6S\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"7299\",\"total\":\"7299\"},{\"id\":\"10\",\"descripcion\":\"Leche LALA\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"22\",\"total\":\"22\"}]\',Impuesto  = \'0\', IVA = 0,PagoNeto  = \'7351\', PagoTotal = \'7351\', CodTransaccion = \'4352432435234\', Fecha = NOW() WHERE IdVenta= 49', '2021-01-01 22:00:51', 2, 'Actualizar Venta <br /><b>Código de Factura: </b>13 <br> <b>Cliente: </b>10000013 - Carlos Catzin<br> <b>Productos: </b>[{\"id\":\"14\",\"descripcion\":\"Jamón FUD\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"14\",\"total\":\"14\"},{\"id\":\"13\",\"descripcion\":\"Escoba\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"16\",\"total\":\"16\"},{\"id\":\"11\",\"descripcion\":\"iPhone 6S\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"7299\",\"total\":\"7299\"},{\"id\":\"10\",\"descripcion\":\"Leche LALA\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"22\",\"total\":\"22\"}] <br> <b>Metódo de pago: </b> Tarjeta de crédito <br> <b>Pago Neto: </b>$7351 MXN <br> <b>Pago Total: </b>$7351 MXN <br> '),
(100466, 'Editar Usuario', 'usuarios', 41, 41, 'UPDATE usuarios SET Nombre=\'Efisoft\', Estatus=\'1\' WHERE IdUsuario=42', '2021-01-01 22:34:27', 2, '<b>Modificación de nombre: </b>Efisoft <br> <b>Modificación de Estatus: </b>Activo <br>'),
(100467, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120001\', NombreProducto=\'iPhone 11\', DescProducto=\'iPhone 11\', IdCategoria=\'12\', Stock=\'10\', PrecioCompra=\'14566\', PrecioVenta=\'18999\',StatusProd=1, ImgProd=\'2324213-1.png\' WHERE IdProducto=9', '2021-01-04 19:59:57', 2, '<img src=\'views/images/productos/2324213-1.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 11 <br> <b>Código del producto: </b>120001 <br> <b>Descripción: </b>iPhone 11 <br> <b>Stock: </b>10 disponibles<br> <b>Precio de Compra: </b>$14566 pesos MXN<br> <b>Precio de Venta: </b>$18999 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>04/01/2021 1:59 pm'),
(100468, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120001\', NombreProducto=\'iPhone 11\', DescProducto=\'iPhone 11\', IdCategoria=\'12\', Stock=\'9\', PrecioCompra=\'14566\', PrecioVenta=\'18999\',StatusProd=1, ImgProd=\'2324213-1.png\', IdProveedor=\'1\' WHERE IdProducto=9', '2021-01-04 21:33:45', 2, '<img src=\'views/images/productos/2324213-1.png\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 11 <br> <b>Código del producto: </b>120001 <br> <b>Descripción: </b>iPhone 11 <br> <b>Stock: </b>9 disponibles<br> <b>Precio de Compra: </b>$14566 pesos MXN<br> <b>Precio de Venta: </b>$18999 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>04/01/2021 3:33 pm'),
(100469, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'120002\', NombreProducto=\'iPhone 6S\', DescProducto=\'iPhone 6S\', IdCategoria=\'12\', Stock=\'1\', PrecioCompra=\'6259\', PrecioVenta=\'7299\',StatusProd=1, ImgProd=\'IPHONE095_FG.jpg\', IdProveedor=\'1\' WHERE IdProducto=11', '2021-01-06 00:09:43', 2, '<img src=\'views/images/productos/IPHONE095_FG.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>iPhone 6S <br> <b>Código del producto: </b>120002 <br> <b>Descripción: </b>iPhone 6S <br> <b>Stock: </b>1 disponibles<br> <b>Precio de Compra: </b>$6259 pesos MXN<br> <b>Precio de Venta: </b>$7299 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>05/01/2021 6:09 pm'),
(100470, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'130001\', NombreProducto=\'Paquete PlayStation 4 Slim 1 TB\', DescProducto=\'Paquete PlayStation 4 Slim 1 TB\', IdCategoria=\'13\', Stock=\'3\', PrecioCompra=\'8634.54\', PrecioVenta=\'10299\',StatusProd=1, ImgProd=\'716QjT5J0-L._AC_SL1200_.jpg\', IdProveedor=\'2\' WHERE IdProducto=16', '2021-01-06 00:30:38', 2, '<img src=\'views/images/productos/716QjT5J0-L._AC_SL1200_.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Paquete PlayStation 4 Slim 1 TB <br> <b>Código del producto: </b>130001 <br> <b>Descripción: </b>Paquete PlayStation 4 Slim 1 TB <br> <b>Stock: </b>3 disponibles<br> <b>Precio de Compra: </b>$8634.54 pesos MXN<br> <b>Precio de Venta: </b>$10299 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>05/01/2021 6:30 pm'),
(100471, 'Eliminar Categoria', 'categorias', 41, 41, 'DELETE FROM categorias WHERE IdCategoria = \'1\'', '2021-01-06 19:25:36', 3, '<b>ID categoría: </b>1 <br><b>Nombre de la categoría: </b>Limpieza <br> <b>Descripción: </b>Productos de limpieza, Buenas'),
(100472, 'Eliminar Categoria', 'categorias', 41, 41, 'DELETE FROM categorias WHERE IdCategoria = \'2\'', '2021-01-06 03:35:47', 2, '<b>ID categoría: </b>2 <br><b>Nombre de la categoría: </b>Electrónica <br> <b>Descripción: </b>Equipos electrodomésticos'),
(100473, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'150001\', NombreProducto=\'Nike Air VaporMax Flyknit 3\', DescProducto=\'Nike Air VaporMax Flyknit 3\', IdCategoria=\'15\', Stock=\'3\', PrecioCompra=\'2799\', PrecioVenta=\'3100\',StatusProd=1, ImgProd=\'calzado-air-vapormax-flyknit-3-kjL9RH.jpg\', IdProveedor=\'3\' WHERE IdProducto=18', '2021-01-06 19:25:33', 2, '<img src=\'views/images/productos/calzado-air-vapormax-flyknit-3-kjL9RH.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Nike Air VaporMax Flyknit 3 <br> <b>Código del producto: </b>150001 <br> <b>Descripción: </b>Nike Air VaporMax Flyknit 3 <br> <b>Stock: </b>3 disponibles<br> <b>Precio de Compra: </b>$2799 pesos MXN<br> <b>Precio de Venta: </b>$3100 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>06/01/2021 1:25 pm'),
(100474, 'Agregar Categoría', 'categorias', 41, 41, 'INSERT INTO categorias(NombreCategoria, DescCategoria) VALUES (\'Leche\',\'Leches\')', '2021-01-06 22:12:43', 2, '<b>Nombre de la categoría: </b>Leche <br> <b>Descripción de la categoría: </b>Leches <br> <b>Fecha de creación: </b>06/01/2021 4:12 pm'),
(100475, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha, IdProveedor) VALUES (7501055900022,\'Leche Alpura clasica\',\'Leche\',16,\'12\',\'front_es.7.400.jpg\',\'15.00\',\'20.00\',\'41\',\'2021-01-06 16:14:22\',\'4\')', '2021-01-06 22:14:31', 2, '<b>Código: </b>7501055900022 <br> <b>Nombre del producto: </b>Leche Alpura clasica <br> <b>Descripción: </b>Leche <br> <b>Disponibles: </b>12 productos <br> <b>Imagen: </b><img src=\'views/images/productos/front_es.7.400.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$15.00 MXN <b>Precio de Venta: </b>$20.00 MXN<br> <b>Fecha de creación: </b>06/01/2021 4:14 pm'),
(100476, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'7501055900022\', NombreProducto=\'Leche Alpura clasica\', DescProducto=\'Leche Alpura clasica\', IdCategoria=\'16\', Stock=\'12\', PrecioCompra=\'15\', PrecioVenta=\'20\',StatusProd=1, ImgProd=\'front_es.7.400.jpg\', IdProveedor=\'4\' WHERE IdProducto=19', '2021-01-06 22:16:06', 2, '<img src=\'views/images/productos/front_es.7.400.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Leche Alpura clasica <br> <b>Código del producto: </b>7501055900022 <br> <b>Descripción: </b>Leche <br> <b>Stock: </b>12 disponibles<br> <b>Precio de Compra: </b>$15 pesos MXN<br> <b>Precio de Venta: </b>$20 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>06/01/2021 4:15 pm'),
(100477, 'Eliminar Producto', 'inventario', 41, 41, 'DELETE FROM productos WHERE IdProducto = \'19\'', '2021-01-06 22:16:40', 2, '<b>Código del producto: </b>2147483647 <br><b>Nombre del producto: </b>Leche Alpura clasica <br> <b>Descripción: </b>Leche Alpura clasica <br><img src=\'views/images/productos/front_es.7.400.jpg\' width=\'65\' heigth=\'65\'> '),
(100478, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha, IdProveedor) VALUES (7501055900022,\'Leche Alpura Clasica\',\'Leche\',16,\'10\',\'front_es.7.400.jpg\',\'15.00\',\'20.00\',\'41\',\'2021-01-06 16:18:47\',\'4\')', '2021-01-06 22:18:55', 2, '<b>Código: </b>7501055900022 <br> <b>Nombre del producto: </b>Leche Alpura Clasica <br> <b>Descripción: </b>Leche <br> <b>Disponibles: </b>10 productos <br> <b>Imagen: </b><img src=\'views/images/productos/front_es.7.400.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$15.00 MXN <b>Precio de Venta: </b>$20.00 MXN<br> <b>Fecha de creación: </b>06/01/2021 4:18 pm'),
(100479, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'7501055900022\', NombreProducto=\'Leche Alpura Clasica\', DescProducto=\'Leche Alpura Clasica\', IdCategoria=\'16\', Stock=\'10\', PrecioCompra=\'15\', PrecioVenta=\'20\',StatusProd=1, ImgProd=\'front_es.7.400.jpg\', IdProveedor=\'4\' WHERE IdProducto=20', '2021-01-06 22:21:10', 2, '<img src=\'views/images/productos/front_es.7.400.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Leche Alpura Clasica <br> <b>Código del producto: </b>7501055900022 <br> <b>Descripción: </b>Leche <br> <b>Stock: </b>10 disponibles<br> <b>Precio de Compra: </b>$15 pesos MXN<br> <b>Precio de Venta: </b>$20 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>06/01/2021 4:21 pm'),
(100480, 'Editar Producto', 'inventario', 41, 41, 'UPDATE productos SET CodigoProd=\'15002\', NombreProducto=\'Leche Alpura Clasica\', DescProducto=\'Leche Alpura Clasica\', IdCategoria=\'16\', Stock=\'10\', PrecioCompra=\'15\', PrecioVenta=\'20\',StatusProd=1, ImgProd=\'front_es.7.400.jpg\', IdProveedor=\'4\' WHERE IdProducto=20', '2021-01-06 22:21:39', 3, '<img src=\'views/images/productos/front_es.7.400.jpg\' width=\'65\' height=\'65\'><br> <b>Nombre del producto: </b>Leche Alpura Clasica <br> <b>Código del producto: </b>15002 <br> <b>Descripción: </b>Leche Alpura Clasica <br> <b>Stock: </b>10 disponibles<br> <b>Precio de Compra: </b>$15 pesos MXN<br> <b>Precio de Venta: </b>$20 pesos MXN<br> <b>Estatus: </b>Activo<br> <b>Fecha de modificación: </b>06/01/2021 4:21 pm'),
(100481, 'Agregar Categoría', 'categorias', 41, 41, 'INSERT INTO categorias(NombreCategoria, DescCategoria) VALUES (\'Bimbo\',\'Productos bimbo\')', '2021-01-06 22:23:20', 2, '<b>Nombre de la categoría: </b>Bimbo <br> <b>Descripción de la categoría: </b>Productos bimbo <br> <b>Fecha de creación: </b>06/01/2021 4:23 pm'),
(100482, 'Agregar Producto', 'inventario', 41, 41, 'INSERT INTO productos(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha, IdProveedor) VALUES (7501000309726,\'Roles de canela\',\'Roles de canela 365g\',4,\'8\',\'front_es.5.400.jpg\',\'10.00\',\'13.00\',\'41\',\'2021-01-06 16:24:39\',\'5\')', '2021-01-06 22:24:52', 2, '<b>Código: </b>7501000309726 <br> <b>Nombre del producto: </b>Roles de canela <br> <b>Descripción: </b>Roles de canela 365g <br> <b>Disponibles: </b>8 productos <br> <b>Imagen: </b><img src=\'views/images/productos/front_es.5.400.jpg\' width=\'65\' height=\'65\'><br> <b>Precio de Compra: </b>$10.00 MXN <b>Precio de Venta: </b>$13.00 MXN<br> <b>Fecha de creación: </b>06/01/2021 4:24 pm'),
(100483, 'Eliminar Reporte', 'Reportes', 41, 41, 'DELETE FROM reportes WHERE IdReporte = \'IdReporte\'', '2021-01-07 18:21:34', 3, '<b>ID del Reporte: </b> <br><b>Nombre del Reporte: </b> <br>'),
(100484, 'Eliminar Reporte', 'Reportes', 41, 41, 'DELETE FROM reportes WHERE IdReporte = \'17\'', '2021-01-07 18:22:38', 2, '<b>ID del Reporte: </b>17 <br><b>Nombre del Reporte: </b>Reporte de Ventas de las fechas del 4 al 5 de <br>'),
(100485, 'Eliminar Reporte', 'Reportes', 32, 41, 'DELETE FROM reportes WHERE IdReporte = \'1\'', '2021-01-11 19:35:37', 3, '<b>ID del Reporte: </b>1 <br><b>Nombre del Reporte: </b>Reporte de Bitácora <br>'),
(100486, 'Eliminar Reporte', 'Reportes', 41, 41, 'DELETE FROM reportes WHERE IdReporte = \'12\'', '2021-01-12 00:25:14', 2, '<b>ID del Reporte: </b>12 <br><b>Nombre del Reporte: </b>Checker de reportes aplicados <br>'),
(100487, 'Eliminar Reporte', 'Reportes', 41, 41, 'DELETE FROM reportes WHERE IdReporte = \'3\'', '2021-01-12 00:25:10', 2, '<b>ID del Reporte: </b>3 <br><b>Nombre del Reporte: </b>Reporte de usuarios <br>'),
(100488, 'Eliminar Reporte', 'Reportes', 41, 41, 'DELETE FROM reportes WHERE IdReporte = \'13\'', '2021-01-12 00:25:06', 2, '<b>ID del Reporte: </b>13 <br><b>Nombre del Reporte: </b>Reporte de proveedores 2021 <br>'),
(100489, 'Eliminar Reporte', 'Reportes', 41, 41, 'DELETE FROM reportes WHERE IdReporte = \'18\'', '2021-01-12 00:25:03', 2, '<b>ID del Reporte: </b>18 <br><b>Nombre del Reporte: </b>Reporte de Mensajes <br>'),
(100490, 'Editar Venta', 'Ventas', 41, 41, 'UPDATE ventas SET IdFormaPago = 1, Productos = \'[{\"id\":\"9\",\"descripcion\":\"iPhone 11\",\"cantidad\":\"2\",\"stock\":\"6\",\"precio\":\"18999\",\"total\":\"37998\"}]\',Impuesto  = \'0\', IVA = 0,PagoNeto  = \'37998\', PagoTotal = \'37998\', Fecha = NOW() WHERE IdVenta= 1', '2021-01-20 19:59:23', 2, 'Actualizar Venta <br /><b>Código de Factura: </b>1 <br> <b>Cliente: </b>10000015 - Frenkie De Jong<br> <b>Productos: </b>[{\"id\":\"9\",\"descripcion\":\"iPhone 11\",\"cantidad\":\"2\",\"stock\":\"6\",\"precio\":\"18999\",\"total\":\"37998\"}] <br> <b>Metódo de pago: </b> Efectivo <br> <b>Pago Neto: </b>$37998 MXN <br> <b>Pago Total: </b>$37998 MXN <br> '),
(100491, 'Editar Venta', 'Ventas', 41, 41, 'UPDATE ventas SET IdFormaPago = 1, Productos = \'[{\"id\":\"9\",\"descripcion\":\"iPhone 11\",\"cantidad\":\"5\",\"stock\":\"3\",\"precio\":\"18999\",\"total\":\"94995\"}]\',Impuesto  = \'0\', IVA = 0,PagoNeto  = \'94995\', PagoTotal = \'94995\', Fecha = NOW() WHERE IdVenta= 1', '2021-01-20 20:01:53', 2, 'Actualizar Venta <br /><b>Código de Factura: </b>1 <br> <b>Cliente: </b>10000015 - Frenkie De Jong<br> <b>Productos: </b>[{\"id\":\"9\",\"descripcion\":\"iPhone 11\",\"cantidad\":\"5\",\"stock\":\"3\",\"precio\":\"18999\",\"total\":\"94995\"}] <br> <b>Metódo de pago: </b> Efectivo <br> <b>Pago Neto: </b>$94995 MXN <br> <b>Pago Total: </b>$94995 MXN <br> '),
(100492, 'Eliminar Cliente', 'Clientes', 42, 0, 'DELETE FROM clientes WHERE IdCliente = \'10000006\'', '2021-01-23 18:28:02', 1, '<b>Id del Cliente: </b>10000006 <br><b>Nombre del Cliente: </b>Cliente Desconocido <br><b>Apellido del Cliente: </b>Desconocido <br><b>Dirección: </b>Desconocido <br><b>Total de compras hechas: </b>5 compras<br>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL COMMENT 'Identificador ID del producto',
  `CodigoProd` varchar(40) NOT NULL COMMENT 'Código del producto',
  `NombreProducto` varchar(45) NOT NULL COMMENT 'Nombre del Producto',
  `DescProducto` text DEFAULT NULL COMMENT 'Descripción del Producto',
  `IdCategoria` int(11) NOT NULL COMMENT 'ID Categoría donde se encontrará el Producto',
  `Stock` int(10) NOT NULL COMMENT 'Cantidad disponible del Producto',
  `ImgProd` varchar(250) DEFAULT NULL COMMENT 'Imagen del Producto',
  `PrecioCompra` double NOT NULL COMMENT 'Precio de compra del Producto',
  `PrecioVenta` double NOT NULL COMMENT 'Precio de venta del Producto',
  `IdUsuario` int(11) NOT NULL COMMENT 'ID Usuario que agrego el Producto',
  `Fecha` datetime NOT NULL COMMENT 'Fecha en que se subió el producto',
  `StatusProd` int(1) NOT NULL DEFAULT 1 COMMENT '0= Inactivo 1=Activo ',
  `TotalVentas` int(11) DEFAULT 0 COMMENT 'Total de vetas que se han realizado sobre este producto',
  `IdProveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `CodigoProd`, `NombreProducto`, `DescProducto`, `IdCategoria`, `Stock`, `ImgProd`, `PrecioCompra`, `PrecioVenta`, `IdUsuario`, `Fecha`, `StatusProd`, `TotalVentas`, `IdProveedor`) VALUES
(9, '120001', 'iPhone 11', 'iPhone 11', 12, 11, '2324213-1.png', 14566, 18999, 41, '2020-07-27 14:23:00', 1, 5, 1),
(10, '110001', 'Leche LALA', 'Leche LALA', 11, 0, '7501020515343-00-CH1200Wx1200H.jpg', 17, 22, 41, '2020-07-27 14:24:36', 1, 3, 1),
(11, '120002', 'iPhone 6S', 'iPhone 6S', 12, 0, 'IPHONE095_FG.jpg', 6259, 7299, 41, '2020-07-27 16:21:37', 1, 6, 1),
(12, '120003', 'iPhone X reacondicionado', 'iPhone X reacondicionado', 12, 0, 'refurb-iphoneX-spacegray.jpg', 14200, 16500, 41, '2020-08-18 17:07:52', 1, 9, 1),
(13, '10001', 'Escoba', 'Escoba', 1, 0, '(X)PER-ESCOBA-P200.jpg', 10, 16, 41, '2020-10-08 12:34:41', 1, 23, 1),
(14, '50001', 'Jamón FUD', 'Jamón FUD', 5, 0, '1036033_S_1280_F.png', 7, 14, 41, '2020-10-08 12:36:11', 1, 19, 1),
(15, '120004', 'iPhone 12', 'iPhone 12', 12, 0, 'in_the_box__ftecp7px86q2_large.jpg', 21000, 26000, 41, '2020-10-19 11:01:07', 1, 2, 1),
(16, '130001', 'Paquete PlayStation 4 Slim 1 TB', 'Paquete PlayStation 4 Slim 1 TB', 13, 2, '716QjT5J0-L._AC_SL1200_.jpg', 8634.54, 10299, 41, '2020-10-20 13:12:16', 1, 3, 2),
(17, '140001', 'Jersey Barcelona Amarilla', 'Jersey Barcelona Amarilla', 14, 0, '15709888697791.jpg', 1000, 1200, 41, '2020-10-20 22:22:48', 1, 9, 1),
(18, '150001', 'Nike Air VaporMax Flyknit 3', 'Nike Air VaporMax Flyknit 3', 15, 1, 'calzado-air-vapormax-flyknit-3-kjL9RH.jpg', 2799, 3100, 41, '2020-10-22 12:08:28', 1, 16, 3),
(20, '7501055900022', 'Leche Alpura Clasica', 'Leche Alpura Clasica', 16, 2, 'front_es.7.400.jpg', 15, 20, 41, '2021-01-06 16:18:47', 1, 8, 4),
(21, '7501000309726', 'Roles de canela', 'Roles de canela 365g', 4, 3, 'front_es.5.400.jpg', 10, 13, 41, '2021-01-06 16:24:39', 1, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `IdProvedor` int(11) NOT NULL COMMENT 'ID del Proveedor',
  `RazonSocial` varchar(45) DEFAULT NULL COMMENT 'Razón social de la empresa',
  `NombreProveedor` varchar(45) NOT NULL COMMENT 'Nombre del proveedor',
  `Domicilio` varchar(45) NOT NULL COMMENT 'Domicilio del proveedor',
  `Poblacion` varchar(45) DEFAULT NULL COMMENT 'Poblacion/Municipio del proveedor',
  `CodigoPostal` int(11) NOT NULL COMMENT 'Código postal del proveedor',
  `Pais` varchar(45) NOT NULL COMMENT 'Pais del proveedor',
  `Telefono` int(11) NOT NULL COMMENT 'Teléfono del proveedor',
  `Email` varchar(145) NOT NULL COMMENT 'Correo electrónico del proveedor',
  `URL` varchar(45) DEFAULT NULL COMMENT 'Dirección web del proveedor',
  `FechaCreacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`IdProvedor`, `RazonSocial`, `NombreProveedor`, `Domicilio`, `Poblacion`, `CodigoPostal`, `Pais`, `Telefono`, `Email`, `URL`, `FechaCreacion`) VALUES
(1, 'No', 'Apple', 'California', 'California', 52689, 'Estados Unidos', 2147483647, 'apple@apple.com', NULL, '2021-01-06 00:00:00'),
(2, 'No', 'Sony', 'Palo Alto', 'California', 52489, 'Estados Unidos', 2147483647, 'sony@sony.com', NULL, '2021-01-06 00:00:00'),
(3, 'No', 'Nike', 'Mexico-Acapulco 368, Tulipanes ', 'Cuernavaca, Morelos', 62370, 'México', 2147483647, 'ventas@nike.com', '', '2021-01-06 00:00:00'),
(4, 'S.A de C.V.', 'Alpura', 'Avenida Tollocan', 'Toluca Estado de México', 52100, 'México', 2147483647, 'catzin10ficial@gmail.com', 'http://alpura.com', '2021-01-06 16:11:52'),
(5, 'S. A. de C. V.', 'Bimbo', 'Avenida Tollocan', 'Toluca Estado de México', 51400, 'México', 2147483647, 'catzin10ficial@gmail.com', '', '2021-01-06 16:22:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `IdReporte` int(11) NOT NULL COMMENT 'Id Reporte',
  `TipoReporte` int(1) NOT NULL DEFAULT 1 COMMENT '1= Control 2= Avisos',
  `TituloReporte` varchar(45) NOT NULL,
  `ArchivoReporte` varchar(100) DEFAULT NULL,
  `DescReporte` text NOT NULL COMMENT 'SQL o Descripción del reporte',
  `FechaReporte` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación del reporte',
  `StatusReporte` int(1) NOT NULL DEFAULT 1 COMMENT '1= Activo 2= Inactivo',
  `IdUsuario` int(11) DEFAULT NULL COMMENT 'Usuario que genero el reporte',
  `FechaCreacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`IdReporte`, `TipoReporte`, `TituloReporte`, `ArchivoReporte`, `DescReporte`, `FechaReporte`, `StatusReporte`, `IdUsuario`, `FechaCreacion`) VALUES
(1, 1, 'Reporte de Bitácora', 'Reporte_de_Bitácora', 'SELECT ROW_NUMBER() OVER(ORDER BY b.IdBitacora desc) as Num, UPPER(b.Proceso) as Proceso, case b.TipoMensaje when \'A\' then \'ADVERTENCIA\' else \'ERROR\' end as TipoMensaje, UPPER(b.Mensaje) as Mensaje, UPPER(u.Usuario) as Ejecutado_por, b.Fecha as Fecha FROM bitacora b INNER JOIN usuarios u on u.IdUsuario = b.IdUsuario order by Fecha desc', '2021-01-18 19:23:38', 1, NULL, '2021-01-06 13:28:24'),
(2, 1, 'Reporte de venta', 'Reporte_de_venta', 'SELECT v.IdVenta as IdVenta, v.CodFactura as CodFactura, concat_ws(\' \', c.NombreCliente, c.ApellidoCliente) as NombreCliente,  u.Usuario as Vendedor, fp.DescFormaPago as FormaPago, case when v.IdFormaPago != 1 then concat_ws(\'-\', fp.AbrevFormaPago, v.CodTransaccion) else concat_ws(\'-\', fp.AbrevFormaPago, v.CodFactura) end as CodigoPago, v.PagoNeto as PagoNeto, v.PagoTotal as PagoTotal, v.Fecha as FechaVenta FROM ventas v INNER JOIN clientes c ON c.IdCliente = v.IdCliente  INNER JOIN usuarios u ON u.IdUsuario = v.IdUsuario INNER JOIN formapago fp ON fp.IdFormaPago = v.IdFormaPago ORDER BY v.IdVenta ASC', '2021-01-18 19:23:38', 1, 41, '2021-01-06 13:28:24'),
(4, 1, 'Reporte de rutas', 'Reporte_de_rutas', 'SELECT * FROM rutas', '2021-01-18 19:23:38', 1, 41, '2021-01-06 13:28:24'),
(5, 1, 'Reporte de inventario de productos', 'Reporte_de_inventario_de_productos', 'SELECT p.IdProducto, p.CodigoProd as CodigoProd, p.NombreProducto as NombreProducto, p.DescProducto as DescProducto,\n c.NombreCategoria as IdCategoria, p.Stock as Stock,CONCAT(\'<img src=\"views/images/productos/\',p.ImgProd,\'\" width=\"60px\" height:\"60px\" />\') as ImgProd, p.PrecioCompra as PrecioCompra,\n p.PrecioVenta as PrecioVenta, p.TotalVentas as TotalVentas, u.Usuario as IdUsuario, p.Fecha as Fecha,case p.StatusProd when 1 then \'ACTIVO\'\n else \'INACTIVO\' end as Estatus \n FROM productos p INNER JOIN categorias c ON c.IdCategoria = p.IdCategoria INNER JOIN \n usuarios u ON u.IdUsuario = p.IdUsuario', '2021-01-18 19:23:38', 1, 41, '2021-01-06 13:28:24'),
(6, 1, 'Reporte de clientes', 'Reporte_de_clientes', 'SELECT * FROM clientes WHERE IdCliente NOT IN(1) order by IdCliente', '2021-01-18 19:23:38', 1, 41, '2021-01-06 13:28:24'),
(8, 1, 'Reporte de rutas de acceso', 'Reporte_de_rutas_de_acceso', 'SELECT ROW_NUMBER() OVER(ORDER BY r.IdRole ASC) as Num, r.DescripcionRol as Rol, rt.rutadesc as Ruta_Descripcion, \nrt.tituloruta as Titulo_Ruta FROM accessruta ac INNER JOIN \nroles r on r.idRole = ac.IdRol INNER JOIN rutas rt on rt.idrutas = ac.IdRuta', '2021-01-18 19:23:38', 1, 41, '2021-01-06 13:28:24'),
(19, 1, 'Reporte de bitacora mes enero', 'Reporte_de_bitacora_mes_enero', 'SELECT ROW_NUMBER() OVER(ORDER BY b.IdBitacora desc) as Num, UPPER(b.Proceso) as Proceso, case b.TipoMensaje when \'A\' then \'ADVERTENCIA\' else \'ERROR\' end as TipoMensaje, UPPER(b.Mensaje) as Mensaje, UPPER(u.Usuario) as Ejecutado_por, b.Fecha as Fecha FROM bitacora b INNER JOIN usuarios u on u.IdUsuario = b.IdUsuario WHERE b.Fecha BETWEEN \'2021/01/01\' AND  \'2021/01/11\'  order by Fecha desc', '2021-01-18 19:23:38', 1, 41, '2021-01-11 13:08:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRole` int(11) NOT NULL COMMENT 'Id Rol de Usuario',
  `DescripcionRol` varchar(45) NOT NULL COMMENT 'Descripción del Rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRole`, `DescripcionRol`) VALUES
(1, 'SuperUsuario'),
(2, 'Administrador'),
(3, 'Especial'),
(4, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `idrutas` int(11) NOT NULL COMMENT 'Identificador de la ruta de acceso',
  `rutadesc` varchar(45) NOT NULL COMMENT 'Ruta URL',
  `menutitle` varchar(45) DEFAULT NULL COMMENT 'Titulo del Menú',
  `tituloruta` varchar(45) DEFAULT NULL COMMENT 'Titulo de la ruta',
  `tiporuta` int(11) DEFAULT NULL COMMENT '1 = Todos, 2= Menu Aside, 3 = Menu Header',
  `iconruta` varchar(145) DEFAULT NULL COMMENT 'Icono de la ruta',
  `fecha` timestamp NULL DEFAULT NULL COMMENT 'Fecha de creación de la ruta',
  `activo` int(1) NOT NULL COMMENT 'Estatus de la ruta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`idrutas`, `rutadesc`, `menutitle`, `tituloruta`, `tiporuta`, `iconruta`, `fecha`, `activo`) VALUES
(1, 'inicio', 'Panel de control', 'Panel de control', 2, 'fas fa-tachometer-alt', '2020-07-04 05:00:00', 1),
(2, 'nueva-venta', 'Nueva venta', 'Nueva venta', 2, 'fas fa-cash-register', '2020-07-04 05:00:00', 1),
(3, 'admin-venta', 'Administrar ventas', 'Administrador de venta', 2, 'fas fa-hand-holding-usd', '2020-07-04 05:00:00', 1),
(4, 'reporte-venta', 'Reporte de ventas', 'Reporte de ventas', 2, 'fas fa-balance-scale', '2020-07-04 05:00:00', 1),
(5, 'inventario', 'Productos', 'Inventario de productos', 2, 'fas fa-store', '2020-07-04 05:00:00', 1),
(6, 'categorias', 'Categorías', 'Categorías', 2, 'fas fa-table', '2020-07-04 05:00:00', 1),
(7, 'proveedores', 'Proveedores', 'Proveedores', 2, 'fas fa-building', '2020-07-04 05:00:00', 1),
(8, 'clientes', 'Clientes', 'Clientes', 2, 'fas fa-handshake', '2020-07-04 05:00:00', 1),
(9, 'usuarios', 'Usuarios', 'Administrador de usuarios', 2, 'fas fa-users', '2020-07-04 05:00:00', 1),
(10, 'reportes', 'Control de reportes', 'Control de reportes', 2, 'fas fa-flag', '2020-07-04 05:00:00', 1),
(11, 'inbox', 'Buzón de mensajes', 'Buzón de mensajes', 2, 'fas fa-envelope', '2020-07-04 05:00:00', 1),
(12, 'checker', 'Autorización', 'Autorización de actividades', 2, 'fas fa-clipboard-check', '2020-07-04 05:00:00', 1),
(13, 'bitacora', 'Bitácora', 'Bitácora de control', 2, 'fas fa-book', '2020-07-04 05:00:00', 1),
(14, 'configuracion', 'Configuraciones', 'Configuraciones', 2, 'fas fa-tools', '2020-07-04 05:00:00', 1),
(15, 'logout', 'Cerrar sesión', 'Cerrar sesión', 1, 'fas fa-power-off', '2020-07-04 05:00:00', 1),
(16, 'login', NULL, 'Acceso al módulo de administración de ventas', 1, NULL, '2020-07-04 05:00:00', 1),
(17, 'cambiar-foto', NULL, 'Cambiar foto de perfil', 1, NULL, '2020-07-04 05:00:00', 1),
(18, 'editar-venta', NULL, 'Editar Venta', 1, NULL, '2020-07-04 05:00:00', 1),
(19, 'add-reporte', '', 'Nuevo reporte', 1, NULL, '2020-07-04 05:00:00', 1),
(20, 'add-proveedor', NULL, 'Nuevo proveedor', 1, NULL, '2020-07-04 05:00:00', 1),
(21, 'editar-reporte', NULL, 'Editar Reporte', 1, NULL, '2020-07-04 05:00:00', 1),
(22, 'messages', NULL, 'Mensajes', 1, '', '2020-07-04 05:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL COMMENT 'Identificador de usuario',
  `Nombre` varchar(45) NOT NULL COMMENT 'Nombre de pila del usuario',
  `Usuario` varchar(45) NOT NULL COMMENT 'Username',
  `Password` varchar(45) NOT NULL COMMENT 'Password del usuario',
  `Rol` int(11) NOT NULL COMMENT 'Rol del usuario (Catalogo: Roles)',
  `Foto` varchar(45) DEFAULT 'default/anonymous.png' COMMENT 'Foto del usuario',
  `Estatus` int(1) NOT NULL DEFAULT 1 COMMENT 'Estatus del usuario 1: Activo / 0: Inactivo',
  `UltLogin` datetime DEFAULT NULL COMMENT 'Fecha de último a la plataforma',
  `FechaCreacion` datetime NOT NULL COMMENT 'Fecha de creación del usuario',
  `IdUsuarioAdd` int(11) NOT NULL DEFAULT 41 COMMENT 'Usuario que registra'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Nombre`, `Usuario`, `Password`, `Rol`, `Foto`, `Estatus`, `UltLogin`, `FechaCreacion`, `IdUsuarioAdd`) VALUES
(13, 'Alonso', 'Alonso12', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 2, 'default/anonymous.png', 1, '2021-01-14 11:09:29', '2020-07-17 18:34:40', 0),
(16, 'Lionel Messi', 'Leomessi10', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 2, 'default/anonymous.png', 1, '2020-07-17 18:32:04', '2020-07-17 18:34:40', 0),
(20, 'Alonso Catzin', 'Alonso21', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 1, 'default/anonymous.png', 1, '2020-12-31 16:59:25', '2020-07-17 18:34:40', 0),
(30, 'Carlos Alonso', 'VazquezCatzin', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 2, 'default/anonymous.png', 1, '2021-01-08 13:58:36', '2020-07-17 18:34:40', 0),
(31, 'Carlos', 'Carlos1', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 4, 'default/anonymous.png', 1, '2021-01-23 12:23:24', '2020-07-17 18:39:58', 0),
(32, 'Carlos Catzin', 'Carlos10Catzin10', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 3, 'default/anonymous.png', 1, '2021-01-23 12:29:31', '2020-07-17 19:29:00', 0),
(40, 'Carlos Catzin', 'Lionel', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 2, 'default/anonymous.png', 1, '2021-01-11 13:33:12', '2020-07-20 19:28:48', 2),
(41, 'Carlos Alonso Vazquez Catzin', 'Administrador', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 1, 'default/avatar.png', 1, '2021-01-25 19:05:39', '2020-07-23 17:49:05', 2),
(42, 'Efisoft', 'Efisoft', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 4, 'default/anonymous.png', 1, '2021-01-23 12:24:55', '2020-10-20 17:51:45', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL COMMENT 'Identficador de la venta',
  `CodFactura` int(11) NOT NULL COMMENT 'Código de la factura de venta',
  `IdCliente` int(11) DEFAULT 1 COMMENT 'Cliente de la venta',
  `IdUsuario` int(11) NOT NULL COMMENT 'Usuario/Vendedor que atiende la venta',
  `IdFormaPago` int(11) NOT NULL COMMENT '1=Efectivo, 2=Tarjeta de Credito, 3=Tarjeta de debito, 4=Transferencia',
  `Productos` text NOT NULL,
  `Impuesto` double DEFAULT NULL,
  `CodTransaccion` varchar(200) DEFAULT NULL,
  `IVA` int(11) DEFAULT NULL,
  `PagoNeto` double DEFAULT NULL,
  `PagoTotal` double NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IdVenta`, `CodFactura`, `IdCliente`, `IdUsuario`, `IdFormaPago`, `Productos`, `Impuesto`, `CodTransaccion`, `IVA`, `PagoNeto`, `PagoTotal`, `Fecha`) VALUES
(1, 1, 10000015, 41, 1, '[{\"id\":\"9\",\"descripcion\":\"iPhone 11\",\"cantidad\":\"5\",\"stock\":\"3\",\"precio\":\"18999\",\"total\":\"94995\"}]', 0, NULL, 0, 94995, 94995, '2021-01-20 14:01:53'),
(2, 2, 1, 41, 1, '[{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"7\",\"precio\":\"13\",\"total\":\"13\"},{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"20\",\"total\":\"20\"}]', 0, NULL, 0, 33, 33, '2021-01-06 16:26:01'),
(3, 3, 10000004, 32, 1, '[{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"6\",\"precio\":\"13\",\"total\":\"13\"},{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"1\",\"stock\":\"8\",\"precio\":\"20\",\"total\":\"20\"},{\"id\":\"18\",\"descripcion\":\"Nike Air VaporMax Flyknit 3\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"3100\",\"total\":\"3100\"}]', 0, NULL, 0, 3133, 3133, '2021-01-09 13:42:13'),
(4, 4, 1, 42, 1, '[{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"4\",\"stock\":\"4\",\"precio\":\"20\",\"total\":\"80\"},{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"5\",\"precio\":\"13\",\"total\":\"13\"}]', 0, NULL, 0, 93, 93, '2021-01-11 10:16:41'),
(5, 5, 10000004, 41, 1, '[{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"4\",\"precio\":\"13\",\"total\":\"13\"},{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"20\",\"total\":\"20\"},{\"id\":\"18\",\"descripcion\":\"Nike Air VaporMax Flyknit 3\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"3100\",\"total\":\"3100\"},{\"id\":\"16\",\"descripcion\":\"Paquete PlayStation 4 Slim 1 TB\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"10299\",\"total\":\"10299\"},{\"id\":\"11\",\"descripcion\":\"iPhone 6S\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"7299\",\"total\":\"7299\"},{\"id\":\"9\",\"descripcion\":\"iPhone 11\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"18999\",\"total\":\"18999\"}]', 7946, NULL, 20, 39730, 47676, '2021-01-11 18:29:37'),
(6, 6, 10000004, 41, 1, '[{\"id\":\"21\",\"descripcion\":\"Roles de canela\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"13\",\"total\":\"13\"},{\"id\":\"20\",\"descripcion\":\"Leche Alpura Clasica\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"20\",\"total\":\"20\"}]', 0, NULL, 0, 33, 33, '2021-01-23 12:13:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accessruta`
--
ALTER TABLE `accessruta`
  ADD PRIMARY KEY (`IdAccessRuta`),
  ADD KEY `Fk_Rol` (`IdRol`),
  ADD KEY `Fk_Ruta` (`IdRuta`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`IdBitacora`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`),
  ADD KEY `Usuario` (`IdUsuario`);

--
-- Indices de la tabla `formapago`
--
ALTER TABLE `formapago`
  ADD PRIMARY KEY (`IdFormaPago`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`IdMensajes`);

--
-- Indices de la tabla `mensajes_details`
--
ALTER TABLE `mensajes_details`
  ADD PRIMARY KEY (`IdMensajeDetails`),
  ADD KEY `FK_Mensaje` (`IdMensajes`);

--
-- Indices de la tabla `pendientes`
--
ALTER TABLE `pendientes`
  ADD PRIMARY KEY (`IdPendiente`),
  ADD KEY `FK_Usuario` (`IdUsuarioEject`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `PK_Categorias` (`IdCategoria`),
  ADD KEY `PK_Usuario` (`IdUsuario`),
  ADD KEY `PK_Provedor` (`IdProveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`IdProvedor`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`IdReporte`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`idrutas`,`rutadesc`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`,`Usuario`),
  ADD KEY `Rol` (`Rol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`,`CodFactura`),
  ADD KEY `ClienteFK` (`IdCliente`),
  ADD KEY `UsuarioFK` (`IdUsuario`),
  ADD KEY `FormaPagoFK` (`IdFormaPago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accessruta`
--
ALTER TABLE `accessruta`
  MODIFY `IdAccessRuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `IdBitacora` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la bitacora', AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la categoría', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Idenificador del cliente', AUTO_INCREMENT=10000016;

--
-- AUTO_INCREMENT de la tabla `formapago`
--
ALTER TABLE `formapago`
  MODIFY `IdFormaPago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificado de Forma de pago', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `IdMensajes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la sala de mensajes', AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `mensajes_details`
--
ALTER TABLE `mensajes_details`
  MODIFY `IdMensajeDetails` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT de la tabla `pendientes`
--
ALTER TABLE `pendientes`
  MODIFY `IdPendiente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del checker', AUTO_INCREMENT=100493;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador ID del producto', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `IdProvedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del Proveedor', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `IdReporte` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Reporte', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Rol de Usuario', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `idrutas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la ruta de acceso', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de usuario', AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identficador de la venta', AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accessruta`
--
ALTER TABLE `accessruta`
  ADD CONSTRAINT `Fk_Rol` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Fk_Ruta` FOREIGN KEY (`IdRuta`) REFERENCES `rutas` (`idrutas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajes_details`
--
ALTER TABLE `mensajes_details`
  ADD CONSTRAINT `FK_Mensaje` FOREIGN KEY (`IdMensajes`) REFERENCES `mensajes` (`IdMensajes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pendientes`
--
ALTER TABLE `pendientes`
  ADD CONSTRAINT `FK_Usuario` FOREIGN KEY (`IdUsuarioEject`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `PK_Categorias` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PK_Provedor` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedores` (`IdProvedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PK_Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `Rol` FOREIGN KEY (`Rol`) REFERENCES `roles` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ClienteFK` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FormaPagoFK` FOREIGN KEY (`IdFormaPago`) REFERENCES `formapago` (`IdFormaPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `UsuarioFK` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
