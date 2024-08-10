SELECT DISTINCT nf.*
FROM nota_fiscal nf
JOIN item i ON nf.id = i.id_nf
JOIN produto p ON i.id_produto = p.id
WHERE p.produto = 'Video game X'
  AND DATE_FORMAT(nf.data_emissao, '%Y-%m') = '2023-07'
  AND nf.total_bruto > 5000.00;
