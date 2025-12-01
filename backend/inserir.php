<?php
include "conexao.php";

$imagem = $_POST['imagem'];
$nome = $_POST['nome'];
$especie = $_POST['especie'];
$status = $_POST['status'];

$sql = "INSERT INTO animais (imagem, nome, especie, status)
        VALUES ('$imagem', '$nome', '$especie', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Animal cadastrado com sucesso!');
            window.location='../DataTable.php';
          </script>";
} else {
    echo "<script>
            alert('Erro ao cadastrar.');
            window.location='../DataTable.php';
          </script>";
}
?>