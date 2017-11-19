## Tanihub Skill Assesment API
[![Build Status](https://travis-ci.org/tesarwijaya/tanihub-assesment-api.svg?branch=master)](https://travis-ci.org/tesarwijaya/tanihub-assesment-api)

## Local Development
- Clone repositori `git clone https://github.com/tesarwijaya/tanihub-assesment-api.git`
- copy `.env.example` to `.env` and change database setting matching local machine
- Install Dependencies `composer install`
- Generate App key `php artisan key:generate`
- Migrate and seed the database `php artisan migrate --seed`
- Serve the API `php artisan serve`, this app will available in `http://localhost:8000`
- Run test and generate code coverage using xdebug `vendor/bin/phpunit --coverage-text --color=never`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
