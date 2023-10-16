-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Eki 2023, 16:56:26
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `obsdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `t_classes`
--

CREATE TABLE `t_classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `t_classes`
--

INSERT INTO `t_classes` (`id`, `class_name`, `class_teacher_id`) VALUES
(2, 'YazılımEkibi', 2),
(3, 'RedTeam', 1),
(4, 'OSINT', 8),
(5, 'QAQAQ', 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `t_classes_students`
--

CREATE TABLE `t_classes_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `t_classes_students`
--

INSERT INTO `t_classes_students` (`id`, `student_id`, `class_id`) VALUES
(1, 2, 5),
(17, 2, 2),
(19, 10, 4),
(20, 8, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `t_exams`
--

CREATE TABLE `t_exams` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_score` tinyint(4) NOT NULL,
  `exam_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `t_exams`
--

INSERT INTO `t_exams` (`id`, `student_id`, `lesson_id`, `class_id`, `exam_score`, `exam_date`) VALUES
(4, 8, 13, 5, 50, '2023-10-15 22:54:50'),
(5, 10, 13, 4, 50, '2023-10-15 22:56:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `t_lessons`
--

CREATE TABLE `t_lessons` (
  `id` int(11) NOT NULL,
  `teacher_user_id` int(11) NOT NULL,
  `lesson_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `t_lessons`
--

INSERT INTO `t_lessons` (`id`, `teacher_user_id`, `lesson_name`) VALUES
(5, 1, 'Matematik'),
(7, 1, 'Fizik'),
(8, 2, 'Numerical'),
(13, 9, 'aaaaa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `t_users`
--

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `t_users`
--

INSERT INTO `t_users` (`id`, `name`, `surname`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Bora', 'Çiçek', 'boracicek', '$argon2id$v=19$m=65536,t=4,p=1$UEJCTnk0WEJreFdWZVF6eQ$iTWM/kERMAE3OXAl2me00wlSG3Tjm9Bxvni4x8NOu24', 'admin', '2023-10-12 19:30:07'),
(2, 'Berkay', ' Atas', 'berkayatas', '$argon2id$v=19$m=65536,t=4,p=1$QjRray80NlBCREFTeVZjMw$+25lh9wMFXrKNTAUv7/xQLHPQO+2KVkpx7fa/p43A44', 'student', '2023-10-06 11:17:12'),
(8, 'Kara', 'Kuru', 'imeakmjak', '$argon2id$v=19$m=65536,t=4,p=1$YWxnWXpkdVlkT05JakVyLw$Yg+3ruzv2vi3yufW8mpMSrP9X51pA/yo8ANs2nxeS/w', 'student', '2023-10-14 15:33:47'),
(9, 'Kapalı', 'Kutu', 'kapalikutu', '$argon2id$v=19$m=65536,t=4,p=1$dXlTZUptVHFjOEUwOHRqMw$fsrz0NbIfoksHhySVbHimmfiYohKgo7kWkJ7RksrXGI', 'teacher', '2023-10-10 16:54:25'),
(10, 'Mandalorian', 'taksonomi', 'transatlantik', '$argon2id$v=19$m=65536,t=4,p=1$SXBLTnNHOWVFN2hEeElPdw$PjCqbJg0bMfFdQ57hPBHgUneRIXttXWA/7KP9vXSRF0', 'student', '2023-10-14 15:40:38');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `t_classes`
--
ALTER TABLE `t_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_teacher_id` (`class_teacher_id`);

--
-- Tablo için indeksler `t_classes_students`
--
ALTER TABLE `t_classes_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Tablo için indeksler `t_exams`
--
ALTER TABLE `t_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Tablo için indeksler `t_lessons`
--
ALTER TABLE `t_lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_user_id` (`teacher_user_id`);

--
-- Tablo için indeksler `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `t_classes`
--
ALTER TABLE `t_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `t_classes_students`
--
ALTER TABLE `t_classes_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `t_exams`
--
ALTER TABLE `t_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `t_lessons`
--
ALTER TABLE `t_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `t_classes`
--
ALTER TABLE `t_classes`
  ADD CONSTRAINT `t_classes_ibfk_1` FOREIGN KEY (`class_teacher_id`) REFERENCES `t_users` (`id`);

--
-- Tablo kısıtlamaları `t_classes_students`
--
ALTER TABLE `t_classes_students`
  ADD CONSTRAINT `t_classes_students_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `t_users` (`id`),
  ADD CONSTRAINT `t_classes_students_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `t_classes` (`id`);

--
-- Tablo kısıtlamaları `t_exams`
--
ALTER TABLE `t_exams`
  ADD CONSTRAINT `t_exams_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `t_users` (`id`),
  ADD CONSTRAINT `t_exams_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `t_lessons` (`id`),
  ADD CONSTRAINT `t_exams_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `t_classes` (`id`);

--
-- Tablo kısıtlamaları `t_lessons`
--
ALTER TABLE `t_lessons`
  ADD CONSTRAINT `t_lessons_ibfk_1` FOREIGN KEY (`teacher_user_id`) REFERENCES `t_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
