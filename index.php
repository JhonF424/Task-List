<?php

include("db.php");

?>

<?php

include("includes/header.php");

?>

<?php

include("includes/navigation.php");

?>

<div class="container pt-5">

    <div class="row justify-content-center">
    
        <div class="col-md-4">

        <?php if (isset($_SESSION['message'])) {?>
            
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
                <?php  session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">

                    <div class="form-group">
                        <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group py-2">
                        <textarea name="description" rows="5" placeholder="Task Description" class="form-control"></textarea>
                    </div>
                    <input type="submit" name="save_task" value="Save" class="btn btn-success btn-block w-100">

                </form>
            </div>
        </div>

        <div class="col-md-8">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $sql_read = "SELECT * FROM task";
    $result = mysqli_query($conn, $sql_read);

    
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td>
                <a href="edit_task.php?id=<?php echo $row['id'] ?>" class="btn btn-success"> 
                    <i class="fas fa-edit"> </i>
                </a>
            </td>
            <td>
                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"> 
                    <i class="fas fa-trash-alt"> </i>
                </a>
            </td>
            </tr>

       <?php }   ?>
  </tbody>
</table>
        </div>



    </div>

    

</div>


<?php

include("includes/footer.php");

?>


