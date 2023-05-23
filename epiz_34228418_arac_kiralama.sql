-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 May 2023, 22:38:11
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `Sifre` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`Kullanici_Adi`, `Sifre`) VALUES
('metehanzx', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac`
--

CREATE TABLE `arac` (
  `Arac_ID` int(11) NOT NULL,
  `Arac_IMG` varchar(100) NOT NULL,
  `Arac_MarkaModel` varchar(30) NOT NULL,
  `Arac_Kategori` varchar(10) NOT NULL,
  `Vites_Turu` varchar(10) NOT NULL,
  `Yakit_Turu` varchar(10) NOT NULL,
  `Depozito_Ucret` int(11) NOT NULL,
  `Kiralama_Ucret` int(11) NOT NULL,
  `Kiralama_Yas` tinyint(4) NOT NULL DEFAULT 21,
  `Ehliyet_Yas` tinyint(4) NOT NULL DEFAULT 2,
  `Kiralama_Durum` tinyint(1) NOT NULL DEFAULT 1,
  `Kapasite` tinyint(4) DEFAULT 5
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `arac`
--

INSERT INTO `arac` (`Arac_ID`, `Arac_IMG`, `Arac_MarkaModel`, `Arac_Kategori`, `Vites_Turu`, `Yakit_Turu`, `Depozito_Ucret`, `Kiralama_Ucret`, `Kiralama_Yas`, `Ehliyet_Yas`, `Kiralama_Durum`, `Kapasite`) VALUES
(1, 'imgs/a-fiat-egea-hybrid.png', 'Fiat Egea', 'ekonomik', 'Manuel', 'Dizel', 2000, 750, 21, 2, 1, 5),
(2, 'imgs/c-renault-clio.png', 'Renault Clio', 'ekonomik', 'Otomatik', 'Dizel', 2000, 850, 21, 2, 1, 5),
(3, 'imgs/n-citroen-c-elysee.png', 'Citroen C-Elysee', 'ekonomik', 'Manuel', 'Benzin', 2000, 700, 21, 2, 1, 5),
(4, 'imgs/p-ford-ecosport.png', 'Ford Ecosport', 'konfor', 'Otomatik', 'Benzin', 2500, 1100, 23, 2, 1, 5),
(5, 'imgs/f-citroen-c3.png', 'Citroen C3', 'ekonomik', 'Otomatik', 'Benzin', 2000, 800, 21, 2, 1, 5),
(6, 'imgs/f-dacia-sandero.png', 'Dacia Sandero', 'ekonomik', 'Manuel', 'Benzin', 2000, 750, 21, 2, 1, 5),
(7, 'imgs/f-hyundai-i20.png', 'Hyundai i20', 'ekonomik', 'Otomatik', 'Dizel', 2000, 850, 21, 2, 1, 5),
(8, 'imgs/f-opel-corsa.png', 'Opel Corsa', 'ekonomik', 'Otomatik', 'Dizel', 2000, 850, 21, 2, 1, 5),
(9, 'imgs/p-citroen-c3-aircross.png', 'Citroen C3 Aircross', 'konfor', 'Otomatik', 'Benzin', 2500, 1100, 23, 2, 1, 5),
(10, 'imgs/o-ford-focus.png', 'Ford Focus', 'konfor', 'Otomatik', 'benzin', 2500, 1150, 23, 2, 1, 5),
(11, 'imgs/p-ford-puma.png', 'Ford Puma', 'konfor', 'Otomatik', 'Benzin', 2500, 1125, 23, 2, 1, 5),
(12, 'imgs/o-honda-civic.png', 'Honda Civic', 'konfor', 'Otomatik', 'Dizel', 2500, 1200, 23, 2, 1, 5),
(13, 'imgs/o-toyota-corolla.png', 'Toyota Corolla', 'konfor', 'Otomatik', 'Benzin', 2500, 1100, 23, 2, 1, 5),
(14, 'imgs/p-peugeot-2008.png', 'Peugeot 2008', 'konfor', 'Otomatik', 'Benzin', 2500, 1100, 23, 2, 1, 5),
(15, 'imgs/p-vw-taigo.png', 'Volkswagen Taigo', 'konfor', 'Otomatik', 'Dizel', 2500, 1300, 23, 2, 0, 5),
(16, 'imgs/c-bmw-ix3.png', 'BMW IX3', 'elektrikli', 'Otomatik', 'Elektrik', 5000, 4500, 25, 3, 1, 5),
(17, 'imgs/c-renault-zoe.png', 'Renault Zoe', 'elektrikli', 'Otomatik', 'Elektrik', 5000, 3800, 24, 3, 1, 5),
(18, 'imgs/k-hyundai-kona.png', 'Hyunadi Kona', 'elektrikli', 'Otomatik', 'Elektrik', 5000, 4000, 25, 3, 1, 5),
(25, 'imgs/i-citroen-jumpy.png', 'Citroen Jumpy', 'van', 'Otomatik', 'Benzin', 4500, 4000, 25, 2, 1, 9),
(24, 'imgs/i-mercedes-vito.png', 'Mercedes Vito', 'van', 'Otomatik', 'Dizel', 6000, 5000, 25, 2, 1, 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kiralama`
--

CREATE TABLE `kiralama` (
  `Kullanici_ID` int(11) NOT NULL,
  `Arac_ID` int(11) NOT NULL,
  `Teslim_Tarih` datetime NOT NULL,
  `Iade_Tarih` datetime NOT NULL,
  `Teslim_Yeri` varchar(50) NOT NULL,
  `Iade_Yeri` varchar(50) NOT NULL,
  `Ucret` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kiralama`
--

INSERT INTO `kiralama` (`Kullanici_ID`, `Arac_ID`, `Teslim_Tarih`, `Iade_Tarih`, `Teslim_Yeri`, `Iade_Yeri`, `Ucret`) VALUES
(1, 16, '2023-05-23 20:47:00', '2023-05-24 20:47:00', 'İstanbul/Beşiktaş', 'Bursa/Nilüfer', 4500);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `Kullanici_ID` int(11) NOT NULL,
  `TC_No` varchar(11) NOT NULL,
  `Isim` varchar(25) NOT NULL,
  `Soyisim` varchar(25) NOT NULL,
  `DogumTarihi` date NOT NULL,
  `Eposta` varchar(50) NOT NULL,
  `Tel_No` varchar(10) NOT NULL,
  `Sifre` varchar(64) NOT NULL,
  `Ehliyet_Yas` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`Kullanici_ID`, `TC_No`, `Isim`, `Soyisim`, `DogumTarihi`, `Eposta`, `Tel_No`, `Sifre`, `Ehliyet_Yas`) VALUES
(2, '30203333434', 'metehan', 'sözenli', '2023-05-03', 'xmetu10@hotmail.com', '5324937666', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2);

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
  ADD KEY `Arac_ID` (`Arac_ID`),
  ADD KEY `Kullanici_ID` (`Kullanici_ID`) USING BTREE;

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`Kullanici_ID`),
  ADD UNIQUE KEY `Eposta` (`Eposta`),
  ADD UNIQUE KEY `TC_No` (`TC_No`) USING BTREE;

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arac`
--
ALTER TABLE `arac`
  MODIFY `Arac_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `Kullanici_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
