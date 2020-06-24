<?php

include 'api.php';

if (isset($_POST)) {
    $request = $_POST['request'];
    switch ($request) {
        case 'add':
            addServiceP($_POST);
            break;
        case 'update':
            updateServiceP($_POST);
            break;
    }
}

function updateServiceP($data) {
    $conn = dbConnect();
    $id = $data['id'];
    $fname = $data['fname'];
    $lname = $data['lname'];
    $oname = $data['oname'];
    $age = $data['age'];
    $idnumber = $data['idnumber'];
    $gender = $data['gender'];
    $email = $data['email'];
    $town = $data['town'];
    $estate = $data['estate'];
    $tel = $data['tel'];
    $education = $data['education'];
    $course = $data['course'];
    $grade = $data['grade'];
    $prof = $data['prof'];
    $address = $data['address'];
    $pass = $data['pass'];
    $message = $data['message'];
    $services = $data['services'];


    $query = "UPDATE servicep SET fname='$fname', lname='$lname', oname='$oname', age='$age', idnumber='$idnumber', 
gender='$gender', email='$email', town='$town', estate='$estate', tel='$tel', education='$education', course='$course', 
grade='$grade', prof='$prof', address='$address', pass='$pass', message='$message' WHERE tid='$id'";
    if (!mysqli_query($conn, $query)) {
        $_SESSION['flash_message'] = 'Unable to update service provider';
        $_SESSION['flash_message_class'] = 'danger';
    }

    $d = mysqli_query($conn, "delete from provider_service where provider_id=$id");

    foreach ($services as $s) {
        $qry = "INSERT INTO provider_service (service_id, provider_id) VALUES ($s, $id)";
        $r = mysqli_query($conn, $qry);
    }
    redirect("../");

}

function addServiceP($data) {
    $conn = dbConnect();

    $fname = $data['fname'];
    $lname = $data['lname'];
    $oname = $data['oname'];
    $age = $data['age'];
    $idnumber = $data['idnumber'];
    $gender = $data['gender'];
    $email = $data['email'];
    $town = $data['town'];
    $estate = $data['estate'];
    $tel = $data['tel'];
    $education = $data['education'];
    $course = $data['course'];
    $grade = $data['grade'];
    $prof = $data['prof'];
    $address = $data['address'];
    $pass = $data['pass'];
    $message = $data['message'];

    $services = $data['services'];

    $query = "INSERT INTO servicep SET fname='$fname', lname='$lname', oname='$oname', age='$age', idnumber='$idnumber', 
gender='$gender', email='$email', town='$town', estate='$estate', tel='$tel', education='$education', course='$course', 
grade='$grade', prof='$prof', address='$address', pass='$pass', message='$message'";

        if (!mysqli_query($conn, $query)) {
        $_SESSION['flash_message'] = 'Unable to add service provider';
        $_SESSION['flash_message_class'] = 'danger';
        }

        $providerId = mysqli_insert_id($conn);
        foreach ($services as $s) {
            $qry = "INSERT INTO provider_service (service_id, provider_id) VALUES ($s, $providerId)";
            $r = mysqli_query($conn, $qry);
        }
    redirect("../");
}