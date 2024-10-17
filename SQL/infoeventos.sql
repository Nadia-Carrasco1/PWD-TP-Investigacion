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
-- Estructura de tabla para la tabla `evento`
-- 

CREATE TABLE `evento` (
  `summary` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  PRIMARY KEY  (`summary`, `start`, `end`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;