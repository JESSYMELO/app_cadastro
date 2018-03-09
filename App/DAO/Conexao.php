<?php
/**
 * Created by PhpStorm.
 * User: 00554653230
 * Date: 08/03/2018
 * Time: 20:09
 */

namespace App\DAO;


class Conexao
{
    protected $conexao;
    private $database = "db_cadastro";
    private $host = "localhost";
    private $user = "root";
    private $senha = "Suporte99";

    /**
     * Conexao constructor.
     */
    public function __construct()
    {
        $this->conexao = new \PDO("mysql:dbname={$this->database}; host={$this->host}", "{$this->user}", "$this->senha");
        $this->conexao->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }


}