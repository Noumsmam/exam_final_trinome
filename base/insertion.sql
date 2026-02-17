-- Insertions de données dans BNGRC_user
INSERT INTO BNGRC_user (username, password, email) VALUES
('admin', 'password123', 'admin@bngrc.com'),
('user1', 'pass1', 'user1@example.com'),
('user2', 'pass2', 'user2@example.com'),
('moderateur', 'modpass', 'mod@bngrc.com');

-- Insertions de données dans BNGRC_ville
INSERT INTO BNGRC_ville (nom_ville) VALUES
('Antananarivo'),
('Toamasina'),
('Antsiranana'),
('Fianarantsoa'),
('Mahajanga');

-- Insertions de données dans BNGRC_type_article
INSERT INTO BNGRC_type_article (libelle_type_article) VALUES
('Nourriture'),
('Vêtement'),
('Médicament'),
('Matériel scolaire'),
('Outil agricole');

-- Insertions de données dans BNGRC_article
INSERT INTO BNGRC_article (nom_article, prix_unitaire, id_type_article) VALUES
('Riz 1kg', 5000, 1),
('T-shirt', 15000, 2),
('Paracétamol', 2000, 3),
('Cahier', 3000, 4),
('Houes', 25000, 5),
('Pain', 2000, 1),
('Pantalon', 30000, 2),
('Vitamine C', 5000, 3);

-- Insertions de données dans BNGRC_requete
INSERT INTO BNGRC_requete (id_ville, id_article, quantite, montant_total, date_requete, etat,statut) VALUES
(1, 1, 10, 50000, '2023-01-01', 'BESOIN','fini'),
(2, 3, 5, 10000, '2023-01-02', 'DON','en cours'),
(3, 4, 20, 60000, '2023-01-03', 'BESOIN','en cours'),
(4, 5, 2, 50000, '2023-01-04', 'DON','fini'),
(5, 2, 3, 45000, '2023-01-05', 'BESOIN','en cours');
