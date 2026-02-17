<?php
    namespace app\models;
    use Flight;

    class User{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function save($userData){
            $stmt = $this->db->prepare(
                "INSERT INTO BNGRC_user (
                username,
                email,
                password
                ) VALUES (?, ?, ?)"
            );

            $stmt->execute([
                $userData['username'],
                $userData['email'],
                $userData['password']
            ]);
        }

        public function findByEmail($email) {
            $stmt = $this->db->prepare("SELECT * FROM BNGRC_user WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch();
        }

        public function updateUser($nouveauUser){
            $stmt = $this->db->prepare(
                "UPDATE BNGRC_user SET
                username = ?,
                email = ?,
                password = ?,
                WHERE id_user = ?"
            );

            $stmt->execute([
                $nouveauUser['username'],
                $nouveauUser['email'],
                $nouveauUser['password'],
                $nouveauUser['id']
            ]);
        }

        public function deleteUser($id){
            $stmt = $this->db->prepare("DELETE FROM BNGRC_user WHERE id_user = ?");
            $stmt->execute([$id]);
        }

        public function findAll(){
            $stmt = $this->db->query("SELECT * FROM BNGRC_user");
            return $stmt->fetchAll();
        }
    }
?>