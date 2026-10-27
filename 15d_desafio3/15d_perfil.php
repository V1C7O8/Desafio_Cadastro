<?php
session_start();

// Redireciona para o login caso não esteja logado
if (!isset($_SESSION['usuario'])) {
    header("Location: 15d_login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$cor_fundo = $_SESSION['cor_fundo'] ?? '#ffffff';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($cor_fundo); ?>;">
    <h2>Bem-vindo, <?php echo htmlspecialchars($usuario); ?>!</h2>
    <p>Esta é a sua página de perfil personalizada.</p>
    
    <br>
    <a href="15d_logout.php">Logout</a>
</body>
</html>