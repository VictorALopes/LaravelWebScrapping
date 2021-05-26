# Exemplo de Web Scraper em PHP

![Badge](https://img.shields.io/badge/PHP-8.0.6-blue)
![Badge](https://img.shields.io/badge/Laravel-8.42.1-blue)
![Badge](https://img.shields.io/badge/Composer-2.0.13-blue)

Este projeto é uma implementação simples de um [web scraper](https://pt.wikipedia.org/wiki/Coleta_de_dados_web) utilizando [PHP](https://www.php.net/) e [Laravel](https://laravel.com/)!


## 🛠 Instalação
Você precisará ter em seu ambiente as seguintes tecnologias:
- PHP
- Xampp
- Composer
- Laravel
- Editor de textos de sua preferência


Primeiramente, realize o download e instalação do [**Xampp**](https://www.apachefriends.org/pt_br/download.html), ele já vem com o PHP, um servidor e um gerenciador de banco de dados MySql.
#### Importante: Se você utiliza Windows não se esqueça de conferir nas variáveis de ambiente se a pasta onde o PHP foi instalado está no PATH. O diretório padrão é "C:\xampp\php"


Em seguida instale também o [**Composer**](https://getcomposer.org/download/) pois ele será necessário para a instalação do [**Laravel**](https://laravel.com/docs/8.x/installation#getting-started-on-windows). 

Para o editor de textos fica a sugestão do [**Visual Studio Code**](https://code.visualstudio.com/download)

## 👨‍💻👩‍💻 Utilização

- Realize o Clone do projeto
- Abra o Xampp e inicie os serviços Apache e MySql
- Acesse o PhpMyAdmin (http://localhost/phpmyadmin) 
- Crie um banco de dados com o nome desejado
- Configure este banco de dados no projeto:

    - Editando o arquivo **.env** na raiz do projeto
   ```
    DB_DATABASE=[NOME_DO_BANCO]
   ```
    - Editando o arquivo **./config/database.php**
   ```
    'database' => env('DB_DATABASE', '[NOME_DO_BANCO]'),
   ```
    - Ambos os arquivos possuem configurações do Laravel para conexão com o banco de dados e devem apontar para o banco de dados MySql que foi criado
- Agora é só executar as migrations! Basta abrir o terminal na raiz do projeto e executar o comando 

```
php artisan migrate
```
 - Isto irá criar as tabelas necessárias no banco de dados.
 - Finalize com o comando  ``` php artisan serve ``` para iniciar o servidor,que será hospedado por padrão no endereço http://localhost:8000


## 📋 Considerações 
O projeto foi desenvolvido com um dos templates do Starter Kit de autenticação do Laravel, o [Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze). Com ele você pode se registrar e fazer login na aplicação.

O projeto é composto por duas telas, uma de busca e uma de listagem de resultados.
Ao clicar no botão buscar é realizado uma requisição no site [**https://www.questmultimarcas.com.br/estoque**](https://www.questmultimarcas.com.br/estoque) e os carros encontrados são inseridos no banco de dados automaticamente.
Buscar sem informar um termo de pesquisa trás todos os carros da página.

Na tela de listagem é possível ver todos os carros e excluir algum se desejado.




