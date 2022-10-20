<?php

// konfiguracja bazy danych
// CREATE TABLE users(id  serial PRIMARY KEY, content json, send_email boolean, date_create timestamp default now());
$pdo = new PDO('pgsql:host=...;dbname=...', '...', '...'); // TODO

$valid_conf = [
    'first_name'      => '/.+/i', // TODO
    'last_name'       => '/.+/i', // TODO
    'email'           => '/.+@.+/', // TODO
    'description'     => '/.*/', // TODO
    'position'        => '/(tester|developer|pm)/',
    'know_selenium'   => '/true/',
    'know_mysql'      => '/true/',
    'know_scrum'      => '/true/',
];