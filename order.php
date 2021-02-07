<?php
include "connect.php";

global $connect;


$sql = mysqli_query($connect,"SELECT * FROM `comments` ORDER BY `comment_time` ASC");




?>


<table>

    <thead>
        <tr>
            <th>Author</th>
            <th>Text</th>
            <th>Category</th>
            <th>Time</th>
            <th>Time Valid</th>
        </tr>
    </thead>
    <tbody>
    <?php while($result = mysqli_fetch_assoc($sql)){ ?>
    <tr>
        <td>
            <?php echo $result['comment_author']; ?>
        </td>
        <td>
            <?php echo $result['comment_text']; ?>
        </td>
        <td>
            <?php echo $result['comment_categories']; ?>
        </td>
        <td>
            <?php echo $result['comment_time']; ?>
        </td>
        <td>
            <?php echo $result['comment_timevalid']; ?>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>