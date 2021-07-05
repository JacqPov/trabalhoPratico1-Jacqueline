<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT NOME_PAIS, ID_PAIS, NOME_REGIAO FROM PAIS 
                                            INNER JOIN 
                                        REGIAO ON PAIS.ID_REGIAO = REGIAO.ID_REGIAO
                                     ORDER BY NOME_PAIS";
    
    $resultado = $conexao->query($sql);

?>

<table border='1'>
    <tr>
        <th>ID PAÍS</th>
        <th>NOME PAÍS</th>
        <th>NOME REGIÃO</th>
    </tr>

    <?php
        foreach($resultado as $i=>$t){
            echo "<tr>
                    <td>".$t["ID_PAIS"]."</td>
                    <td>".$t["NOME_PAIS"]."</td>
                    <td>".$t["NOME_REGIAO"]."</td>
                  </tr>";
        }
    ?>
</table>
</body>
</html>