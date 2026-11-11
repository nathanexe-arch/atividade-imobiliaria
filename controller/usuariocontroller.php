<?php
require_once __DIR__ . '/../model/usuario.php';

class UsuarioController
{
    public static function salvar()
    {
        $usuario = new Usuario();
        $usuario->setId(isset($_POST['id']) ? $_POST['id'] : 0);
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha1']);
        $usuario->setPermissao($_POST['permissao']);
        $usuario->save();

        header('Location: index.php?action=listar');
        exit;
    }

    public static function editar($id)
    {
        $usuario = new Usuario();
        return $usuario->find($id);
    }

    public static function excluir($id)
    {
        $usuario = new Usuario();
        $usuario->remove($id);
        header('Location: index.php?action=listar');
        exit;
    }

    public static function listar()
    {
        $usuario = new Usuario();
        return $usuario->listar();
    }
}

