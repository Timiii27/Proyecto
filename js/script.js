

const pilotos = document.querySelector("#pilotos");
const constructores = document.querySelector("#constructores");
const ultimaCarrera = document.querySelector("#ultima-carrera");
const leaderboard = document.querySelector("#leaderboard");
pilotos.addEventListener("click", piloto);
constructores.addEventListener("click", constructor);
ultimaCarrera.addEventListener("click", carrera);
leaderboard.addEventListener("click", ranking);

const tabla1 = document.getElementById("tabla1");
const tabla2 = document.getElementById("tabla2");
const tabla3 = document.getElementById("tabla3");
const tabla4 = document.getElementById("tabla4");
function piloto() {
  tabla1.classList.remove("d-none");
  tabla1.classList.add("d-inline");
  tabla2.classList.add("d-none");
  tabla3.classList.add("d-none");
  tabla4.classList.add("d-none");
}
function constructor() {
  tabla2.classList.remove("d-none");
  tabla2.classList.add("d-inline");
  tabla1.classList.add("d-none");
  tabla3.classList.add("d-none");
  tabla4.classList.add("d-none");
}
function carrera() {
  tabla3.classList.remove("d-none");
  tabla3.classList.add("d-inline");
  tabla1.classList.add("d-none");
  tabla2.classList.add("d-none");
  tabla4.classList.add("d-none");
}
function ranking() {
  tabla4.classList.remove("d-none");
  tabla4.classList.add("d-inline");
  tabla1.classList.add("d-none");
  tabla2.classList.add("d-none");
  tabla3.classList.add("d-none");
}
var myNav = document.getElementById("nav");

window.onscroll = function() {
  "use strict";
  if (document.body.scrollTop >= 180 || document.documentElement.scrollTop >= 180) {
    myNav.classList.add("scroll");
  } else {
    myNav.classList.remove("scroll");
  }
};