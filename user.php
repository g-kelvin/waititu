<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'profwaititu');
if ($con) {
    if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $salutation = $_POST['salutation'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $oname = $_POST['oname'];
        $idnumber = $_POST['idnumber'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $town = $_POST['town'];
        $estate = $_POST['estate'];
        $password = hash('ripemd160', $_POST['password']);
        $confirmPassword = hash('ripemd160', $_POST['confirmPassword']);


        if ($password != $confirmPassword) {
            echo "Password's do not match";
            header('refresh:2;url=./register.html');

        }


        $qry = mysqli_query($con, "INSERT INTO clientregister (salutation, fname, lname, oname, idnumber, gender, email, tel,town,estate,pass) VALUES ('$salutation','$fname', '$lname', '$oname', '$idnumber', '$gender', '$email', '$tel','$town','$estate','$password')");
        if ($qry) {
            echo "Thank You for Registering Employee:  " . $fname . " " . $lname . " " . $oname;
            $id = mysqli_insert_id($con);
            $_SESSION['user_id'] = $id;
            $_SESSION['user_type'] = 'customer';
             header('refresh:2;url=request-service.php');
        } else {
            echo "error ". mysqli_error($con);
        }

    }


} else {
    echo "error dope";
}


?>