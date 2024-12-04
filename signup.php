<?php
require "ses.php";
if(isset($_POST["logout"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

$stmt = $conn->prepare("SELECT * FROM signup WHERE name = ? OR email = ?");
$stmt->bind_param("ss", $name, $email); s

$stmt->execute();


$result = $stmt->get_result();


if ($result->num_rows > 0) {
    echo "<script> alert('Name or Email has already been used'); </script>";
    }
    else{
      if($password == $confirmpassword){
        $query = "INSERT INTO signup VALUES('$name','$email','$password','$confirmpassword')";
        mysqli_query($conn,$query);
        echo
        "<script> alert('Succesfully Registered'); </script>";
      }
      else{
        echo
        "<script> alert('Password Does Not match'); </script>";
      }
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
    <h2>Registration</h2>
    <form action="" method="post">
      <div class="input-box">
        <input type="text" name="name" placeholder="Enter your name"  required>
      </div>
      <div class="input-box">
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input type="password" name="confirmpassword" placeholder="Confirm password" required>
      </div>
      <div class="policy">
        <input type="checkbox" required>
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now" name="signup">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>