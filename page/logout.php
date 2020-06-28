<?php 

session_start();
$token = md5(session_id());
if(isset($_GET['token']) && $_GET['token'] === $token) {
   // limpe tudo que for necessário na saída.
   // Eu geralmente não destruo a seção, mas invalido os dados da mesma
   // para evitar algum "necromancer" recuperar dados. Mas simplifiquemos:
session_destroy();
header("location:../index.php");
exit();
} else if($_SESSION['login'] and $_SESSION['result']) {
    header('location:site.php?site=a');
}else{
    header('location:../index.php');
}

?>