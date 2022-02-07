

const pilotos = document.querySelector("#pilotos");
const constructores = document.querySelector("#constructores");
const ultimaCarrera = document.querySelector("#ultima-carrera");
pilotos.addEventListener("click", piloto);
constructores.addEventListener("click", constructor);
ultimaCarrera.addEventListener("click", carrera);

const tabla1 = document.getElementById("tabla1");
const tabla2 = document.getElementById("tabla2");
const tabla3 = document.getElementById("tabla3");
function piloto() {
  tabla1.classList.remove("d-none");
  tabla1.classList.add("d-inline");
  tabla2.classList.add("d-none");
  tabla3.classList.add("d-none");
}
function constructor() {
  tabla2.classList.remove("d-none");
  tabla2.classList.add("d-inline");
  tabla1.classList.add("d-none");
  tabla3.classList.add("d-none");
}
function carrera() {
  tabla3.classList.remove("d-none");
  tabla3.classList.add("d-inline");
  tabla1.classList.add("d-none");
  tabla2.classList.add("d-none");
}
