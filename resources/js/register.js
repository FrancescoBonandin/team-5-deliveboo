document.getElementById('myForm').addEventListener('submit', function(event) {
        const checkboxes = document.querySelectorAll('input[name="categories[]"]');
        const errorMessage = document.getElementById('error-message');
        const checked = false;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checked = true;
                break; // Almeno una checkbox è stata selezionata
            }
        }

        if (!checked) {
            errorMessage.textContent = 'Seleziona almeno una categoria';
            event.preventDefault(); // Previeni l'invio del modulo se nessuna checkbox è stata selezionata.
        } else {
            errorMessage.textContent = ''; // Rimuovi il messaggio di errore se almeno una checkbox è stata selezionata.
        }
    });