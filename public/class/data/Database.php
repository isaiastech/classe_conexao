<?php

namespace class\data;

use mysqli;
use Exception;

class Database
{
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $envPath = realpath(dirname(__FILE__, 2) . '/../../env.ini');

        if (!$envPath) {
            throw new Exception("Erro: O arquivo de configuração 'env.ini' não foi encontrado.");
        }

        $env = parse_ini_file($envPath);
        if (!$env) {
            throw new Exception("Erro: Não foi possível carregar o arquivo de configuração 'env.ini'.");
        }

        $this->conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);
        if ($this->conn->connect_error) {
            throw new Exception("Erro de conexão: " . $this->conn->connect_error);
        }
    }

    public function getResultFromQuery($sql, $params = [])
    {
        // Prepara a consulta
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Erro ao preparar a consulta: " . $this->conn->error);
        }

        // Vincula os parâmetros, se houver
        if ($params) {
            // Cria um array com tipos dos parâmetros
            $types = str_repeat('s', count($params)); // Assume que todos os parâmetros são strings
            $stmt->bind_param($types, ...$params);
        }

        // Executa a consulta
        if (!$stmt->execute()) {
            throw new Exception("Erro ao executar a consulta: " . $stmt->error);
        }

        // Retorna o resultado
        return $stmt->get_result();
    }

    public function close()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
