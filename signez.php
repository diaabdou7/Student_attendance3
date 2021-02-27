<!DOCTYPE html>
<html>
<head>
	<title>Student Attendance2</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <!-- Font Icon -->
	 <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
</head>
<body>	
	<div class="main">
		<div class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
						<figure></figure>
                        <a href="sentdata.php" class="signup-image-link">Creer un compte</a>
					</div>
					<div class="signin-form">
                        <h2 class="form-title">Signature</h2>
						<form id="login_form" name="form1" method="post">	
							<div class="form-group">
								<label for="pwd"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="email" class="form-control" id="email_log" placeholder="Email" name="email">
							</div>
							<div class="form-group">
								<label for="pwd"><i class="zmdi zmdi-lock"></i></label>
								<input type="password" class="form-control" id="password_log" placeholder="Password" name="password">
							</div>
							<input type="submit" name="submit" class="form-submit" value="Signer" id="butlogin">
							<a href="index.php" class="form-submit">Acceuil</a>
						</form>
					</div>
			</div>
			</div>
		</div>
	</div>


<script>
$(document).ready(function() {
	
	$('#butlogin').on('click', function() {
		var email = $('#email_log').val();
		var password = $('#password_log').val();
		if(email!="" && password!="" ){
			$.ajax({
				url: "check.php",
				type: "POST",
				data: {
					type:2,
					email: email,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = 'welcome.php';		
					}
					else if(dataResult.statusCode==201){
						alert('Mauvais mail ou mdp');
					}
					
				}
			});
		}
		else{
			alert('Remplissez tous les champs !');
		}
	});
});
</script>
</body>
</html>    
     