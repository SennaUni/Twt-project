SELECT
    DATE_FORMAT(nf.data_emissao, '%Y-%m') AS mes,
    COUNT(DISTINCT nf.id) AS quantidade_nfs
FROM nota_fiscal nf
JOIN item i ON nf.id = i.id_nf
WHERE DATE_FORMAT(nf.data_emissao, '%Y-%m') = '2024-08' 
GROUP BY nf.id
HAVING COUNT(i.id) > 3;
