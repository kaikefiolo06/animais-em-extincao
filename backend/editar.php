<?php
include "conexao.php";

$id = $_POST['id'];
$imagem = $_POST['imagem'];
$nome = $_POST['nome'];
$especie = $_POST['especie'];
$status = $_POST['status'];

$sql = "UPDATE animais SET
        imagem='$imagem',
        nome='$nome',
        especie='$especie',
        status='$status'
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Animal atualizado com sucesso!'); window.location='../DataTable.php';</script>";
} else {
    echo "<script>alert('Erro ao atualizar.'); window.location='../DataTable.php';</script>";
}
?>
