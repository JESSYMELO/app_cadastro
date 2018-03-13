<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Atleta</title>
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1>Atletas</h1>
        <?php
            if ($_POST){
                include '../vendor/autoload.php';
                $u = new \App\Model\Usuario();
                $u->setEmail($_POST['email']);
            }







        ?>

</body>
</html>