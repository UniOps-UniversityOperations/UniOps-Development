
<?php

    // The initial file that is loaded by the web server.
    // This can redirect any other file, or load a template file.
    // The entry point for the application.

    // spl_autoload_register(function($class_name)
    // {
    //     $exceptions = [];

    //     if(in_array($class_name, $exceptions)) {
    //         $file_path = "../app/controllers" . $class_name . ".php";
    //     } else {
    //         $file_path = "../app/models/timetables" . $class_name . ".model.php";
    //     }

    //     if(file_exists($file_path)) {
    //         require $file_path;
    //     }
    // });

    // Load Helpers
    require_once 'helpers/URL_Helper.php';
    require_once 'helpers/Session_Helper.php';

    // Load Config
    require_once 'config/config.php';

    // Libraries
    require_once 'libraries/Core.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Database.php';
