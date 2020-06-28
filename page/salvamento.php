<?php 
require_once './conecta/Banco.php';

session_start();

$id = $_SESSION['result']['idlogin'];
$user = $_SESSION['result']['login'];
$name = $_POST['nome'];
$senha = $_POST['senha'] === ''? $_SESSION['result']['senha'] : $_POST['senha'];
$senha = $_POST['senha'] === $_SESSION['result']['senha']? $_SESSION['result']['senha'] : md5($_POST['senha']);
$email = $_POST['email'];
$data = $_POST['data'] === ''? $data = $_SESSION['result']['data_nascimento'] : data($_POST['data']);
$cargo =$_POST['cargo'];
$estado =$_POST['estado'];

Function data($data){
    return date("Y/m/d", strtotime($data));
}

if (isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
  
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome = $_FILES[ 'arquivo' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = $user .'.' .$extensao;
 
        // Concatena a pasta com o nome
        $destino = '../complementos/img/user/'.$novoNome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
        
            
        }
        else
          echo "erro";
    }
    else
       echo "erro";
}
else
   echo "erro";


$imageNome = $novoNome == '' ? $_SESSION['result']['image'] : $novoNome ;

$db = new DB_CONNECT();
$con = $db->getConnection();

$result = "UPDATE usuario_login set nome_completo ='{$name}', senha='$senha',email='$email',data_nascimento='$data',cargo='$cargo',estado='$estado',image='$imageNome' where idlogin='$id'";
$query = mysqli_query($con, $result) or die (mysqli_error($con));

$row = mysqli_fetch_assoc($query);

$result2 = "SELECT * FROM usuario_login where idlogin='$id'";
$query2 = mysqli_query($con, $result2) or die (mysqli_error($con));

$row2 = mysqli_fetch_assoc($query2);

$_SESSION['result'] = $row2;

header('location:site.php?site=a');

?>