<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - Iniciar Sessão</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
</head>
<body>

    <nav class="navbar navbar-expand-lg index-navbar">
        <a class="navbar-brand logo" href="<?php echo $indexPage; ?>">
            <img src="../images/logo.png" class="logo_img" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: transparent;">
            <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml;charset=UTF-8,<svg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'><path stroke=\'%23000\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/></svg>');"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-dark mx-auto pl-md-5">
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
                <a href="<?php echo $userPage; ?>"><i class="fa fa-user"></i></a>
            </div>
        </div>
    </nav>

    <?php
        //Criar váriáveis para informar o utilizador dos erros
        $msg = $errouser = $erropsw = '';

        //A variável SUPER GLOBAL $_REQUEST guarda tanto
        //as variáveis declaradas pelo método GET, como pelo método POST.

        if ($_SERVER["REQUEST_METHOD"] == "POST") { #Verifica se a requisião quando o formulário é enviado é do tipo POST

            //Recebe os dados do formúlario e guarda-os em variáveis
            $nome=$_REQUEST['nome'];
            $senha=$_REQUEST['senha'] ;

            //verifica se os campos estão preenchidos
            if(empty($nome) || empty($senha)){

                #Atribui mensagens de erro às variáveis
                empty($nome) ? $errouser = ' *Inserir nome' : $erropsw = ' *Inserir password';
            }else{
                //Importa o ficheiro config.php no código
                include("../config.php");

                //Verifica se o par utilizador/password existe na BD
                $passw = md5($senha); //Desencripta a password para que o user possa entrar na sua conta
                $sql = "SELECT * FROM clientes WHERE nome='$nome' AND password='$passw' LIMIT 1"; #Faz a consulta à base de dados para verificar se o par user/password existe na tabela clientes
                $resultado=mysqli_query($liga,$sql); #Executa a consulta SQL
                $nregistos=mysqli_num_rows($resultado);

                if($nregistos > 0){ //Verifica se existem registos na base de dados que correspondam aos user/password fornecidos

                    $registo = mysqli_fetch_array($resultado);

                    if ($registo["perfil"] == 'adm') {
                        session_start();
                        $_SESSION["nome"] = $registo["nome"]; #Armazena o nome do utilizador na sessão
                        $_SESSION['perfil'] = 'adm'; #Armazena o perfil "adm" na sessão
                        header('Location: areaAdmin.php');
                        exit(); #Encera o script (permite que o redirecionamento ocorra corretamente)
                    } else {
                        session_start();
                        $_SESSION["nome"] = $registo["nome"];
                        $_SESSION["codcliente"] = $registo["codcliente"];
                        $_SESSION['perfil'] = 'user';
                        header('Location: editarPerfil.php');
                        exit();
                    }
                    
                }else{ //Se o utilizador não existe

                    echo"<script>alert('Utlizador ou Password Errados!')</script>";
                }
            }   
        }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <div class="box col-md-4 mx-auto">
            <div class="form">
                <h2>Iniciar Sessão</h2>
                <div class="inputBox mx-auto pt-md-3">
                    <input type="text" name="nome" required="required" autocomplete="off">
                    <span>Nome</span>
                    <i></i>
                </div>

                <div class="inputBox mx-auto">
                    <input type="password" name="senha" id="pass" required="required">
                    <span>Palavra-Passe</span>
                    <i></i>
                </div>
 
                <input class="mx-auto" type="submit" value="Entrar">
                <div class="links mx-auto">
                    <a href="create.php">Criar conta gratuita &#10132; </a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>