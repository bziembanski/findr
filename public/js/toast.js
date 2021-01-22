function showToast(message) {
    let x = document.querySelector("#snackbar");
    x.innerHTML = message;
    x.classList.add("show");
    setTimeout(function(){ x.classList.remove("show"); }, 3000);
}