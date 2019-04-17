<?php 
session_start();
require_once '../bd/init.php';

$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';

$pass = $password;
 $mysqli = db_connect();
$passwordHash = md5(sha1($password));
// $email = $mysqli->real_escape_string($_POST['email']);
//$upass = $mysqli->real_escape_string($_POST['password']);
 

 
//------------------------------------------------------------------------------
	$query = "insert into users (username,email,password,level,participa) VALUES 
	('$username','$email','$passwordHash','$nivel','0')";
//------------------------------------------------------------------------------
	
	$msg = "A conta foi criada com sucesso!!!";

	// use wordwrap() if lines are longer than 70 characters
	$msg = wordwrap($msg,70);
	
	// send email
	mail($email,"Conta criada com sucesso",$msg);
//------------------------------------------------------------------------------
if ($mysqli->query($query) === TRUE) {
    echo "Utilizador adicionada com sucesso.";
	sleep(2);
	header("Location: ../index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$mysqli->close();
?>
