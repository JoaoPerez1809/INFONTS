<?php
session_start();
include('conexao.php');

if (isset($_SESSION['usuario'])) {
    $userId = $_SESSION['usuario']['id'];
    $userEmail = $_SESSION['usuario']['email'];
    $navLink = "<li><a class='nav_jogos' href='jogos.php'>Jogos</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='hardware.php'>Hardwares</a></li>";
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
    $navLink = "<li><a class='nav_jogos' href='jogos.php'>Jogos</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='hardware.php'>Hardwares</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='suporte.php'>Suporte</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='login.php'>Entrar</a></li>";
}
?>


<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>
        <link rel="stylesheet" href="../css/style.css">
        <title>MenuTeste</title>
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
    <h2 class="title" data-text="BEM-VINDO">BEM-VINDO</h2>
      <div class="container">
      <a href="jogos.php"><div class="card-1">
            <h2></h2>
            <span class="descricao">JOGOS PARA SUA DIVERSÃO</span>
        <div class="card-titlle">
            <a class="card-titlle-1" href="jogos.php"><label>JOGOS</label></a></a>
        </div>
        </div>
        <a href="hardware.php"><div class="card-2">
        <h2></h2>
        <span class="descricao">HARDWARES PARA SEU PC</span>
        <div class="card-titlle">
            <a class="card-titlle-2" href="hardware.php"><label>HARDWARES</label></a></a>
        </div>
        </div>
        <a href="suporte.php"><div class="card-3">
        <h2></h2>
        <span class="descricao">AJUDA PARA SUAS DÚVIDAS</span>
        <div class="card-titlle">
            <a class="card-titlle-3" href="suporte.php"><label>SUPORTE</label></a></a>
        </div>
        </div>
      </div>

      <div class="developer-container">
      <label class="adms">ADMINS</label>
      <div class="developer-card">
      <div class="profile-picture">
        <div class="rotate-border"></div>
        <img src="../img/sans.jpg" alt="Developer 1">
      </div>
      <h3>TiohSans</h3>
      <p>Desenvolvedor Front-End</p>
    </div>
  
    <div class="developer-card">
      <div class="profile-picture">
        <div class="rotate-border"></div>
        <img src="../img/saitama.jpg" alt="Developer 2">
      </div>
      <h3>João Vitor Perez</h3>
      <p>Desenvolvedor Back-End</p>
    </div>
  
    <div class="developer-card">
      <div class="profile-picture">
        <div class="rotate-border"></div>
        <img src="../img/joseph.jpg" alt="Developer 3">
      </div>
      <h3>Luiz Gabriel</h3>
      <p>Desenvolvedor Back-End</p>
    </div>
    </div>

      <script src="../js/dark-white.js"></script>
      <script src="../js/side-bar.js"></script>
      <script src="../js/dropdown.js"></script>

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
