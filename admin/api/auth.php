<?php

include "api.php";

if ($_POST) {
    unset($_SESSION['flash_message']);

    // echo json_encode($_POST);
    switch ($_POST['request']) {
        case 'login':
            handleLogin($_POST);
            break;

        default:
            echo "Goodbye";
            break;
    }

}

function handleLogin($data)
{
    $conn = dbConnect();
    $email = $data['email_address'];
    $password = $data['password'];
    $qry = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    echo $qry;

    $res = mysqli_query($conn, $qry);
    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $data['tid'];
        $_SESSION['user_type'] = 'admin';
        redirect("../");
        echo "";
    } else {
        $qry = "SELECT tid, email, pass  FROM  servicep  where email = '$email' AND pass='$password' AND active=1";

        $res = mysqli_query($conn, $qry);
        if (mysqli_num_rows($res) > 0) {
            $data = mysqli_fetch_assoc($res);
            $_SESSION['user_id'] = $data['tid'];
            $_SESSION['user_type'] = 'service_provider';
            redirect("../requests.php");
            echo "";
        } else {
            echo "NOT found on service provider $qry";
            $_SESSION['flash_message'] = 'Wrong credentials';
            $_SESSION['flash_message_class'] = 'danger';
            redirect('../auth/login.php');
            echo "";
        }
    }
}