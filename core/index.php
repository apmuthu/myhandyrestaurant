<?php
/**
* My Handy Restaurant
*
* http://www.myhandyrestaurant.org
*
* My Handy Restaurant is a restaurant complete management tool.
* Visit {@link http://www.myhandyrestaurant.org} for more info.
* Copyright (C) 2003-2005 Fabio De Pascale
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
*/

$inizio=microtime();
$useridnotsetisok=1;			//has to be before start.php requirement!!!
define('ROOTDIR','.');

session_start();

require_once(ROOTDIR."/includes.php");

require(ROOTDIR."/conf/config.inc.php");
require(ROOTDIR."/conf/config.constants.inc.php");

header ("Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

common_set_error_reporting ();

if(isset($_SESSION['section']) && $_SESSION['section']!="admin"){
	unset_session_vars();
	$_SESSION['section']="admin";
}

if(!$link = @mysql_pconnect ($cfgserver, $cfguser,$cfgpassword)) {
	header('Location: '.ROOTDIR.'/install.php');
	die ('Error connecting to the db');
}

$_SESSION['common_db']=$db_common;

check_db_status(true);

start_language ();

$dbman = new db_manager ('', '', '', $link);
if(!in_array(basename($_SERVER['SCRIPT_NAME']),$allowed_not_upgraded) && $dbman->upgrade_available()) {
	$url=ROOTDIR.'/admin/upgrade.php?command=none&data[redirected]=1';
	header('Location: '.$url);
	echo redirectJS($url);
	echo 'Upgrades available.';
	die();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<script type="text/javascript" language="JavaScript" src="./generic.js"></script>
	<link rel="stylesheet" href="./styles.css.php" type="text/css">
	<title><?php echo ucphr('MHR_HOME_PAGE'); ?></title>
</head>
<body class=mgmt_body>
<div class="aligncenter">
	<img src="./images/mhr_logo.jpg" alt="My Handy Restaurant Logo" width="279" height="100">
</div>
<p>
<br/>
<a href="waiter/"><b><?php echo ucphr('WAITERS_SECTION').'</b></a><br/>'.ucphr('ORDERS_MANAGEMENT'); ?>.
<br/>
<br/>
<a href="admin/connect.php?command=none"><b><?php echo ucphr('MANAGEMENT_SECTION').'</b></a><br/>'.ucphr('MANAGEMENT_SECTION_DESC'); ?>.
<br/>
<br/>
<a href="http://www.myhandyrestaurant.org/forum/"><b><?php echo ucphr('FORUM').'</b></a><br/>'.ucphr('FORUM_DESC'); ?>.
<br/>
<?php
	if (CONF_DEBUG) {
		$servrd=$_SERVER['HTTP_USER_AGENT'];
		display_todo($servrd);
	}
?>
</p>
</body>
</html>
