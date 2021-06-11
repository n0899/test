<?php

define('class_path', __DIR__.'/classes/');

spl_autoload_register(
    function ($class_name) {
        if (is_file(class_path.$class_name.'.php')) {
            include_once class_path.$class_name.'.php';
        }
    }
);