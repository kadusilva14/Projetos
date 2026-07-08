# Calculadora de IMC — HTML, CSS, PHP e MySQL (HeidiSQL)

## Arquivos
- `database.sql` — cria o banco de dados e a tabela `registros_imc`
- `config.php` — conexão com o banco de dados (MySQLi)
- `index.php` — formulário e cálculo do IMC
- `historico.php` — lista os cálculos salvos no banco
- `style.css` — estilização das páginas

## Como configurar

### 1. Instale um ambiente PHP + MySQL
Use XAMPP, WAMP, Laragon ou similar (inclui PHP, Apache e MySQL).

### 2. Crie o banco de dados com o HeidiSQL
1. Abra o HeidiSQL e conecte-se ao seu servidor MySQL (geralmente `localhost`, usuário `root`, sem senha por padrão).
2. Vá em **Arquivo > Executar arquivo SQL...** e selecione o arquivo `database.sql`.
   - Isso criará o banco `calculadora_imc` e a tabela `registros_imc`.

### 3. Ajuste a conexão (se necessário)
Abra `config.php` e confira/ajuste:
```php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "calculadora_imc";
```

### 4. Coloque os arquivos no servidor
Copie a pasta `imc-calculadora` para o diretório do seu servidor (ex.: `htdocs` no XAMPP).

### 5. Acesse no navegador
```
http://localhost/imc-calculadora/index.php
```

## Funcionamento
- O usuário informa nome, peso (kg) e altura (m).
- O PHP calcula: `IMC = peso / (altura × altura)`.
- O resultado é classificado conforme a tabela da OMS (Abaixo do peso, Peso normal, Sobrepeso, Obesidade).
- Cada cálculo é salvo automaticamente no banco de dados MySQL.
- A página `historico.php` exibe os últimos 50 cálculos salvos.
