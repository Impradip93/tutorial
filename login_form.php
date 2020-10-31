<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<?php
session_start();
if(isset($_SESSION['id'])){
  header('location:home.php');
}

?>

  <form action="login.php" method="POST">
  <div class="container" >
Email address: <input type="email" name="email" id="email" value="" placeholder="Email" aria-describedby="emailHelp" class="form-control">
Password: <input type="password"  class="form-control" name="password" id="password" value="" placeholder="password" aria-describedby="emailHelp">
 <button Type="submit" class="btn btn-primary">Submit</button></br>
</body>
</html>
