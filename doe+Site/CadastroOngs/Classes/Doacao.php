<?php

    class Doacao{

        private $idDoacao;
        private $descricaoDoacao;
        private $nomeProdutoDoacao;
        private $fotoDoacao;
        private	$dataDoacao;
        private $idOng;
        private $idUsuario;

        // MÉTODOS GETERS

        public function getIdDoacao(){
            return $this->idDoacao;
        }

        public function getIdOng(){
            return $this->idOng;
        }

        public function getDescricaoDoacao(){
            return $this->descricaoDoacao;
        }

        public function getFotoDoacao(){
            return $this->fotoDoacao;
        }

        public function getDataDoacao(){
            return $this->dataDoacao;
        }
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function getIdCampanha(){
            return $this->idCampanha;
        }

        // MÉTODOS SETERS //

        public function setIdDoacao($idDoacao){
            $this->idDoacao = $idDoacao;
        }

        public function setIdOng($idOng){
            $this->idOng = $idOng;
        }

        public function setDesricaoDoacao($descricaoDoacao){
            $this->descricaoDoacao = $descricaoDoacao;
        }

        public function setFotoProdutoDoacao($fotoDoacao){
            $this->fotoDoacao = $fotoDoacao;
        }

        public function setDataDoacao($dataDoacao){
            $this->dataDoacao = $dataDoacao;
        }

        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        public function setIdCampanha($idCampanha){
            $this->idCampanha = $idCampanha;
        }

        // Function LISTAR

        public function listarDoacoes($doacao){
            $conexao = Conexao::pegarConexao();
            $querySelect = "SELECT idDoacao, descricaoDoacao, fotoDoacao, dataDoacao, tbUsuario.idUsuario, nomeCampanha, nomeUsuario, tbCampanha.idCampanha, tbOng.idOng FROM tbDoacao inner join tbCampanha on tbDoacao.idCampanha = tbCampanha.idCampanha inner join tbOng on tbCampanha.idOng = tbOng.idOng inner join tbUsuario on tbDoacao.idUsuario = tbUsuario.idUsuario WHERE tbOng.idOng = ".$doacao->getIdOng();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;    
        }

        // PARA APAGAR, ESTÁ PEGANDO DESSA FUNÇÃO
        public function listarDoacao($doacao){
            $conexao = Conexao::pegarConexao();
            $querySelect = "SELECT idDoacao, descricaoDoacao, fotoDoacao, dataDoacao, idUsuario, idCampanha FROM tbDoacao WHERE idDoacao = ".$doacao->getIdDoacao();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetch();
            return $lista;   
        }

        public function excluirDoacao($doacao){
            $conexao = Conexao::pegarConexao();
            $queryDelete = "DELETE FROM tbDoacao WHERE idDoacao = ".$doacao->getIdDoacao();
            $conexao->exec($queryDelete);
        }

    }