<!--Теперь таб вставляет 4 пробела-->
document.getElementById("inputTextInTask").addEventListener("keydown", function (e) {
    if (e.key === "Tab") {
        e.preventDefault();
        document.execCommand("insertText", false, "    ");
    }
});

<!--добавляет скрытому элементу значение дива, чтобы потом передать его в форму-->
document.getElementById("task_id_update").addEventListener("submit", function () {
    document.getElementById("hiddenDescription").value =
        document.getElementById("inputTextInTask").innerHTML;
});