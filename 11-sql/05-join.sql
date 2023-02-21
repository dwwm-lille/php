-- Jointure
-- On récupère les films avec leur catégorie
SELECT * FROM movie AS m
INNER JOIN category AS c ON m.id_category = c.id_category;

-- On veut les acteurs d'un film
SELECT * FROM movie m
INNER JOIN movie_has_actor mha ON m.id_movie = mha.id_movie
INNER JOIN actor a ON a.id_actor = mha.id_actor
WHERE m.title = 'Le Parrain';

-- Afficher les films même ceux n'ayant pas de catégorie
SELECT * FROM movie AS m
LEFT JOIN category AS c ON m.id_category = c.id_category;

-- Afficher les acteurs du film Les Affranchis en partant de la table movie bien entendu. Les jointures peuvent se faire indéfiniment
SELECT * FROM movie m
INNER JOIN movie_has_actor mha ON m.id_movie = mha.id_movie
INNER JOIN actor a ON a.id_actor = mha.id_actor
WHERE m.title = 'Les Affranchis';

-- Ecrire une requête permettant de trouver tous les films dans lesquels
-- Al Pacino a joué.
SELECT * FROM actor a
INNER JOIN movie_has_actor mha ON a.id_actor = mha.id_actor
INNER JOIN movie m ON m.id_movie = mha.id_movie
WHERE a.name = 'Pacino' AND a.firstname = 'Al';

-- Afficher les acteurs qui ont joués dans la catégorie Action
SELECT DISTINCT a.id_actor, a.name, a.firstname, c.name FROM actor a
INNER JOIN movie_has_actor mha ON a.id_actor = mha.id_actor
INNER JOIN movie m ON m.id_movie = mha.id_movie
INNER JOIN category c ON c.id_category = m.id_category
WHERE c.name = 'Action';
