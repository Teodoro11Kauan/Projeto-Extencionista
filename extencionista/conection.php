<?php
    $host = 'localhost';
    $username = 'root';
    $senha = '';
    $database = 'silagem';

    $conection = new mysqli($host, $username, $senha, $database);

    //if ($conection->connect_errno){
    //  echo "Erro ao conectar com o banco de dados";
    //} else {
    //  echo "Conexão efetuada com sucesso";
    //}
?>