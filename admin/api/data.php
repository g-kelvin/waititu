<?php
session_start();
include "api.php";

function fetchServiceProviders() {
    $conn = dbConnect();
    $qry = "SELECT * FROM servicep ORDER BY fname ASC";
    $res = mysqli_query($conn, $qry);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($data, $row);
    }
    return $data;
}

function fetchServiceProvider($id) {
    $query = "SELECT * FROM servicep WHERE tid='$id'";
    $conn = dbConnect();

    $res = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($res);
}

function fetchRequests() {
   $conn = dbConnect();

   $qry = "select r.tid as request_id, r.service, r.fname, r.lname, r.massage, r.town, r.estate, r.status, r.date_requested
from request r ORDER BY IF (r.status = 'Active', 0, 1), r.status DESC, r.date_requested DESC;";
   $res = mysqli_query($conn, $qry);
   $data = array();
   while ($row = mysqli_fetch_assoc($res)) {
       array_push($data, $row);
   }
   return $data;
}