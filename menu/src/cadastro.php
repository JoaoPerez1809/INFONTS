<?php
include('conexao.php');
include('import.php');

if (isset($_POST['registrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = $_POST['usuario_nome'];
    $data_nasc = $_POST['data_nasc'];

    // Use prepared statements para evitar injeção de SQL
    $consulta = $mysqli->prepare("SELECT * FROM usuarios WHERE email=?");
    $consulta->bind_param("s", $email);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows == 0) {
        $hash = generateHash();
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $defaultImagePath = '../img/profile_default.jpg';

        // Use prepared statements para evitar injeção de SQL
        $inserir = $mysqli->prepare("INSERT INTO usuarios (usuario_nome, email, senha, data_nasc, path_usuario, img_usuario, hash, adm) VALUES (?, ?, ?, ?, ?, 'profile_default.jpg', ?, 0)");
        $inserir->bind_param("ssssss", $usuario, $email, $senha_hash, $data_nasc, $defaultImagePath, $hash);
        $inserir->execute();

        if (!$inserir) {
            echo "Erro na inserção: " . $mysqli->error;
        } else {
            echo "Cadastro bem-sucedido!";
        }
    } else {
        echo "Este email já está em uso. Escolha outro.";
    }

    // Feche as declarações preparadas
    $consulta->close();
    $inserir->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecadastro.css">
    <title>Cadastro</title>
</head>
<body>
<span style="color: red"><?php echo $mysqli->error ?></span>
    <form action="" method="post">
    <div class="container">
        <h1><b>Cadastro</b></h1>
        <input  class="box-text" type="email" placeholder="Email" minlength="8" maxlength="50"  name="email" required>
        <br>
        <input  class="box-text" type="text" placeholder="Usuário" maxlength="50"  name="usuario_nome" required>
        <br>
        <input  class="box-text" type="date" min="1923-01-01" required  name="data_nasc" required>
        <br>
        <input class="box-text" name="senha" type="password" id="senha" minlength="8" maxlength="20" placeholder="Senha" required>
        <br>
        <h5>Já possui uma conta?</h5>
        <a class="link" href="login.php">Entre aqui</a>
        <br>
        <input class="button_enviar" type="submit" value="Registar" name="registrar">
    </div>
    </div>
</form>
<a href="index.php"><img src="../img/seta.png"></a>
    <script type="text/javascript" src="../js/mascara.js"></script>

    <script>
    function showErrorModal(message) {
        var modal = document.createElement('div');
        modal.className = 'error-modal';
        modal.innerHTML = '<p>' + message + '</p>';
        document.body.appendChild(modal);
        setTimeout(function () {
            document.body.removeChild(modal);
        }, 3000);
    }

    function showSuccessModal() {
        var modal = document.createElement('div');
        modal.className = 'success-modal';
        modal.innerHTML = '<p>Cadastro bem-sucedido! Redirecionando para a página de login...</p>';
        document.body.appendChild(modal);
        setTimeout(function () {
            window.location.href = 'login.php';
        }, 3000);
    }

    <?php
        if (isset($inserir)) {
            if ($inserir) {
                echo 'showSuccessModal();';
            } else {
                echo 'showErrorModal("Erro na inserção: ' . $mysqli->error . '");';
            }
        } elseif (isset($_POST['registrar']) && $query->num_rows > 0) {
            echo 'showErrorModal("Este email já está em uso. Escolha outro.");';
        }
    ?>
</script>

</body>
</html>