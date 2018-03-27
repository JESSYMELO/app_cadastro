<?php
$titulo = "Cadastro de Atleta";
include 'cabecalho.php';?>
    <h1>Cadastrar novo Atleta</h1>
<?php
include '../vendor/autoload.php';

//Verificar se o usuario está logado
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();


if ($_POST){
    $p = new \App\Model\Atleta();
    $p->setNome($_POST['nome']);
    $p->setIdade($_POST['idade']);
    $p->setAltura(\App\Helper\Moeda::set($_POST['altura']));

    !empty($_POST['posicao']) ? $p->setPosicao(($_POST['posicao'])) : $p->setPosicao(null);

    !empty($_POST['data_nasc']) ? $p->setDataNasc(\App\Helper\Data::set($_POST['data_nasc'])) : $p->setDataNasc(null);

    $pDAO = new \App\DAO\AtletaDAO();
    if ($pDAO->inserir($p))
        echo "<div class='alert alert-success'>Atleta cadastrado com sucesso!</div>";
}

?>
    <form action="atleta-inserir.php" method="post">
        <div class="form-group">
            <label for="nome"><span class="text-danger">*</span> Nome</label>
            <input type="text" id="nome" name="nome" required autofocus class="form-control" value="<?php echo $resultado['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="idade"><span class="text-danger">*</span> Idade</label>
            <input type="text" id="idade" name="idade" required autofocus class="form-control" value="<?php echo $resultado['idade']; ?>">
        </div>
        <div class="form-group">
            <label for="altura"><span class="text-danger">*</span> Altura</label>
            <input type="text" id="altura" name="altura" required class="form-control" value="<?php echo \App\Helper\Moeda::get($resultado['altura']); ?>">
        </div>
        <div class="form-group">
            <label for="posicao">Posição</label>
            <input type="text" id="posicao" name="posicao" class="form-control" value="<?php echo ($resultado['posicao']); ?>">
        </div>
        <div class="form-group">
            <label for="data_nasc">Data de nascimento</label>
            <input type="date" id="data_nasc" name="data_nasc" class="form-control" value= "<?php echo \App\Helper\Data::get($resultado['data_nasc']); ?>">
        </div>
        <div class="form-group">
            Os campos com <span class="text-danger">*</span> não podem estar em branco.
        </div>
        <button type="submit" class="btn btn-success">
            <img src="../assets/imagens/confirmar.svg" alt="Cadastrar"> Cadastrar
        </button>
    </form>

        <form action="atleta-pesquisar.php">
            <button  type="submit" class="btn btn-info botao">
                <img src = "../assets/imagens/posicoes-no-futsa-alas.png" alt="lista de todos atletas" width="30" height="30"> Lista de todos atletas
            </button>
        </form>


<?php include 'rodape.php';?>