<?php
    require_once(__DIR__.'/../controller/clsConexao.php');
    require_once(__DIR__.'/../controller/clsArquivo.php');
    require_once(__DIR__.'/clsComum.php');

    class clsUsuario extends clsComum{
        
        private $login;
        private $senha;
        private $perfil;
        private $foto;

        //propriedades
        public function setLogin($valor){
            $this->login=$valor;
        }
        public function getLogin(){
            return $this->login;
        }
        public function setSenha($valor){
            $this->senha=$valor;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function setPerfil($valor){
            $this->perfil=$valor;
        }
        public function getPerfil(){
            return $this->perfil;
        }
        public function setFoto($valor){
            $this->foto=$valor;
        }
        public function getFoto(){
            return $this->foto;
        }
        public function existeLogin(){
            $conexao = new clsConexao();
            $sql = "SELECT * FROM tb_usuario WHERE login_usuario='".$this->login."';";
            $resultado = false;

            if(mysqli_num_rows($conexao->executaSQL($sql)) > 0){
                $resultado = true;
            }

            return $resultado;
        }
       
        public function salvar($novoUsuario=true){
            $gravador = new clsArquivo();
            $gravador->setNomeArquivo($this->login.'.jpg');
            $gravador->setDiretorio('../view/img');
            $gravador->setArquivo($this->foto);
            $gravador->upload();

            $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT);

            if($novoUsuario==true){
                $sql = "INSERT INTO tb_usuario(nome_usuario,login_usuario,senha_usuario,id_perfil) VALUES ('".$this->nome."','".$this->login."','".$senhaHash."',".$this->perfil.");";
            }else{
                $sql = "UPDATE tb_usuario SET nome_usuario='".$this->nome."', senha_usuario='".$senhaHash."', id_perfil=".$this->perfil." WHERE id_usuario=".$this->id.";";
            }

            $conexao = new clsConexao();
            return $conexao->executaSQL($sql);
        }

        public function pegaUsuarios(){
            $conexao= new clsConexao();

            $sql= 'SELECT * FROM tb_usuario;';
            return $conexao->executaSQL($sql);
        }

        public function exclui(){
            //exclui foto
            $gravador = new clsArquivo();
            $gravador->setNomeArquivo($this->login.'.jpg');
            $gravador->setDiretorio('img');
            $gravador->excluir();

            $conexao = new clsConexao();
            $sql = "DELETE FROM tb_usuario WHERE login_usuario='".$this->login."';";
            return $conexao->executaSQL($sql);
        }

        public function verificarLogin(){
            $conexao = new clsConexao();

            $login = mysqli_real_escape_string($conexao->getConexao(), $this->login);

            $sql = "SELECT * FROM tb_usuario WHERE login_usuario='".$login."';";
            $resultado = $conexao->executaSQL($sql);

            if(mysqli_num_rows($resultado) == 1){
                $usuario = mysqli_fetch_assoc($resultado);

                if(password_verify($this->senha, $usuario['senha_usuario'])){
                    $this->id = $usuario['id_usuario'];
                    $this->nome = $usuario['nome_usuario'];
                    $this->perfil = $usuario['id_perfil'];
                    return true;
                }
            }

            return false;
        }

    }
?>