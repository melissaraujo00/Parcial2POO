-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 04:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `id` int(8) NOT NULL,
  `codigo` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `talla_modelo` varchar(15) NOT NULL,
  `color` varchar(15) NOT NULL,
  `precio_unitario` double NOT NULL,
  `cantidad` int(8) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`id`, `codigo`, `nombre`, `talla_modelo`, `color`, `precio_unitario`, `cantidad`, `categoria`) VALUES
(1, 4331, 'Camisa Oversize', 'M', 'Negro', 8.55, 8, 'Ropa'),
(3, 3526, 'Hoddie', 'S', 'Negro', 6.99, 23, 'Ropa'),
(4, 3263, 'Camisa Oversize', 'S', 'Blanco', 5.99, 87, 'Ropa'),
(7, 4563, 'Case', 'Galaxy A5', 'Negro', 11.99, 4, 'Telefono'),
(8, 2322, 'Case', 'Redmi A2', 'Negro', 11.99, 3, 'Telefono');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
