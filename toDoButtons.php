<?php

require_once __DIR__ . '/src/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date_input = $_POST['date_input'] ?? '';
    $text_input = $_POST['text_input'] ?? '';

    echo $date_input . '    ' . $text_input;
}