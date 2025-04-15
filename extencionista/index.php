<?php
include("conection.php");
session_start();

$erroLogin = "";

// Verifica se formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';

    if (!empty($email) && !empty($senha)) {
        // Consulta no banco
        $query = "SELECT * FROM login WHERE email='$email' AND senha='$senha'";
        $result = mysqli_query($conection, $query);

        if ($result && mysqli_num_rows($result) === 1) {
            $_SESSION['email'] = $email;
            header("Location: Aba-Serviços.html");
            exit;
        } else {
            $erroLogin = "Email ou senha incorretos!";
        }
    } else {
        $erroLogin = "Preencha todos os campos!";
    }
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&R Silagens</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="corpo">
    <?php
if (!empty($erroLogin)) {
    echo "<p style='color:red; text-align:center;'>$erroLogin</p>";
}
?>

<form action="index.php" method="POST">
    <h1>Seu Parceiro de Confiança</h1>
    <h3>Preencha o formulário para continuar:</h3>

    <!-- Campos com atributos name corretos -->
    <input type="email" name="email" placeholder="Digite seu email:" required><br><br>
    <input type="password" name="senha" placeholder="Digite sua senha:" required><br><br>

    <button type="submit" name="login">Login</button><br><br>
    <button type="button" onclick="cadastro()" name="cadastrar">Cadastrar</button>

    <img src="logo_preta.png" alt="Logo D&R Silagens" class="logo">
</form>

    <img src="logo_preta.png" alt="Logo D&R Silagens" class="logo"> <!-- Logo D&R Silagens-->
    </div>
    <!-- Fim Login e logo--> 
<!--Menu Interativo-->  
<div class="menuInicial"> 
<input type="image" src="botao_menu.png" onclick="mostrarOuEsconder()" name="botaoMenu"></div> <!-- Botão Menu-->
<div id="menuHamburguer" menu="menuHamburguer" hidden> <!-- Menu Hamburguer-->
  <a href="Aba-Serviços.html">Serviços</a><br> <!-- Aba serviços-->
  <a href="Aba-Contatos.html">Contatos</a><br> <!-- Aba contatos-->
  <a href="Aba-Sobre-Nós.html">Sobre Nós</a><br> <!-- Aba sobre nós-->
  <a href="Aba-Informações.html">Informações</a><br> <!-- Aba informações-->
</div>
<script> // Função para mostrar ou esconder o menu hamburguer
  function mostrarOuEsconder() {
    const elemento = document.getElementById("menuHamburguer");
    elemento.hidden = !elemento.hidden;
  }

  function cadastro(){
    window.location.href = "cadastro.php";
  }
</script>
            </div>
<!-- Fim Menu Interativo-->                

</form>          
  </div>
</body>
<footer>
  

</footer>
</html>