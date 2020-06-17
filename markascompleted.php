<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = "UPDATE request_servicep SET completed='1' WHERE rsid='$id'";
    $con=mysqli_connect("localhost",'root',"","profwaititu");
    
    if (mysqli_query($con, $qry)) {
        header("Location: ./displayaservice.php");
    } else {
        echo "Unable to mark request as complete ";
    }

}