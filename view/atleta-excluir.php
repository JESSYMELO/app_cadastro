<?php
/**
 * Created by PhpStorm. */

include '../vendor/autoload.php';

//Verificar se o usuario está logado
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();


$p = new \App\Model\Atleta();
$p->setId($_GET['id']);

$pDAO = new \App\DAO\AtletaDAO();
if ($pDAO->excluir($p))
    header("Location:atleta-pesquisar.php?msg=1");