<?php

include('connect.php');
session_start();

if(isset($_GET['post_delete'])) {
    $post_id_delete = $_GET['post_delete'];
    $query = "DELETE FROM posts WHERE id=$post_id_delete";
    mysqli_query($db, $query);
    // echo "<script>window.alert('A post deleted successfully')</script>";
    $_SESSION['successMsg'] = "A post deleted successfully";
    header('location:index.php');
}
