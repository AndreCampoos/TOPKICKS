<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - Sobre Nós</title>
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

    <div class="aboutUs">
        <h2 class='text-center'>Sobre Nós</h2>
        <hr>
        <p>Seja bem-vindo à TOPKICKS. <br>Nós somos uma loja online de ténis premium e exclusivos. Aqui somos apaixonados por todo o tipo de ténis e estamos dispostos a oferecer-lhe uma experiência única de compra.</p>
        <div class='d-flex mb-4'>
            <img class='aboutUsImg col-md-6 pl-md-0' src="../images/aboutUs1.jpg" alt="">  
            <p class='mt-5 pt-4'>Na TOPKICKS temos a missão de fornecer aos nossos clientes, não só produtos com a máxima qualidade, como o melhor atendimento possível e a maior rapidez de envio. Para conseguir cumprir a nossa missão, trabalhamos diretamente com as melhores marcas do mercado, de modo a garantir também a autenticidade dos produtos.<br><br>Deixamos aqui também um agradecimento a todos os nossos clientes e visitantes da nossa loja, por apoiarem este gosto pelos ténis e por caminharem ao nosso lado no crescimento da loja.</p>
        </div>
        <hr>
        <h1 class='heading mt-2'>Produtos</h1>
        <p class='mb-4'>Deixamos aqui o convite para conhecer toda a gama de produtos que disponibilizamos aos nossos clientes. Caso não encontre o que pretende, envie-nos um e-mail. Teremos todo o gosto em arrar-lhe o seu par perfeito<br>Veja abaixo os modelos que temos disponídeis no momento. </p>

        <h1 class='heading'>Dunk</h1>
        <img src="../images/dunkBanner.jpg" class='banner px-0' alt="">
        <p class='mt-3'>Os Dunk, lançados pela NIKE. Estes são parecidos aos Air Jordan 1, porém, mais baixos. Uma das características diferentes que distingue este modelo dos demais, são a variedade de cores e combinações existentes, assim como a versatilidade de utilização em looks, seja ele casual ou não. Os Dunk ficaram populares no mundo dos ténis, tornando-se assim um dos itens mais populares e procurados pelos fãs de ténis de todo o mundo.</p>

        <h1 class='heading mt-5'>Jordan 1</h1>
        <img src="../images/jordan1Banner.png" class='banner px-0' alt="">
        <p class='mt-3'>Lançado em 1985 pela NIKE em parceria com Michael Jordan, os Air Jordan 1 foram os primeiros da linha Air Jordan, tornando-se uma das linhas de ténis mais populares da história até aos dias de hoje. Estes foram projetados por Peter Moore e apresentam um cano altocom vários detalhes, como a asa do jogador e o logotipo "Jumpman".</p>

        <h1 class='heading mt-5'>Yeezy Slides</h1>
        <img src="../images/yeezySlidesBanner.png" class='banner px-0' alt="">
        <p class='mt-3'>Os Yeezy Slides, lançados pela ADIDAS em parceria com Kanye West são uns chinelos fabricados com espuma EVA, moldada propositadamente para oferecer conforto e leveza aos seus utilizadores. Devido à sua variedade de cores e a todas as características já referidas, estes são um item de destaque na gama Yeezy que combinam com diferentes looks.</p>

        <h1 class='heading mt-5'>Yeezy Boost 350</h1>
        <img src="../images/yeezyBoost350Banner.jpg" class='banner px-0' alt="">
        <p class='mt-3'>Os Yeezy Boost 350 foram, assim como os Yeezy Slides, uma colaboração da ADIDAS com o Kanye West, conhecidos também pelo seu design inovador. Estes apresentam, na parte superior, um pedaço de tecido Primeknit, combinado com a tecnologia de amortecimento Boost da ADIDAS, proporcionando assim uma maior sensação de conforto durante a utilização.</p>

        <h1 class='heading mt-5'>Yeezy Foam Runner</h1>
        <img src="../images/yeezyFoamRunnerBanner.png" class='banner px-0' alt="">
        <p class='mt-3'>Assim como toda a gama, esta também foi projetada pelo rapper Kanye West, em parceria com a ADIDAS. Este modelo ficou conhecido pelo seu design diferente do normal, considerado por alguns, inovador e futurista, feitos de uma espuma chamada "EcoYarn". Os Yeezy Foam Runner oferecem conforto e permitem que o pé respire, sendo perfeito para o verão.</p>

        <hr>

        <h1 class='heading'>Galeria de Imagens</h1>
        <section class='gallery'>
            <div class='scrolling-wrapper'>
                <img src="../images/gallery6.jpg" width=200 height=300 alt="">
                <img src="../images/gallery2.jpg" width=200 height=300 alt="">
                <img src="../images/gallery7.jpg" width=200 height=300 alt="">
                <img src="../images/gallery5.jpg" width=200 height=300 alt="">
                <img src="../images/gallery1.jpg" width=200 height=300 alt="">
                <img src="../images/gallery3.jpg" width=200 height=300 alt="">
                <img src="../images/gallery4.jpg" width=200 height=300 alt="">
                <img src="../images/gallery8.jpg" width=200 height=300 alt="">
                <img src="../images/gallery9.jpg" width=200 height=300 alt="">
                <img src="../images/gallery10.jpg" width=200 height=300 alt="">
            </div>
        </section>
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
            <a href="aboutUs.php"><span>></span> Sobre nós</a>
            <hr>
            <a href="termsConditions.php"><span>></span>  Termos e condições</a>
            <hr>
            <a href="privacyPolity.php"><span>></span>  Política de privacidade</a>
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
            <h4>Outras Opções</h4>
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