-- Le SELECT permet de récupèrer les données dans une table
SELECT * FROM movie;

-- WHERE permet de filtrer et conditionner
-- On veut les films qui durent plus de 3h
SELECT * FROM movie WHERE duration >= 180;
-- On veut les films d'action
SELECT * FROM movie WHERE id_category = 2 AND duration > 60;
-- On veut les films des années 80
SELECT * FROM movie WHERE released_at >= '1980-01-01' AND released_at < '1990-01-01';
-- On veut trier les films par durée (sans WHERE)
SELECT * FROM movie ORDER BY duration DESC;
-- On veut trier les films d'avant 2000 par durée (avec WHERE)
SELECT * FROM movie WHERE released_at < '2000-01-01' ORDER BY duration DESC;
-- On veut afficher 4 films aléatoires
SELECT * FROM movie ORDER BY RAND() LIMIT 4;
-- On peut faire une pagination en SQL
SELECT * FROM movie LIMIT 0, 5; -- OFFSET 0 LIMIT 5 (Page 1)
SELECT * FROM movie LIMIT 5, 5; -- (Page 2)
SELECT * FROM movie LIMIT 10, 5; -- (Page 3)
