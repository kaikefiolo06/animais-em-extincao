<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/Form.css" />

  <title>Adicionar</title>
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
    <h2>Novo Animal</h2>
  
    <form action="backend/inserir.php" method="POST">
      <label for="imagem">
        <p>Imagem (URL):</p>
        <input type="text" name="imagem" />
      </label>
      <label for="nome">
        <p>Nome:</p>
        <input type="text" name="nome" />
      </label>
      <label for="especie">
        <p>Espécie:</p>
        <input type="text" name="especie" />
      </label>
      <label for="status">
        <p>Status:</p>
        <input type="text" name="status" />
      </label>
  
      <button type="submit">Enviar</button>
    </form>
  </main>

  <footer>
    <p id="marca">© 2025 Projeto Educativo - Animais em Extinção</p>
  </footer>

  <script src="./js/Script.js"></script>
</body>
</html>