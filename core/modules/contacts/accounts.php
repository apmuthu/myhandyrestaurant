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

$modules[]='account';

class account extends module {
	function account($id=0) {
		$this -> setName ('account');
		$this -> addMsgType (MSG_TYPE_ACCOUNTING);
		// $this -> addMenuLink(ucphr('ACCOUNTS'),'/admin/admin.php?class=account&command=none',ucphr('ACCOUNTS').': '.ucphr('ACCOUNTS'));
		
		$this -> setUserLevel (USER_BIT_ACCOUNTING);
		
		if(empty($_SESSION['mgmt_db'])) $this -> db = commonFindFirstAccountingDB ('');
		else $this -> db = $_SESSION['mgmt_db'];
		
		$this->table=$GLOBALS['table_prefix'].'accounts';
		$this->id=$id;
		$this -> title = ucphr('ACCOUNTS');
		$this->file=ROOTDIR.'/admin/admin.php';
/*
		$this -> fields_names = array(	'id'=>ucphr('ID'),
						'name'=>ucphr('DESCRIPTION'),
						'timestamp'=>ucphr('TIME'),
						'from'=>ucphr('FROM'),
						'to'=>ucphr('TO'),
						'amount'=>ucphr('AMOUNT'));
		$this->fields_width=array(	'name'=>'90%');
*/
		$this->templates['edit']='common_edit';
		$this->flag_delete = true;
		
		$this->nameField='id';
		$this->orderby='id';
		
		if($id) $this -> fetch_data();
	}

	function msgDistribute ($msg) {
		global $tpl;
		global $modManager;
		//$tpl->append('messages','<br><br>handler:**'.$msg->getProperty('character').'**<br><br>');
		
		$cmd=$msg->getProperty('command');
		switch($cmd) {
			case 'mhrPaymentdoc_discoverPaymentdocs':
// 				$modManager->addProcessed(get_class($this),$msg->getID());
				// if($res = $this -> registerPaymentdoc ($msg)) return $res;
				break;
		}
	}
	
	function list_query_all () {
		$dbCommon=$_SESSION['common_db'];
		$dbAccount=$this->db;
		$tblAccount = $this->table;
		
		$query="SELECT
				`$dbAccount`.`$tblAccount`.`id`,
				`$dbAccount`.`$tblAccount`.`class` as module
				FROM `$dbAccount`.`$tblAccount`
				WHERE `$dbAccount`.`$tblAccount`.`hidden`='0'
				";
		
		return $query;
	}
	
	function findFirstAccount ($class)
	{
		$query="SELECT * FROM ".$this->table."
				WHERE `class`='$class' AND `deleted`='0' ORDER BY `id` ASC LIMIT 1";
		
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return 0;
	
		if($arr=mysql_fetch_array($res)) $accountID=$arr['id'];
		else return 0;
		
		$accountID = sprintf("%06d",$accountID);
		$accountTable=$GLOBALS['table_prefix'].'accounts_'.$accountID.'_'.$class;
		return $accountTable;
	}
	
	function getFirstAccount ($class,$hidden=0)
	{
		if($accountTable=$this->findFirstAccount($class)) return $accountTable;
		
		$data['class']=$class;
		$data['hidden']=$hidden;
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
		$accountID = sprintf("%06d",$this->id);
		
		$accountTable=$GLOBALS['table_prefix'].'accounts_'.$accountID.'_'.$class;
		return $accountTable;
	}
	
	function post_insert ($input_data)
	{
		global $modManager;
		$class = $input_data['class'];
		
		$accountID = sprintf("%06d",$this->id);
		$accountTable=$GLOBALS['table_prefix'].'accounts_'.$accountID.'_'.$class;
		
		if(empty($class)) return 1;
		if(!$modManager->moduleExists ($class)) return 1;
		
		$obj =& $modManager->getModule($class);
		// echo 'got object '.$obj->identifier;
		if(method_exists($obj,'createAccount')) return ($obj -> createAccount ($accountTable));
		
		return 0;
	}
}


?>