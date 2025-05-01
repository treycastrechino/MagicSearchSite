
function onClick(clicked_id)
{
    alert(clicked_id);
    window.location.href = "index.php/?id=55";
};

/* this will make all forms non active. Then set the one you passed as an argument to active*/
function swapForms(formID){
    document.querySelectorAll(".form-box").forEach(form=> form.classList.remove("active"));
    document.getElementById(formID).classList.add("active");

};

function getMultiverseID(){

    const queryString = window.location.search;
    console.log(queryString);
    const urlParams = new URLSearchParams(queryString);
    const multiverseID = urlParams.get('multiverseid');
};
