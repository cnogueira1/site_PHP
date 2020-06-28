
<figure style='width:100%;text-align:center;'>
<?php 
  echo "<img style='width:200;height:250px;' class='img-thumbnail' src='../complementos/img/user/{$image}' height='190px'>"
?>         
</figure>      

      

  <form method="POST" action="./salvamento.php" enctype="multipart/form-data">     
      <input class="config form-control mb-2 mr-sm-2" name="arquivo" id='arquivo'type="file" /> 
      <label class="mb-2 mr-sm-2"for="nome">Nome: <?php  echo '<color>'.$list['nome_completo'].'</color>' ?></label>
      <?php 
        echo "<input required class='form-control mb-2 mr-sm-2' type='text' value='{$list['nome_completo']}' name='nome' id='nome'>"
      ?>             
      <label class="mb-2 mr-sm-2" for="senha">Senha: </label>
      <input required id='senha_reset' onclick="limpar()" class="config form-control mb-2 mr-sm-2"  <?php echo "value='{$list['senha']}'"?> type="password" name="senha" id="senha">
      <label class="mb-2 mr-sm-2" for="email">E-mail: <?php echo '<color>'.$list['email'].'</color>' ?></label>
      <input required class=" config form-control mb-2 mr-sm-2" type="email"  <?php echo "value='{$list['email']}'"?> name="email" id="email">
      <label class="mb-2 mr-sm-2" for="data">Data Nascimento:<?php $data = data($list['data_nascimento']); echo '<color>'.$data.'</color>' ?></label>
      <input class="config form-control mb-2 mr-sm-2" type="date"  <?php ?> name="data" id="data">
      <label class="mb-2 mr-sm-2" for="cargo">Cargo: <?php echo '<color>'.$list['cargo'].'</color>' ?></label>
      <input required  class="config form-control mb-2 mr-sm-2" type="text"  <?php echo "value='{$list['cargo']}'"?> name="cargo" id="cargo">
      <label class="mb-2 mr-sm-2" for="estado">Estado: <?php echo '<color>'.$list['estado'].'</color>' ?></label>
      <input required class="config form-control mb-2 mr-sm-2" type="text" <?php echo "value='{$list['estado']}'"?> name="estado" id="estado">
      <button class="btn btn-success btn-sm" type='submit'>SALVAR</button>
</form>

<style>
  form input.config{
    font-size:1.2rem;
  }
  color{
    color:#00adb5;
  }
</style>