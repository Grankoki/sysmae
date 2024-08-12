-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-08-2024 a las 21:00:35
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21578370_bd_iepmae`
--
CREATE SCHEMA IF NOT EXISTS `bd_iepmae` DEFAULT CHARACTER SET utf8 ;
USE `bd_iepmae` ;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_accesousuario`
--

CREATE TABLE `tb_accesousuario` (
  `idAccesoUsuario` int(11) NOT NULL,
  `fechaAcceso` date DEFAULT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_administrativo`
--

CREATE TABLE `tb_administrativo` (
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apePat` varchar(30) DEFAULT NULL,
  `apeMat` varchar(30) DEFAULT NULL,
  `fecNac` date DEFAULT NULL,
  `fecIngreso` date DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telfMovil` varchar(50) DEFAULT NULL,
  `telfFijo` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `idGenero` int(11) NOT NULL,
  `idDistrito` int(11) NOT NULL,
  `idAdministrativo` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fotoAdministrativo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_administrativo`
--

INSERT INTO `tb_administrativo` (`dni`, `nombre`, `apePat`, `apeMat`, `fecNac`, `fecIngreso`, `direccion`, `telfMovil`, `telfFijo`, `email`, `estado`, `idGenero`, `idDistrito`, `idAdministrativo`, `idCargo`, `idUsuario`, `fotoAdministrativo`) VALUES
('09450506', 'María Teresa', 'Quispe', 'Amar', '1970-05-17', '2009-02-15', 'Jr. Tacna 311', '923130877', '4017166', 'techiquam@gmail.com', 1, 2, 1, 1, 2, 2, NULL),
('09489511', 'Sandra', 'Quispe', 'Amar', '1973-06-25', '2008-01-19', 'Jr. Tacna 311', '943130277', '4017166', 'sandraq@gmail.com', 1, 2, 1, 2, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_apoderado`
--

CREATE TABLE `tb_apoderado` (
  `observacion` varchar(100) DEFAULT NULL,
  `idApoderado` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apePat` varchar(30) DEFAULT NULL,
  `apeMat` varchar(30) DEFAULT NULL,
  `fecNac` date DEFAULT NULL,
  `fecIngreso` date DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telfMovil` varchar(40) DEFAULT NULL,
  `telfFijo` varchar(40) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idDistrito` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_apoderado`
--

INSERT INTO `tb_apoderado` (`observacion`, `idApoderado`, `dni`, `nombre`, `apePat`, `apeMat`, `fecNac`, `fecIngreso`, `direccion`, `telfMovil`, `telfFijo`, `email`, `estado`, `idDistrito`, `idGenero`) VALUES
('religión mormón', 1, '11059943', 'Margarita', 'Huaranca', 'Rojas', '1970-09-25', '2014-02-19', 'Jr. Amazonas 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('exagera las situaciones al hablar', 2, '14059933', 'Roxana', 'Rivera', 'Huaman', '1978-09-25', '2010-03-11', 'Jr. Amazonas 122', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('se compromete a donar cada fin de año una caja de panetones', 3, '13099941', 'Gladys', 'Herrera', 'Zapata', '1977-11-25', '2011-02-23', 'Jr. Tacna 333', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('', 4, '16059443', 'Katherine', 'Gonzales', 'Vargas', '1983-04-11', '2012-03-10', 'Jr. Amazonas 611', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('', 5, '16041143', 'Mateo', 'Cardenas', 'Rivera', '1972-06-25', '2014-02-16', 'Jr. Loreto 402', '980230119', '4508224', 'polladax1@gmail.com', 1, 1, 1),
('', 6, '11775743', 'Rosa', 'Pajuelo', 'Zuñiga', '1979-02-21', '2015-03-13', 'Jr. Amazonas 122', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('', 7, '10885711', 'Elvira', 'Román', 'Chipana', '1979-01-21', '2016-02-27', 'Jr. Huanuco 409', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('', 8, '20045701', 'Flor', 'Camposano', 'Rosales', '1980-03-12', '2016-02-27', 'Jr. Tacna 109', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('', 9, '13045113', 'Mercedes', 'Durand', 'Bautista', '1977-08-20', '2016-02-27', 'Jr. Amazonas 417', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('', 10, '19041143', 'Angela', 'Sebastian', 'Gonzales', '1985-02-12', '2016-02-27', 'Jr. Amazonas 199', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('', 11, '13455743', 'Sandra', 'Alvarez', 'Quispe', '1976-08-08', '2016-02-27', 'Jr. Loreto 177', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('', 12, '16045747', 'Angélica', 'Abad', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('', 13, '10849743', 'Camila', 'Contreras', 'Zapata', '1982-09-01', '2016-02-27', 'Jr. Amazonas 347', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('', 14, '13149743', 'Adriana', 'Cabezas', 'Salgado', '1982-11-01', '2016-02-27', 'Jr. Amazonas 197', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('', 15, '10867741', 'Daniela', 'Huaman', 'Salcedo', '1982-03-03', '2016-02-27', 'Jr. Amazonas 677', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('', 16, '10841640', 'Cecilia', 'Portilla', 'Tamariz', '1974-01-19', '2016-02-27', 'Jr. Tacna 347', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('', 17, '13844143', 'Carla', 'Franco', 'Contreras', '1985-09-07', '2016-02-27', 'Jr. Amazonas 687', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('', 18, '19249740', 'Ana María', 'Pirco', 'Pacheco', '1980-09-04', '2016-02-27', 'Jr. Amazonas 874', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('', 19, '14879783', 'Elena', 'Nuñez', 'Vargas', '1982-03-11', '2016-02-27', 'Jr. Amazonas 680', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('', 20, '10808797', 'Susana', 'Quispe', 'Barreto', '1980-09-01', '2016-02-27', 'Jr. Ica 347', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de André', 21, '10808798', 'Margarita', 'Quispe', 'Aiquipa', '1970-09-25', '2014-02-19', 'Jr. Amazonas 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Renato', 22, '10808799', 'Rosita', 'Gutierrez', 'Huaman', '1978-09-25', '2010-03-11', 'Jr. Amazonas 122', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Gabriel', 23, '10808800', 'Gladys', 'Erasmo', 'Zapata', '1977-11-25', '2011-02-23', 'Jr. Tacna 333', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Raphaella', 24, '10808801', 'Katherine', 'Cuyo', 'Vargas', '1983-04-11', '2012-03-10', 'Jr. Amazonas 611', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Fabian', 25, '10808802', 'Fabianne', 'Villegas', 'Rivera', '1972-06-25', '2014-02-16', 'Jr. Loreto 402', '980230119', '4508224', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Dean', 26, '10808803', 'Rosa', 'Rojas', 'Zuñiga', '1979-02-21', '2015-03-13', 'Jr. Amazonas 122', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('mamá de Adriano', 27, '10808804', 'Elvira', 'Zúñiga', 'Chipana', '1979-01-21', '2016-02-27', 'Jr. Huanuco 409', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Mathías', 28, '10808805', 'Flor', 'Barazorda', 'Rosales', '1980-03-12', '2016-02-27', 'Jr. Tacna 109', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Kiara', 29, '10808806', 'Mercedes', 'Siccha', 'Bautista', '1977-08-20', '2016-02-27', 'Jr. Amazonas 417', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('mamá de Mauricio', 30, '10808807', 'Angela', 'Huamacto', 'Gonzales', '1985-02-12', '2016-02-27', 'Jr. Amazonas 199', '980230119', '4508221', 'polladax1@gmail.com', 1, 2, 2),
('mamá de Rujel', 31, '10808808', 'Sandra', 'Mucha', 'Quispe', '1976-08-08', '2016-02-27', 'Jr. Loreto 177', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de José Miguel', 32, '10808809', 'Angélica', 'Rojas', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Gianluka', 33, '10808810', 'Marcela', 'Leiva', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Romina', 34, '10808811', 'Tatiana', 'Rojas', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Sammi', 35, '10808812', 'Giuliana', 'Amar', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Thiago', 36, '10808813', 'Margoth', 'Pajuelo', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Jorge André', 37, '10808814', 'Fiorella', 'Ovalle', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Joaquin', 38, '10808815', 'Rosmery', 'Ferreyros', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Jhoseana', 39, '10808816', 'Patricia', 'Loayza', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Jazmin', 40, '10808817', 'Juana', 'Alvarez', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Jandi', 41, '10808818', 'Maritza', 'Mejia', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Olenka', 42, '10808819', 'Adriana', 'Rabanal', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Luis Adriano', 43, '10808820', 'Tania', 'Chávez', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Nesta', 44, '10808821', 'Beatriz', 'Palomino', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Mathias', 45, '10808822', 'Evelyn', 'Elias', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Jayana', 46, '10808823', 'Yadira', 'Quispe', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Thiago Rosas', 47, '10808824', 'Rebeca', 'Viviano', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Jhaley', 48, '10808825', 'Alicia', 'Quispe', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Luis Mario', 49, '10808825', 'Victoria', 'Ramos', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Benjamin', 50, '10808826', 'Nancy', 'Hinostroza', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Mafer', 51, '10808827', 'Mónica', 'Castillo', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Antonio', 52, '10808828', 'Maricielo', 'Nina', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Christopher', 53, '10808829', 'Gisella', 'Quintanilla', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Angely', 54, '10808830', 'Elena', 'Gutiérrez', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Luciana', 55, '10808831', 'Francisca', 'Cabezas', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Fernando', 56, '10808832', 'Antonieta', 'Claudio', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Leonardo', 57, '10808833', 'Patricia', 'García', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Ariana', 58, '10808834', 'Violeta', 'Rojas', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Ramses', 59, '10808835', 'Micaela', 'Aragón', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Lukas', 60, '10808836', 'Milagros', 'Bernal', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Álvaro', 61, '10808837', 'Marilu', 'Quispe', 'Amar', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Alejandro', 62, '10808838', 'Maricarmen', 'Alvarez', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Ivanna', 63, '10808839', 'Celeste', 'Chancahuaña', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Samantha', 64, '10808840', 'Fernanda', 'Del Aguila', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Gael', 65, '10808841', 'Angélica', 'Parave', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Micaela', 66, '10808842', 'Leonor', 'Pedraza', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Gabriel', 67, '10808843', 'Ana María', 'Ávila', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Liam', 68, '10808844', 'Erika', 'Gonzales', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Valeria', 69, '10808845', 'Martina', 'Díaz', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Yhariel', 70, '10808846', 'Isabel', 'Córdova', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Alexandra', 71, '10808847', 'Sarita', 'Guzmán', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Alexa', 72, '10808848', 'Lucero', 'Arias', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Amir', 73, '10808849', 'Fabiola', 'Morán', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Thiago', 74, '10808850', 'Adriana', 'Yauri', 'Carbajal', '1986-12-25', '2016-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Tatiana Yasmin', 75, '10808851', 'Carmen', 'Loayza', 'Carbajal', '1986-12-25', '2024-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Jose Gabriel', 76, '10808852', 'Carla', 'Loayza', 'Rosales', '1986-12-25', '2024-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Emilhie', 77, '10808853', 'Rosa', 'Morales', 'Olivos', '1986-12-25', '2024-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2),
('mamá de Anahi', 78, '10808854', 'Andrea', 'Monteza', 'Perez', '1986-12-25', '2024-02-27', 'Jr. Apurimac 422', '980230119', '4508221', 'polladax1@gmail.com', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_archivo_repaso`
--

CREATE TABLE `tb_archivo_repaso` (
  `idMaterialRepaso` int(11) NOT NULL,
  `idArchivoRepaso` int(11) NOT NULL,
  `archivo` blob DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `nombreArchivo` varchar(255) DEFAULT NULL,
  `pesoArchivo` varchar(15) DEFAULT NULL,
  `tipoArchivo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cargo`
--

CREATE TABLE `tb_cargo` (
  `idCargo` int(11) NOT NULL,
  `desCargo` varchar(20) DEFAULT NULL,
  `estadoCargo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_cargo`
--

INSERT INTO `tb_cargo` (`idCargo`, `desCargo`, `estadoCargo`) VALUES
(1, 'Director', 1),
(2, 'Sub-Director', 1),
(3, 'Coordinador', 1),
(4, 'Secretaria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_competencia`
--

CREATE TABLE `tb_competencia` (
  `idCompetencia` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_competencia`
--

INSERT INTO `tb_competencia` (`idCompetencia`, `descripcion`, `estado`, `fecha`, `idCurso`, `idSeccion`) VALUES
(1, 'Se comunica oralmente en su lengua materna', 1, '2023-02-19', 1, 38),
(2, 'Lee diversos tipos de textos en su lengua materna', 1, '2023-02-19', 1, 38),
(3, 'Escribe diversos tipos de textos en su lengua materna', 1, '2023-02-19', 1, 38),
(4, 'Se comunica oralmente en su lengua materna', 1, '2023-02-19', 1, 38),
(5, 'Lee diversos tipos de textos en su lengua materna', 1, '2023-02-19', 1, 38),
(6, 'Escribe diversos tipos de textos en su lengua materna', 1, '2023-02-19', 1, 38),
(7, 'Unidad 7 Comunicacion', 1, '2023-02-19', 1, 38),
(8, 'Unidad 8 Comunicacion', 1, '2023-02-19', 1, 38),
(9, 'Unidad 9 Comunicacion', 1, '2023-02-19', 1, 38),
(10, 'Competencia 1 de matematica', 1, '2023-02-19', 2, 38),
(11, 'Competencia 2 de matematica', 1, '2023-02-19', 2, 38),
(12, 'Competencia 3 de matematica', 1, '2023-02-19', 2, 38),
(13, 'Competencia 4 de matematica', 1, '2023-02-19', 2, 38),
(14, 'Competencia 5 de matematica', 1, '2023-02-19', 2, 38),
(15, 'Competencia 6 de matematica', 1, '2023-02-19', 2, 38),
(16, 'Competencia 7 de matematica', 1, '2023-02-19', 2, 38),
(17, 'Competencia 8 de matematica', 1, '2023-02-19', 2, 38),
(18, 'Competencia 9 de matematica', 1, '2023-02-19', 2, 38),
(19, 'Valora la importancia de la computadora', 1, '2022-02-19', 6, 40),
(20, 'Reconoce el concepto HTML y su estructura', 1, '2022-02-19', 6, 40),
(21, 'Conoce los comandos básicos del lenguaje HTML', 1, '2022-02-19', 6, 40),
(22, 'Conoce el concepto de frames y su utilidad', 1, '2022-02-19', 6, 40),
(23, 'Construye una página web usando frames, imágenes y enlaces', 1, '2022-02-19', 6, 40),
(24, 'Reconoce los componentes del CPU memoria RAM y disco duro', 1, '2022-02-19', 6, 40),
(25, 'Reconoce los componentes del CPU placa principal y procesador', 1, '2022-02-19', 6, 40),
(26, 'Reconoce los componentes del CPU fuente de poder, case y tarjeta de vídeo', 1, '2022-02-19', 6, 40),
(27, 'Reconoce, identifica y ensambla virtualmente los componentes de la computadora', 1, '2022-02-19', 6, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_curso`
--

CREATE TABLE `tb_curso` (
  `idCurso` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_curso`
--

INSERT INTO `tb_curso` (`idCurso`, `descripcion`, `estado`) VALUES
(1, 'Comunicación', 1),
(2, 'Matemática', 1),
(3, 'Personal Social', 1),
(4, 'Ciencia y Tecnología', 1),
(5, 'Inglés', 1),
(6, 'Computación', 1),
(7, 'Educación Religiosa', 1),
(8, 'Arte y Cultura', 1),
(9, 'Educación Física', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_curso_seccion`
--

CREATE TABLE `tb_curso_seccion` (
  `idCurso` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `fechaCurso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_curso_seccion`
--

INSERT INTO `tb_curso_seccion` (`idCurso`, `idSeccion`, `idDocente`, `fechaCurso`) VALUES
(1, 34, 2, '2023-01-15'),
(1, 35, 7, '2023-01-15'),
(1, 36, 7, '2023-01-15'),
(1, 37, 9, '2023-01-15'),
(1, 38, 4, '2023-01-15'),
(1, 39, 4, '2023-01-15'),
(1, 40, 5, '2023-01-15'),
(1, 47, 2, '2024-01-02'),
(1, 48, 7, '2024-01-15'),
(1, 49, 9, '2024-01-15'),
(1, 50, 4, '2024-01-15'),
(1, 51, 4, '2024-01-15'),
(1, 52, 5, '2024-01-15'),
(2, 34, 2, '2023-01-15'),
(2, 35, 7, '2023-01-15'),
(2, 36, 7, '2023-01-15'),
(2, 37, 9, '2023-01-15'),
(2, 38, 4, '2023-01-15'),
(2, 39, 4, '2023-01-15'),
(2, 40, 5, '2023-01-15'),
(2, 47, 2, '2024-01-15'),
(2, 48, 7, '2024-01-15'),
(2, 49, 9, '2024-01-15'),
(2, 50, 4, '2024-01-15'),
(2, 51, 4, '2024-01-15'),
(2, 52, 5, '2024-01-15'),
(3, 34, 2, '2023-01-15'),
(3, 35, 7, '2023-01-15'),
(3, 36, 7, '2023-01-15'),
(3, 37, 9, '2023-01-15'),
(3, 38, 4, '2023-01-15'),
(3, 39, 4, '2023-01-15'),
(3, 40, 5, '2023-01-15'),
(3, 47, 2, '2024-01-15'),
(3, 48, 7, '2024-01-15'),
(3, 49, 9, '2024-01-15'),
(3, 50, 4, '2024-01-15'),
(3, 51, 4, '2024-01-15'),
(3, 52, 5, '2024-01-15'),
(4, 34, 2, '2023-01-15'),
(4, 35, 7, '2023-01-15'),
(4, 36, 7, '2023-01-15'),
(4, 37, 9, '2023-01-15'),
(4, 38, 4, '2023-01-15'),
(4, 39, 4, '2023-01-15'),
(4, 40, 5, '2023-01-15'),
(4, 47, 2, '2024-01-15'),
(4, 48, 7, '2024-01-15'),
(4, 49, 9, '2024-01-15'),
(4, 50, 4, '2024-01-15'),
(4, 51, 4, '2024-01-15'),
(4, 52, 5, '2024-01-15'),
(5, 34, 3, '2023-01-15'),
(5, 35, 3, '2023-01-15'),
(5, 36, 3, '2023-01-15'),
(5, 37, 3, '2023-01-15'),
(5, 38, 3, '2023-01-15'),
(5, 39, 3, '2023-01-15'),
(5, 40, 3, '2023-01-15'),
(5, 47, 3, '2024-01-15'),
(5, 48, 3, '2024-01-15'),
(5, 49, 3, '2024-01-15'),
(5, 50, 3, '2024-01-15'),
(5, 51, 3, '2024-01-15'),
(5, 52, 3, '2024-01-15'),
(6, 34, 1, '2023-01-15'),
(6, 35, 1, '2023-01-15'),
(6, 36, 1, '2023-01-15'),
(6, 37, 1, '2023-01-15'),
(6, 38, 1, '2023-01-15'),
(6, 39, 1, '2023-01-15'),
(6, 40, 1, '2023-01-15'),
(6, 47, 1, '2024-01-15'),
(6, 48, 1, '2024-01-15'),
(6, 49, 1, '2024-01-15'),
(6, 50, 1, '2024-01-15'),
(6, 51, 1, '2024-01-15'),
(6, 52, 1, '2024-01-15'),
(7, 34, 2, '2023-01-15'),
(7, 35, 7, '2023-01-15'),
(7, 36, 7, '2023-01-15'),
(7, 37, 9, '2023-01-15'),
(7, 38, 4, '2023-01-15'),
(7, 39, 4, '2023-01-15'),
(7, 40, 5, '2023-01-15'),
(7, 47, 2, '2024-01-15'),
(7, 48, 7, '2024-01-15'),
(7, 49, 9, '2024-01-15'),
(7, 50, 4, '2024-01-15'),
(7, 51, 4, '2024-01-15'),
(7, 52, 5, '2024-01-15'),
(8, 34, 2, '2023-01-15'),
(8, 35, 7, '2023-01-15'),
(8, 36, 7, '2023-01-15'),
(8, 37, 9, '2023-01-15'),
(8, 38, 4, '2023-01-15'),
(8, 39, 4, '2023-01-15'),
(8, 40, 5, '2023-01-15'),
(8, 47, 2, '2024-01-15'),
(8, 48, 7, '2024-01-15'),
(8, 49, 9, '2024-01-15'),
(8, 50, 4, '2024-01-15'),
(8, 51, 4, '2024-01-15'),
(8, 52, 5, '2024-01-15'),
(9, 34, 3, '2023-01-15'),
(9, 35, 3, '2023-01-15'),
(9, 36, 3, '2023-01-15'),
(9, 37, 3, '2023-01-15'),
(9, 38, 3, '2023-01-15'),
(9, 39, 3, '2023-01-15'),
(9, 40, 3, '2023-01-15'),
(9, 47, 3, '2024-01-15'),
(9, 48, 3, '2024-01-15'),
(9, 49, 3, '2024-01-15'),
(9, 50, 3, '2024-01-15'),
(9, 51, 3, '2024-01-15'),
(9, 52, 3, '2024-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_desempenho`
--

CREATE TABLE `tb_desempenho` (
  `idDesempenho` int(11) NOT NULL,
  `descripcion` varchar(900) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idCompetencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_desempenho`
--

INSERT INTO `tb_desempenho` (`idDesempenho`, `descripcion`, `estado`, `idCompetencia`) VALUES
(1, 'Recupera información explícita de los textos orales que escucha, \n										seleccionando datos específicos, y que presentan expresiones con\n										sentido figurado, vocabulario que incluye sinónimos y términos \n                                        propios de los campos del saber.', 1, 1),
(2, 'Explica el tema, el propósito comunicativo, las emociones y los estados de \n									ánimo de personas y personajes; para ello, distingue lo relevante de lo complementario.', 1, 1),
(3, 'Deduce algunas relaciones lógicas entre las ideas del texto oral, como las secuencias temporales, \n								causa-efecto o semejanza-diferencia, así como las características de personas, personajes, animales, \n                                objetos, hechos y lugares, el significado de palabras según el contexto y expresiones con sentido \n                                figurado (dichos populares, refranes, moralejas), a partir de la información explícita e implícita del texto.', 1, 1),
(4, 'Explica las motivaciones y los sentimientos de personas y personajes, así como el uso de comparaciones y \n								personificaciones; para ello, relaciona recursos verbales, no verbales y paraverbales, a partir del texto \n									oral y de su experiencia.', 1, 1),
(5, 'Adecúa su texto oral a la situación comunicativa, de acuerdo al propósito comunicativo, así como a las características más \n									comunes del género discursivo. Distingue el registro formal del informal recurriendo a su experiencia \n                                    y a algunas fuentes de información complementaria.', 1, 1),
(6, 'Expresa oralmente ideas y emociones en torno a un tema, de forma coherente y cohesionada. Ordena dichas ideas y \n								las desa-rrolla para ampliar la información sin reite-raciones innecesarias. Establece relaciones lógicas entre las \n								ideas (en especial, de causa-efecto y consecuencia), a través de algunos referentes y conectores. Incorpora un vocabulario \n                                que incluye sinónimos y algunos términos propios de los campos del saber.', 1, 1),
(7, 'Emplea gestos y movimientos corporales que enfatizan lo que dice. Mantiene contacto visual con sus interlocutores.\n									Se apoya en el volumen y la entonación de su voz para transmitir emociones, caracterizar personajes o dar claridad \n                                    a lo que dice.', 1, 1),
(8, 'Participa en diversos intercambios orales al-ternando roles de hablante y oyente, formulando preguntas, explicando \n								sus respuestas y haciendo comentarios relevantes al tema. Recurre a normas y modos de cortesía según el \n                                contexto sociocultural.', 1, 1),
(9, 'Opina como hablante y oyente sobre ideas, hechos y temas de los textos orales, del ámbito escolar, social o de medios \n								de comunicación, a partir de su experiencia y del con-texto en que se desenvuelve.', 1, 1),
(10, 'Identifica información explícita y relevante que se encuentra en distintas partes del texto. Distingue \n								esta información de otra seme-jante, en la que selecciona datos específicos, en diversos tipos de textos de estructura simple, \n                                con algunos elementos complejos , así como vocabulario variado, de acuerdo a las temáticas abordadas.', 1, 2),
(11, 'Deduce características implícitas de personajes, animales, objetos y lugares, y determina el significado \n								de palabras y frases según el contexto, así como de expresiones con sentido figurado (refranes, comparaciones, \n                                etc.). Establece relaciones lógicas de intención-finalidad y tema y subtema, a partir de información relevante \n                                explícita e implícita.', 1, 2),
(12, 'Predice de qué tratará el texto, a partir de algunos indicios como subtítulos, colores y dimensiones de las imágenes, \n						índice, tipo-grafía, negritas, subrayado, etc.; asimismo, contrasta la información del texto que lee.', 1, 2),
(13, 'Explica el tema, el propósito, las motivaciones de personas y personajes, las comparaciones y personificaciones, \n						así como las enseñanzas y los valores del texto, clasificando y sintetizando la información.', 1, 2),
(14, 'Opina acerca del contenido del texto, explica el sentido de algunos recursos textuales (uso de negritas, mayúsculas, \n						índice, tipografía, subrayado, etc.), a partir de su experiencia y contexto, y justifica sus preferencias cuando elige \n                        o recomienda textos según sus necesidades, intereses y su relación con otros textos, con el fin de reflexionar sobre los \n							textos que lee.', 1, 2),
(15, 'Adecúa el texto a la situación comunicativa considerando el propósito comunicativo, el destinatario y las características más co-munes del tipo textual. Distingue el registro formal del informal; \n					para ello, recurre a su experiencia y a algunas fuentes de informa-ción complementaria.', 1, 3),
(16, 'Escribe textos de forma coherente y cohesionada. Ordena las ideas en torno a un tema y las desarrolla para ampliar la información, sin contradicciones, reiteraciones innecesarias o digresiones. Establece relaciones entre las ideas, como adición, causa-efecto y consecuencia, a través de algunos referentes y conectores. \n					Incorpora un vocabulario que incluye sinónimos y algunos términos propios de los campos del saber.', 1, 3),
(17, 'Utiliza recursos gramaticales y ortográficos (por ejemplo, el punto seguido y las comas enumerativas) que contribuyen a dar sentido a su texto, e incorpora algunos recursos textuales (por ejemplo, el tamaño de la letra) para reforzar dicho sentido. Emplea compa-raciones y adjetivaciones para caracterizar personas, personajes y escenarios, y elabora rimas y juegos verbales apelando al \n					ritmo y la musicalidad de las palabras, con el fin de expresar sus experiencias y emociones.', 1, 3),
(18, 'Revisa el texto para determinar si se ajusta a la situación comunicativa, si existen contradicciones o reiteraciones innecesarias que afectan la coherencia entre las ideas, o si el uso de conectores y referentes asegura la cohesión entre ellas. También, revisa el uso de los recursos ortográficos que empleó en su texto y verifica si falta alguno (como el punto aparte), \n					con el fin de mejorarlo.', 1, 3),
(19, 'Explica el efecto de su texto en los lectores considerando su propósito al momento de escribirlo. Asimismo, explica la importancia de los aspectos gramaticales y \n					ortográficos más comunes.', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_desempenho_tema`
--

CREATE TABLE `tb_desempenho_tema` (
  `idTema` int(11) NOT NULL,
  `idDesempenho` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `idTarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_distrito`
--

CREATE TABLE `tb_distrito` (
  `idDistrito` int(11) NOT NULL,
  `desDistrito` varchar(40) DEFAULT NULL,
  `codigoPostal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_distrito`
--

INSERT INTO `tb_distrito` (`idDistrito`, `desDistrito`, `codigoPostal`) VALUES
(1, 'Villa María del Triunfo', 'LIMA35'),
(2, 'Villa El Salvador', 'LIMA42'),
(3, 'San Juan de Miraflores', 'LIMA29'),
(4, 'Chorrillos', 'LIMA09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_docente`
--

CREATE TABLE `tb_docente` (
  `idEspecialidad` int(11) NOT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `idDocente` int(11) NOT NULL,
  `idDistrito` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `fotoDocente` varchar(30) DEFAULT NULL,
  `apePat` varchar(30) DEFAULT NULL,
  `apeMat` varchar(30) DEFAULT NULL,
  `fecNac` date DEFAULT NULL,
  `fecIng` date DEFAULT NULL,
  `telfMovil` varchar(40) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telfFijo` varchar(40) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_docente`
--

INSERT INTO `tb_docente` (`idEspecialidad`, `observacion`, `estado`, `idDocente`, `idDistrito`, `dni`, `fotoDocente`, `apePat`, `apeMat`, `fecNac`, `fecIng`, `telfMovil`, `direccion`, `telfFijo`, `email`, `idUsuario`, `nombre`, `idGenero`) VALUES
(3, 'ninguno', 1, 1, 2, '10233775', 'foto1.jpg', 'Rojas', 'Rojas', '1975-07-14', '2018-02-20', '997130857', 'Av. Revolución 2312', '2870441', 'grankoki@gmail.com', 3, 'Jorge', 1),
(3, 'Bachiller en educación secundaria', 1, 2, 2, '10101010', NULL, 'Franco', 'Palacios', '1978-01-20', '2018-02-15', '927130844', 'Av. El Sol 1811', '4937042', 'lidiafranco@gmail.com', 4, 'Lidia', 2),
(2, 'Prof. de Danza y Educ. Física', 1, 3, 2, '20450524', NULL, 'Peralta', 'Palomino', '1978-01-20', '2018-02-15', '927130844', 'Av. El Sol 1811', '4937042', 'reynaperalta@gmail.com', 5, 'Reyna', 2),
(2, 'Especialista en Montessori', 1, 4, 1, '26450522', NULL, 'Salazar', 'Rojas', '1985-09-22', '2015-02-19', '787130861', 'Jr. Tacna 349', '3917141', 'fabianesaro@gmail.com', 6, 'Fabiane', 2),
(2, 'Especialista en matemática', 1, 5, 1, '21450509', NULL, 'Hinostroza', 'Amar', '1982-11-20', '2014-04-15', '957130861', 'Jr. Tacna 705', '4691994', 'nancyhinostroza@gmail.com', 7, 'Nancy', 2),
(2, 'Especialista en Comunicación', 1, 6, 1, '09745059', NULL, 'Cubas', 'Serrano', '1970-06-19', '2011-04-11', '957130861', 'Jr. Tacna 705', '4691994', 'luzcubas@gmail.com', 30, 'Luz', 2),
(2, 'Especialista en Primaria', 1, 7, 1, '10235011', NULL, 'ZulemaPat', 'ZulemaMat', '1990-06-19', '2019-04-11', '957130861', 'Jr. Tacna 705', '4691994', 'zulema@gmail.com', 31, 'Zulema', 2),
(2, 'Especialista en Primaria', 1, 8, 1, '10115088', NULL, 'GiocondaPat', 'GiocondaMat', '1985-10-11', '2020-04-17', '957130861', 'Jr. Tacna 705', '4691994', 'gioconda@gmail.com', 32, 'Gioconda', 2),
(2, 'Especialista en Primaria', 1, 9, 1, '13238011', NULL, 'CristalPat', 'CristalMat', '1991-10-02', '2018-04-12', '957130861', 'Jr. Tacna 705', '4691994', 'cristal@gmail.com', 33, 'Cristal', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emparejamiento`
--

CREATE TABLE `tb_emparejamiento` (
  `idEmparejamiento` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `pregunta` varchar(300) DEFAULT NULL,
  `respuesta` varchar(300) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `numeroPregunta` int(11) DEFAULT NULL,
  `numeroRespuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_especialidad`
--

CREATE TABLE `tb_especialidad` (
  `idEspecialidad` int(11) NOT NULL,
  `desEspecialidad` varchar(20) DEFAULT NULL,
  `estadoEspecialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_especialidad`
--

INSERT INTO `tb_especialidad` (`idEspecialidad`, `desEspecialidad`, `estadoEspecialidad`) VALUES
(1, 'Inicial', 1),
(2, 'Primaria', 1),
(3, 'Secundaria', 1),
(4, 'Auxiliar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estudiante`
--

CREATE TABLE `tb_estudiante` (
  `estadoEstudiante` tinyint(4) DEFAULT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idApoderado` int(11) NOT NULL,
  `dniEstudiante` varchar(8) NOT NULL,
  `fotoEstudiante` varchar(30) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `apePat` varchar(30) DEFAULT NULL,
  `apeMat` varchar(30) DEFAULT NULL,
  `idGenero` int(11) NOT NULL,
  `fecIngreso` date DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `fecNac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_estudiante`
--

INSERT INTO `tb_estudiante` (`estadoEstudiante`, `idEstudiante`, `idApoderado`, `dniEstudiante`, `fotoEstudiante`, `nombre`, `idUsuario`, `apePat`, `apeMat`, `idGenero`, `fecIngreso`, `observacion`, `fecNac`) VALUES
(1, 1, 1, '20740801', NULL, 'Zoe Isabella', 8, 'Alejo', 'Huaranca', 2, '2016-02-25', '', '2009-06-02'),
(1, 2, 2, '20740802', NULL, 'Mateo Salvador', 9, 'Aparicio', 'Rivera', 1, '2016-02-25', '', '2016-02-25'),
(1, 3, 3, '20740803', NULL, 'Adriano José', 10, 'Berrio', 'Herrera', 1, '2016-02-25', '', '2009-03-18'),
(1, 4, 4, '20740804', NULL, 'Domenika', 11, 'Bravo', 'Gonzales', 2, '2016-02-25', '', '2009-03-18'),
(1, 5, 5, '20740805', NULL, 'Víctor David', 12, 'Cardenas', 'Bellido', 1, '2016-02-25', '', '2009-03-18'),
(1, 6, 6, '20740806', NULL, 'Axel Mathias', 13, 'Chile', 'Pajuelo', 1, '2016-02-25', '', '2009-03-18'),
(1, 7, 7, '20740807', NULL, 'Adriana Sofía', 14, 'Córdova', 'Román', 2, '2016-02-25', '', '2009-03-18'),
(1, 8, 8, '20740808', NULL, 'Adrian Fabrisio', 15, 'Curo', 'Camposano', 1, '2016-02-25', '', '2009-03-18'),
(1, 9, 9, '20740809', NULL, 'Ariana', 16, 'Gaona', 'Durand', 2, '2016-02-25', '', '2009-03-18'),
(1, 10, 10, '20740810', NULL, 'Alesandro Piero', 17, 'García', 'Sebastián', 1, '2016-02-25', '', '2009-03-18'),
(1, 11, 11, '20740811', NULL, 'Jhair', 18, 'Gavidia', 'Alvarez', 1, '2016-02-25', '', '2009-03-18'),
(1, 12, 12, '20740812', NULL, 'Javier', 19, 'Huamanñahui', 'Abad', 1, '2016-02-25', '', '2009-03-18'),
(1, 13, 13, '20740813', NULL, 'Camila Valentina', 20, 'Lago', 'Contreras', 2, '2016-02-25', '', '2009-03-18'),
(1, 14, 14, '20740814', NULL, 'Luana', 21, 'León', 'Cabezas', 2, '2016-02-25', '', '2009-03-18'),
(1, 15, 15, '20740815', NULL, 'Ana Paula', 22, 'Miranda', 'Huamán', 2, '2016-02-25', '', '2009-03-18'),
(1, 16, 16, '20740816', NULL, 'Andrew', 23, 'Pianto', 'Portilla', 1, '2016-02-25', '', '2009-03-18'),
(1, 17, 17, '20740817', NULL, 'Tatiana', 24, 'Prado', 'Franco', 2, '2016-02-25', '', '2009-03-18'),
(1, 18, 18, '20740818', NULL, 'Roy David Leonardo', 25, 'Sotomayor', 'Pirgo', 1, '2016-02-25', '', '2009-03-18'),
(1, 19, 19, '20740819', NULL, 'Eymi Lee', 26, 'Villanueva', 'Nuñez', 2, '2016-02-25', '', '2009-03-18'),
(1, 20, 20, '20740820', NULL, 'Mayra Ximena', 27, 'Zapata', 'Quispe', 2, '2016-02-25', '', '2009-03-18'),
(1, 21, 21, '20740821', NULL, 'André Alexander', 34, 'Aiquipa', 'Quispe', 1, '2016-02-25', '', '2009-03-18'),
(1, 22, 22, '20740822', NULL, 'Renato', 35, 'Amar', 'Gutierrez', 1, '2016-02-25', '', '2009-03-18'),
(1, 23, 23, '20740823', NULL, 'Gabriel', 36, 'Bellido', 'Erasmo', 1, '2016-02-25', '', '2009-03-18'),
(1, 24, 24, '20740824', NULL, 'Raphaella Alexia', 37, 'Cano', 'Cuyo', 2, '2016-02-25', '', '2009-03-18'),
(1, 25, 25, '20740825', NULL, 'Fabián Dario', 38, 'Franco', 'Villegas', 1, '2016-02-25', '', '2009-03-18'),
(1, 26, 26, '20740826', NULL, 'Dean Kevin', 39, 'Irazabal', 'Rojas', 1, '2016-02-25', '', '2009-03-18'),
(1, 27, 27, '20740827', NULL, 'Adriano Jofiel', 40, 'Machado', 'Zúñiga', 1, '2016-02-25', '', '2009-03-18'),
(1, 28, 28, '20740828', NULL, 'Mathias Rodrigo', 41, 'Mamani', 'Barazorda', 1, '2016-02-25', '', '2009-03-18'),
(1, 29, 29, '20740829', NULL, 'Kiara Luana', 42, 'Morocho', 'Siccha', 2, '2016-02-25', '', '2009-03-18'),
(1, 30, 30, '20740830', NULL, 'Mauricio Jesús', 43, 'Munarriz', 'Huamacto', 1, '2016-02-25', '', '2009-03-18'),
(1, 31, 31, '20740831', NULL, 'Fabian Eloy', 44, 'Rujel', 'Mucha', 1, '2016-02-25', '', '2009-03-18'),
(1, 32, 32, '20740832', NULL, 'José Miguel', 45, 'Sandoval', 'Rojas', 1, '2016-02-25', '', '2009-03-18'),
(1, 33, 33, '20740833', NULL, 'Gianluka Nikola', 46, 'Amoreti', 'Leiva', 2, '2016-02-25', '', '2009-03-18'),
(1, 34, 22, '20740834', NULL, 'Luz', 47, 'Amar', 'Gutiérrez', 2, '2016-02-25', '', '2009-03-18'),
(1, 35, 34, '20740835', NULL, 'Romina Estephany', 48, 'Becerra', 'Rojas', 2, '2016-02-25', '', '2009-03-18'),
(1, 36, 24, '20740836', NULL, 'Bianca Nathalie', 49, 'Cano', 'Cuyo', 1, '2016-02-25', '', '2009-03-18'),
(1, 37, 35, '20740837', NULL, 'Sammi Yuriko', 50, 'Ccenta', 'Amar', 2, '2016-02-25', '', '2009-03-18'),
(1, 38, 36, '20740839', NULL, 'Thiago Alexander', 51, 'Chile', 'Pajuelo', 1, '2016-02-25', '', '2009-03-18'),
(1, 39, 37, '20740839', NULL, 'Jorge André', 52, 'Chilquillo', 'Ovalle', 2, '2016-02-25', '', '2009-03-18'),
(1, 40, 38, '20740840', NULL, 'Joaquín Dario', 53, 'Coronel', 'Ferreyros', 2, '2016-02-25', '', '2009-03-18'),
(1, 41, 39, '20740841', NULL, 'Allison Jhoseana', 54, 'De La Cruz', 'Loayza', 1, '2016-02-25', '', '2009-03-18'),
(1, 42, 40, '20740842', NULL, 'Jazmin Joselin', 55, 'Gavidia', 'Alvarez', 1, '2016-02-25', '', '2009-03-18'),
(1, 43, 41, '20740843', NULL, 'Jandi Sayuri', 56, 'Gomez', 'Mejia', 1, '2016-02-25', '', '2009-03-18'),
(1, 44, 42, '20740844', NULL, 'Olenka Valentina', 57, 'Hinostroza', 'Rabanal', 2, '2016-02-25', '', '2009-03-18'),
(1, 45, 43, '20740845', NULL, 'Luis Adriano', 58, 'Huamaní', 'Chávez', 1, '2016-02-25', '', '2009-03-18'),
(1, 46, 44, '20740846', NULL, 'Nesta Gustavo', 59, 'Mendoza', 'Palomino', 1, '2016-02-25', '', '2009-03-18'),
(1, 47, 45, '20740847', NULL, 'Mathias Aldair', 60, 'Molina', 'Elias', 1, '2016-02-25', '', '2009-03-18'),
(1, 48, 46, '20740848', NULL, 'Jayana Evolet', 61, 'Paredes', 'Quispe', 1, '2016-02-25', '', '2009-03-18'),
(1, 49, 47, '20740849', NULL, 'Thiago Gabriel', 62, 'Rosas', 'Viviano', 2, '2016-02-25', '', '2009-03-18'),
(1, 50, 48, '20740850', NULL, 'Jhaley Paolo', 63, 'Solis', 'Quispe', 1, '2016-02-25', '', '2009-03-18'),
(1, 51, 49, '20740851', NULL, 'Luis Mario', 64, 'Tirado', 'Quispe', 1, '2016-02-25', '', '2009-03-18'),
(1, 52, 50, '20740852', NULL, 'Cristofer Benjamin', 65, 'Torres', 'Hinostroza', 1, '2016-02-25', '', '2009-03-18'),
(1, 53, 51, '20740853', NULL, 'Maria Fernanda Edurne', 66, 'Aponte', 'Castillo', 2, '2016-02-25', '', '2009-03-18'),
(1, 54, 52, '20740854', NULL, 'Antonio David', 67, 'Cotera', 'Nina', 1, '2016-02-25', '', '2009-03-18'),
(1, 55, 53, '20740855', NULL, 'Christopher Nicolás', 68, 'Custodio', 'Quintanilla', 1, '2016-02-25', '', '2009-03-18'),
(1, 56, 54, '20740856', NULL, 'Angely Norma', 69, 'Huaranca', 'Gutiérrez', 2, '2016-02-25', '', '2009-03-18'),
(1, 57, 55, '20740857', NULL, 'Luciana', 70, 'León', 'Cabezas', 2, '2016-02-25', '', '2009-03-18'),
(1, 58, 56, '20740858', NULL, 'Fernando Benjamín', 71, 'Pedraza', 'Claudio', 1, '2016-02-25', '', '2009-03-18'),
(1, 59, 57, '20740859', NULL, 'Leonardo Fabiano', 72, 'Santos', 'García', 1, '2016-02-25', '', '2009-03-18'),
(1, 60, 58, '20740860', NULL, 'Ariana Alejandra', 73, 'Salas', 'Rojas', 2, '2016-02-25', '', '2009-03-18'),
(1, 61, 59, '20740861', NULL, 'Pedro Mathías Ramsés', 74, 'Urbano', 'Aragón', 1, '2016-02-25', '', '2009-03-18'),
(1, 62, 60, '20740862', NULL, 'Lukas Luciano', 75, 'Aureliano', 'Bernal', 1, '2016-02-25', '', '2009-03-18'),
(1, 63, 24, '20740863', NULL, 'Jhon Benjamín', 76, 'Cano', 'Cuyo', 1, '2016-02-25', '', '2009-03-18'),
(1, 64, 38, '20740864', NULL, 'Ana Paola', 77, 'Coronel', 'Ferreyros', 2, '2016-02-25', '', '2009-03-18'),
(1, 65, 61, '20740865', NULL, 'Álvaro Ernesto', 78, 'Dueñas', 'Quispe', 1, '2016-02-25', '', '2009-03-18'),
(1, 66, 62, '20740866', NULL, 'Alejandro Agustín', 79, 'Flores', 'Alvarez', 1, '2016-02-25', '', '2009-03-18'),
(1, 67, 63, '20740867', NULL, 'Ivanna Victoria', 80, 'Flores', 'Chancahuaña', 2, '2016-02-25', '', '2009-03-18'),
(1, 68, 64, '20740868', NULL, 'Samantha Ariana', 81, 'Guido', 'Del Águila', 2, '2016-02-25', '', '2009-03-18'),
(1, 69, 43, '20740869', NULL, 'Luana Katrina', 82, 'Huamaní', 'Chávez', 2, '2016-02-25', '', '2009-03-18'),
(1, 70, 65, '20740870', NULL, 'Gael Alexander', 83, 'Mauriola', 'Parave', 1, '2016-02-25', '', '2009-03-18'),
(1, 71, 66, '20740871', NULL, 'Micaela Belén', 84, 'Jiménez', 'Pedraza', 2, '2016-02-25', '', '2009-03-18'),
(1, 72, 67, '20740872', NULL, 'Gabriel Gerardo', 85, 'Napanga', 'Avila', 1, '2016-02-25', '', '2009-03-18'),
(1, 73, 68, '20740873', NULL, 'Liam Adriano', 86, 'Ovalle', 'Gonzales', 1, '2016-02-25', '', '2009-03-18'),
(1, 74, 69, '20740874', NULL, 'Valeria Malena', 87, 'Paredes', 'Díaz', 2, '2016-02-25', '', '2009-03-18'),
(1, 75, 70, '20740875', NULL, 'Yhariel Nicolás', 88, 'Peña', 'Córdova', 1, '2016-02-25', '', '2009-03-18'),
(1, 76, 71, '20740876', NULL, 'Alexandra Valentina', 89, 'Pérez', 'Guzmán', 2, '2016-02-25', '', '2009-03-18'),
(1, 77, 72, '20740877', NULL, 'Alexa Valentina', 90, 'Ramirez', 'Arias', 2, '2016-02-25', '', '2009-03-18'),
(1, 78, 73, '20740878', NULL, 'Pedro Amir', 91, 'Rojas', 'Morán', 1, '2016-02-25', '', '2009-03-18'),
(1, 79, 74, '20740879', NULL, 'Thiagio Valentino', 92, 'Tornero', 'Yauri', 1, '2016-02-25', '', '2009-03-18'),
(1, 80, 75, '20740880', NULL, 'Tatiana Yasmin', 93, 'Cadenillas', 'Loayza', 2, '2024-02-25', '', '2009-03-18'),
(1, 81, 76, '20740881', NULL, 'José Gabriel', 94, 'Salcedo', 'Loayza', 1, '2024-02-25', '', '2009-03-18'),
(1, 82, 77, '20740882', NULL, 'Emilhie Susanne', 95, 'Sanchez', 'Morales', 2, '2024-02-25', '', '2009-03-18'),
(1, 83, 78, '20740883', NULL, 'Anahi Alejandra', 96, 'Cardenas', 'Perez', 2, '2024-02-25', '', '2009-03-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_evaluacion`
--

CREATE TABLE `tb_evaluacion` (
  `idEvaluacion` int(11) NOT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `fechaInicio` datetime DEFAULT NULL,
  `fechaTermino` datetime DEFAULT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL,
  `limiteTiempo` int(11) DEFAULT NULL,
  `idTema` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_evaluacion`
--

INSERT INTO `tb_evaluacion` (`idEvaluacion`, `fechaCreacion`, `fechaInicio`, `fechaTermino`, `titulo`, `descripcion`, `intentos`, `limiteTiempo`, `idTema`, `estado`) VALUES
(1, '2024-03-13 12:35:38', '2024-03-14 09:20:00', '2024-03-14 10:30:00', 'Evaluación de entrada', 'Conceptos básicos de informática, lee detenidamente y contesta las preguntas.', 2, 70, 90, 1),
(2, '2024-02-18 11:46:17', '2024-02-18 11:50:00', '2024-02-18 20:20:00', 'Importancia de la computadora', 'Desarrolle la evaluacion tema 2', 2, 510, 91, 0),
(3, '2024-08-03 11:13:37', '2024-04-25 11:30:00', '2024-04-25 13:00:00', 'borrame El lenguaje de etiquetas HTML', 'Repasa las fichas de los temas del lenguaje html y desarrolla la evaluación.', 2, 90, 92, 0),
(4, '2024-08-03 11:13:46', '2024-01-30 11:00:00', '2024-01-30 11:30:00', 'borrame Prueba ', 'fasfasf', 2, 30, 93, 1),
(5, '2024-06-27 10:16:49', '2024-06-27 10:35:00', '2024-06-27 13:55:00', 'Etiquetas de la estructura html', 'Evaluación etiquetas de la estructura html', 1, 200, 94, 1),
(6, '2024-03-13 12:20:17', '2024-03-14 08:00:00', '2024-03-14 08:30:00', 'Evaluacion de entrada', 'Conceptos básicos de informática, lee detenidamente y contesta las preguntas.', 2, 30, 106, 1),
(7, '2024-05-08 18:28:27', '2024-05-09 09:15:00', '2024-05-09 10:00:00', 'El sistema operativo', 'Lee atentamente las preguntas y contesta', 1, 45, 108, 1),
(8, '2024-07-04 09:28:41', '2024-07-04 09:28:00', '2024-07-04 09:45:00', 'Dispositivos de entrada y salida', 'Lee atentamente las preguntas y contesta', 1, 17, 111, 1),
(9, '2024-07-18 12:38:59', '2024-07-18 12:30:00', '2024-07-18 12:50:00', 'Estructura de la etiqueta frame', 'Lee atentamente las preguntas y contesta según corresponde', 1, 20, 96, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_evaluacion_estudiante`
--

CREATE TABLE `tb_evaluacion_estudiante` (
  `idEvaluacion` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `puntajeTotal` decimal(4,2) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_evaluacion_estudiante`
--

INSERT INTO `tb_evaluacion_estudiante` (`idEvaluacion`, `idEstudiante`, `puntajeTotal`, `fechaRegistro`, `intentos`) VALUES
(1, 33, NULL, NULL, 2),
(1, 34, 9.00, '2024-03-14 09:30:58', 1),
(1, 35, 11.00, '2024-03-14 09:57:44', 1),
(1, 36, 10.00, '2024-03-14 09:56:08', 1),
(1, 37, 10.00, '2024-03-14 09:29:41', 1),
(1, 38, 11.00, '2024-03-14 09:57:38', 1),
(1, 39, 16.00, '2024-03-14 09:56:41', 1),
(1, 40, 12.00, '2024-03-14 09:54:19', 1),
(1, 41, 9.50, '2024-03-14 09:29:54', 1),
(1, 42, 11.00, '2024-03-14 09:58:25', 1),
(1, 43, 11.50, '2024-03-14 09:32:03', 1),
(1, 44, 13.00, '2024-03-14 09:40:10', 1),
(1, 45, 11.50, '2024-03-14 09:56:01', 1),
(1, 46, 6.00, '2024-03-14 09:30:10', 1),
(1, 47, 7.00, '2024-03-14 09:54:23', 1),
(1, 48, 13.50, '2024-03-14 09:56:41', 1),
(1, 49, 5.50, '2024-03-14 09:29:33', 1),
(1, 50, 8.00, '2024-03-14 09:31:59', 1),
(1, 51, 14.50, '2024-03-14 09:29:14', 1),
(1, 52, NULL, NULL, 2),
(2, 33, NULL, NULL, 2),
(2, 34, NULL, NULL, 2),
(2, 35, NULL, NULL, 2),
(2, 36, NULL, NULL, 2),
(2, 37, NULL, NULL, 2),
(2, 38, NULL, NULL, 2),
(2, 39, NULL, NULL, 2),
(2, 40, NULL, NULL, 2),
(2, 41, NULL, NULL, 2),
(2, 42, NULL, NULL, 2),
(2, 43, NULL, NULL, 2),
(2, 44, NULL, NULL, 2),
(2, 45, NULL, NULL, 2),
(2, 46, NULL, NULL, 2),
(2, 47, NULL, NULL, 2),
(2, 48, NULL, NULL, 2),
(2, 49, NULL, NULL, 2),
(2, 50, NULL, NULL, 2),
(2, 51, NULL, NULL, 2),
(2, 52, NULL, NULL, 2),
(5, 33, 12.00, '2024-06-27 12:30:57', 1),
(5, 34, 12.00, '2024-06-27 11:47:25', 0),
(5, 35, 10.00, '2024-06-27 12:30:24', 1),
(5, 36, 12.00, '2024-06-27 12:30:42', 1),
(5, 37, 20.00, '2024-06-27 11:45:39', 1),
(5, 38, 14.00, '2024-06-27 12:30:22', 1),
(5, 39, 8.00, '2024-06-27 12:31:09', 1),
(5, 40, 10.00, '2024-06-27 12:30:12', 1),
(5, 41, 4.00, '2024-06-27 11:46:59', 1),
(5, 42, 16.00, '2024-06-27 12:31:18', 1),
(5, 43, 8.00, '2024-06-27 11:47:07', 1),
(5, 44, 8.00, '2024-06-27 11:45:31', 1),
(5, 45, NULL, NULL, 2),
(5, 46, 10.00, '2024-06-27 11:46:42', 1),
(5, 47, 8.00, '2024-06-27 12:30:30', 1),
(5, 48, 10.00, '2024-06-27 12:30:20', 1),
(5, 49, 8.00, '2024-06-27 11:45:40', 1),
(5, 50, 6.00, '2024-06-27 11:47:35', 1),
(5, 51, 10.00, '2024-06-27 11:45:19', 1),
(5, 52, 10.00, '2024-06-27 11:46:31', 1),
(6, 53, 9.00, '2024-03-14 08:15:52', 1),
(6, 54, 15.50, '2024-03-14 08:14:47', 1),
(6, 55, 17.00, '2024-03-14 08:12:45', 1),
(6, 56, 12.00, '2024-03-14 08:16:15', 1),
(6, 57, NULL, NULL, 2),
(6, 58, NULL, NULL, 2),
(6, 61, 16.50, '2024-03-14 08:16:32', 0),
(6, 80, 10.50, '2024-03-14 08:17:48', 0),
(6, 81, 15.50, '2024-03-14 08:13:03', 1),
(6, 82, 12.00, '2024-03-14 08:16:06', 1),
(7, 53, 20.00, '2024-05-09 09:23:38', 0),
(7, 54, 18.00, '2024-05-09 09:22:05', 0),
(7, 55, 20.00, '2024-05-09 09:21:47', 0),
(7, 56, 7.00, '2024-05-09 09:23:55', 0),
(7, 57, 17.00, '2024-05-09 09:23:42', 0),
(7, 58, 14.00, '2024-05-09 09:23:36', 0),
(7, 61, 10.00, '2024-05-09 09:23:01', 0),
(7, 80, 5.00, '2024-05-09 09:23:16', 0),
(7, 81, 20.00, '2024-05-09 09:22:25', 0),
(7, 82, 14.00, '2024-05-09 09:22:58', 0),
(8, 53, 20.00, '2024-07-04 09:32:00', 0),
(8, 54, 15.00, '2024-07-04 09:32:24', 0),
(8, 55, NULL, NULL, 1),
(8, 56, 5.50, '2024-07-04 09:31:51', 0),
(8, 57, 9.00, '2024-07-04 09:34:50', 0),
(8, 58, 16.00, '2024-07-04 09:36:05', 0),
(8, 61, NULL, NULL, 1),
(8, 80, 11.00, '2024-07-04 09:32:49', 0),
(8, 81, 12.50, '2024-07-04 09:33:02', 0),
(8, 82, NULL, NULL, 1),
(9, 33, 4.00, '2024-07-18 12:42:55', 0),
(9, 34, 17.00, '2024-07-18 11:37:00', 0),
(9, 35, NULL, NULL, 1),
(9, 36, 4.00, '2024-07-18 12:42:02', 0),
(9, 37, 15.00, '2024-07-18 11:35:59', 0),
(9, 38, 10.00, '2024-07-18 12:42:52', 0),
(9, 39, 8.00, '2024-07-18 12:40:52', 0),
(9, 40, 19.00, '2024-07-18 12:40:34', 0),
(9, 41, 12.00, '2024-07-18 11:35:40', 0),
(9, 42, 12.00, '2024-07-18 12:46:29', 0),
(9, 43, 8.00, '2024-07-18 11:37:48', 0),
(9, 44, 15.00, '2024-07-18 11:36:39', 0),
(9, 45, 8.00, '2024-07-18 12:42:10', 0),
(9, 46, 6.00, '2024-07-18 11:35:19', 0),
(9, 47, 13.00, '2024-07-18 12:42:19', 0),
(9, 48, NULL, NULL, 1),
(9, 49, 0.00, '2024-07-18 11:35:53', 0),
(9, 50, 16.00, '2024-07-18 11:39:25', 0),
(9, 51, 14.00, '2024-07-18 11:38:23', 0),
(9, 52, 6.00, '2024-07-18 11:34:55', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_genero`
--

CREATE TABLE `tb_genero` (
  `idGenero` int(11) NOT NULL,
  `desGenero` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_genero`
--

INSERT INTO `tb_genero` (`idGenero`, `desGenero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_grado`
--

CREATE TABLE `tb_grado` (
  `idGrado` int(11) NOT NULL,
  `desGrado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_grado`
--

INSERT INTO `tb_grado` (`idGrado`, `desGrado`) VALUES
(1, 'Inicial II'),
(2, 'Inicial III'),
(3, 'Inicial IV'),
(4, 'Inicial V'),
(5, '1ro Primaria'),
(6, '2do Primaria'),
(7, '3er Primaria'),
(8, '4to Primaria'),
(9, '5to Primaria'),
(10, '6to Primaria'),
(11, '1ro Secundaria'),
(12, '2do Secundaria'),
(13, '3ro Secundaria'),
(14, '4to Secundaria'),
(15, '5to Secundaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informe_acad`
--

CREATE TABLE `tb_informe_acad` (
  `idInforme` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informe_comport`
--

CREATE TABLE `tb_informe_comport` (
  `idInformeComport` int(11) NOT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `idDocente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inf_acad_estudiante`
--

CREATE TABLE `tb_inf_acad_estudiante` (
  `idInforme` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inf_psicologico`
--

CREATE TABLE `tb_inf_psicologico` (
  `idInformePsicologico` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idPsicologo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_material_repaso`
--

CREATE TABLE `tb_material_repaso` (
  `idMaterialRepaso` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `direccionUrl` varchar(300) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_matricula`
--

CREATE TABLE `tb_matricula` (
  `idSeccion` int(11) NOT NULL,
  `fecMatricula` date DEFAULT NULL,
  `idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_matricula`
--

INSERT INTO `tb_matricula` (`idSeccion`, `fecMatricula`, `idEstudiante`) VALUES
(36, '2023-02-11', 62),
(36, '2023-02-11', 63),
(36, '2023-02-12', 64),
(36, '2023-02-13', 65),
(36, '2023-02-13', 66),
(36, '2023-02-14', 67),
(36, '2023-02-14', 68),
(36, '2023-02-14', 69),
(36, '2023-02-15', 70),
(36, '2023-02-15', 71),
(36, '2023-02-18', 72),
(36, '2023-02-18', 73),
(36, '2023-02-18', 74),
(36, '2023-02-19', 75),
(36, '2023-02-21', 76),
(36, '2023-02-21', 77),
(36, '2023-02-21', 78),
(36, '2023-02-24', 79),
(38, '2023-02-11', 53),
(38, '2023-02-11', 54),
(38, '2023-02-12', 55),
(38, '2023-02-13', 56),
(38, '2023-02-13', 57),
(38, '2023-02-14', 58),
(38, '2023-02-14', 59),
(38, '2023-02-14', 60),
(38, '2023-02-15', 61),
(39, '2023-02-11', 33),
(39, '2023-02-11', 34),
(39, '2023-02-12', 35),
(39, '2023-02-13', 36),
(39, '2023-02-13', 37),
(39, '2023-02-14', 38),
(39, '2023-02-14', 39),
(39, '2023-02-14', 40),
(39, '2023-02-15', 41),
(39, '2023-02-15', 42),
(39, '2023-02-18', 43),
(39, '2023-02-18', 44),
(39, '2023-02-18', 45),
(39, '2023-02-19', 46),
(39, '2023-02-21', 47),
(39, '2023-02-21', 48),
(39, '2023-02-21', 49),
(39, '2023-02-24', 50),
(39, '2023-02-25', 51),
(39, '2023-02-26', 52),
(40, '2023-02-11', 21),
(40, '2023-02-11', 22),
(40, '2023-02-12', 23),
(40, '2023-02-13', 24),
(40, '2023-02-13', 25),
(40, '2023-02-14', 26),
(40, '2023-02-14', 27),
(40, '2023-02-14', 28),
(40, '2023-02-15', 29),
(40, '2023-02-15', 30),
(40, '2023-02-18', 31),
(40, '2023-02-18', 32),
(50, '2024-02-11', 62),
(50, '2024-02-11', 63),
(50, '2024-02-11', 64),
(50, '2024-02-11', 65),
(50, '2024-02-11', 66),
(50, '2024-02-11', 67),
(50, '2024-02-11', 68),
(50, '2024-02-11', 69),
(50, '2024-02-11', 73),
(50, '2024-02-11', 74),
(50, '2024-02-11', 75),
(50, '2024-02-11', 77),
(50, '2024-02-11', 78),
(50, '2024-02-11', 79),
(50, '2024-02-11', 83),
(51, '2024-02-11', 53),
(51, '2024-02-11', 54),
(51, '2024-02-11', 55),
(51, '2024-02-11', 56),
(51, '2024-02-11', 57),
(51, '2024-02-11', 58),
(51, '2024-02-11', 61),
(51, '2024-02-11', 80),
(51, '2024-02-11', 81),
(51, '2024-02-11', 82),
(52, '2024-02-11', 33),
(52, '2024-02-11', 34),
(52, '2024-02-12', 35),
(52, '2024-02-13', 36),
(52, '2024-02-13', 37),
(52, '2024-02-14', 38),
(52, '2024-02-14', 39),
(52, '2024-02-14', 40),
(52, '2024-02-15', 41),
(52, '2024-02-15', 42),
(52, '2024-02-18', 43),
(52, '2024-02-18', 44),
(52, '2024-02-18', 45),
(52, '2024-02-19', 46),
(52, '2024-02-21', 47),
(52, '2024-02-21', 48),
(52, '2024-02-21', 49),
(52, '2024-02-24', 50),
(52, '2024-02-25', 51),
(52, '2024-02-26', 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_numerica`
--

CREATE TABLE `tb_numerica` (
  `idNumerica` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` decimal(9,3) DEFAULT NULL,
  `retroalimentacion` varchar(300) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `valorMinimo` decimal(9,2) DEFAULT NULL,
  `valorMaximo` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_opcion_multiple`
--

CREATE TABLE `tb_opcion_multiple` (
  `idOpcionMultiple` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `cantOpciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_opcion_multiple`
--

INSERT INTO `tb_opcion_multiple` (`idOpcionMultiple`, `idPregunta`, `cantOpciones`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 9, 1),
(8, 10, 2),
(9, 11, 2),
(10, 12, 1),
(11, 13, 2),
(12, 14, 2),
(13, 15, 1),
(14, 19, 2),
(15, 23, 2),
(16, 24, 1),
(17, 25, 1),
(18, 26, 1),
(19, 30, 1),
(20, 31, 2),
(21, 32, 1),
(22, 33, 1),
(23, 34, 1),
(24, 37, 1),
(25, 40, 1),
(26, 41, 1),
(27, 42, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_periodo_acad`
--

CREATE TABLE `tb_periodo_acad` (
  `idPeriodo` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_periodo_acad`
--

INSERT INTO `tb_periodo_acad` (`idPeriodo`, `descripcion`, `fecha`) VALUES
(1, 'Primer Trimestre', '2021-02-19'),
(2, 'Segundo Trimestre', '2021-02-19'),
(3, 'Tercer Trimestre', '2021-02-19'),
(4, 'Primer Trimestre', '2022-02-17'),
(5, 'Segundo Trimestre', '2022-02-17'),
(6, 'Tercer Trimestre', '2022-02-17'),
(7, 'Primer Bimestre', '2023-01-17'),
(8, 'Segundo Bimestre', '2023-01-17'),
(9, 'Tercer Bimestre', '2023-01-17'),
(10, 'Cuarto Bimestre', '2023-01-17'),
(11, 'Primer Bimestre', '2024-01-17'),
(12, 'Segundo Bimestre', '2024-01-17'),
(13, 'Tercer Bimestre', '2024-01-17'),
(14, 'Cuarto Bimestre', '2024-01-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pregunta`
--

CREATE TABLE `tb_pregunta` (
  `idPregunta` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `nombrePregunta` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `enunciado` varchar(300) DEFAULT NULL,
  `idTipoPregunta` int(11) NOT NULL,
  `imgPregunta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_pregunta`
--

INSERT INTO `tb_pregunta` (`idPregunta`, `idTema`, `nombrePregunta`, `estado`, `enunciado`, `idTipoPregunta`, `imgPregunta`) VALUES
(1, 90, 'Iniciando el sistema operativo', 1, 'Cuando enciendes la computadora y esta iniciando debemos:', 1, NULL),
(2, 90, 'Riesgos de beber liquidos al usar la computadora', 1, 'Al momento de usar la computadora se recomienda', 1, NULL),
(3, 90, 'Reconozco la tecla ENTER', 1, 'Reconoce la imagen mostrada y selecciona las alternativas correctas', 1, 'tecla ENTER.png'),
(4, 90, 'Reconozco la tecla SHIFT', 1, 'Observa y reconoce la imagen, marca las alternativas correctas', 1, 'tecla SHIFT.png'),
(5, 90, 'Ejecutar explorador de archivos', 1, 'Observa la imagen mostrada y selecciona las alternativas correctas', 1, 'tecla WindowsE.png'),
(6, 90, 'Reconozco el explorador de archivos', 1, 'QuÃ© representa el Ã­cono mostrado en la imagen, selecciona las alternativas correctas', 1, 'icono ExpArch.jpg'),
(7, 90, 'El hardware concepto', 1, 'El hardware es la parte de la computadora que podemos tocar como por ejemplo el mouse', 2, NULL),
(8, 90, 'El software principal de la computadora', 1, 'El software principal de la computadora es el Sistema Operativo como por ejemplo el Windows, Linux, OS2 o Android.', 2, NULL),
(9, 90, 'El software definiciÃ³n', 1, 'El software de la computadora es:', 1, NULL),
(10, 90, 'el software ejemplos', 1, 'Selecciona los que representan a un software de la computadora', 1, NULL),
(11, 106, 'Reconozco la tecla ENTER', 1, 'Reconoce la imagen mostrada y selecciona las alternativas correctas', 1, 'tecla ENTER.png'),
(12, 106, 'Peligros al beber lÃ­quidos junto a la computadora', 1, 'Al momento de usar la computadora se recomienda tener el cuidado de', 1, NULL),
(13, 106, 'Ejecutar explorador de archivos con acceso rapido', 1, 'Observa la imagen mostrada y selecciona las alternativas correctas', 1, 'tecla WindowsE.png'),
(14, 106, 'Reconozco el explorador de archivos', 1, 'Que representa el icono mostrado en la imagen, selecciona las alternativas correctas', 1, 'icono ExpArch.jpg'),
(15, 106, 'Que es el software', 1, 'El software de la computadora es:', 1, NULL),
(16, 106, 'El software ejemplos', 1, 'La aplicacion Microsoft Word es una software', 2, NULL),
(17, 106, 'Reconozco el icono de los documentos', 1, 'La imagen que se muestra es la aplicacion Microsoft Word', 2, 'documento de Word.png'),
(18, 106, 'Reconozco el icono de power point', 1, 'La imagen que se muestra es un hardware de la computadora', 2, 'PowerPoint.png'),
(19, 106, 'Reconozco la hoja de calculo', 1, 'Reconoce la imagen mostrada y selecciona las alternativas correctas', 1, 'excel.png'),
(20, 92, 'Etiquetas básicas de la estructura html', 1, 'Las etiquetas básicas de la estructura HTML son 4: HTML - HEAD- TITLE y BODY', 2, NULL),
(21, 92, 'Qué es el Lenguaje HTML ', 1, 'El lenguaje html es un lenguaje de marcado (etiquetas) que sirve para crear páginas web.', 2, NULL),
(22, 93, 'La etiqueta br en html', 1, 'La etiqueta BR sirve para dejar un espacio en blanco', 2, NULL),
(23, 108, 'Definición del sistema operativo', 1, 'Selecciona las alternativas correctas \"El sistema operativo es...\"', 1, NULL),
(24, 108, 'Reconozco el sistema operativo Android', 1, 'Observa la imagen y selecciona la alternativa correcta', 1, 'android.jpeg'),
(25, 109, 'aaa', 1, 'aaa', 1, 'documento de Word.png'),
(26, 109, 'Reconocer la capacidad de almacenamiento del CPU', 1, 'Identifica la capacidad total de almacenamiento del disco duro y selecciona la alternativa correcta', 1, 'almacenamiento.png'),
(27, 109, 'Donde se guardan los archivos descargados', 1, 'Cuando descargas una imagen, foto, o documento a la computadora se almacena en el disco duro', 2, NULL),
(28, 94, 'Reconozco al atributo align', 1, 'La imagen muestra el uso correcto de la alineación al centro', 2, 'atributo align BAD.png'),
(29, 94, 'Estructura básica del html', 1, 'La imagen muestra correctamente el uso de las etiquetas básicas del html', 2, 'estructurahtmlBAD.png'),
(30, 98, 'Etiquetas de la estructura de la tabla html', 1, 'Observa la imagen y selecciona la alternativa correcta', 1, 'table 2x2.png'),
(31, 110, 'Ejemplos de dispositivos de entrada', 1, 'Selecciona los dispositivos de entrada', 1, NULL),
(32, 110, 'El mouse dispositivo de entrada', 1, 'Observa la imagen y selecciona la alternativa correcta', 1, 'mouse.jpeg'),
(33, 111, 'Memoria USB dispositivo de almacenamiento', 1, 'Observa la imagen y selecciona la alternativa correcta', 1, 'memoriaUSB.jpeg'),
(34, 111, 'El cd-rom dispositivo de almacenamiento', 1, 'Observa la imagen y selecciona la alternativa correcta', 1, 'cdrom.jpeg'),
(35, 110, 'Impresora dispositivo de salida', 1, 'La imagen muestra a un dispositivo de salida', 2, 'impresora.jpeg'),
(36, 113, 'Entrada proceso y salida', 1, 'La imagen muestra el sistema de proceso de la computadora', 2, 'EPS fake.png'),
(37, 111, 'Convertir un número entero a binario', 1, 'Selecciona el valor binario del número 8', 1, NULL),
(38, 111, 'Disco duro dispositivo de almacenamiento', 1, 'La imagen muestra el disco duro y es un dispositivo de entrada', 2, 'discoduro.jpeg'),
(39, 96, 'Reconozco la estructura frame del html', 1, 'La imagen muestra el uso correcto de la estructura FRAME ', 2, 'estructura frame FAKE.png'),
(40, 96, 'Etiqueta frame y su atributo row', 1, 'En la imagen el texto sombreado de azul representa:', 1, 'frame atributo row.png'),
(41, 96, 'Etiqueta frame y su atributo src', 1, 'En la imagen el texto seleccionado de azul sirve', 1, 'etiqueta frame atributo SRC.png'),
(42, 94, 'Reconozco la etiqueta img del html', 1, 'En la imagen la etiqueta sombreada de azul sirve para:', 1, 'etiqueta img.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pregunta_evaluacion`
--

CREATE TABLE `tb_pregunta_evaluacion` (
  `idEvaluacion` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `puntaje` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_pregunta_evaluacion`
--

INSERT INTO `tb_pregunta_evaluacion` (`idEvaluacion`, `idPregunta`, `puntaje`) VALUES
(1, 1, 2),
(1, 2, 2),
(1, 3, 2),
(1, 4, 2),
(1, 5, 3),
(1, 6, 3),
(1, 7, 1),
(1, 8, 1),
(1, 9, 2),
(1, 10, 2),
(5, 20, 2),
(5, 21, 2),
(5, 22, 2),
(5, 28, 4),
(5, 29, 4),
(5, 30, 6),
(6, 11, 3),
(6, 12, 2),
(6, 13, 3),
(6, 14, 3),
(6, 15, 2),
(6, 16, 1),
(6, 17, 1),
(6, 18, 2),
(6, 19, 3),
(7, 14, 4),
(7, 23, 4),
(7, 24, 3),
(7, 26, 6),
(7, 27, 3),
(8, 31, 3),
(8, 32, 2),
(8, 33, 2),
(8, 34, 2),
(8, 35, 2),
(8, 36, 3),
(8, 37, 4),
(8, 38, 2),
(9, 22, 1),
(9, 28, 2),
(9, 29, 2),
(9, 39, 3),
(9, 40, 4),
(9, 41, 4),
(9, 42, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_psicologo`
--

CREATE TABLE `tb_psicologo` (
  `nroColegiatura` varchar(20) DEFAULT NULL,
  `idPsicologo` int(11) NOT NULL,
  `idDistrito` int(11) NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `apePat` varchar(30) DEFAULT NULL,
  `apeMat` varchar(30) DEFAULT NULL,
  `fecNac` date DEFAULT NULL,
  `fecIngreso` date DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telfMovil` varchar(40) DEFAULT NULL,
  `telfFijo` varchar(40) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_respuesta_corta`
--

CREATE TABLE `tb_respuesta_corta` (
  `idRespuestaCorta` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` varchar(300) DEFAULT NULL,
  `pesoPuntaje` decimal(3,2) DEFAULT NULL,
  `retroalimentacion` varchar(300) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_respuesta_estudiante`
--

CREATE TABLE `tb_respuesta_estudiante` (
  `idEvaluacion` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idRespuestaEstudiante` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `calificacion` decimal(4,2) DEFAULT NULL,
  `idPregunta` int(11) NOT NULL,
  `intento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_respuesta_estudiante`
--

INSERT INTO `tb_respuesta_estudiante` (`idEvaluacion`, `idEstudiante`, `idRespuestaEstudiante`, `estado`, `calificacion`, `idPregunta`, `intento`) VALUES
(1, 34, 209, 1, 2.00, 1, 1),
(1, 34, 210, 1, 2.00, 9, 1),
(1, 34, 211, 1, 1.00, 2, 1),
(1, 34, 212, 1, 0.00, 2, 1),
(1, 34, 213, 1, 0.00, 3, 1),
(1, 34, 214, 1, 1.00, 3, 1),
(1, 34, 215, 1, 0.00, 4, 1),
(1, 34, 216, 1, 1.00, 4, 1),
(1, 34, 217, 1, 0.00, 5, 1),
(1, 34, 218, 1, 1.50, 5, 1),
(1, 34, 219, 1, 1.50, 6, 1),
(1, 34, 220, 1, 0.00, 6, 1),
(1, 34, 221, 1, 0.00, 10, 1),
(1, 34, 222, 1, 1.00, 10, 1),
(1, 34, 223, 1, 1.00, 7, 1),
(1, 34, 224, 1, 1.00, 8, 1),
(1, 34, 225, 1, 2.00, 1, 2),
(1, 34, 226, 1, 2.00, 9, 2),
(1, 34, 227, 1, 0.00, 2, 2),
(1, 34, 228, 1, 1.00, 2, 2),
(1, 34, 229, 1, 0.00, 3, 2),
(1, 34, 230, 1, 1.00, 3, 2),
(1, 34, 231, 1, 0.00, 4, 2),
(1, 34, 232, 1, 1.00, 4, 2),
(1, 34, 233, 1, 0.00, 5, 2),
(1, 34, 234, 1, 1.50, 5, 2),
(1, 34, 235, 1, 1.50, 6, 2),
(1, 34, 236, 1, 0.00, 6, 2),
(1, 34, 237, 1, 0.00, 10, 2),
(1, 34, 238, 1, 1.00, 10, 2),
(1, 34, 239, 1, 1.00, 7, 2),
(1, 34, 240, 1, 1.00, 8, 2),
(1, 42, 241, 1, 2.00, 1, 1),
(1, 42, 242, 1, 2.00, 9, 1),
(1, 42, 243, 1, 1.00, 2, 1),
(1, 42, 244, 1, 0.00, 2, 1),
(1, 42, 245, 1, 0.00, 3, 1),
(1, 42, 246, 1, 1.00, 3, 1),
(1, 42, 247, 1, 1.00, 4, 1),
(1, 42, 248, 1, 1.00, 4, 1),
(1, 42, 249, 1, 0.00, 5, 1),
(1, 42, 250, 1, 0.00, 5, 1),
(1, 42, 251, 1, 1.50, 6, 1),
(1, 42, 252, 1, 1.50, 6, 1),
(1, 42, 253, 1, 1.00, 10, 1),
(1, 42, 254, 1, 0.00, 10, 1),
(1, 42, 255, 1, 1.00, 7, 1),
(1, 42, 256, 1, 1.00, 8, 1),
(1, 42, 257, 1, 2.00, 1, 2),
(1, 42, 258, 1, 2.00, 9, 2),
(1, 42, 259, 1, 1.00, 2, 2),
(1, 42, 260, 1, 1.00, 2, 2),
(1, 42, 261, 1, 0.00, 3, 2),
(1, 42, 262, 1, 1.00, 3, 2),
(1, 42, 263, 1, 1.00, 4, 2),
(1, 42, 264, 1, 1.00, 4, 2),
(1, 42, 265, 1, 1.50, 5, 2),
(1, 42, 266, 1, 1.50, 5, 2),
(1, 42, 267, 1, 1.50, 6, 2),
(1, 42, 268, 1, 1.50, 6, 2),
(1, 42, 269, 1, 1.00, 10, 2),
(1, 42, 270, 1, 0.00, 10, 2),
(1, 42, 271, 1, 1.00, 7, 2),
(1, 42, 272, 1, 1.00, 8, 2),
(1, 46, 273, 1, 2.00, 1, 1),
(1, 46, 274, 1, 1.00, 2, 1),
(1, 46, 275, 1, 0.00, 3, 1),
(1, 46, 276, 1, 1.00, 3, 1),
(1, 46, 277, 1, 1.50, 5, 1),
(1, 46, 278, 1, 1.50, 5, 1),
(1, 46, 279, 1, 1.50, 6, 1),
(1, 46, 280, 1, 1.00, 10, 1),
(1, 46, 281, 1, 1.00, 8, 1),
(1, 40, 282, 1, 0.00, 1, 1),
(1, 40, 283, 1, 2.00, 9, 1),
(1, 40, 284, 1, 1.00, 2, 1),
(1, 40, 285, 1, 1.00, 2, 1),
(1, 40, 286, 1, 0.00, 3, 1),
(1, 40, 287, 1, 1.00, 3, 1),
(1, 40, 288, 1, 1.00, 4, 1),
(1, 40, 289, 1, 1.00, 4, 1),
(1, 40, 290, 1, 1.50, 5, 1),
(1, 40, 291, 1, 1.50, 5, 1),
(1, 40, 292, 1, 1.50, 6, 1),
(1, 40, 293, 1, 1.50, 6, 1),
(1, 40, 294, 1, 1.00, 10, 1),
(1, 40, 295, 1, 0.00, 10, 1),
(1, 40, 296, 1, 1.00, 7, 1),
(1, 40, 297, 1, 1.00, 8, 1),
(1, 40, 298, 1, 2.00, 1, 2),
(1, 40, 299, 1, 2.00, 9, 2),
(1, 40, 300, 1, 1.00, 2, 2),
(1, 40, 301, 1, 1.00, 2, 2),
(1, 40, 302, 1, 0.00, 3, 2),
(1, 40, 303, 1, 1.00, 3, 2),
(1, 40, 304, 1, 1.00, 4, 2),
(1, 40, 305, 1, 1.00, 4, 2),
(1, 40, 306, 1, 1.50, 5, 2),
(1, 40, 307, 1, 1.50, 5, 2),
(1, 40, 308, 1, 1.50, 6, 2),
(1, 40, 309, 1, 1.50, 6, 2),
(1, 40, 310, 1, 1.00, 10, 2),
(1, 40, 311, 1, 0.00, 10, 2),
(1, 40, 312, 1, 0.00, 7, 2),
(1, 40, 313, 1, 1.00, 8, 2),
(1, 46, 314, 1, 2.00, 1, 2),
(1, 46, 315, 1, 2.00, 9, 2),
(1, 46, 316, 1, 1.00, 2, 2),
(1, 46, 317, 1, 0.00, 3, 2),
(1, 46, 318, 1, 1.00, 4, 2),
(1, 46, 319, 1, 1.50, 5, 2),
(1, 46, 320, 1, 1.50, 6, 2),
(1, 46, 321, 1, 0.00, 10, 2),
(1, 46, 322, 1, 1.00, 2, 2),
(1, 46, 323, 1, 0.00, 3, 2),
(1, 46, 324, 1, 1.00, 4, 2),
(1, 46, 325, 1, 0.00, 5, 2),
(1, 46, 326, 1, 0.00, 6, 2),
(1, 46, 327, 1, 0.00, 10, 2),
(1, 46, 328, 1, 1.00, 7, 2),
(1, 46, 329, 1, 0.00, 8, 2),
(1, 37, 330, 1, 2.00, 1, 1),
(1, 37, 331, 1, 0.00, 9, 1),
(1, 37, 332, 1, 1.00, 2, 1),
(1, 37, 333, 1, 0.00, 3, 1),
(1, 37, 334, 1, 0.00, 4, 1),
(1, 37, 335, 1, 1.50, 5, 1),
(1, 37, 336, 1, 1.50, 6, 1),
(1, 37, 337, 1, 0.00, 10, 1),
(1, 37, 338, 1, 0.00, 2, 1),
(1, 37, 339, 1, 1.00, 3, 1),
(1, 37, 340, 1, 1.00, 4, 1),
(1, 37, 341, 1, 0.00, 5, 1),
(1, 37, 342, 1, 0.00, 6, 1),
(1, 37, 343, 1, 1.00, 10, 1),
(1, 37, 344, 1, 1.00, 7, 1),
(1, 37, 345, 1, 0.00, 8, 1),
(1, 36, 346, 1, 2.00, 1, 1),
(1, 36, 347, 1, 2.00, 9, 1),
(1, 36, 348, 1, 1.00, 2, 1),
(1, 36, 349, 1, 1.00, 3, 1),
(1, 36, 350, 1, 0.00, 4, 1),
(1, 36, 351, 1, 1.50, 5, 1),
(1, 36, 352, 1, 0.00, 6, 1),
(1, 36, 353, 1, 1.00, 10, 1),
(1, 36, 354, 1, 0.00, 2, 1),
(1, 36, 355, 1, 0.00, 3, 1),
(1, 36, 356, 1, 0.00, 4, 1),
(1, 36, 357, 1, 0.00, 5, 1),
(1, 36, 358, 1, 1.50, 6, 1),
(1, 36, 359, 1, 0.00, 10, 1),
(1, 36, 360, 1, 1.00, 7, 1),
(1, 36, 361, 1, 0.00, 8, 1),
(1, 36, 362, 1, 2.00, 1, 2),
(1, 36, 363, 1, 0.00, 9, 2),
(1, 36, 364, 1, 1.00, 2, 2),
(1, 36, 365, 1, 1.00, 3, 2),
(1, 36, 366, 1, 0.00, 4, 2),
(1, 36, 367, 1, 1.50, 5, 2),
(1, 36, 368, 1, 0.00, 6, 2),
(1, 36, 369, 1, 1.00, 10, 2),
(1, 36, 370, 1, 0.00, 2, 2),
(1, 36, 371, 1, 0.00, 3, 2),
(1, 36, 372, 1, 0.00, 4, 2),
(1, 36, 373, 1, 0.00, 5, 2),
(1, 36, 374, 1, 0.00, 6, 2),
(1, 36, 375, 1, 0.00, 10, 2),
(1, 36, 376, 1, 0.00, 7, 2),
(1, 36, 377, 1, 1.00, 8, 2),
(1, 37, 378, 1, 0.00, 1, 2),
(1, 37, 379, 1, 0.00, 9, 2),
(1, 37, 380, 1, 1.00, 2, 2),
(1, 37, 381, 1, 0.00, 3, 2),
(1, 37, 382, 1, 0.00, 4, 2),
(1, 37, 383, 1, 0.00, 5, 2),
(1, 37, 384, 1, 0.00, 6, 2),
(1, 37, 385, 1, 0.00, 10, 2),
(1, 37, 386, 1, 1.00, 2, 2),
(1, 37, 387, 1, 1.00, 3, 2),
(1, 37, 388, 1, 0.00, 4, 2),
(1, 37, 389, 1, 0.00, 5, 2),
(1, 37, 390, 1, 1.50, 6, 2),
(1, 37, 391, 1, 1.00, 10, 2),
(1, 37, 392, 1, 1.00, 7, 2),
(1, 37, 393, 1, 0.00, 8, 2),
(1, 43, 394, 1, 2.00, 1, 1),
(1, 43, 395, 1, 0.00, 9, 1),
(1, 43, 396, 1, 1.00, 2, 1),
(1, 43, 397, 1, 0.00, 3, 1),
(1, 43, 398, 1, 0.00, 4, 1),
(1, 43, 399, 1, 0.00, 5, 1),
(1, 43, 400, 1, 1.50, 6, 1),
(1, 43, 401, 1, 0.00, 10, 1),
(1, 43, 402, 1, 0.00, 2, 1),
(1, 43, 403, 1, 1.00, 3, 1),
(1, 43, 404, 1, 0.00, 4, 1),
(1, 43, 405, 1, 1.50, 5, 1),
(1, 43, 406, 1, 0.00, 6, 1),
(1, 43, 407, 1, 0.00, 10, 1),
(1, 43, 408, 1, 0.00, 7, 1),
(1, 43, 409, 1, 1.00, 8, 1),
(1, 43, 410, 1, 0.00, 1, 2),
(1, 43, 411, 1, 0.00, 9, 2),
(1, 43, 412, 1, 1.00, 2, 2),
(1, 43, 413, 1, 0.00, 3, 2),
(1, 43, 414, 1, 1.00, 4, 2),
(1, 43, 415, 1, 1.50, 5, 2),
(1, 43, 416, 1, 0.00, 6, 2),
(1, 43, 417, 1, 1.00, 10, 2),
(1, 43, 418, 1, 1.00, 2, 2),
(1, 43, 419, 1, 1.00, 3, 2),
(1, 43, 420, 1, 0.00, 4, 2),
(1, 43, 421, 1, 0.00, 5, 2),
(1, 43, 422, 1, 0.00, 6, 2),
(1, 43, 423, 1, 0.00, 10, 2),
(1, 43, 424, 1, 0.00, 7, 2),
(1, 43, 425, 1, 1.00, 8, 2),
(6, 55, 426, 1, 2.00, 12, 1),
(6, 55, 427, 1, 0.00, 15, 1),
(6, 55, 428, 1, 1.50, 11, 1),
(6, 55, 429, 1, 1.50, 13, 1),
(6, 55, 430, 1, 1.50, 14, 1),
(6, 55, 431, 1, 1.50, 19, 1),
(6, 55, 432, 1, 1.50, 11, 1),
(6, 55, 433, 1, 1.50, 13, 1),
(6, 55, 434, 1, 1.50, 14, 1),
(6, 55, 435, 1, 1.50, 19, 1),
(6, 55, 436, 1, 1.00, 16, 1),
(6, 55, 437, 1, 0.00, 17, 1),
(6, 55, 438, 1, 2.00, 18, 1),
(6, 81, 439, 1, 2.00, 12, 1),
(6, 81, 440, 1, 0.00, 15, 1),
(6, 81, 441, 1, 1.50, 11, 1),
(6, 81, 442, 1, 1.50, 13, 1),
(6, 81, 443, 1, 1.50, 14, 1),
(6, 81, 444, 1, 1.50, 19, 1),
(6, 81, 445, 1, 1.50, 11, 1),
(6, 81, 446, 1, 1.50, 13, 1),
(6, 81, 447, 1, 1.50, 14, 1),
(6, 81, 448, 1, 0.00, 19, 1),
(6, 81, 449, 1, 1.00, 16, 1),
(6, 81, 450, 1, 0.00, 17, 1),
(6, 81, 451, 1, 2.00, 18, 1),
(6, 80, 452, 1, 2.00, 12, 1),
(6, 80, 453, 1, 0.00, 15, 1),
(6, 80, 454, 1, 1.50, 11, 1),
(6, 80, 455, 1, 0.00, 13, 1),
(6, 80, 456, 1, 0.00, 14, 1),
(6, 80, 457, 1, 0.00, 19, 1),
(6, 80, 458, 1, 0.00, 11, 1),
(6, 80, 459, 1, 0.00, 13, 1),
(6, 80, 460, 1, 0.00, 14, 1),
(6, 80, 461, 1, 0.00, 19, 1),
(6, 80, 462, 1, 0.00, 16, 1),
(6, 80, 463, 1, 1.00, 17, 1),
(6, 80, 464, 1, 0.00, 18, 1),
(6, 61, 465, 1, 2.00, 12, 1),
(6, 61, 466, 1, 0.00, 15, 1),
(6, 61, 467, 1, 1.50, 11, 1),
(6, 61, 468, 1, 0.00, 13, 1),
(6, 61, 469, 1, 1.50, 14, 1),
(6, 61, 470, 1, 1.50, 19, 1),
(6, 61, 471, 1, 0.00, 11, 1),
(6, 61, 472, 1, 0.00, 13, 1),
(6, 61, 473, 1, 0.00, 14, 1),
(6, 61, 474, 1, 0.00, 19, 1),
(6, 61, 475, 1, 1.00, 16, 1),
(6, 61, 476, 1, 0.00, 17, 1),
(6, 61, 477, 1, 2.00, 18, 1),
(6, 54, 478, 1, 2.00, 12, 1),
(6, 54, 479, 1, 0.00, 15, 1),
(6, 54, 480, 1, 1.50, 11, 1),
(6, 54, 481, 1, 0.00, 13, 1),
(6, 54, 482, 1, 1.50, 14, 1),
(6, 54, 483, 1, 1.50, 19, 1),
(6, 54, 484, 1, 1.50, 11, 1),
(6, 54, 485, 1, 1.50, 13, 1),
(6, 54, 486, 1, 1.50, 14, 1),
(6, 54, 487, 1, 1.50, 19, 1),
(6, 54, 488, 1, 1.00, 16, 1),
(6, 54, 489, 1, 0.00, 17, 1),
(6, 54, 490, 1, 2.00, 18, 1),
(6, 53, 491, 1, 2.00, 12, 1),
(6, 53, 492, 1, 0.00, 15, 1),
(6, 53, 493, 1, 0.00, 11, 1),
(6, 53, 494, 1, 1.50, 13, 1),
(6, 53, 495, 1, 1.50, 14, 1),
(6, 53, 496, 1, 0.00, 19, 1),
(6, 53, 497, 1, 1.50, 11, 1),
(6, 53, 498, 1, 0.00, 13, 1),
(6, 53, 499, 1, 0.00, 14, 1),
(6, 53, 500, 1, 1.50, 19, 1),
(6, 53, 501, 1, 1.00, 16, 1),
(6, 53, 502, 1, 0.00, 17, 1),
(6, 53, 503, 1, 0.00, 18, 1),
(6, 82, 504, 1, 2.00, 12, 1),
(6, 82, 505, 1, 0.00, 15, 1),
(6, 82, 506, 1, 1.50, 11, 1),
(6, 82, 507, 1, 1.50, 13, 1),
(6, 82, 508, 1, 0.00, 14, 1),
(6, 82, 509, 1, 1.50, 19, 1),
(6, 82, 510, 1, 1.50, 11, 1),
(6, 82, 511, 1, 0.00, 13, 1),
(6, 82, 512, 1, 0.00, 14, 1),
(6, 82, 513, 1, 0.00, 19, 1),
(6, 82, 514, 1, 1.00, 16, 1),
(6, 82, 515, 1, 1.00, 17, 1),
(6, 82, 516, 1, 2.00, 18, 1),
(6, 56, 517, 1, 2.00, 12, 1),
(6, 56, 518, 1, 0.00, 15, 1),
(6, 56, 519, 1, 0.00, 11, 1),
(6, 56, 520, 1, 1.50, 13, 1),
(6, 56, 521, 1, 0.00, 14, 1),
(6, 56, 522, 1, 0.00, 19, 1),
(6, 56, 523, 1, 1.50, 11, 1),
(6, 56, 524, 1, 0.00, 13, 1),
(6, 56, 525, 1, 1.50, 14, 1),
(6, 56, 526, 1, 1.50, 19, 1),
(6, 56, 527, 1, 1.00, 16, 1),
(6, 56, 528, 1, 1.00, 17, 1),
(6, 56, 529, 1, 2.00, 18, 1),
(6, 61, 530, 1, 2.00, 12, 2),
(6, 61, 531, 1, 0.00, 15, 2),
(6, 61, 532, 1, 1.50, 11, 2),
(6, 61, 533, 1, 0.00, 13, 2),
(6, 61, 534, 1, 1.50, 14, 2),
(6, 61, 535, 1, 1.50, 19, 2),
(6, 61, 536, 1, 1.50, 11, 2),
(6, 61, 537, 1, 1.50, 13, 2),
(6, 61, 538, 1, 1.50, 14, 2),
(6, 61, 539, 1, 1.50, 19, 2),
(6, 61, 540, 1, 1.00, 16, 2),
(6, 61, 541, 1, 1.00, 17, 2),
(6, 61, 542, 1, 2.00, 18, 2),
(6, 80, 543, 1, 2.00, 12, 2),
(6, 80, 544, 1, 0.00, 15, 2),
(6, 80, 545, 1, 1.50, 11, 2),
(6, 80, 546, 1, 1.50, 13, 2),
(6, 80, 547, 1, 1.50, 14, 2),
(6, 80, 548, 1, 0.00, 19, 2),
(6, 80, 549, 1, 0.00, 11, 2),
(6, 80, 550, 1, 0.00, 13, 2),
(6, 80, 551, 1, 0.00, 14, 2),
(6, 80, 552, 1, 0.00, 19, 2),
(6, 80, 553, 1, 1.00, 16, 2),
(6, 80, 554, 1, 1.00, 17, 2),
(6, 80, 555, 1, 2.00, 18, 2),
(6, 80, 556, 1, 2.00, 12, 3),
(6, 80, 557, 1, 0.00, 15, 3),
(6, 80, 558, 1, 1.50, 11, 3),
(6, 80, 559, 1, 1.50, 13, 3),
(6, 80, 560, 1, 1.50, 14, 3),
(6, 80, 561, 1, 0.00, 19, 3),
(6, 80, 562, 1, 0.00, 11, 3),
(6, 80, 563, 1, 0.00, 13, 3),
(6, 80, 564, 1, 0.00, 14, 3),
(6, 80, 565, 1, 0.00, 19, 3),
(6, 80, 566, 1, 1.00, 16, 3),
(6, 80, 567, 1, 1.00, 17, 3),
(6, 80, 568, 1, 2.00, 18, 3),
(1, 51, 569, 1, 2.00, 1, 1),
(1, 51, 570, 1, 2.00, 9, 1),
(1, 51, 571, 1, 1.00, 2, 1),
(1, 51, 572, 1, 1.00, 3, 1),
(1, 51, 573, 1, 1.00, 4, 1),
(1, 51, 574, 1, 1.50, 5, 1),
(1, 51, 575, 1, 1.50, 6, 1),
(1, 51, 576, 1, 1.00, 10, 1),
(1, 51, 577, 1, 0.00, 2, 1),
(1, 51, 578, 1, 0.00, 3, 1),
(1, 51, 579, 1, 0.00, 4, 1),
(1, 51, 580, 1, 1.50, 5, 1),
(1, 51, 581, 1, 0.00, 6, 1),
(1, 51, 582, 1, 0.00, 10, 1),
(1, 51, 583, 1, 1.00, 7, 1),
(1, 51, 584, 1, 1.00, 8, 1),
(1, 49, 585, 1, 0.00, 1, 1),
(1, 49, 586, 1, 0.00, 9, 1),
(1, 49, 587, 1, 1.00, 2, 1),
(1, 49, 588, 1, 1.00, 3, 1),
(1, 49, 589, 1, 0.00, 4, 1),
(1, 49, 590, 1, 0.00, 5, 1),
(1, 49, 591, 1, 1.50, 6, 1),
(1, 49, 592, 1, 1.00, 10, 1),
(1, 49, 593, 1, 0.00, 2, 1),
(1, 49, 594, 1, 0.00, 3, 1),
(1, 49, 595, 1, 0.00, 4, 1),
(1, 49, 596, 1, 0.00, 5, 1),
(1, 49, 597, 1, 0.00, 6, 1),
(1, 49, 598, 1, 0.00, 10, 1),
(1, 49, 599, 1, 0.00, 7, 1),
(1, 49, 600, 1, 1.00, 8, 1),
(1, 37, 601, 1, 2.00, 1, 3),
(1, 37, 602, 1, 0.00, 9, 3),
(1, 37, 603, 1, 1.00, 2, 3),
(1, 37, 604, 1, 1.00, 3, 3),
(1, 37, 605, 1, 0.00, 4, 3),
(1, 37, 606, 1, 1.50, 5, 3),
(1, 37, 607, 1, 1.50, 6, 3),
(1, 37, 608, 1, 0.00, 10, 3),
(1, 37, 609, 1, 1.00, 2, 3),
(1, 37, 610, 1, 1.00, 3, 3),
(1, 37, 611, 1, 0.00, 4, 3),
(1, 37, 612, 1, 0.00, 5, 3),
(1, 37, 613, 1, 0.00, 6, 3),
(1, 37, 614, 1, 0.00, 10, 3),
(1, 37, 615, 1, 0.00, 7, 3),
(1, 37, 616, 1, 1.00, 8, 3),
(1, 41, 617, 1, 2.00, 1, 1),
(1, 41, 618, 1, 0.00, 9, 1),
(1, 41, 619, 1, 0.00, 2, 1),
(1, 41, 620, 1, 1.00, 3, 1),
(1, 41, 621, 1, 0.00, 4, 1),
(1, 41, 622, 1, 1.50, 5, 1),
(1, 41, 623, 1, 1.50, 6, 1),
(1, 41, 624, 1, 0.00, 10, 1),
(1, 41, 625, 1, 0.00, 2, 1),
(1, 41, 626, 1, 1.00, 3, 1),
(1, 41, 627, 1, 0.00, 4, 1),
(1, 41, 628, 1, 1.50, 5, 1),
(1, 41, 629, 1, 0.00, 6, 1),
(1, 41, 630, 1, 0.00, 10, 1),
(1, 41, 631, 1, 0.00, 7, 1),
(1, 41, 632, 1, 1.00, 8, 1),
(1, 46, 633, 1, 2.00, 1, 3),
(1, 46, 634, 1, 0.00, 9, 3),
(1, 46, 635, 1, 1.00, 2, 3),
(1, 46, 636, 1, 1.00, 3, 3),
(1, 46, 637, 1, 1.00, 4, 3),
(1, 46, 638, 1, 0.00, 5, 3),
(1, 46, 639, 1, 0.00, 6, 3),
(1, 46, 640, 1, 0.00, 10, 3),
(1, 46, 641, 1, 0.00, 2, 3),
(1, 46, 642, 1, 0.00, 3, 3),
(1, 46, 643, 1, 0.00, 4, 3),
(1, 46, 644, 1, 0.00, 5, 3),
(1, 46, 645, 1, 0.00, 6, 3),
(1, 46, 646, 1, 0.00, 10, 3),
(1, 46, 647, 1, 0.00, 7, 3),
(1, 46, 648, 1, 1.00, 8, 3),
(1, 34, 649, 1, 2.00, 1, 3),
(1, 34, 650, 1, 0.00, 9, 3),
(1, 34, 651, 1, 1.00, 2, 3),
(1, 34, 652, 1, 1.00, 3, 3),
(1, 34, 653, 1, 0.00, 4, 3),
(1, 34, 654, 1, 1.50, 5, 3),
(1, 34, 655, 1, 1.50, 6, 3),
(1, 34, 656, 1, 1.00, 10, 3),
(1, 34, 657, 1, 0.00, 2, 3),
(1, 34, 658, 1, 0.00, 3, 3),
(1, 34, 659, 1, 0.00, 4, 3),
(1, 34, 660, 1, 0.00, 5, 3),
(1, 34, 661, 1, 0.00, 6, 3),
(1, 34, 662, 1, 0.00, 10, 3),
(1, 34, 663, 1, 0.00, 7, 3),
(1, 34, 664, 1, 1.00, 8, 3),
(1, 50, 665, 1, 2.00, 1, 1),
(1, 50, 666, 1, 0.00, 9, 1),
(1, 50, 667, 1, 1.00, 2, 1),
(1, 50, 668, 1, 1.00, 3, 1),
(1, 50, 669, 1, 0.00, 4, 1),
(1, 50, 670, 1, 1.50, 5, 1),
(1, 50, 671, 1, 1.50, 6, 1),
(1, 50, 672, 1, 0.00, 10, 1),
(1, 50, 673, 1, 0.00, 2, 1),
(1, 50, 674, 1, 0.00, 3, 1),
(1, 50, 675, 1, 0.00, 4, 1),
(1, 50, 676, 1, 0.00, 5, 1),
(1, 50, 677, 1, 0.00, 6, 1),
(1, 50, 678, 1, 0.00, 10, 1),
(1, 50, 679, 1, 1.00, 7, 1),
(1, 50, 680, 1, 0.00, 8, 1),
(1, 43, 681, 1, 2.00, 1, 3),
(1, 43, 682, 1, 0.00, 9, 3),
(1, 43, 683, 1, 1.00, 2, 3),
(1, 43, 684, 1, 1.00, 3, 3),
(1, 43, 685, 1, 0.00, 4, 3),
(1, 43, 686, 1, 1.50, 5, 3),
(1, 43, 687, 1, 1.50, 6, 3),
(1, 43, 688, 1, 1.00, 10, 3),
(1, 43, 689, 1, 0.00, 2, 3),
(1, 43, 690, 1, 0.00, 3, 3),
(1, 43, 691, 1, 0.00, 4, 3),
(1, 43, 692, 1, 1.50, 5, 3),
(1, 43, 693, 1, 0.00, 6, 3),
(1, 43, 694, 1, 0.00, 10, 3),
(1, 43, 695, 1, 1.00, 7, 3),
(1, 43, 696, 1, 1.00, 8, 3),
(1, 44, 697, 1, 2.00, 1, 1),
(1, 44, 698, 1, 0.00, 9, 1),
(1, 44, 699, 1, 1.00, 2, 1),
(1, 44, 700, 1, 1.00, 3, 1),
(1, 44, 701, 1, 1.00, 4, 1),
(1, 44, 702, 1, 1.50, 5, 1),
(1, 44, 703, 1, 1.50, 6, 1),
(1, 44, 704, 1, 1.00, 10, 1),
(1, 44, 705, 1, 1.00, 2, 1),
(1, 44, 706, 1, 1.00, 3, 1),
(1, 44, 707, 1, 1.00, 4, 1),
(1, 44, 708, 1, 0.00, 5, 1),
(1, 44, 709, 1, 0.00, 6, 1),
(1, 44, 710, 1, 0.00, 10, 1),
(1, 44, 711, 1, 1.00, 7, 1),
(1, 44, 712, 1, 0.00, 8, 1),
(1, 40, 713, 1, 2.00, 1, 3),
(1, 40, 714, 1, 0.00, 9, 3),
(1, 40, 715, 1, 1.00, 2, 3),
(1, 40, 716, 1, 1.00, 3, 3),
(1, 40, 717, 1, 0.00, 4, 3),
(1, 40, 718, 1, 0.00, 5, 3),
(1, 40, 719, 1, 1.50, 6, 3),
(1, 40, 720, 1, 1.00, 10, 3),
(1, 40, 721, 1, 0.00, 2, 3),
(1, 40, 722, 1, 1.00, 3, 3),
(1, 40, 723, 1, 1.00, 4, 3),
(1, 40, 724, 1, 1.50, 5, 3),
(1, 40, 725, 1, 0.00, 6, 3),
(1, 40, 726, 1, 0.00, 10, 3),
(1, 40, 727, 1, 1.00, 7, 3),
(1, 40, 728, 1, 1.00, 8, 3),
(1, 47, 729, 1, 2.00, 1, 1),
(1, 47, 730, 1, 0.00, 9, 1),
(1, 47, 731, 1, 1.00, 2, 1),
(1, 47, 732, 1, 1.00, 3, 1),
(1, 47, 733, 1, 0.00, 4, 1),
(1, 47, 734, 1, 0.00, 5, 1),
(1, 47, 735, 1, 0.00, 6, 1),
(1, 47, 736, 1, 0.00, 10, 1),
(1, 47, 737, 1, 1.00, 2, 1),
(1, 47, 738, 1, 1.00, 3, 1),
(1, 47, 739, 1, 1.00, 4, 1),
(1, 47, 740, 1, 0.00, 5, 1),
(1, 47, 741, 1, 0.00, 6, 1),
(1, 47, 742, 1, 0.00, 10, 1),
(1, 47, 743, 1, 0.00, 7, 1),
(1, 47, 744, 1, 0.00, 8, 1),
(1, 45, 745, 1, 2.00, 1, 1),
(1, 45, 746, 1, 0.00, 9, 1),
(1, 45, 747, 1, 1.00, 2, 1),
(1, 45, 748, 1, 1.00, 3, 1),
(1, 45, 749, 1, 1.00, 4, 1),
(1, 45, 750, 1, 1.50, 5, 1),
(1, 45, 751, 1, 1.50, 6, 1),
(1, 45, 752, 1, 0.00, 10, 1),
(1, 45, 753, 1, 1.00, 2, 1),
(1, 45, 754, 1, 0.00, 3, 1),
(1, 45, 755, 1, 0.00, 4, 1),
(1, 45, 756, 1, 1.50, 5, 1),
(1, 45, 757, 1, 0.00, 6, 1),
(1, 45, 758, 1, 0.00, 10, 1),
(1, 45, 759, 1, 0.00, 7, 1),
(1, 45, 760, 1, 1.00, 8, 1),
(1, 36, 761, 1, 2.00, 1, 3),
(1, 36, 762, 1, 0.00, 9, 3),
(1, 36, 763, 1, 1.00, 2, 3),
(1, 36, 764, 1, 1.00, 3, 3),
(1, 36, 765, 1, 1.00, 4, 3),
(1, 36, 766, 1, 1.50, 5, 3),
(1, 36, 767, 1, 1.50, 6, 3),
(1, 36, 768, 1, 0.00, 10, 3),
(1, 36, 769, 1, 1.00, 2, 3),
(1, 36, 770, 1, 0.00, 3, 3),
(1, 36, 771, 1, 0.00, 4, 3),
(1, 36, 772, 1, 0.00, 5, 3),
(1, 36, 773, 1, 0.00, 6, 3),
(1, 36, 774, 1, 1.00, 10, 3),
(1, 36, 775, 1, 0.00, 7, 3),
(1, 36, 776, 1, 0.00, 8, 3),
(1, 39, 777, 1, 2.00, 1, 1),
(1, 39, 778, 1, 2.00, 9, 1),
(1, 39, 779, 1, 1.00, 2, 1),
(1, 39, 780, 1, 1.00, 3, 1),
(1, 39, 781, 1, 0.00, 4, 1),
(1, 39, 782, 1, 1.50, 5, 1),
(1, 39, 783, 1, 1.50, 6, 1),
(1, 39, 784, 1, 1.00, 10, 1),
(1, 39, 785, 1, 0.00, 2, 1),
(1, 39, 786, 1, 1.00, 3, 1),
(1, 39, 787, 1, 1.00, 4, 1),
(1, 39, 788, 1, 1.50, 5, 1),
(1, 48, 789, 1, 2.00, 1, 1),
(1, 39, 790, 1, 1.50, 6, 1),
(1, 48, 791, 1, 0.00, 9, 1),
(1, 39, 792, 1, 0.00, 10, 1),
(1, 48, 793, 1, 1.00, 2, 1),
(1, 39, 794, 1, 1.00, 7, 1),
(1, 48, 795, 1, 1.00, 3, 1),
(1, 39, 796, 1, 0.00, 8, 1),
(1, 48, 797, 1, 1.00, 4, 1),
(1, 48, 798, 1, 0.00, 5, 1),
(1, 48, 799, 1, 1.50, 6, 1),
(1, 48, 800, 1, 1.00, 10, 1),
(1, 48, 801, 1, 1.00, 2, 1),
(1, 48, 802, 1, 1.00, 3, 1),
(1, 48, 803, 1, 0.00, 4, 1),
(1, 48, 804, 1, 1.50, 5, 1),
(1, 48, 805, 1, 1.50, 6, 1),
(1, 48, 806, 1, 0.00, 10, 1),
(1, 48, 807, 1, 1.00, 7, 1),
(1, 48, 808, 1, 0.00, 8, 1),
(1, 38, 809, 1, 2.00, 1, 1),
(1, 38, 810, 1, 0.00, 9, 1),
(1, 38, 811, 1, 1.00, 2, 1),
(1, 38, 812, 1, 0.00, 3, 1),
(1, 38, 813, 1, 0.00, 4, 1),
(1, 38, 814, 1, 1.50, 5, 1),
(1, 38, 815, 1, 1.50, 6, 1),
(1, 38, 816, 1, 1.00, 10, 1),
(1, 38, 817, 1, 1.00, 2, 1),
(1, 38, 818, 1, 1.00, 3, 1),
(1, 38, 819, 1, 1.00, 4, 1),
(1, 38, 820, 1, 0.00, 5, 1),
(1, 38, 821, 1, 0.00, 6, 1),
(1, 38, 822, 1, 0.00, 10, 1),
(1, 38, 823, 1, 1.00, 7, 1),
(1, 38, 824, 1, 0.00, 8, 1),
(1, 35, 825, 1, 2.00, 1, 1),
(1, 35, 826, 1, 2.00, 9, 1),
(1, 35, 827, 1, 0.00, 2, 1),
(1, 35, 828, 1, 1.00, 3, 1),
(1, 35, 829, 1, 1.00, 4, 1),
(1, 35, 830, 1, 0.00, 5, 1),
(1, 35, 831, 1, 1.50, 6, 1),
(1, 35, 832, 1, 1.00, 10, 1),
(1, 35, 833, 1, 0.00, 2, 1),
(1, 35, 834, 1, 0.00, 3, 1),
(1, 35, 835, 1, 0.00, 4, 1),
(1, 35, 836, 1, 1.50, 5, 1),
(1, 35, 837, 1, 0.00, 6, 1),
(1, 35, 838, 1, 0.00, 10, 1),
(1, 35, 839, 1, 1.00, 7, 1),
(1, 35, 840, 1, 0.00, 8, 1),
(1, 42, 841, 1, 2.00, 1, 3),
(1, 42, 842, 1, 0.00, 9, 3),
(1, 42, 843, 1, 1.00, 2, 3),
(1, 42, 844, 1, 0.00, 3, 3),
(1, 42, 845, 1, 0.00, 4, 3),
(1, 42, 846, 1, 1.50, 5, 3),
(1, 42, 847, 1, 1.50, 6, 3),
(1, 42, 848, 1, 1.00, 10, 3),
(1, 42, 849, 1, 1.00, 2, 3),
(1, 42, 850, 1, 1.00, 3, 3),
(1, 42, 851, 1, 0.00, 4, 3),
(1, 42, 852, 1, 0.00, 5, 3),
(1, 42, 853, 1, 0.00, 6, 3),
(1, 42, 854, 1, 0.00, 10, 3),
(1, 42, 855, 1, 1.00, 7, 3),
(1, 42, 856, 1, 1.00, 8, 3),
(7, 55, 857, 1, 3.00, 24, 1),
(7, 55, 858, 1, 6.00, 26, 1),
(7, 55, 859, 1, 2.00, 14, 1),
(7, 55, 860, 1, 2.00, 23, 1),
(7, 55, 861, 1, 2.00, 14, 1),
(7, 55, 862, 1, 2.00, 23, 1),
(7, 55, 863, 1, 3.00, 27, 1),
(7, 54, 864, 1, 3.00, 24, 1),
(7, 54, 865, 1, 6.00, 26, 1),
(7, 54, 866, 1, 2.00, 14, 1),
(7, 54, 867, 1, 2.00, 23, 1),
(7, 54, 868, 1, 2.00, 14, 1),
(7, 54, 869, 1, 0.00, 23, 1),
(7, 54, 870, 1, 3.00, 27, 1),
(7, 81, 871, 1, 3.00, 24, 1),
(7, 81, 872, 1, 6.00, 26, 1),
(7, 81, 873, 1, 2.00, 14, 1),
(7, 81, 874, 1, 2.00, 23, 1),
(7, 81, 875, 1, 2.00, 14, 1),
(7, 81, 876, 1, 2.00, 23, 1),
(7, 81, 877, 1, 3.00, 27, 1),
(7, 82, 878, 1, 3.00, 24, 1),
(7, 82, 879, 1, 6.00, 26, 1),
(7, 82, 880, 1, 0.00, 14, 1),
(7, 82, 881, 1, 2.00, 23, 1),
(7, 82, 882, 1, 0.00, 14, 1),
(7, 82, 883, 1, 0.00, 23, 1),
(7, 82, 884, 1, 3.00, 27, 1),
(7, 61, 885, 1, 3.00, 24, 1),
(7, 61, 886, 1, 0.00, 26, 1),
(7, 61, 887, 1, 2.00, 14, 1),
(7, 61, 888, 1, 0.00, 23, 1),
(7, 61, 889, 1, 0.00, 14, 1),
(7, 61, 890, 1, 2.00, 23, 1),
(7, 61, 891, 1, 3.00, 27, 1),
(7, 80, 892, 1, 3.00, 24, 1),
(7, 80, 893, 1, 0.00, 26, 1),
(7, 80, 894, 1, 0.00, 14, 1),
(7, 80, 895, 1, 2.00, 23, 1),
(7, 80, 896, 1, 0.00, 14, 1),
(7, 80, 897, 1, 0.00, 23, 1),
(7, 80, 898, 1, 0.00, 27, 1),
(7, 80, 899, 1, 3.00, 24, 2),
(7, 80, 900, 1, 0.00, 26, 2),
(7, 80, 901, 1, 0.00, 14, 2),
(7, 80, 902, 1, 2.00, 23, 2),
(7, 80, 903, 1, 0.00, 14, 2),
(7, 80, 904, 1, 0.00, 23, 2),
(7, 80, 905, 1, 0.00, 27, 2),
(7, 58, 906, 1, 3.00, 24, 1),
(7, 58, 907, 1, 6.00, 26, 1),
(7, 58, 908, 1, 0.00, 14, 1),
(7, 58, 909, 1, 2.00, 23, 1),
(7, 58, 910, 1, 0.00, 14, 1),
(7, 58, 911, 1, 0.00, 23, 1),
(7, 58, 912, 1, 3.00, 27, 1),
(7, 53, 913, 1, 3.00, 24, 1),
(7, 53, 914, 1, 6.00, 26, 1),
(7, 53, 915, 1, 2.00, 14, 1),
(7, 53, 916, 1, 2.00, 23, 1),
(7, 53, 917, 1, 2.00, 14, 1),
(7, 53, 918, 1, 2.00, 23, 1),
(7, 53, 919, 1, 3.00, 27, 1),
(7, 57, 920, 1, 3.00, 24, 1),
(7, 57, 921, 1, 6.00, 26, 1),
(7, 57, 922, 1, 2.00, 14, 1),
(7, 57, 923, 1, 2.00, 23, 1),
(7, 57, 924, 1, 2.00, 14, 1),
(7, 57, 925, 1, 2.00, 23, 1),
(7, 57, 926, 1, 0.00, 27, 1),
(7, 56, 927, 1, 3.00, 24, 1),
(7, 56, 928, 1, 0.00, 26, 1),
(7, 56, 929, 1, 0.00, 14, 1),
(7, 56, 930, 1, 2.00, 23, 1),
(7, 56, 931, 1, 2.00, 14, 1),
(7, 56, 932, 1, 0.00, 23, 1),
(7, 56, 933, 1, 0.00, 27, 1),
(5, 51, 934, 1, 0.00, 30, 1),
(5, 51, 935, 1, 2.00, 20, 1),
(5, 51, 936, 1, 2.00, 21, 1),
(5, 51, 937, 1, 2.00, 22, 1),
(5, 51, 938, 1, 0.00, 28, 1),
(5, 51, 939, 1, 4.00, 29, 1),
(5, 44, 940, 1, 0.00, 30, 1),
(5, 44, 941, 1, 2.00, 20, 1),
(5, 44, 942, 1, 2.00, 21, 1),
(5, 44, 943, 1, 0.00, 22, 1),
(5, 44, 944, 1, 4.00, 28, 1),
(5, 44, 945, 1, 0.00, 29, 1),
(5, 37, 946, 1, 6.00, 30, 1),
(5, 37, 947, 1, 2.00, 20, 1),
(5, 37, 948, 1, 2.00, 21, 1),
(5, 37, 949, 1, 2.00, 22, 1),
(5, 37, 950, 1, 4.00, 28, 1),
(5, 37, 951, 1, 4.00, 29, 1),
(5, 49, 952, 1, 0.00, 30, 1),
(5, 49, 953, 1, 0.00, 20, 1),
(5, 49, 954, 1, 2.00, 21, 1),
(5, 49, 955, 1, 2.00, 22, 1),
(5, 49, 956, 1, 4.00, 28, 1),
(5, 49, 957, 1, 0.00, 29, 1),
(5, 52, 958, 1, 0.00, 30, 1),
(5, 52, 959, 1, 2.00, 20, 1),
(5, 52, 960, 1, 2.00, 21, 1),
(5, 52, 961, 1, 2.00, 22, 1),
(5, 52, 962, 1, 4.00, 28, 1),
(5, 52, 963, 1, 0.00, 29, 1),
(5, 34, 964, 1, 0.00, 30, 1),
(5, 34, 965, 1, 2.00, 20, 1),
(5, 34, 966, 1, 0.00, 21, 1),
(5, 34, 967, 1, 0.00, 22, 1),
(5, 34, 968, 1, 0.00, 28, 1),
(5, 34, 969, 1, 0.00, 29, 1),
(5, 46, 970, 1, 0.00, 30, 1),
(5, 46, 971, 1, 0.00, 20, 1),
(5, 46, 972, 1, 2.00, 21, 1),
(5, 46, 973, 1, 0.00, 22, 1),
(5, 46, 974, 1, 4.00, 28, 1),
(5, 46, 975, 1, 4.00, 29, 1),
(5, 41, 976, 1, 0.00, 30, 1),
(5, 41, 977, 1, 2.00, 20, 1),
(5, 41, 978, 1, 2.00, 21, 1),
(5, 41, 979, 1, 0.00, 22, 1),
(5, 41, 980, 1, 0.00, 28, 1),
(5, 41, 981, 1, 0.00, 29, 1),
(5, 43, 982, 1, 0.00, 30, 1),
(5, 43, 983, 1, 0.00, 20, 1),
(5, 43, 984, 1, 2.00, 21, 1),
(5, 43, 985, 1, 2.00, 22, 1),
(5, 43, 986, 1, 0.00, 28, 1),
(5, 43, 987, 1, 4.00, 29, 1),
(5, 34, 988, 1, 6.00, 30, 2),
(5, 34, 989, 1, 2.00, 20, 2),
(5, 34, 990, 1, 2.00, 21, 2),
(5, 34, 991, 1, 2.00, 22, 2),
(5, 34, 992, 1, 0.00, 28, 2),
(5, 34, 993, 1, 0.00, 29, 2),
(5, 50, 994, 1, 0.00, 30, 1),
(5, 50, 995, 1, 2.00, 20, 1),
(5, 50, 996, 1, 2.00, 21, 1),
(5, 50, 997, 1, 2.00, 22, 1),
(5, 50, 998, 1, 0.00, 28, 1),
(5, 50, 999, 1, 0.00, 29, 1),
(5, 40, 1000, 1, 0.00, 30, 1),
(5, 40, 1001, 1, 2.00, 20, 1),
(5, 40, 1002, 1, 2.00, 21, 1),
(5, 40, 1003, 1, 2.00, 22, 1),
(5, 40, 1004, 1, 0.00, 28, 1),
(5, 40, 1005, 1, 4.00, 29, 1),
(5, 48, 1006, 1, 6.00, 30, 1),
(5, 48, 1007, 1, 2.00, 20, 1),
(5, 48, 1008, 1, 2.00, 21, 1),
(5, 48, 1009, 1, 0.00, 22, 1),
(5, 48, 1010, 1, 0.00, 28, 1),
(5, 48, 1011, 1, 0.00, 29, 1),
(5, 38, 1012, 1, 6.00, 30, 1),
(5, 38, 1013, 1, 2.00, 20, 1),
(5, 38, 1014, 1, 2.00, 21, 1),
(5, 38, 1015, 1, 0.00, 22, 1),
(5, 38, 1016, 1, 0.00, 28, 1),
(5, 38, 1017, 1, 4.00, 29, 1),
(5, 35, 1018, 1, 0.00, 30, 1),
(5, 35, 1019, 1, 2.00, 20, 1),
(5, 35, 1020, 1, 2.00, 21, 1),
(5, 35, 1021, 1, 2.00, 22, 1),
(5, 35, 1022, 1, 4.00, 28, 1),
(5, 35, 1023, 1, 0.00, 29, 1),
(5, 47, 1024, 1, 0.00, 30, 1),
(5, 47, 1025, 1, 2.00, 20, 1),
(5, 47, 1026, 1, 2.00, 21, 1),
(5, 47, 1027, 1, 0.00, 22, 1),
(5, 47, 1028, 1, 0.00, 28, 1),
(5, 47, 1029, 1, 4.00, 29, 1),
(5, 36, 1030, 1, 0.00, 30, 1),
(5, 36, 1031, 1, 2.00, 20, 1),
(5, 36, 1032, 1, 2.00, 21, 1),
(5, 36, 1033, 1, 0.00, 22, 1),
(5, 36, 1034, 1, 4.00, 28, 1),
(5, 36, 1035, 1, 4.00, 29, 1),
(5, 33, 1036, 1, 6.00, 30, 1),
(5, 33, 1037, 1, 2.00, 20, 1),
(5, 33, 1038, 1, 2.00, 21, 1),
(5, 33, 1039, 1, 2.00, 22, 1),
(5, 33, 1040, 1, 0.00, 28, 1),
(5, 33, 1041, 1, 0.00, 29, 1),
(5, 39, 1042, 1, 0.00, 30, 1),
(5, 39, 1043, 1, 2.00, 20, 1),
(5, 39, 1044, 1, 2.00, 21, 1),
(5, 39, 1045, 1, 0.00, 22, 1),
(5, 39, 1046, 1, 0.00, 28, 1),
(5, 39, 1047, 1, 4.00, 29, 1),
(5, 42, 1048, 1, 6.00, 30, 1),
(5, 42, 1049, 1, 2.00, 20, 1),
(5, 42, 1050, 1, 2.00, 21, 1),
(5, 42, 1051, 1, 2.00, 22, 1),
(5, 42, 1052, 1, 4.00, 28, 1),
(5, 42, 1053, 1, 0.00, 29, 1),
(8, 56, 1054, 1, 2.00, 32, 1),
(8, 56, 1055, 1, 0.00, 33, 1),
(8, 56, 1056, 1, 0.00, 34, 1),
(8, 56, 1057, 1, 0.00, 37, 1),
(8, 56, 1058, 1, 0.00, 31, 1),
(8, 56, 1059, 1, 1.50, 31, 1),
(8, 56, 1060, 1, 2.00, 35, 1),
(8, 56, 1061, 1, 0.00, 36, 1),
(8, 56, 1062, 1, 0.00, 38, 1),
(8, 53, 1063, 1, 2.00, 32, 1),
(8, 53, 1064, 1, 2.00, 33, 1),
(8, 53, 1065, 1, 2.00, 34, 1),
(8, 53, 1066, 1, 4.00, 37, 1),
(8, 53, 1067, 1, 1.50, 31, 1),
(8, 53, 1068, 1, 1.50, 31, 1),
(8, 53, 1069, 1, 2.00, 35, 1),
(8, 53, 1070, 1, 3.00, 36, 1),
(8, 53, 1071, 1, 2.00, 38, 1),
(8, 54, 1072, 1, 2.00, 32, 1),
(8, 54, 1073, 1, 2.00, 33, 1),
(8, 54, 1074, 1, 2.00, 34, 1),
(8, 54, 1075, 1, 4.00, 37, 1),
(8, 54, 1076, 1, 1.50, 31, 1),
(8, 54, 1077, 1, 1.50, 31, 1),
(8, 54, 1078, 1, 2.00, 35, 1),
(8, 54, 1079, 1, 0.00, 36, 1),
(8, 54, 1080, 1, 0.00, 38, 1),
(8, 80, 1081, 1, 0.00, 32, 1),
(8, 80, 1082, 1, 0.00, 33, 1),
(8, 80, 1083, 1, 0.00, 34, 1),
(8, 80, 1084, 1, 4.00, 37, 1),
(8, 80, 1085, 1, 0.00, 31, 1),
(8, 80, 1086, 1, 0.00, 31, 1),
(8, 80, 1087, 1, 2.00, 35, 1),
(8, 80, 1088, 1, 3.00, 36, 1),
(8, 80, 1089, 1, 2.00, 38, 1),
(8, 81, 1090, 1, 2.00, 32, 1),
(8, 81, 1091, 1, 0.00, 33, 1),
(8, 81, 1092, 1, 2.00, 34, 1),
(8, 81, 1093, 1, 0.00, 37, 1),
(8, 81, 1094, 1, 0.00, 31, 1),
(8, 81, 1095, 1, 1.50, 31, 1),
(8, 81, 1096, 1, 2.00, 35, 1),
(8, 81, 1097, 1, 3.00, 36, 1),
(8, 81, 1098, 1, 2.00, 38, 1),
(8, 57, 1099, 1, 0.00, 32, 1),
(8, 57, 1100, 1, 2.00, 33, 1),
(8, 57, 1101, 1, 0.00, 34, 1),
(8, 57, 1102, 1, 0.00, 37, 1),
(8, 57, 1103, 1, 1.50, 31, 1),
(8, 57, 1104, 1, 1.50, 31, 1),
(8, 57, 1105, 1, 2.00, 35, 1),
(8, 57, 1106, 1, 0.00, 36, 1),
(8, 57, 1107, 1, 2.00, 38, 1),
(8, 58, 1108, 1, 2.00, 32, 1),
(8, 58, 1109, 1, 2.00, 33, 1),
(8, 58, 1110, 1, 2.00, 34, 1),
(8, 58, 1111, 1, 0.00, 37, 1),
(8, 58, 1112, 1, 1.50, 31, 1),
(8, 58, 1113, 1, 1.50, 31, 1),
(8, 58, 1114, 1, 2.00, 35, 1),
(8, 58, 1115, 1, 3.00, 36, 1),
(8, 58, 1116, 1, 2.00, 38, 1),
(9, 52, 1117, 1, 0.00, 40, 1),
(9, 52, 1118, 1, 0.00, 41, 1),
(9, 52, 1119, 1, 4.00, 42, 1),
(9, 52, 1120, 1, 0.00, 22, 1),
(9, 52, 1121, 1, 0.00, 28, 1),
(9, 52, 1122, 1, 2.00, 29, 1),
(9, 52, 1123, 1, 0.00, 39, 1),
(9, 46, 1124, 1, 0.00, 40, 1),
(9, 46, 1125, 1, 0.00, 41, 1),
(9, 46, 1126, 1, 4.00, 42, 1),
(9, 46, 1127, 1, 0.00, 22, 1),
(9, 46, 1128, 1, 0.00, 28, 1),
(9, 46, 1129, 1, 2.00, 29, 1),
(9, 46, 1130, 1, 0.00, 39, 1),
(9, 41, 1131, 1, 4.00, 40, 1),
(9, 41, 1132, 1, 0.00, 41, 1),
(9, 41, 1133, 1, 4.00, 42, 1),
(9, 41, 1134, 1, 0.00, 22, 1),
(9, 41, 1135, 1, 2.00, 28, 1),
(9, 41, 1136, 1, 2.00, 29, 1),
(9, 41, 1137, 1, 0.00, 39, 1),
(9, 49, 1138, 1, 0.00, 40, 1),
(9, 49, 1139, 1, 0.00, 41, 1),
(9, 49, 1140, 1, 0.00, 42, 1),
(9, 49, 1141, 1, 0.00, 22, 1),
(9, 49, 1142, 1, 0.00, 28, 1),
(9, 49, 1143, 1, 0.00, 29, 1),
(9, 49, 1144, 1, 0.00, 39, 1),
(9, 37, 1145, 1, 4.00, 40, 1),
(9, 37, 1146, 1, 0.00, 41, 1),
(9, 37, 1147, 1, 4.00, 42, 1),
(9, 37, 1148, 1, 0.00, 22, 1),
(9, 37, 1149, 1, 2.00, 28, 1),
(9, 37, 1150, 1, 2.00, 29, 1),
(9, 37, 1151, 1, 3.00, 39, 1),
(9, 44, 1152, 1, 4.00, 40, 1),
(9, 44, 1153, 1, 0.00, 41, 1),
(9, 44, 1154, 1, 4.00, 42, 1),
(9, 44, 1155, 1, 0.00, 22, 1),
(9, 44, 1156, 1, 2.00, 28, 1),
(9, 44, 1157, 1, 2.00, 29, 1),
(9, 44, 1158, 1, 3.00, 39, 1),
(9, 34, 1159, 1, 4.00, 40, 1),
(9, 34, 1160, 1, 4.00, 41, 1),
(9, 34, 1161, 1, 4.00, 42, 1),
(9, 34, 1162, 1, 1.00, 22, 1),
(9, 34, 1163, 1, 2.00, 28, 1),
(9, 34, 1164, 1, 2.00, 29, 1),
(9, 34, 1165, 1, 0.00, 39, 1),
(9, 43, 1166, 1, 0.00, 40, 1),
(9, 43, 1167, 1, 0.00, 41, 1),
(9, 43, 1168, 1, 4.00, 42, 1),
(9, 43, 1169, 1, 1.00, 22, 1),
(9, 43, 1170, 1, 0.00, 28, 1),
(9, 43, 1171, 1, 0.00, 29, 1),
(9, 43, 1172, 1, 3.00, 39, 1),
(9, 51, 1173, 1, 0.00, 40, 1),
(9, 51, 1174, 1, 4.00, 41, 1),
(9, 51, 1175, 1, 4.00, 42, 1),
(9, 51, 1176, 1, 1.00, 22, 1),
(9, 51, 1177, 1, 0.00, 28, 1),
(9, 51, 1178, 1, 2.00, 29, 1),
(9, 51, 1179, 1, 3.00, 39, 1),
(9, 50, 1180, 1, 4.00, 40, 1),
(9, 50, 1181, 1, 0.00, 41, 1),
(9, 50, 1182, 1, 4.00, 42, 1),
(9, 50, 1183, 1, 1.00, 22, 1),
(9, 50, 1184, 1, 2.00, 28, 1),
(9, 50, 1185, 1, 2.00, 29, 1),
(9, 50, 1186, 1, 3.00, 39, 1),
(9, 40, 1187, 1, 4.00, 40, 1),
(9, 40, 1188, 1, 4.00, 41, 1),
(9, 40, 1189, 1, 4.00, 42, 1),
(9, 40, 1190, 1, 0.00, 22, 1),
(9, 40, 1191, 1, 2.00, 28, 1),
(9, 40, 1192, 1, 2.00, 29, 1),
(9, 40, 1193, 1, 3.00, 39, 1),
(9, 39, 1194, 1, 0.00, 40, 1),
(9, 39, 1195, 1, 0.00, 41, 1),
(9, 39, 1196, 1, 4.00, 42, 1),
(9, 39, 1197, 1, 0.00, 22, 1),
(9, 39, 1198, 1, 2.00, 28, 1),
(9, 39, 1199, 1, 2.00, 29, 1),
(9, 39, 1200, 1, 0.00, 39, 1),
(9, 36, 1201, 1, 0.00, 40, 1),
(9, 36, 1202, 1, 0.00, 41, 1),
(9, 36, 1203, 1, 0.00, 42, 1),
(9, 36, 1204, 1, 0.00, 22, 1),
(9, 36, 1205, 1, 2.00, 28, 1),
(9, 36, 1206, 1, 2.00, 29, 1),
(9, 36, 1207, 1, 0.00, 39, 1),
(9, 45, 1208, 1, 4.00, 40, 1),
(9, 45, 1209, 1, 0.00, 41, 1),
(9, 45, 1210, 1, 4.00, 42, 1),
(9, 45, 1211, 1, 0.00, 22, 1),
(9, 45, 1212, 1, 0.00, 28, 1),
(9, 45, 1213, 1, 0.00, 29, 1),
(9, 45, 1214, 1, 0.00, 39, 1),
(9, 47, 1215, 1, 4.00, 40, 1),
(9, 47, 1216, 1, 4.00, 41, 1),
(9, 47, 1217, 1, 4.00, 42, 1),
(9, 47, 1218, 1, 1.00, 22, 1),
(9, 47, 1219, 1, 0.00, 28, 1),
(9, 47, 1220, 1, 0.00, 29, 1),
(9, 47, 1221, 1, 0.00, 39, 1),
(9, 38, 1222, 1, 4.00, 40, 1),
(9, 38, 1223, 1, 0.00, 41, 1),
(9, 38, 1224, 1, 4.00, 42, 1),
(9, 38, 1225, 1, 0.00, 22, 1),
(9, 38, 1226, 1, 0.00, 28, 1),
(9, 38, 1227, 1, 2.00, 29, 1),
(9, 38, 1228, 1, 0.00, 39, 1),
(9, 33, 1229, 1, 0.00, 40, 1),
(9, 33, 1230, 1, 0.00, 41, 1),
(9, 33, 1231, 1, 4.00, 42, 1),
(9, 33, 1232, 1, 0.00, 22, 1),
(9, 33, 1233, 1, 0.00, 28, 1),
(9, 33, 1234, 1, 0.00, 29, 1),
(9, 33, 1235, 1, 0.00, 39, 1),
(9, 42, 1236, 1, 4.00, 40, 1),
(9, 42, 1237, 1, 4.00, 41, 1),
(9, 42, 1238, 1, 4.00, 42, 1),
(9, 42, 1239, 1, 0.00, 22, 1),
(9, 42, 1240, 1, 0.00, 28, 1),
(9, 42, 1241, 1, 0.00, 29, 1),
(9, 42, 1242, 1, 0.00, 39, 1),
(9, 42, 1243, 1, 4.00, 40, 2),
(9, 42, 1244, 1, 4.00, 41, 2),
(9, 42, 1245, 1, 4.00, 42, 2),
(9, 42, 1246, 1, 0.00, 22, 2),
(9, 42, 1247, 1, 0.00, 28, 2),
(9, 42, 1248, 1, 0.00, 29, 2),
(9, 42, 1249, 1, 0.00, 39, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_respuesta_multiple`
--

CREATE TABLE `tb_respuesta_multiple` (
  `idRespuestaMultiple` int(11) NOT NULL,
  `idRespuestaEstudiante` int(11) NOT NULL,
  `opcionSeleccionada` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_respuesta_multiple`
--

INSERT INTO `tb_respuesta_multiple` (`idRespuestaMultiple`, `idRespuestaEstudiante`, `opcionSeleccionada`, `estado`) VALUES
(183, 209, 3, 1),
(184, 210, 27, 1),
(185, 211, 7, 1),
(186, 212, 8, 1),
(187, 213, 11, 1),
(188, 214, 12, 1),
(189, 215, 15, 1),
(190, 216, 16, 1),
(191, 217, 19, 1),
(192, 218, 20, 1),
(193, 219, 23, 1),
(194, 220, 24, 1),
(195, 221, 31, 1),
(196, 222, 32, 1),
(197, 225, 3, 1),
(198, 226, 27, 1),
(199, 227, 5, 1),
(200, 228, 6, 1),
(201, 229, 9, 1),
(202, 230, 10, 1),
(203, 231, 13, 1),
(204, 232, 14, 1),
(205, 233, 17, 1),
(206, 234, 18, 1),
(207, 235, 21, 1),
(208, 236, 22, 1),
(209, 237, 29, 1),
(210, 238, 30, 1),
(211, 241, 3, 1),
(212, 242, 27, 1),
(213, 243, 7, 1),
(214, 244, 8, 1),
(215, 245, 9, 1),
(216, 246, 10, 1),
(217, 247, 14, 1),
(218, 248, 16, 1),
(219, 249, 17, 1),
(220, 250, 19, 1),
(221, 251, 21, 1),
(222, 252, 23, 1),
(223, 253, 30, 1),
(224, 254, 31, 1),
(225, 257, 3, 1),
(226, 258, 27, 1),
(227, 259, 6, 1),
(228, 260, 7, 1),
(229, 261, 9, 1),
(230, 262, 10, 1),
(231, 263, 14, 1),
(232, 264, 16, 1),
(233, 265, 18, 1),
(234, 266, 20, 1),
(235, 267, 21, 1),
(236, 268, 23, 1),
(237, 269, 30, 1),
(238, 270, 31, 1),
(239, 273, 3, 1),
(240, 274, 7, 1),
(241, 275, 9, 1),
(242, 276, 10, 1),
(243, 277, 18, 1),
(244, 278, 20, 1),
(245, 279, 23, 1),
(246, 280, 32, 1),
(247, 282, 4, 1),
(248, 283, 27, 1),
(249, 284, 6, 1),
(250, 285, 7, 1),
(251, 286, 9, 1),
(252, 287, 10, 1),
(253, 288, 14, 1),
(254, 289, 16, 1),
(255, 290, 18, 1),
(256, 291, 20, 1),
(257, 292, 21, 1),
(258, 293, 23, 1),
(259, 294, 30, 1),
(260, 295, 31, 1),
(261, 298, 3, 1),
(262, 299, 27, 1),
(263, 300, 6, 1),
(264, 301, 7, 1),
(265, 302, 9, 1),
(266, 303, 10, 1),
(267, 304, 14, 1),
(268, 305, 16, 1),
(269, 306, 18, 1),
(270, 307, 20, 1),
(271, 308, 21, 1),
(272, 309, 23, 1),
(273, 310, 30, 1),
(274, 311, 31, 1),
(275, 314, 3, 1),
(276, 315, 27, 1),
(277, 316, 6, 1),
(278, 317, 9, 1),
(279, 318, 14, 1),
(280, 319, 18, 1),
(281, 320, 21, 1),
(282, 321, 0, 1),
(283, 322, 7, 1),
(284, 323, 11, 1),
(285, 324, 16, 1),
(286, 325, 0, 1),
(287, 326, 22, 1),
(288, 327, 0, 1),
(289, 330, 3, 1),
(290, 331, 26, 1),
(291, 332, 7, 1),
(292, 333, 11, 1),
(293, 334, 15, 1),
(294, 335, 20, 1),
(295, 336, 23, 1),
(296, 337, 31, 1),
(297, 338, 0, 1),
(298, 339, 12, 1),
(299, 340, 16, 1),
(300, 341, 0, 1),
(301, 342, 0, 1),
(302, 343, 32, 1),
(303, 346, 3, 1),
(304, 347, 27, 1),
(305, 348, 7, 1),
(306, 349, 10, 1),
(307, 350, 15, 1),
(308, 351, 18, 1),
(309, 352, 22, 1),
(310, 353, 32, 1),
(311, 354, 8, 1),
(312, 355, 11, 1),
(313, 356, 0, 1),
(314, 357, 0, 1),
(315, 358, 23, 1),
(316, 359, 0, 1),
(317, 362, 3, 1),
(318, 363, 28, 1),
(319, 364, 7, 1),
(320, 365, 10, 1),
(321, 366, 15, 1),
(322, 367, 20, 1),
(323, 368, 24, 1),
(324, 369, 32, 1),
(325, 370, 0, 1),
(326, 371, 0, 1),
(327, 372, 0, 1),
(328, 373, 0, 1),
(329, 374, 0, 1),
(330, 375, 0, 1),
(331, 378, 2, 1),
(332, 379, 28, 1),
(333, 380, 6, 1),
(334, 381, 9, 1),
(335, 382, 15, 1),
(336, 383, 19, 1),
(337, 384, 22, 1),
(338, 385, 31, 1),
(339, 386, 7, 1),
(340, 387, 10, 1),
(341, 388, 0, 1),
(342, 389, 0, 1),
(343, 390, 23, 1),
(344, 391, 32, 1),
(345, 394, 3, 1),
(346, 395, 0, 1),
(347, 396, 6, 1),
(348, 397, 11, 1),
(349, 398, 0, 1),
(350, 399, 17, 1),
(351, 400, 21, 1),
(352, 401, 0, 1),
(353, 402, 0, 1),
(354, 403, 12, 1),
(355, 404, 0, 1),
(356, 405, 18, 1),
(357, 406, 22, 1),
(358, 407, 0, 1),
(359, 410, 2, 1),
(360, 411, 26, 1),
(361, 412, 6, 1),
(362, 413, 9, 1),
(363, 414, 14, 1),
(364, 415, 18, 1),
(365, 416, 0, 1),
(366, 417, 32, 1),
(367, 418, 7, 1),
(368, 419, 10, 1),
(369, 420, 15, 1),
(370, 421, 0, 1),
(371, 422, 0, 1),
(372, 423, 0, 1),
(373, 426, 38, 1),
(374, 427, 0, 1),
(375, 428, 35, 1),
(376, 429, 42, 1),
(377, 430, 45, 1),
(378, 431, 54, 1),
(379, 432, 36, 1),
(380, 433, 44, 1),
(381, 434, 47, 1),
(382, 435, 56, 1),
(383, 439, 38, 1),
(384, 440, 49, 1),
(385, 441, 35, 1),
(386, 442, 42, 1),
(387, 443, 45, 1),
(388, 444, 54, 1),
(389, 445, 36, 1),
(390, 446, 44, 1),
(391, 447, 47, 1),
(392, 448, 0, 1),
(393, 452, 38, 1),
(394, 453, 52, 1),
(395, 454, 36, 1),
(396, 455, 41, 1),
(397, 456, 46, 1),
(398, 457, 53, 1),
(399, 458, 0, 1),
(400, 459, 0, 1),
(401, 460, 0, 1),
(402, 461, 0, 1),
(403, 465, 38, 1),
(404, 466, 49, 1),
(405, 467, 35, 1),
(406, 468, 41, 1),
(407, 469, 45, 1),
(408, 470, 56, 1),
(409, 471, 0, 1),
(410, 472, 0, 1),
(411, 473, 0, 1),
(412, 474, 0, 1),
(413, 478, 38, 1),
(414, 479, 52, 1),
(415, 480, 35, 1),
(416, 481, 43, 1),
(417, 482, 45, 1),
(418, 483, 54, 1),
(419, 484, 36, 1),
(420, 485, 44, 1),
(421, 486, 47, 1),
(422, 487, 56, 1),
(423, 491, 38, 1),
(424, 492, 49, 1),
(425, 493, 34, 1),
(426, 494, 42, 1),
(427, 495, 47, 1),
(428, 496, 53, 1),
(429, 497, 35, 1),
(430, 498, 0, 1),
(431, 499, 0, 1),
(432, 500, 54, 1),
(433, 504, 38, 1),
(434, 505, 49, 1),
(435, 506, 35, 1),
(436, 507, 44, 1),
(437, 508, 46, 1),
(438, 509, 56, 1),
(439, 510, 36, 1),
(440, 511, 0, 1),
(441, 512, 0, 1),
(442, 513, 0, 1),
(443, 517, 38, 1),
(444, 518, 50, 1),
(445, 519, 34, 1),
(446, 520, 42, 1),
(447, 521, 46, 1),
(448, 522, 55, 1),
(449, 523, 35, 1),
(450, 524, 43, 1),
(451, 525, 47, 1),
(452, 526, 56, 1),
(453, 530, 38, 1),
(454, 531, 49, 1),
(455, 532, 35, 1),
(456, 533, 41, 1),
(457, 534, 45, 1),
(458, 535, 54, 1),
(459, 536, 36, 1),
(460, 537, 42, 1),
(461, 538, 47, 1),
(462, 539, 56, 1),
(463, 543, 38, 1),
(464, 544, 51, 1),
(465, 545, 35, 1),
(466, 546, 44, 1),
(467, 547, 45, 1),
(468, 548, 53, 1),
(469, 549, 0, 1),
(470, 550, 0, 1),
(471, 551, 0, 1),
(472, 552, 0, 1),
(473, 556, 38, 1),
(474, 557, 51, 1),
(475, 558, 35, 1),
(476, 559, 44, 1),
(477, 560, 45, 1),
(478, 561, 53, 1),
(479, 562, 0, 1),
(480, 563, 0, 1),
(481, 564, 0, 1),
(482, 565, 0, 1),
(483, 569, 3, 1),
(484, 570, 27, 1),
(485, 571, 6, 1),
(486, 572, 10, 1),
(487, 573, 14, 1),
(488, 574, 18, 1),
(489, 575, 21, 1),
(490, 576, 30, 1),
(491, 577, 0, 1),
(492, 578, 0, 1),
(493, 579, 0, 1),
(494, 580, 20, 1),
(495, 581, 0, 1),
(496, 582, 31, 1),
(497, 585, 2, 1),
(498, 586, 25, 1),
(499, 587, 6, 1),
(500, 588, 10, 1),
(501, 589, 13, 1),
(502, 590, 17, 1),
(503, 591, 21, 1),
(504, 592, 30, 1),
(505, 593, 0, 1),
(506, 594, 0, 1),
(507, 595, 0, 1),
(508, 596, 0, 1),
(509, 597, 0, 1),
(510, 598, 0, 1),
(511, 601, 3, 1),
(512, 602, 25, 1),
(513, 603, 6, 1),
(514, 604, 10, 1),
(515, 605, 13, 1),
(516, 606, 18, 1),
(517, 607, 21, 1),
(518, 608, 29, 1),
(519, 609, 7, 1),
(520, 610, 12, 1),
(521, 611, 0, 1),
(522, 612, 0, 1),
(523, 613, 0, 1),
(524, 614, 0, 1),
(525, 617, 3, 1),
(526, 618, 26, 1),
(527, 619, 0, 1),
(528, 620, 10, 1),
(529, 621, 13, 1),
(530, 622, 18, 1),
(531, 623, 21, 1),
(532, 624, 29, 1),
(533, 625, 0, 1),
(534, 626, 12, 1),
(535, 627, 15, 1),
(536, 628, 20, 1),
(537, 629, 22, 1),
(538, 630, 0, 1),
(539, 633, 3, 1),
(540, 634, 28, 1),
(541, 635, 7, 1),
(542, 636, 10, 1),
(543, 637, 16, 1),
(544, 638, 17, 1),
(545, 639, 24, 1),
(546, 640, 31, 1),
(547, 641, 0, 1),
(548, 642, 0, 1),
(549, 643, 0, 1),
(550, 644, 0, 1),
(551, 645, 0, 1),
(552, 646, 0, 1),
(553, 649, 3, 1),
(554, 650, 25, 1),
(555, 651, 6, 1),
(556, 652, 10, 1),
(557, 653, 13, 1),
(558, 654, 18, 1),
(559, 655, 21, 1),
(560, 656, 32, 1),
(561, 657, 0, 1),
(562, 658, 0, 1),
(563, 659, 0, 1),
(564, 660, 0, 1),
(565, 661, 0, 1),
(566, 662, 0, 1),
(567, 665, 3, 1),
(568, 666, 26, 1),
(569, 667, 7, 1),
(570, 668, 10, 1),
(571, 669, 13, 1),
(572, 670, 20, 1),
(573, 671, 21, 1),
(574, 672, 29, 1),
(575, 673, 0, 1),
(576, 674, 0, 1),
(577, 675, 0, 1),
(578, 676, 0, 1),
(579, 677, 0, 1),
(580, 678, 0, 1),
(581, 681, 3, 1),
(582, 682, 28, 1),
(583, 683, 6, 1),
(584, 684, 10, 1),
(585, 685, 13, 1),
(586, 686, 18, 1),
(587, 687, 21, 1),
(588, 688, 30, 1),
(589, 689, 0, 1),
(590, 690, 0, 1),
(591, 691, 0, 1),
(592, 692, 20, 1),
(593, 693, 0, 1),
(594, 694, 31, 1),
(595, 697, 3, 1),
(596, 698, 25, 1),
(597, 699, 6, 1),
(598, 700, 10, 1),
(599, 701, 14, 1),
(600, 702, 18, 1),
(601, 703, 21, 1),
(602, 704, 30, 1),
(603, 705, 7, 1),
(604, 706, 12, 1),
(605, 707, 16, 1),
(606, 708, 0, 1),
(607, 709, 22, 1),
(608, 710, 31, 1),
(609, 713, 3, 1),
(610, 714, 28, 1),
(611, 715, 6, 1),
(612, 716, 10, 1),
(613, 717, 15, 1),
(614, 718, 17, 1),
(615, 719, 21, 1),
(616, 720, 30, 1),
(617, 721, 8, 1),
(618, 722, 12, 1),
(619, 723, 16, 1),
(620, 724, 20, 1),
(621, 725, 22, 1),
(622, 726, 31, 1),
(623, 729, 3, 1),
(624, 730, 0, 1),
(625, 731, 6, 1),
(626, 732, 10, 1),
(627, 733, 15, 1),
(628, 734, 0, 1),
(629, 735, 0, 1),
(630, 736, 0, 1),
(631, 737, 7, 1),
(632, 738, 12, 1),
(633, 739, 16, 1),
(634, 740, 0, 1),
(635, 741, 0, 1),
(636, 742, 0, 1),
(637, 745, 3, 1),
(638, 746, 28, 1),
(639, 747, 6, 1),
(640, 748, 10, 1),
(641, 749, 16, 1),
(642, 750, 18, 1),
(643, 751, 21, 1),
(644, 752, 29, 1),
(645, 753, 7, 1),
(646, 754, 0, 1),
(647, 755, 0, 1),
(648, 756, 20, 1),
(649, 757, 0, 1),
(650, 758, 0, 1),
(651, 761, 3, 1),
(652, 762, 25, 1),
(653, 763, 6, 1),
(654, 764, 12, 1),
(655, 765, 16, 1),
(656, 766, 20, 1),
(657, 767, 21, 1),
(658, 768, 29, 1),
(659, 769, 7, 1),
(660, 770, 0, 1),
(661, 771, 0, 1),
(662, 772, 0, 1),
(663, 773, 0, 1),
(664, 774, 32, 1),
(665, 777, 3, 1),
(666, 778, 27, 1),
(667, 779, 7, 1),
(668, 780, 10, 1),
(669, 781, 13, 1),
(670, 782, 18, 1),
(671, 783, 21, 1),
(672, 784, 30, 1),
(673, 785, 8, 1),
(674, 786, 12, 1),
(675, 787, 14, 1),
(676, 788, 20, 1),
(677, 789, 3, 1),
(678, 790, 23, 1),
(679, 791, 28, 1),
(680, 792, 31, 1),
(681, 793, 6, 1),
(682, 795, 10, 1),
(683, 797, 14, 1),
(684, 798, 17, 1),
(685, 799, 21, 1),
(686, 800, 30, 1),
(687, 801, 7, 1),
(688, 802, 12, 1),
(689, 803, 0, 1),
(690, 804, 20, 1),
(691, 805, 23, 1),
(692, 806, 31, 1),
(693, 809, 3, 1),
(694, 810, 25, 1),
(695, 811, 6, 1),
(696, 812, 9, 1),
(697, 813, 15, 1),
(698, 814, 18, 1),
(699, 815, 21, 1),
(700, 816, 32, 1),
(701, 817, 7, 1),
(702, 818, 12, 1),
(703, 819, 16, 1),
(704, 820, 0, 1),
(705, 821, 22, 1),
(706, 822, 0, 1),
(707, 825, 3, 1),
(708, 826, 27, 1),
(709, 827, 8, 1),
(710, 828, 12, 1),
(711, 829, 16, 1),
(712, 830, 17, 1),
(713, 831, 21, 1),
(714, 832, 30, 1),
(715, 833, 0, 1),
(716, 834, 0, 1),
(717, 835, 0, 1),
(718, 836, 20, 1),
(719, 837, 22, 1),
(720, 838, 31, 1),
(721, 841, 3, 1),
(722, 842, 26, 1),
(723, 843, 6, 1),
(724, 844, 9, 1),
(725, 845, 13, 1),
(726, 846, 18, 1),
(727, 847, 21, 1),
(728, 848, 30, 1),
(729, 849, 7, 1),
(730, 850, 10, 1),
(731, 851, 15, 1),
(732, 852, 0, 1),
(733, 853, 24, 1),
(734, 854, 31, 1),
(735, 857, 62, 1),
(736, 858, 72, 1),
(737, 859, 45, 1),
(738, 860, 58, 1),
(739, 861, 47, 1),
(740, 862, 60, 1),
(741, 864, 62, 1),
(742, 865, 72, 1),
(743, 866, 45, 1),
(744, 867, 60, 1),
(745, 868, 47, 1),
(746, 869, 0, 1),
(747, 871, 62, 1),
(748, 872, 72, 1),
(749, 873, 45, 1),
(750, 874, 58, 1),
(751, 875, 47, 1),
(752, 876, 60, 1),
(753, 878, 62, 1),
(754, 879, 72, 1),
(755, 880, 46, 1),
(756, 881, 60, 1),
(757, 882, 0, 1),
(758, 883, 0, 1),
(759, 885, 62, 1),
(760, 886, 71, 1),
(761, 887, 45, 1),
(762, 888, 57, 1),
(763, 889, 46, 1),
(764, 890, 60, 1),
(765, 892, 62, 1),
(766, 893, 69, 1),
(767, 894, 46, 1),
(768, 895, 60, 1),
(769, 896, 0, 1),
(770, 897, 0, 1),
(771, 899, 62, 1),
(772, 900, 69, 1),
(773, 901, 46, 1),
(774, 902, 60, 1),
(775, 903, 0, 1),
(776, 904, 0, 1),
(777, 906, 62, 1),
(778, 907, 72, 1),
(779, 908, 46, 1),
(780, 909, 60, 1),
(781, 910, 0, 1),
(782, 911, 0, 1),
(783, 913, 62, 1),
(784, 914, 72, 1),
(785, 915, 45, 1),
(786, 916, 58, 1),
(787, 917, 47, 1),
(788, 918, 60, 1),
(789, 920, 62, 1),
(790, 921, 72, 1),
(791, 922, 45, 1),
(792, 923, 58, 1),
(793, 924, 47, 1),
(794, 925, 60, 1),
(795, 927, 62, 1),
(796, 928, 0, 1),
(797, 929, 46, 1),
(798, 930, 58, 1),
(799, 931, 47, 1),
(800, 932, 59, 1),
(801, 934, 76, 1),
(802, 940, 73, 1),
(803, 946, 75, 1),
(804, 952, 73, 1),
(805, 958, 73, 1),
(806, 964, 74, 1),
(807, 970, 73, 1),
(808, 976, 73, 1),
(809, 982, 73, 1),
(810, 988, 75, 1),
(811, 994, 76, 1),
(812, 1000, 73, 1),
(813, 1006, 75, 1),
(814, 1012, 75, 1),
(815, 1018, 73, 1),
(816, 1024, 73, 1),
(817, 1030, 73, 1),
(818, 1036, 75, 1),
(819, 1042, 74, 1),
(820, 1048, 75, 1),
(821, 1054, 83, 1),
(822, 1055, 85, 1),
(823, 1056, 92, 1),
(824, 1057, 96, 1),
(825, 1058, 77, 1),
(826, 1059, 79, 1),
(827, 1063, 83, 1),
(828, 1064, 88, 1),
(829, 1065, 89, 1),
(830, 1066, 95, 1),
(831, 1067, 78, 1),
(832, 1068, 79, 1),
(833, 1072, 83, 1),
(834, 1073, 88, 1),
(835, 1074, 89, 1),
(836, 1075, 95, 1),
(837, 1076, 78, 1),
(838, 1077, 79, 1),
(839, 1081, 84, 1),
(840, 1082, 85, 1),
(841, 1083, 90, 1),
(842, 1084, 95, 1),
(843, 1085, 77, 1),
(844, 1086, 0, 1),
(845, 1090, 83, 1),
(846, 1091, 85, 1),
(847, 1092, 89, 1),
(848, 1093, 94, 1),
(849, 1094, 77, 1),
(850, 1095, 79, 1),
(851, 1099, 81, 1),
(852, 1100, 88, 1),
(853, 1101, 92, 1),
(854, 1102, 94, 1),
(855, 1103, 78, 1),
(856, 1104, 79, 1),
(857, 1108, 83, 1),
(858, 1109, 88, 1),
(859, 1110, 89, 1),
(860, 1111, 94, 1),
(861, 1112, 78, 1),
(862, 1113, 79, 1),
(863, 1117, 97, 1),
(864, 1118, 102, 1),
(865, 1119, 106, 1),
(866, 1124, 97, 1),
(867, 1125, 101, 1),
(868, 1126, 106, 1),
(869, 1131, 99, 1),
(870, 1132, 102, 1),
(871, 1133, 106, 1),
(872, 1138, 97, 1),
(873, 1139, 103, 1),
(874, 1140, 107, 1),
(875, 1145, 99, 1),
(876, 1146, 103, 1),
(877, 1147, 106, 1),
(878, 1152, 99, 1),
(879, 1153, 101, 1),
(880, 1154, 106, 1),
(881, 1159, 99, 1),
(882, 1160, 104, 1),
(883, 1161, 106, 1),
(884, 1166, 97, 1),
(885, 1167, 101, 1),
(886, 1168, 106, 1),
(887, 1173, 97, 1),
(888, 1174, 104, 1),
(889, 1175, 106, 1),
(890, 1180, 99, 1),
(891, 1181, 103, 1),
(892, 1182, 106, 1),
(893, 1187, 99, 1),
(894, 1188, 104, 1),
(895, 1189, 106, 1),
(896, 1194, 100, 1),
(897, 1195, 103, 1),
(898, 1196, 106, 1),
(899, 1201, 97, 1),
(900, 1202, 101, 1),
(901, 1203, 108, 1),
(902, 1208, 99, 1),
(903, 1209, 103, 1),
(904, 1210, 106, 1),
(905, 1215, 99, 1),
(906, 1216, 104, 1),
(907, 1217, 106, 1),
(908, 1222, 99, 1),
(909, 1223, 101, 1),
(910, 1224, 106, 1),
(911, 1229, 98, 1),
(912, 1230, 101, 1),
(913, 1231, 106, 1),
(914, 1236, 99, 1),
(915, 1237, 104, 1),
(916, 1238, 106, 1),
(917, 1243, 99, 1),
(918, 1244, 104, 1),
(919, 1245, 106, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_respuesta_numerica`
--

CREATE TABLE `tb_respuesta_numerica` (
  `idRespuestaNumerica` int(11) NOT NULL,
  `idRespuestaEstudiante` int(11) NOT NULL,
  `respuesta` decimal(9,2) DEFAULT NULL,
  `pesoPuntaje` decimal(3,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_respuesta_vf`
--

CREATE TABLE `tb_respuesta_vf` (
  `idRespuestaVF` int(11) NOT NULL,
  `idRespuestaEstudiante` int(11) NOT NULL,
  `opcionSeleccionada` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_respuesta_vf`
--

INSERT INTO `tb_respuesta_vf` (`idRespuestaVF`, `idRespuestaEstudiante`, `opcionSeleccionada`, `estado`) VALUES
(27, 223, 1, 1),
(28, 224, 0, 1),
(29, 239, 1, 1),
(30, 240, 1, 1),
(31, 255, 1, 1),
(32, 256, 1, 1),
(33, 271, 1, 1),
(34, 272, 1, 1),
(35, 281, 1, 1),
(36, 296, 0, 1),
(37, 297, 1, 1),
(38, 312, 0, 1),
(39, 313, 1, 1),
(40, 328, 1, 1),
(41, 329, 0, 1),
(42, 344, 1, 1),
(43, 345, 0, 1),
(44, 360, 1, 1),
(45, 361, 0, 1),
(46, 376, 0, 1),
(47, 377, 1, 1),
(48, 392, 1, 1),
(49, 393, 0, 1),
(50, 408, 0, 1),
(51, 409, 1, 1),
(52, 424, 0, 1),
(53, 425, 1, 1),
(54, 436, 1, 1),
(55, 437, 1, 1),
(56, 438, 0, 1),
(57, 449, 1, 1),
(58, 450, 1, 1),
(59, 451, 0, 1),
(60, 462, 0, 1),
(61, 463, 0, 1),
(62, 464, 1, 1),
(63, 475, 1, 1),
(64, 476, 1, 1),
(65, 477, 0, 1),
(66, 488, 1, 1),
(67, 489, 1, 1),
(68, 490, 0, 1),
(69, 501, 1, 1),
(70, 502, 1, 1),
(71, 503, 1, 1),
(72, 514, 1, 1),
(73, 515, 0, 1),
(74, 516, 0, 1),
(75, 527, 1, 1),
(76, 528, 0, 1),
(77, 529, 0, 1),
(78, 540, 1, 1),
(79, 541, 0, 1),
(80, 542, 0, 1),
(81, 553, 1, 1),
(82, 554, 0, 1),
(83, 555, 0, 1),
(84, 566, 1, 1),
(85, 567, 0, 1),
(86, 568, 0, 1),
(87, 583, 1, 1),
(88, 584, 1, 1),
(89, 599, 0, 1),
(90, 600, 1, 1),
(91, 615, 0, 1),
(92, 616, 1, 1),
(93, 631, 0, 1),
(94, 632, 1, 1),
(95, 647, 0, 1),
(96, 648, 1, 1),
(97, 663, 0, 1),
(98, 664, 1, 1),
(99, 679, 1, 1),
(100, 680, 0, 1),
(101, 695, 1, 1),
(102, 696, 1, 1),
(103, 711, 1, 1),
(104, 712, 0, 1),
(105, 727, 1, 1),
(106, 728, 1, 1),
(107, 743, 2, 1),
(108, 744, 2, 1),
(109, 759, 0, 1),
(110, 760, 1, 1),
(111, 775, 0, 1),
(112, 776, 0, 1),
(113, 794, 1, 1),
(114, 796, 0, 1),
(115, 807, 1, 1),
(116, 808, 0, 1),
(117, 823, 1, 1),
(118, 824, 0, 1),
(119, 839, 1, 1),
(120, 840, 0, 1),
(121, 855, 1, 1),
(122, 856, 1, 1),
(123, 863, 1, 1),
(124, 870, 1, 1),
(125, 877, 1, 1),
(126, 884, 1, 1),
(127, 891, 1, 1),
(128, 898, 2, 1),
(129, 905, 2, 1),
(130, 912, 1, 1),
(131, 919, 1, 1),
(132, 926, 2, 1),
(133, 933, 2, 1),
(134, 935, 0, 1),
(135, 936, 1, 1),
(136, 937, 0, 1),
(137, 938, 1, 1),
(138, 939, 0, 1),
(139, 941, 0, 1),
(140, 942, 1, 1),
(141, 943, 1, 1),
(142, 944, 0, 1),
(143, 945, 1, 1),
(144, 947, 0, 1),
(145, 948, 1, 1),
(146, 949, 0, 1),
(147, 950, 0, 1),
(148, 951, 0, 1),
(149, 953, 1, 1),
(150, 954, 1, 1),
(151, 955, 0, 1),
(152, 956, 0, 1),
(153, 957, 1, 1),
(154, 959, 0, 1),
(155, 960, 1, 1),
(156, 961, 0, 1),
(157, 962, 0, 1),
(158, 963, 1, 1),
(159, 965, 0, 1),
(160, 966, 0, 1),
(161, 967, 1, 1),
(162, 968, 1, 1),
(163, 969, 1, 1),
(164, 971, 1, 1),
(165, 972, 1, 1),
(166, 973, 1, 1),
(167, 974, 0, 1),
(168, 975, 0, 1),
(169, 977, 0, 1),
(170, 978, 1, 1),
(171, 979, 1, 1),
(172, 980, 1, 1),
(173, 981, 1, 1),
(174, 983, 1, 1),
(175, 984, 1, 1),
(176, 985, 0, 1),
(177, 986, 1, 1),
(178, 987, 0, 1),
(179, 989, 0, 1),
(180, 990, 1, 1),
(181, 991, 0, 1),
(182, 992, 1, 1),
(183, 993, 1, 1),
(184, 995, 0, 1),
(185, 996, 1, 1),
(186, 997, 0, 1),
(187, 998, 1, 1),
(188, 999, 1, 1),
(189, 1001, 0, 1),
(190, 1002, 1, 1),
(191, 1003, 0, 1),
(192, 1004, 1, 1),
(193, 1005, 0, 1),
(194, 1007, 0, 1),
(195, 1008, 1, 1),
(196, 1009, 1, 1),
(197, 1010, 1, 1),
(198, 1011, 1, 1),
(199, 1013, 0, 1),
(200, 1014, 1, 1),
(201, 1015, 1, 1),
(202, 1016, 1, 1),
(203, 1017, 0, 1),
(204, 1019, 0, 1),
(205, 1020, 1, 1),
(206, 1021, 0, 1),
(207, 1022, 0, 1),
(208, 1023, 1, 1),
(209, 1025, 0, 1),
(210, 1026, 1, 1),
(211, 1027, 1, 1),
(212, 1028, 1, 1),
(213, 1029, 0, 1),
(214, 1031, 0, 1),
(215, 1032, 1, 1),
(216, 1033, 1, 1),
(217, 1034, 0, 1),
(218, 1035, 0, 1),
(219, 1037, 0, 1),
(220, 1038, 1, 1),
(221, 1039, 0, 1),
(222, 1040, 1, 1),
(223, 1041, 1, 1),
(224, 1043, 0, 1),
(225, 1044, 1, 1),
(226, 1045, 1, 1),
(227, 1046, 1, 1),
(228, 1047, 0, 1),
(229, 1049, 0, 1),
(230, 1050, 1, 1),
(231, 1051, 0, 1),
(232, 1052, 0, 1),
(233, 1053, 1, 1),
(234, 1060, 1, 1),
(235, 1061, 1, 1),
(236, 1062, 1, 1),
(237, 1069, 1, 1),
(238, 1070, 0, 1),
(239, 1071, 0, 1),
(240, 1078, 1, 1),
(241, 1079, 1, 1),
(242, 1080, 1, 1),
(243, 1087, 1, 1),
(244, 1088, 0, 1),
(245, 1089, 0, 1),
(246, 1096, 1, 1),
(247, 1097, 0, 1),
(248, 1098, 0, 1),
(249, 1105, 1, 1),
(250, 1106, 1, 1),
(251, 1107, 0, 1),
(252, 1114, 1, 1),
(253, 1115, 0, 1),
(254, 1116, 0, 1),
(255, 1120, 2, 1),
(256, 1121, 1, 1),
(257, 1122, 0, 1),
(258, 1123, 1, 1),
(259, 1127, 1, 1),
(260, 1128, 1, 1),
(261, 1129, 0, 1),
(262, 1130, 1, 1),
(263, 1134, 1, 1),
(264, 1135, 0, 1),
(265, 1136, 0, 1),
(266, 1137, 1, 1),
(267, 1141, 1, 1),
(268, 1142, 1, 1),
(269, 1143, 1, 1),
(270, 1144, 1, 1),
(271, 1148, 1, 1),
(272, 1149, 0, 1),
(273, 1150, 0, 1),
(274, 1151, 0, 1),
(275, 1155, 1, 1),
(276, 1156, 0, 1),
(277, 1157, 0, 1),
(278, 1158, 0, 1),
(279, 1162, 0, 1),
(280, 1163, 0, 1),
(281, 1164, 0, 1),
(282, 1165, 1, 1),
(283, 1169, 0, 1),
(284, 1170, 1, 1),
(285, 1171, 1, 1),
(286, 1172, 0, 1),
(287, 1176, 0, 1),
(288, 1177, 1, 1),
(289, 1178, 0, 1),
(290, 1179, 0, 1),
(291, 1183, 0, 1),
(292, 1184, 0, 1),
(293, 1185, 0, 1),
(294, 1186, 0, 1),
(295, 1190, 1, 1),
(296, 1191, 0, 1),
(297, 1192, 0, 1),
(298, 1193, 0, 1),
(299, 1197, 2, 1),
(300, 1198, 0, 1),
(301, 1199, 0, 1),
(302, 1200, 1, 1),
(303, 1204, 1, 1),
(304, 1205, 0, 1),
(305, 1206, 0, 1),
(306, 1207, 1, 1),
(307, 1211, 1, 1),
(308, 1212, 1, 1),
(309, 1213, 1, 1),
(310, 1214, 1, 1),
(311, 1218, 0, 1),
(312, 1219, 1, 1),
(313, 1220, 1, 1),
(314, 1221, 1, 1),
(315, 1225, 1, 1),
(316, 1226, 1, 1),
(317, 1227, 0, 1),
(318, 1228, 1, 1),
(319, 1232, 1, 1),
(320, 1233, 1, 1),
(321, 1234, 1, 1),
(322, 1235, 1, 1),
(323, 1239, 1, 1),
(324, 1240, 1, 1),
(325, 1241, 1, 1),
(326, 1242, 1, 1),
(327, 1246, 1, 1),
(328, 1247, 1, 1),
(329, 1248, 1, 1),
(330, 1249, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rol`
--

CREATE TABLE `tb_rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(20) DEFAULT NULL,
  `estadoRol` tinyint(4) DEFAULT NULL,
  `slug` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_rol`
--

INSERT INTO `tb_rol` (`idRol`, `nombreRol`, `estadoRol`, `slug`) VALUES
(1, 'Administrador', 1, 'admin'),
(2, 'Docente', 1, 'teacher'),
(3, 'Coordinador', 1, 'coach'),
(4, 'Psicologo', 1, 'psychologist'),
(5, 'Psicologo/Docente', 1, 'teacher-psychologist'),
(6, 'Estudiante', 1, 'student'),
(7, 'Secretaria', 1, 'secretary');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rpta_corta_estudiante`
--

CREATE TABLE `tb_rpta_corta_estudiante` (
  `idRespuestaCorta` int(11) NOT NULL,
  `idRespuestaEstudiante` int(11) NOT NULL,
  `respuesta` varchar(300) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `pesoPuntaje` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rpta_emparejamiento`
--

CREATE TABLE `tb_rpta_emparejamiento` (
  `idRptaEmparejamiento` int(11) NOT NULL,
  `idRespuestaEstudiante` int(11) NOT NULL,
  `numeroPregunta` int(11) DEFAULT NULL,
  `numeroRespuesta` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seccion`
--

CREATE TABLE `tb_seccion` (
  `idSeccion` int(11) NOT NULL,
  `idGrado` int(11) NOT NULL,
  `desSeccion` varchar(20) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_seccion`
--

INSERT INTO `tb_seccion` (`idSeccion`, `idGrado`, `desSeccion`, `fechaCreacion`) VALUES
(1, 1, 'Inicial IIA - 2021', '2021-01-15'),
(2, 2, 'Inicial IIIA - 2021', '2021-01-15'),
(3, 2, 'Inicial IIIB - 2021', '2021-01-15'),
(4, 3, 'Inicial IVA - 2021', '2021-01-15'),
(5, 3, 'Inicial IVB - 2021', '2021-01-15'),
(6, 4, 'Inicial VA - 2021', '2021-01-15'),
(7, 4, 'Inicial VB - 2021', '2021-01-15'),
(8, 5, '1ro A - Prim - 2021', '2021-01-15'),
(9, 6, '2do A - Prim - 2021', '2021-01-15'),
(10, 7, '3ro A - Prim - 2021', '2021-01-15'),
(11, 8, '4to A - Prim - 2021', '2021-01-15'),
(12, 9, '5to A - Prim - 2021', '2021-01-15'),
(13, 10, '6to A - Prim - 2021', '2021-01-15'),
(14, 1, 'Inicial IIA - 2022', '2022-01-15'),
(15, 2, 'Inicial IIIA - 2022', '2022-01-15'),
(16, 2, 'Inicial IIIB - 2022', '2022-01-15'),
(17, 3, 'Inicial IVA - 2022', '2022-01-15'),
(18, 3, 'Inicial IVB - 2022', '2022-01-15'),
(19, 4, 'Inicial VA - 2022', '2022-01-15'),
(20, 4, 'Inicial VB - 2022', '2022-01-15'),
(21, 5, '1ro A - Prim - 2022', '2022-01-15'),
(22, 6, '2do A - Prim - 2022', '2022-01-15'),
(23, 7, '3ro A - Prim - 2022', '2022-01-15'),
(24, 8, '4to A - Prim - 2022', '2022-01-15'),
(25, 9, '5to A - Prim - 2022', '2022-01-15'),
(26, 10, '6to A - Prim - 2022', '2022-01-15'),
(27, 1, 'Inicial IIA - 2023', '2023-01-15'),
(28, 2, 'Inicial IIIA - 2023', '2023-01-15'),
(29, 2, 'Inicial IIIB - 2023', '2023-01-15'),
(30, 3, 'Inicial IVA - 2023', '2023-01-15'),
(31, 3, 'Inicial IVB - 2023', '2023-01-15'),
(32, 4, 'Inicial VA - 2023', '2023-01-15'),
(33, 4, 'Inicial VB - 2023', '2023-01-15'),
(34, 5, '1ro A - Prim - 2023', '2023-01-15'),
(35, 6, '2do A - Prim - 2023', '2023-01-15'),
(36, 7, '3ro A - Prim - 2023', '2023-01-15'),
(37, 7, '3ro B - Prim - 2023', '2023-01-15'),
(38, 8, '4to A - Prim - 2023', '2023-01-15'),
(39, 9, '5to A - Prim - 2023', '2023-01-15'),
(40, 10, '6to A - Prim - 2023', '2023-01-15'),
(41, 1, 'Inicial IIA - 2024', '2024-01-02'),
(42, 2, 'Inicial IIIA - 2024', '2024-01-02'),
(43, 2, 'Inicial IIIB - 2024', '2024-01-02'),
(44, 3, 'Inicial IVA - 2024', '2024-01-02'),
(45, 3, 'Inicial IVB - 2024', '2024-01-02'),
(46, 4, 'Inicial VA - 2024', '2024-01-02'),
(47, 5, '1ro A - Prim - 2024', '2024-01-02'),
(48, 6, '2do A - Prim - 2024', '2024-01-02'),
(49, 7, '3ro A - Prim - 2024', '2024-01-02'),
(50, 8, '4to A - Prim - 2024', '2024-01-02'),
(51, 9, '5to A - Prim - 2024', '2024-01-02'),
(52, 10, '6to A - Prim - 2024', '2024-01-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sub_opc_multiple`
--

CREATE TABLE `tb_sub_opc_multiple` (
  `idSubOpcMultiple` int(11) NOT NULL,
  `idOpcionMultiple` int(11) NOT NULL,
  `eleccion` varchar(200) DEFAULT NULL,
  `pesoOpcion` decimal(4,2) DEFAULT NULL,
  `retroalimentacion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_sub_opc_multiple`
--

INSERT INTO `tb_sub_opc_multiple` (`idSubOpcMultiple`, `idOpcionMultiple`, `eleccion`, `pesoOpcion`, `retroalimentacion`) VALUES
(1, 1, 'presionar el boton F5 varias veces para que actualice', 0.00, 'No'),
(2, 1, 'presionar el boton ENTER para que cargue mÃ¡s rapido', 0.00, 'No'),
(3, 1, 'esperar y no presionar nada hasta que cargue el sistema y las aplicaciones', 1.00, 'correcto'),
(4, 1, 'presionar ENTER y F5 para que cargue el sistema y las aplicaciones', 0.00, 'no'),
(5, 2, 'comer y beber lÃ­quidos para estar hidratado y alimentado', 0.00, 'no'),
(6, 2, 'evitar comer cerca a la computadora', 0.50, 'correcto'),
(7, 2, 'evitar beber llÃ­quidos junto a la computadora', 0.50, 'correcto'),
(8, 2, 'esperar que cargue el sistema y las aplicaciones', 0.00, 'no'),
(9, 3, 'es la barra espaciadora y sirve para dar espacioes de lÃ­nea', 0.00, 'no'),
(10, 3, 'es la tecla enter y sirve para introducir un mandato u orden en las aplicaciones', 0.50, 'correcto'),
(11, 3, 'es la tecla enter y sirve para activar mayÃºsculas', 0.00, 'no'),
(12, 3, 'es la tecla enter y en el procesador de textos sirve para saltar de lÃ­nea', 0.50, 'correcto'),
(13, 4, 'es la tecla control y sirve para activar mayÃºsculas', 0.00, ''),
(14, 4, 'es la tecla shift y sirve para mostrar los simbolos que se encuentra encima de los numeros', 0.50, ''),
(15, 4, 'es la tecla shift y sirve para activar el bloque mayÃºsculas', 0.00, ''),
(16, 4, 'si mantenemos presionado esta tecla shift todas las letras se escribirÃ¡n en mayÃºscula o minÃºsculas', 0.50, ''),
(17, 5, 'Si pulsamos ambas teclas se ejecuta el procesador de textos Microsoft Word', 0.00, ''),
(18, 5, 'si pulsamos ambas teclas se ejecuta el explorador de archivos', 0.50, ''),
(19, 5, 'la combinacion de teclas se llaman CONTROL + E', 0.00, ''),
(20, 5, 'la combinacion de teclas se llaman WINDOWS + E', 0.50, ''),
(21, 6, 'representa al explorador de archivos', 0.50, 'no'),
(22, 6, 'representa a una carpeta', 0.00, ''),
(23, 6, 'representa a un software del sistema', 0.50, ''),
(24, 6, 'representa a una hardware del sistema', 0.00, ''),
(25, 7, 'Lo que podemos ver y tocar como el teclado o el mouse', 0.00, ''),
(26, 7, 'una carpeta donde podemos guardar nuestra informaciÃ³n', 0.00, ''),
(27, 7, 'las aplicaciones o programas como Microsoft Word, Windows entre otros', 1.00, ''),
(28, 7, 'lo que no podemos tocar de la computadora como el sonido y el video', 0.00, ''),
(29, 8, 'la memoria RAM', 0.00, 'no'),
(30, 8, 'el power point', 0.50, 'correcto'),
(31, 8, 'el documento de Word', 0.00, 'incorrecto'),
(32, 8, 'el procesador de textos Word', 0.50, 'correcto'),
(33, 9, 'es la tecla control y sirve para activar mayÃºsculas', 0.00, ''),
(34, 9, 'es la barra espaciadora y sirve para dar espacioes de lÃ­nea', 0.00, ''),
(35, 9, 'es la tecla ENTER y sirve para introducir un mandato u orden en las aplicaciones', 0.50, ''),
(36, 9, 'es la tecla ENTER y en el procesador de textos sirve para saltar de lÃ­nea', 0.50, ''),
(37, 10, 'comer y beber lÃ­Â­quidos para estar hidratado y alimentado', 0.00, ''),
(38, 10, 'evitar comer y beber lÃ­quidos cerca a la computadora', 1.00, ''),
(39, 10, 'ver videos en youtube', 0.00, ''),
(40, 10, 'descargar juegos y jugar en linea', 0.00, ''),
(41, 11, 'Si pulsamos ambas teclas se ejecuta el procesador de textos Microsoft Word', 0.00, ''),
(42, 11, 'si pulsamos ambas teclas se ejecuta el explorador de archivos', 0.50, ''),
(43, 11, 'la combinacion de teclas se llaman CONTROL + E', 0.00, ''),
(44, 11, 'la combinacion de teclas se llaman WINDOWS + E', 0.50, ''),
(45, 12, 'representa a un software del sistema', 0.50, ''),
(46, 12, 'representa a una carpeta', 0.00, ''),
(47, 12, 'representa al explorador de archivos', 0.50, ''),
(48, 12, 'representa a una hardware del sistema', 0.00, ''),
(49, 13, 'Lo que podemos ver y tocar como el teclado o el mouse', 0.00, ''),
(50, 13, 'una carpeta donde podemos guardar nuestra informacion', 0.00, ''),
(51, 13, 'las aplicaciones o programas como Microsoft Word, Windows entre otros', 0.00, ''),
(52, 13, 'lo que no podemos tocar de la computadora como el sonido y el video', 0.00, ''),
(53, 14, 'es un hardware que sirve para hacer calculos', 0.00, ''),
(54, 14, 'es una hoja de calculo y podemos realizar operaciones matematicas', 0.50, ''),
(55, 14, 'es un procesador de textos y sirve para escribir', 0.00, ''),
(56, 14, 'es un software que nos permite realizar grÃ¡ficos estadisticos', 0.50, ''),
(57, 15, 'Un hardware de la computadora', 0.00, 'Incorrecto'),
(58, 15, 'Un software de la computadora', 0.50, ''),
(59, 15, 'Un procesador de textos y sirve para crear documentos', 0.00, ''),
(60, 15, 'El que administra y controla el movimiento del mouse y el teclado', 0.50, ''),
(61, 16, 'es el sistema operativo Windows', 0.00, ''),
(62, 16, 'es el sistema operativo Android', 1.00, ''),
(63, 16, 'es el sistema operativo Linux', 0.00, ''),
(64, 16, 'es el sistema operativo IoS', 0.00, ''),
(65, 17, 'aaa', 1.00, ''),
(66, 17, 'aaaaaa', 0.00, ''),
(67, 17, 'aaaaaaa', 0.00, ''),
(68, 17, 'aaaaa', 0.00, ''),
(69, 18, '120 Gigabytes', 0.00, ''),
(70, 18, '111 Gigabytes', 0.00, ''),
(71, 18, '232 Megabytes', 0.00, ''),
(72, 18, '232 Gigabytes', 1.00, ''),
(73, 19, 'La imagen muestra una tabla de 2 filas y 4 columnas', 0.00, ''),
(74, 19, 'La imagen muestra una tabla de 2 filas y 3 columnas', 0.00, ''),
(75, 19, 'La imagen muestra una tabla de 2 filas y 2 columnas', 1.00, ''),
(76, 19, 'La imagen muestra una tabla de 2 filas y 1 columnas', 0.00, ''),
(77, 20, 'Monitor o pantalla', 0.00, ''),
(78, 20, 'Micrófono', 0.50, ''),
(79, 20, 'Teclado', 0.50, ''),
(80, 20, 'Parlantes', 0.00, ''),
(81, 21, 'El mouse es un dispositivo de salida', 0.00, ''),
(82, 21, 'El mouse es un dispositivo de proceso', 0.00, ''),
(83, 21, 'El mouse es un dispositivo de entrada', 1.00, ''),
(84, 21, 'El mouse es un dispositivo de almacenamiento', 0.00, ''),
(85, 22, 'USB - Universal Serial Bus', 0.00, ''),
(86, 22, 'Es un Dispositivo de entrada', 0.00, ''),
(87, 22, 'Es un dispositivo de salida', 0.00, ''),
(88, 22, 'Es un dispositivo de almacenamiento', 1.00, ''),
(89, 23, 'Es un CD-ROM y es un dispositivo de almacenamiento', 1.00, ''),
(90, 23, 'Es un CD-ROM y es un dispositivo de entrada', 0.00, ''),
(91, 23, 'Es un CD-ROM y es un dispositivo de salida', 0.00, ''),
(92, 23, 'Es un disco duro y es un dispositivo de almacenamiento', 0.00, ''),
(93, 24, '0001', 0.00, ''),
(94, 24, '001', 0.00, ''),
(95, 24, '1000', 1.00, ''),
(96, 24, '0101', 0.00, ''),
(97, 25, 'La posición vertical (columnas) de los frames', 0.00, ''),
(98, 25, 'La posición en diagonal de los frames', 0.00, ''),
(99, 25, 'La posición horizontal (filas) de los frames', 1.00, ''),
(100, 25, 'La posición en superior de los frames', 0.00, ''),
(101, 26, 'sólo para llamar o incrustar otras páginas html', 0.00, ''),
(102, 26, 'parar crear un frame dentro de otro frame', 0.00, ''),
(103, 26, 'sólo para llamar o incrustar una imagen en la página web', 0.00, ''),
(104, 26, 'para llamar o incrustar cualquier tipo de archivo como imagen, página html, pdf, etc.', 1.00, ''),
(105, 27, 'Insertar una página web', 0.00, ''),
(106, 27, 'Insertar una imagen', 1.00, ''),
(107, 27, 'Insertar una fila', 0.00, ''),
(108, 27, 'Ninguna de las anteriores', 0.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tarea`
--

CREATE TABLE `tb_tarea` (
  `idTarea` int(11) NOT NULL,
  `enunciado` varchar(1000) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `fechaInicio` datetime DEFAULT NULL,
  `fechaTermino` datetime DEFAULT NULL,
  `idTema` int(11) DEFAULT NULL,
  `documento` varchar(70) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_tarea`
--

INSERT INTO `tb_tarea` (`idTarea`, `enunciado`, `descripcion`, `fechaCreacion`, `fechaInicio`, `fechaTermino`, `idTema`, `documento`, `estado`) VALUES
(1, 'T1 U1 4to 2020 - com', 'Desarrollas los temas de la clase', '2022-03-22 00:00:10', '2020-03-23 00:00:10', '2020-03-29 00:00:10', 1, NULL, 1),
(2, '1. ¿Qué es el lenguaje HTML ?\r\n2. Mencione las etiquetas básicas del lenguaje html ', 'El lenguaje html', '2024-03-14 09:33:43', '2024-03-14 09:00:00', '2024-03-15 11:49:00', 90, NULL, 1),
(3, 'Descarga la ficha, desarrolla colocando una marca si es hardware o software según corresponde.\r\nGraba el documento con el formato PDF y sube el documento a la plataforma.', 'Conceptos básicos hardware y software', '2024-03-20 20:57:29', '2024-03-21 08:00:00', '2024-03-21 18:00:00', 91, 'Clase 02 - 6to Hardware y Software.pdf', 1),
(4, 'Desarrolla los siguientes pasos para completar la tarea\r\n1. Descarga el documento\r\n2. Agrega tu nombre y apellido en el nombre del documento\r\n3. Desarrolla la actividad\r\n4. Graba y sube a la plataforma el documento con tu nombre', 'Tarea de repaso: Nociones básicas de la web', '2024-04-10 15:24:50', '2024-04-10 08:08:00', '2024-04-11 14:30:00', 92, 'S04-6to Nombre y Apellidos - Nociones básicas de la web.pdf', 1),
(5, '1. ¿Qué es el sistema operativo?\r\n2. Ejemplos de sistemas operativos', 'El sistema operativo', '2024-03-14 00:00:00', '2024-03-14 08:19:00', '2024-03-15 08:20:00', 106, NULL, 1),
(6, '1. ¿Qué es el sistema operativo?\r\n2. Ejemplos de sistemas operativos', 'El sistema operativo', '2024-03-14 00:00:00', '2024-03-14 08:19:00', '2024-03-15 08:20:00', 1, NULL, 1),
(7, 'Descarga la ficha, desarrolla colocando una marca si es hardware o software según corresponde.\r\nGraba el documento con el formato PDF y sube el documento a la plataforma.', 'Conceptos básicos hardware y software', '2024-03-20 20:54:47', '2024-03-21 08:00:00', '2024-03-21 18:00:00', 107, 'Clase 02 - 5to Hardware y Software.pdf', 1),
(8, 'Descarga la ficha, desarrolla usando las herramientas del editor y graba el documento. \r\nSube el documento desarrollado a la plataforma.', 'Conceptos básicos de computación', '2024-03-20 00:00:00', '2024-03-21 07:05:00', '2024-03-21 17:00:00', 122, 'Actividad 02 - Partes del teclado.pdf', 1),
(9, 'Desarrolla los siguientes pasos para completar la tarea\r\n1. Descarga el documento\r\n2. Agrega tu nombre y apellido en el nombre del documento\r\n3. Desarrolla la actividad\r\n4. Graba y sube a la plataforma el documento con tu nombre', 'Tarea de repaso: El sistema operativo', '2024-04-18 08:30:47', '2024-04-18 08:01:00', '2024-04-18 15:12:00', 108, 'S04-5to Nombre y Apellidos - El sistema operativo.pdf', 1),
(10, 'Desarrolla los siguientes pasos para completar la tarea\r\n1. Descarga el documento\r\n2. Agrega tu nombre y apellido en el nombre del documento\r\n3. Desarrolla la actividad\r\n4. Graba y sube a la plataforma el documento con tu nombre', 'Tarea de repaso: Tipos de archivos', '2024-04-10 15:39:33', '2024-04-11 08:24:00', '2024-04-11 14:24:00', 124, 'S04-4to Nombre y Apellidos - El archivo y sus partes.pdf', 1),
(11, 'Desarrolla los siguientes pasos para completar la tarea\r\n1. Descarga el documento\r\n2. Agrega tu nombre y apellido en el nombre del documento\r\n3. Desarrolla la actividad\r\n4. Graba y sube a la plataforma el documento con tu nombre', 'Etiquetas básicas de la estructura de un documento HTML', '2024-04-17 11:02:04', '2024-04-18 08:00:00', '2024-04-18 14:35:00', 92, 'S05- 6to Nombre y Apellido - Estructura del doc html.pdf', 1),
(12, 'Investiga la capacidad de almacenamiento de la computadora y contesta las siguientes preguntas:\r\n1. ¿Qué capacidad TOTAL de almacenamiento tiene tu computadora?\r\n2. ¿Cuánto espacio libre tiene tu computadora?\r\n3. ¿Cuánto espacio usado tiene tu computadora?', 'Panel de control: Almacenamiento de la computadora', '2024-04-25 10:03:42', '2024-04-25 08:00:00', '2024-04-25 11:10:00', 108, 'S05- 5to Nombre y apellido - El panel de control del SO.pdf', 1),
(13, 'Realiza lo siguiente para desarrollar la tarea\r\n1) Descarga la ficha de trabajo y coloca tu nombre a la ficha\r\n2) Desarrolla la ficha y graba el documento\r\n3) Sube la ficha desarrollada a la plataforma.', 'Dispositivos de entrada y salida', '2024-06-05 00:00:00', '2024-06-06 08:10:00', '2024-06-06 15:33:00', 110, 'Sesión 08- 5to Dispositivos de E-S.pdf', 1),
(14, 'Realiza lo siguiente para desarrollar la tarea\r\n1) Descarga la ficha de trabajo y coloca tu nombre a la ficha\r\n2) Desarrolla la ficha y graba el documento\r\n3) Sube la ficha desarrollada a la plataforma.', 'Dispositivos de almacenamiento', '2024-06-19 16:34:17', '2024-06-20 08:40:00', '2024-06-20 13:33:00', 111, 'Sesión 12- 5to Dispositivos de almacenamiento.pdf', 1),
(15, 'Desarrolla y construye correctamente la estructura html y reconoce los atributos de color.', 'Desarrollo en clase formato de la estructura de una pagina html', '2024-07-17 20:58:17', '2024-07-17 19:13:00', '2024-07-17 19:13:00', 94, '', 1),
(16, 'Construye correctamente la estructura frame y ensambla tres paginas en una sola usando la etiqueta frameset, frame y el atributo src', 'Reconoce la etiqueta frame y su aplicación para ensamblar y construir páginas web', '2024-07-17 00:00:00', '2024-07-17 21:05:00', '2024-07-17 21:05:00', 96, NULL, 1),
(17, 'Presentación del departamento de Piura', 'Trabajo práctico de power point ', '2024-07-18 00:00:00', '2024-07-18 09:56:00', '2024-07-18 11:56:00', 112, NULL, 1),
(18, 'Construye la estructura de una tabla y los atributos para dimensionar como un encabezado dentro de una página web', 'Utiliza la etiqueta frame y etiquetas para crear el encabezado de una pagina web', '2024-07-27 00:00:00', '2024-07-25 16:05:00', '2024-07-25 16:05:00', 97, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tarea_estudiante`
--

CREATE TABLE `tb_tarea_estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `idTarea` int(11) NOT NULL,
  `archivo` varchar(80) DEFAULT NULL,
  `detalle` varchar(10000) DEFAULT NULL,
  `fechaSubida` datetime DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_tarea_estudiante`
--

INSERT INTO `tb_tarea_estudiante` (`idEstudiante`, `idTarea`, `archivo`, `detalle`, `fechaSubida`, `calificacion`) VALUES
(33, 2, NULL, NULL, NULL, NULL),
(33, 3, 'Clase 02-Gianluka Amoretti.pdf', '', '2024-03-21 10:15:01', 16),
(33, 4, 'S04-6to Gianluka amoretti - Nociones básicas de la web.pdf', '', '2024-04-11 10:22:11', 16),
(33, 11, 'S05- 6to Gianluka Amoretti - Estructura del doc html.pdf', '', '2024-04-18 10:25:46', 16),
(33, 15, NULL, NULL, NULL, 16),
(33, 16, NULL, NULL, NULL, 18),
(33, 18, NULL, NULL, NULL, 16),
(34, 2, '', '1 El Lenguaje de Marcado de Hipertexto (HTML) es el código que se utiliza para estructurar y desplegar una página web y sus contenidos. \r\n\r\n2 Las \"tags\" HTML, o \"etiquetas\" HTML, son códigos utilizados para \"marcar\" el texto de una página web, con el fin de dar instrucciones al navegador sobre cómo mostrarlo', '2024-03-14 09:42:18', 12),
(34, 3, 'Clase 02 - 6to Hardware y Software.pdf', '', '2024-03-21 09:37:07', 16),
(34, 4, 'S04-6to luz adriana amar - Nociones básicas de la web.pdf', '', '2024-04-11 09:48:04', 12),
(34, 11, 'S05- 6to luz amar - Estructura del doc html.pdf', '', '2024-04-18 09:50:26', 16),
(34, 15, NULL, NULL, NULL, 16),
(34, 16, NULL, NULL, NULL, 16),
(34, 18, NULL, NULL, NULL, 16),
(35, 2, '', '1. HTML funciona como un lenguaje que ayuda a elaborar páginas web mediante comandos que ordenan a un navegador a mostrar cierta información al visitante.\r\n\r\n2.<body>,<head>,div> ,<a>,<strong>,<br>', '2024-03-14 10:04:02', 16),
(35, 3, 'clase 02 -romina becerra.pdf', '', '2024-03-21 10:16:45', 16),
(35, 4, 'S04-6to romina becerra y jayana paredes (1).pdf', '', '2024-04-11 10:26:12', 16),
(35, 11, 'S05- 6toRomina becerra - Estructura del doc html.pdf', '', '2024-04-18 10:25:15', 16),
(35, 15, NULL, NULL, NULL, 16),
(35, 16, NULL, NULL, NULL, 16),
(35, 18, NULL, NULL, NULL, 16),
(36, 2, '', 'El Lenguaje de Marcado de Hipertexto (HTML) es el código que se utiliza para estructurar y desplegar una página web y sus contenidos. Por ejemplo, sus contenidos podrían ser párrafos, una lista con viñetas, o imágenes y tablas de datos.\r\n<head> para información sobre el documento.\r\n<body> para el contenido.\r\n<div> división o bloque dentro del contenido, el más común para componer elementos complejos.\r\n<a> para enlaces.\r\n<strong> para poner el texto en negrita.', '2024-03-14 10:03:03', 16),
(36, 3, 'Actibidad 02 Bianca Cano.pdf', '', '2024-03-21 10:16:29', 16),
(36, 4, 'S04-6to Bianca Cano- Nociones básicas de la web.pdf', '', '2024-04-11 10:22:47', 16),
(36, 11, 'S05- 6to  BIANCA CANO- Estructura del doc html.pdf', '', '2024-04-18 10:25:01', 16),
(36, 15, NULL, NULL, NULL, 16),
(36, 16, NULL, NULL, NULL, 18),
(36, 18, NULL, NULL, NULL, 16),
(37, 2, '', ' 1. El Lenguaje de Marcado de Hipertexto (HTML) es el código que se utiliza para estructurar \r\n2. <strong>', '2024-03-14 09:40:13', 12),
(37, 3, 'Clase 02 - 6to Hardware y Software.pdf', '', '2024-03-21 09:37:15', 16),
(37, 4, 'S04-6to Sammi Ccenta y Jandi Sayuri- Nociones.pdf', '', '2024-04-11 09:52:14', 16),
(37, 11, 'S05- 6to -sammi yuriko ccenta amar Estructura del doc html (2).pdf', '', '2024-04-18 09:47:13', 16),
(37, 15, NULL, NULL, NULL, 16),
(37, 16, NULL, NULL, NULL, 16),
(37, 18, NULL, NULL, NULL, NULL),
(38, 2, '', ' es el código que se utiliza para estructurar y desplegar una página web y sus contenidos\r\n<body> para el contenido.\r\n<head> para información sobre el documento.\r\n<div> división dentro del contenido.\r\n<a> para enlaces.\r\n<strong> para poner el texto en negrita.\r\n<br> para saltos de línea', '2024-03-14 10:05:05', 16),
(38, 3, 'Clase 02 - THIAGO CHILE.pdf', '', '2024-03-21 10:13:00', 16),
(38, 4, 'S04-6to Thiago Chile - Nociones básicas de la web.pdf', '', '2024-04-11 10:32:35', 12),
(38, 11, 'S05- 6to Thiago Chile - Estructura del doc html.pdf', '', '2024-04-18 10:22:58', 16),
(38, 15, NULL, NULL, NULL, 16),
(38, 16, NULL, NULL, NULL, 18),
(38, 18, NULL, NULL, NULL, 16),
(39, 2, '', 'es el código que se utiliza para estructurar y desplegar una página web y sus contenidos. Por ejemplo, sus contenidos podrían ser párrafos, una lista con viñetas, o imágenes y tablas de datos\r\n\r\n<body> para el contenido.\r\n<head> para información sobre el documento.\r\n<div> división dentro del contenido.\r\n<strong> para poner el texto en negrita.\r\n<br> para saltos de línea.\r\n<img> para añadir imágenes al documentos', '2024-03-14 10:03:52', 16),
(39, 3, 'actividad 02 jorge andre.pdf', '', '2024-03-21 10:15:03', 16),
(39, 4, 'S04-6to jorge chilquillo - Nociones básicas de la web.pdf', '', '2024-04-11 10:23:26', 16),
(39, 11, 'S05- 6to jorge chilquillo - Estructura del doc html (1).pdf', '', '2024-04-18 10:25:09', 16),
(39, 15, NULL, NULL, NULL, 16),
(39, 16, NULL, NULL, NULL, 18),
(39, 18, NULL, NULL, NULL, 16),
(40, 2, '', 'El Lenguaje de Marcado de Hipertexto (HTML) es el código que se utiliza para estructurar y desplegar una página web,<html> ,<head>, <title>', '2024-03-14 10:02:10', 16),
(40, 3, 'actividad 02-joaquin coronel.pdf', '', '2024-03-21 10:13:37', 16),
(40, 4, 'S04-6to Joaquin Coronel - Nociones básicas de la web.pdf', '', '2024-04-11 10:18:16', 16),
(40, 11, NULL, NULL, NULL, NULL),
(40, 15, NULL, NULL, NULL, 16),
(40, 16, NULL, NULL, NULL, 18),
(40, 18, NULL, NULL, NULL, 18),
(41, 2, '', '1.es el código que se utiliza para estructurar y desplegar una página web y sus contenidos. \r\n2.<body>\r\n   <head>\r\n   <div>\r\n   <a>\r\n   <strong>\r\n    <br>', '2024-03-14 09:39:04', 16),
(41, 3, 'Clase 02 - 6to Hardware y Software.pdf', '', '2024-03-21 09:36:49', 16),
(41, 4, 'S04-6to jhoseana de la cruz loayza- Nociones básicas de la web.pdf', '', '2024-04-11 09:46:13', 16),
(41, 11, 'S05- 6to jhoseana de la cruz  - Estructura del doc html.pdf', '', '2024-04-18 09:47:33', 16),
(41, 15, NULL, NULL, NULL, 16),
(41, 16, NULL, NULL, NULL, 16),
(41, 18, NULL, NULL, NULL, 16),
(42, 2, '', 'El Lenguaje de Marcado de Hipertexto (HTML) es el código que se utiliza para estructurar y desplegar una página web y sus contenidos. Por ejemplo, sus contenidos podrían ser párrafos, una lista con viñetas, o imágenes y tablas de datos.\r\nLas etiquetas HTML más usadas para crear la estructura básica de un documento son: <head> para información sobre el documento. <body> para el contenido. <div> división o bloque dentro del contenido, el más común para componer elementos complejos.', '2024-03-14 10:02:09', 16),
(42, 3, 'Clase 02 - jazmin gavidia.pdf', '', '2024-03-21 10:18:11', 16),
(42, 4, 'S04-6to jazmin gavidia - Nociones básicas de la web (1).pdf', '', '2024-04-11 10:25:20', 16),
(42, 11, 'S05- 6to jazmin gavidia alvarez - Estructura del doc html.pdf', '', '2024-04-18 10:24:30', 16),
(42, 15, NULL, NULL, NULL, 16),
(42, 16, NULL, NULL, NULL, 18),
(42, 18, NULL, NULL, NULL, 16),
(43, 2, '', 'El lenguaje HTML sirve para describir la estructura básica de una página y organizar la forma en que se mostrará su contenido, HTML utiliza \"marcas\" para etiquetar texto, imágenes y otro contenido para mostrarlo en un navegador Web.\r\n\r\n<body> para el contenido.\r\n<head> para información sobre el documento.\r\n<div> división dentro del contenido.\r\n<a> para enlaces.\r\n<strong> para poner el texto en negrita.\r\n<br> para saltos de línea.\r\n<H1>…<H6> para títulos dentro del contenido.\r\n<img> para añadir imágenes al documento.', '2024-03-14 09:39:20', 16),
(43, 3, 'Clase 02 - 6to Hardware y Software.pdf', '', '2024-03-21 09:37:01', 16),
(43, 4, 'S04-6to Sammi Ccenta y Jandi Sayuri- Nociones.pdf', '', '2024-04-11 09:58:22', 16),
(43, 11, 'jandi sayuri gomes.pdf', '', '2024-04-18 09:50:51', 16),
(43, 15, NULL, NULL, NULL, 16),
(43, 16, NULL, NULL, NULL, 16),
(43, 18, NULL, NULL, NULL, 16),
(44, 2, '', 'HTML no es un lenguaje de programación; es un lenguaje de marcado que define la estructura de tu contenido. HTML consiste en una serie de elementos que usarás para encerrar diferentes partes del contenido para que se vean o comporten de una determinada manera. Las etiquetas de encierre pueden hacer de una palabra o una imagen un hipervínculo a otro sitio, se pueden cambiar palabras a cursiva, agrandar o achicar la letra, etc. Por ejemplo, toma la siguiente línea de contenido\r\n\r\n\r\nLas etiquetas HTML más usadas para crear la estructura básica de un documento son: <head> para información sobre el documento. <body> para el contenido. <div> división o bloque dentro del contenido, el más común para componer elementos complejos.', '2024-03-14 09:38:47', 12),
(44, 3, 'Clase 02 - 6to Hardware y Software.pdf', '', '2024-03-21 09:36:23', 16),
(44, 4, 'S04-6to Olenka Hinostroza - Nociones básicas de la web.pdf', '', '2024-04-11 09:48:07', 16),
(44, 11, 'S05- 6to Olenka Hinostroza - Estructura del doc html (1).pdf', '', '2024-04-18 09:50:19', 16),
(44, 15, NULL, NULL, NULL, 16),
(44, 16, NULL, NULL, NULL, 16),
(44, 18, NULL, NULL, NULL, 18),
(45, 2, '', '1. HTML (Lenguaje de Marcas de Hipertexto, del inglés HyperText Markup Language)\r\n2.Las etiquetas HTML más usadas para crear la estructura básica de un documento son: <head> para información sobre el documento. <body> para el contenido. <div> división o bloque dentro del contenido, el más común', '2024-03-14 10:02:57', 16),
(45, 3, 'Actividad 02-Luis Huamani.pdf', '', '2024-03-21 10:14:21', 16),
(45, 4, 'S04-6to Luis Adriano - Nociones básicas de la web.pdf', '', '2024-04-11 10:22:17', 16),
(45, 11, 'S05- 6to Luis Adriano - Estructura del doc html (2).pdf', '', '2024-04-18 10:24:18', 16),
(45, 15, NULL, NULL, NULL, 16),
(45, 16, NULL, NULL, NULL, 18),
(45, 18, NULL, NULL, NULL, 18),
(46, 2, '', 'HTML (Lenguaje de Marcas de Hipertexto, del inglés HyperText Markup Language) es el componente más básico de la Web. Define el significado y la estructura del contenido web. Además de HTML, generalmente se utilizan otras tecnologías para describir la apariencia/presentación de una página web (CSS) o la funcionalidad/comportamiento\r\n\r\n<body> </body>\r\n<head></head>\r\n<div> </div>\r\n<a> </a>\r\n<strong> </strong>\r\n<br>\r\n<H1> </H1> …. < H6> </H6>\r\n<IMG> </IMG>', '2024-03-14 09:39:11', 16),
(46, 3, 'Clase 02 - 6to Hardware y Software (1).pdf', '', '2024-03-21 09:37:19', 16),
(46, 4, 'S04-6to nesta mendozas - Nociones básicas de la web.pdf', '', '2024-04-11 09:48:18', 16),
(46, 11, 'S05- 6to nesta mendoza - Estructura del doc html.pdf', '', '2024-04-18 09:49:13', 16),
(46, 15, NULL, NULL, NULL, 16),
(46, 16, NULL, NULL, NULL, 16),
(46, 18, NULL, NULL, NULL, 16),
(47, 2, '', '1.- El Lenguaje de Marcado de Hipertexto,es el código que se utiliza para estructurar y desplegar una página web y sus contenidos.\r\n\r\n2.- Normalmente se utilizan dos etiquetas: una de inicio y otra de fin para indicar que ha terminado el efecto que queríamos presentar.', '2024-03-14 10:03:31', 12),
(47, 3, 'actividad 2 Mathias Molina.pdf', '', '2024-03-21 10:13:33', 16),
(47, 4, 'S04-6to Mathias Molina - Nociones básicas de la web.pdf', '', '2024-04-11 10:19:53', 16),
(47, 11, 'S05- 6to Mathias Molina - Estructura del doc html.pdf', '', '2024-04-18 10:23:18', 16),
(47, 15, NULL, NULL, NULL, 16),
(47, 16, NULL, NULL, NULL, 18),
(47, 18, NULL, NULL, NULL, 16),
(48, 2, '', 'HTML (Lenguaje de Marcas de Hipertexto) es el código que se utiliza para estructurar y desplegar una página web y sus contenidos. Por ejemplo, sus contenidos podrían ser párrafos, una lista con viñetas, o imágenes y tablas de datos.\r\n\r\n<body> para el contenido.\r\n<head> para información sobre el documento.\r\n<div> división dentro del contenido.\r\n<a> para enlaces.\r\n<strong> para poner el texto en negrita.\r\n<br> para saltos de línea.\r\n<H1>…<H6> para títulos dentro del contenido.\r\n<img> para añadir imágenes al documento\r\n', '2024-03-14 10:02:55', 16),
(48, 3, 'Actividad 02 - Jayana Paredes.pdf', '', '2024-03-21 10:16:11', 16),
(48, 4, 'S04-6to romina becerra y jayana paredes (1).pdf', '', '2024-04-11 10:27:07', 16),
(48, 11, NULL, NULL, NULL, NULL),
(48, 15, NULL, NULL, NULL, 16),
(48, 16, NULL, NULL, NULL, 16),
(48, 18, NULL, NULL, NULL, 16),
(49, 2, '', 's el código que se utiliza para estructurar y desplegar una página web y sus contenidos. ', '2024-03-14 09:37:03', 12),
(49, 3, 'Clase 02 - 6to Hardware y Software.pdf', '', '2024-03-21 09:39:04', 16),
(49, 4, 'S04-6to thiago rosas.pdf', '', '2024-04-11 09:55:55', 12),
(49, 11, 'S05- 6to thiago  rosas- Estructura del doc html.pdf', '', '2024-04-18 09:52:42', 12),
(49, 15, NULL, NULL, NULL, 12),
(49, 16, NULL, NULL, NULL, 12),
(49, 18, NULL, NULL, NULL, 12),
(50, 2, '', 'es el código que se utiliza para estructurar y desplegar una página web y sus contenidos. ', '2024-03-14 09:37:08', 12),
(50, 3, 'Clase 02 - 6to Hardware y Software.pdf', '', '2024-03-21 09:38:07', 16),
(50, 4, 'S04-6to JHALEY SOLIS - Nociones básicas de la web.pdf', '', '2024-04-11 10:30:39', 12),
(50, 11, 'S05- 6to Jhaley PaoloSolis Quispe - Estructura del doc html.pdf', '', '2024-04-18 09:54:20', 16),
(50, 15, NULL, NULL, NULL, 12),
(50, 16, NULL, NULL, NULL, 12),
(50, 18, NULL, NULL, NULL, 12),
(51, 2, '', '1.-    El Lenguaje (HTML) es el código que se utiliza para estructurar y desplegar una página web y sus contenidos.\r\n\r\n2.-    <body> para el contenido.\r\n<head> para información sobre el documento.\r\n<div> división dentro del contenido.\r\n<a> para enlaces.\r\n<H1>…<H6> para títulos dentro del contenido.\r\n<img> para añadir imágenes al documento', '2024-03-14 09:38:55', 16),
(51, 3, 'Clase 02 - 6to Hardware y Software.pdf', 'hablam pe profe buenas ', '2024-03-21 09:37:01', 16),
(51, 4, 'S04-6to Luis Mario Tirado- Nociones básicas de la web.pdf', 'w3asa bendiciones profe\r\n', '2024-04-11 09:50:14', 16),
(51, 11, 'S05- 6to luis mario tirado- Estructura del doc html.pdf', 'bendiciones gogoogoobnjhbehigberhibgfikbfrbbgebgejubgerbgfrobghuortgnhbruifhnjlvnfjkghwropdf}bfh4nh654njh98ry41h65gt4t654ght5g32b14gsd532v165g451bd65h4tb51ht65h1tb5gt65h14tg532nh1rt5gwrfgjweb fhiwrygtrh235786tu29856h32oigtherigunetjkgnqetjkbgnjkb rtjkbrjvgjkbef,kvgn qefb,jqebtgetjkbgtlkngtkjgnbtjkgnbtjkgntlgntejlkbn tgjlbnhrgtl bkn wrgtjlbn rgtjlkbrbnhrynjwryjwyj', '2024-04-18 09:49:53', 16),
(51, 15, NULL, NULL, NULL, 16),
(51, 16, NULL, NULL, NULL, 12),
(51, 18, NULL, NULL, NULL, 16),
(52, 2, NULL, NULL, NULL, NULL),
(52, 3, 'Clase 02 - 6to Hardware y Software.pdf', '', '2024-03-21 09:37:22', 16),
(52, 4, '6to benjamin torres hinostroza.pdf', '', '2024-04-11 09:45:49', 16),
(52, 11, NULL, NULL, NULL, NULL),
(52, 15, NULL, NULL, NULL, 16),
(52, 16, NULL, NULL, NULL, 16),
(52, 18, NULL, NULL, NULL, 12),
(53, 5, '', '1: Es un conjunto de programas que realizan funciones básicas\r\n2:windows, Unix, Mac os', '2024-03-14 08:28:13', 16),
(53, 6, NULL, NULL, NULL, NULL),
(53, 7, 'Clase 02 - 5to Hardware y Software (1).pdf', 'tareíta lista!!', '2024-03-21 08:15:25', 16),
(53, 9, 'S04-5to Maria Fernanda- El sistema operativo.pdf', '!!tareitaaa¡¡', '2024-04-11 08:28:20', 16),
(53, 12, 'S05- 5to Maria Fernanda - El panel de control del SO.pdf', 'El almacenamiento total es: 222GB\r\nel almacenamiento libre es: 178GB\r\nel almacenamiento usado es: 44.6 GB\r\n', '2024-04-18 08:33:29', 16),
(53, 13, 'Maria Fernanda- 5to Dispositivos de E-M.pdf', '!!5TO GRADO!!!<3', '2024-06-06 09:46:29', 16),
(53, 14, 'Mafer- 5to Dispositivos de almacenamiento.pdf', '!!PRE PROMO 5TO GRADO!!', '2024-06-20 09:36:19', 16),
(53, 17, NULL, NULL, NULL, 16),
(54, 5, '', 'el sistema operativo es el software que coordina y dirige todos los servicios y aplicaciones que utiliza el usuario en una computadora\r\ntambien es la herramienta encargada de administrar', '2024-03-14 08:29:13', 12),
(54, 6, NULL, NULL, NULL, NULL),
(54, 7, 'Clase 02 - 5to Hardware y Software.pdf', '', '2024-03-21 08:17:50', 16),
(54, 9, 'S04-5to Antonio Cotera- El sistema operativo.pdf', '', '2024-04-11 08:28:15', 16),
(54, 12, 'S05-5to Antonio Cotera - El panel de control del SO.pdf', '222GB\r\n176GB\r\n46.4GB', '2024-04-18 08:28:38', 16),
(54, 13, 'Sesión 08-  5to Antonio de E-S.pdf', '', '2024-06-06 09:44:26', 16),
(54, 14, 'Sesión 12- 5to Antonio Cotera.pdf', '', '2024-06-20 09:40:05', 12),
(54, 17, NULL, NULL, NULL, 16),
(55, 5, '', '1.Un sistema operativo es un conjunto de programas que permite manejar la memoria, disco, medios de almacenamiento de información y los diferentes periféricos o recursos de nuestra computadora\r\n2.Computadora,Mouse,Teclado,etc.\r\n', '2024-03-14 08:28:18', 12),
(55, 6, NULL, NULL, NULL, NULL),
(55, 7, 'Clase 02 - 5to Hardware y Software.pdf', 'El hardward es todo lo que se puede tocar con la mano,en cambio el software no puede ser tocado y además solo pueden ser ejecutados por el hardward.', '2024-03-21 08:11:59', 16),
(55, 9, 'S04-5to Christopher Custodio - El sistema operativo (1).pdf', '', '2024-04-18 08:31:12', 16),
(55, 12, 'S05- 5to Christopher Custodio - El panel de control del SO.pdf', '1. 223 GB en total\r\n2. 179 GB libres\r\n3. 43.5 GB usados', '2024-04-18 08:25:42', 16),
(55, 13, 'Sesión 08- Christopher Custodio Entrada-Salida.pdf', '', '2024-06-06 09:46:55', 12),
(55, 14, NULL, NULL, NULL, NULL),
(55, 17, NULL, NULL, NULL, 16),
(56, 5, '', '1 Son programas que  manejar la memoria, disco, medios de almacenamiento de información y los diferentes periféricos o recursos de nuestra computadora,\r\n\r\n2.Microsoft Windows, Mac OS y Linux', '2024-03-14 08:32:49', 16),
(56, 6, NULL, NULL, NULL, NULL),
(56, 7, 'Clase 02 - 5to Hardware y Software.pdf', '', '2024-03-21 08:20:18', 16),
(56, 9, 'S04-5to angely huaranca- El sistema operativo.pdf', '', '2024-04-11 08:30:33', 16),
(56, 12, 'S05- 5to angely huaranca - El panel de control del SO (1).pdf', 'EL MALSENAMIENTO TOTAL 222GB\r\nALMACENAMIENTO LIBRE 178GB\r\nUSADOS 44.7GB', '2024-04-18 08:36:37', 16),
(56, 13, 'angely 08- 5to Dispositivos de E-S.pdf', '', '2024-06-06 09:51:56', 16),
(56, 14, 'Sesión 12- 5to angelyde almacenamiento (1).pdf', '', '2024-06-20 09:37:50', 12),
(56, 17, NULL, NULL, NULL, 16),
(57, 5, NULL, NULL, NULL, NULL),
(57, 6, NULL, NULL, NULL, NULL),
(57, 7, 'Clase 02 - 5to Hardware y Software (4).pdf', 'evaluacion', '2024-03-21 08:20:56', 16),
(57, 9, 'S04-5to Luciana leon - El sistema operativo (1).pdf', '', '2024-04-11 08:28:29', 16),
(57, 12, 'S05- 5to Luciana leon- El panel de control del SO.pdf', 'el almacenamiento total 222GB\r\n\r\nalmacionamiento libre179GB\r\n\r\nalmacenamiento usado 43.3GB', '2024-04-18 08:37:34', 16),
(57, 13, 'Luciana leon- 5to Dispositivos de E-S.pdf', 'luciana leon cabezas ', '2024-06-06 09:47:22', 16),
(57, 14, 'luciana- 5to Dispositivos de almacenamiento.pdf', 'luciana leon 5to grado ', '2024-06-20 09:36:00', 16),
(57, 17, NULL, NULL, NULL, 16),
(58, 5, NULL, NULL, NULL, NULL),
(58, 6, NULL, NULL, NULL, NULL),
(58, 7, 'Clase 02 - 5to Hardware y Software.pdf', '', '2024-03-21 08:32:32', 16),
(58, 9, 'S04-5to Fernando Pedraza - El sistema operativo.pdf', '', '2024-04-11 08:29:29', 16),
(58, 12, 'S05- 5to Fernando Pedraza - El panel de control del SO.pdf', '223GB\r\n168GB\r\n54.4GB\r\n\r\n', '2024-04-18 08:30:31', 16),
(58, 13, 'Fernando  08- 5to Dispositivos de E-S.pdf', '', '2024-06-06 09:49:31', 16),
(58, 14, NULL, NULL, NULL, NULL),
(58, 17, NULL, NULL, NULL, 16),
(61, 5, '', 'Un sistema operativo es un conjunto de programas que permite manejar la memoria, disco, medios de almacenamiento de información y los diferentes periféricos o recursos de nuestra computadora, como son el teclado, el mouse, la impresora, la placa de red, entre otros.\r\n2. Windows.\r\nMac OS.\r\nUnix.\r\nSolaris.\r\nFreeBSD.\r\nOpenBSD.\r\nSlackware Linux (GNU/Linux)\r\nAndroid-x86 (GNU/Linux)', '2024-03-14 08:28:29', 16),
(61, 6, NULL, NULL, NULL, NULL),
(61, 7, 'Clase 02 - 5to Hardware y Software.pdf', 'Clase 02 - 5to Hardware y Software.pdf', '2024-03-21 08:19:03', 16),
(61, 9, 'S04-5to Ramses urbano xds - El sistema operativo.pdf', '', '2024-04-11 08:24:45', 16),
(61, 12, 'S05- 5to Ramses urbano- El panel de control del SO.pdf', 'el almacenimiento libre es 178 GB\r\nEL almacenimiento lleno es 44.7 GB\r\nel almacenimiento total es 222 GB\r\n', '2024-04-18 08:37:05', 16),
(61, 13, 'Ramses urbano.pdf', '', '2024-06-06 09:44:55', 16),
(61, 14, 'Sesión 12- 5to ramses urbano.pdf', '', '2024-06-20 09:36:43', 12),
(61, 17, NULL, NULL, NULL, 16),
(62, 8, NULL, NULL, NULL, NULL),
(62, 10, NULL, NULL, NULL, NULL),
(63, 8, NULL, NULL, NULL, NULL),
(63, 10, NULL, NULL, NULL, NULL),
(64, 8, NULL, NULL, NULL, NULL),
(64, 10, NULL, NULL, NULL, NULL),
(65, 8, NULL, NULL, NULL, NULL),
(65, 10, NULL, NULL, NULL, NULL),
(66, 8, NULL, NULL, NULL, NULL),
(66, 10, NULL, NULL, NULL, NULL),
(67, 8, NULL, NULL, NULL, NULL),
(67, 10, NULL, NULL, NULL, NULL),
(68, 8, NULL, NULL, NULL, NULL),
(68, 10, NULL, NULL, NULL, NULL),
(69, 8, NULL, NULL, NULL, NULL),
(69, 10, NULL, NULL, NULL, NULL),
(73, 8, NULL, NULL, NULL, NULL),
(73, 10, NULL, NULL, NULL, NULL),
(74, 8, NULL, NULL, NULL, NULL),
(74, 10, NULL, NULL, NULL, NULL),
(75, 8, NULL, NULL, NULL, NULL),
(75, 10, NULL, NULL, NULL, NULL),
(77, 8, NULL, NULL, NULL, NULL),
(77, 10, NULL, NULL, NULL, NULL),
(78, 8, NULL, NULL, NULL, NULL),
(78, 10, NULL, NULL, NULL, NULL),
(79, 8, NULL, NULL, NULL, NULL),
(79, 10, NULL, NULL, NULL, NULL),
(80, 5, '', 'El sistema operativo es el software que coordina y dirige todos los servicios y aplicaciones que utiliza el usuario en una computadora, por eso es el más importante y fundamental. Se trata de programas que permiten y regulan los aspectos más básicos del sistema. Los sistemas operativos más utilizados son Windows, Linux, OS/2 y DOS.\r\n\r\n', '2024-03-14 08:29:03', 16),
(80, 6, NULL, NULL, NULL, NULL),
(80, 7, 'Clase 02 - 5to Hardware y Software (4).pdf', '', '2024-03-21 08:15:53', 16),
(80, 9, 'S04-5to tatiana yasmin cadenillas loayza - El sistema operativo.pdf', '', '2024-04-11 08:28:57', 16),
(80, 12, 'S05- 5to tatiana yasmin cadenillas loayza - El panel de control del SO.pdf', 'almacenamiento total 222 GB\r\nlibres 174 GB\r\nUSADOS 48.0 GB', '2024-04-18 08:39:23', 16),
(80, 13, 'tatiana cadenillas loayza.pdf', '', '2024-06-06 09:47:33', 16),
(80, 14, 'Sesión 12- 5to tatiana cadenillas.pdf', '', '2024-06-20 09:36:56', 16),
(80, 17, NULL, NULL, NULL, 18),
(81, 5, '', '1. Un sistema operativo es un conjunto de programas que permite manejar la memoria, disco, medios de almacenamiento de información y los diferentes periféricos o recursos de nuestra computadora, como son el teclado, el mouse, la impresora, la placa de red, entre otros.\r\n2. windows, mac, androity un wink(un pinguino)', '2024-03-14 08:28:00', 16),
(81, 6, NULL, NULL, NULL, NULL),
(81, 7, 'Clase 02 - 5to Hardware y Software tarea.pdf', '', '2024-03-21 08:09:53', 16),
(81, 9, 'S04-5to Gabriel Salcedo - El sistema operativo tarea.pdf', '', '2024-04-11 08:22:42', 12),
(81, 12, 'S05- 5to Gabriel Salcedo - El panel de control del SO TAREA.pdf', '1.- MI COMPUTADORA TIENE 111 GB DE ESPACIO EN TOTAL\r\n2.- TIENE  73.7 GB DE ESPACIO\r\n3.- Y SE ESTA USANDO UN 37.4 GB', '2024-04-18 08:29:30', 16),
(81, 13, 'Sesión 08 Gabriel Salcedo- 5to Dispositivos de E-S TAREA.pdf', '', '2024-06-06 09:42:15', 16),
(81, 14, 'Sesión 12- 5to GABRIEL SALCEDO Tarea.pdf', 'hodaaa', '2024-06-20 09:35:43', 16),
(81, 17, NULL, NULL, NULL, 16),
(82, 5, '', 'es un software que dirige las aplicaciones de quienes los usan', '2024-03-14 08:29:05', 12),
(82, 6, NULL, NULL, NULL, NULL),
(82, 7, NULL, NULL, NULL, NULL),
(82, 9, 'S04-5to Emilhie SANCHEZ- sistema.pdf', '', '2024-04-11 08:28:09', 16),
(82, 12, 'S05- 5to emilhie sanchez - El panel de control del SO.pdf', 'capaciad total 222 gb\r\namacenamiento libre 175 GB\r\nALMACENAMIENTO USADO 47.6GB', '2024-04-25 10:06:22', 16),
(82, 13, 'emilhie sanchez mae 2024.pdf', '', '2024-06-06 09:46:36', 16),
(82, 14, NULL, NULL, NULL, NULL),
(82, 17, NULL, NULL, NULL, NULL),
(83, 8, NULL, NULL, NULL, NULL),
(83, 10, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tema`
--

CREATE TABLE `tb_tema` (
  `idTema` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idUnidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_tema`
--

INSERT INTO `tb_tema` (`idTema`, `descripcion`, `estado`, `idUnidad`) VALUES
(1, 'Todos los exploradores', 1, 1),
(2, 'El diccionario', 1, 1),
(3, 'La exposición de temas', 1, 1),
(4, 'Acentuación general', 1, 2),
(5, 'Lenguaje literario y no literario', 1, 2),
(6, 'La comunciación. Lenguaje lengua y habla', 1, 2),
(7, 'Escribe una narración fantástica', 1, 3),
(8, 'Las palabras clave', 1, 3),
(9, 'Autoestima', 1, 3),
(10, 'Adictos a las redes sociales', 1, 9),
(11, 'El texto', 1, 9),
(12, 'La conversación', 1, 10),
(13, 'Acentuación especial', 1, 10),
(14, 'Textos literarios orales', 1, 11),
(15, 'Los sustantivos y los pronombres', 1, 11),
(16, 'Elabora una infografía', 1, 12),
(17, 'Tema y subtemas', 1, 12),
(18, 'Sinceridad', 1, 13),
(19, 'Tema y subtemas Unidad 5', 1, 13),
(20, 'Sinceridad tema u8', 1, 14),
(21, 'Tema y subtemas sinceridad tema u8', 1, 14),
(22, 'Tema y subtemas sinceridad tema u7', 1, 15),
(23, 'Tema y subtemas sinceridad tema u7', 1, 15),
(24, 'Tema y subtemas sinceridad tema u8', 1, 16),
(25, 'Tema y subtemas sinceridad tema u8', 1, 16),
(26, 'Uso adecuado de la computadora', 1, 33),
(27, 'Importancia de la computadora', 1, 33),
(28, 'El Sistema Operativo y sus herramientas', 1, 34),
(29, 'Configuración del Sistema Operativo', 1, 34),
(30, 'Dispositivos de entrada y salida', 1, 35),
(31, 'Dispositivos de almacenamiento', 1, 35),
(32, 'Sistemas de proceso de la información', 1, 36),
(33, 'EPS Entrada proceso y salida', 1, 36),
(34, 'Partes internas: El case, la fuente de poder y la placa base', 1, 37),
(35, 'Partes internas: La memoria RAM, el procesador y el disco duro', 1, 37),
(36, 'Partes internas: Disco duro vs memoria RAM', 1, 38),
(37, 'Reconozco virtualmente los componentes internos del CPU', 1, 38),
(38, 'Ensamblo virtualmente y reconozco el, case, la fuente y la placa basea', 1, 39),
(39, 'Ensamblo virtualmente y reconozco la memoria RAM, el procesador y el disco duro', 1, 39),
(40, 'Elaboro una monografía del Sistema Operativo', 1, 40),
(41, 'Presentación de la monografía del Sistema Operativo', 1, 40),
(42, 'Uso adecuado de la computadora', 1, 41),
(43, 'Importancia de la computadora', 1, 41),
(44, 'Introducción al lenguaje HTML', 1, 42),
(45, 'Estructura de una página Web', 1, 42),
(46, 'Etiquetas de la estructura del html', 1, 43),
(47, 'Atributos de color de fondo y fuente', 1, 43),
(48, 'Etiqueta frame', 1, 44),
(49, 'Construyo mi página Web con frames', 1, 44),
(50, 'Hipervinculos y Tablas', 1, 45),
(51, 'Implemento hipervinculos y tablas en mi proyecto web', 1, 45),
(52, 'Etiqueta Iframe y sus atributos', 1, 46),
(53, 'Incrustación de vinculos externos en mi proyecto web', 1, 46),
(54, 'Presento mi proyecto web', 1, 47),
(55, 'Elaboro una monografía del lenguaje HTML', 1, 47),
(56, 'Los virus y los antivirus', 1, 48),
(57, 'Cómo proteger nuestra computadora de ciberataques', 1, 48),
(58, 'Uso adecuado e importancia de la computadora', 1, 49),
(59, 'Sistema de archivos del sistema operativo', 1, 49),
(60, 'El Hardware y los dipositivos de entrada y salida', 1, 50),
(61, 'El sotware, tipos y su importancia', 1, 50),
(62, 'Organización de la información, carpetas y accesos directos', 1, 51),
(63, 'Cuidado y prevención de pérdida de datos', 1, 51),
(64, 'La hoja de cálculo tipos de datos y operadores matemáticos', 1, 52),
(65, 'Planteamiento de fórmulas para desarrollar problemas matemáticos', 1, 52),
(66, 'Funciones y fórmulas para elaborar cálculos de compra y venta', 1, 53),
(67, 'Proyecciones de ventas, pérdida y ganancia', 1, 53),
(68, 'Encuestas y tabulación de datos variable xi y ni', 1, 54),
(69, 'Tablas y gráficos estadísticos en la hoja de cálculo', 1, 54),
(70, 'Planteamiento del proyecto la encuesta', 1, 55),
(71, 'Funciones lógicas', 1, 55),
(72, 'Reguistro de gastos y costos en la hoja de cálculo', 1, 56),
(73, 'Registro de ventas y proyección de ganancia', 1, 56),
(74, 'Uso adecuado e importancia de la computadora', 1, 57),
(75, 'Teclas especiales, carpetas y archivos', 1, 57),
(76, 'Estructura de las tablas en el editor de textos', 1, 58),
(77, 'Modificación y combinación de celdas', 1, 58),
(78, 'Inserción de imágenes en las tablas', 1, 59),
(79, 'Tabulación de textos e imágenes en las tablas', 1, 59),
(80, 'Introducción a las diapositivas y presentaciones', 1, 60),
(81, 'Creación de diapositivas y presentaciones', 1, 60),
(82, 'Animaciones de imágenes y textos', 1, 61),
(83, 'Animaciones y transiciones en las diapositivas', 1, 61),
(84, 'Animaciones personalizadas', 1, 62),
(85, 'Aplicar transparencia a las imágenes', 1, 62),
(86, 'Introducción a las hojas de cálculo', 1, 63),
(87, 'Tipos de datos de las hojas de cálculo', 1, 63),
(88, 'Creación de fórmulas con operadores aritméticos', 1, 64),
(89, 'Importancia de las fórmulas en las hojas de cálculo', 1, 64),
(90, 'Uso adecuado de la computadora', 1, 65),
(91, 'Importancia de la computadora', 1, 65),
(92, 'Introducción al lenguaje HTML', 1, 66),
(93, 'Estructura de una página Web', 1, 66),
(94, 'Etiquetas de la estructura del html', 1, 67),
(95, 'Atributos de color de fondo y fuente', 1, 67),
(96, 'Etiqueta frame', 1, 68),
(97, 'Construyo mi página Web con frames', 1, 68),
(98, 'Hipervinculos y Tablas', 1, 69),
(99, 'Implemento hipervinculos y tablas en mi proyecto web', 1, 69),
(100, 'Etiqueta Iframe y sus atributos', 1, 70),
(101, 'Incrustación de vinculos externos en mi proyecto web', 1, 70),
(102, 'Presento mi proyecto web', 1, 71),
(103, 'Elaboro una monografía del lenguaje HTML', 1, 71),
(104, 'Los virus y los antivirus', 1, 72),
(105, 'Cómo proteger nuestra computadora de ciberataques', 1, 72),
(106, 'Uso adecuado de la computadora', 1, 73),
(107, 'Importancia de la computadora', 1, 73),
(108, 'El Sistema Operativo y sus herramientas', 1, 74),
(109, 'Configuración del Sistema Operativo', 1, 74),
(110, 'Dispositivos de entrada y salida', 1, 75),
(111, 'Dispositivos de almacenamiento', 1, 75),
(112, 'Sistemas de proceso de la información', 1, 76),
(113, 'EPS Entrada proceso y salida', 1, 76),
(114, 'Partes internas: El case, la fuente de poder y la placa base', 1, 77),
(115, 'Partes internas: La memoria RAM, el procesador y el disco duro', 1, 77),
(116, 'Partes internas: Disco duro vs memoria RAM', 1, 78),
(117, 'Reconozco virtualmente los componentes internos del CPU', 1, 78),
(118, 'Ensamblo virtualmente y reconozco el, case, la fuente y la placa basea', 1, 79),
(119, 'Ensamblo virtualmente y reconozco la memoria RAM, el procesador y el disco duro', 1, 79),
(120, 'Elaboro una monografía del Sistema Operativo', 1, 80),
(121, 'Presentación de la monografía del Sistema Operativo', 1, 80),
(122, 'Uso adecuado y conceptos básicos', 1, 81),
(123, 'Importancia de la computadora', 1, 81),
(124, 'El software y el sistema operativo', 1, 82),
(125, 'El hardware y los dispositivos E/S', 1, 82),
(126, 'Tema 5', 1, 83),
(127, 'Tema 6', 1, 83),
(128, 'Tema', 1, 84),
(129, 'Tema', 1, 84),
(130, 'Tema', 1, 85),
(131, 'Tema', 1, 85),
(132, 'Tema', 1, 86),
(133, 'Tema', 1, 86),
(134, 'Tema', 1, 87),
(135, 'Tema', 1, 87),
(136, 'Tema', 1, 88),
(137, 'Tema', 1, 88);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_pregunta`
--

CREATE TABLE `tb_tipo_pregunta` (
  `idTipoPregunta` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_tipo_pregunta`
--

INSERT INTO `tb_tipo_pregunta` (`idTipoPregunta`, `descripcion`, `estado`) VALUES
(1, 'Opción Múltiple', 1),
(2, 'Verdadero o Falso', 1),
(3, 'Emparejamiento', 1),
(4, 'Respuesta Corta', 1),
(5, 'Respuesta Numérica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_unidad`
--

CREATE TABLE `tb_unidad` (
  `idUnidad` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `idPeriodo` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_unidad`
--

INSERT INTO `tb_unidad` (`idUnidad`, `descripcion`, `idPeriodo`, `idCurso`, `idSeccion`) VALUES
(1, 'Unidad 1 - Soy importante', 7, 1, 40),
(2, 'Unidad 2 - Soy transparente', 7, 1, 40),
(3, 'Unidad 3 - Siempre adelante', 7, 1, 40),
(4, 'Unidad 4 - Soy feliz como soy', 8, 1, 40),
(5, 'Unidad 5 - Si actúas con constancia, lo loagrarás', 8, 1, 40),
(6, 'Unidad 6 - Justicia: a cada uno lo que le corresponde', 8, 1, 40),
(7, 'Unidad 7 - Con tolerancia se vive en armonía', 9, 1, 40),
(8, 'Unidad 8 - Con creatividad se puede mejorar el mundo', 9, 1, 40),
(9, 'Unidad 1 - Matematica ', 7, 2, 40),
(10, 'Unidad 2 - Matematica ', 7, 2, 40),
(11, 'Unidad 3 - Matematica ', 7, 2, 40),
(12, 'Unidad 4 - Matematica ', 8, 2, 40),
(13, 'Unidad 5 - Matematica ', 8, 2, 40),
(14, 'Unidad 6 - Matematica ', 8, 2, 40),
(15, 'Unidad 7 - Matematica ', 9, 2, 40),
(16, 'Unidad 8 - Matematica ', 9, 2, 40),
(17, 'Unidad 1 - Soy importante  4to', 7, 1, 38),
(18, 'Unidad 2 - Soy transparente 4o', 7, 1, 38),
(19, 'Unidad 3 - Siempre adelante 4to', 7, 1, 38),
(20, 'Unidad 4 - Soy feliz como soy 4to', 8, 1, 38),
(21, 'Unidad 5 - Si actúas con constancia, lo loagrarás 4to', 8, 1, 38),
(22, 'Unidad 6 - Justicia: a cada uno lo que le corresponde 4to', 8, 1, 38),
(23, 'Unidad 7 - Con tolerancia se vive en armonía 4to', 9, 1, 38),
(24, 'Unidad 8 - Con creatividad se puede mejorar el mundo 4to', 9, 1, 38),
(25, 'Unidad 1 - Matematica  4to', 7, 2, 38),
(26, 'Unidad 2 - Matematica  4to', 7, 2, 38),
(27, 'Unidad 3 - Matematica  4to', 7, 2, 38),
(28, 'Unidad 4 - Matematica  4to', 8, 2, 38),
(29, 'Unidad 5 - Matematica  4to', 8, 2, 38),
(30, 'Unidad 6 - Matematica  4to', 8, 2, 38),
(31, 'Unidad 7 - Matematica  4to', 9, 2, 38),
(32, 'Unidad 8 - Matematica  4to', 9, 2, 38),
(33, 'Unidad 1 - Importancia de la computadora', 7, 6, 36),
(34, 'Unidad 2 - Estructura de las tablas en el editor de textos', 7, 6, 36),
(35, 'Unidad 3 - Tabulación de imágenes, formas y diseño de textos en las tablas', 8, 6, 36),
(36, 'Unidad 4 - Introducción a las diapositivas y presentaciones', 8, 6, 36),
(37, 'Unidad 5 - Diseño de diapositivas con Animaciones y transiciones', 9, 6, 36),
(38, 'Unidad 6 - Creación de animaciones personalizadas', 9, 6, 36),
(39, 'Unidad 7 - Introducción a las hojas de cálculo', 10, 6, 36),
(40, 'Unidad 8 - Importancia de las fórmulas en las hojas de cálculo', 10, 6, 36),
(41, 'Unidad 1 - Importancia de la computadora', 7, 6, 38),
(42, 'Unidad 2 - El hardware y el software', 7, 6, 38),
(43, 'Unidad 3 - Organización y almacenamiento de la información', 8, 6, 38),
(44, 'Unidad 4 - La hoja de cálculo y su importancia', 8, 6, 38),
(45, 'Unidad 5 - Fórmulas y funciones en las hojas de cálculo', 9, 6, 38),
(46, 'Unidad 6 - Encuesta y tabulación de datos en la hoja de cálculo', 9, 6, 38),
(47, 'Unidad 7 - Funciones lógicas verdadero o falso', 10, 6, 38),
(48, 'Unidad 8 - Uso de la hoja de cálculo en actividades comerciales', 10, 6, 38),
(49, 'Unidad 1 - Importancia de la computadora', 7, 6, 39),
(50, 'Unidad 2 - El Sistema Operativo y su importancia', 7, 6, 39),
(51, 'Unidad 3 - Dispositivos de entrada y salida', 8, 6, 39),
(52, 'Unidad 4 - Sistema de proceso de la computadora', 8, 6, 39),
(53, 'Unidad 5 - Partes internas del CPU modulo 1', 9, 6, 39),
(54, 'Unidad 6 - Partes internas del CPU modulo 2', 9, 6, 39),
(55, 'Unidad 7 - Ensamblaje virtual del CPU', 10, 6, 39),
(56, 'Unidad 8 - Desarrollo monográfico del Sistema Operativo', 10, 6, 39),
(57, 'Unidad 1 - Importancia de la computadora', 7, 6, 40),
(58, 'Unidad 2 - Introducción al lenguaje HTML', 7, 6, 40),
(59, 'Unidad 3 - Estructura de una página Web', 7, 6, 40),
(60, 'Unidad 4 - Construyo mi página Web con frames', 8, 6, 40),
(61, 'Unidad 5 - Desarrollo del proyecto', 8, 6, 40),
(62, 'Unidad 6 - Proyecto Elaboro mi página web', 8, 6, 40),
(63, 'Unidad 7 - Desarrollo monográfico del lenguaje HTML', 9, 6, 40),
(64, 'Unidad 8 - Medidas de seguridad informática', 9, 6, 40),
(65, 'Unidad 1 - Importancia de la computadora', 7, 6, 52),
(66, 'Unidad 2 - Introducción al lenguaje HTML', 7, 6, 52),
(67, 'Unidad 3 - Estructura de una página Web', 7, 6, 52),
(68, 'Unidad 4 - Construyo mi página Web con frames', 8, 6, 52),
(69, 'Unidad 5 - Desarrollo del proyecto', 8, 6, 52),
(70, 'Unidad 6 - Proyecto Elaboro mi página web', 8, 6, 52),
(71, 'Unidad 7 - Desarrollo monográfico del lenguaje HTML', 9, 6, 52),
(72, 'Unidad 8 - Medidas de seguridad informática', 9, 6, 52),
(73, 'Unidad 1 - Importancia de la computadora', 7, 6, 51),
(74, 'Unidad 2 - El Sistema Operativo y su importancia', 7, 6, 51),
(75, 'Unidad 3 - Dispositivos de entrada y salida', 8, 6, 51),
(76, 'Unidad 4 - Sistema de proceso de la computadora', 8, 6, 51),
(77, 'Unidad 5 - Partes internas del CPU modulo 1', 9, 6, 51),
(78, 'Unidad 6 - Partes internas del CPU modulo 2', 9, 6, 51),
(79, 'Unidad 7 - Ensamblaje virtual del CPU', 10, 6, 51),
(80, 'Unidad 8 - Desarrollo monográfico del Sistema Operativo', 10, 6, 51),
(81, 'Unidad 1 - Conceptos básicos de computación', 7, 6, 50),
(82, 'Unidad 2 - El software y el hardware', 7, 6, 50),
(83, 'Unidad 3 - El Sistema Binario', 8, 6, 50),
(84, 'Unidad 4 - ', 8, 6, 50),
(85, 'Unidad 5 - ', 9, 6, 50),
(86, 'Unidad 6 - ', 9, 6, 50),
(87, 'Unidad 7 - ', 10, 6, 50),
(88, 'Unidad 8 - ', 10, 6, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomUsuario` varchar(10) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `estadoUsuario` tinyint(4) DEFAULT NULL,
  `idRol` int(11) NOT NULL,
  `metodo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`idUsuario`, `nomUsuario`, `password`, `estadoUsuario`, `idRol`, `metodo`) VALUES
(1, 'SANQUI2023', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, 'sha1'),
(2, 'TERQUI2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 3, 'sha1'),
(3, 'JORROJ2023', '819b1de440e580813fa50dbd1f7d2422ea35d0a9', 1, 2, 'sha1'),
(4, 'LILESQ2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 2, 'sha1'),
(5, 'REYVER2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 2, 'sha1'),
(6, 'FABSAL2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 2, 'sha1'),
(7, 'NANQUI2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 2, 'sha1'),
(8, 'ZOEALE2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(9, 'MATAPA2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(10, 'ADRBER2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(11, 'DOMBRA2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(12, 'VICCAR2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(13, 'AXECHI2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(14, 'ADRCOR2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(15, 'ADRCUR2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(16, 'ARIGAO2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(17, 'ALEGAR2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(18, 'JHAALV2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(19, 'JAVHUA2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(20, 'CAMLAG2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(21, 'LUACAB2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(22, 'ANAMIR2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(23, 'ANDPIA2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(24, 'TATPRA2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(25, 'ROYSOT2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(26, 'EYMVIL2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(27, 'MAYZAP2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 6, 'sha1'),
(28, 'EVEBAR2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 7, 'sha1'),
(29, 'ANACAS2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 4, 'sha1'),
(30, 'LUZCUB2019', '6558bb760556e24ba3c77cebf5f6b30e2eac157d', 1, 2, 'sha1'),
(31, 'ZULMAE2022', 'e97845258e0cfca270f9ee0da4d8454e1db5d9fa', 1, 2, 'sha1'),
(32, 'GIOMAE2022', 'e97845258e0cfca270f9ee0da4d8454e1db5d9fa', 1, 2, 'sha1'),
(33, 'CRIMAE2022', 'e97845258e0cfca270f9ee0da4d8454e1db5d9fa', 1, 2, 'sha1'),
(34, 'ANDAIQ2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(35, 'RENAMA2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(36, 'GABBEL2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(37, 'RAPCAN2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(38, 'FABFRA2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(39, 'DEAIRA2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(40, 'ADRMAC2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(41, 'MATMAM2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(42, 'KIAMOR2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(43, 'MAUMUN2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(44, 'FABRUJ2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(45, 'JOSSAN2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(46, 'GIAAMO2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(47, 'LUZAMA2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(48, 'ROMBEC2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(49, 'BIACAN2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(50, 'SAMCEN2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(51, 'THICHI2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(52, 'JORCHI2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(53, 'JOACOR2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(54, 'ALLDEL2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(55, 'JAZGAV2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(56, 'JANGOM2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(57, 'OLEHIN2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(58, 'LUIHUA2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(59, 'NESMEN2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(60, 'MATMOL2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(61, 'JAYPAR2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(62, 'THIROS2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(63, 'JHASOL2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(64, 'LUITIR2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(65, 'CRITOR2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(66, 'MARAPO2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(67, 'ANTCOT2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(68, 'CHRCUS2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(69, 'ANGHUA2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(70, 'LUCLEO2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(71, 'FERPED2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(72, 'LEOSAN2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(73, 'ARISAL2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(74, 'PEDURB2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(75, 'LUKAUR2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(76, 'JHOCAN2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(77, 'ANACOR2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(78, 'ALVDUE2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(79, 'ALEFLO2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(80, 'IVAFLO2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(81, 'SAMGUI2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(82, 'LUAHUA2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(83, 'GAEMAU2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(84, 'MICJIM2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(85, 'GABNAP2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(86, 'LIAOVA2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(87, 'VALPAR2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(88, 'YHAPEÑ2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(89, 'ALEPER2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(90, 'ALERAM2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(91, 'PEDROJ2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(92, 'THITOR2023', 'c3144939e8e32d4abfae2e05bf15f8bb9699a1d4', 1, 6, 'sha1'),
(93, 'TATCAD2024', '93360613bdc0a035af749d8f5f75f9772a2909b2', 1, 6, 'sha1'),
(94, 'JOSSAL2024', '93360613bdc0a035af749d8f5f75f9772a2909b2', 1, 6, 'sha1'),
(95, 'EMISAN2024', '93360613bdc0a035af749d8f5f75f9772a2909b2', 1, 6, 'sha1'),
(96, 'ANACAR2024', '93360613bdc0a035af749d8f5f75f9772a2909b2', 1, 6, 'sha1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_verdadero_falso`
--

CREATE TABLE `tb_verdadero_falso` (
  `idVerdaderoFalso` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `retroalimentacionV` varchar(300) DEFAULT NULL,
  `retroalimentacionF` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tb_verdadero_falso`
--

INSERT INTO `tb_verdadero_falso` (`idVerdaderoFalso`, `idPregunta`, `respuesta`, `estado`, `retroalimentacionV`, `retroalimentacionF`) VALUES
(1, 7, 1, 1, 'Correcto', 'no'),
(2, 8, 1, 1, 'correcto', 'incorrecto'),
(3, 16, 1, 1, 'Correcto', 'Incorrecto'),
(4, 17, 0, 1, 'Incorrecto, la imagen es un documento de Word', 'Correcto'),
(5, 18, 0, 1, 'Incorrecto, la imagen es una aplicacion o software', 'Correcto, no es un hardware es un software'),
(6, 20, 0, 1, 'Recuerda q solo son 3 etiquetas básicas HTML, HEAD y BODY', 'Correcto son 3 etiquetas básicas HTML, HEAD y BODY'),
(7, 21, 1, 1, 'Correcto', 'Incorrecto'),
(8, 22, 0, 1, 'Incorrecto, recuerda que la etiqueta BR sirve para saltar a la siguiente línea', 'Correcto, la etiqueta BR sirve para saltar a la siguiente línea y no para dejar espacio en blanco'),
(9, 27, 1, 1, 'correcto', 'incorrecto'),
(10, 28, 0, 1, 'incorrecto', 'correcto'),
(11, 29, 0, 1, 'incorrecto', 'correcto'),
(12, 35, 1, 1, 'correcto', 'incorrecto'),
(13, 36, 0, 1, 'incorrecto', 'correcto'),
(14, 38, 0, 1, 'incorrecto', 'correcto'),
(15, 39, 0, 1, 'Incorrecto', 'Correcto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_accesousuario`
--
ALTER TABLE `tb_accesousuario`
  ADD PRIMARY KEY (`idAccesoUsuario`),
  ADD KEY `R_4` (`idUsuario`);

--
-- Indices de la tabla `tb_administrativo`
--
ALTER TABLE `tb_administrativo`
  ADD PRIMARY KEY (`idAdministrativo`),
  ADD KEY `R_15` (`idGenero`),
  ADD KEY `R_16` (`idDistrito`),
  ADD KEY `R_58` (`idCargo`),
  ADD KEY `R_65` (`idUsuario`);

--
-- Indices de la tabla `tb_apoderado`
--
ALTER TABLE `tb_apoderado`
  ADD PRIMARY KEY (`idApoderado`),
  ADD KEY `R_57` (`idDistrito`),
  ADD KEY `R_59` (`idGenero`);

--
-- Indices de la tabla `tb_archivo_repaso`
--
ALTER TABLE `tb_archivo_repaso`
  ADD PRIMARY KEY (`idArchivoRepaso`),
  ADD KEY `R_31` (`idMaterialRepaso`);

--
-- Indices de la tabla `tb_cargo`
--
ALTER TABLE `tb_cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `tb_competencia`
--
ALTER TABLE `tb_competencia`
  ADD PRIMARY KEY (`idCompetencia`),
  ADD KEY `R_107` (`idCurso`,`idSeccion`);

--
-- Indices de la tabla `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `tb_curso_seccion`
--
ALTER TABLE `tb_curso_seccion`
  ADD PRIMARY KEY (`idCurso`,`idSeccion`),
  ADD KEY `R_22` (`idSeccion`),
  ADD KEY `R_23` (`idDocente`);

--
-- Indices de la tabla `tb_desempenho`
--
ALTER TABLE `tb_desempenho`
  ADD PRIMARY KEY (`idDesempenho`),
  ADD KEY `R_112` (`idCompetencia`);

--
-- Indices de la tabla `tb_desempenho_tema`
--
ALTER TABLE `tb_desempenho_tema`
  ADD PRIMARY KEY (`idTema`,`idDesempenho`),
  ADD KEY `R_116` (`idDesempenho`),
  ADD KEY `R_117` (`idEstudiante`),
  ADD KEY `R_119` (`idTarea`);

--
-- Indices de la tabla `tb_distrito`
--
ALTER TABLE `tb_distrito`
  ADD PRIMARY KEY (`idDistrito`);

--
-- Indices de la tabla `tb_docente`
--
ALTER TABLE `tb_docente`
  ADD PRIMARY KEY (`idDocente`),
  ADD KEY `R_14` (`idEspecialidad`),
  ADD KEY `R_61` (`idDistrito`),
  ADD KEY `R_64` (`idUsuario`),
  ADD KEY `R_67` (`idGenero`);

--
-- Indices de la tabla `tb_emparejamiento`
--
ALTER TABLE `tb_emparejamiento`
  ADD PRIMARY KEY (`idEmparejamiento`),
  ADD KEY `R_85` (`idPregunta`);

--
-- Indices de la tabla `tb_especialidad`
--
ALTER TABLE `tb_especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD KEY `R_52` (`idApoderado`),
  ADD KEY `R_53` (`idUsuario`),
  ADD KEY `R_60` (`idGenero`);

--
-- Indices de la tabla `tb_evaluacion`
--
ALTER TABLE `tb_evaluacion`
  ADD PRIMARY KEY (`idEvaluacion`),
  ADD KEY `R_129` (`idTema`);

--
-- Indices de la tabla `tb_evaluacion_estudiante`
--
ALTER TABLE `tb_evaluacion_estudiante`
  ADD PRIMARY KEY (`idEvaluacion`,`idEstudiante`),
  ADD KEY `R_75` (`idEstudiante`);

--
-- Indices de la tabla `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `tb_grado`
--
ALTER TABLE `tb_grado`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `tb_informe_acad`
--
ALTER TABLE `tb_informe_acad`
  ADD PRIMARY KEY (`idInforme`),
  ADD KEY `R_35` (`idDocente`);

--
-- Indices de la tabla `tb_informe_comport`
--
ALTER TABLE `tb_informe_comport`
  ADD PRIMARY KEY (`idInformeComport`),
  ADD KEY `R_40` (`idEstudiante`),
  ADD KEY `R_41` (`idDocente`);

--
-- Indices de la tabla `tb_inf_acad_estudiante`
--
ALTER TABLE `tb_inf_acad_estudiante`
  ADD PRIMARY KEY (`idInforme`,`idEstudiante`),
  ADD KEY `R_36` (`idEstudiante`);

--
-- Indices de la tabla `tb_inf_psicologico`
--
ALTER TABLE `tb_inf_psicologico`
  ADD PRIMARY KEY (`idInformePsicologico`),
  ADD KEY `R_56` (`idEstudiante`),
  ADD KEY `R_55` (`idPsicologo`);

--
-- Indices de la tabla `tb_material_repaso`
--
ALTER TABLE `tb_material_repaso`
  ADD PRIMARY KEY (`idMaterialRepaso`),
  ADD KEY `R_86` (`idTema`);

--
-- Indices de la tabla `tb_matricula`
--
ALTER TABLE `tb_matricula`
  ADD PRIMARY KEY (`idSeccion`,`idEstudiante`),
  ADD KEY `R_19` (`idEstudiante`);

--
-- Indices de la tabla `tb_numerica`
--
ALTER TABLE `tb_numerica`
  ADD PRIMARY KEY (`idNumerica`),
  ADD KEY `R_84` (`idPregunta`);

--
-- Indices de la tabla `tb_opcion_multiple`
--
ALTER TABLE `tb_opcion_multiple`
  ADD PRIMARY KEY (`idOpcionMultiple`),
  ADD KEY `R_80` (`idPregunta`);

--
-- Indices de la tabla `tb_periodo_acad`
--
ALTER TABLE `tb_periodo_acad`
  ADD PRIMARY KEY (`idPeriodo`);

--
-- Indices de la tabla `tb_pregunta`
--
ALTER TABLE `tb_pregunta`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `R_28` (`idTema`),
  ADD KEY `R_87` (`idTipoPregunta`);

--
-- Indices de la tabla `tb_pregunta_evaluacion`
--
ALTER TABLE `tb_pregunta_evaluacion`
  ADD PRIMARY KEY (`idEvaluacion`,`idPregunta`),
  ADD KEY `R_34` (`idPregunta`);

--
-- Indices de la tabla `tb_psicologo`
--
ALTER TABLE `tb_psicologo`
  ADD PRIMARY KEY (`idPsicologo`),
  ADD KEY `R_63` (`idDistrito`),
  ADD KEY `R_66` (`idUsuario`),
  ADD KEY `R_69` (`idGenero`);

--
-- Indices de la tabla `tb_respuesta_corta`
--
ALTER TABLE `tb_respuesta_corta`
  ADD PRIMARY KEY (`idRespuestaCorta`),
  ADD KEY `R_83` (`idPregunta`);

--
-- Indices de la tabla `tb_respuesta_estudiante`
--
ALTER TABLE `tb_respuesta_estudiante`
  ADD PRIMARY KEY (`idRespuestaEstudiante`),
  ADD KEY `R_78` (`idEvaluacion`,`idEstudiante`),
  ADD KEY `R_96` (`idPregunta`);

--
-- Indices de la tabla `tb_respuesta_multiple`
--
ALTER TABLE `tb_respuesta_multiple`
  ADD PRIMARY KEY (`idRespuestaMultiple`),
  ADD KEY `R_90` (`idRespuestaEstudiante`);

--
-- Indices de la tabla `tb_respuesta_numerica`
--
ALTER TABLE `tb_respuesta_numerica`
  ADD PRIMARY KEY (`idRespuestaNumerica`),
  ADD KEY `R_94` (`idRespuestaEstudiante`);

--
-- Indices de la tabla `tb_respuesta_vf`
--
ALTER TABLE `tb_respuesta_vf`
  ADD PRIMARY KEY (`idRespuestaVF`),
  ADD KEY `R_91` (`idRespuestaEstudiante`);

--
-- Indices de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tb_rpta_corta_estudiante`
--
ALTER TABLE `tb_rpta_corta_estudiante`
  ADD PRIMARY KEY (`idRespuestaCorta`),
  ADD KEY `R_93` (`idRespuestaEstudiante`);

--
-- Indices de la tabla `tb_rpta_emparejamiento`
--
ALTER TABLE `tb_rpta_emparejamiento`
  ADD PRIMARY KEY (`idRptaEmparejamiento`),
  ADD KEY `R_92` (`idRespuestaEstudiante`);

--
-- Indices de la tabla `tb_seccion`
--
ALTER TABLE `tb_seccion`
  ADD PRIMARY KEY (`idSeccion`),
  ADD KEY `R_24` (`idGrado`);

--
-- Indices de la tabla `tb_sub_opc_multiple`
--
ALTER TABLE `tb_sub_opc_multiple`
  ADD PRIMARY KEY (`idSubOpcMultiple`),
  ADD KEY `R_127` (`idOpcionMultiple`);

--
-- Indices de la tabla `tb_tarea`
--
ALTER TABLE `tb_tarea`
  ADD PRIMARY KEY (`idTarea`),
  ADD KEY `R_130` (`idTema`);

--
-- Indices de la tabla `tb_tarea_estudiante`
--
ALTER TABLE `tb_tarea_estudiante`
  ADD PRIMARY KEY (`idEstudiante`,`idTarea`),
  ADD KEY `R_124` (`idTarea`);

--
-- Indices de la tabla `tb_tema`
--
ALTER TABLE `tb_tema`
  ADD PRIMARY KEY (`idTema`),
  ADD KEY `R_105` (`idUnidad`);

--
-- Indices de la tabla `tb_tipo_pregunta`
--
ALTER TABLE `tb_tipo_pregunta`
  ADD PRIMARY KEY (`idTipoPregunta`);

--
-- Indices de la tabla `tb_unidad`
--
ALTER TABLE `tb_unidad`
  ADD PRIMARY KEY (`idUnidad`),
  ADD KEY `R_110` (`idPeriodo`),
  ADD KEY `R_120` (`idCurso`,`idSeccion`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `R_3` (`idRol`);

--
-- Indices de la tabla `tb_verdadero_falso`
--
ALTER TABLE `tb_verdadero_falso`
  ADD PRIMARY KEY (`idVerdaderoFalso`),
  ADD KEY `R_81` (`idPregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_accesousuario`
--
ALTER TABLE `tb_accesousuario`
  MODIFY `idAccesoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_administrativo`
--
ALTER TABLE `tb_administrativo`
  MODIFY `idAdministrativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_apoderado`
--
ALTER TABLE `tb_apoderado`
  MODIFY `idApoderado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `tb_archivo_repaso`
--
ALTER TABLE `tb_archivo_repaso`
  MODIFY `idArchivoRepaso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_cargo`
--
ALTER TABLE `tb_cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_competencia`
--
ALTER TABLE `tb_competencia`
  MODIFY `idCompetencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tb_curso`
--
ALTER TABLE `tb_curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_desempenho`
--
ALTER TABLE `tb_desempenho`
  MODIFY `idDesempenho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tb_distrito`
--
ALTER TABLE `tb_distrito`
  MODIFY `idDistrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_docente`
--
ALTER TABLE `tb_docente`
  MODIFY `idDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_emparejamiento`
--
ALTER TABLE `tb_emparejamiento`
  MODIFY `idEmparejamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_especialidad`
--
ALTER TABLE `tb_especialidad`
  MODIFY `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `tb_evaluacion`
--
ALTER TABLE `tb_evaluacion`
  MODIFY `idEvaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_genero`
--
ALTER TABLE `tb_genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_grado`
--
ALTER TABLE `tb_grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tb_informe_acad`
--
ALTER TABLE `tb_informe_acad`
  MODIFY `idInforme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_informe_comport`
--
ALTER TABLE `tb_informe_comport`
  MODIFY `idInformeComport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_inf_psicologico`
--
ALTER TABLE `tb_inf_psicologico`
  MODIFY `idInformePsicologico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_material_repaso`
--
ALTER TABLE `tb_material_repaso`
  MODIFY `idMaterialRepaso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_numerica`
--
ALTER TABLE `tb_numerica`
  MODIFY `idNumerica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_opcion_multiple`
--
ALTER TABLE `tb_opcion_multiple`
  MODIFY `idOpcionMultiple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tb_periodo_acad`
--
ALTER TABLE `tb_periodo_acad`
  MODIFY `idPeriodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_pregunta`
--
ALTER TABLE `tb_pregunta`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `tb_psicologo`
--
ALTER TABLE `tb_psicologo`
  MODIFY `idPsicologo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_respuesta_corta`
--
ALTER TABLE `tb_respuesta_corta`
  MODIFY `idRespuestaCorta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_respuesta_estudiante`
--
ALTER TABLE `tb_respuesta_estudiante`
  MODIFY `idRespuestaEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1250;

--
-- AUTO_INCREMENT de la tabla `tb_respuesta_multiple`
--
ALTER TABLE `tb_respuesta_multiple`
  MODIFY `idRespuestaMultiple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=920;

--
-- AUTO_INCREMENT de la tabla `tb_respuesta_numerica`
--
ALTER TABLE `tb_respuesta_numerica`
  MODIFY `idRespuestaNumerica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_respuesta_vf`
--
ALTER TABLE `tb_respuesta_vf`
  MODIFY `idRespuestaVF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_rpta_corta_estudiante`
--
ALTER TABLE `tb_rpta_corta_estudiante`
  MODIFY `idRespuestaCorta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_rpta_emparejamiento`
--
ALTER TABLE `tb_rpta_emparejamiento`
  MODIFY `idRptaEmparejamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_seccion`
--
ALTER TABLE `tb_seccion`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `tb_sub_opc_multiple`
--
ALTER TABLE `tb_sub_opc_multiple`
  MODIFY `idSubOpcMultiple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `tb_tarea`
--
ALTER TABLE `tb_tarea`
  MODIFY `idTarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tb_tema`
--
ALTER TABLE `tb_tema`
  MODIFY `idTema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_pregunta`
--
ALTER TABLE `tb_tipo_pregunta`
  MODIFY `idTipoPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_unidad`
--
ALTER TABLE `tb_unidad`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `tb_verdadero_falso`
--
ALTER TABLE `tb_verdadero_falso`
  MODIFY `idVerdaderoFalso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_accesousuario`
--
ALTER TABLE `tb_accesousuario`
  ADD CONSTRAINT `R_4` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`);

--
-- Filtros para la tabla `tb_administrativo`
--
ALTER TABLE `tb_administrativo`
  ADD CONSTRAINT `R_15` FOREIGN KEY (`idGenero`) REFERENCES `tb_genero` (`idGenero`),
  ADD CONSTRAINT `R_16` FOREIGN KEY (`idDistrito`) REFERENCES `tb_distrito` (`idDistrito`),
  ADD CONSTRAINT `R_58` FOREIGN KEY (`idCargo`) REFERENCES `tb_cargo` (`idCargo`),
  ADD CONSTRAINT `R_65` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`);

--
-- Filtros para la tabla `tb_apoderado`
--
ALTER TABLE `tb_apoderado`
  ADD CONSTRAINT `R_57` FOREIGN KEY (`idDistrito`) REFERENCES `tb_distrito` (`idDistrito`),
  ADD CONSTRAINT `R_59` FOREIGN KEY (`idGenero`) REFERENCES `tb_genero` (`idGenero`);

--
-- Filtros para la tabla `tb_archivo_repaso`
--
ALTER TABLE `tb_archivo_repaso`
  ADD CONSTRAINT `R_31` FOREIGN KEY (`idMaterialRepaso`) REFERENCES `tb_material_repaso` (`idMaterialRepaso`);

--
-- Filtros para la tabla `tb_competencia`
--
ALTER TABLE `tb_competencia`
  ADD CONSTRAINT `R_107` FOREIGN KEY (`idCurso`,`idSeccion`) REFERENCES `tb_curso_seccion` (`idCurso`, `idSeccion`);

--
-- Filtros para la tabla `tb_curso_seccion`
--
ALTER TABLE `tb_curso_seccion`
  ADD CONSTRAINT `R_20` FOREIGN KEY (`idCurso`) REFERENCES `tb_curso` (`idCurso`),
  ADD CONSTRAINT `R_22` FOREIGN KEY (`idSeccion`) REFERENCES `tb_seccion` (`idSeccion`),
  ADD CONSTRAINT `R_23` FOREIGN KEY (`idDocente`) REFERENCES `tb_docente` (`idDocente`);

--
-- Filtros para la tabla `tb_desempenho`
--
ALTER TABLE `tb_desempenho`
  ADD CONSTRAINT `R_112` FOREIGN KEY (`idCompetencia`) REFERENCES `tb_competencia` (`idCompetencia`);

--
-- Filtros para la tabla `tb_desempenho_tema`
--
ALTER TABLE `tb_desempenho_tema`
  ADD CONSTRAINT `R_115` FOREIGN KEY (`idTema`) REFERENCES `tb_tema` (`idTema`),
  ADD CONSTRAINT `R_116` FOREIGN KEY (`idDesempenho`) REFERENCES `tb_desempenho` (`idDesempenho`),
  ADD CONSTRAINT `R_117` FOREIGN KEY (`idEstudiante`) REFERENCES `tb_estudiante` (`idEstudiante`),
  ADD CONSTRAINT `R_119` FOREIGN KEY (`idTarea`) REFERENCES `tb_tarea` (`idTarea`);

--
-- Filtros para la tabla `tb_docente`
--
ALTER TABLE `tb_docente`
  ADD CONSTRAINT `R_14` FOREIGN KEY (`idEspecialidad`) REFERENCES `tb_especialidad` (`idEspecialidad`),
  ADD CONSTRAINT `R_61` FOREIGN KEY (`idDistrito`) REFERENCES `tb_distrito` (`idDistrito`),
  ADD CONSTRAINT `R_64` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`),
  ADD CONSTRAINT `R_67` FOREIGN KEY (`idGenero`) REFERENCES `tb_genero` (`idGenero`);

--
-- Filtros para la tabla `tb_emparejamiento`
--
ALTER TABLE `tb_emparejamiento`
  ADD CONSTRAINT `R_85` FOREIGN KEY (`idPregunta`) REFERENCES `tb_pregunta` (`idPregunta`);

--
-- Filtros para la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  ADD CONSTRAINT `R_52` FOREIGN KEY (`idApoderado`) REFERENCES `tb_apoderado` (`idApoderado`),
  ADD CONSTRAINT `R_53` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`),
  ADD CONSTRAINT `R_60` FOREIGN KEY (`idGenero`) REFERENCES `tb_genero` (`idGenero`);

--
-- Filtros para la tabla `tb_evaluacion`
--
ALTER TABLE `tb_evaluacion`
  ADD CONSTRAINT `R_129` FOREIGN KEY (`idTema`) REFERENCES `tb_tema` (`idTema`);

--
-- Filtros para la tabla `tb_evaluacion_estudiante`
--
ALTER TABLE `tb_evaluacion_estudiante`
  ADD CONSTRAINT `R_73` FOREIGN KEY (`idEvaluacion`) REFERENCES `tb_evaluacion` (`idEvaluacion`),
  ADD CONSTRAINT `R_75` FOREIGN KEY (`idEstudiante`) REFERENCES `tb_estudiante` (`idEstudiante`);

--
-- Filtros para la tabla `tb_informe_acad`
--
ALTER TABLE `tb_informe_acad`
  ADD CONSTRAINT `R_35` FOREIGN KEY (`idDocente`) REFERENCES `tb_docente` (`idDocente`);

--
-- Filtros para la tabla `tb_informe_comport`
--
ALTER TABLE `tb_informe_comport`
  ADD CONSTRAINT `R_40` FOREIGN KEY (`idEstudiante`) REFERENCES `tb_estudiante` (`idEstudiante`),
  ADD CONSTRAINT `R_41` FOREIGN KEY (`idDocente`) REFERENCES `tb_docente` (`idDocente`);

--
-- Filtros para la tabla `tb_inf_acad_estudiante`
--
ALTER TABLE `tb_inf_acad_estudiante`
  ADD CONSTRAINT `R_36` FOREIGN KEY (`idEstudiante`) REFERENCES `tb_estudiante` (`idEstudiante`),
  ADD CONSTRAINT `R_38` FOREIGN KEY (`idInforme`) REFERENCES `tb_informe_acad` (`idInforme`);

--
-- Filtros para la tabla `tb_inf_psicologico`
--
ALTER TABLE `tb_inf_psicologico`
  ADD CONSTRAINT `R_55` FOREIGN KEY (`idPsicologo`) REFERENCES `tb_psicologo` (`idPsicologo`),
  ADD CONSTRAINT `R_56` FOREIGN KEY (`idEstudiante`) REFERENCES `tb_estudiante` (`idEstudiante`);

--
-- Filtros para la tabla `tb_material_repaso`
--
ALTER TABLE `tb_material_repaso`
  ADD CONSTRAINT `R_86` FOREIGN KEY (`idTema`) REFERENCES `tb_tema` (`idTema`);

--
-- Filtros para la tabla `tb_matricula`
--
ALTER TABLE `tb_matricula`
  ADD CONSTRAINT `R_17` FOREIGN KEY (`idSeccion`) REFERENCES `tb_seccion` (`idSeccion`),
  ADD CONSTRAINT `R_19` FOREIGN KEY (`idEstudiante`) REFERENCES `tb_estudiante` (`idEstudiante`);

--
-- Filtros para la tabla `tb_numerica`
--
ALTER TABLE `tb_numerica`
  ADD CONSTRAINT `R_84` FOREIGN KEY (`idPregunta`) REFERENCES `tb_pregunta` (`idPregunta`);

--
-- Filtros para la tabla `tb_opcion_multiple`
--
ALTER TABLE `tb_opcion_multiple`
  ADD CONSTRAINT `R_80` FOREIGN KEY (`idPregunta`) REFERENCES `tb_pregunta` (`idPregunta`);

--
-- Filtros para la tabla `tb_pregunta`
--
ALTER TABLE `tb_pregunta`
  ADD CONSTRAINT `R_28` FOREIGN KEY (`idTema`) REFERENCES `tb_tema` (`idTema`),
  ADD CONSTRAINT `R_87` FOREIGN KEY (`idTipoPregunta`) REFERENCES `tb_tipo_pregunta` (`idTipoPregunta`);

--
-- Filtros para la tabla `tb_pregunta_evaluacion`
--
ALTER TABLE `tb_pregunta_evaluacion`
  ADD CONSTRAINT `R_32` FOREIGN KEY (`idEvaluacion`) REFERENCES `tb_evaluacion` (`idEvaluacion`),
  ADD CONSTRAINT `R_34` FOREIGN KEY (`idPregunta`) REFERENCES `tb_pregunta` (`idPregunta`);

--
-- Filtros para la tabla `tb_psicologo`
--
ALTER TABLE `tb_psicologo`
  ADD CONSTRAINT `R_63` FOREIGN KEY (`idDistrito`) REFERENCES `tb_distrito` (`idDistrito`),
  ADD CONSTRAINT `R_66` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`),
  ADD CONSTRAINT `R_69` FOREIGN KEY (`idGenero`) REFERENCES `tb_genero` (`idGenero`);

--
-- Filtros para la tabla `tb_respuesta_corta`
--
ALTER TABLE `tb_respuesta_corta`
  ADD CONSTRAINT `R_83` FOREIGN KEY (`idPregunta`) REFERENCES `tb_pregunta` (`idPregunta`);

--
-- Filtros para la tabla `tb_respuesta_estudiante`
--
ALTER TABLE `tb_respuesta_estudiante`
  ADD CONSTRAINT `R_78` FOREIGN KEY (`idEvaluacion`,`idEstudiante`) REFERENCES `tb_evaluacion_estudiante` (`idEvaluacion`, `idEstudiante`),
  ADD CONSTRAINT `R_96` FOREIGN KEY (`idPregunta`) REFERENCES `tb_pregunta` (`idPregunta`);

--
-- Filtros para la tabla `tb_respuesta_multiple`
--
ALTER TABLE `tb_respuesta_multiple`
  ADD CONSTRAINT `R_90` FOREIGN KEY (`idRespuestaEstudiante`) REFERENCES `tb_respuesta_estudiante` (`idRespuestaEstudiante`);

--
-- Filtros para la tabla `tb_respuesta_numerica`
--
ALTER TABLE `tb_respuesta_numerica`
  ADD CONSTRAINT `R_94` FOREIGN KEY (`idRespuestaEstudiante`) REFERENCES `tb_respuesta_estudiante` (`idRespuestaEstudiante`);

--
-- Filtros para la tabla `tb_respuesta_vf`
--
ALTER TABLE `tb_respuesta_vf`
  ADD CONSTRAINT `R_91` FOREIGN KEY (`idRespuestaEstudiante`) REFERENCES `tb_respuesta_estudiante` (`idRespuestaEstudiante`);

--
-- Filtros para la tabla `tb_rpta_corta_estudiante`
--
ALTER TABLE `tb_rpta_corta_estudiante`
  ADD CONSTRAINT `R_93` FOREIGN KEY (`idRespuestaEstudiante`) REFERENCES `tb_respuesta_estudiante` (`idRespuestaEstudiante`);

--
-- Filtros para la tabla `tb_rpta_emparejamiento`
--
ALTER TABLE `tb_rpta_emparejamiento`
  ADD CONSTRAINT `R_92` FOREIGN KEY (`idRespuestaEstudiante`) REFERENCES `tb_respuesta_estudiante` (`idRespuestaEstudiante`);

--
-- Filtros para la tabla `tb_seccion`
--
ALTER TABLE `tb_seccion`
  ADD CONSTRAINT `R_24` FOREIGN KEY (`idGrado`) REFERENCES `tb_grado` (`idGrado`);

--
-- Filtros para la tabla `tb_sub_opc_multiple`
--
ALTER TABLE `tb_sub_opc_multiple`
  ADD CONSTRAINT `R_127` FOREIGN KEY (`idOpcionMultiple`) REFERENCES `tb_opcion_multiple` (`idOpcionMultiple`);

--
-- Filtros para la tabla `tb_tarea`
--
ALTER TABLE `tb_tarea`
  ADD CONSTRAINT `R_130` FOREIGN KEY (`idTema`) REFERENCES `tb_tema` (`idTema`);

--
-- Filtros para la tabla `tb_tarea_estudiante`
--
ALTER TABLE `tb_tarea_estudiante`
  ADD CONSTRAINT `R_122` FOREIGN KEY (`idEstudiante`) REFERENCES `tb_estudiante` (`idEstudiante`),
  ADD CONSTRAINT `R_124` FOREIGN KEY (`idTarea`) REFERENCES `tb_tarea` (`idTarea`);

--
-- Filtros para la tabla `tb_tema`
--
ALTER TABLE `tb_tema`
  ADD CONSTRAINT `R_105` FOREIGN KEY (`idUnidad`) REFERENCES `tb_unidad` (`idUnidad`);

--
-- Filtros para la tabla `tb_unidad`
--
ALTER TABLE `tb_unidad`
  ADD CONSTRAINT `R_110` FOREIGN KEY (`idPeriodo`) REFERENCES `tb_periodo_acad` (`idPeriodo`),
  ADD CONSTRAINT `R_120` FOREIGN KEY (`idCurso`,`idSeccion`) REFERENCES `tb_curso_seccion` (`idCurso`, `idSeccion`);

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`idRol`) REFERENCES `tb_rol` (`idRol`);

--
-- Filtros para la tabla `tb_verdadero_falso`
--
ALTER TABLE `tb_verdadero_falso`
  ADD CONSTRAINT `R_81` FOREIGN KEY (`idPregunta`) REFERENCES `tb_pregunta` (`idPregunta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
