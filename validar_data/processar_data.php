<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = trim($_POST['data']);

    $data_valida = DateTime::createFromFormat('Y/m/d', $data);
    $data_formatada = $data_valida && $data_valida->format('Y/m/d') === $data ? $data_valida : false;

    if (!$data_formatada) {
        echo "Data inválida. Por favor, use o formato yyyy/mm/dd.";
    } else {
        $dias_da_semana = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];
        $dia_da_semana = $dias_da_semana[date('w', strtotime($data))];

        $data_digitada = new DateTime($data);
        $data_comparacao = new DateTime('2011/01/02');
        $intervalo = $data_digitada->diff($data_comparacao);
        $diferenca_dias = $intervalo->days;

        $data_formatada = $data_digitada->format('d/m/Y');

        echo "Data informada: $data_formatada<br>";
        echo "Dia da semana: $dia_da_semana<br>";
        echo "Diferença em dias entre a data informada e 2011/01/02: $diferenca_dias dias";
    }
}
