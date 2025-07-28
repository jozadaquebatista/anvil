<?php

/*
* definitions to internal apis
*/

use \Knot\Anvil\Framework\Router;

Router::get('/', 'Login');
Router::get('/logout', 'Login@logout');
Router::get('/dashboard', 'Dashboard');
Router::post('/login', 'Login@auth');