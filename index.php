<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg index-navbar fixed-top" id='menu-bar'>
        <a class="navbar-brand logo" href="index.php">
            <img src="images/logo.png" class="logo_img" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: transparent;">
            <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml;charset=UTF-8,<svg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'><path stroke=\'%23000\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/></svg>');"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-dark mx-auto pl-md-5">
            <li class="nav-item pt-3 pt-md-0">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products/produtos.php">PRODUTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products/nike.php">NIKE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products/adidas.php">ADIDAS</a>
            </li>
            </ul>
            <div class="icons pt-3 pt-md-0 ml-auto">
                <a href='products/favoritos.php' class='fa fa-heart'></a>
                <a href="products/carrinho.php"><i class="fa fa-shopping-cart"></i></a>
                <?php
                if (isset($_SESSION['perfil'])) {
                    $userType = $_SESSION['perfil'];
                    if ($userType === 'user') {
                        echo '<a href="account/editarPerfil.php"><i class="fa fa-user"></i></a>';
                    } elseif ($userType === 'adm') {
                        echo '<a href="account/areaAdmin.php"><i class="fa fa-user"></i></a>';
                    }
                } else {
                    echo '<a href="account/login.php"><i class="fa fa-user"></i></a>';
                }
                ?>
            </div>
        </div>
    </nav>
    <section class="home" id="home">
            <div class="slide-container active">
                <div class="slide">
                    <div class="content">
                        <span><b>Última novidade</b></span>
                        <h3><span style="color: #19150a; font-size: 40px;">Travis Scott</span> x Nike SB Dunk Low <span style="color: #c8bc8c; font-size: 40px;">"Cactus Jack"</span></h3>
                        <p>
                            Apresentamos os incriveis Travis Scott x Nike SB Dunk Low "Cactus Jack". Estes tênis colaborativos trazem um design ousado e vibrante, com detalhes exclusivos 
                            inspirados no artista. Com cores vibrantes e materiais premium, eles são uma "mais valia" para os colecionadores de sneakers.
                        </p>
                        <a href="#TravisScott" class="btn mt-md-2">Ver mais detalhes</a>
                    </div>
                    <div class="image">
                        <img src="images/SBtravis.png" class="shoe">
                    </div>
                </div>
            </div>
            <div class="slide-container">
                <div class="slide">
                    <div class="content">
                        <span>ÚLTIMO LANÇAMENTO</span>
                        <h3>NIKE AIR JORDAN 1 LOW <span style='color: #5d4c7a; font-size: 40px;'>COURT PURPLE</span></h3>
                        <p>
                            OS AIR JORDAN 1 RETRO LOW COURT PURPLE SÃO UM EXEMPLO DE 
                            ESTILO ATEMPORAL. COM UMA COMBINAÇÃO DE CORES ELEGANTE E 
                            DETALHES PRECISOS, ESSES TÉNIS TRAZEM UMA DOSE DE 
                            SOFISTICAÇÃO A QUALQUER LOOK. PERFEITOS PARA OS AMANTES 
                            DE TÉNIS QUE BUSCAM UM VISUAL CLÁSSICO E VERSÁTIL.
                        </p>
                        <a href="#featured" class="btn mt-md-2">Ver mais detalhes</a>
                    </div>
                    <div class="image">
                        <img src="images/Jordan1LowCourtPurple.jpg" class="shoe">
                    </div>
                </div>
            </div>

            <div id="prev" class="fa fa-angle-left" onclick="prev();"></div>
            <div id="next" class="fa fa-angle-right" onclick="next();"></div>
        </section>

        <div class="product-container">
    <h1 class='heading'>Nike x Travis Scott</h1>
    <img src='images/banner_travis_scott.png' id='TravisScott' class='banner mb-md-4' />

    <div class="product-row">
        <?php
            include("config.php");

            $travisCodes = array(30, 33, 34, 35);
            $codes = implode(",", $travisCodes);

            $consulta="SELECT * FROM produtos WHERE codigo IN ($codes)";
            $resultado=mysqli_query($liga,$consulta);
            $nregistos=mysqli_num_rows($resultado);

            if ($nregistos > 0) {
                $i = 0;
                while ($registo=mysqli_fetch_assoc($resultado)) {
                    $codigo = $registo['codigo'];
                    $marca=$registo['marca'];
                    $modelo=$registo['modelo'];
                    $submodelo=$registo['submodelo'];
                    $imagem=$registo['img0'];
                    $preco=$registo['preco'];

                    $firstLastProducts = '';
                    if ($i == 0) {
                        $firstLastProducts = 'first';
                    } elseif ($i == $nregistos - 1) {
                        $firstLastProducts = 'last';
                    }

                    echo "<section class='product col-md-4pt-md-2 d-inline-block $firstLastProducts'>";
                    echo "<div class='box-container'>";
                    echo "<div class='box'>";
                    echo "<div class='icons'>";
                    echo "<a href='products/carrinho.php?add=carrinho&codigoCarrinho=$codigo' class='fa fa-shopping-cart'></a>";
                    echo "<a href='products/favoritos.php?add=favoritos&codigoFavoritos=$codigo' class='fa fa-heart'></a>";
                    echo "</div>";
                    echo "<div class='content'>";
                    echo "<a class='itemLink' href='products/item.php?codigoproduto={$registo['codigo']}'>";
                    echo "<img src='images/".$imagem."'/>";
                    echo "<h3>$marca $modelo</h3>";
                    echo "<h3 class='model'>$submodelo</h3>";
                    echo "<div class='price'>".$preco."€</div>";
                    echo "</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</section>";

                    $i++;
                }
            } else {
                echo "Nenhum produto encontrado para os códigos desejados.";
            }
        ?>
    </div>
</div>



        <?php
            include("config.php");

            $consulta="SELECT * FROM produtos WHERE codigo = 36";
            $resultado=mysqli_query($liga,$consulta);
            $nregistos=mysqli_num_rows($resultado);

            for ($i=0; $i<$nregistos; $i++){
                $registo=mysqli_fetch_assoc($resultado); //criaçao do array associativo

    
                $codigo=$registo['codigo'];
                $marca=$registo['marca'];
                $modelo=$registo['modelo'];
                $submodelo=$registo['submodelo'];
                $imagem1=$registo['img1'];
                $imagem2=$registo['img2'];
                $imagem3=$registo['img3'];
                $imagem4=$registo['img4'];
                $preco=$registo['preco'];
                $desc=$registo['descricao'];
                $shortDesc=substr($desc, 0, 362);
    
                echo "<section class='featured pt-md-5 mt-md-5' id='featured'>";
                echo "<h1 class='heading' id='CourtPurple'>ÚLTIMO LANÇAMENTO</h1>";
                echo "<div class='row'>";
                echo "<div class='image-container'>";
                echo "<div class='small-image'>";
                echo "<img class='featured-image-1' src='images/".$imagem1."'/>";
                echo "<img class='featured-image-2' src='images/".$imagem2."'/>";
                echo "<img class='featured-image-3' src='images/".$imagem3."'/>";
                echo "<img class='featured-image-4' src='images/".$imagem4."'/>";
                echo "</div>";
                echo "<div class='big-image'>";
                echo "<img class='big-image-1' src='images/".$imagem1."'/>";
                echo "</div>";
                echo "</div>";
                echo "<div class='content'>";
                echo "<h2>$marca $modelo <span style='color: #5d4c7a'> $submodelo </span></h2>";
                echo "<div class='stars pt-md-2 pb-md-2'>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "</div>";
                echo "<p>$shortDesc</p>";
                echo "<div class='price pt-md-2 pb-md-2'>".$preco."€</div>";
                echo "<a href='products/carrinho.php?add=carrinho&codigoCarrinho=$codigo' class='btn mr-md-1 mt-md-3'>Adicionar ao Carrinho</a>";
                echo "<a href='products/item.php?codigoproduto=$codigo' class='btn mt-md-3'>Ver Mais</a>";
                echo "</div>";
                echo "</div>";
                echo "</section>";                
            }
        ?>

    <footer>
        <a href="index.php">
            <img src="images/logo.png" class='logo_img_footer pt-md-1' alt="">
        </a>
        <div class="icons pt-3 pb-3">
            <a href="mailto:info.topkicks@gmail.com?subject=Pedido de Informações&body=Escreva aqui a sua mensagem..."><i class="fas fa-envelope"></i></a>
            <a href="https://www.instagram.com/topkicks.oficial/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/topkicks-oficial-7a3137284/" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class='footerLinks'>
            <h4>Legal</h4>
            <a href="legal/aboutUs.php"><span>></span> Sobre nós</a>
            <hr>
            <a href="legal/termsConditions.php"><span>></span>  Termos e condições</a>
            <hr>
            <a href="legal/privacyPolity.php"><span>></span>  Política de privacidade</a>
        </div>
        <div class='footerLinks'>
            <h4>Páginas</h4>
            <a href="products/produtos.php"><span>></span> Produtos</a>
            <hr>
            <a href="products/nike.php"><span>></span> Nike</a>
            <hr>
            <a href="products/adidas.php"><span>></span> Adidas</a>
        </div>
        <div class='footerLinks'>
            <h4>outras Opções</h4>
            <a href="products/carrinho.php"><span>></span> Ver carrinho</a>
            <hr>
            <a href="products/favoritos.php"><span>></span> Ver favoritos</a>
            <hr>
            <?php
                if (isset($_SESSION['perfil'])) {
                    $userType = $_SESSION['perfil'];
                    if ($userType === 'user') {
                        echo '<a href="account/editarPerfil.php"><span>></span> Editar perfil</a>';
                    } elseif ($userType === 'adm') {
                        echo '<a href="account/areaAdmin.php"><span>></span> Área de administrador</a>';
                    }
                } else {
                    echo '<a href="account/login.php"><span>></span> Iniciar Sessão</a>';
                }
            ?>
        </div>
        <hr>
        <p class='copy text-center pt-md-1'>&copy; TOPKICKS 2023 &bull; Todos os direitos reservados</p>
    </footer>

<script src="js/script.js"></script>
</html>
</body>