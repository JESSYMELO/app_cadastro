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
            $i->bindValue(":nome", $atleta->getNome());
            $i->bindValue(":idade", $atleta->getIdade());
            $i->bindValue(":altura", $atleta->getAltura());
            $i->bindValue(":posicao", $atleta->getPosicao());
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
        $sql = "delete from $atleta WHERE id = :id";
        try{
            $d = $this->conexao->prepare($sql);
            $d->bindValue(":id", $atleta->getId());
            $d->execute();
            return true;

        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }
    public function pesquisarUm($atleta){
        $sql = "select * from atletas WHERE id = :id";
        try{
            $p1 = $this->conexao->prepare($sql);
            $p1->bindValue(":id", $atleta->getId());
            $p1->execute();
            return $p1->fetch(\PDO::FETCH_ASSOC);
        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }

    }

    public function alterar($atleta){
        $sql =  "update atletas set idade = :idade, altura = :altura, posicao = :posicao, data_nasc = :data_nasc WHERE id = :id";
        try{
            $p = $this->conexao->prepare($sql);
            $p->bindValue("nome", $atleta->getNome());
            $p->bindValue("id", $atleta->getId());
            $p->bindValue("idade", $atleta->getIdade());
            $p->bindValue("altura", $atleta->getAltura());
            $p->bindValue("posicao", $atleta->getPosicao());
            $p->bindValue("data_nasc", $atleta->getData_nasc());
            $p->execute();
            return true;


        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }


}