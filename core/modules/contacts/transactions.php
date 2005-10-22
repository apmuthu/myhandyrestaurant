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

$modules[]='transaction';

class transaction extends module {
	function transaction($id=0) {
		$this -> setName ('transaction');
		$this -> addMsgType (MSG_TYPE_ACCOUNTING);
		$this -> addMsgType (MSG_TYPE_STOCK);
		$this -> addMenuLink(ucphr('TRANSACTIONS'),'/admin/admin.php?class=transaction&command=none',ucphr('TRANSACTIONS').': '.ucphr('TRANSACTIONS'));
		
		$this -> setUserLevel (USER_BIT_ACCOUNTING);
		
		if(empty($_SESSION['mgmt_db'])) $this -> db = commonFindFirstAccountingDB ('');
		else $this -> db = $_SESSION['mgmt_db'];
		
		$this->table=$GLOBALS['table_prefix'].'transactions';
		$this->id=$id;
		$this -> title = ucphr('TRANSACTIONS');
		$this->file=ROOTDIR.'/admin/admin.php';
		$this -> fields_names = array(	'id'=>ucphr('ID'),
						'name'=>ucphr('DESCRIPTION'),
						'timestamp'=>ucphr('TIME'),
						'fromRecipient'=>ucphr('FROM'),
						'to'=>ucphr('TO'),
						'amount'=>ucphr('AMOUNT'));
		$this->fields_width=array(	'name'=>'70%');
		$this->templates['edit']='common_edit';
		$this->flag_delete = true;
		$this->orderby='id';
		$this->sort='desc';
		
		if($id) $this -> fetch_data();
	}

	function msgDistribute ($msg) {
		global $tpl;
		global $modManager;
		//$tpl->append('messages','<br><br>handler:**'.$msg->getProperty('character').'**<br><br>');
		
		$cmd=$msg->getProperty('command');
		switch($cmd) {
			case 'mhrPayment_addedPayment':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> addPayment ($msg)) return $res;
				break;
			case 'mhrPayment_updatedPayment':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> updatePayment ($msg)) return $res;
				break;
			case 'mhrCash_addedRecord':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> addCash ($msg)) return $res;
				break;
			case 'mhrCash_updatedRecord':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> updateCash ($msg)) return $res;
				break;
		}
	}
	
	function addCash ($msg) {
		if($msg->getProperty('timestamp')) $data['timestamp'] = $msg->getProperty('timestamp');
		$data['name'] = $msg->getProperty('name');
		$data['fromClass'] = $msg->getProperty('class');
		$data['fromID'] = $msg->getProperty('id');
		$data['fromRecipient'] = RECIPIENT_UNKNOWN;
		$data['toRecipient'] = RECIPIENT_MYSELF;
		$data['toClass'] = $msg->getProperty('destination');
		$data['toID'] = $msg->getProperty('destinationID');
		$data['amount'] = $msg->getProperty('amount');
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function updateCash ($msg) {
		if($msg->getProperty('timestamp')) $data['timestamp'] = $msg->getProperty('timestamp');
		$data['name'] = $msg->getProperty('name');
		$data['fromClass'] = $msg->getProperty('class');
		$data['fromID'] = $msg->getProperty('id');
		$data['fromRecipient'] = RECIPIENT_UNKNOWN;
		$data['toRecipient'] = RECIPIENT_MYSELF;
		$data['toClass'] = $msg->getProperty('destination');
		$data['toID'] = $msg->getProperty('destinationID');
		$data['amount'] = $msg->getProperty('amount');
		$data['id'] = $this->recordExists ($data['fromClass'],$data['fromID']);
		$this->id=$data['id'];
		
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> update ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function addPayment ($msg) {
		$recipient = new recipient();
		
		if($msg->getProperty('timestamp')) $data['timestamp'] = $msg->getProperty('timestamp');
		$data['name'] = $msg->getProperty('name');
		$data['fromClass'] = $msg->getProperty('class');
		$data['fromID'] = $msg->getProperty('id');
		$data['fromRecipient'] = $recipient->recordExists('customer',$msg->getProperty('customer'));
		$data['toRecipient'] = RECIPIENT_MYSELF;
		$data['toClass'] = $msg->getProperty('destination');
		$data['amount'] = $msg->getProperty('amount');
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function updatePayment ($msg) {
		$recipient = new recipient();
		
		if($msg->getProperty('timestamp')) $data['timestamp'] = $msg->getProperty('timestamp');
		$data['name'] = $msg->getProperty('name');
		$data['fromClass'] = $msg->getProperty('class');
		$data['fromID'] = $msg->getProperty('id');
		$data['fromRecipient'] = $recipient->recordExists('customer',$msg->getProperty('customer'));
		$data['toRecipient'] = RECIPIENT_MYSELF;
		$data['toClass'] = $msg->getProperty('destination');
		$data['amount'] = $msg->getProperty('amount');
		
		$data['id'] = $this->recordExists ($data['fromClass'],$data['fromID']);
		$this->id=$data['id'];
		
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> update ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function addTransaction ($msg) {
		if($msg->getProperty('timestamp')) $data['timestamp'] = $msg->getProperty('timestamp');
		$data['name'] = $msg->getProperty('name');
		$data['fromClass'] = $msg->getProperty('class');
		$data['fromID'] = $msg->getProperty('id');
		$data['fromRecipient'] = $msg->getProperty('fromRecipient');
		$data['toRecipient'] = $msg->getProperty('toRecipient');
		$data['toClass'] = $msg->getProperty('toClass');
		$data['amount'] = $msg->getProperty('amount');
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function recordExists ($class,$classID)
	{
		if(empty($class) || empty($classID)) return 0;
		
		$query = "SELECT *
				FROM ".$this->table."
				WHERE `fromClass`='$class'
				AND `fromID`='$classID'
				AND `deleted`='0'
				";
		if($this->db=='common') $res = common_query($query,__FILE__,__LINE__);
		else $res = database_query($query,__FILE__,__LINE__,$this->db);
		if(!$res) return mysql_errno();
		
		if($arr=mysql_fetch_array($res)) return $arr['id'];
		return 0;
	}
	
	function list_query_all () {
		$table = $this->table;
		
		$query="SELECT
				$table.`id`,
				$table.timestamp,
				$table.name,
				$table.fromRecipient,
				$table.toRecipient,
				$table.amount
				FROM `$table`
				WHERE $table.`deleted`='0'
				";
		
		return $query;
	}
	
	function check_values($input_data){
		$msg="";
		if($input_data['name']=="") {
			$msg=ucfirst(phr('CHECK_NAME'));
		}
		
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
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrTransaction_addedTransaction');
		$msg->setProperty('class',get_class($this));
		$msg->setProperty('id',$this->id);
		$msg->setProperty('name',$input_data['name']);
		$msg->setProperty('fromRecipient',$input_data['fromRecipient']);
		$msg->setProperty('fromClass',$input_data['fromClass']);
		$msg->setProperty('fromID',$input_data['fromID']);
		$msg->setProperty('toRecipient',$input_data['toRecipient']);
		$msg->setProperty('toClass',$input_data['toClass']);
		$msg->setProperty('toID',$input_data['toID']);
		$msg->setProperty('timestamp',$input_data['timestamp']);
		$msg->setProperty('amount',$input_data['amount']);
		$msg->setType(MSG_TYPE_ACCOUNTING);
		$modManager->distrMsg($msg);

		return $input_data;
	}
	
	function post_update ($input_data) {
		global $modManager;
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrTransaction_updatedTransaction');
		$msg->setProperty('class',get_class($this));
		$msg->setProperty('id',$this->id);
		$msg->setProperty('name',$input_data['name']);
		$msg->setProperty('fromRecipient',$input_data['fromRecipient']);
		$msg->setProperty('fromClass',$input_data['fromClass']);
		$msg->setProperty('fromID',$input_data['fromID']);
		$msg->setProperty('toRecipient',$input_data['toRecipient']);
		$msg->setProperty('toClass',$input_data['toClass']);
		$msg->setProperty('toID',$input_data['toID']);
		$msg->setProperty('timestamp',$input_data['timestamp']);
		$msg->setProperty('amount',$input_data['amount']);
		$msg->setType(MSG_TYPE_ACCOUNTING);
		$modManager->distrMsg($msg);

		return $input_data;
	}
	
	function post_delete ($input_data) {
		global $modManager;
		
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrTransaction_deletedTransaction');
		$msg->setProperty('class',get_class($this));
		$msg->setProperty('id',$input_data['id']);
		$msg->setProperty('name',$input_data['name']);
		$msg->setProperty('fromRecipient',$input_data['fromRecipient']);
		$msg->setProperty('toRecipient',$input_data['toRecipient']);
		$msg->setProperty('toClass',$input_data['toClass']);
		$msg->setProperty('timestamp',$input_data['timestamp']);
		$msg->setProperty('amount',$input_data['amount']);
		$msg->setType(MSG_TYPE_ACCOUNTING);
		$modManager->distrMsg($msg);

		return $input_data;
	}
	
	function form ($input_data=array()) {
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
		$desc = ucphr('TRANSACTION');
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
		$this->editRowText($display,$row,ucphr('NAME'),'name',htmlentities($arr['name']));
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