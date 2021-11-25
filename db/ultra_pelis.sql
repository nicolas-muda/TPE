-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 01:49:24
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ultra_pelis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `puntuacion` int(5) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_comentario` date NOT NULL,
  `id_pelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `puntuacion`, `id_usuario`, `fecha_comentario`, `id_pelicula`) VALUES
(22, 'muy buena pelicula', 5, 1, '2021-11-23', 1),
(23, 'no es lo que me espera pero esta buena', 3, 15, '2021-11-09', 1),
(24, 'muy buena continuación de la saga', 5, 16, '2021-11-03', 1),
(25, 'no me gusto para nada muy mala', 1, 4, '2021-11-24', 1),
(29, 'me esperaba mucho mas de la tercera parte de la saga', 2, 3, '2021-11-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_generos` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_generos`, `genero`) VALUES
(1, 'terror'),
(2, 'comedia'),
(3, 'accion'),
(4, 'ciencia ficcion'),
(5, 'drama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(200) NOT NULL,
  `duracion` varchar(15) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `id_genero_fk` int(11) NOT NULL,
  `nombre_pelicula` varchar(100) NOT NULL,
  `puntuacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `duracion`, `descripcion`, `id_genero_fk`, `nombre_pelicula`, `puntuacion`) VALUES
(1, '1h 52m', 'Los investigadores de fenómenos paranormales Ed y Lorraine Warren se enfrentan a un nuevo caso: el de un hombre acusado de un terrible asesinato, que asegura haber sido poseído por un demonio.', 1, 'el conjuro 3', 9),
(2, '1h 30m', 'En un mundo invadido y arrasado por unos letales extraterrestres que se guían por el sonido, Evelyn y Lee Abbott sobreviven con sus hijos en una granja aislada en el bosque, sumidos en el más profundo silencio. Mientras no hagan ruido, estarán a salvo.', 1, 'Un lugar en silencio', 5),
(3, '2h 31m', 'Una peligrosa conspiración, relacionada con su pasado, persigue a Natasha Romanoff, también conocida como Viuda Negra. La agente tendrá que lidiar con las consecuencias de haber sido espía, así como con las relaciones rotas, para sobrevivir.', 3, 'black widow', 4),
(4, '2h 2m', 'Arthur Fleck adora hacer reír a la gente, pero su carrera como comediante es un fracaso. El repudio social, la marginación y una serie de trágicos acontecimientos lo conducen por el sendero de la locura y, finalmente, cae en el mundo del crimen.', 5, 'joker', 5),
(5, '1h 39m', 'Los cazadores de zombis viajan desde la Casa Blanca hasta el corazón de los Estados Unidos, donde tendrán que defenderse de nuevas clases de muertos vivientes que han evolucionado. Mientras intentan salvar el mundo, los miembros de la pandilla también tendrán que aprender a convivir.', 2, 'Zombieland 2: tiro de gracia', 3),
(20, '1h 41m', 'John Wick es un asesino a sueldo retirado que vuelve a la acción después de que un jefe mafioso haya puesto precio a su cabeza y le haya robado todo lo que le quedaba tras la muerte de su esposa.', 3, 'john wick', 10),
(21, '1h 50m', 'Cole Young, el luchador de MMA, acostumbrado a recibir palizas por dinero, desconoce su ascendencia, y tampoco sabe por qué el emperador Shang Tsung de Outworld ha enviado a su mejor guerrero, Sub-Zero, un Cryomancer sobrenatural, para dar caza a Cole.', 3, 'mortal kombat', 7),
(25, '1h 37m', 'Después de encontrar un cuerpo anfitrión en el periodista de investigación Eddie Brock, el simbionte alienígena debe enfrentarse a un nuevo enemigo, Carnage, el alter ego del asesino en serie Cletus Kasady.', 3, 'Venom: Carnage liberado', 8),
(26, '2h 1m', 'Adelaide Wilson, su marido y sus dos hijos visitan la casa en la que ella creció junto a la playa. Allí, Adelaide tiene un presentimiento siniestro que precede a un encuentro espeluznante: cuatro enmascarados se presentan ante su casa', 1, 'us', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contraseña`, `rol`) VALUES
(1, 'nicolasmuda@live.com.ar', '$2a$12$xu0KBwyv.wisEtsx/uiZE.F2fJml0AMTfH3vXyCNfrlgeTszzKyee', 'administrador'),
(3, 'prueba@live.com.ar', '$2a$12$gEd35lEz.rkAvufgwt/XL.mtgB1iR.5yK6ZcDFd.1bng/W94E6ugm', 'usuario'),
(4, 'testeo@gmail.com', '$2a$12$i/KijIrmmyV6YHR65T4Ew.cY3/eVYXvG5.DgV8XXQnG5c.xJhgtxC', 'administrador'),
(15, 'usuario1@gmail.com', '$2y$10$eliXWqWFYbCxRZuCH4ZZiOqBZ6sE01LLfwOhKs2lbhOEW./.1jYRu', 'usuario'),
(16, 'usuario2@live.com', '$2y$10$fd.GSJdRmEu6BOMCXneRj.8YGTnV76gvMcMgWFyIjA21J06K997k6', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_generos`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id genero` (`id_genero_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_generos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero_FK`) REFERENCES `generos` (`id_generos`),
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`id_genero_fk`) REFERENCES `generos` (`id_generos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
