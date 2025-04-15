<?php

include_once('conection.php');

if(isset($_POST['submit'])) {
    $usuario = mysqli_real_escape_string($conection, $_POST['usuario']);
    $email = mysqli_real_escape_string($conection, $_POST['email']);
    $senha = mysqli_real_escape_string($conection, $_POST['senha']);

    if(!empty($usuario) && !empty($email) && !empty($senha)){
        $result = mysqli_query($conection, "INSERT INTO login (usuario, email, senha)
        VALUES ('$usuario', '$email', '$senha')");

        if($result){
            header("Location: cadastro.php?sucesso=1");
            exit;
        } else {
            echo "Erro: " . mysqli_error($conection);
        }
    } else {
        echo "Preencha todos os campos!";
    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div class="cadastro">

    <?php
if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
    echo "<p style='color: green;'>Cadastro feito com sucesso! Redirecionando...</p>";
    echo "<script>
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 3000); // redireciona em 3 segundos
    </script>";
}
?>

        <form action="cadastro.php" method="POST">
    <input type="text" name="usuario" id="usuario" placeholder="Usuario:"></button><br>
    <input type="email" name="email" id="email" placeholder="Digite seu email:"><br>
    <input type="password" name="senha" id="senha" placeholder="Digite sua senha:"><br>
    <input type="submit" name="submit" value="Cadastrar"><br>
    <a href="index.php">Voltar inicio</a>
        </form>
    </div>
</body>
</html>