-- Compter le nombre de résultats
SELECT COUNT(id_actor) as count_actor, 'Fiorella' as girl FROM actor;

-- On peut faire des aliases dans les requêtes (as)
SELECT *, CONCAT(firstname, ' ', name) as fullname FROM actor;

-- Il y a quelques fonctions qui permettent d'avoir une valeur max, une valeur min, un arrondi, une moyenne, une somme...
SELECT MAX(duration) as maxi, MIN(duration) as mini,
	ROUND(AVG(duration), 0) as average,
    SUM(duration) as sum_duration, NOW()
FROM movie;

-- On peut faire un select sans from...
SELECT NOW();

-- Récupèrer la date pour mettre à jour un utilisateur
UPDATE user SET created_at = NOW() WHERE id = 1;

-- Alias sur la table
SELECT m.id_movie as i FROM movie m WHERE m.id_movie = 1;

-- On peut faire des sous requêtes SQL
SELECT MAX(duration) FROM movie;
SELECT * FROM movie WHERE duration = (SELECT MAX(duration) FROM movie);
