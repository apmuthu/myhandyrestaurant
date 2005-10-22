<?php
define('CONF_DEBUG',						false);	// prints all debug info in the relative file and some debug data on screen
define('CONF_DEBUG_PRINT_GENERATING_TIME',			false);	// allows printing of the generating time
define('CONF_DEBUG_REPORT_NOTICES',				false);	// uses E_ALL php error reporting
define('CONF_DEBUG_LANG_DISABLED',				false);	// disables the language functions (both db and xml)
define('CONF_DEBUG_DONT_DELETE',				false);	// if active the order will never be deleted
define('CONF_DEBUG_DONT_SET_PRINTED',				false);	// if the flag is active, the flag printed in orders table won't be set
define('CONF_DEBUG_DONT_PRINT',					false);	// if active, printing won't work
define('CONF_DEBUG_PRINT_MARKUP',				false);	// if active all the unused markup will not be deleted before printing
define('CONF_DEBUG_PRINT_TICKET_DEST',				false);	// if active the print destionation will be printed
define('CONF_DEBUG_PRINT_DISPLAY_MSG',				false);
define('CONF_DEBUG_DISPLAY_MYSQL_QUERIES',			false);	// displays the number of common_query() calls
define('CONF_DEBUG_DISABLE_FUNCTION_INSERT',			false);	// enables the use of functions besides of numbers (1+1 instead of 2)
define('CONF_DEBUG_PRINT_MOTHER_MESSAGES',			false);	// if on shows the messages by MoTHER
define('CONF_DEBUG_PRINT_PAGE_SIZE',				false);	// if on prints the size of the generated page (images excluded)


define('CONF_SHOW_DEFAULT_ON_MISSING',				true);	// if a lang value in the db is empty, writes the corresponding value in the default language instead of the lang code
define('CONF_TOPLIST_HIDE_PRIORITY',				false);	// sets if priority button should be displayed in the toplist box
define('CONF_TOPLIST_HIDE_QUANTITY',				false);	// sets if quantity button should be displayed in the toplist box
define('CONF_TOPLIST_SAVED_NUMBER',				1000);	// quantity of orders to be saved for toplist statistics
define('CONF_ALLOW_EASY_DELETE',				true);	// if true shows the little trash icon when an order has quantity 1
define('CONF_ALLOW_EASY_CLOSE',					true);	// if true skips the close confirmation window
define('CONF_ALLOW_EASY_RESET',					true);	// if true skips the paid/reset window after closing and printing bills
define('CONF_XML_TRANSLATIONS',					false);	// if true uses the xml language files instead of the database. It is recomended to leave this function off unless you know what you are doing
define('CONF_PRINT_BARCODES',					false);	// if true prints the barcode with the order ID for each order
									// it requires a barcode-ready printer to work
									// and is as of today a useless feature
define('CONF_PRINT_JAVAPOS_RECEIPT',				false);	// if true prints the receipt also to a JavaPOS printer, through the fabioPOS
									// it requires a JavaPOS fiscal printer and fabioPOS to be installed to work
define('CONF_PRINT_JAVAPOS_ADDRESS',				'127.0.0.1');	// hostname or IP address of the fabioPOS server
define('CONF_PRINT_JAVAPOS_PORT',				9999);	// port number of the fabioPOS server
define('CONF_PRINT_TICKETS_ONE_PAGE_PER_TABLE',			true);	// if true prints all the priorities on one ticket per table
define('CONF_PRINT_TICKET_ID',					true);	// if true prints the ticket ID at the end of each ticket
define('CONF_MINUTES_BEFORE_PRINTING_TAKEAWAY',			5);	// number of minutes to be wait to have the takeaway time printed on tickets
define('CONF_PRINT_ONLY_HIGH_PRIORITY_NUMBER',			true);	// if true prints the ticket ID at the end of each ticket
define('CONF_COLOUR_PRINTED',					true);	// if on the user can see the elapsed time from the printing of the order ticket as a linear color
define('CONF_COLOUR_PRINTED_COLOUR',				'yellow');	// possible values: red, green, blue, magenta, yellow, cyan, grey. default: yellow
define('CONF_COLOUR_PRINTED_MAX_TIME',				20);	// after how much time in mins should the max colour be reached
define('CONF_TIME_SINCE_PRINTED',				true);	// if on the elapsed time since printing will be written aside the dish name in the orders list
define('CONF_ENCRYPT_PASSWORD',					false);	// if true the passwords will be encrypted with the best available method, otherwise a MD5 checksum will be prepared
									// the checksum is a bit less secure, but ensures that the password will be the same on every machine,
									// otherwise changing the OS or upgrading it could cause all the passwords to be unusable (recreate the users is the only solution)
define('CONF_DISPLAY_MYSQL_ERRORS',				true);	// if on the mysql errors will be displayed to the users and logged to file, otherwise they will be only logged to errors file
define('CONF_SQL_RESUME_ENABLED',				false);	// if on the sql upgrades and restores will be stopped and resumed to allow progress display (HIGHLY EXPERIMENTAL!!!)
define('CONF_SHOW_SUMMARY_ON_LIST',				false);	// if on a summary of the data about the ingredients/dishes will be displayed in the tables in admin section (slows the page generation by a factor of about 4)
define('CONF_SHOW_PERCENT_INSERTED_ON_LIST',			false);	// if on the percent of inserted ingredient quantities will be displayed in the table in admin section (slows the page generation by a factor of about 4)
define('CONF_UNIT_MASS',					'g');	// measure unit for weigths
define('CONF_UNIT_VOLUME',					'l');	// measure unit for volumes
define('CONF_FORCE_UPGRADE',					false);	// if true forces upgrading, otherwise only displays suggestion with ink in messages
define('CONF_STOCK_QUANTITY_ALARM',				10);	// treshold for low quantity in stock messages
define('CONF_FAST_ORDER',					true);	// enables the fast order form in the orders page (also disables the keyboad shurtcuts on the orders form)
define('CONF_AUTOCALC_CONSIDERS_FIXED_PRICE',			true);	// if on the fixed price ingredients are considered in the ingredient quantity for the autocalc

/*
Cache system for db queries
0: disable the db query caching system (low performance)
1: cache on page (cache is reset on page reload)
2: cache on session (cache is reset on user connection) (high performance, but updates from other users cannot be seen until disconnection!)
3: cache data on page and lang on session (suggested)
*/
define('CONF_CACHE_TYPE',3);

/************************************************************************************
* YOU SHOULDN'T MODIFY ANYTHING BELOW THIS LINE!
* (unless you really know what you're doing)
*************************************************************************************/
define('ERROR_FILE',ROOTDIR.'/error.log');
define('DEBUG_FILE',ROOTDIR.'/debug.log');

define('MIN_SEARCH_LENGTH',0);

define('SERVICE_ID',-1);
define('MOD_ID',-2);
define('DISCOUNT_ID',-3);

define('LANG_TABLES_NUMBER',7);			// The number of tables added per language to the db
define('LANG_FILES_NUMBER',1);			// The number of files added per language to the lang dir

define('AUTOSELECT_FIRST',0);			// if 1: selects the first item in mods' quantity to be modified
						// else selects the last item in mods' quantity to be modified


// if yes checks for translation problems in the tables every time the translators page is loaded (heavy CPU load).
// otherwise prints a message inviting them to do that
define('CONF_TRANSLATE_ALWAYS_CHECK_TABLES',0);


define('REFRESH_TIME',0.2);

// max displayed quanitty in quantity <select > boxes.
// This is NOT the maximux allowed quantity, so don't use this for security matters.
define('MAX_QUANTITY',50);

define('USER_BIT_WAITER',0);
define('USER_BIT_CASHIER',1);
define('USER_BIT_STOCK',2);
define('USER_BIT_CONTACTS',3);
define('USER_BIT_MENU',4);
define('USER_BIT_USERS',5);
define('USER_BIT_ACCOUNTING',6);
define('USER_BIT_TRANSLATION',7);
define('USER_BIT_CONFIG',8);
define('USER_BIT_MONEY',9);

define('USER_BIT_LAST',9);

define('SHOW_ALL_USERS',0);
define('SHOW_WAITER_ONLY',1);
define('SHOW_ADMIN_ONLY',2);

define('ERROR_LEVEL_USER',0);
define('ERROR_LEVEL_DEBUG',1);
define('ERROR_LEVEL_ERROR',2);

define('LICENSE_FILE',ROOTDIR.'/docs/LICENSE');
$halttime=2;

// installer: mysql dump files locations
$location['common']['complete']='myhandyrestaurant_common_complete.sql';
$location['account']['complete']='myhandyrestaurant_account_complete.sql';
$location['common']['struct']='myhandyrestaurant_common_struct.sql';
$location['account']['struct']='myhandyrestaurant_account_struct.sql';


define('TYPE_NONE',0);
define('TYPE_DISH',1);
define('TYPE_INGREDIENT',2);

define('INGRED_TYPE_INCLUDED',1);
define('INGRED_TYPE_AVAILABLE',2);

define('DO_NOT_SAVE_TO_LOG',false);

define('RECIPIENT_UNKNOWN',-1);
define('RECIPIENT_MYSELF',-2);

define('UNIT_TYPE_NONE',0);
define('UNIT_TYPE_MASS',1);
define('UNIT_TYPE_VOLUME',2);
define('UNIT_TYPE_MONEY',3);

$allowed_not_upgraded = array('upgrade.php','connect.php','export_db.php');

global $convertion_constants;
$convertion_constants = array (
	// weight US
	'oz-kg'=>0.02834952313,
	'lb-kg'=>0.45359237,
	// weight IS
	'mg-kg'=>0.000001,
	'cg-kg'=>0.00001,
	'dg-kg'=>0.0001,
	'g-kg'=>0.001,
	'dag-kg'=>0.001,
	'hg-kg'=>0.1,
	// volume US
	'gal-l'=>3.785411784,
	'floz-l'=>0.02957352956,
	// volume IS
	'ml-l'=>0.001,
	'cl-l'=>0.01,
	'dl-l'=>0.1,
	'hl-l'=>100.0,
);

global $unit_types_volume;
$unit_types_volume = array ('gal','floz','ml','cl','dl','l','hl');
global $unit_types_mass;
$unit_types_mass = array ('oz','lb','mg','cg','dg','g','dag','hg','kg');

//define('CONF_HTTP_ROOT_DIR','http://192.168.0.50/handyrestaurant/demo/');
define('CONF_HTTP_ROOT_DIR',ROOTDIR.'/');

define('CONF_JS_URL',CONF_HTTP_ROOT_DIR."generic.js");
define('CONF_CSS_URL',CONF_HTTP_ROOT_DIR."styles.css.php");

define('CONF_JS_URL_CONFIG',"./generic.js");
define('CONF_CSS_URL_CONFIG',"./styles.css.php");

//CONF_HTTP_ROOT_DIR='http://'.$_SERVER['SERVER_NAME'].'/handyrestaurant/';
// images used

define('IMAGE_CUSTOMER_KNOWN',CONF_HTTP_ROOT_DIR."images/personal.png");
define('IMAGE_MENU',CONF_HTTP_ROOT_DIR."images/gohome.png");
define('IMAGE_NO',CONF_HTTP_ROOT_DIR."images/agt_action_fail.png");
define('IMAGE_OK',CONF_HTTP_ROOT_DIR."images/agt_action_success.png");
define('IMAGE_PRINT',CONF_HTTP_ROOT_DIR."images/print.png");
define('IMAGE_SOURCE',CONF_HTTP_ROOT_DIR."images/source.png");
define('IMAGE_TRASH',CONF_HTTP_ROOT_DIR."images/trash.png");
define('IMAGE_LITTLE_TRASH',CONF_HTTP_ROOT_DIR."images/little_trash.png");
define('IMAGE_YES',CONF_HTTP_ROOT_DIR."images/agt_action_success.png");
define('IMAGE_BACK',"./images/back.jpg");
define('IMAGE_CLOSE',CONF_HTTP_ROOT_DIR."images/newclose.png");
define('IMAGE_MINUS',CONF_HTTP_ROOT_DIR."images/down.png");
define('IMAGE_PLUS',CONF_HTTP_ROOT_DIR."images/up.png");
define('IMAGE_FIND',CONF_HTTP_ROOT_DIR."images/find.png");
define('IMAGE_NEW',CONF_HTTP_ROOT_DIR."images/new.png");


// all the colors used in background and tables

define('COLOR_TABLE_GENERAL','#FFCC99');
define('COLOR_TABLE_TOTAL','#FFEEBB');
define('COLOR_HIGHLIGHT','#DDDDDD');
define('COLOR_BACK_OK','#6FFA7D');
define('COLOR_BACK_ERROR','#FF0D11');
define('COLOR_ORDER_PRINTED','#FFFFFF');
define('COLOR_ORDER_TO_PRINT','#6FFA7D');
define('COLOR_ORDER_SUSPENDED','#FF9966');
define('COLOR_ORDER_EXTRACARE','#2206DB');
define('COLOR_ERROR','#FF9966');
define('COLOR_OK','#6FFA7D');
define('COLOR_TABLE_FREE','#FFFFFF');
define('COLOR_TABLE_MINE','#6FFA7D');
define('COLOR_TABLE_OTHER','#FF9966');
define('COLOR_TABLE_CLOSED_OPENABLE','#FFFF0C');
define('COLOR_TABLE_NOT_OPENABLE','#FF9966');
define('COLOR_TABLE_GENERIC_NOT_PRICED','#8890FF');

define('COLOR_ORDER_PRIORITY_PRINTED','#FF9966');
define('COLOR_ORDER_PRIORITY_1','#FFFFFF');
define('COLOR_ORDER_PRIORITY_2','#00FFFF');
define('COLOR_ORDER_PRIORITY_3','#FF0000');

define('MGMT_COLOR_BACKGROUND','#FEEFAC');
$mgmt_color_background="#FEEFAC";
define('MGMT_COLOR_TABLEBG','#FFCA68');
$mgmt_color_tablebg="#FFCA68";
define('MGMT_COLOR_CELLBG0','#FFE9B7');
$mgmt_color_cellbg0="#FFE9B7";
define('MGMT_COLOR_CELLBG1','#FAFF97');
$mgmt_color_cellbg1="#FAFF97";

define('MSG_MESSAGE_ID_LENGTH',10);

define('MSG_TYPE_ACK',-1);
define('MSG_TYPE_ALL',0);
define('MSG_TYPE_DISH',1);
define('MSG_TYPE_INGREDIENT',2);
define('MSG_TYPE_ORDER',3);
define('MSG_TYPE_STOCK',4);
define('MSG_TYPE_CONTACT',5);
define('MSG_TYPE_ACCOUNTING',6);
define('MSG_TYPE_TABLE',7);
define('MSG_TYPE_CATEGORY',8);
define('MSG_TYPE_USER',9);
define('MSG_TYPE_PRINTER',10);
define('MSG_TYPE_BANK',11);
define('MSG_TYPE_REPORT',12);
define('MSG_TYPE_CONFIG',13);


?>
