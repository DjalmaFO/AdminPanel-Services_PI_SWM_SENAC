# :rocket: Geek Style
## Projeto Integrador - Sistema Web Modular
> Trabalho final 2º semestre de 2021 - SENAC
- Unidade Santo Amaro
### Autores
 - Djalma Oliveira
 - Karina
 - Pedro

### Participação especial
- Professor Fábio Abenza

## Laravel Framework
### Inicialização
- npm install
- copie o arquivo _.env.example_, renomeie a copia para **_.env_** e preencha os valores destinados ao seu database
- dentro do **_.env_** altere o valor da variável **_FILESYSTEM_DRIVER_** para public
- php artisan storage:link
- composer require laravel/jetstream
- composer require spatie/laravel-permission
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
- php artisan optimize:clear
- php artisan migrate
- php artisan db:seed --class=UserSeeder
- php artisan serve
- **Atenção** somente se necessário (execute php artisan key:generate)

### Possíveis problemas
- Artisan não funciona: execute o comando **_composer update --no-scripts_**  
referencia <a>https://stackoverflow.com/questions/29764368/fatal-error-class-illuminate-foundation-application-not-found</a>
## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
