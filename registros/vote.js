let cajaPiloto = document.querySelector('#caja_piloto');
let driver = document.querySelector('#driver');
cajaPiloto.addEventListener('dragover',e => {
    e.preventDefault();
});
cajaPiloto.addEventListener('drop',e => {
    cajaPiloto.appendChild(driver);
});
