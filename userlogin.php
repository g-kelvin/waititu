<?php
    $con=mysqli_connect("localhost","root","","profwaititu");

    if($con){
        $email = $_POST['email'];
        $password = $_POST['password'] ;    

        $qry="SELECT email, password FROM clientregister WHERE email='$email' AND password='$password'";
            $result= mysqli_query($con,$qry);
            if(mysqli_num_rows($result)>0){
            
                        echo "congratulation , login successful <br>";
                        header('refresh:0.0000001;url=paybill.html');
                        
        }
            else{
                echo "<h3>please check your inputs and try again<br>Wrong Password or Email!!</h3>";
            }
    }
    else{
        echo "error";
    }

    


 ?> 