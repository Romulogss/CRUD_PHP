<?php
$dsn = 'mysql:host=localhost;dbname=crud';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    echo "deu certo";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

