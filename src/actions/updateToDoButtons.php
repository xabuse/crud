<?php

require_once __DIR__ . '/../helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_id_delete'])) {
    $id = $_POST['task_id_delete'];
    deleteToDoFromDb($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_id_update'])) {
    $id = $_POST['task_id_update'] ?? '';
    $timeLimit = $_POST['time_limit'] ?? '';
    $description = $_POST['description'] ?? '';
    updateToDoInDb($id, $timeLimit, $description);
}

redirect('/home.php');