<?php
    session_start();

    include("infra/db/connect.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        // aqui mostra da onde ele vai tirar o "usuario" e "senha"
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

        $resultado = $conn->query($sql);

        // ele ve todas as linhas onde esta os nome e senha do usuario
        if ($resultado->num_rows > 0){
            $_SESSION["usuario"] = $usuario;
            header("Location: public/home.php");
            exit();
        }else{
            $erro = "Usuário ou senha inválidos!";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Sitema de Login Simples</h1>
    <!-- aqu fala o metodo usado e os inputs e labels -->
    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <?php
        
            if(isset($erro)){
                echo $erro;
            };

            // esse erro serve pra mostrar que esta errado
        
        ?>
        <br>
        <button type="submit">Entrar</button>
    </form>

</body>
</html>