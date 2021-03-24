-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2021 a las 20:25:45
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conejospanama`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_conejos_disponibles` ()  NO SQL
Begin 
	SELECT * FROM conejos WHERE estado = "disponible";
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_conejos_filtro` (IN `val` VARCHAR(50))  NO SQL
BEGIN
	SELECT * FROM conejos WHERE raza = val and estado = "disponible";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_reservas` (IN `val` VARCHAR(50))  NO SQL
SELECT nombre, ubicacion, tel, codigo, sexo, precio FROM reservas, conejos WHERE reservas.estado = val AND conejos.id = id_conejo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reservar_crear` (IN `name` VARCHAR(50), IN `dir` VARCHAR(100), IN `num` VARCHAR(20), IN `esta` VARCHAR(10), IN `cone` INT(10))  NO SQL
begin
	INSERT into reservas (nombre, ubicacion, tel, estado, id_conejo) VALUES (name, dir, num, esta, cone);
    
    UPDATE conejos SET estado='reservado' WHERE id = cone;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conejos`
--

CREATE TABLE `conejos` (
  `id` int(5) NOT NULL,
  `Codigo` varchar(10) NOT NULL,
  `Imagen` varchar(500) DEFAULT NULL,
  `raza` varchar(50) DEFAULT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `precio` varchar(10) DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conejos`
--

INSERT INTO `conejos` (`id`, `Codigo`, `Imagen`, `raza`, `edad`, `sexo`, `precio`, `estado`) VALUES
(1, 'N1M', 'disponible4.jpg', 'Nacional', '2 meses', 'macho', '15.00', 'reservado'),
(123, '123', NULL, 'e', 'ewqe', 'eeeq', 'qweqw', 'disponible'),
(124, '12', NULL, 'e', 'ewqe', 'eeeq', 'qweqw', 'disponible'),
(125, 'N2M', 'disponible4.jpg', 'Nacional', '2 meses', 'macho', '15.00', 'reservado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `id_conejo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `nombre`, `ubicacion`, `tel`, `estado`, `id_conejo`) VALUES
(13, 'dsad', 'dsad', 'dsad', 'espera', 0),
(14, 'alguien', 'aqui', '12312', 'espera', 1),
(15, 'dsad', 'dsadad', 'dasdasd', 'espera', 125),
(16, 'hornet', 'd', 'ewqeqweq', 'espera', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conejos`
--
ALTER TABLE `conejos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conejos`
--
ALTER TABLE `conejos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
