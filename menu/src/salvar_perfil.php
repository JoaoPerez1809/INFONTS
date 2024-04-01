<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['usuario']['id'];
    $newUsername = $_POST['newUsername'];

    $query = "UPDATE usuarios SET usuario_nome = '$newUsername' WHERE id = $userId";
    mysqli_query($mysqli, $query);

    // Lidando com o upload da imagem
    if ($_FILES['newImage']['error'] == UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Adicione os tipos de arquivo permitidos

        $uploadDir = 'profileimg/';
        $newImageName = basename($_FILES['newImage']['name']);

        // Validar o tipo de arquivo
        if (in_array($_FILES['newImage']['type'], $allowedTypes)) {
            $uploadPath = $uploadDir . $newImageName;

            // Realizar o upload da imagem
            if (move_uploaded_file($_FILES['newImage']['tmp_name'], $uploadPath)) {
                $query = "UPDATE usuarios SET path_usuario = '$uploadPath', img_usuario = '$newImageName' WHERE id = $userId";

                mysqli_query($mysqli, $query);

                // Você pode adicionar mais lógica aqui se necessário

                echo "Alterações salvas com sucesso!";
            } else {
                echo "Falha ao mover o arquivo para o diretório de uploads.";
            }
        } else {
            echo "Tipo de arquivo não permitido. Por favor, escolha uma imagem válida.";
        }
    } else {
        echo "Alterações salvas com sucesso!";
    }
} else {
    header("Location: perfil.php");
    exit();
}
?>
