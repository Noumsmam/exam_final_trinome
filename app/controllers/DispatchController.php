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
            
            $besoinsEnCours = $req->getBesoinEnCours();
            $dons = $req->getAllDons();
            
            $donsParArticle = [];
            foreach($dons as $don) {
                $nomArticle = $don['nom_article'];
                if(!isset($donsParArticle[$nomArticle])) {
                    $donsParArticle[$nomArticle] = [];
                }
                $donsParArticle[$nomArticle][] = $don;
            }
            
            foreach($besoinsEnCours as $besoin) {
                $nomArticle = $besoin['nom_article'];
                $quantiteNecessaire = (int)$besoin['quantite'];
                $idBesoin = $besoin['id_requete'];
                $quantiteRestante = $quantiteNecessaire;
                
                if(isset($donsParArticle[$nomArticle])) {
                    foreach($donsParArticle[$nomArticle] as &$don) {
                        if($quantiteRestante <= 0) break;
                        
                        $quantiteDon = (int)$don['quantite'];
                        $idDon = $don['id_requete'];
                        
                        if($quantiteDon >= $quantiteRestante) {
                            $nouveauQteDon = $quantiteDon - $quantiteRestante;
                            
                            if($nouveauQteDon <= 0) {
                                $req->changeStatutDon($idDon);
                                $don['quantite'] = 0;
                            } else {
                                $don['quantite'] = $nouveauQteDon;
                                $req->uptdateQuantite($nouveauQteDon, $idDon);
                            }
                            
                            $req->changeStatut($idBesoin);
                            $quantiteRestante = 0;
                            $req->uptdateQuantite($quantiteRestante,$idBesoin);
                        } else {
                            $req->deleteRequete($idDon);
                            $don['quantite'] = 0;
                            $quantiteRestante -= $quantiteDon;
                        }
                    }
                    
                    if($quantiteRestante > 0) {
                        $req->uptdateQuantite($quantiteRestante, $idBesoin);
                    }
                }
            }
            
            Flight::redirect('/dispatch');
        }


    }
?>