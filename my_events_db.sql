-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2023 at 07:23 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_events_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

DROP TABLE IF EXISTS `event_details`;
CREATE TABLE IF NOT EXISTS `event_details` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) NOT NULL,
  `event_description` varchar(500) DEFAULT NULL,
  `event_category` varchar(50) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `video_url` varchar(100) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`event_id`, `event_name`, `event_description`, `event_category`, `keywords`, `video_url`, `image_url`, `start_date`, `end_date`, `user_id`) VALUES
(36, 'Uniting Through Diversity: A Cultural Fair and Festival', 'The Student Union presents \"Uniting Through Diversity\", a cultural fair and festival that celebrates the diverse backgrounds and cultures of our student body. This event will feature food, music, dance, and art from different cultures around the world. There will also be a variety of interactive activities, games, and workshops that educate and promote cultural awareness.', 'Home', 'happy, outside', 'e', 'https://shorturl.at/astz3', '2023-01-29', '2023-01-29', 1),
(35, 'Election Night Extravaganza: A Celebration of Student Voice and Leadership', 'The Student Union is excited to host the annual Election Night Extravaganza, an event that celebrates the voices and leadership of our student body. This event will feature live music, delicious food, and fun activities, all while the election results are announced live. ', 'Student', 'Fun, Gaming', 'smsms', 'https://shorturl.at/lwVW1', '2023-01-26', '2023-01-29', 1),
(37, 'Academic Achievement Awards Ceremony: Honoring the Top Performers of the Year', 'The Student Union is proud to host the Annual Academic Achievement Awards Ceremony, an event that recognizes and honors the top academic performers of the school year. This ceremony will feature speeches from the valedictorian and salutatorian, as well as presentations of awards to students who have excelled in their studies.', ' Awards Ceremony', 'Ceremony, Staff, students', '-', 'https://shorturl.at/dELO1', '2022-12-28', '2022-12-30', 1),
(38, 'Leadership Summit: Empowering Student Voices and Ideas', 'The Student Union invites all students to participate in our Leadership Summit, an event designed to empower student voices and ideas. This summit will feature keynote speakers, panel discussions, and interactive workshops that focus on leadership development, civic engagement, and community building. ', 'Leader ship', 'leader, students, sist', '-', 'https://shorturl.at/RUY39', '2022-12-09', '2022-12-10', 1),
(39, 'Annual Charity Ball: A Night of Giving Back to the Community', 'The Student Union invites all students, staff, and families to attend our Annual Charity Ball, an event that raises funds and awareness for a local charity. This event will feature live music, dancing, and a silent auction, all in support of a worthy cause.', 'Community ', 'Charity, Family, students, staff, family', 'https://shorturl.at/fgrv7', 'https://shorturl.at/fgrv7', '2023-07-14', '2023-07-26', 1),
(40, 'Student Talent Showcase: A Night of Music, Dance, and Performance Arts', 'The Student Union invites all students, staff, and families to attend the Student Talent Showcase, an event that celebrates the artistic talents of our student body. This showcase will feature performances in music, dance, and theater, as well as visual arts exhibits. This event is a great opportunity for students to showcase their artistic talents and gain recognition for their hard work and dedication.', 'Performing', 'Art, Music, Songs, Students, Drama, Drawing, Acting,', 'https://shorturl.at/mqy24', 'https://shorturl.at/mqy24', '2023-01-25', '2023-01-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `address3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `profile_url` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `title`, `first_name`, `last_name`, `gender`, `address1`, `address2`, `address3`, `postcode`, `description`, `email`, `telephone`, `profile_url`) VALUES
(1, 'ablacode', 'azer1234', 'web dev', 'Abdellah', 'Dahmou', 'female', '', '', '', '', '', 'dahmou63@gmail.com', '', ''),
(2, 'raniasa', 'raniasa', 'Drama ', 'Rania', 'Samih', 'female', '', '', '', '', '', 'rania@gmail.com', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
