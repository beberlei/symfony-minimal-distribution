<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../app/AppKernel.php";

use Symfony\Component\HttpFoundation\Request;
use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__ . '/../');
$dotenv->load();

$request = Request::createFromGlobals();
$kernel = new AppKernel($_SERVER['SYMFONY_ENV'], (bool)$_SERVER['SYMFONY_DEBUG']);
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
