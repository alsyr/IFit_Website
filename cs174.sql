-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2015 at 07:05 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs174`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE IF NOT EXISTS `exercise` (
  `exercise_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` varchar(100) NOT NULL,
  `repetition` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`exercise_id`, `name`, `description`, `category`, `repetition`) VALUES
(1, 'Squat', 'squat down with a weight held across the upper back under neck and stand up straight again', 'back', 10),
(2, 'Leg Press', 'seat and push a weight away from the body with the feet', 'legs', 20),
(3, 'Deadlift', 'squat down and lift a weight off the floor with the hand until standing up straight again', 'back', 15),
(4, 'Wall Sit', 'place one''s back against a wall with feet shoulder width apart, and lower the hips until the knees and hips are both at right angles', 'back', 10),
(5, 'Bench Press', 'lay face up on a bench and push a weight away from the chest', 'chest', 12),
(6, 'Standing Bicep Curl', 'perform it by holding the barbell with your hands at normal shoulder length away from each other', 'biceps', 10),
(8, 'Prone Bicep Curl', 'focus on not swaying your upper arms too much to make sure the biceps do the bulk of the workout', 'biceps', 15),
(9, 'Concentration Bicep Curl', 'Stabilizing your upper arm in such a way is a good way to make sure you arent cheating input away from your bicep by getting help associated with moving your upper arms', 'biceps', 11),
(10, 'Preacher Bicep Curl using Neutral Grip', 'using a preacher arm rest to stabilize your upper arms and to limit the amount of unintended cheating involved', 'biceps', 20),
(11, 'Band Bicep Curl', 'simply step on top of the band in order to hold it securely in place and your bring the handles up without moving your upper arms', 'biceps', 10),
(12, 'Standing Bicep Curl against Ball', 'Placing a ball in such a way allows you to involve your core muscles which will work to maintain balance while you raise the dumbbells up and down', 'biceps', 8),
(13, 'Standing Bicep Curl using Close Grip', 'hold the barbell with your hands closer from each other than a normal shoulder width in order to exercise the outside portion of your biceps', 'biceps', 12),
(14, 'Prone Bicep Curl using Close Grip', 'keep your upper arms perpendicular to the ground throughout', 'biceps', 10),
(15, 'Standing One at a Time Bicep Curl', 'very effective way to target your bicep muscles', 'biceps', 3),
(16, 'Standing Alternated Bicep Curl', 'lower one dumbbell down you raise the one held with your other hand, and so forth in a single continuous and smooth motion', 'biceps', 20),
(17, 'Standing Inner Bicep Curl', 'raising the dumbbells up and slightly away from your upper arms, rather than straight up towards your shoulders as you normally would', 'biceps', 15),
(18, 'Standing Hammer Curl', 'Using a hammer grip allows you to move input away from your inner forearms, in essence giving them rest', 'arms', 12),
(19, 'Seated Alternated Bicep Curl', 'raise one dumbbell as youre lowering the other in one smooth and continuous motion', 'biceps', 12),
(20, 'Seated Bicep Curl', 'make sure to keep your upper arms as still as you can throughout', 'shoulders', 10),
(21, 'Seated Incline Bicep Bench Curl', 'raise and lower both dumbbells at the same time', 'shoulders', 8),
(22, 'Concentration Bicep Curl', 'Stabilizing your upper arm in such a way is a good way to make sure you arent cheating input away from your bicep by getting help associated with moving your upper arms', 'biceps', 15),
(23, 'Seated Inner Tricep Curl', 'raise the dumbbells up slightly away from your shoulders in order to workout the inside areas of your bicep muscles', 'triceps', 10),
(24, 'Leg Extension', 'Pull the foot handle up by extending your leg and allow it to slowly return after a short pause', 'legs', 12),
(25, 'Stationary Lunge', 'Secure the tubing underneath one foot that is forward and crouch down with your other foot in line but behind and hold the handles with your hands on top of your shoulders, palms facing foward', 'shoulders', 12),
(26, 'Calf Raise', 'Sit on a bench, place the heel of your foot on top of a small block and secure the tubing between your toes and that block', 'legs', 15),
(27, 'Elbows Bent', 'Lie prone with your belly against the ball, back and legs extended and hold dumbbells down to your sides, elbows at 90 degree angles', '', 5),
(28, 'Scapular Protraction', 'Push yourself up by only moving your shoulder blades away from each other and allow them to slowly return after a short pause', '', 5),
(29, 'Shoulder Rotation', 'Lie prone with your belly against the ball, back and legs extended and hold dumbbells out to your sides, elbows at 90 degree angles', '', 20),
(30, 'Shrug', 'Stand up and hold one dumbbell with each hand in front of your thighs, palms facing your body', '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE IF NOT EXISTS `todolist` (
  `exercise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`exercise_id`) VALUES
(4),
(9),
(10),
(14),
(22);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE IF NOT EXISTS `trainer` (
  `trainer_id` int(11) NOT NULL DEFAULT '0',
  `first` varchar(45) NOT NULL,
  `last` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `first`, `last`, `gender`) VALUES
(1, 'Justin', 'Bieber', 'Unknown'),
(2, 'Taylor', 'Swift', 'Female'),
(3, 'Ariana', 'Grande', 'Female'),
(4, 'Michael', 'Jackson', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `first` varchar(45) NOT NULL,
  `last` varchar(45) NOT NULL,
  `age` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `phone_number` int(10) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zipcode` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first`, `last`, `age`, `weight`, `height`, `phone_number`, `address`, `city`, `state`, `zipcode`) VALUES
(1, 'John', 'Ma', 26, 145, 145, 2147483647, '145 1st', 'San Jose', 'CA', 95112),
(2, 'Kim', 'Ci', 18, 100, 152, 2147483647, '678 4thStreet', 'San Jose', 'CA', 95113),
(3, 'Peter', 'Chen', 29, 170, 170, 2147483647, '345 King Street', 'San Jose', 'CA', 95112),
(4, 'Jay', 'Z', 45, 145, 210, 2147483647, '896Jay Street', 'San Francisco', 'CA', 94134),
(5, 'Bat', 'Man', 23, 160, 168, 2147483647, '888 Bat Street', 'San Mateo', 'CA', 93242),
(6, 'King', 'Kong', 16, 300, 245, 2147483647, '53 South Street', 'San Diego', 'CA', 95123),
(7, 'Sugar', 'Daddy', 78, 150, 120, 2147483647, '423 Folsom Street', 'Sacramento', 'CA', 94102),
(12, 'Papa', 'Noel', 124, 68, 165, NULL, NULL, NULL, NULL, NULL),
(13, 'Al', 'Heric', 21, 80, 180, NULL, NULL, NULL, NULL, NULL),
(16, 'Alik', 'R', 55, 90, 180, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `user_id` int(11) NOT NULL,
  `weight_status` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`user_id`, `weight_status`) VALUES
(1, 'Overweight'),
(2, 'Severe Obesity'),
(3, 'Normal'),
(4, 'Obesity'),
(5, 'Overweight'),
(6, 'Underweight'),
(7, 'Severe Obesity'),
(12, 'Normal'),
(13, 'Normal'),
(16, 'Overweight');

-- --------------------------------------------------------

--
-- Table structure for table `user_trainer`
--

CREATE TABLE IF NOT EXISTS `user_trainer` (
  `user_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_trainer`
--

INSERT INTO `user_trainer` (`user_id`, `trainer_id`) VALUES
(1, 4),
(2, 3),
(3, 2),
(4, 2),
(5, 1),
(6, 4),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `weight_exercise`
--

CREATE TABLE IF NOT EXISTS `weight_exercise` (
  `weight_status` varchar(45) NOT NULL,
  `exercise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weight_exercise`
--

INSERT INTO `weight_exercise` (`weight_status`, `exercise_id`) VALUES
('Normal', 5),
('Obesity', 4),
('Overweight', 3),
('Severe Obesity', 2),
('Underweight', 1);

-- --------------------------------------------------------

--
-- Table structure for table `weight_status`
--

CREATE TABLE IF NOT EXISTS `weight_status` (
  `weight_status` varchar(45) NOT NULL,
  `bmi_min` int(2) NOT NULL,
  `bmi_max` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weight_status`
--

INSERT INTO `weight_status` (`weight_status`, `bmi_min`, `bmi_max`) VALUES
('Normal', 19, 25),
('Obesity', 30, 39),
('Overweight', 26, 29),
('Severe Obesity', 40, 99),
('Underweight', 1, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`exercise_id`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`exercise_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`user_id`,`weight_status`);

--
-- Indexes for table `user_trainer`
--
ALTER TABLE `user_trainer`
  ADD PRIMARY KEY (`user_id`,`trainer_id`);

--
-- Indexes for table `weight_exercise`
--
ALTER TABLE `weight_exercise`
  ADD PRIMARY KEY (`weight_status`,`exercise_id`);

--
-- Indexes for table `weight_status`
--
ALTER TABLE `weight_status`
  ADD PRIMARY KEY (`weight_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
