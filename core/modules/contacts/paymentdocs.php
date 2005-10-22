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

$modules[]='paymentdoc';

class paymentdoc extends module {
	var $identifier;
	
	function paymentdoc ($id=0) {
		$this -> setName ('paymentdoc');
		$this -> addMsgType (MSG_TYPE_ACCOUNTING);
		
		$this -> setUserLevel (USER_BIT_ACCOUNTING);
		
		$this -> db = "common";
		
		$this->table=$GLOBALS['table_prefix'].'paymentdocs';
		$this->id=$id;
		
		$this -> title = ucphr('PAYMENTDOCS');
		$this->file=ROOTDIR.'/admin/admin.php';
		
		$this->templates['edit']='common_edit';
		$this->flag_delete = true;
		
		if($id) $this -> fetch_data();
		$this -> identifier = mt_rand();
	}

	function msgDistribute ($msg) {
		global $tpl;
		global $modManager;
		//$tpl->append('messages','<br><br>handler:**'.$msg->getProperty('character').'**<br><br>');
		
		$cmd=$msg->getProperty('command');
		switch($cmd) {
			case 'mhrPaymentdoc_addPaymentdoc':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> addPaymentdoc ($msg)) return $res;
				break;
				
		}
	}
	
	function getPaymentdocs ()
	{
		$docs=array();
		
		$this->discoverPaymentdocs();
		
		$query = "SELECT *
				FROM ".$this->table."
				WHERE `deleted`='0'
				";
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return ERR_MYSQL;
		
		while($arr=mysql_fetch_array($res)) $docs[]=$arr['class'];
		
		return $docs;
	}
	
	function classExists ($name)
	{
		$query = "SELECT *
				FROM ".$this->table."
				WHERE `class`='$name'
				AND `deleted`='0'
				";
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return mysql_errno();
		
		if($arr=mysql_fetch_array($res)) return $arr['id'];
		return 0;
	}
	
	function addPaymentdoc ($msg)
	{
		$data['class'] = $msg->getProperty('class');
		if($this->classExists ($data['class'])) return 0;
		
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
		
		return 0;
	}
	
	function discoverPaymentdocs () {
		global $modManager;
		
		$_SESSION['paymentdocs']=array();
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrPaymentdoc_discoverPaymentdocs');
		$msg->setType(MSG_TYPE_ACCOUNTING);
		$modManager->distrMsg($msg);
	}
	
}


?>