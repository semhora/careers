
Antes de continuar, eu gostaria de agradecer a oportunidade de participar do processo seletivo da Sem Hora!

Para desenvolver este projeto eu foquei no back-end então as views estão bem simples, 
tentei padronizar este código com o modelo que eu geralmente trabalho, 
infelizmente não deu tempo de fazer com TDD ou implementar testes unitários

Utilizei: 

- PHP 5.6
- Mysql
- doctrine/orm
- phroute/phroute (Primeira vez que utilizo)
________________________________________________________________________________________________________________________

1   - INSTALL

1.1 - No Mysql: CREATE DATABASE teste;

1.2 - Na raiz do projeto, rodar: composer install

1.3 - Atualizar o arquivo cofig.php na raiz do projeto com os dados de conexão ao MySql

1.4 - Na raiz do projeto Rodar o comand do Codctrine para criar as tabelas: 
      vendor/bin/doctrine orm:schema-tool:update --force

1.5 - No Mysql: insert into user (user, pass) values ("admin", "admin");
      
________________________________________________________________________________________________________________________


2 - ROUTES

2.1 - AUTHENTICATED USER

2.1.1 - http://<your-domain>/admin/user/form
    
2.1.2 - http://<your-domain>/admin/event/form
    
2.2 - PUBLIC USER

2.2.1 - http://<your-domain>/event
    
2.2.1 - http://<your-domain>/details/{id}
    
2.3 - LOGIN

2.3.1 - http://<your-domain>/auth/Login