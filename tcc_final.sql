-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Dez-2023 às 03:20
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc_final`
--
CREATE DATABASE IF NOT EXISTS `tcc_final` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tcc_final`;

--
-- Estrutura da tabela `comentarioavaliacaohardware`
--

CREATE TABLE `comentarioavaliacaohardware` (
  `id` int(11) NOT NULL,
  `qtd_estrela` int(11) NOT NULL,
  `mensagem` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_hardware` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarioavaliacaojogo`
--

CREATE TABLE `comentarioavaliacaojogo` (
  `id` int(11) NOT NULL,
  `qtd_estrela` int(11) NOT NULL,
  `mensagem` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_jogo` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentarioavaliacaojogo`
--

INSERT INTO `comentarioavaliacaojogo` (`id`, `qtd_estrela`, `mensagem`, `created`, `id_usuario`, `id_jogo`, `modified`) VALUES
(1, 5, 'Muito bom o jogo!', '0000-00-00 00:00:00', 6, 3, NULL),
(2, 4, 'top', '0000-00-00 00:00:00', 10, 2, NULL),
(8, 5, 'va', '2023-12-08 01:43:07', 6, 10, NULL),
(11, 5, 'jogo top', '2023-12-08 16:51:39', 6, 1, NULL),
(12, 5, 'topzada', '2023-12-08 17:07:07', 6, 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hardwares`
--

CREATE TABLE `hardwares` (
  `id` int(11) NOT NULL,
  `nome_hard` varchar(100) NOT NULL,
  `info_hard` text NOT NULL,
  `datafabricacao_hard` date NOT NULL,
  `empresa_hard` varchar(100) NOT NULL,
  `img_hard` varchar(255) NOT NULL,
  `categoriahw` varchar(100) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `pichau_link` varchar(255) NOT NULL,
  `kabum_link` varchar(255) NOT NULL,
  `amazon_link` varchar(255) NOT NULL,
  `terabyte_link` varchar(255) NOT NULL,
  `aliexpress_link` varchar(255) NOT NULL,
  `path1` varchar(255) NOT NULL,
  `img_hard1` varchar(255) NOT NULL,
  `path2` varchar(255) NOT NULL,
  `img_hard2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `hardwares`
--

INSERT INTO `hardwares` (`id`, `nome_hard`, `info_hard`, `datafabricacao_hard`, `empresa_hard`, `img_hard`, `categoriahw`, `preco`, `path`, `pichau_link`, `kabum_link`, `amazon_link`, `terabyte_link`, `aliexpress_link`, `path1`, `img_hard1`, `path2`, `img_hard2`) VALUES
(1, 'PROCESSADOR INTEL CORE I5-10400F', 'Processador Intel Core i5-10400F Os novos processadores Intel Core da 10ª Geração oferecem atualizações de desempenho incríveis para melhorar a produtividade e proporcionar entretenimento surpreendente, incluindo até 5,3 GHz, Intel® Wi-Fi 6 (Gig) tecnologia Thunderbolt™ 3, HDR 4K, otimização de sistema inteligentes e muito mais. Produtividade acelerada Recursos de desempenho inteligente integrados aprendem e se adaptam ao que você faz, direcionando potência dinamicamente para onde ela é mais necessária. Os processadores Intel® Core™ da 10ª Geração com memória Intel® Optane™ fornecem a responsividade para fazer mais. A melhor conectividade da categoria Com Intel® Wi-Fi 6 (Gig+), conexão Ethernet Intel® I225 e tecnologia Thunderbolt™ 3 integrados, os processadores Intel® Core™ da 10ª Geração oferecem conectividade cabeada e sem fio rápida, garantida e versátil. Entretenimento premium Uma nova arquitetura de gráficos oferece suporte a experiências visuais ultravívidas, como vídeo em HDR 4K e jogos a 1080p. Os processadores Intel® Core™ da 10 ª Geração com gráficos Intel® Iris® Plus permitem experiências de entretenimento nunca vistas. Jogos sérios (serious gaming) Aproveite jogos incríveis com alto FPS, até mesmo enquanto realiza streaming e gravação com até 5,3 GHz. Turbo e aceleração da memória Intel® Optane™. Em casa ou em qualquer lugar, processadores Intel® Core™ da 10ª Geração capazes de overclocking rodam as plataformas definitivas de jogos em notebooks e desktops.', '2020-04-01', 'Intel', 'Intel510440Screen1.jpg', 'Processador', 'R$:800.00', 'imghard/Intel510440Screen1.jpg', 'https://www.pichau.com.br/processador-intel-core-i5-10400f-6-core-12-threads-2-9ghz-4-3ghz-turbo-cache-12mb-lga1200-bx8070110400f', 'https://www.kabum.com.br/produto/112991/processador-intel-core-i5-10400f-2-9ghz-4-3ghz-max-turbo-cache-12mb-6-nucleos-12-threads-lga-1200-bx8070110400f', 'https://www.amazon.com.br/Processador-Intel-I5-10400F-Cache-4-3GHz/dp/B0883PYCB4', 'https://www.terabyteshop.com.br/produto/13676/processador-intel-core-i5-10400f-290ghz-430ghz-turbo-10-geracao-6-cores-12-threads-lga-1200-bx8070110400f', 'https://pt.aliexpress.com/item/1005004754880145.html', 'imghard/Intel510440Screen2.jpg', 'Intel510440Screen2.jpg', 'imghard/Intel510440Screen3.jpg', 'Intel510440Screen3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `sinopse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_da_empresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faixa_etaria` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_lanc` date NOT NULL,
  `categoria` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plataformas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `req` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `req1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_jogo_Screen1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_jogo_Screen2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_jogo_Screen3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_jogo_Screen4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_jogo_Screen5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `steam_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epic_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ps_store_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `switch_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xbox_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `sinopse`, `nome_da_empresa`, `preco`, `faixa_etaria`, `data_lanc`, `categoria`, `plataformas`, `req`, `req1`, `titulo`, `path`, `img_logo`, `path1`, `img_jogo_Screen1`, `path2`, `img_jogo_Screen2`, `path3`, `img_jogo_Screen3`, `path4`, `img_jogo_Screen4`, `path5`, `img_jogo_Screen5`, `steam_link`, `epic_link`, `ps_store_link`, `switch_link`, `xbox_link`, `mobile_link`, `url`) VALUES
(1, 'Um lutador de plataforma épico para até 8 jogadores on-line ou localmente. Experimente modos livres casuais, partidas ranqueadas ou convide amigos para uma sala privada. Tudo isso grátis! Jogue multiplataforma com milhões de jogadores no PlayStation, Xbox, Nintendo Switch, iOS, Android e Steam! Atualizações frequentes. Mais de cinquenta Lendas.\r\n\r\n\r\nOs modos do jogo incluem:\r\nJogo online de classificação 1v1 e 2v2\r\n4 jogadores online todos contra todos\r\n8 jogadores 4v4 e todos contra todos\r\nTodos contra todos local\r\nEquipas locais personalizadas\r\nModos de jogo alternados - Brawlball, Bombsketball e outros.\r\n\r\n\r\nO jogo completo de Brawlhalla inclui todos os mapas, modos de jogo e mais de 30 personagens jogáveis. Escolhe personagens da rotação gratuita semanal ou desbloqueia personagens de forma permanente com o Ouro que ganhas enquanto jogas o jogo.', 'Ubisoft', 'R$:0.00', 'Livre', '2017-10-17', 'Luta, Acao.', 'PC, Xbox Series, Xbox One, PS5, PS4, Switch, Mobile.', 'MÍNIMOS:\r\nMemória: 2 GB de RAM\r\nArmazenamento: 800 MB de espaço disponível', 'RECOMENDADOS:\r\nMemória: 4 GB de RAM\r\nRede: Conexão de internet banda larga\r\nArmazenamento: 2 GB de espaço disponível', 'Brawlhalla', 'imgbanner/Brawlhalla.png', 'Brawlhalla.png', 'imgjogos/brawlhallaScreen1.jpg', 'brawlhallaScreen1.jpg', 'imgjogos/brawlhallaScreen2.jpg', 'brawlhallaScreen2.jpg', 'imgjogos/brawlhallaScreen3.jpg', 'brawlhallaScreen3.jpg', 'imgjogos/brawlhallaScreen4.jpg', 'brawlhallaScreen4.jpg', 'imgjogos/brawlhallaScreen5.jpg', 'brawlhallaScreen5.jpg', 'https://store.steampowered.com/app/291550/Brawlhalla/', 'https://store.epicgames.com/pt-BR/p/brawlhalla', 'https://www.playstation.com/pt-br/games/brawlhalla/', 'https://www.nintendo.com/pt-br/store/products/brawlhalla-switch/', 'https://www.xbox.com/pt-BR/games/store/brawlhalla/C3B1V55CDL0C', 'https://play.google.com/store/apps/details?id=air.com.ubisoft.brawl.halla.platform.fighting.action.pvp&hl=en_US', 'https://www.youtube.com/watch?v=b0dP8gWw58c'),
(2, 'Tecnologia HyperMotion2\r\nFIFA 23 traz a tecnologia HyperMotion para o PC pela primeira vez, com o dobro de capturas de movimentos do mundo real, deixando as partidas ainda mais reais. A HyperMotion2 desbloqueia novos recursos e dá ao FIFA 23 mais de 6.000 animações verdadeiras, obtidas por meio de milhões de frames de captura avançada de partida 11x11. O resultado aproxima FIFA 23 ainda mais do futebol masculino e feminino real, com jogadores e jogadoras se movendo naturalmente pelo campo.\r\n\r\nFIFA 23 Ultimate Team™\r\nMonte seu elenco dos sonhos e dispute partidas no modo mais popular do FIFA, com milhares de jogadores e inúmeras maneiras de personalizar seu Clube. Jogue solo no modo Squad Battles ou com alguém no Co-op do FUT, online no modo Division Rivals ou enfrente quem joga melhor no FUT Champions conectado ao mundo do futebol durante a temporada inteira.\r\nFIFA 23 redefine o sistema de entrosamento do Ultimate Team, traz recursos de crossplay** e apresenta o Momentos do FUT, um modo inédito para um jogador com desafios baseados em eventos do mundo real, ou as Campanhas do FUT.\r\n\r\nInovação da jogabilidade\r\nVivencie uma experiência de futebol mais real com novos recursos de jogabilidade, incluindo mecânicas de chute de risco e recompensa, novas mecânicas de bola parada, atualização na física de jogo e maior variedade futebolística com estilos de corrida conhecidos, novas fintas e comemorações inéditas.\r\nAo jogar o FIFA 23 no PC, você pode usar seus controles de PlayStation e Xbox para jogar do seu jeito.\r\nEste jogo inclui compras opcionais de moeda virtual dentro do jogo, que pode ser usada para adquirir itens virtuais do jogo, incluindo uma seleção aleatória de itens virtuais do jogo.', 'EA Sports', 'R$:200.00', 'Livre', '2022-09-30', 'Esporte.', 'PC, Xbox Series, Xbox One, Switch.', 'MÍNIMOS:\r\nRequer um processador e sistema operacional de 64 bits\r\nSO: Windows 10 64-bit\r\nProcessador: Intel Core i5 6600k or AMD Ryzen 5 1600\r\nMemória: 8 GB de RAM\r\nPlaca de vídeo: NVIDIA GeForce GTX 1050 Ti or AMD Radeon RX 570\r\nDirectX: Versão 12\r\nRede: Conexão de internet banda larga\r\nArmazenamento: 100 GB de espaço disponível', 'RECOMENDADOS:\r\nRequer um processador e sistema operacional de 64 bits\r\nSO: Windows 10 64-bit\r\nProcessador: Intel Core i7 6700 or AMD Ryzen 7 2700X\r\nMemória: 12 GB de RAM\r\nPlaca de vídeo: NVIDIA GeForce GTX 1660 or AMD Radeon RX 5600 XT\r\nDirectX: Versão 12\r\nRede: Conexão de internet banda larga\r\nArmazenamento: 100 GB de espaço disponível', 'FIFA 23', 'imgbanner/FIFA23.jpg', 'FIFA23.jpg', 'imgjogos/Fifa23Screen1.jpg', 'Fifa23Screen1.jpg', 'imgjogos/Fifa23Screen2.jpg', 'Fifa23Screen2.jpg', 'imgjogos/Fifa23Screen3.jpg', 'Fifa23Screen3.jpg', 'imgjogos/Fifa23Screen4.jpg', 'Fifa23Screen4.jpg', 'imgjogos/Fifa23Screen5.jpg', 'Fifa23Screen5.jpg', 'https://store.steampowered.com/app/1811260/EA_SPORTS_FIFA_23/', 'https://store.epicgames.com/pt-BR/p/fifa-23', '', 'https://www.nintendo.com/pt-br/store/products/ea-sports-fifa-23-nintendo-switch-legacy-edition-switch/', 'https://www.xbox.com/pt-BR/play/games/ea-sports-fifa-23-edição-standard-para-xbox-series/9N4K3F9558RP', '', 'https://www.youtube.com/watch?v=o3V-GvvzjE4'),
(3, 'Sua Aventura Definitiva de Horizon o aguarda! Explore as paisagens do mundo aberto vibrante e em constante evolução do México, com uma ação de direção divertida e ilimitada em centenas dos melhores carros do mundo.\r\n\r\nSua aventura no horizonte\r\nLidere expedições de tirar o fôlego pelas vibrantes e em constante evolução das paisagens mundiais abertas do México, com ação de direção divertida e ilimitada em centenas dos melhores carros do mundo.\r\n\r\nMundo social aberto\r\nJunte-se a outros jogadores e entre no Horizon Arcade para uma série contínua de desafios divertidos e exagerados que mantêm você e seus amigos em ação e se divertindo sem menus, telas de carregamento ou lobbies.', 'Xbox Game Studios', 'R$:250.00', 'Livre', '2021-11-09', 'Corrida.', 'PC, Xbox Series, Xbox One.', 'MÍNIMOS:\r\nRequer um processador e sistema operacional de 64 bits\r\nSO: Windows 10 version 18362.0 or higher\r\nProcessador: Intel i5-4460 or AMD Ryzen 3 1200\r\nMemória: 8 GB de RAM\r\nPlaca de vídeo: NVidia GTX 970 OR AMD RX 470\r\nDirectX: Versão 12\r\nRede: Conexão de internet banda larga\r\nArmazenamento: 110 GB de espaço disponível', 'RECOMENDADOS:\r\nRequer um processador e sistema operacional de 64 bits\r\nSO: Windows 10 version 18362.0 or higher\r\nProcessador: Intel i5-8400 or AMD Ryzen 5 1500X\r\nMemória: 16 GB de RAM\r\nPlaca de vídeo: NVidia GTX 1070 OR AMD RX 590\r\nDirectX: Versão 12\r\nRede: Conexão de internet banda larga\r\nArmazenamento: 110 GB de espaço disponível', 'Forza Horizon 5', 'imgbanner/forza_5.jpg', 'forza_5.jpg', 'imgjogos/forza5Screen1.jpg', 'forza5Screen1.jpg', 'imgjogos/Forza5Screen2.jpg', 'Forza5Screen2.jpg', 'imgjogos/Forza5Screen3.jpg', 'Forza5Screen3.jpg', 'imgjogos/Forza5Screen4.jpg', 'Forza5Screen4.jpg', 'imgjogos/Forza5Screen5.png', 'Forza5Screen5.png', 'https://store.steampowered.com/app/1551360/Forza_Horizon_5/', '', '', '', 'https://www.xbox.com/pt-br/games/forza-horizon-5', '', 'https://www.youtube.com/watch?v=Rv7xLt5yNsM'),
(4, 'ENCARE A JORNADA PELA SOBREVIVÊNCIA DE JOEL E ELLIE NA SÉRIE THE LAST OF US\r\nVencedora de mais de 500 prêmios Jogo do Ano, a série The Last of Us é aclamada pela crítica por sua narrativa emocionante, personagens inesquecíveis e jogabilidade de ação/aventura cheia de suspense.\r\n\r\nDécadas após a pandemia do vírus cordíceps ter arrasado os Estados Unidos, facções implacáveis e infectados são uma ameaça constante aos sobreviventes. O rude contrabandista Joel foi encarregado de escoltar a adolescente Ellie para a segurança. Embora Joel esteja traumatizado pelo passado, a viagem brutal pelo país lhe dá \"algo pelo que lutar\".\r\n\r\nCinco anos depois, Joel e Ellie se estabelecem em Jackson, Wyoming. Quando um terrível incidente abala a comunidade, Ellie embarca numa jornada incansável em busca de justiça e superação. Os perigos com que ela se depara não são seu único obstáculo; ela também precisa lidar com as repercussões das próprias ações.', ' PlayStation PC LLC', 'R$:250.00', '+18', '2023-03-28', 'Acao, Aventura, Terror.', 'PC, PS5.', 'MÍNIMOS:\r\nRequer um processador e sistema operacional de 64 bits\r\nSO: Windows 10 (Version 1909 or Newer)\r\nProcessador: AMD Ryzen 5 1500X, Intel Core i7-4770K\r\nMemória: 16 GB de RAM\r\nPlaca de vídeo: AMD Radeon RX 470 (4 GB), AMD Radeon RX 6500 XT (4 GB), NVIDIA GeForce GTX 970 (4 GB), NVIDIA GeForce GTX 1050 Ti (4 GB)\r\nArmazenamento: 100 GB de espaço disponível\r\nOutras observações: SSD Recommended', 'RECOMENDADOS:\r\nRequer um processador e sistema operacional de 64 bits\r\nSO: Windows 10 (Version 1909 or Newer)\r\nProcessador: AMD Ryzen 5 3600X, Intel Core i7-8700\r\nMemória: 16 GB de RAM\r\nPlaca de vídeo: AMD Radeon RX 5700 XT (8 GB), AMD Radeon RX 6600 XT (8 GB), NVIDIA GeForce RTX 2070 SUPER (8 GB), NVIDIA GeForce RTX 3060 (8 GB)\r\nArmazenamento: 100 GB de espaço disponível\r\nOutras observações: SSD Recommended', 'The Last of US Part I', 'imgbanner/TLOU_PARTI.jpg', 'TLOU_PARTI.jpg', 'imgjogos/TheLastOfUsScreen1.jpg', 'TheLastOfUsScreen1.jpg', 'imgjogos/TheLastOfUsScreen2.jpg', 'TheLastOfUsScreen2.jpg', 'imgjogos/TheLastOfUsScreen3.jpg', 'TheLastOfUsScreen3.jpg', 'imgjogos/TheLastOfUsScreen4.jpg', 'TheLastOfUsScreen4.jpg', 'imgjogos/TheLastOfUsScreen5.jpg', 'TheLastOfUsScreen5.jpg', 'https://store.steampowered.com/app/1888930/The_Last_of_Us_Part_I/', 'https://store.epicgames.com/pt-BR/p/the-last-of-us-part-1', 'https://www.playstation.com/pt-br/games/the-last-of-us-part-i/', '', '', '', 'https://www.youtube.com/watch?v=CxVyuE2Nn_w'),
(5, 'Mortal Kombat está de volta, melhor do que nunca, em uma evolução da icônica franquia.\r\n\r\nA Edição Standard de Mortal Kombat 11 inclui:\r\n• Jogo Principal\r\n\r\nTodas as variações de customização de personagens lhe dão liberdade total para personalizar os lutadores e torná-los únicos. Sinta-se mais perto da luta com os crânios rachados e olhos saltados dos novos gráficos. Com lutadores klássicos, novos e antigos, a incrível cinemática do modo história de Mortal Kombat continua a contar a saga épica de 25 anos atrás.', 'NetherRealm Studios', 'R$:200.00', '+18', '2019-04-23', 'Luta, Acao.', 'PC, Xbox Series, Xbox One, PS5, PS4.', 'MÍNIMOS:\r\nSO: 64-bit Windows 7 / Windows 10\r\nProcessador: Intel Core i5-750, 2.66 GHz / AMD Phenom II X4 965, 3.4 GHz or AMD Ryzen™ 3 1200, 3.1 GHz\r\nMemória: 8 GB de RAM\r\nPlaca de vídeo: NVIDIA® GeForce™ GTX 670 or NVIDIA® GeForce™ GTX 1050 / AMD® Radeon™ HD 7950 or AMD® Radeon™ R9 270\r\nDirectX: Versão 11\r\nRede: Conexão de internet banda larga', 'RECOMENDADOS:\r\nSO: 64-bit Windows 7 / Windows 10\r\nProcessador: Intel Core i5-2300, 2.8 GHz / AMD FX-6300, 3.5GHz or AMD Ryzen™ 5 1400, 3.2 GHz\r\nMemória: 8 GB de RAM\r\nPlaca de vídeo: NVIDIA® GeForce™ GTX 780 or NVIDIA® GeForce™ GTX 1060-6GB / AMD® Radeon™ R9 290 or RX 570\r\nDirectX: Versão 11\r\nRede: Conexão de internet banda larga', 'Mortal kombat 11', 'imgbanner/wallpapersden.com_mortal-kombat-11-aftermath_1920x1080.jpg', 'wallpapersden.com_mortal-kombat-11-aftermath_1920x1080.jpg', 'imgjogos/wallpapersden.com_mortal-kombat-11-poster_3850x2166.jpg', 'wallpapersden.com_mortal-kombat-11-poster_3850x2166.jpg', 'imgjogos/thumb-1920-698578.jpg', 'thumb-1920-698578.jpg', 'imgjogos/R.jpg', 'R.jpg', 'imgjogos/wallpapersden.com_mortal-kombat-11-poster_3850x2166.jpg', 'wallpapersden.com_mortal-kombat-11-poster_3850x2166.jpg', 'imgjogos/thumb-1920-698578.jpg', 'thumb-1920-698578.jpg', 'https://store.steampowered.com/app/976310/Mortal_Kombat11/', '', 'https://store.playstation.com/pt-br/product/UP1018-PPSA01618_00-00MORTALKOMBAT11', '', 'https://www.xbox.com/pt-BR/games/store/mortal-kombat-11-ultimate/9PG26DBX43L1', '', 'https://www.youtube.com/watch?v=H3lfTa3JCek'),
(6, 'Reserve qualquer edição e receba:\r\n\r\n- Disponível no Call of Duty®: Modern Warfare® III, Call of Duty®: Modern Warfare® II e Call of Duty®: Warzone™:\r\n-- Pacote de Operador Soap*\r\n-- Skin de Operador Ghost Zumbi*\r\n\r\nADAPTE-SE OU MORRA NA LUTA CONTRA A AMEAÇA DEFINITIVA\r\n\r\nNa sequência direta do recordista Call of Duty®: Modern Warfare® II, Capitão Price e a Força-tarefa 141 enfrentam a ameaça definitiva. O criminoso de guerra e ultranacionalista, Vladimir Makarov, está expandindo seu alcance pelo mundo, fazendo a Força-tarefa 141 lutar como nunca lutou antes.\r\n\r\nÉ HORA DE RESOLVER VELHAS BRIGAS E COMEÇAR OUTRAS\r\n\r\nO Modern Warfare® III celebra o 20º aniversário do Call of Duty® com uma das maiores coleções de mapas Multijogador já montadas, com novidades e favoritos dos fãs. Todos os 16 mapas de lançamento do Modern Warfare® 2 original (2009) foram modernizados com novos modos e recursos de jogabilidade, eles estarão disponíveis no lançamento para começar, enquanto mais de 12 mapas principais 6v6 inéditos impulsionam as temporadas pós-lançamento.\r\n\r\nUM NOVO MUNDO ABERTO COM ZUMBIS\r\n\r\nPela primeira vez, forme equipes com outros esquadrões para sobreviver e enfrentar imensas horas de mortos-vivos no maior mapa de Zumbis já visto no Call of Duty®. O Modern Warfare® Zumbis (MWZ) conta uma nova história de Zumbis da Treyarch com missões, recursos básicos de Zumbis e segredos a serem descobertos.', 'Activision', 'R$:300.00', '+18', '2023-11-10', 'Acao.', 'PC, Xbox Series, Xbox One.', 'Requer um processador e sistema operacional de 64 bits\r\nSO: Windows® 10 64 Bit (atualização mais recente)\r\nProcessador: Intel® Core™ i5-6600 ou AMD Ryzen™ 5 1400\r\nMemória: 8 GB de RAM\r\nPlaca de vídeo: NVIDIA® GeForce® GTX 960 / GTX 1650 ou AMD Radeon™ RX 470\r\nDirectX: Versão 12\r\nRede: Conexão de internet banda larga\r\nOutras observações: SSD with 149 GB available space at launch (78 GB if COD HQ and Warzone™ are already installed)', 'Requer um processador e sistema operacional de 64 bits\r\nSO: Windows® 10 64 Bit (atualização mais recente) ou Windows® 11 64 Bit (atualização mais recente)\r\nProcessador: Intel® Core™ i7-6700K ou AMD Ryzen™ 5 1600X\r\nMemória: 16 GB de RAM\r\nPlaca de vídeo: NVIDIA® GeForce® GTX 1080Ti / RTX 3060 ou AMD Radeon™ RX 6600XT\r\nDirectX: Versão 12\r\nOutras observações: SSD with 149 GB available space at launch (78 GB if COD HQ and Warzone™ are already installed)', 'Call of Duty:Modern Warfare III', 'imgbanner/call-of-duty-modern-warfare-3-4k-do.jpg', 'call-of-duty-modern-warfare-3-4k-do.jpg', 'imgjogos/call-of-duty-modern-warfare-3-26830-1920x1080.jpg', 'call-of-duty-modern-warfare-3-26830-1920x1080.jpg', 'imgjogos/OIP.jpg', 'OIP.jpg', 'imgjogos/OIP (2).jpg', 'OIP (2).jpg', 'imgjogos/OIP (1).jpg', 'OIP (1).jpg', 'imgjogos/call-of-duty-modern-warfare-3-4k-do.jpg', 'call-of-duty-modern-warfare-3-4k-do.jpg', 'https://store.steampowered.com/app/2519060/Call_of_Duty_Modern_Warfare_III/', '', 'https://store.playstation.com/pt-br/product/UP0002-PPSA01649_00-CODMW3CROSSGEN01', '', 'https://www.xbox.com/pt-BR/games/call-of-duty-modern-warfare-iii', '', 'https://www.youtube.com/watch?v=GVfKgTaXn2w'),
(8, 'Junte-se à luta por Santuário no Diablo IV, a aventura suprema de RPG de ação. Vivencie a campanha e os novos conteúdos de temporada.', ' Blizzard Entertainment', 'R$:300.00', '+18', '2023-10-17', 'Acao, RPG.', 'Xbox Series, Xbox One, PS5, PS4.', 'MÍNIMOS:\r\nRequer um processador e sistema operacional de 64 bits\r\nSO: Windows® 10 de 64 bits versão 1909 ou mais recente\r\nProcessador: Intel® Core™ i5-2500K ou AMD™ FX-8350\r\nPlaca de vídeo: NVIDIA® GeForce® GTX 660 ou Intel® Arc™ A380 ou AMD Radeon™ R9 280\r\nDirectX: Versão 12\r\nRede: Conexão de internet banda larga\r\nArmazenamento: 90 GB de espaço disponível\r\nOutras observações: *Resolução nativa de 1080 pixels/resolução de renderização de 720 pixels, configurações gráficas baixas, 30 FPS, requer SSD', 'Requer um processador e sistema operacional de 64 bits\r\nSO: Windows® 10 de 64 bits versão 1909 ou mais recente\r\nProcessador: Intel® Core™ i5-4670K ou AMD Ryzen™ 1300X\r\nPlaca de vídeo: NVIDIA® GeForce® GTX 970 ou Intel® Arc™ A750 ou AMD Radeon™ RX 470\r\nDirectX: Versão 12\r\nRede: Conexão de internet banda larga\r\nArmazenamento: 90 GB de espaço disponível\r\nOutras observações: *Resolução de 1080 pixels, configurações gráficas médias, 60 FPS, requer SSD', 'Diablo IV', 'imgbanner/5969.png', '5969.png', 'imgjogos/eSsGagukUSz9mgCKX75K6f-1200-80.jpg', 'eSsGagukUSz9mgCKX75K6f-1200-80.jpg', 'imgjogos/fantasy-dark-wallpaper-preview.jpg', 'fantasy-dark-wallpaper-preview.jpg', 'imgjogos/OIP (7).jpg', 'OIP (7).jpg', 'imgjogos/OIP (6).jpg', 'OIP (6).jpg', 'imgjogos/5969.png', '5969.png', 'https://store.steampowered.com/app/2344520/Diablo_IV/', '', 'https://store.playstation.com/pt-br/product/UP0002-PPSA02442_00-DIVGAMESTANDARD1', '', 'https://www.xbox.com/pt-br/games/store/diablo-iv/9nqrcd3w41l3', '', 'https://www.youtube.com/watch?v=jFtk_7tvAVc'),
(10, 'Hogwarts Legacy é um RPG de ação imersivo e de mundo aberto ambientado no mundo introduzido pela primeira vez nos livros do Harry Potter. Embarque em uma jornada por locais novos e familiares enquanto explora e descubra animais fantásticos, personalize seu personagem e crie poções, domine o lançamento de feitiços, aprimore talentos e torne-se o bruxo que deseja ser.\r\nExperimente Hogwarts da década de 1800. Seu personagem é um estudante com chave de um antigo segredo que ameaça destruir o mundo bruxo. Faça aliados, lute contra os bruxos das trevas e decida o destino do mundo bruxo. Seu legado é o que você faz dele. Viva o Inesperado.', 'Warner Bros. Games', 'R$:200.00', '+12', '2023-02-10', 'Acao, Aventura, RPG.', 'PC, Xbox Series, Xbox One, PS5, PS4.', 'Requer um processador e sistema operacional de 64 bits\r\nSO: 64-bit Windows 10\r\nProcessador: Intel Core i5-6600 (3.3Ghz) or AMD Ryzen 5 1400 (3.2Ghz)\r\nMemória: 16 GB de RAM\r\nPlaca de vídeo: NVIDIA GeForce GTX 960 4GB or AMD Radeon RX 470 4GB\r\nDirectX: Versão 12\r\nArmazenamento: 85 GB de espaço disponível\r\nOutras observações: SSD (Preferred), HDD (Supported), 720p/30 fps, Low Quality Settings', 'Requer um processador e sistema operacional de 64 bits\r\nSO: 64-bit Windows 10\r\nProcessador: Intel Core i7-8700 (3.2Ghz) or AMD Ryzen 5 3600 (3.6 Ghz)\r\nMemória: 16 GB de RAM\r\nPlaca de vídeo: NVIDIA GeForce 1080 Ti or AMD Radeon RX 5700 XT or INTEL Arc A770\r\nDirectX: Versão 12\r\nArmazenamento: 85 GB de espaço disponível\r\nOutras observações: SSD, 1080p/60 fps, High Quality Settings', 'Hogwarts Legacy', 'imgbanner/hogwarts-legacy.jpg', 'hogwarts-legacy.jpg', 'imgjogos/hogwarts-legacy-screenshot-2.jpg', 'hogwarts-legacy-screenshot-2.jpg', 'imgjogos/OIP (8).jpg', 'OIP (8).jpg', 'imgjogos/R (2).jpg', 'R (2).jpg', 'imgjogos/wallpapersden.com_-hogwarts-legacy_3840x2160.jpg', 'wallpapersden.com_-hogwarts-legacy_3840x2160.jpg', 'imgjogos/hogwarts-legacy-screenshot-2.jpg', 'hogwarts-legacy-screenshot-2.jpg', 'https://store.steampowered.com/app/990080/Hogwarts_Legacy/', 'https://store.epicgames.com/pt-BR/p/hogwarts-legacy', 'https://store.playstation.com/pt-br/product/UP1018-CUSA12824_00-HOGWARTSLEGACY01', '', 'https://www.xbox.com/pt-BR/games/hogwarts-legacy', '', 'https://www.youtube.com/watch?v=78CP8na1Fpo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `hash` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `usuario_nome` varchar(32) NOT NULL,
  `data_nasc` date NOT NULL,
  `adm` int(11) DEFAULT 0,
  `path_usuario` varchar(255) NOT NULL,
  `img_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `hash`, `email`, `senha`, `usuario_nome`, `data_nasc`, `adm`, `path_usuario`, `img_usuario`) VALUES
(1, '75dNnBTmjiqQjd0Tx3jtF0Ecnk5ext7J', 'teste@teste.com', '123456789', 'testesilva', '2023-11-01', 0, '', ''),
(2, '02jBgrnHcugoVgge8VgqIjs2bKWOgtYx', 'teste2@teste2.com', '1234567890', 'testesilvinha', '2023-11-02', 0, '', ''),
(3, 'XmUsPTq19syCsIH13BhOYQidB9Vsbfue', 'sssa@gmail.com', '$2y$10$n9rsNG6iqLyI8PwtXCuByOGsWfnbcOGelpoT2Qat4ugG44gvtaJc2', 'joao12345', '2023-11-01', 0, '', ''),
(4, 'geIX9GeebU2VRKveeIokeGQMWgVuimyB', 'teste@teste.com', '123456789', 'teste11111', '2023-11-02', 0, '', ''),
(5, 'mfmD96IdsNAA59tOBZ5O0oMws9nccv11', 'www@www.com', '0987654321', 'wwwwwwwwwwwwwwww', '2023-11-01', 0, '', ''),
(6, 'bXzK39inLcKMlE0vwNMOKfCaaPGxyW6D', 'teste@gmail.com', '$2y$10$R/VzzQys.aES8TYixnBlfO3n1SZpc6AROFoR9rhjbo1mwNYbf0Lom', 'aaa', '2023-11-08', 1, 'profileimg/blob', 'blob'),
(7, 'Ku65DnAuSuRAeHxrIHeTTR0vBxYRBrF1', 'jajao@gmail.com', '$2y$10$v6FUHtwoIWf56diPIxi0cOKuXG2cQYrTQ.IHXC9WhihNhrl/r6DWG', 'vava2211', '2023-12-01', 0, 'profileimg/Gepard.PNG', 'Gepard.PNG'),
(10, '8SvnESeIP9pE3rKp1OsBwfOBfRXh3vSI', 'maisumteste@gmail.com', '$2y$10$FI1IeojfJjrzhtXF8upxD.1EyPpy2OiaVge2JwYPx7HPNCaST9cVe', 'opawdawa', '2023-11-30', 0, 'profileimg/2-berserk-guts.jpg', '2-berserk-guts.jpg'),
(11, 'wCrIJbaavM46ij9SzR7XQ4mYfSCc0FTu', 'nanana@gmail.com', '$2y$10$EUUc3bxdafdKVks8AztMvOzfCbJm6MjCGxHLv1DkqF4bqn7WpYXIe', 'nanada21314', '2023-12-01', 0, 'profileimg/blob', 'blob'),
(12, 'E6TAsMycJYUwIcVY0uV8bgKTiAjCUt01', 'gianribeiro555@gmail.com', '$2y$10$KRMRA01O0XnV0g6Khd9qcutWapjqPpmrixBiDDEeasmzGn9TApkGi', 'TiohSans', '2004-07-19', 0, 'profileimg/blob', 'blob'),
(13, 'WenuJV26o8u7UWfKOrTvB71xIMJbhH88', 'kakaka@gmail.com', '$2y$10$kgwKpq7YYzBj7H83ZPXQbOMPcsDKnBgzSKVPwCKAyL7.IIGFVYeVS', 'testeteste1', '2023-12-01', 0, 'profileimg/blob', 'blob'),
(14, 'sw9s1BFMGo0Ep9jZBTeId6w8KVPpu19E', 'teste1@gmail.com', '$2y$10$qw8OfGgfxTPf6bJzczlIj.HpEY68/B4ur83dnikQbl2RqFWXWqCaK', 'testes', '2000-07-20', 0, '../img/profile_default.jpg', 'profile_default.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarioavaliacaohardware`
--
ALTER TABLE `comentarioavaliacaohardware`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hardware` (`id_hardware`),
  ADD KEY `comentarioavaliacaohardware_ibfk_1` (`id_usuario`);

--
-- Índices para tabela `comentarioavaliacaojogo`
--
ALTER TABLE `comentarioavaliacaojogo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_jogo` (`id_jogo`);

--
-- Índices para tabela `hardwares`
--
ALTER TABLE `hardwares`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarioavaliacaohardware`
--
ALTER TABLE `comentarioavaliacaohardware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `comentarioavaliacaojogo`
--
ALTER TABLE `comentarioavaliacaojogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `hardwares`
--
ALTER TABLE `hardwares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentarioavaliacaohardware`
--
ALTER TABLE `comentarioavaliacaohardware`
  ADD CONSTRAINT `comentarioavaliacaohardware_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarioavaliacaohardware_ibfk_2` FOREIGN KEY (`id_hardware`) REFERENCES `hardwares` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `comentarioavaliacaojogo`
--
ALTER TABLE `comentarioavaliacaojogo`
  ADD CONSTRAINT `comentarioavaliacaojogo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarioavaliacaojogo_ibfk_2` FOREIGN KEY (`id_jogo`) REFERENCES `jogos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
