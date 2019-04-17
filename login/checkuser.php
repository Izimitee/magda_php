<?php 
session_start();
require_once '../../bd/init.php';

$nome = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
 
$pass = $password;
 $mysqli = db_connect();
$passwordHash = make_hash($password);
// $email = $mysqli->real_escape_string($_POST['email']);
//$upass = $mysqli->real_escape_string($_POST['password']);
 

 

	$query = "insert into users (name,email,password) VALUES 
	('$nome','$email','$passwordHash')";
	
	
	

if ($mysqli->query($query) === TRUE) {
    echo "Utilizador adicionada com sucesso.";
	sleep(2);
	header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$mysqli->close();
?>
