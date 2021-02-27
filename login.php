<?php
session_start();
$message="";
if(count($_POST)>0) {
 $con = mysqli_connect('localhost','root','','mon_student') or die('Unable To connect');
$result = mysqli_query($con,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row['id'];
$_SESSION["niveau"] = $row['niveau'];

} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["niveau"]) && $_SESSION["niveau"] == "professeur" ) {
header("Location:darsh.php");
}
if(isset($_SESSION["niveau"]) && $_SESSION["niveau"] == "etudiant" ) {
header("Location:admin_dashboard.php");
}

?>
<html>
<head>
<title>User Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="username">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" class= "btn btn-success" value="Submit">
<input type="reset" class="btn btn-danger">

</form>
<div><button><a href="index.php" class="btn btn-lg btn-default">Retour a la page d'Acceuil</a></button></div>


</body>
</html>
