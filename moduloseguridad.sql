-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2019 a las 09:46:55
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moduloseguridad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id` int(11) UNSIGNED NOT NULL,
  `clave` varchar(64) NOT NULL,
  `descripcion` varchar(64) NOT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `action` varchar(128) NOT NULL,
  `nombre` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id`, `clave`, `descripcion`, `icon`, `action`, `nombre`) VALUES
(1, 'crearUsuario', 'Accion que habilita la creacion de usuarios', 'fa fa-user', 'user/create', 'Crear usuario'),
(2, 'modificarUsuario', 'Accion que habilita la modificacion de usuarios', NULL, 'user/update', 'Modificar usuario'),
(3, 'eliminarUsuario', 'Accion que habilita la eliminacion de usuarios', NULL, 'user/delete', 'Eliminar usuario'),
(4, 'crearGrupo', '\r\nAccion que habilita la creacion de grupos\r\n', NULL, 'grupo/create', 'Crear grupo'),
(5, 'modificarGrupo', 'Accion que habilita la modificacion de grupos\r\n', NULL, 'grupo/update', 'Modificar grupo'),
(6, 'eliminarGrupo', 'Accion que habilita la eliminacion de grupos', NULL, 'grupo/delete', 'Eliminar grupo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones_grupos`
--

CREATE TABLE `acciones_grupos` (
  `id_accion` int(11) UNSIGNED NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acciones_grupos`
--

INSERT INTO `acciones_grupos` (`id_accion`, `id_grupo`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(4, 3),
(6, 3),
(5, 3),
(1, 2),
(3, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Administradores', 'Grupo que puede realizar todas las acciones en el sistema.'),
(2, 'Gestores de personal', 'Los usuarios asignados a este grupo solo pueden gestionar usuarios'),
(3, 'Gestores de grupos', 'Los usuarios asignados a este grupo solo pueden gesitonar grupos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_usuarios`
--

CREATE TABLE `grupos_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos_usuarios`
--

INSERT INTO `grupos_usuarios` (`id`, `id_usuario`, `id_grupo`) VALUES
(14, 1, 1),
(18, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_fijo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio_calle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio_numero` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `nombre`, `apellido`, `dni`, `telefono_celular`, `telefono_fijo`, `domicilio_calle`, `domicilio_numero`, `password`, `email`) VALUES
(1, 'jorgeborges', 'jorge luis', 'borges', '12312345', '3454189955', '4226679', 'suipacha', '461', '$2y$10$THopvWFjurzmF4lPbCVx2.y8D7BTy7F3PxAnbr3sPmsUdVf6gUyYW', 'jorge@gmail.com'),
(2, 'tomas', 'tomas', 'rebot', '36006355', '3454199555', '4226679', 'suipacha ', '461', '$2y$10$THopvWFjurzmF4lPbCVx2.y8D7BTy7F3PxAnbr3sPmsUdVf6gUyYW', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `acciones_grupos`
--
ALTER TABLE `acciones_grupos`
  ADD KEY `id_accion_FK` (`id_accion`),
  ADD KEY `id_grupo_FK` (`id_grupo`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos_usuarios`
--
ALTER TABLE `grupos_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario_fk` (`id_usuario`),
  ADD KEY `id_grupo_fk` (`id_grupo`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grupos_usuarios`
--
ALTER TABLE `grupos_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acciones_grupos`
--
ALTER TABLE `acciones_grupos`
  ADD CONSTRAINT `acciones_grupos_ibfk_1` FOREIGN KEY (`id_accion`) REFERENCES `acciones` (`id`),
  ADD CONSTRAINT `acciones_grupos_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`);

--
-- Filtros para la tabla `grupos_usuarios`
--
ALTER TABLE `grupos_usuarios`
  ADD CONSTRAINT `grupos_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `grupos_usuarios_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
