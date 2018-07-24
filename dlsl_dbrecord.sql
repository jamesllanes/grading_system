-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 11:43 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dlsl_dbrecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE IF NOT EXISTS `exercises` (
  `studno` int(200) NOT NULL,
  `mexercises` varchar(500) NOT NULL,
  `fexercises` varchar(500) NOT NULL,
  `term` varchar(200) NOT NULL,
  `course_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`studno`, `mexercises`, `fexercises`, `term`, `course_code`) VALUES
(2014160551, '100', '100,100,100', '', 'Inasec1'),
(2015167531, '100', '100,100,100', '', 'Inasec1'),
(2015174401, '100', '100,100,100', '', 'Inasec1'),
(2015175031, '100', '100,100,100', '', 'Inasec1'),
(2015175181, '100', '100,100,100', '', 'Inasec1'),
(2015177651, '100', '100,100,100', '', ''),
(2015178081, '100', '100,100,100', '', 'Infoma2'),
(2015178791, '100', '100,100,100', '', 'Inasec1'),
(2015178831, '100', '100,100,100', '', 'Inasec1'),
(2015179331, '100', '100,100,100', '', 'Inasec1'),
(2015182531, '100', '100,100,100', '', 'Inasec1'),
(2015183601, '100', '100,100,100', '', 'Websyst');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `studno` int(11) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `Course_Code` varchar(200) NOT NULL,
  `mattd` int(100) NOT NULL,
  `fattd` int(100) NOT NULL,
  `mvb` int(100) NOT NULL,
  `fvb` int(100) NOT NULL,
  `mexercises` varchar(100) NOT NULL,
  `fexercises` varchar(200) NOT NULL,
  `mxave` int(100) NOT NULL,
  `fxave` int(100) NOT NULL,
  `mcs` int(100) NOT NULL,
  `fcs` int(100) NOT NULL,
  `mquizzes` varchar(200) NOT NULL,
  `fquizzes` varchar(200) NOT NULL,
  `mqave` int(100) NOT NULL,
  `fqave` int(100) NOT NULL,
  `mexam` int(100) NOT NULL,
  `fexam` int(100) NOT NULL,
  `mexamp` int(100) NOT NULL,
  `fexamp` int(100) NOT NULL,
  `mg` int(100) NOT NULL,
  `fg` int(100) NOT NULL,
  `fcg` int(100) NOT NULL,
  `GPE` varchar(255) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`studno`, `section_name`, `Course_Code`, `mattd`, `fattd`, `mvb`, `fvb`, `mexercises`, `fexercises`, `mxave`, `fxave`, `mcs`, `fcs`, `mquizzes`, `fquizzes`, `mqave`, `fqave`, `mexam`, `fexam`, `mexamp`, `fexamp`, `mg`, `fg`, `fcg`, `GPE`, `remarks`) VALUES
(2014160551, 'IT2A', 'Websyst', 100, 100, 100, 100, '100,100,100', '100,100,100', 100, 100, 100, 100, '100,100,100', '100,100,100', 100, 100, 100, 100, 100, 100, 100, 100, 100, '1.00', 'PASSED'),
(2015174401, 'IT2A', 'Inasec1', 90, 90, 90, 85, '85', '85,85', 85, 85, 86, 86, '90', '85,85', 90, 85, 85, 80, 93, 90, 90, 87, 88, '2.00', 'PASSED'),
(2015175181, 'IT2A', 'Inasec1', 100, 90, 100, 90, '100', '87,80', 100, 84, 100, 85, '100', '80,85', 100, 83, 100, 81, 100, 91, 100, 86, 87, '2.00', 'PASSED'),
(2015177651, 'IT2B', 'Inasec1', 92, 92, 92, 94, '94,92', '94,94', 93, 94, 93, 94, '92,94', '92,92', 93, 92, 92, 92, 96, 96, 94, 94, 94, '1.50', 'PASSED'),
(2015178081, 'IT2B', 'Infoma2', 82, 82, 82, 82, '82,82', '82,82', 82, 82, 82, 82, '82,82', '82,82', 82, 82, 82, 82, 91, 91, 85, 85, 85, '2.25', 'PASSED'),
(2015178791, 'IT2B', 'Inasec1', 100, 100, 100, 100, '100,100', '100,100', 100, 100, 100, 100, '100,100', '100,100', 100, 100, 100, 100, 100, 100, 100, 100, 100, '1.00', 'PASSED'),
(2015178831, 'IT2B', 'Inasec1', 82, 82, 82, 82, '82,82', '82,82', 82, 82, 82, 82, '82,82', '82,82', 82, 82, 82, 82, 91, 91, 85, 85, 85, '2.25', 'PASSED'),
(2015179331, 'IT2B', 'Inasec1', 90, 90, 90, 90, '90,90', '90,90', 90, 90, 90, 90, '90,90', '90,90', 90, 90, 90, 90, 95, 95, 92, 92, 92, '1.75', 'PASSED'),
(2015179861, 'IT2C', 'Inasec1', 95, 97, 97, 96, '95,97', '95,97', 96, 96, 96, 96, '96,96', '96,95', 96, 96, 97, 95, 99, 98, 97, 96, 97, '1.25', 'PASSED'),
(2015182491, 'IT2C', 'Inasec1', 100, 100, 100, 100, '100,100', '100,100', 100, 100, 100, 100, '100,100', '100,100', 100, 100, 100, 100, 100, 100, 100, 100, 100, '1.00', 'PASSED'),
(2015182531, 'IT2A', 'Inasec1', 90, 90, 87, 78, '89,78', '78,90', 84, 84, 85, 84, '80,96', '78,89', 88, 84, 86, 90, 93, 95, 89, 88, 88, '2.00', 'PASSED'),
(2015182881, 'IT2C', 'Inasec1', 95, 97, 97, 97, '97,97', '97,97', 97, 97, 97, 97, '97,97', '97,97', 97, 97, 97, 97, 99, 99, 97, 98, 97, '1.25', 'PASSED'),
(2015183601, 'IT2A', 'Websyst', 77, 79, 77, 79, '77,77', '79,79', 77, 79, 77, 79, '77,77', '79,79', 77, 79, 77, 79, 89, 90, 81, 83, 82, '2.50', 'PASSED');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `studno` int(100) NOT NULL,
  `mquizzes` varchar(500) NOT NULL,
  `fquizzes` varchar(200) NOT NULL,
  `term` varchar(200) NOT NULL,
  `course_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`studno`, `mquizzes`, `fquizzes`, `term`, `course_code`) VALUES
(2014160551, '100', '100,100,100', '', 'Inasec1'),
(2015167531, '100', '100,100,100', '', 'Inasec1'),
(2015174401, '100', '100,100,100', '', 'Inasec1'),
(2015175031, '100', '100,100,100', '', 'Inasec1'),
(2015175181, '100', '100,100,100', '', 'Inasec1'),
(2015177651, '100', '100,100,100', '', ''),
(2015178081, '100', '100,100,100', '', 'Infoma2'),
(2015178791, '100', '100,100,100', '', 'Inasec1'),
(2015178831, '100', '100,100,100', '', 'Inasec1'),
(2015179331, '100', '100,100,100', '', 'Inasec1'),
(2015182531, '100', '100,100,100', '', 'Inasec1'),
(2015183601, '100', '100,100,100', '', 'Websyst');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_no` int(11) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `num_of_students` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_no`, `section_name`, `num_of_students`) VALUES
(1, 'IT2A', '24'),
(2, 'IT2B', '30'),
(3, 'IT2C', '23');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `studno` int(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studno`, `lastname`, `firstname`, `gender`, `program`, `section`) VALUES
(2013130681, 'Siscar', 'Maria Kristina', 'Female', 'BSIT', 'IT2A'),
(2014140681, 'Reyes', 'Gene David', 'Male', 'BSIT', 'IT2C'),
(2014143251, 'Ilagan', 'Carlos Christian', 'Male', 'BSIT', 'IT2C'),
(2014145161, 'Enriquez', 'Renzo Domini', 'Male', 'BSIT', 'IT2C'),
(2014150461, 'Castillo', 'Patrizia Clarisse', 'Female', 'BSIT', 'IT2C'),
(2014160551, 'Del Pilar', 'Mecaella', 'Female', 'BSIT', 'IT2A'),
(2015167531, 'Orellana', 'Michael Joshua', 'Male', 'BSIT', 'IT2A'),
(2015171541, 'Llamas', 'Benedict', 'Male', 'BSIT', 'IT2A'),
(2015173421, 'Marinay', 'Roselyn Kaye', 'Female', 'BSIT', 'IT2A'),
(2015173841, 'Manalo', 'Angelyn Joy', 'Female', 'BSIT', 'IT2B'),
(2015174021, 'Alcantara', 'Ma. Christine', 'Female', 'BSIT', 'IT2B'),
(2015174401, 'Mosca', 'Joshua Abraham', 'Male', 'BSIT', 'IT2A'),
(2015174431, 'Cebreros', 'Frances Gillian', 'Female', 'BSIT', 'IT2B'),
(2015174661, 'Ramos', 'Stanley Freud', 'Male', 'BSIT', 'IT2C'),
(2015174721, 'Quinonez', 'Ronald', 'Male', 'BSIT', 'IT2C'),
(2015174851, 'Padua', 'Jonathan', 'Male', 'BSIT', 'IT2B'),
(2015175061, 'Olivarez', 'Reinnier', 'Male', 'BSIT', 'IT2B'),
(2015175181, 'Areta', 'Tristan Paulo', 'Male', 'BSIT', 'IT2A'),
(2015175541, 'Punay Jr.', 'Charche', 'Male', 'BSIT', 'IT2C'),
(2015175561, 'Ramos', 'Mark Gerald', 'Male', 'BSIT', 'IT2B'),
(2015175611, 'Perez', 'Christian Aldrin', 'Male', 'BSIT', 'IT2B'),
(2015175621, 'Magahis', 'Eryl Justin', 'Male', 'BSIT', 'IT2B'),
(2015175651, 'Egar', 'Robert Francis', 'Male', 'BSIT', 'IT2B'),
(2015175701, 'Panopio', 'Ralph', 'Male', 'BSIT', 'IT2A'),
(2015176051, 'Malonzo', 'Dominic Elijah', 'Male', 'BSIT', 'IT2C'),
(2015176071, 'Valencia', 'Erwin', 'Male', 'BSIT', 'IT2B'),
(2015176171, 'Lambio', 'Arvin', 'Male', 'BSIT', 'IT2B'),
(2015176181, 'Cabrera', 'Ma. Raya Louise', 'Female', 'BSIT', 'IT2B'),
(2015176711, 'Narvaez', 'Marc Neil', 'Male', 'BSIT', 'IT2B'),
(2015176801, 'Llanes', 'Darlene', 'Female', 'BSIT', 'IT2B'),
(2015176851, 'Canonigo', 'Jethro', 'Male', 'BSIT', 'IT2B'),
(2015176921, 'Castilo', 'Ian Gabriel', 'Male', 'BSIT', 'IT2B'),
(2015177651, 'Agustin', 'Paul', 'Male', 'BSIT', 'IT2B'),
(2015178081, 'Alcantara', 'Kyrah Nicole', 'Female', 'BSIT', 'IT2B'),
(2015178241, 'Santos', 'Ron Aldrine', 'Male', 'BSIT', 'IT2B'),
(2015178441, 'Hernandez', 'Brent  Angelo', 'Male', 'BSIT', 'IT2B'),
(2015178451, 'Mendoza', 'Claire Antonette', 'Female', 'BSIT', 'IT2B'),
(2015178781, 'Gamo', 'Ralph Timothy', 'Male', 'BSIT', 'IT2B'),
(2015178791, 'Soriano', 'Kate Mekaela', 'Female', 'BSIT', 'IT2B'),
(2015178831, 'Anilllo', 'Joy', 'Female', 'BSIT', 'IT2B'),
(2015178841, 'Claud', 'Jed Maruen', 'Male', 'BSIT', 'IT2B'),
(2015178981, 'Villegas', 'Kate Ann', 'Female', 'BSIT', 'IT2B'),
(2015179331, 'Alad', 'Venjo', 'Male', 'BSIT', 'IT2B'),
(2015179761, 'Pabillano', 'Kamila Leigh', 'Female', 'BSIT', 'IT2A'),
(2015179861, 'Abgelina', 'King Joshua', 'Male', 'BSIT', 'IT2C'),
(2015179941, 'Llanes', 'Jessie James', 'Male', 'BSIT', 'IT2B'),
(2015179971, 'Bunag', 'John Angelo', 'Male', 'BSIT', 'IT2B'),
(2015180121, 'Inocencio', 'Lourd Joshua', 'Male', 'BSIT', 'IT2C'),
(2015180131, 'Montierro', 'Gabriel Francis', 'Male', 'BSIT', 'IT2A'),
(2015180171, 'Libutan', 'Denise Angela', 'Female', 'BSIT', 'IT2A'),
(2015180261, 'Austria', 'Amabelle Joy', 'Female', 'BSIT', 'IT2C'),
(2015180431, 'Bautista', 'Aron', 'Male', 'BSIT', 'IT2C'),
(2015180621, 'Tumbaga', 'Julius Ervin', 'Male', 'BSIT', 'IT2A'),
(2015180791, 'De Torres', 'Anne Paula', 'Female', 'BSIT', 'IT2C'),
(2015180801, 'Sadsad', 'Jerico', 'Male', 'BSIT', 'IT2A'),
(2015180831, 'Huelgas', 'Angela Nicole', 'Female', 'BSIT', 'IT2C'),
(2015181471, 'Umali', 'Armel Joshua', 'Male', 'BSIT', 'IT2A'),
(2015181591, 'Policarpio', 'Clouie', 'Male', 'BSIT', 'IT2A'),
(2015181691, 'Chua', 'Angela Rose', 'Female', 'BSIT', 'IT2C'),
(2015181821, 'Entila', 'Entila Michael', 'Male', 'BSIT', 'IT2C'),
(2015181881, 'Landicho', 'James', 'Male', 'BSIT', 'IT2A'),
(2015181981, 'Requeza', 'Amiel Adrian', 'Male', 'BSIT', 'IT2A'),
(2015182491, 'Abellanosa', 'Kevin Brian', 'Male', 'BSIT', 'IT2C'),
(2015182531, 'Limbo', 'Arvie', 'Female', 'BSIT', 'IT2A'),
(2015182591, 'Barretto', 'Ken Ferdine', 'Male', 'BSIT', 'IT2C'),
(2015182771, 'Algaba', 'David Christian', 'Male', 'BSIT', 'IT2C'),
(2015182861, 'Pillerba', 'John Paolo', 'Male', 'BSIT', 'IT2A'),
(2015182881, 'Agustin', 'JnAster Richard', 'Male', 'BSIT', 'IT2C'),
(2015182891, 'Modancia', 'John Reinel', 'Male', 'BSIT', 'IT2A'),
(2015182921, 'Figarola', 'Adrian Duncan', 'Male', 'BSIT', 'IT2C'),
(2015183091, 'Saludo', 'Roy Dan', 'Male', 'BSIT', 'IT2A'),
(2015183601, 'Rogelio', 'Princess Xena', 'Female', 'BSIT', 'IT2A'),
(2015183631, 'Barron', 'Nathalia', 'Female', 'BSIT', 'IT2C'),
(2015183671, 'Amer', 'Mohamad Al-khair', 'Male', 'BSIT', 'IT2C'),
(2015183851, 'Ramos', 'Daphne Denise', 'Female', 'BSIT', 'IT2B'),
(2015183971, 'Viray', 'Francis', 'Male', 'BSIT', 'IT2A'),
(2015184051, 'Vegrara', 'Roilan Cyrus', 'Male', 'BSIT', 'IT2A');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `Course_Code` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Prereq` varchar(200) NOT NULL,
  `Units` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`Course_Code`, `Description`, `Prereq`, `Units`) VALUES
('Inasec1', 'Information Assurance and Security 1', 'Coprog2', '3\r\n'),
('Infoma2', 'Information Management 2', 'Infoma1', '3'),
('Netwrk', 'Networking 1', 'Comfund', '3'),
('Websyst', 'Web Systems and Technologies', 'Infoma1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `userinfotable`
--

CREATE TABLE IF NOT EXISTS `userinfotable` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `usertype` enum('Student','Teacher') NOT NULL DEFAULT 'Student'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfotable`
--

INSERT INTO `userinfotable` (`id`, `fullname`, `username`, `password`, `gender`, `email`, `usertype`) VALUES
(1, 'Remigio Obtial', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'male', 'romyobtial@gmail.com', 'Teacher'),
(2, 'Jessie James Llanes', '2015179941', 'cd73502828457d15655bbd7a63fb0bc8', 'male', 'deathscythe436@gmail.com', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`studno`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`studno`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`studno`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD UNIQUE KEY `section_no` (`section_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studno`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Course_Code`);

--
-- Indexes for table `userinfotable`
--
ALTER TABLE `userinfotable`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userinfotable`
--
ALTER TABLE `userinfotable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
