<?php
include 'api/data.php';
checkLogin();
$providers = fetchServiceProviders();
$id = $_GET['id'];
$conn = dbConnect();

if ($_SESSION['user_type'] == 'admin') {
    $qry = "UPDATE request_servicep SET completed=true WHERE request_id=$id";
    $res = mysqli_query($conn, $qry);

    $qry = "UPDATE request SET status='Done' WHERE tid=$id";
    $res = mysqli_query($conn, $qry);
} else {
    $qry = "UPDATE request_servicep SET completed=false WHERE request_id=$id";
    $res = mysqli_query($conn, $qry);

    $qry = "UPDATE request SET status='MarkedDone' WHERE tid=$id";
    $res = mysqli_query($conn, $qry);
}

redirect('./requests.php');
