<?php

$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require '_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    //$pass = password_hash($password, PASSWORD_DEFAULT);
    
     
    $sql = "Select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row = mysqli_fetch_assoc($result)) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
        }
    } 
    else{
        $showError = "Your code has been found with some fatal Errors !!!!" . mysqli_connect_error() ;
    }
}
    
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
-->
    <title>Login</title>

    <style>

        html {
            scroll-behavior: smooth;
            background-color:lightblue;
        }
        
        .container{
            position:relative;
            
        }

      .container .heading {
        margin-top: 37px;
        text-align: center;
        justify-content: center;
      }

        .container h1 span {
            color: crimson;
        }

        .container .group {
            margin-top: 30px;
            display: flex;
            flex-direction:column;     
        }

        .container label {
            margin: 0 auto;
            color:#222;
            font-size:17px;
        }

        .container input{
            border: 0;
            outline:none;
            background:transparent;
            border-bottom:2px solid #fe5b3d;
            width:35rem;
            font-size:20px;
            height:40px;
            margin: 15px auto;
        }

        ::placeholder{
            opacity: 0.3;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 17px auto;
            padding:5px 10px;
            border:0;
            font-size:17px;
            outline:none;
            background:#474fa0;
            color:white;
            border-radius:0.3rem;
            transition:0.5s ease;
            cursor:pointer;
        }

        .btn:hover {
            background:#fe5b3d
        }
    </style>
  </head>

  <body>
   
    <?php include '_nav.php';
     ?>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container">
        <h1 class="heading">Login to visit <span>IFA</span></h1>
        <form action="login.php" method = "post">
        <div class="group">
            <label for="username">Username</label>
            <input type="text" class="" id="username" name="username" placeholder="Enter the username">
            
        </div>
        <div class="group">
            <label for="password">Password</label>
            <input type="password" class="" id="password" name="password" placeholder="Enter the password">
            
        </div>
       
         
        <button type="submit" class="btn">Login</button>
        </form>

    </div>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>