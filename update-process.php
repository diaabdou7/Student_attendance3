

<?php
// ici database connect
include 'db.php';
session_start();
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE attendance SET id = '".$_POST['id']."', why = '".$_POST['why']."' WHERE id ='".$_POST['id']."'");
 	                
$message = "Record Modified Successfully";

}
$result = mysqli_query($conn,"SELECT users.username, attendance.id, attendance.datesign, attendance.statut, attendance.why 
	FROM attendance, users 
	WHERE attendance.id='" . $_GET['id'] . "'");

$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Modification</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="">justification de l'abscence</a>
</div>

<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="hidden" name="id"  value="<?php echo $row['id']; ?>">

Statut:<br>
<input type="text" name="statut" class="txtField" value="<?php echo $row['statut']; ?>">
<br>
<br>
Why:<br>
<input type="text" name="why" class="txtField" value="<?php echo $row['why']; ?>">
<br>
<br>

<input type="submit" name="submit" value="Submit" class="buttom">
<div><a href="darsh.php">Retour</a></div>

</form>
</body>
</html>