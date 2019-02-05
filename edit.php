<?php

    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE TASK SET title = '$title', description = '$description' WHERE id = '$id' ";
        mysqli_query($con,$query);

        $_SESSION['message'] = "Task Update";
        $_SESSION['message_type'] = "warning";
        header("Location:index.php");

    }
?>

<?php include("includes/header.php"); ?>

<div class="container m-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="update title" value="<?php echo $title; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="update description"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-warning btn-block" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>