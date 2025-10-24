<?php
    class User {
        private $id;
        private $name;
        private $email;
        private $password;
        private $post = [];

        public function __construct($id, $name, $email, $password) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            return;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            return;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
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