SELECT p.*
FROM produto p
LEFT JOIN item i ON p.id = i.id_produto
WHERE i.id_produto IS NULL;
