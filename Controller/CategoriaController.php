<?php

class CategoriaController {

    public static function index() 
    {
        $categoria_dao = new CategoriaDAO();
        $lista_categorias = $categoria_dao->getAllRows();
        $total_categorias = count($lista_categorias);

        include 'Views/modulos/categoria/listar_categorias.php';
    }

    public static function ver() 
    {
        if(isset($_GET['id']))
        {
            $categoria_dao = new CategoriaDAO();

            $dados_categoria = $categoria_dao->getById($_GET['id']);

            include 'Views/modulos/categoria/cadastrar_categoria.php';
        } else 
            header("Location: /categoria"); 
    }

    public static function cadastrar() 
    {

        include 'Views/modulos/categoria/cadastrar_categoria.php';
    }

    public static function salvar() 
    {
        $categoria_dao = new CategoriaDAO();
    
        $dados_para_salvar= array(
            'descricao' => $_POST["descricao"],
        );
    
        if(isset($_POST['id'])) {
    
            $dados_para_salvar['id'] = $_POST["id"];
    
            $categoria_dao->update($dados_para_salvar);
    
        } else {
    
            $categoria_dao->insert($dados_para_salvar);
    
            echo "Inserido.";
        }
        
        header("Location: /categoria");     
    }

    public static function excluir()
    {
        if(isset($_GET['id']))
        {
            $categoria_dao = new CategoriaDAO();

            $categoria_dao->delete($_GET['id']);

            header("Location: /categoria?excluido=true");
        } else 
            header("Location: /categoria");
    }  
}

