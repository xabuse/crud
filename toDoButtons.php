<?php

require_once __DIR__ . '/src/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_button') {
    echo 'hiii';
}