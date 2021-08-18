<?php

require("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql_edit = "SELECT * FROM task WHERE id = $id";

    $result = mysqli_query($conn, $sql_edit);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update_task'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);


    $_SESSION['message'] = 'Task updated successfully';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}


?>

<?php require("includes/header.php"); ?>

<?php require("includes/navigation.php") ?>

<div class="container pt-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update the title" autocomplete="off" autofocus>
                    </div>
                    <div class="form-group py-2">
                        <textarea name="description" rows="5" class="form-control"> <?php echo $description; ?> </textarea>
                    </div>
                    <input type="submit" name="update_task" value="Update" class="btn btn-success btn-block w-100">
                </form>
            </div>
        </div>
    </div>
</div>

<?php require("includes/footer.php"); ?>