<?php 

require_once './conecta/Banco.php';

$db = new DB_CONNECT();

session_start();

$login = $_POST['login'];
$senha = md5($_POST['senha']);

$con = $db->getConnection();

$result = "SELECT * FROM usuario_login where login = '$login' and senha= '$senha'";
$query = mysqli_query($con, $result) or die (mysqli_error($con));


$row = mysqli_fetch_assoc($query);

if($row)
{
    $_SESSION['result'] = $row;
    $_SESSION['login'] = $login;
    header('location:site.php?site=a');
} else {   
    unset ($_SESSION['login']);
    unset ($_SESSION['result']);
    header('location:../index.php');
}

?>
