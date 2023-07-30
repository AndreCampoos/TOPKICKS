<?php
    session_start();

    #Verifica se o tipo de utilizador armazenasdo na sessão é diferente de "user", se for diferente, é reenchaminhado para a página de login
    if ($_SESSION['perfil'] !== 'user') {
        header("Location: login.php");
        exit();
    }

    include("../config.php");

    $codcliente = $_SESSION['codcliente']; #Obtém o código do cliente armazenado na variável de sessão

    $consulta = "SELECT * FROM clientes WHERE codcliente = $codcliente"; #Faz uma consulta a todos os campos da tabela clientes onde o código do cliente é igual ao código armazenado em $codcliente 
    $resultado = mysqli_query($liga, $consulta); #Executa a consulta
    $registo = mysqli_fetch_assoc($resultado);

    #Armazena o valor dos campos da tabela nas variáveis
    $nome = $registo['nome'];
    $email = $registo['email'];
    $telefone = $registo['telemovel'];
    $password = $registo['password'];

    $pass = md5($password);

    #Verifica se o utilizador carregou no botão "sair", se sim, a sessão é terminada e o utilizador é redirecionado para a página de login
    if (isset($_POST["sair"])) {
        session_destroy();
        header("Location: login.php");
        exit;
    }

    #Verifica se o formulário foi enviado através do método POST e obtém os novos valores e armazena-os nas respetivas variáveis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telemovel"];
        $password = $registo['password'];

        // Atualize os valores na base de dados
        $query = "UPDATE clientes SET nome = '$nome', email = '$email', telemovel = '$telefone' , password = '$password' WHERE codcliente = $codcliente";
        $resultado = mysqli_query($liga, $query);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - Editar Perfil</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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


    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="editBox col-md-4 mx-auto">
            <div class="form">
                <h2>Editar Perfil</h2>
                <div class="editInputBox mx-auto pt-md-3">
                    <input type="text" name="nome" autocomplete="off" value="<?php echo $nome; ?>">
                    <span>Nome</span>
                    <i></i>
                </div>
                <div class="editInputBox mx-auto">
                    <input type="email" name="email" id="email" autocomplete="off" value="<?php echo $email; ?>">
                    <span>E-mail</span>
                    <i></i>
                </div>

                <div class="editInputBox mx-auto">
                    <input type="text" name="telemovel" id="tlmnumero"  maxlength='9' autocomplete="off" value="<?php echo $telefone; ?>">
                    <span>Telefone</span>
                    <i></i>
                </div>
                <div>
                    <input class="mx-auto editButton" type="submit" name="sair" value="Sair">
                    <input class="mx-auto editButton" type="submit" value="Salvar">
                </div>

            </div>
        </div>
    </form>

    <?php

        if (!$nome || !$email || !$telefone){
            echo"<script>alert('Por favor, preencha todos os campos!')</script>";
            exit;
        }

        include("../config.php");

        $atualiza = "UPDATE clientes SET nome = '$nome', email = '$email', telemovel = '$telefone' WHERE codcliente = '$codcliente'";
        $resultado=mysqli_query($liga,$atualiza);
    ?>


</body>
</html>