# Questoes #

## Visão Geral ##


WebService para o aplicativo "Questoes" no Android
Base de dados realizada em PHP + MySQL

Para melhor funcionamento do WebService é recomendada instalação do PHP 5.3 ou posterior 
onde está adicionada a função de "late static bindings"
http://php.net/manual/pt_BR/language.oop5.late-static-bindings.php

## Configurando o banco de dados ##

Para configurar o servidor MySQL crie um novo usuário garantindo todos os privilégios para o banco "questões"
utilizando como os dados User, Host, Senha contidas no arquivo "/includes/config.php"

    > GRANT ALL PRIVILEGES ON *.* TO webservice@localhost  IDENTIFIED BY 'minhasenha';

Depois verifique o arquivo sql e faça a os registros.


## Layout dos Diretórios ##

* public: pasta de acesso público
* includes: pasta que contém arquivos de base como classes, funções e arquivos de configuração.