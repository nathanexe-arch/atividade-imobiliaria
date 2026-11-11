<?php
$usuarioAtual = isset($usuario) ? $usuario : false;
?>

<div class="container mt-4">
    <h2>Cadastro de Usuário</h2>
    <form method="POST" action="index.php">
        <input type="hidden" name="id" value="<?php echo ($usuarioAtual ? $usuarioAtual->getId() : ''); ?>">

        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" name="login" value="<?php echo ($usuarioAtual ? $usuarioAtual->getLogin() : ''); ?>" required>
        </div>

        <div class="form-group">
            <label for="senha1">Senha</label>
            <input type="password" class="form-control" id="senha1" name="senha1" value="<?php echo ($usuarioAtual ? $usuarioAtual->getSenha() : ''); ?>" required>
        </div>

        <div class="form-group">
            <label for="permissao">Permissão</label>
            <select class="form-control" id="permissao" name="permissao">
                <option value="A" <?php echo (($usuarioAtual && $usuarioAtual->getPermissao() == 'A') ? 'selected' : ''); ?>>Administrador</option>
                <option value="C" <?php echo (($usuarioAtual && $usuarioAtual->getPermissao() == 'C') ? 'selected' : ''); ?>>Comum</option>
            </select>
        </div>

        <button type="submit" name="salvar" class="btn btn-primary">Salvar</button>
        <a href="index.php?action=listar" class="btn btn-secondary">Listar usuários</a>
    </form>
</div>
