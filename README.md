
## Criando Classe para conectar
## Dependências para instalar no prejeto

* comando: composer init
* Composer install
* Atualizar Arquivo composer.json com as configurações conforme exemplo
* comando: composer dump-autoload
* composer require phpmailer/phpmailer
* implementar a pasta database 

 ## Exemplo:

 {
    "name": "usuario/php-ob",
    "type": "no",
    "autoload": {
        "psr-4": {
            "class\\": "class"
        }
    },
    "authors": [
        {
            "name": "isaiastech",
            "email": "enderecoEmail"
        }
    ],
    "minimum-stability": "stable",
    "require": {}
}

