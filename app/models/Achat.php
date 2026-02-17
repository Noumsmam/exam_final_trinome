<?php
    namespace app\models;
    use Flight;

    class Achat{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function findAll() {
            $stmt=$this->db->query("SELECT BNGRC_ville.nom_ville,BNGRC_article.nom_article,BNGRC_achat.montant,BNGRC_achat.quantite,BNGRC_article.prix_unitaire
            FROM BNGRC_achat JOIN BNGRC_ville ON BNGRC_achat.id_ville = BNGRC_ville.id_ville JOIN BNGRC_article ON BNGRC_achat.id_article = BNGRC_article.id_article  ");
            return $stmt->fetchAll();
        }

    }
?>