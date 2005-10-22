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

$modules[]='paymentdocs_printer';

class paymentdocs_printer extends module {
	var $identifier;
	
	function paymentdocs_printer ($id=0) {
		$this -> setName ('paymentdocs_printer');
		$this -> addMsgType (MSG_TYPE_CONFIG);
		
		$this -> setUserLevel (USER_BIT_ACCOUNTING);
		
		$this -> db = "common";
		
		$this->table=$GLOBALS['table_prefix'].'paymentdocs_printers';
		$this->id=$id;
		
		$this -> title = ucphr('PAYMENTDOCS_PRINTERS');
		$this->file=ROOTDIR.'/admin/admin.php';
		
		$this->templates['edit']='common_edit';
		$this->flag_delete = false;
		
		if($id) $this -> fetch_data();
		$this -> identifier = mt_rand();
	}

	function msgDistribute (&$msg) {
		global $tpl;
		global $modManager;
		
		$cmd=$msg->getProperty('command');
		switch($cmd) {
			case 'mhrPaymentdocsprinter_addPaymentdocsprinter':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> insertIfNotExists ($msg)) return $res;
				break;
			case 'mhrPaymentdocsprinter_deleteAllPaymentdocsprinter':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> deleteAllFromPrinter ($msg)) return $res;
				break;
			case 'mhrPaymentdocsprinter_deletePaymentdocsprinter':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> deletePrinter ($msg)) return $res;
				break;
		}
	}
	
	function deletePrinter (&$msg)
	{
		$paymentdoc = $msg->getProperty('class');
		$printer = $msg->getProperty('printer');
		$this->id = $this->paymentdocPrinterExists ($paymentdoc,$printer);
		
		if($this->id==0) return 0;
		
		$data['id']=$this->id;
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> delete ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
		
		return 0;
	}
	
	function deleteAllFromPrinter (&$msg)
	{
		$printer = $msg->getProperty('printer');
		
		$query = "SELECT *
				FROM ".$this->table."
				WHERE `printer`='$printer'
				";
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return ERR_MYSQL;
		
		while($arr=mysql_fetch_array($res))
		{
			$data['id']=$arr['id'];
			$this->id=$data['id'];
			$tmp=$this->silent;
			$this->silent=true;
			if($res2=$this -> delete ($data)) {
				$this->silent=$tmp;
				return $res2;
			}
			$this->silent=$tmp;
		}
		
		return 0;
	}
	
	function insertIfNotExists(&$msg)
	{
		$data['class'] = $msg->getProperty('class');
		$data['printer'] = $msg->getProperty('printer');
		if($this->paymentdocPrinterExists ($data['class'],$data['printer'])) return 0;
		
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
		
		return 0;
	}
	
	function getPaymentdocPrinter ($paymentdoc)
	{
		$query = "SELECT *
				FROM ".$this->table."
				WHERE `class`='$paymentdoc'
				";
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return mysql_errno();
		
		if($arr=mysql_fetch_array($res)) return $arr['printer'];
		return 0;
	}
	
	function paymentdocPrinterExists ($paymentdoc,$printer)
	{
		$query = "SELECT *
				FROM ".$this->table."
				WHERE `class`='$paymentdoc'
				AND `printer`='$printer'
				";
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return mysql_errno();
		
		if($arr=mysql_fetch_array($res)) return $arr['id'];
		return 0;
	}
}


?>