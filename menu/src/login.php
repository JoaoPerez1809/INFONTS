<?php
include('conexao.php');
include('import.php');

session_start(); 


if (isset($_POST['logar'])) {
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = mysqli_prepare($mysqli, "SELECT * FROM usuarios WHERE email = ?");
    mysqli_stmt_bind_param($query, "s", $email);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    if (mysqli_num_rows($result) > 0) {
        $arr = mysqli_fetch_array($result);
        $hashFromDatabase = $arr['senha'];
        if (password_verify($senha, $hashFromDatabase)) {
            $_SESSION['usuario'] = ['id' => $arr['id'], 'email' => $arr['email'],'adm' => $arr['adm'],'usuario_nome' => $arr['usuario_nome']];
            header("location: index.php");
            exit();
        } else {
            $error = "Senha incorreta. Senha digitada: $senha, Hash do banco de dados: $hashFromDatabase";
        }
        
    } else {
        $error = "Email não encontrado ou senha incorreta";
    }
    
   
    mysqli_close($mysqli);
} else {
    $error = "";
    $success = "";
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylelogin.css">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
    <div class="container">
        <h1><b>Login</b></h1>
        <br>
        <input class="box-text" name="email" type="email" placeholder="Email" required>
        <br><br>
        <input class="box-text" name="senha" type="password" size="8" maxlenght="8" id="senha" placeholder="Senha" required>
        <br><br>
        <h5>Não possui cadastro?</h5>
        <br>
        <a class="link" href="cadastro.php">Cadastre-se aqui</a>
        <br>
        <a class="link" href="recuperarsenha.php">Esqueci minha senha</a>
        <br><br>
        <button href="login.php" type="submit" name="logar" value="Logar" >Entrar</button>
    </div>
    </div>
    </form>
    <a href="index.php"><img src="../img/seta.png"></a>
</body>
</html>