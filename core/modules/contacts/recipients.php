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

$modules[]='recipient';

class recipient extends module {
	function recipient($id=0) {
		$this -> setName ('recipient');
		$this -> addMsgType (MSG_TYPE_ACCOUNTING);
		$this -> addMsgType (MSG_TYPE_CONTACT);
		$this -> addMsgType (MSG_TYPE_USER);
		//$this -> addMenuLink(ucphr('RECIPIENT'),'/admin/admin.php?class='.get_class($this).'&command=none',ucphr('RECIPIENTS').': '.ucphr('RECIPIENTS'));
		
		$this -> setUserLevel (USER_BIT_USERS);
		
		$this -> db = "common";
		
		$this->table=$GLOBALS['table_prefix'].'recipients';
		$this->id=$id;
		
		$this -> title = ucphr('RECIPIENTS');
		$this->file=ROOTDIR.'/admin/admin.php';
		
		$this->templates['edit']='common_edit';
		$this->flag_delete = true;
		
		if($id) $this -> fetch_data();
	}

	function msgDistribute ($msg) {
		global $tpl;
		global $modManager;
		
		$cmd=$msg->getProperty('command');
		switch($cmd) {
			case 'mhrRecipient_addRecipient':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> addRecipient ($msg)) return $res;
				break;
			case 'mhrContact_addedContact':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> addContact ($msg)) return $res;
				break;
			case 'mhrContact_deletedContact':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> deleteContact ($msg)) return $res;
				break;
			case 'mhrCustomer_addedCustomer':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> addContact ($msg)) return $res;
				break;
			case 'mhrCustomer_deletedCustomer':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> deleteContact ($msg)) return $res;
				break;
			case 'mhrCustomer_updatedCustomer':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> updatedContact ($msg)) return $res;
				break;
		}
	}
	
	function deleteContact ($msg) {
		$data['class'] = $msg->getProperty('class');
		$data['classID'] = $msg->getProperty('id');
		$query="SELECT * FROM `".$this->table."` WHERE `classID`='".$data['classID']."' AND `class`='".$data['class']."'";
		
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return mysql_errno();
		
		if($arr=mysql_fetch_array($res)) {
			$data['id']=$arr['id'];
			$obj = new recipient($arr['id']);
			
			$tmp=$obj->silent;
			$obj->silent=true;
			if($res=$obj -> delete ($data)) {
				$obj->silent=$tmp;
				return $res;
			}
			$obj->silent=$tmp;
		}
		return 0;
	}
	
	function recordExists ($class,$classID)
	{
		if(empty($class) || empty($classID)) return RECIPIENT_UNKNOWN;
		
		$query = "SELECT *
				FROM ".$this->table."
				WHERE `class`='$class'
				AND `classID`='$classID'
				AND `deleted`='0'
				";
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return mysql_errno();
		
		if($arr=mysql_fetch_array($res)) return $arr['id'];
		return RECIPIENT_UNKNOWN;
	}
	
	function addContact ($msg) {
		$data['name'] = $msg->getProperty('name');
		$data['class'] = $msg->getProperty('class');
		$data['classID'] = $msg->getProperty('id');
		
		//echo 'INSERTING RECIPIENT<br>';
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
		return 0;
	}
	
	function updatedContact ($msg) {
		$data['name'] = $msg->getProperty('name');
		$data['class'] = $msg->getProperty('class');
		$data['classID'] = $msg->getProperty('id');
		
		$data['id']=$this->recordExists ($data['class'],$data['classID']);
		if($data['id']<1) return $this->addContact ($msg);
		
		// echo 'UPDATING RECIPIENT<br>';
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> update ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function addRecipient ($msg) {
		$data['name'] = $msg->getProperty('name');
		$data['class'] = $msg->getProperty('class');
		$data['classID'] = $msg->getProperty('classID');
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function post_delete ($input_data) {
		global $modManager;
		
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrRecipient_deletedRecipient');
		$msg->setProperty('class',get_class($this));
		$msg->setProperty('id',$input_data['id']);
		$msg->setProperty('classID',$input_data['classID']);
		$msg->setProperty('name',$input_data['name']);
		$msg->setType(MSG_TYPE_CONTACT);
		$modManager->distrMsg($msg);

		return $input_data;
	}
		
	function list_query_all () {
		$table = $this->table;
		
		$query="SELECT
				$table.`id`,
				$table.name,
				$table.class,
				$table.classID
				FROM `$table`
				WHERE $table.`deleted`='0'
				";
		
		return $query;
	}
}


?>