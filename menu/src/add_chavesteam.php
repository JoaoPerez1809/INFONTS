<?php
session_start();
include('conexao.php');

// Verificar se o usuário está logado e é um administrador
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['usuario']['adm'] != '1') {
    header("Location: index.php");
    exit();
}

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $id_jogo = $_POST['id_jogo'];

    // Inserir a chave no banco de dados
    $sql = "INSERT INTO chavesteam (codigo, id_jogo) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $codigo, $id_jogo);

    if ($stmt->execute()) {
        $mensagem = "Chave da Steam criada com sucesso!";
    } else {
        $mensagem = "Erro ao criar a chave da Steam: " . $stmt->error;
    }
}

// Obter jogos do banco de dados
$sql_jogos = "SELECT id, titulo FROM jogos";
$result_jogos = $mysqli->query($sql_jogos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../css/styleadd.css">
    <title>Adicionar Chave Steam</title>
</head>
<body>  
<a href="jogos.php">
        Voltar
    </a>
<div class="container">
    <?php if (isset($mensagem)): ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?> 

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="codigo">Código da Chave da Steam:</label><br>
        <input type="text" id="codigo" name="codigo" required><br><br>

        <label for="id_jogo">Selecione o Jogo:</label><br>
        <select id="id_jogo" name="id_jogo">
        <?php
            if ($result_jogos->num_rows > 0) {
                while ($row = $result_jogos->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['titulo'] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum jogo disponível</option>";
            }
        ?>
        </select><br><br>

        <button type="submit">Criar Chave da Steam</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
