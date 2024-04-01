<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['usuario'])) {
        $user_id = $_SESSION['usuario']['id'];

        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $birthdate = mysqli_real_escape_string($mysqli, $_POST['birthdate']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);

        $update_query = "UPDATE usuarios SET usuario_nome = '$username', data_nasc = '$birthdate', email = '$email' WHERE id = $user_id";

        if (mysqli_query($mysqli, $update_query)) {
            echo "Perfil atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o perfil: " . mysqli_error($mysqli);
        }
    } else {
        echo "Usuário não autenticado.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
