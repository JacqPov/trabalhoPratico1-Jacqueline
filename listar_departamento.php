<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT ID_DEPARTAMENTO, NOME_DEPARTAMENTO, ID_GERENTE, ID_LOCALIZACAO FROM DEPARTAMENTO 
                                            INNER JOIN 
                                        LOCALIZACAO ON DEPARTAMENTO.ID_LOCALIZACAO = LOCALIZACAO.ID_LOCALIZACAO
                                     ORDER BY NOME_DEPARTAMENTO";
    
    $resultado = $conexao->query($sql);

?>

<table border='1'>
    <tr>
        <th>ID DEPARTAMENTO</th>
        <th>NOME DEPARTAMENTO</th>
        <th>ID GERENTE</th>
        <th>ID LOCALIZAÇÃO</th>
    </tr>

   <?php
        foreach($resultado as $i=>$t){
            echo "<tr>
                    <td>".$t["ID_DEPARTAMENTO"]."</td>
                    <td>".$t["NOME_DEPARTAMENTO"]."</td>
                    <td>".$t["ID_GERENTE"]."</td>
                    <td>".$t["ID_LOCALIZACAO"]."</td>
                  </tr>";
        }
    ?>
</table>
</body>
</html>