# REPO-FULLSTACK (Projetos e Exercícios)

Repositório com projetos e exercícios feitos durante aulas, separados por pasta. Cada pasta costuma funcionar como um **mini-site** (web) ou um **exercício de lógica** (C/Java).

---

## Como rodar (por tecnologia)

### HTML / CSS / JavaScript (front-end)
- Abra diretamente no navegador o arquivo `index.html` (ou outro `*.html`) dentro da pasta.
- Arquivos comuns:
  - `style.css` (estilos)
  - `script.js` (interatividade)

### PHP (back-end)
- Use **XAMPP** (ou outro servidor PHP).
- Acesse via URL `http://localhost/<pasta>/index.php`.
- Arquivos comuns:
  - `index.php` (página inicial)
  - `processa.php` (processamento de formulário)
  - `config.php` (conexão com banco, quando existe)

### SQL (banco de dados)
- Há arquivos como `database.sql`/`banco.sql`.
- Importe no **phpMyAdmin** para criar tabelas/estrutura usada pelos projetos PHP.

### Java e C (exercícios)
- Cada arquivo `*.java` em `Java/` e cada `*.c` em `C/` é um exercício separado.
- Compile/execute no seu ambiente de desenvolvimento.

---

## Como cada pasta se encaixa (visão geral)

### Web (HTML/CSS/JS)
- `Spotify/` → player e interface estilo Spotify (HTML/CSS/JS + `script.js`).
- `JogoDaMemoria/` → jogo “Jogo da Memória” (HTML).
- `Gacha/` → interface de gacha (HTML).
- `JornalCopaDoMundo/` → página estática do jornal (HTML).
- `JornalItambi/` → página estática do jornal (HTML + imagens).
- `SiteHospedagemDeJogos/` → página de hospedagem de jogos (HTML).
- `SitePrefeituraRioDeJaneiro/` → site estático (HTML/CSS).
- `SiteTesteHtmlCSS/` → testes de HTML/CSS (páginas `firstysite.html`, `sobre.html`, `contato.html`, etc.).
- `LojaEscolar/` → páginas de loja (HTML).
- `MeuJogoDePlataforma/` → jogo de plataforma (HTML).
- `LojaDeInformatica/` → **projeto web em PHP** (ver seção PHP), mas possui `style.css`.

### Web (PHP)
- `Supermercado/` → sistema estilo supermercado com listagem e carrinho (PHP + carrinho via sessão). Usa `config.php`, `cart.php`, `index.php` e `script.js`.
- `CalculadoraDeIMC/` → calculadora de IMC com persistência/histórico (PHP + arquivos `config.php`, `database.sql`, `historico.php`).
- `FormularioContato/` → formulário de contato com envio/processamento (HTML + `processa.php`).
- `FormularioClinica/` → formulário/fluxo de clínica/agendamento (HTML + pages em `agendamento/` e `index/`).
- `MedicaoTemperatura/` → medição/registro via PHP (`medTemp.php`).
- `Sacolão/` → página/funcionalidade em PHP (`index.php` + `sacolao.php`).
- `Serasa/` → projeto PHP com banco (inclui `conexao.php`, `resultado.php`, `banco.sql`, `style.css`).
- `LojaDeInformatica/` → CRUD/gestão via PHP (`cadastrar.php`, `editar.php`, `excluir.php`, `index.php`, `config.php`, `database.sql`).
- `BancoMaster/` → projeto PHP com subpasta `correcao/` e site `meu_site/` (ex.: `emprestimo.html`).

### Java (exercícios)
- `Java/` → exercícios em arquivos `*.java` (cada arquivo tem seu `main`). Exemplos no repositório: `HelloWorld.java`, `Tabuada.java`, `CalculoDeIMC.java`, etc.

### C (exercícios)
- `C/` → exercícios em arquivos `*.c` (cada arquivo é um exercício separado). Exemplos: `Matriz.c`, `ContagemDeVogais.c`, `ReajusteSalarial.c`, etc.

---

## Dicas rápidas
- Se um projeto web referenciar `script.js`/`style.css`, verifique se esses arquivos existem **dentro da mesma pasta do mini-site**.
- Para projetos PHP que usam banco, importe o `*.sql` correspondente antes de testar.



