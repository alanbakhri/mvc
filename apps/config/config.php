<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

$config['site_open'] = TRUE;

$config['use_database'] = TRUE;


/**
 * dinamic Base Url
 */
if (isset($_SERVER['HTTP_HOST'])) {
    $config['base_url'] = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ? 'https' : 'http';
    $config['base_url'] .= './/' . $_SERVER['HTTP_HOST'];
    $config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
} else {
    $config['base_url'] = '';
}


/**
 * default controller
 */
$config['default_controller'] = '';

/**
 * akhir file config.php
 * lokalsi ./config.php
 */
