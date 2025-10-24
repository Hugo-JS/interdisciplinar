<?php
    class Post {
        private $id;
        private $text;
        private $date;
        private $autorName;
        private $autorAvatar;
        private $autorId;

        public function __construct($text, $autorName, $autorId, $autorAvatar) {
            $this->id = time();
            $this->date = date($this->id);
            $this->text = $text;
            $this->autorName = $autorName;
            $this->autorId = $autorId;
            #$this->autorAvatar = $autorAvatar;
        }

        public function getId() {
            return $this->id;
        }

        public function getText() {
            return $this->text;
        }

        public function getDate() {
            return $this->date;
        }

        public function getAutorName() {
            return $this->autorName;
        }

        public function setAutorName($autorName) {
            return;
        }

        public function getAutorAvatar() {
            return $this->autorAvatar;
        }

        public function setAutorAvatar($autorAvatar) {
            return;
        }

        public function getAutorId() {
            return $this->autorId;
        }

        public function setAutorId($autorId) {
            return;
        }
    }

?>