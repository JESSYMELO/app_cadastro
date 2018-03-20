<?php
$titulo = "Pesquisa de atleta";
include 'cabecalho.php';?>
    <h1>Pesquisar atleta</h1>
    <br>
    <form class="form-inline" action="atleta-pesquisar.php" method="get">
        <div class="form-group">
            <label for="nome">Nome:</label>

        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: nome" autofocus>
        </div>

        <button type="submit" class="btn btn-primary mb-2">
            <img src="../assets/imagens/pesquisar.svg" alt="Pesquisar"> Pesquisar

        </button>
    </form>
<?php
    include '../vendor/autoload.php';

    //Verificar se o usuario está logado
    $uDAO = new \App\DAO\UsuarioDAO();
    $uDAO->verificar();



    if (isset($_GET['msg']) && $_GET['msg'] == 1)
        echo "<div class='alert alert-success'>Atleta excluído com sucesso!</div>";
    if (isset($_GET['msg']) && $_GET['msg'] == 2)
        echo "<div class='alert alert-success'>Atleta alterado com sucesso!</div>";

    $p = new \App\Model\Atleta();
    isset($_GET['nome']) ? $p->setNome($_GET['nome']) : $p->setNome("");

    $pDAO = new \App\DAO\AtletaDAO();
    $atletas = $pDAO->pesquisar($p);

    if (count($atletas) > 0) {
    ?>
    <table class='table table-striped table-hover'>
        <tr class='text-center'>
            <th>ID</th>
            <th>Nome</th>
            <th class="text-left">Posição</th>
            <th>Idade</th>
            <th>Altura</th>
            <th>Data Nascimento</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($atletas as $atleta){
            echo "<tr class='text-center'>";
            echo "<td>{$atleta->getId()}</td>";
            echo "<td>{$atleta->getNome()}</td>";
            echo "<td class='text-left'>{$atleta->getPosicao()}</td>";
            echo "<td>".\App\Helper\Moeda::get($atleta->getIdade())."</td>";
            echo "<td>".\App\Helper\Moeda::get($atleta->getAltura())."</td>";
            echo "<td>".\App\Helper\Data::get($atleta->getDataNasc())."</td>";
            echo "<td><a class='btn btn-danger' href='atleta-excluir.php?id={$atleta->getId()}'> Excluir</a></td>";
            echo "<td><a class='btn btn-warning' href='atleta-alterar.php?id={$atleta->getId()}'>Alterar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    } else {
        echo "<div class='alert alert-danger'>Não existem atletas com a pesquisa informada!</div>";
}
    include 'rodape.php';?>