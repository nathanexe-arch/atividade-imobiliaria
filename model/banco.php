<?php
require_once __DIR__ . '/../view/conexao.php';

class Banco extends Conexao
{
    public function conectar()
    {
        return $this->getConexao();
    }
}
