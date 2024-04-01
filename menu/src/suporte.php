<?php
session_start();
include('conexao.php');

if (isset($_SESSION['usuario'])) {
    $userId = $_SESSION['usuario']['id'];
    $userEmail = $_SESSION['usuario']['email'];
    $navLink = "<li><a class='nav_jogos' href='index.php'>Inicio</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='jogos.php'>Jogos</a></li>";
    $navLink .= "<li><a class='nav_jogos' href='hardware.php'>Hardwares</a></li>";
    
 

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
        <link rel="stylesheet" href="../css/stylesup.css">
        <title>Suporte</title>
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

            <div class="container">
                <div class="suport">
                    <br>
                    <label class="help">Email</label>
                    <br>
                    <i id="email" class="fa-solid fa-envelope"></i>
                    <br>
                    <label class="information">ENVIE UM EMAIL PARA NOSSA EQUIPE</label>
                </div>
                <div class="suport">
                    <br>
                <label class="help">Contatos</label>
                <br>
                <a href="https://discord.com/"><i id="contact1" class="fa-brands fa-discord"></i></a>
                <a href="#"></a><i id="contact2" class="fa-brands fa-whatsapp"></i>
                <br>
                <label class="information">ENTRE EM CONTATO CONOSCO</label>
                </div>
                <div class="suport">
                    <br>
                <label class="help">Perguntas Frequentes</label>
                <br>
                <i id="question" onclick="toggleModal()" class="fa-regular fa-circle-question"></i>
                <br>
                <label class="information">ESCLAREÇA SUAS DUVIDAS</label>
                </div>
            </div>

            <div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModalBtn" onclick="toggleModal()">&times;</span>
        <h2>Perguntas Frequentes</h2>

        <div class="faq-item">
            <h3>1. O que INfonts?</h3>
            <p>
                Somos uma empresa que busca facilitar a vida do usuário quando está buscando
                informações sobre jogos e hardwares que existem na atualidade.
            </p>
        </div>

        <div class="faq-item">
            <h3>2.O é o site ?</h3>
            <p>
                A INfonts, é um website informativo que contém informações diversas de jogos e hardwares para o usuário
                que busca praticidade na hora buscar informações relavantes sobre o item de compra ou conhecimento.
            </p>
        </div>
        
        <div class="faq-item">
            <h3>3.O site é atualizado regularmente?</h3>
            <p>
                Sim, atualizamos o site toda a semana para que tudo esteja esteja em dia com as informações da atualidade.
            </p>
        </div>

        <div class="faq-item">
            <h3>4.Como faço login?</h3>
            <p>
                Se você tiver um cadastro no site, basta clicar no botão "Entrar" na barra de navegação e colocar seu dados de login.
                Porém, se você não tiver uma conta, basta clicar em "Cadastre-se" que você será redirecionado para a página de cadastro.
            </p>
        </div>

        <div class="faq-item">
            <h3>5.Como faço para dar meu FEEDBACK sobre o jogo?</h3>
            <p>
                Para dar seu feedback sobre o jogo ou hardware escolhido, você precisará estar logado na sua conta.
            </p>
        </div>

        <div class="faq-item">
            <h3>6.Como faço para entrar em contato com o suporte?</h3>
            <p>
                O usuário poderá entrar em contato conosco através do nosso Discord ou WhatsApp, lá ele poderá
                tirar todas suas dúvidas ou relatar algum erro que possa ter encontrado. Senão, ele pode entrar em contato
                através do nosso email: infonts_company@gmail.com
            </p>
        </div>

        <div class="faq-item">
            <h3>7.O site é acessível em Celures ou Tablets?</h3>
            <p>
                Sim, ele é totalmente acessível para quem usa ele no seu smartphone ou tablet.
            </p>
        </div>

    </div>
</div>

<script src="../js/side-bar.js"></script>
<script src="../js/dropdown.js"></script>
<script>
    function toggleModal() {
        var modal = document.getElementById("modal");
        if (modal) {
            modal.classList.toggle("show");
        } else {
            console.error("Elemento modal não encontrado.");
        }
    }
</script>
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