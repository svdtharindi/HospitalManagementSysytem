-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 01:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `AppointmnetID` int(11) NOT NULL,
  `PatientID` varchar(5) NOT NULL,
  `PatientName` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Doctor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`AppointmnetID`, `PatientID`, `PatientName`, `Date`, `Time`, `Doctor`) VALUES
(1, '69', 'Randila', '2022-11-15', '17:09:00', 'Dilasha');

-- --------------------------------------------------------

--
-- Table structure for table `insertcost2`
--

CREATE TABLE `insertcost2` (
  `PID` varchar(10) NOT NULL,
  `Pdetails` varchar(20) NOT NULL,
  `Rcost` double NOT NULL,
  `StaffCharge` double NOT NULL,
  `Medicost` double NOT NULL,
  `Discount` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insertcost2`
--

INSERT INTO `insertcost2` (`PID`, `Pdetails`, `Rcost`, `StaffCharge`, `Medicost`, `Discount`, `date`) VALUES
('69', 'Randila', 100, 0, 0, 45, '2022-11-02'),
('69', 'Randila', 100, 200, 400, 45, '2022-11-02'),
('0', 'Dilasha', 100, 544, 323, 4435, '2022-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `MedID` varchar(5) NOT NULL,
  `ProductName` varchar(40) NOT NULL,
  `Manufacture` varchar(30) NOT NULL,
  `Problem` varchar(20) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Price` double NOT NULL,
  `Availability` int(11) NOT NULL,
  `ExpiryDate` date NOT NULL,
  `tempID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`MedID`, `ProductName`, `Manufacture`, `Problem`, `Category`, `Price`, `Availability`, `ExpiryDate`, `tempID`) VALUES
('M0001', 'Acetaminonher', 'Kimberly Clark Lever Ltd', 'Aches', 'Medication', 30, 150, '2024-11-14', 1),
('M0002', 'Abble Syrup', 'Kar Laboratory', 'Cough', 'Syrup', 1000, 50, '2024-11-15', 2),
('M0003', 'Benadryl (25mg)', 'BCD Pvt Ltd', 'Allergy', 'Skin', 400.5, 20, '2024-11-20', 3),
('M0004', 'Acetaminophen Liquid(500mg)', 'Acdnee Pvt Ltd', 'Aches', 'Medication', 350.5, 50, '2024-11-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orderinventory`
--

CREATE TABLE `orderinventory` (
  `OrderID` int(11) NOT NULL,
  `MedID` varchar(10) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalCost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderinventory`
--

INSERT INTO `orderinventory` (`OrderID`, `MedID`, `Quantity`, `TotalCost`) VALUES
(12, '', 12, 0),
(13, '', 12, 0),
(14, '', 12, 0),
(15, '', 12, 0),
(16, '', 15, 0),
(17, '', 12, 0),
(18, '', 12, 0),
(19, '', 12, 0),
(22, '', 2, 0),
(23, '', 2, 0),
(24, '', 20, 0),
(25, '', 20, 0),
(26, '', 20, 0),
(27, '', 6, 0),
(28, '', 6, 0),
(29, '', 9, 0),
(30, '', 9, 0),
(31, '', 3, 0),
(32, '', 3, 0),
(33, '', 4, 0),
(34, '', 3, 0),
(35, '', 25, 0),
(36, '', 25, 0),
(37, '', 25, 0),
(38, '', 54, 0),
(39, '', 34, 0),
(40, '', 23, 0),
(41, '', 0, 0),
(42, '', 0, 0),
(43, '', 99, 99000),
(44, '', 0, 0),
(45, '', 99, 2970),
(46, '', 99, 2970),
(48, '2', 5, 67),
(49, '2', 2, 7),
(50, 'M0003', 170, 68085),
(51, 'M0003', 0, 0),
(52, 'M0003', 888, 355644),
(53, 'M0003', 54, 21627);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PatientID` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `age` varchar(2) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `MobileNumber` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `doctor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `FirstName`, `Lastname`, `DOB`, `age`, `Gender`, `MobileNumber`, `email`, `address`, `doctor`) VALUES
(1, 'Randila', 'Senath', '2022-11-15', '', 'Male', '0713400371', 'randila@gmail.com', '271/1/A,Asiri Place', 'Saveen'),
(2, 'Randila', 'Senath', '2022-11-15', '', 'Male', '0713400371', 'randila@gmail.com', '271/1/A,Asiri Place', 'Saveen'),
(3, 'Dinithi', 'Abey', '2005-07-14', '', 'Female', '0123456789', 'dinithi@gmail.com', '123,Angoda', 'Randila'),
(4, 'Dilasha', 'Tharindi', '2022-11-12', '', 'Female', '0123987654', 'Dilasha@gmail.com', '123,Kadawatha', 'Randila'),
(5, 'Saveen', 'Malinga', '2022-11-08', '', 'Male', '0712345674', 'saveen@gmail.com', '271/1/Piliyandala', 'Randila');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LatName` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `streetAddress` varchar(30) NOT NULL,
  `City` varchar(10) NOT NULL,
  `Province` varchar(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `department` varchar(20) NOT NULL,
  `emp_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `FirstName`, `LatName`, `DOB`, `Gender`, `NIC`, `Mobile`, `email`, `streetAddress`, `City`, `Province`, `image`, `qualification`, `department`, `emp_type`) VALUES
(69, 'Randila', 'Senath', '2001-09-23', 'Male', '20012931731', '0712345678', 'randila@gmail.com', 'bonk,dinosaurus,malabe', 'Colombo', 'Western', 'staffImage/staff1', 'bonking', 'OPD', 'Doctor'),
(420, 'Saveen', 'Malinga', '2001-07-23', 'Male', '20012935731', '0712345578', 'saveen@gmail.com', 'bonk,dinosaurus,malabe', 'Colombo', 'Western', 'staffImage/staff2', 'bonking', 'OPD', 'Doctor'),
(421, 'Dinithi', 'Abey', '2022-11-09', 'Female', '200212347589', '0712345678', 'dinithi@gmail.com', '292/Battaramulle', 'Battaramul', 'Colombo', 'staffImage/', 'Bonking', 'Inpatient Service (I', ''),
(422, 'Chathushi', 'Gune', '2022-11-08', 'Female', '200212347589', '0718886746', 'chathushi@gmail.com', '271/1/Borella', 'Borella', 'Colombo', 'staffImage/', 'Bonking', 'Medical Department', ''),
(423, 'Dilasha', 'Tharindi', '2022-11-09', 'Female', '200214567589', '0987654321', 'dilasha@gamail.com', '01/Kadawatha', 'Kadawatha', 'Gamapaha', 'staffImage/', 'Bonking', 'Paramedical Departme', 'Doctor'),
(424, 'John', 'Bob', '2022-11-10', 'Male', '200212347589', '0712304957', 'john@gmail.com', '243,New York', 'New York', 'New York', 'staffImage/', 'king kong', 'Inpatient Service (I', 'Physicians'),
(425, 'Randila', 'Senath', '2022-11-01', 'Male', '200212347589', '0713400371', 'senath@gmail.com', '271/1/A,Asiri Place', 'Malabe', 'Colombo', 'staffImage/', 'killua', 'Nursing Department', 'Physicians'),
(426, 'Randila', 'Senath', '2022-11-10', 'Male', '200212347589', '0713400371', 'senath@gmail.com', '271/1/A,Asiri Place', 'Malabe', 'Colombo', 'imgPath/', 'akaza', 'Outpatient departmen', 'Physicians'),
(427, 'Randila', 'Senath', '2022-11-09', 'Male', '200212347589', '0713400371', 'senath@gmail.com', '271/1/A,Asiri Place', 'Malabe', 'Colombo', 'imgPath/', 'devil man', 'Medical Department', 'Physicians');

-- --------------------------------------------------------

--
-- Table structure for table `useracccount`
--

CREATE TABLE `useracccount` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `accountType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppointmnetID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`MedID`);

--
-- Indexes for table `orderinventory`
--
ALTER TABLE `orderinventory`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `AppointmnetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderinventory`
--
ALTER TABLE `orderinventory`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
