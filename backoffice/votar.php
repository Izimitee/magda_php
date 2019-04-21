<?php 
session_start();
require_once '../bd/init.php';


$classificacao = isset($_POST['classificacao']) ? $_POST['classificacao'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$mysqli = db_connect();
// $email = $mysqli->real_escape_string($_POST['email']);
//$upass = $mysqli->real_escape_string($_POST['password']);
 
//------------------------------------------------------------------------------
    $query = "Select classificacao from participantes WHERE id = '$id'";
    
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
if ($result = $mysqli->query($query)) {
    $classificacao_default = $result->fetch_assoc()['classificacao'];
    
	
} else {
    echo "Error: Não pôde votar."  . "<br>" . $mysqli->error;
}
$classificacao_total = $classificacao + $classificacao_default;
$query1 = "UPDATE participantes SET classificacao = '$classificacao_total' WHERE id ='$id'";
if ($mysqli->query($query1) === TRUE) {
    
    
	
} else {
    echo "Error: Não pôde votar."  . "<br>" . $mysqli->error;
}
$user_id = $_SESSION['user_id'];
//-----------------------------------------------------------------------------------------
$query_conf_vot = "Insert into confirma_votacao(user_id,participante_id) values ('$user_id','$id')";
                    //INSERT INTO `confirma_votacao`(`user_id`, `participante_id`) VALUES ([value-1],[value-2])
if ($mysqli->query($query_conf_vot) === TRUE) {
    
	header("Location: tables.php");
} else {
    echo "Error: Não pôde votar."  . "<br>" . $mysqli->error;
}
$mysqli->close();
?>
