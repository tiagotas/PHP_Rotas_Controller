<?php

class MarcaDAO {

    private $conexao;


    /**
     * Cria uma novo objeto para fazer o CRUD de Marcas.
     */
    public function __construct()
    {
        include_once 'MySQL.php';

        $this->conexao = new MySQL();
    }


    /**
     * Retorna um registro específico da tabela Marca.
     */
    public function getById($id) {

        $stmt = $this->conexao->prepare("SELECT * FROM marca WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();            
    }


    /**
     * Retorna todos os registros da tabela Marca.
     */
    public function getAllRows() {
        
        $stmt = $this->conexao->prepare("SELECT * FROM marca");
        $stmt->execute();

        $arr_marcas = array();

        while($c = $stmt->fetchObject())
            $arr_marcas[] = $c;

        return $arr_marcas;
    }



    /**
     * Método que insere uma categoria na tabela Marca.
     */
    public function insert($dados_marca) {

        $sql = "INSERT INTO marca (descricao) VALUES (?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_marca['descricao']);
        $stmt->execute();
    }


    /**
     * Atualiza um registro na tabela Marca.
     */
    public function update($dados_marca) {

        $sql = "UPDATE marca SET descricao = ? WHERE id = ? ";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_marca['descricao']);
        $stmt->bindValue(2, $dados_marca['id']);
        $stmt->execute();
    }


    /**
     * Remove um registro da tabela Marca.
     */
    public function delete($id) {

        $sql = "DELETE FROM marca WHERE id = ? ";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}

