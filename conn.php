<?php
$hostname =  "localhost";
$dir = "root";
$pass = "";
$db = "youtube";
$conn = mysqli_connect($hostname,$dir,$pass,$db);
if(!$conn){
    echo "not working";
}

?>