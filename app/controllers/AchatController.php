<?php
    namespace app\controllers;

    use app\models\Achat;
    use flight\Engine;
    use app\models\Article;
    use Flight;
    class AchatController {
        protected Engine $app;


        public function __construct() {

        }

        public function getAllAchat() {
            $achat = new Achat(Flight::db());
            $liste = $achat->findAll();
            return $liste;
        }


    }
?>