<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";
    include "conexao.php";

    if(!empty($_POST)){        
        $nome_departamento = $_POST["NOME_DEPARTAMENTO"];
        $id_gerente = $_POST["ID_GERENTE"];
        $id_localizacao = $_POST["ID_LOCALIZACAO"];
        $sql = "INSERT INTO LOCALIZACAO VALUES('$nome_departamento','$id_gerente', '$id_localizacao')";
        $conexao->query($sql);
        echo "<span class='ok'>Departamento inserido com sucesso</span><br />";
    }

    $v["method"]="post";
    $v["action"]="#";
    $v["titulo"]="Cadastro de Departamento";

    $f = new Formulario($v);

    $v = null;
    $v["type"]="text";
    $v["name"]="NOME_DEPARTAMENTO";
    $v["placeholder"]="Digite o nome do departamento...";
    $v["id"]="nome_departamento_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="number";
    $v["name"]="ID_GERENTE";
    $v["placeholder"]="Digite o id do gerente...";
    $v["id"]="cod_gerente_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["name"]="ID_LOCALIZACAO";
    $ol["label_select"] = "::Selecione a Cidade::";

    $sql = "SELECT * FROM LOCALIZACAO ORDER BY CIDADE";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

   
    foreach($resultado as $i=>$t){
        $options[$i]["value"]=$t["ID_LOCALIZACAO"];
        $options[$i]["label_option"]=$t["CIDADE"];        
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