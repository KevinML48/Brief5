DELETE FROM categ_liens
JOIN liens ON categ_liens.id_liens = liens.id
WHERE liens.nom_liens = '[value]';