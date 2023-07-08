<?php
include "conn.php";

$err = false;
    if(isset($_POST['signup'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pass = mysqli_real_escape_string($conn,$_POST['pass']);
 

        // insert the data 
        $sel = "select *  from users where email ='$email'";
        $queryone = mysqli_query($conn,$sel);
        $countuser = mysqli_num_rows($queryone);

        if($countuser>0){
            $err = true;
            $errMsg = "This User Already Exist";
        } else{
            $inserSql = "INSERT INTO `users` ( `name`, `email`, `pass`) VALUES ( '$name', '$email', '$pass')";

            $query = mysqli_query($conn,$inserSql);
            if($query){
                header("location:login.php");
            }
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
        <form class="wrapper" action='signup.php' method="post">
            <?php
            if($err){

       
            
            ?>
            <div class="errMsg">
                <?php echo $errMsg ?>
            </div>
            <?php 
                     }
            ?>
            <h1>Sign Up</h1>
            <div class="form-group">
                <div class="form-control">
                    <input type="text" placeholder="Name" name="name">
                </div>
                <div class="form-control">
                    <input type="text" placeholder="Email" name="email">
                </div>
                <div class="form-control">
                    <input type="text" placeholder="Password" name="pass">
                </div>
                <div class="form-control">
                    <input type="text" placeholder="Confirm Password" name="cpass">
                </div>
                <div class="form-control">
                   <button name="signup" class="btn" type="submit">Sign up</button>
                </div>
            </div>
        </form>
       
    </div>
</body>
</html>