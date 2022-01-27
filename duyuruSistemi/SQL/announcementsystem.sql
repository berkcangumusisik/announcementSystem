-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Oca 2022, 15:02:44
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `announcementsystem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `adminMail` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`adminID`, `adminMail`, `adminPassword`) VALUES
(1, 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcement`
--

CREATE TABLE `announcement` (
  `ID` int(11) NOT NULL,
  `announcementTitle` varchar(100) NOT NULL,
  `announcementDetails` text NOT NULL,
  `announcementImage` text DEFAULT NULL,
  `announcementDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `announcement`
--

INSERT INTO `announcement` (`ID`, `announcementTitle`, `announcementDetails`, `announcementImage`, `announcementDate`) VALUES
(1, 'Web Tabanlı Programlama', 'Deneme1', '1641212829_6707.png', '2022-01-03'),
(2, 'a', 'a', '1641198089_7426.png', '2022-01-03'),
(36, 'a', 'a12113242232', '1641198104_2012.png', '2022-01-03'),
(37, 'Deneme', 'deneme yazısı', '1641198110_5916.png', '2022-01-03'),
(39, 'Deneme', 'deneme yazısı', '1641133024_7464.png', '2022-01-02'),
(40, 'a', 'a', '1641132833_9177.png', '2022-01-02'),
(41, 'announcementImage', 'Bu bir deneme yazısı olarak ayarlandı.', '1641204315_8457.png', '2022-01-03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `messageId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `createDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `contacts`
--

INSERT INTO `contacts` (`messageId`, `name`, `surname`, `phoneNumber`, `subject`, `message`, `createDate`) VALUES
(2, 'Berkcan', 'Gümüşışık', '12345678901', 'Deneme', 'Bu bir deneme mesajıdır.', '2022-01-03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userId`, `userName`, `fullName`, `email`, `password`, `createDate`) VALUES
(0, 'berkcan1999', 'Berkcan Gümüşışık', 'gumusisikberkcan@gmail.com', 'berkcan123', '2022-01-02'),
(3, 'şevval', 'Şevval Baydemir', 'sevval@gmail.com', '12345678', '2022-01-02'),
(4, 'nurana', 'Nurana Jumageldiyeva', 'nurana@gmail.com', '123456', '2022-01-03');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Tablo için indeksler `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`messageId`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
