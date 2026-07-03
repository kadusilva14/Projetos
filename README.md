# Projetos SENAI / Exercícios (HTML, CSS, JS, PHP, Java e C)

Este repositório reúne projetos e exercícios feitos durante aulas. Cada pasta geralmente funciona como um **mini-site** (ou exercício) separado.

> **Como abrir (XAMPP / navegador)**
> - **HTML / CSS / JS**: basta abrir o arquivo `*.html` no navegador.
> - **PHP**: execute via XAMPP (ex.: `http://localhost/SENAI 03.06.26/index.php`).
> - **C / Java**: são códigos de exercícios (compilar/rodar no seu ambiente). Para C e Java, a pasta contém apenas os arquivos fonte.

---

## Estrutura geral

- `SENAI 03.06.26/` → Projeto **Supermercado Online (PHP + MySQL via PDO)**
- `SENAI 30.06.26/` → Projeto **Spotify (HTML/CSS/JS)**
- Pastas como `SENAI */` → outros exercícios em **HTML/PHP** (mini-sites)
- Pastas fora de `SENAI` (ex.: `Java/`, `C/`, `Spotify/`, `Supermercado/`, etc.) → projetos/exercícios equivalentes ou variações

---

## Como navegar

### 1) PHP (mini-sites)
Procure por:
- `index.php` (página inicial)
- páginas que processam formulário como `processa.php`
- `config.php` (conexão com banco de dados, se houver)

### 2) HTML/CSS/JS
Procure por:
- `index.html` ou `*.html`
- `style.css` (estilos)
- `script.js` (interatividade)

### 3) Java e C
Procure por:
- `*.java` em `Java/` (exercícios individuais)
- `*.c` em `C/` (exercícios individuais)

---

## Projetos em destaque

### `SENAI 03.06.26/` — Supermercado Online (PHP)

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

### `SENAI 30.06.26/` — Spotify (HTML/CSS/JS)

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

## Observações

- Se você ver links quebrados (ex.: `script.js` referenciando conteúdo de outro projeto), isso costuma ser consequência de reaproveitamento de arquivos entre exercícios. Verifique a pasta do mini-site e confirme se os arquivos referenciados estão realmente lá.
- Este repositório foi enviado para GitHub com o conteúdo do diretório atual.

---

## Contato / Próximos passos

Se você quiser, eu posso também:
- organizar cada mini-site com um `README` próprio dentro de cada pasta,
- padronizar títulos e instruções de execução,
- e atualizar links entre HTML/PHP e seus scripts.

