<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "mon_student";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM users";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM users WHERE username ='$name'";
}

$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Basic Search form using mysqli</title>
<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<label>Search</label>
<form action="" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">

</form>
<a href="admin_dashboard.php">
 <input type="button" value="Return" name="btn" class="btn btn-sm btn-danger">    
</a>

<h2>List of students</h2>
<table class="table table-striped table-responsive">
<tr>
<th>ID</th>
<th>First name</th>
<th>Email</th>
<th>Phone</th>
<th>Uploaded Date</th>
</tr>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
        
            <td><?php echo $row["username"]; ?></>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["sex"]; ?></td>
            <td><?php echo $row["phone"]; ?></td>

            <td> <a href="profile_student.php?id=<?php echo $row["id"]; ?>">Profil</a></td>
    </tr>
    <?php
}
?>
</table>
</div>
</body>
</html>
