<?php

namespace Knot\Anvil\Controllers;

use Knot\Anvil\Framework\Router;

class Login {

    private $name = 'Bowser Mad';
    private $login = "mariojumping.denied@bowser.com";
    private $senha = "password4test";

    public function __construct() {
        // echo var_dump($_SESSION);
    }

    public function auth() {

        if (isset($_POST['login']) && isset($_POST['senha'])) {
            if ($_POST['login'] == $this->login && $_POST['senha'] == $this->senha) {
                self::login(['name' => $this->name, 'login' => $this->login, 'role' => 'admin']);
            } else {
                echo 'Incorrect Login or Password!';
                return false;
            }
        }
    }

    public static function authenticated() {
        return isset($_SESSION['login']) && isset($_SESSION['role']);
    }

    public static function login($info) {
        $_SESSION['login'] = $info['login'];
        $_SESSION['name'] = $info['name'];
        $_SESSION['role'] = $info['role'];
        Router::navigate('/');
    }

    public static function logout() {
        session_destroy();
        Router::navigate('/');
    }
}