<?php
require_once __DIR__ . '/controller/usuariocontroller.php';
require_once __DIR__ . '/controller/ImovelController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['salvarImovel'])) {
        ImovelController::salvar();
    } elseif (isset($_POST['salvar'])) {
        UsuarioController::salvar();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Imobiliário</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Sistema Imobiliário</a>
        <div>
            <a class="btn btn-outline-primary" href="index.php">Cadastrar usuário</a>
            <a class="btn btn-outline-primary" href="index.php?action=listar">Listar usuários</a>
            <a class="btn btn-outline-success" href="index.php?action=cadastrarImovel">Cadastrar imóvel</a>
            <a class="btn btn-outline-success" href="index.php?action=listarImoveis">Listar imóveis</a>
        </div>
    </nav>
    <?php
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'editar':
                $usuario = isset($_GET['id']) ? UsuarioController::editar($_GET['id']) : false;
                require __DIR__ . '/view/cadusuario.php';
                break;
            case 'listar':
                $usuarios = UsuarioController::listar();
                require __DIR__ . '/view/listusuario.php';
                break;
            case 'excluir':
                if (isset($_GET['id'])) {
                    UsuarioController::excluir($_GET['id']);
                }
                $usuarios = UsuarioController::listar();
                require __DIR__ . '/view/listusuario.php';
                break;
            case 'cadastrarImovel':
                require __DIR__ . '/view/cadImovel.php';
                break;
            case 'listarImoveis':
                $imoveis = ImovelController::listar();
                require __DIR__ . '/view/listImovel.php';
                break;
            case 'editarImovel':
                $imovel = isset($_GET['id']) ? ImovelController::editar($_GET['id']) : false;
                require __DIR__ . '/view/cadImovel.php';
                break;
            case 'excluirImovel':
                if (isset($_GET['id'])) {
                    ImovelController::excluir($_GET['id']);
                }
                $imoveis = ImovelController::listar();
                require __DIR__ . '/view/listImovel.php';
                break;
            default:
                require __DIR__ . '/view/cadusuario.php';
        }
    } else {
        require __DIR__ . '/view/cadusuario.php';
    }
    ?>
</body>
</html>
