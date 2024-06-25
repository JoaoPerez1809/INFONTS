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



function enviarArquivo($error, $size, $name, $tmp_name,$name1, $tmp_name1,$name2, $tmp_name2,$name3, $tmp_name3,$name4, $tmp_name4,$name5, $tmp_name5, $titulo, $sinopse, $links, $nome_da_empresa, $preco, $faixa_etaria, $data_lanc, $categorias, $plataformas, $req, $req1, $steam_link, $epic_link, $ps_store_link, $switch_link, $xbox_link, $mobile_link,$url) {
    global $mysqli;

    if ($error) {
        die("Falha ao enviar arquivo");
    }

    if ($size > 2097152) {
        die("Arquivo muito grande!! Max 2MB");
    }
    //banner
    $pasta = "imgbanner/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png") {
        die("Tipo de arquivo não aceito");
    }
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);

    // ScreenShot1 
    $pasta1 = "imgjogos/";
    $nomeDoArquivo1 = $name1;
    $novoNomeDoArquivo1 = uniqid();
    $extensao1 = strtolower(pathinfo($nomeDoArquivo1, PATHINFO_EXTENSION));

    if ($extensao1 != "jpg" && $extensao1 != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path1 = $pasta1 . $novoNomeDoArquivo1 . "." . $extensao1;
    $deu_certo1 = move_uploaded_file($tmp_name1, $path1);
    // ScreenShot2
    $pasta2 = "imgjogos/";
    $nomeDoArquivo2 = $name2;
    $novoNomeDoArquivo2 = uniqid();
    $extensao2 = strtolower(pathinfo($nomeDoArquivo2, PATHINFO_EXTENSION));

    if ($extensao2 != "jpg" && $extensao2 != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path2 = $pasta2 . $novoNomeDoArquivo2 . "." . $extensao2;
    $deu_certo2 = move_uploaded_file($tmp_name2, $path2);
    // ScreenShot3 
    $pasta3 = "imgjogos/";
    $nomeDoArquivo3 = $name3;
    $novoNomeDoArquivo3 = uniqid();
    $extensao3 = strtolower(pathinfo($nomeDoArquivo3, PATHINFO_EXTENSION));

    if ($extensao3 != "jpg" && $extensao3 != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path3 = $pasta3 . $novoNomeDoArquivo3 . "." . $extensao3;
    $deu_certo3 = move_uploaded_file($tmp_name3, $path3);
    // ScreenShot4 
    $pasta4 = "imgjogos/";
    $nomeDoArquivo4 = $name4;
    $novoNomeDoArquivo4 = uniqid();
    $extensao4 = strtolower(pathinfo($nomeDoArquivo4, PATHINFO_EXTENSION));

    if ($extensao4 != "jpg" && $extensao4 != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path4 = $pasta4 . $novoNomeDoArquivo4 . "." . $extensao4;
    $deu_certo4 = move_uploaded_file($tmp_name4, $path4);
    // ScreenShot5 
    $pasta5 = "imgjogos/";
    $nomeDoArquivo5 = $name5;
    $novoNomeDoArquivo5 = uniqid();
    $extensao5 = strtolower(pathinfo($nomeDoArquivo5, PATHINFO_EXTENSION));

    if ($extensao5 != "jpg" && $extensao5 != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path5 = $pasta5 . $novoNomeDoArquivo5 . "." . $extensao5;
    $deu_certo5 = move_uploaded_file($tmp_name5, $path5);


    if ($deu_certo && $deu_certo1 && $deu_certo2 && $deu_certo3 && $deu_certo4 && $deu_certo5) {
        $query = "INSERT INTO jogos (nome, path,path1,path2,path3,path4,path5, titulo, sinopse, links, nome_da_empresa, preco, faixa_etaria, data_lanc, categorias, plataformas, req, req1, steam_link, epic_link, ps_store_link, switch_link, xbox_link, mobile_link, url) 
                  VALUES ('$nomeDoArquivo', '$path','$path1','$path2','$path3','$path4','$path5', '$titulo', '$sinopse', '$links', '$nome_da_empresa', '$preco', '$faixa_etaria', '$data_lanc', '$categorias', '$plataformas', '$req', '$req1', '$steam_link', '$epic_link', '$ps_store_link', '$switch_link', '$xbox_link', '$mobile_link', '$url')";

        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if (isset($_FILES['arquivo'])) {
    $arquivos = $_FILES['arquivo'];
    $tudo_certo = true;
    $titulo =$_POST['titulo']; 
    $nome_da_empresa =  $_POST['nome_da_empresa']; 
    $preco = $_POST['preco'];
    $faixa_etaria =  $_POST['faixa_etaria']; 
    $data_lanc =  $_POST['data_lanc']; 
    $categorias =  $_POST['categorias']; 
    $plataformas =  $_POST['plataformas']; 
    $req =  $_POST['req']; 
    $req1 =  $_POST['req1']; 
    $path = $_POST['path'];
    $img_logo =$_POST['img_logo'];
    $path1 = $_POST['path1'];
    $img_jogo_Screen1 =$_POST['img_jogo_Screen1'];
    $path2 = $_POST['path2'];
    $img_jogo_Screen2 =$_POST['img_jogo_Screen2'];
    $path3 = $_POST['path3'];
    $img_jogo_Screen3 =$_POST['img_jogo_Screen3'];
    $path4 = $_POST['path4'];
    $img_jogo_Screen4 =$_POST['img_jogo_Screen4'];
    $path5 = $_POST['path5'];
    $img_jogo_Screen5 =$_POST['img_jogo_Screen5'];
    
    
    
    
        foreach ($arquivos['name'] as $index => $arq) {
        
        $deu_certo = enviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index],$titulo,$sinopse,$links,$nome_da_empresa,$preco,$faixa_etaria,$data_lanc,$categorias,$plataformas,$req,$req1);
       
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
    <link rel="stylesheet" href="../css/styleadd.css">
    <title>Adicionar</title>
</head>
<body>
<a href="jogos.php">
        Voltar
        </a>
    <form enctype="multipart/form-data" action="cad.php" method="POST">
        <div class="container">
            <br>
            <h2><label for="title">Titulo</label></h2>
            <input  name="titulo" class="title" type="text" placeholder="Ex: The Last Of Us" required>
            <br><br>

            <h2><label for="descriptiom">Sinopse</label></h2>
            <textarea name="sinopse" class="description" rows="4" placeholder="Ex: Embarque na jornada mais maluca da sua vida em It Takes Two, uma aventura de plataforma que subverte gêneros e foi criada puramente para o co-op. Jogue no papel do briguento casal Cody e May, dois humanos transformados em bonecos por um feitiço mágico." required></textarea>
            <br><br>
            <h2><label for="steamLink">Link da Steam</label></h2>
            <input type="text" class="shoplink" id="steamLink" name="steam_link" placeholder="Ex: www.steam.com/game1">
            <br><br>
            <h2><label for="epicLink">Link da Epic</label></h2>
            <input type="text" class="shoplink" id="epicLink" name="epic_link" placeholder="Ex: www.epicgames.com/game1">
            <br><br>
            <h2><label for="psstoreLink">Link da Ps Store</label></h2>
            <input type="text" class="shoplink" id="psstoreLink" name="ps_store_link" placeholder="Ex: www.playstation.com/game1">
            <br><br>
            <h2><label for="nintendoLink">Link da Nintendo</label></h2>
            <input type="text" class="shoplink" id="switchLink" name="switch_link" placeholder="Ex: www.nintendo.com/game1">
            <br><br>
            <h2><label for="xboxLink">Link da Xbox</label></h2>
            <input type="text" class="shoplink" id="xboxLink" name="xbox_link" placeholder="Ex: www.xbox.com/game1">
            <br><br>
            <h2><label for="mobileLink">Link do Mobile</label></h2>
            <input type="text" class="shoplink" id="mobileLink" name="mobile_link" placeholder="Ex: www.mobile.com/game1">
            <br><br>
            <h2><label for="youtubeurl">Link do Video Youtube</label></h2>
            <input type="text" class="shoplink" id="youtubeurl" name="url" placeholder="Ex: https://www.youtube.com/watch?v=dQw4w9WgXcQ">
            <br><br>
            <h2><label for="companyName">Nome da Empresa</label></h2>
            <input class="company" name="nome_da_empresa"type="text" id="companyName" placeholder="Ex: INfonts">
            <br><br>

            <h2><label for="price">Preço</label></h2>
            <input type="text" id="price" name="preco" max="8" placeholder="Ex: R$:100,00" required >
            <br><br>

            <h2><label for="ageRange">Faixa Etária</label></h2>
            <select id="ageRange" name="faixa_etaria" required>
                <option selected disabled>Escolha uma faixa</option>
                <option value="Livre">Livre</option>
                <option value="+10">+10</option>
                <option value="+12">+12</option>
                <option value="+14">+14</option>
                <option value="+16">+16</option>
                <option value="+18">+18</option>
            </select>
            <br><br>

            <h2><label for="releaseDate">Data de Lançamento</label></h2>
            <input type="date" id="releaseDate" name="data_lanc" min="1958-10-18" max="9999-12-31" required>
            <br><br>

            <h2><label for="categories">Categorias</label></h2>
            <select id="categories" name="categoria[]" multiple required>
                <option value="Luta">Luta</option>
                <option value="Acao">Ação</option>
                <option value="Aventura">Aventura</option>
                <option value="Fantasia">Fantasia</option>
                <option value="Terror">Terror</option>
                <option value="RPG">RPG</option>
                <option value="FPS">FPS</option>
                <option value="Puzzle">Puzzle</option>
                <option value="Esporte">Esporte</option>
                <option value="Corrida">Corrida</option>
                
            </select>
            <br><br>


            
            <h2><label for="platforms">Plataformas</label></h2>

            
            <input class="platforms" type="checkbox" id="PC" value="PC" name="itens[]"  > PC

                <input class="platforms" type="checkbox" id="Xbox Series" name="itens[]" value="Xbox Series"> Xbox Series X/S

                <input class="platforms" type="checkbox" id="Xbox One" name="itens[]" value="Xbox One"> Xbox One

                <input class="platforms" type="checkbox" id="PS5" name="itens[]" value="PS5"> PS5
                
                <input class="platforms" type="checkbox" id="PS4" name="itens[]" value="PS4"> PS4

                <input class="platforms" type="checkbox" id="Switch" name="itens[]" value="Switch"> Switch

                <input class="platforms" type="checkbox" id="Mobile" name="itens[]" value="Mobile"> Mobile

                
                
            
            <br><br>

            <h2><label for="requirements">Requisitos Mínimos</label></h2>
            <textarea id="requirements" name="req" rows="4" placeholder="Especifique os requisitos mínimos" required></textarea>
            <br><br>
            <h2><label for="requirements1">Requisitos Recomendados</label></h2>
            <textarea id="requirements1" name="req1" rows="4" placeholder="Especifique os requisitos recomendados" required></textarea>
            <br><br>

            <div class="image-group">
                <input id="logo" name="img_logo" type="file" accept="image/png, image/jpeg">
                <div id="logoSelecionado" class="miniatura"></div>
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <input id="screenshot<?= $i ?>" name="img_jogo_Screen<?= $i ?>" type="file" accept="image/png, image/jpeg">
                        <br>
                        <div id="screenshot<?= $i ?>Selecionado" class="miniatura" ></div>
                <?php } ?>
            </div>
            <br>

            <input id="add" type="submit" value="Finalizar">
        </div>
    </form>
    <script>
        function exibirMiniatura(input, destino) {
    const fileInput = input;
    const previewContainer = document.getElementById(destino);

    fileInput.addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function () {
                const previewImage = document.createElement('img');
                previewImage.setAttribute('src', this.result);
                
                previewImage.style.width = 'auto';
                previewImage.style.maxHeight = '150px';
                previewImage.style.marginTop = '10px';
                previewImage.style.position = 'relative';
                previewImage.style.display = 'flex';
                previewImage.style.left = '2%';




                previewContainer.innerHTML = '';
                previewContainer.appendChild(previewImage);
            });

            reader.readAsDataURL(file);
        }
    });
}

        exibirMiniatura(document.getElementById('logo'), 'logoSelecionado');

        <?php for ($i = 1; $i <= 5; $i++) { ?>
            exibirMiniatura(document.getElementById('screenshot<?= $i ?>'), 'screenshot<?= $i ?>Selecionado');
        <?php } ?>
    </script>   

    <script src="../js/checkbox.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/ajuste.js"></script>
    <script src="../js/mascarapreco.js"></script>
    <script src="../js/countries.js"></script>
</body>
</html>