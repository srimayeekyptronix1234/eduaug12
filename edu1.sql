-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 12:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu1`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignvehicle`
--

CREATE TABLE `assignvehicle` (
  `id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignvehicle`
--

INSERT INTO `assignvehicle` (`id`, `route_id`, `vehicle_id`) VALUES
(10, 10, 12),
(12, 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `assign_routes`
--

CREATE TABLE `assign_routes` (
  `id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_routes`
--

INSERT INTO `assign_routes` (`id`, `route_id`, `user_id`, `role`) VALUES
(13, 10, 34, 'student'),
(14, 10, 44, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `behaviour`
--

CREATE TABLE `behaviour` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `mark_obtained` decimal(5,2) DEFAULT 0.00,
  `comment` text DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `behaviour`
--

INSERT INTO `behaviour` (`id`, `student_id`, `subject_id`, `class_id`, `section_id`, `exam_id`, `mark_obtained`, `comment`, `session`, `school_id`) VALUES
(1, 9, 1, 1, 1, 3, 60.00, '', '1', 1),
(2, 10, 1, 1, 1, 3, 0.00, NULL, '1', 1),
(3, 11, 1, 1, 1, 3, 0.00, NULL, '1', 1),
(4, 12, 1, 1, 1, 3, 0.00, NULL, '1', 1),
(5, 13, 1, 1, 1, 3, 0.00, NULL, '1', 1),
(6, 9, 1, 1, 1, 1, 50.00, '', '1', 1),
(7, 10, 1, 1, 1, 1, 80.00, '', '1', 1),
(8, 11, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(9, 12, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(10, 13, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(11, 15, 4, 2, 2, 2, 0.00, NULL, '1', 1),
(12, 16, 4, 2, 2, 2, 0.00, NULL, '1', 1),
(13, 9, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(14, 10, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(15, 11, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(16, 12, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(17, 13, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(18, 15, 4, 2, 2, 4, 0.00, NULL, '1', 1),
(19, 16, 4, 2, 2, 4, 0.00, NULL, '1', 1),
(20, 17, 8, 3, 3, 3, 0.00, NULL, '1', 1),
(21, 9, 1, 1, 1, 4, 50.00, '', '1', 1),
(22, 10, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(23, 11, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(24, 12, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(25, 13, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(26, 14, 1, 1, 12, 1, 0.00, NULL, '1', 1),
(27, 16, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(28, 17, 1, 1, 1, 1, 0.00, NULL, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `copies` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_issues`
--

CREATE TABLE `book_issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `issue_date` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_list`
--

CREATE TABLE `candidate_list` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(255) DEFAULT NULL,
  `candidate_email` varchar(255) DEFAULT NULL,
  `candidate_phone` varchar(255) DEFAULT NULL,
  `position_applied_for` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `interview_date` varchar(255) DEFAULT NULL,
  `interview_time` varchar(255) DEFAULT NULL,
  `interview_time_am_pm` varchar(100) DEFAULT NULL,
  `interview_location` varchar(255) DEFAULT NULL,
  `interviewer_name` varchar(255) DEFAULT NULL,
  `interview_type` varchar(255) DEFAULT NULL,
  `interview_mode` varchar(255) DEFAULT NULL,
  `instruction_of_candidate` text DEFAULT NULL,
  `document_to_bring` text DEFAULT NULL,
  `interview_link` text DEFAULT NULL,
  `interview_status` enum('scheduled','rescheduled','completed','canceled') NOT NULL DEFAULT 'scheduled',
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=> Active 2=> Deleted',
  `hr_comments` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate_list`
--

INSERT INTO `candidate_list` (`id`, `candidate_name`, `candidate_email`, `candidate_phone`, `position_applied_for`, `department`, `gender`, `resume`, `interview_date`, `interview_time`, `interview_time_am_pm`, `interview_location`, `interviewer_name`, `interview_type`, `interview_mode`, `instruction_of_candidate`, `document_to_bring`, `interview_link`, `interview_status`, `status`, `hr_comments`, `created_at`) VALUES
(2, 'Sana', 'sana@gmail.com', '700373145', '1', '3', 'Female', NULL, '08/13/2024', '03:00', 'PM', '....', NULL, 'Virtual', 'One-on-One', 'notes', '....', '...........', 'scheduled', '1', NULL, '2024-08-12 18:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `timestamp` int(11) NOT NULL DEFAULT 0,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ath551ml5p4n4jl1dv9laum8p39jak80', '::1', 1723535545, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333533353534353b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('h8hjiab56hft648i9rnqjci2q0n4aj1o', '::1', 1723535365, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333533353334373b757365725f6c6f67696e5f747970657c623a313b75736572735f6c6f67696e7c623a313b757365725f69647c733a323a223431223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a393a224a796f7469726d6f79223b757365725f747970657c733a363a22757365727373223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226e6577223b7d),
('nou5ggga05ees717nfpmrodgf5u9h0b7', '::1', 1723538412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333533383431323b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('hfq9dpg5egj8bicicacgbjh1elgd53o5', '::1', 1723538438, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333533383433383b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b68725f6c6f67696e7c623a313b757365725f69647c733a323a223433223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a393a224a796f7469726d6f79223b757365725f747970657c733a323a226872223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('unf4snjgunl9u4f83ca0318j0b7h8mtg', '::1', 1723538937, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333533383933373b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('mela4gfh2ge39p7vupa2m216pub5if6i', '::1', 1723539342, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333533393334323b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('8ah6er37tlec1fsn06kaueiq8famnl8u', '::1', 1723539335, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333533393333353b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('hec9kh4it42i9ehja6m93s2ue3bmhqdi', '::1', 1723539649, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333533393634393b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('dv8lam83v3benuus0k7i0emana143g1p', '::1', 1723539342, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333533393334323b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('vol7b3np70armck7k76b1a6n4cntost3', '::1', 1723540070, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534303037303b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('ouhindtjnikb981ild5h7luspmnd5v21', '::1', 1723540477, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534303437373b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('3655rsnfejoajqkcolni9jcf0t2daseu', '::1', 1723541174, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534313137343b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('8t8coeko2kfacd1eeh15ls261p7tr7ig', '::1', 1723540946, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534303933343b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223339223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a323a224a4f223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('vm1h0i46dlrsgct14pjj35bfdpl3pjin', '::1', 1723542486, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534323438363b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('e7oh3j0cuj786v522qkq32krkq7uhggi', '::1', 1723541325, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534313331353b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('inimk4svrh2nn22j7pf1nrhetnuurj6o', '::1', 1723541707, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534313637343b6572726f725f6d6573736167657c733a33303a22496e76616c696420796f757220656d61696c206f722070617373776f7264223b5f5f63695f766172737c613a323a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b),
('middsv7eoj6o94sorbabol004cand6f1', '::1', 1723542152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534323135323b6572726f725f6d6573736167657c733a33303a22496e76616c696420796f757220656d61696c206f722070617373776f7264223b5f5f63695f766172737c613a323a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b),
('uq5n1cdma6emgp1tpk75u1ouvv0k1vhs', '::1', 1723542490, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534323439303b6572726f725f6d6573736167657c733a33303a22496e76616c696420796f757220656d61696c206f722070617373776f7264223b5f5f63695f766172737c613a323a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b),
('ctv250enkd3sl12r1589pg2cmcrtt8s9', '::1', 1723543254, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534333235343b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('2eliub55hnuakcma5s6v5410hlf0ncka', '::1', 1723543170, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534333137303b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('0sotiq5m9qp2daaqc6fgfovjlahrl8ir', '::1', 1723543572, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534333537323b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('9uvbho6roliivfj800kn8nh8k11ahl1g', '::1', 1723543722, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534333732323b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('o1h276s6d6d06vo0gjnbv2rce50i1a7a', '::1', 1723544779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534343737393b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('dhvm9dnnpb5c6umlios2584mu1aulfaf', '::1', 1723544099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534343039393b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('8ufrn2a48hrerv4p5a06grah2j1qg63o', '::1', 1723544420, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534343432303b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('ngtnd60ducobiqs44ukod87d8ujs7jh4', '::1', 1723544850, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534343835303b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('f4vqu6uht9cd5sg2746q420j3pdc2dk2', '::1', 1723545047, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534343737393b6163746976655f7363686f6f6c5f69647c733a313a2231223b757365725f6c6f67696e5f747970657c623a313b61646d696e5f6c6f67696e7c623a313b757365725f69647c733a313a2232223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a31333a225379656420416d697220416c69223b757365725f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('18ir4vstfc30i4gciouhefq0d3g9hke4', '::1', 1723545374, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534353337343b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('0gldkckahth6u7m021k368s1r3216v6c', '::1', 1723545596, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732333534353337343b757365725f6c6f67696e5f747970657c623a313b6472697665725f6c6f67696e7c623a313b757365725f69647c733a323a223430223b7363686f6f6c5f69647c733a313a2231223b757365725f6e616d657c733a363a226d616e697368223b757365725f747970657c733a363a22647269766572223b666c6173685f6d6573736167657c733a31323a2257656c636f6d65206261636b223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `school_id`) VALUES
(1, 'Class 1', 1),
(2, 'Class 2', 1),
(3, 'Class 3', 1),
(4, 'Class 4', 1),
(5, 'Class 5', 1),
(6, 'Class 6', 1),
(7, 'Class 7', 1),
(9, 'Class 9', 1),
(10, 'Class 10', 1),
(11, 'class 11', 1),
(12, 'Class 12', 1),
(14, 'Class 8', 1),
(15, 'ten', 1),
(16, 'v', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classwork`
--

CREATE TABLE `classwork` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `mark_obtained` decimal(5,2) DEFAULT 0.00,
  `comment` text DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classwork`
--

INSERT INTO `classwork` (`id`, `student_id`, `subject_id`, `class_id`, `section_id`, `exam_id`, `mark_obtained`, `comment`, `session`, `school_id`) VALUES
(1, 9, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(2, 10, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(3, 11, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(4, 12, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(5, 13, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(6, 15, 4, 2, 2, 4, 90.00, '', '1', 1),
(7, 16, 4, 2, 2, 4, 0.00, NULL, '1', 1),
(8, 15, 4, 2, 2, 2, 0.00, NULL, '1', 1),
(9, 16, 4, 2, 2, 2, 0.00, NULL, '1', 1),
(10, 9, 1, 1, 1, 1, 50.00, '', '1', 1),
(11, 10, 1, 1, 1, 1, 70.00, '', '1', 1),
(12, 11, 1, 1, 1, 1, 90.00, '', '1', 1),
(13, 12, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(14, 13, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(15, 15, 4, 2, 2, 3, 0.00, NULL, '1', 1),
(16, 16, 4, 2, 2, 3, 0.00, NULL, '1', 1),
(17, 14, 1, 1, 12, 1, 0.00, NULL, '1', 1),
(18, 15, 4, 2, 2, 1, 0.00, NULL, '1', 1),
(19, 16, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(20, 17, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(21, 9, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(22, 10, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(23, 11, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(24, 12, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(25, 13, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(26, 16, 1, 1, 1, 2, 0.00, NULL, '1', 1),
(27, 17, 1, 1, 1, 2, 0.00, NULL, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_rooms`
--

INSERT INTO `class_rooms` (`id`, `name`, `school_id`) VALUES
(1, 'Room 101', 1),
(2, 'Room 102', 1),
(3, 'Room 103', 1),
(4, 'Room 104', 1),
(5, 'Room 105', 1),
(6, 'Room 106', 1),
(7, 'room 201', 1),
(8, 'Room 203', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `complaint_by` varchar(50) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_desc` varchar(255) NOT NULL,
  `complaint_type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `class_id`, `section_id`, `student_id`, `teacher_id`, `complaint_by`, `complaint_date`, `complaint_desc`, `complaint_type`, `status`) VALUES
(16, 2, 2, 4, 9, 'demo', '2024-07-29', 'desc', 2, 1),
(17, 1, 1, 37, 9, 'Students', '2024-08-06', 'Best Student Of The Year', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daily_attendances`
--

CREATE TABLE `daily_attendances` (
  `id` int(11) NOT NULL,
  `timestamp` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daily_attendances`
--

INSERT INTO `daily_attendances` (`id`, `timestamp`, `class_id`, `section_id`, `student_id`, `status`, `session_id`, `school_id`) VALUES
(1, '1716228000', 1, 1, 1, 1, '1', 1),
(2, '1716228000', 1, 1, 2, 1, '1', 1),
(3, '1716228000', 1, 1, 3, 1, '1', 1),
(4, '1716400800', 1, 1, 1, 0, '1', 1),
(5, '1716400800', 1, 1, 2, 0, '1', 1),
(6, '1716400800', 1, 1, 3, 1, '1', 1),
(7, '1716400800', 1, 1, 4, 1, '1', 1),
(8, '1716400800', 1, 1, 5, 1, '1', 1),
(9, '1720029600', 1, 1, 9, 1, '1', 1),
(10, '1720029600', 1, 1, 10, 0, '1', 1),
(11, '1720029600', 1, 1, 11, 1, '1', 1),
(12, '1720029600', 1, 1, 12, 0, '1', 1),
(13, '1720029600', 1, 1, 13, 1, '1', 1),
(14, '1721066400', 1, 1, 9, 1, '1', 1),
(15, '1721066400', 1, 1, 10, 1, '1', 1),
(16, '1721066400', 1, 1, 11, 1, '1', 1),
(17, '1721066400', 1, 1, 12, 1, '1', 1),
(18, '1721066400', 1, 1, 13, 1, '1', 1),
(19, '1721152800', 1, 1, 9, 1, '1', 1),
(20, '1721152800', 1, 1, 10, 1, '1', 1),
(21, '1721152800', 1, 1, 11, 1, '1', 1),
(22, '1721152800', 1, 1, 12, 1, '1', 1),
(23, '1721152800', 1, 1, 13, 0, '1', 1),
(24, '1720980000', 1, 1, 9, 0, '1', 1),
(25, '1720980000', 1, 1, 10, 1, '1', 1),
(26, '1720980000', 1, 1, 11, 1, '1', 1),
(27, '1720980000', 1, 1, 12, 1, '1', 1),
(28, '1720980000', 1, 1, 13, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `school_id`) VALUES
(1, 'Maths', 1),
(2, 'Science', 1),
(3, 'SST', 1),
(4, 'history', 1),
(5, 'chemistry', 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `route_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `email`, `password`, `route_id`, `vehicle_id`) VALUES
(39, 'JO', 'jo123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 9, 12),
(40, 'manish', 'manish@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `enrols`
--

CREATE TABLE `enrols` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `enrols`
--

INSERT INTO `enrols` (`id`, `student_id`, `class_id`, `section_id`, `school_id`, `session`) VALUES
(1, 1, 2, 2, 1, '2'),
(2, 2, 2, 2, 1, '2'),
(3, 3, 1, 1, 1, '2'),
(4, 4, 1, 1, 1, '2'),
(5, 5, 2, 2, 1, '2'),
(6, 6, 12, 18, 1, '1'),
(7, 7, 2, 2, 1, '2'),
(8, 8, 2, 2, 1, '2'),
(9, 9, 1, 1, 1, '1'),
(10, 10, 1, 1, 1, '1'),
(11, 11, 1, 1, 1, '1'),
(12, 12, 1, 1, 1, '1'),
(13, 13, 1, 1, 1, '1'),
(14, 14, 1, 12, 1, '1'),
(15, 15, 2, 2, 1, '1'),
(16, 16, 1, 1, 1, '1'),
(17, 17, 1, 1, 1, '1'),
(18, 18, 5, 5, 1, '1'),
(19, 19, 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `event_calendars`
--

CREATE TABLE `event_calendars` (
  `id` int(11) NOT NULL,
  `title` longtext DEFAULT NULL,
  `starting_date` varchar(255) DEFAULT NULL,
  `ending_date` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_calendars`
--

INSERT INTO `event_calendars` (`id`, `title`, `starting_date`, `ending_date`, `school_id`, `session`) VALUES
(1, 'Annual Sports', '05/21/2024 00:00:1', '05/31/2024 23:59:59', 1, 1),
(2, 'Unit Test 1', '07/01/2024 00:00:1', '07/31/2024 23:59:59', 1, 1),
(3, 'Half Yearly Exam', '06/01/2024 00:00:1', '06/20/2024 23:59:59', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `starting_date` varchar(255) DEFAULT NULL,
  `ending_date` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `starting_date`, `ending_date`, `school_id`, `session`) VALUES
(1, 'Quarter 1', '1727719200', '1735581600', 1, '1'),
(2, 'Quarter 2', '1711908000', '1719684000', 1, '1'),
(3, 'Quarter 3', '1719770400', '1727632800', 1, '1'),
(4, 'Quarter 4', '1704045600', '1711821600', 1, '1'),
(5, 'New test Exam201', '1722362400', '1725645600', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `expense_category_id` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT '',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_events`
--

CREATE TABLE `frontend_events` (
  `frontend_events_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `timestamp` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-inactive, 1-active',
  `school_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_gallery`
--

CREATE TABLE `frontend_gallery` (
  `frontend_gallery_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `show_on_website` int(11) NOT NULL DEFAULT 0 COMMENT '0-no 1-yes',
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_gallery_image`
--

CREATE TABLE `frontend_gallery_image` (
  `frontend_gallery_image_id` int(11) NOT NULL,
  `frontend_gallery_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

CREATE TABLE `frontend_settings` (
  `id` int(11) NOT NULL,
  `about_us` longtext DEFAULT NULL,
  `terms_conditions` longtext DEFAULT NULL,
  `privacy_policy` longtext DEFAULT NULL,
  `social_links` longtext DEFAULT NULL,
  `copyright_text` longtext DEFAULT NULL,
  `about_us_image` longtext DEFAULT NULL,
  `slider_images` longtext DEFAULT NULL,
  `theme` longtext DEFAULT NULL,
  `homepage_note_title` longtext DEFAULT NULL,
  `homepage_note_description` longtext DEFAULT NULL,
  `website_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `about_us`, `terms_conditions`, `privacy_policy`, `social_links`, `copyright_text`, `about_us_image`, `slider_images`, `theme`, `homepage_note_title`, `homepage_note_description`, `website_title`) VALUES
(1, '&lt;h1&gt;About Our Schools&lt;/h1&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&amp;nbsp;&lt;span&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Our school historys&lt;/h3&gt;&lt;span&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Something interesting about our schools&lt;/h3&gt;&lt;span&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage&lt;br&gt;&lt;/span&gt;&lt;br&gt;&lt;ul&gt;&lt;li&gt;making this the first true generator&lt;/li&gt;&lt;li&gt;to generate Lorem Ipsum which&lt;/li&gt;&lt;li&gt;but the majority have suffered alteratio&lt;/li&gt;&lt;li&gt;is that it has a more-or-less&lt;/li&gt;&lt;/ul&gt;All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.&lt;br&gt;&lt;br&gt;&lt;br&gt;', '&lt;h1&gt;Terms of our school&lt;/h1&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&amp;nbsp;&lt;span&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Our school history&lt;/h3&gt;&lt;span&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Something interesting about our school&lt;/h3&gt;&lt;span&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage&lt;br&gt;&lt;/span&gt;&lt;br&gt;&lt;ul&gt;&lt;li&gt;making this the first true generator&lt;/li&gt;&lt;li&gt;to generate Lorem Ipsum which&lt;/li&gt;&lt;li&gt;but the majority have suffered alteratio&lt;/li&gt;&lt;li&gt;is that it has a more-or-less&lt;/li&gt;&lt;/ul&gt;All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.&lt;br&gt;&lt;br&gt;&lt;br&gt;', '&lt;h1&gt;Privacy policy of our school&lt;/h1&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&amp;nbsp;&lt;span&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Our school history&lt;/h3&gt;&lt;span&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Something interesting about our school&lt;/h3&gt;&lt;span&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage&lt;br&gt;&lt;/span&gt;&lt;br&gt;&lt;ul&gt;&lt;li&gt;making this the first true generator&lt;/li&gt;&lt;li&gt;to generate Lorem Ipsum which&lt;/li&gt;&lt;li&gt;but the majority have suffered alteratio&lt;/li&gt;&lt;li&gt;is that it has a more-or-less&lt;/li&gt;&lt;/ul&gt;All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.&lt;br&gt;&lt;br&gt;&lt;br&gt;', '[{\"facebook\":\"http:\\/\\/www.facebook.com\\/Eduquest \",\"twitter\":\"http:\\/\\/www.twitter.com\\/Eduquest \",\"linkedin\":\"http:\\/\\/www.linkedin.com\\/Eduquest \",\"google\":\"http:\\/\\/www.google.com\\/Eduquest \",\"youtube\":\"http:\\/\\/www.youtube.com\\/Eduquest \",\"instagram\":\"http:\\/\\/www.instagram.com\\/Eduquest \"}]', 'All the rights reserved to Creativeitem', NULL, '[{\"title\":\"Education is the most powerful weapon\",\"description\":\"&quot;You can use education to change the world&quot; - &lt;i&gt;Nelson Mandela&lt;\\/i&gt;\",\"image\":\"slider1.jpg\"},{\"title\":\"Knowledge is power\",\"description\":\"&quot;Education is the premise of progress, in every society, in every family&quot; - &lt;i&gt;Kofi Annan&lt;\\/i&gt;\",\"image\":\"2.jpg\"},{\"title\":\"Have an aim in life, continuously acquire knowledge\",\"description\":\"&quot;Never stop fighting until you arrive at your destined place&quot; - &lt;i&gt;A.P.J. Abdul Kalam&lt;\\/i&gt;\",\"image\":\"1.jpg\"}]', 'ultimate', 'Welcome to EduQuest School Management Software', 'Eduquest is a public secondary school in Bellevue, Washington. It serves students in grades 9–12 in the southern part of the Bellevue School District, including the neighborhoods of Eastgate, Factoria, Newport Hills, Newport Shores, Somerset, The Summit, and Sunset. As of the 2014-2015 school year, the principal is Dion Yahoudy. The mascot is the Knight, and the school colors are scarlet and gold.', 'Eduquest ');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `grade_point` varchar(255) DEFAULT NULL,
  `mark_from` varchar(255) DEFAULT NULL,
  `mark_upto` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
(7, 'A', '4', '90', '100', NULL, 1, '1', NULL, NULL),
(8, 'B', '3', '80', '89', NULL, 1, '1', NULL, NULL),
(9, 'C', '2', '60', '79', NULL, 1, '1', NULL, NULL),
(10, 'D', '1', '0', '59', NULL, 1, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `mark_obtained` decimal(5,2) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `student_id`, `subject_id`, `class_id`, `section_id`, `exam_id`, `mark_obtained`, `comment`, `session`, `school_id`) VALUES
(1, 9, 1, 1, 1, 1, 50.00, '', '1', 1),
(2, 10, 1, 1, 1, 1, 90.00, '', '1', 1),
(3, 11, 1, 1, 1, 1, NULL, NULL, '1', 1),
(4, 12, 1, 1, 1, 1, NULL, NULL, '1', 1),
(5, 13, 1, 1, 1, 1, NULL, NULL, '1', 1),
(6, 14, 1, 1, 12, 1, NULL, NULL, '1', 1),
(7, 16, 1, 1, 1, 1, NULL, NULL, '1', 1),
(8, 17, 1, 1, 1, 1, NULL, NULL, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `payment_method` longtext DEFAULT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `status` longtext DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL COMMENT 'This column is all about payment taking date'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `mark_obtained` int(11) DEFAULT 0,
  `comment` longtext DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `subject_id`, `class_id`, `section_id`, `exam_id`, `mark_obtained`, `comment`, `session`, `school_id`) VALUES
(1, 1, 1, 1, 1, 1, 75, 'good job', 1, 1),
(2, 2, 1, 1, 1, 1, 65, '', 1, 1),
(3, 3, 1, 1, 1, 1, 25, '', 1, 1),
(4, 4, 1, 1, 1, 1, 50, '', 1, 1),
(5, 5, 1, 1, 1, 1, 100, '', 1, 1),
(6, 1, 3, 1, 1, 1, 60, '', 1, 1),
(7, 2, 3, 1, 1, 1, 0, NULL, 1, 1),
(8, 3, 3, 1, 1, 1, 0, NULL, 1, 1),
(9, 4, 3, 1, 1, 1, 0, '', 1, 1),
(10, 5, 3, 1, 1, 1, 0, NULL, 1, 1),
(11, 1, 2, 1, 1, 1, 50, '', 1, 1),
(12, 2, 2, 1, 1, 1, 0, NULL, 1, 1),
(13, 3, 2, 1, 1, 1, 0, NULL, 1, 1),
(14, 4, 2, 1, 1, 1, 0, NULL, 1, 1),
(15, 5, 2, 1, 1, 1, 0, NULL, 1, 1),
(16, 1, 1, 1, 1, 2, 90, '', 1, 1),
(17, 2, 1, 1, 1, 2, 80, '', 1, 1),
(18, 3, 1, 1, 1, 2, 90, '', 1, 1),
(19, 4, 1, 1, 1, 2, 85, '', 1, 1),
(20, 5, 1, 1, 1, 2, 75, '', 1, 1),
(21, 2, 2, 1, 1, 3, 0, NULL, 1, 1),
(22, 3, 2, 1, 1, 3, 0, NULL, 1, 1),
(23, 4, 2, 1, 1, 3, 0, NULL, 1, 1),
(24, 5, 2, 1, 1, 3, 0, NULL, 1, 1),
(25, 2, 1, 1, 1, 3, 0, NULL, 1, 1),
(26, 3, 1, 1, 1, 3, 0, NULL, 1, 1),
(27, 4, 1, 1, 1, 3, 0, NULL, 1, 1),
(28, 5, 1, 1, 1, 3, 0, NULL, 1, 1),
(29, 3, 2, 1, 1, 4, 90, '', 1, 1),
(30, 4, 2, 1, 1, 4, 90, '', 1, 1),
(31, 5, 2, 1, 1, 4, 80, '', 1, 1),
(32, 3, 1, 1, 1, 4, 70, '', 1, 1),
(33, 4, 1, 1, 1, 4, 50, '', 1, 1),
(34, 5, 1, 1, 1, 4, 90, '', 1, 1),
(35, 1, 4, 2, 2, 1, 0, NULL, 1, 1),
(36, 2, 4, 2, 2, 1, 0, NULL, 1, 1),
(37, 3, 3, 1, 1, 4, 50, '', 1, 1),
(38, 4, 3, 1, 1, 4, 80, '', 1, 1),
(39, 5, 3, 1, 1, 4, 90, '', 1, 1),
(40, 3, 9, 1, 1, 4, 20, '', 1, 1),
(41, 4, 9, 1, 1, 4, 50, '', 1, 1),
(42, 5, 9, 1, 1, 4, 80, '', 1, 1),
(43, 3, 10, 1, 1, 4, 50, '', 1, 1),
(44, 4, 10, 1, 1, 4, 50, '', 1, 1),
(45, 5, 10, 1, 1, 4, 50, '', 1, 1),
(46, 3, 12, 1, 1, 4, 50, '', 1, 1),
(47, 4, 12, 1, 1, 4, 80, '', 1, 1),
(48, 5, 12, 1, 1, 4, 90, '', 1, 1),
(49, 3, 10, 1, 1, 1, 0, NULL, 1, 1),
(50, 4, 10, 1, 1, 1, 0, NULL, 1, 1),
(51, 5, 10, 1, 1, 1, 0, NULL, 1, 1),
(52, 7, 1, 1, 1, 4, 0, NULL, 1, 1),
(53, 7, 1, 1, 12, 4, 0, NULL, 1, 1),
(54, 1, 4, 2, 2, 4, 100, '', 1, 1),
(55, 2, 4, 2, 2, 4, 80, '', 1, 1),
(56, 1, 5, 2, 2, 4, 89, '', 1, 1),
(57, 2, 5, 2, 2, 4, 90, '', 1, 1),
(58, 1, 6, 2, 2, 4, 90, '', 1, 1),
(59, 2, 6, 2, 2, 4, 80, '', 1, 1),
(60, 1, 7, 2, 2, 4, 40, '', 1, 1),
(61, 2, 7, 2, 2, 4, 20, '', 1, 1),
(62, 1, 13, 2, 2, 4, 50, '', 1, 1),
(63, 2, 13, 2, 2, 4, 90, '', 1, 1),
(64, 1, 14, 2, 2, 4, 80, '', 1, 1),
(65, 2, 14, 2, 2, 4, 10, '', 1, 1),
(66, 3, 2, 1, 1, 2, 90, '', 1, 1),
(67, 4, 2, 1, 1, 2, 95, '', 1, 1),
(68, 5, 2, 1, 1, 2, 96, '', 1, 1),
(69, 3, 3, 1, 1, 2, 80, '', 1, 1),
(70, 4, 3, 1, 1, 2, 85, '', 1, 1),
(71, 5, 3, 1, 1, 2, 95, '', 1, 1),
(72, 3, 9, 1, 1, 2, 80, '', 1, 1),
(73, 4, 9, 1, 1, 2, 90, '', 1, 1),
(74, 5, 9, 1, 1, 2, 85, '', 1, 1),
(75, 3, 10, 1, 1, 2, 50, '', 1, 1),
(76, 4, 10, 1, 1, 2, 50, '', 1, 1),
(77, 5, 10, 1, 1, 2, 50, '', 1, 1),
(78, 3, 12, 1, 1, 2, 90, '', 1, 1),
(79, 4, 12, 1, 1, 2, 95, '', 1, 1),
(80, 5, 12, 1, 1, 2, 85, '', 1, 1),
(81, 3, 9, 1, 1, 1, 0, NULL, 1, 1),
(82, 4, 9, 1, 1, 1, 0, NULL, 1, 1),
(83, 5, 9, 1, 1, 1, 0, NULL, 1, 1),
(84, 8, 1, 1, 1, 1, 100, '', 1, 1),
(85, 9, 1, 1, 1, 1, 50, '', 1, 1),
(86, 10, 1, 1, 1, 1, 100, '', 1, 1),
(87, 11, 1, 1, 1, 1, 85, '', 1, 1),
(88, 12, 1, 1, 1, 1, 71, '', 1, 1),
(89, 13, 1, 1, 1, 1, 99, '', 1, 1),
(90, 9, 1, 1, 1, 4, 0, NULL, 1, 1),
(91, 10, 1, 1, 1, 4, 0, NULL, 1, 1),
(92, 11, 1, 1, 1, 4, 0, NULL, 1, 1),
(93, 12, 1, 1, 1, 4, 0, NULL, 1, 1),
(94, 13, 1, 1, 1, 4, 0, NULL, 1, 1),
(95, 9, 0, 1, 1, 0, 0, NULL, 1, 1),
(96, 10, 0, 1, 1, 0, 0, NULL, 1, 1),
(97, 11, 0, 1, 1, 0, 0, NULL, 1, 1),
(98, 12, 0, 1, 1, 0, 0, NULL, 1, 1),
(99, 13, 0, 1, 1, 0, 0, NULL, 1, 1),
(100, 14, 0, 1, 12, 0, 0, NULL, 1, 1),
(101, 9, 3, 1, 1, 1, 0, NULL, 1, 1),
(102, 10, 3, 1, 1, 1, 0, NULL, 1, 1),
(103, 11, 3, 1, 1, 1, 0, NULL, 1, 1),
(104, 12, 3, 1, 1, 1, 0, NULL, 1, 1),
(105, 13, 3, 1, 1, 1, 0, NULL, 1, 1),
(106, 9, 1, 1, 1, 3, 0, NULL, 1, 1),
(107, 10, 1, 1, 1, 3, 0, NULL, 1, 1),
(108, 11, 1, 1, 1, 3, 0, NULL, 1, 1),
(109, 12, 1, 1, 1, 3, 0, NULL, 1, 1),
(110, 13, 1, 1, 1, 3, 0, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `displayed_name` varchar(255) DEFAULT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `superadmin_access` int(11) NOT NULL DEFAULT 0,
  `admin_access` int(11) NOT NULL DEFAULT 0,
  `teacher_access` int(11) NOT NULL DEFAULT 0,
  `parent_access` int(11) NOT NULL DEFAULT 0,
  `student_access` int(11) NOT NULL DEFAULT 0,
  `accountant_access` int(11) NOT NULL DEFAULT 0,
  `librarian_access` int(11) NOT NULL DEFAULT 0,
  `hr_access` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL,
  `is_addon` int(11) NOT NULL DEFAULT 0 COMMENT 'If the value is 1 that means its an addon.',
  `unique_identifier` varchar(255) DEFAULT NULL COMMENT 'It is mandatory for addons',
  `driver_access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `displayed_name`, `route_name`, `parent`, `icon`, `status`, `superadmin_access`, `admin_access`, `teacher_access`, `parent_access`, `student_access`, `accountant_access`, `librarian_access`, `hr_access`, `sort_order`, `is_addon`, `unique_identifier`, `driver_access`) VALUES
(1, 'users', NULL, 0, 'dripicons-user', 1, 1, 1, 1, 1, 1, 0, 0, 0, 10, 0, 'users', 1),
(2, 'admin', 'admin', 1, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 9, 0, 'admin', 0),
(3, 'student', 'student', 1, NULL, 1, 1, 1, 1, 0, 0, 0, 0, 0, 10, 0, 'student', 0),
(4, 'teacher', 'teacher', 1, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 30, 0, 'teacher', 0),
(5, 'parent', 'parent', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 50, 0, 'parent', 0),
(6, 'librarian', 'librarian', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 70, 0, 'librarian', 0),
(7, 'accountant', 'accountant', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 60, 0, 'accountant', 0),
(9, 'academic', NULL, 0, 'dripicons-store', 1, 1, 1, 1, 1, 1, 0, 0, 0, 20, 0, 'academic', 0),
(10, 'class', 'manage_class', 9, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 40, 0, 'class', 0),
(11, 'section', NULL, 9, NULL, 0, 1, 1, 0, 0, 0, 0, 0, 0, 50, 0, 'section', 0),
(12, 'class_room', 'class_room', 9, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 60, 0, 'class-room', 0),
(13, 'syllabus', 'syllabus', 9, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 30, 0, 'syllabus', 0),
(14, 'subject', 'subject', 9, NULL, 1, 1, 1, 1, 0, 1, 0, 0, 0, 29, 0, 'subject', 0),
(15, 'class_routine', 'routine', 9, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 20, 0, 'class-routine', 0),
(16, 'daily_attendance', 'attendance', 9, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 10, 0, 'daily-attendance', 0),
(17, 'noticeboard', NULL, 9, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 110, 0, 'noticeboard', 0),
(18, 'promotion', 'promotion', 19, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 50, 0, 'promotion', 0),
(19, 'Written Exam', NULL, 0, 'dripicons-to-do', 1, 1, 1, 1, 1, 1, 0, 0, 0, 30, 0, 'exam', 0),
(20, 'exam', 'exam', 19, NULL, 1, 1, 1, 1, 0, 0, 0, 0, 0, 20, 0, 'exam', 0),
(21, 'grades', 'grade', 19, NULL, 1, 1, 1, 0, 1, 1, 0, 0, 0, 30, 0, 'grades', 0),
(22, 'marks', 'mark', 19, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 10, 0, 'marks', 0),
(23, 'tabulation_sheet', NULL, 19, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 40, 0, 'tabulation-sheet', 0),
(24, 'accounting', NULL, 0, 'dripicons-suitcase', 1, 1, 1, 0, 1, 1, 1, 0, 0, 40, 0, 'accounting', 0),
(25, 'student_fee_manager', 'invoice', 24, NULL, 1, 1, 1, 0, 1, 1, 1, 0, 0, 10, 0, 'student-fee-manager', 0),
(26, 'student_fee_report', NULL, 24, NULL, 0, 1, 0, 0, 0, 0, 1, 0, 0, 20, 0, 'student-fee-report', 0),
(27, 'expense_manager', 'expense', 24, NULL, 1, 1, 1, 0, 0, 0, 1, 0, 0, 40, 0, 'expense-manager', 0),
(31, 'extra_activities', NULL, 0, 'dripicons-store', 1, 1, 1, 1, 1, 1, 0, 0, 0, 60, 0, 'extraactivities', 0),
(32, 'school_website', NULL, 28, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'school-website', 0),
(33, 'settings', NULL, 0, 'dripicons-cutlery', 1, 1, 1, 0, 0, 0, 0, 0, 0, 70, 0, 'settings', 0),
(34, 'system_settings', 'system_settings', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 10, 0, 'system-settings', 0),
(36, 'payment_settings', 'payment_settings', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 20, 0, 'payment-settings', 0),
(37, 'language_settings', 'language', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 30, 0, 'language-settings', 0),
(38, 'session_manager', 'session_manager', 28, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'session-manager', 0),
(39, 'department', 'department', 9, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 70, 0, 'department', 0),
(40, 'admission', 'student/create', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 20, 0, 'admission', 0),
(41, 'addon_manager', 'addon_manager', 28, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'addon-manager', 0),
(43, 'event_calender', 'event_calendar', 9, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 100, 0, 'event-calender', 0),
(44, 'online_exam', NULL, 20, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 50, 0, 'online-exam', 0),
(45, 'certificate', NULL, 20, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 60, 0, 'certificate', 0),
(46, 'teacher_permission', 'permission', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 40, 0, 'teacher-permission', 0),
(47, 'messaging', NULL, 1, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 110, 0, 'messaging', 0),
(48, 'role_permission', 'role.index', 1, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 100, 0, 'role-permission', 0),
(49, 'form_builder', NULL, 32, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'form-builder', 0),
(50, 'book_list_manager', 'book', 29, NULL, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 'book-list-manager', 0),
(51, 'book_issue_report', 'book_issue', 29, NULL, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 'book-issue-report', 0),
(52, 'room_manager', NULL, 31, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'room-manager', 0),
(53, 'student_report', NULL, 31, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'student-report', 0),
(55, 'expense_category', 'expense_category', 24, NULL, 1, 1, 1, 0, 0, 0, 1, 0, 0, 30, 0, 'expense-category', 0),
(56, 'SMTP_settings', 'smtp_settings', 33, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 50, 0, 'smtp-settings', 0),
(57, 'school_settings', 'school_settings', 33, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 12, 0, 'school-settings', 0),
(58, 'about', 'about', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 51, 0, 'about', 0),
(60, 'Quarterly_Reportcard', 'reportcard', 19, NULL, 1, 1, 1, 1, 0, 0, 0, 0, 0, 20, 0, 'reportcard', 0),
(115, 'website_settings', 'website_settings', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 11, 0, 'website-settings', 0),
(116, 'noticeboard', 'noticeboard', 28, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'noticeboard', 0),
(118, 'homework', 'homework', 31, NULL, 1, 1, 1, 1, 0, 0, 0, 0, 0, 20, 0, 'homework', 0),
(119, 'Classwork', 'classwork', 31, NULL, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, NULL, 0),
(120, 'Project', 'project', 31, NULL, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, NULL, 0),
(121, 'Quiz', 'quiz', 31, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 'quiz', 0),
(122, 'online_exam_create', 'online_exam_create', 31, NULL, 1, 1, 1, 1, 0, 0, 0, 0, 0, 21, 0, 'online_exam_create', 0),
(123, 'Online Exam', 'student_online_exam', 31, NULL, 1, 0, 0, 0, 0, 1, 0, 0, 0, 21, 0, 'student_online_exam', 0),
(124, 'Behaviour', 'behaviours', 31, NULL, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, NULL, 0),
(125, 'Complaints/Actions', 'complaintsactions', 0, 'dripicons-copy', 1, 1, 1, 1, 1, 1, 0, 0, 0, 60, 0, 'complaintsactions', 0),
(126, 'Transport', 'transport', 0, 'dripicons-location', 1, 1, 1, 1, 1, 1, 0, 0, 0, 63, 0, 'transport', 1),
(127, 'Routes', 'routes', 126, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'routes', 1),
(128, 'Vehicle', 'vehicle', 126, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1),
(129, 'Assign Vehicle', 'assignvehicle', 126, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
(130, 'Assign Route', 'assignroutes', 126, NULL, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 'assignroute', 0),
(131, 'final report card', 'final_report_card', 0, 'dripicons-to-do', 1, 1, 1, 1, 1, 1, 0, 0, 0, 60, 0, 'final_report_card', 0),
(132, 'candidate list', 'candidate_list', 0, 'dripicons-to-do', 1, 1, 1, 0, 0, 0, 0, 0, 1, 60, 0, 'candidate_list', 0),
(133, 'Driver', 'driver', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 80, 0, 'driver', 1),
(134, 'Hr', 'users_list', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 90, 0, 'hr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `id` int(11) NOT NULL,
  `notice_title` longtext DEFAULT NULL,
  `notice` longtext DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `show_on_website` int(11) DEFAULT 0,
  `image` text DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_details`
--

CREATE TABLE `online_exam_details` (
  `id` int(11) NOT NULL,
  `online_exam_name` varchar(255) DEFAULT NULL,
  `quarter_id` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_start_date` date DEFAULT NULL,
  `exam_duration` varchar(100) DEFAULT NULL COMMENT 'exam duration in minutes',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1=> Active 0=>Inactive',
  `exam_start_time` varchar(100) DEFAULT NULL,
  `exam_start_am_pm` varchar(100) DEFAULT NULL,
  `exam_end_time` varchar(100) DEFAULT NULL,
  `exam_end_am_pm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_exam_details`
--

INSERT INTO `online_exam_details` (`id`, `online_exam_name`, `quarter_id`, `class_id`, `subject_id`, `exam_start_date`, `exam_duration`, `status`, `exam_start_time`, `exam_start_am_pm`, `exam_end_time`, `exam_end_am_pm`) VALUES
(9, 'unit test', 1, 1, 11, '2024-08-02', '510', '1', '12:30', 'PM', '09:00', 'PM'),
(10, 'unit test1', 1, 5, 5, '2024-08-02', '360', '1', '03:00', 'PM', '09:00', 'PM'),
(11, 'test', 1, 1, 3, '2024-08-02', '128', '1', '05:22', 'PM', '07:30', 'PM');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_result`
--

CREATE TABLE `online_exam_result` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `quarter_id` int(11) DEFAULT NULL,
  `exam_result` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `exam_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=> Pending\r\n2=> Complete',
  `total_marks_obtained` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_exam_result`
--

INSERT INTO `online_exam_result` (`id`, `student_id`, `class_id`, `subject_id`, `exam_id`, `quarter_id`, `exam_result`, `exam_status`, `total_marks_obtained`) VALUES
(1, 33, 0, 0, 11, 1, NULL, '1', 0),
(2, 33, 0, 0, 14, 1, '[\"Dog\",\"Ans one\",\"Earth\",\"Football\",\"Sam\",\"This is nothing.\"]', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `user_id`, `school_id`) VALUES
(1, 7, 1),
(2, 8, 1),
(3, 29, 1),
(4, 30, 1),
(5, 31, 1),
(6, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(500) DEFAULT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `key`, `value`) VALUES
(12, 'stripe_settings', '[{\"stripe_active\":\"yes\",\"stripe_mode\":\"on\",\"stripe_test_secret_key\":\"1234\",\"stripe_test_public_key\":\"1234\",\"stripe_live_secret_key\":\"1234\",\"stripe_live_public_key\":\"1234\",\"stripe_currency\":\"USD\"}]'),
(17, 'paypal_settings', '[{\"paypal_active\":\"yes\",\"paypal_mode\":\"sandbox\",\"paypal_client_id_sandbox\":\"1234\",\"paypal_client_id_production\":\"1234\",\"paypal_currency\":\"USD\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `position_applied_for`
--

CREATE TABLE `position_applied_for` (
  `id` int(11) NOT NULL,
  `position_name` varchar(255) DEFAULT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position_applied_for`
--

INSERT INTO `position_applied_for` (`id`, `position_name`, `status`, `created_at`) VALUES
(1, 'teachers', '1', '2024-08-07 17:36:59'),
(2, 'drivers', '1', '2024-08-07 17:36:59'),
(3, 'security', '1', '2024-08-07 17:37:18'),
(4, 'peon', '1', '2024-08-07 17:37:18'),
(5, 'care taker', '1', '2024-08-07 17:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `mark_obtained` decimal(5,2) DEFAULT 0.00,
  `comment` text DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `student_id`, `subject_id`, `class_id`, `section_id`, `exam_id`, `mark_obtained`, `comment`, `session`, `school_id`) VALUES
(1, 9, 1, 1, 1, 4, 50.00, '', '1', 1),
(2, 10, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(3, 11, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(4, 12, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(5, 13, 1, 1, 1, 4, 0.00, NULL, '1', 1),
(6, 15, 4, 2, 2, 4, 0.00, NULL, '1', 1),
(7, 16, 4, 2, 2, 4, 0.00, NULL, '1', 1),
(8, 9, 1, 1, 1, 1, 50.00, '', '1', 1),
(9, 10, 1, 1, 1, 1, 50.00, '', '1', 1),
(10, 11, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(11, 12, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(12, 13, 1, 1, 1, 1, 0.00, '', '1', 1),
(13, 14, 1, 1, 12, 1, 0.00, NULL, '1', 1),
(14, 16, 1, 1, 1, 1, 0.00, NULL, '1', 1),
(15, 17, 1, 1, 1, 1, 0.00, NULL, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `quarter_id` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `answers1` varchar(255) NOT NULL,
  `answers2` varchar(255) NOT NULL,
  `answers3` varchar(255) NOT NULL,
  `answers4` varchar(255) NOT NULL,
  `correct_answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `quarter_id`, `class_id`, `school_id`, `subject_id`, `questions`, `answers1`, `answers2`, `answers3`, `answers4`, `correct_answer`) VALUES
(3, '2', 3, 1, 6, 'demo questions', 'answers', '', '', '', NULL),
(4, '1', 1, 1, 13, 'Test question one', 'Dog', 'Cat', 'Spider', 'Rat', '4'),
(5, '1', 1, 1, 7, 'Science Question test?', 'Ans one', 'Ans two', 'Ans three', 'Ans four', '1'),
(6, '1', 1, 1, 9, 'Question sample for physics', 'Earth', 'Moon', 'Sun', 'Star', '3'),
(7, '1', 1, 1, 10, 'What is the best play?', 'Football', 'Cricket', 'Busket Ball', 'Hoki', '4'),
(8, '1', 1, 1, 2, 'What is your name?', 'Sam', 'Ram', 'Joy', 'Krishna', '2'),
(9, '1', 1, 1, 1, 'What is this?', 'This is nothing.', 'Yes there is something', 'there was no possible methods', 'Yes possible there might be someone', '4'),
(11, '1', 1, 1, 4, 'who is he?', 'amita', 'Sahila', 'Ahmeda', 'Rishia', '2'),
(12, '1', 1, 1, 1, '1+1', '2', '3', '8', '0', '1'),
(13, '1', 5, 1, 5, 'demo', 'ans1', 'ans2', 'ans3', 'ans4', '1'),
(14, '1', 5, 1, 5, 'demo ques', 'ans1', 'ans2', 'ans3', 'ans4', '2'),
(15, '1', 5, 1, 5, 'demo math ques', 'ans1', 'ans2', 'ans3', 'ans4', '3'),
(16, '1', 5, 1, 5, 'demo math ', 'ans1', 'ans2', 'ans3', 'ans4', '4'),
(17, '1', 5, 1, 1, 'demo', 'ans1', 'ans2', 'ans3', 'ans4', 'ans1'),
(18, '1', 5, 1, 1, 'demo ques', 'ans1', 'ans2', 'ans3', 'ans4', 'ans3'),
(19, '1', 1, 1, 3, 'What is the World Health Organization (WHO) criteria for leprosy elimination?', 'ans1', '1 case in 10,000 individuals', 'ans3', 'ans4', '2');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `route_title` varchar(255) NOT NULL,
  `route_fare` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `route_title`, `route_fare`) VALUES
(9, 'Solans', '501'),
(10, 'Palampurs', '100'),
(16, 'shimla', '522');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` int(11) NOT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `starting_hour` varchar(255) DEFAULT NULL,
  `ending_hour` varchar(255) DEFAULT NULL,
  `starting_minute` varchar(255) DEFAULT NULL,
  `ending_minute` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT '',
  `teacher_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `class_id`, `section_id`, `subject_id`, `starting_hour`, `ending_hour`, `starting_minute`, `ending_minute`, `day`, `teacher_id`, `room_id`, `school_id`, `session_id`) VALUES
(1, '1', '1', '1', '8', '9', '0', '10', 'monday', 1, 1, 1, '1'),
(2, '1', '1', '2', '9', '10', '15', '0', 'monday', 1, 1, 1, '1'),
(3, '1', '1', '3', '11', '12', '0', '30', 'monday', 1, 1, 1, '1'),
(4, '1', '1', '1', '8', '9', '0', '0', 'monday', 1, 1, 1, '1'),
(5, '1', '1', '1', '0', '1', '30', '10', 'saturday', 1, 1, 1, '1'),
(6, '2', '2', '6', '10', '11', '0', '0', 'monday', 1, 2, 1, '1'),
(7, '1', '1', '10', '16', '17', '0', '0', 'tuesday', 1, 8, 1, '1'),
(8, '12', '17', '11', '0', '1', '0', '0', 'sunday', 1, 3, 1, '1'),
(9, '2', '2', '5', '1', '3', '15', '15', 'tuesday', 1, 3, 1, '1'),
(10, '1', '12', '1', '13', '14', '0', '0', 'monday', 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `phone` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `address`, `phone`) VALUES
(1, 'EduQuest', 'School Address', '+123123123123');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `class_id`) VALUES
(1, 'A', 1),
(2, 'A', 2),
(3, 'A', 3),
(4, 'A', 4),
(5, 'A', 5),
(6, 'A', 6),
(7, 'A', 7),
(9, 'A', 9),
(10, 'A', 10),
(12, 'C', 1),
(13, 'D', 1),
(14, 'A', 11),
(15, 'B', 11),
(16, 'C', 11),
(17, 'A', 12),
(18, 'B', 12),
(19, 'C', 12),
(21, 'A', 14),
(22, 'A', 15),
(23, 'b', 15),
(24, 'A', 16);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `status`) VALUES
(1, '2024', 1),
(2, '2025', 1),
(3, '2026', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `system_name` varchar(255) DEFAULT NULL,
  `system_title` varchar(255) DEFAULT NULL,
  `system_email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `purchase_code` varchar(255) DEFAULT NULL,
  `system_currency` varchar(255) DEFAULT NULL,
  `currency_position` varchar(255) DEFAULT NULL,
  `running_session` varchar(255) DEFAULT '',
  `language` varchar(255) DEFAULT NULL,
  `student_email_verification` varchar(255) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `footer_link` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `date_of_last_updated_attendance` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `youtube_api_key` varchar(255) DEFAULT NULL,
  `vimeo_api_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `school_id`, `system_name`, `system_title`, `system_email`, `phone`, `address`, `purchase_code`, `system_currency`, `currency_position`, `running_session`, `language`, `student_email_verification`, `footer_text`, `footer_link`, `version`, `fax`, `date_of_last_updated_attendance`, `timezone`, `youtube_api_key`, `vimeo_api_key`) VALUES
(1, 1, 'EduQuest', 'Eduquest  School', 'info@eduquest.com', '+8801234567890', '4333 Factoria Blvd SE, Bellevue, WA 98006', 'XXXXXXXXXXXX', 'USD', 'left', '1', 'english', NULL, 'By Kyptronix', 'https://kyptronix.us/', '1.0', '1234567890', '1721159946', 'Asia/Dhaka', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` int(11) NOT NULL,
  `mail_sender` varchar(255) DEFAULT NULL,
  `smtp_protocol` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_username` varchar(255) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(255) DEFAULT NULL,
  `smtp_secure` varchar(255) DEFAULT NULL,
  `smtp_set_from` varchar(255) DEFAULT NULL,
  `smtp_debug` varchar(255) DEFAULT NULL,
  `smtp_show_error` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `code`, `user_id`, `parent_id`, `session`, `school_id`) VALUES
(1, '2024-7205-6418', 3, 1, 1, 1),
(2, '2024-3946-0781', 4, 1, 1, 1),
(3, '2024-8345-1267', 5, 2, 1, 1),
(4, '2024-9253-1874', 16, 0, 1, 1),
(5, '2024-7250-1694', 17, 1, 1, 1),
(6, '2024-2137-4590', 19, 0, 1, 1),
(7, '2024-9057-1483', 20, 1, 1, 1),
(8, '2024-6259-1374', 21, 0, 1, 1),
(9, '2024-1762-9450', 22, 0, 1, 1),
(10, '2024-3651-7804', 23, 0, 1, 1),
(11, '2024-3217-0984', 24, 0, 1, 1),
(12, '2024-0716-3524', 25, 0, 1, 1),
(13, '2024-7819-4056', 26, 0, 1, 1),
(14, '2024-6470-8125', 27, 1, 1, 1),
(15, '2024-9316-5402', 28, 2, 1, 1),
(16, '2024-0345-1976', 33, 5, 1, 1),
(17, '2024-7801-3462', 34, 2, 1, 1),
(18, '2024-2987-5164', 36, 2, 1, 1),
(19, '2024-3804-2169', 37, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_guardien_information`
--

CREATE TABLE `student_guardien_information` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `guardien_type` enum('father','mother') DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `national_id` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `class_id`, `school_id`, `session`) VALUES
(1, 'Jr Maths', 1, 1, 1),
(2, 'Pl Book', 1, 1, 1),
(3, 'Science', 1, 1, 1),
(4, 'Social Studies', 2, 1, 1),
(5, 'Mathematics', 2, 1, 1),
(6, 'Vedic Maths', 2, 1, 1),
(7, 'Science', 2, 1, 1),
(8, 'Science', 3, 1, 1),
(9, 'physics', 1, 1, 1),
(10, 'Sports', 1, 1, 1),
(11, 'Maths', 12, 1, 1),
(12, 'Art', 1, 1, 1),
(13, 'English', 2, 1, 1),
(14, 'Hindi', 2, 1, 1),
(15, 'math', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `syllabuses`
--

CREATE TABLE `syllabuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `syllabuses`
--

INSERT INTO `syllabuses` (`id`, `title`, `class_id`, `section_id`, `subject_id`, `file`, `session_id`, `school_id`) VALUES
(1, 'Unit Test 1 Syllabus', 1, 1, 1, '0993de9c587a8af53dbccc87b353f10c.pdf', 1, 1),
(2, 'Unit Test 1', 2, 2, 5, '39e720fad167ee1d6669d1bdc28be742.pdf', 1, 1),
(3, 'maths', 1, 1, 1, '66dcf8a92787b83a03f51fe8d6c693b1.pdf', 1, 1),
(4, 'maths', 1, 1, 1, 'd3c069d4257f8a54b45f645236d1160f.pdf', 1, 1),
(5, 'Physics', 1, 1, 9, '7c2af828e6c6856aa3fc184637da3588.pdf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `social_links` longtext DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `show_on_website` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `department_id`, `designation`, `school_id`, `social_links`, `about`, `show_on_website`) VALUES
(1, 12, 2, 'PGT', 1, '{\"facebook\":\"https:\\/\\/facebook.com\\/us\\/teacher23\",\"twitter\":\"https:\\/\\/twitter.com\\/us\\/teacher23\",\"linkedin\":\"https:\\/\\/linkedin.com\\/us\\/teacher23\"}', 'Math', 0),
(2, 44, 1, 'Junior', 1, NULL, '..........', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_permissions`
--

CREATE TABLE `teacher_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT 0,
  `assignment` int(11) DEFAULT 0,
  `attendance` int(11) DEFAULT 0,
  `online_exam` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_permissions`
--

INSERT INTO `teacher_permissions` (`id`, `class_id`, `section_id`, `teacher_id`, `marks`, `assignment`, `attendance`, `online_exam`) VALUES
(1, 1, 1, 1, 1, 0, 1, 0),
(2, 2, 2, 1, 0, 0, 0, 0),
(3, 10, 10, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `authentication_key` varchar(255) DEFAULT NULL,
  `watch_history` longtext DEFAULT NULL,
  `last_registration_no` varchar(255) DEFAULT NULL,
  `admission_date` varchar(255) DEFAULT NULL,
  `student_birth_form_id` varchar(255) DEFAULT NULL,
  `student_is_orphan` enum('Yes','No') DEFAULT NULL,
  `student_cast` varchar(255) DEFAULT NULL,
  `student_osc` enum('Yes','No') DEFAULT NULL,
  `student_identification_mark` varchar(255) DEFAULT NULL,
  `previous_school` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `previous_board_id` varchar(255) DEFAULT NULL,
  `student_disease` varchar(255) DEFAULT NULL,
  `additional_note` varchar(255) DEFAULT NULL,
  `total_sibling` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `address`, `phone`, `remember_token`, `birthday`, `gender`, `blood_group`, `school_id`, `authentication_key`, `watch_history`, `last_registration_no`, `admission_date`, `student_birth_form_id`, `student_is_orphan`, `student_cast`, `student_osc`, `student_identification_mark`, `previous_school`, `religion`, `previous_board_id`, `student_disease`, `additional_note`, `total_sibling`) VALUES
(1, 'superadmin', 'skg.kyptronix@gmail.com', '4b4b04529d87b5c318702bc1d7689f70b15ef4fc', 'superadmin', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Syed Amir Ali', 'admin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'admin', '4100 Yosemite Avenue', '09836437902', NULL, NULL, 'Male', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Rakesh Verma', 'stud1@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'student', '4100 Yosemite Avenue', '09858457858', NULL, '1716919200', 'Male', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Rakesh Rao', 'stud2@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'student', '4100 Yosemite Avenue', '09858457858', NULL, '1716314400', 'Male', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Brijesh Sahu', 'stud3@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'student', '4100 Yosemite Avenue', '09858457858', NULL, '1716919200', 'Male', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Riya Chakraborty', 'riya@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'librarian', '4100 Yosemite Avenue', '96921255255', NULL, NULL, 'Female', 'b-', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Liyakat Singh', 'liyakat@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'parent', '4100 Yosemite Avenue', '96921255255', NULL, NULL, 'Male', 'ab+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Riya Moni Roy', 'moni@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'parent', '4100 Yosemite Avenue', '96921255251', NULL, NULL, 'Female', 'b-', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Raj Mehra', 'raj@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'teacher', '4100 Yosemite Avenue', '8584574584', NULL, NULL, 'Male', 'b-', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Raj Mehra', 'rajendra@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'teacher', '4100 Yosemite Avenue', '8584574584', NULL, NULL, 'Male', 'b-', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Raj Mehra', 'rajen@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'teacher', '4100 Yosemite Avenue', '8584574584', NULL, NULL, 'Male', 'ab+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Bidyut Shah', 'bidyut@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'teacher', '4100 Yosemite Avenue', '8584511125', NULL, NULL, 'Male', 'ab+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Rajendra Mishra', 'Rmishra@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'teacher', '4100 Yosemite Avenue', '5254785845', NULL, NULL, 'Male', 'o+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Rajendra Mishra', 'rajn@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'teacher', '4100 Yosemite Avenue', '9858457858', NULL, NULL, 'Male', 'o+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Rajendra Mishra', 'ggt@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'teacher', 'India', '8585845785', NULL, NULL, 'Male', 'b+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Ahmed', 'ahmednada27@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'student', '53 Colonial Ave', '9294909549', NULL, '1716228000', 'Male', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Hero Student', 'stud10@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'student', '4100 Yosemite Avenue', '09858457999', NULL, '1716314400', 'Male', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'john', 'iroy@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'teacher', 'gghhj', '1234567', NULL, NULL, 'Male', 'a-', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Sandeep Kumar', 'sandeep@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'student', 'Odisha', '9692126454', NULL, '1716919200', 'Male', 'b+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Bidyut Shah', 'bidyut1@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'student', '4100 Yosemite Avenue', '09836437902', NULL, '1719252000', 'Male', 'a-', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Sophia Jones', 'sophia@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42', 'student', NULL, NULL, NULL, NULL, 'Female', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Ava Brown', 'ava@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42', 'student', NULL, NULL, NULL, NULL, 'Male', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Ethan Lee', 'ethan@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42', 'student', NULL, NULL, NULL, NULL, 'Male', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'William Johnson', 'swilliam@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42', 'student', NULL, NULL, NULL, NULL, 'Male', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Benjamin Miller', 'miller@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42', 'student', NULL, NULL, NULL, NULL, 'Male', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Olivia Davis', 'olivia@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42', 'student', NULL, NULL, NULL, NULL, '', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'John1 Doe', 'john@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'student', 'FLOOR 8 , Q Plot No. IID, Ek Tower, 30, Street Number 692, Action Area II, Action Area IID, Newtown, New Town, West Bengal 700161', '09836437902', NULL, '1548957600', 'Male', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Bikash Ghosh', 'bikashghosh@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'student', 'Vill_P.o-Adhata; P.S- Amdanga; Dist- North 24 Paraganas;', '9749460739', NULL, '1502388000', 'Male', 'o+', 1, NULL, '[]', '10213', '07/18/2024', '1432168', 'No', 'General', 'Yes', 'No Mark present', 'ST Thomas school', 'hinduism', '89012', 'No Diseases', 'Nothing', 2),
(29, 'vbbc', 'test@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'parent', 'Vill_P.o-Adhata; P.S- Amdanga; Dist- North 24 Paraganas;', '09749460739', NULL, NULL, 'Female', '', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Test221', 'test221@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'parent', 'test address', '8906654345', NULL, NULL, 'Male', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Test321', 'test321@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'parent', 'Test addres', '789032113', NULL, NULL, 'Male', 'b+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Test453', 'test34@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'parent', 'sdsdasfasf sdasdd', '789043123', NULL, NULL, 'Male', 'b+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'kyp', 'kyp@gmail.com', '229be39e04f960e46d8a64cadc8b4534e6bfc364', 'student', NULL, NULL, NULL, NULL, 'Male', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'sri', 'sri@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'student', NULL, NULL, NULL, NULL, 'Female', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Jo', 'jo@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'teacher', 'address', '7003731611', NULL, NULL, 'Male', 'b+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'rim', 'rim@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'student', NULL, NULL, NULL, NULL, 'Female', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'kyp22', 'kyp22@gmail.com', '229be39e04f960e46d8a64cadc8b4534e6bfc364', 'student', NULL, NULL, NULL, NULL, 'Male', NULL, 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Priyanka Ghosh', 'hr@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'hr', '4100 Yosemite Avenue', '9012657890', NULL, NULL, 'Female', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hindu', NULL, NULL, NULL, NULL),
(39, 'JO', 'jo123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'driver', NULL, '8956144785', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'manish', 'manish@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'driver', NULL, '8956144785', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Jyotirmoy', 'jo1234@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hr', NULL, '8956144780', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Motu', 'motu@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'teacher', 'address', '8956144785', NULL, NULL, 'Female', 'a+', 1, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_driver` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicle_number`, `vehicle_model`, `vehicle_driver`, `note`) VALUES
(11, '1012', 'BM11', 'JO', 'note'),
(12, '1011', 'BM112', 'manish', 'note');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignvehicle`
--
ALTER TABLE `assignvehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_routes`
--
ALTER TABLE `assign_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `behaviour`
--
ALTER TABLE `behaviour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issues`
--
ALTER TABLE `book_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_list`
--
ALTER TABLE `candidate_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classwork`
--
ALTER TABLE `classwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_attendances`
--
ALTER TABLE `daily_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrols`
--
ALTER TABLE `enrols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_calendars`
--
ALTER TABLE `event_calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_events`
--
ALTER TABLE `frontend_events`
  ADD PRIMARY KEY (`frontend_events_id`);

--
-- Indexes for table `frontend_gallery`
--
ALTER TABLE `frontend_gallery`
  ADD PRIMARY KEY (`frontend_gallery_id`);

--
-- Indexes for table `frontend_gallery_image`
--
ALTER TABLE `frontend_gallery_image`
  ADD PRIMARY KEY (`frontend_gallery_image_id`);

--
-- Indexes for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_exam_details`
--
ALTER TABLE `online_exam_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_exam_result`
--
ALTER TABLE `online_exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_applied_for`
--
ALTER TABLE `position_applied_for`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_guardien_information`
--
ALTER TABLE `student_guardien_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabuses`
--
ALTER TABLE `syllabuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_permissions`
--
ALTER TABLE `teacher_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignvehicle`
--
ALTER TABLE `assignvehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assign_routes`
--
ALTER TABLE `assign_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `behaviour`
--
ALTER TABLE `behaviour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_issues`
--
ALTER TABLE `book_issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_list`
--
ALTER TABLE `candidate_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `classwork`
--
ALTER TABLE `classwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `daily_attendances`
--
ALTER TABLE `daily_attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `enrols`
--
ALTER TABLE `enrols`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `event_calendars`
--
ALTER TABLE `event_calendars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_events`
--
ALTER TABLE `frontend_events`
  MODIFY `frontend_events_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_gallery`
--
ALTER TABLE `frontend_gallery`
  MODIFY `frontend_gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_gallery_image`
--
ALTER TABLE `frontend_gallery_image`
  MODIFY `frontend_gallery_image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exam_details`
--
ALTER TABLE `online_exam_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `online_exam_result`
--
ALTER TABLE `online_exam_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `position_applied_for`
--
ALTER TABLE `position_applied_for`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_guardien_information`
--
ALTER TABLE `student_guardien_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `syllabuses`
--
ALTER TABLE `syllabuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_permissions`
--
ALTER TABLE `teacher_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
