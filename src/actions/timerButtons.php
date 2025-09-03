<?php

require_once __DIR__ . '/../helpers.php';


// Start button timeStart = start(), isPause = 0
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'start_timer') {
    startButton();
}

// Pause button timerTime = time() - db timerTime - db timeStart, isPause = 1
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'pause_timer') {
    pauseButton();
}

// Reset button timerTime = 14400, isPause = 1
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'reset_timer') {
    resetButton();
}

redirect('/home.php');



