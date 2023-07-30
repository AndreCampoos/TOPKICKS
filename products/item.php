<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

        include("../config.php");

        if(!isset($_GET["codigoproduto"])){
            $codigo="";
        }else{
            $codigo=$_GET["codigoproduto"];
        }

        $consulta="SELECT * FROM produtos WHERE codigo='".$codigo."' LIMIT 1";
        $resultado=mysqli_query($liga,$consulta);

        $registo=mysqli_fetch_assoc($resultado);

        $marca=$registo['marca'];
        $modelo=$registo['modelo'];
        $submodelo=$registo['submodelo'];
        $preco=$registo['preco'];
        $imagem1=$registo['img1'];
        $imagem2=$registo['img2'];
        $imagem3=$registo['img3'];
        $imagem4=$registo['img4'];
        $desc=$registo['descricao'];

        echo "<section class='featured pt-md-5 mt-md-5' id='fearured'>";
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
        echo "<p style='margin-top: 0.5rem;'>$desc</p>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>36</a>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>37</a>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>38</a>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>39</a>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>40</a>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>41</a>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>42</a>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>43</a>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>44</a>";
        echo "<a href='#' class='btn mr-md-2 mt-md-3 mb-md-3'>45</a>";
        echo "<div class='price'>".$preco."€</div>";

        echo "<hr>";
        echo "<div class='d-flex dropdown_car' data-toggle='collapse' data-target='#entrega'>";
        echo "<i class='car_icons fas fa-car-side'></i>";
        echo "<p>Entrega</p>";
        echo "<i class='fas fa-chevron-down pt-md-1'></i>";
        echo "</div>";
        echo "<div id='entrega' class='collapse'>";
        echo "<p>Os seus ténis serão enviados com todo o cuidado através dos nossos 
                serviços de entrega de confiança. O prazo estimado para a chegada dos mesmos 
                é de 3 a 5 dias úteis. Assim que a sua encomenda for processada, iremos 
                mantê-lo(a) informado(a) sobre o progresso da entrega. Valorizamos a sua 
                satisfação e trabalhamos arduamente para garantir que os produtos adquiridos 
                por si cheguem de forma rápida e segura.</p>";
        echo "</div>";
        
        echo "<hr>";
        echo "<div class='d-flex dropdown_car' data-toggle='collapse' data-target='#trocas'>";
        echo "<i class='car_icons fas fa-arrow-left'></i>";
        echo "<p>Trocas ou devoluções</p>";
        echo "<i class='fas fa-chevron-down pt-md-1'></i>";
        echo "</div>";
        echo "<div id='trocas' class='collapse'>";
        echo "<p>Na nossa loja, garantimos a sua total satisfação com as suas compras. Se, por algum motivo, não ficar satisfeito(a) com o produto adquirido, tem um prazo de 30 dias para efetuar a troca ou devolução. Lembre-se de que o produto deve estar em perfeito estado e na embalagem original. Estamos aqui para garantir uma experiência de compra sem qualquer tipo de complicações.</p>";
        echo "</div>";
        
        echo "<hr>";
        echo "<div class='d-flex dropdown_car' data-toggle='collapse' data-target='#autenticidade'>";
        echo "<i class='car_icons fas fa-check-circle'></i>";
        echo "<p>Garantia de autenticidade</p>";
        echo "<i class='fas fa-chevron-down pt-md-1'></i>";
        echo "</div>";
        echo "<div id='autenticidade' class='collapse'>";
        echo "<p>Valorizamos a autenticidade e qualidade dos nossos produtos. Garantimos que todos os itens disponíveis na nossa loja são 100% autênticos. Trabalhamos diretamente com os fabricantes e fornecedores confiáveis para assegurar a procedência genuína de cada produto. Compre com confiança, sabendo que está adquirindo itens de alta qualidade e autenticidade comprovada.</p>";
        echo "</div>";
        echo "<hr>";
        

        echo "<a href='carrinho.php?add=carrinho&codigoCarrinho=$codigo' class='btn mr-md-3 mt-md-3'>Adicionar ao Carrinho</a>";
        echo "</div>";
        echo "</div>";
        echo "</section>";
    ?>

    <footer>
        <a href="../index.php">
            <img src="../images/logo.png" class='logo_img_footer pt-md-1' alt="">
        </a>
        <div class="icons pt-3 pb-3">
            <a href=""><i class="fas fa-envelope"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-linkedin"></i></a>
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
            <a href="produtos.php"><span>></span> Produtos</a>
            <hr>
            <a href="nike.php"><span>></span> Nike</a>
            <hr>
            <a href="adidas.php"><span>></span> Adidas</a>
        </div>
        <div class='footerLinks'>
            <h4>Mais vendidos</h4>
            <a href="item.php?codigo=2"><span>></span> Nike Dunk Low Black & White</a>
            <hr>
            <a href=""><span>></span> Nike Air Jordan 1 Obsidian</a>
            <hr>
            <a href=""><span>></span> Adidas Yeezy Slide Flax</a>
        </div>
        <hr>
        <p class='copy text-center pt-md-1'>&copy; TOPKICKS 2023 &bull; Todos os direitos reservados</p>
    </footer>
<script src="../js/script.js"></script>
</body>
</html>