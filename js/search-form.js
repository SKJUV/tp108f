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
    
    const isbnInput = document.getElementById('ISBN');
    const auteurInput = document.getElementById('auteur_ouvrage'); 
    const editeurInput = document.getElementById('editeur_ouvrage'); 
    const anneeInput = document.getElementById('annee_publication'); 
    
    const otherFields = [auteurInput, editeurInput, anneeInput];

    function toggleFields() {
        const isISBNFilled = isbnInput.value.trim() !== '';
        const isAnyOtherFieldFilled = otherFields.some(field => field.value.trim() !== '');

        if (isISBNFilled) {
            otherFields.forEach(field => {
                field.disabled = true;
                field.value = ''; 
            });

            isbnInput.disabled = false;
        

        } else if (isAnyOtherFieldFilled) {
            isbnInput.disabled = true;
            isbnInput.value = '';
            otherFields.forEach(field => {
                field.disabled = false;
            });

        } else {
            isbnInput.disabled = false;
            otherFields.forEach(field => {
                field.disabled = false;
            });
        }
    }
    
    const allInputs = [isbnInput, ...otherFields];
    
    allInputs.forEach(input => {
        if(input) {
            input.addEventListener('input', toggleFields);
        }
    });
    

    toggleFields();
})