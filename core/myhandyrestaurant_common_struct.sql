-- MySQL dump 9.11
--
-- Host: localhost    Database: myhandyrestaurant
-- ------------------------------------------------------
-- Server version	4.0.23_Debian-3-log

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_allowed_clients`
--

DROP TABLE IF EXISTS `mhr_allowed_clients`;
CREATE TABLE `mhr_allowed_clients` (
  `id` bigint(20) NOT NULL auto_increment,
  `host` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_categories_ar`
--

DROP TABLE IF EXISTS `mhr_categories_ar`;
CREATE TABLE `mhr_categories_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_categories_en`
--

DROP TABLE IF EXISTS `mhr_categories_en`;
CREATE TABLE `mhr_categories_en` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_categories_id`
--

DROP TABLE IF EXISTS `mhr_categories_id`;
CREATE TABLE `mhr_categories_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_categories_it`
--

DROP TABLE IF EXISTS `mhr_categories_it`;
CREATE TABLE `mhr_categories_it` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_categories_ro`
--

DROP TABLE IF EXISTS `mhr_categories_ro`;
CREATE TABLE `mhr_categories_ro` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_categories_ru`
--

DROP TABLE IF EXISTS `mhr_categories_ru`;
CREATE TABLE `mhr_categories_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_conf_ar`
--

DROP TABLE IF EXISTS `mhr_conf_ar`;
CREATE TABLE `mhr_conf_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_conf_en`
--

DROP TABLE IF EXISTS `mhr_conf_en`;
CREATE TABLE `mhr_conf_en` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_conf_id`
--

DROP TABLE IF EXISTS `mhr_conf_id`;
CREATE TABLE `mhr_conf_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_conf_it`
--

DROP TABLE IF EXISTS `mhr_conf_it`;
CREATE TABLE `mhr_conf_it` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_conf_ro`
--

DROP TABLE IF EXISTS `mhr_conf_ro`;
CREATE TABLE `mhr_conf_ro` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_conf_ru`
--

DROP TABLE IF EXISTS `mhr_conf_ru`;
CREATE TABLE `mhr_conf_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_dishes_ro`
--

DROP TABLE IF EXISTS `mhr_dishes_ro`;
CREATE TABLE `mhr_dishes_ro` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_ingreds_ro`
--

DROP TABLE IF EXISTS `mhr_ingreds_ro`;
CREATE TABLE `mhr_ingreds_ro` (
  `id` mediumint(9) NOT NULL auto_increment,
  `table_id` mediumint(9) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_lang`
--

DROP TABLE IF EXISTS `mhr_lang`;
CREATE TABLE `mhr_lang` (
  `id` int(11) NOT NULL auto_increment,
  `name` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`(20))
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_last_orders`
--

DROP TABLE IF EXISTS `mhr_last_orders`;
CREATE TABLE `mhr_last_orders` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `timestamp` timestamp(14) NOT NULL,
  `dishid` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_people_types`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types`;
CREATE TABLE `mhr_mgmt_people_types` (
  `id` tinyint(4) NOT NULL auto_increment,
  `name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_people_types_ar`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_ar`;
CREATE TABLE `mhr_mgmt_people_types_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_people_types_en`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_en`;
CREATE TABLE `mhr_mgmt_people_types_en` (
  `id` tinyint(4) NOT NULL auto_increment,
  `table_id` tinyint(4) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_people_types_id`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_id`;
CREATE TABLE `mhr_mgmt_people_types_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_people_types_it`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_it`;
CREATE TABLE `mhr_mgmt_people_types_it` (
  `id` tinyint(4) NOT NULL auto_increment,
  `table_id` tinyint(4) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_people_types_ro`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_ro`;
CREATE TABLE `mhr_mgmt_people_types_ro` (
  `id` tinyint(4) NOT NULL auto_increment,
  `table_id` tinyint(4) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_people_types_ru`
--

DROP TABLE IF EXISTS `mhr_mgmt_people_types_ru`;
CREATE TABLE `mhr_mgmt_people_types_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_types_ar`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_ar`;
CREATE TABLE `mhr_mgmt_types_ar` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_types_en`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_en`;
CREATE TABLE `mhr_mgmt_types_en` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_types_id`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_id`;
CREATE TABLE `mhr_mgmt_types_id` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_types_it`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_it`;
CREATE TABLE `mhr_mgmt_types_it` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_types_ro`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_ro`;
CREATE TABLE `mhr_mgmt_types_ro` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_mgmt_types_ru`
--

DROP TABLE IF EXISTS `mhr_mgmt_types_ru`;
CREATE TABLE `mhr_mgmt_types_ru` (
  `id` int(11) NOT NULL auto_increment,
  `table_id` int(11) NOT NULL default '0',
  `table_name` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
  `timestamp` timestamp(14) NOT NULL,
  `dest_id` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `sourceid` (`sourceid`)
) TYPE=MyISAM;

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
  `last_access_time` timestamp(14) NOT NULL,
  `last_access_userid` mediumint(9) NOT NULL default '0',
  `takeaway` tinyint(4) NOT NULL default '0',
  `takeaway_surname` text NOT NULL,
  `takeaway_time` timestamp(14) NOT NULL default '00000000000000',
  `customer` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_stock_ingredient_quantities`
--

DROP TABLE IF EXISTS `mhr_stock_ingredient_quantities`;
CREATE TABLE `mhr_stock_ingredient_quantities` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp(14) NOT NULL,
  `obj_id` bigint(20) NOT NULL default '0',
  `dish_id` bigint(20) NOT NULL default '0',
  `quantity` float NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `obj_id` (`obj_id`),
  KEY `dish_id` (`dish_id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_stock_ingredient_samples`
--

DROP TABLE IF EXISTS `mhr_stock_ingredient_samples`;
CREATE TABLE `mhr_stock_ingredient_samples` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp(14) NOT NULL,
  `obj_id` bigint(20) NOT NULL default '0',
  `dish_id` bigint(20) NOT NULL default '0',
  `quantity` float NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `obj_id` (`obj_id`),
  KEY `dish_id` (`dish_id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_stock_movements`
--

DROP TABLE IF EXISTS `mhr_stock_movements`;
CREATE TABLE `mhr_stock_movements` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp(14) NOT NULL,
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
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_stock_samples`
--

DROP TABLE IF EXISTS `mhr_stock_samples`;
CREATE TABLE `mhr_stock_samples` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp(14) NOT NULL,
  `obj_id` bigint(20) NOT NULL default '0',
  `quantity` float NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `timestamp` (`timestamp`,`obj_id`)
) TYPE=MyISAM;

--
-- Table structure for table `mhr_system`
--

DROP TABLE IF EXISTS `mhr_system`;
CREATE TABLE `mhr_system` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

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
) TYPE=MyISAM;

--
-- Table structure for table `mhr_vat_rates`
--

DROP TABLE IF EXISTS `mhr_vat_rates`;
CREATE TABLE `mhr_vat_rates` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` text NOT NULL,
  `rate` decimal(3,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

