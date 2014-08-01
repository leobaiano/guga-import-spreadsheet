<?php

/*
Plugin Name: Guga Import Spreadsheet
Plugin URI: 
Description: Fork do plugin Spreadsheet ACF import, corrigindo erros e com melhorias após o abandono do autor original do projeto >> http://wordpress.org/plugins/spreadsheet-acf-import/
Version: 0.1
Author: Guga Alves
Author URI: http://www.tudoparawp.com.br
Plugin URI: 
License: GPL
*/


// noncekey
if (!defined('CSVAFNONCEKEY')) {
  define('CSVAFNONCEKEY', '_csvafnonce');
}

// Allowed file extensions.
$CSVAFALLOWEDEXT = array(
  'xlsx',  'xlsm',  'xls'
, 'ods',   'slk',   'csv'
);

define('CSVAFPLUGINPATH', plugin_dir_path(__FILE__));
define('CSVAFURL', plugin_dir_url(__FILE__));

require_once CSVAFPLUGINPATH . '/inc/controller.class.php';

CsvafController::$ALLOWEDEXT = $CSVAFALLOWEDEXT;

// Add the admin menu hook
add_action('admin_menu', array('CsvafController', 'Adminmenu'));
