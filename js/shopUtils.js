const products = [
    {
        "icon": "img/rosa.svg",
        "name": "Rosa", 
        "description": "Símbolo clássico do amor e da beleza, a rosa é perfeita para ocasiões românticas.",
        "value": "R$ 10,00"
    },
    {
        "icon": "img/tulipa.png",
        "name": "Tulipa", 
        "description": "Com seu formato elegante e cores vibrantes, a tulipa representa elegância e sofisticação.",
        "value": "R$ 5,00"
    },
    {
        "icon": "img/orquidea.svg",
        "name": "Orquidea", 
        "description": "Flor exótica e delicada, a orquídea transmite beleza rara e elegância refinada.",
        "value": "R$ 15,00"
    },
    {
        "icon": "img/girassol.svg",
        "name": "Girassol", 
        "description": "Com sua aparência solar, o girassol simboliza alegria, energia e positividade.",
        "value": "R$ 20,00"
    },
    {
        "icon": "img/cravo.svg",
        "name": "Cravo",
        "description": "Tradicional e cheio de simbolismo, o cravo representa paixão e admiração.",
        "value": "R$ 8,00"
    },
    {
        "icon": "img/margarida.svg",
        "name": "Margarida",
        "description": "Flor simples e encantadora, a margarida transmite pureza, inocência e afeto.",
        "value": "R$ 12,00"
    },
    {
        "icon": "img/violeta.svg",
        "name": "Violeta", 
        "description": "Pequena e delicada, a violeta simboliza lealdade, modéstia e tranquilidade.",
        "value": "R$ 7,00"
    },
    {
        "icon": "img/hortensia.svg",
        "name": "Hortensia", 
        "description": "Com suas flores volumosas, a hortênsia é símbolo de gratidão e sentimentos profundos.",
        "value": "R$ 30,00"
    },
    {
        "icon": "img/lirio.svg",
        "name": "Lirio", 
        "description": "Flor elegante e perfumada, o lírio representa pureza, paz e renovação.",
        "value": "R$ 10,00"
    },
    {
        "icon": "img/jasmim.svg",
        "name": "Jasmim", 
        "description": "Com aroma doce e delicado, o jasmim simboliza amor, sensualidade e espiritualidade.",
        "value": "R$ 18,00"
    }
]

function openModal(product) {
    const modalContainer = document.getElementById("knowMore");
    const modalButton = document.getElementById("modal-button")
    const modalImage = document.getElementById("modal-img");
    const modalTitle = document.getElementById("modal-titulo");
    const modalDescription = document.getElementById("modal-descricao");
    const modalValue = document.getElementById("modal-preco");

    
    modalButton.addEventListener("click", closeModal);
    modalImage.style.backgroundImage = `url(${product.icon})`;
    modalTitle.textContent = product.name;
    modalDescription.textContent = product.description;
    modalValue.textContent = product.value;
    
    modalContainer.style.display = "inline-block";
}

function closeModal() {
    const modalContainer = document.getElementById("knowMore");
    modalContainer.style.display = "none";
}

function ShowProductsHTML() {
    const container = document.querySelector(".catalogo");
    for (let i=0; i < products.length; i++) {
        const product = products[i];
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
        button.addEventListener("click", ()=>{openModal(product)});
        
        flower.appendChild(icon);
        flower.appendChild(name);
        flower.appendChild(value);
        flower.appendChild(button);
        
        container.appendChild(flower);
    }
}

document.addEventListener("DOMContentLoaded", ShowProductsHTML);