-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2022 a las 15:44:56
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certifico`
--

CREATE TABLE `certifico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(25) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dcertifico`
--

CREATE TABLE `dcertifico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siglas` varchar(15) NOT NULL,
  `num_inicial` int(11) NOT NULL,
  `num_final` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id`, `nombre`) VALUES
(1, 'Isla de la Juventud'),
(2, 'Artemisa'),
(3, 'Camagüey'),
(4, 'Ciego de Ávila'),
(5, 'Cienfuegos'),
(6, 'Granma'),
(7, 'Guantánamo'),
(8, 'Holguín'),
(9, 'La Habana'),
(10, 'Las Tunas'),
(11, 'Matanzas'),
(12, 'Mayabeque'),
(13, 'Pinar del Río'),
(14, 'Sancti Spíritus'),
(15, 'Santiago de Cuba'),
(16, 'Villa Clara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dholograma`
--

CREATE TABLE `dholograma` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siglas` varchar(15) NOT NULL,
  `num_inicial` int(11) NOT NULL,
  `num_final` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dlicencia`
--

CREATE TABLE `dlicencia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siglas` varchar(15) NOT NULL,
  `num_inicial` int(11) NOT NULL,
  `num_final` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dminscripcion`
--

CREATE TABLE `dminscripcion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siglas` varchar(15) NOT NULL,
  `num_inicial` int(11) NOT NULL,
  `num_final` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpegatina`
--

CREATE TABLE `dpegatina` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siglas` varchar(15) NOT NULL,
  `num_inicial` int(11) NOT NULL,
  `num_final` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `anno` int(4) NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dpegatina`
--

INSERT INTO `dpegatina` (`id`, `siglas`, `num_inicial`, `num_final`, `cant`, `fecha`, `destino`, `obs`, `anno`, `idp`) VALUES
(1, 'qw', 11, 355, 344, '2022-08-04', 'cuba', '', 1234, 1),
(2, '', 4, 10, 6, '2022-08-03', 'cuba', '', 1234, 2),
(3, '', 1, 7, 6, '2022-08-10', 'cuba', '', 2050, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `holograma`
--

CREATE TABLE `holograma` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(25) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(25) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mc`
--

CREATE TABLE `mc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `minscripcion`
--

CREATE TABLE `minscripcion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(25) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pegatina`
--

CREATE TABLE `pegatina` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(25) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `anno` int(4) NOT NULL,
  `idp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `certifico`
--
ALTER TABLE `certifico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `dcertifico`
--
ALTER TABLE `dcertifico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `dholograma`
--
ALTER TABLE `dholograma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `dlicencia`
--
ALTER TABLE `dlicencia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `dminscripcion`
--
ALTER TABLE `dminscripcion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `dpegatina`
--
ALTER TABLE `dpegatina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `holograma`
--
ALTER TABLE `holograma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `mc`
--
ALTER TABLE `mc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `minscripcion`
--
ALTER TABLE `minscripcion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `pegatina`
--
ALTER TABLE `pegatina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certifico`
--
ALTER TABLE `certifico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dcertifico`
--
ALTER TABLE `dcertifico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `dholograma`
--
ALTER TABLE `dholograma`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dlicencia`
--
ALTER TABLE `dlicencia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dminscripcion`
--
ALTER TABLE `dminscripcion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dpegatina`
--
ALTER TABLE `dpegatina`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `holograma`
--
ALTER TABLE `holograma`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mc`
--
ALTER TABLE `mc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `minscripcion`
--
ALTER TABLE `minscripcion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pegatina`
--
ALTER TABLE `pegatina`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
