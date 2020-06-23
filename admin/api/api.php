<?php
session_start();

function dbConnect () {
    $conn = mysqli_connect("localhost", "root", "", "profwaititu");
    return $conn;
}



function checkLogin()
{
    $isLoggedIn = isset($_SESSION['user_type']);
    if (!$isLoggedIn) {
        $_SESSION['flash_message'] = "You need to login";
        $_SESSION['flash_message_class'] = "danger";
        redirect("./auth/login.php");
    }
}

function logger($log_msg)
{
    $path = 'app.log';
    $dataToLog = array(
        date("Y-m-d H:i:s"),
        $_SERVER['REMOTE_ADDR'],
        $log_msg
    );
    $data = implode(" - ", $dataToLog);
    $data .= PHP_EOL;

    $log_dir = $_SERVER['DOCUMENT_ROOT'] . "/app_logs/";
    if (!file_exists($log_dir)) {
        // create directory/ uploads.
        mkdir($log_dir, 0755, true);
    }
    $log_file_data = $log_dir . '/log_' . date('d-M-Y') . '.log';
    // if you don't add `FILE_APPEND`, the file will be erased each time you add a log
    file_put_contents($log_file_data, $data . "\n", FILE_APPEND);
}

function redirect($endpoint, $permanent = false)
{
    if (headers_sent() === false) {
        header('Location: ' . $endpoint, true, ($permanent === true) ? 301 : 302);
    }
}

