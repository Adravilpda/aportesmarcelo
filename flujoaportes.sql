-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2021 a las 21:39:05
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `flujoaportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja`
--

CREATE TABLE IF NOT EXISTS `bandeja` (
  `nro` int(11) DEFAULT NULL,
  `receptor` varchar(200) NOT NULL,
  `remitente` varchar(200) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `visto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bandeja`
--

INSERT INTO `bandeja` (`nro`, `receptor`, `remitente`, `asunto`, `fecha`, `visto`) VALUES
(0, '78936900', 'Marcelo', 'Cuenta Bancaria Enviada', '2021-06-23', 'no'),
(0, '78936900', 'Marcelo', 'Cuenta Bancaria Enviada', '2021-06-23', 'no'),
(0, '78936900', 'Marcelo', 'Cuenta Bancaria Enviada', '2021-06-23', 'no'),
(0, '78936900', 'Marcelo', 'Cuenta Bancaria Enviada', '2021-06-23', 'no'),
(0, '78936900', 'Marcelo', 'Cuenta Bancaria Enviada', '2021-06-23', 'no'),
(0, '78936900', 'Marcelo', 'Cuenta Bancaria Enviada', '2021-06-23', 'no'),
(0, '777', 'Rosi', 'Cuenta Bancaria Enviada', '2021-06-23', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `nro` int(200) NOT NULL AUTO_INCREMENT,
  `ci` int(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `rol` varchar(200) NOT NULL,
  `bandeja` varchar(200) NOT NULL,
  PRIMARY KEY (`nro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`nro`, `ci`, `usuario`, `rol`, `bandeja`) VALUES
(1, 78936900, 'Marcelo', 'U', 'si'),
(2, 777, 'Rosi', 'U', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoproceso`
--

CREATE TABLE IF NOT EXISTS `flujoproceso` (
  `flujo` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `procesosiguiente` varchar(200) NOT NULL,
  `rol` varchar(200) NOT NULL,
  `formulario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flujoproceso`
--

INSERT INTO `flujoproceso` (`flujo`, `proceso`, `procesosiguiente`, `rol`, `formulario`) VALUES
('F1', 'P1', 'P2', 'U', 'bancocuenta.inc.php'),
('F1', 'P2', 'P3', 'U', 'monto.inc.php'),
('F1', 'P3', 'P4', 'U', 'confirmaruser.inc.php'),
('F1', 'P4', 'P5', 'A', 'aprobarsol.inc.php'),
('F1', 'P5', 'FIN', 'U', 'resumensol.inc.php'),
('F2', 'P1', 'P2', 'U', 'preguntas.inc.php'),
('F2', 'P2', 'P3', 'U', 'montoretirar.inc.php'),
('F2', 'P3', 'P4', 'U', 'bancocuenta2.inc.php'),
('F2', 'P4', 'P5', 'U', 'verificar2.inc.php'),
('F2', 'P5', 'FIN', 'A', 'aprobarsol2.inc.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montos`
--

CREATE TABLE IF NOT EXISTS `montos` (
  `nro` int(200) NOT NULL AUTO_INCREMENT,
  `ci` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `monto` int(200) NOT NULL,
  PRIMARY KEY (`nro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE IF NOT EXISTS `seguimiento` (
  `usuario` varchar(200) NOT NULL,
  `ci` int(200) NOT NULL,
  `flujo` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `tramite` varchar(200) NOT NULL,
  `fechaini` date NOT NULL,
  `fechafin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nro` int(200) NOT NULL AUTO_INCREMENT,
  `ci` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `saldo` int(200) NOT NULL,
  `banco` varchar(200) NOT NULL,
  `nrocuenta` varchar(200) NOT NULL,
  PRIMARY KEY (`nro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nro`, `ci`, `nombre`, `saldo`, `banco`, `nrocuenta`) VALUES
(1, '777', 'Rosi', 0, 'BNB', '5550555');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
