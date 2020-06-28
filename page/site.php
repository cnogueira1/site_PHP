<!DOCTYPE html>
<html lang="pt-br">

<?php
  include_once './header.php';
?>


<body>
  <div class="container">
    <div class="row profile">
      <?php 
          include './conteudo/menulateral.php';
        ?>
      <div class="col-md-9">
        <div class="profile-content" style="font-size: 2rem;">
          <?php                 
                if($_GET['site']){
                  switch($_GET['site']){
                      case 'a':
                          include_once('./conteudo/buscaApi.php');
                          break;
                      case 'b':
                          include_once('./conteudo/usuarios.php');
                          break;
                      case 'c':
                          include_once('./conteudo/config.php');
                          break;  
                      case 'd':
                        include_once('./conteudo/tarefas.php');
                        break;            
                      default:
                        include_once('./conteudo/buscaApi.php');
                  }
                }
          ?>
        </div>
      </div>
    </div>
  </div>
  <script src="/complementos/js/main.js"></script>
</body>

</html>