SELECT `titre` AS 'Titre', `resum` AS 'Resume', `annee_prod` FROM `film` f INNER JOIN `genre` g ON f.id_genre = g.id_genre WHERE g.`nom` = 'erotic' ORDER BY `annee_prod` DESC;
