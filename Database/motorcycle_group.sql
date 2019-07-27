-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Tem 2019, 19:12:44
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `motorcycle_group`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basvurular`
--

CREATE TABLE `basvurular` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `dogum_tarihi` varchar(4) COLLATE utf8_turkish_ci NOT NULL,
  `sehir` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `meslek` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `plaka` varchar(8) COLLATE utf8_turkish_ci NOT NULL,
  `motor_marka_model` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `motor_km` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uyelik_grup_adi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `onay` tinyint(1) DEFAULT '0',
  `basvuru_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `basvurular`
--

INSERT INTO `basvurular` (`id`, `ad_soyad`, `telefon`, `mail`, `dogum_tarihi`, `sehir`, `meslek`, `plaka`, `motor_marka_model`, `motor_km`, `uyelik_grup_adi`, `onay`, `basvuru_tarih`) VALUES
(65, 'eee', '905466405555', 'emreuyguc@hotmail.com', '2004', 'asdasd8u', 'asdasd', '33-ggggg', 'asdasd', 'asdasd', 'HAYIR', 0, '2019-07-20 11:14:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basvurular_onay`
--

CREATE TABLE `basvurular_onay` (
  `id` int(11) NOT NULL,
  `basvuru_id` int(11) NOT NULL,
  `grup_id` int(11) NOT NULL,
  `onay_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `basvurular_onay`
--

INSERT INTO `basvurular_onay` (`id`, `basvuru_id`, `grup_id`, `onay_tarih`) VALUES
(4, 65, 17, '2019-07-20 11:15:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basvurular_red`
--

CREATE TABLE `basvurular_red` (
  `id` int(11) NOT NULL,
  `basvuru_id` int(11) NOT NULL,
  `red_sebep` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `red_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basvuru_hizli_link`
--

CREATE TABLE `basvuru_hizli_link` (
  `id` int(11) NOT NULL,
  `basvuru_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` char(1) COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kisa_linkler`
--

CREATE TABLE `kisa_linkler` (
  `link_id` int(11) NOT NULL,
  `kisa_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yonlendirme_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `kullanim_tarih` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `loglar`
--

CREATE TABLE `loglar` (
  `log_id` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `islem` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarih_saat` datetime NOT NULL,
  `detay` text COLLATE utf8_turkish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mailler`
--

CREATE TABLE `mailler` (
  `id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `islem` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mailler`
--

INSERT INTO `mailler` (`id`, `uye_id`, `eposta`, `durum`, `tarih`, `icerik`, `islem`) VALUES
(9, 65, 'emreuyguc@hotmail.com', 1, '2019-07-20 11:15:48', 'PCFET0NUWVBFIGh0bWwgUFVCTElDICItLy9XM0MvL0RURCBYSFRNTCAxLjAgVHJhbnNpdGlvbmFsLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL1RSL3hodG1sMS9EVEQveGh0bWwxLXRyYW5zaXRpb25hbC5kdGQiPg0KPGh0bWwgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGh0bWwiPg0KPGhlYWQ+DQogIDxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PXV0Zi04IiAvPg0KICA8bWV0YSBuYW1lPSJ2aWV3cG9ydCIgY29udGVudD0id2lkdGg9ZGV2aWNlLXdpZHRoLCBpbml0aWFsLXNjYWxlPTEiIC8+DQogIDx0aXRsZT5CYcWfdnVydSBLYXnEsXQ8L3RpdGxlPg0KICA8c3R5bGUgdHlwZT0idGV4dC9jc3MiIG1lZGlhPSJzY3JlZW4iPg0KDQogICAgLyogRm9yY2UgSG90bWFpbCB0byBkaXNwbGF5IGVtYWlscyBhdCBmdWxsIHdpZHRoICovDQogICAgLkV4dGVybmFsQ2xhc3Mgew0KICAgICAgZGlzcGxheTogYmxvY2sgIWltcG9ydGFudDsNCiAgICAgIHdpZHRoOiAxMDAlOw0KICAgIH0NCg0KICAgIC8qIEZvcmNlIEhvdG1haWwgdG8gZGlzcGxheSBub3JtYWwgbGluZSBzcGFjaW5nICovDQogICAgLkV4dGVybmFsQ2xhc3MsDQogICAgLkV4dGVybmFsQ2xhc3MgcCwNCiAgICAuRXh0ZXJuYWxDbGFzcyBzcGFuLA0KICAgIC5FeHRlcm5hbENsYXNzIGZvbnQsDQogICAgLkV4dGVybmFsQ2xhc3MgdGQsDQogICAgLkV4dGVybmFsQ2xhc3MgZGl2IHsNCiAgICAgIGxpbmUtaGVpZ2h0OiAxMDAlOw0KICAgIH0NCg0KICAgIGJvZHksDQogICAgcCwNCiAgICBoMSwNCiAgICBoMiwNCiAgICBoMywNCiAgICBoNCwNCiAgICBoNSwNCiAgICBoNiB7DQogICAgICBtYXJnaW46IDA7DQogICAgICBwYWRkaW5nOiAwOw0KICAgIH0NCg0KICAgIGJvZHksDQogICAgcCwNCiAgICB0ZCB7DQogICAgICBmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsNCiAgICAgIGZvbnQtc2l6ZTogMTVweDsNCiAgICAgIGNvbG9yOiAjMzMzMzMzOw0KICAgICAgbGluZS1oZWlnaHQ6IDEuNWVtOw0KICAgIH0NCg0KICAgIGgxIHsNCiAgICAgIGZvbnQtc2l6ZTogMjRweDsNCiAgICAgIGZvbnQtd2VpZ2h0OiBub3JtYWw7DQogICAgICBsaW5lLWhlaWdodDogMjRweDsNCiAgICB9DQoNCiAgICBib2R5LA0KICAgIHAgew0KICAgICAgbWFyZ2luLWJvdHRvbTogMDsNCiAgICAgIC13ZWJraXQtdGV4dC1zaXplLWFkanVzdDogbm9uZTsNCiAgICAgIC1tcy10ZXh0LXNpemUtYWRqdXN0OiBub25lOw0KICAgIH0NCg0KICAgIGltZyB7DQogICAgICBvdXRsaW5lOiBub25lOw0KICAgICAgdGV4dC1kZWNvcmF0aW9uOiBub25lOw0KICAgICAgLW1zLWludGVycG9sYXRpb24tbW9kZTogYmljdWJpYzsNCiAgICB9DQoNCiAgICBhIGltZyB7DQogICAgICBib3JkZXI6IG5vbmU7DQogICAgfQ0KDQogICAgLmJhY2tncm91bmQgew0KICAgICAgYmFja2dyb3VuZC1jb2xvcjogIzMzMzMzMzsNCiAgICB9DQoNCiAgICB0YWJsZS5iYWNrZ3JvdW5kIHsNCiAgICAgIG1hcmdpbjogMDsNCiAgICAgIHBhZGRpbmc6IDA7DQogICAgICB3aWR0aDogMTAwJSAhaW1wb3J0YW50Ow0KICAgIH0NCg0KICAgIC5ibG9jay1pbWcgew0KICAgICAgZGlzcGxheTogYmxvY2s7DQogICAgICBsaW5lLWhlaWdodDogMDsNCiAgICB9DQoNCiAgICBhIHsNCiAgICAgIGNvbG9yOiB3aGl0ZTsNCiAgICAgIHRleHQtZGVjb3JhdGlvbjogbm9uZTsNCiAgICB9DQoNCiAgICBhLA0KICAgIGE6bGluayB7DQogICAgICBjb2xvcjogIzJBNURCMDsNCiAgICAgIHRleHQtZGVjb3JhdGlvbjogdW5kZXJsaW5lOw0KICAgIH0NCg0KICAgIHRhYmxlIHRkIHsNCiAgICAgIGJvcmRlci1jb2xsYXBzZTogY29sbGFwc2U7DQogICAgfQ0KDQogICAgdGQgew0KICAgICAgdmVydGljYWwtYWxpZ246IHRvcDsNCiAgICAgIHRleHQtYWxpZ246IGxlZnQ7DQogICAgfQ0KDQogICAgLndyYXAgew0KICAgICAgd2lkdGg6IDYwMHB4Ow0KICAgIH0NCg0KICAgIC53cmFwLWNlbGwgew0KICAgICAgcGFkZGluZy10b3A6IDMwcHg7DQogICAgICBwYWRkaW5nLWJvdHRvbTogMzBweDsNCiAgICB9DQoNCiAgICAuaGVhZGVyLWNlbGwsDQogICAgLmJvZHktY2VsbCwNCiAgICAuZm9vdGVyLWNlbGwgew0KICAgICAgcGFkZGluZy1sZWZ0OiAyMHB4Ow0KICAgICAgcGFkZGluZy1yaWdodDogMjBweDsNCiAgICB9DQoNCiAgICAuaGVhZGVyLWNlbGwgew0KICAgICAgYmFja2dyb3VuZC1jb2xvcjogI2VlZWVlZTsNCiAgICAgIGZvbnQtc2l6ZTogMjRweDsNCiAgICAgIGNvbG9yOiAjZmZmZmZmOw0KICAgIH0NCg0KICAgIC5ib2R5LWNlbGwgew0KICAgICAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsNCiAgICAgIHBhZGRpbmctdG9wOiAzMHB4Ow0KICAgICAgcGFkZGluZy1ib3R0b206IDM0cHg7DQogICAgfQ0KDQogICAgLmZvb3Rlci1jZWxsIHsNCiAgICAgIGJhY2tncm91bmQtY29sb3I6ICNlZWVlZWU7DQogICAgICB0ZXh0LWFsaWduOiBjZW50ZXI7DQogICAgICBmb250LXNpemU6IDEzcHg7DQogICAgICBwYWRkaW5nLXRvcDogMzBweDsNCiAgICAgIHBhZGRpbmctYm90dG9tOiAzMHB4Ow0KICAgIH0NCg0KICAgIC5jYXJkIHsNCiAgICAgIHdpZHRoOiA0MDBweDsNCiAgICAgIG1hcmdpbjogMCBhdXRvOw0KICAgIH0NCg0KICAgIC5kYXRhLWhlYWRpbmcgew0KICAgICAgdGV4dC1hbGlnbjogcmlnaHQ7DQogICAgICBwYWRkaW5nOiAxMHB4Ow0KICAgICAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsNCiAgICAgIGZvbnQtd2VpZ2h0OiBib2xkOw0KICAgIH0NCg0KICAgIC5kYXRhLXZhbHVlIHsNCiAgICAgIHRleHQtYWxpZ246IGxlZnQ7DQogICAgICBwYWRkaW5nOiAxMHB4Ow0KICAgICAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsNCiAgICB9DQoNCiAgICAuZm9yY2UtZnVsbC13aWR0aCB7DQogICAgICB3aWR0aDogMTAwJSAhaW1wb3J0YW50Ow0KICAgIH0NCg0KICA8L3N0eWxlPg0KICA8c3R5bGUgdHlwZT0idGV4dC9jc3MiIG1lZGlhPSJvbmx5IHNjcmVlbiBhbmQgKG1heC13aWR0aDogNjAwcHgpIj4NCiAgICBAbWVkaWEgb25seSBzY3JlZW4gYW5kIChtYXgtd2lkdGg6IDYwMHB4KSB7DQogICAgICBib2R5W2NsYXNzKj0iYmFja2dyb3VuZCJdLA0KICAgICAgdGFibGVbY2xhc3MqPSJiYWNrZ3JvdW5kIl0sDQogICAgICB0ZFtjbGFzcyo9ImJhY2tncm91bmQiXSB7DQogICAgICAgIGJhY2tncm91bmQ6ICNlZWVlZWUgIWltcG9ydGFudDsNCiAgICAgIH0NCg0KICAgICAgdGFibGVbY2xhc3M9ImNhcmQiXSB7DQogICAgICAgIHdpZHRoOiBhdXRvICFpbXBvcnRhbnQ7DQogICAgICB9DQoNCiAgICAgIHRkW2NsYXNzPSJkYXRhLWhlYWRpbmciXSwNCiAgICAgIHRkW2NsYXNzPSJkYXRhLXZhbHVlIl0gew0KICAgICAgICBkaXNwbGF5OiBibG9jayAhaW1wb3J0YW50Ow0KICAgICAgfQ0KDQogICAgICB0ZFtjbGFzcz0iZGF0YS1oZWFkaW5nIl0gew0KICAgICAgICB0ZXh0LWFsaWduOiBsZWZ0ICFpbXBvcnRhbnQ7DQogICAgICAgIHBhZGRpbmc6IDEwcHggMTBweCAwOw0KICAgICAgfQ0KDQogICAgICB0YWJsZVtjbGFzcz0id3JhcCJdIHsNCiAgICAgICAgd2lkdGg6IDEwMCUgIWltcG9ydGFudDsNCiAgICAgIH0NCg0KICAgICAgdGRbY2xhc3M9IndyYXAtY2VsbCJdIHsNCiAgICAgICAgcGFkZGluZy10b3A6IDAgIWltcG9ydGFudDsNCiAgICAgICAgcGFkZGluZy1ib3R0b206IDAgIWltcG9ydGFudDsNCiAgICAgIH0NCiAgICB9DQogIDwvc3R5bGU+DQogIDxzY3JpcHQ+DQoJICBmdW5jdGlvbiBrb3B5YWxhKCkgew0KCSAgLyogR2V0IHRoZSB0ZXh0IGZpZWxkICovDQoJICB2YXIgY29weVRleHQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgic2lmcmUiKTsNCg0KCSAgLyogU2VsZWN0IHRoZSB0ZXh0IGZpZWxkICovDQoJICBjb3B5VGV4dC5zZWxlY3QoKTsNCg0KCSAgLyogQ29weSB0aGUgdGV4dCBpbnNpZGUgdGhlIHRleHQgZmllbGQgKi8NCgkgIGRvY3VtZW50LmV4ZWNDb21tYW5kKCJjb3B5Iik7DQoNCgkgIC8qIEFsZXJ0IHRoZSBjb3BpZWQgdGV4dCAqLw0KCSAgYWxlcnQoIsWeaWZyZW5peiBLb3B5YWxhbmTEsTogIiArIGNvcHlUZXh0LnZhbHVlKTsNCgl9DQogIDwvc2NyaXB0Pg0KPC9oZWFkPg0KDQo8Ym9keSBsZWZ0bWFyZ2luPSIwIiBtYXJnaW53aWR0aD0iMCIgdG9wbWFyZ2luPSIwIiBtYXJnaW5oZWlnaHQ9IjAiIG9mZnNldD0iMCIgYmdjb2xvcj0iIiBjbGFzcz0iYmFja2dyb3VuZCI+DQo8aW5wdXQgaWQ9InNpZnJlIiBzdHlsZT0iZGlzcGxheTpub25lIiB2YWx1ZT0iNzllcTViIj4NCiAgPHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjAiIGNlbGxzcGFjaW5nPSIwIiBoZWlnaHQ9IjEwMCUiIHdpZHRoPSIxMDAlIiBjbGFzcz0iYmFja2dyb3VuZCI+DQogICAgPHRyPg0KICAgICAgPHRkIGFsaWduPSJjZW50ZXIiIHZhbGlnbj0idG9wIiB3aWR0aD0iMTAwJSIgY2xhc3M9ImJhY2tncm91bmQiPg0KICAgICAgICA8Y2VudGVyPg0KICAgICAgICAgIDx0YWJsZSBjZWxscGFkZGluZz0iMCIgY2VsbHNwYWNpbmc9IjAiIHdpZHRoPSI2MDAiIGNsYXNzPSJ3cmFwIj4NCiAgICAgICAgICAgIDx0cj4NCiAgICAgICAgICAgICAgPHRkIHZhbGlnbj0idG9wIiBjbGFzcz0id3JhcC1jZWxsIiBzdHlsZT0icGFkZGluZy10b3A6MzBweDsgcGFkZGluZy1ib3R0b206MzBweDsiPg0KICAgICAgICAgICAgICAgIDx0YWJsZSBjZWxscGFkZGluZz0iMCIgY2VsbHNwYWNpbmc9IjAiIGNsYXNzPSJmb3JjZS1mdWxsLXdpZHRoIj4NCiAgICAgICAgICAgICAgICAgIDx0cj4NCiAgICAgICAgICAgICAgICAgICA8dGQgaGVpZ2h0PSI2MCIgdmFsaWduPSJ0b3AiIGNsYXNzPSJoZWFkZXItY2VsbCI+DQogICAgICAgICAgICAgICAgICAgICANCiAgICAgICAgICAgICAgICAgICAgPC90ZD4NCiAgICAgICAgICAgICAgICAgIDwvdHI+DQogICAgICAgICAgICAgICAgICA8dHI+DQogICAgICAgICAgICAgICAgICAgIDx0ZCB2YWxpZ249InRvcCIgY2xhc3M9ImJvZHktY2VsbCI+DQoNCiAgICAgICAgICAgICAgICAgICAgICA8dGFibGUgY2VsbHBhZGRpbmc9IjAiIGNlbGxzcGFjaW5nPSIwIiB3aWR0aD0iMTAwJSIgYmdjb2xvcj0iI2ZmZmZmZiI+DQogICAgICAgICAgICAgICAgICAgICAgICA8dHI+DQogICAgICAgICAgICAgICAgICAgICAgICAgIDx0ZCB2YWxpZ249InRvcCIgc3R5bGU9InBhZGRpbmctYm90dG9tOjE1cHg7IGJhY2tncm91bmQtY29sb3I6I2ZmZmZmZjsiPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxoMT5YWFggV2ViIFBsYXRmb3JtdW5hIEhvxZ9nZWxkaW48L2gxPg0KICAgICAgICAgICAgICAgICAgICAgICAgICA8L3RkPg0KICAgICAgICAgICAgICAgICAgICAgICAgPC90cj4NCiAgICAgICAgICAgICAgICAgICAgICAgIDx0cj4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgPHRkIHZhbGlnbj0idG9wIiBzdHlsZT0icGFkZGluZy1ib3R0b206MjBweDsgYmFja2dyb3VuZC1jb2xvcjojZmZmZmZmOyI+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgPGI+TWVyaGFiYSBlZWUsIEFydMSxayBiaXppbWxlc2luICE8L2I+PGJyPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgQcWfYcSfxLFkYWtpIEJpbGdpbGVyaW5sZSBTaXN0ZW1pbWl6ZSBHaXJpxZ8gWWFwYWJpbGlyc2luLjxicj4NCgkJCQkJCSAgIMWeaWZyZXlpIGtvcHlhbGFtYWsgacOnaW4gw7x6ZXJpbmUgdMSxa2xhIDopDQogICAgICAgICAgICAgICAgICAgICAgICAgIDwvdGQ+DQogICAgICAgICAgICAgICAgICAgICAgICA8L3RyPg0KICAgICAgICAgICAgICAgICAgICAgICAgPHRyPg0KICAgICAgICAgICAgICAgICAgICAgICAgICA8dGQ+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRhYmxlIGNlbGxzcGFjaW5nPSIwIiBjZWxscGFkZGluZz0iMCIgd2lkdGg9IjEwMCUiIGJnY29sb3I9IiNmZmZmZmYiPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRyPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dGQgc3R5bGU9IndpZHRoOjIwMHB4O2JhY2tncm91bmQ6IzAwODAwMDsiPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXY+PCEtLVtpZiBtc29dPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHY6cmVjdCB4bWxuczp2PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOnZtbCIgeG1sbnM6dz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6d29yZCIgaHJlZj0iIyIgc3R5bGU9ImhlaWdodDo0MHB4O3YtdGV4dC1hbmNob3I6bWlkZGxlO3dpZHRoOjIwMHB4OyIgc3Ryb2tlPSJmIiBmaWxsY29sb3I9IiMwMDgwMDAiPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dzphbmNob3Jsb2NrLz4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGNlbnRlcj4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwhW2VuZGlmXS0tPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxhIA0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHN0eWxlPSJiYWNrZ3JvdW5kLWNvbG9yOiMwMDgwMDA7Y29sb3I6I2ZmZmZmZjtkaXNwbGF5OmlubGluZS1ibG9jaztmb250LWZhbWlseTpzYW5zLXNlcmlmO2ZvbnQtc2l6ZToxOHB4O2xpbmUtaGVpZ2h0OjQwcHg7dGV4dC1hbGlnbjpjZW50ZXI7dGV4dC1kZWNvcmF0aW9uOm5vbmU7d2lkdGg6MjAwcHg7LXdlYmtpdC10ZXh0LXNpemUtYWRqdXN0Om5vbmU7Ij5LdWxsYW7EsWPEsSBBZMSxIDogNDIzNDwvYT4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwhLS1baWYgbXNvXT4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9jZW50ZXI+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L3Y6cmVjdD4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8IVtlbmRpZl0tLT48L2Rpdj4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC90ZD4NCgkJCQkJCQkJIDx0ZCBzdHlsZT0id2lkdGg6MjAwcHg7YmFja2dyb3VuZDojMDA4MDAwOyI+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdj48IS0tW2lmIG1zb10+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8djpyZWN0IHhtbG5zOnY9InVybjpzY2hlbWFzLW1pY3Jvc29mdC1jb206dm1sIiB4bWxuczp3PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTp3b3JkIiBocmVmPSIjIiBzdHlsZT0iaGVpZ2h0OjQwcHg7di10ZXh0LWFuY2hvcjptaWRkbGU7d2lkdGg6MjAwcHg7IiBzdHJva2U9ImYiIGZpbGxjb2xvcj0iIzAwODAwMCI+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx3OmFuY2hvcmxvY2svPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8Y2VudGVyPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPCFbZW5kaWZdLS0+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGEgb25jbGljayA9ICJrb3B5YWxhKCkiDQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgc3R5bGU9ImJhY2tncm91bmQtY29sb3I6IzAwODAwMDtjb2xvcjojZmZmZmZmO2Rpc3BsYXk6aW5saW5lLWJsb2NrO2ZvbnQtZmFtaWx5OnNhbnMtc2VyaWY7Zm9udC1zaXplOjE4cHg7bGluZS1oZWlnaHQ6NDBweDt0ZXh0LWFsaWduOmNlbnRlcjt0ZXh0LWRlY29yYXRpb246bm9uZTt3aWR0aDoyMDBweDstd2Via2l0LXRleHQtc2l6ZS1hZGp1c3Q6bm9uZTsiPsWeaWZyZW5peiA6IDc5ZXE1YjwvYT4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwhLS1baWYgbXNvXT4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9jZW50ZXI+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L3Y6cmVjdD4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8IVtlbmRpZl0tLT48L2Rpdj4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC90ZD4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRkIHdpZHRoPSIzNjAiIHN0eWxlPSJiYWNrZ3JvdW5kLWNvbG9yOiNmZmZmZmY7IGZvbnQtc2l6ZTowOyBsaW5lLWhlaWdodDowOyI+Jm5ic3A7PC90ZD4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvdHI+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC90YWJsZT4NCgkJCQkJCQkJPGJyPg0KCQkJCQkJCUVrbGVuZGnEn2luaXogV2hhdHNhcHAgR3J1cCBMaW5raW5peiBBxZ9hxJ/EsWRhZGlyLg0KCQkJCQkJCTxicj4NCgkJCQkJCQkNCgkJCQkJCQk8YSBocmVmPSJodHRwOi8vd21yZS4xMjMiPiBXaGF0c2FwcCBHcnVidW5hIEthdMSxbCA8L2E+DQoJCQkJCQkJPGJyPg0KCQkJCQkJCTxicj4NCgkJCQkJCQk8YSBocmVmPSJodHRwOi8vaHR0cDovL3dtcmUuMTIzIj4gV2hhdHNhcHAgR3J1YnVuYSBLYXTEsWwgLSBBbHRlcm5hdGlmIExpbms8L2E+DQoJCQkJCQkJDQoJCQkJCQkJPGJyPg0KCQkJCQkJCTxicj4NCgkJCQkJCQlTaXN0ZW1pbWl6ZSBnaXJpxZ8geWFwbWFrIGnDp2luIGHFn2HEn8SxZGFraSBiYcSfbGFudMSxbGFyxLEga3VsbGFuxLFuLg0KCQkJCQkJCTxicj4NCgkJCQ0KCQkJCQkJCTxhIGhyZWY9Imh0dHA6Ly8xMjcuMC4wLjEvRnJlZWRvbUh1bnRlcnMvR2lyaXMiPiBHaXJpxZ8gPC9hPg0KCQkJCQkJCTxicj4NCgkJCQkJCQk8YSBocmVmPSIxMjcuMC4wLjEvRnJlZWRvbUh1bnRlcnMvR2lyaXMiPiBHaXJpxZ8gLSBBbHRlcm5hdGlmIExpbms8L2E+DQoJCQkJCQkJPGJyPg0KCQkJCQkJCTxicj4NCgkJCQkJCQkNCgkJCQkJCQkNCgkJCQkJCQ0KICAgICAgICAgICAgICAgICAgICAgICAgICA8L3RkPg0KICAgICAgICAgICAgICAgICAgICAgICAgPC90cj4NCiAgICAgICAgICAgICAgICAgICAgICAgIDx0cj4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgPHRkIHN0eWxlPSJwYWRkaW5nLXRvcDoyMHB4O2JhY2tncm91bmQtY29sb3I6I2ZmZmZmZjsiPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgIFRlxZ9la2vDvHJsZXI8YnI+DQogICAgICAgICAgICAgICAgICAgICAgICAgIDwvdGQ+DQogICAgICAgICAgICAgICAgICAgICAgICA8L3RyPg0KICAgICAgICAgICAgICAgICAgICAgIDwvdGFibGU+DQogICAgICAgICAgICAgICAgICAgIDwvdGQ+DQogICAgICAgICAgICAgICAgICA8L3RyPg0KICAgICAgICAgICAgICAgICAgPHRyPg0KICAgICAgICAgICAgICAgICAgICA8dGQgdmFsaWduPSJ0b3AiIGNsYXNzPSJmb290ZXItY2VsbCI+DQogICAgICAgICAgICAgICAgICAgICAgRmFsY29uIEZyZWVkb21IdW50ZXJzIFdlYlBsYXRmb3JtIC0gR2VsacWfdGlyaWNpIDogRS5VLlU8YnI+DQogICAgICAgICAgICAgICAgICAgIDwvdGQ+DQogICAgICAgICAgICAgICAgICA8L3RyPg0KICAgICAgICAgICAgICAgIDwvdGFibGU+DQogICAgICAgICAgICAgIDwvdGQ+DQogICAgICAgICAgICA8L3RyPg0KICAgICAgICAgIDwvdGFibGU+DQogICAgICAgIDwvY2VudGVyPg0KICAgICAgPC90ZD4NCiAgICA8L3RyPg0KICA8L3RhYmxlPg0KDQo8L2JvZHk+DQo8L2h0bWw+DQo=', 'basvuru_onay');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `onay_id` int(11) NOT NULL,
  `kadi` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `onay_id`, `kadi`, `sifre`, `durum`) VALUES
(4, 4, 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `wp_gruplari`
--

CREATE TABLE `wp_gruplari` (
  `id` int(11) NOT NULL,
  `grup_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `grup_aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `grup_katilim_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `son_link_tarih` timestamp NULL DEFAULT NULL,
  `ekleme_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `wp_gruplari`
--

INSERT INTO `wp_gruplari` (`id`, `grup_adi`, `grup_aciklama`, `grup_katilim_link`, `son_link_tarih`, `ekleme_tarih`) VALUES
(17, 'Deneme', 'MERHABA8g', 'http://wmre.1232a6x', '2019-07-26 16:15:04', '2019-07-20 11:15:10'),
(18, 'abee', 'sdfdsfdsf', 'http://adsasdas.ccjj', '2019-07-26 16:16:19', '2019-07-26 16:16:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` int(11) NOT NULL,
  `yetkili` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`id`, `yetkili`, `sifre`, `mail`, `yetki`) VALUES
(1, 'a', 'a', 'emreuyguc@gmail.com', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `basvurular`
--
ALTER TABLE `basvurular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `basvurular_onay`
--
ALTER TABLE `basvurular_onay`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `basvurular_red`
--
ALTER TABLE `basvurular_red`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `basvuru_hizli_link`
--
ALTER TABLE `basvuru_hizli_link`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kisa_linkler`
--
ALTER TABLE `kisa_linkler`
  ADD PRIMARY KEY (`link_id`);

--
-- Tablo için indeksler `loglar`
--
ALTER TABLE `loglar`
  ADD PRIMARY KEY (`log_id`);

--
-- Tablo için indeksler `mailler`
--
ALTER TABLE `mailler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `wp_gruplari`
--
ALTER TABLE `wp_gruplari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `basvurular`
--
ALTER TABLE `basvurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Tablo için AUTO_INCREMENT değeri `basvurular_onay`
--
ALTER TABLE `basvurular_onay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `basvurular_red`
--
ALTER TABLE `basvurular_red`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `basvuru_hizli_link`
--
ALTER TABLE `basvuru_hizli_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kisa_linkler`
--
ALTER TABLE `kisa_linkler`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `loglar`
--
ALTER TABLE `loglar`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `mailler`
--
ALTER TABLE `mailler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `wp_gruplari`
--
ALTER TABLE `wp_gruplari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
