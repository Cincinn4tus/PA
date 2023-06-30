/*****************************************************************************************************************
 INVESTOR FORM
*****************************************************************************************************************/

function verifyFieldsInvestor() {
    var genderM = document.getElementById("genderM");
    var genderF = document.getElementById("genderF");
    var genderO = document.getElementById("genderO");
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var birthdate = document.getElementById("birthdate").value;
    var acceptCGU = document.getElementById("cgu");
    var errorMessage = "";

    if (!genderM.checked && !genderF.checked && !genderO.checked) {
      errorMessage += "<li>Veuillez sélectionner un genre.</li>";
    }

    if (!firstname.match(/^[a-zàâçéèêëîïôûùüÿñæœ .-]{2,60}$/i)) {
        document.getElementById("firstname").style.border = "2px solid red";
        errorMessage += "<li>Prénom invalide.</li>";
    } else {
        document.getElementById("firstname").style.border = "2px solid green";
    }

    if (!lastname.match(/^[a-zàâçéèêëîïôûùüÿñæœ .-]{2,60}$/i)) {
        document.getElementById("lastname").style.border = "2px solid red";
        errorMessage += "<li>Nom invalide.</li>";
    } else {
        document.getElementById("lastname").style.border = "2px solid green";
    }

    if (!email.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i)) {
        document.getElementById("email").style.border = "2px solid red";
        errorMessage += "<li>Email invalide.</li>";
    } else {
        document.getElementById("email").style.border = "2px solid green";
    }

    if (!birthdate.match(/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/i)) {
        document.getElementById("birthdate").style.border = "2px solid red";
        errorMessage += "<li>Date de naissance invalide.</li>";
    } else {
        document.getElementById("birthdate").style.border = "2px solid green";
    }

    if (!acceptCGU.checked) {
        errorMessage += "<li>Veuillez accepter les CGU.</li>";
        acceptCGU.classList.add("error");
    } else {
        acceptCGU.classList.add("success");
    }
        
    var submitButton = document.getElementById("submit");
    var cardFooter = document.getElementById("card-footer");

    if (errorMessage !== "") {
        cardFooter.innerHTML = "<ul>" + errorMessage + "</ul>";
        submitButton.disabled = true;
    } else {
        cardFooter.innerHTML = "";
        submitButton.disabled = false;
    }
}

/*****************************************************************************************************************
  ENTREPRISE FORM
 ***************************************************************************************************************/


function verifyFieldsCompany() {
    var name = document.getElementById("company_name").value;
    var sirenNumber = document.getElementById("siren").value;
    var errorMessage = "";

    if (!name.match(/^[a-zàâçéèêëîïôûùüÿñæœ .-]{2,60}$/i)) {
        document.getElementById("company_name").style.border = "2px solid red";
        errorMessage += "<li>Nom de l'entreprise invalide.</li>";
    } else {
        document.getElementById("company_name").style.border = "2px solid green";
    }

    if (!sirenNumber.match(/^[0-9]{9}$/i)) {
        document.getElementById("siren").style.border = "2px solid red";
        errorMessage += "<li>Numéro de SIREN invalide.</li>";
    } else {
        document.getElementById("siren").style.border = "2px solid green";
    }

    var submitButton = document.getElementById("submit");
    var cardFooter = document.getElementById("card-footer");

    if (errorMessage !== "") {
        cardFooter.innerHTML = "<ul>" + errorMessage + "</ul>";
        submitButton.disabled = true;
        return true;
    } else {
        cardFooter.innerHTML = "";
        submitButton.disabled = false;
    }

    let sirenNumber = document.getElementById("sirenNumber").value;
    let errorMessage = "";
    
    // mettre chaque chiffre dans un tableau
    let sirenArray = sirenNumber.split("");
    let resultSum = 0;
    
    // multiplier par 2 chaque chiffre de rang pair en partant de la droite et l'additioner à result
    for (let i = 0; i < sirenArray.length; i++) {
        if (i % 2 === 0) {
        resultSum += sirenArray[i] * 2;
        } else {
        resultSum += parseInt(sirenArray[i]);
        }
    }
    
    if (resultSum % 10 === 0) {
        let isvalid = document.getElementById("resultSiren");
        // résultat dans un h3 vert bold
        isvalid.innerHTML = "<h3>siren valide</h3>";
        return true;
    }
    
    else {
        let isvalid = document.getElementById("resultSiren");
        isvalid.innerHTML = "<h3>siren invalide</h3>";
    }

    if (errorMessage !== "") {
        // boutton id step-2 disabled
        let submitButton = document.getElementById("step-2");
        submitButton.disabled = true;
    }
}



function isValidEnterpriseName() {
    let name = document.getElementById("name").value;
  
    // regex qui accepte uniquement les chiffres les ettres de l'alphabet et les espaces
    let regex = /^[a-zA-Z0-9 ]*$/;
  
    // si le nom de l'entreprise ne correspond pas à la regex, afficher une alerte "nom de l'entreprise invalide"
    if (regex.test(name)) {
      let isvalid = document.getElementById("resultName");
      isvalid.innerHTML = "<h3>nom valide</h3>";
    }
    // sinon afficher une alerte "nom de l'entreprise valide"
    else {
      let isvalid = document.getElementById("resultName");
      isvalid.innerHTML = "<h3>nom invalide</h3>";
    }
  }



/*****************************************************************************************************************
 COMPLETE PROFILE FORM
*****************************************************************************************************************/

function nextStep(currentStep, nextStep) {
    var currentStepElement = document.querySelector('.' + currentStep);
    var nextStepElement = document.querySelector('.' + nextStep);
    var progressBar = document.querySelector('.progress-bar');

    currentStepElement.classList.add('slide-left');
    setTimeout(function () {
        currentStepElement.style.display = "none";
        nextStepElement.style.display = "block";
        nextStepElement.classList.add('slide-from-left');
    }, 500);

    progressBar.style.width = (parseInt(progressBar.style.width) + 33) + "%";
}

function previousStep(currentStep, previousStep) {
    var currentStepElement = document.querySelector('.' + currentStep);
    var previousStepElement = document.querySelector('.' + previousStep);
    var progressBar = document.querySelector('.progress-bar');


    currentStepElement.classList.add('slide-right');
    setTimeout(function () {
        currentStepElement.style.display = "none";
        previousStepElement.style.display = "block";
        previousStepElement.classList.add('slide-from-right');
    }, 500);

    progressBar.style.width = (parseInt(progressBar.style.width) - 33) + "%";
    if (progressBar.style.width == "0%") {
        progressBar.style.width = "33%";
    }
}