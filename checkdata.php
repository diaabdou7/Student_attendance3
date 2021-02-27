<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mon_student';

$conn = mysqli_connect($host, $user, $pass, $db);

  
  if (isset($_POST['submit_form'])) {
    $email=$_POST['useremail'];
    $verif = mysqli_query($conn,"select * from users where email = '$email'");
    if (mysqli_num_rows($verif)==0){
     $name = htmlspecialchars($_POST['username']);
     $niveau = $_POST['niveau'];
     $email = htmlspecialchars($_POST['useremail']);
     $phone = htmlspecialchars($_POST['userphone']);
     $password = htmlspecialchars($_POST['userpass']);
     $sex = $_POST['sex'];

    $imgName = $_FILES['image']['name'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];

    if(empty($name)){
            $errorMsg = 'Please input name';
        }elseif(empty($phone)){
            $errorMsg = 'Please input contact';
        }elseif(empty($email)){
            $errorMsg = 'Please input email';
        }else{

            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

            $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

            if(in_array($imgExt, $allowExt)){

                if($imgSize < 5000000){
                    move_uploaded_file($imgTmp ,$upload_dir.$userPic);
                }else{
                    $errorMsg = 'Image too large';
                }
            }else{
                $errorMsg = 'Please select a valid image';
            }
        }


        if(!isset($errorMsg)){
            $sql = "insert into users(username,niveau, phone, email,password, sex, image, uploaded_on)
                    values('".$name."','".$niveau."', '".$phone."', '".$email."','".$password."','".$sex."', '".$userPic."', NOW())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $successMsg = 'New record added successfully';
                header('Location: index.php');
            }else{
                $errorMsg = 'Error '.mysqli_error($conn);
            }
        }

    }
    else{
    echo"
    <h1><font color='green'>Vous etes deja incris</font></h1><br>
    <a href='sentdata.php'>Retour</a>

    ";
}

     
  }

if(isset($_POST['user_phone']))
{
    $phone=$_POST['user_phone'];

    $checkdata=" SELECT phone FROM users WHERE phone='$phone' ";

    $query = mysqli_query($conn, $checkdata);
    $count = mysqli_num_rows($query);

    if($count>0)
    {
        echo "Numéro Existe Déja";
    }
    else
    {
        echo "OK";
    }
    exit();
}

if(isset($_POST['user_email']))
{
    $emailId=$_POST['user_email'];

    $checkdata=" SELECT email FROM users WHERE email='$emailId' ";

    $query=mysqli_query($conn, $checkdata);
    $row = mysqli_num_rows($query);
    if($row>0)
    {
     echo "Email Existe Déja";
    }
    else
    {
        echo "OK";
    }
    exit();
}

if(isset($_POST['user_pass2']))
{
    if($_POST['user_pass2'] != $_POST['user_pass'])
    {
     echo "Ne correspond pas";
    }
    else
    {
        echo "OK";
    }
    exit();
}

$upload_dir = 'uploads/'; 
 
  ?>    
