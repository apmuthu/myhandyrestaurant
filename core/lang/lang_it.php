<?php
/**
* My Handy Restaurant - Italian language file
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
* @ignore
*/
/*
ucfirst(lang_get($_SESSION['language'],'ERROR_NO_INGREDIENT_SELECTED'))

lang_get($_SESSION['language'],'ERROR_NO_INGREDIENT_SELECTED')
*/
define('GLOBALMSG_CONFIG_FILE_NOT_WRITEABLE','Il file di configurazione (conf/config.inc.php) non &egrave; scrivibile. My Handy Restaurant non può funzionare senza quel file.<br>Controllare che il file esista e sia scrivibile o che la directory conf/ sia scrivibile.<br>Ricorda che il file o la directory devono essere scrivibile per l\'utente sotto il quale gira il web server.');
define('GLOBALMSG_CONFIG_OUTPUT_FILES_NOT_WRITEABLE','i file di log degli errori o di debug non sono scrivibili.<br>Per funzionare correttamente, My handy Restaurant (l\'utente sotto il quale gira il web server) deve poter scrivere quei file.<br>Per favore, controllare che i file siano esistenti e scrivibili, o che la directory in cui dovrebber essere non sia protetta da scrittura, così che My handy Restaurant li possa creare.');
define('GLOBALMSG_CONFIG_SYSTEM','<a href="../conf/index.php">Configura My handy Restaurant</a>');
define('GLOBALMSG_CONFIGURE_DATABASES','<a href="../admin/admin.php?class=accounting_database&amp;command=none"><br/>Configura i database di My handy Restaurant</a>');
define('GLOBALMSG_DB_CONNECTION_ERROR','Errore: Si &egrave; verificato un errore nella connessione al server del database: provare a controllare il file config.php e se il database sia attivo.');
define('GLOBALMSG_DB_NO_TABLES_ERROR','Errore: Non &egrave; presente alcuna tabella nel database, impossibile procedere.');
define('GLOBALMSG_NO_ACCOUNTING_DB_FOUND','Errore: non c\'&egrave; alcun database per la contaiblit&agrave;, impossbile procedere.<br>My Handy Restaurant ha bisogno di un database comune e almeno un database contabilit&agrave;.');

define('GLOBALMSG_ACTION_IS_DEFINITIVE','L\'azione &egrave; <b>definitiva</b>');

define('GLOBALMSG_FROM','da');
define('GLOBALMSG_FROM_TIME','dalle');
define('GLOBALMSG_FROM_DAY','dal');

define('GLOBALMSG_GO_BACK','Torna indietro');

define('GLOBALMSG_INSERTING','Sto inserendo');
define('GLOBALMSG_ITEM','Prodotto');
define('GLOBALMSG_INVOICE','Fattura');
define('GLOBALMSG_INVOICE_ASSOCIATED','Fattura associata');
define('GLOBALMSG_INVOICE_PAID','Pagata');

define('GLOBALMSG_INDEX_WHO_ARE_YOU','Chi sei?');
define('GLOBALMSG_INDEX_SUBMIT','Entra');

define('GLOBALMSG_NAME','Nome');
define('GLOBALMSG_NO','No');
define('GLOBALMSG_NONE_FEMALE','Nessuna');
define('GLOBALMSG_NOTE','Nota');
define('GLOBALMSG_NOTE_UPDATE','Aggiorna la nota');

define('GLOBALMSG_ONLY','solo');
define('GLOBALMSG_OF_DAY','del');
define('GLOBALMSG_OR','o');
define('GLOBALMSG_OTHER_FILE','Scheda altro');
define('GLOBALMSG_OUTGOING_MANY','uscenti');

define('GLOBALMSG_PAGE_TIME','secondi per generare la pagina');
define('GLOBALMSG_PHONE','Telefono');
define('GLOBALMSG_PLACE','luogo');
define('GLOBALMSG_POS_CIRCUIT_FILE','Scheda circuito POS');
define('GLOBALMSG_PRICE','Prezzo'); 
define('MSG_PAPER_PRINT_REMOVE','CANCELLATO');
define('MSG_PAPER_PRINT_TABLE','Tavolo');
define('MSG_PAPER_PRINT_PRIORITY','Priorita');
define('MSG_PAPER_PRINT_WAITER','Cameriere');
define('MSG_PAPER_PRINT_DISCOUNT','Sconto');
define('MSG_PAPER_PRINT_TAXABLE','Imponibile');
define('MSG_PAPER_PRINT_TAX','Imposta');
define('MSG_PAPER_PRINT_TAX_TOTAL','Imposta totale');
define('MSG_PAPER_PRINT_CURRENCY','E');
define('MSG_PAPER_PRINT_TOTAL','Totale');
define('MSG_PAPER_PRINT_BILL','Ricevuta');
define('MSG_PAPER_PRINT_INVOICE','Fattura');
define('MSG_PAPER_PRINT_RECEIPT','Scontrino');
define('MSG_PAPER_PRINT_NUMBER_ABBREVIATED','N.');
define('MSG_PAPER_PRINT_A_LOT','ABB');
define('MSG_PAPER_PRINT_FEW','POCO');
define('MSG_PAPER_PRINT_ATTENTION','ATTENZIONE');
define('MSG_PAPER_PRINT_WAIT','ASPETTARE');
define('MSG_PAPER_PRINT_GO','Partire');
define('MSG_PAPER_PRINT_GO_NOW','Partire Subito');
define('GLOBALMSG_PAPER_PRINT_TAKEAWAY','Asporto');
define('GLOBALMSG_PERIOD','periodo');

define('GLOBALMSG_QUANTITY','Quantita');

define('GLOBALMSG_RECEIPT_ID','Id');
define('GLOBALMSG_RECEIPT_ID_INTERNAL','Id interna');
define('GLOBALMSG_RECEIPT_ANNULLED_RECEIPT','La ricevuta &egrave; stata annullata');
define('GLOBALMSG_RECEIPT_ANNULLED_INVOICE','La fattura &egrave; stata annullata');
define('GLOBALMSG_RECEIPT_ANNULLED_BILL','Lo scontrino &egrave; stato annullato');
define('GLOBALMSG_RECEIPT_ANNULL_CONFIRM','Sei sicuro di voler cancellare le seguenti voci e tutte le voci di log associate?<br>L\'operazione &egrave; <b>irreversibile</b>.');
define('GLOBALMSG_RECEIPT_ID_INTERNAL','Id interno');

define('GLOBALMSG_RECORD_ANNULL','Annulla la voce');
define('GLOBALMSG_RECORD_ANNULLED','Annullata');
define('GLOBALMSG_RECORD_ANNULLED_ABBREVIATED','ANN');
define('GLOBALMSG_RECORD_NONE_SELECTED_ERROR','Non &egrave; stata selezionata alcuna voce');
define('GLOBALMSG_RECORD_NONE_FOUND_ERROR','Non &egrave; stata trovata alcuna voce');
define('GLOBALMSG_RECORD_NONE_FOUND_PERIOD_ERROR','Non &egrave; stata trovata alcuna voce nel periodo richiesto');
define('GLOBALMSG_RECORD_CHANGE_SEARCH','Provare a cambiare ricerca o periodo');
define('GLOBALMSG_RECORD_DELETE_CONFIRM','Sei sicuro di voler cancellare la seguente voce?');
define('GLOBALMSG_RECORDS_DELETE_CONFIRM','Sei sicuro di voler cancellare le seguenti voci?');
define('GLOBALMSG_RECORD_DELETE','Cancella la voce');
define('GLOBALMSG_RECORD_DELETE_SELECTED','Cancella le voci selezionate');
define('GLOBALMSG_RECORD_EDIT','Modifica la voce');
define('GLOBALMSG_RECORD_INSERT','Inserisci la voce');
define('GLOBALMSG_RECORD_OUTGOING','Uscente');
define('GLOBALMSG_RECORD_INCOMING','Entrante');
define('GLOBALMSG_RECORD_INVOICE','Fattura');
define('GLOBALMSG_RECORD_POS','POS');
define('GLOBALMSG_RECORD_BILL','Scontrino');
define('GLOBALMSG_RECORD_CHEQUE','Assegno');
define('GLOBALMSG_RECORD_RECEIPT','Ricevuta');
define('GLOBALMSG_RECORD_DEPOSIT','Versamento');
define('GLOBALMSG_RECORD_WIRE_TRANSFER','Bonifico');
define('GLOBALMSG_RECORD_PAYMENT','Pagamento');
define('GLOBALMSG_RECORD_PAYMENT_DATE','Data del pagamento');
define('GLOBALMSG_RECORD_PAID','Pagato');
define('GLOBALMSG_RECORD_THE_MANY','Le voci');
define('GLOBALMSG_RECORD_DELETE_OK_MANY','sono state cancellate correttamente');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY','sono state cancellate correttamente dal log');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY_2','Le voci del log sono quindi state cancellate');
define('GLOBALMSG_RECORD_THE','La voce');
define('GLOBALMSG_RECORD_DELETE_OK','&egrave; stata cancellata correttamente');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG','&egrave; stata cancellata correttamente dal log');
define('GLOBALMSG_RECORD_DELETE_SELECTED','Cancella le voci selezionate');
define('GLOBALMSG_RECORD_DELETE_NONE','Nessuna voce &egrave; stata selezionata');
define('GLOBALMSG_RECORD_ADD_OK','&egrave; stata aggiunta correttamente');
define('GLOBALMSG_RECORD_ADD_NONE','Nessuna voce &egrave; stata aggiunta');
define('GLOBALMSG_RECORD_EDIT_OK','&egrave; stata modificata correttamente');
define('GLOBALMSG_RECORD_EDIT_NONE','No voice has been updated');
define('GLOBALMSG_RECORD_EDIT_NOT_DONE','Nessuna voce &egrave; stata modificata');
define('GLOBALMSG_RECORD_TITLE_FOR','Voci per');
define('GLOBALMSG_RECORD_TITLE_FOR_NOT_IN_ADDRESSBOOK','Voci per i contatti non presenti in rubrica');
define('GLOBALMSG_RECORD_TITLE_FOR_TYPE','Voci per i contatti del tipo');
define('GLOBALMSG_RECORD_TITLE_INCOME_TYPE','Incasso del tipo');
define('GLOBALMSG_RECORD_TITLE_INCOME','Incasso');
define('GLOBALMSG_RECORD_TITLE_ALL','Tutte le voci');
define('GLOBALMSG_RECORD_PRINTABLE','Versione stampabile (prova)');
define('GLOBALMSG_RECORD_TABLE_','Versione stampabile (prova)');
define('GLOBALMSG_REPORT_ACCOUNT','Conto');
define('GLOBALMSG_REPORT_GENERATE','Genera report');
define('GLOBALMSG_REPORT_PERIOD','Periodo report');

define('GLOBALMSG_STATS','Statistiche');
define('GLOBALMSG_STATS_DISHES_ORDERED','Piatti ordinati');
define('GLOBALMSG_STATS_INGREDIENTS_ADDED','Ingredienti aggiunti');
define('GLOBALMSG_STATS_INGREDIENTS_REMOVED','Ingredienti rimossi');
define('GLOBALMSG_STATS_MYSQL_TIME','secondi spesi per le query mySQL');
define('GLOBALMSG_STATS_RECORDS_SCANNED','voci esaminate');
define('GLOBALMSG_STATS_TOTAL_DEPTS','Totali settore');
define('GLOBALMSG_STATS_TOTAL_PERIOD','Totale periodo');
define('GLOBALMSG_STOCK_ADD_OK','Nuovo prodotto inserito correttamente');
define('GLOBALMSG_STOCK_ADD_ERROR','Si &egrave; verificato un errore durante l\'inserimento del nuovo prodotto');
define('GLOBALMSG_STOCK_ITEM_ADD','Aggiungi prodotto');
define('GLOBALMSG_STOCK_ITEM_NAME','Nome prodotto');
define('GLOBALMSG_STOCK_ITEM_INITIAL_QUANTITY','Quantita iniziale');
define('GLOBALMSG_STOCK_MOVEMENTS','Movimenti magazzino');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT','Inserisci un movimento magazzino');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT_ERROR','Errore insermento movimento magazzino');
define('GLOBALMSG_STOCK_MOVEMENT_NONE_ASSOCIATED_TO_INVOICE','Nessun movimento di magazzino &egrave; associato alla fattura');
define('GLOBALMSG_STOCK_SEND_TO','Invia al magazzino');
define('GLOBALMSG_STOCK_SITUATION','Stato magazzino');
define('GLOBALMSG_STOCK_DATA_UPDATE','Aggiorna dati');
define('GLOBALMSG_STOCK_UPDATE_ERROR','Errore aggiornamento dati magazzino');
define('GLOBALMSG_STOCK_UPDATE_OK','Magazzino aggiornato correttamente');
define('GLOBALMSG_SUPPLIER_FILE','Scheda fornitore');

define('GLOBALMSG_TABLE','Tavolo'); 
define('GLOBALMSG_TABLES','Tavoli'); 
define('GLOBALMSG_TABLE_NONE_FOUND','Non &egrave; stato trovato nessun tavolo'); 
define('GLOBALMSG_TABLE_NONE_SELECTED','Non &egrave; stato selezionato nessun tavolo'); 
define('GLOBALMSG_TABLE_THE','Il tavolo'); 
define('GLOBALMSG_TABLE_ID','Id (numero ordinamento)'); 
define('GLOBALMSG_TABLE_INSERT_NEW','Inserisci un nuovo tavolo'); 
define('GLOBALMSG_TABLE_INSERT','Inserisci tavolo'); 
define('GLOBALMSG_TABLE_UPDATE','Modifica tavolo'); 
define('GLOBALMSG_TABLE_DELETE','Cancella tavolo'); 
define('GLOBALMSG_TABLE_NUMBER','Numero o Nome (visualizzato)'); 
define('GLOBALMSG_TABLE_TABLE_ID','Id'); 
define('GLOBALMSG_TABLE_TABLE_NUMBER','Numero/Nome'); 
define('GLOBALMSG_TABLE_TAKEAWAY','Asporto'); 
define('GLOBALMSG_TAXABLE','imponibile');
define('GLOBALMSG_TAX','Tassa');
define('GLOBALMSG_TAX_NUMBER','Codice fiscale');
define('GLOBALMSG_TAX_MANY','Tasse');
define('GLOBALMSG_TAX_TO_PAY','Per il periodo selezionato, le tasse da pagare sono');
define('GLOBALMSG_TAX_TO_PAY_INVOICE_EXCLUDED','escluse le fatture non pagate');
define('GLOBALMSG_TAX_TO_PAY_INVOICE_INCLUDED','incluse le fatture non pagate');
define('GLOBALMSG_TIME','Ora');
define('GLOBALMSG_TYPE','Tipo');
define('GLOBALMSG_TO','a');
define('GLOBALMSG_TO_DAY','al');
define('GLOBALMSG_TO_TIME','alle');
define('GLOBALMSG_TOTAL','totale');

define('GLOBALMSG_VAT_ACCOUNT','Partita IVA');
define('GLOBALMSG_VAT_CALCULATION','Calcolo IVA');

define('MSG_WAITER_NOT_CONNECTED_ERROR','Errore: Non sei connesso.');

define('GLOBALMSG_WAITER','Cameriere'); 
define('GLOBALMSG_WAITERS','Camerieri'); 
define('GLOBALMSG_WAITER_NONE_FOUND','Non &egrave; stato trovato nessun cameriere'); 
define('GLOBALMSG_WAITER_NONE_SELECTED','Non &egrave; stato selezionato nessun cameriere'); 
define('GLOBALMSG_WAITER_THE','Il cameriere'); 
define('GLOBALMSG_WAITER_NAME','Nome'); 
define('GLOBALMSG_WAITER_LANGUAGE','Lingua (Formato internaz. a 2 caratteri: ad es.: en, it, de, ...)'); 
define('GLOBALMSG_WAITER_CAN_OPEN_CLOSED_TABLES','Puo aprire i tavoli chiusi (e modificare il prezzo dei piatti generici)'); 
define('GLOBALMSG_WAITER_INSERT_NEW','Inserisci un nuovo cameriere'); 
define('GLOBALMSG_WAITER_INSERT','Inserisci cameriere'); 
define('GLOBALMSG_WAITER_UPDATE','Modifica cameriere'); 
define('GLOBALMSG_WAITER_DELETE','Cancella cameriere'); 
define('GLOBALMSG_WAITER_TABLE_NAME','Nome'); 
define('GLOBALMSG_WAITER_TABLE_LANGUAGE','Lingua'); 
define('GLOBALMSG_WAITER_TABLE_CAN_OPEN_CLOSED_TABLES','Apre tavoli chiusi'); 
define('GLOBALMSG_WEBSITE','Sito web');

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
 L'uso di questa funzione &egrave; consigliato solo in caso di cambiamenti di
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