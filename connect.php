<?php 
//connect.php;
$connect = mysqli_connect("localhost", "root", "root", "testing","1025");

$time = time();


mysqli_query($connect,"UPDATE comments SET comment_status=0 where comment_timevalid<'$time'") or die();

?>