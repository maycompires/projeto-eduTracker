<?php
require_once 'config.php';

$senhaAcesso = "123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senhadigitada = $_POST['senha'];

    // DIGITOU A SENHA CERTO
    if ($senhadigitada === $senhaAcesso) {
        $sqlAlunos = "SELECT * FROM cadastro_alunos";
        $resultAlunos = $conn->query($sqlAlunos);

        $sqlCursos = "SELECT * FROM cadastro_cursos";
        $resultCursos = $conn->query($sqlCursos);
    } else {
        echo "<h3>Senha Incorreta!</h3>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessar Cadastros</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<h1>Acesso Cadastros</h1>
<div class="acesso-form">
    <form method="post">
        <label for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Digite a senha de acesso" required>
        <button type="submit">Enviar</button>
    </form>
</div>


    <?php if (isset($resultAlunos) && $resultAlunos->num_rows > 0) : ?>
        <div class="listaAlunos">
            <h2 style="text-align:center">Lista de Alunos</h2>
            <ul>
                <?php while ($row = $resultAlunos->fetch_assoc()) : ?>
                    <li>
                        <strong>Nome: </strong> <?php echo $row["nome"]; ?><br>
                        <strong>Email: </strong> <?php echo $row["email"]; ?><br>
                        <strong>Telefone: </strong> <?php echo $row["telefone"]; ?><br>
                        <strong>Data e Hora: </strong> <?php echo $row["data"] . " às " . $row["hora"]; ?><br><br>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (isset($resultCursos) && $resultCursos->num_rows > 0) : ?>
        <div class="listaCursos ">
            <h2 style="text-align:center">Lista de Cursos</h2>
            <ul>
                <?php while ($row = $resultCursos->fetch_assoc()) : ?>
                    <li>
                        <strong>Nome do Curso: </strong> <?php echo $row["nomeCurso"]; ?><br>
                        <strong>Descrição: </strong> <?php echo $row["descricao"]; ?><br>
                        <strong>Carga Horária: </strong> <?php echo $row["cargaHoraria"] . " Horas"; ?><br>
                        <strong>Data e Hora: </strong> <?php echo $row["data"] . " às " . $row["hora"]; ?><br><br>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="button-voltar">
        <button><a href="http://localhost/projeto-eduTracker/">Voltar</a></button>
    </div>

</body>

</html>
