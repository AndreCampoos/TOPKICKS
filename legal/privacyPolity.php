<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - Termos e Condições</title>
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

    <div class="terms">
        <h2 class='text-center'>Política de Privacidade</h2>
        <hr>
        <p>Na TOPKICKS, valorizamos a sua privacidade e comprometemo-nos a proteger as suas informações pessoais. Esta política de privacidade explica como coletamos, utilizamos, compartilhamos e protegemos os dados fornecidos por si na utilização do nosso site.</p>
        <h5>1. Informações Coletadas</h5>
        <p>
            Podemos coletar informações pessoais, como nome, endereços de envio, endereço de e-mail e número de telefone, quando você procede ao registo no nosso site, realiza uma compra ou interage connosco de alguma forma. <br>
            Também podemos adquirir informações não pessoais, como cookies e dados de navegação, de modo a melhorar a sua experiência de utilização.
        </p>
        <h5>2. Uso de Informações</h5>
        <p>
           Utilizamos as suas informações pessoais para processar pedidos, enviar atualizações sobre a sua compra, responder ás suas dúvidas e fornecer um atendimento eficiente. Podemos utilizar informações não pessoais para análise estatística, aprimoramento de produtos e personalização de conteúdo. 
        </p>
        <h5>3. Partilha de Informações</h5>
        <p>
            Respeitamos a sua privacidade e não partilhamos as suas informações pessoais com terceiros, exceto quando necessário para processar o seu pedido, cumprir obrigações legais e/ou proteger os nossos direitos e propriedade.
        </p>
        <h5>4. Segurança de Dados</h5>
        <p>
            Implementamos medidas de segurança adequadas para proteger as suas informações contra acessos não autorizados, perdas, uso indevido e/ou alterações.
        </p>
        <h5>5. Links externos</h5>
        <p>
            No nosso site poderá encontrar links de acesso a sites de terceiros. Não somos responsáveis pelas práticas de privacidade desses sites e recomendamos a leitura das suas políticas de privacidade antes de fornecer qualquer informação pessoal.
        </p>
        <h5>6. Consentimento</h5>
        <p>
            Ao utilizar o nosso site e fornecer as suas informações pessoais, você consente com a coleta, utilização e armazenamento dessas informações de acordo com esta Política de Privacidade.
        </p>
        <h5>7. Alterações na Política de Privacidade</h5>
        <p>
            Reservamo-nos o direito de atualizar ou modificar esta Política de Privacidade a qualquer momento.
        </p>
        <br>
        <p>
            No caso de alguma dúvida relativamente a esta Política de Privacidade, entre em contacto connosco via e-mail.
        </p>
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