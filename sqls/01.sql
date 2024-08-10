SELECT
    DATE_FORMAT(data_emissao, '%Y-%m') AS mes,
    COUNT(*) AS quantidade_nfs,
    SUM(total_bruto) AS valor_bruto
FROM nota_fiscal
WHERE data_emissao >= NOW() - INTERVAL 12 MONTH
GROUP BY mes
ORDER BY valor_bruto DESC;
