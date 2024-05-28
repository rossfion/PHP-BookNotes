-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 09:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booknotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(3) UNSIGNED NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `date_added`) VALUES
(1, 'Thomas Cleary', '0000-00-00 00:00:00'),
(2, 'Jean Shinoda Bolen', '0000-00-00 00:00:00'),
(3, 'Vance Packard', '0000-00-00 00:00:00'),
(4, 'José Silva and Philip Miele', '0000-00-00 00:00:00'),
(5, 'Niccolo Machiavelli', '0000-00-00 00:00:00'),
(6, 'Emile Coué & C.H. Brooks', '0000-00-00 00:00:00'),
(7, 'Anatole France', '0000-00-00 00:00:00'),
(8, 'Napoleon Hill', '0000-00-00 00:00:00'),
(9, 'Dale Carnegie', '0000-00-00 00:00:00'),
(10, 'William Irwin Thompson', '0000-00-00 00:00:00'),
(11, 'Masaru Emoto', '0000-00-00 00:00:00'),
(12, 'George S. Clason', '0000-00-00 00:00:00'),
(13, 'Clyde W. Ford', '0000-00-00 00:00:00'),
(14, 'John Kehoe', '0000-00-00 00:00:00'),
(15, 'Paul Zane Pilzer', '0000-00-00 00:00:00'),
(16, 'Barbara Thiering', '0000-00-00 00:00:00'),
(17, 'Jeff A. Benner', '0000-00-00 00:00:00'),
(18, 'Master Lam Kam Chuen', '0000-00-00 00:00:00'),
(19, 'Daniel Reid', '0000-00-00 00:00:00'),
(20, 'Mark Cohen', '0000-00-00 00:00:00'),
(21, 'Esther and Jerry Hicks', '0000-00-00 00:00:00'),
(22, 'June Singer', '0000-00-00 00:00:00'),
(23, 'Stephen Hoeller', '0000-00-00 00:00:00'),
(24, 'Hans Jonas', '0000-00-00 00:00:00'),
(25, 'Kevin Yank', '0000-00-00 00:00:00'),
(26, 'Chogyam Trungpa', '0000-00-00 00:00:00'),
(27, 'Edwin A. Abbott', '0000-00-00 00:00:00'),
(28, 'Joyce Farrell', '0000-00-00 00:00:00'),
(29, 'Patrick McNeil', '0000-00-00 00:00:00'),
(30, 'Elaine Pagels', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(3) UNSIGNED NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_subtitle` text DEFAULT NULL,
  `book_edition` varchar(5) DEFAULT NULL,
  `author_id` int(3) NOT NULL,
  `publisher_id` int(3) DEFAULT NULL,
  `category_id` int(3) DEFAULT NULL,
  `publication_year` int(3) DEFAULT NULL,
  `book_isbn` text NOT NULL,
  `book_url` varchar(255) DEFAULT NULL,
  `book_cover_image` varchar(255) NOT NULL,
  `date_read` date NOT NULL,
  `book_notes` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_subtitle`, `book_edition`, `author_id`, `publisher_id`, `category_id`, `publication_year`, `book_isbn`, `book_url`, `book_cover_image`, `date_read`, `book_notes`, `date_added`) VALUES
(3, 'Build Your Own Database Driven Web Site Using PHP ', 'Learning PHP & MySQL Has Never Been So Easy!', '4', 25, 8, 1, 2009, '2147483647', 'https://openlibrary.org/isbn/9780980576818', 'https://covers.openlibrary.org/b/isbn/9780980576818.jpg', '2024-05-08', 'This is a good PHP book. Features a jokes project.', '2024-05-11 22:37:06'),
(4, 'Goddesses in Everywoman', 'Powerful Archetypes in Womens Lives', '20th ', 2, 13, 1, 2004, '2147483647', 'https://openlibrary.org/isbn/9780060572846', 'https://covers.openlibrary.org/b/isbn/9780060572846.jpg', '0000-00-00', 'Vel eligendi sint culpa. Et sed explicabo omnis deleniti. Laboriosam minima consequatur tenetur quia aut voluptates.\r\nEst quaerat enim eos commodi vero. Velit adipisci temporibus atque ut quo nostrum. Consequatur culpa omnis dolor minima deleniti.', '2024-05-11 22:51:02'),
(5, 'Shambhala', 'The Sacred Path of the Warrior', '', 26, 13, 3, 1984, '1590300416', 'https://openlibrary.org/isbn/1590300416', 'https://covers.openlibrary.org/b/isbn/1590300416.jpg', '0000-00-00', 'Vel eligendi sint culpa. Et sed explicabo omnis deleniti. Laboriosam minima consequatur tenetur quia aut voluptates.\r\n\r\nEst quaerat enim eos commodi vero. Velit adipisci temporibus atque ut quo nostrum. Consequatur culpa omnis dolor minima deleniti.\r\n\r\nAperiam autem consectetur iusto sunt. Minus et molestiae ducimus sunt. Laudantium sint debitis est. Itaque rerum dolor veritatis dolores repellendus eos ratione eveniet. Ut in ratione quas distinctio neque aperiam impedit.', '2024-05-11 22:41:37'),
(6, 'Flatland', 'A Romance of Many Dimensions', '', 27, 9, 12, 1984, '451522907', 'https://openlibrary.org/isbn/0451522907', 'https://covers.openlibrary.org/b/isbn/0451522907.jpg', '0000-00-00', 'When I first ventured towards getting a Masters degree in Interactive Multimedia in the UK, this book was recommended reading at the University of Westminster, London. I bought it. However, I never managed to finish it. Many years later, I came across another mention of it by the late A.R. Bordon of the now defunct(?) Life Physics Group-California (LPG-C).', '2024-05-11 22:42:00'),
(7, 'Java Programming', '', '4', 28, 2, 1, 2008, '2147483647', NULL, 'https://covers.openlibrary.org/b/isbn/9781432901280.jpg', '0000-00-00', 'I am currently working my way through this book for learning Java.', '2024-05-11 22:43:38'),
(8, 'The Web Designer\'s Handbook Volume 3', 'Inspiration from todays best web design trends, themes, and styles', '3', 11, 2, 1, 2013, '2147483647', 'https://openlibrary.org/isbn/9781440323966\r\n', 'https://covers.openlibrary.org/b/isbn/9781440323966.jpg', '0000-00-00', 'This is more of a resource book when I need ideas for good web design. Many years ago, in my second lecturing position in the UK, I learnt to my utter embarrassment, that I did not have good design skills. While I am now very grateful for frameworks such as Bootstrap and Trongate, I continue to work  on core fundamentals in this area.', '2024-05-11 22:44:17'),
(9, 'The Inner Teachings of Taoism', '', '', 1, 13, 11, 1986, '2147483647', 'https://openlibrary.org/isbn/9781570627101\r\n', 'https://covers.openlibrary.org/b/isbn/9781570627101.jpg', '0000-00-00', 'Thomas Cleary is the translator of this work. The author is actually Chang Po-Tuan. This text is a distilled version of the classic Understanding Reality by the same author. ', '2024-05-11 22:44:36'),
(10, 'The Gnostic Paul', 'Gnostic Exegesis of the Pauline Letters', '', 30, 10, 5, 1992, '2147483647', 'https://openlibrary.org/isbn/9781563380396\r\n', 'https://covers.openlibrary.org/b/isbn/9781563380396.jpg', '0000-00-00', 'Vel eligendi sint culpa. Et sed explicabo omnis deleniti. Laboriosam minima consequatur tenetur quia aut voluptates.\r\n\r\nEst quaerat enim eos commodi vero. Velit adipisci temporibus atque ut quo nostrum. Consequatur culpa omnis dolor minima deleniti.\r\n\r\nAperiam autem consectetur iusto sunt. Minus et molestiae ducimus sunt. Laudantium sint debitis est. Itaque rerum dolor veritatis dolores repellendus eos ratione eveniet. Ut in ratione quas distinctio neque aperiam impedit.', '2024-05-11 22:44:52'),
(11, 'The Silva Mind Control Method', '', '', 4, 16, 2, 1978, '671452843', 'https://openlibrary.org/isbn/0671452843\r\n', 'https://covers.openlibrary.org/b/isbn/0671452843.jpg', '0000-00-00', 'Sed quaerat quo magnam aspernatur numquam. Mollitia non mollitia eaque dolores a occaecati suscipit. Officiis veritatis sequi ut provident et magnam. Ab architecto dolor fugiat reiciendis repellat rerum. Nulla quis rerum tenetur.', '2024-05-11 22:45:10'),
(14, 'The Hidden Messages in Water', '', '', 11, 19, 14, 2004, '1582701148', 'https://openlibrary.org/isbn/1582701148\r\n', 'https://covers.openlibrary.org/b/isbn/1582701148.jpg', '0000-00-00', 'I heard about this book from an instructor on the Silva Life System course. The images are quite stunning.', '2024-05-11 22:45:49'),
(15, 'Think and Grow Rich', '', '', 8, 20, 2, 1983, '449214923', 'https://openlibrary.org/isbn/0449214923\r\n', 'https://covers.openlibrary.org/b/isbn/0449214923.jpg', '0000-00-00', 'Eos quis quo ea. Aspernatur ipsum neque recusandae dolores inventore accusantium neque suscipit. A voluptas sunt hic odio omnis et magnam consequatur. Hic exercitationem quia autem et maxime autem in. Eum et id unde consequatur qui ipsam. Vitae molestias vitae quia.', '2024-05-11 22:46:01'),
(17, 'Better and Better Every Day', 'Self Mastery Through Conscious Auto-Suggestion/The Practice of Auto-Suggestion by the Method of Emile Coué', '', 6, 22, 2, 1961, '0', NULL, '', '0000-00-00', 'Eos quis quo ea. Aspernatur ipsum neque recusandae dolores inventore accusantium neque suscipit. A voluptas sunt hic odio omnis et magnam consequatur. Hic exercitationem quia autem et maxime autem in. Eum et id unde consequatur qui ipsam. Vitae molestias vitae quia.', '2024-05-11 19:33:36'),
(18, 'How To Win Friends and Influence People', '', '', 9, 16, 2, 1982, '2147483647', NULL, '', '0000-00-00', 'Aperiam autem consectetur iusto sunt. Minus et molestiae ducimus sunt. Laudantium sint debitis est. Itaque rerum dolor veritatis dolores repellendus eos ratione eveniet. Ut in ratione quas distinctio neque aperiam impedit.', '2024-05-11 19:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `date_added`) VALUES
(1, 'Computer Technology', '0000-00-00 00:00:00'),
(2, 'Self-Help/Psychology', '0000-00-00 00:00:00'),
(3, 'Philosophy', '0000-00-00 00:00:00'),
(4, 'Non-Fiction', '0000-00-00 00:00:00'),
(5, 'Religion', '0000-00-00 00:00:00'),
(6, 'Art', '0000-00-00 00:00:00'),
(7, 'History', '0000-00-00 00:00:00'),
(8, 'Economics', '0000-00-00 00:00:00'),
(9, 'English Literature', '0000-00-00 00:00:00'),
(10, 'American Literature', '0000-00-00 00:00:00'),
(11, 'Taoism', '0000-00-00 00:00:00'),
(12, 'Satire/Humor', '0000-00-00 00:00:00'),
(13, 'Sociology & Anthropology', '0000-00-00 00:00:00'),
(14, 'Science/Health', '0000-00-00 00:00:00'),
(15, 'Reference', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(3) UNSIGNED NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `publisher_name`, `date_added`) VALUES
(1, 'Addison-Wesley', '0000-00-00 00:00:00'),
(2, 'Thomson Course Technology', '0000-00-00 00:00:00'),
(3, 'Apress', '0000-00-00 00:00:00'),
(4, 'Packt Publishing', '0000-00-00 00:00:00'),
(5, 'Farrar, Straus and Giroux', '0000-00-00 00:00:00'),
(6, 'YMAA Publication Center', '0000-00-00 00:00:00'),
(7, 'Chritsian Fellowship Publishers, Inc', '0000-00-00 00:00:00'),
(8, 'Sams Publishing', '0000-00-00 00:00:00'),
(9, 'Signet Classic', '0000-00-00 00:00:00'),
(10, 'Trinity Press International', '0000-00-00 00:00:00'),
(11, 'HOW Books', '0000-00-00 00:00:00'),
(12, 'Michael Wiese Productions', '0000-00-00 00:00:00'),
(13, 'Shamballa Publications, Inc', '0000-00-00 00:00:00'),
(14, 'Harper & Row', '0000-00-00 00:00:00'),
(15, 'sitepoint', '0000-00-00 00:00:00'),
(16, 'Pocket Books', '0000-00-00 00:00:00'),
(17, 'Penguin Books', '0000-00-00 00:00:00'),
(18, 'Bantam Books', '0000-00-00 00:00:00'),
(19, 'Beyond Words Publishing', '0000-00-00 00:00:00'),
(20, 'Ballantine Books', '0000-00-00 00:00:00'),
(21, 'Dover Publications, Inc', '0000-00-00 00:00:00'),
(22, 'Unwin Books', '0000-00-00 00:00:00'),
(23, 'St. Martins Press', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
