<?php
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

clearstatcache(void);

$lastupdate=date("j F Y G:i",filemtime("./todo.php"));
$todo="
  TODO and BugTracking list
Last Update: ".$lastupdate."

Todo:
A destroy language files
A rewrite accounting
A better templating (smarty)
B coherent interface
B better organized config (with previous conf saved)
B PC and PDA version for waiters
B Dish descriptions (wine: producer-year-name-description-photo)
B easier install
B stock analisys functions
B change own password
B upgrade from ver to ver (based on sequential upgrade id)
B password on waiters
C disable db creation if mysql user is not allowed
C context help
C add waiters data (employee data)
C protect from multiple same user connections
C send charset header right after user connection
C possibility to subst database list with textbox (really needed???)
C reduce templates number
C check why russian xml is not read
C calendar with deadlines
C propose substituting category or dishes deletion when deleting category
C propose substituting printer when deleting printer
C new language adds indexes
C add check for wrong (not MHR) accounting db (tell user: maybe you chose the wrong db?)

Future enhancements (too far to be in todo):
Menu printing system
Reservation system (see solunas)
Order ready based on barcode (with barcode reader)
Customers' interface (web)
Hotels (room reservations)


Check translation (don't exist):

modded translations:
TRANSLATIONS_CHECKER

------------------------------------------------------------------------------
Install notes:
needed data:

possible steps:
1. ask mysql user/pass/database
2.
admin user: name, pass, lang
3. conf:
location of error file
currency
service fee name
service fee price
printing system
vendor name
vendor address
4. accounting database
5. printing (yes/no)
setup printers

old changelog follows - it's here only for past reference
------------------------------------------------------------------------------
Done: Ultimi cambiamenti - l'ultimo è in cima

DONE: gestione multi stampanti
DONE: log chiusura
DONE: voci rimosse vanno segnate come rimosse e non rimosse davvero e displayate come tali
DONE: voci rimuove bisogna stampare foglio rimozione se già stampata e aggiunta automatica
DONE: conto separato (solo cassa)-standby come fattura
DONE: separazione delle costanti più usate da config.inc.php a config.constants.inc.php
DONE: inserimento automatico coperti al momento dell'associazione di un tavolo
DONE: arsenale.homelinux.org rimanda sul mio pc, quando è acceso
DONE: migliorata usabilità modifiche con tabelle e pulsanti di movimento. ASPETTO COMMENTI
DONE: totale riorganizzazione del codice delle modifiche. ora è molto più leggibile!
DONE: aggiunta flag debug per facilitare gestione msg di controllo
DONE: riorganizzato codice index, menu, source
DONE: aggiunta backgroung ad alto contrasto per feedack esito
DONE: controllo su editing e aggiunta codici riservati (order.php)
DONE: modifiche autom con checkbox in create order
DONE: piatti in lista codici ordinati per categoria
DONE: tolta intestazione e fine tabella se non ci sono comande (orders list)
DONE: totale euro in riapertura tavolo
DONE: non stampa conto (invoice=1 se stampa a mano selected)
DONE: lista ordinata per priorità
DONE: togliere display quantità alle modifiche
DONE: ritorno da conferma modifiche
DONE: risolto bug -> errore se si crea nuova mod da un modded (numeri mod errati)
DONE: modifica prezzi possibile solo a tavolo chiuso
DONE: Pagato per cassiere
DONE: azzeramento tavolo
DONE: apertura solo per pagato e azzera tavolo (solo se pagato=1)
DONE: riapertura tavolo
DONE: corretto bug -> chiudi tavolo appare se tavolo è già chiuso
DONE: aggiunta richiesta fattura in conferma chiusura
DONE: autoprint se non c'è ATT o ATTFATTURA a close table
DONE: chiusura tavoli di tutti
DONE: divisione ordini su ricevimento modifiche
DONE: Aggiunto refresh automatico nelle segg. situazioni con esito positivo:
- edit order
- del order
- add fee
- edit fee
- del fee
- disconnect
- already connected (index)
DONE: patchato bug in history.back in disconnect.php - ora funzia correttamente
DONE: waiters con icanopenclosedtable=1 possono variare i prezzi direttamente in source
DONE: close table compare in source solo al cameriere associato al tavolo
DONE: aggiornato menu per supportare closed tables e gestire accessi
DONE: close table+confirm
DONE: Stampa modifiche e migliorato sistema di stampa (pagina esempio in /toprint)
DONE: su modifiche aggiunte post correzione flag extra_care o suspend compare il flag correttamente
DONE: zero check su coperti (partial error report)
DONE: tolto aggiungi coperto se già c'è
DONE: se cambiato dishid rimosse le modifiche
DONE: gestione totale delle modifiche (sia autocalc che normali)
";

echo "<a href=\"index.php\">Index</a><br>";
echo nl2br(htmlentities($todo));

?>
