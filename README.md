Teste Sem Hora
===================

Primeiro execute o composer (você irá precisar ter o composer instalado globalmente):

    composer install

Depois será necessario configurar os dados de banco de dados em phinx.yml e config/database.php (eu sei, eu sei)  

Logo em seguida execute o arquivo de migração

    php vendor/bin/phinx migrate

Para iniciar a aplicação:

    php -S localhost:8000 -t webroot

A aplicação estará disponível em http://localhost:8000/ 