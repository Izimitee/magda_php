<?php
 
/**
 * Conecta com o MySQL utilizando mysqli
 */
function db_connect()
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	if ($mysqli->connect_errno) {
    // A conexão falhou 
       echo "Pedimos desculpa, mas estamos com problemas no acesso à BD.";
       
    exit;
	}
	$mysqli->set_charset('utf8');
    return $mysqli;
}
 
 
/**
 * Cria o hash da password, utilizando MD5 e SHA-1
 */
function make_hash($str)
{
    return sha1(md5($str));
}
 
 
/**
 * Verifica se o utilizador fez login
 */
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    return true;
}
?>