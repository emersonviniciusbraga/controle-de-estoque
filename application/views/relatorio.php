<html>
    <head>
    <title><?= $titulo ?></title>
    <meta charset="utf-8">
    

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
    </head>
    <body>
        <h1><?= $titulo?></h1>
        <table style="font-size: 13px; text-align: center; border: 1px solid black;">
        <thead>
            <tr>
                <th style="border: 1px solid black;">#</th>
                <th style="border: 1px solid black;">Descrição</th>
                <th style="border: 1px solid black;">Unidade</th>
                <th style="border: 1px solid black;">Saldo</th>
                <th style="border: 1px solid black;">Saída</th>
                <th style="border: 1px solid black;">Data Vencimento</th>
            </tr>
        </thead>
        <tbody style="text-align: center; border: 1px solid black;">
            <?php foreach($itens as $i){?>
                            <?php foreach($produtos as $p){?>
                                <?php foreach($fornecedores as $f){?>
                                    <?php if($i['produto_idproduto'] == $p['idproduto']){?>
                                        <?php if($i['fornecedor_idfornecedor'] == $f['idfornecedor']){?>
                                            <?php $a = strtotime($i ['data_vencimento']);
                                                $date = date('d/m/Y', $a);?>
                                            <tr>
                                                <td style="border: 1px solid black;"><?= $i ['iditem'] ?></td>
                                                <td style="border: 1px solid black;"><?= $p ['nome'] ?></td>
                                                <td style="border: 1px solid black;"><?= $p ['unidade'] ?></td>
                                                <td style="border: 1px solid black;"><?= $i ['qtd'] ?></td>
                                                <td style="border: 1px solid black;"><?= $i ['qtd_despachado']?></td>
                                                <td style="border: 1px solid black;"><?= $date ?></td>
                                                
                                                
                                            </tr>
                                        <?php }?>
                                    <?php }?>
                                <?php }?>
                            <?php }?>
                        <?php }?>
                        </tbody>
        </table>
    </body>
</html>