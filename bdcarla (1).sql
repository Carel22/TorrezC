-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2024 a las 22:10:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcarla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentabancaria`
--

CREATE TABLE `cuentabancaria` (
  `id_Cuenta` int(11) NOT NULL,
  `tipocuenta` varchar(50) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `personaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuentabancaria`
--

INSERT INTO `cuentabancaria` (`id_Cuenta`, `tipocuenta`, `saldo`, `personaID`) VALUES
(1, 'Cuenta Corriente', 1500.00, 1),
(2, 'Cuenta de Ahorros', 2200.00, 2),
(3, 'Cuenta Corriente', 300.00, 3),
(4, 'Depósito A Plazo Fijo', 45500.00, 4),
(6, 'Depósito A Plazo Fijo', 10.00, 9008222),
(7, 'Cuenta Corriente', 150.00, 9008222),
(123456788, 'Cuenta de Ahorros', 1000.00, 9008222),
(134343430, 'Cuenta de Ahorros', 1000.00, 90000001),
(134343434, ' Depósito A Plazo Fijo', 1000.00, 4),
(134343435, 'Cuenta Corriente	', 20.00, 9008222),
(134343436, 'Depósito A Plazo Fijo', 6500.00, 9008222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-04-26-185047', 'App\\Database\\Migrations\\TCuentas', 'default', 'App', 1714164230, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_Persona` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `edad` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_Persona`, `nombre`, `apellido`, `email`, `rol`, `ciudad`, `username`, `password`, `edad`) VALUES
(1, 'DIANA', 'PARKER DENNIS', 'pepe@gmail.com', 'Usuario Regular', 'La_Paz', 'usuario1', '12345', '22'),
(2, 'FILOMENA', 'RIOS MAGOS', 'riosMar@gmail.com', 'Usuario Regular', 'Chuquisaca', 'usuario2', '12345', '22'),
(3, 'ROCIO', 'ROJAS', 'rocio@example.com', 'Usuario Regular', 'Tarija', 'usuario3', '123', '67'),
(4, 'ENRIQUETA', 'ANGHELO', 'anghy@gmail.com', 'Usuario Regular', 'Cochabamba', 'usuario1', '12345', '22'),
(5, 'FIONA', 'ZAMUDIO', 'fz@egmail.com', 'Usuario Regular', 'Oruro', '', '', '30'),
(912344, 'MANUEL', 'LOPEZ', 'Manuel@gmail.com', 'Director Bancario', 'Beni', 'director', '12345', '56'),
(912345, 'FILOMENA', 'RIOS', 'fils@gmail.com', 'Usuario Regular', 'Pando', '', '', '30'),
(1978902, 'PATRICIO', 'FLORES FLORES', 'dennis@gmail.com', 'Analista de BD', 'Santa Cruz', 'analista1', '1234', '40'),
(9000000, 'XIMENA', 'SEVILLA', 'Sevilla@gmail.com', 'Usuario Regular', 'Beni', NULL, NULL, '50'),
(9000902, 'JUAN', 'GOMEZ GOMEZ', 'go090@gmail.com', 'Cajero', 'Santa Cruz', 'cajero1', '1234', '45'),
(9008222, 'CARLA', 'TORRES', 'ct90@gmail.com', 'Administrador', 'Beni', 'admi1', '12345', '56'),
(90000001, 'JULIAN', 'FERNANDEZ JIMENEZ', 'fernan@gmail.com', 'Usuario Regular', 'Potosí', '', '', '67');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccionbancaria`
--

CREATE TABLE `transaccionbancaria` (
  `id_Transaccion` int(11) NOT NULL,
  `cuentaID` int(11) DEFAULT NULL,
  `tipoTransaccion` varchar(50) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `fechaHora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transaccionbancaria`
--

INSERT INTO `transaccionbancaria` (`id_Transaccion`, `cuentaID`, `tipoTransaccion`, `monto`, `fechaHora`) VALUES
(1, 1, 'Transferencia', 500.00, '2024-04-16 07:12:37'),
(2, 2, 'Retiro', 1000.00, '2024-04-16 07:12:37'),
(3, 3, 'Transferencia', 300.00, '2024-04-16 07:12:37'),
(4, 4, 'Depósito', 800.00, '2024-04-16 07:12:37'),
(5, 1, 'Retiro', 96.00, '2024-04-19 21:35:37'),
(6, 123456788, 'Depósito	', 96.00, '2024-04-19 21:35:40'),
(7, 123456788, 'Retiro', 600.00, '2024-04-19 21:35:40'),
(8, 123456788, 'Depósito	', 150.00, '2024-04-19 21:35:37'),
(9, 1, 'Retiro', 50.00, '2024-04-25 21:35:37'),
(10, 1, 'Transferencia', 100.00, '2024-04-26 00:35:37'),
(11, 1, 'Transferencia', 5000.00, '2024-04-26 00:35:37'),
(12, 2, 'Depósito	', 100.00, '2024-04-25 21:35:37'),
(13, 4, 'Depósito	', 100.00, '2024-04-20 07:12:37'),
(14, 4, 'Transferencia', 100.00, '2024-04-19 21:35:40'),
(15, 4, 'Depósito	', 200.00, '2024-04-06 07:12:37'),
(16, 1, 'Retiro', 50.00, '2024-04-25 21:35:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cuentas`
--

CREATE TABLE `t_cuentas` (
  `id_Cuenta` int(5) UNSIGNED NOT NULL,
  `tipocuenta` varchar(100) NOT NULL,
  `saldo` varchar(100) NOT NULL,
  `personaID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  ADD PRIMARY KEY (`id_Cuenta`),
  ADD KEY `PersonaID` (`personaID`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_Persona`);

--
-- Indices de la tabla `transaccionbancaria`
--
ALTER TABLE `transaccionbancaria`
  ADD PRIMARY KEY (`id_Transaccion`),
  ADD KEY `CuentaID` (`cuentaID`);

--
-- Indices de la tabla `t_cuentas`
--
ALTER TABLE `t_cuentas`
  ADD PRIMARY KEY (`id_Cuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  MODIFY `id_Cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134343438;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90000002;

--
-- AUTO_INCREMENT de la tabla `transaccionbancaria`
--
ALTER TABLE `transaccionbancaria`
  MODIFY `id_Transaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `t_cuentas`
--
ALTER TABLE `t_cuentas`
  MODIFY `id_Cuenta` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  ADD CONSTRAINT `cuentabancaria_ibfk_1` FOREIGN KEY (`personaID`) REFERENCES `persona` (`id_Persona`);

--
-- Filtros para la tabla `transaccionbancaria`
--
ALTER TABLE `transaccionbancaria`
  ADD CONSTRAINT `transaccionbancaria_ibfk_1` FOREIGN KEY (`cuentaID`) REFERENCES `cuentabancaria` (`id_Cuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
