<?php
require_once __DIR__ . '/../view/conexao.php';

class Usuario
{
    private $id;
    private $login;
    private $senha;
    private $permissao;

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setLogin($login) { $this->login = $login; }
    public function getLogin() { return $this->login; }

    public function setSenha($senha) { $this->senha = $senha; }
    public function getSenha() { return $this->senha; }

    public function setPermissao($permissao) { $this->permissao = $permissao; }
    public function getPermissao() { return $this->permissao; }

    public function save()
    {
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        if ($this->id > 0) {
            $query = "UPDATE usuario SET login = :login, senha = :senha, permissao = :permissao WHERE id = :id";
            $stmt = $conn->prepare($query);
            if ($stmt->execute([
                ':login' => $this->login,
                ':senha' => $this->senha,
                ':permissao' => $this->permissao,
                ':id' => $this->id,
            ])) {
                $result = $stmt->rowCount();
            }
        } else {
            $query = "INSERT INTO usuario (login, senha, permissao) VALUES (:login, :senha, :permissao)";
            $stmt = $conn->prepare($query);
            if ($stmt->execute([
                ':login' => $this->login,
                ':senha' => $this->senha,
                ':permissao' => $this->permissao,
            ])) {
                $result = $stmt->rowCount();
            }
        }

        return $result;
    }

    public function find($id)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $query = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $conn->prepare($query);

        if ($stmt->execute([':id' => $id])) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($usuario) {
                $obj = new Usuario();
                $obj->setId($usuario['id']);
                $obj->setLogin($usuario['login']);
                $obj->setSenha($usuario['senha']);
                $obj->setPermissao($usuario['permissao']);
                return $obj;
            }
        }

        return false;
    }

    public function remove($id)
    {
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $query = "DELETE FROM usuario WHERE id = :id";
        $stmt = $conn->prepare($query);

        if ($stmt->execute([':id' => $id])) {
            $result = $stmt->rowCount();
        }

        return $result;
    }

    public function listar()
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $query = "SELECT * FROM usuario ORDER BY id ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
