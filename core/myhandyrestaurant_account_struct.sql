-- MySQL dump 9.11
--
-- Host: localhost    Database: myhandyrestaurant-acc
-- ------------------------------------------------------
-- Server version	4.0.23_Debian-3-log

--
-- Table structure for table `mhr_account_account_log`
--

DROP TABLE IF EXISTS `mhr_account_account_log`;
CREATE TABLE `mhr_account_account_log` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `account_id` int(10) unsigned NOT NULL default '0',
  `type` int(11) NOT NULL default '0',
  `amount` decimal(10,2) NOT NULL default '0.00',
  `timestamp` timestamp(14) NOT NULL,
  `description` text NOT NULL,
  `mgmt_id` bigint(20) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_account_log`
--

DROP TABLE IF EXISTS `mhr_account_log`;
CREATE TABLE `mhr_account_log` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `datetime` timestamp(14) NOT NULL,
  `waiter` text NOT NULL,
  `destination` text NOT NULL,
  `dish` text NOT NULL,
  `ingredient` text NOT NULL,
  `operation` tinyint(4) NOT NULL default '0',
  `category` text NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL default '0',
  `price` decimal(10,2) NOT NULL default '0.00',
  `payment` int(4) unsigned NOT NULL default '0',
  UNIQUE KEY `id` (`id`),
  KEY `datetime` (`datetime`),
  KEY `datetime_2` (`datetime`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_account_mgmt_addressbook`
--

DROP TABLE IF EXISTS `mhr_account_mgmt_addressbook`;
CREATE TABLE `mhr_account_mgmt_addressbook` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `vat` text NOT NULL,
  `address` text NOT NULL,
  `telephone` text NOT NULL,
  `fax` text NOT NULL,
  `bank_account` text NOT NULL,
  `abi` text NOT NULL,
  `cab` text NOT NULL,
  `meal_circuit` text NOT NULL,
  `type` tinyint(4) NOT NULL default '0',
  `note` text NOT NULL,
  `email` text NOT NULL,
  `web` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_account_mgmt_main`
--

DROP TABLE IF EXISTS `mhr_account_mgmt_main`;
CREATE TABLE `mhr_account_mgmt_main` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `date` timestamp(14) NOT NULL,
  `cash_amount` decimal(10,2) NOT NULL default '0.00',
  `cash_taxable_amount` decimal(10,2) NOT NULL default '0.00',
  `cash_vat_amount` decimal(10,2) NOT NULL default '0.00',
  `bank_amount` decimal(10,2) NOT NULL default '0.00',
  `bank_taxable_amount` decimal(10,2) NOT NULL default '0.00',
  `bank_vat_amount` decimal(10,2) NOT NULL default '0.00',
  `debit_amount` decimal(10,2) NOT NULL default '0.00',
  `debit_taxable_amount` decimal(10,2) NOT NULL default '0.00',
  `debit_vat_amount` decimal(10,2) NOT NULL default '0.00',
  `debit` tinyint(4) NOT NULL default '0',
  `paid` tinyint(4) NOT NULL default '0',
  `type` tinyint(4) NOT NULL default '0',
  `description` text NOT NULL,
  `number` text NOT NULL,
  `who` text NOT NULL,
  `stock_object` text NOT NULL,
  `associated_invoice` int(11) NOT NULL default '0',
  `internal_id` text NOT NULL,
  `annulled` tinyint(4) NOT NULL default '0',
  `waiter_income` tinyint(4) NOT NULL default '0',
  `account_id` int(11) unsigned NOT NULL default '0',
  `account_movement` bigint(20) unsigned NOT NULL default '0',
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_account_receipts`
--

DROP TABLE IF EXISTS `mhr_account_receipts`;
CREATE TABLE `mhr_account_receipts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `internal_id` text NOT NULL,
  `timestamp` timestamp(14) NOT NULL,
  `amount` decimal(10,2) NOT NULL default '0.00',
  `type` tinyint(4) NOT NULL default '0',
  `annulled` tinyint(4) NOT NULL default '0',
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_account_stock_log`
--

DROP TABLE IF EXISTS `mhr_account_stock_log`;
CREATE TABLE `mhr_account_stock_log` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `timestamp` timestamp(14) NOT NULL,
  `name` text NOT NULL,
  `quantity` int(11) NOT NULL default '0',
  `invoice_id` bigint(20) unsigned NOT NULL default '0',
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

