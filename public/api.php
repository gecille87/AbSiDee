<?php
require __DIR__ . '/../vendor/autoload.php';

use FlexiAPI\Core\FlexiAPI;

$config = require __DIR__ . '/../config/config.php';

$api = new FlexiAPI($config);
$api->handle(); // ✅ main FlexiAPI entry
