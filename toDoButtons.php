<?php

require_once __DIR__ . '/src/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deadline = $_POST['date_input'] ?? '';
    $description = $_POST['text_input'] ?? '';
    saveButton($deadline, $description);
}

redirect('/home.php');