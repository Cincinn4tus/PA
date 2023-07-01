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

    var submitButton = document.getElementById("step-2");

    if (errorMessage !== "") {
        var cardFooter = document.getElementById("card-footer");
        cardFooter.innerHTML = "<ul>" + errorMessage + "</ul>";
        submitButton.disabled = true;
    } else {
        var cardFooter = document.getElementById("card-footer");
        cardFooter.innerHTML = "";
        submitButton.disabled = false;
    }
}

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