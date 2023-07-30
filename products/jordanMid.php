<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - Jordan 1 Mid</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg index-navbar fixed-top" id='menu-bar'>
        <a class="navbar-brand logo" href="../index.php">
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
                <a class="nav-link" href="produtos.php">PRODUTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nike.php">NIKE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adidas.php">ADIDAS</a>
            </li>
            </ul>
            <div class="icons pt-3 pt-md-0 ml-auto">
                <a href='favoritos.php' class='fa fa-heart'></a>
                <a href="carrinho.php"><i class="fa fa-shopping-cart"></i></a>
                <?php
                if (isset($_SESSION['perfil'])) {
                    $userType = $_SESSION['perfil'];
                    if ($userType === 'user') {
                        echo '<a href="../account/editarPerfil.php"><i class="fa fa-user"></i></a>';
                    } elseif ($userType === 'adm') {
                        echo '<a href="../account/areaAdmin.php"><i class="fa fa-user"></i></a>';
                    }
                } else {
                    echo '<a href="../account/login.php"><i class="fa fa-user"></i></a>';
                }
                ?>
            </div>
        </div>
    </nav>
    <?php

        if(!isset($_GET["ordenar"])){
            $ordenar="codigo";
        }else{
            $ordenar=$_GET["ordenar"];
        }

        if($ordenar=='codigo'){
            $ordenar_por="order by codigo";
        }
        if($ordenar=='marca'){
            $ordenar_por="order by marca";
        }
        if($ordenar=='preco'){
            $ordenar_por="order by preco";
        }

        include("../config.php");

        $consulta="SELECT * FROM produtos WHERE modelo = 'Air Jordan 1 Mid' $ordenar_por";
        $resultado=mysqli_query($liga,$consulta);
        $nregistos=mysqli_num_rows($resultado);
    ?>

    <div class="totalOrder products-container">
        <?php echo "<h3 class='totalProducts'>$nregistos Produtos</h3>" ?>
        <center>
            <form method="GET" name="formulario" class="orderForm">
                <h3 class="order pb-md-3 pr-md-2">Ordenar por:</h3>
                <select class="orderSelect" name="ordenar" onchange="javascript:formulario,submit();">
                    <option value="nenhum" SELECTED></option>
                    <option value="marca">Alfabeto (A-Z)</option>
                    <option value="preco">Preço (&darr; - &uarr;)</option>
                </select>
            </form>
        </center>
    </div>

    <div class="brandOptions">
        <img src="../images/nike_logo.png" class="ml-md-4 pl-md-2" alt="">
        <div class="options mx-auto">
            <a href="dunkLow.php">Dunk Low</a>
            <a href="jordanLow.php">Jordan 1 Low</a>
            <a href="">Jordan 1 Mid</a>
            <a href="jordanHigh.php">Jordan 1 High</a>
        </div>
        <img src="../images/nike_logo.png" class="mr-md-5 pr-md-2" alt="">
    </div>

    <div class="product-row pb-md-3">
        <?php

            for ($i=0; $i<$nregistos; $i++){
                $registo=mysqli_fetch_assoc($resultado); //criaçao do array associativo

                $firstLastProducts = '';
                if ($i == 0) {
                    $firstLastProducts = 'first';
                } elseif ($i == $nregistos - 1) {
                    $firstLastProducts = 'last';
                }

                $codigo=$registo['codigo'];
                $marca=$registo['marca'];
                $modelo=$registo['modelo'];
                $submodelo=$registo['submodelo'];
                $imagem=$registo['img0'];
                $preco=$registo['preco'];

                echo "<section class='product px-1 pt-md-3 d-inline-block $firstLastProducts' id='product'>";
                echo "<div class='box-container'>";
                echo "<div class='box'>";
                echo "<div class='icons'>";
                echo "<a href='carrinho.php?add=carrinho&codigoCarrinho=$codigo' class='fa fa-shopping-cart'></a>";
                echo "<a href='favoritos.php?add=favoritos&codigoFavoritos=$codigo' class='fa fa-heart'></a>";
                echo "</div>";
                echo "<div class='content'>";
                echo "<a class='itemLink' href='item.php?codigoproduto={$registo['codigo']}'>";
                echo "<img src='../images/".$imagem."'/>";
                echo "<h3>$marca $modelo</h3>";
                echo "<h3 class='model'>$submodelo</h3>";
                echo "<div class='price'>".$preco."€</div>";
                echo "</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</section>";
            }
        ?>
    </div>

    <footer>
        <a href="../index.php">
            <img src="../images/logo.png" class='logo_img_footer pt-md-1' alt="">
        </a>
        <div class="icons pt-3 pb-3">
            <a href="mailto:info.topkicks@gmail.com?subject=Pedido de Informações&body=Escreva aqui a sua mensagem..."><i class="fas fa-envelope"></i></a>
            <a href="https://www.instagram.com/topkicks.oficial/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/topkicks-oficial-7a3137284/" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class='footerLinks'>
            <h4>Legal</h4>
            <a href="../legal/aboutUs.php"><span>></span> Sobre nós</a>
            <hr>
            <a href="../legal/termsConditions.php"><span>></span>  Termos e condições</a>
            <hr>
            <a href="../legal/privacyPolity.php"><span>></span>  Política de privacidade</a>
        </div>
        <div class='footerLinks'>
            <h4>Páginas</h4>
            <a href="../products/produtos.php"><span>></span> Produtos</a>
            <hr>
            <a href="../products/nike.php"><span>></span> Nike</a>
            <hr>
            <a href="../products/adidas.php"><span>></span> Adidas</a>
        </div>
        <div class='footerLinks'>
            <h4>outras Opções</h4>
            <a href="../products/carrinho.php"><span>></span> Ver carrinho</a>
            <hr>
            <a href="../products/favoritos.php"><span>></span> Ver favoritos</a>
            <hr>
            <?php
                if (isset($_SESSION['perfil'])) {
                    $userType = $_SESSION['perfil'];
                    if ($userType === 'user') {
                        echo '<a href="../account/editarPerfil.php"><span>></span> Editar perfil</a>';
                    } elseif ($userType === 'adm') {
                        echo '<a href="../account/areaAdmin.php"><span>></span> Área de administrador</a>';
                    }
                } else {
                    echo '<a href="../account/login.php"><span>></span> Iniciar Sessão</a>';
                }
            ?>
        </div>
        <hr>
        <p class='copy text-center pt-md-1'>&copy; TOPKICKS 2023 &bull; Todos os direitos reservados</p>
    </footer>
</body>
</html>