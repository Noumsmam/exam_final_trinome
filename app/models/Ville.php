<?php
    namespace app\models;
    use Flight;

    class Ville{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function save($villeData){
            $stmt = $this->db->prepare(
                "INSERT INTO BNGRC_ville (
                nom_ville
                ) VALUES (?)"
            );

            $stmt->execute([
                $villeData['nom_ville']
            ]);
        }

        public function findById($id) {
            $stmt = $this->db->prepare("SELECT * FROM BNGRC_ville WHERE id_ville = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        }

        public function updateVille($nouveauVille){
            $stmt = $this->db->prepare(
                "UPDATE BNGRC_ville SET
                nom_ville = ?
                WHERE id_ville = ?"
            );

            $stmt->execute([
                $nouveauVille['nom_ville'],
                $nouveauVille['id']
            ]);
        }

        public function deleteVille($id){
            $stmt = $this->db->prepare("DELETE FROM BNGRC_ville WHERE id_ville = ?");
            $stmt->execute([$id]);
        }

        public function findAll(){
            $stmt = $this->db->query("SELECT * FROM BNGRC_ville");
            return $stmt->fetchAll();
        }
    }
?>