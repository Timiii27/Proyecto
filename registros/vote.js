const list = document.querySelector('#list');
const send = document.querySelector('#enviar');


const drivers = [
    'Lewis Hamilton',
    'George Russell',
    'Max Verstappen',
    'Sergio Pérez',
    'Charles Leclerc',
    'Carlos Sainz Jr',
    'Daniel Ricciardo',
    'Lando Norris',
    'Fernando Alonso',
    'Esteban Ocon',
    'Pierre Gasly',
    'Yuki Tsunoda',
    'Sebastian Vettel',
    'Lance Stroll',
    'Nicholas Latifi',
    'Alexander Albon ',
    'Guanyu Zhou',
    'Valtteri Bottas',
    'Nikita Mazepinn',
    'Mick Schumacher'
];


const lista_pilotos = [];


let dragStartIndex;

createList();

function createList(){
    [...drivers]
        .forEach((driver,posicion) => {
            const piloto = document.createElement('li');
            piloto.setAttribute('data-index',posicion);
            piloto.innerHTML = `
            <div class="draggable d-flex" draggable="true">
            <span class="numero">${posicion + 1}/</span>
                <p class="nombre-piloto">${driver}</p>
            </div>
            `
            lista_pilotos.push(piloto);

            list.appendChild(piloto);
        });
}