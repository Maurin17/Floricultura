function getURLParameters() {
    let url = new URL(window.location.href);
    let params = Array.from(url.searchParams.entries());
    if (params.length) {
        return params;
    }
    return null;
}

function showParametersHTML(params) {
    if (params != null) {
        const table = document.querySelector(".login-action");
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
    }
}

document.addEventListener("DOMContentLoaded", ()=> {
    showParametersHTML(getURLParameters());
})