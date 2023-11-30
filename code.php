<?php 

session_start();

include '_dbconnect.php';

if(isset($_POST['saver'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $image = $_FILES['img']['name'];

    $query1 = "INSERT INTO `cand` (`username`, `password`, `email`, `img`) VALUES ('$name', '$password', '$email', '$image')";

    $run = mysqli_query($conn, $query1);

    if($run) {
        move_uploaded_file($_FILES["img"]["tmp_name"], "upload/".$_FILES["img"]["name"]);
        //$_SESSION['status'] = "Image Stored Successfully";
        header("Location : welcome.php");
    }
    else {
        //$_SESSION['status'] = "Image not Stored Successfully";
        header("Location : welcome.php");
    }
}
?>