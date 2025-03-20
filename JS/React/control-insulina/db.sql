SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: diabetes_db
-- tabla comida

CREATE TABLE `comida` (
  `tipo_comida` enum('desayuno','comida','cena') NOT NULL,
  `gl_1h` int(11) NOT NULL,
  `gl_2h` int(11) NOT NULL,
  `raciones` int(11) NOT NULL,
  `insulina` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla control_glucosa

CREATE TABLE `control_glucosa` (
  `fecha` date NOT NULL,
  `deporte` int(11) NOT NULL,
  `lenta` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- datos tabla control_glucosa

INSERT INTO `control_glucosa` (`fecha`, `deporte`, `lenta`, `id_usu`) VALUES
('2025-03-17', 1, 4, 1),
('2025-03-18', 2, 3, 1),
('2025-03-19', 3, 2, 1),
('2025-03-20', 4, 1, 1);

-- tabla hiperglucemia

CREATE TABLE `hiperglucemia` (
  `glucosa` int(11) NOT NULL,
  `hora` time NOT NULL,
  `correccion` int(11) NOT NULL,
  `tipo_comida` enum('desayuno','comida','cena',) NOT NULL,
  `fecha` date NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla hipoglucemia

CREATE TABLE `hipoglucemia` (
  `glucosa` int(11) NOT NULL,
  `hora` time NOT NULL,
  `tipo_comida` enum('desayuno','comida','cena') NOT NULL,
  `fecha` date NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- tabla usuario

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- datos tabla usuario

INSERT INTO `usuario` (`id_usu`, `fecha_nacimiento`, `nombre`, `apellidos`, `usuario`, `contra`) VALUES
(1, '2000-06-11', 'Ruben', 'Boquete', 'rubenbd', 'ruben'),
(2, '0001-01-1', 'a', 'bc', 'aa', 'a');

-- Índices tablas

-- tabla comida
ALTER TABLE `comida`
  ADD PRIMARY KEY (`tipo_comida`,`fecha`,`id_usu`),
  ADD KEY `fecha` (`fecha`,`id_usu`);

-- tabla control_glucosa
ALTER TABLE `control_glucosa`
  ADD PRIMARY KEY (`fecha`,`id_usu`),
  ADD KEY `id_usu` (`id_usu`);

-- tabla hiperglucemia
ALTER TABLE `hiperglucemia`
  ADD PRIMARY KEY (`tipo_comida`,`fecha`,`id_usu`);

-- tabla hipoglucemia
ALTER TABLE `hipoglucemia`
  ADD PRIMARY KEY (`tipo_comida`,`fecha`,`id_usu`);

-- tabla usuario
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `usuario` (`usuario`);

-- AUTO_INCREMENT tabla `usuario`
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `comida`
  ADD CONSTRAINT `comida_ibfk_1` FOREIGN KEY (`fecha`,`id_usu`) REFERENCES `control_glucosa` (`fecha`, `id_usu`) ON DELETE CASCADE;

ALTER TABLE `control_glucosa`
  ADD CONSTRAINT `control_glucosa_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE;

ALTER TABLE `hiperglucemia`
  ADD CONSTRAINT `hiperglucemia_ibfk_1` FOREIGN KEY (`tipo_comida`,`fecha`,`id_usu`) REFERENCES `comida` (`tipo_comida`, `fecha`, `id_usu`) ON DELETE CASCADE;

ALTER TABLE `hipoglucemia`
  ADD CONSTRAINT `hipoglucemia_ibfk_1` FOREIGN KEY (`tipo_comida`,`fecha`,`id_usu`) REFERENCES `comida` (`tipo_comida`, `fecha`, `id_usu`) ON DELETE CASCADE;
COMMIT;