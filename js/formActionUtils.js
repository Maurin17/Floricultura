function getURLParameters() {
    const url = new URL(window.location.href);
    return Array.from(url.searchParams.entries());
}

function showParametersHTML(params) {
    const table = document.querySelector(".login-action");

    if (params.length) {
        for (const [key, value] of params) {
            console.log(key, value);
            const row = document.createElement('tr');
            const keyCell = document.createElement('td');
            const valueCell = document.createElement('td');

            keyCell.textContent = key;
            valueCell.textContent = value;

            row.appendChild(keyCell);
            row.appendChild(valueCell);
            table.appendChild(row);
        }
    } else {
        console.info("URL sem parâmetros");
    }
}

document.addEventListener("DOMContentLoaded", () => {
    showParametersHTML(getURLParameters());
})