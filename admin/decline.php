<?php
include 'api/data.php';
checkLogin();
$providers = fetchServiceProviders();
$id = $_GET['id'];
$conn = dbConnect();

    $qry = "UPDATE request SET status='Unread' WHERE tid=$id";
    $res = mysqli_query($conn, $qry);

//    remove it from my assigned

$qry2 = "DELETE FROM request_servicep WHERE request_id=$id";
$res = mysqli_query($conn, $qry2);



redirect('./requests.php');
