<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT ID_FUNCIONARIO, DATA_INICIAL, DATA_FINAL, ID_FUNCAO, ID_DEPARTAMENTO FROM HISTORICO_FUNCOES 
                                            INNER JOIN 
                                        FUNCIONARIO ON HISTORICO_FUNCOES.ID_FUNCIONARIO = FUNCIONARIO.ID_FUNCIONARIO
                                            INNER JOIN 
                                        FUNCAO ON HISTORICO_FUNCOES.ID_FUNCAO = FUNCAO.ID_FUNCAO
                                            INNER JOIN 
                                        DEPARTAMENTO ON HISTORICO_FUNCOES.ID_DEPARTAMENTO = DEPARTAMENTO.ID_DEPARTAMENTO
                                     ORDER BY ID_FUNCIONARIO";
    
    $resultado = $conexao->query($sql);

?>

<table border='1'>
    <tr>
        <th>ID FUNCIONÁRIO</th>
        <th>DATA INICIAL</th>
        <th>DATA FINAL</th>
        <th>ID FUNÇÃO</th>
        <th>ID DEPARTAMENTO</th>
    </tr>

    <?php
        foreach($resultado as $i=>$t){
            echo "<tr>
                    <td>".$t["ID_FUNCIONARIO"]."</td>
                    <td>".$t["DATA_INICIAL"]."</td>
                    <td>".$t["DATA_FINAL"]."</td>
                    <td>".$t["ID_FUNCAO"]."</td>
                    <td>".$t["ID_DEPARTAMENTO"]."</td>
                  </tr>";
        }
    ?>
</table>
</body>
</html>