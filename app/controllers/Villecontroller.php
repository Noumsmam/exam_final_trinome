<?php
    namespace app\controllers;

    use flight\Engine;
    use app\models\Ville;
    use Flight;
    class Villecontroller {
        protected Engine $app;


        public function __construct() {

        }

        public function getville() {
            $ville = new Ville(Flight::db());
            $liste = $ville->findAll();
            return $liste;
        }

        public function getVilleFiche($id) {
            $ville = new Ville(Flight::db());
            $fiche = $ville->findById($id);
            return $fiche;             
        }

    }
?>