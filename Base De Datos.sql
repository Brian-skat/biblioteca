-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2024 a las 23:00:27
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts`
--

CREATE TABLE `accounts` (
  `Name` mediumtext NOT NULL,
  `Email` mediumtext NOT NULL,
  `Password` mediumtext NOT NULL,
  `ID` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `accounts`
--

INSERT INTO `accounts` (`Name`, `Email`, `Password`, `ID`) VALUES
('Cesar Oswaldo Cuevas Alcaraz', 'dyber132@gmail.com', 'Hider12_o', 'bgFZNcEtej'),
('Liliana Martinez Perez', 'dyber132@gmail.com', 'Hider12_o', 'dXNu4Q5pTD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `Libro` mediumtext NOT NULL,
  `Disponible` longtext NOT NULL,
  `Usuario` mediumtext NOT NULL,
  `Author` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`Libro`, `Disponible`, `Usuario`, `Author`) VALUES
('El mago de OZ', 'false', 'Cesar Oswaldo Cuevas Alcaraz', 'Cesar Oswaldo Cuevas Alcaraz'),
('xd', 'true', '', 'Liliana Martinez Perez');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
