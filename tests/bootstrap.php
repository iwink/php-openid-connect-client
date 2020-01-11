<?php
require __DIR__ . '/../init_autoload.php';

// Do not fail on deprecation warnings
PHPUnit_Framework_Error_Deprecated::$enabled = false;

define('TESTS_ROOT', __DIR__);