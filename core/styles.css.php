<?
/**
* My Handy Restaurant
*
* http://www.myhandyrestaurant.org
*
* My Handy Restaurant is a restaurant complete management tool.
* Visit {@link http://www.myhandyrestaurant.org} for more info.
* Copyright (C) 2003-2005 Fabio De Pascale
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
header("Content-type: text/css;");
?><meta http-equiv="content-type" content="text/css">

.aligncenter {text-align: center}
.modified {font-size: smaller}

.color_table_cell {width: 15px; height:15px; }
.mgmt_main_table { border: 0px; background: #FFCA68 }
.mgmt_main_table tbody { overflow: auto; height: 350px }
.mgmt_main_table tbody tr { height: 1em } /* work around IE bug */

.mgmt_printable_table {font-size: 10 pt; border: 0px #000 solid background: #eee; background: #AAAAAA}
.break {page-break-before:always;}

.mgmt_printable_tablebg {border: 0px;}
.mgmt_printable_cellbg0 {border: 0px #000 solid; height: 1em; background: #CCCCCC}
.mgmt_printable_cellbg1 {border: 0px #000 solid; height: 1em; background: #FFFFFF}

.admin_table {border-width: 0px;  background-color: #FFFFFF; }
.admin_th { text-align: left; border-width: 0px;}
.admin_tr_0 {border-width: 0px; background-color: #FFE9B7}
.admin_tr_1 {border-width: 0px; background-color: #FAFF97}
.admin_tr_highlight {background-color: #DDDDDD}
.admin_td_0 {vertical-align: text-bottom; border-width: 0px; }
.admin_td_1 {vertical-align: text-bottom; border-width: 0px; }

.admin_ingreds_list { font-size: 85%; }

* {
font-family: sans-serif, arial, verdana;
font-size: 12.5px;
}

a:link { color: #0E17BF; text-decoration: none}
a:visited { color: #0E17BF; text-decoration: none}
a:hover { color: #CC0000; text-decoration: none}

.invisible {font-size: 0pt; color: #FFFFFF; text-decoration: none; }

.preferred_answer { font-size: 150%; }

.error_msg { color: red; align: center }
.page_title { font-family: Arial, Helvetica, sans-serif; font-size: 150%; font-weight: bold}

.form { background-color: #FFCC99; color: #333333; border: 1px #CC0000 solid; font-family: "Lucida Console", "Courier New", Courier, mono }

.mgmt_body_index {background: #FEEFAC}
.mgmt_color_tablebg {border: 0px; background: #FFCA68 }
.mgmt_color_cellbg0 {height: 1em; background: #FFE9B7 }
.mgmt_color_cellbg1 {height: 1em; background: #FAFF97 }

.help_text {font-size: 100%;}
.help_text * {font-size: 100%;}
.help_bg {background-color: #333399}
.help_fg {background-color: #FFFFCC}
.help_caption {vertical-align: middle; color: #FFFFFF; font-size: 100%;}
.help_close A {color: #FFFFFF; font-size: 100%;}

/* MENU */
.clCMEvent{position:absolute; z-index:300; width:100%; height:100%; clip:rect(0,100%,100%,0); left:0; top:0; visibility:hidden}
.clCMAbs{position:absolute; width:10; height:10; left:0; top:0; visibility:hidden}

.clT,.clTover,.clS,.clSover,.clS2,.clS2over{position:absolute; overflow:hidden; width:130; height:18; cursor:pointer; cursor:hand}
.clT,.clTover{padding:4px; font-size:12px; font-weight:bold}
.clT{color:white; }   
.clTover{color:#FCCE55;}

.clS,.clSover{padding:2px; font-size:11px; font-weight:bold}
.clS2,.clS2over{padding:2px; font-size:11px;}

.clS,.clS2{color:#006699; background-color:#CDDBEB; layer-background-color:#CDDBEB;}

.clSover,.clS2over{color:#FCCE55;}
.clSover,.clS2over,.clTover,.clB,.clBar{layer-background-color:#333399; background-color:#333399;}

.clB{position:absolute; visibility:hidden; z-index:300}
.clBar{position:absolute; width:10; height:10; visibility:hidden; }
/* END MENU */