<?php

require_once __DIR__ . '/src/helpers.php';

chechAuth();

$user = currentUser();

?>

<!doctype html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="assets/app.css">
    <title>Document</title>
</head>
<body>

<p>q <?php echo  $user['name']  ?></p>

<form action="src/actions/logout.php" method="post">
    <button role="button">Выйти из аккаунта</button>
</form>

<script src="assets/app.js"></script>
</body>
</html>