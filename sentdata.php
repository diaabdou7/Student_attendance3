<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mon_student';


$conn = mysqli_connect($host, $user, $pass, $db);

$username ="";
$email ="";
$phone ="";
$password="";
$sex ="";
$userpass2 ="";
  
  if (isset($_POST['submit_form'])) {
    $email=$_POST['useremail'];
    $phone = $_POST['userphone'];
    $username =$_POST['username'];
    $password =$_POST['userpass'];
    $sex =$_POST['sex'];
    $userpass2 =$_POST['userpass2'];

    $verif = mysqli_query($conn,"select * from users where email = '$email'");
    $verif2 = mysqli_query($conn,"select * from users where username = '$username'");
    $verif3 = mysqli_query($conn,"select * from users where phone = '$phone'");
    $verif4 = mysqli_query($conn,"select * from users where password = '$password'");
    $verif5 = mysqli_query($conn,"select * from users where sex = '$sex'");
    $verif6 = mysqli_query($conn,"select * from users where userpass2 = '$userpass2'");


    if (mysqli_num_rows($verif)==0){
     $name = htmlspecialchars($_POST['username']);
     $niveau = $_POST['niveau'];
     $email = htmlspecialchars($_POST['useremail']);
     $phone = htmlspecialchars($_POST['userphone']);
     $password = htmlspecialchars($_POST['userpass']);
     $sex = $_POST['sex'];
     $userpass2 =$_POST['userpass2'];

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
            $sql = "insert into users(username,niveau, phone, email,password,userpass2, sex, image, uploaded_on)
                    values('".$name."','".$niveau."', '".$phone."', '".$email."','".$password."','".$userpass2."','".$sex."', '".$userPic."', NOW())";
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
        $email_error = "desolé.... cet email existe déjà";
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

<!DOCTYPE html>
<html>
    <head>
    <script type="text/javascript" src="js/jquery.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Presence d'eleve</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css" >
                .form_error span {
          width: 80%;
          height: 35px;
          margin: 3px 10%;
          font-size: 1.1em;
          color: #D83D5A;
        }
    </style>

    </head>
    <body>
        <div class="main">
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h3 class="form-title">Merci de vous Inscrire</h3>
                            <form method="POST"  action ="sentdata.php" enctype="multipart/form-data" id="register-form" onsubmit="return checkall();"> 
                            <div class="row">
                                  
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="radio" name="niveau" id="agree-term" class="agree-term" value="etudiant"checked />
                                    <label for="agree-term" class="label-agree-term">Etudiant</label>
                                    
                                    <input type="radio" name="niveau" id="agree-term" class="agree-term" value="professeur" />
                                    <label for="agree-term" class="label-agree-term">Professeur</label>
                                    
                                </div>
                                <div class="col-md-6"></div>
                                
                                </div>
                            </div>
                            <div class="row">
                                 <div class="form-group">
                                      <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
                                          <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"
                                           >
                                          <?php if (isset($name_error)): ?>
                                          <span><?php echo $name_error; ?></span>
                                          <?php endif ?>
                                       </div>
                                       </div>
                                    <div class="form-group">
                                                <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
                                                      <input type="email" name="useremail" id="UserEmail" placeholder="Email" value="<?php echo $email; ?>" onkeyup="checkemail();">
                                                      <span id="email_status"></span>
                                                      <?php if (isset($email_error)): ?>
                                                        <span><?php echo $email_error; ?></span>
                                                      <?php endif ?>
                                                </div>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
                                       
                                        <input type="text" name="userphone" placeholder="Phone" id="UserPhone" value="<?php echo $phone; ?>" onkeyup="checkphone();">
                                        <span id="phone_status"></span>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""><i class="zmdi zmdi-lock"></i></label>
                                                <input type="password" name="userpass" id="UserPassword" placeholder="Mot de pass" required maxlength="10" value= "<?php echo $password; ?>">
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                <div class="form-group">
                                    <label for=""><i class="zmdi zmdi-lock-outline"></i></label>
                                    <input type="password" name="userpass2" id="UserPassword2" placeholder="Confirmer (10 Max)" required maxlength="10" onkeyup="checkpass();" value= "<?php echo $userpass2; ?>">
                                    <span id="pass_status"></span>
                                </div>
                                    </div>
                                </div>

                             
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="file" name="image" id="image"/>
                                       </div>
                                        
                                    </div>
                                    
                                     

                                </div>
                                <br><br>
                                <div class="row">
                                    <div >
                                        
                                        <div class="form-group">
                                            <input type="radio" name="sex"  id="agree-term" class="agree-term" value="male" checked />
                                            <label for="agree-term" class="label-agree-term">Homme</label>
                                            
                                            <input type="radio" name="sex" id="agree-term" class="agree-term" value="femelle" />
                                            <label for="agree-term" class="label-agree-term">Femme</label>
                                            
                                            <input type="radio" name="sex" id="agree-term" class="agree-term" value="autre" />
                                            <label for="agree-term" class="label-agree-term">Autres</label>
                                         </div>
                                    </div>
                                    <div></div>
                                </div>
                               
                                <br>
                            
                                
                                <div class="form-group ">
                                    <input type="submit" name="submit_form" class="form-submit" value="Enregistrer"/>
                                    <a href="index.php" class="form-submit">Acceuil</a>

                                <a href="signez.php" class="btn btn-danger" class="signup-image-link">Etres vous inscrits ??, Cliquez ici </a>
                        
                                </div>
                            </form>
                        </div>
                        <div >
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    

    <script>

        function checkphone()//Fonction qui vérifie si le téléphone existe ou pas
        {
            var phone=document.getElementById( "UserPhone" ).value;
                
            if(phone)
            {
                $.ajax({
                    type: 'post',
                    url: 'checkdata.php',
                    data: {
                    user_phone:phone,
                    },
                    success: function (response) {
                        $( '#phone_status' ).html(response);
                        if(response=="OK")	
                        {
                            return true;	
                        }
                        else
                        {
                            return false;	
                        }
                    }
                });
            }
                else
                {
                    $( '#phone_status' ).html("");
                    return false;
                }
        }

        function checkemail()//Fonction qui vérifie si le mail existe ou pas
        {
        var email=document.getElementById( "UserEmail" ).value;
            
        if(email)
        {
            $.ajax({
                type: 'post',
                url: 'checkdata.php',
                data: {
                user_email:email,
                },
                success: function (response) {
                    $( '#email_status' ).html(response);
                    if(response=="OK")	
                    {
                        return true;	
                    }
                    else
                    {
                        return false;	
                    }
                }
            });
            }
            else
            {
                $( '#email_status' ).html("");
                return false;
            }
        }

        function checkpass()//Fonction qui vérifie si les mMdp correspondent
        {
            var pass2=document.getElementById( "UserPassword2" ).value;
            var pass=document.getElementById( "UserPassword" ).value;
                
            if(pass2)
            {
                $.ajax({
                    type: 'post',
                    url: 'checkdata.php',
                    data: {
                    user_pass2:pass2,
                    user_pass:pass,
                    },
                    success: function (response) {
                        $( '#pass_status' ).html(response);
                        if(response=="OK")	
                        {
                            return true;	
                        }
                        else
                        {
                            return false;	
                        }
                    }
                });
            }
                else
                {
                    $( '#pass_status' ).html("");
                    return false;
                }
        }


        function checkall()
        {
            var namehtml=document.getElementById("phone_status").innerHTML;
            var emailhtml=document.getElementById("email_status").innerHTML;
            var passhtml=document.getElementById("pass_status").innerHTML;

            if((namehtml && emailhtml && passhtml)=="OK")
            {
                return true;//On peut s'inscrire
            }
            else
            {
                return false;//On ne peut pas s'incrire
            }
        }



    </script>

    </body>
</html>