<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";
    include "conexao.php";

    if(!empty($_POST)){ 
        $id_funcionario = $_POST["ID_FUNCIONARIO"];       
        $data_inicial = $_POST["DATA_INICIAL"];
        $data_final = $_POST["DATA_FINAL"];
        $id_funcao = $_POST["ID_FUNCAO"];
        $id_departamento = $_POST["ID_DEPARTAMENTO"];
        $sql = "INSERT INTO HISTORICO_FUNCOES VALUES('$id_funcionario', '$data_inicial','$data_final', '$id_funcao', '$id_departamento')";
        $conexao->query($sql);
        echo "<span class='ok'>Histórico de funções inserido com sucesso</span><br />";
    }

    $v["method"]="post";
    $v["action"]="#";
    $v["titulo"]="Cadastro de Histórico de Funções";

    $f = new Formulario($v);

    $v = null;
    $v["type"]="date";
    $v["name"]="DATA_INICIAL";
    $v["placeholder"]="Digite a data inicial...";
    $v["id"]="data_inicial_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="date";
    $v["name"]="DATA_FINAL";
    $v["placeholder"]="Digite a data final...";
    $v["id"]="data_inicial_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["name"]="ID_FUNCIONARIO";
    $ol["label_select"] = "::Selecione o Nome do Funcionário::";

    $sql = "SELECT * FROM FUNCIONARIO ORDER BY NOME";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

   
    foreach($resultado as $i=>$t){
        $options[$i]["value"]=$t["ID_FUNCIONARIO"];
        $options[$i]["label_option"]=$t["NOME"];        
    }
    

    $s = new Select($v,$ol,$options);
    $f->adiciona_elemento($s);

    $v = null;
    $v["name"]="ID_FUNCAO";
    $ol["label_select"] = "::Selecione a Função::";

    $sql = "SELECT * FROM FUNCAO ORDER BY TITULO_FUNCAO";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

   
    foreach($resultado as $i=>$t){
        $options[$i]["value"]=$t["ID_FUNCAO"];
        $options[$i]["label_option"]=$t["TITULO_FUNCAO"];        
    }
    

    $s = new Select($v,$ol,$options);
    $f->adiciona_elemento($s);

    $v = null;
    $v["name"]="ID_DEPARTAMENTO";
    $ol["label_select"] = "::Selecione o Departamento::";

    $sql = "SELECT * FROM DEPARTAMENTO ORDER BY NOME_DEPARTAMENTO";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

   
    foreach($resultado as $i=>$t){
        $options[$i]["value"]=$t["ID_DEPARTAMENTO"];
        $options[$i]["label_option"]=$t["NOME_DEPARTAMENTO"];        
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