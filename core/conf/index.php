<?php
$inizio=microtime();
$dont_get_session_sourceid=true;

session_start();
define('ROOTDIR','..');


require(ROOTDIR."/conf/config.inc.php");
require_once(ROOTDIR."/conf/config.constants.inc.php");

require_once(ROOTDIR."/includes.php");

common_set_error_reporting ();

//echo common_header('Administration',' class="mgmt_body"');


$link = mysql_pconnect ($cfgserver, $cfguser,$cfgpassword) or die (GLOBALMSG_DB_CONNECTION_ERROR);

$_SESSION['common_db']=$db_common;

check_db_status();

start_language ();

$dbman = new db_manager ('', '', '', $link);
if(!in_array(basename($_SERVER['SCRIPT_NAME']),$allowed_not_upgraded) && $dbman->upgrade_available()) {
	header('Location: '.ROOTDIR.'/admin/upgrade.php?command=none&data[redirected]=1');
	echo 'Upgrades available.';
	die();
}

header("Content-Language: ".$_SESSION['language']);
header("Content-type: text/html; charset=".phr('CHARSET'));

$config = new conf;
$config->name='default_language';
$config->get();
if(!$config->value) $conf_language="en";
else $conf_language=$config->value;

include(ROOTDIR."/lang/lang_".$conf_language.".php");

$jsurl=ROOTDIR."/generic.js";
$title='My Handy Restaurant Configuration';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo phr('CHARSET'); ?>">
	<title><?php echo $title; ?></title>
	<script type="text/javascript" language="JavaScript" src="<?php echo CONF_JS_URL; ?>"></script>
	<link rel="stylesheet" href="<?php echo CONF_CSS_URL; ?>" type="text/css">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires" content="0">
	
	<!-- Using a linked stylesheet -->
	<link rel="STYLESHEET" type="text/css" href="../coolmenu.css">
	<script type="text/javascript" language="JavaScript1.2" src="../coolmenus4.js">
	/*****************************************************************************
	Copyright (c) 2001 Thomas Brattli (webmaster@dhtmlcentral.com)
	
	DHTML coolMenus - Get it at coolmenus.dhtmlcentral.com
	Version 4.0_beta
	This script can be used freely as long as all copyright messages are
	intact.
	
	Extra info - Coolmenus reference/help - Extra links to help files **** 
	CSS help: http://192.168.1.31/projects/coolmenus/reference.asp?m=37
	General: http://coolmenus.dhtmlcentral.com/reference.asp?m=35
	Menu properties: http://coolmenus.dhtmlcentral.com/properties.asp?m=47
	Level properties: http://coolmenus.dhtmlcentral.com/properties.asp?m=48
	Background bar properties: http://coolmenus.dhtmlcentral.com/properties.asp?m=49
	Item properties: http://coolmenus.dhtmlcentral.com/properties.asp?m=50
	******************************************************************************/
	</script>
	</head>
	
	<body class=mgmt_body>
<?php
	$menu = new menu();
	echo $menu -> main ();
?>
	<table><TR><TD height="20">&nbsp;</TD></TR></table>
	<center>
<?php

if(isset($_REQUEST['command'])) $command=$_REQUEST['command'];
else $command='none';

if(!access_allowed(USER_BIT_CONFIG)) $command='access_denied';

switch($command) {
	case 'access_denied':
		echo access_denied_admin();
		break;
	default:
		if(isset($_REQUEST['data']) && $_REQUEST['data']){
			$data=$_REQUEST['data'];
			if($config->set_all($data))
				echo '<font color="#FF0000">Error updating configuration table.</font><hr>';
			else
				echo '<font color="#FF0000">Configuration table updated.</font><hr>';
		}
		
		if(isset($_REQUEST['set_default']) && $_REQUEST['set_default']==1){
			$config->set_default();
		}
		
		echo '
			<form action="index.php" method="post" name="default">
			<input type="hidden" name="set_default" value="1">
			<input type="submit" value="'.ucfirst(phr('SET_DEFAULT')).'">
			</form>';
		
		echo '<form action="index.php" method="post">';
		echo '<input type="submit">';
		$config->list_table('name');
		echo '<input type="submit">';
		echo '</form>';
}

echo generating_time($inizio);

?>
</center>
</body>
</html>
