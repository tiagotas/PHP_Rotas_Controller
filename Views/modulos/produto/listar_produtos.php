<html>
    <head>
        <title>Listar de Produtos</title>
    </head>

    <body>
        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

        <main>
        <table>
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>Id</th>
                        <td>Descricao:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_produtos; $i++): ?>
                    <tr>
                        <td> 
                            <a href="/produto/ver?id=<?= $lista_produtos[$i]->id ?>">
                                Abrir
                            </a> 
                        </td>
                        <td> <?= $lista_produtos[$i]->id ?> </td>
                        <td> <?= $lista_produtos[$i]->descricao  ?> </td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </main>

        <?php include PATH_VIEW . 'includes/rodape.php' ?>

    </body>
</html>