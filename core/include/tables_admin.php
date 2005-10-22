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

class table extends object {
	function table($id=0) {
		$this -> db = 'common';
		$this->table=$GLOBALS['table_prefix'].'sources';
		$this->id=$id;
		$this -> title = ucphr('TABLES');
		$this->file=ROOTDIR.'/admin/admin.php';
		$this->fields_show=array('id','ordernum','name','takeaway','visible');
		$this->fields_names=array(	'id'=>ucphr('ID'),
								'ordernum'=>ucphr('ORDER'),
								'name'=>ucphr('NAME'),
								'takeaway'=>ucphr('TAKEAWAY'),
								'visible'=>ucphr('VISIBLE'));
		$this->fields_width=array(	'name'=>'100%');
		$this->allow_single_update = array ('takeaway','visible');
		$this->fields_boolean=array('takeaway','visible');
		$this -> fetch_data();
	}
	
	function list_search ($search) {
		$query = '';
		
		$table = $this->table;
		$lang_table = $table."_".$_SESSION['language'];
		
		$query="SELECT
				$table.`id`,
				$table.`name`,
				RPAD('".ucphr('TABLES')."',30,' ') as `table`,
				RPAD('".get_class($this)."',30,' ') as `table_id`
				FROM `$table`
				WHERE $table.`name` LIKE '%$search%'
				";
		
		return $query;
	}
	
	function list_query_all () {
		$table = "#prefix#sources";
		
		$query="SELECT
				$table.`id`,
				$table.`ordernum`,
				$table.`name`,
				IF($table.`takeaway`='0','".ucphr('NO')."','".ucphr('YES')."') as `takeaway`,
				IF($table.`visible`='0','".ucphr('NO')."','".ucphr('YES')."') as `visible`
				 FROM `$table`
				";
		
		return $query;
	}
	
	function is_empty (){
		$query = "SELECT * FROM `#prefix#orders` WHERE `sourceid`='".$this->id."'";
		$res=common_query($query,__FILE__,__LINE__);
		if(!$res) return true;
		
		return !mysql_num_rows($res);
	}
	
	function total ($discount=0) {
		$total=0;
		$query ="SELECT * FROM `#prefix#orders` WHERE `sourceid`='".$this->id."'";
		$res=common_query($query,__FILE__,__LINE__);
		if(!$res) return 0;
		while ($arr = mysql_fetch_array ($res)) {
			$total=$total+$arr['price'];
		}
		
		if($discount) {
			$this->get("discount");
			$total=$total+$discount;
		}

		$total=sprintf("%01.2f",$total);
		return $total;
	}

	function togglePriceEdit()
	{
		$user = new user($_SESSION['userid']);
		if($user->level[USER_BIT_CASHIER])
			$_SESSION['priceEditAllowed'][$this->id] = !$_SESSION['priceEditAllowed'][$this->id];
		else return ERR_NOT_ALLOWED;
		
		return 0;
	}
	
	function list_orders($output='orders_list',$orderid=0,$mods=false) {
		if($this->is_empty()) return 1;
		
		global $tpl;
		
		$tmp = '
		<table bgcolor="'.COLOR_TABLE_GENERAL.'">';
		$tpl -> append ($output,$tmp);
		
		if(!$orderid) {
			$tmp = '
		<thead>
		<tr>
		<th scope=col><font size="-1">'.ucfirst(phr('NUMBER_ABBR')).'</font></th>
		<th scope=col> </th>
		<th scope=col><font size="-1">'.ucfirst(phr('NAME')).'</font></th>
		<th scope=col></th>
		<th scope=col><font size="-1">'.ucfirst(phr('PRIORITY_ABBR')).'</font></th>
		<th scope=col><font size="-1">'.ucfirst(phr('PRICE')).'</font></th>
		<th scope=col> </th>
		<th scope=col> </th>
		<th scope=col> </th>
		</tr>
		</thead>
';
			$tpl -> append ($output,$tmp);
		} else {
			$tmp = '
		<thead>
		<tr height="10px">
		<th colspan="9"><font size="-2">'.ucfirst(phr('LAST_OPERATION')).'</font></th>
		</tr>
		</thead>
';
			$tpl -> append ($output,$tmp);
		}
		
		$tmp = '
		<tbody>';
		$tpl -> append ($output,$tmp);
		
		$query="SELECT ord.*,
		IF(dishlang.`table_name`='' OR dishlang.`table_name` IS NULL,dish.`name`,dishlang.`table_name`) as `dishname`,
		dish.generic as generic
		FROM `#prefix#orders` as ord
		LEFT JOIN #prefix#dishes as dish ON dish.id=ord.dishid
		LEFT JOIN #prefix#dishes_".$_SESSION['language']." as dishlang ON dishlang.table_id=dish.id
		WHERE `sourceid`='".$this->id."'
		";
		
		if($orderid && $mods) $query .= " AND ord.`associated_id`='".$orderid."'";
		elseif($orderid && !$mods) $query .= " AND ord.`id`='".$orderid."'";
		if(!get_conf(__FILE__,__LINE__,"orders_show_deleted")) $query .= " AND ord.`deleted`='0'";
		
		$query .="
		ORDER BY ord.priority ASC,
		ord.associated_id ASC,
		ord.dishid DESC,
		ord.id ASC";
		$res=common_query($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
		
		$toclose = $this -> get ('toclose');
		
		$user = new user($_SESSION['userid']);
		if($user->level[USER_BIT_CASHIER]) $cashier=true;
		else $cashier=false;
		
		$ord = new order;
		while ($arr = mysql_fetch_array ($res)) {
			$tmp = $ord -> table_row ($arr,$toclose,$cashier);
			$tpl -> append ($output,$tmp);
		}
		unset ($ord);
		
		$class = COLOR_TABLE_TOTAL;
		
		// prints a line with the grand total
		$tmp = '
		<tr>
		<td bgcolor="'.$class.'">&nbsp;</td>
		<td bgcolor="'.$class.'">&nbsp;</td>
		<td bgcolor="'.$class.'">'.ucfirst(phr('TOTAL')).'</td>
		<td bgcolor="'.$class.'">&nbsp;</td>
		<td bgcolor="'.$class.'">&nbsp;</td>
		<td bgcolor="'.$class.'">'.$this->total().'</td>
		<td bgcolor="'.$class.'">&nbsp;</td>
		<td bgcolor="'.$class.'">&nbsp;</td>
		<td bgcolor="'.$class.'">&nbsp;</td>
		</tr>
		</tbody>
		</table>
		';
		if(!$orderid) $tpl -> append ($output,$tmp);

		// prints a line with the grand total
		$tmp = '
		</tbody>
		</table>
		';
		if($orderid) $tpl -> append ($output,$tmp);
		
		return 0;
	}
	
	function join_list_tables ($cols=1){
		global $tpl;
		
		$query = "SELECT DISTINCT #prefix#sources.* FROM `#prefix#sources`";
		$query .= " JOIN `#prefix#orders`";
		$query .= " WHERE #prefix#sources.visible = '1'";
		$query .= " AND #prefix#sources.toclose = '0'";
		$query .= " AND #prefix#sources.paid = '0'";
		$query .= " AND #prefix#sources.takeaway = '0'";
		$query .= " AND #prefix#orders.sourceid = #prefix#sources.id";
		$query .= " AND #prefix#sources.id!='".$this->id."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
		
		if(!$numRows=mysql_num_rows($res)) return 1;
	
		$output .= ucfirst(phr('ALL_TABLES')).':';
	
		$output .= '
<table cellspacing="2" bgcolor="'.COLOR_TABLE_GENERAL.'" width="100%">
	<tbody>'."\n";
	
		while ($arr = mysql_fetch_array ($res)) {
			$output .= '
	<tr>'."\n";
			for ($i=0;$i<$cols;$i++){
	
				if(!$tmp = $this->join_list_cell ($arr)) {
					$i--;
				} else $output .= $tmp;
				
				if($i != ($cols - 1)) {
					$arr = mysql_fetch_array ($res);
				}
			}
		$output .= '
	</tr>';
		}

		$output .= '
	</tbody>
</table>
';
	$tpl -> assign ('tables',$output);

	return 0;	
	}

	function join_list_cell ($arr){
		$query = "SELECT * FROM `#prefix#orders` WHERE `sourceid`='".$arr['id']."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return '';
		
		$link = 'orders.php?command=join&amp;data[sourceID]='.$_SESSION['sourceid'].'&amp;data[destID]='.$arr['id'];
		if($arr['name'])
		{
			$output .= '
		<td bgcolor="'. COLOR_TABLE_FREE.'" onclick="redir(\''.$link.'\');">
			<a href="'.$link.'">'.$arr['name'].'</a>
		</td>';
		} else
		{
			$output .= '
		<td bgcolor="'. COLOR_TABLE_FREE.'">
			&nbsp;
		</td>';
		}
		return $output;
	}
	
	function join ($destination){
		
		// get old table info
		$query="SELECT userid,discount,paid,customer FROM `#prefix#sources` WHERE `id`='".$this->id."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
		
		$arr_old = mysql_fetch_array($res,MYSQL_ASSOC);
		
		// get new table info
		$query="SELECT userid,discount,paid,customer FROM `#prefix#sources` WHERE `id`='".$destination."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
		
		$arr_new=mysql_fetch_array($res,MYSQL_ASSOC);
		
		// sets new table data
		$arr_new['userid']=$arr_old['userid'];
		$arr_new['discount']=$arr_old['discount']+$arr_new['discount'];
		$arr_new['paid']=$arr_old['paid']+$arr_new['paid'];
		$arr_new['customer']=$arr_old['customer'];
		
		// the common least printed categories are saved
		for($i=1;$i<4;$i++)
		{
			if(categories_printed ($this->id,$i) && categories_printed ($destination,$i)) $printedCats[$i]=true;
			else $printedCats[$i]=false;
		}
		$arr_new['catprinted']=implode(" ",$printedCats);
		
		// get info about service fee in current table
		$query="SELECT id,quantity,price FROM `#prefix#orders` WHERE `dishid` = '".SERVICE_ID."' AND `sourceid`='".$this->id."'";
		$res=common_query($query,__FILE__,__LINE__);
		if(!$res) return ERR_MYSQL;
		if($arr = mysql_fetch_array($res,MYSQL_ASSOC))
		{
			$serviceFeeQuantity = $arr['quantity'];
			$serviceFeePrice = $arr['price'];
			$oldServiceFeeID = $arr['id'];
		} else {
			$serviceFeeQuantity = 0;
			$serviceFeePrice = 0;
			$oldServiceFeeID = 0;
		}
		
		// get info about service fee in new table
		$query="SELECT id,quantity,price FROM `#prefix#orders` WHERE `dishid` = '".SERVICE_ID."' AND `sourceid`='".$destination."'";
		$res=common_query($query,__FILE__,__LINE__);
		if(!$res) return ERR_MYSQL;
		$arr = mysql_fetch_array($res,MYSQL_ASSOC);
		if (mysql_num_rows($res)) {
			$serviceFeeID=$arr['id'];
			$serviceFeeQuantity = $serviceFeeQuantity + $arr['quantity'];
			$serviceFeePrice = $serviceFeePrice + $arr['price'];
			$query="UPDATE `#prefix#orders` SET quantity = '".$serviceFeeQuantity."',price = '".$serviceFeePrice."' WHERE `id`='$serviceFeeID'";
			$res=common_query ($query,__FILE__,__LINE__);
			if(!$res) return ERR_MYSQL;
			
		} elseif($serviceFeeQuantity)
		{
			$data['quantity']=$serviceFeeQuantity;
			$data['price']=$serviceFeePrice;
			
			// sets session table to new table for order creation, then reverts to old
			// final session set will be done in orders.php
			$_SESSION['sourceid'] = $destination;
			$id = orders_create (SERVICE_ID,$data);
			$_SESSION['sourceid'] = $this->id;
		}
		
		if($oldServiceFeeID)
		{
			$query="DELETE FROM `#prefix#orders` WHERE `id`='$oldServiceFeeID'";
			$res=common_query ($query,__FILE__,__LINE__);
			if(!$res) return ERR_MYSQL;
		}
		
		
		// moves all the orders (apart from SERVICE_IDs)
		$query="UPDATE `#prefix#orders` SET `sourceid` = '".$destination."' WHERE `sourceid`='".$this->id."' AND dishid!='".SERVICE_ID."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
	
		// copies table properties
		$query="UPDATE `#prefix#sources` SET ";
		foreach ($arr_new as $key => $value ) {
			$query.="`".$key."`='".$value."',";
		}
		// strips the last comma that has been put
		$query = substr ($query, 0, strlen($query)-1);
		$query.=" WHERE `id`='".$destination."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
		
		// empties the old table
		$query = "UPDATE `#prefix#sources` SET `userid`='0',`toclose`='0',`discount` = '0.00',`paid` = '0',`catprinted` = '',`last_access_userid` = '0',`customer` = '0' WHERE `id` = '".$this->id."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
	
		return 0;
	}
	
	function move_list_tables ($cols=1){
		global $tpl;
		
		$query = "SELECT * FROM `#prefix#sources` WHERE `userid`='0'";
		$query .= " AND `toclose` = '0'";
		$query .= " AND `discount` = '0.00'";
		$query .= " AND `paid` = '0'";
		$query .= " AND `catprinted` = ''";
		$query .= " AND `takeaway` = '0'";
		$query .= " AND `visible` = '1'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
		
		if(!mysql_num_rows($res)) return 1;
	
		$output .= ucfirst(phr('ALL_TABLES')).':';
	
		$output .= '
<table cellspacing="2" bgcolor="'.COLOR_TABLE_GENERAL.'" width="100%">
	<tbody>'."\n";
	
		while ($arr = mysql_fetch_array ($res)) {
			$output .= '
	<tr>'."\n";
			for ($i=0;$i<$cols;$i++){
	
				if(!$tmp = $this->move_list_cell ($arr)) {
					$i--;
				} else $output .= $tmp;
				
				if($i != ($cols - 1)) {
					$arr = mysql_fetch_array ($res);
				}
			}
		$output .= '
	</tr>';
		}

		$output .= '
	</tbody>
</table>
';
	$tpl -> assign ('tables',$output);

	return 0;	
	}

	function move_list_cell ($arr){
		$query = "SELECT * FROM `#prefix#orders` WHERE `sourceid`='".$arr['id']."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return '';
		
		if(table_there_are_orders($arr['id'])) return '';
		
		$link = 'orders.php?command=move&amp;data[id]='.$arr['id'];
		if($arr['name'])
		{
			$output .= '
		<td bgcolor="'. COLOR_TABLE_FREE.'" onclick="redir(\''.$link.'\');">
			<a href="'.$link.'">'.$arr['name'].'</a>
		</td>';
		} else
		{
			$output .= '
		<td bgcolor="'. COLOR_TABLE_FREE.'">
			&nbsp;
		</td>';
		}

	
		return $output;
	}
		
	function move($destination){
		
		// copies old table info
		$query="SELECT * FROM `#prefix#sources` WHERE `id`='".$this->id."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
		
		$arr_old = mysql_fetch_array($res,MYSQL_ASSOC);
		
		//delete the info we don't want to copy
		unset ($arr_old['id']);
		unset ($arr_old['name']);
		unset ($arr_old['takeaway']);
		unset ($arr_old['ordernum']);
		
		$query="SELECT * FROM `#prefix#sources` WHERE `id`='".$destination."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
		
		$arr_new=mysql_fetch_array($res,MYSQL_ASSOC);
	
		// last check before begin: is the table really empty?
		if($arr_new['userid']!=0
			|| $arr_new['toclose']!=0
			|| $arr_new['discount']!=0
			|| $arr_new['paid']!=0
			|| $arr_new['catprinted']!=''){
			return 1;
		}
	
		// moves all the orders
		$query="UPDATE `#prefix#orders` SET `sourceid` = '".$destination."' WHERE `sourceid`='".$this->id."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
	
		// copies table properties
		$query="UPDATE `#prefix#sources` SET ";
		foreach ($arr_old as $key => $value ) {
			$query.="`".$key."`='".$value."',";
		}
		// strips the last comma that has been put
		$query = substr ($query, 0, strlen($query)-1);
		$query.=" WHERE `id`='".$destination."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
		
		// empties the old table
		$query = "UPDATE `#prefix#sources` SET `userid`='0',`toclose`='0',`discount` = '0.00',`paid` = '0',`catprinted` = '',`last_access_userid` = '0',`customer` = '0' WHERE `id` = '".$this->id."'";
		$res=common_query ($query,__FILE__,__LINE__);
		if(!$res) return mysql_errno();
	
		return 0;
	}

	function check_values($input_data){
		$msg="";
		
		if($input_data['order']==='') {
			$msg=ucphr('CHECK_ORDER');
		}
		
		if($input_data['name']=="") {
			$msg=ucphr('CHECK_NUMBER');
		}
		
		if($msg){
			echo "<script language=\"javascript\">
				window.alert(\"".$msg."\");
				window.history.go(-1);
			</script>\n";
			return -2;
		}

		if(!$input_data['visible'])
			$input_data['visible']=0;
		if(!$input_data['takeaway'])
			$input_data['takeaway']=0;
		
		return $input_data;
	}
	
	function form(){
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
	$output .= '
	<div align="center">
	<a href="?class='.get_class($this).'">'.ucphr('BACK_TO_LIST').'.</a>
	<table>
	<tr>
	<td>
	<fieldset>
	<legend>'.ucphr('TABLE').'</legend>

	<form action="?" name="edit_form_'.get_class($this).'" method="post">
	<input type="hidden" name="class" value="'.get_class($this).'">
	<input type="hidden" name="data[id]" value="'.$arr['id'].'">';
	if($editing){
		$output .= '
	<input type="hidden" name="command" value="update">';
	} else {
		$output .= '
	<input type="hidden" name="command" value="insert">';
	}
	$output .= '
	<table>
		<tr>
			<td>
			'.ucphr('ID').':
			</td>
			<td>
			'.$arr['id'].'
			</td>
		</tr>
		<tr>
			<td>
			'.ucphr('TABLE_NUMBER').':
			</td>
			<td>
			<input type="text" name="data[name]" value="'.htmlentities($arr['name']).'">
			</td>
		</tr>
		<tr>
			<td>
			'.ucphr('TABLE_ORDER').':
			</td>
			<td>
			<input type="text" name="data[ordernum]" value="'.$arr['ordernum'].'">
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="checkbox" name="data[visible]" value="1"';
			if($arr['visible']) $output .= ' checked';
			$output .= '>'.ucphr('VISIBLE_TO_WAITERS').'
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="checkbox" name="data[takeaway]" value="1"';
			if($arr['takeaway']) $output .= ' checked';
			$output .= '>'.ucphr('TAKEAWAY').'
			</td>
		</tr>
		<tr>
			<td colspan=2 align="center">
			<table>
			<tr>
				<td>';
	if(!$editing){
		$output .= '
				<input type="submit" value="'.ucphr('INSERT').'">
	</form>
				</td>';
	} else {
		$output .= '
				<td>
				<input type="submit" value="'.ucphr('UPDATE').'">
	</form>
				</td>
				<td>
				<form action="?" name="delete_form_'.get_class($this).'" method="post">
				<input type="hidden" name="class" value="'.get_class($this).'">
				<input type="hidden" name="command" value="delete">
				<input type="hidden" name="delete[]" value="'.$this->id.'">
				<input type="submit" value="'.ucphr('DELETE').'">
				</form>
				</td>';
	}
	$output .= '
			</tr>
			</table>
			</td>
		</tr>
	</table>


	</fieldset>
	</td>
	</tr>
	</table>
	</div>';

	return $output;
	}
}

?>