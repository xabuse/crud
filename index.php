<?php

require_once __DIR__ . '/src/createDbAndTables.php';

require_once __DIR__ . '/src/helpers.php';

checkGuest();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

<div class="login_container">
<form class="" action="src/actions/login.php" method="post">
    <div class="login_container_column">

        <p>Вход</p>

        <?php if (hasMessage('error')): ?>
            <div class="notice error"><p><?php echo getMessage('error') ?></p></div>
        <?php endif; ?>


        <label for="email">E-mail
            <input class="label_text_input" type="text" id="email" name="email"
                   value="<?php echo old('email') ?>" <?php echo validationErrorAttr('email') ?>>

            <?php if (hasValidationError('email')): ?>
                <p><?php echo validationErrorMessage('email'); ?></p>
            <?php endif; ?>

        </label>

        <label for="password">
            Пароль
            <input class="label_text_input" type="password" id="password" name="password">
        </label>

        <button type="submit" id="submit" class="border_btn_login">Продолжить</button>
        
        <p>У меня еще нет <a href="/register.php">аккаунта</a></p>
    </div>
</form>
</div>

</body>
</html>