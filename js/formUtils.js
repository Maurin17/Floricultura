const PasswordRules = [
    { regex: /.{8,}/ }, // min 8 char
    { regex: /[0-9]/ }, // numeros
    { regex: /[a-z]/ }, // minusculas
    { regex: /[A-Z]/ }, // maiúsculas
    { regex: /[^A-Za-z0-9]/ }, // especiais
]

function validatePhoneNumber(event) {
    let telefone = event.target.value.replace(/\D/g, '');

    telefone = telefone.replace(/(\d{2})(\d{4,5})(\d{4}).*/, '($1) $2-$3');
    event.target.value = telefone;
}

function validatePassword(passwordInput, checklistItens) {
    PasswordRules.forEach((rule, i) => {
        let isValid = rule.regex.test(passwordInput.value);
        checklistItens[i].classList.toggle("checked", isValid);
    });
}

document.addEventListener("DOMContentLoaded", () => {
    const phoneInput = document.getElementById("telefone");
    const passwordInput = document.getElementById("senha");
    const checklistItens = document.querySelectorAll(".item-lista");
    
    phoneInput.addEventListener("keyup", validatePhoneNumber);
    passwordInput.addEventListener("keyup", () => {validatePassword(passwordInput, checklistItens)});
})