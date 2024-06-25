<?php
session_start();
include('conexao.php');

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
        $email = $row['email'];
        $data_nasc = $row['data_nasc'];
    }
} else {
    $navLink = "<li><a class='nav_jogos' href='index.php'>Inicio</a></li>";
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
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="../css/styleperfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
    <?php
    $user_id = isset($_SESSION['usuario']) ? $_SESSION['usuario']['id'] : 0;

    $query = "SELECT usuario_nome, data_nasc, email, path_usuario FROM usuarios WHERE id = $user_id";
    $result = mysqli_query($mysqli, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $row['data_nasc'] = date('d/m/Y', strtotime($row['data_nasc']));

$row['data_nasc'] = date('d/m/Y', strtotime($row['data_nasc']));

$response = json_encode($row);

echo "<script>";
echo "$(document).ready(function () {";
echo "  $('#username').val('" . $row['usuario_nome'] . "');";

echo "  $('#birthdate').val('" . $row['data_nasc'] . "');";

echo "  $('#profile-image').attr('src', '" . $row['path_usuario'] . "');";

echo "  $('#email').val('" . $row['email'] . "');";
echo "});";
echo "</script>";
    
        mysqli_free_result($result);
    } else {
        echo "Erro na consulta: " . mysqli_error($mysqli);
    }
?>
    
<div class="container">
   <form id="uploadForm" method="POST" action="salvar_perfil.php" enctype="multipart/form-data">
    <section id="profile">
        <div id="profile-container">
            <?php
            if (empty($row['path_usuario'])) {
                echo '<img id="profile-image" src="' . $defaultImagePath . '" alt="Imagem de Perfil">';
            } else {
                echo '<img id="profile-image" src="' . $row['path_usuario'] . '" alt="Imagem de Perfil">';
            }
            ?>
            <input type="file" id="newImage" name="newImage" accept="/image*" style="display: none;">
            <input type="hidden" id="currentImage" name="currentImage" value="<?php echo $row['path_usuario']; ?>">
        </div>
            <br>
            <label>Nome do Usuário</label>
            <p><input type="text" id="username" name="newUsername" style="border: none; outline: none;" value="<?php echo isset($_SESSION['usuario']['usuario_nome']) ? htmlspecialchars($_SESSION['usuario']['usuario_nome']) : ''; ?>"></p>
            <label>Data de Nascimento</label>
            <?php $data_formatada = date('d/m/Y', strtotime($data_nasc));
            echo '<p style="font-size: 1.2em;">' . $data_formatada . '</p>' ?>
            <label>Email</label>
            <?php
            echo '<p style="font-size: 1.2em;">' . $row['email'] . '</p>';
            ?>
        </section>
        <div class="container-buttons">
            <button type="submit" id="save-button">Salvar</button>
        </div>
        </form>
</div>

    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span id="close-button" class="close">&times;</span>
            <img id="modal-image" src="" alt="Imagem para Recorte">
            <i class="fa-solid fa-scissors" id="crop-button"></i>
        </div>
    </div>

    <script>
$(document).ready(function () {
    const maxWidth = 1920; // Defina a largura máxima desejada
    const maxHeight = 1080; // Defina a altura máxima desejada

    $("#uploadForm").submit(function (event) {
        event.preventDefault();

        var fileInput = document.getElementById('newImage');
        var file = fileInput.files[0];

                  {
                    submitForm();

                    location.reload();
                };
    });

    function submitForm() {
        var formData = new FormData($("#uploadForm")[0]);

        $.ajax({
            url: $("#uploadForm").attr('action'),
            type: $("#uploadForm").attr('method'),
            data: formData,
            success: function (response) {
                console.log(response);

                window.updateProfileName(response);

            },
            error: function (error) {
                console.error('Erro na solicitação AJAX:', error);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
});

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="../js/perfil.js"></script>
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
