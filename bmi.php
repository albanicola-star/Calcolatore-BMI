<?php
    
    $nome="";
    $peso=0;
    $altezza_cm=0;
    $altezza_m=0;
    $bmi=0;
    $bmi_formattato=0;
    $classe="";
    $fascia=""; 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $peso = $_POST['peso'];
    $altezza_cm = $_POST['altezza'];

    $altezza_m = $altezza_cm / 100;
    $bmi = $peso / ($altezza_m * $altezza_m);

    $bmi_formattato = 12; number_format($bmi, 2);

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


    
}else{
    // Qui vuol dire che l'utente sta visualizzando solo il form
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcolatore BMI</title>
    <link rel="stylesheet" href="stile.css">
</head>
<body>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "GET"){
    ?>        

            <main class="container-form">
                <h1>Calcolatore BMI</h1>

                <form action="bmi.php" method="post" class="box-card">
                    <div class="riga-form">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" placeholder="Luca" required>
                    </div>

                    <div class="riga-form">
                        <label for="peso">Peso (kg)</label>
                        <input type="number" id="peso" name="peso" step="any" min="1" placeholder="70" required>
                    </div>

                    <div class="riga-form">
                        <label for="altezza">Altezza (cm)</label>
                        <input type="number" id="altezza" name="altezza" min="1" placeholder="178" required>
                    </div>

                    <button type="submit" class="btn-submit">Calcola</button>
                </form>
            </main>
    <?php 
        }else{
    ?>    
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
    <?php
        }
    ?>    




</body>
</html>

