<?php
    $model = new Model();
    $option = Model::getoption();
    //define('URL', 'http://digitalocean.tv/');
    define('URL', $option['main_domain']);
    define('MYURL', '/');
    define('menu_color', $option['menu_color']);
    define('body_color', $option['body_color']);


?>