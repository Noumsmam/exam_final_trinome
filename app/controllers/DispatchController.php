<?php
    namespace app\controllers;

    use flight\Engine;
    use app\models\Requete;
    use Flight;
    class DispatchController {
        protected Engine $app;


        public function __construct() {

        }

        public function repartir() {
            $req = new Requete(Flight::db());
            
            // Recuperer les besoins en cours et les dons individuels
            $besoinsEnCours = $req->getBesoinEnCours();
            $dons = $req->getAllDons();
            
            // Creer un index des dons par article
            $donsParArticle = [];
            foreach($dons as $don) {
                $nomArticle = $don['nom_article'];
                if(!isset($donsParArticle[$nomArticle])) {
                    $donsParArticle[$nomArticle] = [];
                }
                $donsParArticle[$nomArticle][] = $don;
            }
            
            // Repartir les dons aux besoins
            foreach($besoinsEnCours as $besoin) {
                $nomArticle = $besoin['nom_article'];
                $quantiteNecessaire = (int)$besoin['quantite'];
                $idBesoin = $besoin['id_requete'];
                $quantiteRestante = $quantiteNecessaire;
                
                // Verifier s'il y a des dons pour cet article
                if(isset($donsParArticle[$nomArticle])) {
                    // Consommer les dons un par un
                    foreach($donsParArticle[$nomArticle] as &$don) {
                        if($quantiteRestante <= 0) break;
                        
                        $quantiteDon = (int)$don['quantite'];
                        $idDon = $don['id_requete'];
                        
                        if($quantiteDon >= $quantiteRestante) {
                            // Le don couvre le besoin
                            $nouveauQteDon = $quantiteDon - $quantiteRestante;
                            
                            if($nouveauQteDon <= 0) {
                                // Don totalement consomme : supprimer la ligne
                                $req->changeStatutDon($idDon);
                                $don['quantite'] = 0;
                            } else {
                                // Don partiellement consomme : mettre a jour la quantite
                                $don['quantite'] = $nouveauQteDon;
                                $req->uptdateQuantite($nouveauQteDon, $idDon);
                            }
                            
                            // Besoin satisfait
                            $req->changeStatut($idBesoin);
                            $quantiteRestante = 0;
                            $req->uptdateQuantite($quantiteRestante,$idBesoin);
                        } else {
                            // Le don ne suffit pas : le consommer completement
                            $req->deleteRequete($idDon);
                            $don['quantite'] = 0;
                            $quantiteRestante -= $quantiteDon;
                        }
                    }
                    
                    // Si le besoin n'est que partiellement satisfait
                    if($quantiteRestante > 0) {
                        $req->uptdateQuantite($quantiteRestante, $idBesoin);
                    }
                }
            }
            
            Flight::redirect('/dispatch');
        }


    }
?>