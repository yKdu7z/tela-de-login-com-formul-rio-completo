<?php
session_start();
// Conexao com o banco
include('config.php');

// Processar o formulario de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

// Consultar o banco de dados
    $sql = "SELECT id, nome, senha FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["nome"] = $row["nome"];
            header("Location: sistema.php"); //localizaçao do sistema
        } else {
          $alerta = "Senha incorreta";
        }
    } else {
        $alerta = "Usuário não encontrado";
    }
}

// Fechar a conexao
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        // Função para exibir alerta
        function exibirAlerta() {
            var mensagem = "<?php echo $alerta; ?>";
            if (mensagem !== "") {
                alert(mensagem);
            }
        }
        // Chamar a função ao carregar a página
        window.onload = exibirAlerta;
    </script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="styless.css" rel="stylesheet"> 
</head>
<body>
     <!-- TWLA DE LOGIN -->
    <div class="tela">
        <h1>Login</h1>
        <form action="login.php" method="post" >
           <div class="inputBox">
               <i class='bx bxs-user'></i>
               <label for="email" class="labelInput"></label>
               <input type="email" name="email" class="inputUser"  placeholder="Email"required>
           </div>
            <br>
           <div class="inputBox">
               <i class='bx bxs-lock-alt'></i>
               <label for="senha" class="labelInput"></label>
               <input type="password" name="senha" class="inputUser"  placeholder="Senha" required>
           </div>
            <br>
           <input class="inputSubmit" type="submit" name="submit" value="Enviar">
           <div class="register-link">
            <p>Não tem uma conta? <a href="formulario.php" >Registrar</a></p>
          </div>
        </form>
    </div>
    </fieldset>
</body>
</html>