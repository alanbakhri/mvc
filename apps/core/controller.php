<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller
{
    protected $load;
    private static $instance;
    public $config;

    public function __construct()
    {
        self::$instance = $this;

        require_once BASEPATH . 'core/loader.php';
        require_once BASEPATH . 'core/config.php';

        $this->load = new Loader();
        $this->config = new Config();

        if (!$this->config->item('site_open')) {
            show_error('Maaf, Web ini sedang dalam perbaikan!');
        }

        if ($this->config->item('use_datebase')) {
            spl_autoload_register('load_db');
        }

        //Bisa menambahkan librari lain disini
    }

    public function &get_instance()
    {
        return self::$instance;
    }
}



function &get_instance () {
    return Controller::get_instance();
}

function base_url ($clear = false) {
    $CI =& Controller::get_instance();

    if ($clear) {
        return $CI->config->item('base_url');
    }

    return $CI->config->item('base_url') . 'index.php/';
}

function load_db() {
    require BASEPATH . 'core/database.php';
}

function redirect($uri = '', $method = 'location', $http_response_code = 302) {
    if (!preg_match('#^https?://#i', $uri)) {
        $uri = site_url($uri);
    }

    switch($method){
        case 'refresh' : header("refresh:0;url=" . $uri);
            break;
        default : header("Location: ". $uri, TRUE, $http_response_code);
            break;
    }
    exit;
}

/**
 * akhir flie controller.php
 * lokasi ./controller.php
 */
