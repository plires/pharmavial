-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-09-2021 a las 19:36:08
-- Versión del servidor: 5.7.35-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lc_pharmavial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `comments` text,
  `origin` varchar(300) DEFAULT NULL,
  `date` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(300) DEFAULT NULL,
  `alt` varchar(300) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `url`, `alt`, `product_id`) VALUES
(29, 'bd4c9ab730f5513206b999ec0d90d1fb.jpg', 'Ampicilina 500', 2),
(31, '2b24d495052a8ce66358eb576b8912c8.jpg', 'Ampicilina Sulbactam', 4),
(32, '903ce9225fca3e988c2af215d4e544d3.jpg', 'Cefepime', 5),
(34, '698d51a19d8a121ce581499d7b701668.jpg', 'Ceftriaxona', 7),
(38, '3636638817772e42b59d74cff571fbb3.jpg', 'clindamicina', 9),
(39, '5ef059938ba799aaa845e1c2e8a762bd.jpg', 'imipenem', 10),
(42, 'f899139df5e1059396431415e770c6dd.jpg', 'levofloxacina', 12),
(47, '7e7757b1e12abcb736ab9a754ffb617a.jpg', 'meropenem 1', 18),
(50, '9dcb88e0137649590b755372b040afad.jpg', 'omeprazol', 20),
(53, '149e9677a5989fd342ae44213df68868.jpg', 'remifentanilo', 22),
(54, '069059b7ef840f0c74a814ec9237b6ec.jpg', 'succinilcolina-500mg', 24),
(55, '4c56ff4ce4aaf9573aa5dff913df997a.jpg', 'aciclovir', 27),
(57, 'f0935e4cd5920aa6c7c996a5ee53a70f.jpg', 'ampicilina-sulba', 30),
(58, '47d1e990583c9c67424d369f3414728e.jpg', 'cefepime', 31),
(59, '76dc611d6ebaafc66cc0879c71b5db5c.jpg', 'ceftriaxona', 33),
(61, '5f93f983524def3dca464469d2cf9f3e.jpg', 'claritomicina', 34),
(63, '82aa4b0af34c2313a562076992e50aa3.jpg', 'clindamicina', 35),
(64, 'c9e1074f5b3f9fc8ea15d152add07294.jpg', 'imipenem', 36),
(65, 'c45147dee729311ef5b5c3003946c48f.jpg', 'ketorolac', 37),
(67, 'a0a080f42e6f13b3a2df133f073095dd.jpg', 'levofloxacina', 38),
(69, 'cfecdb276f634854f3ef915e2e980c31.jpg', 'meropenem-1g', 44),
(72, 'a597e50502f5ff68e3e25b9114205d4a.jpg', 'omeprazol 40', 46),
(74, '0e65972dce68dad4d52d063967f0a705.jpg', 'remifentanilo', 48),
(75, '96da2f590cd7246bbde0051047b0d6f7.jpg', 'succinilcolina-100mg', 49),
(76, 'fc221309746013ac554571fbd180e1c8.jpg', 'succinilcolina-500mg', 50),
(77, 'cfecdb276f634854f3ef915e2e980c31.jpg', 'vecuronio-10mg', 52),
(78, 'e00da03b685a0dd18fb6a08af0923de0.jpg', 'vecuronio-4mg', 51),
(79, '1c9ac0159c94d8d0cbedc973445af2da.jpg', 'vecuronio-10mg', 26),
(80, '3988c7f88ebcb58c6ce932b957b6f332.jpg', 'vecuronio-4mg', 25),
(82, '0aa1883c6411f7873cb83dacb17b0afc.jpg', 'succinilcolina-100mg', 23),
(83, '0f28b5d49b3020afeecd95b4009adf4c.jpg', 'aciclovir500', 1),
(85, '1afa34a7f984eeabdbb0a7d494132ee5.jpg', 'claritomicina 500', 8),
(87, '96da2f590cd7246bbde0051047b0d6f7.jpg', 'ketorolac 30', 11),
(88, 'c8ffe9a587b126f152ed3d89a146b445.jpg', 'meropenem 500', 17),
(89, '0777d5c17d4066b82ab86dff8a46af6f.jpg', 'meropenem 500', 43),
(91, '58a2fc6ed39fd083f55d4182bf88826d.jpg', 'Ampicilina 500', 28),
(92, '7ef605fc8dba5425d6965fbd4c8fbe1f.jpg', 'lidocaina-1-20', 14),
(93, '4c56ff4ce4aaf9573aa5dff913df997a.jpg', 'lidacaina-1-20', 40),
(94, 'd1f491a404d6854880943e5c3cd9ca25.jpg', 'lidacaina-1-5', 39),
(95, '4c5bde74a8f110656874902f07378009.jpg', 'lidocaina1-5', 13),
(96, '1d7f7abc18fcb43975065399b0d1e48e.jpg', 'lidocaina2-5', 15),
(97, '149e9677a5989fd342ae44213df68868.jpg', 'lidocaina-2-5', 41),
(100, '1afa34a7f984eeabdbb0a7d494132ee5.jpg', 'Ampicilina 1g', 29),
(101, 'a5e00132373a7031000fd987a3c9f87b.jpg', 'Cefepime 2g', 32),
(102, '6c4b761a28b734fe93831e3fb400ce87.jpg', 'Cefepime 2g', 6),
(103, 'a0a080f42e6f13b3a2df133f073095dd.jpg', 'Lidocaina 2-20', 16),
(105, '5fd0b37cd7dbbb00f97ba6ce92bf5add.jpg', 'Lidocaina 2-20', 42),
(108, '4c5bde74a8f110656874902f07378009.jpg', 'Metilprednisolona', 19),
(114, '06409663226af2f3114485aa4e0a23b4.jpg', 'Piperacilina+Tazobactam', 21),
(115, '0336dcbab05b9d5ad24f4333c7658a0e.jpg', 'Piperacilina+Tazobactam', 47),
(116, '82161242827b703e6acf9c726942a1e4.jpg', 'MIDAZOLAM', 53),
(117, '3644a684f98ea8fe223c713b77189a77.jpg', 'MIDAZOLAM', 54),
(118, '84d9ee44e457ddef7f2c4f25dc8fa865.jpg', 'solvente omepra', 20),
(119, '31fefc0e570cb3860f2a6d4b38c6490d.jpg', 'solvente omepra', 46),
(121, '698d51a19d8a121ce581499d7b701668.jpg', 'metil', 45),
(122, '0777d5c17d4066b82ab86dff8a46af6f.jpg', 'metil solvente', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active_principle` varchar(255) DEFAULT NULL,
  `presentation` varchar(255) DEFAULT NULL,
  `units_per_box` longtext,
  `pharmaceutical_form` varchar(255) DEFAULT NULL,
  `therapeutic_line` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `active_principle`, `presentation`, `units_per_box`, `pharmaceutical_form`, `therapeutic_line`, `link`, `language`) VALUES
(1, 'ACICLOVIR 500mg PHARMAVIAL', 'Aciclovir 500mg', '500mg F.A', '100', 'Liofilizado', 'Infectologia', '7f1de29e6da19d22b51c68001e7e0e54.pdf', 'es'),
(2, 'AMPICILINA 500mg PHARMAVIAL', 'Ampicilina sodica 500mg', '500mg F.A', '100', 'Polvo Esteril', 'Infectologia', 'a3c65c2974270fd093ee8a9bf8ae7d0b.pdf', 'es'),
(3, 'AMPICILINA 1g  PHARMAVIAL', 'Ampicilina sodica 1000mg', '1g F.A', '100', 'Polvo Esteril', 'Infectologia', '1afa34a7f984eeabdbb0a7d494132ee5.pdf', 'es'),
(4, 'AMPICILINA+SULBACTAM 1500mg PHARMAVIAL', 'Ampicilina 1000mg + Sulbactam 500mg', '1500mg F.A', '100', 'Polvo Esteril', 'Infectologia', '8f53295a73878494e9bc8dd6c3c7104f.pdf', 'es'),
(5, 'CEFEPIME 1g PHARMAVIAL', 'Cefepime (como clorhidrato) 1g', '1g F.A', '100', 'Polvo Esteril', 'Infectologia', '698d51a19d8a121ce581499d7b701668.pdf', 'es'),
(6, 'CEFEPIME 2g PHARMAVIAL', 'Cefepime (como clorhidrato) 2g', '2g F.A', '50', 'Polvo Esteril', 'Infectologia', '1385974ed5904a438616ff7bdb3f7439.pdf', 'es'),
(7, 'CEFTRIAXONA 1g PHARMAVIAL', 'Ceftriaxona 1000mg ', '1g F.A', '100', 'Polvo Esteril', 'Infectologia', 'bd4c9ab730f5513206b999ec0d90d1fb.pdf', 'es'),
(8, 'CLARITROMICINA 500mg PHARMAVIAL', 'Claritromicina 500mg', '500mg F.A', '50', 'Liofilizado', 'Infectologia', 'f7e6c85504ce6e82442c770f7c8606f0.pdf', 'es'),
(9, 'CLINDAMICINA 600mg PHARMAVIAL', 'Clindmicina fosfato 600mg', '600mg AMP', '100', 'Solucion liquida inyectable', 'Infectologia', '1ff8a7b5dc7a7d1f0ed65aaa29c04b1e.pdf', 'es'),
(10, 'IMIPENEM CILASTATINA 500mg PHARMAVIAL', 'Imipenem 500mg + Cilastatina 500mg ', '500mg F.A', '50', 'Polvo Esteril', 'Infectologia', '65b9eea6e1cc6bb9f0cd2a47751a186f.pdf', 'es'),
(11, 'KETOROLAC 30mg PHARMAVIAL', 'Ketorolaco Trometamina 30mg ', '30mg  AMP', '100', 'Solucion liquida inyectable', 'Terapia General', '76dc611d6ebaafc66cc0879c71b5db5c.pdf', 'es'),
(12, 'LEVOFLOXACINA 500mg PHARMAVIAL', 'Levofloxacina 500mg', '500mg F.A', '50', 'Solucion liquida inyectable', 'Infectologia', '0aa1883c6411f7873cb83dacb17b0afc.pdf', 'es'),
(13, 'LIDOCAINA 1% 5ml PHARMAVIAL', 'Lidocaina Clorhidrato 50mg / 5ml', '1% 5ml AMP', '100', 'Solucion liquida inyectable', 'Anestesiologia', 'da4fb5c6e93e74d3df8527599fa62642.pdf', 'es'),
(14, 'LIDOCAINA 1% 20ml PHARMAVIAL', 'Lidocaina Clorhidrato 200mg / 20ml', '1% 20ml F.A', '50', 'Solucion liquida inyectable', 'Anestesiologia', '9dcb88e0137649590b755372b040afad.pdf', 'es'),
(15, 'LIDOCAINA 2% 5ml PHARMAVIAL', 'Lidocaina Clorhidrato 100mg / 5ml', '2% 5ml AMP', '100', 'Solucion liquida inyectable', 'Anestesiologia', '6974ce5ac660610b44d9b9fed0ff9548.pdf', 'es'),
(16, 'LIDOCAINA 2% 20ml PHARMAVIAL', 'Lidocaina Clorhidrato 400mg / 20ml', '2% 20ml F.A', '50', 'Solucion liquida inyectable', 'Anestesiologia', 'eb160de1de89d9058fcb0b968dbbbd68.pdf', 'es'),
(17, 'MEROPENEM 500mg PHARMAVIAL', 'Meropenem (como trihidrato) 0,5g', '500mg F.A', '50', 'Polvo Esteril', 'Infectologia', 'f899139df5e1059396431415e770c6dd.pdf', 'es'),
(18, 'MEROPENEM 1g PHARMAVIAL', 'Meropenem (como trihidrato) 1g', '1g F.A', '50', 'Polvo Esteril', 'Infectologia', '202cb962ac59075b964b07152d234b70.pdf', 'es'),
(19, 'METILPREDNISOLONA 500mg PHARMAVIAL', 'Metilprednisolona 500mg / 8ml ( Amp. de svte. x 8ml)', '500mg F.A (Con Svte.)', '100', 'Liofilizado', 'Terapia General', '7f1de29e6da19d22b51c68001e7e0e54.pdf', 'es'),
(20, 'OMEPRAZOL 40mg PHARMAVIAL', 'Omeprazol 40mg / 10ml (Amp. de svte. x 10ml)', '40mg F.A (Con Svte.)', '100', 'Liofilizado', 'Terapia General', '7f6ffaa6bb0b408017b62254211691b5.pdf', 'es'),
(21, 'PIPERACILINA+TAZOBACTAM  4,5g PHARMAVIAL', 'Tazobactam (como sal sodica) 0,5g + Piperacilina (como piperacilina sodica) 4g', '4,5g F.A', '50', 'Polvo Esteril', 'Infectologia', '0e65972dce68dad4d52d063967f0a705.pdf', 'es'),
(22, 'REMIFENTANILO 5mg PHARMAVIAL', 'Remifentanilo (como clorhidrato) 5mg', '5mg F.A', '25', 'Liofilizado', 'Anestesiologia', '1c9ac0159c94d8d0cbedc973445af2da.pdf', 'es'),
(23, 'SUCCINILCOLINA 100mg PHARMAVIAL', 'Succinilcolina cloruro 100mg', '100mg F.A', '100', 'Liofilizado', 'Anestesiologia', 'e00da03b685a0dd18fb6a08af0923de0.pdf', 'es'),
(24, 'SUCCINILCOLINA 500mg PHARMAVIAL', 'Succinilcolina cloruro 500mg', '500mg F.A', '100', 'Liofilizado', 'Anestesiologia', '1ff8a7b5dc7a7d1f0ed65aaa29c04b1e.pdf', 'es'),
(25, 'VECURONIO 4mg PHARMAVIAL', 'Bromuro de Vecuronio 4mg', '4mg F.A', '25', 'Liofilizado', 'Anestesiologia', '2a79ea27c279e471f4d180b08d62b00a.pdf', 'es'),
(26, 'VECURONIO 10mg PHARMAVIAL', 'Bromuro de Vecuronio 10mg', '10mg F.A', '25', 'Liofilizado', 'Anestesiologia', 'a3c65c2974270fd093ee8a9bf8ae7d0b.pdf', 'es'),
(27, 'ACICLOVIR 500mg PHARMAVIAL', 'Aciclovir 500mg', '500mg F.A', '100', 'Liofilizado', 'Infectologia', '1ff8a7b5dc7a7d1f0ed65aaa29c04b1e.pdf', 'en'),
(28, 'AMPICILINA 500mg PHARMAVIAL', 'Ampicilina sodica 500mg', '500mg F.A', '100', 'Polvo Esteril', 'Infectologia', 'cedebb6e872f539bef8c3f919874e9d7.pdf', 'en'),
(29, 'AMPICILINA 1g  PHARMAVIAL', 'Ampicilina sodica 1000mg', '1g F.A', '100', 'Polvo Esteril', 'Infectologia', '38af86134b65d0f10fe33d30dd76442e.pdf', 'en'),
(30, 'AMPICILINA+SULBACTAM 1500mg PHARMAVIAL', 'Ampicilina 1000mg + Sulbactam 500mg', '1500mg F.A', '100', 'Polvo Esteril', 'Infectologia', 'c9e1074f5b3f9fc8ea15d152add07294.pdf', 'en'),
(31, 'CEFEPIME 1g PHARMAVIAL', 'Cefepime (como clorhidrato) 1g', '1g F.A', '100', 'Polvo Esteril', 'Infectologia', '0aa1883c6411f7873cb83dacb17b0afc.pdf', 'en'),
(32, 'CEFEPIME 2g PHARMAVIAL', 'Cefepime (como clorhidrato) 2g', '2g F.A', '50', 'Polvo Esteril', 'Infectologia', '02522a2b2726fb0a03bb19f2d8d9524d.pdf', 'en'),
(33, 'CEFTRIAXONA 1g PHARMAVIAL', 'Ceftriaxona 1000mg ', '1g F.A', '100', 'Polvo Esteril', 'Infectologia', '1d7f7abc18fcb43975065399b0d1e48e.pdf', 'en'),
(34, 'CLARITROMICINA 500mg PHARMAVIAL', 'Claritromicina 500mg', '500mg F.A', '50', 'Liofilizado', 'Infectologia', '82aa4b0af34c2313a562076992e50aa3.pdf', 'en'),
(35, 'CLINDAMICINA 600mg PHARMAVIAL', 'Clindmicina fosfato 600mg', '600mg AMP', '100', 'Solucion liquida inyectable', 'Infectologia', '045117b0e0a11a242b9765e79cbf113f.pdf', 'en'),
(36, 'IMIPENEM CILASTATINA 500mg PHARMAVIAL', 'Imipenem 500mg + Cilastatina 500mg ', '500mg F.A', '50', 'Polvo Esteril', 'Infectologia', 'b3e3e393c77e35a4a3f3cbd1e429b5dc.pdf', 'en'),
(37, 'KETOROLAC 30mg PHARMAVIAL', 'Ketorolaco Trometamina 30mg ', '30mg  AMP', '100', 'Solucion liquida inyectable', 'Terapia General', '045117b0e0a11a242b9765e79cbf113f.pdf', 'en'),
(38, 'LEVOFLOXACINA 500mg PHARMAVIAL', 'Levofloxacina 500mg', '500mg F.A', '50', 'Solucion liquida inyectable', 'Infectologia', '9b8619251a19057cff70779273e95aa6.pdf', 'en'),
(39, 'LIDOCAINA 1% 5ml PHARMAVIAL', 'Lidocaina Clorhidrato 50mg / 5ml', '1% 5ml AMP', '100', 'Solucion liquida inyectable', 'Anestesiologia', '9dcb88e0137649590b755372b040afad.pdf', 'en'),
(40, 'LIDOCAINA 1% 20ml PHARMAVIAL', 'Lidocaina Clorhidrato 200mg / 20ml', '1% 20ml F.A', '50', 'Solucion liquida inyectable', 'Anestesiologia', '6c4b761a28b734fe93831e3fb400ce87.pdf', 'en'),
(41, 'LIDOCAINA 2% 5ml PHARMAVIAL', 'Lidocaina Clorhidrato 100mg / 5ml', '2% 5ml AMP', '100', 'Solucion liquida inyectable', 'Anestesiologia', 'a8baa56554f96369ab93e4f3bb068c22.pdf', 'en'),
(42, 'LIDOCAINA 2% 20ml PHARMAVIAL', 'Lidocaina Clorhidrato 400mg / 20ml', '2% 20ml F.A', '50', 'Solucion liquida inyectable', 'Anestesiologia', '9fc3d7152ba9336a670e36d0ed79bc43.pdf', 'en'),
(43, 'MEROPENEM 500mg PHARMAVIAL', 'Meropenem (como trihidrato) 0,5g', '500mg F.A', '50', 'Polvo Esteril', 'Infectologia', '5f93f983524def3dca464469d2cf9f3e.pdf', 'en'),
(44, 'MEROPENEM 1g PHARMAVIAL', 'Meropenem (como trihidrato) 1g', '1g F.A', '50', 'Polvo Esteril', 'Infectologia', '045117b0e0a11a242b9765e79cbf113f.pdf', 'en'),
(45, 'METILPREDNISOLONA 500mg PHARMAVIAL', 'Metilprednisolona 500mg / 8ml ( Amp. de svte. x 8ml)', '500mg F.A (Con Svte.)', '100', 'Liofilizado', 'Terapia General', '38b3eff8baf56627478ec76a704e9b52.pdf', 'en'),
(46, 'OMEPRAZOL 40mg PHARMAVIAL', 'Omeprazol 40mg / 10ml (Amp. de svte. x 10ml)', '40mg F.A (Con Svte.)', '100', 'Liofilizado', 'Terapia General', '084b6fbb10729ed4da8c3d3f5a3ae7c9.pdf', 'en'),
(47, 'PIPERACILINA+TAZOBACTAM  4,5g PHARMAVIAL', 'Tazobactam (como sal sodica) 0,5g + Piperacilina (como piperacilina sodica) 4g', '4,5g F.A', '50', 'Polvo Esteril', 'Infectologia', 'a2557a7b2e94197ff767970b67041697.pdf', 'en'),
(48, 'REMIFENTANILO 5mg PHARMAVIAL', 'Remifentanilo (como clorhidrato) 5mg', '5mg F.A', '25', 'Liofilizado', 'Anestesiologia', 'f899139df5e1059396431415e770c6dd.pdf', 'en'),
(49, 'SUCCINILCOLINA 100mg PHARMAVIAL', 'Succinilcolina cloruro 100mg', '100mg F.A', '100', 'Liofilizado', 'Anestesiologia', 'eb160de1de89d9058fcb0b968dbbbd68.pdf', 'en'),
(50, 'SUCCINILCOLINA 500mg PHARMAVIAL', 'Succinilcolina cloruro 500mg', '500mg F.A', '100', 'Liofilizado', 'Anestesiologia', '1d7f7abc18fcb43975065399b0d1e48e.pdf', 'en'),
(51, 'VECURONIO 4mg PHARMAVIAL', 'Bromuro de Vecuronio 4mg', '4mg F.A', '25', 'Liofilizado', 'Anestesiologia', '96da2f590cd7246bbde0051047b0d6f7.pdf', 'en'),
(52, 'VECURONIO 10mg PHARMAVIAL', 'Bromuro de Vecuronio 10mg', '10mg F.A', '25', 'Liofilizado', 'Anestesiologia', '2b24d495052a8ce66358eb576b8912c8.pdf', 'en'),
(53, 'MIDAZOLAM 15mg', 'MIDAZOLAM 15mg', '15mg AMP', '100', 'Solucion liquida inyectable', 'Anestesiologia', '', 'es'),
(54, 'MIDAZOLAM 15mg', 'Midazolam 15mg', '15mg AMP', '100', 'Solucion liquida inyectable', 'Anestesiologia', '', 'en');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(191) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `pass`) VALUES
(1, 'pharmavial', 'admin@laboratorioibc.com.ar', '72a77221fe558124440ee1ddbc524643');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
