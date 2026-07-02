# Projetos SENAI (HTML / PHP)

Este repositório contém vários projetos feitos durante aulas (pastas `SENAI dd.mm.yy/`). Cada pasta funciona como um mini-site separado.

> **Como abrir no seu navegador (XAMPP):**
> - Para páginas **HTML**: basta abrir o arquivo ou acessar pela pasta.
> - Para páginas **PHP**: use o XAMPP (ex.: `http://localhost/SENAI 03.06.26/index.php`).

---

## Estrutura das pastas
- `SENAI 03.06.26/`: Projeto **Supermercado Online** com carrinho (PHP + MySQL via PDO).
- `SENAI 30.06.26/`: Projeto **Spotify** (layout + player com HTML/CSS/JS).
- Demais pastas `SENAI */`: outros exercícios em HTML e/ou PHP.

---

## SENAI 03.06.26 — Supermercado Online (PHP)

### Arquivos principais
- `index.php` — página inicial que lista os produtos.
- `cart.php` — página do carrinho; adiciona/remove/limpa itens e mostra total.
- `config.php` — conexão com o banco de dados MySQL usando PDO.
- `style.css` — estilos do site.
- `script.js` — (carregado no carrinho) — no seu código atual está relacionado a um player de áudio, mas **não é usado/compatível** diretamente com o carrinho.

> Observação: este projeto pressupõe uma tabela MySQL `produtos` com campos como: `id`, `nome`, `descricao` (opcional) e `preco`.

### `config.php` (conexão PDO)
- Define as credenciais (`$host`, `$dbname`, `$user`, `$pass`).
- Cria um objeto `PDO` com `mysql:host=$host;dbname=$dbname;charset=utf8`.
- Configura `PDO::ATTR_ERRMODE` para `PDO::ERRMODE_EXCEPTION`.
- Em caso de erro, interrompe com `die(...)` exibindo a mensagem.

### `index.php` (lista de produtos)
1. Inclui `config.php` com `require_once`.
2. Executa SQL:
   - `SELECT * FROM produtos ORDER BY nome ASC`.
3. Converte o resultado em array: `$produtos = $resultado->fetchAll();`.
4. No HTML:
   - Renderiza uma grade (`.produtos-grid`).
   - Para cada produto `$p`:
     - Mostra `nome` e (se existir) `descricao`.
     - Formata o preço com `number_format($p['preco'], 2, ',', '.')`.
     - Cria um link para adicionar ao carrinho:
       - `cart.php?action=add&id=<?php echo $p['id']; ?>`
   - Se não houver produtos, mostra uma mensagem.
5. Footer com ano atual via `date('Y')`.

### `cart.php` (carrinho com sessão)
1. `session_start()` para guardar o carrinho.
2. Inclui `config.php`.
3. Inicializa `$_SESSION['carrinho']` como array se ainda não existir.
4. Lê parâmetros da URL:
   - `$action = $_GET['action'] ?? ''`
   - `$id = (int)($_GET['id'] ?? 0)`

#### Ações pela URL
- **Adicionar** (`cart.php?action=add&id=...`)
  - Valida que o `id` existe no banco: `SELECT id FROM produtos WHERE id = ?`.
  - Se existir, incrementa quantidade em `$_SESSION['carrinho'][$id]`.
  - Redireciona para `index.php`.

- **Remover** (`cart.php?action=remove&id=...`)
  - Remove a chave do produto no array da sessão.
  - Redireciona para `cart.php`.

- **Limpar** (`cart.php?action=clear`)
  - Reseta `$_SESSION['carrinho'] = []`.
  - Redireciona para `cart.php`.

#### Exibir itens
- Monta `$itensCarrinho` e `$total`.
- Se o carrinho não estiver vazio:
  - Obtém IDs: `array_keys($_SESSION['carrinho'])`.
  - Monta SQL com `IN (...)` usando placeholders.
  - Busca produtos no banco.
  - Para cada produto do banco:
    - Lê quantidade da sessão.
    - Calcula subtotal (`preco * qtd`).
    - Soma no total.
- No HTML:
  - Se vazio: mostra mensagem + link “Ver Produtos”.
  - Se não vazio: renderiza uma tabela com produto, preço unitário, qtd, subtotal.
  - Mostra total no `<tfoot>`.
  - Botões:
    - “Limpar Carrinho” chama `cart.php?action=clear` com confirmação.
    - “Finalizar Compra” aponta para `#` e usa `data-total` (não implementa checkout no backend).

### `style.css` (supermercado)
- Estilo base do layout (header/main/footer).
- Grade e cards de produtos (`.produtos-grid`, `.produto-card`).
- Botões (`.btn-add`, `.btn-carrinho`).
- Tabela do carrinho (`.tabela-carrinho`, `.btn-remove`, etc.).
- Responsividade para telas pequenas.

### `script.js`
- No seu `SENAI 03.06.26`, o `cart.php` referencia `script.js`, mas o conteúdo lido em `SENAI 30.06.26/script.js` é de um player estilo Spotify.
- Isso sugere que existe **inconsistência** entre projeto e script referenciado.

---

## SENAI 30.06.26 — Spotify (HTML/CSS/JS)

### Arquivos principais
- `index.html` — layout da página com sidebar, lista de músicas e player.
- `style.css` — estilos do layout dark e do player.
- `script.js` — lógica do player (play/pause, próxima/anterior, progresso e clique nos cards).

### `index.html`
- Sidebar (`aside.sidebar`): logo e links.
- Main (`main.main`):
  - header com título “Minhas Músicas”.
  - seção `.playlist` com cards `.musica-card`.
  - Cada card possui `data-src` com a URL do áudio + título/artista.
- Footer com player global:
  - botão anterior `#btn-anterior`
  - play/pause `#btn-play-pause`
  - próximo `#btn-proximo`
  - barra de progresso `#barra-progresso` + tempos `#tempo-atual` e `#tempo-total`
  - `<audio id="audio-player">`
- Carrega JS: `<script src="script.js"></script>`

### `script.js` (lógica do player)
- Seleciona elementos do DOM (audio, botões, barra e campos de tempo).
- Constrói `musicasArray` a partir dos cards:
  - `src` via `data-src`
  - título via `card.querySelector('h3').textContent`
  - artista via `card.querySelector('p').textContent`
- Implementa:
  - **Play/Pause**: alterna `audioPlayer.play()` e `audioPlayer.pause()`.
  - **Próxima/Anterior**: atualiza `indiceAtual` com wrap e chama `carregarMusica()`.
  - **carregarMusica(index)**: seta `audioPlayer.src` e atualiza `#musica-titulo`.
  - **Clique no card**: muda música para o índice do card.
  - **Progresso**:
    - no `timeupdate`: ajusta barra e tempo atual.
    - no `change`: permite “seeking” pela barra.
  - **Tempo total** no `loadedmetadata`.
  - **Automático ao terminar**: no `ended`, chama próxima música.
- `formatarTempo(segundos)` formata para `MM:SS`.

### `style.css`
- Reset básico.
- Layout em coluna (container com sidebar + main + player).
- Paleta dark (fundo preto/cinza) e destaque verde.
- Estilos para cards, botões e barra de progresso.

---

## Observações sobre outros projetos
As pastas `SENAI */` possuem outros arquivos (ex.: jogos em HTML). Este README, por enquanto, detalha **os projetos que foram inspecionados durante a automação** (principalmente os `index`/`cart` e o projeto “Spotify”).

Se você quiser, posso expandir este README com o mesmo nível de detalhe para **todas** as pastas restantes (`SENAI 01.07.26/`, `SENAI 10.06.26/`, etc.), incluindo também os HTMLs e seus scripts.

