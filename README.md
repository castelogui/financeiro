<div align="center">
  <h1>Sistema Financeiro</h1>
  <p>Um sistema financeiro para controle de gastos compartilhado</p>
</div>
<p align="center">
  <img alt="GitHub language count" src="https://img.shields.io/github/languages/count/castelogui/financeiro?color=%2304D361">
  <a href="https://github.com/castelogui/financeiro/blob/master/LICENSE">
    <img alt="License" src="https://img.shields.io/badge/license-MIT-brightgreen">
  </a>
  <a href="https://www.linkedin.com/in/castelo-guilherme/">
    <img alt="Made by castelogui" src="https://img.shields.io/badge/made%20by-castelogui-%2304D361">
  </a>
  <img alt="Repository size" src="https://img.shields.io/github/repo-size/castelogui/financeiro">
  <img src="https://wakatime.com/badge/user/b889ed60-65c5-4d75-a1e7-65c986b29d59/project/1187902d-0997-46a6-a3ee-28b3e97c7014.svg" alt="Wakatime project Financeiro">
</p>

<p align="center">
  <img alt="Stargazers" src="https://img.shields.io/github/stars/castelogui/financeiro?style=social">
  <img alt="Watchers" src="https://img.shields.io/github/watchers/castelogui/financeiro?style=social">
  <img alt="Forks" src="https://img.shields.io/github/forks/castelogui/financeiro?style=social">
  <img alt="Issues" src="https://img.shields.io/github/issues/castelogui/financeiro?style=social">
  <img alt="Contributors" src="https://img.shields.io/github/contributors/castelogui/financeiro?style=social">	
</p>

## O projeto
O projeto consiste em um sistema financeiro para controle de gastos pessoais, onde o usuário poderá cadastrar suas contas e transações, e assim ter um controle maior sobre suas finanças.

## Tecnologias
- [PHP v 8.0.26](https://www.php.net/)
- [Bootstrap v 5.3](https://getbootstrap.com/)
- [MySQL v 8.0.31](https://www.mysql.com/)
- [WampServer](https://www.wampserver.com/en/)
- [Git](https://git-scm.com/)
- [GitHub](https://github.com/)
- [VSCode](https://code.visualstudio.com/)
- [WakaTime](https://wakatime.com/)
## Imagens do Projeto
### Login Dark and Light
  |  |  | 
  | ------------- | ------------- |
  | <img src="./assets/images/project/login.png" alt="Login Dark"> | <img src="./assets/images/project/login_white.png" alt="Login White"> |

### Home Dark and Light
  |  |  |
  | ------------- | ------------- |
  | <img src="./assets/images/project/index.png" alt="Home Dark"> |<img src="./assets/images/project/index_white.png" alt="Home White"> |
</div>

### Controle de Usuarios
<div align="center">
  
  | Lista | Lista White | Cadastra | Edita | 
  | ------------- | ------------- | ------------- | ------------- |
  | <img src="./assets/images/project/usuarios_list.png" alt="List Users" /> | <img src="./assets/images/project/usuarios_list_white.png" alt="List Users Light" />  | <img src="./assets/images/project/usuarios_create.png" alt="Cadastra Usuario"/> | <img src="./assets/images/project/usuarios_edit.png" alt="Edita Usuario"/> |
</div>

### Controle de Contas
<div align="center">
  
  | Lista | Detalhes | Cadastra | Edita | 
  | ------------- | ------------- | ------------- | ------------- |
  | <img src="./assets/images/project/contas_list.png" alt="List Contas" /> | <img src="./assets/images/project/contas_detalhes.png" alt="Details Conta" />  | <img src="./assets/images/project/contas_create.png" alt="Cadastra Conta"/> | <img src="./assets/images/project/contas_edit.png" alt="Edita Conta  "/> |
</div>

### Controle de Categoria Das Contas
<div align="center">
  
  | Lista | Cadastra | Edita | 
  | ------------- | ------------- | ------------- |
  | <img src="./assets/images/project/categorias_contas_list.png" alt="List Categoria Contas" /> | <img src="./assets/images/project/categorias_contas_create.png" alt="Cadastra Categoria Conta"/> | <img src="./assets/images/project/categorias_contas_edit.png" alt="Edita Categoria Conta"/> |
</div>

### Controle de Transações
<div align="center">
  
  | Lista | Lista White | Cadastra | 
  | ------------- | ------------- | ------------- |
  | <img src="./assets/images/project/transacoes_list.png" alt="List Transations" /> | <img src="./assets/images/project/transacoes_list_white.png" alt="List Transations White" />  | <img src="./assets/images/project/transacoes_create.png" alt="Cadastra Transação"/> |
</div>

### Controle de Categoria das Transações
<div align="center">
  
  | Lista | Edita | Cadastra | 
  | ------------- | ------------- | ------------- |
  | <img src="./assets/images/project/categorias_transacoes_list.png" alt="List Categorias Transations" /> | <img src="./assets/images/project/categorias_transacoes_edit.png" alt="Edita Categoria Transations" />  | <img src="./assets/images/project/categorias_transacoes_create.png" alt="Cadastra Categoria Transação"/> |
</div>

## Status do Projeto
- [x] Em planejamento
- [x] Em desenvolvimento
- [ ] Publicado
- [ ] Concluido

## Como contribuir para o projeto
1. Faça um **fork** do projeto.
2. Crie uma nova branch com as suas alterações: `git checkout -b my-feature`
3. Salve as alterações e crie uma mensagem de commit contando o que você fez: `git commit -m "feature: My new feature"`
4. Envie as suas alterações: `git push origin my-feature`
## Como executar o projeto
### Pré-requisitos
- [Git](https://git-scm.com/)
- [WampServer](https://www.wampserver.com/en/)
- [Composer](https://getcomposer.org/)
- [PHP v 8.0.26](https://www.php.net/)
- [MySQL v 8.0.31](https://www.mysql.com/)
- [VSCode](https://code.visualstudio.com/)

### Rodando o projeto
```bash
# Após instalar o wampserver, clone o repositório e coloque na pasta www do wampserver
$ git clone hppts://github.com/castelogui/financeiro

# Crie um banco de dados no MySQL com o nome de "financeiro" com o sql abaixo
$ cd src/database/financeiro.sql

# Configure as variáveis com as informações do seu banco de dados
# exemplo:
define("HOST", '127.0.0.1');
define("USER", 'root');
define("PASS", 'root');
define("BASE", 'financeiro');

# Para acessar o sistema, crie um usuário no banco de dados com o comando sql abaixo
INSERT INTO usuarios (nomeUsuario, sobrenomeUsuario, dtNascUsuario, username, emailUsuario, senhaUsuario, statusUsuario) VALUES ('root', 'root', '2021-09-01', 'root', 'root@root.com', 'root', '1');

# Após todas as configurações, inicie o wampserver e acesse o projeto pelo navegador
localhost/financeiro

# Para acessar o sistema, utilize o usuário criado no passo anterior
username: root
senha: root
```
## Autor
- [Guilherme Castelo](https://www.linkedin.com/in/castelo-guilherme/)
## Licença
Este projeto esta sobe a licença [MIT](./LICENSE).
## Versões do README
[Português 🇧🇷](./README.md)