<?php
/**
* My Handy Restaurant - Archivo de expresiones en castellano
*
* http://www.myhandyrestaurant.org
*
* My Handy Restaurant es un sistema de gestión de restaurantes.
* Visite {@link http://www.myhandyrestaurant.org} para mas información.
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
* @ignore
*/
/*
ucfirst(lang_get($_SESSION['language'],'INCOMINGS'))

lang_get($_SESSION['language'],'INCOMINGS')
*/
define('GLOBALMSG_CONFIG_FILE_NOT_WRITEABLE','El archivo de configuración (conf/config.inc.php) no tiene permiso de escritura. El sistema necesita permisos de escritura.<br>Por favor verifique la existencia del archivo y sus permisos.<br>Recuerde que el usuario del servidor web debe tener permiso de escritura tambien.');
define('GLOBALMSG_CONFIG_OUTPUT_FILES_NOT_WRITEABLE','Los archivos de registro de errores y de depuración no tienen permiso de escritura.<br>El sistema y el usuario del servidor web necesitan permiso de escritura en estos archivos para que todo funcione correctamente.<br>Por favor verifique que los archivos existan y que no sean de lectura unicamente, o que la carpeta que los contiene no sea de lectura solamente, entonces My Handy Restaurant los podrá crear.');
define('GLOBALMSG_CONFIG_SYSTEM','<a href="../conf/index.php">Configurar My handy Restaurant</a>');
define('GLOBALMSG_CONFIGURE_DATABASES','<a href="../admin/admin.php?class=accounting_database&amp;command=none"><br/>Configurar la base de datos de My handy Restaurant</a>');
define('GLOBALMSG_DB_CONNECTION_ERROR','Error al conectarse con el servidor de bases de datos. Por favor revise config.inc.php y verifique si el servidor de bases de datos funciona.');
define('GLOBALMSG_DB_NO_TABLES_ERROR','Error: en la base de datos no hay ni una tabla, no es posible continuar.');
define('GLOBALMSG_NO_ACCOUNTING_DB_FOUND','Error: no existe una base de datos contables, es imposible continuar.<br>My Handy Restaurant una base de datos comun y por lo menos una de datos contábles.');

define('GLOBALMSG_ACTION_IS_DEFINITIVE','Esta acción es <b>definitiva</b>'); 

define('GLOBALMSG_FROM','desde');
define('GLOBALMSG_FROM_TIME','desde');
define('GLOBALMSG_FROM_DAY','de');

define('GLOBALMSG_GO_BACK','Retroceder');

define('GLOBALMSG_INSERTING','Insertando');
define('GLOBALMSG_ITEM','Item');
define('GLOBALMSG_INVOICE','Factura');
define('GLOBALMSG_INVOICE_ASSOCIATED','Factura correspondiente');
define('GLOBALMSG_INVOICE_PAID','Pagado');

define('GLOBALMSG_INDEX_SUBMIT','Confirmar');

define('GLOBALMSG_NAME','Nombre');
define('GLOBALMSG_NO','No');
define('GLOBALMSG_NONE_FEMALE','Ninguna');
define('GLOBALMSG_NOTE','Nota');
define('GLOBALMSG_NOTE_UPDATE','Actualizar nota');

define('GLOBALMSG_ONLY','Solo/solamente');
define('GLOBALMSG_OF_DAY','de');
define('GLOBALMSG_OR','o');
define('GLOBALMSG_OTHER_FILE','Otro archivo');
define('GLOBALMSG_OUTGOING_MANY','gastos');

define('GLOBALMSG_PAGE_TIME','segundos de demora');
define('GLOBALMSG_PHONE','Teléfono');
define('GLOBALMSG_PLACE','Puesto');
define('GLOBALMSG_POS_CIRCUIT_FILE','Archivo posnet');
define('GLOBALMSG_PRICE','Precio'); 
define('MSG_PAPER_PRINT_REMOVE','ELIMINADO');
define('MSG_PAPER_PRINT_TABLE','Meza');
define('MSG_PAPER_PRINT_PRIORITY','Prioridad');
define('MSG_PAPER_PRINT_WAITER','Mozo');
define('MSG_PAPER_PRINT_DISCOUNT','Descuento');
define('MSG_PAPER_PRINT_TAXABLE','Gravable');
define('MSG_PAPER_PRINT_TAX','Impuesto');
define('MSG_PAPER_PRINT_TAX_TOTAL','Total de impuestos');
define('MSG_PAPER_PRINT_CURRENCY','$');
define('MSG_PAPER_PRINT_TOTAL','Total');
define('MSG_PAPER_PRINT_BILL','Cuenta');
define('MSG_PAPER_PRINT_INVOICE','Factura');
define('MSG_PAPER_PRINT_RECEIPT','Recibo');
define('MSG_PAPER_PRINT_NUMBER_ABBREVIATED','nro.');
define('MSG_PAPER_PRINT_A_LOT','DEMASIADO');
define('MSG_PAPER_PRINT_FEW','POCO');
define('MSG_PAPER_PRINT_ATTENTION','ATENCIÓN');
define('MSG_PAPER_PRINT_WAIT','ESPERE');
define('MSG_PAPER_PRINT_GO','Ir con');
define('MSG_PAPER_PRINT_GO_NOW','Ir ahora');
define('GLOBALMSG_PAPER_PRINT_TAKEAWAY','Para llevar');
define('GLOBALMSG_PERIOD','periodo');

define('GLOBALMSG_QUANTITY','Cantidad');

define('GLOBALMSG_RECEIPT_ID','Identificador');
define('GLOBALMSG_RECEIPT_ID_INTERNAL','Identificador interno');
define('GLOBALMSG_RECEIPT_ANNULLED_RECEIPT','El recibo ha sido anulado');
define('GLOBALMSG_RECEIPT_ANNULLED_INVOICE','La factura ha sido anulada');
define('GLOBALMSG_RECEIPT_ANNULLED_BILL','La cuenta ha sido anulada');
define('GLOBALMSG_RECEIPT_ANNULL_CONFIRM','¿Está seguro que desea eliminar estos registros Y todos los relacionados?<br>Esto es <b>irreversible</b>.');
define('GLOBALMSG_RECEIPT_ID_INTERNAL','Identificador interno');

define('GLOBALMSG_RECORD_ANNULL','Anular registro');
define('GLOBALMSG_RECORD_ANNULLED','Anulado');
define('GLOBALMSG_RECORD_ANNULLED_ABBREVIATED','ANL');
define('GLOBALMSG_RECORD_NONE_SELECTED_ERROR','Ningun registro ha sido seleccionado');
define('GLOBALMSG_RECORD_NONE_FOUND_ERROR','Ningun registro encontrado');
define('GLOBALMSG_RECORD_NONE_FOUND_PERIOD_ERROR','Ningun registro encontrado en ese período');
define('GLOBALMSG_RECORD_CHANGE_SEARCH','Intente con otro período');
define('GLOBALMSG_RECORD_DELETE_CONFIRM','¿Está seguro que desea eliminar este registro?');
define('GLOBALMSG_RECORDS_DELETE_CONFIRM','¿Está seguro que desea eliminar los siguientes registros?');
define('GLOBALMSG_RECORD_DELETE','Eliminar registro');
define('GLOBALMSG_RECORD_DELETE_SELECTED','Eliminar registros seleccionados');
define('GLOBALMSG_RECORD_EDIT','Editar registro');
define('GLOBALMSG_RECORD_INSERT','Insertar registro');
define('GLOBALMSG_RECORD_OUTGOING','Gasto/erogación');
define('GLOBALMSG_RECORD_INCOMING','Ingreso');
define('GLOBALMSG_RECORD_INVOICE','Factura');
define('GLOBALMSG_RECORD_POS','POS');
define('GLOBALMSG_RECORD_BILL','Ticket');
define('GLOBALMSG_RECORD_CHEQUE','Cheque');
define('GLOBALMSG_RECORD_RECEIPT','Recibo');
define('GLOBALMSG_RECORD_DEPOSIT','Deposito');
define('GLOBALMSG_RECORD_WIRE_TRANSFER','Transferencia');
define('GLOBALMSG_RECORD_PAYMENT','Pago');
define('GLOBALMSG_RECORD_PAYMENT_DATE','Dia de pago');
define('GLOBALMSG_RECORD_PAID','Pagado');
define('GLOBALMSG_RECORD_THE_MANY','Movimientos');
define('GLOBALMSG_RECORD_DELETE_OK_MANY','eliminado satisfactoriamente');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY','eliminado de los libros satisfactoriamente');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY_2','Los archivos de registro han sido eliminados');
define('GLOBALMSG_RECORD_THE','El asiento');
define('GLOBALMSG_RECORD_DELETE_OK','Eliminado satisfactoriamente');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG','eliminado de los archivos log');
define('GLOBALMSG_RECORD_DELETE_SELECTED','Eliminar registros seleccionados');
define('GLOBALMSG_RECORD_DELETE_NONE','Ninguno ha sido eliminado');
define('GLOBALMSG_RECORD_ADD_OK','agregado exitosamente');
define('GLOBALMSG_RECORD_ADD_NONE','Ninguno ha sido agregado');
define('GLOBALMSG_RECORD_EDIT_OK','actualizado exitosamente');
define('GLOBALMSG_RECORD_EDIT_NONE','Ninguno ha sido actualizado');
define('GLOBALMSG_RECORD_EDIT_NOT_DONE','no ha sido actualizado');
define('GLOBALMSG_RECORD_TITLE_FOR','Registros para');
define('GLOBALMSG_RECORD_TITLE_FOR_NOT_IN_ADDRESSBOOK','Personas que no figuran en la agenda');
define('GLOBALMSG_RECORD_TITLE_FOR_TYPE','Personas tipo/clase...');
define('GLOBALMSG_RECORD_TITLE_INCOME_TYPE','Ingresos tipo...');
define('GLOBALMSG_RECORD_TITLE_INCOME','Ingreso');
define('GLOBALMSG_RECORD_TITLE_ALL','Todos los registros');
define('GLOBALMSG_RECORD_PRINTABLE','Version para imprimir (en prueba)');
define('GLOBALMSG_RECORD_TABLE_','Version para imprimir (en prueba)');
define('GLOBALMSG_REPORT_ACCOUNT','Cuenta');
define('GLOBALMSG_REPORT_GENERATE','Generar informe');
define('GLOBALMSG_REPORT_PERIOD','Período para el informe');

define('GLOBALMSG_STATS','Estadísticas');
define('GLOBALMSG_STATS_DISHES_ORDERED','Platos pedidos');
define('GLOBALMSG_STATS_INGREDIENTS_ADDED','Ingredientes agregados');
define('GLOBALMSG_STATS_INGREDIENTS_REMOVED','Ingredientes suprimidos');
define('GLOBALMSG_STATS_MYSQL_TIME','segundos de espera para las consultas SQL');
define('GLOBALMSG_STATS_RECORDS_SCANNED','registros revisados');
define('GLOBALMSG_STATS_TOTAL_DEPTS','Totales por departamento');
define('GLOBALMSG_STATS_TOTAL_PERIOD','Total del período');
define('GLOBALMSG_STOCK_ADD_OK','Nuevo Item insertádo exitósamente');
define('GLOBALMSG_STOCK_ADD_ERROR','Error al insertar nuevo item');
define('GLOBALMSG_STOCK_ITEM_ADD','Agregar nuevo Item');
define('GLOBALMSG_STOCK_ITEM_NAME','Nombre del Item');
define('GLOBALMSG_STOCK_ITEM_INITIAL_QUANTITY','Cantidad inicial');
define('GLOBALMSG_STOCK_MOVEMENTS','Movimientos de Stock');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT','Insertar movimiento de stock');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT_ERROR','Error al insertar nuevo movimiento de stock');
define('GLOBALMSG_STOCK_MOVEMENT_NONE_ASSOCIATED_TO_INVOICE','Ningun movimiento de stock asociado a la factura');
define('GLOBALMSG_STOCK_SEND_TO','Enviado al stock');
define('GLOBALMSG_STOCK_SITUATION','Inventário');
define('GLOBALMSG_STOCK_DATA_UPDATE','Actualizar datos');
define('GLOBALMSG_STOCK_UPDATE_ERROR','Error actualizando el stock');
define('GLOBALMSG_STOCK_UPDATE_OK','Stock actualizado satisfactoriamente');
define('GLOBALMSG_SUPPLIER_FILE','Archivo de proveedor');

define('GLOBALMSG_TABLE','Tabla/meza'); 
define('GLOBALMSG_TABLES','Tablas/mezas'); 
define('GLOBALMSG_TABLE_NONE_FOUND','No se encontró una meza'); 
define('GLOBALMSG_TABLE_NONE_SELECTED','Ninguna meza está seleccionada'); 
define('GLOBALMSG_TABLE_THE','meza/Tabla'); 
define('GLOBALMSG_TABLE_ID','Número de pedido'); 
define('GLOBALMSG_TABLE_INSERT_NEW','Inserte una meza nueva'); 
define('GLOBALMSG_TABLE_INSERT','Insertar meza'); 
define('GLOBALMSG_TABLE_UPDATE','Actualizar meza'); 
define('GLOBALMSG_TABLE_DELETE','Eliminar meza'); 
define('GLOBALMSG_TABLE_NUMBER','Nombre o Número (mostrado)'); 
define('GLOBALMSG_TABLE_TABLE_ID','Id'); 
define('GLOBALMSG_TABLE_TABLE_NUMBER','Numero/Nombre'); 
define('GLOBALMSG_TABLE_TAKEAWAY','Para llevar'); 
define('GLOBALMSG_TAXABLE','Gravable');
define('GLOBALMSG_TAX','Impuesto');
define('GLOBALMSG_TAX_NUMBER','Numero de impuesto');
define('GLOBALMSG_TAX_MANY','Impuestos');
define('GLOBALMSG_TAX_TO_PAY','Para el período seleccionado los impuestos a pagar son:');
define('GLOBALMSG_TAX_TO_PAY_INVOICE_EXCLUDED','excluyendo facturas no pagadas');
define('GLOBALMSG_TAX_TO_PAY_INVOICE_INCLUDED','incluyendo facturas no pagadas');
define('GLOBALMSG_TIME','Hora');
define('GLOBALMSG_TYPE','Tipo');
define('GLOBALMSG_TO','a');
define('GLOBALMSG_TO_DAY','a');
define('GLOBALMSG_TO_TIME','hasta');
define('GLOBALMSG_TOTAL','total');

define('GLOBALMSG_VAT_ACCOUNT','Cuenta IVA');
define('GLOBALMSG_VAT_CALCULATION','Calculo de IVA');

define('MSG_WAITER_NOT_CONNECTED_ERROR','Error: ud. no está conectado.');
define('MSG_WAITER_CLICK_TO_CONNECT','Conectarse.<br>');

define('GLOBALMSG_WAITER','Mozo'); 
define('GLOBALMSG_WAITERS','Mozos'); 
define('GLOBALMSG_WAITER_NONE_FOUND','No se encontró un mozo'); 
define('GLOBALMSG_WAITER_NONE_SELECTED','Ningun mozo está seleccionado'); 
define('GLOBALMSG_WAITER_THE','El mozo'); 
define('GLOBALMSG_WAITER_NAME','Nombre'); 
define('GLOBALMSG_WAITER_LANGUAGE','Idioma (formato internacional de 2 letras: ej. en, es, it, de, ...)'); 
define('GLOBALMSG_WAITER_CAN_OPEN_CLOSED_TABLES','Puede abrir mesas cerradas (y modificar el precio de los platos en general)'); 
define('GLOBALMSG_WAITER_INSERT_NEW','Insertar un mozo nuevo'); 
define('GLOBALMSG_WAITER_INSERT','Insertar mozo'); 
define('GLOBALMSG_WAITER_UPDATE','Actualizar mozo');
define('GLOBALMSG_WAITER_DELETE','Eliminar mozo');
define('GLOBALMSG_WAITER_TABLE_NAME','Nombre');
define('GLOBALMSG_WAITER_TABLE_LANGUAGE','Idioma');
define('GLOBALMSG_WAITER_TABLE_CAN_OPEN_CLOSED_TABLES','Puede abrir mesas cerradas');
define('GLOBALMSG_WEBSITE','Sitio Web');

define('GLOBALMSG_YES','Si');

$msg_admin_confirm_reset_orders="
<b>Vuoi davvero azzerare TUTTI gli ordini?</b><br>
Questa operazione &eacute; <b>irreversibile</b> e causer&agrave;
 la perdita di tutte le comande prese finora.";
$msg_admin_confirm_reset_sources="
<b>Vuoi davvero azzerare TUTTI i tavoli?</b><br>
Questa operazione &eacute; <b>irreversibile</b> e causer&agrave;
 <b>anche</b> la perdita di tutte le comande prese finora.";
$msg_admin_confirm_reset_access_times="
<b>Vuoi davvero resettare TUTTI i tempi di accesso?</b><br>
Questa operazione &eacute; <b>irreversibile</b> e causer&agrave;
 la momentanea interruzione del servizio di protezione tavoli.<br>
 L'uso di questa funzione e' consigliato solo in caso di cambiamenti di
 orario dell'orologio di sistema.";
$msg_reset_orders="Azzera tutti gli ordini";
$msg_reset_access_times="Azzera tutti i tempi di accesso";
$msg_reset_sources="Azzera tutti i tavoli";
$but_reset_access_times="Azzera";
$but_reset_orders="Azzera";
$but_reset_sources="Azzera";
$msg_reset_access_times_ok="Tutti i tempi di accesso sono stati azzerati";
$msg_reset_orders_ok="Tutti gli ordini sono stati azzerati";
$msg_reset_sources_ok="Tutti i tavoli e gli ordini sono stati azzerati";
$msg_admin_confirmhalt="Vuoi spegnere il computer centrale?";
$msg_halt="Spegni il PC";
$but_halt="Spegni";
$msg_halt_ok="Procedura di spegnimento avviata. Spegenere il pc tra circa $halttime minuti";

?>