<?php
/*

    bootstrap the application

 */
    use App\Core\App;

    App::bind('config',require('config.php'));
    App::bind('database',new QueryBuilder(
        Connection::make(App::get('config')['database'])
    ));

    function view($name,$data = null) {
        if(!!$data)
            extract($data);
        return require "views/{$name}.view.php";
    }

    function redirect( $uri ) {
        header("Location: /{$uri}");
    }