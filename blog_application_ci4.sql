-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 06:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_application_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Prince', 'Kanoujiya', 'pkediting513@gmail.com', '$2y$10$vFPG23U3RWaonsfKl7Vpxu99sPB82INTbyuygQr02FsmFYwv38f8.', '2025-05-15 21:12:19', '2025-05-15 21:12:19'),
(4, 'Ravi', ' Gupta', 'pkk227212@gmail.com', '$2y$10$LXBMCeRv5IZ8wHwBd0qqOuHma2O34zLMbNzSkh2G88hsU38.Ou1D2', '2025-05-16 10:18:29', '2025-05-16 10:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_content` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `author_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `short_content`, `content`, `author_name`, `category`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(4, 'The Power of Sports: More Than Just a Game', '1747366571_eab93ea3a6521d8a5a5c.png', 'Sports have been an integral part of human culture for centuries, serving not only as a source of entertainment but also as a catalyst for personal growth, community building, and global unity. Whether you’re a casual spectator or a dedicated athlete, sports impact our lives in numerous positive ways.', 'The Power of Sports: More Than Just a Game\r\nSports have been an integral part of human culture for centuries, serving not only as a source of entertainment but also as a catalyst for personal growth, community building, and global unity. Whether you’re a casual spectator or a dedicated athlete, sports impact our lives in numerous positive ways.\r\n\r\nPhysical and Mental Health Benefits\r\nEngaging in sports helps improve physical fitness by boosting cardiovascular health, enhancing muscle strength, and increasing flexibility. Beyond the physical advantages, sports also promote mental well-being. Regular physical activity is linked to reduced stress levels, improved mood, and better sleep quality.\r\n\r\nBuilding Discipline and Teamwork\r\nSports teach important life skills like discipline, time management, and perseverance. Athletes learn to set goals, push their limits, and bounce back from setbacks. Team sports, in particular, foster collaboration, communication, and leadership, skills that translate well into professional and personal settings.\r\n\r\nBringing Communities Together\r\nSports have a unique ability to unite people across different backgrounds and cultures. Local matches, national leagues, and international tournaments become occasions where communities gather, celebrate, and share collective pride. This shared passion can bridge social divides and promote inclusiveness.\r\n\r\nInspiring Future Generations\r\nSports heroes often serve as role models who inspire young people to pursue their dreams. Stories of determination, resilience, and triumph resonate beyond the playing field and encourage kids to stay active and believe in their potential.\r\n\r\nThe Global Impact of Sports\r\nOn a global scale, sports foster diplomacy and mutual respect. Events like the Olympics and FIFA World Cup create opportunities for cultural exchange and peaceful competition. They remind us that despite differences, we all share a love for excellence and fair play.\r\n\r\n', '3', '4', 'A', 'BS', '2025-05-16 03:36:11', NULL),
(5, 'Natwar Singh writes on champion of the downtrodden Dr BR Ambedkar', '1747369276_b4365788c78f9b1cda68.avif', 'A refreshing account of the enduring dedication of a man who strove to awaken the social conscience of India.', 'The author of the book \'Ambedkar\', is a member of The Planning Commission, an establishment totally or almost totally lacking creativity, innovation or imagination. Professor Jadhav is a distinguished exception. He studied in the United States, obtaining PhD in Economics. The last worthwhile book on Ambedkar was written by Dr. Dhananjay Keer. It was published in 1954. Dr. B.R. Ambedkar was arguably among the most brilliant Indian intellectuals of the 20th century. His life is a triumph of character over circumstances.', '3', '5', 'AB', 'CDG', '2025-05-16 04:21:16', NULL),
(6, 'Understanding Politics: Why It Matters to Everyone', '1747371113_67a6e5cbf90fc743b6c7.png', 'Politics often gets a bad reputation for being complicated, divisive, or even frustrating. But at its core, politics is about how we organize society, make decisions, and work together to solve common problems. Understanding politics is essential because it affects nearly every aspect of our daily lives — from the roads we drive on, to the education we receive, and the rights we enjoy.', 'Understanding Politics: Why It Matters to Everyone\r\nPolitics often gets a bad reputation for being complicated, divisive, or even frustrating. But at its core, politics is about how we organize society, make decisions, and work together to solve common problems. Understanding politics is essential because it affects nearly every aspect of our daily lives — from the roads we drive on, to the education we receive, and the rights we enjoy.\r\n\r\nWhat Is Politics?\r\nPolitics is the process through which groups of people make collective decisions. It involves the creation and enforcement of laws, policies, and regulations that guide how a community, city, country, or even the world functions. Politics also includes the activities of political parties, leaders, and citizens who advocate for their interests and values.\r\n\r\nWhy Should You Care?\r\nEven if you don’t follow every news headline, political decisions impact your life in significant ways:\r\n\r\nEconomy: Policies on taxes, jobs, and business affect your financial well-being.\r\n\r\nHealthcare: Government funding and regulations determine the quality and availability of medical services.\r\n\r\nEducation: Decisions about schools shape the future of children and communities.\r\n\r\nCivil Rights: Politics influence laws about equality, freedom, and justice.\r\n\r\nEnvironment: Climate and resource policies affect the planet we live on.\r\n\r\nHow Can You Get Involved?\r\nYou don’t have to be a politician to engage in politics. Simple actions like voting, staying informed, attending community meetings, or speaking up on issues you care about make a difference. Democracy thrives when citizens participate actively and responsibly.\r\n\r\nThe Importance of Respectful Dialogue\r\nPolitical discussions can be passionate, but respectful dialogue is key to finding common ground. Listening to diverse perspectives helps build understanding and promotes healthier communities.\r\n\r\nPolitics in a Changing World\r\nIn today’s fast-paced, interconnected world, politics faces new challenges like globalization, technology, and social movements. Staying informed and adaptable is vital to ensuring that politics continues to serve the people effectively.\r\n\r\nPolitics shapes our world — whether we notice it or not. By understanding and participating, we can help build a fairer, more just society for everyone.\r\n\r\n', '4', '6', 'Politics', 'Polictics', '2025-05-16 04:51:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `user_id`, `created_at`) VALUES
(4, 'Sports', 3, '2025-05-16 03:23:48'),
(5, 'News', 3, '2025-05-16 03:23:54'),
(6, 'Politicssss', 3, '2025-05-16 03:24:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
