<?php 
session_start();
require_once '../bd/init.php';


$classificacao = isset($_POST['classificacao']) ? $_POST['classificacao'] : '';
$img = isset($_POST['img']) ? $_POST['img'] : '';
$mysqli = db_connect();
// $email = $mysqli->real_escape_string($_POST['email']);
//$upass = $mysqli->real_escape_string($_POST['password']);
 
//------------------------------------------------------------------------------
    $query1 = "UPDATE participantes SET classificacao = '$classificacao' WHERE img ='$img'";
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
if ($mysqli->query($query1) === TRUE) {
    echo "Participante adicionado com sucesso.";
    sleep(2);
	header("Location: tables.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$mysqli->close();
?>
