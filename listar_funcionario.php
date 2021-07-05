<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT ID_FUNCIONARIO, NOME, SOBRENOME, EMAIL, TELEFONE, DATA_CONTRATACAO, ID_FUNCAO, SALARIO, COMISSAO, ID_GERENTE, ID_DEPARTAMENTO FROM FUNCIONARIO 
                                            INNER JOIN 
                                        DEPAERTAMENTO ON FUNCIONARIO.ID_DEPARTAMENTO = DEPAERTAMENTO.ID_DEPARTAMENTO
                                            INNER JOIN 
                                        FUNCAO ON FUNCIONARIO.ID_FUNCAO = FUNCAO.ID_FUNCAO
                                            INNER JOIN 
                                        FUNCIONARIO ON FUNCIONARIO.ID_GERENTE = FUNCIONARIO.ID_GERENTE
                                     ORDER BY NOME";
    
    $resultado = $conexao->query($sql);

?>

<table border='1'>
    <tr>
        <th>ID FUNCIONÁRIO</th>
        <th>NOME</th>
        <th>SOBRENOME</th>
        <th>EMAIL</th>
        <th>TELEFONE</th>
        <th>DATA CONTRATAÇÃO</th>
        <th>ID FUNÇÃO</th>
        <th>SALÁRIO</th>
        <th>COMISSÃO</th>
        <th>ID GERENTE</th>
        <th>ID DEPARTAMENTO</th>
    </tr>

    <?php
        foreach($resultado as $i=>$t){
            echo "<tr>
                    <td>".$t["ID_FUNCIONARIO"]."</td>
                    <td>".$t["NOME"]."</td>
                    <td>".$t["SOBRENOME"]."</td>
                    <td>".$t["EMAIL"]."</td>
                    <td>".$t["TELEFONE"]."</td>
                    <td>".$t["DATA_CONTRATACAO"]."</td>
                    <td>".$t["ID_FUNCAO"]."</td>
                    <td>".$t["SALARIO"]."</td>
                    <td>".$t["COMISSAO"]."</td>
                    <td>".$t["ID_GERENTE"]."</td>
                    <td>".$t["ID_DEPARTAMENTO"]."</td>
                  </tr>";
        }
    ?>
</table>
</body>
</html>