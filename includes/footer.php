<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPKICKS - FOOTER</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>
<body>
<!--     <footer>
        <a href="index.html" class="logo"><img src="../images/logo.png" class="logo_img" alt=""></a>
        <div class="icons pt-3 pb-3">
            <a href=""><i class="fas fa-envelope"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="copy text-center">
            <p>&copy;<i> TOPKICKS 2023 - TODOS OS DIREITOS RESERVADOS</i></p>
        </div>
    </footer> -->
    
    <footer>
        <a href="<?php echo $indexPage; ?>">
            <img src="<?php echo $logoPath ?>" class='logo_img_footer pt-md-1' alt="">
        </a>
        <div class="icons pt-3 pb-3">
            <a href=""><i class="fas fa-envelope"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-linkedin"></i></a>
        </div>
        <div class='footerLinks'>
            <h4>Legal</h4>
            <a href="<?php echo $aboutUs ?>"><span>></span> Sobre nós</a>
            <hr>
            <a href="<?php echo $termsPage ?>"><span>></span>  Termos e condições</a>
            <hr>
            <a href="<?php echo $privacyPolityPage ?>"><span>></span>  Política de privacidade</a>
        </div>
        <div class='footerLinks'>
            <h4>Páginas</h4>
            <a href="<?php echo $productsPage ?>"><span>></span> Produtos</a>
            <hr>
            <a href="<?php echo $nikePage ?>"><span>></span> Nike</a>
            <hr>
            <a href="<?php echo $adidasPage ?>"><span>></span> Adidas</a>
        </div>
        <div class='footerLinks'>
            <h4>Mais vendidos</h4>
            <a href="item.php?codigo=2"><span>></span> Nike Dunk Low Black & White</a>
            <hr>
            <a href=""><span>></span> Nike Air Jordan 1 Obsidian</a>
            <hr>
            <a href=""><span>></span> Adidas Yeezy Slide Flax</a>
        </div>
        <hr>
        <p class='copy text-center pt-md-1'>&copy; TOPKICKS 2023 &bull; Todos os direitos reservados</p>
    </footer>
</body>
</html>