<?php
    class Usuario {
        private $id;
        private $nome;
        private $email;
        private $rm;
        private $senha;
        private $post = [];

        public function __construct($id, $nome, $email, $rm, $senha) {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->rm = $rm;
            $this->senha = $senha;
        }

        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            return;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            return;
        }

        private function getRm($rm) {
            return $this->rm;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            return;
        }

        public function getPost() {
            return $this->post;
        }

        public function setPostMk($post) {
            array_push($this->post, $post);
        }

        public function setPostRm($post) {
            return;
        }
    }

?>