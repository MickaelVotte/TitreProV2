// JS permettant de supprimer les messages d'erreurs lorsque nous entrons des données dans l'input
let allInput = document.querySelectorAll('input');

allInput.forEach(element => {
    element.addEventListener('keyup', function () {
        let inputName = this.id
        let span = document.querySelector(`[data-span="error-${inputName}"]`);
        span.innerText = ''
    })
});

// JS permettant d'avoir un apercu de l'image lors du choix de l'input

let inputPicture = document.getElementById('image')
inputPicture.addEventListener("change", function () {
    let oFReader = new FileReader(); // on créé un nouvel objet FileReader
    oFReader.readAsDataURL(this.files[0]);
    oFReader.onload = function (oFREvent) {
        let imgPreview = document.getElementById('imgPreview');
         imgPreview.setAttribute('src', oFREvent.target.result);
        
    };
})





let name = document.getElementById('name');
let place = document.getElementById('place');
let date = document.getElementById('date');
let description = document.getElementById('description');
let nblimitParticipant = document.getElementById('nblimitParticipant');
let departement = document.getElementById('departement');





//verification du nom
//il s'agit d'un input, pour recuperer la valeur on utilise .value
if(name.value == ''){
    let nameError = document.getElementById('errorName');
}
if(place.value == ''){
    let placeError = document.getElementById('errorPlace');
}
if(date.value == ''){
    let dateError = document.getElementById('errorDate');
}
if(description.value == ''){
    let descriptionError = document.getElementById('errorDescription');
}
if(nblimitParticipant.value == ''){
    let nblimitParticipantError = document.getElementById('errornblimitParticipant');
}
if(departement.value == ''){
    let departementError = document.getElementById('errorDepartement');
}





//je fais une fonction pour effacer le message d'erreur aux inputs respectifs
// exemeple avec spanError = 'lastnameError'
function deletemessageError(spanerror)
{
    //je cible l'id spanError respectif
    let messageError = document.getElementById(spanerror)
    console.log(messageError);
messageError.innerHTML = "";
}