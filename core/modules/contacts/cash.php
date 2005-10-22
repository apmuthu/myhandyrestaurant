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

$modules[]='cash';

class cash extends module {
	function cash($id=0) {
		$this -> setName ('cash');
		$this -> addMsgType (MSG_TYPE_ACCOUNTING);
		$this -> addMenuLink(ucphr('CASH'),'/admin/admin.php?class=cash&command=none',ucphr('CASH').': '.ucphr('CASH'));
		
		mt_srand((double)microtime()*1000000);
		$this -> identifier = mt_rand();
		$this -> setUserLevel (USER_BIT_ACCOUNTING);
		
		if(empty($_SESSION['mgmt_db'])) $this -> db = commonFindFirstAccountingDB ('');
		else $this -> db = $_SESSION['mgmt_db'];
		
		$this->id=$id;
		$this -> title = ucphr('CASH');
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
		
		$this->nameField='name';
		$this->orderby='id';
		$this->sort='desc';
		
		$this->table = $GLOBALS['table_prefix'].get_class($this).'_data';
		
		if($id) $this -> fetch_data();
	}
	
	function msgDistribute ($msg) {
		global $modManager;
		global $tpl;
		// $tpl->append('messages','<br><br>handler:**'.$msg->getProperty('character').'**<br><br>');
		
		$cmd=$msg->getProperty('command');
		switch($cmd) {
			case 'mhrTransaction_addedTransaction':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> addTransaction ($msg)) return $res;
				break;
			case 'mhrTransaction_updatedTransaction':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> updateTransaction ($msg)) return $res;
				break;
		}
	}
	
	function addTransaction ($msg) {
		if($msg->getProperty('toClass')!=get_class($this)) return 0;
		
		if($msg->getProperty('timestamp')) $data['timestamp'] = $msg->getProperty('timestamp');
		$data['name'] = $msg->getProperty('name');
		$data['amount'] = $msg->getProperty('amount');
		$data['transaction'] = $msg->getProperty('id');
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function recordExists ($transaction)
	{
		if(empty($transaction)) return 0;
		
		$query = "SELECT *
				FROM ".$this->table."
				WHERE `transaction`='$transaction'
				AND `deleted`='0'
				";
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return mysql_errno();
		
		if($arr=mysql_fetch_array($res)) return $arr['id'];
		return 0;
	}
	
	function updateTransaction ($msg) {
		if($msg->getProperty('toClass')!=get_class($this)) return 0;
		
		if($msg->getProperty('timestamp')) $data['timestamp'] = $msg->getProperty('timestamp');
		$data['name'] = $msg->getProperty('name');
		$data['amount'] = $msg->getProperty('amount');
		$data['transaction'] = $msg->getProperty('id');
		
		$data['id'] = $this->recordExists ($data['transaction']);
		$this->id=$data['id'];
		
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> update ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function list_query_all () {
		$dbCommon=$_SESSION['common_db'];
		$dbAccount=$this->db;
		$tblCash = $this->table;
		$tblTable = '#prefix#sources';
		$tblCustomer = '#prefix#customers';
		
		$query="SELECT
				`$dbAccount`.`$tblCash`.`id`,
				`$dbAccount`.`$tblCash`.timestamp,
				`$dbAccount`.`$tblCash`.`name`,
				`$dbAccount`.`$tblCash`.amount,
				`$dbAccount`.`$tblCash`.account,
				`$dbAccount`.`$tblCash`.transaction
				FROM `$dbAccount`.`$tblCash`
				WHERE `$dbAccount`.`$tblCash`.`deleted`='0'
				";
		
		return $query;
	}
	
	function check_values($input_data){
		$msg="";
		
		if($msg){
			echo "<script language=\"javascript\">
				window.alert(\"".$msg."\");
				window.history.go(-1);
			</script>\n";
			return -2;
		}

		return $input_data;
	}
	
	function post_insert ($input_data) {
		global $modManager;
		$input_data['id']=$this->id;
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrCash_addedRecord');
		$msg->setProperty('class',get_class($this));
		$msg->setProperty('id',$input_data['id']);
		$msg->setProperty('timestamp',$input_data['timestamp']);
		$msg->setProperty('amount',$input_data['amount']);
		$msg->setProperty('transaction',$input_data['transaction']);
		$msg->setProperty('name',$input_data['name']);
		$msg->setProperty('account',$input_data['account']);
		$msg->setType(MSG_TYPE_ACCOUNTING);
		$modManager->distrMsg($msg);

		return $input_data;
	}
	
	function post_update ($input_data) {
		global $modManager;
		$input_data['id']=$this->id;
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrCash_updatedRecord');
		$msg->setProperty('class',get_class($this));
		$msg->setProperty('id',$input_data['id']);
		$msg->setProperty('timestamp',$input_data['timestamp']);
		$msg->setProperty('amount',$input_data['amount']);
		$msg->setProperty('transaction',$input_data['transaction']);
		$msg->setProperty('name',$input_data['name']);
		$msg->setProperty('account',$input_data['account']);
		$msg->setType(MSG_TYPE_ACCOUNTING);
		$modManager->distrMsg($msg);
		
		return $input_data;
	}
	
	function post_delete ($input_data) {
		global $modManager;
		
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrCash_deletedRecord');
		$msg->setProperty('class',get_class($this));
		$msg->setProperty('id',$input_data['id']);
		$msg->setProperty('timestamp',$input_data['timestamp']);
		$msg->setProperty('amount',$input_data['amount']);
		$msg->setProperty('transaction',$input_data['transaction']);
		$msg->setProperty('name',$input_data['name']);
		$msg->setProperty('account',$input_data['account']);
		$msg->setType(MSG_TYPE_ACCOUNTING);
		$modManager->distrMsg($msg);

		return $input_data;
	}
	
	function createTable ($accountTable,$suffix)
	{
		$tblAccount="`".$this->db."`.`".$accountTable."_".$suffix."`";
		if($suffix=='data') $query = "
			CREATE TABLE $tblAccount (
			`id` int(10) unsigned NOT NULL auto_increment,
			`timestamp` timestamp NOT NULL,
			`name` text NOT NULL,
			`amount` decimal(10,2) NOT NULL default '0.00',
			`deleted` tinyint(4) NOT NULL default '0',
			`transaction` bigint(20) NOT NULL default '0',
			`account` int(10) unsigned NOT NULL default '1',
			UNIQUE KEY `id` (`id`)
			) TYPE=MyISAM AUTO_INCREMENT=11 ;
			";
		elseif($suffix=='accounts')
		{
			$query = "
			CREATE TABLE $tblAccount (
			`id` int(10) unsigned NOT NULL auto_increment,
			`name` text NOT NULL,
			`amount` decimal(10,2) NOT NULL default '0.00',
			UNIQUE KEY `id` (`id`)
			) TYPE=MyISAM AUTO_INCREMENT=11 ;";
			
			if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
			else $res = database_query($query,__FILE__,__LINE__,$this->db);
			if(!$res) return ERR_MYSQL;
			
			$query = "
			INSERT INTO $tblAccount (`name`) VALUES ('Default');
			";
		}

		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return ERR_MYSQL;
		
		return 0;
	}
	
	function list_search ($search) {
		$query = '';
		$accountDB=$this -> db;
		
		$table = $this->table;
		
		$query="SELECT
				`$accountDB`.`$table`.`id`,
				`$accountDB`.`$table`.`name`,
				RPAD('".ucphr('INVOICES')."',30,' ') as `table`,
				RPAD('".get_class($this)."',30,' ') as `table_id`
				FROM `$accountDB`.`$table`
				WHERE `$accountDB`.`$table`.`deleted`='0'
				AND (`$accountDB`.`$table`.`name` LIKE '%$search%')
				";
		
		return $query;
	}
	
	function form_tmp ($input_data=array()) {
		global $tpl;
		$this -> commands_horizontal(get_class($this));
		
		$display = new display();
		$display->highlight=false;
		$display->show_head=true;
		$output = '';
		
		if($this->id) {
			$editing=1;
			$query="SELECT * FROM `".$this->table."` WHERE `id`='".$this->id."'";
			$res=database_query($query,__FILE__,__LINE__,$this->db);
			if(!$res) return mysql_errno();
			
			$arr=mysql_fetch_array($res);
		} else {
			$editing=0;
			$arr['id']=next_free_id($this->db,$this->table);
			$arr['visible']=1;
		}
		
		
		$row = 0;
		$col = 0;
		/*************************************************
		Head
		*************************************************/
		$desc = ucphr('RECEIPT');
		$display->properties[$row][$col]='colspan=2';
		$display->rows[$row][$col]=$desc;
		$col++;
		$row++;
		$col=0;
		
		/*************************************************
		Names
		*************************************************/
		/*
		if($editing && $arr['uid'] && class_exists('user')) {
			$obj = new user($arr['uid']);
			if($obj->exists($arr['uid'])) {
				$link = $obj->file.'?class=user&amp;command=edit&amp;data[id]='.$arr['uid'];
				$this->editRowLink($display,$row,ucphr('USER'),$link,$arr['uid']);
			}
		}
		*/
		$this->editRowText($display,$row,ucphr('INTERNAL_ID'),'internal_id',htmlentities($arr['internal_id']));
		$this->editRowLink($display,$row,ucphr('TIME'),'',$arr['timestamp']);
		/*
		if($editing && $arr['uid'] && class_exists('user')) {
			$obj = new user($arr['uid']);
			if($obj->exists($arr['uid'])) {
				$link = $obj->file.'?class=user&amp;command=edit&amp;data[id]='.$arr['uid'];
				$this->editRowLink($display,$row,ucphr('USER'),$link,$arr['uid']);
			}
		}
		*/
		/*
		if($editing && $arr['uid'] && class_exists('user')) {
			$obj = new user($arr['uid']);
			if($obj->exists($arr['uid'])) {
				$link = $obj->file.'?class=user&amp;command=edit&amp;data[id]='.$arr['uid'];
				$this->editRowLink($display,$row,ucphr('USER'),$link,$arr['uid']);
			}
		}
		*/
		$this->editRowText($display,$row,ucphr('AMOUNT'),'amount',$arr['amount']);
		
		
		/*************************************************
		Page
		*************************************************/
		$output .= '
	<form action="'.$this->file.'?" name="edit_form_'.get_class($this).'" method="post">
	<input type="hidden" name="class" value="'.get_class($this).'">
	<input type="hidden" name="data[id]" value="'.$arr['id'].'">';
		if($editing){
			$output .= '
	<input type="hidden" name="command" value="update">';
		} else {
			$output .= '
	<input type="hidden" name="command" value="insert">';
		}
		
		$output.=$display->list_table();
	
		/*************************************************
		Form buttons
		*************************************************/
		$output.='
		<table width="100%">
			<tr>';

		if(!$editing) {
			$output .= '
				<td align="center">
				<input type="submit" value="'.ucphr('INSERT').'">
	</form>
				</td>';
		} else {
			$output .= '
				<td align="right">
				<input type="submit" value="'.ucphr('UPDATE').'">
	</form>
				</td>';
			/*
			$output .= '
				<td align="left">
				<form action="'.$this->file.'?" name="delete_form_'.get_class($this).'" method="post">
				<input type="hidden" name="class" value="'.get_class($this).'">
				<input type="hidden" name="command" value="delete">
				<input type="hidden" name="delete[]" value="'.$this->id.'">
				<input type="submit" value="'.ucphr('DELETE').'">
				</form>
				</td>';
			*/
		}
		$output .= '
			</tr>
			</table>';
			
			
		if(!$editing) {
			$display->properties[$row][$col]='colspan=2 align="center"';
			$display->rows[$row][$col]='<input type="submit" value="'.ucphr('INSERT').'"></form>';
			$col++;
			$row++;
			$col=0;
		} else {
			$display->properties[$row][$col]='align="right"';
			$display->rows[$row][$col]='<input type="submit" value="'.ucphr('UPDATE').'"></form>';
			$col++;
			$display->properties[$row][$col]='align="left"';
			$display->rows[$row][$col]='
		<form action="'.$this->file.'?" name="delete_form_'.get_class($this).'" method="post">
		<input type="hidden" name="class" value="'.get_class($this).'">
		<input type="hidden" name="command" value="delete">
		<input type="hidden" name="delete[]" value="'.$this->id.'">
		<input type="submit" value="'.ucphr('DELETE').'">
		</form>';
			$col++;
			$row++;
			$col=0;
		}
		
		$tpl->assign('dish_data',$output);
		
		if(!$editing) return $output;
		$output .= '
	</td>
	</tr>
	</table>
	';

		return $output;
	}
}


?>