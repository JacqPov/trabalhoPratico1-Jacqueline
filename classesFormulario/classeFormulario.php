<?php
    require_once "interfaceExibicao.php";
    require_once "classeInput.php";
    require_once "classeSelect.php";
    require_once "classeTextArea.php";

    class Formulario implements Exibicao{
        public $method;
        public $action;
        public $titulo;
        public $elementos_form;

        public function __construct($valores){
            $this->method = $valores["method"];
            $this->action = $valores["action"];
            $this->titulo = $valores["titulo"];
        }

        public function adiciona_elemento($e){
            $this->elementos_form[] = $e;
        }

        public function exibir(){
            echo "<fieldset><legend><b>Formulário:</b> $this->titulo</legend>";
            echo "<form method='$this->method' action='$this->action'>";

            foreach($this->elementos_form as $i=>$e){
                echo "<div class='form'>";
                $e->exibir();
                echo "</div>";
            }

            echo "</form></fieldset>";
        }
        
    }


?>