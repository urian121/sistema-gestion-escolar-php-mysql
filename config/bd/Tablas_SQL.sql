
/** TABLA CURSOS **/
CREATE TABLE `tbl_cursos` (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `grado` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jornada` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tbl_cursos` (`grado`, `jornada`, `seccion`) VALUES
('Primero', 'Mañana', 'A'),
('Primero', 'Mañana', 'B'),
('Segundo', 'Mañana', 'A'),
('Segundo', 'Mañana', 'B'),
('Tercero', 'Tarde', 'A'),
('Tercero', 'Tarde', 'B'),
('Cuarto', 'Mañana', 'A'),
('Cuarto', 'Mañana', 'B'),
('Quinto', 'Tarde', 'A'),
('Quinto', 'Tarde', 'B'),
('Sexto', 'Mañana', 'A'),
('Sexto', 'Mañana', 'B'),
('Séptimo', 'Tarde', 'A'),
('Séptimo', 'Tarde', 'B'),
('Octavo', 'Mañana', 'A');


/** TABLA MATERIAS **/
CREATE TABLE `tbl_materias` (
  `id_materia` int NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tbl_materias` (`nombre_materia`) VALUES
('Matemáticas'),
('Ciencias Naturales'),
('Lengua Española'),
('Historia'),
('Geografía'),
('Física'),
('Química'),
('Biología'),
('Inglés'),
('Educación Física'),
('Arte'),
('Música'),
('Tecnología'),
('Ética'),
('Religión');


/** TABLA ESTUDIANTES **/
CREATE TABLE `tbl_estudiantes` (
  `id_estudiante` int NOT NULL AUTO_INCREMENT,
  `nombre_estudiante` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_estudiante` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_estudiante` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion_estudiante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perfil_estudiante` varchar(100) DEFAULT NULL,
  `estado_estudiante` int DEFAULT '1',
  `id_curso` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_estudiante`),
  KEY `fk_estudiante_curso` (`id_curso`),
  CONSTRAINT `fk_estudiante_curso` FOREIGN KEY (`id_curso`) REFERENCES `tbl_cursos` (`id_curso`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tbl_estudiantes` (`nombre_estudiante`, `apellido_estudiante`, `email_estudiante`, `fecha_nacimiento`, `direccion_estudiante`, `perfil_estudiante`, `estado_estudiante`, `id_curso`) VALUES
('Juan', 'Pérez', 'juan.perez@example.com', '2008-03-15', 'Calle 1 #23-45', 'Estudiante', 1, 1),
('María', 'González', 'maria.gonzalez@example.com', '2009-07-20', 'Calle 2 #56-78', 'Estudiante', 1, 1),
('Pedro', 'Sánchez', 'pedro.sanchez@example.com', '2008-05-30', 'Calle 3 #89-01', 'Estudiante', 1, 2),
('Ana', 'López', 'ana.lopez@example.com', '2009-02-10', 'Calle 4 #12-34', 'Estudiante', 1, 2),
('Luis', 'Martínez', 'luis.martinez@example.com', '2007-12-25', 'Calle 5 #43-21', 'Estudiante', 1, 3),
('Carla', 'Hernández', 'carla.hernandez@example.com', '2008-04-01', 'Calle 6 #65-43', 'Estudiante', 1, 3),
('Jorge', 'Ramírez', 'jorge.ramirez@example.com', '2008-09-12', 'Calle 7 #87-65', 'Estudiante', 1, 4),
('Lucía', 'Torres', 'lucia.torres@example.com', '2007-11-30', 'Calle 8 #09-87', 'Estudiante', 1, 4),
('Diego', 'Vásquez', 'diego.vasquez@example.com', '2009-06-15', 'Calle 9 #11-22', 'Estudiante', 1, 5),
('Sofía', 'Cabrera', 'sofia.cabrera@example.com', '2008-08-22', 'Calle 10 #33-44', 'Estudiante', 1, 5),
('Andrés', 'Salazar', 'andres.salazar@example.com', '2009-03-10', 'Calle 11 #55-66', 'Estudiante', 1, 6),
('Valentina', 'Morales', 'valentina.morales@example.com', '2008-10-18', 'Calle 12 #77-88', 'Estudiante', 1, 6),
('Felipe', 'Castillo', 'felipe.castillo@example.com', '2009-01-05', 'Calle 13 #99-00', 'Estudiante', 1, 7),
('Natalia', 'Mena', 'natalia.mena@example.com', '2008-02-14', 'Calle 14 #12-21', 'Estudiante', 1, 7),
('Samuel', 'Gaitán', 'samuel.gaitan@example.com', '2009-04-30', 'Calle 15 #34-56', 'Estudiante', 1, 8);


/** TABLA PROFESORES **/
CREATE TABLE `tbl_profesores` (
  `id_profesor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `identificacion` varchar(20) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `avatar_profesor` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tbl_profesores` (`nombre`, `apellido`, `identificacion`, `especialidad`, `avatar_profesor`) VALUES
('Carlos', 'Ramírez', '123456789', 'Matemáticas', ''),
('Laura', 'González', '987654321', 'Ciencias Naturales', ''),
('José', 'Martínez', '456789123', 'Historia', ''),
('Ana', 'Torres', '321654987', 'Geografía', ''),
('Marta', 'Cabrera', '147258369', 'Física', ''),
('David', 'Hernández', '258369147', 'Química', ''),
('Sofía', 'López', '369258147', 'Inglés', ''),
('Ricardo', 'Sánchez', '753159486', 'Arte', ''),
('Patricia', 'Salazar', '159753468', 'Música', ''),
('Felipe', 'Castillo', '321987654', 'Tecnología', ''),
('Natalia', 'Mena', '654321987', 'Ética', ''),
('Javier', 'Martínez', '852741963', 'Religión', ''),
('Diego', 'Gómez', '741852963', 'Deportes', ''),
('Elena', 'Pérez', '963258741', 'Ciencias Sociales', ''),
('Marcelo', 'Ríos', '369147258', 'Matemáticas', '');


/** TABLA PROFESORES_MATERIAS **/
CREATE TABLE `tbl_profesores_materias` (
  `id_asignacion` int NOT NULL AUTO_INCREMENT,
  `id_profesor` int DEFAULT NULL,
  `id_materia` int DEFAULT NULL,
  `id_curso` int DEFAULT NULL,
  PRIMARY KEY (`id_asignacion`),
  KEY `fk_profesor` (`id_profesor`),
  KEY `fk_materia` (`id_materia`),
  KEY `fk_curso` (`id_curso`),
  CONSTRAINT `fk_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `tbl_profesores` (`id_profesor`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_materia` FOREIGN KEY (`id_materia`) REFERENCES `tbl_materias` (`id_materia`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_curso` FOREIGN KEY (`id_curso`) REFERENCES `tbl_cursos` (`id_curso`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tbl_profesores_materias` (`id_profesor`, `id_materia`, `id_curso`) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 3, 1),
(3, 4, 2),
(4, 5, 3),
(5, 6, 4),
(6, 7, 5),
(7, 8, 6),
(8, 9, 7),
(9, 10, 8),
(10, 11, 9),
(11, 12, 10),
(12, 1, 11),
(13, 2, 12),
(14, 3, 13);