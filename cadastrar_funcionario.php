<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";
    include "conexao.php";

    if(!empty($_POST)){        
        $nome = $_POST["NOME"];
        $sobrenome = $_POST["SOBRENOME"];
        $email = $_POST["EMAIL"];
        $telefone = $_POST["TELEFONE"];
        $data_contratacao = $_POST["DATA_CONTRATACAO"];
        $id_funcao = $_POST["ID_FUNCAO"];
        $salario = $_POST["SALARIO"];
        $comissao = $_POST["COMISSAO"];
        $id_gerente = $_POST["ID_GERENTE"];
        $id_departamento = $_POST["ID_DEPARTAMENTO"];
        $sql = "INSERT INTO FUNCIONARIO VALUES('$nome','$sobrenome','$email', '$telefone', '$data_contratacao', '$id_funcao', '$salario', '$comissao', '$id_gerente', '$id_departamento')";
        $conexao->query($sql);
        echo "<span class='ok'>Funcionário inserido com sucesso</span><br />";
    }

    $v["method"]="post";
    $v["action"]="#";
    $v["titulo"]="Cadastro de Funcionário";

    $f = new Formulario($v);

    $v = null;
    $v["type"]="text";
    $v["name"]="NOME";
    $v["placeholder"]="Digite o nome do funcionário..";
    $v["id"]="nome_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="text";
    $v["name"]="SOBRENOME";
    $v["placeholder"]="Digite o sobrenome do funcionário...";
    $v["id"]="sobrenome_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="text";
    $v["name"]="EMAIL";
    $v["placeholder"]="Digite o email do funcionário...";
    $v["id"]="email_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="text";
    $v["name"]="TELEFONE";
    $v["placeholder"]="Digite o telefone do funcionário...";
    $v["id"]="telefone_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="date";
    $v["name"]="DATA_CONTRATACAO";
    $v["placeholder"]="Digite a data da contratação...";
    $v["id"]="data_contratacao_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="number";
    $v["name"]="SALARIO";
    $v["placeholder"]="Digite o salário do funcionário...";
    $v["id"]="salario_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="number";
    $v["name"]="COMISSAO";
    $v["placeholder"]="Digite a comissão do funcionário...";
    $v["id"]="comissao_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

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
    $v["type"]="submit";    
    $v["name"]="input";    
    $v["value"]="Enviar";
    $i = new Input($v);

    $f->adiciona_elemento($i);
    
    $f->exibir();
?>