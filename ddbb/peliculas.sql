-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2019 a las 20:25:04
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estreno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_genero_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `nombre`, `director`, `estreno`, `duracion`, `descripcion`, `id_genero_fk`) VALUES
(25, 'Matrics', 'Neo Pistea', '4/4/1996', 'Como 3 hora\'', 'Neo se pelea con un monton de Dukis', 5),
(26, 'Halloween', 'Rob Zombie', '1995', 'Como hora y media', 'Se centra en el asesino psicopata Michael Myers', 4),
(27, 'Chucky', 'Tom Holland', '09/11/1988', '87m', 'Mediante un ritual de vudú, el alma de un asesino moribundo trasmigra a un muñeco. Una madre compra el muñeco para su hijo, sin saber que está arrojando a sus hijos a los brazos de un ser infernal.', 4),
(28, 'Viernes 13', 'Sean S. Cunningham', '30/10/1980', '95m', 'El campamento de verano del lago Cristal reabre sus puertas tras permanecer varios años cerrado a raíz de un accidente. A partir de ese momento, comienza a aparecer gente muerta en extrañas circunstancias', 4),
(29, 'Depredador', 'John McTiernan', '18/06/1987', '107m', 'Un furtivo monstruo alienígena ataca a varios comandos durante una misión en las selvas de América del Sur.', 5),
(30, 'Terminator', 'James Cameron', '18/05/1985', '108m', 'Un asesino cibernético del futuro es enviado a Los Ángeles, para matar a la mujer que procreará a un líder.', 5),
(31, 'Los Cazafantasmas', 'Ivan Reitman', '27/12/1984', '107m', 'Cuatro investigadores de sucesos paranormales desempleados crean una empresa en Nueva York con el propósito de limpiar la ciudad de fantasmas.', 6),
(32, 'La Mascara', 'Chuck Russell', '29/12/1994', '101m', 'Una máscara antigua transforma a un monótono empleado bancario en un Romeo sonriente con poderes sobrehumanos.', 6),
(33, 'Tonto y Retonto', 'Peter Farrelly', '13/06/1995', '113m', 'Dos amigos viajan a Aspen, Colorado, para devolver a una joven la maleta repleta de dólares que olvidó en el aeropuerto.', 6),
(34, 'El Señor de los Anillos: la Comunidad del Anillo', 'Peter Jackson', '31/01/2002', '228m', 'Frodo Bolsón es un hobbit al que su tío Bilbo hace portador del poderoso Anillo Único, capaz de otorgar un poder ilimitado al que la posea, con la finalidad de destruirlo. Sin embargo, fuerzas malignas muy poderosas quieren arrebatárselo.', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_genero_fk` (`id_genero_fk`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `id_peliculas_genero_fk` FOREIGN KEY (`id_genero_fk`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
