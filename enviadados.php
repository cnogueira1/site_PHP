<?php 

require_once './page/conecta/Banco.php';

session_start();

$name = $_POST['name'];
$user = $_POST['user'];
$date = data($_POST['dtnasc']);
$mail = $_POST['prependedtext'];
$area = $_POST['area'];
$estado = $_POST['estado'];
$senha = md5($_POST['senha']);

$db = new DB_CONNECT();
$con = $db->getConnection();

try{
    $busca = "SELECT login, email from usuario_login where login='$user' or email='$mail'";
    $queryBusca = mysqli_query($con, $busca) or die (mysqli_error($con));
    $rowBusca = mysqli_fetch_assoc($queryBusca);
}catch(Exception $e){
    echo "erro na busca";
}
 
// verifica se foi enviado um arquivo
if ( empty($rowBusca) && isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
  
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
        $destino = './complementos/img/user/'.$novoNome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

            try {
                $result = "INSERT INTO usuario_login values (null,'$user','$senha','$mail','$name','$date','$area', '$estado','$novoNome');";
                $query = mysqli_query($con, $result) or die (mysqli_error($con));
            } catch (Exception $e) {
                echo "erro inserir usuario";
            }    
        
            header('location:./index.php');

        }
        else
            header('location:cadastrar.php?info=error&msg=1');
    }
    else
        header('location:cadastrar.php?info=error&msg=1');
}
else
    header('location:cadastrar.php?info=error&msg=1');


Function data($data){
    return date("Y/m/d", strtotime($data));
}

?>