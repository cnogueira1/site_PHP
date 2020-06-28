<?php 

  require './startSession.php'

?>

<div class="col-md-3">
  <div class="profile-sidebar">
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
      <div class="container">
        <div class="d-flex justify-content-center h-100">
          <div class="image_outer_container">
            <div class="green_icon"></div>
            <div class="image_inner_container">
              <?php 
                  echo "<img src='/complementos/img/user/{$image}'  />"
                ?>
            </div>
          </div>
        </div>
      </div>
      <div class="profile-usertitle-name">
        <?php 
                echo $list['nome_completo'] .'<br>';
                echo '@'.$list['login'];
              ?>
      </div>
      <div class="profile-usertitle-job">
        <?php 
                echo $list['cargo'];
              ?>
      </div>
    </div>

    <div class="profile-usermenu">
      <ul class="nav">
        <li>
          <a href="site.php?site=a">
            <i class="glyphicon glyphicon-home"></i>
            Mural </a>
        </li>
        <li>
          <a href="site.php?site=b">
            <i class="glyphicon glyphicon-send"></i>
            Usuarios </a>
        </li>
        <li>
          <a href="site.php?site=c">
            <i class="glyphicon glyphicon-user"></i>
            Configurações </a>
        </li>
        <li>
          <a href="site.php?site=d">
            <i class="glyphicon glyphicon-ok"></i>
            Tarefas </a>
        </li>
        <li>
          <?php
            echo "<a href='logout.php?token=".md5(session_id())."'> <i class='glyphicon glyphicon-flag'></i> Sair </a>"
          ?>
        </li>
      </ul>
    </div>
    <!-- END MENU -->
  </div>
  <script type='text/javascript'>

  </script>
</div>