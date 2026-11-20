<?php

class clsConexao{
    #variaveis privadas
    private $host;
    private $usuario;
    private $senha;
    private $banco;
    private $conexao;

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
    public function getConexao(){
        return $this->conexao;
    }

    #metado
    #construtor
    function __construct(){
        $this->host = 'localhost';
        $this->usuario='root';
        $this->senha= '';
        $this->banco = 'bd_academia';
        $this->conecta();
    }

    public function conecta(){
        $this->conexao = mysqli_connect($this-> host,
                                        $this-> usuario,
                                        $this-> senha,
                                        $this-> banco);
    }
    public function executaSQL($sql){
        $resposta = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resposta;
    }
}
?>