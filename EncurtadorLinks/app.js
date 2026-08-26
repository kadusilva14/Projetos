async function carregarLinks() {
    try {
        const resposta = await fetch('api_listar.php');
        const links = await resposta.json();
        
        const lista = document.getElementById('lista-links');
        lista.innerHTML = ''; 

        links.forEach(item => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center mb-2 shadow-sm rounded p-3';
            
            const faviconUrl = `https://www.google.com/s2/favicons?domain=${item.link}&sz=32`;
            
            li.innerHTML = `
                <div class="d-flex align-items-center gap-3">
                    <img src="${faviconUrl}" alt="icon" width="20" height="20">
                    <div>
                        <strong class="d-block">${item.titulo}</strong> - 
                        <a href="${item.link}" target="_blank" class="text-decoration-none">${item.link}</a>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-secondary">${item.categ}</span>
                    <button class="btn btn-danger btn-sm" onclick="deletarLink(${item.id})">Excluir</button>
                </div>
            `;
            
            lista.appendChild(li);
        });

    } catch (erro) {
        console.error('Erro ao carregar os links:', erro);
    }
}

async function deletarLink(id) {
    if (!confirm('Deseja realmente excluir este link?')) return;

    try {
        const resposta = await fetch('api_deletar.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: id })
        });

        const resultado = await resposta.json();

        if (resultado.sucesso) {
            carregarLinks();
        } else {
            alert(resultado.erro);
        }
    } catch (erro) {
        console.error('Erro ao deletar:', erro);
    }
}

carregarLinks();

const form = document.getElementById('form-encurt');

form.addEventListener('submit', async (e) => {
    e.preventDefault(); 

    const inputTitulo = document.getElementById('novo-titulo');
    const inputLink = document.getElementById('novo-link');
    const inputPadrao = document.getElementById('novo-padrao');

    const dados = {
        titulo: inputTitulo.value,
        link: inputLink.value,
        categ: inputPadrao.value
    };

    try {
        const resposta = await fetch('api.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(dados)
        });

        const resultado = await resposta.json();

        if (resultado.sucesso) {
            form.reset();
            carregarLinks();
        } else {
            alert(resultado.erro || 'Erro ao salvar o link');
        }
    } catch (erro) {
        console.error('Erro na requisição:', erro);
    }
});