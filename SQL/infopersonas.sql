-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 17-08-2012 a las 00:43:05
-- Versión del servidor: 5.0.21
-- Versión de PHP: 5.1.4
-- 
-- Base de datos: `infoautos`
-- 

-- --------------------------------------------------------

--

-- 
-- Estructura de tabla para la tabla `persona`
-- 

CREATE TABLE `persona` (
  `NroDni` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Apellido` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Nombre` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`NroDni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `persona` (`NroDni`, `Apellido`, `Nombre`) VALUES 
('28326986', 'Moya', 'Manuel'),
('25963874', 'Farias', 'Marta'),
('30875962', 'Lopez', 'Eduardo'),
('22985265', 'Ramirez', 'Claudia');