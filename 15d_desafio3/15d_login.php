<?php
session_start();

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $cor_fundo = $_POST['cor_fundo'] ?? '#ffffff';

    // Conexão com o banco de dados
    $servidor = "localhost";
    $usuario_db = "root";
    $senha_db = "Senai@118";
    $banco = "exercicio";

    $conn = new mysqli($servidor, $usuario_db, $senha_db, $banco);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Consulta preparada para evitar SQL Injection
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Credenciais corretas: salva sessão e redireciona
        $_SESSION['usuario'] = $usuario;
        $_SESSION['cor_fundo'] = $cor_fundo;

        $stmt->close();
        $conn->close();

        header("Location: 15d_perfil.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Perfil de Usuário</title>
</head>
<body>
    <h2>Login do Sistema</h2>

    <?php if (!empty($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>

    <form action="15d_login.php" method="POST">
        <label for="usuario">Usuário:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="cor_fundo">Escolha a cor de fundo do seu perfil:</label><br>
        <input type="color" id="cor_fundo" name="cor_fundo" value="#ffffff"><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>