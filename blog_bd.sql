-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2024 a las 17:59:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`, `descripcion`) VALUES
(2, 'Animales ', 'Descripci&oacute;n de la categor&iacute;a animales'),
(4, 'Viaje', 'Descripci&oacute;n '),
(5, 'General', 'Posts sin categorizar'),
(7, 'Cocina', 'Descripci&oacute;n de la categor&iacute;a cocina'),
(8, 'Decoraci&oacute;n', 'Descripci&oacute;n de la categor&iacute;a decoraci&oacute;n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria_id` int(11) UNSIGNED DEFAULT NULL,
  `autor_id` int(11) UNSIGNED NOT NULL,
  `destacado_check` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `body`, `thumbnail`, `fecha_hora`, `categoria_id`, `autor_id`, `destacado_check`) VALUES
(5, 'Pintar', 'Pinturas ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil', '1716852291thumbnail8.jpg', '2024-05-27 20:55:24', 5, 1, 0),
(9, 'Playas de Tailandia', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil', '1716911622playa.jpg', '2024-05-28 15:53:42', 2, 12, 0),
(10, 'Como hornear galletas de chocolate', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil', '1716911665thumbnail2.jpg', '2024-05-28 15:54:25', 2, 11, 0),
(12, 'C&oacute;mo decorar tu casa ', 'Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. Aprende a decorar tu casa. ', '1716921159thumbnail3.jpg', '2024-05-28 18:32:39', 2, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `admin_check` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `email`, `pass`, `avatar`, `admin_check`) VALUES
(1, 'Miguel', 'S&aacute;nchez', 'miguel', 'miguel@gmail.com', '$2y$10$XG2S46JF7ZFggkdfXPnIjO3qdJDvheoheIHNqB06/PNI3gWAjJBCO', '1715721592thumbnail5.jpg', 1),
(11, 'Carla', 'P&eacute;rez', 'carla', 'carla@gmail.com', '$2y$10$nlo0azu.DxtIdUUuvcAzju89FuHKHQwVc3tyr2qJLy27cSQDwwwYO', '1716911562perritos.JPG', 1),
(12, 'Arnau', 'Garc&iacute;a', 'arnau', 'arnau@gmail.com', '$2y$10$YNzUBD/TyS0FGDG7i/gdE.z.qPysGPnh3BPUBXNqSOST9/XgmX/wK', '1716911584koala.jpg', 0),
(13, '&Aacute;lvaro', 'R&iacute;os', 'alvaro', 'alvaro@gmail.com', '$2y$10$nC.oBcDA.dC2hrHUGSPjkOM5EaXO2zFLs.NusTr/WEdUe36BBJoze', '1716921099perritos.JPG', 1),
(14, 'Sara', 'Torres', 'sara', 'sara@gmail.com', '$2y$10$gWScpNlLqAmC6bOy3FJeW.j6nI1a5VVb8jaOkcGfN3RJJyvGvMJNW', '1716921333thumbnail6.jpg', 0),
(15, 'david', 'parellada', 'david', 'david@gmail.com', '$2y$10$FlS7YFaAD7FyJoTSnR7hlewYgQw4XsHp0GIeJYcdTJtJWQYEENSr6', '1717036771koala.jpg', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_categoria` (`categoria_id`),
  ADD KEY `FK_blog_autor` (`autor_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_autor` FOREIGN KEY (`autor_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
