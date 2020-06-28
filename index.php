<!DOCTYPE html>
<html>

<head>
    <?php 
        session_start();
        if(isset($_SESSION['result']) == true)
        {
        header('location:/page/site.php');
        }
    
    ?>
    <title>Login Page</title>
    <link rel="shortcut icon" href="./complementos/img/teemo.png" type="image/x-icon">
    
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="/complementos/css/styles.css">
    <link rel="shortcut icon" href="./complementos/img/icon.png" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="/page/ope.php" id="formlogin" name="formlogin">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" required='required' name="login" id="login" placeholder="usuário">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password"name="senha" id="senha" class="form-control" required='required' placeholder="senha">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Lembrar
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Não tem uma conta?<a href="cadastrar.php">Inscreva-se</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Esqueceu sua senha?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>