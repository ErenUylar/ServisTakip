-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Ağu 2022, 13:36:35
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `servis`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alan`
--

CREATE TABLE `alan` (
  `id` int(11) NOT NULL,
  `alan_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `alan`
--

INSERT INTO `alan` (`id`, `alan_ad`) VALUES
(1, 'Bilgisayar'),
(2, 'Telefon'),
(3, 'Yazıcı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alan_kisi`
--

CREATE TABLE `alan_kisi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arizakayit`
--

CREATE TABLE `arizakayit` (
  `id` int(11) NOT NULL,
  `ip_adresi` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `birim` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kaynak` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sebep` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  `saat` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `durum` varchar(75) COLLATE utf8_turkish_ci NOT NULL,
  `takip_kod` varchar(10) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birim`
--

CREATE TABLE `birim` (
  `id` int(11) NOT NULL,
  `birim_ad` varchar(60) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `birim`
--

INSERT INTO `birim` (`id`, `birim_ad`) VALUES
(1, 'Araç Sevk Birimi'),
(2, 'Basın Yayın Birimi'),
(3, 'Başkanlık / Başkan Yardımcıları'),
(4, 'Bilgi İşlem Birimi'),
(5, 'Çevre Denetim Birimi'),
(6, 'Destek Hizmetleri Müd.'),
(7, 'Emlak ÇTV Birimi'),
(8, 'Emlak ve İstimlak Müd.'),
(9, 'Etüt Eğitim Birimi'),
(10, 'Evlendirme Birimi'),
(11, 'Fen İşleri Müd.'),
(12, 'Gastronomi ve Proje Birimi'),
(13, 'Gençlik ve Spor Hizmetleri Müd.'),
(14, 'Halkla İlişkiler Birimi'),
(15, 'Harita Birimi'),
(16, 'Hesap İşleri Birimi'),
(17, 'Hukuk İşleri Müd.'),
(18, 'İcra Takip Birimi'),
(19, 'İmar Müd.'),
(20, 'İnsan Kaynakları ve Eğitim Müd.'),
(21, 'İşletme Müd.'),
(22, 'İtfaiye Müd.'),
(23, 'Kaçak İnşaat Birimi'),
(24, 'Kadın Kültür Evi'),
(25, 'Kanalizasyon Birimi'),
(26, 'Kent Konseyi Birimi'),
(28, 'Kültür ve Sosyal İşler Müd.'),
(29, 'Mahalle Muhtarları'),
(30, 'Mali Hizmetler Müd.'),
(31, 'Mezarlık Hizmetleri Birimi'),
(32, 'Muhtarlık ve Sosyal Hizmetler Müd.'),
(33, 'Numarataj Birimi'),
(34, 'Otobüs İşletme'),
(35, 'Otoparklar Birimi'),
(36, 'Otoparklar Birimi'),
(37, 'Özel Kalem Müd.'),
(38, 'Park ve Bahçeler Müd.'),
(39, 'Planlama Birimi'),
(40, 'Reklam Afiş Birimi'),
(41, 'Ruhsat İskan Birimi'),
(42, 'Satın Alma Birimi'),
(43, 'Sosyal Tesisler Birimi'),
(44, 'Strateji Geliştirme Birimi'),
(45, 'Su Tahakkuk Birimi'),
(46, 'Su Teknik Birimi'),
(47, 'Su ve Kanalizasyon Müd.'),
(48, 'Tahakkuk Tahsilat Birimi'),
(49, 'Temizlik İşleri Müd.'),
(50, 'Toptancı Hal Birimi'),
(51, 'Trafik Kontrol Merkezi'),
(52, 'Ulaşım Hizmetleri ve Makine İkmal Müd.'),
(53, 'Veteriner İşleri Müd.'),
(54, 'Yapım Birimi'),
(55, 'Yardım Hizmetleri Birimi'),
(56, 'Yazı İşleri Müd.'),
(57, 'Yol - Asfalt Birimi'),
(58, 'Zabıta Müd.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `yetki_id` int(11) NOT NULL,
  `adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(35) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `durum` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `yetki_id`, `adi`, `soyadi`, `eposta`, `sifre`, `durum`) VALUES
(2, 1, 'admin', 'sifre-123', 'admin@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Aktif'),
(3, 2, 'personel', 'sifre-123', 'personel@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Aktif');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetki`
--

CREATE TABLE `yetki` (
  `id` int(11) NOT NULL,
  `yetki` varchar(25) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yetki`
--

INSERT INTO `yetki` (`id`, `yetki`) VALUES
(1, 'Admin'),
(2, 'Personel');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `alan`
--
ALTER TABLE `alan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `alan_kisi`
--
ALTER TABLE `alan_kisi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `arizakayit`
--
ALTER TABLE `arizakayit`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `birim`
--
ALTER TABLE `birim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yetki`
--
ALTER TABLE `yetki`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `alan`
--
ALTER TABLE `alan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `alan_kisi`
--
ALTER TABLE `alan_kisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `arizakayit`
--
ALTER TABLE `arizakayit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `birim`
--
ALTER TABLE `birim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `yetki`
--
ALTER TABLE `yetki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
