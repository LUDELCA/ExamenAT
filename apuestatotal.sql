-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2023 a las 03:25:05
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apuestatotal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_banco`
--

CREATE TABLE `tbl_banco` (
  `id_banco` int(11) NOT NULL,
  `nom_banco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_cuenta` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_hora_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbl_banco`
--

INSERT INTO `tbl_banco` (`id_banco`, `nom_banco`, `num_cuenta`, `estado`, `fecha_hora_registro`) VALUES
(7, 'BCP', 2, 1, '2023-07-06 20:01:41'),
(8, 'BBVA', 3, 1, '2023-07-06 20:05:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_player` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_documento` int(11) NOT NULL,
  `num_documento` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '1 DNI 2 CARNET DE EXTRANJERIA',
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dinero_actual` decimal(18,2) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_hora_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id_cliente`, `id_player`, `tipo_documento`, `num_documento`, `nombre`, `apellido`, `celular`, `correo_electronico`, `dinero_actual`, `estado`, `fecha_hora_registro`) VALUES
(6, '1', 0, '75336129', 'Luis', 'Casaretto', '981568528', 'luisdc05@gmail.com', '0.00', 1, '2023-07-06 20:01:53'),
(7, '2', 1, '12345678', 'Salvador', 'Delgado', '987654321', 'salvador@gmail.com', '0.00', 1, '2023-07-06 20:08:31'),
(8, '3', 1, '77777777', 'Pedro', 'Castillo', '999999999', 'pedro.castillo@outlook.com', '0.00', 1, '2023-07-06 20:08:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_documento`
--

CREATE TABLE `tbl_tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `tipo_documento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_transaccion`
--

CREATE TABLE `tbl_transaccion` (
  `id_transaccion` int(11) NOT NULL,
  `id_cliente` varchar(50) DEFAULT NULL,
  `id_canal` int(255) DEFAULT NULL,
  `id_banco` int(255) DEFAULT NULL,
  `monto` decimal(18,2) DEFAULT NULL,
  `comprobante` varchar(150) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_hora_registro` datetime DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbl_transaccion`
--

INSERT INTO `tbl_transaccion` (`id_transaccion`, `id_cliente`, `id_canal`, `id_banco`, `monto`, `comprobante`, `estado`, `fecha_hora_registro`, `fecha`) VALUES
(13, '6', 1, 7, '1.00', 'imagenes/file_6_20230706200224_2467.jpg', 1, '2023-07-06 20:02:24', '2023-07-01 20:02:00'),
(14, '6', 2, 7, '2.50', 'imagenes/file_6_20230706200238_728.jpg', 1, '2023-07-06 20:02:38', '2023-07-02 20:02:00'),
(15, '6', 3, 7, '6.30', 'imagenes/file_6_20230706200254_6990.jpg', 1, '2023-07-06 20:02:54', '2023-07-03 20:02:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_banco`
--
ALTER TABLE `tbl_banco`
  ADD PRIMARY KEY (`id_banco`) USING BTREE;

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id_cliente`) USING BTREE;

--
-- Indices de la tabla `tbl_tipo_documento`
--
ALTER TABLE `tbl_tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`) USING BTREE;

--
-- Indices de la tabla `tbl_transaccion`
--
ALTER TABLE `tbl_transaccion`
  ADD PRIMARY KEY (`id_transaccion`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_banco`
--
ALTER TABLE `tbl_banco`
  MODIFY `id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_documento`
--
ALTER TABLE `tbl_tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_transaccion`
--
ALTER TABLE `tbl_transaccion`
  MODIFY `id_transaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
