<?php
require_once __DIR__ . '/../model/imovel.php';

class ImovelController
{
    public static function salvar()
    {
        $imovel = new Imovel();
        $imovel->setId(isset($_POST['id']) ? $_POST['id'] : 0);
        $imovel->setDescricao(trim($_POST['descricao']));
        $imovel->setFoto(trim($_POST['foto']));
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);
        $imovel->save();

        header('Location: index.php?action=listarImoveis');
        exit;
    }

    public static function listar()
    {
        return (new Imovel())->listar();
    }

    public static function editar($id)
    {
        return (new Imovel())->find($id);
    }

    public static function excluir($id)
    {
        (new Imovel())->remove($id);
        header('Location: index.php?action=listarImoveis');
        exit;
    }
}
