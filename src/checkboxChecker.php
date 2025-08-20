<?php

require_once __DIR__ . '/helpers.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'checkbox_checked') {
        $id = $_POST['id'];
        $isCheck = 1;
        echo 'checked: ' . $id;
        editCheckbox($id, $isCheck);
    } elseif ($_POST['action'] == 'checkbox_unchecked') {
        $id = $_POST['id'];
        $isCheck = 0;
        echo 'unchecked: ' . $id;
        editCheckbox($id, $isCheck);
    }
}
