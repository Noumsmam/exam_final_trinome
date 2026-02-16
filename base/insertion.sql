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
