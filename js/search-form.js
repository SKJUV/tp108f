
/**************************************************************** 
* Projet   : Gestion de la biliothèque  
* Code PHP : search-form.js 
**************************************************************** 
* Auteur 1 : TAGNE FONO DAVID NICAULD 24H2005  
* Auteur 2 : OTTAM BAGNEKEN EMMANUELLA LARISSA 24H2244  
* Auteur 3 : SINENG KENGNI JUVENAL 24H2194  
<tagnefonodavid@gmail.com.email> 
<larissabagneken70@gmail.com> 
<sinengjuvenal@gmail.com> 
* ... 
**************************************************************** 
* Date de création      
: 05-07-2025 (05 Juillet 2025) 
* Dernière modification : 05-07-2025 (05 Juillet 2025) 
**************************************************************** 
* Description  
* Le script search-form.js permet de gerer les input afin qu'il soit utilisé 
* sous certaines conditions. 
**************************************************************** 
* Historique des modifications 
* 05-07-2025 : Le script de gestion d'input a été créé pour permettrede faire en sorte que si l'input ISBN est rempli,
* les autres ne soient pas remplis, et vice versa.
***************************************************************/  

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