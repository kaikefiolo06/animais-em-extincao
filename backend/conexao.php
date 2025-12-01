<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "trabalho_animais";

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $db");

$conn->select_db($db);

$sqlTabela = "CREATE TABLE IF NOT EXISTS animais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagem VARCHAR(500),
    nome VARCHAR(255),
    especie VARCHAR(255),
    status VARCHAR(100)
)";
$conn->query($sqlTabela);

$result = $conn->query("SELECT COUNT(*) AS total FROM animais");
$row = $result->fetch_assoc();

if ($row["total"] == 0) {
    $jsonPath = __DIR__ . "/../dados.json";
    
    if (file_exists($jsonPath)) {
        $json = file_get_contents($jsonPath);
        $data = json_decode($json, true);

        foreach ($data["animais"] as $a) {
            $imagem = $conn->real_escape_string($a["imagem"]);
            $nome = $conn->real_escape_string($a["nome"]);
            $especie = $conn->real_escape_string($a["especie"]);
            $status = $conn->real_escape_string($a["status"]);

            $sql = "INSERT INTO animais (imagem, nome, especie, status)
                    VALUES ('$imagem', '$nome', '$especie', '$status')";
            $conn->query($sql);
        }
    }
}
?>
