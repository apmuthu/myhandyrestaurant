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

function statistics_show(){
	$timer=0;
	require("./mgmt_start.php");

	$table=$GLOBALS['table_prefix'].'account_log';
	$query = "SELECT * FROM $table";
	$query .= " WHERE `datetime`>=".$_SESSION['timestamp']['start'] ;
	$query .= " AND `datetime`<=".$_SESSION['timestamp']['end'];

	$inizio=microtime();
	$res = mysql_db_query ($_SESSION['mgmt_db'],$query);
	$fine=microtime();
	$timer+=elapsed_time($inizio,$fine);

	$inizio=microtime();
	while($row = mysql_fetch_array ($res)) {
		$fine=microtime();
		$timer+=elapsed_time($inizio,$fine);

		$price=$row['price'];
		$totals['revenue']+=$price;
		$totals['number']++;

		$quantity=$row['quantity'];

		$waiter=strtolower($row['waiter']);
		if(empty($waiter)) $waiter='undefined';
		$waiters['revenue'][$waiter]+=$price;

		$payment=$row['payment'];
		if($payment!=0){
			$payments['number'][$payment]++;
		}

		$destination=strtolower($row['destination']);
		$destinations['revenue'][$destination]+=$price;


		$dish=strtolower($row['dish']);
		if($dish!="") {
			$dishes['number'][$dish]+=$quantity;
			$dishes['revenue'][$dish]+=$price;
		}

		$ingredient=strtolower($row['ingredient']);
		$oper=$row['operation'];
		if($ingredient!="" && $oper==1) {
			$ingredsplus['number'][$ingredient]+=$quantity;
			$ingredsplus['revenue'][$ingredient]+=$price;
		} elseif($ingredient!="" && $oper==-1) {
			$ingredsminus['number'][$ingredient]+=$quantity;
			$ingredsminus['revenue'][$ingredient]+=$price;
		}

		$inizio=microtime();
	}
	$fine=microtime();
	$timer+=elapsed_time($inizio,$fine);

	if(is_array($dishes['number'])) {
		echo "<br><br>".ucfirst(GLOBALMSG_STATS_DISHES_ORDERED).":<br>";
		ksort($dishes['number']);
		//krsort($dishes_global);
		//asort($dishes_global);
		//arsort($dishes_global);
		echo "<table>\n";
		for (reset ($dishes['number']); list ($key, $value) = each ($dishes['number']); ) {
			if($key) {
				if(is_numeric($key)) {
					if($key==SERVICE_ID) {
						$dishname = ucphr('SERVICE_FEE');
					} elseif($key==DISCOUNT_ID) {
						$dishname = ucphr('DISCOUNT');
					} else {
						$dish = new dish($key);
						$dishname = $dish -> name ($_SESSION['language']);
					}
				 } else $dishname=ucfirst($key);
				 
				$dishquantity=$value;
				$dishprice=sprintf("%01.2f",$dishes['revenue'][$key]);
				echo "<tr><td>$dishquantity</td><td>$dishname</td><td>$dishprice ".country_conf_currency(true)."</td></tr>\n";
			}
		}
		echo "</table>\n";
	}

	if(is_array($ingredsplus['number'])) {
		echo "<br><br>".ucfirst(GLOBALMSG_STATS_INGREDIENTS_ADDED).":<br>";
		ksort($ingredsplus['number']);
		echo "<table>\n";
		for (reset ($ingredsplus['number']); list ($key, $value) = each ($ingredsplus['number']); ) {
			if($key) {
				if(is_numeric($key)) {
					$ingred = new ingredient($key);
					$ingredname = $ingred -> name ($_SESSION['language']);
				 } else $ingredname=ucfirst($key);
				echo "<tr><td>$value</td><td>$ingredname</td><td>".sprintf("%01.2f",$ingredsplus['revenue'][$key])." ".country_conf_currency(true)."</td></tr>\n";
			}
		}
		echo "</table>\n";
	}

	if(is_array($ingredsminus['number'])) {
		echo "<br><br>".ucfirst(GLOBALMSG_STATS_INGREDIENTS_REMOVED).":<br>";
		ksort($ingredsminus['number']);
		echo "<table>\n";
		for (reset ($ingredsminus['number']); list ($key, $value) = each ($ingredsminus['number']); ) {
			if($key) {
				if(is_numeric($key)) {
					$ingred = new ingredient($key);
					$ingredname = $ingred -> name ($_SESSION['language']);
				 } else $ingredname=ucfirst($key);
				echo "<tr><td>$value</td><td>$ingredname</td><td>".sprintf("%01.2f",$ingredsminus['revenue'][$key])." ".country_conf_currency(true)."</td></tr>\n";
			}
		}
		echo "</table>\n";
	}

	if(is_array($waiters['revenue'])) {
		echo "<br><br>".ucfirst(phr('STATS_TOTAL_WAITERS')).":<br>";
		ksort($destinations['revenue']);
		echo "<table>\n";
		for (reset ($waiters['revenue']); list ($key, $value) = each ($waiters['revenue']); ) {
			if($key) {
				if(is_numeric($key)) {
					$user = new user($key);
					$name = $user -> name ();
				 } else $name=ucfirst($key);
				$value=sprintf("%01.2f",$value);
				echo "<tr><td>$name</td><td>$value ".country_conf_currency(true)."</td></tr>\n";
			}
		}
		echo "</table>\n";
	}
	if(is_array($destinations['revenue'])) {
		echo "<br><br>".ucfirst(GLOBALMSG_STATS_TOTAL_DEPTS).":<br>";
		ksort($destinations['revenue']);
		echo "<table>\n";
		for (reset ($destinations['revenue']); list ($key, $value) = each ($destinations['revenue']); ) {
			if($key) {
				if(is_numeric($key)) {
					$dest = new printer($key);
					$name = $dest -> name ();
				 } else $name=ucfirst($key);
				$value=sprintf("%01.2f",$value);
				echo "<tr><td>$name</td><td>$value ".country_conf_currency(true)."</td></tr>\n";
			}
		}
		echo "</table>\n";
	}

	$totals['revenue']=sprintf("%01.2f",$totals['revenue']);
	if($totals['revenue']) {
		if ($dataset!="total") {
			echo "<br><br>".ucfirst(GLOBALMSG_STATS_TOTAL_DEPTS).":<br>";
		} else {
			echo "<br><br>".ucfirst(GLOBALMSG_STATS_TOTAL_DEPTS).":<br>";
		}
		echo "<b>".$totals['revenue']."</b> ".country_conf_currency(true);
	}

	echo "<hr><b>".$totals['number']."</b> ".GLOBALMSG_STATS_RECORDS_SCANNED.".<br>
	<b>".round($timer,5)."</b> ".GLOBALMSG_STATS_MYSQL_TIME.".<br>
	<hr>";
}

?>
