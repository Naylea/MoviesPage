-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2019 a las 22:45:40
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mantenimiento`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_pelicula` (IN `p_pelicula` TEXT, IN `p_sinopsis` TEXT, IN `p_review` TEXT, IN `p_puntuacion` TEXT, IN `p_imagen` TEXT)  NO SQL
INSERT INTO `peliculas` (`pelicula`, `sinopsis`, `review`, `puntuacion`, `imagen`) VALUES (p_pelicula, p_sinopsis, p_review, p_puntuacion, p_imagen)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar` (IN `param_id` SMALLINT(20))  BEGIN
  SET @s = CONCAT("DELETE from peliculas where id=",param_id
                 );
  PREPARE stmt FROM @s;
  EXECUTE stmt;
  DEALLOCATE PREPARE stmt;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_peliculas` ()  BEGIN
SELECT * from peliculas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_paginacion` (IN `var` INT(100))  BEGIN
 SELECT * FROM peliculas LIMIT var,5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validar_usuario` (IN `param_user` VARCHAR(255), IN `param_pass` VARCHAR(255))  BEGIN 
      SET @s = CONCAT("SELECT count(*) FROM usuarios
	  WHERE usuario = '", param_user , "'AND clave = '",param_pass,"'");
	  
	  PREPARE stmt FROM @s;
	  EXECUTE stmt;
	  DEALLOCATE PREPARE stmt;
	  
	  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `Pelicula` varchar(100) NOT NULL DEFAULT '',
  `Sinopsis` varchar(300) NOT NULL,
  `Review` varchar(400) NOT NULL,
  `Puntuacion` enum('1','2','3','4','5') DEFAULT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `Pelicula`, `Sinopsis`, `Review`, `Puntuacion`, `imagen`) VALUES
(1, 'La Lista de Schindler', 'El industrialista aleman Oskar Schindler (Liam Neeson) urde un plan con su contador (Ben Kingsley) para rescatar prisioneros judios de los nazis.\r\n', 'La Lista de Schindler combina el horror abyecto del Holocausto con el caracteristico humanismo de Steven Spielberg para crear la obra maestra dramatica del director.\r\n', '4', 'listaschindler.jpg'),
(2, 'The Godfather(El Padrino)', 'Una adaptacion ganadora del Premio de la Academia, de la novela de Mario Puzo acerca de la familia Corleone.', 'Uno de los mayores exitos criticos y comerciales de Hollywood, The Godfather hace todo bien; la pelicula no solo supero las expectativas, sino que establecio nuevos puntos de referencia para el cine estadounidense.', '', 'elpadrino.jpg'),
(3, 'Shawshank Redemption(Cadena Perpetua)', 'The Shawshank Redemption es un drama carcelario inspirador y profundamente satisfactorio con una dirección sensible y excelentes actuaciones.', 'Un hombre inocente es enviado a una corrupta penitenciaria de Maine en 1947 y sentenciado a dos cadenas perpetuas por un doble asesinato.', '', 'cadenaperpetua.jpg'),
(4, 'Pulp Fiction(Tiempos Violentos)', 'La vida de un boxeador, dos sicarios, la esposa de un ganster y dos bandidos se entrelaza en una historia de violencia y redencion.', 'Una de las peliculas mas influyentes de la decada de 1990, Pulp Fiction es una delirante mezcla posmoderna de emociones neo-noir, humor negro y piedras de toque de la cultura pop.', '', 'pulp-fiction.jpg'),
(5, 'To Kill a Mockingbird', 'Los hijos de un abogado sureño afrontan prejuicios raciales cuando su padre defiende a un hombre negro inocente, acusado de haber violado a una mujer blanca. Película basada en el libro del mismo título de Harper Lee, que explora los conflictos raciales en el sur de EE.UU. durante la epoca de la seg', 'Matar a un ruiseñor es un ejemplo de libro de texto de una pelicula de mensajes bien hecha, sobria y sincera, pero que nunca deja que su conciencia social se interponga en el drama.', '5', 'bird.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `usuario` varchar(20) NOT NULL DEFAULT '',
  `clave` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(1, 'testuser', 'teXB5LK3JWG6g');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
