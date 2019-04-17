<?php 
session_start();
require_once '../../bd/init.php';


$n_chip = isset($_POST['chip']) ? $_POST['chip'] : '';
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
$nome_cao = isset($_POST['nome']) ? $_POST['nome'] : '';
$raca = isset($_POST['raca']) ? $_POST['raca'] : '';
$ano_nasc = isset($_POST['ano_nasc']) ? $_POST['ano_nasc'] : '';
$vacinas = isset($_POST['vacinas']) ? $_POST['vacinas'] : '';
$id = $_SESSION['user_id'];
$mysqli = db_connect();
// $email = $mysqli->real_escape_string($_POST['email']);
//$upass = $mysqli->real_escape_string($_POST['password']);
 
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        ?>alert(<?php echo "File is an image - " . $check["mime"] . ".";?>)<?php
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $message = "Paricipante adicionado com sucesso";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        echo "Sorry, there was an error uploading your file.";
        
        $message = "Paricipante adicionado com sucesso";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

$n_fich = basename( $_FILES["fileToUpload"]["name"]);
//------------------------------------------------------------------------------
	$query = "insert into participantes (id,nome,ano_nasc,numero_chip,raca,vacinas,sexo,img) VALUES 
    ('$id','$nome_cao',
    '$ano_nasc','$n_chip','$raca','$vacinas','$sexo','$n_fich')";
    $query1 = "UPDATE users
    SET participa = 1 WHERE id='$id'";
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
if ($mysqli->query($query) === TRUE && $mysqli->query($query1) === TRUE) {
    echo "Participante adicionado com sucesso.";
    sleep(2);
	header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$mysqli->close();

$message = "Paricipante adicionado com sucesso";
echo "<script type='text/javascript'>alert('$message');</script>";
?>
