<?php
session_start();
include 'database/database.php'; 







// If file upload form is submitted 
$status = $statusMsg = '';
if (isset($_POST['save'])) {
$email=$_POST['email'];


$verif = mysqli_query($conn,"select * from student_table where email = '$email'");
if (mysqli_num_rows($verif)==0) {
    $status = 'error';
    $path = 'profil/'; // Repertoire de telechargement
    if (!empty($_FILES["file"]["name"])) {
        // Obtention information sur le fichier
        $fileName = basename($_FILES["file"]["name"]);
        $ext = $_FILES['file']['tmp_name'];

        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // On peut télécharger la même image en utilisant la rand function
        $final_image = rand(1000, 1000000) . $fileName;

        // Autoriser certains formats d'images
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $path = $path . strtolower($final_image);// variable du chemin de l image

            if (move_uploaded_file($ext, $path)) {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $telephone = htmlspecialchars($_POST['telephone']);
                $password = htmlspecialchars(md5($_POST['password']));// crypter le mot de passe
                $sexe = $_POST['sexe'];

                // Insertion des données dans la base de données
                $insert = mysqli_query($conn, "INSERT into student_table (name, email, password, telephone, sexe ,image)
						VALUES ('$name','$email','$password','$telephone','$sexe','$path')");

                if ($insert) {
					$status = 'success';
				
                    header('Location: signe.php');
                } else {
                    echo  'Echec du téléchargement, Veuillez reprendre votre telechargement svp.';
                }
            } else {
                echo 'Désolé, seul les types JPG, JPEG, PNG, & GIF sont autorisés.';
            }
        } else {
            echo  'selectionner une image à télécharger.';
        }
	}
} 
else{
	echo"
	<h1><font color='green'>Vous etes deja incris</font></h1><br>
	<a href='signe.php'>Retour</a>

	";
}

	mysqli_close($conn);
}
?>