## Passos para configuração do projeto ##

# AUTOR #

- Nome: Gabriel de Figueiredo Corrêa
- Telefone: (12) 98805-2805
- Email: figueiredo.gabriel@gmail.com


# DADOS DO AMBIENTE #

- Sistema operacional: Ubuntu
- Linguagem: PHP 7.0
- Servidor Web: Apache2
- Banco: MySQL
- Criptografia: MD5


# CONFIGURAÇÃO #

1) Configurar um virtual hos com o seguinte conteudo:

<VirtualHost *:80>
    ServerName semhora
    DocumentRoot "/var/www/careers/public
    SetEnv ambiente "desenv"
    <Directory "/var/www/careers/public">
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost> 


2) Adicionar a seguinte linha ao /etc/hosts

127.0.0.1       semhora


3) No Banco de dados aplicar o seguinte SCRIPT

/* TABELA DE USUÁRIO */

CREATE TABLE `sem_hora`.`USUARIO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `USUARIO` VARCHAR(45) NOT NULL,
  `SENHA` VARCHAR(45) NOT NULL,
  `IND_HABILITADO` CHAR(1) NOT NULL COMMENT 'S = SIM\nN = NÃO',
  PRIMARY KEY (`ID`));


/* INSERÇÃO DE USUÁRIOS */
INSERT INTO `sem_hora`.`USUARIO` (`USUARIO`, `SENHA`, `IND_HABILITADO`) VALUES ('gabriel', '24500fa6ecaeb8300905727802af3081', 'S');
INSERT INTO `sem_hora`.`USUARIO` (`USUARIO`, `SENHA`, `IND_HABILITADO`) VALUES ('admin', '24500fa6ecaeb8300905727802af3081', 'S');


/* TABELA DE EVENTOS */

CREATE TABLE `sem_hora`.`EVENTO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(60) NOT NULL,
  `DESCRICAO` VARCHAR(100) NOT NULL,
  `LOCAL` VARCHAR(100) NOT NULL,
  `HORARIO` DATETIME NOT NULL,
  `CAMINHO_IMG` VARCHAR(100) NULL,
  `STATUS` CHAR(1) NOT NULL COMMENT 'A = ATIVO\nI = INATIVO',
  PRIMARY KEY (`ID`));


4) Todas as configurações do sistema ficam no arquivo config/config.ini

5) Credenciais de acesso ao sistema:

- Usuário: gabriel
- Senha: lalala123