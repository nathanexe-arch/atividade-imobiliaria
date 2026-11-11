<?php
class Conexao
{
    private $host = 'localhost';
    private $db = 'imobiliaria';
    private $user = 'root';
    private $pass = '';

    public function getConexao()
    {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die('Erro ao conectar com o banco: ' . $e->getMessage());
        }
    }
}
