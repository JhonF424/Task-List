<?php 

require("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM task WHERE id = $id";

    $result = mysqli_query($conn, $sql_delete);

    if(!$result){
        die("Error");
    }

    $_SESSION['message'] = 'Task removed successfully';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
}

?>