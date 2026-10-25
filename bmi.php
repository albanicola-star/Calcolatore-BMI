<?php
    
    $nome="";
    $peso=0;
    $altezza_cm=0;
    $altezza_m=0;
    $bmi=0;
    $bmi_formattato=0;
    $classe="";
    $fascia=""; 
    $errore="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $peso = $_POST['peso'];
    $altezza_cm = $_POST['altezza'];

    if(empty($nome)){
        $errore="Errore: Il campo nome è obbligatorio";
    }elseif($peso<=0){
        $errore="Errore: Il peso deve essere maggiore di 0";
    }elseif($altezza_cm<=0){
        $errore="Errore: L'altezza deve essere maggiore di 0";
    }else{
        $altezza_m = $altezza_cm / 100;
        $bmi = $peso / ($altezza_m * $altezza_m);

        $bmi_formattato =number_format($bmi, 2);

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
        if($_SERVER["REQUEST_METHOD"] == "GET" || !empty($errore)){
    ?>        

            <main class="container-form">
                <h1>Calcolatore BMI</h1>

                <form action="bmi.php" method="post" class="box-card">

                    <?php
                        if(!empty($errore)){
                    ?>
                            <div class="msg-errore"><?php echo $errore; ?></div>
                    <?php
                        }
                    ?>

                    <div class="riga-form">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" placeholder="Luca">
                    </div>

                    <div class="riga-form">
                        <label for="peso">Peso (kg)</label>
                        <input type="number" id="peso" name="peso" step="any" value="" placeholder="70">
                    </div>

                    <div class="riga-form">
                        <label for="altezza">Altezza (cm)</label>
                        <input type="number" id="altezza" name="altezza" value="" placeholder="178">
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

