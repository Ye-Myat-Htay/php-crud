<?php

include("connect.php");
session_start();

$titleErr = '';
$descErr = '';

if(isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $query = "SELECT * FROM posts WHERE id=$post_id";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1) {
        foreach($result as $row) {
            $titleId = $row['id'];
            $title = $row['title'];
            $desc  = $row['description'];
        }
    }
}

if(isset($_POST['update_button'])) {
    $postId = $_POST['post_id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];

    if(empty($title)) {
        $titleErr = "Title field is required";
    }
    if(empty($desc)) {
        $descErr = "Description field is required";
    }
    if(!empty($title) && !empty($desc)) {
        $query = "UPDATE posts SET title='$title', description='$desc' WHERE id=$postId";
        $result = mysqli_query($db, $query);
        $_SESSION['successMsg'] = "A post updated successfully";
        header('location:index.php');
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">Posts Edit Form</div>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php" class="btn btn-secondary float-right"><< Back</a>
                            </div>
                        </div>
                    </div>
                    <form action="edit.php" method="post">
                        <div class="card-body">
                            <!-- updateId -->
                            <input type="hidden" name="post_id" value="<?= $titleId ?>">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control <?php if($titleErr != ''): ?> is-invalid <?php endif ?>" name="title" placeholder="Enter Title" value="<?= $title ?>">
                                <span class="text-danger"><?= $titleErr ?></span>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control <?php if($descErr != ''): ?> is-invalid <?php endif ?>" placeholder="Enter Description..."><?= $desc ?> </textarea>
                                <span class="text-danger"><?= $descErr ?></span>
                            </div>
                            <div class="card-footer">
                                <button name="update_button" class="btn btn-primary mt-3">Update</button>
                            </div>   
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>