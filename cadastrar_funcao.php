<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";


    if(!empty($_POST)){
        include "conexao.php";
        $id_funcao = $_POST["ID_FUNCAO"];
        $titulo_funcao = $_POST["TITULO_FUNCAO"];
        $salario_minimo = $_POST["SALARIO_MINIMO"];
        $salario_maximo= $_POST["SALARIO_MAXIMO"];
        $sql = "INSERT INTO FUNCAO VALUES(NULL,'$titulo_funcao, $salario_minimo, $salario_maximo)";
        $conexao->query($sql);
        echo "<span class='ok'>Função inserida com sucesso</span><br />";
    }

    $v["method"]="post";
    $v["action"]="#";
    $v["titulo"]="Cadastro de Função";

    $f = new Formulario($v);

    $v = null;
    $v["type"]="text";
    $v["name"]="ID_FUNCAO";
    $v["placeholder"]="Digite o id da função...";
    $v["id"]="cod_funcao_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="text";
    $v["name"]="TITULO_FUNCAO";
    $v["placeholder"]="Digite o título da função...";
    $v["id"]="titulo_funcao_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="number";
    $v["name"]="SALARIO_MINIMO";
    $v["placeholder"]="Informe o salário mínimo...";
    $v["id"]="salario_minimo_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="number";
    $v["name"]="SALARIO_MAXIMO";
    $v["placeholder"]="Informe o salário máximo...";
    $v["id"]="salario_maximo_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="submit";    
    $v["name"]="input";    
    $v["value"]="Enviar";
    $i = new Input($v);

    $f->adiciona_elemento($i);
    
    $f->exibir();
?>