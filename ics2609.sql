-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 07:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ics2609`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`username`, `password`, `userType`, `status`, `createdBy`) VALUES
('admin', '2019128342', 'ADMINISTRATOR', 'ACTIVE', 'admin'),
('animoTomasino', 'soarHighSeniorHigh', 'ADMINISTRATOR', 'ACTIVE', 'vincentkyle'),
('AquiThomas', 'tomasino123', 'USER', 'ACTIVE', 'vincentkyle'),
('aribaRabiya', 'aribabagsak', 'ADMINISTRATOR', 'ACTIVE', 'vincentkyle'),
('jonathan', 'jesha123', 'USER', 'ACTIVE', 'tech'),
('jrtorres', 'torres', 'TECHNICAL', 'ACTIVE', 'admin'),
('juandelacruz', 'juandc', 'TECHNICAL', 'ACTIVE', 'tech'),
('martha', 'mrthbcy', 'USER', 'INACTIVE', 'tech'),
('mvcarpio', '123456', 'USER', 'ACTIVE', 'vincentkyle'),
('RoqueR123', 'ruano123456', 'USER', 'ACTIVE', 'vincentkyle'),
('staffHead', 'staff', 'TECHNICAL', 'INACTIVE', 'admin'),
('tech', 'techPass', 'TECHNICAL', 'ACTIVE', 'tech'),
('techStaff', 'staff', 'TECHNICAL', 'ACTIVE', 'vincentkyle'),
('testRoot', 'root', 'USER', 'INACTIVE', 'admin'),
('vincentkyle', 'vncntkyl', 'ADMINISTRATOR', 'ACTIVE', 'vincentkyle');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `ID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`ID`, `username`, `password`, `userType`, `status`) VALUES
(1, 'admin', 'admin', 'ADMIN', 'ACTIVE'),
(2, 'tech', 'tech', 'TECH', 'ACTIVE'),
(3, 'user', 'user', 'USER', 'ACTIVE'),
(4, 'testUser', 'testUser', 'USER', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tblcolleges`
--

CREATE TABLE `tblcolleges` (
  `collegeName` varchar(70) NOT NULL,
  `deptType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcolleges`
--

INSERT INTO `tblcolleges` (`collegeName`, `deptType`) VALUES
('College of Architecture', 'college'),
('College of Commerce and Business Administration', 'college'),
('College of Education', 'college'),
('College of Fine Arts and Design', 'college'),
('College of Nursing', 'college'),
('College of Rehabilitation Sciences', 'college'),
('College of Science', 'college'),
('College of Tourism and Hospitality Management', 'college'),
('Conservatory of Music', 'college'),
('Education High School', 'college'),
('Faculty of Arts and Letters', 'college'),
('Faculty of Canon Law', 'college'),
('Faculty of Civil Law', 'college'),
('Faculty of Engineering', 'college'),
('Faculty of Medicine and Surgery', 'college'),
('Faculty of Pharmacy', 'college'),
('Faculty of Philosophy', 'college'),
('Faculty of Sacred Theology', 'college'),
('Graduate School', 'college'),
('Graduate School of Law', 'college'),
('Institute of Information and Computing Sciences', 'college'),
('Institute of Physical Education and Athletics', 'college'),
('Junior High School', 'college'),
('Office for Academic Programs Quality Assurance', 'office'),
('Office for Admissions', 'office'),
('Office for Archives', 'office'),
('Office for Campus Ministry', 'office'),
('Office for Communications Bureau', 'office'),
('Office for Community Development', 'office'),
('Office for Counseling And Career', 'office'),
('Office for Creative Writing And Literary Studies', 'office'),
('Office for E-Service Providers', 'office'),
('Office for Educational Technology', 'office'),
('Office for Facilities Management', 'office'),
('Office for Faculty Evaluation And Development', 'office'),
('Office for Grants, Endorsements, And Partnerships', 'office'),
('Office for Health Service', 'office'),
('Office for Human Resource', 'office'),
('Office for Information And Communication Technology', 'office'),
('Office for Innovation And Technology Support', 'office'),
('Office for Innovation Center', 'office'),
('Office for International Relations And Programs', 'office'),
('Office for Laboratory Equipment And Supplies', 'office'),
('Office for Library', 'office'),
('Office for Museum', 'office'),
('Office for Planning And Quality Management', 'office'),
('Office for Public Affairs', 'office'),
('Office for Publishing House', 'office'),
('Office for Purchasing', 'office'),
('Office for Quality Service/ The Rankings', 'office'),
('Office for Safety And Security', 'office'),
('Office for Student Affairs', 'office'),
('Office of Property Custodian', 'office'),
('Office of The Internal Auditor', 'office'),
('Office of The Registrar', 'office'),
('Senior High School', 'college'),
('UST-Alfredo M. Velayo College of Accountancy', 'college');

-- --------------------------------------------------------

--
-- Table structure for table `tblequipment`
--

CREATE TABLE `tblequipment` (
  `assetNumber` varchar(20) NOT NULL,
  `serialNumber` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `yearModel` int(4) NOT NULL,
  `description` text NOT NULL,
  `department` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblequipment`
--

INSERT INTO `tblequipment` (`assetNumber`, `serialNumber`, `type`, `manufacturer`, `yearModel`, `description`, `department`, `status`) VALUES
('01AFIS0221', 'WK43O4VOMN2AVKCPTHAR', 'Printer', 'Invoice2Go', 2021, 'Xprinter XP-490B Direct Thermal Printer Barcode Express Invoice Waybill Shipment Label Printers compatible for Windows and Mac computer', 'Faculty of Pharmacy', 'WORKING'),
('01CLMA1019', ' ML0KFOJV23Y391SELZF', 'MAC', 'EDUP', 2019, 'USB Wifi Adapter for PC, EDUP AC600M USB Wi-fi Dongle 802.11ac Wireless Network Adapter with Dual Band 2.4GHz/5Ghz High Gain Antenna for Desktop Laptop support Windows XP/Vista/7/8.1/10 Mac 10.7-10.15', 'Office for E-Service Providers', 'WORKING'),
('01ICSM1221', '9AQYZQ9KCVNDCSBV9FAF', 'Monitor', 'Samsung', 2021, '27\" G5 Odyssey Gaming Monitor With 1000R Curved Screen', 'Institute of Information and Computing Sciences', 'WORKING'),
('01MADC0519', 'ZDQ8O8VJWC7K8YOBFCIT', 'Projector', 'Benq', 2019, 'Pro Cinema Projector with 4K, THX, 100% Rec. 709 | HT8060', 'Faculty of Sacred Theology', 'WORKING'),
('01MCIS0721', '5NEB3D78NRZ7YT4DX4BF', 'Monitor', 'Apple', 2016, 'Display. 5K Retina display · Processor. 3.1GHz · Price. ₱73,990 · Memory. 8GB (two 4GB) of 2666MHz DDR4 memory; four SO‑DIMM slots, user accessible.\r\n', 'Faculty of Canon Law', 'WORKING'),
('01MLIS0721', 'ZCVX6QRQMEJHQDXGKBFO', 'Monitor', 'Apple', 2021, 'Display. 5K Retina display · Processor. 3.1GHz · Price. ₱73,990 · Memory. 8GB (two 4GB) of 2666MHz DDR4 memory; four SO‑DIMM slots, user accessible.\r\n', 'Senior High School', 'WORKING'),
('01MNIS0721', '844MTHEPQEU1EN5WOSKC', 'Monitor', 'Apple', 2021, 'Display. 5K Retina display · Processor. 3.1GHz · Price. ₱73,990 · Memory. 8GB (two 4GB) of 2666MHz DDR4 memory; four SO‑DIMM slots, user accessible.\r\n', 'Junior High School', 'WORKING'),
('01MRIS0721', 'FFUGJYUG01FEWU4RSLNC', 'Monitor', 'Apple', 2021, 'Display. 5K Retina display · Processor. 3.1GHz · Price. ₱73,990 · Memory. 8GB (two 4GB) of 2666MHz DDR4 memory; four SO‑DIMM slots, user accessible.\r\n', 'College of Fine Arts and Design', 'WORKING'),
('01MSIS0721', '8ZC860D9WIZLMX1MX3XU', 'Monitor', 'Apple', 2021, 'Display. 5K Retina display · Processor. 3.1GHz · Price. ₱73,990 · Memory. 8GB (two 4GB) of 2666MHz DDR4 memory; four SO‑DIMM slots, user accessible.\r\n', 'Institute of Information and Computing Sciences', 'WORKING'),
('03PR6L1215', 'HSR3235SBOMDHP0QBZ7P', 'Printer', 'Sharp', 2015, 'SHARP MFP MX-B450WB ( COPIER - PRINTER - SCANNER )\r\n', 'Office of The Registrar', 'WORKING'),
('03PR7L1214', 'B6ESWAENK3V5E74Z2SLD', 'Printer', 'Sharp', 2014, 'SHARP MFP MX-B450WB ( COPIER - PRINTER - SCANNER )\r\n', 'Office for Student Affairs', 'WORKING'),
('03PRKL1218', 'LQDQ3HXUPXOHUD6IOGOC', 'Printer', 'Sharp', 2018, 'SHARP MFP MX-B450WB ( COPIER - PRINTER - SCANNER )\r\n', 'Office for Health Service', 'WORKING'),
('03PRQL1216', 'KNC3HV1KBAAHWGFVTB0H', 'Printer', 'Sharp', 2016, 'SHARP MFP MX-B450WB ( COPIER - PRINTER - SCANNER )\r\n', 'Office for Museum', 'WORKING'),
('03PRQL1219', 'ICPMWR4XF0R2RPV301TE', 'Printer', 'Sharp', 2019, 'SHARP MFP MX-B450WB ( COPIER - PRINTER - SCANNER )\r\n', 'Office of The Internal Auditor', 'WORKING'),
('03PRSC1120', '7LGSHK4SI75TB8GUTWCF', 'Printer', 'HP', 2020, 'HP 2777 Deskjet Ink Advantage All-In-One Wireless Printer Light Sage', 'Office for Publishing House', 'ON-REPAIR'),
('04FEAM0420', ' 9OY5AMU3IS6BJVRGKFY', 'AVR', 'Meiji', 2020, 'AVR - Automatic Voltage Regulator [Meiji AVR Servo Motor Type 500W] SVC-500', 'Faculty of Engineering', 'WORKING'),
('08PRAL0621', 'WK43O4VOMN2AVKCPTHA2', 'Printer', 'Invoice2Go', 2021, 'Xprinter XP-490B Direct Thermal Printer Barcode Express Invoice Waybill Shipment Label Printers compatible for Windows and Mac computer', 'Faculty of Arts and Letters', 'ON-REPAIR'),
('10ADLL0821', 'TVIOAGQG9YRHVWRFEAQP', 'Monitor', 'Lenovo', 2021, 'Legion Y25-25 Gaming Monitor 66AAGAC6PH | 24.5\" | IPS | 16:9 | 1920x1080 | 1ms | 240 Hz | HDMI, DP | 30w / 75w | Raven Black', 'College of Fine Arts and Design', 'RETIRE'),
('12ICPS0111', 'RNA3KWONV1MLCC09D95W', 'Keyboard', 'G-Storm', 2011, 'Power Supply G-Storm GA230+ 700w | Generic PSU not true rated | We also have Powerex Corsair YGT Seasonic Coolermaster Yido Superflower Antec Micronics Brand | TGEARS', 'Institute of Information and Computing Sciences', 'ON-REPAIR'),
('13LAGC3990', '21JXN9FTXCOVOVC0C8KY', 'Projector', 'KDM', 2007, 'RD826 Full HD Projector 7000 Lumens Native 1920*1080P 6.0 Android Projector LCD 4K HD Home Theater Movie Vedio TV Projectors\r\n', 'Education High School', 'WORKING'),
('13UGXE2082', 'LPU2XU1LHW7539DZUGSQ', 'Keyboard', 'Lenovo', 2016, 'Lenovo KM4802A Wired Keyboard and Mouse Combo Low-Profile Ergonomic Desktop USB Mouse and Keyboard Combo with Multimedia Keys 3-Buttons 1000DPI Optical Mouse for Home Office\r\n', 'College of Rehabilitation Sciences', 'WORKING'),
('24QBXR7007', 'G0XYF9WE4LFVTYMN8XWM', 'Projector', 'KDM', 2007, 'RD826 Full HD Projector 7000 Lumens Native 1920*1080P 6.0 Android Projector LCD 4K HD Home Theater Movie Vedio TV Projectors\r\n', 'College of Commerce and Business Administration', 'WORKING'),
('25ITSD2512', 'KJ394KSIDUXXUALW81AQ', 'Keyboard', 'JKTECH', 2016, 'JKTECH RGB 104 Keys Rainbow Backlit Keyboards Red Switch Wired RGB Gaming Mechanical Keyboard\r\n', 'College of Nursing', 'WORKING'),
('40SMTV0220', 'WK43O4VOMN2AVKCPTHA9', 'Monitor', 'COOCOA', 2020, 'COOCAA [40S3M] 40 Inch Simple Smart FHD LED TV Frameless Flat screen Youtube Television Slim Wifi/LAN Screen 1920×1080 Mirroring Cast (Silver Gray', 'Faculty of Medicine and Surgery', 'ON-REPAIR'),
('48JOVB8119', 'FVQN8QKTHBOZ8YVGJ6A2', 'Projector', 'KDM', 2019, 'RD826 Full HD Projector 7000 Lumens Native 1920*1080P 6.0 Android Projector LCD 4K HD Home Theater Movie Vedio TV Projectors\r\n', 'Graduate School', 'WORKING'),
('52SGTA8452', '44CFXJAJCM6JPVXCGN2G', 'Mouse', 'Apple', 2019, 'Magic Mouse 2 is completely rechargeable, so you’ll eliminate the use of traditional batteries.\r\n', 'College of Fine Arts and Design', 'ON-REPAIR'),
('52TLTV3785', 'NYZJNROBYNL4H5ELPF6N', 'Keyboard', 'Lenovo', 2016, 'Lenovo KM4802A Wired Keyboard and Mouse Combo Low-Profile Ergonomic Desktop USB Mouse and Keyboard Combo with Multimedia Keys 3-Buttons 1000DPI Optical Mouse for Home Office\r\n', 'Institute of Physical Education and Athletics', 'WORKING'),
('67CNNG5878', '5QK8UADXSQMSTVNLORAI', 'Projector', 'KDM', 2007, 'RD826 Full HD Projector 7000 Lumens Native 1920*1080P 6.0 Android Projector LCD 4K HD Home Theater Movie Vedio TV Projectors\r\n', 'College of Education', 'WORKING'),
('75HNNM0343', 'CK4IBJRZIIOF3C1KW5B9', 'Keyboard', 'Lenovo', 2016, 'Lenovo KM4802A Wired Keyboard and Mouse Combo Low-Profile Ergonomic Desktop USB Mouse and Keyboard Combo with Multimedia Keys 3-Buttons 1000DPI Optical Mouse for Home Office\r\n', 'Institute of Information and Computing Sciences', 'WORKING'),
('VP249QGRGS', '9WXLZT5DBL5APLFZ4C9H', 'Monitor', 'Asus', 2019, 'Asus VP249QGR 24\" Full HD Gaming Monitor with Frameless Design, IPS Panel, Adaptive-Sync(FreeSync™), 144Hz Refresh Rate, Flicker-Free, Wall Mountable, and 1ms MPRT for Smooth Gaming Visual', 'Education High School', 'ON-REPAIR');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `datelog` varchar(10) NOT NULL,
  `timelog` varchar(20) NOT NULL,
  `action` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `performedBy` varchar(20) NOT NULL,
  `module` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`datelog`, `timelog`, `action`, `user`, `performedBy`, `module`) VALUES
('05/16/2021', '07:30:53pm', 'Deactivate', 'admin', 'admin', 'Accounts'),
('05/16/2021', '07:31:09pm', 'Activate', 'admin', 'admin', 'Accounts'),
('05/16/2021', '07:31:18pm', 'Update', 'support', 'admin', 'Accounts'),
('05/16/2021', '07:31:32pm', 'Delete', 'manager', 'admin', 'Accounts'),
('05/16/2021', '07:31:58pm', 'ON-REPAIR', '03PRSC1120', 'admin', 'Equipment'),
('05/16/2021', '07:32:17pm', 'WORKING', '30ITDR0406', 'admin', 'Equipment'),
('05/16/2021', '07:32:21pm', 'WORKING', '01TH0201', 'admin', 'Equipment'),
('05/17/2021', '10:41:15am', 'RETIRE', '01TH0201', 'admin', 'Equipment'),
('05/17/2021', '10:41:43am', 'ON-REPAIR', '12ICPS0111', 'tech', 'Equipment'),
('05/17/2021', '10:42:11am', 'Update', '01AFIS0221', 'tech', 'Equipment'),
('05/17/2021', '11:07:25am', 'Update', 'RoqueR123', 'vincentkyle', 'Accounts'),
('05/17/2021', '11:07:34am', 'Deactivate', 'testRoot', 'vincentkyle', 'Accounts'),
('05/17/2021', '02:56:55pm', 'ACTIVE', 'popitaMaru', 'vincentkyle', 'Account'),
('05/17/2021', '02:58:20pm', 'ACTIVE', 'staffHead', 'vincentkyle', 'Account'),
('05/17/2021', '03:25:28pm', 'INACTIVE', 'aribaRabiya', 'vincentkyle', 'Account'),
('05/17/2021', '03:26:00pm', 'INACTIVE', 'juandelacruz', 'vincentkyle', 'Account'),
('05/17/2021', '03:26:14pm', 'INACTIVE', 'popitaMaru', 'vincentkyle', 'Account'),
('05/17/2021', '03:58:12pm', 'INACTIVE', 'moniegold', 'admin', 'Account'),
('05/17/2021', '03:58:19pm', 'Delete', 'moniegold', 'admin', 'Account'),
('05/17/2021', '04:40:32pm', 'ACTIVE', 'aribaRabiya', 'vincentkyle', 'Account'),
('05/17/2021', '04:43:19pm', 'Update', 'AquiThomas', 'vincentkyle', 'Account'),
('05/17/2021', '04:44:46pm', 'Update', 'antonioPigafetta', 'vincentkyle', 'Account'),
('05/17/2021', '04:49:56pm', 'Update', 'antonioPigafetta', 'vincentkyle', 'Account'),
('05/17/2021', '04:52:25pm', 'Update', 'antonioPigafetta', 'vincentkyle', 'Account'),
('05/17/2021', '05:04:35pm', 'INACTIVE', 'aribaRabiya', 'animoTomasino', 'Account'),
('05/17/2021', '05:04:45pm', 'INACTIVE', 'martha', 'animoTomasino', 'Account'),
('05/17/2021', '05:04:57pm', 'INACTIVE', 'staffHead', 'animoTomasino', 'Account'),
('05/17/2021', '08:41:24pm', 'Update', 'animoTomasino', 'vincentkyle', 'Account'),
('05/18/2021', '01:19:21pm', 'ON-REPAIR', '16CAHP0806', 'tech', 'Equipment'),
('05/18/2021', '01:20:38pm', 'RETIRE', '12ICPS0111', 'AquiThomas', 'Equipment'),
('05/18/2021', '01:20:47pm', 'Update', 'VP249QGRGS', 'AquiThomas', 'Equipment'),
('05/18/2021', '01:26:51pm', 'Delete', '01TH0201', 'aquithomas', 'Equipment'),
('05/18/2021', '01:27:02pm', 'RETIRE', '16CAHP0806', 'aquithomas', 'Equipment'),
('05/18/2021', '01:28:47pm', 'Activate', 'juandelacruz', 'animoTomasino', 'Accounts'),
('05/18/2021', '01:29:24pm', 'WORKING', '01MADC0519', 'juandelacruz', 'Equipment'),
('05/18/2021', '01:29:30pm', 'WORKING', '16CAHP0806', 'juandelacruz', 'Equipment'),
('05/18/2021', '04:57:25pm', 'Update', '01AFIS0221', 'tech', 'Equipment'),
('05/18/2021', '05:01:37pm', 'Update', '01AFIS0221', 'tech', 'Equipment'),
('05/18/2021', '05:02:41pm', 'Update', '01MADC0519', 'tech', 'Equipment'),
('05/18/2021', '05:04:51pm', 'Update', '01MADC0519', 'AquiThomas', 'Equipment'),
('05/18/2021', '06:16:33pm', 'ON-REPAIR', '01AFIS0221', 'admin', 'Equipment'),
('05/18/2021', '06:21:04pm', 'Update', 'jonathan', 'admin', 'Account'),
('05/18/2021', '07:29:54pm', 'Update', '01AFIS0221', 'admin', 'Equipment'),
('05/18/2021', '07:30:11pm', 'ON-REPAIR', '08ITNS1220', 'admin', 'Equipment'),
('05/18/2021', '07:30:33pm', 'WORKING', '12ICPS0111', 'admin', 'Equipment'),
('05/18/2021', '07:31:34pm', 'Delete', '08ITNS1220', 'admin', 'Equipment'),
('05/18/2021', '07:46:52pm', 'Delete', '01CLMA1019', 'tech', 'Equipment'),
('05/18/2021', '07:48:33pm', 'Update', '01AFIS0221', 'tech', 'Equipment'),
('05/18/2021', '07:49:05pm', 'Delete', '30ITDR0406', 'tech', 'Equipment'),
('05/18/2021', '07:49:16pm', 'RETIRE', '04FEAM0420', 'tech', 'Equipment'),
('05/18/2021', '08:43:02pm', 'Delete', '16CAHP0806', 'tech', 'Equipment'),
('05/18/2021', '08:57:10pm', 'WORKING', '01AFIS0221', 'juandelacruz', 'Equipment'),
('05/18/2021', '08:59:54pm', 'ON-REPAIR', '01AFIS0221', 'juandelacruz', 'Equipment'),
('05/18/2021', '09:04:23pm', 'RETIRE', '01ICSM1221', 'juandelacruz', 'Equipment'),
('05/18/2021', '09:09:59pm', 'ON-REPAIR', '12ICPS0111', 'juandelacruz', 'Equipment'),
('05/18/2021', '09:11:35pm', 'WORKING', '01AFIS0221', 'ANTONIOPIGAFETTA', 'Equipment'),
('05/18/2021', '09:11:38pm', 'WORKING', '01ICSM1221', 'ANTONIOPIGAFETTA', 'Equipment'),
('05/18/2021', '09:11:43pm', 'RETIRE', '10ADLL0821', 'ANTONIOPIGAFETTA', 'Equipment'),
('05/19/2021', '01:54:07pm', 'Update', '01AFIS0221', 'techStaff', 'Equipment'),
('05/19/2021', '02:06:23pm', 'Update', '01AFIS0221', 'techStaff', 'Equipment'),
('05/19/2021', '02:06:43pm', 'WORKING', '04FEAM0420', 'techStaff', 'Equipment'),
('05/19/2021', '02:08:41pm', 'ON-REPAIR', '08PRAL0621', 'techStaff', 'Equipment'),
('05/19/2021', '02:58:00pm', 'ON-REPAIR', '44HFGT1618', 'techStaff', 'Equipment'),
('05/19/2021', '02:58:20pm', 'RETIRE', '53IQXX3774', 'techStaff', 'Equipment'),
('05/19/2021', '02:58:28pm', 'RETIRE', '01CLMA1019', 'techStaff', 'Equipment'),
('05/19/2021', '02:58:37pm', 'ON-REPAIR', 'VP249QGRGS', 'techStaff', 'Equipment'),
('05/19/2021', '02:58:53pm', 'Update', '48JOVB8119', 'techStaff', 'Equipment'),
('05/20/2021', '02:34:15pm', 'WORKING', '01CLMA1019', 'AquiThomas', 'Equipment'),
('05/20/2021', '02:34:28pm', 'ON-REPAIR', '52SGTA8452', 'AquiThomas', 'Equipment'),
('05/22/2021', '10:15:50pm', 'INACTIVE', 'antonioPigafetta', 'admin', 'Account'),
('06/02/2021', '12:19:36am', 'ACTIVE', 'aribaRabiya', 'admin', 'Account'),
('06/02/2021', '12:19:48am', 'Update', 'AquiThomas', 'admin', 'Account'),
('06/02/2021', '12:21:34am', 'Delete', '25ITSD2512', 'admin', 'Equipment'),
('06/02/2021', '12:35:45am', 'Delete', 'jrtorres', 'vincentkyle', 'Account'),
('06/02/2021', '12:42:10am', 'Update', 'jrtorres', 'admin', 'Account'),
('06/02/2021', '12:42:16am', 'INACTIVE', 'AquiThomas', 'admin', 'Account'),
('06/02/2021', '12:42:21am', 'Delete', 'antonioPigafetta', 'admin', 'Account'),
('06/02/2021', '12:43:42am', 'Update', '25ITSD2512', 'admin', 'Equipment'),
('06/02/2021', '12:43:48am', 'ON-REPAIR', '01AFIS0221', 'admin', 'Equipment'),
('06/02/2021', '12:43:55am', 'RETIRE', '44HFGT1618', 'admin', 'Equipment'),
('06/02/2021', '12:44:07am', 'Delete', '53IQXX3774', 'admin', 'Equipment'),
('06/02/2021', '12:50:22am', 'Delete', '25ITSD2512', 'tech', 'Equipment'),
('06/02/2021', '12:55:12am', 'Delete', 'jrtorres', 'admin', 'Account'),
('06/02/2021', '12:59:14am', 'Update', 'jrtorres', 'admin', 'Account'),
('06/02/2021', '12:59:22am', 'ACTIVE', 'AquiThomas', 'admin', 'Account'),
('06/02/2021', '12:59:30am', 'Delete', 'popitaMaru', 'admin', 'Account'),
('06/02/2021', '01:00:31am', 'Update', '01MCIS0721', 'admin', 'Equipment'),
('06/02/2021', '01:01:02am', 'WORKING', '01AFIS0221', 'admin', 'Equipment'),
('06/02/2021', '01:01:11am', 'ON-REPAIR', '40SMTV0220', 'admin', 'Equipment'),
('06/02/2021', '01:01:21am', 'Delete', '44HFGT1618', 'admin', 'Equipment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcolleges`
--
ALTER TABLE `tblcolleges`
  ADD PRIMARY KEY (`collegeName`);

--
-- Indexes for table `tblequipment`
--
ALTER TABLE `tblequipment`
  ADD UNIQUE KEY `assetNumber` (`assetNumber`,`serialNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
