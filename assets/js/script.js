// Author: Sylvain Garant
// Version: 2020.11.09


function selectInput(input) {
    // Désélectionne tous les inputs
    const inputs = document.querySelectorAll('input[type="image"]');
    inputs.forEach((i) => {
        i.style.border = "none";
    });

    // Sélectionne l'input cliqué
    input.style.border = "2px solid red";
}

