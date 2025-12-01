<?php
include "conexao.php";

$id = $_GET['id'];

$sql = "DELETE FROM animais WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Animal removido com sucesso!'); window.location='../DataTable.php';</script>";
} else {
    echo "<script>alert('Erro ao remover.'); window.location='../DataTable.php';</script>";
}
?>
