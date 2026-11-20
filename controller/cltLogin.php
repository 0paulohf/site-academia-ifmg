<?php
    session_start();
    require_once('../model/clsUsuario.php');

    $usuario = new clsUsuario();

    $usuario->setLogin($_POST['txtLogin']);
    $usuario->setSenha($_POST['txtSenha']);

    if($usuario->verificarLogin()){
        $_SESSION['login'] = $usuario->getLogin();
        $_SESSION['nome'] = $usuario->getNome();
        $_SESSION['perfil'] = $usuario->getPerfil();

        unset($_SESSION['erro']);

        header('Location: ../view/frmPrincipal.php');
        exit;
    }else{
        $_SESSION['erro'] = true;

        header('Location: ../view/frmPrincipal.php');
        exit;
    }
?>