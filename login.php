<?php
$err = false;
session_start();
$user = $_SESSION['auth'];
if(isset($user)){
    header("location:index.php");
}
include "conn.php";
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['pass']);


    $sel = "select *  from users where email ='$email' and pass = '$pass'";
    $queryone = mysqli_query($conn,$sel);
    $countuser = mysqli_num_rows($queryone);

    if($countuser>0){
        header("location:index.php");
        $row  = mysqli_fetch_assoc($queryone);
        session_start();
        $_SESSION['auth']=$row['id'];
    }else{
        $err = true;
        $errMsg = "Invalid Email or password";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-wrapper">
        <form action="login.php" method="post" class="wrapper">
        <?php
            if($err){

       
            
            ?>
            <div class="errMsg">
                <?php echo $errMsg ?>
            </div>
            <?php 
                     }
            ?>
            <h1>Login</h1>
            <div class="form-group">
                <div class="form-control">
                    <input type="text" placeholder="Email" name="email" autocomplete="">
                </div>
                <div class="form-control">
                    <input type="text" placeholder="Password" name="pass">
                </div>
               
                <div class="form-control">
                   <button name="login" class="btn">Login</button>
                </div>
            </div>
        </form>
       
    </div>
</body>
</html>