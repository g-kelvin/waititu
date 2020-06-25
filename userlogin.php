<?php
session_start();
    $con=mysqli_connect("localhost","root","","profwaititu");

    if($con){
        $email = $_POST['email'];
        $password = hash('ripemd160', $_POST['password']) ;

        $qry="SELECT tid, email FROM clientregister WHERE email='$email' AND pass='$password' LIMIT 1";
            $result= mysqli_query($con,$qry);
            if(mysqli_num_rows($result)>0){
                $info = mysqli_fetch_assoc($result);
                        $_SESSION['user_type'] = 'customer';
                        $_SESSION['user_id'] = $info['tid'];
                        echo "congratulation , login successful <br>";
                        header('refresh:0.0000001;url=request-service.php');
                        
        }
            else{
                echo "<h3>please check your inputs and try again<br>Wrong Password or Email!!</h3>";
            }
    }
    else{
        echo "error";
    }

    


 ?> 