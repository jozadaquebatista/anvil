<?php

namespace Knot\Anvil\Controllers;

use \Knot\Anvil\Framework\Views;

class Dashboard {

    public function __construct() {
        Views::render('page-dashboard');
    }
}