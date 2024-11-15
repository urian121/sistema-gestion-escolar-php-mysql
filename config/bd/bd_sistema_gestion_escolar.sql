-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-11-2024 a las 22:15:24
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sistema_gestion_escolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiantes`
--

CREATE TABLE `tbl_estudiantes` (
  `id_estudiante` int NOT NULL,
  `nombre_estudiante` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_estudiante` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_estudiante` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion_estudiante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perfil_estudiante` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_estudiante` int DEFAULT '1',
  `id_grado` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_estudiantes`
--

INSERT INTO `tbl_estudiantes` (`id_estudiante`, `nombre_estudiante`, `apellido_estudiante`, `email_estudiante`, `fecha_nacimiento`, `direccion_estudiante`, `perfil_estudiante`, `estado_estudiante`, `id_grado`, `created_at`) VALUES
(1, 'Juan', 'Pérez', 'juan.perez@example.com', '2008-03-15', 'Calle 1 #23-45', NULL, 1, 1, '2024-11-12 20:42:54'),
(2, 'María', 'González', 'maria.gonzalez@example.com', '2009-07-20', 'Calle 2 #56-78', NULL, 1, 1, '2024-11-12 20:42:54'),
(3, 'Pedro', 'Sánchez', 'pedro.sanchez@example.com', '2008-05-30', 'Calle 3 #89-01', NULL, 1, 2, '2024-11-12 20:42:54'),
(4, 'Ana', 'López', 'ana.lopez@example.com', '2009-02-10', 'Calle 4 #12-34', '920097c7e1f019c2b761.png', 1, 2, '2024-11-12 20:42:54'),
(5, 'Luis', 'Martínez', 'luis.martinez@example.com', '2007-12-25', 'Calle 5 #43-21', NULL, 1, 3, '2024-11-12 20:42:54'),
(6, 'Carla', 'Hernández', 'carla.hernandez@example.com', '2008-04-01', 'Calle 6 #65-43', NULL, 1, 3, '2024-11-12 20:42:54'),
(7, 'Jorge', 'Ramírez', 'jorge.ramirez@example.com', '2008-09-12', 'Calle 7 #87-65', NULL, 1, 4, '2024-11-12 20:42:54'),
(8, 'Lucía', 'Torres', 'lucia.torres@example.com', '2007-11-30', 'Calle 8 #09-87', NULL, 1, 4, '2024-11-12 20:42:54'),
(9, 'Diego', 'Vásquez', 'diego.vasquez@example.com', '2009-06-15', 'Calle 9 #11-22', NULL, 1, 5, '2024-11-12 20:42:54'),
(10, 'Sofía', 'Cabrera', 'sofia.cabrera@example.com', '2008-08-22', 'Calle 10 #33-44', NULL, 1, 5, '2024-11-12 20:42:54'),
(11, 'Andrés', 'Salazar', 'andres.salazar@example.com', '2009-03-10', 'Calle 11 #55-66', NULL, 1, 6, '2024-11-12 20:42:54'),
(12, 'Valentina', 'Morales', 'valentina.morales@example.com', '2008-10-18', 'Calle 12 #77-88', NULL, 1, 6, '2024-11-12 20:42:54'),
(13, 'Felipe', 'Castillo', 'felipe.castillo@example.com', '2009-01-05', 'Calle 13 #99-00', NULL, 1, 7, '2024-11-12 20:42:54'),
(14, 'Natalia', 'Mena', 'natalia.mena@example.com', '2008-02-14', 'Calle 14 #12-21', NULL, 1, 7, '2024-11-12 20:42:54'),
(15, 'Samuel', 'Gaitán', 'samuel.gaitan@example.com', '2009-04-30', 'Calle 15 #34-56', NULL, 1, 8, '2024-11-12 20:42:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_grados`
--

CREATE TABLE `tbl_grados` (
  `id_grado` int NOT NULL,
  `grado` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jornada` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_grados`
--

INSERT INTO `tbl_grados` (`id_grado`, `grado`, `jornada`, `seccion`, `created_at`) VALUES
(1, 'Primero', 'Mañana', 'A', '2024-11-12 20:42:53'),
(2, 'Primero', 'Mañana', 'B', '2024-11-12 20:42:53'),
(3, 'Segundo', 'Mañana', 'A', '2024-11-12 20:42:53'),
(4, 'Segundo', 'Mañana', 'B', '2024-11-12 20:42:53'),
(5, 'Tercero', 'Tarde', 'A', '2024-11-12 20:42:53'),
(6, 'Tercero', 'Tarde', 'B', '2024-11-12 20:42:53'),
(7, 'Cuarto', 'Mañana', 'A', '2024-11-12 20:42:53'),
(8, 'Cuarto', 'Mañana', 'B', '2024-11-12 20:42:53'),
(9, 'Quinto', 'Tarde', 'A', '2024-11-12 20:42:53'),
(10, 'Quinto', 'Tarde', 'B', '2024-11-12 20:42:53'),
(11, 'Sexto', 'Mañana', 'A', '2024-11-12 20:42:53'),
(12, 'Sexto', 'Mañana', 'B', '2024-11-12 20:42:53'),
(13, 'Séptimo', 'Tarde', 'A', '2024-11-12 20:42:53'),
(14, 'Séptimo', 'Tarde', 'B', '2024-11-12 20:42:53'),
(15, 'Octavo', 'Mañana', 'A', '2024-11-12 20:42:53'),
(16, 'Gradooo', 'Mañana', '56', '2024-11-12 20:59:39'),
(22, '543544444', 'Tarde', '435', '2024-11-15 22:06:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_materias`
--

CREATE TABLE `tbl_materias` (
  `id_materia` int NOT NULL,
  `nombre_materia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_materias`
--

INSERT INTO `tbl_materias` (`id_materia`, `nombre_materia`, `created_at`) VALUES
(1, 'Matemáticas', '2024-11-12 20:42:53'),
(2, 'Ciencias Naturales', '2024-11-12 20:42:53'),
(3, 'Lengua Española', '2024-11-12 20:42:53'),
(4, 'Historia', '2024-11-12 20:42:53'),
(5, 'Geografía', '2024-11-12 20:42:53'),
(6, 'Física', '2024-11-12 20:42:53'),
(7, 'Química', '2024-11-12 20:42:53'),
(8, 'Biología', '2024-11-12 20:42:53'),
(9, 'Inglés', '2024-11-12 20:42:53'),
(10, 'Educación Física', '2024-11-12 20:42:53'),
(11, 'Arte', '2024-11-12 20:42:53'),
(12, 'Música', '2024-11-12 20:42:53'),
(13, 'Tecnología', '2024-11-12 20:42:53'),
(14, 'Ética', '2024-11-12 20:42:53'),
(15, 'Religión', '2024-11-12 20:42:53'),
(18, 'mmmm111', '2024-11-15 22:07:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profesores`
--

CREATE TABLE `tbl_profesores` (
  `id_profesor` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `especialidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_profesor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_profesores`
--

INSERT INTO `tbl_profesores` (`id_profesor`, `nombre`, `apellido`, `identificacion`, `especialidad`, `avatar_profesor`, `created_at`) VALUES
(1, 'Carlos', 'Ramírez', '123456789', 'Matemáticas', '', '2024-11-12 20:42:54'),
(2, 'Laura', 'González', '987654321', 'Ciencias Naturales', '', '2024-11-12 20:42:54'),
(3, 'José', 'Martínez', '456789123', 'Historia', '', '2024-11-12 20:42:54'),
(4, 'Ana', 'Torres', '321654987', 'Geografía', '', '2024-11-12 20:42:54'),
(5, 'Marta', 'Cabrera', '147258369', 'Física', '', '2024-11-12 20:42:54'),
(6, 'David p', 'Hernández', '258369147', 'Química', '6ac90911a450152f0d1e.jpg', '2024-11-12 20:42:54'),
(7, 'Sofía', 'López', '369258147', 'Inglés', '20877c916ad56c9791df.jpg', '2024-11-12 20:42:54'),
(8, 'Ricardo6', 'Sánchez', '753159486', 'Arte', '', '2024-11-12 20:42:54'),
(9, 'Patricia', 'Salazar', '159753468', 'Música', '', '2024-11-12 20:42:54'),
(10, 'Felipe', 'Castillo', '321987654', 'Tecnología', '', '2024-11-12 20:42:54'),
(11, 'Natalia', 'Mena', '654321987', 'Ética', '', '2024-11-12 20:42:54'),
(12, 'Javier', 'Martínez', '852741963', 'Religión', '', '2024-11-12 20:42:54'),
(13, 'Diego', 'Gómez', '741852963', 'Deportes', '', '2024-11-12 20:42:54'),
(14, 'Elena', 'Pérez', '963258741', 'Ciencias Sociales', '', '2024-11-12 20:42:54'),
(15, 'Marcelo', 'Ríos', '369147258', 'Matemáticas', '', '2024-11-12 20:42:54'),
(20, '66', '66', '6', '6', 'd062d63173f7e6500cfa.png', '2024-11-15 22:07:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profesores_materias`
--

CREATE TABLE `tbl_profesores_materias` (
  `id_asignacion` int NOT NULL,
  `id_profesor` int DEFAULT NULL,
  `id_materia` int DEFAULT NULL,
  `id_grado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_profesores_materias`
--

INSERT INTO `tbl_profesores_materias` (`id_asignacion`, `id_profesor`, `id_materia`, `id_grado`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 2, 3, 1),
(4, 3, 4, 2),
(5, 4, 5, 3),
(6, 5, 6, 4),
(7, 6, 7, 5),
(8, 7, 8, 6),
(9, 8, 9, 7),
(10, 9, 10, 8),
(12, 11, 12, 10),
(13, 12, 1, 11),
(14, 13, 2, 12),
(15, 14, 3, 13),
(16, 3, 1, 1),
(17, 3, 4, 1),
(18, 6, 2, 2),
(19, 6, 5, 2),
(20, 6, 8, 2),
(21, 6, 1, 1),
(22, 10, 11, 9),
(23, 10, 12, 9),
(24, 8, 1, 1),
(25, 8, 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_estudiantes`
--
ALTER TABLE `tbl_estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `fk_estudiante_curso` (`id_grado`);

--
-- Indices de la tabla `tbl_grados`
--
ALTER TABLE `tbl_grados`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `tbl_materias`
--
ALTER TABLE `tbl_materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `tbl_profesores`
--
ALTER TABLE `tbl_profesores`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `tbl_profesores_materias`
--
ALTER TABLE `tbl_profesores_materias`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `fk_profesor` (`id_profesor`),
  ADD KEY `fk_materia` (`id_materia`),
  ADD KEY `fk_curso` (`id_grado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_estudiantes`
--
ALTER TABLE `tbl_estudiantes`
  MODIFY `id_estudiante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_grados`
--
ALTER TABLE `tbl_grados`
  MODIFY `id_grado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tbl_materias`
--
ALTER TABLE `tbl_materias`
  MODIFY `id_materia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tbl_profesores`
--
ALTER TABLE `tbl_profesores`
  MODIFY `id_profesor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_profesores_materias`
--
ALTER TABLE `tbl_profesores_materias`
  MODIFY `id_asignacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_estudiantes`
--
ALTER TABLE `tbl_estudiantes`
  ADD CONSTRAINT `fk_estudiante_curso` FOREIGN KEY (`id_grado`) REFERENCES `tbl_grados` (`id_grado`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `tbl_profesores_materias`
--
ALTER TABLE `tbl_profesores_materias`
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`id_grado`) REFERENCES `tbl_grados` (`id_grado`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_materia` FOREIGN KEY (`id_materia`) REFERENCES `tbl_materias` (`id_materia`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `tbl_profesores` (`id_profesor`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
