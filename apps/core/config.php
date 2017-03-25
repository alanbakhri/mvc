<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Config
{
    private $items = array();

    public function __construct()
    {
        require BASEPATH . 'config/config.php';
        $this->items = $config;
    }

    public function item($item)
    {
        if (isset($this->items[$item])) {
            return $this->items[$item];
        } else {
            return false;
        }
    }

    public function set_item($item, $value = '')
    {
        $this->items[$item] = $value;
    }

    public function unset_item($item)
    {
        unset($this->items[$item]);
    }
}

/**
 * akhir config.php
 * lokasi ./config.php
 */
