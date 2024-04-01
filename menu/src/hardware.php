<?php
    session_start();
    include('conexao.php');

    if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
    }
    if (isset($_SESSION['usuario'])) {

        $userId = $_SESSION['usuario']['id'];
        $userEmail = $_SESSION['usuario']['email'];
        $navLink = "<li><a class='nav_jogos' href='index.php'>Inicio</a></li>";
        $navLink .= "<li><a class='nav_jogos' href='jogos.php'>Jogos</a></li>";
        $navLink .= "<li><a class='nav_jogos' href='suporte.php'>Suporte</a></li>";
     
    
        $query = "SELECT * FROM usuarios WHERE id = $userId";
        $result = $mysqli->query($query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $usuario_nome = $row['usuario_nome'];
            $path_usuario = $row['path_usuario'];
            $img_usuario = $row['img_usuario'];
        }
    } else {

        $navLink = "<li><a class='nav_jogos' href='index.php'>Inicio</a></li>";
        $navLink .= "<li><a class='nav_jogos' href='jogos.php'>Jogos</a></li>";
        $navLink .= "<li><a class='nav_jogos' href='suporte.php'>Suporte</a></li>";
        $navLink .= "<li><a class='nav_jogos' href='login.php'>Entrar</a></li>";
    }


	// View
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql_arquivos = $mysqli->query("SELECT * FROM hardwares WHERE nome_hard LIKE '%$search%' ORDER BY nome_hard");
            $sql_count = $mysqli->query("SELECT COUNT(*) FROM hardwares WHERE nome_hard LIKE '%$search%' ");
            
        } else {
            // Consulta padrão sem pesquisa
            $sql_arquivos = $mysqli->query("SELECT * FROM hardwares ORDER BY nome_hard");
            $sql_count = $mysqli->query("SELECT COUNT(*) FROM hardwares ");
        }
	
	
	
  
   
   ?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>
        <link rel="stylesheet" href="../css/stylehardware.css">
        <title>Hardwares</title>
    </head>
    <body>
    <nav>
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
        <div class="side-bar">
            <div class="close-btn">
                <label class="logo">IN</label><span>FONTS</span>
                <i class="fas fa-times"></i>
            </div>
            <div class="menu">
                <div class="item"><a href="index.php"><i class="fas fa-house"></i>Inicio</a></div>
                <div class="item"><a href="jogos.php"><i class="fas fa-gamepad"></i>Jogos</a></div>
                <div class="item"><a href="hardware.php"><i class="fas fa-microchip"></i>Hardwares</a></div>
                <div class="item"><a href="suporte.php"><i class="fas fa-headset"></i>Suporte</a></div>
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo '<div class="item"><a href="perfil.php"><i class="fas fa-user"></i> Perfil</a></div>';
                }
                ?>

            </div>
        </div>
     <ul>
        
        <?php echo $navLink; ?>
        <?php if (isset($_SESSION['usuario'])):  $usuario_nome = $_SESSION['usuario']['usuario_nome'];?>
                <i class="fa-solid fa-circle-user" onclick="toggleMenu()">
                    <div class="nav-sub-menu" id="subMenu">
                        <div class="perfil-sub-menu">
                            <div class="user-info">
                            <?php
                                echo '<h3>' . $row['usuario_nome'] . '</h3>';
                            ?>
                                <img src="<?php echo $path_usuario; ?>" alt="User Image">
                            </div>
                            <hr>

                            <a href="perfil.php" class="sub-perfil">
                                <i class="fa-solid fa-circle-user"></i>
                                <p>Perfil</p>
                            </a>
                            <?php
                            if (isset($_SESSION['usuario']) && $_SESSION['usuario']['adm'] == '1') {
                            echo '
                            <a href="add_hard.php" class="sub-perfil">
                                <i class="fa-solid fa-plus"></i>
                                <p>Adicionar Hardware</p>
                            </a>';
                            }
                            ?>

                            <a href="logout.php" class="sub-perfil">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <p>Sair</p>
                            </a>
                        </div>
                    </div>
                </i>
            </ul>
        <?php endif; ?>
    </nav>
    <div class="menu-categorie">
        <div class="card_options" style="--i:0" id="Processador">
            <div class="content">
            <img src="../img/cpu.jpg">
                <h1>Processadores</h1>
            </div>
        </div>
        <div class="card_options" style="--i:1" id="Placa de Vídeo">
            <div class="content">
            <img src="../img/gpu.jpg">
                <h1>Placa de Vídeo</h1>
            </div>
        </div>
        <div class="card_options" style="--i:2" id="Memória RAM">
            <div class="content">
            <img src="../img/ram.jpg">
                <h1>Memória RAM</h1>
            </div>
        </div>
        <div class="card_options" style="--i:3" id="Placa-Mãe">
            <div class="content">
            <img src="../img/placa_mae.jpg">
                <h1>Placa-Mãe</h1>
            </div>
        </div>
        <div class="card_options" style="--i:4" id="Gabinete">
            <div class="content">
            <img src="../img/gabinete.jpg">
                <h1>Gabinete</h1>
            </div>
        </div>
        <div class="card_options" style="--i:5" id="SSD">
            <div class="content">
            <img src="../img/ssd.jpg">
                <h1>SSD</h1>
            </div>
        </div>
    </div>        
	
	<div class="search-content" style="
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
        ">
            <i class="fa-solid fa-repeat" style="
            font-size: 1em;
            position: relative;
            text-align: center;
            margin: 5px;
            border: none;
            color: antiquewhite;
        "> <br> <a href="hardware.php" class="back-to-all-results" style="
            font-size: 0.6em;
            color: antiquewhite;
            text-decoration: none;
        ">Atualizar</a></i>
    <form method="GET" action="">
        <input class="search" type="text" name="search" placeholder="Pesquisar" id="search" style="
            width: 180px;
            padding: 5px;
            font-size: 1em;
            background: #272626;
            border: 3px solid #3d3c3c;
            color: #ccc;
            outline: none;
            font-style: italic;
            margin: 0px 0px;
            margin-right: 0;
            " value="<?php echo isset($search) ? $search : ''; ?>">
        <div class="search-button" style="
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            float: right;
        ">
        <i class="fas fa-magnifying-glass fa-flip-horizontal" style="
            font-size: 1.8em;
            color: #ccc;
            background: #272626;
            height: 36px;
            width: 60px;
            border-radius: 5px;
        "></i>
        <button type="submit" style="
            position: absolute;
            width: 30px;
            height: 27px;
            opacity: 0; 
            cursor: pointer;
        "></button>
        </div>
    </form>
    
    </div>
    <div class="container">
        <h1>Hardwares</h1>
        
        <h1 class="card-counter" style="margin-left: 55px;">(<?php echo $sql_count->fetch_row()[0]; ?>)</h1>
        <script type="text/javascript" src="../js/counter.js" defer></script>

        <?php


while ($arquivo = $sql_arquivos->fetch_assoc()) {
    echo '<a href="view_hard.php?id=' . $arquivo['id'] . '">';
    echo '<div class="card">';
  
if (isset($arquivo['path']))
    {
        $path = $arquivo['path'];
    }
     else
    {
        $path = "";
    }
    $nome_hard = $arquivo['nome_hard'];

    if (file_exists($path) && is_readable($path)) {
        echo '<img class="card img" height="100"  src="' . $path . '" alt="">';
    } else {
        echo '<p>Imagem não encontrada: ' . $path . '</p>';
    }

    echo '<h2>' . $nome_hard . '</h2>';
    
    echo '</div>';
    echo '</a>';
}
?>

        <script>
$(document).ready(function() {
    $('.card_options').on('click', function() {
        var categoriaId = $(this).attr('id');
        
        $.ajax({
            url: 'obter_hardwares_por_categoria.php',
            method: 'POST',
            data: { categoriaId: categoriaId },
            success: function(response) {
                $('.container').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição:', status, error);
            }
        });
    });
});
        </script>

        
        <script src="../js/side-bar.js"></script>
        <script src="../js/dropdown.js"></script>
        <script>
        let addToggle = document.querySelector('.addToggle');
        addToggle.onclick = function(){
            addToggle.classList.toggle('active')
            add.classList.toggle('active')
        }
    </script>
    </div>

    <footer>
                <label class="title-i-footer">Contatos
                <br>
                <i id="i-footer1" class="fa-brands fa-discord"></i>
                <i id="i-footer2" class="fa-brands fa-whatsapp"></i>
                <i id="i-footer3" class="fa-brands fa-instagram"></i>
                </label>
                
                <label class="title-footer">Ajuda
                <a class="option-footer" href="index.php"><p>Home</p></a>
                <a class="option-footer" href="suporte.php"><p>Suport</p></a>
                <a class="option-footer" href="#"><p>Privacy Policy</p></a>
                <a class="option-footer" href="#"><p>FAQ</p></a>
                </label>

                <label class="title-footer">Novidades
                <a class="option-footer" href="#"><p>Releases</p></a>
                <a class="option-footer" href="#"><p>Hardwares</p></a>
                <a class="option-footer" href="#"><p>Games</p></a>
                <a class="option-footer" href="#"><p>Apps</p></a>
                </label>
                <br>
                <br>
                <p class="copyright">Copyright 2023 © - INfonts Company™</p>
	        </footer>

    </body>
    </html>