<?php

require_once __DIR__ . '/../helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deadline = $_POST['date_input'] ?? '';

    if (isset($deadline)) {
        $deadline = null;
    }

    $description = $_POST['text_input'] ?? '';
    saveButton($deadline, $description);
}

redirect('/home.php');