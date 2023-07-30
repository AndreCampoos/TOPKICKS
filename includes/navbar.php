<?php

// Verifique se o usuário está logado e qual é o tipo de usuário
if (isset($_SESSION['user_id'])) {
    $userType = $_SESSION['user_id'];

    // Verifique o tipo de usuário e redirecione para a página correta
    if ($userType === 'user') {
        $profilePage = 'account/editarPerfil.php'; // página de edição de perfil para usuário normal
    } elseif ($userType === 'adm') {
        $profilePage = 'account/areaAdmin.php'; // página de área administrativa para admin
    }

    // Redirecione para a página correta
    header("Location: $profilePage");
    exit();
}
?>

<!-- Restante do código da navbar -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - NAVBAR</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>
<body>
    <!-- <navbar>
        <a href="../index.php" class="logo"><img src="" class="logo_img" alt=""></a>
        <nav class="navbar-options">
            <a href="index.html">Home</a>
            <a href="produtos.html">Produtos</a>
            <a href="jordan1.html">Nike</a>
            <a href="dunk.html">Adidas</a>
        </nav> 
        <div class="icons">
            <a href="#"><i class="fa fa-heart"></i></a>
            <a href="#"><i class="fa fa-shopping-cart"></i></a>
            <a href="account/login.php"><i class="fa fa-user"></i></a>
        </div>
    </navbar> -->

    <nav class="navbar navbar-expand-lg index-navbar fixed-top" id='menu-bar'>
        <a class="navbar-brand logo" href="<?php echo $indexPage; ?>">
            <img src="<?php echo $logoPath; ?>" class="logo_img" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: transparent;">
            <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml;charset=UTF-8,<svg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'><path stroke=\'%23000\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/></svg>');"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-dark mx-auto pl-md-5">
            <li class="nav-item pt-3 pt-md-0">
                <a class="nav-link" href="<?php echo $indexPage; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $productsPage; ?>">PRODUTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $nikePage; ?>">NIKE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $adidasPage; ?>">ADIDAS</a>
            </li>
            </ul>
            <div class="icons pt-3 pt-md-0 ml-auto">
                <a href="<?php echo $carrinho; ?>"><i class="fa fa-shopping-cart"></i></a>
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

<!--     <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="../index.php">
                    <img  class="logo_img" alt="">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-options">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Nike</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Adidas</a></li>
                </ul>
            </div>
            <div class="icons">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-heart"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="account/login.php"><i class="fa fa-user"></i></a></li>
                </ul>
            </div>
        </div>
    </nav> -->
</body>
</html>