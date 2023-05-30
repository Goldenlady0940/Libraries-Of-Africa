-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2023 at 06:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(25) NOT NULL,
  `adminPass` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminPass`) VALUES
(1, 'admin', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `bookManage`
--

CREATE TABLE `bookManage` (
  `bookIdfk` int(11) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `authorName` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `price` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookManage`
--

INSERT INTO `bookManage` (`bookIdfk`, `bookname`, `authorName`, `quantity`, `status`, `price`) VALUES
(15, 'dont give up', 'keven harth', 40, 'Available', 52),
(14, 'chech', 'jkh', 23, 'Available', 99);

-- --------------------------------------------------------

--
-- Table structure for table `book_genre`
--

CREATE TABLE `book_genre` (
  `GENRE_ID` int(11) NOT NULL,
  `GENRE_NAME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_genre`
--

INSERT INTO `book_genre` (`GENRE_ID`, `GENRE_NAME`) VALUES
(4, 'SCIENTIFIC BOOKS'),
(5, 'BIOGRAPHY BOOKS'),
(6, 'KIDS BOOKS');

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `GENRE_ID` int(11) NOT NULL,
  `GENRE_NAME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`GENRE_ID`, `GENRE_NAME`) VALUES
(1, 'SCIENTIFIC BOOKS'),
(2, 'BIOGRAPHY BOOKS'),
(3, 'KIDS BOOKS');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `COUNTRY_ID` int(11) NOT NULL,
  `COUNTRY_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`COUNTRY_ID`, `COUNTRY_NAME`) VALUES
(1, 'NIGERIA'),
(2, 'ETHIOPIA'),
(3, 'EGYPT'),
(4, 'CONGO'),
(5, 'SOUTH AFRICA'),
(6, 'MOROCCO'),
(7, 'SUDAN'),
(8, 'GHANA'),
(9, 'CAMEROON'),
(10, 'MALI'),
(11, 'ERITERA'),
(12, 'BOTSWANA'),
(13, 'LESOTHO'),
(14, 'DJIBOUTI');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `passwords` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `passwords`) VALUES
('sebu', 'admin'),
('yas', 'admin'),
('yas', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `new_book`
--

CREATE TABLE `new_book` (
  `BOOK_ID` int(11) NOT NULL,
  `BOOK_FKID` int(11) NOT NULL,
  `BOOK_NAME` varchar(30) NOT NULL,
  `AUTHOR` varchar(20) NOT NULL,
  `PRICE` decimal(50,0) NOT NULL,
  `PDF` varchar(300) NOT NULL,
  `COVER` varchar(400) NOT NULL,
  `BOOK_GENRE_FKID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_book`
--

INSERT INTO `new_book` (`BOOK_ID`, `BOOK_FKID`, `BOOK_NAME`, `AUTHOR`, `PRICE`, `PDF`, `COVER`, `BOOK_GENRE_FKID`) VALUES
(12, 2, 'some2', 'author2', 66, 'pdf', 'cover', 1),
(13, 3, 'ADD', 'ADDAUTHOR', 66, 'PDF LINK', 'COVER', 3),
(14, 4, 'chech', 'jkh', 99, 'pdf2', 'cover2', 1),
(15, 13, 'dont give up', 'keven harth', 5, 'dont pdf', 'some pic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_library`
--

CREATE TABLE `new_library` (
  `LIB_ID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `LOCATION` varchar(40) NOT NULL,
  `WIKI_LINK` varchar(50) NOT NULL,
  `LIB_PASS_WORD` varchar(20) NOT NULL,
  `colib_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_library`
--

INSERT INTO `new_library` (`LIB_ID`, `NAME`, `LOCATION`, `WIKI_LINK`, `LIB_PASS_WORD`, `colib_ID`) VALUES
(2, 'National Library of Nigeria', '', 'som link', 'sdf', 1),
(3, 'additional library in nigeria', '', 'some link', 'kkkjgju', 1),
(4, 'some other library', '', 'link', 'sdfghj', 1),
(5, 'ABRHOT', '', 'SDF', 'GHJ', 2),
(6, 'ABRHOT', 'ETHIOPIA', 'HTTPS://ABRHOT.COM', '544', 2),
(11, 'abrhot', 'EGYPT', 'https://abrhot', 'v%m#yek)9dxJ', 3),
(12, 'abrhot', 'EGYPT', 'https://abrhot.com', 'ImAD9ns)dE@Q', 3),
(13, 'wemezekr', 'ETHIOPIA', 'https://wemezekr', 'pjH(sM5Uu83K', 2),
(14, 'checklib', 'EGYPT', 'https://checklib', 'Ue!tp60BG!Hg', 3),
(15, 'check2', 'MOROCCO', 'moroco', '$%Mv!#^!ULeE', 6),
(16, 'check', 'SUDAN', 'sudan', 'Y1gAzMs0ItVB', 7);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(100) NOT NULL,
  `customerId` int(100) NOT NULL,
  `bookIdOr` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `Name`, `Gender`, `Username`, `Password`, `Country`, `City`, `Region`) VALUES
(0, 'f', 'f', 'd', 'f', 'f', 'f', 'f'),
(1, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff2`
--

CREATE TABLE `staff2` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff2`
--

INSERT INTO `staff2` (`id`, `name`, `gender`, `country`) VALUES
(1, 'abe', 'femae', 'eth');

-- --------------------------------------------------------

--
-- Table structure for table `user account`
--

CREATE TABLE `user account` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(30) NOT NULL,
  `LAST_NAME` varchar(30) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `NATIONAL_ID` varchar(20) NOT NULL,
  `COUNTRY` varchar(20) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `REGION` varchar(30) NOT NULL,
  `USER_NAME` varchar(30) NOT NULL,
  `PASS_WORD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `PHONE`, `EMAIL`, `NATIONAL_ID`, `COUNTRY`, `CITY`, `REGION`, `USER_NAME`, `PASS_WORD`) VALUES
(1, 'SEBRINA', 'ABDUL', 'FEMALE', '+25987563423', 'SEBU@GMAIL.COM', '123456789', 'ETHIOPIA', 'ADDIS ABABA', 'ADDIS ABABA', 'SEBU', '123'),
(3, 'abebe', 'chala', 'male', '123456789', 'abe@gmail.com', '09876543', 'eth', 'add', 'add', 'ABE', '000'),
(6, 'chala', 'ghjk', 'yuio', 'yuio', 'rtyujikl', 'fghjkl', 'fghjkl', 'fghjkl', 'dfghjkl', 'new', '000'),
(7, 'ghj', 'fghjk', 'fghj', '098765', 'vbhj@gmail.com', 'xcvbnm', 'cvbnm', 'cvbnm', 'cvbnm', 'new2', '000'),
(8, 'fghj', 'fghjk', 'fghjk', '9876543', 'fghjk@gmail.cm', 'dfghjkl', 'ghjk', 'ghk', 'fghjkl', 'new3', '999'),
(9, 'ABDU', 'KERIM', 'MALE', '096555555', 'ABD@GMAIL.COM', '8765', 'ETH', 'ADD', 'ADD', 'ABDU', '123'),
(10, 'abdul', 'rezak', 'male', '2345678', 'jhj@gmail.com', '0987', 'eth', 'add', 'add', 'UU', '66'),
(11, 'abdul', 'rezak', 'male', '2345678', 'jhj@gmail.com', '0987', 'eth', 'add', 'add', 'CHH', '6'),
(12, 'abdul', 'rezak', 'male', '2345678', 'jhj@gmail.com', '0987', 'eth', 'add', 'add', 'CH', 'H'),
(13, '', '', '', '', '', '', '', '', '', '', ''),
(14, 'yasmin', 'ahmed', 'female', '098765432', 'yas@gmail.com', '09876543', 'eth', 'add', 'add', 'yas', '000'),
(15, 'yas', 'ahm', 'female', '0987654321', 'yas@gmail.com', '123456789', 'ethiopia', 'addisababa', 'nefassilk', 'yasah', 'yasah');

-- --------------------------------------------------------

--
-- Table structure for table `user login`
--

CREATE TABLE `user login` (
  `ID` int(11) NOT NULL,
  `FIRST NAME` varchar(30) NOT NULL,
  `LAST NAME` varchar(30) NOT NULL,
  `GENDER` varchar(7) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `EMAIL` varchar(25) NOT NULL,
  `NATIONAL ID` varchar(15) NOT NULL,
  `COUNTRY` varchar(20) NOT NULL,
  `CITY` varchar(15) NOT NULL,
  `PROFILE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user login`
--

INSERT INTO `user login` (`ID`, `FIRST NAME`, `LAST NAME`, `GENDER`, `PHONE`, `EMAIL`, `NATIONAL ID`, `COUNTRY`, `CITY`, `PROFILE`) VALUES
(1, 'sebrin', 'abdul', 'female', '+251-9999999999', 'sebu@gmail.com', '0987654', 'ethiopia', 'addis ababa', 'something here');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookManage`
--
ALTER TABLE `bookManage`
  ADD KEY `bookIdfk` (`bookIdfk`);

--
-- Indexes for table `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`GENRE_ID`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`GENRE_ID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`COUNTRY_ID`);

--
-- Indexes for table `new_book`
--
ALTER TABLE `new_book`
  ADD PRIMARY KEY (`BOOK_ID`),
  ADD KEY `ID` (`BOOK_FKID`),
  ADD KEY `BOOK_GENRE_FKID` (`BOOK_GENRE_FKID`);

--
-- Indexes for table `new_library`
--
ALTER TABLE `new_library`
  ADD PRIMARY KEY (`LIB_ID`),
  ADD KEY `colib_ID` (`colib_ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `bookIdOr` (`bookIdOr`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user account`
--
ALTER TABLE `user account`
  ADD KEY `FOREIGN KEY` (`ID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user login`
--
ALTER TABLE `user login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_genre`
--
ALTER TABLE `book_genre`
  MODIFY `GENRE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_genres`
--
ALTER TABLE `book_genres`
  MODIFY `GENRE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `COUNTRY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `new_book`
--
ALTER TABLE `new_book`
  MODIFY `BOOK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `new_library`
--
ALTER TABLE `new_library`
  MODIFY `LIB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookManage`
--
ALTER TABLE `bookManage`
  ADD CONSTRAINT `bookmanage_ibfk_1` FOREIGN KEY (`bookIdfk`) REFERENCES `new_book` (`BOOK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `new_book`
--
ALTER TABLE `new_book`
  ADD CONSTRAINT `new_book_ibfk_1` FOREIGN KEY (`BOOK_FKID`) REFERENCES `new_library` (`LIB_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `new_book_ibfk_2` FOREIGN KEY (`BOOK_GENRE_FKID`) REFERENCES `book_genres` (`GENRE_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `new_library`
--
ALTER TABLE `new_library`
  ADD CONSTRAINT `new_library_ibfk_1` FOREIGN KEY (`colib_ID`) REFERENCES `country` (`COUNTRY_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`bookIdOr`) REFERENCES `new_book` (`BOOK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user account`
--
ALTER TABLE `user account`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`ID`) REFERENCES `user login` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
