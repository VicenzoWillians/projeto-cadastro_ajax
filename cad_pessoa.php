<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Cadastrar Pessoa | Projeto - Terceiro Bimestre</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/form.css"/>
        <script src="script/jquery-3.5.1.js"></script>
        <script src="script/script.js"></script>
    </head>
    <body>
        <?php
            include 'inc/cabecalho.inc';
            include 'inc/menu.inc';

            if(empty($_POST)){
        ?>
            <h3>Cadastre-se</h3>
            <div class="form">
                <form action="cad_pessoa" method="POST">
                    <p>
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Vicenzo Willians" required/>
                    </p>
                    <p>
                        <label>Endereço</label>
                        <input type="text" name="endereco" placeholder="Rua Nove de Julho" required/>
                    </p>
                    <p>
                        <label>Telefone</label>
                        <input type="text" name="telefone" placeholder="(xx) xxxx-xxxx" required/>
                    </p>
                    <p>
                        <label>E-mail</label>
                        <input type="text" name="email" placeholder="vicenzowillians@gmail.com" required/>
                    </p>
                    <p>
                        <label>Idade</label>
                        <input type="number" name="idade" placeholder="18" min="1" requrired/>
                    </p>
                    <p>
                        <label>Estado</label>
                        <select name="estado" id="estados">
                        <?php
                            include('inc/conexao.inc');

                            $estados = "SELECT id, uf FROM estados";
                            $query=mysqli_query($con, $estados);

                            if($estados){
                                if(mysqli_num_rows($query)>0){
                                    while(($resultado=mysqli_fetch_assoc($query))!=null){
                                        echo '<option value="' . $resultado['id'] . '">' . $resultado['uf'] . '</option>';
                                    }
                                }
                            } else{
                                echo "Erro de Sintaxe SQL</br>";
                                echo mysqli_error($con);
                            }
                            
                            mysqli_close($con);
                        ?>
                        </select>
                    </p>
                    <p id="add_cidades">
                        <label>Cidade</label>
                        <select name="cidade" id="cidades">  </select>                 
                    </p>
                    <p>
                        <input type="submit" value="Cadastrar"/>
                    </p>
                </form>
            </div>

        <?php
            } else{
                $nome=$_POST["nome"];
                $endereco=$_POST["endereco"];
                $telefone=$_POST["telefone"];
                $email=$_POST["email"];
                $idade=$_POST["idade"];
                $cidade=$_POST["cidade"];
                $estado=$_POST["estado"];

                include('inc/conexao.inc');

                $SQL = "INSERT INTO pessoa (nome_pessoa, endereco_pessoa, telefone_pessoa, email_pessoa, idade_pessoa, id_cidade, id_estado)
                    VALUES ('$nome', '$endereco', '$telefone', '$email', '$idade', '$cidade', '$estado')";
            
                $query=mysqli_query($con, $SQL);

                if($query){
                    echo "<h3>$nome Cadastrado(a) com Sucesso</h3>";
                } else{
                    echo mysqli_error($con);
                }

                mysqli_close($con);
            }

            include 'inc/rodape.inc';
        ?>
    </body>
</html>