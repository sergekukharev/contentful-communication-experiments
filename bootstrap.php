<?php

require __DIR__ . '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env') && getenv('ENV') !== 'production') {
	$dotenv = new Dotenv\Dotenv(__DIR__);
	$dotenv->load();
}
