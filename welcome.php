<?php 
include('db.php');
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

  <title>Signature</title>
</head>
<body>


<center>

<h1> Vous avez bien marqué votre presence au cours</h1>
<p><h6>Appuyer sur la touche ok pour sortir</h6></p>

<button type="submit" class="btn btn-success"><a href="logout.php">OK</a></button>


</center>

<center>
  <h3 style="color: blue;">
     <SCRIPT LANGUAGE="JavaScript">
      var maintenant=new Date();
      document.write(maintenant);
      </SCRIPT>
  </h3>
</center>

<?php 
     $email = $_SESSION["email"];
     $dup = mysqli_query($conn,"select id,username from users where email = '$email' ");
     $row = mysqli_fetch_assoc($dup);
     $id = $row["id"];
     $username = $row["username"];
     $date = date('Y-m-d');
     

  $ver = mysqli_query($conn,"SELECT iduser, datesign FROM attendance WHERE iduser='$id' AND datesign='$date' ");
  $row_verif= mysqli_fetch_assoc($ver);
  $statut = 'present';
 
  if (mysqli_num_rows($ver)==0){


     $inserer = "INSERT INTO attendance (iduser, datesign,name, statut) VALUES('$id', '$date','$username','$statut')";
   mysqli_query($conn, $inserer);
}
else
  { 

    header('location: page_recuperation.php');

  }

    mysqli_close($conn);



?>

</body>
</html>