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