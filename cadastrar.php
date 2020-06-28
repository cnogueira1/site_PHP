<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="/complementos/js/Cadastro.js"></script>
  <link rel="stylesheet" href="/complementos/css/Cadastro.css">
  <link rel="shortcut icon" href="./complementos/img/teemo.png" type="image/x-icon">
</head>

<body style="padding: 10px">

  <form method="post" action="./enviadados.php" class="form-horizontal" enctype="multipart/form-data">
    <fieldset>
      <div class="panel panel-primary">
        <div class="panel-heading">Cadastro Usuário</div>

        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-11 control-label">
              <p class="help-block">
                <h11>*</h11> Campo Obrigatório
              </p>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label" for="name"> Imagem <h11>*</h11></label>
            <div class="col-md-8">
              <div class="input-group">
                <input required="" name="arquivo" type="file" />
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="name">Nome <h11>*</h11></label>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input id="name" name="name" placeholder="" class="form-control input-md" required="" type="text">
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="user">Usuario <h11>*</h11></label>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" id="user" name="user" pattern="[A-Za-z0-9.]{6,16}" 
                  title='Sem espaço/characters especiais com no maximo 16 characters e no minimo 8'
                 placeholder="" class="form-control input-md" required="" >
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="date">Nascimento<h11>*</h11></label>
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>              
                <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required=""
                  type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label" for="prependedtext">Email <h11>*</h11></label>
            <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="prependedtext" name="prependedtext" class="form-control" placeholder="email@email.com"
                  required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
              </div>
            </div>
          </div>
         

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="area"> Area <h11>*</h11></label>
            <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input id="area" name="area" placeholder="" class="form-control input-md" required="" type="text">
              </div>
            </div>
          </div>


          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="estado">Estado <h11>*</h11></label>
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-plane"></i></span>
                <input id="estado" name="estado" placeholder="" min='1' max='2' maxlength="2" class="form-control input-md" required="" type="text">
              </div>              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="senha">Senha <h11>*</h11></label>
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-warning-sign"></i></span>
                <input id="senha" name="senha" placeholder="" class="form-control input-md" required="" type="password">
              </div>             
            </div>
          </div>

          <!-- Button (Double) -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="Cadastrar"></label>
            <div class="col-md-8">
              <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
              <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
            </div>
          </div>
        <button id="voltar" name="voltar" style="width:120px" class="btn btn-success"><a style="width:120px;text-decoration:none;color:#fff" href="index.php">Voltar</a></button>
        </div>
      </div>

      
    </fieldset>
  </form>
  <script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    if(getParameterByName('info') === 'error' && getParameterByName('msg') === '1') {
        alert('Erro ao cadastrar login/email já esta em uso!');
    }

  </script>
</body>

</html>