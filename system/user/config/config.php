<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['index_page'] = 'index.php';
$config['site_license_key'] = '';
$config['save_tmpl_files'] = 'y';
// ExpressionEngine Config Items
// Find more configs and overrides at
// https://docs.expressionengine.com/latest/general/system-configuration-overrides.html

$config['app_version'] = '7.5.18';
$config['encryption_key'] = '549c6e65e8e104b3249df7c3f21c644e352c5058';
$config['session_crypt_key'] = '3be4bee571c98c6c42b75ec6240a7f232eee76ce';
$config['database'] = array(
	'expressionengine' => array(
		'hostname' => 'localhost',
		'database' => 'havee_nl',
		'username' => 'havee_nl',
		'password' => 'RLWLWNLR',
		'dbprefix' => 'exp7_',
		'char_set' => 'utf8mb4',
		'dbcollat' => 'utf8mb4_unicode_ci',
		'port'     => ''
	),
);
$config['show_ee_news'] = 'y';
$config['legacy_member_templates'] = 'y';
// EOF