<?php
    session_start();

    if(isset($_GET['remover'])){
        $idProdutoFavoritos = $_GET['id'];
        unset($_SESSION['favoritos'] [$idProdutoFavoritos]);
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=favoritos.php"/>';
    }
?>