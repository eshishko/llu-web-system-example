# Course work in LLU Web Systems Development

[LLU Web Systems Development](https://lais.llu.lv/lluis/kursa_apraksts/GINT6021/2)

## Installation

    * git clone git@github.com:eshishko/llu-web-system-example.git
    * cd llu-web-system-example
    * cp .env .env.local #and fill it
    * php composer.phar install
    * php bin/console doctrine:migrations:migrate #load DB migration

## Requirements
    * php ^7.2
    * mysql || mariadb
    * [Symfony Requirements](https://symfony.com/doc/current/reference/requirements.html)
  
## Read more

* [WEB server configuration](https://symfony.com/doc/current/setup/web_server_configuration.html)
* [Sonata Admin Bundle](https://sonata-project.org/bundles/admin/3-x/doc/index.html)
* [Coding standards](https://symfony.com/doc/current/contributing/code/standards.html)