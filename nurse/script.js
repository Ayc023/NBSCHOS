let currentStep = 0;

function showStep(step) {
    const steps = document.getElementsByClassName('step');
    for (let i = 0; i < steps.length; i++) {
        steps[i].classList.remove('active');
    }
    steps[step].classList.add('active');
    document.getElementById('prevBtn').disabled = step === 0;
    document.getElementById('nextBtn').disabled = step === steps.length - 1;
}

function nextStep() {
    currentStep++;
    showStep(currentStep);
}

function prevStep() {
    currentStep--;
    showStep(currentStep);
}

function toggleSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section.classList.contains('active')) {
        section.classList.remove('active');
    } else {
        section.classList.add('active');
    }
}

function showDetails(inputName, sectionId) {
    var inputs = document.getElementsByName(inputName);
    var section = document.getElementById(sectionId);
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].checked && inputs[i].value === 'yes') {
            section.classList.add('active');
            return;
        }
    }
    section.classList.remove('active');
}

window.onload = function() {
    showStep(currentStep);
}