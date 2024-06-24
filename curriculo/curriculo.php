<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $dataDeNascimento = htmlspecialchars($_POST['dataDeNascimento']);
    $idade = htmlspecialchars($_POST['idade']);
    $resumoPessoal = htmlspecialchars($_POST['resumoPessoal']);
    $sexo = htmlspecialchars($_POST['sexo']);
    $empresas = $_POST['empresa'] ?? [];
    $cargos = $_POST['cargo'] ?? [];
    $descricoes = $_POST['descricao'] ?? [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculo - Resultados</title>
    <link rel="stylesheet" href="curriculo.css">
</head>
<body>
    <div class="resultados">
        <h1>Curriculo</h1>
        <p><strong>Nome:</strong> <?php echo $nome; ?></p>
        <p><strong>Data de Nascimento:</strong> <?php echo $dataDeNascimento; ?></p>
        <p><strong>Idade:</strong> <?php echo $idade; ?></p>
        <p><strong>Resumo Pessoal:</strong> <?php echo nl2br($resumoPessoal); ?></p>
        <p><strong>Sexo:</strong> <?php echo $sexo; ?></p>
        <h3>Experiências Profissionais:</h3>
        <ul>
            <?php if (!empty($empresas)): ?>
                <?php for ($i = 0; $i < count($empresas); $i++): ?>
                    <li>
                        <p><strong>Empresa:</strong> <?php echo htmlspecialchars($empresas[$i]); ?></p>
                        <p><strong>Cargo:</strong> <?php echo htmlspecialchars($cargos[$i]); ?></p>
                        <p><strong>Descrição:</strong> <?php echo nl2br(htmlspecialchars($descricoes[$i])); ?></p>
                    </li>
                <?php endfor; ?>
            <?php else: ?>
                <p>Nenhuma experiência profissional adicionada.</p>
            <?php endif; ?>
        </ul>
        <button onclick="window.print()">Gerar PDF</button>
    </div>
</body>
</html>