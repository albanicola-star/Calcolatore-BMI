# Calcolatore BMI

Progetto didattico realizzato in PHP,HTML e CSS per il calcolo dell'Indice di Massa Corporea (BMI). Il sito web riceve i dati dell'utente, ne calcola la fascia di appartenenza e mostra il risultato in una scheda dinamica personalizzata.

---

## Struttura del Progetto

Il progetto è composto dai seguenti file:

- 'index.html' - Pagina principale contenente il modulo di inserimento dati (Nome, Peso, Altezza).
- 'bmi.php' - Script PHP per l'elaborazione dei dati, il calcolo del BMI e la generazione della scheda risultato.
- 'stile.css' - Foglio di stile per il layout grafico, disposizione e modifica dinamica delle card.

---

## Funzionalità

- Form di inserimento: Campi obbligatori per Nome, Peso (in kg, decimali ammessi) e Altezza (in cm).
- Calcolo automatico: Conversione dell'altezza da cm a metri e applicazione della formula per il calcolo del BMI.
- Classificazione dinamica: Determinazione della fascia con cambio automatico di colori (sfondo, bordo e testo):
  - SOTTOPESO (bmi< 18.5) --> Classe '.sottopeso'
  - NORMOPESO (18.5 < bmi < 24.9) --> Classe '.normopeso'
  - SOVRAPPESO (25 < bmi < 29.9) --> Classe '.sovrappeso'
  - OBESITÀ (bmi >= 30) --> Classe '.obesita'
- Design pulito: Utilizzo di CSS Flexbox per centrare perfettamente i componenti nella schermata.

---

## Come eseguirlo in locale

1. Clona o scarica questo repository.
2. Copia la cartella del progetto all'interno della directory del tuo server locale (es. 'htdocs' per XAMPP).
3. Avvia Apache tramite il pannello di controllo (es. XAMPP Control Panel).
4. Apri il browser e visita l'indirizzo:
   http://localhost/NOME_CARTELLA/form.html