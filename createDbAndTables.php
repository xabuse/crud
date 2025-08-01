<?php

// Если нет бд crudDb - создать
$conn = new PDO("mysql:host=db", "root", "1234");
$conn->exec("CREATE DATABASE IF NOT EXISTS crudDB");
$conn = null;


// Если нет crudDB users - создать
$conn = new PDO("mysql:host=db;dbname=crudDB", "root", "1234");
$conn->exec('
    CREATE TABLE IF NOT EXISTS users(
    id integer auto_increment primary key,
    name varchar(255) default null,
    email varchar(255) default null unique,
    password varchar(255))
');