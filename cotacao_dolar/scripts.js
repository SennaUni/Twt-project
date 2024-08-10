async function fetchData() {
  const moeda = document.getElementById("moeda").value;

  const response = await fetch(`fetch_data.php?moeda=${moeda}`);
  const data = await response.json();

  // Alimentar Tabela

  const tableBody = document.getElementById("table-body");

  tableBody.innerHTML = "";

  data.forEach((row) => {
    const tr = document.createElement("tr");

    tr.innerHTML = `
        <td>${new Date(parseInt(row.timestamp) * 1000).toLocaleDateString(
          "pt-BR"
        )}</td>
        <td>${parseFloat(row.ask)}</td>
        <td>${parseFloat(row.bid)}</td>
      `;

    tableBody.appendChild(tr);
  });

  // Alimentar relatório

  let maxAsk = { date: "", value: -Infinity };
  let maxBid = { date: "", value: -Infinity };
  let minAsk = { date: "", value: Infinity };
  let minBid = { date: "", value: Infinity };
  let totalAsk = 0;
  let count = 0;

  data.forEach((entry) => {
    const ask = parseFloat(entry.ask);
    const bid = parseFloat(entry.bid);
    const date = new Date(parseInt(entry.timestamp) * 1000).toLocaleDateString(
      "pt-BR"
    );

    if (ask > maxAsk.value) maxAsk = { date: date, value: ask };
    if (bid > maxBid.value) maxBid = { date: date, value: bid };
    if (ask < minAsk.value) minAsk = { date: date, value: ask };
    if (bid < minBid.value) minBid = { date: date, value: bid };

    totalAsk += ask;
    count++;
  });

  const averageAsk = count > 0 ? totalAsk / count : 0;

  document.getElementById(
    "max-ask-date"
  ).textContent = `Data da maior cotação de venda (ask): ${maxAsk.date}, Valor: ${maxAsk.value}`;

  document.getElementById(
    "max-bid-date"
  ).textContent = `Data da maior cotação de compra (bid): ${maxBid.date}, Valor: ${maxBid.value}`;

  document.getElementById(
    "min-ask-date"
  ).textContent = `Data da menor cotação de venda (ask): ${minAsk.date}, Valor: ${minAsk.value}`;

  document.getElementById(
    "min-bid-date"
  ).textContent = `Data da menor cotação de compra (bid): ${minBid.date}, Valor: ${minBid.value}`;

  document.getElementById(
    "average-ask"
  ).textContent = `Média de cotação de venda (ask): ${averageAsk}`;
}
