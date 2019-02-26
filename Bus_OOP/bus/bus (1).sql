-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `admin`
--

INSERT INTO `admin` (`username`, `id_admin`, `password`, `status`) VALUES
('admin', 1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `bustype`
--

CREATE TABLE IF NOT EXISTS `bustype` (
  `bustype_id` int(11) NOT NULL AUTO_INCREMENT,
  `bustype_name` varchar(150) NOT NULL,
  `carnumber` int(10) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`bustype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- dump ตาราง `bustype`
--

INSERT INTO `bustype` (`bustype_id`, `bustype_name`, `carnumber`, `unit_id`, `emp_id`) VALUES
(1, 'แอร์', 0, 0, 0),
(2, 'VIP2', 2, 0, 0),
(3, 'Normal2', 2, 0, 0),
(4, 'vs', 23, 0, 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_save_emp` date NOT NULL,
  `emp_tel` varchar(10) NOT NULL,
  `emp_address` text NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- dump ตาราง `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `username`, `password`, `date_save_emp`, `emp_tel`, `emp_address`) VALUES
(1, 'qwe', 'qweqweqwe', 'qweqweqwe', '2016-03-15', '123123123', 'qwdasdasd'),
(5, 'eee', '123456789', '123456789', '2016-03-29', '0945604294', 'sfgw');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_booking` varchar(10) NOT NULL,
  `time_booking` time NOT NULL,
  `seat_no` varchar(7) NOT NULL,
  `id_rou` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pay_price` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- dump ตาราง `reservation`
--

INSERT INTO `reservation` (`res_id`, `date_booking`, `time_booking`, `seat_no`, `id_rou`, `id_user`, `id_pay_price`, `status`) VALUES
(20, '30/03/2559', '00:00:00', '1', 1, 5, '', '0'),
(21, '30/03/2559', '00:00:00', '2', 1, 11, '', '0'),
(22, '30/03/2559', '00:00:00', '14', 1, 11, '', '0'),
(23, '30/03/2559', '00:00:00', '2', 1, 5, '', '0'),
(28, '30/03/2559', '00:00:00', '2', 1, 5, '', '0'),
(29, '30/03/2559', '00:00:00', '3', 1, 12, '', '0'),
(30, '30/03/2559', '00:00:00', '4', 1, 13, '', '0'),
(31, '30/03/2559', '00:00:00', '4', 1, 13, '', '0'),
(35, '29/03/2559', '00:00:00', '2', 3, 5, '', '1'),
(43, '31/03/2559', '00:00:00', '1', 8, 17, '56faee35ce553', '1');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `rou_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_time` varchar(10) NOT NULL,
  `arr_time` varchar(10) NOT NULL,
  `begin_travel` varchar(15) NOT NULL,
  `end_travel` varchar(15) NOT NULL,
  `price` int(11) NOT NULL,
  `status_go` varchar(1) NOT NULL,
  `date_go` varchar(10) NOT NULL,
  `date_gone` varchar(10) NOT NULL,
  `id_bustype` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  PRIMARY KEY (`rou_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- dump ตาราง `route`
--

INSERT INTO `route` (`rou_id`, `dep_time`, `arr_time`, `begin_travel`, `end_travel`, `price`, `status_go`, `date_go`, `date_gone`, `id_bustype`, `id_emp`) VALUES
(3, '07:00:00', '22:00:00', 'เชียงใหม่', 'นครนายก', 222, '0', '07/04/2559', '08/04/2559', 2, 0),
(4, '20:00:00', '10:00:00', 'กรุงเทพมหานคร', 'กระบี่', 123, '1', '31/03/2559', '1/04/2559', 2, 0),
(5, '10:00:00', '12:00:00', 'ฉะเชิงเทรา', 'จันทบุรี', 2345, '0', '08/04/2559', '08/04/2559', 3, 0),
(7, '04:00:00', '15:00:00', 'กรุงเทพมหานคร', 'กระบี่', 300, '0', '31/03/2559', '1/04/2559', 2, 0),
(8, '10:00:00', '15:00:00', 'กรุงเทพมหานคร', 'กาญจนบุรี', 200, '0', '07/04/2559', '08/04/2559', 1, 0),
(9, '10:20:00', '19.30.00', 'กรุงเทพมหานคร', 'อุบลราชธานี', 500, '0', '30/04/2559', '08/04/2559', 1, 0),
(10, '08:12:00', '15:20:00', 'กรุงเทพมหานคร', 'ขอนแก่น', 200, '0', '07/04/2559', '08/04/2559', 2, 0),
(12, '07:20:00', '16.30.00', 'กรุงเทพมหานคร', 'กาญจนบุรี', 200, '1', '07/04/2559', '08/04/2559', 2, 0),
(13, '22:20:00', '20:20:00', 'กรุงเทพมหานคร', 'กำแพงเพชร', 500, '0', '31/03/2559', '08/04/2559', 1, 0),
(14, '12:00:00', '19:00:00', 'กรุงเทพมหานคร', 'กำแพงเพชร', 400, '0', '31/03/2559', '31/03/2559', 1, 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `date_save_unit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_pid` varchar(13) NOT NULL,
  `user_sex` varchar(1) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` varchar(10) NOT NULL,
  `date_save` varchar(10) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- dump ตาราง `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_username`, `user_pid`, `user_sex`, `user_email`, `user_tel`, `date_save`, `emp_id`) VALUES
(1, 'thelnwaon', 'thelnwaon', '1340400192280', '0', 'thelnwaon@hotmai.com', '0944306060', '0000-00-00', 0),
(2, 'qweqweqew', 'qweqewqwe', '1340400192280', '0', 'qweqwe@qweqwe', '123123123', '2016-03-28', 0),
(3, '12123123', '123123123', '1321231231231', '0', '', '123123', '2016-03-29', 0),
(4, '123123123', '12312312', '1340400192323', '1', '', '123123123', '2016-03-29', 0),
(5, 'thelnwaon', 'qweqweqweqw', '1231231231231', '0', '', '123123123', '2016-03-29', 0),
(6, 'peepoooo', 'kdsflaksd', '1231231231321', '0', '', '21313123', '2016-03-29', 0),
(7, 'peepoooo', '1231213132', '123123123', '1', '', '23123123', '2016-03-30', 0),
(8, 'asdasd2323', 'asdasd23232', '1313123123132', '0', '', '1231231321', '2016-03-30', 0),
(9, 'sdfsdfsdf', 'sdfsdfsdfs', '1312323232323', '1', '', '123123123', '2016-03-30', 0),
(10, 'qeweqweq', 'qwe453543', '4545451231233', '0', '', '23232', '2016-03-30', 0),
(11, '232323123123', '23123123123', '2323231321231', '0', '', '123123132', '2016-03-30', 0),
(12, 'qweqwe', 'weqeqwe', '1312312312312', '1', '', '1231321231', '2016-03-30', 0),
(13, '123123', '12312', '3123123', '1', '', '123123123', '2016-03-30', 0),
(14, '123123', '1231231', '2312312312312', '0', '', '3123123123', '2016-03-30', 0),
(15, '123123123', '123123', '123123', '0', '', '123123123', '2016-03-30', 0),
(16, 'qweqweq', 'weqweqw', '1231231212312', '0', '', '3132123123', '2016-03-30', 0),
(17, 'qweqwe', 'qweqwe', '123123123123', '0', '', '123123', '2016-03-30', 0),
(18, '23q2312', '313212', '3123123123123', '1', '', '1231231231', '31/03/2559', 0),
(19, '12121212', '121212', '1212121212121', '0', '', '1212121212', '31/03/2559', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
