-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-07-2024 a las 05:31:26
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clientesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `nombre`, `apellido`, `email`, `telefono`, `direccion`, `fecharegistro`) VALUES
(1, 'Juan Juan Juan', 'Pérez Gonzales Mariaca', 'juan.perez@example.com', '123456789 4', 'Calle Falsa 123', '2024-01-01'),
(2, 'María los angeles', 'González', 'maria.gonzalez@example.com', '987654321', 'Avenida Siempre Viva 742', '2024-02-01'),
(3, 'Luis', 'Martínez', 'luis.martinez@example.com', '456789123', 'Boulevard de los Sueños Rotos 456', '2024-03-01'),
(4, 'Ana', 'López', 'ana.lopez@example.com', '2233445566', 'Calle Secundaria 321, Ciudad', '2024-07-04'),
(5, 'Pedro', 'Martínez', 'pedro.martinez@example.com', '3344556677', 'Calle Tercera 654, Ciudad', '2024-07-05'),
(6, 'Lucía', 'García', 'lucia.garcia@example.com', '4455667788', 'Calle Cuarta 987, Ciudad', '2024-07-06'),
(7, 'Miguel', 'Hernández', 'miguel.hernandez@example.com', '5566778899', 'Calle Quinta 101, Ciudad', '2024-07-07'),
(8, 'Sofía', 'Ramírez', 'sofia.ramirez@example.com', '6677889900', 'Calle Sexta 202, Ciudad', '2024-07-08'),
(9, 'David', 'González', 'david.gonzalez@example.com', '7788990011', 'Calle Séptima 303, Ciudad', '2024-07-09'),
(10, 'Laura', 'Fernández', 'laura.fernandez@example.com', '8899001122', 'Calle Octava 404, Ciudad', '2024-07-10'),
(11, 'Jorge', 'Sánchez', 'jorge.sanchez@example.com', '9900112233', 'Calle Novena 505, Ciudad', '2024-07-11'),
(12, 'Elena', 'Jiménez', 'elena.jimenez@example.com', '1011121314', 'Calle Décima 606, Ciudad', '2024-07-12'),
(13, 'Francisco', 'Ruiz', 'francisco.ruiz@example.com', '1213141516', 'Calle Once 707, Ciudad', '2024-07-13'),
(14, 'Natalia', 'Díaz', 'natalia.diaz@example.com', '1314151617', 'Calle Doce 808, Ciudad', '2024-07-14'),
(15, 'Andrés', 'Moreno', 'andres.moreno@example.com', '1415161718', 'Calle Trece 909, Ciudad', '2024-07-15'),
(16, 'Patricia', 'Álvarez', 'patricia.alvarez@example.com', '1516171819', 'Calle Catorce 1010, Ciudad', '2024-07-16'),
(17, 'Manuel', 'Molina', 'manuel.molina@example.com', '1617181920', 'Calle Quince 1111, Ciudad', '2024-07-17'),
(18, 'Isabel', 'Castro', 'isabel.castro@example.com', '1718192021', 'Calle Dieciséis 1212, Ciudad', '2024-07-18'),
(19, 'Sergio', 'Ortiz', 'sergio.ortiz@example.com', '1819202122', 'Calle Diecisiete 1313, Ciudad', '2024-07-19'),
(20, 'Adriana', 'Torres', 'adriana.torres@example.com', '1920212223', 'Calle Dieciocho 1414, Ciudad', '2024-07-20'),
(21, 'Luis', 'Silva', 'luis.silva@example.com', '2021222324', 'Calle Diecinueve 1515, Ciudad', '2024-07-21'),
(22, 'Gabriela', 'Vargas', 'gabriela.vargas@example.com', '2122232425', 'Calle Veinte 1616, Ciudad', '2024-07-22'),
(23, 'Rafael', 'Reyes', 'rafael.reyes@example.com', '2223242526', 'Calle Veintiuno 1717, Ciudad', '2024-07-23'),
(24, 'Julia', 'Romero', 'julia.romero@example.com', '2324252627', 'Calle Veintidós 1818, Ciudad', '2024-07-24'),
(25, 'Ángel', 'Rojas', 'angel.rojas@example.com', '2425262728', 'Calle Veintitrés 1919, Ciudad', '2024-07-25'),
(26, 'Juan', 'Pérez', 'juan.perez1@example.com', '1234567890', 'Calle Falsa 123, Ciudad', '2024-07-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int NOT NULL,
  `cliente_id` int DEFAULT NULL,
  `fechapedido` date NOT NULL,
  `montototal` decimal(10,2) NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `cliente_id`, `fechapedido`, `montototal`, `estado`) VALUES
(1, 1, '2024-04-01', 150.75, 'Enviado'),
(2, 2, '2024-05-01', 200.50, 'Pendiente'),
(3, 3, '2024-06-01', 300.00, 'Completado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `correo_electronico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo_electronico`, `nombre`, `contrasena`) VALUES
('admin@admin.com', 'Carlos', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
