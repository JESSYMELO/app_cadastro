<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="login.php">Login</a>
        <a class="navbar-brand" href="lista-atleta.php">Atletas</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">

                <li class="nav-item"><a href="atleta-inserir.php" class="nav-link">Novo atleta</a></li>
                <li class="nav-item"><a href="atleta-pesquisar.php" class="nav-link">Pesquisar Atleta</a></li>

            </ul>
        </div>
        <a class="navbar-brand" href="logoff.php">Sair</a>

    </nav>
    <div class="container">

