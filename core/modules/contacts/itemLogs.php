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

$modules[]='itemslog';

class itemslog extends module {
	function itemslog($id=0) {
		$this -> setName ('itemslog');
		$this -> addMsgType (MSG_TYPE_ACCOUNTING);
		$this -> addMenuLink(ucphr('ITEMS_LOG'),'/admin/admin.php?class=itemslog&command=none',ucphr('ITEMS').': '.ucphr('ITEMS'));
		
		$this -> setUserLevel (USER_BIT_ACCOUNTING);
		
		if(empty($_SESSION['mgmt_db'])) $this -> db = commonFindFirstAccountingDB ('');
		else $this -> db = $_SESSION['mgmt_db'];
		
		$this->table=$GLOBALS['table_prefix'].'account_log';
		$this->id=$id;
		$this -> title = ucphr('ITEMS');
		$this->file=ROOTDIR.'/admin/admin.php';
/*
		$this -> fields_names = array(	'id'=>ucphr('ID'),
						'timestamp'=>ucphr('TIME'),
						'from'=>ucphr('FROM'),
						'to'=>ucphr('TO'),
						'amount'=>ucphr('AMOUNT'));
		$this->fields_width=array(	'name'=>'90%');
*/		
		$this->templates['edit']='common_edit';
		$this->flag_delete = false;
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
			case 'mhrReceipt_addedReceipt':
// 				$modManager->addProcessed(get_class($this),$msg->getID());
				//if($res = $this -> addReceipt ($msg)) return $res;
				break;
		}
	}
	
	function customCommand ($input_data)
	{
		$query = $this->list_query_base ();
		if($input_data['subcommand']=='ingredients') $query .= "WHERE `$dbAccounting`.$table.ingredient != ''";
		if($input_data['subcommand']=='dishes') $query .= "WHERE `$dbAccounting`.$table.dish != '' AND `$dbAccounting`.$table.dish != '-2'";
		return $query;
	}
	
	function list_query_all () {
		$query = $this->list_query_base ();
		return $query;
	}
	
	function list_query_base () {
		$dbCommon=$_SESSION['common_db'];
		$dbAccounting=$this->db;
	
		$table = $this->table;
		$cat_table = "#prefix#categories";
		$cat_lang_table = "#prefix#categories_".$_SESSION['language'];
		$dish_table = "#prefix#dishes";
		$dish_lang_table = "#prefix#dishes_".$_SESSION['language'];
		$ingredient_table = "#prefix#ingreds";
		$ingredient_lang_table = "#prefix#ingreds_".$_SESSION['language'];
		$printer_table = "#prefix#dests";
		$user_table = "#prefix#users";
		$dest_table = "#prefix#dests";
		$table_table = "#prefix#sources";
		
		$query="SELECT
			`$dbAccounting`.$table.`id`,
			`$dbAccounting`.$table.datetime,
			IF(`$dbAccounting`.$table.dish='','Modifica',IF(`$dbAccounting`.$table.dish='-3','".ucphr('DISCOUNT')."',IF(`$dbAccounting`.$table.dish='-2','".ucphr('INGREDIENT')."',IF(`$dbAccounting`.$table.dish='-1','".ucphr('SERVICE_FEE')."',IF(`$dbCommon`.$dish_lang_table.`table_name`='' OR `$dbCommon`.$dish_lang_table.`table_name` IS NULL,`$dbCommon`.$dish_table.`name`,`$dbCommon`.$dish_lang_table.`table_name`))))) as `name`,
			IF(`$dbCommon`.$ingredient_lang_table.`table_name`='' OR `$dbCommon`.$ingredient_lang_table.`table_name` IS NULL,`$dbCommon`.$ingredient_table.`name`,`$dbCommon`.$ingredient_lang_table.`table_name`) as ingredient,
			`$dbCommon`.$printer_table.`name` as `destination`,
			`$dbAccounting`.$table.`price`,
			`$dbAccounting`.$table.`quantity`,
			`$dbCommon`.$user_table.name as `user`,
			`$dbCommon`.$table_table.name as `table`
			FROM `$dbAccounting`.$table
			LEFT JOIN `$dbCommon`.$dish_table ON `$dbCommon`.$dish_table.id=`$dbAccounting`.$table.dish
			LEFT JOIN `$dbCommon`.$dish_lang_table ON `$dbCommon`.$dish_lang_table.`table_id`=`$dbAccounting`.$table.dish
			LEFT JOIN `$dbCommon`.$ingredient_table ON `$dbCommon`.$ingredient_table.id=`$dbAccounting`.$table.ingredient
			LEFT JOIN `$dbCommon`.$ingredient_lang_table ON `$dbCommon`.$ingredient_lang_table.table_id=`$dbAccounting`.$table.ingredient
			LEFT JOIN `$dbCommon`.$printer_table ON `$dbCommon`.$printer_table.`id`=`$dbAccounting`.$table.destination
			LEFT JOIN `$dbCommon`.$user_table ON `$dbCommon`.$user_table.`id`=`$dbAccounting`.$table.`waiter`
			LEFT JOIN `$dbCommon`.$table_table ON `$dbCommon`.$table_table.`id`=`$dbAccounting`.$table.`table`
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
}


?>