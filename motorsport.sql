-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 06:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorsport`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateage` ()   BEGIN
DECLARE x DATE;
SELECT sysdate() into x;
update personnel
SET age=year(x)-year(birthdate);
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `validatecap` (`Department_ID` VARCHAR(50)) RETURNS VARCHAR(50) CHARSET utf8mb4 DETERMINISTIC BEGIN
	declare cap int;
    declare d date;
    DECLARE VALUE varchar(50);
	select count into  cap from departmentcap where departmentcap.Department_ID = Department_ID;
	
	
	IF cap>3 then
		set VALUE="Cannot Assign Projects";
    ELSE     
		set VALUE ="Can Assign Projects";	
  end if;
  return value;      
  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `alogin`
--

CREATE TABLE `alogin` (
  `id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alogin`
--

INSERT INTO `alogin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'rajat', 'rajat');

-- --------------------------------------------------------

--
-- Stand-in structure for view `departmentcap`
-- (See below for the actual view)
--
CREATE TABLE `departmentcap` (
`Department_ID` int(2)
,`Department_Name` char(20)
,`Count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `Transaction_ID` int(20) NOT NULL,
  `Description` varchar(40) DEFAULT NULL,
  `Amount` int(10) DEFAULT NULL,
  `Incharge_ID` int(20) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finances`
--

INSERT INTO `finances` (`Transaction_ID`, `Description`, `Amount`, `Incharge_ID`, `Date`) VALUES
(123, 'Engine Research', 50000, NULL, '2022-11-05'),
(345, 'Staff Event', 100000, NULL, '2022-11-30'),
(789, '2023 Car Development', 1450000, 13, '2022-11-24'),
(3456, 'F1 Payments', 460000, 13, '2022-11-15'),
(4215, 'Chassis Repair', 55000, 13, '2022-09-06'),
(6985, 'Podium Celebration Party', 15000, 13, '2022-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `firstname` char(20) NOT NULL,
  `lastname` char(20) DEFAULT NULL,
  `personnel_id` int(10) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `superior_id` int(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`firstname`, `lastname`, `personnel_id`, `designation`, `superior_id`, `birthdate`, `age`) VALUES
('Christian', 'Horner', 1, 'Team Principal', NULL, '1973-11-16', 49),
('Max', 'Verstappen', 2, 'Driver-1', 1, '1994-10-26', 28),
('Daniel', 'Ricciardo', 3, 'Driver-2', 1, '1986-08-25', 36),
('Pierre', 'Lambiassi', 4, 'Race Engineer', 1, '1982-06-10', 40),
('Adrian', 'Newey', 9, 'Head of Aerodynamics', 1, '1976-03-10', 46),
('Rajat', 'Rayaraddi', 13, 'Finance Manager', 1, NULL, NULL),
('Fahad', 'Bore', 23, 'Aerodynamic Staff', 9, '1993-01-24', NULL),
('Trus', 'Wachwaski', 24, 'Aerodynamic Staff', 9, '1990-07-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Part_Name` varchar(20) DEFAULT NULL,
  `ProjectNo` int(5) NOT NULL,
  `Department_ID` int(2) NOT NULL,
  `Status` char(20) DEFAULT NULL,
  `Expected_Date` date DEFAULT NULL,
  `Impact` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Part_Name`, `ProjectNo`, `Department_ID`, `Status`, `Expected_Date`, `Impact`) VALUES
('Valve', 1, 2, 'Integrated', '2022-10-10', 12),
('Front Wing', 2, 1, 'Integrated', '2022-08-11', 33),
('Rear Wing Vanes', 4, 1, 'Pending', '2022-11-13', 21),
('Cockpit', 8, 3, 'Pending', '2023-03-02', 22),
('Lightweight Pistons', 10, 2, 'Developing', '2022-12-01', 34),
('Engine Cover', 11, 3, 'Pending', '2022-05-10', 31),
('Gearbox Reliability', 15, 4, 'Pending', '2022-06-08', 8);

-- --------------------------------------------------------

--
-- Table structure for table `race_report`
--

CREATE TABLE `race_report` (
  `Race_ID` varchar(20) NOT NULL,
  `Race_Name` char(20) DEFAULT NULL,
  `Driver_1_Position` int(2) DEFAULT NULL,
  `Driver_2_Position` int(2) DEFAULT NULL,
  `Incharge_ID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `race_report`
--

INSERT INTO `race_report` (`Race_ID`, `Race_Name`, `Driver_1_Position`, `Driver_2_Position`, `Incharge_ID`) VALUES
('2', 'Italian Grand Prix', 2, 3, NULL),
('18', 'British Grand Prix', 1, 3, NULL),
('45', 'Monaco Grand Prix', 9, 13, NULL),
('15', 'Belgian Grand Prix', 2, 19, NULL),
('3', 'Brazilian Grand Prix', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `race_schedule`
--

CREATE TABLE `race_schedule` (
  `Track_Name` char(20) DEFAULT NULL,
  `Race_ID` varchar(20) NOT NULL,
  `Race_Date` date DEFAULT NULL,
  `Predicted_Forecast` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `race_schedule`
--

INSERT INTO `race_schedule` (`Track_Name`, `Race_ID`, `Race_Date`, `Predicted_Forecast`) VALUES
('Spa Francorchamps', '15', '2022-09-14', 'Light Rain'),
('Silverstone', '18', '2019-11-12', 'Clear'),
('Monza', '2', '2021-06-14', 'Cloudy'),
('Interlagos', '3', '2021-10-10', 'Rainy'),
('Cicuit de Monaco', '45', '2022-06-14', 'Clear'),
('Baku City Circuit', '60', '2022-08-10', 'Sunny');

-- --------------------------------------------------------

--
-- Table structure for table `rd_departments`
--

CREATE TABLE `rd_departments` (
  `Department_Name` char(20) DEFAULT NULL,
  `Department_ID` int(2) NOT NULL,
  `Manager_ID` int(20) DEFAULT NULL,
  `Manager_Start_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_departments`
--

INSERT INTO `rd_departments` (`Department_Name`, `Department_ID`, `Manager_ID`, `Manager_Start_Date`) VALUES
('Aerodynamics', 1, 9, '2000-01-01'),
('Powertrain', 2, NULL, NULL),
('Chassis', 3, NULL, NULL),
('Reliability', 4, NULL, NULL);

--
-- Triggers `rd_departments`
--
DELIMITER $$
CREATE TRIGGER `checkdepartmentcount` BEFORE INSERT ON `rd_departments` FOR EACH ROW BEGIN
    IF (SELECT COUNT(*) FROM rd_departments) >= 4 THEN
      SIGNAL SQLSTATE '50001' SET MESSAGE_TEXT = 'Cannot add more than 4 departments.';
    END IF;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `departmentcap`
--
DROP TABLE IF EXISTS `departmentcap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmentcap`  AS   (select `projects`.`Department_ID` AS `Department_ID`,`rd_departments`.`Department_Name` AS `Department_Name`,count(`projects`.`ProjectNo`) AS `Count` from (`projects` join `rd_departments` on(`projects`.`Department_ID` = `rd_departments`.`Department_ID`)) group by `projects`.`Department_ID`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alogin`
--
ALTER TABLE `alogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`Transaction_ID`),
  ADD KEY `Overlooks` (`Incharge_ID`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`personnel_id`),
  ADD KEY `Supervises` (`superior_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ProjectNo`),
  ADD KEY `Handles` (`Department_ID`);

--
-- Indexes for table `race_report`
--
ALTER TABLE `race_report`
  ADD KEY `Provides` (`Incharge_ID`),
  ADD KEY `RaceID` (`Race_ID`);

--
-- Indexes for table `race_schedule`
--
ALTER TABLE `race_schedule`
  ADD PRIMARY KEY (`Race_ID`);

--
-- Indexes for table `rd_departments`
--
ALTER TABLE `rd_departments`
  ADD PRIMARY KEY (`Department_ID`),
  ADD KEY `Manages` (`Manager_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alogin`
--
ALTER TABLE `alogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `finances`
--
ALTER TABLE `finances`
  ADD CONSTRAINT `Overlooks` FOREIGN KEY (`Incharge_ID`) REFERENCES `personnel` (`personnel_id`);

--
-- Constraints for table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `Supervises` FOREIGN KEY (`superior_id`) REFERENCES `personnel` (`personnel_id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `Handles` FOREIGN KEY (`Department_ID`) REFERENCES `rd_departments` (`Department_ID`);

--
-- Constraints for table `race_report`
--
ALTER TABLE `race_report`
  ADD CONSTRAINT `Generated` FOREIGN KEY (`Race_ID`) REFERENCES `race_schedule` (`Race_ID`),
  ADD CONSTRAINT `Provides` FOREIGN KEY (`Incharge_ID`) REFERENCES `personnel` (`personnel_id`),
  ADD CONSTRAINT `RaceID` FOREIGN KEY (`Race_ID`) REFERENCES `race_schedule` (`Race_ID`);

--
-- Constraints for table `rd_departments`
--
ALTER TABLE `rd_departments`
  ADD CONSTRAINT `Manages` FOREIGN KEY (`Manager_ID`) REFERENCES `personnel` (`personnel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
