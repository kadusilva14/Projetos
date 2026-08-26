# 📋 Dashboard de Tarefas & Widget de Clima

Um painel web dinâmico e responsivo desenvolvido para otimizar o gerenciamento de tarefas diárias em tempo real, integrado com monitoramento meteorológico automatizado.

---

## 🎯 Contexto e Desafio

No dia a dia do desenvolvimento e acompanhamento de rotinas, ferramentas complexas ou lentas podem prejudicar a produtividade. Havia a necessidade de construir uma aplicação leve, intuitiva e funcional que permitisse gerenciar tarefas (CRUD completo) sem atualizações de página (*page reload*), ao mesmo tempo em que exibisse informações meteorológicas úteis para o planejamento do usuário.

---

## 🛠️ Objetivos do Projeto

Para atender a essa demanda, os seguintes requisitos foram estabelecidos:

- **Back-end Restful:** Criar uma API em PHP flexível para processamento seguro de operações no banco de dados MySQL.
- **Interface Assíncrona:** Desenvolver a lógica de front-end com JavaScript assíncrono (`Fetch API`) para manipulação dinâmica do DOM.
- **Integração de Serviço Externo:** Consumir uma API de clima externa (Open-Meteo) para exibição em tempo real de temperatura e condições do tempo.
- **Interface Responsiva e Amigável:** Utilizar Bootstrap 5 para criar um visual moderno, limpo e adaptável a telas de diferentes tamanhos.

---

## 💡 Solução e Implementação

A aplicação foi estruturada focando na separação de responsabilidades e na usabilidade do usuário:

### Arquitetura da Aplicação
1. **Modelagem do Banco de Dados (`schema.sql`):**
   - Criação da tabela `tarefas` com colunas estratégicas (`id`, `titulo`, `status` e `criado_em`), limitando os status com suporte a `pendente`, `em_andamento` e `concluido`.

2. **API RESTful e Persistência (`api.php` & `config.php`):**
   - Conexão segura utilizando `PDO` com tratamento de exceções.
   - Roteamento nativo baseado nos métodos HTTP (`GET`, `POST`, `PUT`, `DELETE`).
   - Sanitização de dados recebidos via JSON e suporte a *Prepared Statements* contra SQL Injection.

3. **Front-end Dinâmico e Consumo de APIs (`app.js` & `index.html`):**
   - **Gerenciador de Tarefas:** Operações assíncronas para inclusão, listagem, edição em linha (*inline editing*) e exclusão de itens.
   - **Widget de Clima:** Chamada à API da Open-Meteo para a cidade de São Paulo, mapeando códigos WMO para descrições amigáveis em português (ex: *Céu limpo*, *Parcialmente nublado*).
   - **Segurança de Entrada:** Implementação da função `escapeHtml` para mitigação de vulnerabilidades XSS.

---

## 📈 Resultados Alcançados

- ⚡ **Experiência Fluida:** Adoção de requisições assíncronas permitindo criação, edição e remoção de tarefas instantaneamente, sem necessidade de recarregar a página.
- 📱 **Design Limpo e Responsivo:** Layout leve estruturado com Bootstrap 5, otimizado tanto para desktops quanto para dispositivos móveis.
- 📊 **Feedback Visual:** Badges coloridas e dinâmicas conforme o estado da tarefa (*Pendente*, *Em andamento*, *Concluído*).
- 🌤️ **Informação Útil ao Alcance:** Widget meteorológico integrado funcional e sem necessidade de chave de API paga.

---

## 🚀 Como Executar o Projeto

### Pré-requisitos
- Servidor Web com PHP 7.4+ (XAMPP, WAMP, Laragon ou Docker).
- Servidor MySQL.

### Passo a Passo

1. **Clonar o Repositório:**
   ```bash
   git clone [https://github.com/seu-usuario/seu-repositorio.git](https://github.com/seu-usuario/seu-repositorio.git)
   cd seu-repositorio
