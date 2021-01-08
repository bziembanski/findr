const form = document.querySelector("#sign-up-form")
const emailInput = form.querySelector('input[name="email"]')
const username = form.querySelector('input[name="username"]')
const password = form.querySelector('input[name="password"]')
const password2 = form.querySelector('input[name="password-repeate"]')

function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordTheSame(password, confirmedPassword){
    return password === confirmedPassword;
}

function markValidation(element, condition){
    !condition ? element.classList.add("no-valid") : element.classList.remove("no-valid")
}

function checkInput(element, validation, ){
    setTimeout(function (){
        markValidation(element, isEmail(element.value))
    }, 1000)
}
function validateEmail() {
    setTimeout(function (){
        markValidation(
            emailInput,
            isEmail(emailInput.value))
    },1000)
}

function validatePassword(){
    setTimeout(function (){
        markValidation(
            password2,
            arePasswordTheSame(password.value, password2.value))
    },1000);
}

emailInput.addEventListener('keyup', validateEmail);
password2.addEventListener('keyup', validatePassword);