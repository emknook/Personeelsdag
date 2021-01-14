CREATE OR REPLACE VIEW Activiteit_plek AS
SELECT ((COUNT(personeelid) - aantal) * -1) AS 'nog_plek', activiteit.naam, activiteit.locatie, activiteit.idactiviteit, activiteit.deadline
FROM activiteit
LEFT JOIN inschrijving 
ON activiteit.idactiviteit = inschrijving.activiteitid
GROUP BY activiteit.idactiviteit;