<?php
require "ses.php";
if(isset($_POST["login"])){
    $unameemail = $_POST["unameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM signup WHERE name = '$unameemail' OR email = '$unameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.html");
            }
            else{
                echo
                "<script> alert('Wrong Password'); </script>";
            }
        }
        else{
            echo
            "<script> alert('User not Registered'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
    <link rel="stylesheet" href="logsign.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Login</h2>
    <form action="" method="post">
      <div class="input-box">
        <input type="text" name="unameemail" placeholder="Enter your name email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Enter Password" required>
      </div>
      <div class="input-box button">
        <input type="Submit" name="login" value="Login">
      </div>
      <div class="text">
        <h3>Dont have an account? <a href="signup.php">Signup now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>