<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['usuario'])) {
    $userId = $_SESSION['usuario']['id'];
    $userEmail = $_SESSION['usuario']['email'];
    $navLink = "<li><a class='nav_jogos' href='index.php'>Inicio</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='jogos.php'>Jogos</a></li>";
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

    // Consulta para obter as chaves de jogos do usuário logado
    $query_chaves = "
        SELECT cj.codigo, j.titulo
        FROM chavesteam cj 
        JOIN jogos j ON cj.id_jogo = j.id 
        WHERE cj.id_usuario = $userId";
    $result_chaves = $mysqli->query($query_chaves);

    if (!$result_chaves) {
        die("Erro ao buscar chaves de jogos: " . $mysqli->error);
    }

} else {
    $navLink = "<li><a class='nav_jogos' href='index.php'>Inicio</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='jogos.php'>Jogos</a></li>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.8.1/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.8.1/slick-theme.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.8.1/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../css/styleview.css">
    <title>Pagina das Chaves Steam</title>
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
                <div class="item"><a href="perfil.php" class="sub-item">Perfil</a></div>
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

<div class="game_container">
    <div class="game_information_geral">
        <div class="game-title">Minhas Chaves Steam</div><br>
        <?php
        if ($result_chaves->num_rows > 0) {
            while ($row = $result_chaves->fetch_assoc()) {
                echo "<div class='game-info'>";
                echo "<p>Jogo: " . $row['titulo'] . "</p>";
                echo "<p>Chave: " . $row['codigo'] . "</p>";
                echo "</div><br>";
            }
        } else {
            echo "<p>Nenhuma chave encontrada.</p>";
        }
        ?>
    </div>
</div>

<script src="../js/comentario.js"></script>
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
    <br><br>
    <p class="copyright">Copyright 2023 © - INfonts Company™</p>
</footer>
</body>
</html>
