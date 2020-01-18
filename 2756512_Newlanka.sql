-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 06:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2756512_wintan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `User_ID` int(100) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `ID_Number` varchar(10) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Telephone_Number` int(10) NOT NULL,
  `City` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Last_Login` datetime NOT NULL,
  `Block_Unblock` tinyint(1) NOT NULL,
  `User_Delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`User_ID`, `First_Name`, `Last_name`, `User_Name`, `ID_Number`, `Password`, `Address`, `Telephone_Number`, `City`, `DOB`, `Gender`, `Last_Login`, `Block_Unblock`, `User_Delete`) VALUES
(10, 'Lahiru ', 'Sadeeptha', 'lahiru11@gmail.com', '980151999', '6116afedcb0bc31083935c1c262ff4c9', 'kuliyapitiya', 774532123, 'Kuliyapitiya', '0000-00-00', '{}', '2020-01-10 14:38:41', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_list`
--

CREATE TABLE `appointment_list` (
  `Appointment_ID` int(11) NOT NULL,
  `Doctor_ID_Number` int(11) NOT NULL,
  `Patient_Name` varchar(50) NOT NULL,
  `Patient_Email` varchar(50) NOT NULL,
  `Patient_Address` varchar(50) NOT NULL,
  `Patient_City` varchar(50) NOT NULL,
  `Patient_DOB` date NOT NULL,
  `Patient_Telephone_Number` int(11) NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Appointment_Start_Time` time NOT NULL,
  `Appointment_End_Time` time NOT NULL,
  `State` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_list`
--

INSERT INTO `appointment_list` (`Appointment_ID`, `Doctor_ID_Number`, `Patient_Name`, `Patient_Email`, `Patient_Address`, `Patient_City`, `Patient_DOB`, `Patient_Telephone_Number`, `Appointment_Date`, `Appointment_Start_Time`, `Appointment_End_Time`, `State`) VALUES
(51, 980151999, 'Lahiru ', 'lahiru11@gmail.com', 'kuliyapitiya', 'Kuliyapitiya', '0000-00-00', 774532123, '0000-00-00', '00:00:00', '00:00:00', 'complete'),
(55, 65251999, 'Reshmitha', 'reshmitha@gmai.com', 'Mathara', 'Mathara', '0000-00-00', 714150716, '0000-00-00', '00:00:00', '00:00:00', 'complete'),
(56, 65251999, 'Reshmitha', 'reshmitha@gmai.com', 'Mathara', 'Mathara', '0000-00-00', 714150716, '0000-00-00', '00:00:00', '00:00:00', 'complete'),
(57, 980151999, 'Lahiru ', 'lahiru11@gmail.com', 'kuliyapitiya', 'Kuliyapitiya', '0000-00-00', 774532123, '0000-00-00', '00:00:00', '00:00:00', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_add_schedule`
--

CREATE TABLE `doctor_add_schedule` (
  `Schedule_ID` int(11) NOT NULL,
  `Doctor_ID` varchar(20) NOT NULL,
  `Doctor_Speciality` varchar(20) NOT NULL,
  `Schedule_Date` date NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `At_1Hour_Appointment_Quentity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_add_schedule`
--

INSERT INTO `doctor_add_schedule` (`Schedule_ID`, `Doctor_ID`, `Doctor_Speciality`, `Schedule_Date`, `Start_Time`, `End_Time`, `At_1Hour_Appointment_Quentity`) VALUES
(106, '451235458', 'DENTAL SURGEON', '2020-01-03', '06:00:00', '10:06:00', 5),
(107, '451235458', 'DENTAL SURGEON', '2020-01-10', '06:00:00', '10:06:00', 5),
(108, '451235458', 'DENTAL SURGEON', '2020-01-17', '06:00:00', '10:06:00', 5),
(109, '451235458', 'DENTAL SURGEON', '2020-01-24', '06:00:00', '10:06:00', 5),
(110, '451235458', 'DENTAL SURGEON', '2020-01-31', '06:00:00', '10:06:00', 5),
(111, '451235686', 'CHEST SPECIALIST', '2020-01-03', '06:00:00', '10:00:00', 5),
(112, '451235686', 'CHEST SPECIALIST', '2020-01-10', '06:00:00', '10:00:00', 5),
(113, '451235686', 'CHEST SPECIALIST', '2020-01-17', '06:00:00', '10:00:00', 5),
(114, '451235686', 'CHEST SPECIALIST', '2020-01-24', '06:00:00', '10:00:00', 5),
(115, '451235686', 'CHEST SPECIALIST', '2020-01-31', '06:00:00', '10:00:00', 5),
(116, '4512235458', 'DENTAL SURGEON', '2020-01-03', '02:00:00', '05:00:00', 5),
(117, '4512235458', 'DENTAL SURGEON', '2020-01-10', '02:00:00', '05:00:00', 5),
(118, '4512235458', 'DENTAL SURGEON', '2020-01-17', '02:00:00', '05:00:00', 5),
(119, '4512235458', 'DENTAL SURGEON', '2020-01-24', '02:00:00', '05:00:00', 5),
(120, '4512235458', 'DENTAL SURGEON', '2020-01-31', '02:00:00', '05:00:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_db`
--

CREATE TABLE `doctor_db` (
  `Doctor_ID` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Doctor_Speciality` varchar(100) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `ID_Number` varchar(10) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Telephone_Number` int(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `doctor_channeling_costs` int(11) NOT NULL,
  `Last_Login` datetime NOT NULL,
  `Block_Unblock` tinyint(1) NOT NULL,
  `User_Delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_db`
--

INSERT INTO `doctor_db` (`Doctor_ID`, `First_Name`, `Last_Name`, `Doctor_Speciality`, `Email`, `ID_Number`, `Password`, `Telephone_Number`, `Address`, `City`, `DOB`, `Gender`, `doctor_channeling_costs`, `Last_Login`, `Block_Unblock`, `User_Delete`) VALUES
(32, 'Tushan', 'Benaragama', 'CARDIAC ELECTROPHYSIOLOGIST', 'tushan@gmail.com', '111222333', '6116afedcb0bc31083935c1c262ff4c9', 712345678, 'colombo', 'Narahenpita', '0000-00-00', 'Male', 5000, '0000-00-00 00:00:00', 0, 0),
(33, 'Indula', 'Bandara', 'CARDIAOTHORACIC SURGEON', 'indula@gmail.com', '111555666', '6116afedcb0bc31083935c1c262ff4c9', 712378478, 'kurunegala', 'kurunegala', '0000-00-00', 'Male', 5000, '2019-12-27 14:32:48', 0, 0),
(34, 'Sandeepa', 'Lakshan', 'CARDIOLOGIST', 'sandeepa@gmail.com', '000452136', '6116afedcb0bc31083935c1c262ff4c9', 714512458, 'Rajagiriya', 'Rajagiriya', '0000-00-00', 'Male', 5000, '0000-00-00 00:00:00', 0, 0),
(35, 'Kavidu', 'Silva', 'CARDIOLOGIST AND CARDIAC ELECTROPHYSIOLOGIST', 'kavidu@gmail.com', '784256412', '6116afedcb0bc31083935c1c262ff4c9', 714528945, 'Mathara', 'Mathara', '0000-00-00', 'Male', 5000, '2019-12-27 14:37:44', 0, 0),
(36, 'Lahiru', 'Lahiru', 'CHEST SPECIALIST', 'lahiru@gmail.com', '451235686', '6116afedcb0bc31083935c1c262ff4c9', 714150016, 'Kuliyapitiya', 'Kuliyapitiya', '0000-00-00', 'Male', 5000, '2019-12-29 13:48:25', 0, 0),
(37, 'Movini', 'Gamage', 'DENTAL SURGEON', 'Movini@gmail.com', '4512235458', '6116afedcb0bc31083935c1c262ff4c9', 778411542, 'Ambalanthota', 'Ambalanthota', '1998-02-12', 'Male', 5000, '2020-01-10 14:09:41', 0, 0),
(38, 'Kanchana', 'Dilrukshi', 'DENTAL SURGEON / RESTORATIVE DENTISTRY', 'Kanchana@gmail.com', '791235458', '6116afedcb0bc31083935c1c262ff4c9', 77841745, 'Mawanella', 'Mawanella', '0000-00-00', 'Male', 5000, '2019-12-27 14:36:41', 0, 0),
(39, 'Pavithra', 'Desilva', 'DERMATOLOGIST', 'pnd@gmail.com', '791455458', '6116afedcb0bc31083935c1c262ff4c9', 77874745, 'Kandy', 'Mawanella', '0000-00-00', 'Male', 5000, '0000-00-00 00:00:00', 0, 0),
(40, 'Jayani', 'walpola', 'ENDOCRINOLOGIST/DIABETOLOGIST', 'jayani@gmail.com', '791423458', '6116afedcb0bc31083935c1c262ff4c9', 77544745, 'Kegoll', 'Kegoll', '0000-00-00', 'Female', 5000, '2019-12-27 14:35:22', 0, 0),
(41, 'Vinu', 'Vinu', 'ENT SURGEON', 'vinu@gmail.com', '791923458', '6116afedcb0bc31083935c1c262ff4c9', 77544745, 'Kegoll', 'Kegoll', '0000-00-00', 'Female', 5000, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `paction_db`
--

CREATE TABLE `paction_db` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `ID_Number` varchar(10) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Telephone_Number` int(10) NOT NULL,
  `City` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Last_Login` datetime NOT NULL,
  `Block_Unblock` tinyint(1) NOT NULL,
  `User_Delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paction_db`
--

INSERT INTO `paction_db` (`User_ID`, `First_Name`, `Last_Name`, `User_Name`, `ID_Number`, `Password`, `Address`, `Telephone_Number`, `City`, `DOB`, `Last_Login`, `Block_Unblock`, `User_Delete`) VALUES
(17, 'Reshmitha', 'Diyas', 'reshmitha@gmai.com', '65251999', '6116afedcb0bc31083935c1c262ff4c9', 'Mathara', 714150716, 'Mathara', '0000-00-00', '2020-01-05 16:50:21', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `Payment_ID` int(11) NOT NULL,
  `ID_Number` varchar(20) NOT NULL,
  `Name_on_Card` varchar(50) NOT NULL,
  `Credit_Card_Number` varchar(50) NOT NULL,
  `Exp_Month` varchar(50) NOT NULL,
  `CVV` varchar(50) NOT NULL,
  `Exp_Year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`Payment_ID`, `ID_Number`, `Name_on_Card`, `Credit_Card_Number`, `Exp_Month`, `CVV`, `Exp_Year`) VALUES
(46, '98015199', 'Lahiru Udawaththa', '1111222333', 'lahiru45@gmail.com', '254', 'lahiru45@gmail.com'),
(47, '98015188', 'Lahiru Udawaththa', '554411222', '23', '235', '23'),
(48, '111222333', 'fshgkj', '5645644546', '15', '663', '15'),
(49, '456123774', 'Lahiru Udawaththa', '111222333666', '23', '123', '23'),
(50, '65251999', 'Lahiru Udawaththa', '216845', 'lahiru45@gmail.com', '663', 'lahiru45@gmail.com'),
(51, '451235458', 'Lahiru Udawaththa', '454533', 'lahiru45@gmail.com', '54123', 'lahiru45@gmail.com'),
(52, '65251999', 'Lahiru Udawaththa', '3235', 'lahiru45@gmail.com', '235', 'lahiru45@gmail.com'),
(53, '980151999', 'reshmitha', '778452145', '23', '224', '23'),
(54, '980151999', 'Lahiru Udawaththa', '21457744', 'jan', '331', 'jan'),
(55, '65251999', 'Lahiru Udawaththa', '2642111', '23', '235', '23'),
(56, '65251999', 'Lahiru Udawaththa', '262562', 'lahiru45@gmail.com', '235', 'lahiru45@gmail.com'),
(57, '65251999', 'Lahiru Udawaththa', '56456', 'lahiru45@gmail.com', '456', 'lahiru45@gmail.com'),
(58, '65251999', 'Lahiru Udawaththa', '2254698513', 'lahiru45@gmail.com', '54123', 'lahiru45@gmail.com'),
(59, '65251999', 'Lahiru Udawaththa', '561632.53', 'jan', '235', 'jan'),
(60, '980151999', 'Lahiru Udawaththa', '6262', 'fbfc ', '235', 'fbfc ');

-- --------------------------------------------------------

--
-- Table structure for table `reception_db`
--

CREATE TABLE `reception_db` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `User_Name` varchar(10) NOT NULL,
  `ID_Number` varchar(20) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Telephone_Number` int(10) NOT NULL,
  `City` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Last_Login` datetime NOT NULL,
  `Block_Unblock` tinyint(1) NOT NULL,
  `User_Delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_db`
--
ALTER TABLE `admin_db`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`Appointment_ID`);

--
-- Indexes for table `doctor_add_schedule`
--
ALTER TABLE `doctor_add_schedule`
  ADD PRIMARY KEY (`Schedule_ID`);

--
-- Indexes for table `doctor_db`
--
ALTER TABLE `doctor_db`
  ADD PRIMARY KEY (`Doctor_ID`);

--
-- Indexes for table `paction_db`
--
ALTER TABLE `paction_db`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `reception_db`
--
ALTER TABLE `reception_db`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_db`
--
ALTER TABLE `admin_db`
  MODIFY `User_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `Appointment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `doctor_add_schedule`
--
ALTER TABLE `doctor_add_schedule`
  MODIFY `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `doctor_db`
--
ALTER TABLE `doctor_db`
  MODIFY `Doctor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `paction_db`
--
ALTER TABLE `paction_db`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reception_db`
--
ALTER TABLE `reception_db`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
