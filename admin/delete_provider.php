<?php
include './api/api.php';

$id = $_GET['id'];
$conn = dbConnect();
$qry = "UPDATE servicep SET active='0' WHERE tid=$id";
mysqli_query($conn, $qry);
redirect("./");