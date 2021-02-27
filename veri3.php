<?php 
$con=mysqli_connect("localhost","root","","my_db");
$check="SELECT * FROM persons WHERE Email = '$_POST[eMailTxt]'";
$rs = mysqli_query($con,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 1) {
    echo "User Already in Exists<br/>";
}

else
{
    $newUser="INSERT INTO persons(Email,FirstName,LastName,PassWord) values('$_POST[eMailTxt]','$_POST[NameTxt]','$_POST[LnameTxt]','$_POST[passWordTxt]')";
    if (mysqli_query($con,$newUser))
    {
        echo "You are now registered<br/>";
    }
    else
    {
        echo "Error adding user in database<br/>";
    }
}

 ?>