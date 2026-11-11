<?php
$usuarios = isset($usuarios) ? $usuarios : [];
?>

<div class="container mt-4">
    <h2>Lista de Usuários</h2>

    <?php if (isset($usuarios) && !empty($usuarios)) : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Permissão</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo $usuario['login']; ?></td>
                        <td><?php echo $usuario['permissao']; ?></td>
                        <td>
                            <a href="index.php?action=editar&id=<?php echo $usuario['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="index.php?action=excluir&id=<?php echo $usuario['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este usuário?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Nenhum usuário cadastrado.</div>
    <?php endif; ?>

    <a href="index.php" class="btn btn-primary">Cadastrar novo usuário</a>
</div>
