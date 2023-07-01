/*****************************************************************************************************************
 COMPLETE PROFILE FORM
*****************************************************************************************************************/

function passwordVerify() {
    var pwd = document.getElementById("pwd").value;
    var pwdConfirm = document.getElementById("pwdConfirm").value;
    var errorMessage = "";

    if (pwd !== pwdConfirm) {
        errorMessage = "Les mots de passe ne correspondent pas.";
    }

    var errors = document.getElementById("errors");
    var submitButton = document.getElementById("submit");
    var nextButton = document.getElementById("step-2");

    if (errorMessage !== "") {
        errors.innerHTML = errorMessage;
        errors.style.display = "block";
        submitButton.disabled = true;
        nextButton.disabled = true;
    } else {
        errors.style.display = "none";
        submitButton.disabled = false;
        nextButton.disabled = false;
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