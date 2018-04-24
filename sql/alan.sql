-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 07:37 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gwizards`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(99) NOT NULL,
  `author` int(99) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `author`, `title`, `description`, `attachments`, `date`, `status`) VALUES
(8, 1, 'Test project notification', 'Test', '', '2018-03-31 16:21:07', 'publish'),
(10, 1, 'Application development for Games', 'Develop an application to promote the University of Greenwich!', '', '2018-04-02 22:43:57', 'publish'),
(11, 1, 'Fundraiser for a Greenwich Market event', 'Organise an event hosted at the Greenwich Market!', '', '2018-04-02 22:45:51', 'publish'),
(12, 1, 'Math Quiz Event', 'Design a weekly Math-a-thon competition at the University!', '', '2018-04-02 22:46:31', 'publish'),
(13, 1, 'Design a building', 'Draw and digitally design your building for a chance to win!', '', '2018-04-02 22:47:22', 'publish'),
(14, 1, 'Test', 'Test', '', '2018-04-02 22:47:50', 'publish'),
(15, 1, 'Test2', 'Test2', '', '2018-04-02 22:48:08', 'publish'),
(16, 1, 'Test3', 'Test3', '', '2018-04-02 22:48:25', 'publish'),
(17, 1, 'Test4', 'Test4', '', '2018-04-02 22:49:19', 'publish'),
(18, 1, 'Pending test', 'Pending test', '', '2018-04-02 22:49:44', 'publish'),
(19, 1, 'Pending test2', 'Pending test2', '', '2018-04-02 22:49:55', 'pending'),
(20, 1, 'Pending test3', 'Pending test3', '', '2018-04-02 22:50:06', 'pending'),
(21, 9, 'University Project Test 1', 'University Project Test 1', '', '2018-04-03 14:45:34', 'pending'),
(22, 9, 'University Project Test 2', 'University Project Test 2', '', '2018-04-03 14:52:05', 'pending'),
(28, 1, 'gmail test', 'test', '', '2018-04-03 16:02:30', 'publish'),
(29, 1, 'GWizards App Dev', 'test', '', '2018-04-03 17:04:47', 'pending'),
(30, 9, 'dsf', 'dsfdsf', '', '2018-04-17 15:45:43', 'publish'),
(31, 1, 'efh', 'dfh', '', '2018-04-20 00:45:39', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `project_meta`
--

CREATE TABLE `project_meta` (
  `id` bigint(99) NOT NULL,
  `project_id` bigint(99) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_meta`
--

INSERT INTO `project_meta` (`id`, `project_id`, `meta_key`, `meta_value`) VALUES
(1, 0, 'anonymousSubmit', ''),
(2, 0, 'anonymousSubmit', ''),
(3, 0, 'assignees', '2'),
(4, 0, 'assignees', '5'),
(5, 1, 'assignees', '2'),
(6, 1, 'assignees', '5'),
(7, 2, 'assignees', '2'),
(8, 2, 'assignees', '5'),
(9, 3, 'assignees', '2'),
(10, 3, 'assignees', '5'),
(11, 4, 'assignees', '1'),
(12, 4, 'assignees', '2'),
(13, 5, 'assignees', '2'),
(14, 6, 'assignees', '2'),
(15, 7, 'assignees', '2'),
(16, 8, 'assignees', '2'),
(17, 8, 'assignees', '5'),
(18, 9, 'assignees', '1'),
(19, 10, 'assignees', '6'),
(20, 11, 'assignees', '6'),
(21, 12, 'assignees', '7'),
(22, 13, 'assignees', '7'),
(23, 14, 'assignees', '1'),
(24, 15, 'assignees', '1'),
(25, 16, 'assignees', '6'),
(26, 17, 'assignees', '8'),
(27, 18, 'assignees', '8'),
(28, 19, 'assignees', '1'),
(29, 20, 'assignees', '7'),
(30, 21, 'assignees', '6'),
(31, 22, 'assignees', '7'),
(32, 23, 'assignees', '7'),
(33, 24, 'assignees', '1'),
(34, 25, 'assignees', '6'),
(35, 26, 'assignees', '1'),
(36, 27, 'assignees', '1'),
(37, 28, 'assignees', '1'),
(38, 29, 'assignees', '11'),
(39, 30, 'assignees', '6'),
(40, 31, 'assignees', '1');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(99) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `color`) VALUES
(2, 'Computer', '#4C4CFF'),
(3, 'Architecture', '#cdf239'),
(4, 'Art', '#9ae8f8'),
(5, 'Finance', '#380af3'),
(6, 'Charity Fundraiser', '#42ee4f'),
(7, 'Business', '#555555'),
(8, 'Engish', '#b062ac'),
(10, 'Maths', '#e3eb4e'),
(11, 'Statistics', '#ff0000');

-- --------------------------------------------------------

--
-- Table structure for table `term_project`
--

CREATE TABLE `term_project` (
  `id` bigint(99) NOT NULL,
  `project_id` bigint(99) NOT NULL,
  `term_id` bigint(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term_project`
--

INSERT INTO `term_project` (`id`, `project_id`, `term_id`) VALUES
(1, 0, 3),
(2, 1, 3),
(3, 2, 3),
(4, 3, 3),
(5, 4, 3),
(6, 5, 3),
(7, 6, 2),
(8, 6, 3),
(9, 7, 2),
(10, 7, 3),
(11, 8, 2),
(12, 9, 4),
(13, 10, 2),
(14, 11, 6),
(15, 12, 10),
(16, 13, 3),
(17, 13, 4),
(18, 14, 6),
(19, 14, 7),
(20, 15, 8),
(21, 15, 10),
(22, 16, 4),
(23, 16, 6),
(24, 17, 5),
(25, 17, 7),
(26, 18, 2),
(27, 18, 3),
(28, 18, 6),
(29, 19, 4),
(30, 19, 5),
(31, 19, 8),
(32, 20, 6),
(33, 20, 7),
(34, 20, 8),
(35, 21, 3),
(36, 21, 5),
(37, 22, 6),
(38, 22, 8),
(39, 22, 10),
(40, 23, 4),
(41, 24, 2),
(42, 25, 3),
(43, 26, 3),
(44, 26, 4),
(45, 27, 3),
(46, 27, 4),
(47, 28, 3),
(48, 28, 6),
(49, 29, 10),
(50, 29, 11),
(51, 30, 3),
(52, 31, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(99) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `display_name`, `password`, `email`, `role`) VALUES
(1, 'Alan', '$2a$12$769a6fda1d4de82eb0dc3ec7uPoFixGioWE/JRVHxs.p9a4BRS95C', 'sw3456q@greenwich.ac.uk', 0),
(6, 'Student', '$2a$12$f9049604ad6717184cd31e485RwFKCWG.8QfYcy4hVER1Ua/EJk7W', 'student@greenwich.ac.uk', 2),
(7, 'Student 2', '$2a$12$8e919c888740344e2371eu40n83ZnvxPMPHiqoTNH97bYH8IDzCW6', 'student2@greenwich.ac.uk', 2),
(8, 'Student3', '$2a$12$cc29ed2106f3f5597d7a9e79U.Ico8JacXpTAQxJ3izohGMYfI2o6', 'student3@greenwich.ac.uk', 2),
(9, 'Staff', '$2a$12$e3bd6ffd698037481b4deOnXqE/r/5vt6kt1NacWrCc1Qm0mLkEJO', 'staff@greenwich.acuk', 1),
(10, 'Staff1', '$2a$12$7af9cde7d28483237a029uN.ZvVUiA4kea0fH9/zxqLTyXLtaeDtK', 'staff1@greenwich.ac.uk', 1),
(11, 'Student 6', '$2a$12$01c5f2a7a14c7a5c90152uuoaGe2IZ4GnelGaRIKWIbPZqey2kzO6', 'student6@greenwich.ac.uk', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_meta`
--
ALTER TABLE `project_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_project`
--
ALTER TABLE `term_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `project_meta`
--
ALTER TABLE `project_meta`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `term_project`
--
ALTER TABLE `term_project`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
