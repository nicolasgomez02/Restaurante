-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 17:19:09
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
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebida`
--

CREATE TABLE `bebida` (
  `id_bebida` int(11) NOT NULL,
  `tipo_bebida` char(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_menu`
--

CREATE TABLE `detalle_menu` (
  `id_detalle` int(11) NOT NULL,
  `id_comida` int(12) DEFAULT NULL,
  `cod_menu` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detallep` int(11) NOT NULL,
  `id_pedido` int(12) DEFAULT NULL,
  `cod_menu` int(12) DEFAULT NULL,
  `id_detalle` int(12) DEFAULT NULL,
  `id_tip_ped` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `cantidades` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_esta` int(3) NOT NULL,
  `tipo_estado` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_esta`, `tipo_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Disponible'),
(4, 'No disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `ref_pago` int(4) NOT NULL,
  `tip_pago` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`ref_pago`, `tip_pago`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta'),
(3, 'PSE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `cod_menu` int(3) NOT NULL,
  `id_esta` int(3) DEFAULT NULL,
  `id_comida` int(11) DEFAULT NULL,
  `precio_ofert` int(6) DEFAULT NULL,
  `precio` int(6) DEFAULT NULL,
  `tiempo_estimado` varchar(40) DEFAULT NULL,
  `QR` float DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`cod_menu`, `id_esta`, `id_comida`, `precio_ofert`, `precio`, `tiempo_estimado`, `QR`, `foto`) VALUES
(124, 3, 100, 0, 12000, '15 minutos', NULL, NULL),
(233, 3, 101, NULL, 6000, 'no tiene', NULL, NULL),
(555, 4, 98, NULL, 9000, '20 minutos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `cod_mesa` int(4) NOT NULL,
  `n_mesa` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`cod_mesa`, `n_mesa`) VALUES
(1, 'Mesa 1'),
(2, 'Mesa 2'),
(3, 'Mesa 3'),
(4, 'Mesa 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usu` int(12) DEFAULT NULL,
  `cod_mesa` int(12) DEFAULT NULL,
  `id_esta` int(12) DEFAULT NULL,
  `ref_pago` int(12) DEFAULT NULL,
  `QR` float DEFAULT NULL,
  `foto` char(200) DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(3) NOT NULL,
  `tip_rol` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `tip_rol`) VALUES
(1, 'Administrador'),
(2, 'Mesero'),
(3, 'Jefe de cocina'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comida`
--

CREATE TABLE `tipo_comida` (
  `id_comida` int(11) NOT NULL,
  `tipo_comida` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_comida`
--

INSERT INTO `tipo_comida` (`id_comida`, `tipo_comida`) VALUES
(98, 'Pescado sudado'),
(99, 'Spagueti'),
(100, 'bandeja paisa'),
(101, 'Coca cola'),
(102, 'Pepsi'),
(103, 'Ginger');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pedido`
--

CREATE TABLE `tipo_pedido` (
  `id_tip_ped` int(11) NOT NULL,
  `tipo_ped` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_pedido`
--

INSERT INTO `tipo_pedido` (`id_tip_ped`, `tipo_ped`) VALUES
(1, 'Llevar'),
(2, 'Retaurante'),
(3, 'Domicilio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(12) NOT NULL,
  `id_rol` int(3) DEFAULT NULL,
  `nom_usu` char(50) DEFAULT NULL,
  `ape_usu` char(50) DEFAULT NULL,
  `tel_usu` bigint(10) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `contraseña` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `id_rol`, `nom_usu`, `ape_usu`, `tel_usu`, `email`, `contraseña`) VALUES
(123, 2, 'Kamilo', 'Silva', 3248908763, 'ffgg@ggg', '$2y$10$Nt8Znx.pPJwvQPV1CdhoLehnwnHBgah.gt4Zrr2O00qMXKc70B3MK'),
(134, 3, 'Kamilo', 'Rivera', 3229576101, 'r_juan98@gmail.com', '$2y$10$bvQGzn3gmTEkJ1fCsofcEuRAfEaL/Lc0Fd1g9VHcvkYkl7GtoKzC.'),
(1005772553, 1, 'Nicolas Andres', 'Gomez Leal', 3212113205, 'ng@gmail.com', '$2y$10$4pO5BgfslQjSiJ986JfpsuodtirCZkuTBuGE/Qrw5QJQqIeSBF67K');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id_bebida`);

--
-- Indices de la tabla `detalle_menu`
--
ALTER TABLE `detalle_menu`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_comida` (`id_comida`),
  ADD KEY `cod_menu` (`cod_menu`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detallep`),
  ADD KEY `cod_menu` (`cod_menu`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_detalle` (`id_detalle`),
  ADD KEY `detalle_pedido_ibfk_4` (`id_tip_ped`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_esta`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`ref_pago`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`cod_menu`),
  ADD KEY `id_esta` (`id_esta`),
  ADD KEY `id_comida` (`id_comida`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`cod_mesa`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `cod_mesa` (`cod_mesa`),
  ADD KEY `id_esta` (`id_esta`),
  ADD KEY `ref_pago` (`ref_pago`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_comida`
--
ALTER TABLE `tipo_comida`
  ADD PRIMARY KEY (`id_comida`);

--
-- Indices de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
  ADD PRIMARY KEY (`id_tip_ped`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id_bebida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_menu`
--
ALTER TABLE `detalle_menu`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detallep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
  MODIFY `id_tip_ped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_menu`
--
ALTER TABLE `detalle_menu`
  ADD CONSTRAINT `detalle_menu_ibfk_1` FOREIGN KEY (`id_comida`) REFERENCES `tipo_comida` (`id_comida`),
  ADD CONSTRAINT `detalle_menu_ibfk_2` FOREIGN KEY (`cod_menu`) REFERENCES `menu` (`cod_menu`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`cod_menu`) REFERENCES `menu` (`cod_menu`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_3` FOREIGN KEY (`id_detalle`) REFERENCES `detalle_menu` (`id_detalle`),
  ADD CONSTRAINT `detalle_pedido_ibfk_4` FOREIGN KEY (`id_tip_ped`) REFERENCES `tipo_pedido` (`id_tip_ped`);

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_esta`) REFERENCES `estado` (`id_esta`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_comida`) REFERENCES `tipo_comida` (`id_comida`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`cod_mesa`) REFERENCES `mesas` (`cod_mesa`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_esta`) REFERENCES `estado` (`id_esta`),
  ADD CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`ref_pago`) REFERENCES `forma_pago` (`ref_pago`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
