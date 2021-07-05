<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT ID_FUNCAO, TITULO_FUNCAO, SALARIO_MINIMO, SALARIO_MAXIMO FROM FUNCAO ORDER BY TITULO_FUNCAO";
    $resultado = $conexao->query($sql);

?>

<table border='1'>
    <tr>
        <th>ID FUNÇÃO</th>
        <th>TÍTULO FUNÇÃO</th>
        <th>SALÁRIO MÍNIMO</th>
        <th>SALÁRIO MÁXIMO</th>
    </tr>

    <?php
        foreach($resultado as $i=>$t){
            echo "<tr>
                    <td>".$t["ID_FUNCAO"]."</td>
                    <td>".$t["TITULO_FUNCAO"]."</td>
                    <td>".$t["SALARIO_MINIMO"]."</td>
                    <td>".$t["SALARIO_MAXIMO"]."</td>
                  </tr>";
        }
    ?>
</table>
</body>
</html>