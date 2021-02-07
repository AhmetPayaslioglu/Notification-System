<?php
//insert.php
if(isset($_POST["subject"]))
{

    include("connect.php");
    global $connect;

    //echo json_encode(['success' => 'success']);
 $author = mysqli_real_escape_string($connect, $_POST["author"]);
 $subject = mysqli_real_escape_string($connect, $_POST["subject"]);
 $comment = mysqli_real_escape_string($connect, $_POST["comment"]);
 $a = mysqli_real_escape_string($connect, $_POST["a"]);
 $b = $_POST["b"];

 $b = strtotime($b);

 mysqli_query($connect, "INSERT INTO comments(comment_author,comment_subject, comment_text,comment_categories,comment_timevalid) VALUES ('$author', '$subject', '$comment','$a','$b')");
 
}
?>
