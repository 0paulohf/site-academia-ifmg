<?php

class clsConexao{
    #variaveis privadas
    private $host;
    private $usuario;
    private $senha;
    private $banco;
    private $sonexao;

    #propriedades
    #host

    public function setHost($valor){
        $this->host = $valor;
    }

        public function getHost( ){
        return $this->host;
    }


      public function setUsuario($valor){
        $this->usuario = $valor;
    }

        public function getUsuario( ){
        return $this->usuario;
    }


      public function setSenha($valor){
        $this->senha = $valor;
    }

        public function getSenha( ){
        return $this->senha;
    }

          public function setBanco($valor){
        $this->banco = $valor;
    }

        public function getBanco( ){
        return $this->banco;
    }

    #metado
    #construtor
    function __construct(){
        $this->host = 'localhost';
        $this->usuario='root';
        $this->senha= '';
        $this->banco = 'bd_acesso';
        $this->conecta();
    }

    public function conecta(){
        $this->sonexao = mysqli_connect($this-> host,
                                        $this-> usuario,
                                        $this-> senha,
                                        $this-> banco);
    }

    public function executaSQL($sql){
        $resposta = mysqli_query($this->sonexao, $sql) or die(mysqli_error($this->sonexao));
        return $resposta;
    }




}

?>