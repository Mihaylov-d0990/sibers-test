-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 22 2022 г., 13:34
-- Версия сервера: 10.2.38-MariaDB
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sibers_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sex`
--

CREATE TABLE `sex` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sex`
--

INSERT INTO `sex` (`id`, `name`) VALUES
(2, 'female'),
(1, 'male');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` int(11) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `login`, `password`, `birthdate`, `sex`, `user_type`) VALUES
(1, 'Danila', 'Mihaylove', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2001-11-16', 1, 1),
(2, 'UserName0', 'UserSurname0', 'user0000', '93a9e5baa37535b7a8d30f14c53169cb', '2022-03-21', 1, 2),
(8, 'UserName6', 'UserSurname6', 'user6', 'affec3b64cf90492377a8114c86fc093', '2022-03-21', 2, 2),
(9, 'UserName7', 'UserSurname7', 'user7', '3e0469fb134991f8f75a2760e409c6ed', '2022-03-21', 1, 2),
(10, 'UserName8', 'UserSurname8', 'user8', '7668f673d5669995175ef91b5d171945', '2022-03-21', 1, 2),
(12, 'UserName10', 'UserSurname101', 'user111', '622a717b2ee12cf1f1ce229bbed59e7b', '2022-03-10', 2, 2),
(13, 'UserName11', 'UserSurname11', 'user11', '03aa1a0b0375b0461c1b8f35b234e67a', '2022-03-21', 1, 2),
(14, 'UserName1000', 'UserSurname1000', 'user1000', 'e1d3b2fc3a15d9a9e6e0b0b2a0800c8e', '2022-02-22', 2, 2),
(15, 'UserName13', 'UserSurname13', 'user13', 'd09979d794a6ee60d836f884739f7196', '2022-03-21', 1, 2),
(16, 'UserName14', 'UserSurname14', 'user14', 'ef06d5cbf35386ff2203d186eeff7923', '2022-03-21', 1, 2),
(17, 'UserName15', 'UserSurname15', 'user15', '726dedc0d6788b05f486730edcc0e871', '2022-03-21', 1, 2),
(18, 'UserName16', 'UserSurname16', 'user16', '8a62f0beaa5ae938956f5ea290321336', '2022-03-21', 1, 2),
(19, 'UserName17', 'UserSurname17', 'user17', '2b4233ebec7a45e1fb8ddd1aab794f7b', '2022-03-21', 1, 2),
(20, 'UserName18', 'UserSurname18', 'user18', '7ac18a1893e1d2bd5b46958ce1d2a8d0', '2022-03-21', 1, 2),
(21, 'UserName19', 'UserSurname19', 'user19', '2baab43f784b5b530b5347a50490bb0a', '2022-03-21', 1, 2),
(22, 'UserName20', 'UserSurname20', 'user20', '10880c7f4e4209eeda79711e1ea1723e', '2022-03-21', 1, 2),
(23, 'UserName21', 'UserSurname21', 'user21', '2e129db15b6d6db5342ba5d328642262', '2022-03-21', 1, 2),
(24, 'UserName22', 'UserSurname22', 'user22', '87dc1e131a1369fdf8f1c824a6a62dff', '2022-03-21', 1, 2),
(25, 'UserName23', 'UserSurname23', 'user23', '00a65dd47e842bcc3d82a296301071fb', '2022-03-21', 1, 2),
(26, 'UserName24', 'UserSurname24', 'user24', '5e6c9b24829588e0ac8f7d8074a4bfd4', '2022-03-21', 1, 2),
(27, 'UserName25', 'UserSurname25', 'user25', '0f8f84c18bfd5244ed976f63924a8a0e', '2022-03-21', 1, 2),
(28, 'UserName26', 'UserSurname26', 'user26', 'a507ac920f797876259f3c91f5cdef99', '2022-03-21', 1, 2),
(29, 'UserName27', 'UserSurname27', 'user27', '078d079e6146dec4dbf2135a8e513e2e', '2022-03-21', 1, 2),
(30, 'UserName28', 'UserSurname28', 'user28', 'b6f7fac0074f6508e5a4540ad89b55c0', '2022-03-21', 1, 2),
(31, 'UserName29', 'UserSurname29', 'user29', '244fd63d0adbf673130fce2f222078a5', '2022-03-21', 1, 2),
(32, 'UserName30', 'UserSurname30', 'user30', '40b13b85e6e4fc9c4a6f24379db20a39', '2022-03-21', 1, 2),
(33, 'UserName31', 'UserSurname31', 'user31', '0c673c53a29acb19c7e55b292d259e4d', '2022-03-21', 1, 2),
(34, 'UserName32', 'UserSurname32', 'user32', 'd21dbd2c4e178b2cb55dce0c6a43effc', '2022-03-21', 1, 2),
(35, 'UserName33', 'UserSurname33', 'user33', 'c6f273ac241a04216e0a703c18c36532', '2022-03-21', 1, 2),
(36, 'UserName34', 'UserSurname34', 'user34', '9ece8c4020f8aed10676cd1c56a41889', '2022-03-21', 1, 2),
(37, 'UserName35', 'UserSurname35', 'user35', '8cd5a487792e95045574fe205e4efdf9', '2022-03-21', 1, 2),
(38, 'UserName36', 'UserSurname36', 'user36', '41a2abe109f243e12e72133cf46ea5db', '2022-03-21', 1, 2),
(39, 'UserName37', 'UserSurname37', 'user37', '657bc81a9e2fba4293ed712d02a82191', '2022-03-21', 1, 2),
(40, 'UserName38', 'UserSurname38', 'user38', 'e6f3956464556eb0f7e310ccfaebe1d1', '2022-03-21', 1, 2),
(41, 'UserName39', 'UserSurname39', 'user39', '89a0afa8bca03ba74e75fe1e36d1a431', '2022-03-21', 1, 2),
(42, 'UserName40', 'UserSurname40', 'user40', '3695b09d29f3d88d21ad2bbfc230edae', '2022-03-21', 1, 2),
(43, 'UserName41', 'UserSurname41', 'user41', 'bb534b6741a863fd098b8ea0a709d680', '2022-03-21', 1, 2),
(44, 'UserName42', 'UserSurname42', 'user42', 'fd8689cb80113b68be586d8b5a6aa06a', '2022-03-21', 1, 2),
(45, 'UserName43', 'UserSurname43', 'user43', 'f0b3b7623d3bedf898459673d778319e', '2022-03-21', 1, 2),
(46, 'UserName44', 'UserSurname44', 'user44', '93b1ad3cfaeb254ea3c68ee7ea23c582', '2022-03-21', 1, 2),
(47, 'UserName45', 'UserSurname45', 'user45', 'ff0aa5febff01840387a57bf41db361d', '2022-03-21', 1, 2),
(48, 'UserName46', 'UserSurname46', 'user46', 'e02181454edbd5c9103b73061e58cd9c', '2022-03-21', 1, 2),
(49, 'UserName47', 'UserSurname47', 'user47', 'cd654cbb5fea850adf5a28ef7a6e2994', '2022-03-21', 1, 2),
(50, 'UserName48', 'UserSurname48', 'user48', '92007d4feb0c68600f6ea3423d65dea0', '2022-03-21', 1, 2),
(51, 'UserName49', 'UserSurname49', 'user49', '923b25d9d294c98405bfd70ac7604701', '2022-03-21', 1, 2),
(52, 'UserName50', 'UserSurname50', 'user50', '5d68f62085335588b67cf713ed6b3cfb', '2022-03-21', 1, 2),
(53, 'UserName51', 'UserSurname51', 'user51', '903a4fb3dc3db3f194ff4d50d5dd1f06', '2022-03-21', 1, 2),
(54, 'UserName52', 'UserSurname52', 'user52', '603ac5175e0b004e988fa8b1fda8c142', '2022-03-21', 1, 2),
(55, 'UserName53', 'UserSurname53', 'user53', '5a7b32f28b607c1cdca4f6821054a998', '2022-03-21', 1, 2),
(56, 'UserName54', 'UserSurname54', 'user54', 'a45c60cc393deac09b742f8bb58e275f', '2022-03-21', 1, 2),
(57, 'UserName55', 'UserSurname55', 'user55', '0bbf349b0c07a1777892a8d13937571e', '2022-03-21', 1, 2),
(58, 'UserName56', 'UserSurname56', 'user56', '75626fed9acb19545a0e2c0a6d5b19d7', '2022-03-21', 1, 2),
(59, 'UserName57', 'UserSurname57', 'user57', '0699ddd40db0b8a986ecf120f5b872e5', '2022-03-21', 1, 2),
(60, 'UserName58', 'UserSurname58', 'user58', '81a84a94d8313e42753674c2eeaa0186', '2022-03-21', 1, 2),
(61, 'UserName59', 'UserSurname59', 'user59', '03a2b89f849223644395d2951dadff6c', '2022-03-21', 1, 2),
(62, 'UserName60', 'UserSurname60', 'user60', '0d44502f9db3fa0f1c2dd0b523573f8b', '2022-03-21', 1, 2),
(63, 'UserName61', 'UserSurname61', 'user61', 'c16fd6e47644c2451f53235797d05252', '2022-03-21', 1, 2),
(64, 'UserName62', 'UserSurname62', 'user62', '9708fa05fcb3e7f4ccc675379da49353', '2022-03-21', 1, 2),
(65, 'UserName63', 'UserSurname63', 'user63', 'be2b07d84f10f8b3b3cae84b620cf166', '2022-03-21', 1, 2),
(66, 'UserName64', 'UserSurname64', 'user64', '8f03eb402fb51efd87a8fa821ef71e36', '2022-03-21', 1, 2),
(67, 'UserName65', 'UserSurname65', 'user65', '994204a8bf2b1cb2dd875643c0607be7', '2022-03-21', 1, 2),
(68, 'UserName66', 'UserSurname66', 'user66', 'ee8c50f66027b5867b029f14d8cc6566', '2022-03-21', 1, 2),
(69, 'UserName67', 'UserSurname67', 'user67', 'c8ce9fddb99dbb5d3a80b207246f74b5', '2022-03-21', 1, 2),
(70, 'UserName68', 'UserSurname68', 'user68', 'e40c701b30b098a3c632425d845f95e3', '2022-03-21', 1, 2),
(71, 'UserName69', 'UserSurname69', 'user69', '446e3045851a8538cd64d8b7e82dbc37', '2022-03-21', 1, 2),
(72, 'UserName70', 'UserSurname70', 'user70', '1af70c8771c50d65f8ba3d678e90e1e9', '2022-03-21', 1, 2),
(73, 'UserName71', 'UserSurname71', 'user71', 'ceb8dce4ae22145e78522275f277435d', '2022-03-21', 1, 2),
(74, 'UserName72', 'UserSurname72', 'user72', '8c4b3595f4509c39f6435176354b61b9', '2022-03-21', 1, 2),
(75, 'UserName73', 'UserSurname73', 'user73', '00ed29a6406651afe71482b5470432f5', '2022-03-21', 1, 2),
(76, 'UserName74', 'UserSurname74', 'user74', '5e9ea435dd2df6ec80402f291d9df643', '2022-03-21', 1, 2),
(77, 'UserName75', 'UserSurname75', 'user75', 'f0c42ab73bcb8e92099ab3c7d389b57e', '2022-03-21', 1, 2),
(78, 'UserName76', 'UserSurname76', 'user76', '05d7c46897b133cde5c4345442737622', '2022-03-21', 1, 2),
(79, 'UserName77', 'UserSurname77', 'user77', 'f330353f8c4cc94205ec099bead3053c', '2022-03-21', 1, 2),
(80, 'UserName78', 'UserSurname78', 'user78', 'a9f93a64f168d5eb0de529331648591b', '2022-03-21', 1, 2),
(81, 'UserName79', 'UserSurname79', 'user79', '3d62bbb65605350d9cf43fad107b093e', '2022-03-21', 1, 2),
(82, 'UserName80', 'UserSurname80', 'user80', 'e876db23879ffaa9793f6a102e5063e6', '2022-03-21', 1, 2),
(83, 'UserName81', 'UserSurname81', 'user81', '2b2c3ac6fd5656c66b6349297f7c8f34', '2022-03-21', 1, 2),
(84, 'UserName82', 'UserSurname82', 'user82', '9edb92515fc5ae08c2d8f9bca5c16c4b', '2022-03-21', 1, 2),
(85, 'UserName83', 'UserSurname83', 'user83', 'ccf718bf7d49ae991b33f88452a627ed', '2022-03-21', 1, 2),
(86, 'UserName84', 'UserSurname84', 'user84', '7f11aff8ee3ab2d4561f4f5bb996f538', '2022-03-21', 1, 2),
(87, 'UserName85', 'UserSurname85', 'user85', '5e50bebfaee0312ad55e13ced21b88e6', '2022-03-21', 1, 2),
(88, 'UserName86', 'UserSurname86', 'user86', 'd59cfe083c72a3fad01d607c9e347122', '2022-03-21', 1, 2),
(89, 'UserName87', 'UserSurname87', 'user87', '117c29a4d1b26107f19570a5d1595ee0', '2022-03-21', 1, 2),
(90, 'UserName88', 'UserSurname88', 'user88', '2077a0f8539ebe890a3dc0beb6c7a444', '2022-03-21', 1, 2),
(91, 'UserName89', 'UserSurname89', 'user89', '3ebab37e751cc294662d6b3a24d01b40', '2022-03-21', 1, 2),
(92, 'UserName90', 'UserSurname90', 'user90', '13731d57d40149e7b6a3a549e4042293', '2022-03-21', 1, 2),
(93, 'UserName91', 'UserSurname91', 'user91', '0e4552acbe2f5ff5416fea0a7c0fbf7a', '2022-03-21', 1, 2),
(94, 'UserName92', 'UserSurname92', 'user92', '90706f14ef1087cf9501b926fe97533e', '2022-03-21', 1, 2),
(95, 'UserName93', 'UserSurname93', 'user93', '538065c753a7d5868f7d19de1cdff3e3', '2022-03-21', 1, 2),
(96, 'UserName94', 'UserSurname94', 'user94', '2a3db66301df919cb3d78ca7411be0c6', '2022-03-21', 1, 2),
(97, 'UserName95', 'UserSurname95', 'user95', 'a132cbbd6a2c2981165a239e22fba6c7', '2022-03-21', 1, 2),
(98, 'UserName96', 'UserSurname96', 'user96', '91d8d21d21d64d8890aae88a01537e24', '2022-03-21', 1, 2),
(99, 'UserName97', 'UserSurname97', 'user97', 'b79fbe59e7c297447e5005b13814cd9f', '2022-03-21', 1, 2),
(100, 'UserName98', 'UserSurname98', 'user98', '88c0f392517ad8ea55bb7643a67dcbeb', '2022-03-21', 1, 2),
(101, 'UserName99', 'UserSurname99', 'user99', '485ddf8dd90940f69b2f2274af864ad3', '2022-03-21', 1, 2),
(102, 'Test', 'Test', 'Test111', '2d6e430b714452b28b09f63746478ed8', '2022-03-22', 2, 2),
(103, 'Test111', 'Test111', 'Test', '2d6e430b714452b28b09f63746478ed8', '1111-11-11', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `sex` (`sex`),
  ADD KEY `user_type` (`user_type`);

--
-- Индексы таблицы `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sex`
--
ALTER TABLE `sex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT для таблицы `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`sex`) REFERENCES `sex` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
