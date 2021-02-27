<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mon_student';

$conn = mysqli_connect($host, $user, $pass, $db);

  
$email = $_POST['emailid'];
$pass = $_POST['password'];
$sql = "select * from users where email = '$email' and password = '$pass';";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if($row[0]>0)
    header('Location:welcome.php') ;
else
    echo "email ou mot de pass Invalid";
 ?>
 