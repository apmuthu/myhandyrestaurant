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
$inizio=microtime();			//has to be before start.php requirement!!!
$useridnotsetisok=1;			//has to be before start.php requirement!!!

define('IN_CONFIG',1);

define('ROOTDIR','.');
require(ROOTDIR."/conf/config.constants.inc.php");
require(ROOTDIR."/funs_common.php");
require(ROOTDIR."/funs_install.php");
include(ROOTDIR."/lang/lang_en.php");

common_set_error_reporting ();

$title='Installation';
$msg = common_header('Installation',' class="mgmt_body"');

if(isset($_REQUEST['command'])){
	$command=$_REQUEST['command'];
}

$name='./conf/config.inc.php';
if(!file_exists($name) && $command!='reconfigure' && $command!='write_config') {
	echo $msg;
	echo redirect_timed(ROOTDIR.'/install.php?command=reconfigure',2);
	die("Config file not found. Creating it now.<br />");
}

switch($command) {
	case 'fresh_install':
				echo $msg;
				if(isset($_REQUEST['deleteconfirm'])){
					$deleteconfirm=$_REQUEST['deleteconfirm'];
				}
				if($deleteconfirm){
					echo 'Back to <a href="install.php">installation page</a>.<br/>';
					if(install_create_db()) die('error creting dbs');
					if($err=install_fill_tables()) die('error '.$err.' filling tables');
					echo '<br/>Back to <a href="install.php">installation page</a>.<br/>';
				} else {
					echo "
					Are you sure you want to fresh install the software?<br>\n";
					echo "You will lose al your data <b>definitively</b>.<br>
					It is strongly suggested to <a href=\"./admin/export_db.php?command=none\">backup your data</a> before going on.<br><br>\n";
?>
<table>
	<tr>
		<td>
			<form action="install.php" method="GET">
			<input type="hidden" name="command" value="fresh_install">
			<input type="hidden" name="deleteconfirm" value="1">
			<input type="submit" value="Yes">
			</form>
		</td>
		<td>
			<form action="install.php" method="GET">
			<input type="submit" value="No">
			</form>
		</td>
	</tr>
</table>
<?php
				}

				break;
	case 'reconfigure':
				echo $msg;
				install_config_data_form();
				break;
	case 'write_config':
				echo $msg;
				unset($data);
				$data['server']=$_REQUEST['server'];
				$data['username']=$_REQUEST['username'];
				$data['password']=$_REQUEST['password'];
				$data['db_common']=$_REQUEST['db_common'];
				//$data['tableprefix']=$_REQUEST['tableprefix'];
				$data['tableprefix']='mhr_';
				if(install_write_config_file($data))
					die("error writing config file<br>");
				echo "ok";
				echo '<br><a href="index.php">Go on</a>.<br>';
				break;
	default:
				echo $msg;
				install_list_options();
				break;
}
?>
</center>
</body>
</html>
