<?php
    abstract class clsComum{
        //variaveis
        protected $id;
        protected $nome;

        //propriedades

        public function setId($valor){
            $this->id=$valor;
        }
        public function getId(){
            return $this->id;
        }
        public function setNome($valor){
            $this->nome=$valor;
        }
        public function getNome(){
            return $this->nome;
        }
    }

?>