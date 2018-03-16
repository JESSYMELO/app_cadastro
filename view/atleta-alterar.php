<?php
$titulo = "Alteração de Atleta";
include 'cabecalho.php';?>
    <h1>Alterar Atleta</h1>
<?php
    include '../vendor/autoload.php';

    //Verificar se o usuario está logado
    $uDAO = new \App\DAO\UsuarioDAO();
    $uDAO->verificar();

    if($_POST){
        $p2 = new \App\Model\Atleta();
        $p2->setId($_POST['id']);
        $p2->setNome($_POST['nome']);
        $p2->setIdade($_POST['idade']);
        $p2->setAltura(\App\Helper\Moeda::set($_POST['altura']));
        !empty($_POST['posicao']) ? $p2->setPosicao(\App\Helper\Moeda::set($_POST['posicao'])) : $p2->setPosicao(null);
        !empty($_POST['data_nasc']) ? $p2->setDataNasc(\App\Helper\Data::set($_POST['data_nasc'])) : $p2->setDataNasc(null);

        $p2DAO = new \App\DAO\AtletaDAO();
        if ($p2DAO->alterar($p2))
            header("Location: atleta-pesquisar.php?msg=2");
    }

    $p = new \App\Model\Atleta();
    isset($_GET) ? $p->setId($_GET['id']) : $p->setId($_POST['id']);

    $pDAO = new \App\DAO\AtletaDAO();
    $resultado = $pDAO->pesquisarUm($p);

?>
    <form action="atleta-alterar.php" method="post">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" id="id" name="id" class="form-control" value="<?php echo $resultado['id']; ?>">
        </div>
        <div class="form-group">
            <label for="nome"><span class="text-danger">*</span>Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $resultado['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="idade"><span class="text-danger">*</span>Idade</label>
            <input type="text" id="idade" name="idade" required class="form-control" value="<?php echo $resultado['idade']; ?>">
        </div>
        <div class="form-group">
            <label for="altura">Altura</label>
            <input type="text" id="altura" name="altura" required class="form-control" value="<?php echo \App\Helper\Moeda::get($resultado['altura']); ?>">
        </div>
        <div class="form-group">
            <label for="posicao">Posição</label>
            <input type="text" id="posicao" name="posicao" class="form-control" value="<?php echo ($resultado['posicao']); ?>">
        </div>
        <div class="form-group">
            <label for="data_nasc"><span class="text-danger">*</span>Data Nascimento</label>
            <input type="date" id="data_nasc" name="data_nasc" class="form-control" value="<?php echo \App\Helper\Data::get( $resultado['data_nasc']); ?>">
        </div>
        <div class="form-group">
            Os campos com <span class="text-danger">*</span> não podem estar em branco.
        </div>
        <button type="submit" class="btn btn-success">
            <img src="../assets/imagens/confirmar.svg" alt="Alterar"> Alterar
        </button>
    </form>
<?php include 'rodape.php';?>