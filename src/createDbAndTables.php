<?php

// Если нет бд crudDb - создать
$conn = new PDO("mysql:host=db", "root", "1234");
$conn->exec("CREATE DATABASE IF NOT EXISTS crudDB");
$conn = null;


// Если нет таблицы users - создать
$conn = new PDO("mysql:host=db;dbname=crudDB", "root", "1234");
$conn->exec('
    CREATE TABLE IF NOT EXISTS users(
    id integer auto_increment primary key,
    name varchar(255) default null,
    email varchar(255) default null unique,
    password varchar(255))
');

// Если нет таблицы timer - создать
$conn->exec('
    CREATE TABLE IF NOT EXISTS timer(
    email varchar(255) primary key,
    timeStart integer default null,
    timerTime integer default 14400,
    isPause integer default 1)
');

// Если нет таблицы tasks - создать
$conn->exec('
    CREATE TABLE IF NOT EXISTS tasks(
    id integer auto_increment primary key,
    email varchar(255) not null,
    title varchar(255) default null,
    description varchar(10000) default null,
    deadline date default null,
    is_completed boolean default false)
');