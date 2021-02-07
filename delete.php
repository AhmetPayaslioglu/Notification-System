<?php 
include "connect.php";

global $connect;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM comments WHERE comment_id='$id'";
    mysqli_query($connect,$sql);

    header("Location: ".$_SERVER['HTTP_REFERER']);
}



?>