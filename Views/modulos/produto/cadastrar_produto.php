<html>
    <head>
        <title>Cadastro de Produtos</title>

        <style>
            label, input, select { display: block; padding: 5px}
        </style>

    </head>

    <body>
        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

        <main>
            <form method="post" action="/produto/salvar">

                <label>Descrição (Nome) do produto:
                    <input name="descricao" type="text" value="<?= isset($dados_produto) ? $dados_produto->descricao : "" ?>" />
                </label>

                <label>Preço:
                    <input name="preco" type="number" value="<?= isset($dados_produto) ? $dados_produto->preco : "" ?>" />
                </label>

                <label>Categoria:
                    <select name="id_categoria">
                        <option>Selecione a categoria</option>

                        <?php 
                        
                            for($i=0; $i<$total_categorias; $i++):
                                
                                $selecinado = "";

                                if(isset($dados_produto->id))
                                    $selecinado = ($lista_categorias[$i]->id == $dados_produto->id_categoria) ? "selected" : "";
                            ?>

                        <option value="<?= $lista_categorias[$i]->id ?>" <?= $selecinado ?> >
                            <?= $lista_categorias[$i]->descricao  ?> 
                        </option>

                        <?php endfor ?>

                    </select>
                </label>

                <label>Marca
                    <select name="id_marca">
                        <option>Selecione a marca</option>

                        <?php for($i=0; $i<$total_marcas; $i++): 
                             
                             $selecinado = "";

                             if(isset($dados_produto->id))
                                 $selecinado = ($lista_marcas[$i]->id == $dados_produto->id_marca) ? "selected" : "";
                            
                        ?>
                        <option value="<?= $lista_marcas[$i]->id ?>" <?= $selecinado ?>> 
                            <?= $lista_marcas[$i]->descricao  ?> 
                        </option>
                        <?php endfor ?>
                    </select>
                </label>

                <?php if(isset($dados_produto)): ?>
                        <input name="id" type="hidden" value="<?= $dados_produto->id ?>" />

                        <a href="/produto/excluir?id=<?= $dados_produto->id ?>">
                            EXCLUIR
                        </a>

                    <?php endif ?>

                <button type="submit">Salvar</button>

            </form>
        </main>


        <?php include PATH_VIEW . 'includes/rodape.php' ?>

    </body>

</html>