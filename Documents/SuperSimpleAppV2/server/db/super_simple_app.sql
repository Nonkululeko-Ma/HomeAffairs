-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 10:26 AM
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
-- Database: `super_simple_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `name` varchar(100) NOT NULL,
                        `surname` varchar(100) NOT NULL,
                        `id_number` int(11) NOT NULL,
                        `email` varchar(100) NOT NULL,
                        `gender` enum('Male','Female') NOT NULL,
                        `age` int(3) NOT NULL,
                        `phone_number` int(13) NOT NULL,
                        `town` enum('Queenstown','Gqeberha','Engcobo','Middledrift','Bizana','Mount Ayliff','Mount fere','Willowvale','Centane','Butterworth','Cradock','Cleary','Motherwell','Uitenhage','East London','Bisho','Mdatsane','Somerset East','Graaff','Humansdorp','Grahhamstown','Port Alfred','Burgersdorp','Aliwa North','Sterkspuit','mthatha','Qumbu','Tsolo','Libode','Engqeleni','Lusikisiki','Buffalo City','Nelson Mandela Bay','Chris Han','OR Tambo') NOT NULL,
                        `services` enum('Birth Certificate','Identity Document','Marriage Certificate','Death Certificate','Adoption','Citizenship','Amendments','Travel Document','Parent Consent Affidavit ZA','Qualified Imams','Abis') NOT NULL,
                        `notifications` enum('Sms','Email') NOT NULL,
                        `version` int(11) NOT NULL DEFAULT 1,
                        `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
