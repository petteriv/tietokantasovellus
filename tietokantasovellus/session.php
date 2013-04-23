<?php

class Session {
    public function __construct() {
        session_start();
    }
    
    public function __isset($key) {
        return isset($_SESSION[$key]);
    }
    
    public function __unset($name) {
        unset($_SESSION[$name]);
    }
    
    public function __set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public function __get($key) {
        if ($this->__isset($key)) {
            return $_SESSION[$key];
        }
        return null
        ;
    }
}
$session = new Session();
?>
