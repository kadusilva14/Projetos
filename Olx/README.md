# OLX Hype 📦🔍

Sistema web para **cadastro de produtos com geração automática de QR Code** e **consulta de itens via leitura de QR Code pela câmera**. Ideal para brechós, bazares, feiras de usados e pequenos vendedores que precisam etiquetar fisicamente seus produtos e permitir que compradores vejam os detalhes do item apenas escaneando o código.

## ✨ Funcionalidades

- **Cadastro de produtos** com nome, preço, categoria, estado de conservação, descrição e imagem.
- **Geração automática de QR Code** único para cada produto cadastrado (para imprimir e colar no item físico).
- **Leitura de QR Code** pela câmera do dispositivo (ou por upload de imagem), exibindo instantaneamente os dados do produto correspondente.
- **Upload seguro de imagens**, com validação de tipo MIME real, tamanho máximo e nome de arquivo aleatório.
- **API em PHP** simples (JSON) para cadastro e busca de produtos.

## 🖼️ Telas

| Cadastro do produto | QR Code gerado |
|---|---|
| ![Cadastro de Produto](Cadastro_Produto.png) | ![Produto Cadastrado](Produto_Cadastrado.png) |

| Leitor de QR Code | Leitura e exibição do produto |
|---|---|
| ![Leitor de QR Code](Leitor_de_QR_CODE.png) | ![Leitura do QR Code e Produto](Leitura_do_QR_CODE_e_Produto.png) |

## 🛠️ Tecnologias utilizadas

**Front-end**
- HTML5 + [Bootstrap 5.3](https://getbootstrap.com/)
- [QRCode.js](https://davidshimjs.github.io/qrcodejs/) — geração visual do QR Code
- [html5-qrcode](https://github.com/mebjas/html5-qrcode) — leitura de QR Code pela câmera/imagem

**Back-end**
- PHP 8+ (sem framework), utilizando PDO com *prepared statements*
- MySQL / MariaDB

## 📁 Estrutura do projeto

```
.
├── index.html               # Página inicial – leitor de QR Code e exibição do produto
├── cadastrar.html            # Formulário de cadastro de produto + geração de QR Code
├── config.php                 # Conexão com o banco de dados (PDO)
├── cadastrar_produto.php      # Endpoint: valida dados, salva imagem e insere produto no banco
├── buscar_produto.php         # Endpoint: busca produto pelo código do QR Code
├── schema.sql                  # Script de criação do banco de dados e da tabela `produto`
└── uploads/                    # Diretório onde as imagens dos produtos são salvas (criado automaticamente)
```

## ⚙️ Pré-requisitos

- PHP 8.0 ou superior, com a extensão `pdo_mysql` habilitada
- MySQL 5.7+ ou MariaDB 10.3+
- Servidor web (Apache, Nginx ou o servidor embutido do PHP)

## 🚀 Instalação

1. **Clone ou copie os arquivos do projeto** para o diretório do seu servidor web.

2. **Crie o banco de dados** executando o script `schema.sql`:

   ```bash
   mysql -u root -p < schema.sql
   ```

   Isso criará o banco `db_olx` e a tabela `produto`.

3. **Configure a conexão com o banco** em `config.php`:

   ```php
   $host = 'localhost';
   $db   = 'db_olx';
   $user = 'root';
   $pass = '';
   ```

   Ajuste `$user` e `$pass` conforme o ambiente. Em produção, defina `MODO_DEBUG` como `false` e evite expor mensagens de erro internas.

4. **Garanta permissão de escrita** no diretório do projeto para que a pasta `uploads/` possa ser criada automaticamente pelo `cadastrar_produto.php`.

5. **Suba o servidor** (exemplo usando o servidor embutido do PHP):

   ```bash
   php -S localhost:8000
   ```

6. Acesse:
   - `http://localhost:8000/index.html` → leitor de QR Code
   - `http://localhost:8000/cadastrar.html` → cadastro de produtos

## 🧾 Modelo de dados

Tabela `produto`:

| Campo | Tipo | Descrição |
|---|---|---|
| `id` | INT (PK, auto increment) | Identificador único |
| `nome` | VARCHAR(150) | Nome do produto |
| `estado_de_conservacao` | ENUM | `Novo`, `SemiNovo`, `Usado`, `Restaurado` |
| `info_item` | TEXT | Descrição detalhada do item |
| `preco_item` | DECIMAL(10,2) | Preço do produto |
| `categoria` | VARCHAR(50) | Categoria do produto |
| `codigo_qr` | VARCHAR(50) UNIQUE | Código único vinculado ao QR Code |
| `imagem` | VARCHAR(255) | Caminho relativo da imagem enviada |
| `criado_em` | TIMESTAMP | Data/hora de criação do registro |

## 📡 API

### `POST /cadastrar_produto.php`

Cadastra um novo produto. Envio via `multipart/form-data`.

**Campos:**
| Campo | Obrigatório | Descrição |
|---|---|---|
| `nome` | ✅ | Nome do produto (máx. 150 caracteres) |
| `preco_item` | ✅ | Preço (numérico, maior que 0) |
| `categoria` | ✅ | Categoria (máx. 50 caracteres) |
| `estado_de_conservacao` | ✅ | Um dos valores válidos do enum |
| `info_item` | ✅ | Descrição do item |
| `imagem` | ✅ | Arquivo JPG, PNG, WEBP ou GIF (máx. 5MB) |

**Resposta de sucesso (200):**
```json
{
  "sucesso": true,
  "mensagem": "Produto salvo com sucesso!",
  "codigo_qr": "QR-a5ef0ddadf1e23a9"
}
```

**Resposta de erro (400/500):**
```json
{
  "sucesso": false,
  "erro": "Mensagem descritiva do erro"
}
```

### `GET /buscar_produto.php?codigo=QR-XXXXXXXX`

Busca um produto pelo código do QR Code.

**Resposta de sucesso (200):**
```json
{
  "sucesso": true,
  "dados": {
    "id": 1,
    "nome": "PAGEOT",
    "estado_de_conservacao": "SemiNovo",
    "info_item": "PAGEOT 206 Seminovo - Documento em Dia!",
    "preco_item": "7000.00",
    "categoria": "AUTOMOVEL",
    "codigo_qr": "QR-a5ef0ddadf1e23a9",
    "imagem": "uploads/xxxxxxxx.webp",
    "criado_em": "2026-08-21 12:00:00"
  }
}
```

**Resposta de erro (404):**
```json
{
  "sucesso": false,
  "erro": "Produto não encontrado para este QR Code."
}
```

## 🔒 Segurança

- Todas as consultas ao banco utilizam **PDO com *prepared statements*** (`PDO::ATTR_EMULATE_PREPARES => false`), prevenindo SQL Injection.
- O tipo real do arquivo enviado é verificado com `finfo` (checagem do MIME real, não apenas da extensão).
- Os arquivos de imagem são salvos com **nomes aleatórios** (`random_bytes`), evitando colisões e *path traversal*.
- O código do QR Code é gerado de forma aleatória e única (`bin2hex(random_bytes(8))`).

> **Atenção:** antes de colocar em produção, defina `MODO_DEBUG` como `false` em `config.php`, revise as permissões do diretório `uploads/` e configure HTTPS.

## 🗺️ Possíveis melhorias futuras

- Autenticação de vendedores e painel de gerenciamento de anúncios
- Edição e exclusão de produtos cadastrados
- Paginação e busca por categoria/nome
- Impressão em lote das etiquetas com QR Code
- Testes automatizados para os endpoints PHP

## 📄 Licença

Projeto de uso livre para fins de estudo e adaptação. Ajuste a licença conforme a necessidade do seu projeto.
