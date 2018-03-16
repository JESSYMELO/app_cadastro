<?php
/**
 * Created by PhpStorm.
 * User: 00554653230
 * Date: 08/03/2018
 * Time: 20:25
 */

namespace App\Model;


class Atleta
{
    private $id;
    private $nome;
    private $idade;
    private $altura;
    private $posicao;
    private $data_nasc;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @param mixed $idade
     */
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @param mixed $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @return mixed
     */
    public function getPosicao()
    {
        return $this->posicao;
    }

    /**
     * @param mixed $posicao
     */
    public function setPosicao($posicao)
    {
        $this->posicao = $posicao;
    }

    /**
     * @return mixed
     */
    public function getDataNasc()
    {
        return $this->data_nasc;
    }

    /**
     * @param mixed $data_nasc
     */
    public function setDataNasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;
    }


}