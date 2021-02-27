<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mon_student';

$conn = mysqli_connect($host, $user, $pass, $db);
$searchTerm = $_GET['term'];
$sql = "SELECT * FROM users WHERE username LIKE '%".$searchTerm."%'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
  $tutorialData = array(); 
  while($row = $result->fetch_assoc()) {
   $data['id']    = $row['id']; 
   $data['value'] = $row['username'];
   array_push($tutorialData, $data);
} 
}


 ?>