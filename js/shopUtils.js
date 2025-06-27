function openModal(product) {
    const modalContainer = document.getElementById("knowMore");
    const modalImage = document.getElementById("modal-img");
    const modalTitle = document.getElementById("modal-titulo");
    const modalDescription = document.getElementById("modal-descricao");
    const modalValue = document.getElementById("modal-preco");
    const modalBuy = document.getElementById("modal-addshop-button");
    
    modalImage.style.backgroundImage = `url(${product.imagem})`;
    modalTitle.textContent = product.nome;
    modalDescription.textContent = product.descricao;
    modalValue.textContent = "R$ " + product.valor;
    modalBuy.addEventListener("click", () => {
        window.location.href = "?id=" + product.id;

    });

    modalContainer.style.display = "inline-block";
}

function closeModal() {
    const modalContainer = document.getElementById("knowMore");
    modalContainer.style.display = "none";
}

document.addEventListener("DOMContentLoaded", () => {
    const modalButton = document.getElementById("modal-close-button")
    modalButton.addEventListener("click", closeModal);
})