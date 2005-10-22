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

$modules[]='contact_category';

class contact_category extends module {
	function contact_category ($id=0) {
		$this -> setName ('contact_category');
		//$this -> addMsgType (MSG_TYPE_CONTACT);
		$this -> addMenuLink(ucphr('CONTACT_CATEGORIES'),'/admin/admin.php?class=contact_category&command=none',ucphr('CONTACT_CATEGORIES').': '.ucphr('CONTACT_CATEGORIES'));
		
		$this -> setUserLevel (USER_BIT_CONTACTS);
		
		$this -> db = 'common';
		$this->table=$GLOBALS['table_prefix'].'mgmt_people_types';
		$this->id=$id;
		$this -> title = ucphr('CONTACT_CATEGORIES');
		$this->file=ROOTDIR.'/admin/admin.php';
		$this -> fields_names = array(	'id'=>ucphr('ID'),
						'name'=>ucphr('NAME'));
		$this->fields_width=array(	'name'=>'95%');
		$this->templates['edit']='common_edit';
		$this->flag_delete = true;
		
		if($id) $this -> fetch_data();
	}

	function msgDistribute ($msg) {
		global $tpl;
		//$tpl->append('messages','<br><br>handler:**'.$msg->getProperty('character').'**<br><br>');
		
	}
	
	function list_search ($search) {
		$query = '';
		
		$table = $this->table;
		$lang_table = $table."_".$_SESSION['language'];
		
		$query="SELECT
				$table.`id`,
				IF($lang_table.`table_name`='' OR $lang_table.`table_name` IS NULL,$table.`name`,$lang_table.`table_name`) as `name`,
				RPAD('".ucphr('CONTACT_CATEGORIES')."',30,' ') as `table`,
				RPAD('".get_class($this)."',30,' ') as `table_id`
				FROM `$table`
				JOIN `$lang_table`
				WHERE $table.`deleted`='0'
				AND $lang_table.`table_id`=$table.`id`
				AND ($lang_table.`table_name` LIKE '%$search%' OR $table.`name` LIKE '%$search%')
				";
		
		return $query;
	}
	
	function list_query_all () {
		$table = $this->table;
		
		$table = "#prefix#mgmt_people_types";
		$lang_table = "#prefix#mgmt_people_types_".$_SESSION['language'];
		
		$query="SELECT
				$table.`id`,
				IF($lang_table.`table_name`='' OR $lang_table.`table_name` IS NULL,$table.`name`,$lang_table.`table_name`) as `name`
				FROM `$table`
				LEFT JOIN `$lang_table` ON $lang_table.`table_id`=$table.`id`
				WHERE $table.`deleted`='0'
				";
		
		return $query;
	}
	
	function check_values($input_data){

		$msg="";
		$name_found=false;
		for (reset ($input_data); list ($key, $value) = each ($input_data); ) {
			if(stristr($key,'mgmt_people_types_') && trim($value)!='') {
				$name_found=$key;
			}
		}
		if($input_data['name']=="" && !$name_found) {
			$msg=ucfirst(phr('CHECK_NAME'));
		} elseif ($input_data['name']=="") {
			$input_data['name']=$input_data[$name_found];
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

	function pre_insert ($input_data) {
		if(!is_array($input_data)) return $input_data;
		for (reset ($input_data); list ($key, $value) = each ($input_data); ) {
			if(stristr($key,'mgmt_people_types_')) {
				$this->temp_lang[$key]=$value;
				unset ($input_data[$key]);
			}
		}

		return $input_data;
	}

	function post_insert ($input_data) {
		if(is_array($this->temp_lang)) {
			for (reset ($this->temp_lang); list ($key, $value) = each ($this->temp_lang); ) {
				$input_data[$key]=$this->temp_lang[$key];
			}
		}

		$input_data['id']=$this->id;
		
		if($err = $this -> translations_set ($input_data)) return $err;
		
		return $input_data;
	}
	
	function pre_update($input_data) {
		if(!$this->id) return 1;
		if(!$this->exists()) return 2;

		if($err=$this->translations_set($input_data)) return $err;

		for (reset ($input_data); list ($key, $value) = each ($input_data); ) {
			if(stristr($key,'mgmt_people_types_')) {
				unset ($input_data[$key]);
			}
		}
		
		return $input_data;
	}
	
	function pre_delete($input_data) {
		if(!$this->id) return 1;
		if(!$this->exists()) return 2;

		if($lang_del=$this->translations_delete($this->id)) return $lang_del;

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
		$desc = ucphr('CONTACT_CATEGORY');
		if($editing) $desc.=' - '.$this->name($_SESSION['language']);
		$display->properties[$row][$col]='colspan=2';
		$display->rows[$row][$col]=$desc;
		$col++;
		$row++;
		$col=0;
		
		/*************************************************
		Names
		*************************************************/
		$display->rows[$row][$col]=ucphr('NAME');
		$col++;
		$display->rows[$row][$col]='<input type="text" name="data[name]" value="'.htmlentities($arr['name']).'">';
		$col++;
		$row++;
		$col=0;
		
		$res_lang=mysql_list_tables($_SESSION['common_db']);
		while($arr_lang=mysql_fetch_array($res_lang)) {
			if($lang_now=stristr($arr_lang[0],$GLOBALS['table_prefix'].'mgmt_people_types_')) {
				$lang_now= substr($lang_now,-2);
	
				if($editing) {
					$obj = new CONTACT_CATEGORY  ($arr['id']);
					$lang_name = $obj -> name ($lang_now);
				}
	
				$display->rows[$row][$col]=ucphr('NAME').' ('.$lang_now.')';
				$col++;
				$display->rows[$row][$col]='<input type="text" name="data[mgmt_people_types_'.$lang_now.']" value="'.$lang_name.'">';
				$col++;
				$row++;
				$col=0;
			}
		}
		
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