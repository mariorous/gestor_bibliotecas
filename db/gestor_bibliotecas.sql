-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 17:33:29
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
-- Base de datos: `gestor_bibliotecas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `language` varchar(3) NOT NULL,
  `id_library` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `isbn`, `language`, `id_library`) VALUES
(1, 'Don Quijote de la Mancha', 'Miguel de Cervantes', '978-006093434', 'Esp', 5),
(2, 'Cien años de soledad', 'Gabriel García Márquez', '978-030747472', 'Esp', 5),
(3, 'La sombra del viento', 'Carlos Ruiz Zafón', '978-014303490', 'Esp', 3),
(4, 'El amor en los tiempos del cólera', 'Gabriel García Márquez', '978-030738973', 'Esp', 5),
(5, 'Los detectives salvajes', 'Roberto Bolaño', '978-843396842', 'Esp', 5),
(6, 'Rayuela', 'Julio Cortázar', '978-849062707', 'Esp', 3),
(7, 'Ficciones', 'Jorge Luis Borges', '978-030795092', 'Esp', 3),
(8, 'Pedro Páramo', 'Juan Rulfo', '978-842640112', 'Esp', 3),
(9, 'Crimen y castigo', 'Fiódor Dostoyevski', '978-014305814', 'Esp', 2),
(10, '1984', 'George Orwell', '978-045152493', 'Esp', 3),
(11, 'La casa de los espíritus', 'Isabel Allende', '978-055338380', 'Esp', 4),
(12, 'El túnel', 'Ernesto Sabato', '978-014026601', 'Esp', 3),
(13, 'La colmena', 'Camilo José Cela', '978-842335129', 'Esp', 2),
(14, 'El proceso', 'Franz Kafka', '978-153681945', 'Esp', 5),
(15, 'La fiesta del chivo', 'Mario Vargas Llosa', '978-006073279', 'Esp', 4),
(16, 'El nombre de la rosa', 'Umberto Eco', '978-015600131', 'Esp', 5),
(17, 'Madame Bovary', 'Gustave Flaubert', '978-014044912', 'Esp', 4),
(18, 'La ciudad y los perros', 'Mario Vargas Llosa', '978-846634134', 'Esp', 2),
(19, 'Las ratas', 'Miguel Delibes', '978-846703748', 'Esp', 4),
(20, 'Siddhartha', 'Hermann Hesse', '978-014118123', 'Esp', 2),
(21, 'La metamorfosis', 'Franz Kafka', '978-150847557', 'Esp', 1),
(22, 'El hombre invisible', 'H.G. Wells', '978-048627071', 'Esp', 1),
(23, 'Los miserables', 'Victor Hugo', '978-207036944', 'Esp', 1),
(24, 'El extranjero', 'Albert Camus', '978-067972020', 'Esp', 2),
(25, 'Ana Karenina', 'León Tolstói', '978-014303500', 'Esp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `library`
--

INSERT INTO `library` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Biblioteca Nacional de España', 'Paseo de Recoletos, 20-22, 28001 Madrid, España', '915807823'),
(2, 'Biblioteca Pública de Valencia', 'Calle del Hospital, 13, 46001 Valencia, España', '963513987'),
(3, 'Biblioteca Pública de Zaragoza', 'Calle Doctor Cerrada, 22, 50005 Zaragoza, España', '976222943'),
(4, 'Biblioteca Regional de Murcia', 'Avenida Juan Carlos I, 17, 30008 Murcia, España', '968366508'),
(5, 'Biblioteca de Andalucía', 'Calle Profesor Sainz Cantero, 6, 18002 Granada, España', '958029411');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book-library` (`id_library`);

--
-- Indices de la tabla `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book-library` FOREIGN KEY (`id_library`) REFERENCES `library` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
