## Sobre o projeto

Este projeto foi criado utilizando algumas bibliotecas como Symfony Router, HttpFoundation e Doctrine.

## Instalação do projeto

Você deve ter:

    - Composer instalado
    - PHP 7.1+
    - MySQL
    
Instalar o projeto:

Seu servidor web deve suportar url's amigaveis.

Exemplo de configuração para o Nginx:

    server {
            listen 80;
            listen [::]:80;
    
            root /dir/do/projeto/public;
    
            index index.php;
    
            server_name semhora.dev;
    
            location / {
                    try_files $uri /index.php$is_args$args;
            }
    
            location ~ \.php$ {
                    include snippets/fastcgi-php.conf;
                    fastcgi_pass unix:/run/php/php7.1-fpm.sock;
    
                    fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
                    fastcgi_param DOCUMENT_ROOT $realpath_root;
            }
    }

Em `config/config.php` há a configuração dos dados de acesso ao banco de dados.
Configure-o.

Execute os seguintes comandos:

    composer install
    vendor/bin/doctrine-migrations mi:mi
    
Este projeto já vem com um usuário pré cadastrado:
 - Email: raul.3k@gmail.com
 - Senha: 101010
 

