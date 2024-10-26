<?php
require "vendor/autoload.php";

use class\data\Database;

try {
    // Criar uma instância da classe Database
    $db = new Database();
    
    // Definindo a consulta SQL com parâmetros
    $sql = "SELECT id, nome, email FROM users WHERE level = ?";
    $params = ['user']; // Exemplo de parâmetro
    
    // Executando a consulta e armazenando o resultado
    $result = $db->getResultFromQuery($sql, $params);

    // Verificando se a consulta retornou resultados
    if ($result->num_rows > 0) {
        // Iterando sobre cada linha do resultado
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row['id'] . " - Nome: " . $row['nome'] . " - Email: " . $row['email'] . "<br>";
        }
    } else {
        echo "Nenhum registro encontrado.";
    }

    // Fechar a conexão
    $db->close();
} catch (Exception $e) {
    // Tratamento de erro
    echo "Erro: " . $e->getMessage();
}
?>
