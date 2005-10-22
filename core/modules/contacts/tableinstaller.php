<?php
/**
* My Handy Restaurant
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
*/

$modules[]='tableinstaller';

class tableinstaller extends module {
	function tableinstaller($id=0) {
		$this -> setName ('tableinstaller');
		
		$this -> setUserLevel (USER_BIT_ACCOUNTING);
		
		if(empty($_SESSION['mgmt_db'])) $this -> db = commonFindFirstAccountingDB ('');
		else $this -> db = $_SESSION['mgmt_db'];
		
		$this->table=$GLOBALS['table_prefix'].'tableinstallers';
		$this->id=$id;
		$this -> title = ucphr('TABLES');
		$this->file=ROOTDIR.'/admin/admin.php';
		
		$this->templates['edit']='common_edit';
	}
	
	function checkDataTable ($class)
	{
		global $modManager;
		$obj =& $modManager->getModule($class);
		
		if(!method_exists($obj,'createTable')) return 0;
		
		$target=$GLOBALS['table_prefix'].$class;
		
		$query="SHOW TABLES";
		
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return 0;
		
		$dataFound=false;
		$accountsFound=false;
		while($arr=mysql_fetch_row($res))
		{
			if($arr[0]==$target.'_data') $dataFound=true;
			elseif($arr[0]==$target.'_accounts') $accountsFound=true;
		}
		
		if(!$dataFound) if($ret=$obj -> createTable ($target,'data')) return $err;
		if(!$accountsFound) if($ret=$obj -> createTable ($target,'accounts')) return $err;
		
		return 0;
	}
}


?>