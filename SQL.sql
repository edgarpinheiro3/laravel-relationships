--
-- Database: `relationships-laravel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastros`
--

CREATE TABLE `cadastros` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cadastros`
--

INSERT INTO `cadastros` (`id`, `nome`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Edgar', 'edgarpinheiro3@gmail.com', '2017-03-25 21:43:15', '2017-03-25 21:43:15'),
(2, 'Larissa', 'larissapinheiro3@gmail.com', '2017-03-25 22:17:09', '2017-03-25 22:17:09'),
(3, 'Adelmar', 'adelmar@oi.com.br', '2017-03-25 22:39:47', '2017-03-25 22:39:47'),
(4, 'Paulo', 'paulorogeriojp@gmail.com', '2017-03-25 22:41:35', '2017-03-25 22:41:35'),
(5, 'Joselio', 'jjzelio@gmail.com', '2017-03-25 22:45:01', '2017-03-25 22:45:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Guarulhos', NULL, NULL),
(2, 2, 'Osasco', NULL, NULL),
(3, 10, 'João Pessoa', NULL, NULL),
(4, 10, 'Campina Grande', NULL, '2017-03-30 14:15:07'),
(5, 10, 'Patos', NULL, NULL),
(6, 10, 'Sousa', '2017-03-26 00:58:05', '2017-03-26 00:58:05'),
(7, 10, 'Queimadas', '2017-03-26 01:01:49', '2017-03-26 01:01:49'),
(8, 10, 'Santa Luzia', '2017-03-26 01:11:07', '2017-03-26 01:11:07'),
(9, 10, 'Cajazeiras', '2017-03-29 13:34:06', '2017-03-29 13:34:06'),
(10, 10, 'Pilões', '2017-03-29 13:55:37', '2017-03-30 14:01:20'),
(12, 7, 'Xixi', '2017-04-01 17:39:27', '2017-04-01 17:39:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`id`, `description`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 'New comment1 Guarulhos20170320114311', 1, 'App\\Models\\City', '2017-03-20 14:43:11', '2017-03-20 14:43:11'),
(2, 'New comment2 Guarulhos20170320155628', 1, 'App\\Models\\City', '2017-03-20 18:56:28', '2017-03-20 18:56:28'),
(3, 'New comment1 Tocantins20170320160758', 5, 'App\\Models\\State', '2017-03-20 19:07:58', '2017-03-20 19:07:58'),
(4, 'New comment1 Brasil20170320162238', 1, 'App\\Models\\Country', '2017-03-20 19:22:38', '2017-03-20 19:22:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Especializati', NULL, NULL),
(2, 'New Company', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `company_city`
--

CREATE TABLE `company_city` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `company_city`
--

INSERT INTO `company_city` (`id`, `city_id`, `company_id`) VALUES
(2, 2, 2),
(3, 1, 2),
(8, 3, 1),
(9, 4, 1),
(10, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Brasil', NULL, NULL),
(2, 'China', NULL, NULL),
(3, 'Alemanha', '2017-03-19 21:07:17', '2017-03-19 21:07:17'),
(4, 'Belgica', '2017-03-19 21:08:09', '2017-03-19 21:08:09'),
(5, 'França', '2017-03-19 21:13:33', '2017-03-19 21:13:33'),
(6, 'Argentina', NULL, NULL),
(7, 'Colombia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `locations`
--

INSERT INTO `locations` (`id`, `country_id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, 123, 321, NULL, NULL),
(2, 2, 456, 654, NULL, NULL),
(3, 3, 890, 98, '2017-03-19 21:07:17', '2017-03-19 21:07:17'),
(4, 4, 78, 87, '2017-03-19 21:08:09', '2017-03-19 21:08:09'),
(6, 5, 43, 34, '2017-03-19 21:17:24', '2017-03-19 21:17:24'),
(7, 6, 1235, 5321, '2017-04-01 19:44:05', '2017-04-01 19:44:05'),
(9, 7, 981, 189, '2017-04-01 19:47:43', '2017-04-01 19:47:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_19_162713_create_countries_table', 1),
('2017_03_19_163002_create_locations_table', 1),
('2017_03_19_183242_create_states_table', 2),
('2017_03_19_183253_create_cities_table', 2),
('2017_03_20_101416_create_comments_table', 3),
('2017_03_20_174443_create_companies_table', 4),
('2017_03_20_174636_create_company_city_table', 4),
('2017_03_25_182758_create_cadastros_table', 5),
('2017_04_16_100811_create_produtos_table', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cod` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `cod`, `created_at`, `updated_at`) VALUES
(3, 'cabide', 890, NULL, NULL),
(4, 'Update 2', 4567, NULL, '2017-04-16 17:53:02'),
(6, 'Insert New Prod', 1231, '2017-04-16 17:31:40', '2017-04-16 17:31:40'),
(7, 'New Prod 9', 897, '2017-04-16 17:44:35', '2017-04-16 17:44:35'),
(8, 'escova', 123, '2017-04-17 01:11:08', '2017-04-17 01:11:08'),
(9, 'New Prod Form', 635, '2017-04-17 01:16:41', '2017-04-17 01:16:41'),
(11, 'Roteador', 3454, '2017-04-18 19:24:09', '2017-04-18 19:24:09'),
(12, 'Desodorante', 678, '2017-04-18 20:16:28', '2017-04-18 20:16:28'),
(13, 'Prod teste', 413241, '2017-04-18 21:02:16', '2017-04-18 21:02:16'),
(14, 'Prod teste 5', 857682, '2017-04-18 21:04:11', '2017-04-18 21:04:11'),
(15, 'fadsfads', 12356, '2017-04-18 21:09:11', '2017-04-18 21:09:11'),
(16, 'teste', 4294, '2017-04-18 21:21:35', '2017-04-18 21:23:07'),
(17, 'Teste2', 7656, '2017-04-18 21:23:13', '2017-04-18 21:23:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `initials` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `initials`, `created_at`, `updated_at`) VALUES
(1, 1, 'Goiás', 'GO', NULL, NULL),
(2, 1, 'São Paulo', 'SP', NULL, NULL),
(3, 1, 'Rio de Janeiro', 'RJ', NULL, NULL),
(4, 1, 'Minas Gerais', 'MG', NULL, NULL),
(5, 1, 'Tocantins', 'TO', NULL, NULL),
(6, 2, 'Pequim', 'Pe', NULL, NULL),
(7, 2, 'Xangai', 'XA', NULL, NULL),
(8, 1, 'Ceará', 'CE', '2017-03-20 12:31:00', '2017-03-20 12:31:00'),
(9, 1, 'Bahia', 'BA', '2017-03-20 12:32:08', '2017-03-20 12:32:08'),
(10, 1, 'Paraíba', 'PB', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastros`
--
ALTER TABLE `cadastros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commentable_id_commentable_type_index` (`commentable_id`,`commentable_type`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_city`
--
ALTER TABLE `company_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_city_city_id_foreign` (`city_id`),
  ADD KEY `company_city_company_id_foreign` (`company_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_country_id_foreign` (`country_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastros`
--
ALTER TABLE `cadastros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company_city`
--
ALTER TABLE `company_city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `company_city`
--
ALTER TABLE `company_city`
  ADD CONSTRAINT `company_city_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_city_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;