<?php


     class Entrada{
        public $name;
        public $class;
        public $id;
        public $placeholder;


        public function __construct($valores){
            
            $this->name = $valores["name"];
            $this->class = $valores["class"];
            $this->id = $valores["id"];
            $this->placeholder = $valores["placeholder"];
        }


    }


?>