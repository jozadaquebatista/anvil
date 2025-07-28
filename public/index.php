<?php

session_start();

require dirname(__DIR__) . '/vendor/autoload.php';

new \Knot\Anvil\Framework\Router(\Knot\Anvil\Controllers\Login::authenticated());