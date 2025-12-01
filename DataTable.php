

<?php
  include "backend/conexao.php";
  $result = $conn->query("SELECT * FROM animais");
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/DataTable.css" />

  <title>Dados</title>
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
    <h1>Animais em Extinção</h1>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Espécie</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
          <?php while($a = $result->fetch_assoc()): ?>
            <tr>
                <td style="text-align:center;">
                  <img src="<?= $a['imagem'] ?>" alt="Imagem" style="width:120px; height:auto; border-radius:6px;">
                </td>
                <td><?= $a['nome'] ?></td>
                <td><?= $a['especie'] ?></td>
                <td><?= $a['status'] ?></td>

                <td>
                  <a 
                    href="Editar.php?id=<?= $a['id'] ?>" 
                    style="padding:6px 10px; background:#4CAF50; color:white; text-decoration:none; border-radius:4px;">
                    Editar
                  </a>

                  <a 
                    href="backend/deletar.php?id=<?= $a['id'] ?>" 
                    onclick="return confirm('Tem certeza que deseja deletar este animal?')"
                    style="padding:6px 10px; background:#E91E63; color:white; text-decoration:none; border-radius:4px; margin-left:5px;">
                    Deletar
                  </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </main>

  <footer>
    <p>© 2025 Projeto Educativo - Animais em Extinção</p>
  </footer>

  <script src="./js/Script.js"></script>
</body>
</html>
