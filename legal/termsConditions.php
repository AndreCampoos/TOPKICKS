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

    <div class="terms">
        <h2 class='text-center'>Termos e Condições</h2>
        <hr>
        <p>Seja bem-vindo à TOPKICKS. <br>Aconselhamos à leitura dos termos e condições referidos abaixo, pois ao entrar e utilizar o nosso website concorda em cumprir e aceitar os termos aqui estabelecidos.</p>
        <h5>1. Produtos e Disponibilidade</h5>
        <p>O nosso website apresenta uma vasta variedade de produtos autênticos e originais. No entanto, a disponibilidade destes está sujeita a estoque limitado. <br>
            Faremos o possível para garantir a precisão das informações relativamente a este tema, mas reservamo-nos o direito de cancelar algum pedido no caso de indisponibilidade do produto.
        </p>
        <h5>2. Preços e Pagamentos</h5>
        <p>Os preços dos produtos estão indicados com a nossa moeda local (€) e estão sujeitos a alterações sem aviso prévio. <br>
           Os pagamentos são efetuados por meio de métodos seguros, como cartões de crédito, transferências bancárias ou outras opções disponibilizadas pela plataforma de pagamentos.
        </p>
        <h5>3. Envio e Entrega</h5>
        <p>
            Faremos o possível para processar e enviar o seu pedido dentro do prazo estipulado. No entanto, não nos responsabilizamos
            por atrasos decorrentes de eventos imprevistos, como problemas logísticos e/ou condições climáticas.<br>
            As taxas de envio cobradas seão calculadas com base do destino e no peso do(s) produto(s).
        </p>
        <h5>4. Política de Devolução</h5>
        <p>
            No caso de insatisfação com a compra, o cliente tem o direito à devolução ou troca do produto no prazo de 30 dias após a entrega do mesmo, sendo obrigatório este encontrar-se em perfeitas condições
            e com a embalagem original.<br>
            Entre em contacto connosco via e-mail para obter intruções detalhadas sobre este processo. 
        </p>
        <h5>5. Privacidade e Segurança</h5>
        <p>
            Respeitamos a sua privacidade e protegemos os seus dados pessoais de acordo com as leis vigentes. Aa informações fornecidas durante o processo de compra são utilizadas apenas para fins de processsamento do seu pedido
            e comunicação relacionada a ele.
        </p>
        <h5>6. Propriedade Intelectual</h5>
        <p>
            Todos os direitos autorais, marcas registadas e/ou outros direitos de propriedade intelectual relacionados aos produtos e conteúdo do site são de propriedade exclusiva da TOPKICKS e/ou dos seus fornecedores.
        </p>
        <h5>7. Limites de responsabilidade</h5>
        <p>
            A TOPKICKS não se responsabiliza por danos diretos, indiretos, incidentais ou consequenciais resultantes da utilização ou da incapacidade de utilizar os nossos produtos ou de aceder ao nosso site.
        </p>
        <br>
        <p>
            Ao utilizar o nosso site e realizar uma compra, você declara que leu, compreendeu e concorda com estes Termos e Condições.<br>
            Se tiver alguma dúvida, entre em contacto connosco via e-mail.
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