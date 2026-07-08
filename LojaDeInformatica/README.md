# Sistema de Cadastro de Produtos de Informática — HTML, CSS, PHP e MySQL (HeidiSQL)

Sistema CRUD completo (Criar, Listar, Editar, Excluir) para gerenciar o estoque de produtos de uma loja de informática.

## Arquivos
- `database.sql` — cria o banco de dados e a tabela `produtos` (com alguns registros de exemplo)
- `config.php` — conexão com o banco de dados (MySQLi)
- `index.php` — lista os produtos cadastrados, com campo de busca
- `cadastrar.php` — formulário para cadastrar novos produtos
- `editar.php` — formulário para editar um produto existente
- `excluir.php` — remove um produto do banco de dados
- `style.css` — estilização de todas as páginas

## Como configurar

### 1. Instale um ambiente PHP + MySQL
Use XAMPP, WAMP, Laragon ou similar (inclui PHP, Apache e MySQL).

### 2. Crie o banco de dados com o HeidiSQL
1. Abra o HeidiSQL e conecte-se ao seu servidor MySQL (geralmente `localhost`, usuário `root`, sem senha por padrão).
2. Vá em **Arquivo > Executar arquivo SQL...** e selecione o arquivo `database.sql`.
   - Isso criará o banco `loja_informatica`, a tabela `produtos` e 5 produtos de exemplo.

### 3. Ajuste a conexão (se necessário)
Abra `config.php` e confira/ajuste:
```php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "loja_informatica";
```

### 4. Coloque os arquivos no servidor
Copie a pasta `cadastro-produtos` para o diretório do seu servidor (ex.: `htdocs` no XAMPP).

### 5. Acesse no navegador
```
http://localhost/cadastro-produtos/index.php
```

## Funcionalidades
- **Listar**: exibe todos os produtos em tabela, com categoria, marca, preço e quantidade em estoque.
- **Buscar**: filtro por nome, categoria ou marca diretamente na listagem.
- **Cadastrar**: formulário com validação de campos obrigatórios, preço e quantidade.
- **Editar**: permite atualizar qualquer produto já cadastrado.
- **Excluir**: remove o produto com confirmação antes da exclusão.
- Produtos com estoque abaixo de 5 unidades são destacados em vermelho na listagem.

## Campos do produto
| Campo | Tipo | Obrigatório |
|---|---|---|
| Nome | Texto | Sim |
| Categoria | Lista (Notebooks, Periféricos, Monitores, etc.) | Sim |
| Marca | Texto | Sim |
| Preço | Decimal | Sim |
| Quantidade em estoque | Inteiro | Sim |
| Descrição | Texto livre | Não |
