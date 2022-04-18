-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 14 Nis 2021, 05:38:29
-- Sunucu sürümü: 8.0.21
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `gunesinsaat`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fotograflar`
--

DROP TABLE IF EXISTS `fotograflar`;
CREATE TABLE IF NOT EXISTS `fotograflar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fotoAciklama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IMG` varchar(101) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `fotograflar`
--

INSERT INTO `fotograflar` (`id`, `fotoAciklama`, `IMG`) VALUES
(1, '1', 'fAkhyOzNves2lq961iLrRwaucCHo03DYF5WXIbMVBJSQmn.jpg'),
(2, '2', 'ObCIPKByea4rkzdZn2J9o7XNW5m0sHgMpGw3fTLhlivAcn.jpg'),
(3, '3', 'VplaREnTFODhm4QGXW9wdkMu1qIA7fUz0ejNviCS6YHb5n.jpg'),
(4, '4', 'bRND4uLHjSKaBIQPOfZnm3TekhoWi52dFrJgXYwvcAGt0n.jpg'),
(5, '5', 'oscVEOzZYDUmC4taJFpBflSQPMiN2dG5vbqwHx0Xg9ejrn.jpg'),
(6, '6', 'CRIMTFcZ7P4rOXHyvs0U16pxYnb3Af5ejgt2qDEomaKdNn.jpg'),
(7, '7', 'UXugwpRvFqiGDMZKCOI6o7T2BHPYJ1j4LQmncrfba5Al0n.jpg'),
(8, '8', 'uyqaTWwJL6Xc7B2xsFv51UnKGtPbAN9OZQhlIgdoH0iCRn.jpg'),
(9, '9', 'XCkiGzbB2agv6o5IPYFLJTOQuqWclEdMwmtVh4s19K0N3n.jpg'),
(10, '10', 'BWTbgkGtXE5O6s9pd1fAR2lvoQchuSPynHxwr4eVjIqL7n.jpg'),
(12, '12', 'vSoJ5N3BCbAnOYGMUFDs49IRk1zeft2WXyuEr6VhKpPiwr.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projeler`
--

DROP TABLE IF EXISTS `projeler`;
CREATE TABLE IF NOT EXISTS `projeler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(150) NOT NULL,
  `baslamaTarih` varchar(25) NOT NULL,
  `bitisTarih` varchar(25) NOT NULL,
  `il` varchar(50) NOT NULL,
  `ilçe` varchar(50) NOT NULL,
  `durum` int NOT NULL,
  `aciklama` varchar(1000) NOT NULL,
  `projeimg1` varchar(50) NOT NULL,
  `projeFotolari` varchar(600) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `projeler`
--

INSERT INTO `projeler` (`id`, `baslik`, `baslamaTarih`, `bitisTarih`, `il`, `ilçe`, `durum`, `aciklama`, `projeimg1`, `projeFotolari`) VALUES
(19, 'Deneme Başlık', '2021-02-19', '2021-02-16', 'Tokat', 'Erbaa', 1, 'Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı. Deneme açıklama yazısı.', 'MjkprLO3bXVvRd2CsPGzD5QeYJ4aNcxTFKgI90ZfUoi7Bm.jpg', 'nTIRtCZKmMQ3avko1As6ghHG7WEVi4dr902JwDX5LlbNpr.jpg,'),
(20, 'Köksal Güneş', '2000-02-05', '2021-02-28', 'Tokat', 'Erbaa', 0, 'Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt. Deneme amaçlı kayıt.', 'ePUJucvahAKq74BowdHl2CGfWRkjOYxTFNig0D9nrX6V3n.jpg', ''),
(21, 'Deneme Başlık', '2021-03-04', '2021-02-09', 'Bolu', 'Asdsad', 1, 'Asdasdasd as as dad asd da a dasdasd asasdasdasd as as dad asd da a dasdasd asasdasdasd as as dad asd da a dasdasd asasdasdasd as as dad asd da a dasdasd as', 'noCwcLXH6EqN1aRMv7IfiUZ0bSGlp5OdjThVsyFtQxBzYn.jpg', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `password`) VALUES
(1, 'koksgns', 'koksgns@gmail.com', 'Köksal Güneş', '456'),
(3, 'kg', 'koksgns@hotmail.com', 'köksal2', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
