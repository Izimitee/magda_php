<?php 
session_start();
require_once '../../bd/init.php';
$ano = isset($_POST['ano']) ? $_POST['ano'] : '';



 $mysqli = db_connect();

// $email = $mysqli->real_escape_string($_POST['email']);
//$upass = $mysqli->real_escape_string($_POST['password']);
 

 
//------------------------------------------------------------------------------
	$query = "insert into concursos (ano) VALUES 
    ('$ano')";
    $query1 = "update concursos set ativo = 0 where ativo = 1";
//------------------------------------------------------------------------------
	
	
//------------------------------------------------------------------------------
if ($mysqli->query($query1) === TRUE && $mysqli->query($query) === TRUE) {
    echo "Utilizador adicionada com sucesso.";
	sleep(2);
	header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$mysqli->close();
?>
