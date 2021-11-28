-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 08:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `value` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `value`, `date`) VALUES
(3, 'RGVsZXRlZCBiaW5naWk5MDEh', '01-11-2021'),
(4, 'RGVsZXRlZCBiaW5naWk5MDIh', '02-11-2021'),
(5, 'RGVsZXRlZCBiaW5naWk5MDMh', '02-11-2021'),
(6, 'RGVsZXRlZCBiaW5naWk5MDEh', '01-11-2021'),
(7, 'RGVsZXRlZCBiaW5naWk5MDIh', '02-11-2021'),
(8, 'RGVsZXRlZCBiaW5naWk5MDMh', '02-11-2021'),
(9, 'RGVsZXRlZCBiaW5naWk5MDEh', '01-11-2021'),
(10, 'RGVsZXRlZCBiaW5naWk5MDIh', '02-11-2021'),
(11, 'RGVsZXRlZCBiaW5naWk5MDMh', '02-11-2021'),
(12, 'RGVsZXRlZCBiaW5naWk5MDEh', '01-11-2021'),
(13, 'RGVsZXRlZCBiaW5naWk5MDIh', '02-11-2021'),
(14, 'RGVsZXRlZCBiaW5naWk5MDMh', '02-11-2021'),
(15, 'RGVsZXRlZCBiaW5naWk5MDIh', '02-11-2021'),
(16, 'RGVsZXRlZCBiaW5naWk5MDIh', '02-11-2021'),
(17, 'RGVsZXRlZCBiaW5naWk5MDIh', '02-11-2021'),
(18, 'RGVsZXRlZCBiaW5naWk5MDIh', '02-11-2021'),
(19, 'RGVsZXRlZCBiaW5naWk5MDIh', '02-11-2021'),
(20, 'RGVsZXRlZCAxMjEyIQ==', '02-11-2021'),
(21, 'RGVsZXRlZCBzdWJqZWN0cyBDb21wYW55IQ==', '02-11-2021'),
(22, 'RGVsZXRlZCBzdWJqZWN0cyBOYW1lIQ==', '02-11-2021'),
(23, 'RGVsZXRlZCBzdWJqZWN0cyAh', '02-11-2021'),
(24, 'RGVsZXRlZCBzdWJqZWN0cyBWxINuIQ==', '02-11-2021'),
(25, 'RGVsZXRlZCBzdWJqZWN0cyBWxINuIQ==', '02-11-2021'),
(26, 'RGVsZXRlZCBzdWJqZWN0cyBzZCE=', '02-11-2021'),
(27, 'RGVsZXRlZCBzdWJqZWN0cyBWxINuIDFmZGZkNjc2NyE=', '03-11-2021'),
(28, 'RGVsZXRlZCBzdWJqZWN0cyBWxINuIDEh', '03-11-2021'),
(29, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMiBzYW5nIFRlc3QgMyE=', '03-11-2021'),
(30, 'xJDDoyB0aMOqbSBuZ8aw4budaSBkw7luZyBHaWFuZyBOZ3V54buFbiBUcsaw4budbmch', '03-11-2021'),
(31, 'xJDDoyBjaOG7iW5oIHPhu61hIG5nxrDhu51pIGTDuW5nIEdpYW5nIE5ndXnhu4VuIFRyxrDhu51uZyE=', '03-11-2021'),
(32, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '03-11-2021'),
(33, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMyBzYW5nIFRlc3QgMyE=', '03-11-2021'),
(34, 'xJDDoyBjaOG7iW5oIHPhu61hIG5nxrDhu51pIGTDuW5nIEdpYW5nIE5ndXnhu4VuIFRyxrDhu51uZyE=', '03-11-2021'),
(35, 'xJDDoyBjaOG7iW5oIHPhu61hIG5nxrDhu51pIGTDuW5nIEdpYW5nIE5ndXnhu4VuIFRyxrDhu51uZyE=', '03-11-2021'),
(36, 'xJDDoyBjaOG7iW5oIHPhu61hIG5nxrDhu51pIGTDuW5nIEdpYW5nIE5ndXnhu4VuIFRyxrDhu51uZyE=', '04-11-2021'),
(37, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(38, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(39, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(40, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(41, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(42, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(43, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(44, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(45, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(46, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(47, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(48, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(49, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nICE=', '04-11-2021'),
(50, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nICE=', '04-11-2021'),
(51, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(52, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(53, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(54, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(55, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(56, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(57, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(58, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(59, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(60, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(61, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(62, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(63, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(64, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(65, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(66, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(67, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBUZXN0IDEh', '04-11-2021'),
(68, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(69, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(70, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(71, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(72, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(73, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(74, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(75, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(76, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(77, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(78, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(79, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(80, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(81, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(82, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(83, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(84, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(85, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(86, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(87, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(88, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(89, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIFRlc3QgMSBzYW5nIFRlc3QgMSE=', '04-11-2021'),
(90, 'xJDDoyB0aMOqbSBs4bubcCBo4buNYyBM4bubcCBo4buNYyB0w6xuaCBuZ2jEqWEh', '04-11-2021'),
(91, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBM4bubcCBo4buNYyB0w6xuaCBuZ2jEqWEh', '04-11-2021'),
(92, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIEzhu5twIGjhu41jIHTDrG5oIG5naMSpYSBzYW5nIEzhu5twIGjhu41jIHTDrG5oIG5naMSpYSE=', '04-11-2021'),
(93, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(94, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(95, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(96, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(97, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(98, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(99, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(100, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(101, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(102, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(103, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(104, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(105, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(106, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(107, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(108, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(109, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(110, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(111, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(112, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(113, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(114, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(115, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(116, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(117, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(118, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(119, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(120, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(121, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(122, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(123, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(124, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(125, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(126, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(127, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(128, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(129, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(130, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(131, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(132, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(133, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(134, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(135, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(136, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(137, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(138, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(139, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(140, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(141, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(142, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(143, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(144, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(145, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(146, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(147, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHEg25nIGvDvSBs4bubcCBM4bubcCBo4buNYyB0w6xuaCBuZ2jEqWEh', '04-11-2021'),
(148, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIEzhu5twIGjhu41jIHTDrG5oIG5naMSpYSBzYW5nIEzhu5twIGjhu41jIHTDrG5oIG5naMSpYSE=', '04-11-2021'),
(149, 'xJDDoyDEkeG7lWkgdMOqbiBs4bubcCBo4buNYyB04burIEzhu5twIGjhu41jIHTDrG5oIG5naMSpYSBzYW5nIEzhu5twIGjhu41jIHTDrG5oIG5naMSpYSE=', '04-11-2021'),
(150, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '04-11-2021'),
(151, 'TmfGsOG7nWkgZMO5bmcgYmluZ2lpOTAxIMSRw6MgxJHDoW5oIGdpw6EgbOG7m3AgTOG7m3AgaOG7jWMgdMOsbmggbmdoxKlhIQ==', '21-11-2021');

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `key_id` int(11) NOT NULL,
  `key` text NOT NULL,
  `data` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`key_id`, `key`, `data`, `value`) VALUES
(1, 'posts_per_page', 'Bài viết mỗi trang', '12'),
(2, 'home_path', 'Link trang chủ', 'http://localhost/project');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `userID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `price` text NOT NULL,
  `offer_to_teach` int(11) NOT NULL,
  `description` text NOT NULL,
  `schedule` text NOT NULL,
  `address` text NOT NULL,
  `map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `title`, `userID`, `status`, `subject_id`, `type`, `sex`, `time`, `hours`, `price`, `offer_to_teach`, `description`, `schedule`, `address`, `map`) VALUES
(7, 'Lớp học tình nghĩa', 20, 0, 1, 0, 0, 2, 2, '200000', 0, 'ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgV2hhdCBpcyBMb3JlbSBJcHN1bT88cD48c3Ryb25nPkxvcmVtIElwc3VtPC9zdHJvbmc+wqBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkncyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZywgcmVtYWluaW5nIGVzc2VudGlhbGx5IHVuY2hhbmdlZC4gSXQgd2FzIHBvcHVsYXJpc2VkIGluIHRoZSAxOTYwcyB3aXRoIHRoZSByZWxlYXNlIG9mIExldHJhc2V0IHNoZWV0cyBjb250YWluaW5nIExvcmVtIElwc3VtIHBhc3NhZ2VzLCBhbmQgbW9yZSByZWNlbnRseSB3aXRoIGRlc2t0b3AgcHVibGlzaGluZyBzb2Z0d2FyZSBsaWtlIEFsZHVzIFBhZ2VNYWtlciBpbmNsdWRpbmcgdmVyc2lvbnMgb2YgTG9yZW0gSXBzdW08L3A+ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg', '2c,3c,4t,5t', 'T12 Hồng Lĩnh, Quận 10, Thành phố Hồ Chí Minh, Việt Nam', 'PGlmcmFtZSBzcmM9Imh0dHBzOi8vd3d3Lmdvb2dsZS5jb20vbWFwcy9lbWJlZD9wYj0hMW0xOCExbTEyITFtMyExZDM5MTkuNDEyMTE5Mjc0NTM1NiEyZDEwNi42NjAyMjAzMTU4NjQ3OCEzZDEwLjc3OTcxNDI2MjA3ODA4NCEybTMhMWYwITJmMCEzZjAhM20yITFpMTAyNCEyaTc2OCE0ZjEzLjEhM20zITFtMiExczB4MzE3NTJlYzU2NTZlZDhkZCUzQTB4NThkNDJjMmEwOTNlY2FkZCEyelZERXlJRWpodTVOdVp5Qk14S2x1YUN3Z1VHakdzT0c3blc1bklERTFMQ0JSZGVHNnJXNGdNVEFzSUZSb3c2QnVhQ0J3YU9HN2tTQkk0YnVUSUVOb3c2MGdUV2x1YUN3Z1Ztbmh1NGQwSUU1aGJRITVlMCEzbTIhMXN2aSEycyE0djE2MzU5NzE0MDkyMjEhNW0yITFzdmkhMnMiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDUwIiBzdHlsZT0iYm9yZGVyOjA7IiBhbGxvd2Z1bGxzY3JlZW49IiIgbG9hZGluZz0ibGF6eSI+PC9pZnJhbWU+ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA=');

-- --------------------------------------------------------

--
-- Table structure for table `room_user`
--

CREATE TABLE `room_user` (
  `id` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `checked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_user`
--

INSERT INTO `room_user` (`id`, `room`, `user`, `rating`, `checked`) VALUES
(22, 7, 19, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Toán'),
(2, 'Văn'),
(3, 'Ngoại Ngữ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `firstName` text COLLATE utf8_unicode_ci NOT NULL,
  `lastName` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `subjects_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `birthday` text COLLATE utf8_unicode_ci NOT NULL,
  `sex` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `experience` text COLLATE utf8_unicode_ci NOT NULL,
  `experience_type` text COLLATE utf8_unicode_ci NOT NULL,
  `degree` text COLLATE utf8_unicode_ci NOT NULL,
  `graduation_school` text COLLATE utf8_unicode_ci NOT NULL,
  `specialized` text COLLATE utf8_unicode_ci NOT NULL,
  `schedule` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `firstName`, `lastName`, `email`, `role`, `address`, `price`, `subjects_ids`, `description`, `birthday`, `sex`, `phone`, `experience`, `experience_type`, `degree`, `graduation_school`, `specialized`, `schedule`) VALUES
(19, 'bingii901', '79a65c92acb47fe717292076dc3c674c', 'Nguyễn', 'Giang', 'october15th98@gmail.com', 2, '[Cà Mau--Thành phố Cà Mau]', 1212, '1,', 'DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgWmFtMTIzNDU2ZmdkZ2ZmZGZzZGZkZnNkZg==', '1111-11-11', 'Nam', '0879937439', '1', 'Năm', 'Dai hoc', 'IUH', 'IT', ''),
(20, 'giang101', '79a65c92acb47fe717292076dc3c674c', 'Giang', 'Nguyễn', 'bingii901.dev@gmail.com', 1, '[Cà Mau--Thành phố Cà Mau]', 200000, '1,2,', 'ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFdoYXQgaXMgTG9yZW0gSXBzdW0/PHA+PHN0cm9uZz5Mb3JlbSBJcHN1bTwvc3Ryb25nPsKgaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5J3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsIHJlbWFpbmluZyBlc3NlbnRpYWxseSB1bmNoYW5nZWQuIEl0IHdhcyBwb3B1bGFyaXNlZCBpbiB0aGUgMTk2MHMgd2l0aCB0aGUgcmVsZWFzZSBvZiBMZXRyYXNldCBzaGVldHMgY29udGFpbmluZyBMb3JlbSBJcHN1bSBwYXNzYWdlcywgYW5kIG1vcmUgcmVjZW50bHkgd2l0aCBkZXNrdG9wIHB1Ymxpc2hpbmcgc29mdHdhcmUgbGlrZSBBbGR1cyBQYWdlTWFrZXIgaW5jbHVkaW5nIHZlcnNpb25zIG9mIExvcmVtIElwc3VtLjwvcD4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIA==', '1998-10-15', 'Nam', '0977888888', '2', 'Năm', 'Đại Học', 'Trường Đại học Công nghiệp thành phố Hồ Chí Minh', 'Công nghệ thông tin', '4s,5c'),
(21, 'giang102', '79a65c92acb47fe717292076dc3c674c', 'Giang', 'Nguyễn Trường', 'bingii901.dev@gmail.com', 1, '[Cà Mau--Thành phố Cà Mau]', 200000, '1,2,', 'ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBXaGF0IGlzIExvcmVtIElwc3VtPzxwPjxzdHJvbmc+TG9yZW0gSXBzdW08L3N0cm9uZz7CoGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSdzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGVkIGl0IHRvIG1ha2UgYSB0eXBlIHNwZWNpbWVuIGJvb2suIEl0IGhhcyBzdXJ2aXZlZCBub3Qgb25seSBmaXZlIGNlbnR1cmllcywgYnV0IGFsc28gdGhlIGxlYXAgaW50byBlbGVjdHJvbmljIHR5cGVzZXR0aW5nLCByZW1haW5pbmcgZXNzZW50aWFsbHkgdW5jaGFuZ2VkLiBJdCB3YXMgcG9wdWxhcmlzZWQgaW4gdGhlIDE5NjBzIHdpdGggdGhlIHJlbGVhc2Ugb2YgTGV0cmFzZXQgc2hlZXRzIGNvbnRhaW5pbmcgTG9yZW0gSXBzdW0gcGFzc2FnZXMsIGFuZCBtb3JlIHJlY2VudGx5IHdpdGggZGVza3RvcCBwdWJsaXNoaW5nIHNvZnR3YXJlIGxpa2UgQWxkdXMgUGFnZU1ha2VyIGluY2x1ZGluZyB2ZXJzaW9ucyBvZiBMb3JlbSBJcHN1bS48L3A+ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIA==', '1998-10-15', 'Nam', '0977888888', '2', 'Năm', 'Đại Học', 'Trường Đại học Công nghiệp thành phố Hồ Chí Minh', 'Công nghệ thông tin', ''),
(22, 'giang103', '79a65c92acb47fe717292076dc3c674c', 'Giang', 'Nguyễn Trường', 'bingii901.dev@gmail.com', 1, '[Cà Mau--Thành phố Cà Mau]', 200000, '1,2,', 'ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBXaGF0IGlzIExvcmVtIElwc3VtPzxwPjxzdHJvbmc+TG9yZW0gSXBzdW08L3N0cm9uZz7CoGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSdzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGVkIGl0IHRvIG1ha2UgYSB0eXBlIHNwZWNpbWVuIGJvb2suIEl0IGhhcyBzdXJ2aXZlZCBub3Qgb25seSBmaXZlIGNlbnR1cmllcywgYnV0IGFsc28gdGhlIGxlYXAgaW50byBlbGVjdHJvbmljIHR5cGVzZXR0aW5nLCByZW1haW5pbmcgZXNzZW50aWFsbHkgdW5jaGFuZ2VkLiBJdCB3YXMgcG9wdWxhcmlzZWQgaW4gdGhlIDE5NjBzIHdpdGggdGhlIHJlbGVhc2Ugb2YgTGV0cmFzZXQgc2hlZXRzIGNvbnRhaW5pbmcgTG9yZW0gSXBzdW0gcGFzc2FnZXMsIGFuZCBtb3JlIHJlY2VudGx5IHdpdGggZGVza3RvcCBwdWJsaXNoaW5nIHNvZnR3YXJlIGxpa2UgQWxkdXMgUGFnZU1ha2VyIGluY2x1ZGluZyB2ZXJzaW9ucyBvZiBMb3JlbSBJcHN1bS48L3A+ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIA==', '1998-10-15', 'Nam', '0977888888', '2', 'Năm', 'Đại Học', 'Trường Đại học Công nghiệp thành phố Hồ Chí Minh', 'Công nghệ thông tin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_user`
--
ALTER TABLE `room_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_user`
--
ALTER TABLE `room_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
