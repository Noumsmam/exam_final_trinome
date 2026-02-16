<?php
    namespace app\controllers;

    use app\models\Requete;
    use flight\Engine;
    use Flight;
    class RequeteController {
        protected Engine $app;


        public function __construct() {

        }

        public function getDonByVille($id) {
            $requete = new Requete(Flight::db());
            $liste = $requete->findDonsByVille($id);
            return $liste;
        }

        public function getBesoinByVille($id) {
            $requete = new Requete(Flight::db());
            $liste = $requete->findAllRequeteBesoinbyidVille($id);
            return $liste;
        }

    }
?>