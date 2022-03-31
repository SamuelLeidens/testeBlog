<?php

namespace App\Entity;

use \App\db\Database;
use \PDO;

class Noticias
{
    /**
     * Identificado unico da Noticias
     * @var integer
     */
    public $id;

    /**
     * Titulo da Noticias
     *@var string 
     */
    public $titulo;

    /**
     * Descrição da Noticias (pode conter html)
     * @var string 
     */
    public $descricao;

    /**
     * Descrição da Noticias (pode conter html)
     * @var string 
     */
    public $autor;

    /**
     * Define a Noticia está ativa (s ou n)
     * @var timestamp 
     */
    public $data;

    /**
     * Função para cadastrar a noticia no banco
     * @return boolean 
     */
    public function cadastrar()
    {
        //definir a data
        // $this->data = date('Y-m-d H:i:s'); echo "<pre>";print_r($this); echo "</pre>"; exit;

        //Inserir a vaga no banco e retornar o ID
        $objDataBase = new Database('noticias');
        $this->id = $objDataBase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'autor' => $this->autor,
            'status' => $this->status,
            'data' => $this->data,
        ]);

        return true;
    }


    /**
     * Metodo responsavel por obeter as noticias do banco de dados
     * @params string $where
     * @params string $order
     * @params string $limit
     * @return array
     */

    public static function getNoticias($where = null, $order = null, $limit = null)
    {
        $objDataBase = new Database('noticias');
        return ($objDataBase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    /**
     * Método responsável por obter as vagas do banco de dados
     * @params int $id
     * @Return Vaga
     */

    public static function getNoticia($id) {
        $objDatabase = new Database ('noticias');

        return ($objDatabase)->select('id = ' . $id)->fetchObject(self::class); 
    }

    /** Funcao para excluir vagas no banco
     * @return boolean
     */

    public function excluir() {
        $objDatabase = new Database('noticias');
        return ($objDatabase)->delete( 'id = ' . $this->id);

    }
     public function atualizar () {
        //Definir a data
        $this->data = date('Y-m-d H:i:s');

        $objDatabase = new Database('noticias');

        return ($objDatabase)->update('id = ' . $this->id, [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'autor' => $this->autor,
            'status' => $this->status,
            'data' => $this->data,
        ]);
    }
}
?>  