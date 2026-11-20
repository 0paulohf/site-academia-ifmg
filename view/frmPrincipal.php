<?php
    session_start();
    $mensagem = 'Faça seu login no sistema';
    $mensagem.= '<br>
    <form action="../controller/cltLogin.php" method="post">
        Login: <input type="text" name="txtLogin" required></input><br>
        Senha: <input type="password" name="txtSenha" required></input><br>
        <input type="submit" value="Enviar"></input><br>
        <a href="frmCadastro.php">Não possuo cadastro</a>
    </form>';
    

    if(isset($_SESSION['erro'])){
        $mensagem = 'Login ou senha incorretos!';
        unset($_SESSION['erro']);

    }
    if(isset($_SESSION['login'])){
        $mensagem = 'Você já está logado no sistema!
        
            <a href="../controller/cltLogout.php">SAIR </a>
        ';

        
    }
?>
<html>
    <head>
        <title>Login senha</title>
        <meta charset="UTF-8">

    </head>

    <body>
        <?php
            echo $mensagem;
        ?>

    </body>
</html>