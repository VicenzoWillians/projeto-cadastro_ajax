<?php
    $id_estado=$_GET["estado"];

    include('inc/conexao.inc');

    $cidades = "SELECT id, nome FROM cidades WHERE id_estado='$id_estado'";
    $query=mysqli_query($con, $cidades);

    echo $cidades;

    if($cidades){
        if(mysqli_num_rows($query)>0){
            while(($resultado=mysqli_fetch_assoc($query))!=null){
                echo '<option value="' . $resultado['id'] . '">' . utf8_encode($resultado['nome']) . '</option>';
            }
        }
    } else{
        echo "Erro de Sintaxe SQL</br>";
         echo mysqli_error($con);
    }
    
    mysqli_close($con);
?>