<?php
    session_start();

    if (!isset($_SESSION['favoritos'])) {
        $_SESSION['favoritos'] = array();
    }

    if(isset($_GET['add']) && $_GET['add'] == 'favoritos'){
        $idProdutoFavoritos = $_GET['codigoFavoritos'];

        // Verifica se o produto já está no carrinho
        if(isset($_SESSION['favoritos'][$idProdutoFavoritos])){
            // Se o produto já existe, incrementa a quantidade
            $_SESSION['favoritos'][$idProdutoFavoritos] += 1;
        }else{
            // Se o produto não existe, adiciona ao carrinho com quantidade 1
            $_SESSION['favoritos'][$idProdutoFavoritos] = 1;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - FAVORITOS</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <style>
        .content h3{
            font-family: iran_sans_bold;
            font-size: 25px !important;
        }
    </style>
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
        
        $numitems = count($_SESSION['favoritos']);
        echo "<div class='carrinho d-flex align-items-center justify-content-between mt-md-5 pt-md-5'>";
        echo "<h2>Favoritos</h2>";
        echo "<center><h3 class='pt-md-2'>Número de itens favoritos: $numitems </h3></center>";
        echo "</div>";
        echo "<div class='horizontal_line mb-md-2'></div>";
        
        if ($numitems == 0) {
            echo "<h3 class='text-center' style='padding-top: 100px;'>Ainda não adicionou nenhum produto aos favoritos.</h3><a href='produtos.php'><p class='text-center text-decoration-none'>Ver Produtos</p></a>";
        } else {
            include("../config.php");
            $pagamento = 0;
            $_SESSION['compras'] = array();
        
            foreach ($_SESSION['favoritos'] as $idProdutoFavoritos => $quantidade) {
                $consulta = "SELECT * FROM produtos WHERE codigo='" . $idProdutoFavoritos . "'";
                $resultado = mysqli_query($liga, $consulta);
                $produtos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                $produtosCount = count($produtos);
        
                if ($produtosCount > 0) {
                    $produto = $produtos[0]; // Obter o primeiro produto do array
        
                    $subtotal = $quantidade * $produto["preco"];
                    $pagamento += $subtotal;

                    $marca=$produto['marca'];
                    $modelo=$produto['modelo'];
                    $submodelo=$produto['submodelo'];
                    $imagem1=$produto['img1'];
                    $imagem2=$produto['img2'];
                    $imagem3=$produto['img3'];
                    $imagem4=$produto['img4'];
                    $preco=$produto['preco'];
                    $desc=$produto['descricao'];

                    echo "<section class='featured pt-md-3' id='fearured'>";
                    echo "<div class='row' id='panda'>";
                    echo "<div class='image-container'>";
                    echo "<div class='small-image'>";
                    echo "<img class='featured-image-1' src='../images/".$imagem1."'/>";
                    echo "<img class='featured-image-2' src='../images/".$imagem2."'/>";
                    echo "<img class='featured-image-3' src='../images/".$imagem3."'/>";
                    echo "<img class='featured-image-4' src='../images/".$imagem4."'/>";
                    echo "</div>";
                    echo "<div class='big-image'>";
                    echo "<img class='big-image-1' src='../images/".$imagem1."'/>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='content'>";
                    echo "<h3>$marca $modelo $submodelo</h3>";
                    echo "<div class='stars'>";
                    echo "<i class='fa fa-star'></i>";
                    echo "<i class='fa fa-star'></i>";
                    echo "<i class='fa fa-star'></i>";
                    echo "<i class='fa fa-star'></i>";
                    echo "<i class='fa fa-star'></i>";
                    echo "</div>";
                    echo "<p class='pt-md-4 pb-md-4'>$desc</p>";
                    echo "<div class='price d-flex align-items-center'>";
                    echo "<h2 style='flex-grow: 1;'>".$preco."€</h2>";
                    echo '<a href="removerFavoritos.php?remover&id=' . $idProdutoFavoritos . '">';
                    echo "<i class='trash_icon fas fa-heart pb-md-2 pr-md-2' style='color: rgb(20, 52, 164);'></i>";
                    echo "</a>";
                    echo "</div>";
                    echo "</div>";

                    echo "</div>";
                    echo "</div>";
                    echo "</section>";
        
                } else {
                    // Lidar com a situação em que nenhum produto foi encontrado
                    echo "Nenhum produto encontrado.";
                }
            }       
        }
    ?>
<script src='../js/script.js'></script>
</body>
</html>
