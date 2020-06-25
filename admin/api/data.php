<?php

include "api.php";

function fetchServiceProviders($requestId = 0)
{
    $conn = dbConnect();
    if ($requestId == 0) {
        $qry = "SELECT * FROM servicep WHERE active=1 ORDER BY fname ASC ";
    } else {
        $qry = "SELECT s.tid as tid, s.fname as fname, s.lname as lname FROM servicep s
INNER JOIN provider_service ps on s.tid = ps.provider_id
WHERE s.active=1 AND ps.service_id=(select service_id from request where tid=$requestId) ORDER BY s.fname ASC;";
    }
    $res = mysqli_query($conn, $qry);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($data, $row);
    }
    return $data;
}

function fetchServiceProvider($id)
{
    $query = "SELECT * FROM servicep WHERE tid='$id'";
    $conn = dbConnect();

    $res = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($res);
}

function fetchTransactions() {
    $conn = dbConnect();
    $qry = "select paid, mpesa_confirmation, concat(fname, ' ',  lname) as name, price  
            from request 
            inner join clientregister c on request.customer = c.tid 
            inner join service s on request.service_id = s.tid;";
    $res = mysqli_query($conn, $qry);
    $data= array();

    while($row = mysqli_fetch_assoc($res)) {
        array_push($data, $row);
    }
    return $data;
}

function fetchUnpaidRequests()
{
    $conn = dbConnect();
    $qry = "select r.tid as request_id, r.mpesa_confirmation, s.name as service, c.fname, c.lname, r.massage, c.town, c.estate, r.status, r.date_requested
                from request r inner join clientregister c on r.customer = c.tid 
                inner join service s on r.service_id = s.tid
                WHERE paid NOT IN ('CONFIRMED')
                ORDER BY IF (r.status = 'Active', 0, 1), r.status DESC, r.date_requested DESC
                ";
    $res = mysqli_query($conn, $qry);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['request_id'];
        $q = "select concat(s.fname, ' ', s.lname) as service_provider
                from request_servicep rs inner join servicep s on rs.servicep_id = s.tid
                where rs.request_id = $id
                limit 1;";
        $r = mysqli_query($conn, $q);
        if ($r) {
            $d = mysqli_fetch_assoc($r);
            if (isset($d)) {
                $row['service_provider'] = $d['service_provider'];
            } else {
                $row['service_provider'] = '';
            }
        }

        array_push($data, $row);
    }
    return $data;


}

function fetchRequests()
{
    $conn = dbConnect();
    if ($_SESSION['user_type'] == 'admin') {
        $qry = "select r.tid as request_id, r.comment, s.name as service, c.fname, c.lname, r.massage, c.town, c.estate, r.status, r.date_requested
                from request r inner join clientregister c on r.customer = c.tid 
                inner join service s on r.service_id = s.tid
                WHERE paid = 'CONFIRMED'
                ORDER BY IF (r.status = 'Active', 0, 1), r.status DESC, r.date_requested DESC
                ";
    } else if ($_SESSION['user_type'] == 'service_provider') {
        $qry = "select r.tid as request_id, r.comment, s.name as service, c.fname, c.lname, r.massage, c.town, c.estate, r.status, r.date_requested
                    from request r INNER JOIN request_servicep rs on r.tid = rs.request_id 
                    inner join service s on r.service_id = s.tid
                    inner join clientregister c on r.customer = c.tid
                    WHERE rs.servicep_id = " . $_SESSION['user_id'] . " AND paid = 'CONFIRMED'
                    ORDER BY IF (r.status = 'Active', 0, 1), r.status DESC, r.date_requested DESC;";
    } else if ($_SESSION['user_type'] == 'customer') {
        $qry = "select r.tid as request_id, r.comment, s.name as service, c.fname, c.lname, r.massage, c.town, c.estate, r.status, r.date_requested
            FROM request r INNER JOIN clientregister c on r.customer = c.tid
            inner join service s on r.service_id = s.tid
            WHERE c.tid = " . $_SESSION['user_id'] . " AND paid = 'CONFIRMED'
            ORDER BY IF (r.status = 'Active', 0, 1), r.status DESC, r.date_requested DESC";
    }


    $res = mysqli_query($conn, $qry);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['request_id'];
        $q = "select concat(s.fname, ' ', s.lname) as service_provider
                from request_servicep rs inner join servicep s on rs.servicep_id = s.tid
                where rs.request_id = $id
                limit 1;";
        $r = mysqli_query($conn, $q);
        if ($r) {
            $d = mysqli_fetch_assoc($r);
            if (isset($d)) {
                $row['service_provider'] = $d['service_provider'];
            } else {
                $row['service_provider'] = '';
            }
        }

        array_push($data, $row);
    }
    return $data;
}

function fetchServices()
{
    $con = dbConnect();
    $qry = "SELECT * FROM service ORDER BY name";
    $res = mysqli_query($con, $qry);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($data, $row);
    }
    return $data;
}