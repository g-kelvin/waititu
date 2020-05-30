<?php
if(!isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message= $_POST['message'];

echo "$name";
$to = "kelvingauki@gmail.com";
$subject = 'Form Submission';
$msg ="Name:".$name."Tel:".$number."wrote the following:".$message;
$headers ="From: ".$email;
echo "msg";

if(mail($to,$subject,$msg,$headers)){
	echo "sent";
}
else {
	echo "yolo";
}


}
else{
	echo "error on Submission";
}




?> 