<!-- Importando o arquivo php artigo -->

<?php

require 'config.php';
include 'Artigo.php';
$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();

?>

<!-- Iniciando HTML -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>FivetDigital | Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div id="container">
        <h1>FivetDigital | Meu Blog</h1>
        <?php foreach ($artigos as $artigo) : ?>
        <h2>
            <a href="<?php echo $artigo['link']; ?>">
                <?php echo $artigo['titulo']; ?>
            </a>
        </h2>
        <p>
            <?php echo $artigo['conteudo']; ?>
        </p>
        <?php endforeach; ?>
    </div>
</body>

</html>