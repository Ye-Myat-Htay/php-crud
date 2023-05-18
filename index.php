<?php
include("connect.php");
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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
                                <div class="card-title">Posts List</div>
                            </div>
                            <div class="col-md-6">
                                <a href="create.php" class="btn btn-primary float-right">+ Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['successMsg'])): ?>
                        <div class="alert alert-success alert-dissmissible fade show" role="alert" >
                            <?php echo $_SESSION['successMsg'];
                                    unset($_SESSION['successMsg']); ?>
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                        <?php endif ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_query = "SELECT * FROM posts";
                                $result = mysqli_query($db, $select_query); 
                                foreach($result as $row):  {
                                    $post_id = $row['id'];
                                    $title = $row['title'];
                                    $desc = $row['description'];
                                }
                                ?>
                                <tr>
                                    <td><?= $post_id ?></td>
                                    <td><?= $title ?></</td>
                                    <td><?= $desc ?></</td>
                                    <td>
                                        <a href="edit.php?post_id=<?= $post_id ?>" class="btn btn-success">Edit</a>
                                        <a href="delete.php?post_delete=<?= $post_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        <table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>