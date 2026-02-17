<?php
    namespace app\models;
    use Flight;

    class Dispatch{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

    }
?>