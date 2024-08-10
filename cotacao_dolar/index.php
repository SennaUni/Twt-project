<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Consulta de Cotação</title>

  <script src="scripts.js" defer></script>
</head>

<body>
  <h1>Consultar Cotação</h1>
  <form onsubmit="event.preventDefault(); fetchData();">
    <label for="moeda">Escolha a cotação:</label>

    <select id="moeda">
      <option value="USD-BRL">Dólar Americano/Real Brasileiro</option>
      <option value="USD-BRLT">Dólar Americano/Real Brasileiro Turismo</option>
    </select>

    <button type="submit">Consultar</button>
  </form>

  <br />

  <table border="1">
    <thead>
      <tr>
        <th>Data</th>
        <th>Cotação Venda (Ask)</th>
        <th>Cotação Compra (Bid)</th>
      </tr>
    </thead>

    <tbody id="table-body">

    </tbody>
  </table>

  <div>
    <p id="max-ask-date"></p>
    <p id="max-bid-date"></p>
    <p id="min-ask-date"></p>
    <p id="min-bid-date"></p>
    <p id="average-ask"></p>
  </div>
</body>

</html>