<?php
/**
* My Handy Restaurant - English language file
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
ucphr('SUPPLIER_FILE')
*/


define('GLOBALMSG_CONFIG_FILE_NOT_WRITEABLE','Фаил конфигурации (conf/config.inc.php) не разрешон на запись. Система не сможет работать без него.<br/>Пажалуйста проверь если этот файл существует и на нём можно писать илиже если папка conf/ писаевымая. <br/>Не забудь что файлы/папки должны быть писаевымае для юзера на котором держится web server (www-data).');
define('GLOBALMSG_CONFIG_OUTPUT_FILES_NOT_WRITEABLE','Файлы лог или еррор не имеюут разришение на запись.<br/>Для правильной работы, My Handy Restaurantа (пользователь употребляемый web server) нуждается разришения на запись этих файлов.<br/>Пожалуйста проверь чтобы эти файлы не были read-only и сущиствовали, или папка в каторой они будут ноходится должна быть не read-only, тогда My Handy Restaurant сможет их создать.');
define('GLOBALMSG_CONFIG_SYSTEM','<a href="../conf/index.php">Введи конфигурацию My handy Restaurantа</a>');
define('GLOBALMSG_CONFIGURE_DATABASES','<a href="../admin/admin.php?class=accounting_database&amp;command=none"><br/>Конфигурация Базы Данных My handy Restaurantа</a>');
define('GLOBALMSG_DB_CONNECTION_ERROR','Ошибка: произошла ошибка на подключение к серверу БД: пожалуйста, проверь файл config.inc.php, и проверь что сервер БД работает.');
define('GLOBALMSG_DB_NO_TABLES_ERROR','Ошибка: нет ни одого стола в Базе Данных, не возможно продолжать.');
define('GLOBALMSG_NO_ACCOUNTING_DB_FOUND','Ошибка: нету БД бухгалтерии,не возможно продолжать.<br/> My Handy restaurant нуждается одной главной БД и как минимум одной бухгалтерской БД для работы.');

define('GLOBALMSG_OTHER_FILE','Другой файл');
define('GLOBALMSG_OUTGOING_MANY','выходящие');

define('GLOBALMSG_POS_CIRCUIT_FILE','файл постовщика системы POS');

define('GLOBALMSG_RECEIPT_ANNULL_CONFIRM','Вы точно хотите удолить следующие И все к ним подходящие записи лог файла?<br/>Эта операция <b>без возврата.</b>.');

define('GLOBALMSG_RECORD_NONE_SELECTED_ERROR','Никакая запись не отмеченна');
define('GLOBALMSG_RECORD_NONE_FOUND_ERROR','Никакая запись не найденна');
define('GLOBALMSG_RECORD_NONE_FOUND_PERIOD_ERROR','Никакая запись не найденна в отмеченный период');
define('GLOBALMSG_RECORD_CHANGE_SEARCH','Попробуй поменять поиск или промежуток времени');
define('GLOBALMSG_RECORD_DELETE_CONFIRM','Вы точно хотите удолить следующию запись?');
define('GLOBALMSG_RECORDS_DELETE_CONFIRM','Вы точно хотите удолить следующие записи?');
define('GLOBALMSG_RECORD_DELETE','Удоли запись');
define('GLOBALMSG_RECORD_DELETE_SELECTED','Удоли отмеченную запись');
define('GLOBALMSG_RECORD_EDIT','Измени запись');
define('GLOBALMSG_RECORD_INSERT','Внеси новую запись');
define('GLOBALMSG_RECORD_OUTGOING','Выходящие');
define('GLOBALMSG_RECORD_INCOMING','Входящие');
define('GLOBALMSG_RECORD_POS','POS');
define('GLOBALMSG_RECORD_BILL','Чек');
define('GLOBALMSG_RECORD_CHEQUE','Чек');
define('GLOBALMSG_RECORD_RECEIPT','Квитанция');
define('GLOBALMSG_RECORD_DEPOSIT','Депозит');
define('GLOBALMSG_RECORD_WIRE_TRANSFER','Трансфер кредита');
define('GLOBALMSG_RECORD_PAYMENT','Платежи');
define('GLOBALMSG_RECORD_PAYMENT_DATE','Дата платежа');
define('GLOBALMSG_RECORD_PAID','');
define('GLOBALMSG_RECORD_THE_MANY','Записи');
define('GLOBALMSG_RECORD_DELETE_OK_MANY','правильно удолён');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY','правильно удолёны');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY_2','The log records have been therefore deleted');
define('GLOBALMSG_RECORD_THE','Запись');
define('GLOBALMSG_RECORD_DELETE_OK','правильно удолён');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG','правильно удолён из лог файла');
define('GLOBALMSG_RECORD_DELETE_NONE','Никакая запись была стёрта');
define('GLOBALMSG_RECORD_ADD_OK','правильно добавлен');
define('GLOBALMSG_RECORD_ADD_NONE','Никакая запись не была добавленна');
define('GLOBALMSG_RECORD_EDIT_OK','правильно изменена');
define('GLOBALMSG_RECORD_EDIT_NONE','никакая запись не изменена');
define('GLOBALMSG_RECORD_EDIT_NOT_DONE','не изменена');
define('GLOBALMSG_RECORD_TITLE_FOR','Записи на');
define('GLOBALMSG_RECORD_TITLE_FOR_NOT_IN_ADDRESSBOOK','Записи людей не в записной книжке');
define('GLOBALMSG_RECORD_TITLE_FOR_TYPE','Записи для людей тип');
define('GLOBALMSG_RECORD_TITLE_INCOME_TYPE','Входящий тип');
define('GLOBALMSG_RECORD_TITLE_INCOME','Входящий');
define('GLOBALMSG_RECORD_TITLE_ALL','Все записи');
define('GLOBALMSG_REPORT_ACCOUNT','Счёт');
define('GLOBALMSG_REPORT_GENERATE','Показывает записи');
define('GLOBALMSG_REPORT_PERIOD','Период записей');

define('GLOBALMSG_STATS_DISHES_ORDERED','Заказанные блюда');
define('GLOBALMSG_STATS_INGREDIENTS_ADDED','Добавленны ингредьенты');
define('GLOBALMSG_STATS_INGREDIENTS_REMOVED','Уничтоженные ингредьенты');
define('GLOBALMSG_STATS_MYSQL_TIME','секунд потраченно на запрос mySQLа');
define('GLOBALMSG_STATS_RECORDS_SCANNED','записи пройденны');
define('GLOBALMSG_STATS_TOTAL_DEPTS','Итог отдела');
define('GLOBALMSG_STATS_TOTAL_PERIOD','Итог периода');
define('GLOBALMSG_STOCK_ADD_OK','Товар правильно внесён');
define('GLOBALMSG_STOCK_ADD_ERROR','Произошла ошибка при введении нового товара');
define('GLOBALMSG_STOCK_ITEM_ADD','добавь новый товар');
define('GLOBALMSG_STOCK_ITEM_NAME','Название товара');
define('GLOBALMSG_STOCK_ITEM_INITIAL_QUANTITY','Начальное кол.во');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT','Внеси движение склада');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT_ERROR','Ошибка во внесении нового движения склада');

define('MSG_WAITER_NOT_CONNECTED_ERROR','Ошибка: Ты не подключен.');

define('GLOBALMSG_WAITER_LANGUAGE','Язык (интернациональный формат из 2х букв: прим. en, it, de, ru, ...)'); 

$msg_admin_confirm_reset_orders="
<b>Ты хочеш анулировать ВСЕ заказы?</b><br>
Эта <b>безвозвратная</b>  опирация удолит все заказы взятые до настоящего времени.";
$msg_admin_confirm_reset_sources="
<b>Ты хочеш анулировать ВСЕ столы?</b><br />
Эта <b>безвозвратная</b>  опирация удолит <b>даже</b> все заказы взятые до настоящего времени";
$msg_admin_confirm_reset_access_times="
<b>Ты хочеш опорожнить ВСЁ время входа?</b><br>
Эта <b>безвозвратная</b>  опирация удолит все барьеры столов.<br/>
Употребление этой функции советуется только во время изминения часов сисьтемы.";
$msg_reset_orders="Анулируй все заказы";
$msg_reset_access_times="Анулируй всё время входа";
$msg_reset_sources="Анулируй все столы";
$but_reset_access_times="Анулируй";
$but_reset_orders="Анулируй";
$but_reset_sources="Анулируй";
$msg_reset_access_times_ok="Все времена входа анулированы";
$msg_reset_orders_ok="Все заказы анулированы";
$msg_reset_sources_ok="Все столы и заказы анулированы";
$msg_admin_confirmhalt="Хочешь выключить центральный компютер?";
$msg_halt="Выключи компютер";
$but_halt="Выключай";
?>