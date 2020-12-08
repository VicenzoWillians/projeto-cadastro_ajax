<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Consulta de Pessoas | Projeto - Terceiro Bimestre</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/table.css"/>
    </head>
    <body>
        <?php
            include 'inc/cabecalho.inc';
            include 'inc/menu.inc';
        
            include('inc/conexao.inc');

            $consulta = "SELECT * FROM pessoa";
            $query=mysqli_query($con, $consulta);

            if($consulta){
                if(mysqli_num_rows($query)>0){
                    include('inc/tabela.inc');
                    while(($resultado=mysqli_fetch_assoc($query))!=null){
                        echo '<tr>
                            <td>' . $resultado['id_pessoa'] . '</td>
                            <td>' . $resultado['nome_pessoa'] . '</td>
                            <td>' . $resultado['endereco_pessoa'] . '</td>
                            <td>' . $resultado['telefone_pessoa'] . '</td>
                            <td>' . $resultado['email_pessoa'] . '</td>
                            <td>' . $resultado['idade_pessoa'] . '</td>';
                            
                        $consulta_cidade = "SELECT * FROM cidades";
                        $query_cidade=mysqli_query($con, $consulta_cidade);
                        if($consulta_cidade){
                            while(($resultado_cidade=mysqli_fetch_assoc($query_cidade))!=null){
                                if($resultado['id_cidade']==$resultado_cidade['id']){
                                    echo '<td>' . utf8_encode($resultado_cidade['nome']) . '</td>';
                                }
                            }
                        }

                        $consulta_estado = "SELECT * FROM estados";
                        $query_estado=mysqli_query($con, $consulta_estado);
                        if($consulta_estado){
                            while(($resultado_estado=mysqli_fetch_assoc($query_estado))!=null){
                                if($resultado['id_estado']==$resultado_estado['id']){
                                    echo '<td>' . $resultado_estado['uf'] . '</td>';
                                }
                            }
                        }
                    }
                    include('inc/fim_tabela.inc');
                } else{
                    echo "<h3>Nenhuma Pessoa Cadastrada</h3>";
                }
            } else{
                echo "Erro de Sintaxe SQL<br/>";
                echo mysqli_error($con);
            }

            include 'inc/rodape.inc';
        ?>
    </body>
</html>