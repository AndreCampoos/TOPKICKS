-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jul-2023 às 14:02
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `topkicks`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `codcliente` int(200) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telemovel` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `perfil` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`codcliente`, `nome`, `email`, `telemovel`, `password`, `perfil`) VALUES
(3, 'André Campos', 'andrecampos911@gmail.com', '932056469', '3d050c7294cfebf7b71a0239f9f1e132', 'adm'),
(15, 'André User', 'andre.user@gmail.com', '987654321', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(19, 'Topkicks', 'info.topkicks@gmail.com', '+351 123456789', '83a4d821f9b2ad4aaec400c8c07e1895', 'adm'),
(24, 'André', 'andre.pap@gmail.com', '111111111', 'b0baee9d279d34fa1dfd71aadb908c3f', 'user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhesvenda`
--

CREATE TABLE `detalhesvenda` (
  `codvenda` int(200) NOT NULL,
  `codigo` int(200) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `detalhesvenda`
--

INSERT INTO `detalhesvenda` (`codvenda`, `codigo`, `quantidade`, `preco`, `subtotal`) VALUES
(30, 2, 1, 250.00, 250.00),
(34, 2, 1, 250.00, 250.00),
(36, 2, 1, 250.00, 250.00),
(36, 3, 1, 210.00, 210.00),
(37, 1, 1, 270.00, 270.00),
(38, 2, 1, 250.00, 250.00),
(38, 3, 1, 210.00, 210.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigo` int(200) NOT NULL,
  `marca` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `modelo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `submodelo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img0` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `preco` double(10,2) NOT NULL,
  `descricao` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigo`, `marca`, `modelo`, `submodelo`, `img0`, `img1`, `img2`, `img3`, `img4`, `preco`, `descricao`) VALUES
(1, 'Adidas', 'Yeezy Slide', 'Bone', 'YeezySlideBone0.png', 'YeezySlideBone1.jpg', 'YeezySlideBone2.jpg', 'YeezySlideBone3.jpg', 'YeezySlideBone4.jpg', 270.00, 'Os Yeezy Slide Bone são sinônimo de conforto e estilo minimalista. Com uma tonalidade neutra e um design deslizante, esses chinelos são perfeitos para relaxar ou completar um look casual. Seu acabamento macio e aconchegante torna-os ideais para os momentos de descanso e descontração.'),
(2, 'Adidas', 'Yeezy Slide', 'Flax', 'YeezySlideFlax0.png', 'YeezySlideFlax1.jpg', 'YeezySlideFlax2.jpg', 'YeezySlideFlax3.jpg', 'YeezySlideFlax4.jpg', 250.00, 'Os Yeezy Slide Flax são uma adição elegante à linha de chinelos Yeezy. Com sua tonalidade de trigo claro, esses chinelos oferecem estilo e conforto em um único pacote. Perfeitos para relaxar ou compor um look descontraído.'),
(3, 'Adidas', 'Yeezy Slide', 'Ochre', 'YeezySlideOchre0.png', 'YeezySlideOchre1.jpg', 'YeezySlideOchre2.jpg', 'YeezySlideOchre3.jpg', 'YeezySlideOchre4.jpg', 210.00, 'Os Yeezy Slide Ochre são um exemplo de estilo despojado e contemporâneo. Com sua tonalidade de amarelo-ocre, esses chinelos oferecem conforto e um visual marcante. Perfeitos para relaxar ou compor um look descontraído com um toque de elegância.'),
(4, 'Adidas', 'Yeezy Slide', 'Onyx', 'YeezySlideOnyx0.png', 'YeezySlideOnyx1.jpg', 'YeezySlideOnyx2.jpg', 'YeezySlideOnyx3.jpg', 'YeezySlideOnyx4.jpg', 290.00, 'Os Yeezy Slide Onyx são uma escolha elegante e moderna. Com sua tonalidade negra intensa, esses chinelos oferecem um visual sofisticado e versátil. Perfeitos para complementar qualquer look casual com um toque de estilo exclusivo.'),
(5, 'Adidas', 'Yeezy Boost 350', 'Salt', 'YeezyBoost350Salt0.png', 'YeezyBoost350Salt1.jpg', 'YeezyBoost350Salt2.jpg', 'YeezyBoost350Salt3.jpg', 'YeezyBoost350Salt4.jpg', 450.00, 'Os Yeezy Boost 350 Salt são um exemplo de estilo minimalista e sofisticado. Com sua tonalidade suave de sal, esses ténis combinam facilmente com qualquer roupa. Perfeitos para aqueles que buscam um visual clean e contemporâneo.'),
(6, 'Adidas', 'Yeezy Boost 350', 'Black White', 'YeezyBoost350BlackWhite0.png', 'YeezyBoost350BlackWhite1.jpg', 'YeezyBoost350BlackWhite2.jpg', 'YeezyBoost350BlackWhite3.jpg', 'YeezyBoost350BlackWhite4.jpg', 550.00, 'Os Yeezy Boost 350 Black White são um exemplo de equilíbrio entre o clássico e o moderno. Com sua combinação de preto e branco, esses ténis oferecem um visual atemporal e versátil. Perfeitos para adicionar um toque de sofisticação a qualquer look.'),
(7, 'Adidas', 'Yeezy Boost 350', 'Black Red', 'YeezyBoost350BlackRed0.png', 'YeezyBoost350BlackRed1.jpg', 'YeezyBoost350BlackRed2.jpg', 'YeezyBoost350BlackRed3.jpg', 'YeezyBoost350BlackRed4.jpg', 425.00, 'Os Yeezy Boost 350 Black Red são uma afirmação ousada de estilo. Com seu contraste marcante entre o preto e o vermelho, esses ténis destacam-se onde quer que você vá. Perfeitos para adicionar um toque de audácia e originalidade ao seu look.'),
(8, 'Adidas', 'Yeezy Boost 350', 'Zebra', 'YeezyBoost350Zebra0.png', 'YeezyBoost350Zebra1.jpg', 'YeezyBoost350Zebra2.jpg', 'YeezyBoost350Zebra3.jpg', 'YeezyBoost350Zebra4.jpg', 475.00, 'Os Yeezy Boost 350 Zebra são uma verdadeira declaração de moda. Com seu padrão listrado em preto e branco, esses ténis se destacam com estilo e originalidade. Perfeitos para os amantes de sneakers que desejam um visual único e impactante.'),
(9, 'Adidas', 'Yeezy Boost 350', 'Dazzling Blue', 'YeezyBoost350DazzlingBlue0.png', 'YeezyBoost350DazzlingBlue1.jpg', 'YeezyBoost350DazzlingBlue2.jpg', 'YeezyBoost350DazzlingBlue3.jpg', 'YeezyBoost350DazzlingBlue4.jpg', 425.00, 'Os Yeezy Boost 350 Dazzling Blue são uma verdadeira declaração de moda. Com o seu azul marcante, estes ténis destacam-se com muito estilo e originalidade. Perfeitos para os amantes de sneakers que desejam um visual único e impactante.'),
(10, 'Nike', 'Dunk Low', 'Black and White', 'DunkLowBlackWhite0.png', 'DunkLowBlackWhite1.jpg', 'DunkLowBlackWhite2.jpg', 'DunkLowBlackWhite3.jpg', 'DunkLowBlackWhite4.jpg', 200.00, 'Os Dunk Low Black and White são um exemplo de estilo minimalista e versatilidade. Com seu design em preto e branco, esses ténis combinam facilmente com qualquer roupa. Perfeitos para adicionar um toque de elegância e simplicidade ao seu look.'),
(11, 'Nike', 'Dunk Low', 'Grey Fog', 'DunkLowGreyFog0.png', 'DunkLowGreyFog1.jpg', 'DunkLowGreyFog2.jpg', 'DunkLowGreyFog3.jpg', 'DunkLowGreyFog4.jpg', 300.00, 'Os Dunk Low Grey Fog são sinônimo de elegância discreta. Com sua tonalidade suave de cinza nebuloso, esses ténis oferecem um visual sofisticado e versátil. Perfeitos para adicionar um toque de estilo contemporâneo e discreto a qualquer look.'),
(12, 'Nike', 'Dunk Low', 'Argon Blue', 'DunkLowArgon0.png', 'DunkLowArgon1.jpg', 'DunkLowArgon2.jpg', 'DunkLowArgon3.jpg', 'DunkLowArgon4.jpg', 240.00, 'Os Dunk Low Argon Blue são um exemplo de estilo ousado e marcante. Com sua tonalidade vibrante de azul-argônio, esses ténis chamam a atenção e proporcionam um visual único. Perfeitos para aqueles que desejam se destacar com autenticidade e personalidade.'),
(13, 'Nike', 'Dunk Low', 'USC', 'DunkLowUSC0.png', 'DunkLowUSC1.jpg', 'DunkLowUSC2.jpg', 'DunkLowUSC3.jpg', 'DunkLowUSC4.jpg', 260.00, 'Os Dunk Low USC são uma homenagem à Universidade do Sul da Califórnia. Com seu design em tons de vermelho e amarelo, esses ténis trazem o espírito e a energia da equipe esportiva da USC. Perfeitos para os fãs da universidade e amantes de sneakers.'),
(14, 'Nike', 'Dunk Low', 'Michigan', 'DunkLowMichigan0.png', 'DunkLowMichigan1.jpg', 'DunkLowMichigan2.jpg', 'DunkLowMichigan3.jpg', 'DunkLowMichigan4.jpg', 310.00, 'Os Dunk Low Michigan são uma celebração da Universidade de Michigan. Com seu design em tons de amarelo e azul, esses ténis trazem o orgulho e o espírito da equipe esportiva dos Wolverines. Perfeitos para os fãs da universidade e amantes de sneakers.'),
(15, 'Nike', 'Dunk Low', 'Light Iron Ore Black', 'DunkLowOreBlack0.png', 'DunkLowOreBlack1.jpg', 'DunkLowOreBlack2.jpg', 'DunkLowOreBlack3.jpg', 'DunkLowOreBlack4.jpg', 240.00, 'Os Dunk Low Light Iron Ore Black são uma combinação sofisticada de cores. Com seu tom sutil de minério de ferro claro e detalhes em preto, esses ténis oferecem um visual elegante e versátil. Perfeitos para aqueles que buscam um estilo discreto e contemporâneo.'),
(16, 'Nike', 'Dunk Low SE', 'Lottery Pack Malachite Green', 'DunkLowMalachiteGreen0.png', 'DunkLowMalachiteGreen1.jpg', 'DunkLowMalachiteGreen2.jpg', 'DunkLowMalachiteGreen3.jpg', 'DunkLowMalachiteGreen4.jpg', 300.00, 'Os Dunk Low SE Lottery Pack Malachite Green são uma verdadeira joia para os sneakerheads. Com sua colorway de verde malaquita vibrante, esses ténis se destacam com estilo. Perfeitos para aqueles que desejam adicionar um toque de audácia e originalidade ao seu look.'),
(17, 'Nike', 'Dunk Low', 'NBA 75Th Anniversary', 'DunkLowNbaAnniversary0.png', 'DunkLowNbaAnniversary1.jpg', 'DunkLowNbaAnniversary2.jpg', 'DunkLowNbaAnniversary3.jpg', 'DunkLowNbaAnniversary4.jpg', 260.00, 'Os Dunk Low NBA 75th Anniversary são uma homenagem aos 75 anos da NBA. Com detalhes inspirados nas cores e na história da liga, esses ténis são uma combinação perfeita de estilo e autenticidade. Perfeitos para os fãs do basquete e amantes de sneakers.'),
(18, 'Nike', 'Dunk Low', 'Midnight Navy', 'DunkLowMidnightNavy0.png', 'DunkLowMidnightNavy1.jpg', 'DunkLowMidnightNavy2.jpg', 'DunkLowMidnightNavy3.jpg', 'DunkLowMidnightNavy4.jpg', 275.00, 'Os Dunk Low Midnight Navy são uma declaração de estilo elegante e sofisticado. Com sua tonalidade de azul meia-noite, esses ténis proporcionam um visual marcante e versátil. Perfeitos para adicionar um toque de refinamento ao seu look.'),
(19, 'Nike', 'Dunk Low', 'Medium Olive', 'DunkLowMediumOlive0.png', 'DunkLowMediumOlive1.jpg', 'DunkLowMediumOlive2.jpg', 'DunkLowMediumOlive3.jpg', 'DunkLowMediumOlive4.jpg', 330.00, 'Os Dunk Low Medium Olive são uma expressão de estilo casual e elegante. Com sua tonalidade suave de verde-oliva, esses ténis oferecem um visual versátil e moderno. Perfeitos para adicionar um toque de sofisticação descontraída ao seu look diário.'),
(30, 'Nike', 'Dunk SB Low x Travis Scott', 'Cactus Jack', 'SBCactusJack0.png', 'SBCactusJack1.jpg', 'SBCactusJack2.jpg', 'SBCactusJack3.jpg', 'SBCactusJack4.jpg', 1200.00, 'Os Dunk Low SB Low x Travis Scott \"Cactus Jack\" são uma colaboração excepcional que combina o estilo marcante de Travis Scott com o design clássico dos Dunk Low. Com detalhes exclusivos e uma paleta de cores vibrantes, esses ténis se destacam com originalidade e autenticidade.'),
(32, 'Nike', 'Dunk Low', 'UCLA', 'DunkLowUcla0.png', 'DunkLowUcla1.jpg', 'DunkLowUcla2.jpg', 'DunkLowUcla3.jpg', 'DunkLowUcla4.jpg', 200.00, 'Os Dunk Low UCLA são uma homenagem à icônica Universidade da Califórnia em Los Angeles. Com seu design em tons de azul e amarelo, esses ténis trazem o espírito e o orgulho da UCLA. Perfeitos para os fãs da universidade e amantes de sneakers.'),
(33, 'Nike', 'Air Jordan 1 Retro Low', 'TRAVIS SCOTT Reverse Mocha', 'Jordan1LowReverseMocha0.png', 'Jordan1LowReverseMocha1.jpg', 'Jordan1LowReverseMocha2.jpg', 'Jordan1LowReverseMocha3.jpg', 'Jordan1LowReverseMocha4.jpg', 1000.00, 'Os Air Jordan 1 Retro Low TRAVIS SCOTT Reverse Mocha são uma colaboração única que combina a estética clássica do Air Jordan 1 com o estilo distinto de Travis Scott. Com uma paleta de cores inversa e detalhes exclusivos, esses ténis são verdadeiramente impressionantes.'),
(34, 'Nike', 'Air Jordan 1 Retro Low', 'Travis Scott Black Phantom', 'Jordan1LowBlackPhantom0.png', 'Jordan1LowBlackPhantom1.jpg', 'Jordan1LowBlackPhantom2.jpg', 'Jordan1LowBlackPhantom3.jpg', 'Jordan1LowBlackPhantom4.jpg', 510.00, 'Os Air Jordan 1 Retro Low TRAVIS SCOTT Black Phantom são um tesouro para os fãs de ténis. Com um design elegante em preto e detalhes exclusivos, esses ténis capturam o estilo distinto de Travis Scott e proporcionam um visual sofisticado e moderno.'),
(35, 'Nike', 'Air Jordan 1 Retro Low', 'FRAGMENT X TRAVIS SCOTT', 'Jordan1LowFragment0.png', 'Jordan1LowFragment1.jpg', 'Jordan1LowFragment2.jpg', 'Jordan1LowFragment3.jpg', 'Jordan1LowFragment4.jpg', 1140.00, 'Os Air Jordan 1 Retro Low TRAVIS SCOTT Fragment são uma colaboração de destaque, combinando o estilo icônico do Air Jordan 1 com o toque exclusivo de Travis Scott e a estética Fragment. Com detalhes marcantes e um design sofisticado, esses ténis são verdadeiras obras de arte para os entusiastas da moda.'),
(36, 'Nike', 'Air Jordan 1 Low', 'Court Purple', 'Jordan1LowCourtPurple0.png', 'Jordan1LowCourtPurple1.jpg', 'Jordan1LowCourtPurple2.jpg', 'Jordan1LowCourtPurple3.jpg', 'Jordan1LowCourtPurple4.jpg', 215.00, 'Os Air Jordan 1 Retro Low Court Purple são um exemplo de estilo atemporal. Com uma combinação de cores elegante e detalhes precisos, esses ténis trazem uma dose de sofisticação a qualquer look. Perfeitos para os amantes de ténis que buscam um visual clássico e versátil.'),
(37, 'Nike', 'Air Jordan 1 Low', 'New Emerald', 'Jordan1LowNewEmerald0.png', 'Jordan1LowNewEmerald1.jpg', 'Jordan1LowNewEmerald2.jpg', 'Jordan1LowNewEmerald3.jpg', 'Jordan1LowNewEmerald4.jpg', 200.00, 'Os Air Jordan 1 Retro Low New Emerald são uma explosão de estilo e frescor. Com sua combinação vibrante de cores, esses ténis são verdadeiros destaques. Perfeitos para adicionar um toque de audácia e originalidade ao seu look.'),
(38, 'Nike', 'Air Jordan 1 Low', 'True Cement', 'Jordan1LowTrueCement0.png', 'Jordan1LowTrueCement1.jpg', 'Jordan1LowTrueCement2.jpg', 'Jordan1LowTrueCement3.jpg', 'Jordan1LowTrueCement4.jpg', 240.00, 'Os Air Jordan 1 Retro Low True Cement são uma homenagem ao clássico design \"True Cement\". Com uma combinação de cores atemporal e detalhes autênticos, esses ténis trazem um estilo icônico e uma sensação de nostalgia para qualquer look.'),
(39, 'Nike', 'Air Jordan 1 Low', 'Mocha', 'Jordan1LowMocha0.png', 'Jordan1LowMocha1.jpg', 'Jordan1LowMocha2.jpg', 'Jordan1LowMocha3.jpg', 'Jordan1LowMocha4.jpg', 310.00, 'Os Air Jordan 1 Retro Low Mocha são sinônimo de sofisticação e estilo. Com uma paleta de cores suaves e elegantes, esses ténis trazem uma sensação de luxo discreto. Perfeitos para aqueles que desejam um visual refinado e atemporal.'),
(40, 'Nike', 'Air Jordan 1 Low', 'OG UNC', 'Jordan1LowUNC0.png', 'Jordan1LowUNC1.jpg', 'Jordan1LowUNC2.jpg', 'Jordan1LowUNC3.jpg', 'Jordan1LowUNC4.jpg', 250.00, 'Os Air Jordan 1 Retro Low OG UNC são uma celebração da lendária Universidade da Carolina do Norte. Com uma paleta de cores icônica, esses ténis trazem uma estética clássica e um toque de história para o seu look. Perfeitos para os fãs de basquete e sneakerheads.'),
(41, 'Adidas', 'Yeezy Foam Runner', 'Sulfur', 'YeezyFoamRunnerSulfur0.png', 'YeezyFoamRunnerSulfur1.jpg', 'YeezyFoamRunnerSulfur2.jpg', 'YeezyFoamRunnerSulfur3.jpg', 'YeezyFoamRunnerSulfur4.jpg', 350.00, 'Os Yeezy Foam Runner Sulfur são um verdadeiro destaque da moda contemporânea. Com seu design inovador e futurista, esses ténis proporcionam conforto e estilo únicos. Com sua colorway amarelo-sulfur, eles chamam a atenção e elevam o seu visual a outro nível.'),
(42, 'Adidas', 'Yeezy Foam Runner', 'Onyx', 'YeezyFoamRunnerOnyx0.png', 'YeezyFoamRunnerOnyx1.jpg', 'YeezyFoamRunnerOnyx2.jpg', 'YeezyFoamRunnerOnyx3.jpg', 'YeezyFoamRunnerOnyx4.jpg', 350.00, 'Os Yeezy Foam Runner Onyx são um exemplo de estilo arrojado e vanguardista. Com seu design único e contemporâneo, esses ténis proporcionam um visual marcante. Com a colorway em preto-ônix, eles combinam facilmente com diversos looks, adicionando um toque de sofisticação e modernidade.'),
(43, 'Adidas', 'Yeezy Foam Runner', 'Sand', 'YeezyFoamRunnerSand0.png', 'YeezyFoamRunnerSand1.jpg', 'YeezyFoamRunnerSand2.jpg', 'YeezyFoamRunnerSand3.jpg', 'YeezyFoamRunnerSand4.jpg', 400.00, 'Os Yeezy Foam Runner Sand são uma declaração de estilo despojado e contemporâneo. Com seu design minimalista e cor neutra de areia, esses tênis oferecem conforto e um visual sofisticado. Perfeitos para quem busca uma estética moderna e autêntica.'),
(44, 'Nike', 'Air Jordan 1 Low', 'Panda', 'Jodan1LowPanda0.png', 'Jodan1LowPanda1.jpg', 'Jodan1LowPanda2.jpg', 'Jodan1LowPanda3.jpg', 'Jodan1LowPanda4.jpg', 130.00, 'Os Air Jordan 1 Low Panda são um exemplo de estilo clássico e elegância. Com seu design em preto e branco, esses ténis combinam facilmente com qualquer look. Perfeitos para adicionar um toque de sofisticação e atemporalidade ao seu estilo.'),
(45, 'Nike', 'Air Jordan 1 Low', 'Cardinal Red', 'Jordan1LowCardinalRed0.png', 'Jordan1LowCardinalRed1.jpg', 'Jordan1LowCardinalRed2.jpg', 'Jordan1LowCardinalRed3.jpg', 'Jordan1LowCardinalRed4.jpg', 200.00, 'Os Air Jordan 1 Low Cardinal Red são uma explosão de cor e estilo. Com sua tonalidade vibrante de vermelho cardinal, esses ténis se destacam onde quer que você vá. Perfeitos para adicionar um toque de audácia e originalidade ao seu look.'),
(46, 'Nike', 'Air Jordan 1 Low', 'Ashlen State', 'Jordan1LowAshlenState0.png', 'Jordan1LowAshlenState1.jpg', 'Jordan1LowAshlenState2.jpg', 'Jordan1LowAshlenState3.jpg', 'Jordan1LowAshlenState4.jpg', 300.00, 'Os Air Jordan 1 Low Ashlen State são um exemplo de estilo clássico e elegância. Com seu design em tons azulados, estes ténis combinam facilmente com qualquer look. Perfeitos para adicionar um toque de sofisticação e atemporalidade ao seu estilo.'),
(47, 'Nike', 'Air Jordan 1 Mid', 'French Blue', 'Jordan1MidFrenchBlue0.png', 'Jordan1MidFrenchBlue1.jpg', 'Jordan1MidFrenchBlue2.jpg', 'Jordan1MidFrenchBlue3.jpg', 'Jordan1MidFrenchBlue4.jpg', 250.00, 'Os Air Jordan 1 Mid French Blue são um exemplo de estilo clássico e elegância. Com sua tonalidade suave de azul francês, esses ténis oferecem um visual sofisticado e versátil. Perfeitos para adicionar um toque de refinamento ao seu look diário.'),
(48, 'Nike', 'Air Jordan 1 Mid', 'Obsidian', 'Jordan1MidObsidian0.png', 'Jordan1MidObsidian1.jpg', 'Jordan1MidObsidian2.jpg', 'Jordan1MidObsidian3.jpg', 'Jordan1MidObsidian4.jpg', 190.00, 'Os Air Jordan 1 Mid Obsidian são um exemplo de estilo atemporal e sofisticação. Com sua tonalidade profunda de azul obsidiana, esses ténis oferecem um visual versátil e elegante. Perfeitos para adicionar um toque de classe e autenticidade ao seu estilo.'),
(49, 'Nike', 'Air Jordan 1 Mid', 'True Cement', 'Jordan1MidTrueCement0.png', 'Jordan1MidTrueCement1.jpg', 'Jordan1MidTrueCement2.jpg', 'Jordan1MidTrueCement3.jpg', 'Jordan1MidTrueCement4.jpg', 240.00, 'Os Air Jordan 1 Mid True Cement são uma combinação clássica de estilo e autenticidade. Com seu design inspirado no cimento verdadeiro, esses ténis trazem uma estética atemporal e uma sensação de nostalgia. Perfeitos para os amantes de ténis que valorizam o legado da linha Air Jordan.'),
(91, 'Nike', 'Air Jordan 1 Mid', 'Taxi', 'Jordan1MidTaxi0.png', 'Jordan1MidTaxi1.jpg', 'Jordan1MidTaxi2.jpg', 'Jordan1MidTaxi3.jpg', 'Jordan1MidTaxi4.jpg', 180.00, 'Os Air Jordan 1 Mid Taxi são uma interpretação clássica com uma pitada de modernidade. Com sua colorway em preto e amarelo, esses ténis proporcionam um visual marcante e elegante. Perfeitos para os amantes de sneakers que buscam estilo e autenticidade.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codvenda` int(200) NOT NULL,
  `codcliente` int(200) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `sessao` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codvenda`, `codcliente`, `total`, `data`, `sessao`) VALUES
(20, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(21, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(22, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(23, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(24, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(25, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(26, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(27, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(28, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(29, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(30, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(31, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(32, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(33, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(34, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(35, 3, 250.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(36, 3, 460.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(37, 3, 270.00, '2023-07-05', '5r9cgb7v97sliaftd3n3a0347k'),
(38, 3, 460.00, '2023-07-05', 'g3tad7g8dmu9h9scui1popem0q'),
(39, 3, 250.00, '2023-07-11', 'plebog7b8nahin5ms83toeck8l'),
(40, 3, 210.00, '2023-07-11', 'plebog7b8nahin5ms83toeck8l'),
(41, 3, 210.00, '2023-07-11', 'plebog7b8nahin5ms83toeck8l'),
(42, 3, 13750.00, '2023-07-11', 'plebog7b8nahin5ms83toeck8l'),
(43, 3, 250.00, '2023-07-11', 'plebog7b8nahin5ms83toeck8l'),
(44, 3, 210.00, '2023-07-11', 'plebog7b8nahin5ms83toeck8l'),
(45, 3, 210.00, '2023-07-11', 'plebog7b8nahin5ms83toeck8l'),
(46, 3, 16000.00, '2023-07-11', 'plebog7b8nahin5ms83toeck8l'),
(47, 3, 270.00, '2023-07-16', 'qektvor3l1brmog5q2q1vlv1gm'),
(48, 3, 250.00, '2023-07-17', '9i221pj7kio3nt13uvk0s5g7ep'),
(49, 3, 250.00, '2023-07-18', '9i221pj7kio3nt13uvk0s5g7ep'),
(50, 3, 250.00, '2023-07-18', '9i221pj7kio3nt13uvk0s5g7ep'),
(51, 3, 250.00, '2023-07-18', '9i221pj7kio3nt13uvk0s5g7ep'),
(52, 3, 210.00, '2023-07-18', '9i221pj7kio3nt13uvk0s5g7ep'),
(53, 3, 250.00, '2023-07-19', 'h4ovui9k0hm6c06eejotft19bc'),
(54, 3, 210.00, '2023-07-19', 'u6t0eegoqequg5c0del5jn51ec'),
(55, 3, 250.00, '2023-07-19', 'u6t0eegoqequg5c0del5jn51ec'),
(56, 3, 300.00, '2023-07-19', '43ag2e17k3m8sah5t4iguqjlmu'),
(57, 3, 2650.00, '2023-07-19', '3cp05nsgiau43pe8sk7t59p96h'),
(58, 3, 250.00, '2023-07-19', 'lmdhkei1i6u4gqtru7n6qlajs3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codcliente`);

--
-- Índices para tabela `detalhesvenda`
--
ALTER TABLE `detalhesvenda`
  ADD PRIMARY KEY (`codvenda`,`codigo`),
  ADD KEY `detalhes_fk_1` (`codigo`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`codvenda`),
  ADD KEY `vendasclientes_fk` (`codcliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codcliente` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigo` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codvenda` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `detalhesvenda`
--
ALTER TABLE `detalhesvenda`
  ADD CONSTRAINT `detalhes_fk2` FOREIGN KEY (`codvenda`) REFERENCES `vendas` (`codvenda`),
  ADD CONSTRAINT `detalhes_fk_1` FOREIGN KEY (`codigo`) REFERENCES `produtos` (`codigo`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendasclientes_fk` FOREIGN KEY (`codcliente`) REFERENCES `clientes` (`codcliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
