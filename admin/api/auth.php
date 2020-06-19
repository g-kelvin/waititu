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

function handleLogin($data) {
    $conn = dbConnect();
    $email = $data['email_address'];
    $password = $data['password'];
    $qry = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $res = mysqli_query($conn, $qry);
    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $data['tid'];
        redirect("../");
    } else {
        $_SESSION['flash_message'] = 'Wrong credentials';
        $_SESSION['flash_message_class'] = 'danger';
        redirect('../auth/login.php');
        echo "Failed";
    }
}