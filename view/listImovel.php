<?php
$imoveis = isset($imoveis) ? $imoveis : [];
$tipos = ['C' => 'Casa', 'A' => 'Apartamento', 'T' => 'Terreno'];
?>

<div class="container mt-4">
    <h2>Imóveis cadastrados</h2>

    <?php if (!empty($imoveis)) : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Foto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($imoveis as $item) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['descricao'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars(isset($tipos[$item['tipo']]) ? $tipos[$item['tipo']] : $item['tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>R$ <?php echo number_format((float) $item['valor'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($item['foto'] ? $item['foto'] : '-', ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="index.php?action=editarImovel&amp;id=<?php echo urlencode($item['id']); ?>">Editar</a>
                            <a class="btn btn-danger btn-sm" href="index.php?action=excluirImovel&amp;id=<?php echo urlencode($item['id']); ?>" onclick="return confirm('Deseja excluir este imóvel?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Nenhum imóvel cadastrado.</div>
    <?php endif; ?>

    <a class="btn btn-primary" href="index.php?action=cadastrarImovel">Cadastrar imóvel</a>
</div>
