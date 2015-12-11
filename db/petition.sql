-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Гру 11 2015 р., 21:27
-- Версія сервера: 5.6.26
-- Версія PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `petition`
--

-- --------------------------------------------------------

--
-- Структура таблиці `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL,
  `petition_id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `answer`
--

INSERT INTO `answer` (`id`, `petition_id`, `text`, `date`) VALUES
(62, 4, 'Ваше звернення розглянуто', '2015-10-12'),
(63, 6, 'Ми розглянули Ваше звернення, Ваш запит надіслано у відповідні служби.\r\nПрезидент', '2015-12-10');

-- --------------------------------------------------------

--
-- Структура таблиці `petition`
--

CREATE TABLE IF NOT EXISTS `petition` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `topic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `benefit` text COLLATE utf8_unicode_ci NOT NULL,
  `petition_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `petition`
--

INSERT INTO `petition` (`id`, `author_id`, `topic`, `text`, `date`, `benefit`, `petition_state`, `state`) VALUES
(4, 11, 'ПРО ЗАЛИШЕННЯ ПОМІЧНИКІВ СУДДІВ В СТАТУСІ ДЕРЖАВНИХ СЛУЖБОВЦІВ', 'Державна служба – це публічна, професійна, політично неупереджена діяльність з практичного виконання завдань і функцій держави, зокрема щодо:\r\n1) аналізу державної політики на загальнодержавному, галузевому і регіональному рівнях та підготовки пропозицій стосовно її формування, у тому числі розроблення та проведення експертизи проектів програм, концепцій, стратегій, проектів законів та інших нормативно-правових актів, проектів міжнародних договорів;\r\n2) забезпечення реалізації державної політики, виконання загальнодержавних, галузевих і регіональних програм, виконання законів та інших нормативно-правових актів;\r\n3) забезпечення надання доступних і якісних адміністративних послуг;\r\n4) здійснення державного нагляду та контролю за дотриманням законодавства;\r\n5) управління державними фінансовими ресурсами, майном та контролю за їх використанням;\r\n6) управління персоналом державних органів;\r\n7) реалізації інших повноважень державного органу, визначених законодавством.\r\n2. Державний службовець – це громадянин України, який займає посаду державної служби в органі державної влади, іншому державному органі, їх апараті (секретаріаті) (далі - державний орган), одержує заробітну плату за рахунок коштів державного бюджету та здійснює встановлені для цієї посади повноваження, безпосередньо пов’язані з виконанням завдань і функцій такого державного органу, а також дотримується принципів державної служби.\r\nЗгідно ч.2 ст.3 проекту Закону України "Про державну службу" дія цього Закону поширюється на державних службовців:\r\n1) Секретаріату Кабінету Міністрів України;\r\n2) міністерств та інших центральних органів виконавчої влади;\r\n3) місцевих державних адміністрацій;\r\n4) органів прокуратури;\r\n5) органів військового управління;\r\n6) закордонних дипломатичних установ України;\r\n7) державних органів, особливості проходження державної служби в яких визначені статтею 91 цього Закону;\r\n8) інших державних органів.\r\nЗгідно ч.3 ст.3 проекту Закону України "Про державну службу"дія цього Закону не поширюється на:\r\n1) Президента України;\r\n2) Главу Адміністрації Президента України та його заступників, Постійного Представника Президента України в Автономній Республіці Крим та його заступників;\r\n3) членів Кабінету Міністрів України, перших заступників та заступників міністрів;\r\n4) Голову та членів Національної ради України з питань телебачення і радіомовлення, Голову та членів Антимонопольного комітету України, Голову та членів Національного агентства з питань запобігання корупції, Голову та членів Рахункової палати, Голову та членів Центральної виборчої комісії, голів та членів інших державних колегіальних органів;\r\n5) Секретаря Ради національної безпеки і оборони України та його заступників;\r\n6) Голову Державного комітету телебачення і радіомовлення України та його заступників, Голову Фонду державного майна України та його заступників;\r\n7) народних депутатів України;\r\n8) Уповноваженого Верховної Ради України з прав людини та його представників;\r\n9) службовців Національного банку України;\r\n10) депутатів Верховної Ради Автономної Республіки Крим, Голову Ради міністрів Автономної Республіки Крим та його заступників, міністрів Автономної Республіки Крим;\r\n11) депутатів місцевих рад, посадових осіб місцевого самоврядування;\r\n12) суддів;\r\n13) прокурорів;\r\n14) працівників державних органів, які виконують функції з обслуговування;\r\n15) працівників державних підприємств, установ, організацій, інших суб’єктів господарювання державної форми власності, а також навчальних закладів, заснованих державними органами;\r\n16) військовослужбовців Збройних Сил України та інших військових формувань, утворених відповідно до закону;\r\n17) осіб рядового і начальницького складу правоохоронних органів та працівників інших органів, яким присвоюються спеціальні звання, якщо інше не передбачено законом;\r\n18) працівників патронатних служб.\r\nВідповідно до ст.92 проекту Закону України "Про державну службу"', '2015-11-29', 'Це є дуже важливо для нашого народу, бо я так сказав. А чому ні?', 'in_process', 'with_answer'),
(6, 9, 'Яценюк Арсеній Петрович, де "Стіна" на кордоні Україна-Россія?', 'Прошу президента вияснити ситуацію, і сприяти подальшому розвитку проекту.', '2015-11-29', 'Це є дуже важливо для нашого народу, бо я так сказав. А чому ні?', 'in_process', 'with_answer'),
(7, 14, 'Спростити та скоротити процедуру отримання безкоштовної землі без права перепродажу', 'Пропоную максимально спростити та полегшити процедуру отримання громадянами України безкоштовної землі для селянського господарства та садівництва (заява-електронною поштою, відповідь також, з переліком вільних міст у бажаемому районі та можливим розміром ділянки або альтернатива іншого району). Унеможливити відмови та відписки сільрад. Право на землю надавати з забороною продажу. Забирати ділянки, що не обробляються або використовуються не за призначенням у користь інших бажаючих працювати на землі. Зробити єдину інстанцію з доступною базою таких земель та ділянок, що подлежать поверненню по вищеназванним причинам, також ця інстанція і буде видавати дозвіл на володіння землею. Можливо на вільні землі давати не право власності- а право безкоштовної тимчасової державної оренди, яка спадкується членами родини.', '2015-11-29', 'Це є дуже важливо для нашого народу, бо я так сказав. А чому ні?', 'active', ''),
(8, 12, 'Змінити назву вулиці', 'Пропоную змінити назву вулиці Фрунзе на вулицю з назвою"Героїв АТО".', '2015-11-29', 'Це є дуже важливо для нашого народу, бо я так сказав. А чому ні?', 'active', ''),
(9, 13, 'Про негайні перевірки АЗС в Україні на предмет якості пального', 'Більшість українських АЗС (автозаправних станцій), користуючись мораторієм на перевірки, продають водіям неякісне пальне.\r\nВ результаті псуються двигуни автомобілів, які потребують дорогих ремонтно-відновлювальних робіт.\r\nПропоную відмінити мораторій на перевірки АЗС України на предмет якості пального, створити спеціальні комісії з залученням громадських активістів, яким дозволити цілодобово перевіряти якість пального на АЗС.\r\nПри виявленні підробок на перший раз штрафувати АЗС в особливо великих розмірах, при повторенні-вилучати ліцензію і виставляти АЗС на торги.', '2015-11-29', 'Це є дуже важливо для нашого народу, бо я так сказав. А чому ні?', 'active', ''),
(10, 13, 'Відкрити інформацію про фінансовання шкіл та дитячих садків', 'У зв''язку з безкінечними зборами коштів адміністраціями державних навчальних закладів, просимо відкрити для публічного доступу інформацію про фінансові та матеріальні надходження до шкіл та дитячих садків. Це дасть змогу контролювати батькам, чи не збираються кошти на предмети, які були закуплені до закладів через державне фінансування.', '2015-11-29', 'Це є дуже важливо для нашого народу, бо я так сказав. А чому ні?', 'queue', ''),
(11, 25, 'Більше снігу в Києві', 'авдрмлтвба ХЕХЕХЕХЕХ НЕ РАБОТАЕТ ЛОЛвввввввввввввввввввв', '2015-12-10', 'без снігу погано відлаощікгепврадмолтчьсбкккккккккк', 'active', ''),
(12, 8, 'Більше снігу в Києві', 'авпвааааааааааааааааааааааааааааааааааааааааааааааа', '2015-12-10', 'Бо мало снігу гшввріолраівдлпаожщіокавпппппппппппп', 'active', '');

-- --------------------------------------------------------

--
-- Структура таблиці `signatures`
--

CREATE TABLE IF NOT EXISTS `signatures` (
  `petition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `signatures`
--

INSERT INTO `signatures` (`petition_id`, `user_id`) VALUES
(4, 8),
(6, 8),
(7, 8),
(4, 15),
(7, 15),
(9, 15),
(6, 15),
(8, 15),
(4, 13),
(7, 13),
(6, 13),
(8, 13),
(9, 16),
(4, 16),
(8, 16),
(7, 12),
(6, 12),
(9, 8),
(4, 17),
(6, 17),
(6, 11),
(8, 8),
(11, 8);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passport` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `passport`, `admin`) VALUES
(8, 'Elya', 'Korobova', 'eleonoria96@gmail.com', 'war', 'ER123456', NULL),
(9, 'Kate', 'Mobile', 'hendo@gmail.com', '1234', 'ER765432', NULL),
(10, 'Olexandra', 'Tkalich', 'olexandratk@gmail.com', '1234', 'ER767654', NULL),
(11, 'Roman', 'Karaporin', 'karaporin@lol.com', '1234', 'AR767654', NULL),
(12, 'Python', 'Pythonych', 'python@gmail.com', '1234', 'AR769654', NULL),
(13, 'Lesya', 'Garyazha', 'princess@oua.ua', '1234', 'CR769654', NULL),
(14, 'Zeus', 'Eleonor', 'iamthedog@ukr.net', '1234', 'OR769654', NULL),
(15, 'Ravlyk', 'Paul', 'ravlick@zeo.com', '1234', 'OR769666', NULL),
(16, 'Paul', 'Troyanov', 'paul@mama.ua', '1234', 'HR769666', NULL),
(17, 'Me', 'Thebest', 'ever@gmail.com', '1234', 'BT769666', NULL),
(18, 'Me', 'Thebest', 'ever@gmail.com', '1234', 'BT769669', NULL),
(20, 'Эля', 'Коробова', 'eleonoria96@ukr.net', '1234', 'BT769660', NULL),
(23, 'Test', 'Test', 'test@test.com', '1234', 'BT769664', NULL),
(24, 'admin', 'admin', 'admin@gmail.com', 'admin', '', 1),
(25, 'Петро', 'Щербина', 'pert@mail.ru', 'ilovechip25', 'as123456', NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petition_id` (`petition_id`);

--
-- Індекси таблиці `petition`
--
ALTER TABLE `petition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Індекси таблиці `signatures`
--
ALTER TABLE `signatures`
  ADD KEY `petition_id` (`petition_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passport` (`passport`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT для таблиці `petition`
--
ALTER TABLE `petition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`petition_id`) REFERENCES `petition` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `petition`
--
ALTER TABLE `petition`
  ADD CONSTRAINT `petition_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `signatures`
--
ALTER TABLE `signatures`
  ADD CONSTRAINT `signatures_ibfk_1` FOREIGN KEY (`petition_id`) REFERENCES `petition` (`id`),
  ADD CONSTRAINT `signatures_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
