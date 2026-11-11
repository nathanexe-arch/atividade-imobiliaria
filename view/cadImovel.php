<?php
$imovelAtual = isset($imovel) ? $imovel : false;
$descricao = $imovelAtual ? $imovelAtual->getDescricao() : '';
$foto = $imovelAtual ? $imovelAtual->getFoto() : '';
$valor = $imovelAtual ? $imovelAtual->getValor() : '';
$tipoAtual = $imovelAtual ? $imovelAtual->getTipo() : '';
?>

<div class="container mt-4">
    <h2><?php echo $imovelAtual ? 'Editar imóvel' : 'Cadastrar imóvel'; ?></h2>
    <form method="POST" action="index.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($imovelAtual ? $imovelAtual->getId() : '', ENT_QUOTES, 'UTF-8'); ?>">

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" maxlength="200" value="<?php echo htmlspecialchars($descricao, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto (nome do arquivo)</label>
            <input type="text" class="form-control" id="foto" name="foto" maxlength="30" value="<?php echo htmlspecialchars($foto, ENT_QUOTES, 'UTF-8'); ?>">
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" class="form-control" id="valor" name="valor" min="0" step="0.01" value="<?php echo htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select class="form-control" id="tipo" name="tipo" required>
                <option value="">Selecione</option>
                <option value="C" <?php echo $tipoAtual === 'C' ? 'selected' : ''; ?>>Casa</option>
                <option value="A" <?php echo $tipoAtual === 'A' ? 'selected' : ''; ?>>Apartamento</option>
                <option value="T" <?php echo $tipoAtual === 'T' ? 'selected' : ''; ?>>Terreno</option>
            </select>
        </div>

        <button type="submit" name="salvarImovel" class="btn btn-primary">Salvar</button>
        <a href="index.php?action=listarImoveis" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
