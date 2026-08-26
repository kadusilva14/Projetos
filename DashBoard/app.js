document.addEventListener('DOMContentLoaded', () => {
    carregarClima();
    carregarTarefas();

    document.getElementById('form-tarefa').addEventListener('submit', criarTarefa);
});

const STATUS_LABELS = {
    pendente: 'Pendente',
    em_andamento: 'Em andamento',
    concluido: 'Concluído'
};

function getStatusLabel(status) {
    return STATUS_LABELS[status] || status;
}
const WMO_DESCRICOES = {
    0: 'Céu limpo', 1: 'Poucas nuvens', 2: 'Parcialmente nublado', 3: 'Nublado',
    45: 'Neblina', 48: 'Neblina com geada',
    51: 'Garoa fraca', 53: 'Garoa moderada', 55: 'Garoa forte',
    61: 'Chuva fraca', 63: 'Chuva moderada', 65: 'Chuva forte',
    71: 'Neve fraca', 73: 'Neve moderada', 75: 'Neve forte',
    80: 'Pancadas de chuva fracas', 81: 'Pancadas de chuva moderadas', 82: 'Pancadas de chuva fortes',
    95: 'Trovoada', 96: 'Trovoada com granizo', 99: 'Trovoada forte com granizo'
};

async function carregarClima() {
    const lat = -23.5505;
    const lon = -46.6333;
    const url = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m,weather_code`;

    try {
        const response = await fetch(url);
        const data = await response.json();

        const temp = data.current.temperature_2m;
        const codigo = data.current.weather_code;
        const descricao = WMO_DESCRICOES[codigo] || 'Condição desconhecida';

        document.getElementById('clima-cidade').innerText = 'São Paulo';
        document.getElementById('clima-desc').innerText = descricao;
        document.getElementById('clima-temp').innerText = `${Math.round(temp)}°C`;
    } catch (error) {
        document.getElementById('clima-cidade').innerText = 'Erro ao carregar clima';
    }
}

async function carregarTarefas() {
    try {
        const response = await fetch('api.php');
        const tarefas = await response.json();

        const container = document.getElementById('lista-tarefas');
        container.innerHTML = '';

        if (tarefas.length === 0) {
            container.innerHTML = '<li class="list-group-item text-muted">Nenhuma tarefa cadastrada.</li>';
            return;
        }

        tarefas.forEach(t => renderizarTarefa(t, container));
    } catch (error) {
        console.error('Erro ao buscar tarefas:', error);
    }
}

function renderizarTarefa(t, container) {
    const item = document.createElement('li');
    item.className = 'list-group-item d-flex justify-content-between align-items-center';
    item.dataset.id = t.id;
    item.innerHTML = `
        <span class="flex-grow-1">${escapeHtml(t.titulo)}</span>
        <span class="badge bg-${getBadgeColor(t.status)} me-2">${getStatusLabel(t.status)}</span>
        <button class="btn btn-sm btn-outline-secondary me-1 btn-editar">Editar</button>
        <button class="btn btn-sm btn-outline-danger btn-excluir">Excluir</button>
    `;

    item.querySelector('.btn-editar').addEventListener('click', () => ativarEdicao(item, t));
    item.querySelector('.btn-excluir').addEventListener('click', () => excluirTarefa(t.id));

    container.appendChild(item);
}

async function criarTarefa(event) {
    event.preventDefault();

    const inputTitulo = document.getElementById('novo-titulo');
    const selectStatus = document.getElementById('novo-status');

    const titulo = inputTitulo.value.trim();
    if (!titulo) return;

    try {
        const response = await fetch('api.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ titulo, status: selectStatus.value })
        });

        if (!response.ok) throw new Error('Falha ao criar tarefa');

        inputTitulo.value = '';
        selectStatus.value = 'pendente';
        carregarTarefas();
    } catch (error) {
        console.error('Erro ao criar tarefa:', error);
        alert('Não foi possível adicionar a tarefa.');
    }
}

function ativarEdicao(item, t) {
    item.innerHTML = `
        <input type="text" class="form-control form-control-sm me-2 edit-titulo" value="${escapeHtml(t.titulo)}">
        <select class="form-select form-select-sm me-2 edit-status" style="max-width: 160px;">
            <option value="pendente" ${t.status === 'pendente' ? 'selected' : ''}>${STATUS_LABELS.pendente}</option>
            <option value="em_andamento" ${t.status === 'em_andamento' ? 'selected' : ''}>${STATUS_LABELS.em_andamento}</option>
            <option value="concluido" ${t.status === 'concluido' ? 'selected' : ''}>${STATUS_LABELS.concluido}</option>
        </select>
        <button class="btn btn-sm btn-success me-1 btn-salvar">Salvar</button>
        <button class="btn btn-sm btn-outline-secondary btn-cancelar">Cancelar</button>
    `;

    item.querySelector('.btn-salvar').addEventListener('click', () => salvarEdicao(item, t.id));
    item.querySelector('.btn-cancelar').addEventListener('click', () => carregarTarefas());
}

async function salvarEdicao(item, id) {
    const titulo = item.querySelector('.edit-titulo').value.trim();
    const status = item.querySelector('.edit-status').value;

    if (!titulo) {
        alert('O título não pode ficar vazio.');
        return;
    }

    try {
        const response = await fetch(`api.php?id=${id}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ titulo, status })
        });

        if (!response.ok) throw new Error('Falha ao atualizar tarefa');

        carregarTarefas();
    } catch (error) {
        console.error('Erro ao atualizar tarefa:', error);
        alert('Não foi possível salvar as alterações.');
    }
}

async function excluirTarefa(id) {
    if (!confirm('Tem certeza que deseja excluir esta tarefa?')) return;

    try {
        const response = await fetch(`api.php?id=${id}`, { method: 'DELETE' });
        if (!response.ok) throw new Error('Falha ao excluir tarefa');

        carregarTarefas();
    } catch (error) {
        console.error('Erro ao excluir tarefa:', error);
        alert('Não foi possível excluir a tarefa.');
    }
}

function getBadgeColor(status) {
    switch (status) {
        case 'concluido': return 'success';
        case 'em_andamento': return 'warning';
        default: return 'secondary';
    }
}

function escapeHtml(texto) {
    const div = document.createElement('div');
    div.innerText = texto;
    return div.innerHTML;
}
