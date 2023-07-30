<?php
    session_start();

    if(isset($_GET['remover'])){
        $idProdutoCarrinho = $_GET['id'];
        unset($_SESSION['carrinho'] [$idProdutoCarrinho]);
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=carrinho.php"/>';
    }
?>