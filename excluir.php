<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Noticias;

    //Validação do ID
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('location: index.php?status=error');
        exit;
    }

    //Consulta Noticias
    $obNoticias = Noticias::getNoticia($_GET['id']);

    //Validação da Noticias
    if(!$obNoticias instanceof Noticias){
        header('location: index.php?status=error');
        exit;
    }

    //Validação do Post
    if(isset($_POST['excluir'])) {
        $obNoticias->excluir();

        header('location: index.php?status=success');
        exit;
    }


    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusao.php';
    require __DIR__.'/includes/footer.php';
?>