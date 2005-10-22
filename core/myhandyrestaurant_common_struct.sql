-- MySQL dump 10.9
--
-- Host: localhost    Database: myhandyrestaurant
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
-- Table structure for table `mhr_accounting_dbs`
--

DROP TABLE IF EXISTS `mhr_accounting_dbs`;
CREATE TABLE `mhr_accounting_dbs` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` text NOT NULL,
  `db` text NOT NULL,
  `print_bill` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_allowed_clients`
--

DROP TABLE IF EXISTS `mhr_allowed_clients`;
CREATE TABLE `mhr_allowed_clients` (
  `id` bigint(20) NOT NULL auto_increment,
  `host` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_autocalc`
--

DROP TABLE IF EXISTS `mhr_autocalc`;
CREATE TABLE `mhr_autocalc` (
  `id` smallint(6) NOT NULL auto_increment,
  `name` text NOT NULL,
  `quantity` tinyint(4) NOT NULL default '0',
  `price` decimal(10,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_categories`
--

DROP TABLE IF EXISTS `mhr_categories`;
CREATE TABLE `mhr_categories` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` text NOT NULL,
  `htmlcolor` text NOT NULL,
  `vat_rate` mediumint(9) NOT NULL default '0',
  `priority` tinyint(4) NOT NULL default '0',
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_categories_ar`
--

DROP TABLE IF EXISTS `mhr_categories_ar`;
CREATE TABLE `mhr_categories_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_categories_en`
--

DROP TABLE IF EXISTS `mhr_categories_en`;
CREATE TABLE `mhr_categories_en` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_categories_fr`
--

DROP TABLE IF EXISTS `mhr_categories_fr`;
CREATE TABLE `mhr_categories_fr` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_categories_id`
--

DROP TABLE IF EXISTS `mhr_categories_id`;
CREATE TABLE `mhr_categories_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_categories_it`
--

DROP TABLE IF EXISTS `mhr_categories_it`;
CREATE TABLE `mhr_categories_it` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_categories_ro`
--

DROP TABLE IF EXISTS `mhr_categories_ro`;
CREATE TABLE `mhr_categories_ro` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_categories_ru`
--

DROP TABLE IF EXISTS `mhr_categories_ru`;
CREATE TABLE `mhr_categories_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_conf`
--

DROP TABLE IF EXISTS `mhr_conf`;
CREATE TABLE `mhr_conf` (
  `id` int(11) NOT NULL auto_increment,
  `name` mediumtext NOT NULL,
  `value` mediumtext NOT NULL,
  `bool` tinyint(4) NOT NULL default '0',
  `defaultval` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`(10))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_conf_ar`
--

DROP TABLE IF EXISTS `mhr_conf_ar`;
CREATE TABLE `mhr_conf_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_conf_en`
--

DROP TABLE IF EXISTS `mhr_conf_en`;
CREATE TABLE `mhr_conf_en` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_conf_fr`
--

DROP TABLE IF EXISTS `mhr_conf_fr`;
CREATE TABLE `mhr_conf_fr` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_conf_id`
--

DROP TABLE IF EXISTS `mhr_conf_id`;
CREATE TABLE `mhr_conf_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_conf_it`
--

DROP TABLE IF EXISTS `mhr_conf_it`;
CREATE TABLE `mhr_conf_it` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_conf_ro`
--

DROP TABLE IF EXISTS `mhr_conf_ro`;
CREATE TABLE `mhr_conf_ro` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_conf_ru`
--

DROP TABLE IF EXISTS `mhr_conf_ru`;
CREATE TABLE `mhr_conf_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_contacts`
--

DROP TABLE IF EXISTS `mhr_contacts`;
CREATE TABLE `mhr_contacts` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `company` text NOT NULL,
  `vat` text NOT NULL,
  `address` text NOT NULL,
  `telephone` text NOT NULL,
  `mobile` text NOT NULL,
  `fax` text NOT NULL,
  `category` tinyint(4) NOT NULL default '0',
  `note` text NOT NULL,
  `email` text NOT NULL,
  `www` text NOT NULL,
  `deleted` tinyint(4) NOT NULL default '0',
  `uid` bigint(20) NOT NULL default '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_countries`
--

DROP TABLE IF EXISTS `mhr_countries`;
CREATE TABLE `mhr_countries` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `currency_letter` text NOT NULL,
  `currency_name` text NOT NULL,
  `currency_html` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_customers`
--

DROP TABLE IF EXISTS `mhr_customers`;
CREATE TABLE `mhr_customers` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` tinytext NOT NULL,
  `surname` tinytext NOT NULL,
  `address` text NOT NULL,
  `city` tinytext NOT NULL,
  `zip` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `mobile` tinytext NOT NULL,
  `email` mediumtext NOT NULL,
  `vat_account` tinytext NOT NULL,
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_dests`
--

DROP TABLE IF EXISTS `mhr_dests`;
CREATE TABLE `mhr_dests` (
  `id` bigint(9) NOT NULL auto_increment,
  `name` text NOT NULL,
  `dest` text NOT NULL,
  `driver` tinytext NOT NULL,
  `bill` tinyint(4) NOT NULL default '0',
  `invoice` tinyint(4) NOT NULL default '0',
  `receipt` tinyint(4) NOT NULL default '0',
  `language` tinytext NOT NULL,
  `template` text NOT NULL,
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_dishes`
--

DROP TABLE IF EXISTS `mhr_dishes`;
CREATE TABLE `mhr_dishes` (
  `id` bigint(9) NOT NULL auto_increment,
  `name` text NOT NULL,
  `ingreds` text NOT NULL,
  `destid` mediumint(9) NOT NULL default '0',
  `price` decimal(10,2) NOT NULL default '0.00',
  `category` mediumint(9) NOT NULL default '1',
  `autocalc` smallint(4) NOT NULL default '0',
  `dispingreds` text NOT NULL,
  `stock_is_on` tinyint(4) NOT NULL default '0',
  `stock` int(11) NOT NULL default '0',
  `generic` tinyint(4) NOT NULL default '0',
  `visible` tinyint(4) NOT NULL default '1',
  `autocalc_skip` tinyint(4) NOT NULL default '0',
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `name` (`name`(14))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_dishes_ar`
--

DROP TABLE IF EXISTS `mhr_dishes_ar`;
CREATE TABLE `mhr_dishes_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_dishes_en`
--

DROP TABLE IF EXISTS `mhr_dishes_en`;
CREATE TABLE `mhr_dishes_en` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_dishes_fr`
--

DROP TABLE IF EXISTS `mhr_dishes_fr`;
CREATE TABLE `mhr_dishes_fr` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_dishes_id`
--

DROP TABLE IF EXISTS `mhr_dishes_id`;
CREATE TABLE `mhr_dishes_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_dishes_it`
--

DROP TABLE IF EXISTS `mhr_dishes_it`;
CREATE TABLE `mhr_dishes_it` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_dishes_ro`
--

DROP TABLE IF EXISTS `mhr_dishes_ro`;
CREATE TABLE `mhr_dishes_ro` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_dishes_ru`
--

DROP TABLE IF EXISTS `mhr_dishes_ru`;
CREATE TABLE `mhr_dishes_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_ingreds`
--

DROP TABLE IF EXISTS `mhr_ingreds`;
CREATE TABLE `mhr_ingreds` (
  `id` bigint(9) NOT NULL auto_increment,
  `name` text NOT NULL,
  `price` decimal(10,2) NOT NULL default '0.00',
  `category` mediumint(9) NOT NULL default '1',
  `override_autocalc` tinyint(4) NOT NULL default '0',
  `visible` tinyint(4) NOT NULL default '1',
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_ingreds_ar`
--

DROP TABLE IF EXISTS `mhr_ingreds_ar`;
CREATE TABLE `mhr_ingreds_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_ingreds_en`
--

DROP TABLE IF EXISTS `mhr_ingreds_en`;
CREATE TABLE `mhr_ingreds_en` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_ingreds_fr`
--

DROP TABLE IF EXISTS `mhr_ingreds_fr`;
CREATE TABLE `mhr_ingreds_fr` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_ingreds_id`
--

DROP TABLE IF EXISTS `mhr_ingreds_id`;
CREATE TABLE `mhr_ingreds_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_ingreds_it`
--

DROP TABLE IF EXISTS `mhr_ingreds_it`;
CREATE TABLE `mhr_ingreds_it` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_ingreds_ro`
--

DROP TABLE IF EXISTS `mhr_ingreds_ro`;
CREATE TABLE `mhr_ingreds_ro` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_ingreds_ru`
--

DROP TABLE IF EXISTS `mhr_ingreds_ru`;
CREATE TABLE `mhr_ingreds_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_lang`
--

DROP TABLE IF EXISTS `mhr_lang`;
CREATE TABLE `mhr_lang` (
  `id` int(11) NOT NULL auto_increment,
  `name` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`(20))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_lang_ar`
--

DROP TABLE IF EXISTS `mhr_lang_ar`;
CREATE TABLE `mhr_lang_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_lang_en`
--

DROP TABLE IF EXISTS `mhr_lang_en`;
CREATE TABLE `mhr_lang_en` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_lang_fr`
--

DROP TABLE IF EXISTS `mhr_lang_fr`;
CREATE TABLE `mhr_lang_fr` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_lang_id`
--

DROP TABLE IF EXISTS `mhr_lang_id`;
CREATE TABLE `mhr_lang_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_lang_it`
--

DROP TABLE IF EXISTS `mhr_lang_it`;
CREATE TABLE `mhr_lang_it` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_lang_ro`
--

DROP TABLE IF EXISTS `mhr_lang_ro`;
CREATE TABLE `mhr_lang_ro` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_lang_ru`
--

DROP TABLE IF EXISTS `mhr_lang_ru`;
CREATE TABLE `mhr_lang_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_people_types`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types`;
CREATE TABLE `mhr_mgmt_people_types` (
  `id` tinyint(4) NOT NULL auto_increment,
  `name` text NOT NULL,
  `deleted` tinyint(4) NOT NULL default '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_people_types_ar`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_ar`;
CREATE TABLE `mhr_mgmt_people_types_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_people_types_en`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_en`;
CREATE TABLE `mhr_mgmt_people_types_en` (
  `id` tinyint(4) NOT NULL auto_increment,
  `table_id` tinyint(4) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_people_types_fr`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_fr`;
CREATE TABLE `mhr_mgmt_people_types_fr` (
  `id` tinyint(4) NOT NULL auto_increment,
  `table_id` tinyint(4) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_people_types_id`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_id`;
CREATE TABLE `mhr_mgmt_people_types_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_people_types_it`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_it`;
CREATE TABLE `mhr_mgmt_people_types_it` (
  `id` tinyint(4) NOT NULL auto_increment,
  `table_id` tinyint(4) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_people_types_ro`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_ro`;
CREATE TABLE `mhr_mgmt_people_types_ro` (
  `id` tinyint(4) NOT NULL auto_increment,
  `table_id` tinyint(4) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_people_types_ru`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_ru`;
CREATE TABLE `mhr_mgmt_people_types_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_types`
--

DROP TABLE IF EXISTS `mhr_mgmt_types`;
CREATE TABLE `mhr_mgmt_types` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `account_only` tinyint(4) NOT NULL default '0',
  `is_invoice` tinyint(4) NOT NULL default '0',
  `is_receipt` tinyint(4) NOT NULL default '0',
  `log_to_bank` tinyint(3) unsigned NOT NULL default '0',
  `is_invoice_payment` tinyint(3) unsigned NOT NULL default '0',
  `is_bill` tinyint(4) NOT NULL default '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_types_ar`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_ar`;
CREATE TABLE `mhr_mgmt_types_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_types_en`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_en`;
CREATE TABLE `mhr_mgmt_types_en` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_types_fr`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_fr`;
CREATE TABLE `mhr_mgmt_types_fr` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_types_id`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_id`;
CREATE TABLE `mhr_mgmt_types_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_types_it`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_it`;
CREATE TABLE `mhr_mgmt_types_it` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_types_ro`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_ro`;
CREATE TABLE `mhr_mgmt_types_ro` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_mgmt_types_ru`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_ru`;
CREATE TABLE `mhr_mgmt_types_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_orders`
--

DROP TABLE IF EXISTS `mhr_orders`;
CREATE TABLE `mhr_orders` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `dishid` mediumint(9) NOT NULL default '0',
  `printed` datetime default '0000-00-00 00:00:00',
  `suspend` tinyint(4) NOT NULL default '0',
  `associated_id` mediumint(9) NOT NULL default '0',
  `operation` mediumint(9) NOT NULL default '0',
  `ingredid` text NOT NULL,
  `ingred_qty` tinyint(4) NOT NULL default '0',
  `extra_care` tinyint(4) NOT NULL default '0',
  `sourceid` mediumint(9) NOT NULL default '0',
  `quantity` tinyint(4) NOT NULL default '0',
  `priority` smallint(6) NOT NULL default '1',
  `price` decimal(10,2) NOT NULL default '0.00',
  `ingreds` text NOT NULL,
  `category` mediumint(9) NOT NULL default '1',
  `paid` tinyint(4) NOT NULL default '0',
  `deleted` smallint(6) NOT NULL default '0',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `dest_id` mediumint(9) NOT NULL default '0',
  `override_price` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `sourceid` (`sourceid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_paymentdocs`
--

DROP TABLE IF EXISTS `mhr_paymentdocs`;
CREATE TABLE `mhr_paymentdocs` (
  `id` bigint(20) NOT NULL auto_increment,
  `class` text NOT NULL,
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_paymentdocs_printers`
--

DROP TABLE IF EXISTS `mhr_paymentdocs_printers`;
CREATE TABLE `mhr_paymentdocs_printers` (
  `id` int(11) NOT NULL auto_increment,
  `class` text NOT NULL,
  `printer` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_payments`
--

DROP TABLE IF EXISTS `mhr_payments`;
CREATE TABLE `mhr_payments` (
  `id` bigint(20) NOT NULL auto_increment,
  `class` text NOT NULL,
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_recipients`
--

DROP TABLE IF EXISTS `mhr_recipients`;
CREATE TABLE `mhr_recipients` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` text NOT NULL,
  `class` text NOT NULL,
  `classID` bigint(20) NOT NULL default '0',
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_sources`
--

DROP TABLE IF EXISTS `mhr_sources`;
CREATE TABLE `mhr_sources` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` text NOT NULL,
  `ordernum` int(11) NOT NULL default '0',
  `visible` tinyint(4) NOT NULL default '1',
  `userid` mediumint(9) NOT NULL default '0',
  `toclose` tinyint(4) NOT NULL default '0',
  `discount` decimal(10,2) NOT NULL default '0.00',
  `paid` tinyint(4) NOT NULL default '0',
  `catprinted` text NOT NULL,
  `last_access_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `last_access_userid` mediumint(9) NOT NULL default '0',
  `takeaway` tinyint(4) NOT NULL default '0',
  `takeaway_surname` text NOT NULL,
  `takeaway_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  `customer` bigint(20) NOT NULL default '0',
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_stock_ingredient_quantities`
--

DROP TABLE IF EXISTS `mhr_stock_ingredient_quantities`;
CREATE TABLE `mhr_stock_ingredient_quantities` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `obj_id` bigint(20) NOT NULL default '0',
  `dish_id` bigint(20) NOT NULL default '0',
  `quantity` float NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `obj_id` (`obj_id`),
  KEY `dish_id` (`dish_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_stock_ingredient_samples`
--

DROP TABLE IF EXISTS `mhr_stock_ingredient_samples`;
CREATE TABLE `mhr_stock_ingredient_samples` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `obj_id` bigint(20) NOT NULL default '0',
  `dish_id` bigint(20) NOT NULL default '0',
  `quantity` float NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `obj_id` (`obj_id`),
  KEY `dish_id` (`dish_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_stock_movements`
--

DROP TABLE IF EXISTS `mhr_stock_movements`;
CREATE TABLE `mhr_stock_movements` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `obj_id` bigint(20) NOT NULL default '0',
  `dish_id` bigint(20) NOT NULL default '0',
  `dish_quantity` float NOT NULL default '0',
  `quantity` float NOT NULL default '0',
  `unit_type` tinyint(4) NOT NULL default '0',
  `value` float NOT NULL default '0',
  `user` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `obj_id` (`obj_id`),
  KEY `dish_id` (`dish_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_stock_objects`
--

DROP TABLE IF EXISTS `mhr_stock_objects`;
CREATE TABLE `mhr_stock_objects` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` text NOT NULL,
  `ref_type` tinyint(4) NOT NULL default '0',
  `ref_id` bigint(20) NOT NULL default '0',
  `quantity` float NOT NULL default '0',
  `unit_type` tinyint(4) NOT NULL default '0',
  `value` float NOT NULL default '0',
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `name` (`name`(10)),
  KEY `ref_id` (`ref_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_stock_samples`
--

DROP TABLE IF EXISTS `mhr_stock_samples`;
CREATE TABLE `mhr_stock_samples` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `obj_id` bigint(20) NOT NULL default '0',
  `quantity` float NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `timestamp` (`timestamp`,`obj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_system`
--

DROP TABLE IF EXISTS `mhr_system`;
CREATE TABLE `mhr_system` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_users`
--

DROP TABLE IF EXISTS `mhr_users`;
CREATE TABLE `mhr_users` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` text NOT NULL,
  `can_open_closed_table` tinyint(4) NOT NULL default '0',
  `language` tinytext NOT NULL,
  `level` int(11) NOT NULL default '0',
  `password` text NOT NULL,
  `template` text NOT NULL,
  `disabled` tinyint(4) NOT NULL default '0',
  `deleted` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `mhr_vat_rates`
--

DROP TABLE IF EXISTS `mhr_vat_rates`;
CREATE TABLE `mhr_vat_rates` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` text NOT NULL,
  `rate` decimal(3,2) NOT NULL default '0.00',
  `service_fee` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

