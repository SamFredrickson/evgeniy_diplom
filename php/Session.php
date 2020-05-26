<?php

class Session{
    public function __construct(){
        session_start();
    }

    private function initilize_user($login){
        if(!isset($_SESSION['login'])) $_SESSION['login'] = $login;
        if(!isset($_SESSION['id'])) $_SESSION['id'] = $GLOBALS['db']->getIdByLogin($login);
        if(!isset($_SESSION['role'])) $_SESSION['role'] = $GLOBALS['db']->getRoleByLogin($login);
        if(!isset($_SESSION['amount_items'])) $_SESSION['amount_items'] = $GLOBALS['db']->get_amount_items();
    }

    public function get_session_info(){
        return json_encode($_SESSION);
    }

    public function login($login, $password){
        if(!$GLOBALS['db']->validate_user($login, $password))
            echo 0;
        else 
            $this->initilize_user($login);
    }
}