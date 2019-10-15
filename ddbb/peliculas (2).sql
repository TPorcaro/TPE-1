-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2019 a las 20:47:53
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

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
  `imagen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_genero_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `nombre`, `director`, `estreno`, `duracion`, `imagen`, `descripcion`, `id_genero_fk`) VALUES
(25, 'Matrics', 'Neo Pistea', '4/4/1996', 'Como 3 hora\'', 'https://images-na.ssl-images-amazon.com/images/I/51Q7Psa2ufL._AC_.jpg', 'Neo se pelea con un monton de Dukis', 5),
(26, 'Halloween', 'Rob Zombie', '1995', 'Como hora y media', 'http://es.web.img3.acsta.net/r_1280_720/medias/nmedia/18/91/27/64/20137683.jpg', 'Se centra en el asesino psicopata Michael Myers', 4),
(27, 'Chucky', 'Tom Holland', '09/11/1988', '87m', 'https://66.media.tumblr.com/281a2fb3fd1687bd17c7234ce0abd159/tumblr_puklnbrThq1qgpddwo1_400.jpg', 'Mediante un ritual de vudú, el alma de un asesino moribundo trasmigra a un muñeco. Una madre compra el muñeco para su hijo, sin saber que está arrojando a sus hijos a los brazos de un ser infernal.', 4),
(28, 'Viernes 13', 'Sean S. Cunningham', '30/10/1980', '95m', 'https://i.pinimg.com/originals/26/2c/25/262c250b94135b90ae0ecb13cb9ea8a7.jpg', 'El campamento de verano del lago Cristal reabre sus puertas tras permanecer varios años cerrado a raíz de un accidente. A partir de ese momento, comienza a aparecer gente muerta en extrañas circunstancias', 4),
(29, 'Depredador', 'John McTiernan', '18/06/1987', '107m', 'http://4.bp.blogspot.com/-xAfIZKhGO6I/T6L0AQFC5tI/AAAAAAAACAI/7UJCSbIl-LU/s1600/Depredador-368630976', 'Un furtivo monstruo alienígena ataca a varios comandos durante una misión en las selvas de América del Sur.', 5),
(30, 'Terminator', 'James Cameron', '18/05/1985', '108m', 'https://i.ebayimg.com/images/g/134AAOSwirZTusDO/s-l300.jpg', 'Un asesino cibernético del futuro es enviado a Los Ángeles, para matar a la mujer que procreará a un líder.', 5),
(31, 'Los Cazafantasmas', 'Ivan Reitman', '27/12/1984', '107m', 'https://m.media-amazon.com/images/M/MV5BMTkxMjYyNzgwMl5BMl5BanBnXkFtZTgwMTE3MjYyMTE@._V1_UX182_CR0,0', 'Cuatro investigadores de sucesos paranormales desempleados crean una empresa en Nueva York con el propósito de limpiar la ciudad de fantasmas.', 6),
(32, 'La Mascara', 'Chuck Russell', '29/12/1994', '101m', 'http://es.web.img3.acsta.net/c_215_290/pictures/14/02/07/13/46/596218.jpg', 'Una máscara antigua transforma a un monótono empleado bancario en un Romeo sonriente con poderes sobrehumanos.', 6),
(33, 'Tonto y Retonto', 'Peter Farrelly', '13/06/1995', '113m', 'https://http2.mlstatic.com/D_NQ_NP_779361-MLA26668066252_012018-V.jpg', 'Dos amigos viajan a Aspen, Colorado, para devolver a una joven la maleta repleta de dólares que olvidó en el aeropuerto.', 6),
(34, 'El Señor de los Anillos: la Comunidad del Anillo', 'Peter Jackson', '31/01/2002', '228m', 'https://pics.filmaffinity.com/El_se_or_de_los_anillos_La_comunidad_del_anillo-744631610-large.jpg', 'Frodo Bolsón es un hobbit al que su tío Bilbo hace portador del poderoso Anillo Único, capaz de otorgar un poder ilimitado al que la posea, con la finalidad de destruirlo. Sin embargo, fuerzas malignas muy poderosas quieren arrebatárselo.', 8),
(36, 'Harry potter y la piedra filosofal', 'Chris Columbus', '29/11/2001', '159m', 'https://imagessl8.casadellibro.com/m/ig/8/4921228.jpg', 'El día de su cumpleaños, Harry Potter descubre que es hijo de dos conocidos hechiceros, de los que ha heredado poderes mágicos. Debe asistir a una famosa escuela de magia y hechicería, donde entabla una amistad con dos jóvenes que se convertirán en sus compañeros de aventura.', 8),
(37, 'Star Wars: A New Hope', 'George Lucas', '25/12/1977', '125m', 'http://t1.gstatic.com/images?q=tbn:ANd9GcSKTW3jUyO26OzUfoQnFRdIcH_9NgxuU2yzeFUMmJWqBCtPP9lF', 'La nave en la que viaja la princesa Leia es capturada por las tropas imperiales al mando del temible Darth Vader. Antes de ser atrapada, Leia consigue introducir un mensaje en su robot R2-D2, quien acompañado de su inseparable C-3PO logra escapar. Tras aterrizar en el planeta Tattooine son capturados y vendidos al joven Luke Skywalker, quien descubrirá el mensaje oculto que va destinado a Obi Wan Kenobi, maestro Jedi a quien Luke debe encontrar para salvar a la princesa.', 8);

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
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero_fk`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
