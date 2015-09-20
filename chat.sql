-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 20 2015 г., 18:34
-- Версия сервера: 5.6.25
-- Версия PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `arr_nik` mediumtext NOT NULL,
  `date` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `channel`
--

INSERT INTO `channel` (`id`, `name`, `password`, `arr_nik`, `date`) VALUES
(10, 'Киев', '0', '0', 1001),
(11, 'Одесса', '0', '0', 2001),
(12, 'Львов', '0', '0', 3432),
(31, 'tfhfhg', '12345', '1,2', 1442753629),
(32, 'kjhgjhbghj', '0', '2', 1442756690),
(33, 'jhhj', 'jygj', '1', 1442756696),
(35, 'апрарпан', '12345', '1', 1442762137),
(36, 'ропарпапр', '0', '1', 1442762143);

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `channel` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `date` bigint(20) NOT NULL,
  `user_login` varchar(32) NOT NULL,
  `to_user_login` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `channel`, `message`, `user_id`, `to_user_id`, `date`, `user_login`, `to_user_login`) VALUES
(1, 10, 'Это сообщение в канале Киев', 1, 0, 3424, 'admin', '0'),
(2, 0, 'Это личное сообщение', 1, 5, 3232, 'admin', '0'),
(3, 10, 'Это новое сообщение', 1, 0, 565656, 'admin', '0'),
(4, 0, 'dsds', 1, 2, 0, '', '0'),
(5, 10, 'hgvg', 1, 0, 1442632110, '', '0'),
(9, 12, 'hfgkjhkjhg', 1, 0, 1442632371, 'admin', '0'),
(10, 12, 'cvvfc', 0, 0, 1442632380, '', '0'),
(11, 12, 'cvvfc', 0, 0, 1442632382, '', '0'),
(12, 12, 'cvvfc', 0, 0, 1442632386, '', '0'),
(13, 12, 'jhghgfhj', 1, 0, 1442633177, 'admin', '0'),
(14, 0, 'fdhjllmk', 2, 1, 1442633196, 'vasja', '0'),
(27, 12, 'hvghvhgv', 2, 0, 1442635847, 'vasja', '0'),
(29, 12, 'm', 2, 0, 1442637477, 'vasja', '0'),
(30, 12, 'hgcgf', 2, 0, 1442637484, 'vasja', '0'),
(34, 10, 'прир', 1, 0, 1442639450, 'admin', '0'),
(35, 0, 'о', 1, 2, 1442646942, 'admin', 'vasja'),
(36, 0, 'орои', 1, 2, 1442646960, 'admin', 'vasja'),
(37, 0, 'лрлрло', 1, 2, 1442646996, 'admin', 'vasja'),
(38, 0, 'ьтть', 1, 2, 1442647030, 'admin', 'vasja'),
(39, 0, 'оририт', 1, 2, 1442647058, 'admin', 'vasja'),
(45, 12, 'jkhjk', 1, 0, 1442647739, 'admin', '0'),
(46, 12, 'lkjbhj', 1, 0, 1442647744, 'admin', '0'),
(47, 12, 'kjjkhk', 3, 0, 1442648935, 'android', '0'),
(48, 12, 'njhghkk', 3, 0, 1442648944, 'android', '0'),
(49, 0, 'jknkjhkjhjk', 3, 2, 1442648970, 'android', 'vasja'),
(50, 0, 'kjhkjhj', 2, 3, 1442649008, 'vasja', 'android'),
(51, 0, 'jhjjfcfcfkl', 2, 3, 1442649050, 'vasja', 'android'),
(62, 10, 'лои', 2, 0, 1442695720, 'vasja', '0'),
(63, 10, 'оппасасапспмрп', 2, 0, 1442695735, 'vasja', '0'),
(64, 0, 'hgvhjjhb', 2, 1, 1442695767, 'vasja', 'admin'),
(65, 0, 'jhhbhg', 2, 1, 1442695777, 'vasja', 'admin'),
(66, 0, 'hjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvfffffffffffffffffffhjbhjbhjbjhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvvvvvvffffffffffffffffffff', 2, 1, 1442695798, 'vasja', 'admin'),
(67, 0, 'hjbhbh', 2, 1, 1442696483, 'vasja', 'admin'),
(68, 0, 'hgcfgvbnhjngh', 2, 1, 1442696491, 'vasja', 'admin'),
(71, 0, 'jjnnjnvhg', 2, 2, 1442704455, 'vasja', 'vasja'),
(73, 11, 'hgvghfdxfdhjb', 1, 0, 1442714267, 'admin', '0'),
(75, 11, 'jnjhbjbbjh', 1, 0, 1442714283, 'admin', '0'),
(79, 11, 'kjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg frjjjjjjjj', 1, 0, 1442716356, 'admin', '0'),
(80, 11, 'kjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg fkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjgt gggggggggggggggggggggggggf fffffffffffff gggggggggh    jjjjjjjjjjjj j j j jjjjjjjjjjjjj  hhhhhhhhh hhhhhhhhhh gggggggggg f', 1, 0, 1442716372, 'admin', '0'),
(81, 11, 'mnmn', 1, 0, 1442716382, 'admin', '0'),
(89, 0, 'b', 1, 2, 1442724793, 'admin', 'vasja'),
(90, 0, 'cbbvvbc', 1, 2, 1442724804, 'admin', 'vasja'),
(91, 0, 'bnbvcvvnb', 1, 2, 1442724824, 'admin', 'vasja'),
(92, 0, 'sdsd', 1, 3, 1442746943, 'admin', 'android'),
(93, 0, 'hghgh', 1, 3, 1442746948, 'admin', 'android'),
(99, 12, 'оррname=', 1, 0, 1442749172, 'admin', '0'),
(100, 12, 'лоирname=орир', 1, 0, 1442749181, 'admin', '0'),
(101, 12, 'рпарпname=', 1, 0, 1442749263, 'admin', '0'),
(102, 12, 'апвапname=', 1, 0, 1442749303, 'admin', '0'),
(103, 12, 'рпаname=', 1, 0, 1442749320, 'admin', '0'),
(104, 12, 'орname=рпм', 1, 0, 1442749345, 'admin', '0'),
(105, 12, 'лорname=рпм', 1, 0, 1442749381, 'admin', '0'),
(106, 12, 'оname=рпм', 1, 0, 1442749388, 'admin', '0'),
(107, 12, 'пасасname=рпм', 1, 0, 1442749487, 'admin', '0'),
(108, 12, 'орname=рпм', 1, 0, 1442749536, 'admin', '0'),
(109, 12, 'name=', 1, 0, 1442749546, 'admin', '0'),
(110, 12, 'name=', 1, 0, 1442749563, 'admin', '0'),
(111, 12, 'name=', 1, 0, 1442749642, 'admin', '0'),
(112, 12, 'name=', 1, 0, 1442749643, 'admin', '0'),
(113, 12, 'name=', 1, 0, 1442749644, 'admin', '0'),
(114, 12, 'name=', 1, 0, 1442749645, 'admin', '0'),
(115, 12, 'name=павап', 1, 0, 1442749651, 'admin', '0'),
(116, 12, 'о', 1, 0, 1442749679, 'admin', '0'),
(117, 12, 'орпиро', 1, 0, 1442749690, 'admin', '0'),
(118, 12, 'ор', 1, 0, 1442749728, 'admin', '0'),
(119, 12, 'о', 1, 0, 1442749779, 'admin', '0'),
(120, 12, 'о', 1, 0, 1442750301, 'admin', '0'),
(121, 12, 'орп', 1, 0, 1442750314, 'admin', '0'),
(122, 12, 'рпав', 1, 0, 1442750346, 'admin', '0'),
(123, 12, 'л', 1, 0, 1442750418, 'admin', '0'),
(124, 12, 'ло', 1, 0, 1442750444, 'admin', '0'),
(125, 12, 'о', 1, 0, 1442750542, 'admin', '0'),
(126, 12, 'ааа', 1, 0, 1442750764, 'admin', '0'),
(127, 12, 'о', 1, 0, 1442750856, 'admin', '0'),
(128, 12, 'л', 1, 0, 1442750890, 'admin', '0'),
(129, 12, 'орирои', 1, 0, 1442750898, 'admin', '0'),
(130, 12, 'ор', 1, 0, 1442750976, 'admin', 'рп'),
(131, 0, 'jhjhb', 1, 2, 1442751406, 'admin', 'vasja'),
(132, 12, 'bhjbjhb', 1, 0, 1442751419, 'admin', 'gdfcg'),
(133, 12, 'jhbjhbgh', 1, 0, 1442751426, 'admin', '0'),
(134, 12, 'gcfdcfc', 1, 0, 1442751438, 'admin', '0'),
(135, 12, 'n n ', 1, 0, 1442751450, 'admin', 'jnm'),
(136, 31, 'dsdd', 2, 0, 1442755628, 'vasja', '0'),
(137, 36, 'ориор', 1, 0, 1442762149, 'admin', '0'),
(138, 36, 'оиториори', 1, 0, 1442762157, 'admin', 'рпмрп'),
(139, 36, 'орирои', 1, 0, 1442762164, 'admin', '0'),
(140, 36, 'ориототл', 1, 0, 1442762175, 'admin', 'лолтоиор'),
(141, 36, 'оотри', 1, 0, 1442762208, 'admin', 'оио');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `session` varchar(32) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `date` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `session`, `user_name`, `date`) VALUES
(1, 'admin', '12345', '-408208901', 'Глеб', 0),
(2, 'vasja', '12345', '406459174', 'Вася', 3434),
(3, 'android', '12345', '-95426', 'ANDROID', 767655);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
