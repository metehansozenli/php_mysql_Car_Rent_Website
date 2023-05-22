-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: sql300.epizy.com
-- Üretim Zamanı: 19 May 2023, 20:20:40
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `epiz_34228418_arac_kiralama`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `Kullanici_Adi` varchar(20) NOT NULL,
  `Sifre` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`Kullanici_Adi`, `Sifre`) VALUES
('metehanzx', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac`
--

CREATE TABLE `arac` (
  `Arac_ID` int(11) NOT NULL,
  `Arac_IMG` varchar(100) NOT NULL,
  `Arac_MarkaModel` varchar(30) NOT NULL,
  `Arac_Kategori` varchar(10) NOT NULL,
  `Arac_KM` int(11) NOT NULL,
  `Vites_Turu` varchar(10) NOT NULL,
  `Yakit_Turu` varchar(10) NOT NULL,
  `Depozito_Ucret` int(11) NOT NULL,
  `Kiralama_Ucret` int(11) NOT NULL,
  `Kiralama_Yas` tinyint(4) NOT NULL DEFAULT 21,
  `Ehliyet_Yas` tinyint(4) NOT NULL DEFAULT 2,
  `Kiralama_Durum` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kiralama`
--

CREATE TABLE `kiralama` (
  `Kullanici_ID` varchar(11) NOT NULL,
  `Arac_ID` int(11) NOT NULL,
  `Baslangic_Tarih` datetime NOT NULL,
  `Bitis_Tarih` datetime NOT NULL,
  `Kiralama_Suresi` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `TC_No` varchar(11) NOT NULL,
  `Isim` varchar(25) NOT NULL,
  `Soyisim` varchar(25) NOT NULL,
  `DogumTarihi` date NOT NULL,
  `Eposta` varchar(25) NOT NULL,
  `Tel_No` varchar(10) NOT NULL,
  `Sifre` varchar(25) NOT NULL,
  `Ehliyet_Yas` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Kullanici_Adi`);

--
-- Tablo için indeksler `arac`
--
ALTER TABLE `arac`
  ADD PRIMARY KEY (`Arac_ID`);

--
-- Tablo için indeksler `kiralama`
--
ALTER TABLE `kiralama`
  ADD KEY `Kullanici_ID` (`Kullanici_ID`),
  ADD KEY `Arac_ID` (`Arac_ID`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`TC_No`),
  ADD UNIQUE KEY `Eposta` (`Eposta`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arac`
--
ALTER TABLE `arac`
  MODIFY `Arac_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kiralama`
--
ALTER TABLE `kiralama`
  MODIFY `Arac_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
