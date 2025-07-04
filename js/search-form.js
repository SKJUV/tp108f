document.addEventListener('DOMContentLoaded', function() {
    // Note : Assurez-vous que les ID ici correspondent EXACTEMENT à ceux de votre HTML.
    // D'après votre code PHP, ils pourraient être 'titre_ouvrage', 'auteur_ouvrage', etc.
    const isbnInput = document.getElementById('ISBN');
    const auteurInput = document.getElementById('auteur_ouvrage'); // J'ai adapté aux noms probables
    const editeurInput = document.getElementById('editeur_ouvrage'); // J'ai adapté aux noms probables
    const anneeInput = document.getElementById('annee_publication'); // J'ai adapté aux noms probables
    
    // On met les champs de recherche alternatifs dans un tableau pour simplifier le code
    const otherFields = [auteurInput, editeurInput, anneeInput];

    function toggleFields() {
        // On vérifie l'état des champs UNE SEULE FOIS au début
        const isISBNFilled = isbnInput.value.trim() !== '';
        const isAnyOtherFieldFilled = otherFields.some(field => field.value.trim() !== '');

        // Règle 1 : Si l'ISBN est rempli, il a la priorité absolue.
        if (isISBNFilled) {
            // On désactive et on vide les autres champs
            otherFields.forEach(field => {
                field.disabled = true;
                field.value = ''; 
            });
            // On s'assure que le champ ISBN est bien activé
            isbnInput.disabled = false;
        
        // Règle 2 : Sinon, si l'un des autres champs est rempli...
        } else if (isAnyOtherFieldFilled) {
            // On désactive et on vide le champ ISBN
            isbnInput.disabled = true;
            isbnInput.value = '';
            // On s'assure que les autres champs sont bien activés
            otherFields.forEach(field => {
                field.disabled = false;
            });

        // Règle 3 : Sinon (tous les champs sont vides)...
        } else {
            // On active tous les champs
            isbnInput.disabled = false;
            otherFields.forEach(field => {
                field.disabled = false;
            });
        }
    }
    
    // On regroupe tous les champs dans un tableau pour attacher les écouteurs
    const allInputs = [isbnInput, ...otherFields];
    
    // On attache un écouteur à chaque champ
    allInputs.forEach(input => {
        // 'input' est l'événement idéal car il se déclenche à chaque frappe,
        // collage ou suppression de texte.
        if(input) { // Sécurité pour éviter les erreurs si un champ n'est pas trouvé
            input.addEventListener('input', toggleFields);
        }
    });
    
    // Exécution initiale au chargement de la page pour définir l'état de départ
    toggleFields();
});