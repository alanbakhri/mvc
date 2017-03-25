<?php
error_reporting(E_ALL);

/**
 * [$application_folders description]
 * @var string
 * nama folder aplikasi
 */
$application_folders = 'apps';


/**
 * [ROOT description]
 * @var cont string path
 * Ganti pemisah direktori pada unix untuk konsistensi
 */
define('ROOT',  str_replace("\\", "/", realpath(dirname(__FILE__))) . '/');


/**
 * [BASEPATH description]
 * @cont cont string path
 * Menentukan BASEPATH sebagai root aplikasi
 */
define('BASEPATH', ROOT . $application_folders . '/');


/**
 * awal output buffering
 */
ob_start();
session_start();



/**
 * [$router description]
 * @var Router
 * menjalankan program melalui router
 */
require_once BASEPATH . 'core/router.php';

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

$router = new Router();

$router->do_request();


/**
 * akhiri output buffering
 */
@ob_end_flush();


/**
 *
 */
function show_error($message = '')
{
    ob_end_clean();

    $error = '<html><head><title>Error</title>';
    $error .= '<style type="text/css">';
    $error .= 'html{box-sizing:border-box;}*,*:before,*:after{box-sizing:inherit;padding:0;margin:0;}body{font-family:sans-serif;color:#333;}';
    $error .= '#error{padding:10px;margin:50px auto;width:100%;max-width:600px;border:2px solid crimson;}';
    $error .= '</style>';
    $error .= '</head><body><div id="error">';
    if ($message == ''){
        $message = '<b>404 Page Not Found!</b>';
    }
    $error .= $message;
    $error .= '</div></body></html>';
    exit($error);
}
