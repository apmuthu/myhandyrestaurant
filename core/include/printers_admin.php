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

class printer extends object {
	var $tmp;
	
	function printer($id=0) {
		$this -> db = 'common';
		$this->table=$GLOBALS['table_prefix'].'dests';
		$this->id=$id;
		$this->fields_names=array(	'id'=>ucphr('ID'),
								'name'=>ucphr('NAME'),
								'dest'=>ucphr('QUEUE'),
								'driver'=>ucphr('DRIVER'),
								'bill'=>ucphr('BILL'),
								'invoice'=>ucphr('INVOICE'),
								'receipt'=>ucphr('RECEIPT'),
								'language'=>ucphr('LANGUAGE'),
								'template'=>ucphr('TEMPLATE'));
		$this -> title = ucphr('PRINTERS');
		$this->file=ROOTDIR.'/admin/admin.php';
		$this->allow_single_update = array ('bill','invoice','receipt');
		$this->flag_delete = true;
		$this->fields_boolean=array('bill','invoice','receipt');
		$this->fields_width=array('name'=>'100%');
		$this -> fetch_data();
	}

	function list_search ($search) {
		$query = '';
		
		$table = $this->table;
		
		$query="SELECT
				$table.`id`,
				$table.`name`,
				RPAD('".ucphr('PRINTERS')."',30,' ') as `table`,
				RPAD('".get_class($this)."',30,' ') as `table_id`
				FROM `$table`
				WHERE $table.`name` LIKE '%$search%'
				";
		
		return $query;
	}
	
	function list_query_all () {
		$table = $this->table;
		//$tblPaymentdocPrinters = '#prefix#paymentdocs_printers';
		
		$query="SELECT
				$table.`id`,
				$table.`name`,
				$table.`dest`,
				$table.`driver`,
				$table.`language`,
				$table.`template`
				FROM `$table`
				WHERE $table.`deleted`='0'
				";
		
		return $query;
	}
	
	function post_insert ($input_data) {
		global $modManager;
		
		foreach($this->tmp as $name=>$value)
		{
			if($name=='paymentdoc')
			foreach($value as $paymentdoc)
			{
				$msg = new message;
				$msg->setPreviousMsgs($this->previousMsgs);
				$msg->setProperty('command','mhrPaymentdocsprinter_addPaymentdocsprinter');
				$msg->setProperty('class',$paymentdoc);
				$msg->setProperty('printer',$this->id);
				$msg->setType(MSG_TYPE_CONFIG);
				$modManager->distrMsg($msg);
				
				$obj = new paymentdocs_printer;
				$res=$obj->insertIfNotExists($paymentdoc,$this->id);
			}
		}
		return $input_data;
	}
	
	function post_update ($input_data) {
		global $modManager;
		
		if(!is_array($this->tmp) || !is_array($this->tmp['paymentdoc']))
		{
			$msg = new message;
			$msg->setPreviousMsgs($this->previousMsgs);
			$msg->setProperty('command','mhrPaymentdocsprinter_deleteAllPaymentdocsprinter');
			$msg->setProperty('printer',$this->id);
			$msg->setType(MSG_TYPE_CONFIG);
			$modManager->distrMsg($msg);
			return $input_data;
		}
		
		if($modManager->moduleExists('paymentdoc'))
		{
			
			$paymentdocs= new paymentdoc;
			$docs=$paymentdocs->getPaymentdocs();
			
			foreach($docs as $paymentdoc)
			{
				if(in_array($paymentdoc,$this->tmp['paymentdoc']))
				{
					$msg = new message;
					$msg->setPreviousMsgs($this->previousMsgs);
					$msg->setProperty('command','mhrPaymentdocsprinter_addPaymentdocsprinter');
					$msg->setProperty('class',$paymentdoc);
					$msg->setProperty('printer',$this->id);
					$msg->setType(MSG_TYPE_CONFIG);
					$modManager->distrMsg($msg);
				} else
				{
					$msg = new message;
					$msg->setPreviousMsgs($this->previousMsgs);
					$msg->setProperty('command','mhrPaymentdocsprinter_deletePaymentdocsprinter');
					$msg->setProperty('class',$paymentdoc);
					$msg->setProperty('printer',$this->id);
					$msg->setType(MSG_TYPE_CONFIG);
					$modManager->distrMsg($msg);
				}
			}
		}
		
		return $input_data;
	}
	
	function check_values($input_data){

		$msg="";
		
		foreach($input_data as $name=>$value)
		{
			if($name=='paymentdoc')
			{
				$this->tmp[$name]=$value;
				unset($input_data[$name]);
			}
		}
		
		if($input_data['name']=="") {
			$msg=ucfirst(phr('CHECK_NAME'));
		}

		if($input_data['template']=="") {
			$msg=ucfirst(phr('CHECK_TEMPLATE'));
		}
		
		if($msg){
			echo "<script language=\"javascript\">
				window.alert(\"".$msg."\");
				window.history.go(-1);
			</script>\n";
			return 2;
		}
/*
		if(!$input_data['bill'])
			$input_data['bill']=0;
	
		if(!$input_data['invoice'])
			$input_data['invoice']=0;
	
		if(!$input_data['receipt'])
			$input_data['receipt']=0;
*/


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
			$arr['template']='receipt.tpl';
		}
		$output .= '
	<div align="center">
	<a href="?class='.get_class($this).'">'.ucphr('BACK_TO_LIST').'.</a>
	<table>
	<tr>
	<td>
	<fieldset>
	<legend>'.ucphr('PRINTER').'</legend>

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
			'.ucphr('NAME_PRINTER').':
			</td>
			<td>
			<input type="text" name="data[name]" value="'.$arr['name'].'">
			</td>
		</tr>
		<tr>
			<td>
			'.ucphr('PRINTER_DESTINATION').':
			</td>
			<td>
			<input type="text" name="data[dest]" value="'.$arr['dest'].'">
			</td>
		</tr>
		<tr>
			<td>
			'.ucphr('PRINTER_TEMPLATE').':
			</td>
			<td>
			<select name="data[template]">';
		
		$templates=list_templates(ROOTDIR.'/templates');
		for (reset ($templates); list ($key, $value) = each ($templates); ) {
			if($arr['template']==$value) $selected=' selected';
			else $selected='';

			$output .= '
			<option value="'.$value.'"'.$selected.'>'.$value.'</option>';
		}
		$output .= '
			</select>
			</td>
		</tr>
		<tr>
			<td>
			'.ucphr('PRINTER_DRIVER').':
			</td>
			<td>
			<select name="data[driver]">';
			
		$drivers=list_drivers(ROOTDIR.'/drivers');
		for (reset ($drivers); list ($key, $value) = each ($drivers); ) {
			if($arr['driver']==$value) $selected=' selected';
			else $selected='';

			$output .= '
			<option value="'.$value.'"'.$selected.'>'.$value.'</option>';
		}
		$output .= '
			</select>
			</td>
		</tr>
		<tr>
			<td>
			'.ucphr('PRINTER_LANGUAGE').':
			</td>
			<td>
			<select name="data[language]">';
			
		$langs=list_db_languages();
		for (reset ($langs); list ($key, $value) = each ($langs); ) {
			if($arr['language']==$value) $selected=' selected';
			else $selected='';

			$output .= '
			<option value="'.$value.'"'.$selected.'>'.$value.'</option>';
		}
			
		$output .= '
			</select>
			</td>
		</tr>';
		
		if(class_exists('paymentdoc'))
		{
			$paymentdocsPrinters=new paymentdocs_printer;
			$paymentdocs=new paymentdoc;
			$docs=$paymentdocs->getPaymentdocs();
			
			foreach($docs as $paymentdoc)
			{
				$obj = new $paymentdoc;
				
				if($editing && $paymentdocsPrinters->paymentdocPrinterExists ($paymentdoc,$this->id)) $checked = ' checked';
				else $checked='';
				$output .= '
				<tr>
					<td colspan="2">
					<input type="checkbox" name="data[paymentdoc][]" value="'.$paymentdoc.'"'.$checked.'>'.$obj->title.'
					</td>
				</tr>';
			}
		}
		
		/*
		$output .= '
		<tr>
			<td colspan="2">
			<input type="checkbox" name="data[bill]" value="1"';
		if($arr['bill']) $output .= ' checked';
		$output .= '>'.ucphr('PRINTER_BILL').'
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="checkbox" name="data[invoice]" value="1"';
		if($arr['invoice']) $output .= ' checked';
		$output .= '>'.ucphr('PRINTER_INVOICE').'
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="checkbox" name="data[receipt]" value="1"';
		if($arr['receipt']) $output .= ' checked';
		$output .= '>'.ucphr('PRINTER_RECEIPT').'
			</td>
		</tr>';
		*/
		$output .= '
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