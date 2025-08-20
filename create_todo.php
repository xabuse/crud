<?php

require_once __DIR__ . '/src/helpers.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create_todo</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

<div class="header">
    <div class="test_container">

        <form method="POST" action="/">
            <button class="btn" id="home" type="submit" name="action" value="home_button">< Home</button>
        </form>

        <div class="container">
            <form id="myForm" method="POST" action="/src/actions/createToDoButton.php">
                <button class="btn">save</button>
            </form>
        </div>

    </div>
</div>

<!--main-->
<div class="container">
    <p>input date(time-limit):</p>
    <label>
        <input type="date" form="myForm" class="date_input" name="date_input">
    </label>
</div>

<div class="container_column">
    <p>input text:</p>
    <label>
        <textarea form="myForm" class="text_input" cols="30" rows="10" name="text_input"></textarea>
    </label>
</div>

</body>
</html>
