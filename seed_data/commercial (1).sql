-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 01:57 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commercial`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_receivable`
--

CREATE TABLE `account_receivable` (
  `receivable_id` int(11) NOT NULL,
  `segment` varchar(200) NOT NULL,
  `receivable_date` date NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `overdue_for` varchar(200) NOT NULL,
  `total_billing` float NOT NULL,
  `total_overdue` float NOT NULL,
  `not_due` varchar(150) NOT NULL,
  `taxes` varchar(150) NOT NULL,
  `freight_charges` varchar(150) NOT NULL,
  `grand_total` float NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_receivable`
--

INSERT INTO `account_receivable` (`receivable_id`, `segment`, `receivable_date`, `customer_name`, `overdue_for`, `total_billing`, `total_overdue`, `not_due`, `taxes`, `freight_charges`, `grand_total`, `remarks`) VALUES
(1, 'Software', '2019-07-17', '1', 'Noida', 200, 100, '50', '20', '30', 500, 'I wants to update the flow.'),
(3, 'Production', '2019-07-18', '1', 'Noida', 4, 56, '4', '6', 'tr', 0, 'Test info');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(250) NOT NULL,
  `activity_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `activity_desc`) VALUES
(1, 'Typesetting', 'For setting Typeset'),
(2, 'Redrawing of Figurs', NULL),
(3, 'Relabeling of Figures', NULL),
(4, 'Manipulation of Figures', NULL),
(5, 'Resizing of Figures', NULL),
(6, 'Indexing', NULL),
(7, 'Proof Reading', NULL),
(8, 'Illustration Creation', 'test'),
(9, 'Reprint Correction', NULL),
(10, 'Dataset Creation', NULL),
(11, 'Template  Creation', NULL),
(12, 'Template Updation', NULL),
(13, 'Cover Designing', NULL),
(14, 'Cover Updation', NULL),
(15, 'Conversion', NULL),
(16, 'ePub Conversion', NULL),
(17, 'Mobi Conversion', NULL),
(18, 'Figure Extraction', NULL),
(19, 'Data Conversion', NULL),
(20, 'Word Conversion', NULL),
(21, 'Equation Keying', NULL),
(22, 'Alt Text Images', NULL),
(23, 'Alt Text Update', NULL),
(24, 'Cropping', NULL),
(25, 'AD Placement', NULL),
(26, 'Designing', NULL),
(27, 'Scanning', NULL),
(28, 'Destructive Scanning', NULL),
(29, 'Non Destructive Scanning', NULL),
(30, 'Software Development', NULL),
(31, 'Page Designing', NULL),
(32, 'Image Research', NULL),
(33, 'Typesetting Revisions', NULL),
(34, 'Color Corrections', NULL),
(35, 'Map Creation', NULL),
(36, 'Art Revisions', NULL),
(37, 'ePub Conversion', NULL),
(38, 'Extraction from Source File', NULL),
(39, 'HTML Cleanup & View', NULL),
(40, 'ePub Creation and Validation', NULL),
(41, 'ePub QC', NULL),
(43, 'Testing', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `approval_chain`
--

CREATE TABLE `approval_chain` (
  `id` int(11) NOT NULL,
  `approver_user_id` varchar(255) DEFAULT NULL,
  `pr_sr_no` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT NULL,
  `approved_by_user_id` int(11) DEFAULT NULL,
  `rejected_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval_chain`
--

INSERT INTO `approval_chain` (`id`, `approver_user_id`, `pr_sr_no`, `created_date`, `modified_date`, `status`, `approved_by_user_id`, `rejected_by_user_id`) VALUES
(1, '5,6', 'TD-NSEZ/2019-20/IT/1283', '2019-08-29 01:21:23', '2019-08-28 23:31:09', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`category_id`, `category_name`, `category_date`) VALUES
(1, 'category 1', '2019-06-18'),
(2, 'category 2', '2019-06-18'),
(3, 'category 3', '2019-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `complexity_level`
--

CREATE TABLE `complexity_level` (
  `complexity_level_id` int(11) NOT NULL,
  `complexity_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complexity_level`
--

INSERT INTO `complexity_level` (`complexity_level_id`, `complexity_level`) VALUES
(1, 'Simple'),
(2, 'Medium'),
(3, 'Complex'),
(4, 'Advanced');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(5) NOT NULL,
  `country_code` char(5) NOT NULL DEFAULT '',
  `country_name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_code`, `country_name`) VALUES
(1, 'IN', 'India'),
(2, 'US', 'USA'),
(3, 'FR', 'Franch'),
(4, 'EN', 'England');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(20) NOT NULL,
  `currency_symbols` varchar(50) NOT NULL,
  `country_id` varchar(10) NOT NULL,
  `currency_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_code`, `currency_symbols`, `country_id`, `currency_value`) VALUES
(1, 'EURO', '&euro;', '3', 77.82),
(2, 'USD', '$', '2', 69.56),
(5, 'INR', 'Rs', '1', 50.23),
(7, 'GBP', '&pound;', '4', 89);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `payment_term` varchar(150) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_desp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `payment_term`, `customer_email`, `customer_desp`) VALUES
(1, 'Elsevier', 'Paris, France', 'Yearly', 'support@elsevier.com', ''),
(2, 'Lexis Nexis', 'UK', 'Monthly', 'support@lnexis.com', ''),
(4, 'JIMMY', 'Paris, France', 'Daily', 'jimmy@thomsondigital.com', ''),
(5, 'aa', '', '', '', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(250) DEFAULT NULL,
  `department_desp` text,
  `department_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `department_desp`, `department_code`) VALUES
(1, 'Admin Department', 'Adminstration', 'AD'),
(2, 'IT Department', 'Informatiom Technology', 'IT'),
(3, 'Account', 'Account', 'AC'),
(4, 'Utility Department', 'Adding Utility Department', 'UD'),
(5, 'Purchase Department', 'purchase department', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(5) NOT NULL,
  `document_name` varchar(255) NOT NULL DEFAULT '',
  `document_path` varchar(200) DEFAULT NULL,
  `uploaded_by` varchar(100) DEFAULT NULL,
  `uploaded_date` date NOT NULL,
  `document_dept` varchar(255) NOT NULL,
  `document_dept_id` int(11) NOT NULL,
  `document_size` varchar(100) NOT NULL,
  `document_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `document_name`, `document_path`, `uploaded_by`, `uploaded_date`, `document_dept`, `document_dept_id`, `document_size`, `document_type`) VALUES
(1, 'Pays.docx', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 3, '', ''),
(2, 'SRS_Sample.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 3, '', ''),
(3, 'konainN.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 4, '', ''),
(4, 'SRSExample-webapp.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 4, '', ''),
(5, 'SRS_Sample.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 4, '', ''),
(6, 'Pays.docx', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 5, '266063', 'application/vnd.openxmlformats-officedocument.word'),
(7, 'SRSExample-webapp.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 5, '365568', 'application/msword'),
(8, 'Pays.docx', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 6, '266063', 'application/vnd.openxmlformats-officedocument.word'),
(9, 'konainN.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 6, '69120', 'application/msword'),
(10, 'SRSExample-webapp.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 7, '365568', 'application/msword'),
(11, 'SRS_Sample.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 7, '579584', 'application/msword'),
(12, 'SRSExample-webapp.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 8, '365568', 'application/msword'),
(13, '6378SRSExample-webapp.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-05-30', 'JTN', 9, '365568', 'application/msword'),
(14, '9826Pays.docx', 'C:/xampp/htdocs/commercial/uploads/operation/', '', '2019-06-11', 'JTN', 9, '266063', 'application/vnd.openxmlformats-officedocument.word'),
(15, '3166SRS_Sample.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', '', '2019-06-11', 'JTN', 9, '579584', 'application/msword'),
(16, '695706_72142.txt', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-06-11', 'JTN', 9, '214', 'text/plain'),
(17, '1858Pays.docx', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-06-11', 'JTN', 8, '266063', 'application/vnd.openxmlformats-officedocument.word'),
(18, '528919-37424.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-06-11', 'JTN', 10, '160768', 'application/msword'),
(19, '1507PrmPayRcpt-PR0403129700021718.pdf', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-06-11', 'JTN', 10, '55215', 'application/pdf'),
(20, '8524SRSExample-webapp.doc', 'C:/xampp/htdocs/commercial/uploads/operation/', 'konain', '2019-06-11', 'JTN', 11, '365568', 'application/msword'),
(21, '1603Hookah_chilam.jpg', 'C:/xampp/htdocs/commercial/uploads/PR/TD-NSEZ-2019-20-IT-4592/', 'test', '2019-08-28', 'PR', 0, '44326', 'image/jpeg'),
(22, '652hookaha.jpg', 'C:/xampp/htdocs/commercial/uploads/PR/TD-NSEZ-2019-20-IT-4592/', 'test', '2019-08-28', 'PR', 0, '18270', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `form_access`
--

CREATE TABLE `form_access` (
  `formaccess_id` int(100) NOT NULL,
  `user_type_id` varchar(100) NOT NULL,
  `module_id` varchar(100) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_activity`
--

CREATE TABLE `invoice_activity` (
  `inv_act_id` int(11) NOT NULL,
  `activity_name` varchar(200) NOT NULL,
  `unit_measure` varchar(150) NOT NULL,
  `quantity` float NOT NULL,
  `rates` float NOT NULL,
  `each_total` float NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_activity`
--

INSERT INTO `invoice_activity` (`inv_act_id`, `activity_name`, `unit_measure`, `quantity`, `rates`, `each_total`, `invoice_id`) VALUES
(7, 'Mouse', 'Counts', 200, 50, 10000, 5),
(8, 'Tech', 'Count', 5, 300, 1500, 5),
(9, 'Pagination', 'Qnty', 200, 2, 400, 5),
(33, 'Mouse', 'Counts', 200, 2, 400, 6),
(34, 'Keyboard', 'number', 5, 300, 1500, 6),
(35, 'Tech', 'LG', 50, 20, 1000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_query`
--

CREATE TABLE `invoice_query` (
  `inv_qry` int(11) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `operation_email` varchar(255) NOT NULL,
  `requested_by` varchar(200) NOT NULL,
  `query_comments` text NOT NULL,
  `query_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_query`
--

INSERT INTO `invoice_query` (`inv_qry`, `invoice_no`, `operation_email`, `requested_by`, `query_comments`, `query_date`) VALUES
(3, 'IN001', 'parul.goel@digiscapetech.com', 'Konain', 'Test requirements', '2019-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `invoicing`
--

CREATE TABLE `invoicing` (
  `invoicing_id` int(11) NOT NULL,
  `invoicing_no` varchar(250) NOT NULL,
  `po_no` varchar(100) NOT NULL,
  `po_date` date NOT NULL,
  `invoice_date` date NOT NULL,
  `unit_name` varchar(200) NOT NULL,
  `unit_address` varchar(255) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `consignee_address` varchar(255) NOT NULL,
  `title_name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `jtn_no` varchar(150) NOT NULL,
  `currency_no` varchar(100) NOT NULL,
  `total_price` float NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Inprocess'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoicing`
--

INSERT INTO `invoicing` (`invoicing_id`, `invoicing_no`, `po_no`, `po_date`, `invoice_date`, `unit_name`, `unit_address`, `client_name`, `client_email`, `customer_address`, `consignee_address`, `title_name`, `category`, `jtn_no`, `currency_no`, `total_price`, `status`) VALUES
(5, 'IN001', 'PO001', '2019-07-04', '2019-07-04', 'Noida', 'B-129, NSEZ Noida', '4', 'support@lnexis.com', 'UK, Fra', 'Paris, France', '2', '2', 'JTN001', '2', 11900, 'Inprocess'),
(6, 'IN001', 'PO001', '2019-07-04', '2019-07-04', 'Noida', 'B-129, NSEZ Noida', '1', 'support@lnexis.com', 'UK, Fra', 'Paris, France, Europe ', '2', '2', 'JTN001', '2', 0, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(250) NOT NULL,
  `job_upload_date` datetime DEFAULT NULL,
  `job_rec-date` datetime DEFAULT NULL,
  `job_due-date` datetime DEFAULT NULL,
  `jtn` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jtn`
--

CREATE TABLE `jtn` (
  `jtn_id` int(11) NOT NULL,
  `jtn_no` varchar(255) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `jtn_issue_date` datetime DEFAULT NULL,
  `job_name` varchar(100) DEFAULT NULL,
  `job_receive_date` datetime NOT NULL,
  `job_due_date` datetime DEFAULT NULL,
  `payment_term` varchar(200) NOT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `total_pages` varchar(100) DEFAULT NULL,
  `project_manager` varchar(200) NOT NULL,
  `currencys` int(11) NOT NULL,
  `jtn_document` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jtn`
--

INSERT INTO `jtn` (`jtn_id`, `jtn_no`, `customer_id`, `type`, `jtn_issue_date`, `job_name`, `job_receive_date`, `job_due_date`, `payment_term`, `unit`, `total_pages`, `project_manager`, `currencys`, `jtn_document`) VALUES
(1, 'TD-129-19-16036', 1, 'Book', '2019-05-29 00:00:00', 'Pagination', '2019-05-29 00:00:00', '2019-05-30 00:00:00', 'Monthly', 'Noida', '200', 'Konain Ahmad', 2, 0),
(2, 'TD-129-19-16037', 1, 'Book', '0000-00-00 00:00:00', 'Pagination3', '2019-05-30 00:00:00', '2019-05-31 00:00:00', 'Yearly', 'Noida', '300', 'Konain Ahmad', 5, 0),
(3, 'TD-129-19-16037', 4, 'Journal', '2019-05-30 00:00:00', 'Issues', '2019-05-30 00:00:00', '2019-05-31 00:00:00', 'Monthly', 'Mauritius', '200', 'Konain Ahmad', 1, 0),
(4, 'TD-129-19-16037', 2, 'epubs', '2019-05-30 00:00:00', 'Articles', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'Monthly', 'Gangtok', '200', 'Konain Ahmad', 2, 0),
(5, 'TD-129-19-16037', 2, 'Magazine', '2019-05-30 00:00:00', 'Pagination3', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'Yearly', 'Chennai', '300', 'Konain Ahmad', 1, 0),
(6, 'TD-129-19-16037', 2, 'epubs', '2019-05-30 00:00:00', 'Pagination3', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'Monthly', 'Chennai', '100', 'Parul', 5, 0),
(7, 'TD-129-19-16037', 4, 'epubs', '2019-05-30 00:00:00', 'Issues', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'Monthly', 'Gangtok', '200', 'Parul', 5, 0),
(8, 'TD-129-19-16038', 4, 'epubs', '2019-05-31 00:00:00', 'Pagination3', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'Yearly', 'Gangtok', '300', 'Parul not kumari', 5, 0),
(9, 'TD-129-19-16039', 4, 'Journal', '2019-05-31 00:00:00', 'Issues', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'Yearly', 'Gangtok', '300', 'Parul goyal', 2, 0),
(10, 'TD-129-19-16041', 2, 'Magazine', '2019-06-12 00:00:00', 'Type setting', '2019-06-12 00:00:00', '2019-06-20 00:00:00', 'Monthly', 'Gangtok', '350', 'Parul goyal', 1, 0),
(11, '', 2, 'epubs', '2019-06-12 00:00:00', 'Issues', '2019-06-12 00:00:00', '2019-06-14 00:00:00', 'Daily', 'Mauritius', '350', 'Parul goyal4', 7, 0),
(12, '', 4, 'Book', '2019-06-12 00:00:00', 'Appache upgradation on UAT', '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'Monthly', 'Noida', '500', 'Fabrice', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(11) NOT NULL,
  `material_code` varchar(20) DEFAULT NULL,
  `material_descp` varchar(200) DEFAULT NULL,
  `speciafication` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mhr`
--

CREATE TABLE `mhr` (
  `mhr_id` int(11) NOT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `resource_count` varchar(100) DEFAULT NULL,
  `overhead_cost` varchar(100) DEFAULT NULL,
  `support_cost` varchar(100) DEFAULT NULL,
  `total_working_days` int(11) DEFAULT NULL,
  `total_working_hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhr`
--

INSERT INTO `mhr` (`mhr_id`, `department_name`, `resource_count`, `overhead_cost`, `support_cost`, `total_working_days`, `total_working_hours`) VALUES
(1, 'IT', '40', '10', '30', 21, 8);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `access` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'y',
  `created_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outstanding_payment`
--

CREATE TABLE `outstanding_payment` (
  `receivable_id` int(11) NOT NULL,
  `segment` varchar(200) NOT NULL,
  `receivable_date` date NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `overdue_for` varchar(200) NOT NULL,
  `total_billing` float NOT NULL,
  `total_overdue` float NOT NULL,
  `not_due` varchar(150) NOT NULL,
  `taxes` varchar(150) NOT NULL,
  `freight_charges` varchar(150) NOT NULL,
  `grand_total` float NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outstanding_payment`
--

INSERT INTO `outstanding_payment` (`receivable_id`, `segment`, `receivable_date`, `customer_name`, `overdue_for`, `total_billing`, `total_overdue`, `not_due`, `taxes`, `freight_charges`, `grand_total`, `remarks`) VALUES
(1, 'Software', '2019-07-17', '1', 'Noida', 200, 100, '50', '20', '30', 500, 'I wants to update the flow.'),
(3, 'Production', '2019-07-18', '1', 'Noida', 4, 56, '4', '6', 'tr', 0, 'Test info'),
(5, 'Techology', '2019-07-18', '4', 'Gangtok', 200, 100, '50', '20', '30', 500, 'dfgdfg');

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `payment_terms_id` int(11) NOT NULL,
  `payment_terms` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(250) NOT NULL,
  `project_desc` text,
  `project_vol` int(12) DEFAULT NULL,
  `no_illustration` int(12) DEFAULT NULL,
  `project_created_by` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_desc`, `project_vol`, `no_illustration`, `project_created_by`) VALUES
(2, 'JIMMY Project', NULL, NULL, NULL, ''),
(6, 'Test', NULL, NULL, NULL, ''),
(7, 'Elsevier', NULL, NULL, NULL, ''),
(8, 'ABC', 'abc dsc', 3, NULL, ''),
(9, 'JIMMY', 'Elsevier Massion', 4, NULL, ''),
(10, 'Norton', 'Adding bi-directional linking to the note numbers in an existing ePub file', 0, NULL, ''),
(11, 'S', '', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `pr_audit_checklist`
--

CREATE TABLE `pr_audit_checklist` (
  `pr_audit_checklist_id` int(11) NOT NULL,
  `pr_srno` varchar(100) DEFAULT NULL,
  `pr_created_date` datetime DEFAULT NULL,
  `pr_audit_to` varchar(100) DEFAULT NULL,
  `pr_audit_from` varchar(100) DEFAULT NULL,
  `pr_date` datetime DEFAULT NULL,
  `pr_items` varchar(100) DEFAULT NULL,
  `pr_unit` varchar(50) DEFAULT NULL,
  `vendor_selection` varchar(200) DEFAULT NULL,
  `brand_selection` varchar(200) DEFAULT NULL,
  `bids` varchar(200) DEFAULT NULL,
  `negotiation_rounds` varchar(200) DEFAULT NULL,
  `sla_agreement` varchar(200) DEFAULT NULL,
  `agreement_late_delivery` varchar(200) DEFAULT NULL,
  `payment_agreement` varchar(200) DEFAULT NULL,
  `service_agreement` varchar(200) DEFAULT NULL,
  `amc_negotiation` varchar(200) DEFAULT NULL,
  `delivery_agreement` varchar(200) DEFAULT NULL,
  `insurance` varchar(200) DEFAULT NULL,
  `special_point` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pr_comparision_sheet`
--

CREATE TABLE `pr_comparision_sheet` (
  `pr_comparision_sheet_id` int(11) NOT NULL,
  `pr_srno` varchar(100) DEFAULT NULL,
  `desp` varchar(200) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `quoted_unit_price` varchar(100) DEFAULT NULL,
  `quoted_amount` varchar(100) DEFAULT NULL,
  `final_quoted_unit_price` varchar(100) DEFAULT NULL,
  `final_quoted_amount` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pr_internal_memo`
--

CREATE TABLE `pr_internal_memo` (
  `pr_internal_memo_id` int(11) NOT NULL,
  `pr_sr_no` varchar(255) DEFAULT NULL,
  `pr_date` datetime DEFAULT NULL,
  `pr_to` varchar(100) DEFAULT NULL COMMENT 'type id',
  `pr_from` varchar(100) DEFAULT NULL,
  `pr_from_user_id` int(11) DEFAULT NULL COMMENT 'User id of user by placed',
  `subject` varchar(500) DEFAULT NULL,
  `description` text,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pr_internal_memo`
--

INSERT INTO `pr_internal_memo` (`pr_internal_memo_id`, `pr_sr_no`, `pr_date`, `pr_to`, `pr_from`, `pr_from_user_id`, `subject`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'TD-NSEZ/2019-20/IT/1283', '2019-08-29 00:00:00', '1', '', 4, 'Stationary items', '<p>Please have look</p>\n', 'Nishikant', '2019-08-29 01:21:23', 'Anupam', '2019-08-29 04:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `pr_negotiation_matrix`
--

CREATE TABLE `pr_negotiation_matrix` (
  `pr_negotiation_matrix_id` int(11) NOT NULL,
  `pr_sr_no` varchar(100) DEFAULT NULL,
  `negotiation_matrix_date` datetime DEFAULT NULL,
  `vendor_person` varchar(20) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `negotiation` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `signature` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pr_sop_checklist`
--

CREATE TABLE `pr_sop_checklist` (
  `pr_sop_checklist_id` int(11) NOT NULL,
  `pr_sr_no` varchar(50) DEFAULT NULL,
  `check_points` varchar(200) DEFAULT NULL,
  `page_number` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pr_status`
--

CREATE TABLE `pr_status` (
  `pr_status_id` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `pr_status` enum('0','1','2') DEFAULT NULL COMMENT '0- No action, 1-Approved, 2- Rejected',
  `status_by` varchar(50) DEFAULT NULL,
  `pr_status_date` datetime DEFAULT NULL COMMENT 'Date action taken',
  `remarks` varchar(255) DEFAULT NULL,
  `action_first_user_id` int(11) DEFAULT NULL COMMENT 'first reviewer user id',
  `action_second_user_id` int(11) DEFAULT NULL COMMENT 'next reviewer user id',
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pr_status`
--

INSERT INTO `pr_status` (`pr_status_id`, `pr_no`, `pr_status`, `status_by`, `pr_status_date`, `remarks`, `action_first_user_id`, `action_second_user_id`, `created_date`, `modified_date`) VALUES
(1, 'TD-NSEZ/2019-20/IT/1283', '1', 'Anupam Kumar', '2019-08-29 01:31:09', 'Approved', 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `po_id` int(11) NOT NULL,
  `po_date` datetime DEFAULT NULL,
  `material_code` varchar(20) DEFAULT NULL,
  `material_descp` varchar(200) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `delivery_schedule` int(11) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `po_desp` varchar(200) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `pr_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sr_no` varchar(100) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `unit_region_id` int(11) DEFAULT NULL,
  `pr_issue_date` datetime DEFAULT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `expense` varchar(20) DEFAULT NULL,
  `pr_recd_on` date DEFAULT NULL,
  `order_placed_by` varchar(100) DEFAULT NULL,
  `action_taken_by` varchar(100) DEFAULT NULL,
  `phone_person` enum('1','2') DEFAULT NULL COMMENT '1-OnPhone,2-Inperson',
  `pr_description` text,
  `units` int(11) DEFAULT NULL,
  `avg_cods` varchar(100) DEFAULT NULL,
  `qty_in_stock` int(11) DEFAULT NULL,
  `reorder_point` varchar(100) DEFAULT NULL,
  `reorder_quantity` varchar(100) DEFAULT NULL,
  `qty_req` int(11) DEFAULT NULL,
  `pr_supplier_rate` varchar(100) DEFAULT NULL,
  `pr_supplier_supplier` varchar(100) DEFAULT NULL,
  `order_placed_rate` varchar(100) DEFAULT NULL,
  `order_placed_supplier` varchar(100) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '0' COMMENT '0-Pending,1-Approved,2-Rejected',
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_request`
--

INSERT INTO `purchase_request` (`pr_id`, `user_id`, `sr_no`, `department_id`, `unit_region_id`, `pr_issue_date`, `supplier_name`, `expense`, `pr_recd_on`, `order_placed_by`, `action_taken_by`, `phone_person`, `pr_description`, `units`, `avg_cods`, `qty_in_stock`, `reorder_point`, `reorder_quantity`, `qty_req`, `pr_supplier_rate`, `pr_supplier_supplier`, `order_placed_rate`, `order_placed_supplier`, `status`, `created_date`, `modified_date`) VALUES
(1, 4, 'TD-NSEZ/2019-20/IT/1283', 2, 4, '2019-08-29 00:00:00', 'Parul Goyal', '', '0000-00-00', 'Nishikant', '4', '1', 'Mouse', 34, 'MS', 30, '20', '20', 45, '200', '9000', '250', '11250', '1', '2019-08-29 01:20:16', '2019-08-28 23:31:09'),
(2, 4, 'TD-NSEZ/2019-20/IT/1283', 2, 4, '2019-08-29 00:00:00', 'Parul Goyal', '', '0000-00-00', 'Nishikant', '4', '1', 'Pen', 50, 'PN', 100, '190', '200', 250, '25', '6250', '30', '7500', '1', '2019-08-29 01:20:16', '2019-08-28 23:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quotation_id` int(11) NOT NULL,
  `quotation_no` varchar(100) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `sub_activity_id` int(11) DEFAULT NULL,
  `total_pages` int(11) DEFAULT NULL,
  `jtn_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `payment_terms_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `norms_per_shift` varchar(100) DEFAULT NULL,
  `illustrations` int(30) DEFAULT NULL,
  `complexity_level` varchar(50) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quotation_id`, `quotation_no`, `client_id`, `project_id`, `activity_id`, `sub_activity_id`, `total_pages`, `jtn_id`, `type_id`, `payment_terms_id`, `account_id`, `norms_per_shift`, `illustrations`, `complexity_level`, `created_by`) VALUES
(1, '8510', 2, 9, 1, NULL, 3, 0, NULL, 30, 1, '', 2, '', ''),
(2, '3565', 0, 0, 0, NULL, 0, 0, NULL, 30, 1, '', 0, '', ''),
(3, '3565', 0, 0, 0, NULL, 0, 0, NULL, 30, 1, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `quot_sub_activity`
--

CREATE TABLE `quot_sub_activity` (
  `quot_sub_activity_id` int(11) NOT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `sub_activity_id` int(11) DEFAULT NULL,
  `complexity_level_id` int(11) DEFAULT NULL,
  `norms` varchar(100) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `mhr` varchar(50) DEFAULT NULL,
  `production_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quot_sub_activity`
--

INSERT INTO `quot_sub_activity` (`quot_sub_activity_id`, `quotation_id`, `sub_activity_id`, `complexity_level_id`, `norms`, `unit`, `mhr`, `production_rate`) VALUES
(1, 1, 1, 1, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `segment`
--

CREATE TABLE `segment` (
  `segment_id` int(11) NOT NULL,
  `segment_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_activity`
--

CREATE TABLE `sub_activity` (
  `sub_activity_id` int(11) NOT NULL,
  `sub_activity_name` varchar(250) NOT NULL,
  `sub_activity_desc` text,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_activity`
--

INSERT INTO `sub_activity` (`sub_activity_id`, `sub_activity_name`, `sub_activity_desc`, `activity_id`) VALUES
(1, 'Input Analysis', NULL, 1),
(2, 'Cast off', NULL, 1),
(3, 'Pagination', NULL, 1),
(4, 'Quality Check', NULL, 1),
(5, 'Graphics', NULL, 1),
(6, 'House Corrections', NULL, 1),
(7, 'Master Editing', NULL, 1),
(8, 'Pagination - First Revision', NULL, 1),
(9, 'Quality Check - First Revision', NULL, 1),
(10, 'Graphics - First Revision', NULL, 1),
(11, 'Pagination - Second Revision', NULL, 1),
(12, 'Quality Check - Second Revision', NULL, 1),
(13, 'Graphics - Second Revision', NULL, 1),
(14, 'Printer', NULL, 1),
(15, 'Archiving', NULL, 1),
(16, 'sub_activity_name', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(250) DEFAULT NULL,
  `supplier_desp` text,
  `supplier_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_desp`, `supplier_email`) VALUES
(1, 'Parul Goyal', 'suuplier', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `title_id` int(11) NOT NULL,
  `title_name` varchar(200) NOT NULL,
  `title_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`title_id`, `title_name`, `title_date`) VALUES
(1, 'Invoice title 1', '2019-06-18'),
(2, 'Invoice title 2', '2019-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `transactionmaster`
--

CREATE TABLE `transactionmaster` (
  `tra_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amt` varchar(100) DEFAULT NULL,
  `tra_status` varchar(50) DEFAULT 'N',
  `tracking_id` varchar(20) DEFAULT NULL,
  `bank_ref_no` varchar(250) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `failure_message` varchar(1000) DEFAULT NULL,
  `payment_mode` varchar(250) DEFAULT NULL,
  `card_name` varchar(100) DEFAULT NULL,
  `status_message` varchar(150) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `department_id` int(4) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `parent_id` int(4) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-inactive,1-active',
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `department_id`, `type_name`, `parent_id`, `status`, `created_date`, `modified_date`) VALUES
(1, 1, 'VP', 0, '1', '2019-08-22 00:00:00', '2019-08-22 10:38:27'),
(2, 1, 'Admin manager', 1, '1', '2019-08-21 21:05:24', '0000-00-00 00:00:00'),
(3, 1, 'Admin User', 2, '1', '2019-08-21 21:08:11', '0000-00-00 00:00:00'),
(4, 2, 'IT Manager', 2, '1', '2019-08-21 21:10:44', '0000-00-00 00:00:00'),
(5, 2, 'IT User', 4, '1', '2019-08-21 21:11:05', '0000-00-00 00:00:00'),
(6, 3, 'Account Manager', 2, '1', '2019-08-21 21:11:37', '0000-00-00 00:00:00'),
(7, 3, 'Account User', 6, '1', '2019-08-21 21:11:58', '0000-00-00 00:00:00'),
(10, 1, 'Purchase Department', 2, '1', '2019-08-28 19:32:07', '2019-08-28 21:18:35'),
(11, 1, 'ED', 0, '1', '2019-08-28 10:00:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit`) VALUES
(1, 'pages'),
(2, 'figures'),
(3, 'hours'),
(4, 'book');

-- --------------------------------------------------------

--
-- Table structure for table `unit_region`
--

CREATE TABLE `unit_region` (
  `unit_region_id` int(11) NOT NULL,
  `unit_region_name` varchar(50) NOT NULL,
  `unit_region_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_region`
--

INSERT INTO `unit_region` (`unit_region_id`, `unit_region_name`, `unit_region_code`) VALUES
(1, 'MAURITIUS', 'MAU'),
(2, 'GANGTOK', 'GTK'),
(3, 'CHENNAI', 'CH'),
(4, 'NOIDA', 'NSEZ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `email_id` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `type` int(4) NOT NULL,
  `department_id` int(4) DEFAULT NULL COMMENT 'Department id',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-deactive, 1-active',
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `fname`, `lname`, `email_id`, `photo`, `type`, `department_id`, `status`, `created_date`, `modified_date`) VALUES
(2, 'mangatram', 'zaq123', 'mangat', 'ram', 'mangat@gmail.com', NULL, 7, 3, '1', '2019-08-22 12:13:15', NULL),
(3, 'test', 'test', 'test', 'test', NULL, NULL, 3, 1, '0', NULL, NULL),
(4, 'nishikant', '12345', 'Nishikant', 'kr', 'visit2nkant@gmail.com', '', 5, 2, '', '2019-08-26 19:54:45', '2019-08-28 02:31:59'),
(5, 'Anupam', '12345', 'Anupam', 'Kumar', 'coolvishalkumar2009@gmail.com', NULL, 4, 2, '1', '2019-08-26 20:00:02', '2019-08-27 19:02:50'),
(6, 'Vp', '12345', 'Vp', 'Kiumar', 'vp@gmail.com', NULL, 1, 1, '1', '2019-08-28 05:06:48', NULL),
(7, 'pu', '12345', 'Ramesh', 'Sharma', 'pu@gmail.com', NULL, 10, 1, '1', '2019-08-28 19:33:53', '2019-08-28 22:10:31'),
(8, 'Ed', '12345', 'ED', 'ED', 'ed@gmail.com', NULL, 11, 1, '1', '2019-08-28 19:34:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_receivable`
--
ALTER TABLE `account_receivable`
  ADD PRIMARY KEY (`receivable_id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `approval_chain`
--
ALTER TABLE `approval_chain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `complexity_level`
--
ALTER TABLE `complexity_level`
  ADD PRIMARY KEY (`complexity_level_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `form_access`
--
ALTER TABLE `form_access`
  ADD PRIMARY KEY (`formaccess_id`);

--
-- Indexes for table `invoice_activity`
--
ALTER TABLE `invoice_activity`
  ADD PRIMARY KEY (`inv_act_id`);

--
-- Indexes for table `invoice_query`
--
ALTER TABLE `invoice_query`
  ADD PRIMARY KEY (`inv_qry`);

--
-- Indexes for table `invoicing`
--
ALTER TABLE `invoicing`
  ADD PRIMARY KEY (`invoicing_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `jtn`
--
ALTER TABLE `jtn`
  ADD PRIMARY KEY (`jtn_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `mhr`
--
ALTER TABLE `mhr`
  ADD PRIMARY KEY (`mhr_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `outstanding_payment`
--
ALTER TABLE `outstanding_payment`
  ADD PRIMARY KEY (`receivable_id`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`payment_terms_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `pr_audit_checklist`
--
ALTER TABLE `pr_audit_checklist`
  ADD PRIMARY KEY (`pr_audit_checklist_id`);

--
-- Indexes for table `pr_comparision_sheet`
--
ALTER TABLE `pr_comparision_sheet`
  ADD PRIMARY KEY (`pr_comparision_sheet_id`);

--
-- Indexes for table `pr_internal_memo`
--
ALTER TABLE `pr_internal_memo`
  ADD PRIMARY KEY (`pr_internal_memo_id`);

--
-- Indexes for table `pr_negotiation_matrix`
--
ALTER TABLE `pr_negotiation_matrix`
  ADD PRIMARY KEY (`pr_negotiation_matrix_id`);

--
-- Indexes for table `pr_sop_checklist`
--
ALTER TABLE `pr_sop_checklist`
  ADD PRIMARY KEY (`pr_sop_checklist_id`);

--
-- Indexes for table `pr_status`
--
ALTER TABLE `pr_status`
  ADD PRIMARY KEY (`pr_status_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quotation_id`);

--
-- Indexes for table `quot_sub_activity`
--
ALTER TABLE `quot_sub_activity`
  ADD PRIMARY KEY (`quot_sub_activity_id`);

--
-- Indexes for table `segment`
--
ALTER TABLE `segment`
  ADD PRIMARY KEY (`segment_id`);

--
-- Indexes for table `sub_activity`
--
ALTER TABLE `sub_activity`
  ADD PRIMARY KEY (`sub_activity_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `transactionmaster`
--
ALTER TABLE `transactionmaster`
  ADD PRIMARY KEY (`tra_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `unit_region`
--
ALTER TABLE `unit_region`
  ADD PRIMARY KEY (`unit_region_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_receivable`
--
ALTER TABLE `account_receivable`
  MODIFY `receivable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `approval_chain`
--
ALTER TABLE `approval_chain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complexity_level`
--
ALTER TABLE `complexity_level`
  MODIFY `complexity_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `form_access`
--
ALTER TABLE `form_access`
  MODIFY `formaccess_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_activity`
--
ALTER TABLE `invoice_activity`
  MODIFY `inv_act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `invoice_query`
--
ALTER TABLE `invoice_query`
  MODIFY `inv_qry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoicing`
--
ALTER TABLE `invoicing`
  MODIFY `invoicing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jtn`
--
ALTER TABLE `jtn`
  MODIFY `jtn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mhr`
--
ALTER TABLE `mhr`
  MODIFY `mhr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outstanding_payment`
--
ALTER TABLE `outstanding_payment`
  MODIFY `receivable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `payment_terms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pr_audit_checklist`
--
ALTER TABLE `pr_audit_checklist`
  MODIFY `pr_audit_checklist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pr_comparision_sheet`
--
ALTER TABLE `pr_comparision_sheet`
  MODIFY `pr_comparision_sheet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pr_internal_memo`
--
ALTER TABLE `pr_internal_memo`
  MODIFY `pr_internal_memo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pr_negotiation_matrix`
--
ALTER TABLE `pr_negotiation_matrix`
  MODIFY `pr_negotiation_matrix_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pr_sop_checklist`
--
ALTER TABLE `pr_sop_checklist`
  MODIFY `pr_sop_checklist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pr_status`
--
ALTER TABLE `pr_status`
  MODIFY `pr_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quot_sub_activity`
--
ALTER TABLE `quot_sub_activity`
  MODIFY `quot_sub_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `segment`
--
ALTER TABLE `segment`
  MODIFY `segment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_activity`
--
ALTER TABLE `sub_activity`
  MODIFY `sub_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactionmaster`
--
ALTER TABLE `transactionmaster`
  MODIFY `tra_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit_region`
--
ALTER TABLE `unit_region`
  MODIFY `unit_region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
