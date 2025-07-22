![Logo do Projeto](https://i.imgur.com/bR61Ihv.png)
# CQL - Controle de Qualidade do Leite
## Sobre o Sistema
O CQL é um site destinado a alunos do projeto de extensão PIBIC - CONTROLE DE QUALIDADE FÍSICO-QUÍMICO DO LEITE do IFPE campus Belo Jardim, o site conta com o gerenciamento do rebanho de vacas leiteiras e seu registro de produções de leite, bem como o resgistro dos fatores que podem influenciar na qualidade do leite, Utilizando um banco de dados local em SQL e uma interface feite majoritariamente em PHP, e otimizada em alguns pontos com javascript.
## Como instalar?
## Pré-requisitos
- Ter o XAMPP instalado (com Apache e MySQL)
- Ter o arquivo .zip do projeto descompactado
## Instalação
1. Descompacte o projeto .zip.
2. Mova a pasta do projeto para o diretório:
```bash
C:\xampp\htdocs\
```
## Configuração
No navegador, acesse:
```bash
http://localhost/projetoWeb/backEnd/criar_banco.php
```
Você deve ver a mensagem “Banco criado com sucesso”.
Ainda no navegador acesse:
```bash
http://localhost/projetoWeb/backEnd/conexao.php
```
  (não exibirá mensagem, apenas conecta o sistema ao banco)
- No painel phpMyAdmin do XAMPP:
 - Clique em "Importar" no banco cql_ifpe1
 - Selecione o arquivo cql_ifpe1.sql da pasta do projeto e importe
## Executar
Acesse:
```bash
http://localhost/projetoWeb/FrontEnd
```
O sistema estará pronto para uso.

## Licença

Este projeto não possui uma licença de uso.  
Você pode visualizar o código e se inspirar, mas **não está autorizado a copiá-lo, usá-lo ou distribuí-lo**.  
Todos os direitos reservados.


