<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    <form id="comment_form" method="POST" action="">
        <div class="form-group">
        <label>Categories:</label>
        <input type="radio" name="category" value="Software">Software
        <input type="radio" name="category" value="Hardware">Hardware
        <input type="radio" name="category" value="CyberSecurity">CyberSecurity
        <input type="radio" name="category" value="Sport">Sport
        <input type="radio" name="category" value="Life">Life
        <input type="radio" name="category" value="News">News
        <input type="radio" name="category" value="Other">Other
        <br><br>
        </div>
        <div class="form-group">
        <button  type="submit" name="post" id="post" class="btn btn-info" value="Post">Post</button>
        </div>
    </form>



    <?php

    if(isset($_POST['category'])){

    include "connect.php";

    global $connect;

    $category = $_POST['category'];
   

    $sql = mysqli_query($connect,"SELECT * FROM comments WHERE comment_categories='$category' AND comment_status = 1");
    
    
    



    ?>


    <table>

        <thead>
            <tr>
                <th>-Author</th>
                <th>-Text</th>
                <th>-Category</th>
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
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php } ?>

</body>
</html>