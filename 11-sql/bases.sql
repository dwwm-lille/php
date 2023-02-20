-- Insérer une donnée en SQL
INSERT INTO `user` (username, email, password) VALUES ('Fiorella', 'fiorella@boxydev.com', 'password');

-- Insérer plusieurs données d'un seul coup
INSERT INTO user (username, email, password) VALUES
    ('Toto', 'toto@boxydev.com', 'password'),
    ('Titi', 'titi@boxydev.com', 'password'),
    ('Tata', 'tata@boxydev.com', 'password');

-- Sélectionne tous les utilisateurs avec tous les champs
SELECT * FROM user;

-- Sélectionne tous les utilisateurs avec le pseudo et l'email
SELECT username, email FROM user;

-- On peut mettre à jour une ou plusieurs lignes (tuples)
UPDATE user SET `password` = 'daddy' WHERE id = 1;

-- Sélectionne l'utilisateur dont l'ID est à 1
SELECT * FROM user WHERE id = 1;

-- Supprimer la ligne avec l'ID 2 dans la table user
DELETE FROM user WHERE id = 2;
