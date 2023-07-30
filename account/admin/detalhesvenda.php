<?php
	session_start();

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['nome'])){
        echo"<script type='text/javascript'>alert('Registe-se para ter acesso!')</script>";
		header("Location: login.php");
        exit;
    }

    $utilizador = $_SESSION["nome"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - Detalhes de Venda</title>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="../../images/favicon.png">
</head>
<body>
    <?php
        $logoPath="../../images/logo.png";
        $indexPage="../../index.php";
        $productsPage="../../products/produtos.php";
        $nikePage="../../products/nike.php";
        $adidasPage="../products/adidas.php";
        $userPage="../../account/login.php";
        include("../../includes/navbar.php");
    ?>

    <a href="../areaAdmin.php"><button class="pt-3 pb-3">&#129044; Voltar</button></a>

    <?php
        //Configuração da ligação ao servidor
        $liga=mysqli_connect('localhost','root');

        //Verificação da ligação ao servidor
        if (!$liga) {
            echo "<h2> ERROR!!! Falha na ligação ao Servidor! </h2>";
            exit;
        }

        //Ligação à base de dados la_casa_dos_tenis
        include ("../../config.php");

    ?>

    <!-- Construção da Tabela -->
    <table style="width:92.5%">
        <tr class='text-center'>
            <th>Código de Venda</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
        </tr>

        <?php

            if(!isset($_GET["codvenda"])){
                $codigo="";
            }else{
                $codigo=$_GET["codvenda"];
            }
            
            $consulta = "SELECT detalhesvenda.codvenda, produtos.marca, produtos.modelo, produtos.submodelo, detalhesvenda.quantidade, produtos.preco FROM detalhesvenda INNER JOIN produtos ON detalhesvenda.codigo = produtos.codigo";
            $resultado=mysqli_query($liga,$consulta);
            $nregistos=mysqli_num_rows($resultado);

            for($i=0; $i<$nregistos; $i++){
                $venda=mysqli_fetch_assoc($resultado);

                $codigovenda=$venda['codvenda'];
                $marca=$venda['marca'];
                $modelo=$venda['modelo'];
                $submodelo=$venda['submodelo'];
                $quantidade=$venda['quantidade'];
                $preco=$venda['preco'];

                echo '<tr>';
                echo '<td>'.$codigovenda.'</td>';
                echo '<td>'.$marca.' '.$modelo.' '.$submodelo.'</td>';
                echo '<td>'.$quantidade.'</td>';
                echo '<td>'.$preco.'</td>';
                echo '</tr>';
            }
        ?>
    </table>
    <br> 
</body>
</html>