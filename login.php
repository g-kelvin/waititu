<?php
    $con=mysqli_connect("localhost","root","","profwaititu");

    if($con){
        $email = $_POST['email'];
        $pass = hash( 'ripemd160', $_POST['pass']);
        echo $pass;
        $qry="SELECT email, pass FROM clientregister WHERE email='$email' AND pass='$pass'";
        $qry="SELECT service FROM request where service ='service 2'";
            $result= mysqli_query($con,$qry);
            if(mysqli_num_rows($result)>0){
            
                        echo "congratulation , login successful <br>";
                        header('refresh:0.0000001;url=displayservice.php');
                        
        }
            else{
                echo "<h3>please check your inputs and try again<br>Wrong Password or Email!!</h3>";
            }
    }
    else{
        echo "error";
    }

    


 ?> 