let body = document.querySelector('body');

let modoClaro = document.querySelector('[data-modo="white"]');
    

modoClaro.onclick = function() {
    if(modoClaro.checked) {
        body.classList.add('modoClaro')
    }
    else {
        body.classList.remove('modoClaro')
    }
}