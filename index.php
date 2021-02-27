<!DOCTYPE html>
<html>
<head>

   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


	<title></title>
</head>
<body>

	<style>

		body{

			background:	#C0C0C0;
		}
		
		nav{font-family: "lato", cooper;

			background: blue;
			text-decoration: black;
		}

		h1{

			text-align: center;
			text-decoration-color: red;
		}

		.sidebar{
			width: 100px;
			height: 100%;
			background: red;
		}

		h4{
			text-align: center;
			text-decoration-color: white;
		}

/* Texte défilant */
.content {
	display: block;
	margin: 40px auto;
	padding: 0;
	overflow: hidden;
	position: relative;
	/*	table-layout: fixed;*/
	width: 600px;
	height: 60px;
}
.message {
	display: block;
	margin-left: -100%;
	padding: 0 5px;
	font-size: 2rem;
	text-align: left;

}
.message:after {
	content: attr(data-text);
	position: absolute;
	white-space: nowrap;
	padding-left: 10px;
}
 @keyframes defilement {
 0%, 100% {
margin-left:70%;
}
 99.99% {
margin-left:-100%;
}
}

	</style>


<nav>

		<span class="message"> ATTENDANCE STUDENT </span> 

</nav>


<div class="container">
		
		 <br><br> <h4>STUDENT ATTENDANCE </h4><br><br><br><br><br>

  <div class="row">	 
	 <div class="col-md-4">
	  	<div class="card card-signin">
	  		<div class="card-body">
	  			<div class="card-title text-center">
			    		<a href="login.php" class="btn btn-success">Teacher
                      <img src="prog.jpg" alt="" width="150px">
                    </a>
		    			
		</div>
			</div>
				</div>
	</div>
  
	<div class="col-md-4">
	  	<div class="card card-signin">
	  		<div class="card-body">
	  			<div class="card-title text-center">
			    		<a href="signez.php" class="btn btn-success">Student
                      <img src="eleve.jpg" alt="" width="250px">
                    </a>
		    			
		</div>
			</div>
				</div>
	</div>

  
        
    
      <div class="col-md-4">
          

        <div class="card card-signin">
            <div class="card-body">
                <div class="card-title text-center">
                     <p>Have not count ?</p>
                     	<a href="sentdata.php" class="btn btn-success">Registration
                      <img src="registre.jpg" alt="" width="350px">
                    </a>                            
        </div>
            </div>
                </div>
    
  </div>


	</div>
  <br><br><br>

  </div>
  <div class="row">

  <div class="col-md-4"></div>

</div>


</body>
</html>