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

define('GLOBALMSG_CONFIG_FILE_NOT_WRITEABLE','File konfigurasi (conf/config.inc.php) tidak memiliki hak tulis (not writeable). Sistim tidak dapat bekerja tanpa file tersebut.<br>Periksalah apakah file tersebut ada dan memiliki hak tulis atau apakah direktori conf/ memiliki hak tulis.<br>Ingatlah bahwa file/dir harus bisa ditulis untuk user yang menjalankan web server.');
define('GLOBALMSG_CONFIG_OUTPUT_FILES_NOT_WRITEABLE','Pesan kesalahan atau file log debugging tidak dapat ditulis.<br>Untuk berjalan dengan baik, My Handy Restaurant (user yang menjalankan web server) membutuhkan hak untuk menulis ke file-file tersebut.<br>Periksalah apakah file tersebut tidak read-only dan ada, atau direktori tempat mereka berada tidak read-only, sehingga My Handy Restaurant dapat membuat file-file tersebut.');
define('GLOBALMSG_CONFIG_SYSTEM','<a href="../conf/index.php">Konfigurasi My handy Restaurant</a>');
define('GLOBALMSG_CONFIGURE_DATABASES','<a href="../admin/databases.php">Konfigurasi database My handy Restaurant</a>');
define('GLOBALMSG_DB_CONNECTION_ERROR','Error: ada kesalahan saat menghubungi server database: periksalah config.inc.php anda, dan periksa pula apakah databasenya sudah bekerja.');
define('GLOBALMSG_DB_NO_TABLES_ERROR','Error: tidak ada tabel dalam database, tidak mungkin melanjutkan proses.');
define('GLOBALMSG_NO_ACCOUNTING_DB_FOUND','Error: tidak ada database akuntansi, tidak mungkin untuk melanjutkan proses.<br> My Handy Restaurant membuthkan satu database biasa dan setidaknya satu database akunting untuk bekerja.');

define('GLOBALMSG_ACTION_IS_DEFINITIVE','Aksi ini <b>definitive</b>'); 

define('GLOBALMSG_FROM','dari');
define('GLOBALMSG_FROM_TIME','dari');
define('GLOBALMSG_FROM_DAY','dari');

define('GLOBALMSG_GO_BACK','Kembali');

define('GLOBALMSG_INSERTING','Masukkan');
define('GLOBALMSG_ITEM','Item');
define('GLOBALMSG_INVOICE','Invoice');
define('GLOBALMSG_INVOICE_ASSOCIATED','Associated Invoice');
define('GLOBALMSG_INVOICE_PAID','Lunas');

define('GLOBALMSG_INDEX_WHO_ARE_YOU','Siapakah anda?');
define('GLOBALMSG_INDEX_SUBMIT','Enter');

define('GLOBALMSG_NAME','Nama');
define('GLOBALMSG_NO','No');
define('GLOBALMSG_NONE_FEMALE','None');
define('GLOBALMSG_NOTE','Catatan');
define('GLOBALMSG_NOTE_UPDATE','Update note');

define('GLOBALMSG_ONLY','hanya');
define('GLOBALMSG_OF_DAY','of');
define('GLOBALMSG_OR','atau');
define('GLOBALMSG_OTHER_FILE','File Lain');
define('GLOBALMSG_OUTGOING_MANY','outgoing');

define('GLOBALMSG_PAGE_TIME','detik untuk membangun halaman ini');
define('GLOBALMSG_PHONE','Telepon');
define('GLOBALMSG_PLACE','tempat');
define('GLOBALMSG_POS_CIRCUIT_FILE','POS circuit file');
define('GLOBALMSG_PRICE','Harga'); 
define('MSG_PAPER_PRINT_REMOVE','REMOVED');
define('MSG_PAPER_PRINT_TABLE','Meja');
define('MSG_PAPER_PRINT_PRIORITY','Prioritas');
define('MSG_PAPER_PRINT_WAITER','Waiter');
define('MSG_PAPER_PRINT_DISCOUNT','Discount');
define('MSG_PAPER_PRINT_TAXABLE','Kena Pajak (Taxable)');
define('MSG_PAPER_PRINT_TAX','Pajak');
define('MSG_PAPER_PRINT_TAX_TOTAL','Total Pajak');
define('MSG_PAPER_PRINT_CURRENCY','IDR');
define('MSG_PAPER_PRINT_TOTAL','Total');
define('MSG_PAPER_PRINT_BILL','Bill');
define('MSG_PAPER_PRINT_INVOICE','Invoice');
define('MSG_PAPER_PRINT_RECEIPT','Tanda Terima');
define('MSG_PAPER_PRINT_NUMBER_ABBREVIATED','n.');
define('MSG_PAPER_PRINT_A_LOT','BANYAK');
define('MSG_PAPER_PRINT_FEW','SEDIKIT');
define('MSG_PAPER_PRINT_ATTENTION','PERHATIAN');
define('MSG_PAPER_PRINT_WAIT','TUNGGU');
define('MSG_PAPER_PRINT_GO','Go dengan');
define('MSG_PAPER_PRINT_GO_NOW','Go sekarang');
define('GLOBALMSG_PAPER_PRINT_TAKEAWAY','Takeaway');
define('GLOBALMSG_PERIOD','periode');

define('GLOBALMSG_QUANTITY','Jumlah');

define('GLOBALMSG_RECEIPT_ID','Id');
define('GLOBALMSG_RECEIPT_ID_INTERNAL','Internal Id');
define('GLOBALMSG_RECEIPT_ANNULLED_RECEIPT','Tanda terima dibatalkan');
define('GLOBALMSG_RECEIPT_ANNULLED_INVOICE','Invoice dibatalkan');
define('GLOBALMSG_RECEIPT_ANNULLED_BILL','Bill dibatalkan');
define('GLOBALMSG_RECEIPT_ANNULL_CONFIRM','Apakah anda yakin untuk menghapus rekord berikut DAN semula catatan log yang berhubungan?<br>TOperasi ini <b>tidak dapat kembali/dibatalkan</b>.');
define('GLOBALMSG_RECEIPT_ID_INTERNAL','Internal Id');

define('GLOBALMSG_RECORD_ANNULL','Rekord yang dibatalkan (Annull record)');
define('GLOBALMSG_RECORD_ANNULLED','Dibatalkan');
define('GLOBALMSG_RECORD_ANNULLED_ABBREVIATED','BATAL');
define('GLOBALMSG_RECORD_NONE_SELECTED_ERROR','Tidak ada rekord yang dipilih');
define('GLOBALMSG_RECORD_NONE_FOUND_ERROR','Rekord tidak ditemukan');
define('GLOBALMSG_RECORD_NONE_FOUND_PERIOD_ERROR','Tidak ada rekord yang ditemukan dalam periode yang dipilih');
define('GLOBALMSG_RECORD_CHANGE_SEARCH','Coba untuk mengubah pencarian atau periode waktu');
define('GLOBALMSG_RECORD_DELETE_CONFIRM','Apakah anda yakin untuk menghapus rekord berikut?');
define('GLOBALMSG_RECORDS_DELETE_CONFIRM','Apakah anda yakin untuk menghapus rekord-rekord berikut ini?');
define('GLOBALMSG_RECORD_DELETE','Hapus rekord');
define('GLOBALMSG_RECORD_DELETE_SELECTED','Hapus rekord yang dipilih');
define('GLOBALMSG_RECORD_EDIT','Ubah rekord');
define('GLOBALMSG_RECORD_INSERT','Masukkan rekord');
define('GLOBALMSG_RECORD_OUTGOING','Outgoing');
define('GLOBALMSG_RECORD_INCOMING','Incoming');
define('GLOBALMSG_RECORD_INVOICE','Invoice');
define('GLOBALMSG_RECORD_POS','POS');
define('GLOBALMSG_RECORD_BILL','Tiket');
define('GLOBALMSG_RECORD_CHEQUE','Check');
define('GLOBALMSG_RECORD_RECEIPT','Tanda Terima');
define('GLOBALMSG_RECORD_DEPOSIT','Deposit');
define('GLOBALMSG_RECORD_WIRE_TRANSFER','Credit Transfer');
define('GLOBALMSG_RECORD_PAYMENT','Payment');
define('GLOBALMSG_RECORD_PAYMENT_DATE','Tanggal Pembayaran (Payment Date)');
define('GLOBALMSG_RECORD_PAID','Lunas');
define('GLOBALMSG_RECORD_THE_MANY','Rekord-rekord');
define('GLOBALMSG_RECORD_DELETE_OK_MANY','sudah dihapus dengan sukses');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY','sudah dihapus dari log dengan sukses');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG_MANY_2','Rekord log sudah terhapus');
define('GLOBALMSG_RECORD_THE','Rekord');
define('GLOBALMSG_RECORD_DELETE_OK','sudah dihapus dengan sukses');
define('GLOBALMSG_RECORD_DELETE_OK_FROM_LOG','sudah dihapus dari log dengan sukses');
define('GLOBALMSG_RECORD_DELETE_SELECTED','Hapus rekord yang dipilih');
define('GLOBALMSG_RECORD_DELETE_NONE','Tidak ada voice yang dihapus');
define('GLOBALMSG_RECORD_ADD_OK','sudah ditambahkan dengan sukses');
define('GLOBALMSG_RECORD_ADD_NONE','Tidak ada voice yang ditambahkan');
define('GLOBALMSG_RECORD_EDIT_OK','sudah diubah dengan sukses');
define('GLOBALMSG_RECORD_EDIT_NONE','Tidak ada voice yang diubah');
define('GLOBALMSG_RECORD_EDIT_NOT_DONE','tidak diubah');
define('GLOBALMSG_RECORD_TITLE_FOR','Rekord untuk');
define('GLOBALMSG_RECORD_TITLE_FOR_NOT_IN_ADDRESSBOOK','Rekord untuk orang yang tidak ada dalam addressbook');
define('GLOBALMSG_RECORD_TITLE_FOR_TYPE','Rekord untuk tipe orang');
define('GLOBALMSG_RECORD_TITLE_INCOME_TYPE','Income of type');
define('GLOBALMSG_RECORD_TITLE_INCOME','Income');
define('GLOBALMSG_RECORD_TITLE_ALL','Semua rekord');
define('GLOBALMSG_RECORD_PRINTABLE','Versi yang dapat dicetak (trial)');
define('GLOBALMSG_RECORD_TABLE_','Versi yang dapat dicetak (trial)');
define('GLOBALMSG_REPORT_ACCOUNT','Account');
define('GLOBALMSG_REPORT_GENERATE','Buat Laporan');
define('GLOBALMSG_REPORT_PERIOD','Periode Laporan');

define('GLOBALMSG_STATS','Statistik');
define('GLOBALMSG_STATS_DISHES_ORDERED','Hidangan yang dipesan');
define('GLOBALMSG_STATS_INGREDIENTS_ADDED','Bahan/Ingredient yang ditambahkan');
define('GLOBALMSG_STATS_INGREDIENTS_REMOVED','Bahan/Ingredient yang dibuang');
define('GLOBALMSG_STATS_MYSQL_TIME','detik yang dibutuhkan untuk queri MySQL');
define('GLOBALMSG_STATS_RECORDS_SCANNED','rekord scanned');
define('GLOBALMSG_STATS_TOTAL_DEPTS','Total Departemen');
define('GLOBALMSG_STATS_TOTAL_PERIOD','Total periode');
define('GLOBALMSG_STOCK_ADD_OK','Item baru ditambahkan dengan sukses');
define('GLOBALMSG_STOCK_ADD_ERROR','Ada kesalahan saat insert item baru');
define('GLOBALMSG_STOCK_ITEM_ADD','Tambahkan item baru');
define('GLOBALMSG_STOCK_ITEM_NAME','Nama Item');
define('GLOBALMSG_STOCK_ITEM_INITIAL_QUANTITY','Jumlah awal');
define('GLOBALMSG_STOCK_MOVEMENTS','Pergerakan Stok (Stock movements)');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT','Masukkan stock movement');
define('GLOBALMSG_STOCK_MOVEMENT_INSERT_ERROR','Error memasukkan stock movement baru');
define('GLOBALMSG_STOCK_MOVEMENT_NONE_ASSOCIATED_TO_INVOICE','Tidak ada stock movement yang berhubungan dengan invoice');
define('GLOBALMSG_STOCK_SEND_TO','Kirim ke stock');
define('GLOBALMSG_STOCK_SITUATION','Situasi Stock');
define('GLOBALMSG_STOCK_DATA_UPDATE','Update data');
define('GLOBALMSG_STOCK_UPDATE_ERROR','Error updating data stock');
define('GLOBALMSG_STOCK_UPDATE_OK','Stock sukses ditambahkan');
define('GLOBALMSG_SUPPLIER_FILE','File Supplier');

define('GLOBALMSG_TABLE','Meja'); 
define('GLOBALMSG_TABLES','Meja-meja'); 
define('GLOBALMSG_TABLE_NONE_FOUND','Meja tidak ditemukan'); 
define('GLOBALMSG_TABLE_NONE_SELECTED','Tidak ada meja yang dipilih'); 
define('GLOBALMSG_TABLE_THE','Meja'); 
define('GLOBALMSG_TABLE_ID','Id (ordering number)'); 
define('GLOBALMSG_TABLE_INSERT_NEW','Masukkan meja baru'); 
define('GLOBALMSG_TABLE_INSERT','Masukkan Meja'); 
define('GLOBALMSG_TABLE_UPDATE','Ubah meja'); 
define('GLOBALMSG_TABLE_DELETE','Hapus meja'); 
define('GLOBALMSG_TABLE_NUMBER','Nomor atau Nama (displaid)'); 
define('GLOBALMSG_TABLE_TABLE_ID','Id'); 
define('GLOBALMSG_TABLE_TABLE_NUMBER','Nomor/Nama'); 
define('GLOBALMSG_TABLE_TAKEAWAY','Takeaway'); 
define('GLOBALMSG_TAXABLE','Kena Pajak (Taxable)');
define('GLOBALMSG_TAX','Pajak');
define('GLOBALMSG_TAX_NUMBER','Nomor Pajak');
define('GLOBALMSG_TAX_MANY','Pajak');
define('GLOBALMSG_TAX_TO_PAY','Untuk periode yang dipilih, pajak yang harus dibayar adalah');
define('GLOBALMSG_TAX_TO_PAY_INVOICE_EXCLUDED','excluding not paid invoices');
define('GLOBALMSG_TAX_TO_PAY_INVOICE_INCLUDED','including not paid invoices');
define('GLOBALMSG_TIME','Waktu');
define('GLOBALMSG_TYPE','Tipe');
define('GLOBALMSG_TO','to');
define('GLOBALMSG_TO_DAY','to');
define('GLOBALMSG_TO_TIME','to');
define('GLOBALMSG_TOTAL','total');

define('GLOBALMSG_VAT_ACCOUNT','Account PPn (VAT Account)');
define('GLOBALMSG_VAT_CALCULATION','Perhitungan PPn (VAT)');

define('MSG_WAITER_NOT_CONNECTED_ERROR','Error: Anda tidak terhubung.');
define('MSG_WAITER_CLICK_TO_CONNECT','Connect.<br>');

define('GLOBALMSG_WAITER','Waiter'); 
define('GLOBALMSG_WAITERS','Waiters'); 
define('GLOBALMSG_WAITER_NONE_FOUND','Waiter tidak ditemukan'); 
define('GLOBALMSG_WAITER_NONE_SELECTED','Tidak ada waiter yang dipilih'); 
define('GLOBALMSG_WAITER_THE','Waiter'); 
define('GLOBALMSG_WAITER_NAME','Nama'); 
define('GLOBALMSG_WAITER_LANGUAGE','Bahasa (international format 2 karakter: eg. en, it, de, ...)'); 
define('GLOBALMSG_WAITER_CAN_OPEN_CLOSED_TABLES','Dapat membuka meja yang sudah closed (dan mengubah harga hidangan umum)'); 
define('GLOBALMSG_WAITER_INSERT_NEW','Masukkan waiter baru'); 
define('GLOBALMSG_WAITER_INSERT','Masukkan waiter'); 
define('GLOBALMSG_WAITER_UPDATE','Ubah waiter');
define('GLOBALMSG_WAITER_DELETE','Hapus waiter');
define('GLOBALMSG_WAITER_TABLE_NAME','Nama');
define('GLOBALMSG_WAITER_TABLE_LANGUAGE','Bahasa');
define('GLOBALMSG_WAITER_TABLE_CAN_OPEN_CLOSED_TABLES','Dapat membuka meja yang telah closed');
define('GLOBALMSG_WEBSITE','Web site');

define('GLOBALMSG_YES','Ya');

?>