const products = [
    {
        "icon": "img/rosa.svg",
        "name": "Rosa", 
        "description": "",
        "value": "R$ 10,00"
    },
    {
        "icon": "img/tulipa.png",
        "name": "Tulipa", 
        "description": "",
        "value": "R$ 5,00"
    },
    {
        "icon": "img/orquidea.svg",
        "name": "Orquidea", 
        "description": "",
        "value": "R$ 15,00"
    },
    {
        "icon": "img/girassol.svg",
        "name": "Girassol", 
        "description": "",
        "value": "R$ 20,00"
    },
    {
        "icon": "img/cravo.svg",
        "name": "Cravo",
        "description": "",
        "value": "R$ 8,00"
    },
    {
        "icon": "img/margarida.svg",
        "name": "Margarida",
        "description": "",
        "value": "R$ 12,00"
    },
    {
        "icon": "img/violeta.svg",
        "name": "Violeta", 
        "description": "",
        "value": "R$ 7,00"
    },
    {
        "icon": "img/hortensia.svg",
        "name": "Hortensia", 
        "description": "",
        "value": "R$ 30,00"
    },
    {
        "icon": "img/lirio.svg",
        "name": "Lirio", 
        "description": "",
        "value": "R$ 10,00"
    },
    {
        "icon": "img/jasmim.svg",
        "name": "Jasmim", 
        "description": "",
        "value": "R$ 18,00"
    }
];

function ShowProductsHTML() {
    const container = document.querySelector(".catalogo");
    for (const product of products) {
        const flower = document.createElement('div');
        flower.className = "flores";
        const icon = document.createElement('img');
        const name = document.createElement('h1');
        const value = document.createElement('span');
        const button = document.createElement('button');

        icon.src = product.icon;
        icon.alt = product.name;
        name.textContent = product.name;
        value.textContent = product.value;
        button.textContent = "Saiba mais";

        flower.appendChild(icon);
        flower.appendChild(name);
        flower.appendChild(value);
        flower.appendChild(button);

        container.appendChild(flower);
    }
}

function openModal() {
    
}

document.addEventListener("DOMContentLoaded", ShowProductsHTML());