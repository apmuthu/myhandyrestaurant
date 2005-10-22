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

$modules[]='contact';

class contact extends module {
	function contact($id=0) {
		$this -> setName ('contact');
		
		$this -> addMsgType (MSG_TYPE_CONTACT);
		$this -> addMsgType (MSG_TYPE_USER);
		$this -> addMenuLink(ucphr('CONTACTS'),'/admin/admin.php?class=contact&command=none',ucphr('CONTACTS').': '.ucphr('CONTACTS'));
		
		$this -> setUserLevel (USER_BIT_CONTACTS);
		
		$this -> db = 'common';
		$this->table=$GLOBALS['table_prefix'].'contacts';
		$this->id=$id;
		$this -> title = ucphr('CONTACTS');
		$this->file=ROOTDIR.'/admin/admin.php';
		$this -> fields_names = array(	'id'=>ucphr('ID'),
						'name'=>ucphr('NAME'),
						'surname'=>ucphr('SURNAME'),
						'company'=>ucphr('COMPANY'),
						'category'=>ucphr('CATEGORY'),
						'telephone'=>ucphr('PHONE'),
						'mobile'=>ucphr('MOBILE'),
						'email'=>ucphr('EMAIL'));
		$this->fields_width=array(	'name'=>'12%',
						'surname'=>'12%',
						'company'=>'12%',
						'telephone'=>'12%',
						'mobile'=>'12%',
						'category'=>'20%',
						'email'=>'80%');
		$this->templates['edit']='common_edit';
		$this->flag_delete = true;
		
		if($id) $this -> fetch_data();
	}

	function msgDistribute ($msg) {
		global $modManager;
		
		$cmd=$msg->getProperty('command');
		switch($cmd) {
			case 'mhrUsers_addUser':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> addUser ($msg)) return $res;
				break;
			case 'mhrCustomer_addedCustomer':
				$modManager->addProcessed(get_class($this),$msg->getID());
				if($res = $this -> addCustomer ($msg)) return $res;
				break;
			case 'mhrRecipient_deletedRecipient':
				if($msg->getProperty('class')==get_class($this))
				{
					$modManager->addProcessed(get_class($this),$msg->getID());
					if($res = $this -> deleteRecipient ($msg)) return $res;
				}
				break;
		}
	}
	
	function deleteRecipient ($msg) {
		$obj = new contact($msg->getProperty('classID'));
		
		$tmp=$obj->silent;
		$obj->silent=true;
		if($res=$obj -> delete ($data)) {
			$obj->silent=$tmp;
			return $res;
		}
		$obj->silent=$tmp;
		
		return 0;
	}
	
	function addUser ($msg) {
		$data['uid'] = $msg->getProperty('id');
		$data['name'] = $msg->getProperty('name');
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function addCustomer ($msg) {
		$data['name'] = $msg->getProperty('name');
		$data['surname'] = $msg->getProperty('surname');
		$data['address'] = $msg->getProperty('address');
		$data['vat'] = $msg->getProperty('vat_account');
		$data['telephone'] = $msg->getProperty('phone');
		$data['mobile'] = $msg->getProperty('mobile');
		$data['email'] = $msg->getProperty('email');
		$tmp=$this->silent;
		$this->silent=true;
		if($res=$this -> insert ($data)) {
			$this->silent=$tmp;
			return $res;
		}
		$this->silent=$tmp;
	}
	
	function list_search ($search) {
		$query = '';
		
		$table = $this->table;
		
		$query="SELECT
				$table.`id`,
				$table.`name` as `name`,
				RPAD('".ucphr('CONTACTS')."',30,' ') as `table`,
				RPAD('".get_class($this)."',30,' ') as `table_id`
				FROM `$table`
				WHERE $table.`deleted`='0'
				AND ($table.`name` LIKE '%$search%' OR $table.`surname` LIKE '%$search%')
				";
		
		return $query;
	}
	
	function list_query_all () {
		$table = $this->table;
		$cat_table = '#prefix#mgmt_people_types';
		$cat_lang_table = '#prefix#mgmt_people_types_'.$_SESSION['language'];
		
		$query="SELECT
				$table.`id`,
				$table.`name`,
				$table.`surname`,
				$table.`company`,
				IF($cat_lang_table.`table_name`='' OR $cat_lang_table.`table_name` IS NULL,$cat_table.`name`,$cat_lang_table.`table_name`) as `category`,
				$table.`telephone`,
				$table.`mobile`,
				$table.`email`
				FROM `$table`
				LEFT JOIN `$cat_table` ON $cat_table.`id`=$table.`category`
				LEFT JOIN `$cat_lang_table` ON $cat_lang_table.`table_id`=$table.`category`
				WHERE $table.`deleted`='0'
				";
		
		return $query;
	}
	
	function check_values($input_data){

		$msg="";
/*
		if($input_data['name']=="") {
			$msg=ucfirst(phr('CHECK_NAME'));
		}
*/
		if(!empty($input_data['vat'])) {
			if($err=$this->checkItalianVATAccount ($input_data['vat']))
			$msg=ucfirst(phr('CHECK_VAT'));
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
	
	function checkItalianVATAccount ($value)
	{
		$value=trim($value);
		if( $value == '' )  return 0;
		if( strlen($value) == 11 )
		{
			if( ! ereg("^[0-9]+$", $value) ) return ERR_VAT_ACCOUNT_ITA_NOT_ALLOWED_CHARS;
			
			$s = 0;
			for( $i = 0; $i < 10; $i += 2 )
				$s += ord($value[$i]) - ord('0');
			for( $i = 1; $i <10; $i += 2 ){
				$c = 2*( ord($value[$i]) - ord('0') );
				if( $c > 9 )  $c = $c - 9;
				$s += $c;
			}
			if( ( 10 - $s%10 )%10 != ord($value[10]) - ord('0') ) return ERR_VAT_ACCOUNT_ITA_WRONG_CHECK_NUMBER;
			
			return 0;
		} elseif( strlen($value) == 16 ) {
			$value = strtoupper($value);
			if( ! ereg("^[A-Z0-9]+$", $value) )return ERR_VAT_ACCOUNT_ITA_NOT_ALLOWED_CHARS;
			
			$s = 0;
			for( $i = 1; $i <= 13; $i += 2 ){
				$c = $value[$i];
				if( '0' <= $c && $c <= '9' )
				$s += ord($c) - ord('0');
				else
				$s += ord($c) - ord('A');
			}
			for( $i = 0; $i <= 14; $i += 2 ){
				$c = $value[$i];
				switch( $c ){
				case '0':  $s += 1;  break;
				case '1':  $s += 0;  break;
				case '2':  $s += 5;  break;
				case '3':  $s += 7;  break;
				case '4':  $s += 9;  break;
				case '5':  $s += 13;  break;
				case '6':  $s += 15;  break;
				case '7':  $s += 17;  break;
				case '8':  $s += 19;  break;
				case '9':  $s += 21;  break;
				case 'A':  $s += 1;  break;
				case 'B':  $s += 0;  break;
				case 'C':  $s += 5;  break;
				case 'D':  $s += 7;  break;
				case 'E':  $s += 9;  break;
				case 'F':  $s += 13;  break;
				case 'G':  $s += 15;  break;
				case 'H':  $s += 17;  break;
				case 'I':  $s += 19;  break;
				case 'J':  $s += 21;  break;
				case 'K':  $s += 2;  break;
				case 'L':  $s += 4;  break;
				case 'M':  $s += 18;  break;
				case 'N':  $s += 20;  break;
				case 'O':  $s += 11;  break;
				case 'P':  $s += 3;  break;
				case 'Q':  $s += 6;  break;
				case 'R':  $s += 8;  break;
				case 'S':  $s += 12;  break;
				case 'T':  $s += 14;  break;
				case 'U':  $s += 16;  break;
				case 'V':  $s += 10;  break;
				case 'W':  $s += 22;  break;
				case 'X':  $s += 25;  break;
				case 'Y':  $s += 24;  break;
				case 'Z':  $s += 23;  break;
				}
			}
			if( chr($s%26 + ord('A')) != $value[15] ) return ERR_VAT_ACCOUNT_ITA_WRONG_CHECK_NUMBER;
			
			return 0;
		}
		
		return ERR_VAT_ACCOUNT_ITA_SIZE;
	}
	
	function post_insert ($input_data) {
		global $modManager;
		
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrContact_addedContact');
		$msg->setProperty('class',get_class($this));
		$msg->setProperty('id',$input_data['id']);
		$msg->setProperty('name',$input_data['name']);
		$msg->setProperty('surname',$input_data['surname']);
		$msg->setProperty('company',$input_data['company']);
		$msg->setProperty('vat',$input_data['vat']);
		$msg->setProperty('address',$input_data['address']);
		$msg->setProperty('telephone',$input_data['telephone']);
		$msg->setProperty('mobile',$input_data['mobile']);
		$msg->setProperty('fax',$input_data['fax']);
		$msg->setProperty('category',$input_data['category']);
		$msg->setProperty('note',$input_data['note']);
		$msg->setProperty('email',$input_data['email']);
		$msg->setProperty('www',$input_data['www']);
		$msg->setProperty('uid',$input_data['uid']);
		$msg->setType(MSG_TYPE_CONTACT);
		$modManager->distrMsg($msg);

		return $input_data;
	}
		
	function post_delete ($input_data) {
		global $modManager;
		
		$msg = new message;
		$msg->setPreviousMsgs($this->previousMsgs);
		$msg->setProperty('command','mhrContact_deletedContact');
		$msg->setProperty('class',get_class($this));
		$msg->setProperty('id',$input_data['id']);
		$msg->setProperty('name',$input_data['name']);
		$msg->setProperty('surname',$input_data['surname']);
		$msg->setProperty('company',$input_data['company']);
		$msg->setProperty('vat',$input_data['vat']);
		$msg->setProperty('address',$input_data['address']);
		$msg->setProperty('telephone',$input_data['telephone']);
		$msg->setProperty('mobile',$input_data['mobile']);
		$msg->setProperty('fax',$input_data['fax']);
		$msg->setProperty('category',$input_data['category']);
		$msg->setProperty('note',$input_data['note']);
		$msg->setProperty('email',$input_data['email']);
		$msg->setProperty('www',$input_data['www']);
		$msg->setProperty('uid',$input_data['uid']);
		$msg->setType(MSG_TYPE_CONTACT);
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
			$res=common_query($query,__FILE__,__LINE__);
			if(!$res) return mysql_errno();
			
			$arr=mysql_fetch_array($res);
		} else {
			$editing=0;
			$arr['id']=next_free_id($_SESSION['common_db'],$this->table);
			$arr['visible']=1;
		}
		
		
		$row = 0;
		$col = 0;
		/*************************************************
		Head
		*************************************************/
		$desc = ucphr('CONTACT');
		$display->properties[$row][$col]='colspan=2';
		$display->rows[$row][$col]=$desc;
		$col++;
		$row++;
		$col=0;
		
		/*************************************************
		Names
		*************************************************/
		if($editing && $arr['uid'] && class_exists('user')) {
			$obj = new user($arr['uid']);
			if($obj->exists($arr['uid'])) {
				$link = $obj->file.'?class=user&amp;command=edit&amp;data[id]='.$arr['uid'];
				$this->editRowLink($display,$row,ucphr('USER'),$link,$arr['uid']);
			}
		}
		$this->editRowText($display,$row,ucphr('SURNAME'),'surname',htmlentities($arr['surname']));
		$this->editRowText($display,$row,ucphr('NAME'),'name',htmlentities($arr['name']));
		$this->editRowText($display,$row,ucphr('COMPANY'),'company',htmlentities($arr['company']));
		$this->editRowText($display,$row,ucphr('VAT_ACCOUNT'),'vat',htmlentities($arr['vat']));
		$this->editRowText($display,$row,ucphr('ADDRESS'),'address',htmlentities($arr['address']));
		$this->editRowText($display,$row,ucphr('PHONE'),'telephone',htmlentities($arr['telephone']));
		$this->editRowText($display,$row,ucphr('MOBILE'),'mobile',htmlentities($arr['mobile']));
		$this->editRowText($display,$row,ucphr('FAX'),'fax',htmlentities($arr['fax']));
		$this->editRowText($display,$row,ucphr('NOTE'),'note',htmlentities($arr['note']));
		$this->editRowText($display,$row,ucphr('EMAIL'),'email',htmlentities($arr['email']));
		$this->editRowText($display,$row,ucphr('WWW'),'www',htmlentities($arr['www']));
		
		/*************************************************
		Category
		*************************************************/
		$select = '
		<select name="data[category]">';
		
		$table = "#prefix#mgmt_people_types";
		$lang_table = "#prefix#mgmt_people_types_".$_SESSION['language'];
		
		$query_local="SELECT
				$table.`id`,
				IF($lang_table.`table_name`='' OR $lang_table.`table_name` IS NULL,$table.`name`,$lang_table.`table_name`) as `name`
				FROM `$table`
				LEFT JOIN `$lang_table` ON $lang_table.`table_id`=$table.`id`
				WHERE $table.`deleted`='0'
				";
		//$query_local="SELECT * FROM `#prefix#mgmt_people_types` WHERE `deleted`='0' ORDER BY `name`";
		$res_local=common_query($query_local,__FILE__,__LINE__);
		if(!$res_local) return ERR_MYSQL;
		while($arr_local=mysql_fetch_array($res_local)){
			if($arr['category']==$arr_local['id']) $selected=" selected";
			else $selected="";
			$select .= '
				<option value="'.$arr_local['id'].'"'.$selected.'>';
			//$categ = new category ($arr_local['id']);
			//$descr=$categ->name($_SESSION['language']);
			$descr=$arr_local['name'];
			unset($categ);
			
			$select .= ucfirst($descr).'</option>';
		}
		$select .= '
		</select>';
		$display->widths[$row][$col]='100%';
		$display->rows[$row][$col]=ucphr('CATEGORY');
		$col++;
		$display->rows[$row][$col]=$select;
		$col++;
		$row++;
		$col=0;
		
		
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
				</td>
				<td align="left">
				<form action="'.$this->file.'?" name="delete_form_'.get_class($this).'" method="post">
				<input type="hidden" name="class" value="'.get_class($this).'">
				<input type="hidden" name="command" value="delete">
				<input type="hidden" name="delete[]" value="'.$this->id.'">
				<input type="submit" value="'.ucphr('DELETE').'">
				</form>
				</td>';
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