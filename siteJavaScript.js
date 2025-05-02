
function onClick(clicked_id)
{

    var url = "http://localhost/MagicSearchSite/singleCardDisplayPage.php/multiverseid=";
    url = url + clicked_id;
    window.location.href = url;
};

/* this will make all forms non active. Then set the one you passed as an argument to active*/
function swapForms(formID){
    document.querySelectorAll(".form-box").forEach(form=> form.classList.remove("active"));
    document.getElementById(formID).classList.add("active");

};

