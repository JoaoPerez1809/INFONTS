<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    

    $query = "SELECT * FROM jogos WHERE id = $id";
    $result = $mysqli->query($query);

    

    if ($result->num_rows > 0) {
        $dados = $result->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $titulo = $_POST['titulo'];
            $sinopse = $_POST['sinopse'];
            $preco = $_POST['preco'];
            $req = $_POST['req'];
            $req1 = $_POST['req1'];

            $query_update = "UPDATE jogos SET 
                titulo = '$titulo',
                sinopse = '$sinopse',
                preco = '$preco',
                req = '$req',
                req1 = '$req1'
                
                
                
                WHERE id = $id";

            $result_update = $mysqli->query($query_update);

            if ($result_update) {
                header("Location: jogos.php");
                exit();
            } else {
                echo "Erro ao atualizar o jogo: " . $mysqli->error;
            }
        }
?>


        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="../css/styleedit.css">
            <title>Editar</title>
        </head>

        <body>
            <form enctype="multipart/form-data" action="edit.php?id=<?php echo $id; ?>" method="POST">
                <div class="container">
                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    <h2><label for="title">Titulo</label></h2>
                    <input name="titulo" class="title" type="text" value="<?php echo $dados['titulo']; ?>" >
                    <br><br>
                    <h2><label for="description">Sinopse</label></h2>
                    <textarea name="sinopse" class="description" rows="4" ><?php echo $dados['sinopse']; ?></textarea>
                    <br><br>
                    <h2><label for="price">Preço</label></h2>
                    <input type="text" id="price" name="preco" max="8" value="<?php echo $dados['preco']; ?>"  >
                    <br><br>
                    <textarea name="req" class="description" rows="4" ><?php echo $dados['req']; ?></textarea>
                    <br><br>
                    <br><br>
                    <textarea name="req1" class="description" rows="4" ><?php echo $dados['req1']; ?></textarea>
                    <br><br>
                    
                        
                    
                    <input id="editar" type="submit" value="Salvar">
                </div>
            </form>
            <script src="../js/mascarapreco.js"></script>
        </body>

        </html>

<?php
    } else {
        echo "Jogo não encontrado.";
    }
} else {
    echo "ID do jogo não especificado.";
}

$mysqli->close();
?>

        


