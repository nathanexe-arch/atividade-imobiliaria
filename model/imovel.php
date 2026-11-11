<?php
require_once __DIR__ . '/../view/conexao.php';

class Imovel
{
    private $id;
    private $descricao;
    private $foto;
    private $valor;
    private $tipo;

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setDescricao($descricao) { $this->descricao = $descricao; }
    public function getDescricao() { return $this->descricao; }

    public function setFoto($foto) { $this->foto = $foto; }
    public function getFoto() { return $this->foto; }

    public function setValor($valor) { $this->valor = $valor; }
    public function getValor() { return $this->valor; }

    public function setTipo($tipo) { $this->tipo = $tipo; }
    public function getTipo() { return $this->tipo; }

    public function save()
    {
        $conn = (new Conexao())->getConexao();

        if ($this->id > 0) {
            $query = 'UPDATE imovel SET descricao = :descricao, foto = :foto, valor = :valor, tipo = :tipo WHERE id = :id';
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':descricao' => $this->descricao,
                ':foto' => $this->foto,
                ':valor' => $this->valor,
                ':tipo' => $this->tipo,
                ':id' => $this->id,
            ]);
        } else {
            $query = 'INSERT INTO imovel (descricao, foto, valor, tipo) VALUES (:descricao, :foto, :valor, :tipo)';
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':descricao' => $this->descricao,
                ':foto' => $this->foto,
                ':valor' => $this->valor,
                ':tipo' => $this->tipo,
            ]);
        }

        return $stmt->rowCount();
    }

    public function listar()
    {
        $conn = (new Conexao())->getConexao();
        $stmt = $conn->query('SELECT * FROM imovel ORDER BY id ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $conn = (new Conexao())->getConexao();
        $stmt = $conn->prepare('SELECT * FROM imovel WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return false;
        }

        $imovel = new Imovel();
        $imovel->setId($dados['id']);
        $imovel->setDescricao($dados['descricao']);
        $imovel->setFoto($dados['foto']);
        $imovel->setValor($dados['valor']);
        $imovel->setTipo($dados['tipo']);

        return $imovel;
    }

    public function remove($id)
    {
        $conn = (new Conexao())->getConexao();
        $stmt = $conn->prepare('DELETE FROM imovel WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();
    }
}
