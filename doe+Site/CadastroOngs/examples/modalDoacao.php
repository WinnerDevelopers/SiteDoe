<?php
    session_start();
    require_once('../global.php');

    if(isset($_POST['id'])){
        $resultado = '';
        $doacao = new Doacao();
        $doacao->setIdDoacao($_POST['id']);
        $retorno = $doacao->listarDoacao($doacao);

        echo $resultado = <<<HTML
HTML;
    }

    if(isset($_POST['del'])){
        $resultado = '';
        $doacao = new Doacao();
        $doacao->setIdDoacao($_POST['del']);
        $retorno = $doacao->listarDoacao($doacao);

        echo $resultado = <<<HTML

        <input type="hidden" id="idDoacao" name="idDoacao" value="{$retorno['idDoacao']}">
HTML;

    }