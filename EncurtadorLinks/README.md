# 🔗 Gerenciador de Links (Encurta)

Uma aplicação web prática, responsiva e intuitiva criada para armazenar, organizar e categorizar URLs do dia a dia em um único painel.

---

## 📌 Contexto & Projeto

### 🎯
Com o fluxo de navegação constante entre diversas plataformas de estudo, trabalho e entretenimento, o acúmulo de abas abertas e links soltos prejudica a produtividade e a organização. Havia a necessidade de uma solução centralizada para salvar e consultar referências importantes com facilidade.

### 📋
Desenvolver uma ferramenta web de gerenciamento de links que permitisse:
- Cadastrar novas URLs associadas a um título e uma categoria específica (Lazer, Trabalho, Estudos ou Geral).
- Exibir a lista de links salvos com identificação visual do site e rótulos de categoria.
- Permitir a exclusão de links mantendo a interface atualizada em tempo real.
- Processar requisições de forma rápida, sem recarregar a página a cada ação do usuário.

### 🛠️
Para construir o sistema com alta performance e boa usabilidade, as seguintes estratégias foram adotadas:
- **Estruturação de API e Banco de Dados:** Criação de rotas no backend para recepção, consulta e exclusão de registros em banco de dados relacional, aplicando práticas de segurança contra invasões.
- **Comunicação Assíncrona:** Implementação de integração em JavaScript para envio e recuperação de dados sem interrupção de tela (AJAX/Fetch API).
- **Identificação Visual Dinâmica:** Captura automática do ícone (favicon) de cada site cadastrado para facilitar a identificação visual rápida na listagem.
- **Interface Responsiva:** Construção de um layout limpo e adaptável para uso em computadores e dispositivos móveis usando componentes do Bootstrap.

### 🏆
- **Navegação Fluida:** Operações instantâneas de cadastro, consulta e remoção sem recarregamento de página.
- **Melhor Organização:** Facilidade em separar links por contextos de rotina com suporte a etiquetas visuais e ícones de rápida identificação.
- **Código Enxuto e Modular:** Arquitetura limpa e desacoplada, facilitando a manutenção e a integração com novos recursos no futuro.

---

## 🚀 Tecnologias Utilizadas

- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap
- **Backend:** PHP
- **Banco de Dados:** MySQL

---

## 💻 Recursos da Aplicação

- Cadastro de títulos, links e categorias personalizadas.
- Identificação visual automática dos sites via favicon.
- Exclusão de links com confirmação do usuário.
- Interface responsiva adaptada para telas de desktop e celulares.
