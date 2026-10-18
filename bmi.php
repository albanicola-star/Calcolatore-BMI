<?php

$nome = $_POST['nome'];
$peso = $_POST['peso'];
$altezza_cm = $_POST['altezza'];

$altezza_m = $altezza_cm / 100;
$bmi = $peso / ($altezza_m * $altezza_m);

$bmi_formattato = number_format($bmi, 2);

if ($bmi < 18.5) {
    $classe = "sottopeso";
    $fascia = "SOTTOPESO";
} elseif ($bmi <= 24.9) {
    $classe = "normopeso";
    $fascia = "NORMOPESO";
} elseif ($bmi <= 29.9) {
    $classe = "sovrappeso";
    $fascia = "SOVRAPPESO";
} else {
    $classe = "obesita";
    $fascia = "OBESITÀ";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Risultato BMI</title>
    <link rel="stylesheet" href="stile.css">
</head>
<body>

    <main class="container-risultato">
        <h1>Il tuo BMI</h1>

        <div class="card <?php echo $classe; ?>">
            <div class="card-nome"><?php echo $nome; ?></div>
            <div class="card-dettagli">Peso <?php echo $peso; ?> kg - Altezza <?php echo $altezza_cm; ?> cm</div>
            <div class="card-valore"><?php echo $bmi_formattato; ?></div>
            <div class="card-fascia"><?php echo $fascia; ?></div>
        </div>

        <a href="index.html" class="link-ricalcola">Calcola di nuovo</a>
    </main>

</body>
</html>