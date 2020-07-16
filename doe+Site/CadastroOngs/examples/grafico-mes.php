<?php
    session_start();
    require_once('../global.php'); 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");

    try {

        $conexao = Conexao::pegarConexao();

        $arrayMeses = array();
        $meses = array(
            "Janeiro",
            "Fevereiro",
            "Marco",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        );

        for ($i = 0; $i <= 11; $i++) {

            $querySelect = "SELECT COUNT(idDoacao) AS '$meses[$i]' FROM tbDoacao INNER JOIN tbCampanha ON tbDoacao.idCampanha = tbCampanha.idCampanha INNER JOIN tbOng ON tbCampanha.idOng = tbOng.idOng WHERE tbOng.idOng = '$_SESSION[idOng]' AND MONTH(dataDoacao) = '$i'+1 ";
            $resultado = $conexao->query($querySelect);
            $result = $resultado->fetchAll();
            array_push($arrayMeses, $result[0]);
            
        }

        echo ' { "lista":'.json_encode($arrayMeses).' }';
        
    } catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>