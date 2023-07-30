<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - Criar Conta</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand logo" href="../index.php">
            <img src="../images/logo.png" class="logo_img" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: transparent;">
            <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml;charset=UTF-8,<svg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'><path stroke=\'%23000\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/></svg>');"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-dark mx-auto">
            <li class="nav-item pt-3 pt-md-0">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../products/produtos.php">PRODUTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../products/nike.php">NIKE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../products/adidas.php">ADIDAS</a>
            </li>
            </ul>
            <div class="icons pt-3 pt-md-0 ml-auto">
                <a href='../products/favoritos.php' class='fa fa-heart'></a>
                <a href="../products/carrinho.php"><i class="fa fa-shopping-cart"></i></a>
                <a href="editarPerfil.php"><i class="fa fa-user"></i></a>
            </div>
        </div>
    </nav>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <div class="box-create mb-md-5 col-md-4 mx-auto">
            <div class="form">
                <h2>Criar Conta</h2>
                <div class="inputBox mx-auto pt-md-3">
                    <input type="text" name="utilizador" id="iduser" required="required" autocomplete="off">
                    <span>Nome</span>
                    <i></i>
                </div>

                <div class="inputBox mx-auto">
                    <input type="email" name="email" id="email" required="required" autocomplete="off">
                    <span>E-mail</span>
                    <i></i>
                </div>

                <div class="inputBox mx-auto">
                    <input type="text" name="tlm" id="tlmnumero" maxlength='9' m required="required" autocomplete="off">
                    <span>Telefone</span>
                    <i></i>
                </div>

                <div class="inputBox mx-auto">
                    <input type="password" name="senha1" id="idsenha" required="required">
                    <span>Palavra-Passe</span>
                    <i></i>
                </div>

                <div class="inputBox mx-auto">
                    <input type="password" name="senha2" id="idsenha" required="required">
                    <span>Confirmar Palavra-Passe</span>
                    <i></i>
                </div>

                <input class="mx-auto" type="submit" value="Enviar">
                <div class="links mx-auto">
                    <a href="login.php">Iniciar Sessão &#10132; </a>
                </div>
            </div>
        </div>
    </form>

    <?php
        $msg = '';

        include("../config.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST"){ #Verifica se o formulário foi enviado com o método POST, ou seja, todo o texto aqui dentro só será executado quando o formulário for submetido. 
            $nome = $_POST['utilizador'];
            $password = $_POST['senha1'];
            $confirm = $_POST['senha2'];
            $email = $_POST['email'];
            $numtlm = $_POST['tlm'];

            if (empty ($nome) || empty ($password) || empty ($confirm) || empty ($email) || empty ($numtlm)) {
                echo"<script>alert('Preencha todos os campos!')</script>";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo"<script>alert('Introduza um e-mail válido!')</script>";
            }elseif($password != $confirm) {
                echo"<script>alert('As passwords não correspondem!')</script>";
            }else{
                $msg=registaUtilizador($nome, $email, $password, $numtlm);
            }
        }

        #Esta função verifica se o e-mail já está registado na base de dados
        function mailExiste($email) {  
            include("../config.php");
            $query = "SELECT email FROM clientes WHERE email = '$email' LIMIT 1";
            $resultado = mysqli_query($liga, $query);
            $contar = mysqli_num_rows($resultado);
            if($contar == 0) {
                return false;
            }else{
                return true;
            }
        }

        #Esta função faz o registo do utilizador
        function registaUtilizador($nome, $email, $password, $numtlm) {
            $nome = ucwords(strtolower($nome));
            $pass = md5($password);
            $mailExiste = mailExiste($email);

            #Verifica se o e-mail já existe. Se já existir exibe a mensagem de erro, se não tenta fazer o registo do utilizador.
            if($mailExiste){
                echo"<script>alert('E-mail já registado, tente outro e-mail!')</script>";
            }else{
                include("../config.php");
                $query = "INSERT INTO clientes (nome,password,email,telemovel) VALUES ('$nome','$pass','$email','$numtlm')";
                $resultado = mysqli_query($liga,$query);
                if($resultado == true) {
                    echo"<script>alert('Utlizador registado com sucesso!')</script>";
                    header('Location:/../index.html');
                }else{
                    echo"<script>alert('Utlizador não registado!')</script>";
                }
            }
        }
    ?>
</body>
</html>