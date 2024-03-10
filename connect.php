<?php

$con = new mysqli('localhost', 'root','', 'taskmanagementsite' );

if($con){
    echo "<script>console.log('Connection successful');</script>";
}else{
    die(mysqli_error($con));
}

?>