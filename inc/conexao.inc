<?php
    $con=mysqli_connect("localhost", "root", "");

    if(!$con){
        echo mysqli_connect_error($con);
    }

    $db=mysqli_select_db($con, "projeto_terceiroB");

    if(!$db){
        echo mysqli_error($con);
    }

?>