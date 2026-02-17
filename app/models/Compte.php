<?php
    namespace app\models;
    use Flight;

    class Compte{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function save($compteData){
            $stmt = $this->db->prepare(
                "INSERT INTO BNGRC_compte (
                id_ville,
                montant
                ) VALUES (?,?)"
            );

            $stmt->execute([
                $compteData['id_ville'],
                $compteData['montant']
            ]);
        }

        public function findById($id) {
            $stmt = $this->db->prepare("SELECT * FROM BNGRC_compte WHERE id_compte = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        }


        public function deleteComptd($id){
            $stmt = $this->db->prepare("DELETE FROM BNGRC_compte WHERE id_user = ?");
            $stmt->execute([$id]);
        }

        public function findAll(){
            $stmt = $this->db->query("SELECT * FROM BNGRC_compte");
            return $stmt->fetchAll();
        }
    }
?>