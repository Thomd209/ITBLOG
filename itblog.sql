-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: itblog
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_answer`
--

DROP TABLE IF EXISTS `admin_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_answer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `answer` text NOT NULL,
  `date` date NOT NULL,
  `user_message_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_message_id` (`user_message_id`),
  CONSTRAINT `admin_answer_ibfk_1` FOREIGN KEY (`user_message_id`) REFERENCES `user_message` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_answer`
--

LOCK TABLES `admin_answer` WRITE;
/*!40000 ALTER TABLE `admin_answer` DISABLE KEYS */;
INSERT INTO `admin_answer` VALUES (16,'Answer to first message from user1!','2021-11-16',38),(17,'Answer to sixth message from user2!','2021-11-17',44),(18,'Answer to fifth message from user2!','2021-11-17',43),(19,'Answer to fourth message from user2!','2021-11-17',42),(20,'Answer to third message from user2!','2021-11-17',41),(21,'Answer to second message from user2!','2021-11-18',40),(22,'Answer to first message from user2!','2021-11-18',39);
/*!40000 ALTER TABLE `admin_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `articleTitle` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `publicationDate` date NOT NULL,
  `categoryId` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryId` (`categoryId`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (46,'realme GT Neo2 с экраном 120 Гц и Snapdragon 870 уже в России','В России представили новый смартфон realme GT Neo2. Он получил производительный процессор Qualcomm, AMOLED-экран с высокой частотой обновления, стереодинамики с поддержкой Dolby Atmos, ёмкий аккумулятор и возможность зарядки почти за полчаса.','../../../public/images/Смартфоны/googlePixelrelease.png','Одной из главных фишек realme GT Neo2 стал процессор Qualcomm Snapdragon 870 5G, построенный по 7-нм техпроцессу и работающий на частоте до 3,2 ГГц. По заверениям производителя, в этом смартфоне самая большая в отрасли площадь парового охлаждения в 8-слойной трёхмерной системе рассеивания тепла с алмазной термопастой в качестве охлаждающего материала. Указывается, что этот гель до 50% эффективнее, чем классическая термопаста с серебром.','2021-11-16',26),(47,'Новейший геймерский смартфон ROG Phone 5s уже в России','Компания ASUS объявила о старте продаж в России самого мощного устройства серии ROG Phone 5. Речь о новейшем игровом смартфоне под названием ROG Phone 5s, который может похвастаться процессором Snapdragon 888+, 16 ГБ оперативной памяти LPDDR5 и оптимизированной системой охлаждения GameCool 5.\r\n\r\n','../../../public/images/Смартфоны/ROGPhone5s.jpg','ROG Phone 5s поставляется с 6,78-дюймовым экраном с разрешением 2448х1080 пикселей, частотой обновления 144 Гц, временем отклика до 1 мс, соотношением сторон 20,4:9 и защитным стеклом Gorilla Glass Victus. Дисплей новинки представлен матрицей AMOLED Samsung E4 с максимальной яркостью 1200 кд/м2, высокой точностью цветопередачи (Delta E &lt;1), 111,23-процентным охватом цветового пространства DCI-P3, а также поддержкой технологий Always-On, HDR10 и HDR10+.\r\n\r\n','2021-11-16',26),(48,'Balmuda Phone &mdash; компактный смартфон от производителя тостеров','Известный японский производитель тостеров Balmuda сдержал своё обещание выпустить фирменный смартфон. Как и вся продукция компании, аппарат выделяется на фоне конкурентов необычным дизайном. Кроме того, он получился очень компактным.','../../../public/images/Смартфоны/balmuda_phone.png','&lt;p class=&quot;article-page-content&quot;&gt;Balmuda Phone не похож ни на один современный смартфон. Задняя крышка изогнутая, а сам аппарат получился крайне компактным &mdash; всего 123 мм в высоту и 69 мм в ширину. Для сравнения, размеры iPhone 13 mini составляют 131,5 х 64,2 мм. Производитель также заявляет, что это единственный смартфон, в дизайне которого совсем нет прямых линий.&lt;/p&gt;\r\n&lt;p class=&quot;article-page-content&quot;&gt;Аппарат оснащается 4,9-дюймовым экраном с разрешением Full HD. Внутри у него установлены процессор Snapdragon 765, 6 ГБ оперативной памяти и накопитель объёмом 128 ГБ. А вот ёмкость аккумулятора составляет всего 2500 мАч. Есть поддержка беспроводной зарядки. Основная камера имеет разрешение 48 Мп, а сбоку от неё находится сканер отпечатков пальцев. Фронтальная камера на 8 Мп находится в непривычном месте в правом углу экрана. Аппарат также оснащён NFC и защитой от воды по стандарту IP44.&lt;/p&gt;\r\n\r\n','2021-11-16',26),(50,'Xiaomi 12 Ultra Enhanced получит камеру с зумом 120x и топовый процессор','По данным инсайдеров, новое семейство флагманов Xiaomi не ограничится базовой, Pro и Ultra-версиями смартфона. В сети появилось упоминание модели Xiaomi 12 Ultra Enhanced &mdash; инсайдеры назвали ключевые характеристики камеры ещё не анонсированного аппарата.','../../../public/images/Смартфоны/xiaomi12ultra.jpg','По данным ресурса MySmartPrice, новинка, как и &laquo;обычный&raquo; Xiaomi 12 Ultra, будет оснащена блоком основной камеры с четырьмя сенсорами. Устройству приписывают главный датчик изображения Samsung GN5 с разрешением 50 Мп и три дополнительных 48-мегапиксельных сенсора. Ожидается, что в список возможностей модуля войдут такие функции, как 12-кратный зум для фото и 15-кратный &mdash; для записи видео.','2021-11-16',26),(51,'Samsung Galaxy S21 FE: цена в Европе и ожидаемая дата выхода','Не дожидаясь анонса, инсайдеры со ссылкой на сайт одного из европейских ретейлеров опубликовали прайс-лист на разные версии Galaxy S21 FE. Судя по утечке, стоимость &laquo;фанатского&raquo; гаджета на старте продаж будет заметно выше, чем у прошлогодней модели.','../../../public/images/Смартфоны/samsungGalaxyS21.jpg','По данным источника, базовая версия смартфона с 8 ГБ оперативной и 128 ГБ обойдётся покупателям в 920 евро с учётом местного налога на добавленную стоимость (НДС), а модификация 8/256 ГБ будет стоить 985 евро. Отдельный список посвящён британскому релизу будущей новинки &mdash; там аппарат поступит в продажу по цене 776 и 831 фунт стерлингов соответственно.','2021-11-16',26),(52,'Новые фишки камеры Google появятся на старых &laquo;пикселях&raquo;','Одной из ключевых особенностей смартфонов серии Pixel 6 стали расширенные возможности приложения Google Camera. Вскоре воспользоваться некоторыми функциями новинок смогут и владельцы фирменных смартфонов предыдущих поколений &mdash; в сети уже появилась информация о грядущем программном обновлении для старых &laquo;пикселей&raquo;.','../../../public/images/Смартфоны/googlePizel.jpg','&lt;p class=&quot;article-page-content&quot;&gt;Одним из нововведений версии Google Camera 8.4 станет &laquo;ластик&raquo; Magic Eraser. Он позволяет быстро удалить нежелательный объект с фотографии без использования сторонних графических редакторов. Кроме того, владельцам смартфонов Google Pixel 3 и более новых моделей станет доступна функция Night Sight для съёмки в условиях недостаточной освещённости без ручного переключения режимов.&lt;/p&gt;\r\n\r\n&lt;p class=&quot;article-page-content&quot;&gt;В числе других нововведений источник отмечает появление экранных кнопок для быстрого изменения кратности зума и три новых режима стабилизации видео: Use Locked, Acrive и Cinematic Pan. Для Pixel 5 и Pixel 4a вскоре также станет доступен режим Timer Light, при включении которого во время обратного отсчёта перед съёмкой фото мигает вспышка.&lt;/p&gt;\r\n\r\n&lt;p class=&quot;article-page-content&quot;&gt;Указанный список нововведений станет доступен в приложении Google Camera 8.4 сразу после релиза в магазине Google Play. Дополнительно может потребоваться обновление Google Photo до версии 5.64. Информации о точной дате выпуска апдейта Google пока не раскрывает.&lt;/p&gt;','2021-11-16',26),(53,'Рендеры OnePlus Nord N20 5G от надёжного источника','Инсайдер OnLeaks опубликовал серию изображений, демонстрирующих ещё не анонсированный смартфон бренда OnePlus. Как утверждает источник, при работе над внешним видом гаджета его создатели явно вдохновлялись продукцией Apple, хотя и внесли в фирменный дизайн ряд оригинальных изменений.','../../../public/images/Смартфоны/onePlusNord.jpg','&lt;p class=&quot;article-page-content&quot;&gt;Судя по публикации, OnePlus Nord N20 5G получит корпус с плоскими гранями, отчасти напоминающий модели iPhone 13-го поколения. При этом блок камеры новинки выполнен оригинально &mdash; он представляет собой обособленные модули (предположительно на 64 и 2 Мп), врезанные в заднюю крышку. Фронталка гаджета размещена в области небольшого отверстия в верхнем левом углу экрана.&lt;/p&gt;\r\n\r\n&lt;p class=&quot;article-page-content&quot;&gt;По предварительной информации, аппарат будет построен на базе мобильной платформы Snapdragon 695 с поддержкой сетей 5G. Сообщается, что сканер отпечатков производитель интегрирует под 6,43-дюймовый плоский OLED-дисплей. Увы, разрешение экрана и другие характеристики новинки пока неизвестны.&lt;/p&gt;\r\n\r\n&lt;p class=&quot;article-page-content&quot;&gt;OnePlus Nord N20 5G, по данным инсайдера, будет доступен в сером и фиолетовом корпусах. Дата анонса и цена устройства производителем пока не объявлены.&lt;/p&gt;','2021-11-16',26),(54,'Ремастеры GTA: The Trilogy опустились ниже Warcraft III: Reforge по оценкам геймеров','Разработчики стараются выжать максимум из ностальгических чувств геймеров, однако не каждый ремейк и ремастер оправдывает ожидания фанатов. Недавнее переиздание GTA: The Trilogy стало настоящим провалом по мнению пользователей Metacritic. Игроки оценили сборник даже ниже, чем Warcraft III: Reforged.','../../../public/images/Игры/gtaRemasters.jpg','Рейтинг Grand Theft Auto: The Trilogy &ndash; The Definitive Edition по оценкам пользователей разнится от 0,4 до 0,9 балла из 5 возможных. Хуже всего геймеры приняли версию для Nintendo Switch, однако даже если сравнивать ремастеры по родной для Warcraft III: Reforge платформе &mdash; PC &mdash; сборник GTA всё ещё проигрывает главному провалу Blizzard: 0,5 балла против 0,6 балла у осовремененной стратегии.','2021-11-16',27),(55,'Грядущий флагман Motorola набрал в AnTuTu более 850 000 баллов','Представитель бренда Motorola похвастался производительностью ещё не представленного флагмана компании. Новый смартфон набирает в бенчмарке AnTuTu более 850 000 баллов.','../../../public/images/Смартфоны/Motorola.jpg','Согласно сообщению Motorola, готовящийся к выпуску флагман работает на базе мобильной платформы Snapdragon 888+. По мнению компании, судя по общему результату тестирования производительности в AnTuTu, именно этот процессор Qualcomm &laquo;идеален для смартфонов&raquo;.','2021-11-17',26);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryTitle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (26,'Смартфоны'),(27,'Игры'),(28,'Ноутбуки');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'thomd729','$2y$10$henLjTPDx5g2/ehdC9YkpOFAF7NHq5DaiSJ6QLEGf4SOdbudmTxRm','thomd209@gmail.com','admin'),(9,'user1','$2y$10$mpgTI0zAU/JvbgFfvopWTOzRwr2aeLj.EsF4xT9b6iYANhwL3WlXu','tomblueblue99@gmail.com','user'),(10,'user2','$2y$10$D0r3qLG/9/X8Z7dCI6sRzuWk2d72mhf3n9Iiiz/jkTE5mTGzKPUgC','mistertomblue@yandex.ru','user'),(11,'user3','$2y$10$IC3C754fH.9GzYKfjuaIkeXS8W1le/lpReUMgDdEm75FppVn09v7i','user3@redFish.com','user'),(12,'user4','$2y$10$uQsMs3xay9qK3Np0oBfwyeX9lpR2rLBlaygchQJrCZirwsFm.Qoc6','user4@redFish.com','user'),(13,'user5','$2y$10$dUJXR6r0wpVkIM9DiWeC3etixXVFnsQLd17u1/Tb1XnEelMnNksdS','user5@redFish.com','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_message`
--

DROP TABLE IF EXISTS `user_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(256) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_message`
--

LOCK TABLES `user_message` WRITE;
/*!40000 ALTER TABLE `user_message` DISABLE KEYS */;
INSERT INTO `user_message` VALUES (38,'First message from user1!','2021-11-16','replied',9),(39,'First message from user2!','2021-11-17','replied',10),(40,'Second message from user2!','2021-11-17','replied',10),(41,'Third message from user2!','2021-11-17','replied',10),(42,'Fourth message from user2!','2021-11-17','replied',10),(43,'Fifth message from user2!','2021-11-18','replied',10),(44,'Sixth message from user2!','2021-11-17','replied',10);
/*!40000 ALTER TABLE `user_message` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-21  0:38:46
