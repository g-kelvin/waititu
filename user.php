<?php
	
	$con=mysqli_connect('localhost','root','','profwaititu');
	if($con){ 
    if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $oname = $_POST['oname'];
    $idnumber = $_POST['idnumber'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $town = $_POST['town'];
    $estate = $_POST['estate'];
    $password = $_POST['password'];


$qry = mysqli_query ($con, "INSERT INTO clientregister (fname, lname, oname, idnumber, gender, email, tel,town,estate,password) VALUES ('$fname', '$lname', '$oname', '$idnumber', '$gender', '$email', '$tel','$town','$estate','$password')");
    if($qry){
        echo "Thank You for Registering Employee:  ".$fname." ".$lname." ".$oname;
        // header('refresh:2;url=employeeregister.html');
    }
    else{
        echo "error";
    }

}



}
else{
    echo "error dope";
}


?>