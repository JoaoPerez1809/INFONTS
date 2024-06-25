<?php
session_start();

include('conexao.php');

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['usuario']['adm'] != '1') {
    header("Location: index.php");
    exit();
}

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}




function enviarArquivo($error, $size, $name, $tmp_name, $name1, $tmp_name1, $name2, $tmp_name2, $nome_hard, $info_hard, $empresa_hard, $preco, $datafabricacao_hard, $categoriahw, $pichau_link, $kabum_link, $amazon_link, $terabyte_link, $aliexpress_link ) {
    global $mysqli;

    if ($error) {
        die("Falha ao enviar arquivo");
    }

    if ($size > 2097152) {
        die("Arquivo muito grande!! Max 2MB");
    }
    $pasta = "imghard/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($novoNomeDoArquivo, PATHINFO_EXTENSION));
    
    if ($extensao != "jpg" && $extensao != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);
    $pasta1 = "imghard/";
    $nomeDoArquivo1 = $name1;
    $novoNomeDoArquivo1 = uniqid();
    $extensao1 = strtolower(pathinfo($novoNomeDoArquivo1, PATHINFO_EXTENSION));
    
    if ($extensao1 != "jpg" && $extensao1 != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path1 = $pasta1 . $novoNomeDoArquivo1 . "." . $extensao1;
    $deu_certo1 = move_uploaded_file($tmp_name1, $path1);
    $pasta2 = "imghard/";
    $nomeDoArquivo2 = $name2;
    $novoNomeDoArquivo2 = uniqid();
    $extensao2 = strtolower(pathinfo($novoNomeDoArquivo2, PATHINFO_EXTENSION));
    
    if ($extensao2 != "jpg" && $extensao2 != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path2 = $pasta2 . $novoNomeDoArquivo2 . "." . $extensao2;
    $deu_certo2 = move_uploaded_file($tmp_name2, $path2);

    if ($deu_certo && $deu_certo1 && $deu_certo2) {
        $query = "INSERT INTO hardwares (`nome`, `nome_hard` `info_hard`, `datafabricacao_hard`, `empresa_hard`, `categoriahw`, `preco`, `path`, `pichau_link`, `kabum_link`, `amazon_link`, `terabyte_link`, `aliexpress_link`, `path1`, `path2` ) 
        VALUES ('$nomeDoArquivo', '$nome_hard', '$info_hard '$datafabricacao_hard', '$empresa_hard', '$categoriahw', '$preco', '$path', $pichau_link, $kabum_link, $amazon_link, $terabyte_link, $aliexpress_link, $path1, $path2,)";

        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if (isset($_FILES['arquivo1'])) {
    $arquivos1 = $_FILES['arquivo1'];
    $tudo_certo = true;
    $nome_hard =$_POST['nome_hard'];
    $info_hard =$_POST['info_hard']; 
    $empresa_hard =  $_POST['empresa_hard']; 
    $preco = $_POST['preco']; 
    $datafabricacao_hard =  $_POST['datafabricacao_hard']; 
    $categoriahw =  $_POST['categoriahw']; 
    $path = $_POST['path'];
    $img_hard =$_POST['img_hard'];
    $path1 = $_POST['path1'];
    $img_hard1 =$_POST['img_hard1'];
    $path2 = $_POST['path2'];
    $img_hard2 =$_POST['img_hard2'];
    $pichau_link =  $_POST['pichau_link']; 
    $kabum_link =  $_POST['kabum_link'];
    $amazon_link =  $_POST['amazon_link']; 
    $terabyte_link =  $_POST['terabyte_link'];
    $aliexpress_link =  $_POST['aliexpress_link']; 
    
    
 
    
           foreach ($arquivos1['name'] as $index => $arq) {
        
        $deu_certo = enviarArquivo($arquivos1['error'][$index], $arquivos1['size'][$index], $arquivos1['name'][$index], $arquivos1['tmp_name'][$index],$nome_hard,$info_hard,$empresa_hard,$preco,$datafabricacao_hard,$categoriahw,$pichau_link,$kabum_link,$amazon_link,$terabyte_link,$aliexpress_link);
        if (!$deu_certo) {
            $tudo_certo = false;
        }
    }
    if ($tudo_certo) {
        echo "<p>Todos os arquivos foram enviados com sucesso!";
    } else {
        echo "<p>Falha ao enviar um ou mais arquivos!";
    }

    
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../css/styleaddhw.css">
    <title>Adicionar</title>
</head>
<body>
<a href="hardware.php">
        Voltar
        </a>
    <form enctype="multipart/form-data" action="cad_hard.php" method="POST">
        <div class="container">
            <br>
            <h2><label for="title">Nome do Hardware</label></h2>
            <input  name="nome_hard" class="title" type="text" placeholder="Ex: GeForce RTX 3060" required>
            <br><br>

            <h2><label for="descriptiom">Informações do Hardware</label></h2>
            <textarea name="info_hard" class="description" rows="4" placeholder="Ex: 
Coprocessador gráfico 	NVIDIA GeForce RTX 3060
Marca 	Galax
Tamanho da memória RAM da placa gráfica 	12 GB
Velocidade do clock da GPU 	1777 MHz
Interface de saída de vídeo 	DisplayPort, HDMI
Sobre este item

Placa com selo LHR ('Lite Hash Rate')
Velocidade da memória: 15 GBps
Suporte de recursos: PCI-E 4.0 Windows 10 de 64 bits, Linux de 64 bits
Configuração de memória padrão: 12 GB
            " required></textarea>
            

            <br><br>

            <h2><label for="youtubeurl">Pichau</label></h2>
            <input type="text" class="shoplink" id="youtubeurl" name="pichau_link" placeholder="Ex: https://www.pichau.com.br">
            <br><br>
            <h2><label for="youtubeurl">Kabum</label></h2>
            <input type="text" class="shoplink" id="youtubeurl" name="kabum_link" placeholder="Ex: https://www.kabum.com.br">
            <br><br>
            <h2><label for="youtubeurl">Amazon</label></h2>
            <input type="text" class="shoplink" id="youtubeurl" name="amazon_link" placeholder="Ex: https://www.amazon.com.br">
            <br><br>
            <h2><label for="youtubeurl">Terabyte</label></h2>
            <input type="text" class="shoplink" id="youtubeurl" name="terabyte_link" placeholder="Ex: https://www.terabyteshop.com.br">
            <br><br>
            <h2><label for="youtubeurl">Aliexpress</label></h2>
            <input type="text" class="shoplink" id="youtubeurl" name="aliexpress_link" placeholder="Ex: https://best.aliexpress.com">
            <br><br>

            <h2><label for="companyName">Fabricante</label></h2>
            <input class="company" name="empresa_hard"type="text" id="companyName" placeholder="Ex: INfonts" required>
            <br><br>

            <h2><label for="price">Preço</label></h2>
            <input type="text" id="price" name="preco" max="8" placeholder="Ex: R$:100,00" required >
            <br><br>

            <h2><label for="releaseDate">Data de Fabricação</label></h2>
            <input type="date" id="releaseDate" name="datafabricacao_hard" min="1958-10-18" max="9999-12-31" required>
            <br><br>

            <h2><label for="categoriahw">Categoria</label></h2>
            <select id="categoriahw" name="categoriahw" required>
                <option selected disabled>Escolha uma Item</option>
                <option value="Processador">Processador</option>
                <option value="Placa de Vídeo">Placa de Vídeo</option>
                <option value="Memória RAM">Memória RAM</option>
                <option value="Placa-Mãe">Placa-Mãe</option>
                <option value="HD">HD</option>
                <option value="SSD">SSD</option>
                <option value="Fonte">Fonte</option>
                <option value="Gabinete">Gabinete</option>
            </select>
            <br><br>


            
                <div class="image">
                    <input id="logo"  name="img_hard" type="file" accept="image/png, image/jpeg">
                    <label for="logo" class="label-icon"><i class="far fa-image" required></i> ADICIONAR Imagem</label>
                    <div id="logoSelecionado"></div>
                </div>
            <br>
            <div class="image">
                <input id="logo"  name="img_hard1" type="file" accept="image/png, image/jpeg">
                <label for="logo" class="label-icon"><i class="far fa-image" required></i> ADICIONAR Imagem 1</label>
                <div id="logoSelecionado1"></div>
            </div>
            <br>
            <div class="image">
                <input id="logo"  name="img_hard2" type="file" accept="image/png, image/jpeg">
                <label for="logo" class="label-icon"><i class="far fa-image" required></i> ADICIONAR Imagem 2</label>
                <div id="logoSelecionado2"></div>
            </div>
           


            <input id="add" type="submit" value="Finalizar">
        </div>
    </form>
    <script src="../js/checkbox.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/ajustehw.js"></script>
    <script src="../js/mascarapreco.js"></script>
</body>
</html>
