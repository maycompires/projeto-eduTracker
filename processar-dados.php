<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // VERIFICA DE O FORMULARIO DE ALUNOS FOI ENVIADO
    if (isset($_POST['nome'])) {
        // PEGANDO OS DADOS VINDOS DO FORMULÁRIO CADASTRO ALUNO
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_atual = date('d/m/Y'); 
        $hora_atual = date('H:i:s'); 

        // PREPARAR COMANDO PARA TABELA ALUNO
        $smtp = $conn->prepare("INSERT INTO cadastro_alunos (nome, email, telefone, data, hora) VALUES (?,?,?,?,?)");
        $smtp->bind_param("sssss", $nome, $email, $telefone, $data_atual, $hora_atual);

        // SE EXECUTAR CORRETAMENTE
        if ($smtp->execute()) {
            echo '<script>alert("Aluno cadastrado com sucesso!");</script>';
            echo '<script>window.location.href = "index.html";</script>';
        } else {
            echo '<script>alert("Erro ao cadastrar aluno!");</script>';
        }

        $smtp->close();
    }

    // VERIFICA SE O FORMULÁRIO DE CURSOS FOI ENVIADO
    if (isset($_POST['nomeCurso'])) {
        // PEGANDO OS DADOS VINDOS DO FORMULÁRIO CADASTRO CURSO
        $nomeCurso = $_POST['nomeCurso'];
        $descricao = $_POST['descricaoCurso'];
        $cargaHoraria = $_POST['cargaHorariaCurso'];
        $data_atual = date('d/m/Y');
        date_default_timezone_set('America/Sao_Paulo');
        $hora_atual = date('H:i:s'); 

        // PREPARAR COMANDO PARA TABELA CURSO
        $smtpCurso = $conn->prepare("INSERT INTO cadastro_cursos (nomeCurso, descricao, cargaHoraria, data, hora) VALUES (?,?,?,?,?)");
        $smtpCurso->bind_param("sssss", $nomeCurso, $descricao, $cargaHoraria, $data_atual, $hora_atual);

        // SE EXECUTAR CORRETAMENTE
        if ($smtpCurso->execute()) {
            echo '<script>alert("Curso cadastrado com sucesso!");</script>';
            echo '<script>window.location.href = "index.html";</script>';
        } else {
            echo '<script>alert("Erro ao cadastrar curso!");</script>';
        }

        $smtpCurso->close();
    }
}

$conn->close();
?>
