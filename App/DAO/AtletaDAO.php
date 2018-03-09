<?php
/**
 * Created by PhpStorm.
 * User: 00554653230
 * Date: 08/03/2018
 * Time: 21:13
 */

namespace App\DAO;


class AtletaDAO extends Conexao

{
    public function inserir($atleta)
    {
        $sql = "insert into atleta (idade, altura, posicao, data_nasc) VALUES (:idade, :altura, :posicao, :data_nasc)";
        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":idade", $atleta->getIdade());
            $i->bindValue(":altura", $atleta->getAltura());
            $i->bindValue(":posicao", $atleta->getposicao());
            $i->bindValue(":data_nasc", $atleta->getData_nasc());
            $i->execute();
            return true;


        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }
    public function pesquisar($atleta = null)
    {
        $sql = "select * from atletas WHERE idade LIKE :idade";
        try{
            $p = $this->conexao->prepare($sql);
            $p->bindValue(":idade", "%".$atleta->getIdade()."%");
            $p->execute();
            return $p->fetchAll(\PDO::FETCH_CLASS, "\App\Model\Atleta");

        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";

        }
    }
    public function excluir($atleta)
    {
        $sql = "delete from produtos WHERE id = :id";
        try{
            $d = $this->conexao->prepare($sql);
            $d->bindValue(":id", $atleta->getId());
            $d->execute();
            return true;

        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }


}