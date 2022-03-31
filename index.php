<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Noticias;
    $Noticias = Noticias::getNoticias();
    // echo "<pre>"; print_r($Noticias); echo"</pre>"; exit;

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/listagem.php';
    require __DIR__.'/includes/footer.php';
?>