<?php
session_start();
include('conexao.php');

$_itens = "";
foreach ($_POST['itens'] as $key => $valor) {
    $_itens .= $valor;
    if ($key !== count($_POST['itens']) - 1) {
        $_itens .= ', ';
    } else {
        $_itens .= '.';
    }
}

$_categorias = "";
foreach ($_POST['categoria'] as $key => $valor) {
    $_categorias .= $valor;
    if ($key !== count($_POST['categoria']) - 1) {
        $_categorias .= ', ';
    } else {
        $_categorias .= '.';
    }
}

$imagem = $_FILES["img_logo"];

$pasta = "imgbanner/".$imagem['name'];

if( move_uploaded_file($imagem['tmp_name'], $pasta)) {
}
if (isset($_FILES["img_jogo_Screen1"])) {
    $imagem1 = $_FILES["img_jogo_Screen1"];

    if ($imagem1['error'] === UPLOAD_ERR_OK) {
        $pasta1 = "imgjogos/".$imagem1['name'];

        if (move_uploaded_file($imagem1['tmp_name'], $pasta1)) {
        } else {
            echo "Erro ao mover o arquivo de upload para o destino.";
        }
    } else {
        echo "Erro durante o upload do arquivo: " . $imagem1['error'];
    }
} else {
    echo "Nenhum arquivo enviado para Screenshot1.";
}

if (isset($_FILES["img_jogo_Screen2"])) {
    $imagem2 = $_FILES["img_jogo_Screen2"];

    if ($imagem2['error'] === UPLOAD_ERR_OK) {
        $pasta2 = "imgjogos/".$imagem2['name'];

        if (move_uploaded_file($imagem2['tmp_name'], $pasta2)) {

        } else {
            echo "Erro ao mover o arquivo de upload para o destino.";
        }
    } else {
        echo "Erro durante o upload do arquivo: " . $imagem2['error'];
    }
} else {
    echo "Nenhum arquivo enviado para Screenshot2.";
}

$imagem3 = $_FILES["img_jogo_Screen3"];

$pasta3 = "imgjogos/".$imagem3['name'];

if( move_uploaded_file($imagem3['tmp_name'], $pasta3)) {
}

$imagem4 = $_FILES["img_jogo_Screen4"];

$pasta4 = "imgjogos/".$imagem4['name'];

if( move_uploaded_file($imagem4['tmp_name'], $pasta4)) {
}

$imagem5 = $_FILES["img_jogo_Screen5"];

$pasta5 = "imgjogos/".$imagem5['name'];

if( move_uploaded_file($imagem5['tmp_name'], $pasta5)) {
}

$sql_insert = "INSERT INTO jogos (sinopse, nome_da_empresa, preco, faixa_etaria, data_lanc, categoria, plataformas, req, req1, titulo, img_logo, path, img_jogo_Screen1, path1, img_jogo_Screen2, path2, img_jogo_Screen3, path3, img_jogo_Screen4, path4, img_jogo_Screen5, path5, steam_link, epic_link, ps_store_link, switch_link, xbox_link, mobile_link, url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql_insert);

$stmt->bind_param("sssssssssssssssssssssssssssss",
    $_POST['sinopse'],
    $_POST['nome_da_empresa'],
    $_POST['preco'],
    $_POST['faixa_etaria'],
    $_POST['data_lanc'],
    $_categorias,
    $_itens,
    $_POST['req'],
    $_POST['req1'],
    $_POST['titulo'],
    $imagem['name'],
    $pasta,
    $imagem1['name'],
    $pasta1,
    $imagem2['name'],
    $pasta2,
    $imagem3['name'],
    $pasta3,
    $imagem4['name'],
    $pasta4,
    $imagem5['name'],
    $pasta5,
    $_POST['steam_link'],
    $_POST['epic_link'],
    $_POST['ps_store_link'],
    $_POST['switch_link'],
    $_POST['xbox_link'],
    $_POST['mobile_link'],
    $_POST['url']
);

$result = $stmt->execute();

if ($result) {
    echo "cadastro";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$mysqli->close();



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylelogin.css">
</head>
<body>
  <a href="jogos.php"><img src="../img/seta.png"></a>
</body>
</html>