-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 18:25:47
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE `antecedentes` (
  `id_antecedente` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_patologia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `padece` char(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `nombre_responsable` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numero_responsable` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `direccion`, `fecha_hora`, `nombre_responsable`, `numero_responsable`) VALUES
(5, 'CAPACHO', '2022-09-29 17:39:00', 'yuri', 2147483647),
(7, 'CAPACHO', '0004-04-04 16:04:00', 'yuri', 0),
(8, 'CAPACHO', '0002-02-02 14:02:00', 'Juan', 412654782),
(9, '[value-2]', '0000-00-00 00:00:00', '[value-4]', 0),
(10, 'CAPACHO', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_consulta` datetime NOT NULL DEFAULT current_timestamp(),
  `peso` float NOT NULL,
  `unidad_peso` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `talla` float NOT NULL,
  `unidad_talla` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `presion_arterial` float NOT NULL,
  `diagnostico` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tratamiento` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `proxima_consulta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `id_paciente`, `fecha_consulta`, `peso`, `unidad_peso`, `talla`, `unidad_talla`, `presion_arterial`, `diagnostico`, `tratamiento`, `proxima_consulta`) VALUES
(13, 1, '2022-10-10 14:02:48', 1, 'Gramos', 1, ' Metros', 22, '1', '1', '0001-01-01'),
(15, 8, '2022-10-10 14:12:12', 10, 'Gramos', 10, ' Metros', 120, 'j', 'j', '0007-07-07'),
(16, 8, '2022-10-10 14:15:11', 452, 'Kilogramos', 50, 'Metros', 120, 'aaa', 'aaa', '0006-06-06'),
(17, 6, '2022-10-11 00:02:28', 50, 'Kilogramos', 8, 'Metros', 233, 'nada', 'nada', '0006-06-06'),
(18, 6, '2022-10-11 00:17:58', 50, 'Gramos', 8, ' Centímetros', 233, 'g', 'g', '0006-06-06'),
(20, 6, '2022-10-11 19:56:16', 10, 'Kilogramos', 0, ' Metros', 0, '', '', '0000-00-00'),
(21, 6, '2022-10-11 20:23:42', 10, 'Kilogramos', 10, ' Metros', 0, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(20) CHARACTER SET utf8 NOT NULL,
  `documento_identidad` int(20) NOT NULL,
  `cargo` varchar(20) CHARACTER SET utf8 NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(30) CHARACTER SET utf8 NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `rif` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `documento_identidad`, `cargo`, `fecha_nacimiento`, `sexo`, `direccion`, `telefono`, `rif`) VALUES
(1, 'Yubelk', 'Muñoz', 123456, 'Administrador (a)]', '2022-10-17', 'Femenino', 'Capacho', 4161327115, '1234'),
(3, 'Yuri', 'Maldonado', 123456, 'Ayudante (a)', '2003-02-02', 'Femenino', 'Capacho', 4161327115, '1235965'),
(4, 'Santiago', 'Hernandez', 31258000, 'Secretario (a)', '2022-10-11', 'Masculino', 'Cordero', 41613271222, '1235967'),
(5, 'Yubelka', '', 0, 'Doctor (a)', '0000-00-00', 'Masculino', '', 0, ''),
(6, '123456', '', 0, 'Doctor (a)', '0000-00-00', 'Masculino', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nacionalidad` varchar(20) CHARACTER SET utf8 NOT NULL,
  `documento_identidad` int(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `sexo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(30) CHARACTER SET utf8 NOT NULL,
  `numero_paciente` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre`, `apellido`, `nacionalidad`, `documento_identidad`, `fecha_nacimiento`, `telefono`, `sexo`, `direccion`, `numero_paciente`) VALUES
(1, 'Yubelka', 'Muñoz', 'Venezolano (a)', 27239668, '1999-12-17', 4247731293, 'Femenino', 'La Castra', 0),
(2, 'Yurimar del Carmen', 'Muñoz Maldonado', 'Venezolano (a)', 29852777, '2003-02-11', 4247731293, 'Femenino', 'Capacho', 2),
(6, 'Banlly Karina ', 'Maldonado de Muñoz', 'Venezolano (a)', 12753423, '1975-12-13', 4147290605, 'Femenino', 'Capachos', 501),
(9, 'Fidel', 'Muñoz', 'Extranjero (a)', 9603975, '2022-10-05', 4129658324, 'Masculino', 'Urb. Sucre', 50002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologias`
--

CREATE TABLE `patologias` (
  `id_patologia` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `patologias`
--

INSERT INTO `patologias` (`id_patologia`, `nombre`, `descripcion`) VALUES
(1, 'nombre', 'descripcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id_recibo` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `numero_recibo` int(20) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `precio` float NOT NULL,
  `concepto` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`id_recibo`, `id_paciente`, `id_empleado`, `numero_recibo`, `fecha`, `precio`, `concepto`) VALUES
(112, 2, 5, 10, '2022-10-12 10:42:00', 34, 'prueba 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `tipo_rol` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `tipo_rol`) VALUES
(1, 'adminm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `correo` varchar(20) CHARACTER SET utf8 NOT NULL,
  `contrasena` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id_antecedente`),
  ADD KEY `id_paciente` (`id_paciente`,`id_patologia`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `patologias`
--
ALTER TABLE `patologias`
  ADD PRIMARY KEY (`id_patologia`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id_recibo`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empleado` (`id_empleado`,`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id_antecedente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `id_patologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
