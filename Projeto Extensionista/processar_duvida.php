<?php

$host = "localhost";
$user = "root";
$password = ""; 
$dbname = "silagem";


$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}


$nome = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['phone'] ?? '';
$duvida = $_POST['message'] ?? '';


$stmt = $conn->prepare("INSERT INTO duvidas (nome, email, telefone, duvida) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $email, $telefone, $duvida);


if ($stmt->execute()) {
    
} else {
    echo "Erro: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
