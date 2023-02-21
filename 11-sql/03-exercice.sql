-- Récupère tous les films
SELECT * FROM movie;
-- Récupère tous les films dans la catégorie "Films de gangster"
SELECT * FROM movie WHERE id_category = 1;
-- Récupère tous les films dans la catégorie "Films de gangster" qui sont sortis avant 1990
SELECT * FROM movie WHERE id_category = 1 AND YEAR(released_at) < 1990;
-- Récupère tous les films du plus récent au plus vieux
SELECT * FROM movie ORDER BY released_at DESC;
-- Récupère les films dans l'ordre aléatoire
SELECT * FROM movie ORDER BY RAND();
-- Récupère les 5 premiers films à partir du 4ème
SELECT * FROM movie LIMIT 3, 5;
-- Récupère le film le plus récent
SELECT * FROM movie ORDER BY released_at DESC LIMIT 1;
-- Récupère le film le plus ancien
SELECT * FROM movie ORDER BY released_at LIMIT 1;
-- Récupère les acteurs nés avant 1960
SELECT * FROM actor WHERE birthday < '1960-01-01';
