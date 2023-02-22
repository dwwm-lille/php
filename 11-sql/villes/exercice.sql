-- Obtenir la liste des 10 villes les plus peuplées en 2012
select ville_nom_reel, ville_population_2012 from villes_france_free order by ville_population_2012 desc limit 10;

-- Obtenir la liste des 50 villes ayant la plus faible superficie
select ville_nom_reel from villes_france_free order by ville_surface limit 50;

-- Obtenir la liste des départements d’outres-mer, c’est-à-dire ceux dont le numéro de département commencent par “97”
select departement_nom from departement where departement_code LIKE '97%';

-- Obtenir le nom des 10 villes les plus peuplées en 2012, ainsi que le nom du département associé
select ville_nom_reel, departement_nom from villes_france_free v
inner join departement d on v.ville_departement = d.departement_code
order by ville_population_2012 desc limit 10;

-- Obtenir la liste du nom de chaque département, associé à son code et du nombre de commune au sein de ces département,
-- en triant afin d’obtenir en priorité les départements qui possèdent le plus de communes
select departement_nom, departement_code, count(departement_code) as nombre_villes from departement d
inner join villes_france_free v on v.ville_departement = d.departement_code
group by d.departement_code
order by nombre_villes desc;

-- Obtenir la liste des 10 plus grands départements, en terme de superficie
select departement_nom, round(sum(ville_surface)) as departement_surface from departement d
inner join villes_france_free v on v.ville_departement = d.departement_code
group by d.departement_code order by departement_surface desc limit 10;

-- Compter le nombre de villes dont le nom commence par “Saint”
select ville_nom_reel from villes_france_free
where ville_nom_reel like 'Saint%';

-- Obtenir la liste des villes qui ont un nom existants plusieurs fois, et trier afin d’obtenir en premier celles dont le nom est le plus souvent utilisé par plusieurs communes
select ville_nom_reel, count(ville_id) as nombre_nom from villes_france_free
group by ville_nom_reel order by nombre_nom desc limit 100;

-- Obtenir en une seule requête SQL la liste des villes dont la superficie est supérieur à la superficie moyenne
select ville_nom_reel from villes_france_free
where ville_surface > (select avg(ville_surface) from villes_france_free);

-- Obtenir la liste des départements qui possèdent plus de 2 millions d’habitants
select departement_nom, sum(ville_population_2012) from departement d
inner join villes_france_free v on v.ville_departement = d.departement_code
group by departement_nom having sum(ville_population_2012) > 2000000;

-- Remplacez les tirets par un espace vide, pour toutes les villes commençant par “SAINT-” (dans la colonne qui contient les noms en majuscule)
select ville_nom, replace(ville_nom, '-', ' ') from villes_france_free
where ville_nom like 'SAINT-%';

update villes_france_free
set ville_nom = replace(ville_nom, '-', ' ')
where ville_nom like 'SAINT-%';
