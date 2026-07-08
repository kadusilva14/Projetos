# REPO-FULLSTACK (Projetos e Exercícios)

Repositório com projetos e exercícios feitos durante aulas, separados por pasta. Cada pasta costuma funcionar como um **mini-site** (web) ou um **exercício de lógica** (C/Java).

---

## Como rodar (por tecnologia)

<<<<<<< HEAD
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
=======
- Projeto **Supermercado Online (PHP + MySQL via PDO)**
- Projeto **Spotify (HTML/CSS/JS)**
- Pastas como `SENAI */` → outros exercícios em **HTML/PHP** (mini-sites)
- Pastas fora de `SENAI` (ex.: `Java/`, `C/`, `Spotify/`, `Supermercado/`, etc.) → projetos/exercícios equivalentes ou variações
>>>>>>> 4dea4b7bd7b217acbbc431f769740c6c27f70013

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

<<<<<<< HEAD

=======
### Supermercado Online (PHP)

**Objetivo**: simular um site de supermercado com **lista de produtos** e **carrinho**.

#### Arquivos principais
- `index.php` — lista os produtos cadastrados no banco.
- `cart.php` — gerencia carrinho na **sessão** (adiciona/remove/limpa) e calcula total.
- `config.php` — configura conexão PDO com MySQL.
- `style.css` — estilos do layout.
- `script.js` — no projeto atual, está referenciado no carrinho, mas o conteúdo pode não ser compatível (verifique se a página realmente carrega esse script).

#### Fluxo (como funciona)
1. `index.php` consulta no MySQL (tabela `produtos`) e renderiza uma grade.
2. Ao clicar em “Adicionar”, manda para `cart.php?action=add&id=...`.
3. `cart.php` usa `$_SESSION['carrinho']` para guardar quantidades e monta a tabela do carrinho.
4. Total é calculado como `preco * quantidade`.

> Observação importante: este projeto pressupõe uma tabela `produtos` com campos como `id`, `nome`, `descricao` (opcional) e `preco`.

---

### Spotify (HTML/CSS/JS)

**Objetivo**: UI estilo “Spotify” com playlist e player com controles.

#### Arquivos principais
- `index.html` — sidebar, cards das músicas e player com `audio`.
- `style.css` — tema dark + layout.
- `script.js` — controla play/pause, próxima/anterior, barra de progresso e clique nos cards.

#### Como a playlist funciona
- Cada card tem atributos (ex.: `data-src`) para indicar a URL do áudio.
- O JavaScript monta um array de músicas e controla o elemento `<audio id="audio-player">`.

---

## Pastas de exercícios (Java)

A pasta `Java/` contém exercícios individuais em arquivos `*.java`.

- `HelloWorld.java` — exemplo básico de Java.
- `AreaDoQuadrado.java` — cálculo de área de quadrado (usando lado).
- `AreaDoTriangulo.java` — cálculo de área de triângulo (base/altura).
- `Tabuada.java` — imprime tabuada.
- `CalculoDeIMC.java` — cálculo de IMC.
- `ParImpar.java` — verifica se um número é par ou ímpar.
- `Verificacao.java` — exercício de validações (separado do restante).
- `VerificadorMaioridade.java` — verifica maioridade/idade mínima.
- `CalculadoraDePreços.java` — exercício de cálculo envolvendo preços.
- `Senha.java` — validação de senha.
- `Diferença.java` — diferença entre valores.
- `MedidorDe Altura.java` — medidor/validação de altura.
- `VerificadorMaioridade.java` — (repetido no listagem acima como exemplo do conjunto) verifique arquivo para detalhes.

> Dica: para entender a lógica exata, abra cada arquivo `*.java` e procure as funções `main`.

---

## Pastas de exercícios (C)

A pasta `C/` contém exercícios individuais em arquivos `*.c`.

Exemplos:
- `Matriz.c`, `MatrizDupla.c`, `MatrizElemento.c`, `MatrizInverso.c`, `MatrizRecorrencia.c` — exercícios sobre matrizes.
- `ContadorDeVogais.c`, `ContagemDeVogais.c` — contagem de vogais.
- `MaiorDe4Numeros.c`, `MaiorDosNumeros.c`, `MaiorSalReajustado.c` — maior valor/reajuste.
- `ReajusteSalarial.c`, `SalBrutoLiquidoImposto.c`, `SalarioFuncionarios.c` — cálculos de salários.
- `NotasAlunosWhile.c`, `NotasComWhileLoop.c`, `MediaDeNotasDeAlunos.c` — exercícios de notas e médias.

> Dica: compile com `gcc` (ou seu compilador C) e rode executável gerado.

---

## Projetos fora de `SENAI` (variações)

Além das pastas `SENAI */`, existem pastas “soltas” que reproduzem o mesmo tipo de projeto:

- `Spotify/` — versão do projeto de player estilo Spotify (HTML/CSS/JS).
- `Supermercado/` — versão do projeto Supermercado (PHP + carrinho).
- Outras pastas: jogos e interfaces em HTML/PHP.

---

>>>>>>> 4dea4b7bd7b217acbbc431f769740c6c27f70013

