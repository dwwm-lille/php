-- Jointure
-- On récupère les films avec leur catégorie
SELECT * FROM movie AS m
INNER JOIN category AS c ON m.id_category = c.id_category;

-- On veut les acteurs d'un film
SELECT * FROM movie m
INNER JOIN movie_has_actor mha ON m.id_movie = mha.id_movie
INNER JOIN actor a ON a.id_actor = mha.id_actor
WHERE m.title = 'Le Parrain';
