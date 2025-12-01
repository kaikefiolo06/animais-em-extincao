<?php
include "backend/conexao.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ERRO: ID do animal não foi enviado na URL.");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM animais WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("ERRO: Nenhum animal encontrado com esse ID.");
}

$a = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/Form.css" />

  <title>Editar</title>
</head>
<body>
  <header>
    <navbar class="navbar">
      <nav>
        <a href="./index.html">Home</a>
      </nav>

      <nav>
        <a href="./DataTable.php">Data Table</a>
      </nav>
      
      <nav>
        <a href="./Contact.html">Contato</a>
      </nav>

      <nav>
        <a href="./Developers.html">Developers</a>
      </nav>

      <nav>
        <a href="./Adicionar.php">Adicionar Animal</a>
      </nav>
      
      <button class="botao-tema" onclick="mudarTema()">🌓</button>
    </navbar>
  </header>

  <main>
    <h2>Editar Animal</h2>
  
    <form action="backend/atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?= $a['id'] ?>">
  
        Imagem (URL): <input type="text" name="imagem" value="<?= $a['imagem'] ?>"><br>
        Nome: <input type="text" name="nome" value="<?= $a['nome'] ?>"><br>
        Espécie: <input type="text" name="especie" value="<?= $a['especie'] ?>"><br>
        Status: <input type="text" name="status" value="<?= $a['status'] ?>"><br>
  
        <button type="submit">Salvar</button>
    </form>
  </main>

  <footer>
    <p id="marca">© 2025 Projeto Educativo - Animais em Extinção</p>
  </footer>

  <script src="./js/Script.js"></script>
</body>
</html>