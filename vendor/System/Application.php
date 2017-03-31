<?php

namespace System;

class Application
{
    /**
     * Container
     * @var array
     */
    private $container = [];

    /**
     * Constructor
     * @param \System\File $file
     */
    public function __construct (File $file)
    {
        $this->share('file', $file);
        $this->registerClasses();
    }

    /**
     * Register classes in spl_autolad_register
     * @return void
     */
    private function registerClasses()
    {
        spl_autoload_register([$this, 'load']);
    }

    /**
     * Load classes through autoloading
     * @param string $class
     * @return void
     */
    public function load($class)
    {
        if (strpos($class, 'App') === 0) {
            $file = $this->file->to($class . '.php');
        } else {
            $file = $this->file->toVendor($class . '.php');
        }

        if ($this->file->exists($file)) {
            $this->file->require($file);
        }
    }

    /**
     * Share the given key|value Through Application
     * @param string $key
     * @param string $value
     * @return mixed
     */
    public function share($key, $value)
    {
        $this->container[$key] = $value;
    }

    /**
     * Get shared value
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }

    /**
     * Get shared value dynamically
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }
}
