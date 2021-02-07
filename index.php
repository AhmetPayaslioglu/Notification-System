<!DOCTYPE html>
<html>
 <head>
  <title>Notification System</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
 </head>
 <body>
  <br /><br />
  <div class="container">
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="#">Ahmet Payaslioglu</a>
     </div>
     <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"></li>
      <li><a href="list.php">List</a></li>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"></li>
      <li><a href="order.php">Order</a></li>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
    </div>
   </nav>
   <br />
   <h2 align="center">Notification System</h2>
   <br />
   <form id="comment_form">
    <div class="form-group">
    <label>Author Name</label>
    <input type="text" name="author" id="author" class="form-control">
    </div>
    <div class="form-group">
     <label>Enter Title</label>
     <input type="text" name="subject" id="subject" class="form-control">
    </div>
    <div class="form-group">
     <label>Enter Content</label>
     
     <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
    </div>

    <div class="form-group">
     <label>Expiration Date: </label>
     <input type="text" name="b" id="datepicker" class="form-control">
    </div>
    
    <!--    <p>Expiration Date : <input type="comment" name="b" id="datepicker"></p> -->
    
    <div class="form-group">
    <label>Categories:</label>
    <input type="radio" name="a" value="Software">Software
    <input type="radio" name="a" value="Hardware">Hardware
    <input type="radio" name="a" value="CyberSecurity">CyberSecurity
    <input type="radio" name="a" value="Sport">Sport
    <input type="radio" name="a" value="Life">Life
    <input type="radio" name="a" value="News">News
    <input type="radio" name="a" value="Other">Other
    <br><br>
    </div>
    <div class="form-group">
    <button  type="submit" name="post" id="post" class="btn btn-info" value="Post">Post</button>
    </div>
   </form>
   
  </div>

 </body>
</html>

<script>

$(document).ready(function(){

  
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
