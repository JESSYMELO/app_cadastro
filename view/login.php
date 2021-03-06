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
        <img src="../assets/imagens/logoasbavi2.jpg" class="rounded mx-auto d-block ">
        <h1>Usuários</h1>
        <?php
            if ($_POST){
                include '../vendor/autoload.php';
                $u = new \App\Model\Usuario();
                $u->setEmail($_POST['email']);
                $u->setSenha($_POST['senha']);

                $uDao = new \App\DAO\UsuarioDAO();
                if ($uDao->login($u))
                    header("Location: atleta-pesquisar.php");
                else
                    echo "<div class='alert alert-danger'>E=mail ou senha incorretos!</div>";

            }
        ?>

        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="nome.sobrenome@gmail.com" class="form-control">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" class="form-control">
            </div>
            <input type="submit" value="Logar" class="btn btn-success col-12">
        </form>
    </div>
</body>
</html>