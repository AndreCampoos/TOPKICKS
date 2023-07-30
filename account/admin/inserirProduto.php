<?php
session_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['nome'])) {
    echo "<script type='text/javascript'>alert('Registe-se para ter acesso!')</script>";
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
    <title>TOPKICKS - Inserir Produto</title>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../../images/favicon.png">
    <style>
        #sidebar .side-menu li a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg index-navbar fixed-top" id='menu-bar'>
        <a class="navbar-brand logo" href="../../index.php">
            <img src="../../images/logo.png" class="logo_img" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: transparent;">
            <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml;charset=UTF-8,<svg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'><path stroke=\'%23000\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/></svg>');"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-dark mx-auto pl-md-5">
                <li class="nav-item pt-3 pt-md-0">
                    <a class="nav-link" href="../../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../products/produtos.php">PRODUTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../products/nike.php">NIKE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../products/adidas.php">ADIDAS</a>
                </li>
            </ul>
            <div class="icons pt-3 pt-md-0 ml-auto">
                <a href='../../products/favoritos.php' class='fa fa-heart'></a>
                <a href="../../products/carrinho.php"><i class="fa fa-shopping-cart"></i></a>
                <?php
                if (isset($_SESSION['perfil'])) {
                    $userType = $_SESSION['perfil'];
                    if ($userType === 'user') {
                        echo '<a href="../editarPerfil.php"><i class="fa fa-user"></i></a>';
                    } elseif ($userType === 'adm') {
                        echo '<a href="../areaAdmin.php"><i class="fa fa-user"></i></a>';
                    }
                } else {
                    echo '<a href="../login.php"><i class="fa fa-user"></i></a>';
                }
                ?>
            </div>
        </div>
    </nav>

    <section id="sidebar">
        <ul class="side-menu pl-0">
            <li>
                <a href="../areaAdmin.php">
                    <i class='bx bxs-home'></i>
                    <span class="text pt-md-1">Painel</span>
                </a>
            </li>
            <hr>
            <li class='mt-md-3'>
                <a href="listarCliente.php">
                    <i class='bx bxs-user'></i>
                    <span class="text pt-md-1">Clientes</span>
                </a>
            </li>
            <li>
                <a href="inserirCliente.php">
                    <i class='bx bx-plus-medical'></i>
                    <span class="text pt-md-1">Inserir Cliente</span>
                </a>
            </li>
            <li>
                <a href="editarCliente.php">
                    <i class='bx bxs-edit'></i>
                    <span class="text pt-md-1">Editar Cliente</span>
                </a>
            </li>
            <li>
                <a href="apagarCliente.php">
                    <i class='bx bxs-trash-alt'></i>
                    <span class="text pt-md-1">Apagar Cliente</span>
                </a>
            </li>
            <hr>
            <li class='mt-md-3'>
                <a href="listarProdutos.php">
                    <i class='bx bxs-shopping-bag'></i>
                    <span class="text pt-md-1">Produtos</span>
                </a>
            </li>
            <li class='active'>
                <a href="inserirProduto.php">
                    <i class='bx bx-plus-medical'></i>
                    <span class="text pt-md-1">Inserir Produto</span>
                </a>
            </li>
            <li>
                <a href="editarProduto.php">
                    <i class='bx bxs-edit'></i>
                    <span class="text pt-md-1">Editar Produto</span>
                </a>
            </li>
            <li>
                <a href="apagarProduto.php">
                    <i class='bx bxs-trash-alt'></i>
                    <span class="text pt-md-1">Apagar Produto</span>
                </a>
            </li>
            <hr>
            <li class='mt-md-3'>
                <a href="vendas.php">
                    <i class='bx bxs-wallet'></i>
                    <span class="text pt-md-1">Vendas</span>
                </a>
            </li>
            <hr>
            <li class='mt-md-3'>
                <a href="../logout.php" class='logout'>
                    <i class='bx bx-exit'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <?php
    echo "<section id='content' class='mt-md-5'>";
    echo "<main>";
    echo "<div class='head-title'>";
    echo "<div class='left'>";
    echo "<div class='d-flex align-items-center'>";
    echo "<i class='bx bx-menu mt-md-1 pr-md-2'></i>";
    echo "<div class='vertical-line pr-md-2'></div>";
    echo "<h1 class='mt-md-3'>Inserir Produto</h1>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<div class='horizontal_line mb-md-2 ml-md-0'></div>";
    echo "</main>";
    echo "</section>";
    ?>


    <form method="post" name="myForm" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="box-inserirProduto col-md-4 mb-4 mx-auto">
            <div class="form">
                <h2>Inserir Produto</h2>
                <div class="inputBox mx-auto">
                    <input type="text" name="marca" required="required" autocomplete="off">
                    <span>Marca</span>
                    <i></i>
                </div>

                <div class="inputBox mx-auto">
                    <input type="text" name="modelo" required="required" autocomplete="off">
                    <span>Modelo</span>
                    <i></i>
                </div>
                <div class="inputBox mx-auto">
                    <input type="text" name="submodelo" required="required" autocomplete="off">
                    <span>Submodelo</span>
                    <i></i>
                </div>

                <div class="inputBoxImg mx-auto">
                    <input type="file" name="fileToUpload0" required="required" autocomplete="off">
                    <span>Imagem de Exibição</span>
                    <i></i>
                </div>

                <div class="inputBoxImg mx-auto">
                    <input type="file" name="fileToUpload1" required="required" autocomplete="off">
                    <span>1ª Imagem</span>
                    <i></i>
                </div>

                <div class="inputBoxImg mx-auto">
                    <input type="file" name="fileToUpload2" required="required" autocomplete="off">
                    <span>2ª Imagem</span>
                    <i></i>
                </div>

                <div class="inputBoxImg mx-auto">
                    <input type="file" name="fileToUpload3" required="required" autocomplete="off">
                    <span>3ª Imagem</span>
                    <i></i>
                </div>

                <div class="inputBoxImg mx-auto">
                    <input type="file" name="fileToUpload4" required="required" autocomplete="off">
                    <span>4ª Imagem</span>
                    <i></i>
                </div>

                <div class="inputBox mx-auto">
                    <input type="number" name="preco" step="0.01" min="0" required="required" autocomplete="off">
                    <span>Preço</span>
                    <i></i>
                </div>

                <div class="inputBox mx-auto">
                    <input type="text" name="descricao" required="required" autocomplete="off">
                    <span>Descrição</span>
                    <i></i>
                </div>

                <input class="mx-auto" type="submit" name='inserir' value="Inserir">
            </div>
        </div>
    </form>

    <?php

        $img0 = '';
        $img1 = '';
        $img2 = '';
        $img3 = '';
        $img4 = '';
        if (isset($_POST["inserir"])) {
            include("../../config.php");

            $target_dir = "../../images/";
            $target_file0 = $target_dir . basename($_FILES["fileToUpload0"]["name"] ?? '');
            $target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"] ?? '');
            $target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"] ?? '');
            $target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"] ?? '');
            $target_file4 = $target_dir . basename($_FILES["fileToUpload4"]["name"] ?? '');

            $uploadOk = 1;
            $imageFileType0 = strtolower(pathinfo($target_file0, PATHINFO_EXTENSION));
            $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
            $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
            $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
            $imageFileType4 = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));

            if (isset($_POST["inserir"])) {
                $check0 = getimagesize($_FILES["fileToUpload0"]["tmp_name"]);
                $check1 = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
                $check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
                $check3 = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
                $check4 = getimagesize($_FILES["fileToUpload4"]["tmp_name"]);
                if ($check0 !== false && $check1 !== false && $check2 !== false && $check3 !== false && $check4 !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                    echo "<script>alert('O ficheiro não é uma imagem.')</script>";
                }
            }
            if (file_exists($target_file0) || file_exists($target_file1) || file_exists($target_file2) || file_exists($target_file3) || file_exists($target_file4)) {
                echo "<script>alert('Alguma das imagens que tentou inserir já existe.')</script>";
                $uploadOk = 0;
            }
            if ($imageFileType0 != "jpg" && $imageFileType0 != "png" && $imageFileType0 != "jpeg" && $imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg") {
                echo "<script>alert('Apenas são permitidos ficheiros em formato JPG, JPEG e PNG.')</script>";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "<script>alert('Erro no upload do ficheiro.')</script>";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload0"]["tmp_name"], $target_file0) &&
                    move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1) &&
                    move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2) &&
                    move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3) &&
                    move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file4)) {

                    $img0 = basename($_FILES["fileToUpload0"]["name"] ?? '');
                    $img1 = basename($_FILES["fileToUpload1"]["name"] ?? '');
                    $img2 = basename($_FILES["fileToUpload2"]["name"] ?? '');
                    $img3 = basename($_FILES["fileToUpload3"]["name"] ?? '');
                    $img4 = basename($_FILES["fileToUpload4"]["name"] ?? '');
                } else {
                    echo "<script>alert('Houve algum problema com o upload do ficheiro, tente novamente.')</script>";
                }
            }

            $marca = $_POST["marca"] ?? '';
            $model = $_POST["modelo"] ?? '';
            $submodel = $_POST["submodelo"] ?? '';
            $preco = $_POST["preco"] ?? '';
            $desc = $_POST["descricao"] ?? '';

            $query = "SELECT COUNT(*) AS total FROM produtos WHERE img0 = '$img0' OR img1 = '$img1' OR img2 = '$img2' OR img3 = '$img3' OR img4 = '$img4'";            $result = mysqli_query($liga, $query);
            $result = mysqli_query($liga, $query);
            $row = mysqli_fetch_assoc($result);
            $total = $row['total'];

            if ($total > 0) {
                echo "<script>alert('Alguma das imagens que tentou inserir já existe.')</script>";
            } else {
                // Verifica se todas as imagens foram carregadas corretamente antes de fazer a inserção no banco de dados
                if (!empty($img0) && !empty($img1) && !empty($img2) && !empty($img3) && !empty($img4)) {
                    $query = "INSERT INTO produtos (marca, modelo, submodelo, img0, img1, img2, img3, img4, preco, descricao) VALUES ('$marca', '$model', '$submodel', '$img0', '$img1', '$img2', '$img3', '$img4', '$preco', '$desc')";
        
                    $resultado = mysqli_query($liga, $query);
                    if ($resultado > 0) {
                        echo "<script>alert('Produto inserido com sucesso.')</script>";
                    } else {
                        echo "<script>alert('Houve algum erro e o produto não foi inserido. Por favor, tente novamente.')</script>";
                    }
                } else {
                    exit();
                }
            }
        }
    ?>
    <script src="../../js/admin.js"></script>
</body>

</html>