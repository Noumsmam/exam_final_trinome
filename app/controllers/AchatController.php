<?php
    namespace app\controllers;

    use flight\Engine;
    use app\models\Article;
    use Flight;
    class Articlecontroller {
        protected Engine $app;


        public function __construct() {

        }

        public function getArtile() {
            $article = new Article(Flight::db());
            $liste = $article->findAll();
            return $liste;
        }


    }
?>