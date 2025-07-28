<?php

namespace Knot\Anvil\Framework;

class Views {
    public static function render($view, $data = []) {
        extract($data);

        $root = dirname(__DIR__);

        if(file_exists("$root/views/$view.php"))
            require_once "$root/views/$view.php";
        else
            echo "View $view not Found!";
    }
}