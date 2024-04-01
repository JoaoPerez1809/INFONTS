<?php
session_start();
include('conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    

    $query = "SELECT * FROM hardwares WHERE id = $id";
    $result = $mysqli->query($query);

    

    if ($result->num_rows > 0) {
        $dados = $result->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            
            $preco = $_POST['preco'];
            

            $query_update = "UPDATE hardwares SET 
                preco = '$preco'
                
                
                
                
                WHERE id = $id";

            $result_update = $mysqli->query($query_update);

            if ($result_update) {
                header("Location: hardware.php");
                exit();
            } else {
                echo "Erro ao atualizar o hardware: " . $mysqli->error;
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
            <form enctype="multipart/form-data" action="edit_hard.php?id=<?php echo $id; ?>" method="POST">
                <div class="container">
                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    
                    
                    <h2><label for="price">Preço</label></h2>
                    <input type="text" id="price" name="preco" max="8" value="<?php echo $dados['preco']; ?>"  >
                    <br><br>             
                    
                    <input id="editar" type="submit" value="Salvar">
                </div>
            </form>
            <script src="../js/mascarapreco.js"></script>
        </body>

        </html>

<?php
    } else {
        echo "Hardware não encontrado.";
    }
} else {
    echo "ID do hardware não especificado.";
}

$mysqli->close();
?>

        


