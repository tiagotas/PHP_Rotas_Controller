<html lang="pt-br">
    <head>
        <title>CADASTRAR CATEGORIA</title>
        <meta charset="utf8" />
    </head>
    <body>
        <div id="global">
            
            <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

            <main>
                <form method="post" action="/categoria/salvar">
                    
                    <label>Descrição (Nome) da categoria:
                        <input name="descricao" value="<?= isset($dados_categoria) ? $dados_categoria->descricao : "" ?>" type="text" />
                    </label>

                    <?php if(isset($dados_categoria)): ?>
                        <input name="id" type="hidden" value="<?= $dados_categoria->id ?>" />

                        <a href="/categoria/excluir?id=<?= $dados_categoria->id ?>">
                            EXCLUIR
                        </a>

                    <?php endif ?>

                    <button type="submit">Salvar</button>
                </form>
            </main>

             <?php include PATH_VIEW . 'includes/rodape.php' ?>
             
        </div>
    </body>
</html>