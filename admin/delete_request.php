<?php
include './api/api.php';

$id = $_GET['id'];
$conn = dbConnect();
$qry = "DELETE FROM request WHERE tid=$id";
mysqli_query($conn, $qry);
redirect("./requests.php");