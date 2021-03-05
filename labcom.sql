-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2021 a las 00:33:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crtp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorio`
--

CREATE TABLE `accesorio` (
  `NroInventarioAccesorio` int(11) NOT NULL,
  `NroAccesorio` int(11) NOT NULL,
  `Existencias` int(2) NOT NULL,
  `Descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `accesorio`
--

INSERT INTO `accesorio` (`NroInventarioAccesorio`, `NroAccesorio`, `Existencias`, `Descripcion`) VALUES
(0, 0, 6, 'Alargador de corriente'),
(1, 1, 4, 'Proyector EPSON'),
(2, 2, 4, 'Laptop PHP'),
(3, 3, 2, 'Filmadora SONY'),
(4, 4, 4, 'GPS Garmin'),
(5, 5, 2, 'Camara NIKON'),
(6, 6, 2, 'Retroproyector'),
(7, 7, 2, 'Slide Projector'),
(9, 9, 2, 'Adaptador'),
(10, 2, 2, 'Tripode');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `NroCIAdmin` int(11) NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`NroCIAdmin`, `Nombre`, `Usuario`, `Password`) VALUES
(111, 'Michael Jordan', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamoaccesorio`
--

CREATE TABLE `prestamoaccesorio` (
  `PrestamoID` int(11) NOT NULL,
  `NroPrestamo` varchar(50) NOT NULL,
  `NroCIAdmin` int(11) NOT NULL,
  `NroCIUsuario` int(11) NOT NULL,
  `NroInventarioAccesorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NroCIUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NroCIUsuario`, `NombreUsuario`) VALUES
(2458963, 'Andres Molina Mamani'),
(4581267, 'Orlando Daniel Camacho Quispe'),
(5622157, 'Diego Julio Camacho Mariscal'),
(7854125, 'Andrea Valentina Ordoñez Sanchez'),
(7854126, 'Barack Obama Sanchez Gonzales'),
(8399290, 'Oscar Marcelo Miranda Rodríguez'),
(8523659, 'Andres Julio Cordoba Añez'),
(8559604, 'Alejandra Roxana Molina Candia'),
(8596231, 'Michael Jackson Quiñonez Perez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorio`
--
ALTER TABLE `accesorio`
  ADD PRIMARY KEY (`NroInventarioAccesorio`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`NroCIAdmin`);

--
-- Indices de la tabla `prestamoaccesorio`
--
ALTER TABLE `prestamoaccesorio`
  ADD PRIMARY KEY (`PrestamoID`),
  ADD KEY `NroInventarioAccesorio` (`NroInventarioAccesorio`),
  ADD KEY `NroCIUsuario` (`NroCIUsuario`),
  ADD KEY `NroCIAdmin` (`NroCIAdmin`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NroCIUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prestamoaccesorio`
--
ALTER TABLE `prestamoaccesorio`
  MODIFY `PrestamoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamoaccesorio`
--
ALTER TABLE `prestamoaccesorio`
  ADD CONSTRAINT `prestamoaccesorio_ibfk_1` FOREIGN KEY (`NroInventarioAccesorio`) REFERENCES `accesorio` (`NroInventarioAccesorio`),
  ADD CONSTRAINT `prestamoaccesorio_ibfk_2` FOREIGN KEY (`NroCIUsuario`) REFERENCES `usuario` (`NroCIUsuario`),
  ADD CONSTRAINT `prestamoaccesorio_ibfk_3` FOREIGN KEY (`NroCIAdmin`) REFERENCES `administrador` (`NroCIAdmin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
