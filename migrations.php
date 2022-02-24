<?php

/**
 * User: Celio Natti
 * Date: 2/23/2022
 * Time: 8:21 AM
 */

use natoxCore\Application;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = new Application(__DIR__);

$app->db->applyMigrations();
