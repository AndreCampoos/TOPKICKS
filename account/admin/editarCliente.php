<?php
	session_start();

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['nome'])){
        echo"<script type='text/javascript'>alert('Registe-se para ter acesso!')</script>";
		header("Location: login.php");
        exit;
    }

    $utilizador = $_SESSION["nome"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - Editar Cliente</title>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"integrity="sha512-..." crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../../images/favicon.png">
    <style>
        input[type="submit"]{
            color: black;
            height: 34px;
            width: 150px;
        }

        #sidebar .side-menu li a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg index-navbar fixed-top" id='menu-bar'>
        <a class="navbar-brand logo" href="../../index.php">
            <img src="../../images/logo.png" class="logo_img" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
            style="background-color: transparent;">
            <span class="navbar-toggler-icon"
                style="background-image: url('data:image/svg+xml;charset=UTF-8,<svg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'><path stroke=\'%23000\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/></svg>');"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-dark mx-auto pl-md-5">
                <li class="nav-item pt-3 pt-md-0">
                    <a class="nav-link" href="../../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../products/produtos.php">PRODUTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../products/nike.php">NIKE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../products/adidas.php">ADIDAS</a>
                </li>
            </ul>
            <div class="icons pt-3 pt-md-0 ml-auto">
                <a href='../../products/favoritos.php' class='fa fa-heart'></a>
                <a href="../../products/carrinho.php"><i class="fa fa-shopping-cart"></i></a>
                <?php
                if (isset($_SESSION['perfil'])) {
                    $userType = $_SESSION['perfil'];
                    if ($userType === 'user') {
                        echo '<a href="../editarPerfil.php"><i class="fa fa-user"></i></a>';
                    } elseif ($userType === 'adm') {
                        echo '<a href="../areaAdmin.php"><i class="fa fa-user"></i></a>';
                    }
                } else {
                    echo '<a href="../login.php"><i class="fa fa-user"></i></a>';
                }
                ?>
            </div>
        </div>
    </nav>

    <section id="sidebar">
        <ul class="side-menu pl-0">
            <li>
                <a href="../areaAdmin.php">
                    <i class='bx bxs-home'></i>
                    <span class="text pt-md-1">Painel</span>
                </a>
            </li>
            <hr>
            <li class='mt-md-3'>
                <a href="listarCliente.php">
                    <i class='bx bxs-user'></i>
                    <span class="text pt-md-1">Clientes</span>
                </a>
            </li>
            <li>
                <a href="inserirCliente.php">
                    <i class='bx bx-plus-medical'></i>
                    <span class="text pt-md-1">Inserir Cliente</span>
                </a>
            </li>
            <li class='active'>
                <a href="editarCliente.php">
                    <i class='bx bxs-edit'></i>
                    <span class="text pt-md-1">Editar Cliente</span>
                </a>
            </li>
            <li>
                <a href="apagarCliente.php">
                    <i class='bx bxs-trash-alt'></i>
                    <span class="text pt-md-1">Apagar Cliente</span>
                </a>
            </li>
            <hr>
            <li class='mt-md-3'>
                <a href="listarProdutos.php">
                    <i class='bx bxs-shopping-bag'></i>
                    <span class="text pt-md-1">Produtos</span>
                </a>
            </li>
            <li>
                <a href="inserirProduto.php">
                    <i class='bx bx-plus-medical'></i>
                    <span class="text pt-md-1">Inserir Produto</span>
                </a>
            </li>
            <li>
                <a href="editarProduto.php">
                    <i class='bx bxs-edit'></i>
                    <span class="text pt-md-1">Editar Produto</span>
                </a>
            </li>
            <li>
                <a href="apagarProduto.php">
                    <i class='bx bxs-trash-alt'></i>
                    <span class="text pt-md-1">Apagar Produto</span>
                </a>
            </li>
            <hr>
            <li class='mt-md-3'>
                <a href="vendas.php">
                    <i class='bx bxs-wallet'></i>
                    <span class="text pt-md-1">Vendas</span>
                </a>
            </li>
            <hr>
            <li class='mt-md-3'>
                <a href="../logout.php" class='logout'>
                    <i class='bx bx-exit'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <?php
    $liga=mysqli_connect('localhost','root');
    mysqli_select_db($liga,'topkicks');
    $consultaClientes="SELECT * FROM clientes";
    $resultadoClientes=mysqli_query($liga,$consultaClientes);
    $nClientes=mysqli_num_rows($resultadoClientes);

    echo "<section id='content' class='mt-md-5'>";
    echo "<main>";
    echo "<div class='head-title'>";
    echo "<div class='left'>";
    echo "<div class='d-flex align-items-center'>";
    echo "<i class='bx bx-menu mt-md-1 pr-md-2'></i>";
    echo "<div class='vertical-line pr-md-2'></div>";
    echo "<h1 class='mt-md-3'>Editar Cliente</h1>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<div class='horizontal_line mb-md-2 ml-md-0'></div>";

    echo "<form method='GET' action='atualizarCliente.php'";
    echo "<label for='codcliente'>Código do Cliente - </label>";
    echo "<input type='text' class='mr-md-1' name='codcliente' id='idcodcliente' required>";
    echo "<input type='submit' value='Atualizar'>";
    echo "</form>";

    echo "<table style='width:92.5%' class='mt-md-1 ml-md-0 text-center'>";
    echo "<tr>";
    echo "<th>Código</th>";
    echo "<th>Nome</th>";
    echo "<th>Email</th>";
    echo "<th>Telemóvel</th>";
    echo "<th>Perfil</th>";
    echo "</tr>";

    // ...

    for ($i = 0; $i < $nClientes; $i++) {
        $registo = mysqli_fetch_assoc($resultadoClientes);

        echo "<tr>";
        echo "<td>" . $registo['codcliente'] . "</td>";
        echo "<td>" . $registo['nome'] . "</td>";
        echo "<td>" . $registo['email'] . "</td>";
        echo "<td>" . $registo['telemovel'] . "</td>";
        echo "<td>" . $registo['perfil'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "</main>";
    echo "</section>";
    ?>


    <script src="../../js/admin.js"></script>
</body>

</html>
