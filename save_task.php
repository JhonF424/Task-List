<?php

require("db.php");

if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql_insert = "INSERT INTO task(title, description) VALUES ('$title', '$description')";

    if ($conn->query($sql_insert) === true) {
    } else {
        die("Error al insertar datos: " . $conn->error);
    }

    $_SESSION['message'] = 'Task saved successfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

?>