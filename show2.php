<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
    <form action ="" name="formulaire">
    	  <label for ="nom">Nom:</label>
    	  <input type="email" name="email" id="email_log">

    	  <label for="password">Password</label>
    	  <input type="pass" name="password" id="password_log">

    	  <input type="submit" name="submit" id="but_submit" value="Submit">

    </form>
    <script type="text/javascript">
    	  $(document).ready(function(){
    	  	$('#but_submit').on("cilick", function(){
    	  		  var email = $('#email_log').val();
    	  		  var password = $('#password_log').val();

    	  		  if(!email ="" && !password =""){
    	  		  	 $.ajax({
    	  		  	 	 url:'check.php',
    	  		  	 	 type:'POST',
    	  		  	 	 data:{
    	  		  	 	 	type:2,
    	  		  	 	 	email: email,
    	  		  	 	 	password: password,
    	  		  	 	 },
    	  		  	 	 cache:false,
    	  		  	 	 success:function(data){

    	  		  	 	 	var data = JSON.parse(data);

    	  		  	 	 	if (data.statuscode ==200) {
    	  		  	 	 		location.href ="welcome.php":
    	  		  	 	 	}
    	  		  	 	 	else if( data.statuscode ==201){
    	  		  	 	 		echo "email ou mot de pass incorrect";

    	  		  	 	 	}

    	  		  	 	 }


    	  		  	 });

    	  		  }
    	  		   else{
    	  		  	 	echo "veiller remplir tous les champs";
    	  		  	 }
    	  	});

    	  });
    </script>
</body>
</html>