<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MY Album </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .err{color:red;}
</style>
</head>

<body>
<?php
  session_start();
  include "nav_code1.php";
  
  if(!isset($_SESSION['id'])){
    header('location:login_form.php');
  }
  ?>
<script>
  // $(document).ready(function(){
  //   alert("Create your album now");
  // });
  
function validate(){
  var title = $('#title').val();
  var msg= $('#mymessage').val();
  
  if(title==''){
    $('.err_title').text("please enter title");
    return false;
  }else{
    $('.err_title').text("");
  }

  if(msg==''){
      $('.err_msg').text("please enter description");
      return false;
    }else{
    $('.err_msg').text('');
  }
  return true;
}

</script>

  <form action="my_album.php" method="POST" onSubmit="return validate();">
    <div class="container" >
            <div class="form-group">
                    tittle: <textarea class="form-control" name="title" id="title" value="" placeholder="Album title" aria-describedby="emailHelp"></textarea>
             <lable name="err" class="err err_title"></lable>
             </div>
              
                  <div class="form-group">
                     <label for="exampleFormControlTextarea1"> Message</label>
                       <textarea class="form-control" id="mymessage" name="mymessage" placeholder="Enter your text here" id="exampleFormControlTextarea1" rows="3"></textarea>
                     <lable name="err" class="err err_msg"></lable>
                      
                </div>
                <button type="Post" class="btn btn-primary">Post</button>
            
     </div>
  <form>

</body>
</html>





