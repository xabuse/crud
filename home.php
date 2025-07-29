<?php

require_once __DIR__ . '/src/helpers.php';

checkAuth();

$user = currentUser();

?>

<!doctype html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php' ?>
<body>

<p>q <?php echo  $user['name']  ?></p>

<form action="src/actions/logout.php" method="post">
    <button role="button">Выйти из аккаунта</button>
</form>

<script src="assets/app.js"></script>
</body>
</html>