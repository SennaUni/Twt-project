SELECT
    nf.data_emissao,
    nf.cliente,
    nf.total_bruto
FROM nota_fiscal nf
JOIN item i ON nf.id = i.id_nf
WHERE nf.natureza_operacao = 1
GROUP BY nf.id
HAVING COUNT(i.id) >= 6;
