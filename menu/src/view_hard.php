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
    $navLink = "<li><a class='nav_jogos' href='index.php'>Inicio</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='jogos.php'>Jogos</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='hardware.php'>Hardwares</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='suporte.php'>Suporte</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='login.php'>Entrar</a></li>";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    
    $query = "SELECT * FROM hardwares WHERE id = $id";
    $result = $mysqli->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $nome_hard = $row['nome_hard']; 
        $info_hard =  $row['info_hard']; 
        $empresa_hard =  $row['empresa_hard']; 
        $preco =  $row['preco'];  
        $datafabricacao_hard =  $row['datafabricacao_hard']; 
        $categoriahw = $row['categoriahw'];
        $pichau_link = $row['pichau_link'];
        $kabum_link = $row['kabum_link'];
        $amazon_link = $row['amazon_link'];
        $terabyte_link = $row['terabyte_link'];
        $aliexpress_link = $row['aliexpress_link'];
        $path = $row['path'];
        $path1 = $row['path1'];
        $path2 = $row['path2'];
        $result->free();
    } else {
        echo "Erro na consulta: " . $mysqli->error;
    }

    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../css/styleviewhw.css">
    <title>Pagina de hardwares</title>
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
        <?php if (isset($_SESSION['usuario'])): ?>
                <i id="perfil-icone" class="fa-solid fa-circle-user" onclick="toggleMenu()">
                    <div class="nav-sub-menu" id="subMenu">
                        <div class="perfil-sub-menu">
                            <div class="user-info">
                                <h3><?php echo $usuario_nome; ?></h3>
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
    
    <div class="hard_container">
    <div class="hard_information_geral">
    <div class="hard-title" ><?php echo $nome_hard; ?></div><br>
    <br>
    <div class="slider-container">
    <div class="carousel" onmouseover="showControls()" onmouseout="hideControls()">
        <div class="carousel-inner">
          
          <div class="carousel-item">
            <img src="<?php echo $path; ?>" alt="Imagem 1">
          </div>
          <div class="carousel-item">
            <img src="<?php echo $path1; ?>" alt="Imagem 2">
          </div>
          <div class="carousel-item">
            <img src="<?php echo $path2; ?>" alt="Imagem 3">
          </div>   
        </div>

        <div id="prev" onclick="prevSlide()"><</div>
        <div id="next" onclick="nextSlide()">></div>
      </div>
  </div>

  <div class="thumbnail-menu">
 
        <img src="<?php echo $path; ?>" onclick="goToSlide(0)" alt="Imagem 1">
        <img src="<?php echo $path1; ?>" onclick="goToSlide(1)" alt="Imagem 2">
        <img src="<?php echo $path2; ?>" onclick="goToSlide(2)" alt="Imagem 3">
        
    </div>

    

<script>
let player;
       let currentIndex = 0;

        function showSlide(index) {
            const carousel = document.querySelector('.carousel-inner');
            const slideWidth = document.querySelector('.carousel-item').offsetWidth;
            const newPosition = -index * slideWidth;
            carousel.style.transform = `translateX(${newPosition}px)`;
            currentIndex = index;

            document.querySelectorAll('.thumbnail-menu img').forEach(img => {
                img.classList.remove('active');
            });

            document.querySelector(`.thumbnail-menu img:nth-child(${currentIndex + 1})`).classList.add('active');

        
        }

        function showControls() {
            document.querySelector('.carousel').classList.add('controls-visible');
        }

        function hideControls() {
            document.querySelector('.carousel').classList.remove('controls-visible');
        }

        function prevSlide() {
            showSlide((currentIndex - 1 + 3) % 3);
        }

        function nextSlide() {
            showSlide((currentIndex + 1) % 3);
        }

        function goToSlide(index) {
            showSlide(index);
        }

        
</script>




<script>
$(document).ready(function(){
    $('.screenshot-carousel').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1
    });
});
</script>

    <br>
    <h2><label for="title">Informações</label></h2>
    <div class="hard-description"><?php echo nl2br($info_hard); ?><br></div>
    <br>
    <br><br>
    
    <?php   
    if (isset($_SESSION['usuario']['id'])) {
        $id_usuario = $_SESSION['usuario']['id'];
    echo '<h2>DEIXE SEU FEEDBACK</h2><br>';
    echo '<form method="POST" action="processa_avaliacaohard.php">';
    echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
            echo '<textarea class="comments" id="comentario" name="mensagem" rows="4" cols="30" placeholder="Digite o seu comentário..."></textarea><br>';
            echo '<div class="estrelas">';
            echo '<input type="radio" name="qtd_estrela" id="vazio" value="" checked>';
            echo '<label for="estrela_um"><i class="opcao fa"></i></label>';
            echo '<input type="radio" name="qtd_estrela" id="estrela_um" id="vazio" value="1">';
            echo '<label for="estrela_dois"><i class="opcao fa"></i></label>';
            echo '<input type="radio" name="qtd_estrela" id="estrela_dois" id="vazio" value="2">';
            echo '<label for="estrela_tres"><i class="opcao fa"></i></label>';
            echo '<input type="radio" name="qtd_estrela" id="estrela_tres" id="vazio" value="3">';
            echo '<label for="estrela_quatro"><i class="opcao fa"></i></label>';
            echo '<input type="radio" name="qtd_estrela" id="estrela_quatro" id="vazio" value="4">';
            echo '<label for="estrela_cinco"><i class="opcao fa"></i></label>';
            echo '<input type="radio" name="qtd_estrela" id="estrela_cinco" id="vazio" value="5">';
    echo '</div>';
    echo '<input class="submit" id="enviarComentario" style="display: none;" type="submit" value="Enviar"><br><br>';
    echo '</form>';
    }
    ob_start();

$id_hardware = $_GET['id'];
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] !== null) {
    if ($_SESSION['usuario']['adm'] == '1') {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['apagar_comentarios'])) {
        if (!empty($_POST['id_comentario'])) {
            foreach ($_POST['id_comentario'] as $id_comentario) {
                $query_apagar_comentario = "DELETE FROM comentarioavaliacaohardware WHERE id = ?";
                $stmt_apagar_comentario = $mysqli->prepare($query_apagar_comentario);

                if ($stmt_apagar_comentario) {
                    $stmt_apagar_comentario->bind_param("i", $id_comentario);
                    $stmt_apagar_comentario->execute();
                    $stmt_apagar_comentario->close();
                } else {
                    echo "Erro na preparação da consulta de apagar comentário: " . $mysqli->error;
                }
            }

            echo '<script>window.location.href = window.location.href;</script>';
            exit();
        } else {
            echo "Nenhum comentário selecionado para exclusão.";
        }
    }
    
    if (isset($_POST['delete_comment'])) {
        $commentIdToDelete = $_POST['delete_comment'];

        $query_apagar_comentario = "DELETE FROM comentarioavaliacaohardware WHERE id = ?";
        $stmt_apagar_comentario = $mysqli->prepare($query_apagar_comentario);

        if ($stmt_apagar_comentario) {
            $stmt_apagar_comentario->bind_param("i", $commentIdToDelete);
            $stmt_apagar_comentario->execute();
            $stmt_apagar_comentario->close();

            echo '<script>window.location.href = window.location.href;</script>';
            exit();
        } else {
            echo "Erro na preparação da consulta de apagar comentário: " . $mysqli->error;
        }
    }
}

}

}

$query_avaliacoes = "SELECT comentarioavaliacaohardware.id, usuarios.usuario_nome, path_usuario, comentarioavaliacaohardware.qtd_estrela, comentarioavaliacaohardware.mensagem 
    FROM comentarioavaliacaohardware
    INNER JOIN usuarios ON comentarioavaliacaohardware.id_usuario = usuarios.id
    WHERE comentarioavaliacaohardware.id_hardware = ?
    ORDER BY comentarioavaliacaohardware.id DESC";

$stmt_avaliacoes = $mysqli->prepare($query_avaliacoes);

if ($stmt_avaliacoes) {
    $stmt_avaliacoes->bind_param("i", $id_hardware);
    $stmt_avaliacoes->execute();
    $result_avaliacoes = $stmt_avaliacoes->get_result();

     echo '<form method="post" action="" id="deleteForm">';

    while ($row_avaliacao = $result_avaliacoes->fetch_assoc()) {
        
        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] !== null) {
        echo '<p><i class="delete-comment fa-solid fa-trash" data-comment-id="' . $row_avaliacao['id'] . '"></i> <br></p>';
        }
        echo '<img class="imgcomment" src="' . $row_avaliacao['path_usuario'] . '" style="width: 60px; height: 60px;
        margin: 0 5px; margin-top: 10px; border-radius: 50%;" />';
        echo '<h3 style="font-size: 1.4em; display:contents">' . $row_avaliacao['usuario_nome'] . '</h3> <br>';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $row_avaliacao['qtd_estrela']) {
                echo '<i class="estrela-preenchida fa-solid fa-star"></i>';
            } else {
                echo '<i class="estrela-vazia fa-solid fa-star"></i>';
            }
        }

        echo "<p><br> " . $row_avaliacao['mensagem'] . "</p><hr><br>";
    }

    echo '<input type="hidden" name="delete_comment" id="delete_comment" value="">';

    echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            // Adiciona um listener de clique para cada ícone de exclusão
            var deleteIcons = document.querySelectorAll(".delete-comment");
            deleteIcons.forEach(function (icon) {
                icon.addEventListener("click", function () {
                    // Obtém o ID do comentário a partir do atributo data-comment-id
                    var commentId = icon.getAttribute("data-comment-id");

                    // Exibe a mensagem de confirmação e verifica a resposta do usuário
                    var confirmDelete = confirm("Você quer mesmo excluir esse comentário?");

                    if (confirmDelete) {
                        // Define o valor do campo de exclusão e envia o formulário
                        document.getElementById("delete_comment").value = commentId;
                        document.getElementById("deleteForm").submit();
                    }
                });
            });
        });
    </script>';

    $stmt_avaliacoes->close();
} else {
    echo "Erro na preparação da consulta de avaliações: " . $mysqli->error;
    echo "Você não tem permissão para acessar esta página.";
}


ob_end_flush();
?>
</div>

<div class="hard-information">
    <br>
    <div class="hard-price">
    <?php echo "<p>$preco</p>" ?><br></div>
    <div class="hard-lanc">  
    <?php $data_formatada = date('d/m/Y', strtotime($datafabricacao_hard));
     echo "<p>Lançamento: $data_formatada</p>" ?><br></div>
    <div class="hard-text">   
    <?php echo "<p>Componente: $categoriahw </p>" ?><br></div>
    <div class="hard-lanc">   
    <?php echo "<p>Empresa Fabricante(s): $empresa_hard</p>" ?><br></div>
    <div class="hard-text">
    <?php
    $id_hardware = $_GET['id'];

    $sql_avg = "SELECT ROUND(AVG(SUBSTRING_INDEX(qtd_estrela, ',', -1)), 1) AS avg_estrelas FROM comentarioavaliacaohardware WHERE id_hardware = $id_hardware";

    $result = $mysqli->query($sql_avg);

    if ($result === false) {
        echo "<p>Erro na consulta: " . $mysqli->error . "</p>";
    } else {
        $row = $result->fetch_assoc();

        if ($row === null) {
            
        } else {
$avgEstrelas = $row['avg_estrelas'];
echo '<div style="display: flex;" class="assessment-container" id="assements">';

for ($i = 1; $i <= 5; $i++) {
    $fillPercentage = ($avgEstrelas >= $i) ? 100 : (($avgEstrelas > ($i - 1)) ? (($avgEstrelas - ($i - 1)) * 100) : 0);

    if ($fillPercentage >= 75) {
        $starIcon = 'fa-solid fa-star';
    } elseif ($fillPercentage >= 25) {
        $starIcon = 'fa-solid fa-star-half-stroke';
    } else {
        $starIcon = 'fa-regular fa-star';
    }

    echo "<i id=\"assessment$i\" class=\"$starIcon\"></i>";
}

echo "<label class=\"assements-result\">$avgEstrelas</label>";
echo '</div>';
        }

        $result->free();
    }
?>     
<br>

    <div class="container-links">
    <div class="hard-link1" <?php echo empty($pichau_link) ? 'style="display: none;"' : '';  ?>>
    <?php echo "<a href=\"$pichau_link\" target=\"_blank\" style=\"color: white; text-decoration: none;\">Pichau</a>" ?><br>
</div>
    <div class="hard-link2" <?php echo empty($kabum_link) ? 'style="display: none;"' : ''; ?>>
        <?php echo "<a href=\"$kabum_link\" target=\"_blank\" style=\"color: white; text-decoration: none;\">Kabum</a>" ?><br>
    </div>
    <br>
    <div class="hard-link3" <?php echo empty($amazon_link) ? 'style="display: none;"' : ''; ?>>
        <?php echo "<a href=\"$amazon_link\" target=\"_blank\" style=\"color: white; text-decoration: none;\">Amazon</a>" ?><br>
    </div>
    <br>
    <div class="hard-link4" <?php echo empty($terabyte_link) ? 'style="display: none;"' : ''; ?>>
        <?php echo "<a href=\"$terabyte_link\" target=\"_blank\" style=\"color: white; text-decoration: none;\">Terabyte</a>" ?><br>
    </div>
    <br>
    <div class="hard-link5" <?php echo empty($aliexpress_link) ? 'style="display: none;"' : ''; ?>>
        <?php echo "<a href=\"$aliexpress_link\" target=\"_blank\" style=\"color: white; text-decoration: none;\">AliExpress</a>" ?><br>
    </div>
    <br>
    </div><br>
    <?php
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['adm'] == '1') {
    echo '
        <a href="edit_hard.php?id=' . $id . '" class="editar-btn">Editar Hardware</a>
        <form id="deleteForm" action="delete_hard.php" method="post">
            <input type="hidden" name="id" value="' . $id . '">
            <button type="button" class="excluir-btn" onclick="confirmarExclusao()">Excluir Hardware</button>
        </form>
    ';
}
    ?>
        
        </div>
    </div>
</div>
<script>
function confirmarExclusao() {
    if (confirm('Tem certeza que deseja excluir este hardware?')) {
        var form = document.getElementById('deleteForm');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_hard.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log(xhr.responseText);

                window.location.href = 'hardware.php';
            }
        };

        xhr.send(formData);
    }
}
</script>
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
                <a class="option-footer" href="#"><p>hards</p></a>
                <a class="option-footer" href="#"><p>Apps</p></a>
                </label>
                <br>
                <br>
                <p class="copyright">Copyright 2023 © - INfonts Company™</p>
	        </footer>


</body>
</html>