
<!DOCTYPE html>
<html >
<head>
    <title>Registration</title>
</head>
<body>
<?php
session_start();
include_once "nav_code2.php";

if(isset($_GET["err"]) && $_GET["err"] ==1){
  echo "please insert all the value";
}

if(isset($_GET["err"]) && $_GET["err"]==2){
  echo "user not registered";
}

if(isset($_SESSION['id'])){
  header('location:home.php');
}

?>
<form action="database.php" method="POST">
  <div class="container" >
Name: <input type="text" class="form-control" name="name" id="name" value="" placeholder="name" aria-describedby="emailHelp">
Email address: <input type="email" name="email" id="email" value="" placeholder="Email" aria-describedby="emailHelp" class="form-control">
Password: <input type="password"  class="form-control" name="password" id="password" value="" placeholder="password">
 <button Type="submit" class="btn btn-primary">Submit</button></br>

<small id="emailHelp" class="form-text text-muted">if you are already registered then clik login.</small>
  </div>

</form>
    <ul>
      <li>
      <div class="container">
         <a class="nav-link" href="log.php">Login</a>
          </div>
     </li>
    </ul>

</body>
</html>