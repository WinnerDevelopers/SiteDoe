<?php

    session_start();
    require_once('global.php');

    try{

        header("Location: http://localhost/doe+Site/CadastroOngs/examples/doacoes.php");

        $doacao = new Doacao();
        $doacao->setIdDoacao($_POST['idDoacao']);
        var_dump($doacao->getIdDoacao());
        $doacao->excluirDoacao($doacao);
        $_SESSION['mensagem'] = "Excluido com Sucesso";

    }catch(Execption $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }