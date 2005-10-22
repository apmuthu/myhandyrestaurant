-- MySQL dump 10.9
--
-- Host: localhost    Database: myhandyrestaurant-acc
-- ------------------------------------------------------
-- Server version	4.1.14-Debian_6-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mhr_account_account_log`
--

DROP TABLE IF EXISTS `mhr_account_account_log`;
CREATE TABLE `mhr_account_account_log` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `account_id` int(10) unsigned NOT NULL default '0',
  `type` int(11) NOT NULL default '0',
  `amount` decimal(10,2) NOT NULL default '0.00',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  `mgmt_id` bigint(20) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_account_accounts`
--

DROP TABLE IF EXISTS `mhr_account_accounts`;
CREATE TABLE `mhr_account_accounts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `bank` text NOT NULL,
  `name` text NOT NULL,
  `number` tinytext NOT NULL,
  `abi` tinytext NOT NULL,
  `cab` tinytext NOT NULL,
  `cin` tinytext NOT NULL,
  `bic1` tinytext NOT NULL,
  `bic2` tinytext NOT NULL,
  `iban` tinytext NOT NULL,
  `amount` decimal(10,2) NOT NULL default '0.00',
  `currency` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_account_log`
--

DROP TABLE IF EXISTS `mhr_account_log`;
CREATE TABLE `mhr_account_log` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `waiter` text NOT NULL,
  `destination` text NOT NULL,
  `dish` text NOT NULL,
  `ingredient` text NOT NULL,
  `operation` tinyint(4) NOT NULL default '0',
  `category` text NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL default '0',
  `price` decimal(10,2) NOT NULL default '0.00',
  `transaction` bigint(20) unsigned NOT NULL default '0',
  `table` bigint(20) NOT NULL default '0',
  UNIQUE KEY `id` (`id`),
  KEY `datetime` (`datetime`),
  KEY `datetime_2` (`datetime`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_accounts`
--

DROP TABLE IF EXISTS `mhr_accounts`;
CREATE TABLE `mhr_accounts` (
  `id` bigint(20) NOT NULL auto_increment,
  `class` text NOT NULL,
  `hidden` tinyint(4) NOT NULL default '0',
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_bill_accounts`
--

DROP TABLE IF EXISTS `mhr_bill_accounts`;
CREATE TABLE `mhr_bill_accounts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` text NOT NULL,
  `amount` decimal(10,2) NOT NULL default '0.00',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_bill_data`
--

DROP TABLE IF EXISTS `mhr_bill_data`;
CREATE TABLE `mhr_bill_data` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `internal_id` text NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL default '0.00',
  `deleted` tinyint(4) NOT NULL default '0',
  `discount` decimal(10,2) NOT NULL default '0.00',
  `vat` decimal(10,2) NOT NULL default '0.00',
  `text` text NOT NULL,
  `customer` bigint(20) NOT NULL default '0',
  `table` bigint(20) NOT NULL default '0',
  `transaction` bigint(20) NOT NULL default '0',
  `account` int(10) unsigned NOT NULL default '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_cash_accounts`
--

DROP TABLE IF EXISTS `mhr_cash_accounts`;
CREATE TABLE `mhr_cash_accounts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` text NOT NULL,
  `amount` decimal(10,2) NOT NULL default '0.00',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_cash_data`
--

DROP TABLE IF EXISTS `mhr_cash_data`;
CREATE TABLE `mhr_cash_data` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `amount` decimal(10,2) NOT NULL default '0.00',
  `deleted` tinyint(4) NOT NULL default '0',
  `transaction` bigint(20) NOT NULL default '0',
  `account` int(10) unsigned NOT NULL default '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_invoice_accounts`
--

DROP TABLE IF EXISTS `mhr_invoice_accounts`;
CREATE TABLE `mhr_invoice_accounts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` text NOT NULL,
  `amount` decimal(10,2) NOT NULL default '0.00',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_invoice_data`
--

DROP TABLE IF EXISTS `mhr_invoice_data`;
CREATE TABLE `mhr_invoice_data` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `internal_id` text NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL default '0.00',
  `deleted` tinyint(4) NOT NULL default '0',
  `discount` decimal(10,2) NOT NULL default '0.00',
  `vat` decimal(10,2) NOT NULL default '0.00',
  `text` text NOT NULL,
  `customer` bigint(20) NOT NULL default '0',
  `table` bigint(20) NOT NULL default '0',
  `paid` tinyint(4) NOT NULL default '1',
  `transaction` bigint(20) NOT NULL default '0',
  `account` int(10) unsigned NOT NULL default '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_last_orders`
--

DROP TABLE IF EXISTS `mhr_last_orders`;
CREATE TABLE `mhr_last_orders` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `dishid` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_receipt_accounts`
--

DROP TABLE IF EXISTS `mhr_receipt_accounts`;
CREATE TABLE `mhr_receipt_accounts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` text NOT NULL,
  `amount` decimal(10,2) NOT NULL default '0.00',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_receipt_data`
--

DROP TABLE IF EXISTS `mhr_receipt_data`;
CREATE TABLE `mhr_receipt_data` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `internal_id` text NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL default '0.00',
  `deleted` tinyint(4) NOT NULL default '0',
  `discount` decimal(10,2) NOT NULL default '0.00',
  `vat` decimal(10,2) NOT NULL default '0.00',
  `text` text NOT NULL,
  `customer` bigint(20) NOT NULL default '0',
  `table` bigint(20) NOT NULL default '0',
  `transaction` bigint(20) NOT NULL default '0',
  `account` int(10) unsigned NOT NULL default '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_tickets_log`
--

DROP TABLE IF EXISTS `mhr_tickets_log`;
CREATE TABLE `mhr_tickets_log` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `text` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `destination` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_transactions`
--

DROP TABLE IF EXISTS `mhr_transactions`;
CREATE TABLE `mhr_transactions` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp NULL default CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `fromClass` text NOT NULL,
  `fromID` bigint(20) NOT NULL default '0',
  `fromRecipient` bigint(20) NOT NULL default '0',
  `toRecipient` bigint(20) NOT NULL default '0',
  `toClass` text NOT NULL,
  `toID` bigint(20) NOT NULL default '0',
  `amount` decimal(10,2) NOT NULL default '0.00',
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `date` (`timestamp`),
  KEY `class` (`fromClass`(10))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

