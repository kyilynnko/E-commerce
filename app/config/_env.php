<?php

use Dotenv\Dotenv;

// Specify the directory containing your .env file
$dotenv = Dotenv::createImmutable(APP_ROOT);

// Load the environment variables
$dotenv->load();


?>