<?php
session_start();

// Verificar se o usuario esta logado
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

// Exibir mensagem de boas-vindas
$nomeUsuario = $_SESSION["nome"];
echo "<h1> Bem vindo <u>$nomeUsuario</u></h1>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <style>
        body{
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg {
            background: rgba(0,0,0,0.3);
            border-radius:15px,15px,0,0;
            
        }
    </style>
</head>
<body>
    <!-- Botão de saída -->
    <form action="sair.php" method="post">
        <input type="submit" value="Sair">
    </form>
</body>
</html>