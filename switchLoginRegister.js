
/* this will make all forms non active. Then set the one you passed as an argument to active*/
function swapForms(formID){
    document.querySelectorAll(".form-box").forEach(form=> form.classList.remove("active"));
    document.getElementById(formID).classList.add("active");

}