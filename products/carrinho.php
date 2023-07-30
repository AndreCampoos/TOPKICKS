<?php
    session_start();

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    if(isset($_GET['add']) && $_GET['add'] == 'carrinho'){
        $idProdutoCarrinho = $_GET['codigoCarrinho'];

        // Verifica se o produto já está no carrinho
        if(isset($_SESSION['carrinho'][$idProdutoCarrinho])){
            // Se o produto já existe, mantém a quantidade
            $_SESSION['carrinho'][$idProdutoCarrinho] += 1;
        }else{
            // Se o produto não existe, adiciona ao carrinho com quantidade 1
            $_SESSION['carrinho'][$idProdutoCarrinho] = 1;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - CARRINHO</title>
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
        
        $numitems = count($_SESSION['carrinho']); //Faz a contagem do número de itens na sessão "carrinho"
        echo "<div class='carrinho d-flex align-items-center justify-content-between mt-md-5 pt-md-5'>";
        echo "<h2>Carrinho</h2>";
        echo "<center><h3 class='pt-md-2'>Número de itens no carrinho: $numitems </h3></center>";
        echo "</div>";
        echo "<div class='horizontal_line mb-md-2'></div>";
        
        if ($numitems == 0) { //Se o número de itens no carrinho for 0 , aparece a mensagem no ecrã, se não, para o código seguinte
            echo "<h3 class='text-center' style='padding-top: 100px;'>O seu carrinho encontra-se vazio :( </h3><a href='produtos.php'><p class='text-center text-decoration-none'>Ver Produtos</p></a>";
        } else {
            include("../config.php");
            $pagamento = 0; //Variável utilizada para calcular o valor a ser pago
            $_SESSION['compras'] = array(); //Inicia uma variável de sessão "compras" como um array vazio, utilizada porteriormente para guardar informações sobre as compras
        
            foreach ($_SESSION['carrinho'] as $idProdutoCarrinho => $quantidade) {
                $consulta = "SELECT * FROM produtos WHERE codigo='" . $idProdutoCarrinho . "'"; //Faz a consulta à base de dados sobre as informações do produto 
                $resultado = mysqli_query($liga, $consulta);
                $produtos = mysqli_fetch_all($resultado, MYSQLI_ASSOC); // Recebe todas as linhas do resultado da consulta
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
                    echo '<a href="removerCarrinho.php?remover&id=' . $idProdutoCarrinho . '">';
                    echo "<i class='trash_icon fas fa-trash pb-md-2 pr-md-2'></i>";
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

            $total = $pagamento + 4.50;
            $totalComIva = $total * 1.23;

            echo "<div class='paymentBox mb-md-5'>";
            echo "<div class='paymentInternBox'>";
            echo "<a href='finalizar.php?compra&total={$pagamento}'></a>";
            echo "<h4 class='text-center pt-md-4'>Efetuar Pagamento</h4>";
            echo "<hr>";
            echo "<div class='d-flex priceProduct'>";
            echo "<p style='flex-grow: 1;'>Produtos ($numitems)</p>";
            echo "<p>".number_format($pagamento, 2, ",", ".")."€</p>"; //Formata o número com 2 casas decimais e depois com o símbolo "€". Ex: 000,00€
            echo "</div>";
            echo "<div class='d-flex priceProduct'>";
            echo "<p style='flex-grow: 1;'>Entrega</p>";
            echo "<p>4,50€</p>";
            echo "</div>";
            echo "<div class='d-flex priceProduct'>";
            echo "<p style='flex-grow: 1;'>Iva</p>";
            echo "<p>23%</p>";
            echo "</div>";
            echo "<hr>";
            echo "<div class='d-flex priceProduct'>";
            echo "<p style='flex-grow: 1;'>Total</p>";
            echo "<p>".number_format($totalComIva, 2, ",", ".")."€</p>";
            echo "</div>";
            
            echo '<div class="d-flex dropdown_car priceProduct" data-toggle="collapse" data-target="#entrega" onclick="exibirMensagem()">';
            echo "<p>Continuar Pagamento</p>";
            echo "<i class='fas fa-chevron-down pt-md-1'></i>";
            echo "</div>";
            
            echo "<div id='entrega' class='collapse'>";
            echo "<div class='payment-option'>";
            echo "<input type='radio' class='mr-md-2 payment-radio' name='payment-option' value='paypal' data-target='#paypal'>";
            echo '<i class="fab fa-cc-paypal mr-md-1"></i>';
            echo "<label for='paypal'>Paypal</label>";
            echo "</div>";
            echo "<div id='paypal' class='collapse'>";
            echo "<p>Será reencaminhado para o site do PayPal para rever a sua encomenda.</p>";
            echo "<div class='paymentDiv text-center'>";
            echo "<a href='https://www.paypal.com/bs/signin' target='_blank' class='paymentButton'>Continuar para a revisão da encomenda</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            
            echo "<div id='entrega' class='collapse mt-md-2'>";
            echo "<div class='payment-option'>";
            echo "<input type='radio' class='mr-md-2 payment-radio' name='payment-option' value='mbway' data-target='#mbway'>";
            echo '<img src="../images/mbway.png" width=40px height=20px class="mr-md-1">';
            echo "<label for='mbway'>MBWAY</label>";
            echo "</div>";
            echo "<div id='mbway' class='collapse'>";
            echo "<label class='mb-0 d-inline-block'>Nº de telefone</label><br>";
            echo "<input type='text' style='width: 100%;' maxlength='9'>";
            echo "</div>";
            echo "</div>";
            
            echo "<div id='entrega' class='collapse mt-md-2'>";
            echo "<div class='payment-option'>";
            echo "<input type='radio' class='mr-md-2 payment-radio' name='payment-option' value='mastercard' data-target='#visa'>";
            echo '<i class="fab fa-cc-visa mr-md-1"></i>';
            echo "<label for='visa'>Cartão de crédito ou débito</label>";
            echo "</div>";
            echo "<div id='visa' class='collapse'>";
            echo "<label class='mb-0'>Nº do cartão</label><br>";
            echo "<input type='text' maxlength='19' class='w-100'>";
            echo "<div class='d-inline-block' style='width: 50%;'>";
            echo "<label class='mb-0 mt-md-2 d-inline-block'>Validade</label><br>";
            echo "<input type='text' value='MM/AA' style='width: 90%;' maxlength='5'>";
            echo "</div>";
            echo "<div class='d-inline-block' style='width: 50%;'>";
            echo "<label class='mb-0 d-inline-block'>CCV</label><br>";
            echo "<input type='text' style='width: 100%;' maxlength='3'>";
            echo "</div>";
            echo "<label class='mb-0 mt-md-2'>Morada</label><br>";
            echo "<input type='text' class='w-100'>";
            echo "<div class='d-inline-block' style='width: 50%;'>";
            echo "<label class='mb-0 mt-md-2'>Código Postal</label><br>";
            echo "<input type='text' style='width: 48%;' maxlength='4'>-<input type='text' style='width: 48%;' maxlength='3'>";
            echo "</div>";
            echo "<div class='d-inline-block' style='width: 50%;'>";
            echo "<label class='mb-0 mt-md-2' style='padding-left: 14px;'>Localidade</label><br>";
            echo "<input type='text' style='width: 90%; margin-left: 14px;'>";
            echo "</div>";
            echo "</div>";
            
            echo "<hr>";
            
            echo "<a href='finalizar.php?compra&total={$pagamento}' class='text-decoration-none'>";
            echo '<div class="d-flex dropdown_car priceProduct mt-md-3">';
            echo "<p>Finalizar Compra</p>";
            echo "<i class='fas fa-chevron-right pt-md-1' style='color: black;'></i>";
            echo "</div>";
            echo "</a>";
            
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            
            

        }
    ?>

    <script>
        function exibirMensagem() {
            if (!<?php echo isset($_SESSION['perfil']) ? 'true' : 'false'; ?>) {
                alert("Por favor, faça login para continuar o pagamento.");
                window.location.href = "../account/login.php";
            }
        }
    </script>

    <script>
        const paymentRadios = document.querySelectorAll('.payment-radio'); //Seleciona todos os elementos com a class ".payment-radio" e armazena-os na constante "paymentRadios"

        paymentRadios.forEach(radio => { // Esta parte do código faz com que apenas um radio button possa ser selecionado
            radio.addEventListener('change', () => {
                const targetId = radio.getAttribute('data-target');
                const target = document.querySelector(targetId);

                if (target) {
                    const currentCollapse = target.closest('.collapse');
                    const otherRadios = document.querySelectorAll('.payment-radio:not(:checked)'); //Seleciona todos os elementos que não estão selecionados e armazena-os na constante "otherRadios"
                    const otherCollapses = document.querySelectorAll('.payment-option .collapse:not(' + targetId + ')'); //Seleciona todos os elementos "collapse" que devem ser ocultados quando não estão selecionados

                    otherRadios.forEach(otherRadio => {
                        const otherTargetId = otherRadio.getAttribute('data-target');
                        const otherTarget = document.querySelector(otherTargetId);
                        const otherCollapse = otherTarget.closest('.collapse');
                        otherCollapse.classList.remove('show'); //Remove a class "show" dos elementos que não estão selecionados, ou seja, estes são ocultados
                    });

                    otherCollapses.forEach(otherCollapse => {
                        otherCollapse.classList.remove('show'); //Remove a class "show" dos elementos que não estão selecionados, ou seja, estes são ocultados
                    });

                    currentCollapse.classList.toggle('show', radio.checked); //Esta linha é utilizada para ocultar o conteúdo das opções que não estão selecionadas, adicionando a class "show" apenas ao radio buttons que estão "check"
                }
            });
        });
    </script>


<script src='../js/quantity.js'></script>
<script src='../js/script.js'></script>
</body>
</html>
