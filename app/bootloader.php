<!--The initial file that is loaded by the web server.-->
<!--This can redirect any other file, or load a template file.-->
<!--The entry point for the application.-->

<?php

    // Load Helpers
    require_once 'helpers/URL_Helper.php';
    require_once 'helpers/Session_Helper.php';

    // Load Config
    require_once 'config/config.php';

    require_once 'libaries/Core.php';
    require_once 'libaries/Controller.php';
    require_once 'libaries/Database.php';
