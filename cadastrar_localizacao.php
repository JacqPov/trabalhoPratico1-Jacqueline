<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";
    include "conexao.php";

    if(!empty($_POST)){        
        $endereco = $_POST["ENDERECO"];
        $cep = $_POST["CEP"];
        $cidade = $_POST["CIDADE"];
        $estado = $_POST["ESTADO"];
        $id_pais = $_POST["ID_PAIS"];
        $sql = "INSERT INTO LOCALIZACAO VALUES('$endereco','$cep','$cidade', '$estado', '$id_pais')";
        $conexao->query($sql);
        echo "<span class='ok'>Localização inserida com sucesso</span><br />";
    }

    $v["method"]="post";
    $v["action"]="#";
    $v["titulo"]="Cadastro de Localização";

    $f = new Formulario($v);

    $v = null;
    $v["type"]="text";
    $v["name"]="ENDERECO";
    $v["placeholder"]="Digite o endereço...";
    $v["id"]="endereco_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="text";
    $v["name"]="CEP";
    $v["placeholder"]="Digite o CEP...";
    $v["id"]="cep_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="text";
    $v["name"]="CIDADE";
    $v["placeholder"]="Digite a cidade...";
    $v["id"]="cidade_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="text";
    $v["name"]="ESTADO";
    $v["placeholder"]="Digite o estado...";
    $v["id"]="estado_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["name"]="ID_PAIS";
    $ol["label_select"] = "::Selecione o País::";

    $sql = "SELECT * FROM PAIS ORDER BY NOME_PAIS";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

   
    foreach($resultado as $i=>$t){
        $options[$i]["value"]=$t["ID_PAIS"];
        $options[$i]["label_option"]=$t["NOME_PAIS"];        
    }
    

    $s = new Select($v,$ol,$options);
    $f->adiciona_elemento($s);

    $v = null;
    $v["type"]="submit";    
    $v["name"]="input";    
    $v["value"]="Enviar";
    $i = new Input($v);

    $f->adiciona_elemento($i);
    
    $f->exibir();
?>