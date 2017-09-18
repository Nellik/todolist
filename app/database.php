<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
  'driver' => 'pgsql',
  'host' => '127.0.0.1',
  'port' => '5432',
  'username' => 'postgres',
  'password' => 'postgres',
  'database' => 'todolist',
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix' => ''
]);

$capsule->bootEloquent();
