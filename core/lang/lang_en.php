<?php
/**
* My Handy Restaurant - English language file
*
* http://www.myhandyrestaurant.org
*
* My Handy Restaurant is a restaurant complete management tool.
* Visit {@link http://www.myhandyrestaurant.org} for more info.
* Copyright (C) 2003-2004 Fabio De Pascale
* 
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*
* @author		Fabio 'Kilyerd' De Pascale <public@fabiolinux.com>
* @package		MyHandyRestaurant
* @copyright		Copyright 2003-2005, Fabio De Pascale
* @ignore
*/

/*
ucphr('SUPPLIER_FILE')
*/


define('GLOBALMSG_CONFIG_FILE_NOT_WRITEABLE','The configuration file (conf/config.inc.php) is not writeable. The system cannot work without that file.<br>Please check if the file is existant and writeable or if the conf/ directory is writeable.<br>Remember that the file/dir should be writeable for the user running the web server.');
define('GLOBALMSG_CONFIG_OUTPUT_FILES_NOT_WRITEABLE','The error or debugging log files are not writeable.<br>To work properly, My Handy Restaurant (the user running the web server) needs write access to those files.<br>Please check that files are not read-only and exist, or that the directory in which they should be is not read-only, so that My Handy Restaurant can create them.');
define('GLOBALMSG_CONFIG_SYSTEM','<a href="../conf/index.php">Configure My handy Restaurant</a>');
define('GLOBALMSG_CONFIGURE_DATABASES','<a href="../admin/admin.php?class=accounting_database&amp;command=none"><br/>Configure My handy Restaurant databases</a>');
define('GLOBALMSG_DB_CONNECTION_ERROR','Error: there has been an error connecting to the database server: please check your config.inc.php file, and check that your DB server is running.');
define('GLOBALMSG_DB_NO_TABLES_ERROR','Error: there\'s no table in the database, it\'s impossible to proceed.');
define('GLOBALMSG_NO_ACCOUNTING_DB_FOUND','Error: there\'s no accounting database, it\'s impossible to proceed.<br>My Handy restaurant needs one common database and at least one accounting database to work.');

define('GLOBALMSG_OTHER_FILE','Other file');
define('GLOBALMSG_OUTGOING_MANY','outgoing');

define('GLOBALMSG_POS_CIRCUIT_FILE','POS circuit file');

define('GLOBALMSG_RECEIPT_ANNULL_CONFIRM','Are you sure you want to delete the following records AND all the associated log records?<br>This operation is <b>irreversible</b>.');

define('GLOBALMSG_RECORD_NONE_SELECTED_ERROR','No record has been selected');
define('GLOBALMSG_RECORD_NONE_FOUND_ERROR','No record has been found');
define('GLOBALMSG_RECORD_NONE_FOUND_PERIOD_ERROR','No record has been found in the selected period');
define('GLOBALMSG_RECORD_CHANGE_SEARCH','Try to change search or time period');
define('GLOBALMSG_RECORDS_DELETE_CONFIRM','Are you sure you want to delete the following records?');
define('GLOBALMSG_RECORD_DELETE','Delete record');
define('GLOBALMSG_RECORD_DELETE_SELECTED','Delete selected records');
define('GLOBALMSG_RECORD_EDIT','Edit record');
define('GLOBALMSG_RECORD_INSERT','Insert record');
define('GLOBALMSG_RECORD_OUTGOING','Outgoing');
define('GLOBALMSG_RECORD_INCOMING','Incoming');
define('GLOBALMSG_RECORD_POS','POS');
define('GLOBALMSG_RECORD_BILL','Ticket');
define('GLOBALMSG_RECORD_CHEQUE','Check');
define('GLOBALMSG_RECORD_RECEIPT','Receipt');
define('GLOBALMSG_RECORD_DEPOSIT','Deposit');
define('GLOBALMSG_RECORD_WIRE_TRANSFER','Credit Transfer');
define('GLOBALMSG_RECORD_PAYMENT','Payment');
define('GLOBALMSG_RECORD_PAYMENT_DATE','Payment Date');
define('GLOBALMSG_RECORD_PAID','Paid');
define('GLOBALMSG_RECORD_THE_MANY','The records');
define('GLOBALMSG_RECORD_DELETE_OK_MANY','have been deleted successfully');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY','have been deleted successfully from the log');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY_2','The log records have been therefore deleted');
define('GLOBALMSG_RECORD_THE','The record');
define('GLOBALMSG_RECORD_DELETE_OK','has been deleted successfully');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG','has been deleted successfully from the log');
define('GLOBALMSG_RECORD_DELETE_NONE','No voice has been deleted');
define('GLOBALMSG_RECORD_ADD_OK','has been added successfully');
define('GLOBALMSG_RECORD_ADD_NONE','No voice has been added');
define('GLOBALMSG_RECORD_EDIT_OK','has been updated successfully');
define('GLOBALMSG_RECORD_EDIT_NONE','No voice has been updated');
define('GLOBALMSG_RECORD_EDIT_NOT_DONE','has not been updated');
define('GLOBALMSG_RECORD_TITLE_FOR','Records for');
define('GLOBALMSG_RECORD_TITLE_FOR_NOT_IN_ADDRESSBOOK','Records for people not in the addressbook');
define('GLOBALMSG_RECORD_TITLE_FOR_TYPE','Records for people of type');
define('GLOBALMSG_RECORD_TITLE_INCOME_TYPE','Income of type');
define('GLOBALMSG_RECORD_TITLE_INCOME','Income');
define('GLOBALMSG_RECORD_TITLE_ALL','All the records');
define('GLOBALMSG_REPORT_ACCOUNT','Account');
define('GLOBALMSG_REPORT_GENERATE','Generate report');
define('GLOBALMSG_REPORT_PERIOD','Report period');

define('GLOBALMSG_STATS_DISHES_ORDERED','Ordered dishes');
define('GLOBALMSG_STATS_INGREDIENTS_ADDED','Added ingredients');
define('GLOBALMSG_STATS_INGREDIENTS_REMOVED','Removed ingredients');
define('GLOBALMSG_STATS_MYSQL_TIME','seconds spent for mySQL queries');
define('GLOBALMSG_STATS_RECORDS_SCANNED','records scanned');
define('GLOBALMSG_STATS_TOTAL_DEPTS','Departments totals');
define('GLOBALMSG_STATS_TOTAL_PERIOD','Period total');
define('GLOBALMSG_STOCK_ADD_OK','New item inserted successfully');
define('GLOBALMSG_STOCK_ADD_ERROR','There has been an error while inserting the new item');
define('GLOBALMSG_STOCK_ITEM_ADD','Add new item');
define('GLOBALMSG_STOCK_ITEM_NAME','Item name');
define('GLOBALMSG_STOCK_ITEM_INITIAL_QUANTITY','Initial quantity');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT','Insert stock movement');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT_ERROR','Error inserting new stock movement');

define('MSG_WAITER_NOT_CONNECTED_ERROR','Error: You\'re not connected.');

define('GLOBALMSG_WAITER_LANGUAGE','Language (international 2 chars format: eg. en, it, de, ...)'); 

$msg_admin_confirm_reset_orders="
<b>Vuoi davvero azzerare TUTTI gli ordini?</b><br>
Questa operazione &eacute; <b>irreversibile</b> e causer&agrave;
 la perdita di tutte le comande prese finora.";
$msg_admin_confirm_reset_sources="
<b>Vuoi davvero azzerare TUTTI i tavoli?</b><br>
Questa operazione &eacute; <b>irreversibile</b> e causer&agrave;
 <b>anche</b> la perdita di tutte le comande prese finora.";
$msg_admin_confirm_reset_access_times="
<b>Vuoi davvero resettare TUTTI i tempi di accesso?</b><br>
Questa operazione &eacute; <b>irreversibile</b> e causer&agrave;
 la momentanea interruzione del servizio di protezione tavoli.<br>
 L'uso di questa funzione e' consigliato solo in caso di cambiamenti di
 orario dell'orologio di sistema.";
$msg_reset_orders="Azzera tutti gli ordini";
$msg_reset_access_times="Azzera tutti i tempi di accesso";
$msg_reset_sources="Azzera tutti i tavoli";
$but_reset_access_times="Azzera";
$but_reset_orders="Azzera";
$but_reset_sources="Azzera";
$msg_reset_access_times_ok="Tutti i tempi di accesso sono stati azzerati";
$msg_reset_orders_ok="Tutti gli ordini sono stati azzerati";
$msg_reset_sources_ok="Tutti i tavoli e gli ordini sono stati azzerati";
$msg_admin_confirmhalt="Vuoi spegnere il computer centrale?";
$msg_halt="Spegni il PC";
$but_halt="Spegni";
?>