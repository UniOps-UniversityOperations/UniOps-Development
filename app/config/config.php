<?php

//Database configaration
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_NAME', getenv('DB_NAME'));

//APP ROOT
define('APPROOT', dirname(dirname(__FILE__)));

//URL ROOT
define('URLROOT', getenv('URLROOT'));

//Website Name
define('SITENAME', 'UniOps');
