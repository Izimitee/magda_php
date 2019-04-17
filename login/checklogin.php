<?php


// inclui o ficheiro de inicialização
require '../bd/init.php';
 
// vai buscar as variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
 
if (empty($email) || empty($password))
{
    echo "Introduza email e password";
    exit;
}
echo $email;
echo $password;
 
 $mysqli = db_connect();
 
// $email = $mysqli->real_escape_string($_POST['email']);
//$upass = $mysqli->real_escape_string($_POST['password']);
 
 // cria o hash da password
$passwordHash = md5(sha1($password));
 echo $passwordHash;
 

	$query = "SELECT id,username,level,participa FROM users WHERE email='$email' AND password='$passwordHash'";
	
	if($result = $mysqli->query($query)){
	
		$user = $result->fetch_assoc();


		if (count($user) <= 0)
		{
			echo "\nEmail ou password incorretos";
			exit;
		}
		 

		 
		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['user_id'] = $user['id'];
		$_SESSION['user_name'] = $user['username'];
		$_SESSION['user_nivel'] = $user['level'];
		$_SESSION['user_participa'] = $user['participa'];
		//header('Location: backoffice/');
		
	}
	$mysqli->close();
header('Location: ../backoffice/index.php');
?>