<?php

include "api.php";

function fetchServiceProviders()
{
    $conn = dbConnect();
    $qry = "SELECT * FROM servicep WHERE active=1 ORDER BY fname ASC ";
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

function fetchRequests()
{
    $conn = dbConnect();
    if ($_SESSION['user_type'] == 'admin') {
        $qry = "select r.tid as request_id, r.service, r.fname, r.lname, r.massage, r.town, r.estate, r.status, r.date_requested
            from request r ORDER BY IF (r.status = 'Active', 0, 1), r.status DESC, r.date_requested DESC;";
    } else {
        $qry = "select r.tid as request_id, r.service, r.fname, r.lname, r.massage, r.town, r.estate, r.status, r.date_requested
                    from request r INNER JOIN request_servicep rs on r.tid = rs.request_id 
                    WHERE rs.servicep_id = " . $_SESSION['user_id'] . "
                    ORDER BY IF (r.status = 'Active', 0, 1), r.status DESC, r.date_requested DESC;";
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
            } else{
                $row['service_provider'] = '';
            }
        }

        array_push($data, $row);
    }
    return $data;
}