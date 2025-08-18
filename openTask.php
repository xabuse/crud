<?php

require_once __DIR__ . '/src/helpers.php';

$id = $_POST['task_id'] ?? null;

// Вызов по id данных из бд

$description = dataFromDbById($id)['description'] ?? null;

$deadline = dataFromDbById($id)['deadline'] ?? null;

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

<div class="header">
    <div class="test_container">

        <div class="container_500_left">
            <form method="POST" action="/">
                <button class="btn" id="home" type="submit" name="action" value="home_button">< Home</button>
            </form>
        </div>

        <div class="container">
            <p>time-limit:
                <input
                        type="date"
                        class="date_input"
                        id="date"
                        name="trip-start"
                        value=<?php echo $deadline ?>
                />
            </p>
        </div>

        <div class="container_500_right">
            <form id="" method="POST" action="">
                <button class="btn">delete</button>
            </form>

            <form id="" method="POST" action="">
                <button class="btn">save</button>
            </form>
        </div>

    </div>
</div>

<main>

    <div class="container_1200">

        <?php echo '<p>' . $id . '</p>'; ?>

        <div contenteditable="true" class="inputTextInTask" id="inputTextInTask"><?php echo $description;?></div>
    </div>


</main>

</body>

<!--Теперь таб вставляет 4 пробела-->
<script>
    document.getElementById("inputTextInTask").addEventListener("keydown", function(e) {
        if (e.key === "Tab") {
            e.preventDefault();
            document.execCommand("insertText", false, "    ");
        }
    });
</script>
</html>
