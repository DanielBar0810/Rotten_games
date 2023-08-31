-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2023 a las 22:46:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rotten_tomatoes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id_juego` int(11) NOT NULL,
  `nombre_juego` varchar(45) DEFAULT NULL,
  `poster` varchar(1000) NOT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_compania` int(11) DEFAULT NULL,
  `duracion` int(11) NOT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  `estreno` int(11) DEFAULT NULL,
  `recaudacion` float NOT NULL,
  `sinopsis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id_juego`, `nombre_juego`, `poster`, `id_genero`, `id_compania`, `duracion`, `puntuacion`, `estreno`, `recaudacion`, `sinopsis`) VALUES
(1, 'Tetris', 'tetris.png', 14, 1, 1, 4, 1984, 520000000, 'El objetivo es hacer caer piezas e ir rellenando huecos para conseguir hacer líneas. Una vez creadas, desaparecen, y nos interesa hacerlo de cuatro en cuatro en vez de una en una por los puntos que hay implicados en ello. Si consigues una de cuatro, felicidades, acabas de hacer un Tetris.'),
(2, 'Resident Evil 1', 'residentEvil.jpg', 15, 4, 10, 4, 1996, 270000, 'La trama del juego sigue a Chris Redfield y Jill Valentine, miembros de una fuerza de élite conocida como S.T.A.R.S., mientras investigan las afueras de Raccoon City tras la desaparición de los miembros de su equipo. Pronto quedan atrapados en una mansión infestada de zombis y diferentes tipos de monstruos.'),
(3, 'Super Mario Bros', 'mario.jpg', 16, 2, 1, 5, 1985, 58000000, '\r\nSuper Mario Bros tiene lugar en el pacífico Reino Champiñón, donde viven hongos antropomorfos, que fue invadido por los Koopas, una tribu de tortugas. El tranquilo pueblo es convertido en piedra y ladrillos, y el reino de los champiñones se va a la ruina. La única que puede deshacer el influjo mágico de ellos es la Princesa Peach, hija del Rey Champiñón. Desafortunadamente, está en las garras del Rey de los Koopas, Bowser.\r\n\r\nMario, un humano residente en el Reino Champiñón, escucha las llamadas de socorro de la Princesa, y junto a su hermano Luigi se dispone a rescatarla y expulsar a los invasores Koopas del reino.'),
(4, 'Mortal Kombat', 'mk.jpg', 12, 1, 1, 4, 1992, 3000000, 'El juego ocurre en la Tierra, donde un torneo en la Isla de Shang Tsung decide el destino del reino. Shang Tsung busca controlar el torneo con Goro, un ser poderoso. Si Goro gana nuevamente, el Emperador Shao Kahn puede conquistar la Tierra. Nuevos guerreros deben vencer a Goro para proteger su mundo.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id_juego`),
  ADD KEY `fk_idgenero_idx` (`id_genero`),
  ADD KEY `fk_idcompania_idx` (`id_compania`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `fk_idcompania` FOREIGN KEY (`id_compania`) REFERENCES `compania` (`id_compania`),
  ADD CONSTRAINT `fk_idgenero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
