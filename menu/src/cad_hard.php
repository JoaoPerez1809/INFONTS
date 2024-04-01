<?php
session_start();
include('conexao.php');



$imagem = $_FILES["img_hard"];

$pasta = "imghard/".$imagem['name'];

if( move_uploaded_file($imagem['tmp_name'], $pasta)) {
}
if (isset($_FILES["img_hard1"])) {
  $imagem1 = $_FILES["img_hard1"];

  if ($imagem1['error'] === UPLOAD_ERR_OK) {
      $pasta1 = "imghard/".$imagem1['name'];

      if (move_uploaded_file($imagem1['tmp_name'], $pasta1)) {
      } else {
          echo "Erro ao mover o arquivo de upload para o destino.";
      }
  } else {
      echo "Erro durante o upload do arquivo: " . $imagem1['error'];
  }
} else {
  echo "Nenhum arquivo enviado para Imagem Hard 1.";
}
if (isset($_FILES["img_hard2"])) {
  $imagem2 = $_FILES["img_hard2"];

  if ($imagem2['error'] === UPLOAD_ERR_OK) {
      $pasta2 = "imghard/".$imagem2['name'];

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



$sql_inserthard   =  " INSERT INTO  hardwares (  `nome_hard`, `info_hard`, `datafabricacao_hard`, `empresa_hard`, `img_hard`, `categoriahw`, `preco`, `path`, "; 
$sql_inserthard  .=  "  `pichau_link`, `kabum_link`, `amazon_link`, `terabyte_link`, `aliexpress_link`, `path1`, `img_hard1`, `path2`, `img_hard2`) " ; 
$sql_inserthard  .=  " VALUES ( '". $_POST['nome_hard']."','". $_POST['info_hard']."','". $_POST['datafabricacao_hard']."','".$_POST['empresa_hard']."','".$imagem['name']."', '".$_POST['categoriahw']."',  '".$_POST['preco']."','".$pasta."',";
$sql_inserthard  .=  " '".$_POST["pichau_link"]."','".$_POST["kabum_link"]."','".$_POST["amazon_link"]."','".$_POST["terabyte_link"]."','".$_POST["aliexpress_link"]."',";
$sql_inserthard  .=  " '".$pasta1."','".$imagem1['name']."','".$pasta2."','".$imagem2['name']."')";

// 

 $resp = $mysqli->query($sql_inserthard);

 if($resp){
    echo "cadastro";
 }else{
    echo "não cadastrado";                                                                                                                                                                                                                                                                                  
 }



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
  <a href="hardware.php"><img src="../img/seta.png"></a>
</body>
</html>