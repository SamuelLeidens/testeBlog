<?php
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
        default:
            # code...
            break;
    }
}
?>

<?php if ($mensagem != '') {
?>
    <section>
        <?php echo $mensagem;
        ?>
    </section>
<?php }
?>

<section>

    <a href='cadastrar'>
        <button class='btn btn-success'>Cadastrar</button>
    </a>

    <?php if (count($Noticias) == 0) {
    ?>
        <div class='alert alert-secondary mt-3'>Nenhuma Noticias encontrada</div>
    <?php } else {
    ?>
        <div class='card-deck'>
        <?php foreach ($Noticias as $key => $value) { ?>
            <div class='card'>
            <img src='assets/img/xj6.png' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title'><?php echo $value->titulo; ?></h5>
                <p class='card-text'><?php echo $value->descricao; ?></p>
                <p class='card-text'><small class='text-muted'><?php echo $value->data; ?></small></p>
                <p class='card-text'><small class='text-muted'><?php echo $value->autor; ?></small></p>
                <?php echo ($value->status == 's' ? 'Ativo' : 'Inativo') ?></td>
                <a href="editar.php?id=<?php echo $value->id; ?>">
                    <button type='button' class='btn btn-primary'>Editar</button>
                </a>

                <a href="excluir.php?id=<?php echo $value->id; ?>">
                    <button type='button' class='btn btn-danger'>Excluir</button>
                </a>
            </div>
        </div>
        <?php } ?>
        </div>
    <?php }
    ?>

    
</section>
