<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT ID_LOCALIZACAO, ENDERECO, CEP, CIDADE, ESTADO, ID_PAIS FROM LOCALIZACAO 
                                            INNER JOIN 
                                        PAIS ON LOCALIZACAO.ID_PAIS = PAIS.ID_PAIS
                                     ORDER BY CIDADE";
    
    $resultado = $conexao->query($sql);

?>

<table border='1'>
    <tr>
        <th>ID LOCALIZAÇÃO</th>
        <th>ENDEREÇO</th>
        <th>CEP</th>
        <th>CIDADE</th>
        <th>ESTADO</th>
        <th>ID PAÍS</th>
    </tr>

    <?php
        foreach($resultado as $i=>$t){
            echo "<tr>
                    <td>".$t["ID_LOCALIZACAO"]."</td>
                    <td>".$t["ENDERECO"]."</td>
                    <td>".$t["CEP"]."</td>
                    <td>".$t["CIDADE"]."</td>
                    <td>".$t["ESTADO"]."</td>
                    <td>".$t["ID_PAIS"]."</td>
                  </tr>";
        }
    ?>
</table>
</body>
</html>