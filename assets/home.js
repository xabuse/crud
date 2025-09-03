function checkboxChanged(id) {

    const checkbox = document.getElementById('checkbox_' + id);
    if (checkbox.checked) {
        fetch('src/checkboxChecker.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'action=checkbox_checked&id=' + id
        });
    } else {
        fetch('src/checkboxChecker.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'action=checkbox_unchecked&id=' + id
        });
    }
}

function submitForm(id) {
    document.getElementById("form_task_" + id).submit();
}