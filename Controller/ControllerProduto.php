<?php

class ControllerProduto {

    public static function index()
    {
        $produto_dao = new ProdutoDAO();
        $lista_produtos = $produto_dao->getAllRows();
        $total_produtos = count($lista_produtos);

        include 'Views/modulos/produto/listar_produtos.php';
    }

    public static function ver()
    {
        if(isset($_GET['id']))
        {
            $produto_dao = new ProdutoDAO();

            $dados_produto = $produto_dao->getById($_GET['id']);

            include 'Views/modulos/produto/cadastrar_produto.php';

        } else 
            header("Location: /produto"); 
    }

    public static function cadastrar()
    {
        $categoria_dao = new CategoriaDAO();
        $lista_categorias = $categoria_dao->getAllRows();
        $total_categorias = count($lista_categorias);

        $marca_dao = new MarcaDAO();
        $lista_marcas = $marca_dao->getAllRows();
        $total_marcas = count($lista_marcas);

        include 'Views/modulos/produto/cadastrar_produto.php';
    }

    public static function salvar() 
    {
        $produto_dao = new ProdutoDAO();

        $dados_para_salvar= array(
            'id_marca' => $_POST["id_marca"],
            'id_categoria' => $_POST["id_categoria"],
            'descricao' => $_POST["descricao"],
            'preco' => $_POST["preco"],
        );

        if(isset($_POST['id'])) {

            $dados_para_salvar['id'] = $_POST["id"];

            $produto_dao->update($dados_para_salvar);
        } else {

            $produto_dao->insert($dados_para_salvar);
        } 

        header("Location: /produto");
    }

    public static function excluir() 
    {
        $produto_dao = new ProdutoDAO();
        $produto_dao->delete($_GET['id']);
        
        header("Location: /produto");
    }
}